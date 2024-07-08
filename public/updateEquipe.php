<?php
ob_start();
require_once __DIR__ . '/../entites/Equipe.class.php';

if (isset($_GET['id'])) {
    $equipeId = $_GET['id'];

    $equipe = new Equipe();
    $equipeDetails = $equipe->getEquipeById($equipeId);


    if ($equipeDetails) {
?>
        <section class="sectionUpdateCrud">
            <div class="formCrudUpdateMatchEntier">
                <form class="formCrudUpdateMatch" action="../public/UpdateEquipe.php?id=<?php echo htmlspecialchars($equipeId); ?>" method="POST">
                    <label>Nom de l'équipe :</label>
                    <input class="inputCrudMatch" type="text" name="nomEquipe" value="<?php echo htmlspecialchars($equipeDetails['nomEquipe']); ?>"><br>
                    <label>Pays :</label>
                    <input class="inputCrudMatch" type="text" name="nationnaliteEquipe" value="<?php echo htmlspecialchars($equipeDetails['nationnaliteEquipe']); ?>"><br>
                    <div class="divBtnSubmitMatchCrud">
                        <input class="btnSubmitMatchCrud" type="submit" value="Mettre à jour">
                    </div>
                </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomEquipe = filter_input(INPUT_POST, 'nomEquipe', FILTER_SANITIZE_SPECIAL_CHARS);
            $nationnaliteEquipe = filter_input(INPUT_POST, 'nationnaliteEquipe', FILTER_SANITIZE_SPECIAL_CHARS);
            $message = $equipe->updateEquipe($equipeId, $nomEquipe, $nationnaliteEquipe);
            echo $message;
        }
    } else {
        echo "<p class=\"styleEcho\">Joueur non trouvé.</p>";
    }
} else {
    echo "<p class=\"styleEcho\">ID de Joueur non spécifié</p>";
}
        ?>
        <a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
            </div>
        </section>
        <?php
        $content = ob_get_clean();
        $title = "Update Joueur - Jeux Olympique - Handball";
        $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
        $titre = "Joueur : CHANGE LE NOM, L'ÂGE ET LE PAYS DU JOUEUR QUE TU SOUHAITES";
        require "template.php";
        ?>
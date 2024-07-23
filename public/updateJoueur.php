<?php
ob_start();
require_once __DIR__ . '/../entites/Joueur.class.php';

if (isset($_GET['id'])) {
    $joueurId = $_GET['id'];

    $joueur = new Joueur();
    $joueurDetails = $joueur->getJoueurById($joueurId);


    if ($joueurDetails) {
?>
        <section class="sectionUpdateCrud">
            <div class="formCrudUpdateMatchEntier">
                <form class="formCrudUpdateMatch" action="./public/updateJoueur.php?id=<?php echo htmlspecialchars($joueurId); ?>" method="POST">
                    <label>Nom du joueur :</label>
                    <input class="inputCrudMatch" type="text" name="nomJoueur" value="<?php echo htmlspecialchars($joueurDetails['nomJoueur']); ?>"><br>
                    <label>Âge du joueur :</label>
                    <input class="inputCrudMatch" type="text" name="ageJoueur" value="<?php echo htmlspecialchars($joueurDetails['ageJoueur']); ?>"><br>
                    <label>Pays :</label>
                    <input class="inputCrudMatch" type="text" name="idEquipe" value="<?php echo htmlspecialchars($joueurDetails['idEquipe']); ?>"><br>
                    <label class="imgCrud" for="image">Image du joueur : </label>
                    <input type="file" name="image" value="<?php echo htmlspecialchars($joueurDetails['image_joueur']); ?>" require><br>
                    <div class="divBtnSubmitMatchCrud">
                        <input class="btnSubmitMatchCrud" type="submit" value="Mettre à jour">
                    </div>
                </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomJoueur = filter_input(INPUT_POST, 'nomJoueur', FILTER_SANITIZE_SPECIAL_CHARS);
            $ageJoueur = filter_input(INPUT_POST, 'ageJoueur', FILTER_SANITIZE_NUMBER_INT);
            $idEquipe = filter_input(INPUT_POST, 'idEquipe', FILTER_SANITIZE_SPECIAL_CHARS);
            $image = filter_input(INPUT_POST, 'image', FILTER_DEFAULT);

            $message = $joueur->updateJoueur($image, $nomJoueur, $ageJoueur, $idEquipe, $joueurId);
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
        $titre = "JOUEUR : CHANGE L'IMAGE, LE NOM, L'ÂGE ET LE PAYS DU JOUEUR QUE TU SOUHAITES";
        require "template.php";
        ?>
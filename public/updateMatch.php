<?php
ob_start();
require_once __DIR__ . '/../entites/Matches.class.php';

if (isset($_GET['id'])) {
    $matchId = $_GET['id'];

    $match = new Matches();
    $matchDetails = $match->getMatchById($matchId);


    if ($matchDetails) {
?>
        <section class="sectionUpdateCrud">
            <div class="formCrudUpdateMatchEntier">
                <form class="formCrudUpdateMatch" action="../public/UpdateMatch.php?id=<?php echo htmlspecialchars($matchId); ?>" method="POST">
                    <label>Date du match:</label>
                    <input class="inputCrudMatch" type="text" name="dateMatch" value="<?php echo htmlspecialchars($matchDetails['dateMatches']); ?>"><br>
                    <label>Equipe:</label>
                    <input class="inputCrudMatch" type="text" name="equipe" value="<?php echo htmlspecialchars($matchDetails['equipe']); ?>"><br>
                    <label>Equipe Adverse:</label>
                    <input class="inputCrudMatch" type="text" name="equipeAdverse" value="<?php echo htmlspecialchars($matchDetails['equipeAdverse']); ?>"><br>
                    <label>Composition Equipe:</label>
                    <input class="inputCrudMatch" type="text" name="compositionEquipe" value="<?php echo htmlspecialchars($matchDetails['compositionEquipe']); ?>"><br>
                    <label>Composition Adverse:</label>
                    <input class="inputCrudMatch" type="text" name="compositionAdverse" value="<?php echo htmlspecialchars($matchDetails['compositionAdverse']); ?>"><br>
                    <label for="image">Image du match : </label>
                    <input type="file" name="image" value="<?php echo htmlspecialchars($matchDetails['image_matches']); ?>" require><br>
                    <div class="divBtnSubmitMatchCrud">
                        <input class="btnSubmitMatchCrud" type="submit" value="Mettre à jour">
                    </div>
                </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = filter_input(INPUT_POST, 'dateMatch', FILTER_DEFAULT);
            $equipe1 = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_SPECIAL_CHARS);
            $equipe2 = filter_input(INPUT_POST, 'equipeAdverse', FILTER_SANITIZE_SPECIAL_CHARS);
            $compo1 = filter_input(INPUT_POST, 'compositionEquipe', FILTER_SANITIZE_NUMBER_INT);
            $compo2 = filter_input(INPUT_POST, 'compositionAdverse', FILTER_SANITIZE_NUMBER_INT);
            $image = filter_input(INPUT_POST, 'image', FILTER_DEFAULT);

            $message = $match->updateMatch($image, $date, $equipe1, $equipe2, $compo1, $compo2, $matchId);
            echo $message;
        }
    } else {
        echo "<p class=\"styleEcho\">Match non trouvé.</p>";
    }
} else {
    echo "<p class=\"styleEcho\">ID de match non spécifié</p>";
}
        ?>
        <a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
            </div>
        </section>
        <?php
        $content = ob_get_clean();
        $title = "Update Match - Jeux Olympique - Handball";
        $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
        $titre = "MATCH : CHANGE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
        require "template.php";
        ?>
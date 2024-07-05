<?php
ob_start();
require_once 'User.class.php';

if (isset($_GET['id'])) {
    $matchId = $_GET['id'];

    $user = new User();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $date = $_POST['dateMatch'];
        $equipe1 = $_POST['equipe'];
        $equipe2 = $_POST['equipeAdverse'];
        $compo1 = $_POST['compositionEquipe'];
        $compo2 = $_POST['compositionAdverse'];

        $message = $user->updateMatch($date, $equipe1, $equipe2, $compo1, $compo2, $matchId);
        echo $message; 
    }

    $matchDetails = $user->getMatchById($matchId);


    if ($matchDetails) {
?>
<section class="sectionUpdateCrud">
    <div class="formCrudUpdateMatchEntier">
        <form class="formCrudUpdateMatch" action="updateMatch.class.php?id=<?php echo htmlspecialchars($matchId); ?>" method="POST">
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
            <div class="divBtnSubmitMatchCrud">
            <input class="btnSubmitMatchCrud" type="submit" value="Mettre à jour">
             </div>
         </form>

<?php
    } else {
        echo "<p class=\"styleEcho\">Match non trouvé.</p>";
    }
} else {
    echo "<p class=\"styleEcho\">ID de match non spécifié</p>";
}
?>
    </div>
    </section>
<?php
    $content = ob_get_clean();
    $title = "Update Match - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond ajouter crud.png" alt="JO">';
    $titre = "MATCH : CHANGE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
    require "template.php";
 ?>
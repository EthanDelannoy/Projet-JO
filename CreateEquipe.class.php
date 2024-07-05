<?php
ob_start();
require_once 'MyDbConnection.php';
require_once 'User.class.php';
?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="nomEquipe">Nom de l'équipe :</label>
        <input class="inputCrudMatch" type="text" name="nomEquipe" required><br>
        <label for="nationnaliteEquipe">Pays :</label>
        <input class="inputCrudMatch" type="text" name="nationnaliteEquipe" required><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['nomEquipe'], $_POST['nationnaliteEquipe'])) {
    $nomEquipe = $_POST['nomEquipe'];
    $nationnaliteEquipe = $_POST['nationnaliteEquipe'];

    $user = new User();
    $message = $user->createEquipe($nomEquipe, $nationnaliteEquipe);
    echo $message;
} else {
    echo "<p class=\"styleEcho\">Tous les champs du formulaire doivent être remplis</p>";
}
}
?>
<a class="btnRetourCrud" href="./interfaceCrud.php">Retour à l'interface</a>
</div>
</section>
<?php
    $content = ob_get_clean();
    $title = "Ajout Match - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond ajouter crud.png" alt="JO">';
    $titre = "MATCH : AJOUTE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
    require "template.php";
 ?>
  
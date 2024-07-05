<?php
ob_start();
require_once 'MyDbConnection.php';
require_once 'User.class.php';
?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="date">Date du match :</label>
        <input class="inputCrudMatch" placeholder="DD/MM/YYYY" type="date" name="date" required><br>
        <label for="equipe1">Equipe 1 :</label>
        <input class="inputCrudMatch" placeholder="Nom du pays" type="text" name="equipe1" required><br>
        <label for="equipe2">Equipe 2 :</label>
        <input class="inputCrudMatch" placeholder="Nom du deuxième pays" type="text" name="equipe2" required><br>
        <label for="compo1">Composition equipe 1 :</label>
        <input class="inputCrudMatch" placeholder="ex : 1 3 2" type="number" name="compo1" required><br>
        <label for="compo2">Composition equipe 2 :</label>
        <input class="inputCrudMatch" placeholder="ex : 2 3 1" type="number" name="compo2" required><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['date'], $_POST['equipe1'], $_POST['equipe2'], $_POST['compo1'], $_POST['compo2'])) {
    $date = $_POST['date'];
    $equipe1 = $_POST['equipe1'];
    $equipe2 = $_POST['equipe2'];
    $compo1 = $_POST['compo1'];
    $compo2 = $_POST['compo2'];


    $user = new User();
    $message = $user->createMatch($date, $equipe1, $equipe2, $compo1, $compo2);
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
  
<?php
ob_start();
require_once 'MyDbConnection.php';
require_once 'User.class.php';
?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="nom">Nom :</label>
        <input class="inputCrudMatch" type="text" name="nom" required><br>
        <label for="age"> Âge :</label>
        <input class="inputCrudMatch" type="number" name="age" required><br>
        <label for="equipe">Equipe :</label>
        <input class="inputCrudMatch" placeholder="Nom du pays" type="text" name="equipe" required><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['nom'], $_POST['age'], $_POST['equipe'])) {
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $equipe = $_POST['equipe'];

    $user = new User();
    $message = $user->createJoueur($nom, $age, $equipe);
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
    $title = "Ajout Joueur - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond ajouter crud.png" alt="JO">';
    $titre = "JOUEUR : AJOUTE LE NOM, SON AGE ET LE PAYS DANS LEQUEL IL/ELLE JOUE";
    require "template.php";
 ?>
  
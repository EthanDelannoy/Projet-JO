<?php
ob_start();
require_once __DIR__ . '/../dbConnect/myDbConnection.php';
require_once __DIR__ . '/../entites/Matches.class.php';
$date = "";
$equipe1 = "";
$equipe2 = "";
$compo1 = "";
$compo2 = "";
$image = "";
?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="date">Date du match :</label>
        <input class="inputCrudMatch" placeholder="DD/MM/YYYY" type="date" name="date" value="<?= htmlspecialchars($date) ?>" required><br>
        <label for="equipe1">Equipe 1 :</label>
        <input class="inputCrudMatch" placeholder="Nom du pays" type="text" name="equipe1" value="<?= htmlspecialchars($equipe1) ?>" required><br>
        <label for="equipe2">Equipe 2 :</label>
        <input class="inputCrudMatch" placeholder="Nom du deuxième pays" type="text" name="equipe2" value="<?= htmlspecialchars($equipe2) ?>" required><br>
        <label for="compo1">Composition equipe 1 :</label>
        <input class="inputCrudMatch" placeholder="ex : 1 3 2" type="number" name="compo1" value="<?= htmlspecialchars($compo1) ?>" required><br>
        <label for="compo2">Composition equipe 2 :</label>
        <input class="inputCrudMatch" placeholder="ex : 2 3 1" type="number" name="compo2" value="<?= htmlspecialchars($compo2) ?>" required><br>
        <label class="imgCrud" for="image">Image du match :</label>
        <input type="file" name="image" value="<?= htmlspecialchars($image) ?>" required><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
    $equipe1 = filter_input(INPUT_POST, 'equipe1', FILTER_SANITIZE_SPECIAL_CHARS);
    $equipe2 = filter_input(INPUT_POST, 'equipe2', FILTER_SANITIZE_SPECIAL_CHARS);
    $compo1 = filter_input(INPUT_POST, 'compo1', FILTER_SANITIZE_NUMBER_INT);
    $compo2 = filter_input(INPUT_POST, 'compo2', FILTER_SANITIZE_NUMBER_INT);
    $image = filter_input(INPUT_POST, 'image', FILTER_DEFAULT);
if ($image && $date && $equipe1 && $equipe2 && $compo1 && $compo2) {
    $match = new Matches();
    $message = $match->createMatch($image, $date, $equipe1, $equipe2, $compo1, $compo2);
    echo $message;
} else {
    echo "<p class=\"styleEcho\">Tous les champs du formulaire doivent être remplis</p>";
}
}
?>

<a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
</div>
</section>
<?php
    $content = ob_get_clean();
    $title = "Ajout Match - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
    $titre = "MATCH : AJOUTE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
    require "template.php";
 ?>
  
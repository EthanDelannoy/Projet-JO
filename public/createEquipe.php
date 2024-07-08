<?php
ob_start();
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
require_once __DIR__ . '/../entites/Equipe.class.php';
$nomEquipe = "";
$nationnaliteEquipe = "";
?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="nomEquipe">Nom de l'équipe :</label>
        <input class="inputCrudMatch" type="text" name="nomEquipe" value="<?= htmlspecialchars($nomEquipe) ?>" required><br>
        <label for="nationnaliteEquipe">Pays :</label>
        <input class="inputCrudMatch" type="text" name="nationnaliteEquipe" value="<?= htmlspecialchars($nationnaliteEquipe) ?>" required><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomEquipe = filter_input(INPUT_POST, 'nomEquipe', FILTER_SANITIZE_SPECIAL_CHARS);
    $nationnaliteEquipe = filter_input(INPUT_POST, 'nationnaliteEquipe', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($nomEquipe && $nationnaliteEquipe) {
        $equipe = new Equipe();
        $message = $equipe->createEquipe($nomEquipe, $nationnaliteEquipe);
        echo $message;
    } else {
        echo "<p class=\"styleEcho\">Tous les champs du formulaire doivent être remplis correctement.</p>";
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
  
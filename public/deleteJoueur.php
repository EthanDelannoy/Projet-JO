<?php
require_once __DIR__ . '/../entites/Joueur.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $joueur = new Joueur();
    $result = $joueur->deleteJoueur($id);

    header('Location: ../public/ReadJoueur.php');
    exit; 
}
?>

<?php
    $content = ob_get_clean();
    $title = "Crud Delete - Jeux Olympique - Handball";
    $image = '';
    $titre = "";
    require "template.php";
    ?>
  
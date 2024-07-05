<?php
require_once 'User.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user = new User();
    $result = $user->deleteJoueur($id);

    header('Location: ReadJoueur.class.php');
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
  
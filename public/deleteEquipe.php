<?php
require_once __DIR__ . '/../entites/Equipe.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $equipe = new Equipe();
    $result = $equipe->deleteEquipe($id);

    header('Location: ../public/ReadEquipe.php');
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
  

<?php
ob_start();
require_once __DIR__ . '/../entites/Matches.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $match = new Matches();
    $result = $match->deleteMatch($id);

    header('Location: ./ReadMatch.php');
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
  

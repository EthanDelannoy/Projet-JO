<?php
ob_start(); 

require_once __DIR__ . '/../entites/Utilisateur.class.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user = new User();
    $result = $user->deleteUtilisateur($id);

    header('Location: ../public/readUser.php');
    exit(); 
}

$content = ob_get_clean();
$title = "Crud Delete - Jeux Olympique - Handball";
$image = '';
$titre = "";
require "template.php";
?>
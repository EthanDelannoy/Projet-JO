<?php

session_start(); 


if (isset($_SESSION['idUtilisateur'])) {
    unset($_SESSION['idUtilisateur']);
    $_SESSION = array();
    session_destroy();
}


header("Location: index.php");
exit();
?>
<?php
    $content = ob_get_clean();
    $titre = "Vous n'étes plus connecté";
    $title = "Déconnection";
    require "template.php";
?>
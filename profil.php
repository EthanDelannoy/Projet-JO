<?php ob_start(); ?>








<?php
    $content = ob_get_clean();
    $title = "Votre profil - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond profil.jpg" alt="Handball">';
    $titre = "MON COMPTE";
    require "template.php";
    ?>
  
<?php ob_start(); ?>










<?php
    $content = ob_get_clean();
    $title = "Billeterie - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/billet fond hand 1.png" alt="Handball">';
    $titre = "JO PARIS 2024 : LA BILLETERIE D'HANDBALL";
    require "template.php";
    ?>
  
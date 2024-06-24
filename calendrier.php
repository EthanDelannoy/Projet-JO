<?php ob_start(); ?>









<?php
    $content = ob_get_clean();
    $title = "Calendrier - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/calendrier fond 1.png" alt="">';
    $titre = "JO PARIS 2024 : LE CALENDRIER D'HANDBALL";
    require "template.php";
    ?>
  
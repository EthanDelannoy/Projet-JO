<?php ob_start(); ?>

<section class="pageCgu">
<h2>Conditions générales d'utilisation</h2>

</section>

<?php
$content = ob_get_clean();
$title = "CGU - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="../public/image/fond cgu.jpg" alt="CGU">';
$titre = "CGU : CONDITIONS GÉNÉRALES D'UTILISATIONS";
require "template.php";
?>
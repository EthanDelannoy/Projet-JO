<?php
ob_start();
?>
<section class="crudRead">

<a class="ReadCrudebtn" href="./ReadMatch.class.php">VOIR LES MATCHS</a>
<a class="ReadCrudebtn" href="./ReadJoueur.class.php">VOIR LES JOUEURS</a>
<a class="ReadCrudebtn" href="./ReadEquipe.class.php">VOIR LES EQUIPES</a>

</section>

<?php
    $content = ob_get_clean();
    $title = "Accueil - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond read.png" alt="Handball">';
    $titre = "HANDBALL : Tout ce que vous devez savoir pour les Jeux Olympiques se trouve ici !";
    require "template.php";
    ?>
  
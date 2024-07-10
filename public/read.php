<?php
ob_start();
?>
<section class="crudRead">

<a class="ReadCrudebtn" href="../public/ReadUser.php">VOIR LES UTILISATEURS</a>
<a class="ReadCrudebtn" href="../public/ReadMatch.php">VOIR LES MATCHS</a>
<a class="ReadCrudebtn" href="../public/ReadJoueur.php">VOIR LES JOUEURS</a>
<a class="ReadCrudebtn" href="../public/ReadEquipe.php">VOIR LES EQUIPES</a>

</section>

<?php
    $content = ob_get_clean();
    $title = "Accueil - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond read.png" alt="Handball">';
    $titre = "CRUD : REGARDE LES MATCHS, JOUEURS, EQUIPES OU UTILISATEURS QUE TU SOUHAITES";
    require "template.php";
    ?>
  
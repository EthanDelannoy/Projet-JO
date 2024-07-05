<?php
ob_start();
?>

<section class="CrudCreate">

<a class="CreateCrudebtn" href="./CreateMatch.class.php">AJOUTER UN MATCH</a>
<a class="CreateCrudebtn" href="./CreateJoueur.class.php">AJOUTER UN JOUEUR</a>
<a class="CreateCrudebtn" href="./CreateEquipe.class.php">AJOUTER UNE EQUIPE</a>

</section>

<?php
    $content = ob_get_clean();
    $title = "Crud Ajouter - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond ajouter crud.png" alt="JO">';
    $titre = "CRUD : AJOUTE LE MATCH, JOUEUR OU EQUIPES QUE TU SOUHAITES";
    require "template.php";
 ?>
  
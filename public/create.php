<?php
ob_start();
?>

<section class="CrudCreate">

<a class="CreateCrudebtn" href="../public/CreateUser.php">AJOUTER UN UTILISATEUR</a>
<a class="CreateCrudebtn" href="../public/CreateMatch.php">AJOUTER UN MATCH</a>
<a class="CreateCrudebtn" href="../public/CreateJoueur.php">AJOUTER UN JOUEUR</a>
<a class="CreateCrudebtn" href="../public/CreateEquipe.php">AJOUTER UNE EQUIPE</a>

</section>

<?php
    $content = ob_get_clean();
    $title = "Crud Ajouter - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
    $titre = "CRUD : AJOUTE LE MATCH, JOUEUR, EQUIPES OU UTILISATEURS QUE TU SOUHAITES";
    require "template.php";
 ?>
  
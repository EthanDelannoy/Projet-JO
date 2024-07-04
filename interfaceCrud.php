<?php ob_start();
?>

<section class="interfaceCrud">
    <div class="groupeAjouterAfficher">
        <div class="ajouter">
            <p class="titreAjouter">AJOUTER UN MATCH, JOUEUR OU UNE EQUIPE.</p>
            <img class="imgMascotteAjoute" src="./public/css/image/Mascotte_Ajoute.png" alt="Mascotte">
            <a class="btnAjouterCrud" href="./Create.class.php">AJOUTER</a>
        </div>


        <div class="afficher">
        <p class="titreAfficher">AFFICHER LES MATCHS, JOUEURS OU LES EQUIPES.</p>
            <img class="imgMascotteAffiche" src="./public/css/image/Mascotte_Voir.png" alt="Mascotte">
            <a class="btnAfficherCrud" href="./Read.class.php">AFFICHER</a>
        </div>
    </div>
</section>



<?php
    $content = ob_get_clean();
    $title = "CRUD - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond-Crud.png" alt="JO">';
    $titre = "CRUD : Ajouter, modifier, supprimer ou tout simplement voir !";
    require "template.php";
    ?>
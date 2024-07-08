<?php ob_start();
?>

<section class="interfaceCrud">
    <div class="groupeAjouterAfficher">
        <div class="ajouter">
            <p class="titreAjouter">AJOUTER UN MATCH, JOUEUR, EQUIPE ET UTILISATEUR.</p>
            <img class="imgMascotteAjoute" src="../public/image/Mascotte_Ajoute.png" alt="Mascotte">
            <a class="btnAjouterCrud" href="../public/Create.php">AJOUTER</a>
        </div>


        <div class="afficher">
        <p class="titreAfficher">AFFICHER LES MATCHS, JOUEURS, EQUIPES ET UTILISATEURS.</p>
            <img class="imgMascotteAffiche" src="../public/image/Mascotte_Voir.png" alt="Mascotte">
            <a class="btnAfficherCrud" href="../public/Read.php">AFFICHER</a>
        </div>
    </div>
</section>



<?php
    $content = ob_get_clean();
    $title = "CRUD - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond-Crud.png" alt="JO">';
    $titre = "CRUD : Ajouter, modifier, supprimer ou tout simplement voir !";
    require "template.php";
    ?>
<?php ob_start();
$text = "";
?>

<section class="recherche">
    <h2>À LA RECHERCHE DE VOTRE VOTRE ÉQUIPE PRÉFÉRÉE ?</h2>
    <p class="paragraphePageEquipe"> VOUS POURREZ RETROUVER TOUTES VOS ÉQUIPES ET VOIR LEUR MATCH PROGRAMMÉ ET LES JOUEURS DE L’ÉQUIPE.</p>
    <p class="paragraphePageEquipe">INDIQUEZ-NOUS QUI VOUS VOULEZ CHERCHER !
    <p>

    <div class="formEquipe">
        <form action="equipe.php" method="POST">
            <select name="choix" id="choix" required>
                <option value="Joueur">Joueur</option>
                <option value="Equipe">Equipe</option>
                <option value="Match">Match</option>
            </select>
            <input type="text" placeholder="INDIQUEZ VOTRE RECHERCHE" name="text" id="text" value="<?= htmlspecialchars($text) ?>" required>

            <input type="submit" id="submitEquipe" value="RECHERCHER">
        </form>
        <?php

        //------------------------------------------------------VERFIFICATION PRÉNOM--------------------------------------------------

        if (isset($_POST['text'])) {
            $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (!ctype_alpha($text)) {
                echo "<p class=\"styleEcho\">Votre recherche n'est pas valide</p>";
            }
        }
        ?>
    </div>
</section>








<?php
$content = ob_get_clean();
$title = "Equipes - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="./public/css/image/fond equipe.png" alt="Handball">';
$titre = "JO PARIS 2024 : Toutes les équipes d’handball";
require "template.php";
?>
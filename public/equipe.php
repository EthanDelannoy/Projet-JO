<?php
require_once __DIR__ . '/../entites/Recherche.class.php';
ob_start();
$text = "";
$choix = "";

?>

<section class="recherche">
    <p class="titreEquipe">À LA RECHERCHE DE VOTRE ÉQUIPE PRÉFÉRÉE ?</p>
    <p class="paragraphePageEquipe">VOUS POURREZ RETROUVER TOUTES VOS ÉQUIPES ET VOIR LEUR MATCH PROGRAMMÉ ET LES JOUEURS DE L’ÉQUIPE.</p>
    <p class="paragraphePageEquipe">INDIQUEZ-NOUS QUI VOUS VOULEZ CHERCHER !</p>

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
    </div>
    <div class="rechercheInput">

    <?php
    if (isset($_POST['text']) && isset($_POST['choix'])) {
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
        $choix = filter_input(INPUT_POST, 'choix', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($text)) {
            echo "<p class=\"styleEcho\">Votre recherche n'est pas valide</p>";
        } else {
            $recherche = new Recherche();
            $result = [];

            if ($choix == "Joueur") {
                $result = $recherche->chercherJoueur($text);
            } elseif ($choix == "Equipe") {
                $result = $recherche->chercherEquipe($text);
            } elseif ($choix == "Match") {
                $result = $recherche->chercherMatch($text);
            }

            if ($result) {
                foreach ($result as $row) {
                    if ($choix == "Match") {
                        echo "<img class=\"imgBdd\" src='../public/image/" . htmlspecialchars($row['image_matches']) . "' alt='Image du match'>";
                    } elseif ($choix == "Joueur") {
                        echo "<div class='resultatRecherche'>";
                        echo "<img class=\"imgBddJoueur\" src='../public/image/" . htmlspecialchars($row['image_joueur']) . "' alt='Image du joueur'>";
                        echo "<p class=\"textebdd\">" . htmlspecialchars($row['nomJoueur']) . "</p>";
                        echo "<p class=\"textebdd\">" . "|" . "</p>";
                        echo "<p class=\"textebdd\">" . htmlspecialchars($row['ageJoueur'])." ans" . "</p>";
                        echo "<p class=\"textebdd\">" . "|" . "</p>";
                        $nomEquipe = $recherche->obtenirNomEquipeParId($row['idEquipe']);
                        echo "<p class=\"textebdd\">" . htmlspecialchars($nomEquipe) . "</p>";
                        echo "</div>";
                    } elseif ($choix == "Equipe") {
                        echo "<div class='resultatRecherche'>";
                        echo "<img class=\"imgBddEquipe\" src='../public/image/" . htmlspecialchars($row['image_equipe']) . "' alt='Image de l\'équipe'>";
                        echo "<p class=\"textebdd\">" . "|" . "</p>";
                        echo "<p class=\"textebdd\">" . htmlspecialchars($row['nomEquipe']) . "</p>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<p class=\"styleEcho\">Aucun résultat trouvé</p>";
            }
        }
    }
    ?>
    </div>
</section>

<?php
$content = ob_get_clean();
$title = "Equipes - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="./image/fond equipe.png" alt="Handball">';
$titre = "JO PARIS 2024 : Toutes les équipes d’handball";
require "template.php";
?>
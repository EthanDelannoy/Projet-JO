<?php
require_once __DIR__ . '/../entites/Recherche.class.php';
ob_start();
$text = "";
$choix = "";

?>

<section class="recherche">
    <p class="titreEquipe">À LA RECHERCHE DE VOTRE VOTRE ÉQUIPE PRÉFÉRÉE ?</p>
    <p class="paragraphePageEquipe"> VOUS POURREZ RETROUVER TOUTES VOS ÉQUIPES ET VOIR LEUR MATCH PROGRAMMÉ ET LES JOUEURS DE L’ÉQUIPE.</p>
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
                if ($choix == "Match") {
                    foreach ($result as $row) {
                        echo "<img class=\"imgBdd\" src='../public/image/" . htmlspecialchars($row['image_matches']) . "' alt='Image du match'>";
                    }
                } else {
                    echo "<table border='1'>";
                    echo "<tr>";
                    if ($choix == "Joueur") {
                        echo "<th>Nom</th><th>Âge</th><th>ID Équipe</th>";
                    } elseif ($choix == "Equipe") {
                        echo "<th>Nom Équipe</th><th>Nationalité</th>";
                    }
                    echo "</tr>";

                    foreach ($result as $row) {
                        echo "<tr>";
                        if ($choix == "Joueur") {
                            echo "<td>" . htmlspecialchars($row['nomJoueur']) . "</td><td>" . htmlspecialchars($row['ageJoueur']) . "</td><td>" . htmlspecialchars($row['idEquipe']) . "</td>";
                        } elseif ($choix == "Equipe") {
                            echo "<td>" . htmlspecialchars($row['nomEquipe']) . "</td><td>" . htmlspecialchars($row['nationnaliteEquipe']) . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
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
<?php
ob_start();
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
require_once __DIR__ . '/../entites/Joueur.class.php';
$nom = "";
$age = "";
$equipe = "";
?>

<section class="crudCreatEnfant">
    <div class="formCrudMatchEntier">
        <form class="formCrudMatch" method="POST">
            <label for="nom">Nom :</label>
            <input class="inputCrudMatch" type="text" name="nom" value="<?= htmlspecialchars($nom) ?>" required><br>
            <label for="age"> Âge :</label>
            <input class="inputCrudMatch" type="number" name="age" value="<?= htmlspecialchars($age) ?>" required><br>
            <label for="equipe">Equipe :</label>
            <input class="inputCrudMatch" placeholder="Nom du pays" type="text" name="equipe" value="<?= htmlspecialchars($equipe) ?>" required><br>
            <label class="imgCrud" for="image">Image du Joueur :</label>
            <input type="file" name="image" value="<?= htmlspecialchars($image) ?>" required><br>
            <div class="divBtnSubmitMatchCrud">
                <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
            </div>
        </form>



        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
            $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
            $equipe = filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_SPECIAL_CHARS);
            if ($nom && $age && $equipe) {
                $joueur = new Joueur();
                $message = $joueur->createJoueur($nom, $age, $equipe);
                echo $message;
            } else {
                echo "<p class=\"styleEcho\">Tous les champs du formulaire doivent être remplis</p>";
            }
        }
        ?>
        <a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = "Ajout Joueur - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
$titre = "JOUEUR : AJOUTE LE NOM, SON AGE ET LE PAYS DANS LEQUEL IL/ELLE JOUE";
require "template.php";
?>
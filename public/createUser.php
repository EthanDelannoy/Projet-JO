<?php
ob_start();
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
require_once __DIR__ . '/../entites/Utilisateur.class.php';
$nom = "";
$prenom = "";
$email = "";
$mdp = "";
$role = "";

?>

<section class="crudCreatEnfant">
<div class="formCrudMatchEntier">
    <form class="formCrudMatch" method="POST">
        <label for="nom">Nom :</label>
        <input class="inputCrudMatch" type="text" name="nom" value="<?= htmlspecialchars($nom) ?>" required><br>
        <label for="prenom">Prénom :</label>
        <input class="inputCrudMatch" type="text" name="prenom" value="<?= htmlspecialchars($prenom) ?>" required><br>
        <label for="email">Email :</label>
        <input class="inputCrudMatch" type="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br>
        <label for="mdp">Mot de passe :</label>
        <input class="inputCrudMatch" type="password" name="mdp" placeholder=" 8 caractères, 1 maj, 1 min, 1 chiffre, 1 caractères spécial" value="<?php echo htmlspecialchars($mdp); ?>" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" required><br>
        <select name="role" value="<?= htmlspecialchars($role) ?>" required>
            <option value="admin">Admin</option>
            <option value="non-admin">Non-Admin</option>
        </select><br>
        <div class="divBtnSubmitMatchCrud">
        <input class="btnSubmitMatchCrud" type="submit" value="Ajouter">
        </div>
    </form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
    $role = filter_input(INPUT_POST, 'role', FILTER_DEFAULT);
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (!preg_match($password_pattern, $mdp)) {
        echo "<p class=\"styleEcho\">Le mot de passe ne respecte pas les critères.</p>";
    } elseif ($nom && $prenom && $email && $mdp && $role) {
        $user = new User();
        $message = $user->createUtilisateur($nom, $prenom, $email, $mdp, $role);
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
    $title = "Ajout Match - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
    $titre = "MATCH : AJOUTE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
    require "template.php";
 ?>
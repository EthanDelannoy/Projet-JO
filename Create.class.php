<?php
ob_start();
require_once 'MyDbConnection.php';
require_once 'User.class.php';
?>

<section class="crudCreate">
<div class="form-container">
    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>
        <label for="role">Rôle:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="non-admin">Non-Admin</option>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</div>

<?php
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['role'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $user = new User();
    $message = $user->createUser($nom, $prenom, $email, $password, $role);
    echo $message;
} else {
    echo "Tous les champs du formulaire doivent être remplis.";
}
?>
</section>
<?php
    $content = ob_get_clean();
    $title = "Accueil - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond hand 1.png" alt="Handball">';
    $titre = "HANDBALL : Tout ce que vous devez savoir pour les Jeux Olympiques se trouve ici !";
    require "template.php";
 ?>
  
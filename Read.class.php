<?php
ob_start();
require_once 'User.class.php';

$user = new User();
$users = $user->getAllUsers();
?>

<section class="crudRead">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['idUtilisateur']); ?></td>
        <td><?php echo htmlspecialchars($user['nom']); ?></td>
        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td><a href="Update.class.php?id=<?php echo $user['idUtilisateur']; ?>">Modifier</a></td>
        <td><a href="Delete.class.php?id=<?php echo $user['idUtilisateur']; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
</table>

</section>

<?php
    $content = ob_get_clean();
    $title = "Accueil - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond hand 1.png" alt="Handball">';
    $titre = "HANDBALL : Tout ce que vous devez savoir pour les Jeux Olympiques se trouve ici !";
    require "template.php";
    ?>
  
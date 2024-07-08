<?php
ob_start();
require_once __DIR__ . '/../entites/Utilisateur.class.php';

$user = new User();
$users = $user->getAllUtilisateur();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['idUtilisateur']); ?></td>
        <td><?php echo htmlspecialchars($user['nom']); ?></td>
        <td><?php echo htmlspecialchars($user['prenom']); ?></td>
        <td><?php echo htmlspecialchars($user['email']); ?></td>
        <td><a href="../public/UpdateUser.php?id=<?php echo $user['idUtilisateur']; ?>">Modifier </a> |
        <a href="../public/DeleteUser.php?id=<?php echo $user['idUtilisateur']; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
</section>


<?php
    $content = ob_get_clean();
    $title = "Crud Read - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond read.png" alt="JO">';
    $titre = "READ : AFFICHE LE DETAILS DE TOUT LES MATCHS PRÉVUS";
    require "template.php";
    ?>
  
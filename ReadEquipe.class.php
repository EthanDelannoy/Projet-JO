<?php
ob_start();
require_once 'User.class.php';

$user = new User();
$users = $user->getAllEquipe();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom de l'équipe</th>
        <th>Nationnalité de l'équipe</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['idEquipe']); ?></td>
        <td><?php echo htmlspecialchars($user['nomEquipe']); ?></td>
        <td><?php echo htmlspecialchars($user['nationnaliteEquipe']); ?></td>
        <td><a href="UpdateEquipe.class.php?id=<?php echo $user['idEquipe']; ?>">Modifier </a> |
        <a href="DeleteEquipe.class.php?id=<?php echo $user['idEquipe']; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a class="btnRetourCrud" href="./interfaceCrud.php">Retour à l'interface</a>
</section>


<?php
    $content = ob_get_clean();
    $title = "Crud Read - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond read.png" alt="JO">';
    $titre = "READ : AFFICHE LE DETAILS DE TOUT LES EQUIPES ENREGISTRÉES";
    require "template.php";
    ?>
  
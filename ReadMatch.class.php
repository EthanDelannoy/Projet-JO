<?php
ob_start();
require_once 'User.class.php';

$user = new User();
$users = $user->getAllMatch();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Dates</th>
        <th>Equipe</th>
        <th>Equipe Adverse</th>
        <th>Composition Equipe</th>
        <th>Composition Adverse</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['idMatches']); ?></td>
        <td><?php echo htmlspecialchars($user['dateMatches']); ?></td>
        <td><?php echo htmlspecialchars($user['equipe']); ?></td>
        <td><?php echo htmlspecialchars($user['equipeAdverse']); ?></td>
        <td><?php echo htmlspecialchars($user['compositionEquipe']); ?></td>
        <td><?php echo htmlspecialchars($user['compositionAdverse']); ?></td>
        <td><a href="UpdateMatch.class.php?id=<?php echo $user['idMatches']; ?>">Modifier </a> |
        <a href="DeleteMatch.class.php?id=<?php echo $user['idMatches']; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a class="btnRetourCrud" href="./interfaceCrud.php">Retour à l'interface</a>
</section>


<?php
    $content = ob_get_clean();
    $title = "Crud Read - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="./public/css/image/fond read.png" alt="JO">';
    $titre = "READ : AFFICHE LE DETAILS DE TOUT LES MATCHS PRÉVUS";
    require "template.php";
    ?>
  
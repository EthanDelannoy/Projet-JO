<?php
ob_start();
require_once 'User.class.php';

$user = new User();
$users = $user->getAllJoueur();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom du joueur(se)</th>
        <th>Âge du joueur(se)</th>
        <th>Équipe du joueur(se)</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo htmlspecialchars($user['idJoueur']); ?></td>
        <td><?php echo htmlspecialchars($user['nomJoueur']); ?></td>
        <td><?php echo htmlspecialchars($user['ageJoueur']); ?></td>
        <td><?php echo htmlspecialchars($user['idEquipe']); ?></td>
        <td><a href="UpdateJoueur.class.php?id=<?php echo $user['idJoueur']; ?>">Modifier </a> |
        <a href="DeleteJoueur.class.php?id=<?php echo $user['idJoueur']; ?>">Supprimer</a></td>
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
  
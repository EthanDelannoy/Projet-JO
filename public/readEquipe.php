<?php
ob_start();
require_once __DIR__ . '/../entites/Equipe.class.php';


$equipe = new Equipe();
$equipes = $equipe->getAllEquipe();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom de l'équipe</th>
        <th>Nationnalité de l'équipe</th>
        <th>Action</th>
    </tr>
    <?php foreach ($equipes as $equipe): ?>
    <tr>
        <td><?php echo htmlspecialchars($equipe['idEquipe']); ?></td>
        <td><?php echo htmlspecialchars($equipe['nomEquipe']); ?></td>
        <td><?php echo htmlspecialchars($equipe['nationnaliteEquipe']); ?></td>
        <td><a href="../public/UpdateEquipe.php?id=<?php echo $equipe['idEquipe']; ?>">Modifier </a> |
        <a href="../public/DeleteEquipe.php?id=<?php echo $equipe['idEquipe']; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
</section>


<?php
    $content = ob_get_clean();
    $title = "Crud Read - Jeux Olympique - Handball";
    $image = '<img class="fondAccueil" src="../public/image/fond read.png" alt="JO">';
    $titre = "READ : AFFICHE LE DETAILS DE TOUT LES EQUIPES ENREGISTRÉES";
    require "template.php";
    ?>
  
<?php
ob_start();
require_once __DIR__ . '/../entites/Matches.class.php';

$match = new Matches();
$matchs = $match->getAllMatch();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Dates</th>
        <th>Equipe</th>
        <th>Equipe Adverse</th>
        <th>Composition Equipe</th>
        <th>Composition Adverse</th>
        <th>Action</th>
    </tr>
    <?php foreach ($matchs as $match): ?>
    <tr>
        <td><?php echo htmlspecialchars($match['idMatches']); ?></td>
        <td><img src="./image/<?php echo htmlspecialchars($match['image_matches']); ?>" alt="ImageMatch" width="150" height="80"></td>
        <td><?php echo htmlspecialchars($match['dateMatches']); ?></td>
        <td><?php echo htmlspecialchars($match['equipe']); ?></td>
        <td><?php echo htmlspecialchars($match['equipeAdverse']); ?></td>
        <td><?php echo htmlspecialchars($match['compositionEquipe']); ?></td>
        <td><?php echo htmlspecialchars($match['compositionAdverse']); ?></td>
        <td><a href="../public/UpdateMatch.php?id=<?php echo $match['idMatches']; ?>">Modifier </a> |
        <a href="../public/DeleteMatch.php?id=<?php echo $match['idMatches']; ?>">Supprimer</a></td>
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
  
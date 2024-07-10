<?php
ob_start();
require_once __DIR__ . '/../entites/Joueur.class.php';

$joueur = new Joueur();
$joueurs = $joueur->getAllJoueur();
?>

<section class="crudReadEnfant">

<table border="1">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Nom du joueur(se)</th>
        <th>Âge du joueur(se)</th>
        <th>Équipe du joueur(se)</th>
        <th>Action</th>
    </tr>
    <?php foreach ($joueurs as $joueur): ?>
    <tr>
        <td><?php echo htmlspecialchars($joueur['idJoueur']); ?></td>
        <td><img src="./image/<?php echo htmlspecialchars($joueur['image_joueur']); ?>" alt="ImageJoueur" width="120" height="120"></td>
        <td><?php echo htmlspecialchars($joueur['nomJoueur']); ?></td>
        <td><?php echo htmlspecialchars($joueur['ageJoueur']); ?></td>
        <td><?php echo htmlspecialchars($joueur['idEquipe']); ?></td>
        <td><a href="../public/UpdateJoueur.php?id=<?php echo $joueur['idJoueur']; ?>">Modifier </a> |
        <a href="../public/DeleteJoueur.php?id=<?php echo $joueur['idJoueur']; ?>">Supprimer</a></td>
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
  
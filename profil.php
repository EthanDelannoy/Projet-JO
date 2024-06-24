<?php
require_once 'dbConnect.php';
session_start();

if (!isset($_SESSION['idUtilisateur'])) {
    header('Location: login.php');
    exit();
}

$pdo = getPDOConnexion();
$stmt = $pdo->prepare('SELECT nom, prenom, email FROM UTILISATEUR WHERE idUtilisateur = ?');
$stmt->execute([$_SESSION['idUtilisateur']]);
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

ob_start();
?>



<?php
$content = ob_get_clean();
$title = "Votre profil - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="./public/css/image/fond profil.jpg" alt="Handball">';
$titre = 'MON COMPTE';
require 'template.php';
?>


<?php
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
session_start(); 

if (isset($_SESSION['idUtilisateur'])) {
    $pdo = MyDbConnection::getInstance(); 


    $stmt = $pdo->prepare('
        SELECT u.prenom, u.nom, u.email, r.idRoles 
        FROM UTILISATEUR u
        JOIN ROLES r ON u.idRoles = r.idRoles 
        WHERE u.idUtilisateur = ?
    ');
    $stmt->execute([$_SESSION['idUtilisateur']]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        ?>
        <section class="pageProfil">
            <div class="groupeProfilEntier">
                <div class="infoPersonnel">
                    <p class="titreInfo">INFORMATIONS PERSONNELLES</p>
                    <div class="groupeInfoValue">
                        <p class="infoPrenom">PRÉNOM :</p>
                        <p class="valuePrenom" id="paragraphePrenom"><?php echo htmlspecialchars($utilisateur['prenom']); ?>
                            <img id="crayonModifier" src="../public/image/pencil.png" alt="CrayonModifier"></p>
                    </div>
                    <div class="groupeInfoValue">
                        <p class="infoNom">NOM :</p>
                        <p class="valueNom" id="paragrapheNom"><?php echo htmlspecialchars($utilisateur['nom']); ?>
                             <img id="crayonModifier2" src="../public/image/pencil.png" alt="CrayonModifier"></p>
                    </div>
                    <div class="groupeInfoValue">
                        <p class="infoEmail">EMAIL :</p>
                        <p class="valueEmail" id="paragrapheEmail"><?php echo htmlspecialchars($utilisateur['email']); ?>
                             <img id="crayonModifier3" src="../public/image/pencil.png" alt="CrayonModifier"></p>
                    </div>
                </div>
                <img class="mascotteProfil" src="../public/image/mascotte profil.png" alt="Mascotte">
            </div>
            <div class="groupBtnProfil">
            <a class="btnDeconnection" href="../public/logout.php">SE DÉCONNECTER</a>

            <?php if ($utilisateur['idRoles'] == 1): ?>
                <a class="btnAccesCrud" href="../public/interfaceCrud.php">ACCÉDEZ AU CRUD</a>
            <?php endif; ?>
            </div>
        </section>
        <?php
    } else {
        echo '<p class="styleEcho">Erreur : Utilisateur non trouvé.</p>';
    }
}
?>


<?php
$content = ob_get_clean();
$title = "Votre profil - Jeux Olympique - Handball";
$image = '<img class="fondAccueil" src="./image/fond profil.jpg" alt="Handball">';
$titre = 'VOTRE COMPTE : ACCEDEZ À<br> TOUT VOTRE PROFIL';
require 'template.php';
?>


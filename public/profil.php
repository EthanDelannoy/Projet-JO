<?php
require_once __DIR__ . '/../dbConnect/myDbConnection.php';
require_once __DIR__ . '/../entites/Utilisateur.class.php';
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
            <div id="groupeProfilEntier">
                <div class="infoPersonnel">
                    <p class="titreInfo">INFORMATIONS PERSONNELLES</p>
                    <div class="groupeInfoValue">
                        <p class="infoPrenom">PRÉNOM :</p>
                        <p class="valuePrenom" id="paragraphePrenom"><?php echo htmlspecialchars($utilisateur['prenom']); ?>
                            <img id="crayonModifier" src="../public/image/pencil.png" alt="CrayonModifier">
                        </p>
                    </div>
                    <div class="groupeInfoValue">
                        <p class="infoNom">NOM :</p>
                        <p class="valueNom" id="paragrapheNom"><?php echo htmlspecialchars($utilisateur['nom']); ?>
                            <img id="crayonModifier2" src="../public/image/pencil.png" alt="CrayonModifier">
                        </p>
                    </div>
                    <div class="groupeInfoValue">
                        <p class="infoEmail">EMAIL :</p>
                        <p class="valueEmail" id="paragrapheEmail"><?php echo htmlspecialchars($utilisateur['email']); ?>
                            <img id="crayonModifier3" src="../public/image/pencil.png" alt="CrayonModifier">
                        </p>
                    </div>
                </div>
                <img class="mascotteProfil" src="../public/image/mascotte profil.png" alt="Mascotte">
            </div>
        </section>

        <section id="formChangementInfo">
            <form class="groupeChangementProfilEntier" action="../public/profil.php" method="POST">
                <input type="hidden" name="idUtilisateur" value="<?php echo $_SESSION['idUtilisateur']; ?>">
                <div class="infoChangementPersonnel">
                    <p class="titreInfo">INDIQUEZ VOS CHANGEMENT D'INFORMATIONS PERSONNELLES</p>
                    <div class="groupeChangementInfoValue">
                        <label class="infoPrenom" for="prenomProfil">PRÉNOM :</label>
                        <input type="text" name="prenom" id="prenomProfil" value="<?php echo htmlspecialchars($utilisateur['prenom']); ?>">
                    </div>
                    <div class="groupeChangementInfoValue">
                        <label class="infoNom" for="nomProfil">NOM :</label>
                        <input type="text" name="nom" id="nomProfil" value="<?php echo htmlspecialchars($utilisateur['nom']); ?>">
                    </div>
                    <div class="groupeChangementInfoValue">
                        <label class="infoEmail" for="emailProfil">EMAIL :</label>
                        <input type="text" name="email" id="emailProfil" value="<?php echo htmlspecialchars($utilisateur['email']); ?>">
                    </div>
                    <div class="divBtnModifierProfil">
                        <input class="btnModifierProfil" type="submit" value="MODIFIER">
                    </div>
                    <?php
                   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
                    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                    $idUtilisateur = filter_input(INPUT_POST, 'idUtilisateur', FILTER_SANITIZE_NUMBER_INT);
                
                    if ($nom && $prenom && $email && $idUtilisateur) {
                        $user = new User();
                        $message = $user->updateUtilisateurProfil($nom, $prenom, $email, $idUtilisateur);
                        echo $message;
                    } else {
                        echo "<p class=\"styleEchoProfil\">Veuillez bien remplir tous les champs.</p>";
                    }
                }
                    ?>
                </div>
                <img class="mascotteProfilModifier" src="../public/image/mascotte profil.png" alt="Mascotte">
            </form>
        </section>

        <div class="groupBtnProfil">
            <a class="btnDeconnection" href="../public/logout.php">SE DÉCONNECTER</a>
            <?php if ($utilisateur['idRoles'] == 1) : ?>
                <a class="btnAccesCrud" href="../public/interfaceCrud.php">ACCÉDEZ AU CRUD</a>
            <?php endif; ?>
        </div>
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
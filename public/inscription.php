<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../public/css/style.css">
    <title>Connexion/Inscription - Jeux Olympique - Handball</title>
</head>

<body>

<div id="burgerContainer">
            <div class="flex-container">
                <div class="container" id="burgerMenu">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
            <div class="flex-container2">
                <div id="menu" class="hidden">
                    <a href="../index.php">ACCUEIL</a>
                    <a href="../public/calendrier.php">CALENDRIER</a>
                    <a href="../public/equipe.php">EQUIPES</a>
                    <a href="../public/billeterie.php">BILLETERIE</a>
                    <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                        <a href="../public/profil.php">VOTRE COMPTE</a>
                    <?php else : ?>
                        <a href="../public/login.php">CONNEXION/INSCRIPTION</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <!-- ---------------------------------------------------------FORMULAIRE INSCRIPTION---------------------------------------------- -->
    <?php
 require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
    $prenom = "";
    $nom = "";
    $email = "";
    $mdp = "";
    $validation = true;
    $insertion_reussie = false;
    ?>

<div class="groupeImgForm">
        <img class="fondInscription" src="../public/image/page connexion 1.png" alt="">

    <div class="formContainer" id="inscriptionForm">

        <h4>CREEZ VOTRE COMPTE</h4>

        <p class="paragrapheConnexion">INSCRIVEZ-VOUS SIMPLEMENT ET RAPIDEMENT</p>

        <form class="formLogin" action="../public/inscription.php" method="POST">

            <div class="groupeInputText">

                <input type="text" placeholder="PRÉNOM" name="prenom" id="prenom" value="<?= htmlspecialchars($prenom) ?>" required>

                <input type="text" placeholder="NOM" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>" required>

            </div>

            <input type="email" placeholder="EMAIL" name="email2" id="email2" value="<?= htmlspecialchars($email) ?>" required>

            <input type="password" placeholder=" 8 caractères, 1 maj, 1 min, 1 chiffre, 1 caractères spécial" name="mdp2" id="mdp2" minlength="8" value="<?= htmlspecialchars($mdp) ?>" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.+])[A-Za-z\d@$!%*?&.+]{8,}" required>
            
            <p id="transitionConnexion" onclick="goToConnexion()">VOUS AVEZ DÉJÀ UN COMPTE ? CONNECTEZ-VOUS ICI</p>

            <input type="submit" id="submitInscr" value="INSCRIPTION">
        </form>
    


        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST, 'mdp2', FILTER_DEFAULT);
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.+])[A-Za-z\d@$!%*?&.+]{8,}$/";

    if (!preg_match($password_pattern, $mdp)) {
        echo "<p class=\"styleEcho\">Le mot de passe ne respecte pas les critères.</p>";
    } else {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
        $pdo = MyDbConnection::getInstance(); 
        
        $stmtEmail = $pdo->prepare('SELECT COUNT(email) FROM UTILISATEUR WHERE email = ?');
        $stmtEmail->execute([$email]);
        $emailExists = $stmtEmail->fetchColumn();

        if ($emailExists) {
            echo '<p class="styleEcho">Cet e-mail est déjà existante.</p>';
        } else {
            $stmt = $pdo->prepare('INSERT INTO UTILISATEUR (nom, prenom, email, mdp, idRoles) VALUES (?, ?, ?, ?, ?)');
            $role_non_admin = 2; 
            $insertion_reussie = $stmt->execute([$nom, $prenom, $email, $mdp_hash, $role_non_admin]);

            if ($insertion_reussie) {
                echo '<p class="styleEcho">Inscription réussie !</p>';
            } else {
                echo '<p class="styleEcho">Erreur d\'insertion.</p>';
            }
        }
    }
}
?>

        </div>
    </div>
    <!---------------------------------------------------------------------------------------------------------FOOTER---------------------------------------------------- -->

    <footer>
        <div class="toutInformation">
        <a href="../index.php">
        <img class="logoJoFooter" src="../public/image/img logo JO footer.png" alt="Logo JO">
            </a>
            <div class="footerCatégorie">
                <p class="titreJo">Jeux olympique</p>
                <a class="footerInfo1" href="../public/calendrier.php">Calendrier</a>
                <a class="footerInfo2" href="#stade">Stade</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Handball</p>
                <a class="footerInfo1" href="#regle">Règle</a>
                <a class="footerInfo2" href="#histoire">Hsitoire</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Spéctateur</p>
                <a class="footerInfo1" href="../public/billeterie.php">Billeterie</a>
                <p class="footerInfo2">Une question ?</p>
            </div>
            <img class="picrogrammeFooter" src="../public/image/Pictogramme Handball.png" alt="">
        </div>
        <hr class="barreReseaux">
        <div class="resaux">
            <p class="suivre">Suivez nous sur : </p>
            <a href="https://www.facebook.com/Paris2024"><img class="logoSuivre" src="../public/image/footerFacebook.png" alt="Facebook"></a>
            <a href="https://x.com/Paris2024"><img class="logoSuivre" src="../public/image/Twitter" alt="Twitter"></a>
            <a href="https://www.instagram.com/paris2024/"><img class="logoSuivre" src="../public/image/Instagram" alt="Instagram"></a>
            <a href="https://www.youtube.com/channel/UCg4W1uf-i5X1nVaeWJsKuyA/videos"><img class="logoSuivre" src="../public/image/Youtube" alt="Youtube"></a>
            <a href="https://www.tiktok.com/@paris2024officiel?is_copy_url=1&is_from_webapp=v1"><img class="logoSuivre" src="../public/image/Tiktok" alt="Tiktok"></a>
            <a href="https://www.linkedin.com/company/paris-2024-olympic-and-paralympic-games-bid/"><img class="logoSuivre" src="../public/image/Linkedin" alt="Linkedin"></a>
            <a href="https://www.threads.net/@paris2024"><img class="logoSuivre" src="../public/image/Threads" alt="Threads"></a>
        </div>
        <hr class="barreReseaux">

        <div class="copyright">
            <p class="confidentialite">Politique des cookies</p>
            <p class="confidentialite">Politique de confidentialité</p>
            <p class="confidentialite">Conditions d'utilisation</p>
            <p class="confidentialite">Ethan Delannoy. Tous droits réservés</p>
        </div>

    </footer>




    <script src="../public/js/script.js"></script>
</body>

</html>
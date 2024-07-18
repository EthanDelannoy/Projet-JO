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
    <!-- ---------------------------------------------------------FORMULAIRE CONNEXION---------------------------------------------- -->
    <?php
    $email = "";
    $mdp = "";
    $validation = true;
    require_once __DIR__ . '/../dbConnect/MyDbConnection.php';
    ?>

    <div class="groupeImgForm">
        <img class="fondConnexion" src="../public/image/page connexion 1.png" alt="">

        <div class="formContainer" id="connexionForm">

            <h4>CONNECTEZ-VOUS</h4>

            <div class="groupeLogoConnexion">

                <div class="logoConnexion"><img class="imgLogoConnexion" src="../public/image/facebook 1.png" alt="Facebook"></div>
                <div class="logoConnexion"><img class="imgLogoConnexion" src="../public/image/logo_google-removebg-preview 1.png" alt="Google"></div>
                <div class="logoConnexion"><img class="imgLogoConnexion" src="../public/image/logo apple 1.png" alt="Apple"></div>

            </div>

            <p class="paragrapheConnexion">CONNECTEZ-VOUS AVEC VOTRE E-MAIL</p>

            <form class="formLogin" action="../public/login.php" method="POST">

                <input type="email" placeholder="EMAIL" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

                <input type="password" placeholder="MOT DE PASSE" name="mdp" id="mdp" minlength="8" value="<?= htmlspecialchars($mdp) ?>" required>

                <p id="transitionInscription" onclick="goToInscription()">PAS ENCORE DE COMPTE ? CREEZ VOTRE COMPTE ICI</p>

                <input type="submit" id="submitLogin" value="CONNEXION">

            </form>


            <?php

//----------------------------------------------------------VERIFICATION EMAIL--------------------------------------------------

            if (isset($_POST['email'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                // Verifier si l'email est valide

                if (!$email) {
                    echo "<p class=\"styleEcho\">L'adresse email non valide</p>";
                    $validation = false;
                }
            }
//----------------------------------------------------------VERIFICATION MDP--------------------------------------------------

            $longueur = 8;

            if (isset($_POST['mdp'])) {
                $mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);

                if (strlen($mdp) < $longueur) {
                    echo "<p class=\"styleEcho\">Votre mot de passe est trop court ! Veuillez avoir 8 caractères minimum</p>";
                    $validation = false;
                }
            }
 //----------------------------------------------------------CREATION DE SESSION--------------------------------------------------
 if ($validation && $email && $mdp) {
    $pdo = MyDbConnection::getInstance();

    $stmt = $pdo->prepare('SELECT idUtilisateur, email, mdp FROM UTILISATEUR WHERE email = ?');
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        if (password_verify($mdp, $utilisateur['mdp'])) {
            session_start();

            $_SESSION['idUtilisateur'] = $utilisateur['idUtilisateur'];
            $_SESSION['email'] = $utilisateur['email'];

            echo '<p class="styleEcho">Vous êtes bien connecté. Vous allez être redirigé vers la page d\'accueil dans 2 secondes...</p>';
            header("refresh:2;url=../index.php");
            exit();
        } else {
            echo '<p class="styleEcho">Identifiant ou mot de passe incorrect.</p>';
        }
    } else {
        echo '<p class="styleEcho">Identifiant ou mot de passe incorrect.';
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
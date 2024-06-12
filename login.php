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

    <link rel="stylesheet" href="./public/css/style.css">
    <title>Connexion/Inscription - Jeux Olympique - Handball</title>
</head>

<body>
    <!-- ---------------------------------------------------------FORMULAIRE CONNEXION---------------------------------------------- -->
    <?php
    $email = "";
    $mdp = "";
    $validation = true;
    ?>

    <div class="groupeImgForm">
        <img class="fondConnexion" src="./public/css/image/page connexion 1.png" alt="">

        <div class="formContainer" id="connexionForm">

            <h4>CONNECTEZ-VOUS</h4>

            <div class="groupeLogoConnexion">

                <div class="logoConnexion"><img class="imgLogoConnexion" src="./public/css/image/facebook 1.png" alt="Facebook"></div>
                <div class="logoConnexion"><img class="imgLogoConnexion" src="./public/css/image/logo_google-removebg-preview 1.png" alt="Google"></div>
                <div class="logoConnexion"><img class="imgLogoConnexion" src="./public/css/image/logo apple 1.png" alt="Apple"></div>

            </div>

            <p class="paragrapheConnexion">CONNECTEZ-VOUS AVEC VOTRE E-MAIL</p>

            <form action="login.php" method="POST">

                <input type="email" placeholder="EMAIL" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>

                <input type="password" placeholder="MOT DE PASSE" name="mdp" id="mdp" minlength="8" value="<?= htmlspecialchars($mdp) ?>" required>

                <p class="paragrapheConnexion">PAS ENCORE DE COMPTE ? CREEZ VOTRE COMPTE <span id="transitionInscription">ICI</span></p>

                <input type="submit" value="CONNEXION">

            </form>


            <?php

//----------------------------------------------------------VERIFICATION EMAIL--------------------------------------------------

            if (isset($_POST['email'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

                // Verifier si l'email est valide

                if (!$email) {
                    echo "<p class=\"erreurPhp\">L'adresse email non valide</p>";
                    $validation = false;
                }
            }
//----------------------------------------------------------VERIFICATION MDP--------------------------------------------------

            $longueur = 8;

            if (isset($_POST['mdp'])) {
                $mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);

                if (strlen($mdp) < $longueur) {
                    echo "<p class=\"erreurPhp\">Votre mot de passe est trop court ! Veuillez avoir 8 caractères minimum</p>";
                    $validation = false;
                }
            }
 //----------------------------------------------------------CREATION DE SESSION--------------------------------------------------
            if ($validation && $email && $mdp) {
                session_start();

                $_SESSION['mail'] = $email;

                if (isset($_SESSION['mail'])) {
                    echo "<p class=\"erreurPhp\">Vous êtes connecté, vous allez être redirigé vers la page d'accueil dans 3 secondes...</p>";
                    header("refresh:3;url=index.php");
                    exit();
                }

                unset($_SESSION['mail']);

                
                $_SESSION = array();

                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(
                        session_name(),
                        '',
                        time() - 42000,
                        $params['path'],
                        $params["domain"],
                        $params['secure'],
                        $params["httponly"]
                    );
                }
                session_destroy();
            }

            ?>
        </div>
    </div>

    <!-- ---------------------------------------------------------FORMULAIRE INSCRIPTION---------------------------------------------- -->
    <?php
    $prenom = "";
    $nom = "";
    $email = "";
    $mdp = "";
    $validation = true;
    ?>


    <div class="formContainer" id="inscriptionForm">

        <h4>CREEZ VOTRE COMPTE</h4>

        <p class="paragrapheConnexion">INSCRIVEZ-VOUS SIMPLEMENT ET RAPIDEMENT</p>

        <form action="login.php" method="POST">

            <div class="groupeInputText">

                <input type="text" placeholder="PRÉNOM" name="prenom" id="prenom" value="<?= htmlspecialchars($prenom) ?>" required>

                <input type="text" placeholder="NOM" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>" required>

            </div>

            <input type="email" placeholder="EMAIL" name="email2" id="email2" value="<?= htmlspecialchars($email) ?>" required>

            <input type="password" placeholder="MOT DE PASSE" name="mdp2" id="mdp2" minlength="8" value="<?= htmlspecialchars($mdp) ?>" required>

            <p class="paragrapheConnexion">VOUS AVEZ DÉJÀ UN COMPTE ? CONNECTEZ VOUS <span id="transitionConnexion">ICI</span></p>

            <input type="submit" value="INSCRIPTION">
        </form>




        <?php

        //------------------------------------------------------VERFIFICATION PRÉNOM--------------------------------------------------

        if (isset($_POST['prenom'])) {
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (!ctype_alpha($prenom)) {
                echo "<p class=\"erreurPhp\">Le prénom n'est pas valide</p>";
                $validation = false;
            }
        }

        //----------------------------------------------------------VERIFICATION NOM--------------------------------------------------

        if (isset($_POST['nom'])) {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (!ctype_alpha($nom)) {
                echo "<p class=\"erreurPhp\">Le nom n'est pas valide</p>";
                $validation = false;
            }
        }

        //----------------------------------------------------------VERIFICATION EMAIL--------------------------------------------------

        if (isset($_POST['email2'])) {
            $email = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);

            // Verifier si l'email est valide

            if (!$email) {
                echo "<p class=\"erreurPhp\">L'adresse email non valide</p>";
                $validation = false;
            }
        }

        //----------------------------------------------------------VERIFICATION MDP--------------------------------------------------

        $longueur = 8;

        if (isset($_POST['mdp2'])) {
            $mdp = filter_input(INPUT_POST, 'mdp2', FILTER_DEFAULT);

            if (strlen($mdp) < $longueur) {
                echo "<p class=\"erreurPhp\">Votre mot de passe est trop court ! Veuillez avoir 8 caractères minimum</p>";
                $validation = false;
            }
        }

        if ($validation && $prenom && $nom && $email && $mdp) {
            echo "<p class=\"erreurPhp\">Inscription réussie !</p>";
            echo "<p class=\"erreurPhp\">Vous êtes : " . $nom . " " . $prenom . "</p>";
            echo "<p class=\"erreurPhp\">Votre email : " . $email . "</p>";
        }

        ?>
    </div>
    <!---------------------------------------------------------------------------------------------------------FOOTER---------------------------------------------------- -->

    <footer>
        <div class="toutInformation">
            <img class="logoJoFooter" src="./public/css/image/img logo JO footer.png" alt="Logo JO">
            <div class="footerCatégorie">
                <p class="titreJo">Jeux olympique</p>
                <p class="footerInfo1">Calendrier</p>
                <p class="footerInfo2">Stade</p>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Handball</p>
                <p class="footerInfo1">Règle</p>
                <p class="footerInfo2">Hsitoire</p>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Spéctateur</p>
                <p class="footerInfo1">Billeterie</p>
                <p class="footerInfo2">Une question ?</p>
            </div>
            <img class="picrogrammeFooter" src="./public/css/image/Pictogramme Handball.png" alt="">
        </div>
        <hr class="barreReseaux">
        <div class="resaux">
            <p class="suivre">Suivez nous sur : </p>
            <img class="logoSuivre" src="./public/css/image/footerFacebook.png" alt="Facebook">
            <img class="logoSuivre" src="../public/css/image/Twitter" alt="Twitter">
            <img class="logoSuivre" src="../public/css/image/Instagram" alt="Instagram">
            <img class="logoSuivre" src="../public/css/image/Youtube" alt="Youtube">
            <img class="logoSuivre" src="./public/css/image/Tiktok" alt="Tiktok">
            <img class="logoSuivre" src="./public/css/image/Linkedin" alt="Linkedin">
            <img class="logoSuivre" src="./public/css/image/Threads" alt="Threads">
        </div>
        <hr class="barreReseaux">

        <div class="copyright">
            <p class="confidentialite">Politique des cookies</p>
            <p class="confidentialite">Politique de confidentialité</p>
            <p class="confidentialite">Conditions d'utilisation</p>
            <p class="confidentialite">Ethan Delannoy. Tous droits réservés</p>
        </div>

    </footer>




    <script src="./public/css/js/script.js"></script>
</body>

</html>
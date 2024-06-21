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
    <!-- ---------------------------------------------------------FORMULAIRE INSCRIPTION---------------------------------------------- -->
    <?php
    require "dbConnect.php";
    $prenom = "";
    $nom = "";
    $email = "";
    $mdp = "";
    $validation = true;
    $insertion_reussie = false;
    ?>

<div class="groupeImgForm">
        <img class="fondInscription" src="./public/css/image/page connexion 1.png" alt="">

    <div class="formContainer" id="inscriptionForm">

        <h4>CREEZ VOTRE COMPTE</h4>

        <p class="paragrapheConnexion">INSCRIVEZ-VOUS SIMPLEMENT ET RAPIDEMENT</p>

        <form class="formLogin" action="inscription.php" method="POST">

            <div class="groupeInputText">

                <input type="text" placeholder="PRÉNOM" name="prenom" id="prenom" value="<?= htmlspecialchars($prenom) ?>" required>

                <input type="text" placeholder="NOM" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>" required>

            </div>

            <input type="email" placeholder="EMAIL" name="email2" id="email2" value="<?= htmlspecialchars($email) ?>" required>

            <input type="password" placeholder="MOT DE PASSE" name="mdp2" id="mdp2" minlength="8" value="<?= htmlspecialchars($mdp) ?>" required>

            <p class="paragrapheConnexion">VOUS AVEZ DÉJÀ UN COMPTE ? CONNECTEZ VOUS <span id="transitionConnexion">ICI</span></p>

            <input type="submit" id="submitInscr" value="INSCRIPTION">
        </form>
    


        <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['prenom'])) {
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!ctype_alpha($prenom)) {
            $validation = false;
            echo "<p class=\"erreurPhp\">Le prénom n'est pas valide</p>";
        }
    }

    if (isset($_POST['nom'])) {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!ctype_alpha($nom)) {
            $validation = false;
            echo "<p class=\"erreurPhp\">Le nom n'est pas valide</p>";
        }
    }

    if (isset($_POST['email2'])) {
        $email = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);

        if (!$email) {
            $validation = false;
            echo "<p class=\"erreurPhp\">L'adresse email non valide</p>";
        }
    }

    $longueur = 8;
    if (isset($_POST['mdp2'])) {
        $mdp = filter_input(INPUT_POST, 'mdp2', FILTER_DEFAULT);

        if (strlen($mdp) < $longueur) {
            $validation = false;
            echo "<p class=\"erreurPhp\">Votre mot de passe est trop court ! Veuillez avoir 8 caractères minimum</p>";
        }
    }


    if ($validation) {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    
        $pdo = getPDOConnexion();
    
        
        $stmt = $pdo->prepare('INSERT INTO UTILISATEUR (nom, prenom, email, mdp, idRoles) VALUES (?, ?, ?, ?, ?)');
        $role_non_admin = 2; 
        $insertion_reussie = $stmt->execute([$nom, $prenom, $email, $mdp_hash, $role_non_admin]);
    
        if ($insertion_reussie) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur d'insertion.";
        }
    }
}

        ?>
        </div>
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
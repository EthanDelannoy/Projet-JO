<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <!------------------------------------------------------------------------------------- Header ----------------------------------------------------------------------------->
    <header>
        <!-- Img de fond -->

        <?= $image ?>

        <!-- Barre de nav -->
        <nav>
            <div class="GroupeCalenEqui">
                <a id="navCalendrier" href="./calendrier.php">CALENDRIER</a>
                <a id="navEquipes" href="./equipe.php">EQUIPES</a>
            </div>
            <a href="./index.php" class="logoJo-link">
                <img id="logoJo" src="./public/css/image/Logo JO.png" alt="Logo JO">
            </a>
            <div class="GroupeBillConnex">
                <a id="navBilleterie" href="./billeterie.php">BILLETERIE</a>
                <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                    <a id="navProfil" href="profil.php">VOTRE COMPTE</a></li> 
                <?php else : ?>
                    <a id="navConnexion" href="./login.php">CONNEXION/INSCRIPTION</a>
                <?php endif; ?>
                
            </div>
        </nav>
        <!-- Titre  -->
        <h1><?= $titre ?></h1>
        
    </header>

    <?= $content ?>

    <!---------------------------------------------------------------------------------------------------------FOOTER---------------------------------------------------- -->

    <footer>
        <div class="toutInformation">
        <a href="./index.php">
        <img class="logoJoFooter" src="./public/css/image/img logo JO footer.png" alt="Logo JO">
            </a>
            <div class="footerCatégorie">
                <p class="titreJo">Jeux olympique</p>
                <a class="footerInfo1" href="./calendrier.php">Calendrier</a>
                <a class="footerInfo2" href="#stade">Stade</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Handball</p>
                <a class="footerInfo1" href="#regle">Règle</a>
                <a class="footerInfo2" href="#histoire">Hsitoire</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Spéctateur</p>
                <a class="footerInfo1" href="./billeterie.php">Billeterie</a>
                <p class="footerInfo2">Une question ?</p>
            </div>
            <img class="picrogrammeFooter" src="./public/css/image/Pictogramme Handball.png" alt="">
        </div>
        <hr class="barreReseaux">
        <div class="resaux">
            <p class="suivre">Suivez nous sur : </p>
            <a href="https://www.facebook.com/Paris2024"><img class="logoSuivre" src="./public/css/image/footerFacebook.png" alt="Facebook"></a>
            <a href="https://x.com/Paris2024"><img class="logoSuivre" src="../public/css/image/Twitter" alt="Twitter"></a>
            <a href="https://www.instagram.com/paris2024/"><img class="logoSuivre" src="../public/css/image/Instagram" alt="Instagram"></a>
            <a href="https://www.youtube.com/channel/UCg4W1uf-i5X1nVaeWJsKuyA/videos"><img class="logoSuivre" src="../public/css/image/Youtube" alt="Youtube"></a>
            <a href="https://www.tiktok.com/@paris2024officiel?is_copy_url=1&is_from_webapp=v1"><img class="logoSuivre" src="./public/css/image/Tiktok" alt="Tiktok"></a>
            <a href="https://www.linkedin.com/company/paris-2024-olympic-and-paralympic-games-bid/"><img class="logoSuivre" src="./public/css/image/Linkedin" alt="Linkedin"></a>
            <a href="https://www.threads.net/@paris2024"><img class="logoSuivre" src="./public/css/image/Threads" alt="Threads"></a>
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
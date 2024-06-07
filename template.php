<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Accueil - Jeux Olympique - Handball</title>
</head>
<body>
     <!------------------------------------------------------------------------------------- Header ----------------------------------------------------------------------------->
     <header>
        <!-- Img de fond -->
        
            <img class="fondAccueil" src="./public/css/image/fond hand 1.png" alt="Handball">
        

        <!-- Barre de nav -->

        <!-- TABLEAU ASSOCIATIF ?????? -->
        <nav>
            <div class="GroupeCalenEqui">
                <a id="navCalendrier" href="#">CALENDRIER</a>
                <a id="navEquipes" href="#">EQUIPES</a>
            </div>
            <img id="logoJo" src="./public/css/image/Logo JO.png" alt="Logo JO">
            <div class="GroupeBillConnex">
                <a id="navBilleterie" href="#">BILLETERIE</a>
                <a id="navConnexion" href="#">CONNEXION/INSCRIPTION</a>
            </div>
        </nav>
        <!-- Titre  -->
        <h1>HANDBALL</h1>
    </header>

    <?= $content ?>

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


</body>
</html>
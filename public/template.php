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
    <link rel="stylesheet" href="../public/css/style.css">
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
            <a href="../index.php" class="logoJo-link">
                <img id="logoJo" src="../public/image/Logo JO.png" alt="Logo JO">
            </a>
            <div class="GroupeBillConnex">
                <a id="navBilleterie" href="./billeterie.php">BILLETERIE</a>
                <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                    <a id="navProfil" href="./profil.php">VOTRE COMPTE</a></li>
                <?php else : ?>
                    <a id="navConnexion" href="../public/login.php">CONNEXION/INSCRIPTION</a>
                <?php endif; ?>

            </div>
        </nav>

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
                    <a href="./calendrier.php">CALENDRIER</a>
                    <a href="./equipe.php">EQUIPES</a>
                    <a href="./billeterie.php">BILLETERIE</a>
                    <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                        <a href="./profil.php">VOTRE COMPTE</a>
                    <?php else : ?>
                        <a href="./login.php">CONNEXION/INSCRIPTION</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Titre  -->
        <h1><?= $titre ?></h1>

    </header>

    <?= $content ?>

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
            <p id="btnCookie" class="confidentialite">Politique des cookies</p>
            <a class="confidentialite" href="../public/cgv.php">Conditions générales de Vente</a>
            <a class="confidentialite2" href="../public/cgu.php">Conditions générales d'utilisation</a>
            <p class="confidentialite">Ethan Delannoy. Tous droits réservés</p>
        </div>
        <div class="groupeModal">
        <dialog id="cookies">
    <span class="titreCookie"> 🍪 Politique des cookies 🍪</span>
    <div class="contenuCookie">
        <p class="paragrapheCookie">
            Ce site web utilise des cookies pour améliorer votre expérience de navigation et analyser l'utilisation du site.
            En continuant à naviguer sur ce site, vous acceptez notre utilisation des cookies conformément à cette politique de cookies.
        </p>
        
        <span class="sousTitreCookie">Qu'est-ce qu'un cookie?</span>
        <p class="paragrapheCookie">
            Les cookies sont de petits fichiers texte qui sont stockés sur votre appareil (ordinateur, tablette, smartphone, etc.) lorsque vous visitez un site web.
            Ils sont couramment utilisés pour faire fonctionner les sites web, ou pour les rendre plus efficaces, ainsi que pour fournir des informations aux propriétaires du site.
        </p>
        
        <span class="sousTitreCookie">Types de cookies utilisés</span>
        <p class="paragrapheCookie">Nous utilisons les types de cookies suivants sur notre site :</p>
        <ul>
            <li><p class="paragrapheCookie">Cookies nécessaires :</span> Ces cookies sont indispensables pour vous permettre de naviguer sur le site et d'utiliser ses fonctionnalités.</li>
            <li><p class="paragrapheCookie">Cookies de performance :</span> Ces cookies collectent des informations sur la façon dont les visiteurs utilisent le site, comme les pages les plus visitées.</li>
            <li><p class="paragrapheCookie">Cookies de fonctionnalité </span> Ces cookies permettent au site de se souvenir des choix que vous faites (comme votre langue ou région) et de fournir des fonctionnalités améliorées.</li>
            <li><p class="paragrapheCookie">Cookies de ciblage :</span> Ces cookies sont utilisés pour vous fournir des annonces publicitaires plus pertinentes en fonction de vos centres d'intérêt.</li>
        </ul>
        
        <span class="sousTitreCookie">Gestion des cookies</span>
        <p class="paragrapheCookie">
            Vous pouvez contrôler et/ou supprimer les cookies comme vous le souhaitez. Pour plus d'informations, consultez <a href="https://www.aboutcookies.org" target="_blank">aboutcookies.org</a>.
            Vous pouvez supprimer tous les cookies déjà stockés sur votre appareil et configurer la plupart des navigateurs pour empêcher leur enregistrement.
            Toutefois, si vous choisissez de supprimer ou de ne pas accepter les cookies, certaines fonctionnalités de notre site peuvent ne pas fonctionner correctement.
        </p>
        
        <span class="sousTitreCookie">Modifications de la politique de cookies</span>
        <p class="paragrapheCookie">
            Nous pouvons mettre à jour cette politique de cookies de temps en temps afin de refléter, par exemple, des modifications apportées à nos cookies pratiques ou pour d'autres raisons opérationnelles, légales ou réglementaires.
        </p>
    </div>
    <button id="accepteCookie">Accepter</button>
    <button id="refuseCookie">Refuser</button>
        </dialog>
    </footer>

    <script src="../public/js/script.js"></script>
</body>

</html>
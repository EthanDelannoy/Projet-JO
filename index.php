<!DOCTYPE html>
<html lang="en">
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
    <title>Accueil - Jeux Olympique - Handball</title>
</head>
<body>
    
<header>
        <!-- Img de fond -->

        <img class="fondAccueil" src="./public/image/fond hand 1.png" alt="Handball">

        <!-- Barre de nav -->
        <nav>
            <div class="GroupeCalenEqui">
                <a id="navCalendrier" href="./public/calendrier.php">CALENDRIER</a>
                <a id="navEquipes" href="./public/equipe.php">EQUIPES</a>
            </div>
            <a href="./index.php" class="logoJo-link">
                <img id="logoJo" src="./public/image/Logo JO.png" alt="Logo JO">
            </a>
            <div class="GroupeBillConnex">
                <a id="navBilleterie" href="./public/billeterie.php">BILLETERIE</a>
                <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                    <a id="navProfil" href="./public/profil.php">VOTRE COMPTE</a></li>
                <?php else : ?>
                    <a id="navConnexion" href="./public/login.php">CONNEXION/INSCRIPTION</a>
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
                    <a href="./index.php">ACCUEIL</a>
                    <a href="./public/calendrier.php">CALENDRIER</a>
                    <a href="./public/equipe.php">EQUIPES</a>
                    <a href="./public/billeterie.php">BILLETERIE</a>
                    <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                        <a href="./public/profil.php">VOTRE COMPTE</a>
                    <?php else : ?>
                        <a href="./public/login.php">CONNEXION/INSCRIPTION</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Titre  -->
        <h1>HANDBALL : Tout ce que vous devez savoir pour les Jeux Olympiques se trouve ici !</h1>

    </header>


 <!------------------------------------------------------------------------------------- SECTION REGLE ------------------------------------------------------------------------>
 <section id="regle">

     <div class="groupeHisoireFederation">
         <p class="histoire1">Le handball trouve ses sources à la fin du 19e siècle, dans les pays
             scandinaves ainsi qu’en Allemagne, où à cette époque, le handball sur
             gazon devient également un sport reconnu. En 1910, c’est G. Wallström qui
             introduit le sport en Suède. Les deux versions du sport coexistent jusqu’en
             1966, avant que la version en salle ne soit préférée à son homologue sur
             gazon.</p>

         <div class="federation">
             <h3>En collaboration avec</h3>
             <hr class="barreCollaboration">
             <img class="imgFederation" src="./public/image/fédération intérnational Hand 1.png" alt="Fédération intérnation de Handball">
             <small class="petitFederation">Fédération intérnation de Handball</small>
         </div>
     </div>

     <img class="mascotteHand" src="./public/image/mascotte_handball-removebg-preview 1.png" alt="Mascotte JO Hand">

     <div class="groupeBrefContenu">

         <div class="groupeBrefRegle">

             <h2>EN BREF</h2>

             <p class="paragrapheRegle">La version du handball aujourd’hui se joue sur un terrain de 40m x 20m en
                 salle qui voit s’affronter deux équipes de sept joueurs, qui peuvent dribbler
                 le ballon à la main au maximum tous les trois appuis, et garder le ballon en
                 main au maximum pendant trois secondes. L’équipe qui, au terme des
                 deux mi-temps de 30 minutes, a marqué le plus de buts, l’emporte. Les
                 tournois olympiques féminins et masculins sont composés de douze
                 équipes.</p>

             <div class="imgSourceDika">
                 <img class="imgDikaMem" src="./public/image/Photo.png" alt="Match france/espagne JO 2020">
                 <small class="sourceImgDika">France/Espagne, JO Tokyo 2020, Dika Mem joueur de l’Equipe de France.</small>
             </div>
             <div class="ParagrapheRegleSuite">
                 <p class="regleSuite">Le handball est un sport de contact qui autorise les contacts entre joueurs
                     offensifs et défensifs ; en résulte un jeu très physique et éprouvant pour les
                     joueurs. Les joueurs sont même encouragés à jouer de manière offensive,
                     puisque le jeu considéré « passif » est sanctionné. L’endurance et la force
                     sont donc des qualités primordiales pour un joueur de handball,
                     cependant ce sport est également une affaire de tactique, de travail
                     d’équipe et de polyvalence, tous les joueurs alternant les phases d’attaque
                     puis de défense.<br></p>

                 <p class="regleSuite">Toutefois, dans la pratique du handball à haut-niveau, certains joueurs
                     s’affirment comme des spécialistes de la défense et l’on peut donc
                     observer des changements de joueurs (très) rapides à chaque phase de jeu
                     afin de renforcer la défense et reposer certains joueurs en vue de la phase
                     offensive.<br></p>

                 <p class="regleSuite">Le handball est également un sport spectaculaire et technique puisque
                     pour pouvoir marquer, les joueurs doivent tirer en dehors de la zone du
                     gardien, un demi-cercle de 6m de rayon, et sont pour cela en extension
                     dans les airs pour la majorité de leurs tirs et donnent ainsi l’impression de
                     s’envoler. Le tir est également impressionnant de technicité, tant les
                     joueurs savent manipuler le ballon et parfois donner à la balle des
                     trajectoires incroyables. C’est en particulier vrai pour les joueurs évoluant
                     en position d’ailier, dans les coins du terrain, qui ont un angle de tir très
                     restreint et présentent donc des qualités de poignet exceptionnelles.</p>
             </div>

             <div class="imgSourceEstelle">
                 <img class="imgEstelle" src="./public/image/Image.png" alt="Match france/suède JO 2020">
                 <small class="sourceImgEstelle">Demi-finale France/Suède, Jeux Olympiques de Tokyo 2020. Estelle Nze Minko, capitaine de l’Equipe de France</small>
             </div>

             <h2>HISTOIRE OLYMPIQUE</h2>

             <div class="ParagrapheHistoireSuite" id="histoire">
                 <p class="histoireSuite">Aux Jeux Olympiques, le handball est introduit pour la première fois aux
                     Jeux de Berlin en 1936, dans sa version sur gazon, et est ensuite disputé en
                     tant que sport de démonstration aux Jeux de 1952 à Helsinki. Il réapparait
                     au programme olympique vingt ans plus tard aux Jeux de Munich en 1972,
                     dans sa formule en salle cette fois-ci.<br></p>

                 <p class="histoireSuite">L’épreuve féminine arrive au programme olympique quatre ans plus tard, à
                     Montréal. Le palmarès olympique du handball est largement dominé par
                     l’Europe. Tous les titres olympiques ont été remportés par une nation
                     européenne, à l’exception des deux victoires de la Corée du Sud à Séoul en
                     1988, puis à Barcelone en 1992 dans le tournoi féminin.</p>
             </div>

         </div>
         <!-------------------------------------------------------------------- SECTION CONTENU ASSOCIE ---------------------------------------------------------------------->
         <div class="contenuAssocie">
             <h3>Contenu associé</h3>
             <hr class="barreContenu">
             <a class="contenu1" href="https://www.lequipe.fr/Handball/">
                 <img class="imgContenue" src="./public/image/hand actu 1.png" alt="Actualités">
                 <div class="sousContenu1">
                     <p class="info">Actualités</p>
                     <p class="paragrapheAcutalites">Actualites : Il s'en passe des choses dans le Handball</p>
                 </div>
             </a>
             <hr class="barreContenu">
             <a class="contenu2" href="./public/billeterie.php">
                 <img class="imgContenue" src="./public/image/billet jo 1.png" alt="Billet">
                 <div class="sousContenu2">
                     <p class="infoPlace">Place</p>
                     <p class="paragraphePlace">Jo de Paris 2024 : Comment acheter ses places pour les JO d'Handball</p>
                 </div>

             </a>
             <hr class="barreContenu">
             <a class="contenu3" href="./public/calendrier.php">
                 <img class="imgContenue" src="./public/image/hand match 1.png" alt="Billet">
                 <div class="sousContenu3">
                     <p class="infoCalendrier">Calendrier Handball</p>
                     <p class="paragrapheCalendrier">Handball : Découvrez ici tout les match de Handball des JO
                     </p>
                 </div>

             </a>
             <hr class="barreContenu">
             <a class="contenu4" href="./public/equipe.php">
                 <img class="imgContenue" src="./public/image/equipe-france hand 1.png" alt="Billet">
                 <div class="sousContenu4">
                     <p class="infoEquipe">Handball</p>
                     <p class="paragrapheEquipe">Equipe : Tout savoir sur votre équipe d'Handball Française
                     </p>
                 </div>

             </a>

             <img class="LogoJoContenu" src="./public/image/img logo JO.png" alt="Logo Jo">
         </div>
     </div>
 </section>


 <img class="imgTourEiffel" src="./public/image/img tour eiffel.png" alt="Tour Eiffel JO">

 <!---------------------------------------------------------------------------------------SECTION MATCH A VENIR----------------------------------------------------------->
 <section class="match">

     <h3 class="titreMatch">Match à venir</h3>
     <hr class="BarreMatch">
     <div class="ProchainMatch">
         <p class="matchHomme">Hommes : Samedi 27 juillet 09h00 : Espagne - Slovénie à l'Arena Paris Sud</p>
         <p class="matchFemme">Femmes : Jeudi 25 juillet 09h00 Slovénie - Danemark à l'Arena Paris Sud</p>
     </div>

 </section>
 <!---------------------------------------------------------------------------------------------- SECTION STADES------------------------------------------------------------->
 <section class="stade" id="stade">
     <h2>STADES</h2>
     <hr class="BarreStades">

     <div class="toutStade">
         <div class="ParisSud">
             <img class="imgStade" src="./public/image/arena-paris-sud 1.png" alt="Stade Arena Paris Sud">
             <div class="groupeInfo">
                 <p class="infoStade">Haltérophilie</p>
                 <p class="infoStade">Handball</p>
                 <p class="infoStade">Tennis de table</p>
                 <p class="infoStade">Voleyball</p>
             </div>
             <span class="nomStade">Arena Paris Sud</span>
         </div>

         <div class="PierreMauroy">
             <img class="imgStade" src="./public/image/stade-pierre-mauroy 1.png" alt="Stade Pierre Mauroy">
             <div class="groupeInfo">
                 <p class="infoStade">Basketball</p>
                 <p class="infoStade">Handball</p>
             </div>
             <span class="nomStade">Stade Pierre Mauroy</span>
         </div>

     </div>
 </section>
 <!-- --------------------------------------------------------------------------------------------------SECTION ARCHIVES ----------------------------------------------- -->

 <section class="archives">

     <h2>EXTRAIT DES ARCHIVES OLYMPIQUES</h2>
     <hr class="BarreArchives">

     <div class="GroupePhoto">
         <div class="groupeInfoPhoto">
             <img class="imgArchive" src="./public/image/img.png" alt="Roc/Fra JO 2020">
             <p class="infoHand">Handball</p>
             <span class="sourcePhoto">ROC v FRA - Finale (F) - Handball | Replay de Tokyo 2020</span>
         </div>
         <div class="groupeInfoPhoto">
             <img class="imgArchive" src="./public/image/hoo0xhp3azgxg78wb8ka.png" alt="Fra/Den JO 2020">
             <p class="infoHand">Handball</p>
             <span class="sourcePhoto">FRA v DEN - Finale (H) - Handball | Replay de Tokyo 2020</span>
         </div>
         <div class="groupeInfoPhoto">
             <img class="imgArchive" src="./public/image/f1ftbqz8p6pp8h5okczh.png" alt="Egy/Esp JO 2020">
             <p class="infoHand">Handball</p>
             <span class="sourcePhoto">EGY v ESP - Petite Finale (H) - Handball | Replay de Tokyo 2020</span>
         </div>

     </div>

 </section>
 <!------------------------------------------------------------------------------------------SECTION PARTENAIRES MONDIAUX------------------------------------------------->

 <section class="partenaire">
     <div class="titrePartenaire">
         <hr class="BarrePartenaire">
         <h2>PARTERNAIRES MONDIAUX</h2>
         <hr class="BarrePartenaire">
     </div>

     <div class="logoPartenaires">
         <img class="logo" src="./public/image/Ablnbev.png" alt="Ablnbev">
         <img class="logo" src="./public/image/Airbnb.png" alt="Airbnb">
         <img class="logo" src="./public/image/Alibaba.png" alt="Alibaba">
         <img class="logo" src="./public/image/Allianz.png" alt="Allianz">
         <img class="logo" src="./public/image/Atos.png" alt="Atos">
         <img class="logo" src="./public/image/Bridgestone.png" alt="Bridgestone">
         <img class="logo" src="./public/image/CocaCola.png" alt="CocaCola">
         <img class="logo" src="./public/image/Deloitte.png" alt="Deloitte">
         <img class="logo" src="./public/image/Intel.png" alt="Intel">
         <img class="logo" src="./public/image/Omega.png" alt="Omega">
         <img class="logo" src="./public/image/Panasonic.png" alt="Panasonic">
         <img class="logo" src="./public/image/P&G.png" alt="P&G">
         <img class="logo" src="./public/image/Samsung.png" alt="Samsung">
         <img class="logo" src="./public/image/Toyota.png" alt="Toyota">
         <img class="logo" src="./public/image/Visa.png" alt="Visa">
     </div>
 </section>

 <!---------------------------------------------------------------------------------------------------------FOOTER---------------------------------------------------- -->

 <footer>
        <div class="toutInformation">
            <a href="./index.php">
                <img class="logoJoFooter" src="./public/image/img logo JO footer.png" alt="Logo JO">
            </a>
            <div class="footerCatégorie">
                <p class="titreJo">Jeux olympique</p>
                <a class="footerInfo1" href="./public/calendrier.php">Calendrier</a>
                <a class="footerInfo2" href="#stade">Stade</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Handball</p>
                <a class="footerInfo1" href="#regle">Règle</a>
                <a class="footerInfo2" href="#histoire">Histoire</a>
            </div>
            <div class="footerCatégorie">
                <p class="titreJo">Spéctateur</p>
                <a class="footerInfo1" href="./public/billeterie.php">Billeterie</a>
                <p class="footerInfo2">Une question ?</p>
            </div>
            <img class="picrogrammeFooter" src="./public/image/Pictogramme Handball.png" alt="">
        </div>
        <hr class="barreReseaux">
        <div class="resaux">
            <p class="suivre">Suivez nous sur : </p>
            <a href="https://www.facebook.com/Paris2024"><img class="logoSuivre" src="./public/image/footerFacebook.png" alt="Facebook"></a>
            <a href="https://x.com/Paris2024"><img class="logoSuivre" src="./public/image/Twitter" alt="Twitter"></a>
            <a href="https://www.instagram.com/paris2024/"><img class="logoSuivre" src="./public/image/Instagram" alt="Instagram"></a>
            <a href="https://www.youtube.com/channel/UCg4W1uf-i5X1nVaeWJsKuyA/videos"><img class="logoSuivre" src="./public/image/Youtube" alt="Youtube"></a>
            <a href="https://www.tiktok.com/@paris2024officiel?is_copy_url=1&is_from_webapp=v1"><img class="logoSuivre" src="./public/image/Tiktok" alt="Tiktok"></a>
            <a href="https://www.linkedin.com/company/paris-2024-olympic-and-paralympic-games-bid/"><img class="logoSuivre" src="./public/image/Linkedin" alt="Linkedin"></a>
            <a href="https://www.threads.net/@paris2024"><img class="logoSuivre" src="./public/image/Threads" alt="Threads"></a>
        </div>
        <hr class="barreReseaux">

        <div class="copyright">
            <p id="btnCookie" class="confidentialite">Politique des cookies</p>
            <a class="confidentialite" href="./public/cgv.php">Conditions générales de Vente</a>
            <a class="confidentialite2" href="./public/cgu.php">Conditions générales d'utilisation</a>
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

    <script src="./public/js/script.js"></script>
    </body>
</html>
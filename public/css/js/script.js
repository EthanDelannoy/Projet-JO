// L'animation quand on clique sur le bouton "ici" du formulaire connexion pour accèdez au formulaire d'inscription
document.getElementById('transitionInscription').addEventListener('click', function() {
    let fondConnexion = document.querySelector('.fondConnexion');
    fondConnexion.classList.remove('moveLeft'); 
    fondConnexion.classList.toggle('moveRight');
    
    setTimeout(function() {
        let formInscription = document.querySelector('#inscriptionForm');
        formInscription.style.zIndex = "1"; 
    }, 500);
});

// L'animation quand on clique sur le bouton "ici" du formulaire d'inscription pour accèdez au formulaire de connexion
document.getElementById('transitionConnexion').addEventListener('click', function() {
    let fondConnexion = document.querySelector('.fondConnexion');
    fondConnexion.classList.remove('moveRight'); 
    fondConnexion.classList.toggle('moveLeft');
    
    setTimeout(function() {
        let formInscription = document.querySelector('#inscriptionForm');
        formInscription.style.zIndex = "-1"; 
    }, 100);
});

// Regex condition inscription
function validateForm() {
    let prenom = document.getElementById("prenom").value;
    let nom = document.getElementById("nom").value;
    let email = document.getElementById("email2").value;
    let mdp = document.getElementById("mdp2").value;


    let prenomRegex = /^[a-zA-ZÀ-ÿ\s\-]{2,50}$/;
    if (!prenomRegex.test(prenom)) {
        alert("Veuillez entrer un prénom valide.");
        return false;
    }


    let nomRegex = /^[a-zA-ZÀ-ÿ\s\-]{2,50}$/;
    if (!nomRegex.test(nom)) {
        alert("Veuillez entrer un nom valide.");
        return false;
    }


    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Veuillez entrer une adresse email valide.");
        return false;
    }

    if (mdp.length < 8) {
        alert("Le mot de passe doit contenir au moins 8 caractères.");
        return false;
    }

    return true;
}

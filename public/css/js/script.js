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


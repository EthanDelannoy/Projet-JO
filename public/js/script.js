const burgerContainer = document.getElementById('burgerContainer');
const menu = document.getElementById('menu');

burgerContainer.addEventListener('click', function() {
    burgerMenu.classList.toggle('change');
    menu.classList.toggle('show');
});


// Animation connexion
function goToInscription() {
    document.body.classList.add('slide-out-left');
    setTimeout(function() {
        window.location.href = 'inscription.php';
    }, 450);
}
// Animation Inscription
function goToConnexion() {
    document.body.classList.add('slide-out-right');
    setTimeout(function() {
        window.location.href = 'login.php';
    }, 450);
}

// Animation de scroll quand on clique sur la fleche
document.addEventListener("DOMContentLoaded", function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');

    scrollToTopBtn.addEventListener('click', function(event) {
        event.preventDefault(); 
        window.scrollTo({
            top: 0,
            behavior: 'smooth' 
        });
    });
});


// Page profil - le crayon pour modifier une donée
document.getElementById('paragraphePrenom').addEventListener('mouseenter', function() {
    let crayon = document.getElementById('crayonModifier');
    crayon.style.display = 'block';
});

document.getElementById('paragraphePrenom').addEventListener('mouseleave', function() {
    let crayon = document.getElementById('crayonModifier');
    crayon.style.display = 'none';
});

document.getElementById('paragrapheNom').addEventListener('mouseenter', function() {
    let crayon2 = document.getElementById('crayonModifier2');
    crayon2.style.display = 'block';
});

document.getElementById('paragrapheNom').addEventListener('mouseleave', function() {
    let crayon2 = document.getElementById('crayonModifier2');
    crayon2.style.display = 'none';
});

document.getElementById('paragrapheEmail').addEventListener('mouseenter', function() {
    let crayon3 = document.getElementById('crayonModifier3');
    crayon3.style.display = 'block';
});

document.getElementById('paragrapheEmail').addEventListener('mouseleave', function() {
    let crayon3 = document.getElementById('crayonModifier3');
    crayon3.style.display = 'none';
});



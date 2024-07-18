// Menu burger
const burgerContainer = document.getElementById('burgerContainer');
const menu = document.getElementById('menu');

burgerContainer.addEventListener('click', function() {
    burgerMenu.classList.toggle('change');
    menu.classList.toggle('show');
});


// Modal cookie
const ouvrirmodal = document.getElementById("btnCookie");
const accepteCookie = document.getElementById("accepteCookie");
const refuseCookie = document.getElementById("refuseCookie");

ouvrirmodal.addEventListener('click', () => {
    let modal = document.getElementById("cookies");
    modal.style.display ='block'
})

accepteCookie.addEventListener('click', () => {
    let modal = document.getElementById("cookies");
    modal.style.display = 'none'
})

refuseCookie.addEventListener('click', () => {
    let modal = document.getElementById("cookies");
    modal.style.display = 'none'
})

document.addEventListener('DOMContentLoaded', () => {
    if (!localStorage.getItem('cookiesModalShown')) {
        let modal = document.getElementById("cookies");
        modal.style.display = 'block';

        localStorage.setItem('cookiesModalShown', 'true');
    }
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

// Page profil - affiche le formuaire pour modifier une donée
document.getElementById('crayonModifier').addEventListener('click', function() {
    document.getElementById('groupeProfilEntier').style.display = 'none';
    document.getElementById('formChangementInfo').style.display = 'flex';
});

document.getElementById('crayonModifier2').addEventListener('click', function() {
    document.getElementById('groupeProfilEntier').style.display = 'none';
    document.getElementById('formChangementInfo').style.display = 'flex';
});

document.getElementById('crayonModifier3').addEventListener('click', function() {
    document.getElementById('groupeProfilEntier').style.display = 'none';
    document.getElementById('formChangementInfo').style.display = 'flex';
});


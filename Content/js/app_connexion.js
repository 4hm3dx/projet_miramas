const formConnexion = document.getElementById('formulaire_connexion');
const inpEmail = document.getElementById('mail_utilisateur_connexion');
const inpPass = document.getElementById('mdp_utilisateur_connexion');

const erMail = document.getElementById('span_mail_connexion');
const erMdp = document.getElementById('span_mdp_connexion');
erMail.style.color = 'red';
erMdp.style.color = 'red';

if (formConnexion){

function connexionMail(e) {
    if (inpEmail.value.length == 0) {
        e.preventDefault();
        erMail.innerHTML = "Email manquant";
        return false;
    }

    if (inpEmail.value.length < 5) {
        e.preventDefault();
        erMail.innerHTML = "Veuillez saisir un mail valide";
        return false;
    }

    if (!inpEmail.value.match(/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/)) {
        e.preventDefault();
        erMail.innerHTML = "Mail invalide";
        return false;
    }

    erMail.innerHTML = '';
    return true;
}

function connexionMdp(e) {
    if (inpPass.value.length == 0) {
        e.preventDefault();
        erMdp.innerHTML = "Mot de passe requis";
        return false;
    }

    if (inpPass.value.length < 8) {
        e.preventDefault();
        erMdp.innerHTML = "Veuillez saisir au moins 8 caractères";
        return false;
    }

    if (!inpPass.value.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
        e.preventDefault();
        erMdp.innerHTML = "Format de mot de passe incorrect";
        return false;
    }

    erMdp.innerHTML = '';
    return true;
}

formConnexion.addEventListener('submit', function (e) {

    // Appel de toutes les fonctions de validation
    const functionValides = [connexionMail(e), connexionMdp(e)];

    // Vérification si toutes les conditions sont valides
    const functionRespectees = functionValides.every(function (condition) {
        return condition === true;
    });

    // Si toutes les conditions sont respectées, la soumission du formulaire est autorisée
    if (functionRespectees) {
        return true;
    }

    // Sinon, on empêche la soumission du formulaire
    e.preventDefault();

});
}
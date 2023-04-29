const erreurNom = document.getElementById('nom_inscription_erreur');
const erreurPrenom = document.getElementById('prenom_inscription_erreur');
const erreurMail = document.getElementById('mail_inscription_erreur')
const erreurMdp = document.getElementById('password_inscription_erreur');
const confirmeMdp = document.getElementById('confirme_mdp_utilisateur');
const erreurConditions = document.getElementById('checkbox_condition_inscription_erreur');

const nom = document.getElementById('nom_utilisateur_inscription');
const prenom = document.getElementById('prenom_utilisateur_inscription');
const mail = document.getElementById('mail_utilisateur_inscription');
const mdp = document.getElementById('mdp_utilisateur_inscription');
const confirmMdp = document.getElementById('confirme_mdp_utilisateur_inscription');
const conditions = document.getElementById('condition_general');

const formulaire = document.getElementById('formulaire_inscription');

function estRempli() {
    if (nom.value === '' || prenom.value === '' || mail.value === '' || mdp.value === '' || confirmMdp.value === '' || !conditions.checked) {
        return false;
    }
    return true;
}

function valideNom(e) {
    if (nom.value.length == 0) {
        e.preventDefault();
        erreurNom.innerHTML = "Le nom est requis";
        return false;
    }

    if (nom.value.length < 2) {
        e.preventDefault();
        erreurNom.innerHTML = "Nom trop court";
        return false;
    }

    if (!nom.value.match(/^[A-Za-z'-]+$/)) {
        e.preventDefault();
        erreurNom.innerHTML = "Nom invalide";
        return false;
    }

    erreurNom.innerHTML = '';
    return true;

}

function validePrenom(e) {
    if (prenom.value.length == 0) {
        erreurPrenom.innerHTML = "Le prénom est requis";
        return false;
    }

    if (prenom.value.length < 2) {
        erreurPrenom.innerHTML = "Prénom trop court";
        return false;
    }

    if (!prenom.value.match(/^[A-Za-z'-]+$/)) {
        erreurPrenom.innerHTML = "Prenom invalide";
        return false;
    }

    erreurPrenom.innerHTML = '';
    return true;
}

function valideMail(e) {
    if (mail.value.length == 0) {
        erreurMail.innerHTML = "Email manquant";
        return false;
    }

    if (mail.value.length < 5) {
        erreurMail.innerHTML = "Veuillez saisir un mail valide";
        return false;
    }

    if (!mail.value.match(/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/)) {
        erreurMail.innerHTML = "Mail invalide";
        return false;
    }

    erreurMail.innerHTML = '';
    return true;
}

function valideMdp(e) {
    if (mdp.value.length == 0) {
        erreurMdp.innerHTML = "Mot de passe requis";
        return false;
    }

    if (mdp.value.length < 8) {
        erreurMdp.innerHTML = "Veuillez saisir au moins 8 caractères";
        return false;
    }

    if (!mdp.value.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
        erreurMdp.innerHTML = "e mot de passe doit contenir au moins une lettre majuscule et un chiffre";
        return false;
    }

    erreurMdp.innerHTML = '';
    return true;
}

function confirmationMdp(e) {

    if (confirmMdp.value !== mdp.value) {
        confirmeMdp.innerHTML = "Les mots de passe ne correspondent pas";
        e.preventDefault();
        return false;
    } else {
        confirmeMdp.innerHTML = "";
        return true;
    }
}

function valideConditions(e) {

    if (!conditions.checked) {
        erreurConditions.innerHTML = "Veuillez accepter les conditions générales";
        e.preventDefault();
        return false;
    } else {
        erreurConditions.innerHTML = "";
        return true;
    }
}

formulaire.addEventListener('submit', function (e) {

    // Appel de toutes les fonctions de validation
    const conditionsValides = [estRempli(e), valideNom(e), validePrenom(e), valideMail(e), valideMdp(e), confirmationMdp(e), valideConditions(e)];

    // Vérification si toutes les conditions sont valides
    const conditionsRespectees = conditionsValides.every(function (condition) {
        return condition === true;
    });

    // Si toutes les conditions sont respectées, la soumission du formulaire est autorisée
    if (conditionsRespectees) {
        return true;
    }

    // Sinon, on empêche la soumission du formulaire
    e.preventDefault();

});



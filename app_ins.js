const erreurNom = document.getElementById('nom_inscription_erreur');
const erreurPrenom = document.getElementById('prenom_inscription_erreur');
const erreurMail = document.getElementById('mail_inscription_erreur')
const erreurMdp = document.getElementById('password_inscription_erreur');
const confirmeMdp = document.getElementById('confirme_mdp_utilisateur');
const erreurConditions = document.getElementById('checkbox_condition_inscription_erreur');

function valideNom() {

    const nom = document.getElementById('nom_utilisateur_inscription').value;

    if (nom.length == 0) {
        erreurNom.innerHTML = "Le nom est requis";
        return false;
    }

    if (nom.length < 2) {
        erreurNom.innerHTML = "Nom trop court";
        return false;
    }

    if (!nom.match(/^[A-Za-z'-]/)) {
        erreurNom.innerHTML = "Nom invalide";
        return false;
    }

    erreurNom.innerHTML = '';
    return true;

}

function validePrenom() {

    const prenom = document.getElementById('prenom_utilisateur_inscription').value;

    if (prenom.length == 0) {
        erreurPrenom.innerHTML = "Le prénom est requis";
        return false;
    }

    if (prenom.length < 2) {
        erreurPrenom.innerHTML = "Prénom trop court";
        return false;
    }

    if (!prenom.match(/^[A-Za-z'-]/)) {
        erreurPrenom.innerHTML = "Prenom invalide";
        return false;
    }

    erreurPrenom.innerHTML = '';
    return true;
}

function valideMail() {

    const mail = document.getElementById('mail_utilisateur_inscription').value;

    if (mail.length == 0) {
        erreurMail.innerHTML = "Email manquant";
        return false;
    }

    if (mail.length < 5) {
        erreurMail.innerHTML = "Veuillez saisir un mail valide";
        return false;
    }

    if (!mail.match(/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/)) {
        mailError.innerHTML = "Mail invalide";
        return false;
    }

    erreurMail.innerHTML = '';
    return true;
}

function valideMdp() {

    const mdp = document.getElementById('mdp_utilisateur_inscription').value;

    if (mdp.length == 0) {
        erreurMdp.innerHTML = "Mot de passe requis";
        return false;
    }

    if (mdp.length < 8) {
        erreurMdp.innerHTML = "Veuillez saisir au moins 8 caractères";
        return false;
    }

    if (!mdp.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
        passwordError.innerHTML = "Le mot de passe doit contenir au moins une lettre majuscule et un chiffre";
        return false;
    }

    erreurMdp.innerHTML = '';
    return true;
}

function confirmationMdp() {

    const confirmMdp = document.getElementById('confirme_mdp_utilisateur_inscription').value;
    const mdp = document.getElementById('mdp_utilisateur_inscription').value;

    if (confirmMdp !== mdp) {
        confirmeMdp.innerHTML = "Les mots de passe ne correspondent pas";
    }

}

function valideConditions() {

    const conditions = document.getElementById('condition_general');

    if (!conditions.checked) {
        erreurConditions.innerHTML = "Veuillez accepter les conditions générales";
        return false;
    }

    erreurConditions.innerHTML = "";
    return true;
}

function valideForm() {
    if (!valideNom || !validePrenom || !valideMail || !valideMdp || !confirmationMdp || !valideConditions) {

    }
}
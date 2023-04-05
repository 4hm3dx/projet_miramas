const formulaireContact = document.querySelector('.formulaire_contact');

const nomUtilisateur = document.querySelector('#nom_utilisateur');
const prenomUtilisateur = document.querySelector('#prenom_utilisateur');
const mailUtilisateur = document.querySelector('#mail_utilisateur');
const objectUtilisateur = document.querySelector('#object_utilisateur');
const contenueMessageFormContact = document.querySelector('#contenue_message_form_contact');

const nomErreur = document.querySelector('#nom_erreur');
const prenomErreur = document.querySelector('#prenom_erreur');
const mailErreur = document.querySelector('#mail_erreur');
const objectErreur = document.querySelector('#object_erreur');
const messageErreur = document.querySelector('#message_erreur');

const regexNomPrenom = /^[a-zA-Z]{2,30}$/;
const regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

function validerFormulaire(event) {
  event.preventDefault();
  let erreurs = 0;

  if (!regexNomPrenom.test(nomUtilisateur.value)) {
    nomErreur.textContent = 'Le nom doit contenir entre 2 et 30 caractères.';
    erreurs++;
  } else {
    nomErreur.textContent = '';
  }

  if (!regexNomPrenom.test(prenomUtilisateur.value)) {
    prenomErreur.textContent = 'Le prénom doit contenir entre 2 et 30 caractères.';
    erreurs++;
  } else {
    prenomErreur.textContent = '';
  }

  if (!regexMail.test(mailUtilisateur.value)) {
    mailErreur.textContent = 'L\'adresse mail doit être au format "xxxx@xxxx.xx".';
    erreurs++;
  } else {
    mailErreur.textContent = '';
  }

  if (objectUtilisateur.value.trim() === '') {
    objectErreur.textContent = 'Le champ "Objet" ne peut pas être vide.';
    erreurs++;
  } else {
    objectErreur.textContent = '';
  }

  if (contenueMessageFormContact.value.trim() === '') {
    messageErreur.textContent = 'Le champ "Message" ne peut pas être vide.';
    erreurs++;
  } else {
    messageErreur.textContent = '';
  }

  if (erreurs === 0) {
    formulaireContact.submit();
  }
}

formulaireContact.addEventListener('submit', validerFormulaire);
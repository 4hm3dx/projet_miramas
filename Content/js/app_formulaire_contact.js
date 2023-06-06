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

if(formulaireContact){

function contactnom(e) {

  if (nomUtilisateur.value.length == 0) {
    e.preventDefault();
    nomErreur.innerHTML = "Le nom doit contenir entre 2 et 30 caractères.";
    return false;
  }

  if (nomUtilisateur.value.length < 2) {
    e.preventDefault();
    nomErreur.innerHTML = "Le nom doit contenir entre 2 et 30 caractères.";
    return false;
  }

  if (!nomUtilisateur.value.match(/^[A-Za-z'-]+$/)) {
    e.preventDefault();
    nomErreur.innerHTML = "Nom invalide";
    return false;
  }

  nomErreur.innerHTML = '';
  return true;
}



function contactprenom(e) {
  if (prenomUtilisateur.value.length == 0) {
    prenomErreur.innerHTML = "Le prénom est requis";
    return false;
  }

  if (prenomUtilisateur.value.length < 2) {
    prenomErreur.innerHTML = "Prénom trop court";
    return false;
  }

  if (!prenomUtilisateur.value.match(/^[A-Za-z'-]+$/)) {
    prenomErreur.innerHTML = "Prenom invalide";
    return false;
  }

  prenomErreur.innerHTML = '';
  return true;
}

function contactmail(e) {

  if (mailUtilisateur.value.length == 0) {
    mailErreur.innerHTML = "Email manquant";
    return false;
  }

  if (mailUtilisateur.value.length < 5) {
    mailErreur.innerHTML = "Veuillez saisir un mail valide";
    return false;
  }

  if (!mailUtilisateur.value.match(/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/)) {
    mailErreur.innerHTML = "Mail invalide";
    return false;
  }

  mailErreur.innerHTML = '';
  return true;

}

function contactobject(e) {

  if (objectUtilisateur.value.length == 0) {
    objectErreur.innerHTML = "Le champ 'Objet' ne peut pas être vide.";
    return false;
  }

  if (!objectUtilisateur.value.match(/^[a-zA-Z0-9.,?!'"«»‹›„“”‘’ éàèùêâôûëïüç]+$/)) {
    objectErreur.innerHTML = "Veuillez saisir un 'Objet' valide.";
    return false;
  }

  objectErreur.innerHTML = '';
  return true;
}

function contactmessage(e) {
  if (contenueMessageFormContact.value.trim() === '') {
    messageErreur.innerHTML = "Le champ 'Message' ne peut pas être vide.";
    return false;
  }
  if (!contenueMessageFormContact.value.match(/^[a-zA-Z0-9.,?!'"«»‹›„“”‘’ éàèùêâôûëïüç]+$/)) {
    messageErreur.innerHTML = "Le champ 'Message' est incorrect";
    return false;
  }

  messageErreur.innerHTML = '';
  return true;
}



formulaireContact.addEventListener('submit', function (e) {

  // Appel de toutes les fonctions de validation
  const conditionsValidesContact = [contactnom(e), contactprenom(e), contactmail(e), contactobject(e), contactmessage(e)];

  // Vérification si toutes les conditions sont valides
  const conditionsRespecteesContact = conditionsValidesContact.every(function (condition) {
    return condition === true;
  });

  // Si toutes les conditions sont respectées, la soumission du formulaire est autorisée
  if (conditionsRespecteesContact) {
    return true;
  }

  // Sinon, on empêche la soumission du formulaire
  e.preventDefault();

});
}


const contactForm = document.querySelector("#formulaire_contact");
const contactMessage = document.querySelector("#contact_message");

function sendEmail(e) {
  e.preventDefault();

  emailjs
    .sendForm("service_abqwplr", "template_gngdx9s", "#formulaire_contact", "nOiKEskodYeiN2fE8")
    .then(
      () => {
        //* Message de succès
        contactMessage.textContent = "Message envoyé avec succès ✅";
        //? Suppression du message après 5secondes
        setTimeout(() => {
          contactMessage.textContent = "";
        }, 5000);
        //? Suppréssion des inputs
        contactForm.reset();
      },
      () => {
        //! Message d'erreur
        contactMessage.textContent = "Erreur lors de l'envoie du message ❌";
      }
    );
}

contactForm.addEventListener("submit", sendEmail);
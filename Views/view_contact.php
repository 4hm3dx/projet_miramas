<form action="#" method="POST" class="formulaire_contact">
  <fieldset class="fieldset_formulaire_contact">
    <legend>Nous Contacter</legend>
    <div class="field-group">
      <label for="nom_utilisateur" class="name-fields" id="label_nom_utilisateur">Nom : <sup>*</sup></label>
      <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="name-fields">
      <span id="nom_erreur" class="erreur"></span>
    </div>
    <div class="field-group">
      <label for="prenom_utilisateur" class="name-fields" id="label_prenom_utilisateur">Prénom : <sup>*</sup></label>
      <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="name-fields">
      <span id="prenom_erreur" class="erreur"></span>
    </div>
    <label for="mail_utilisateur" id="label_mail_utilisateur">Adresse mail : <sup>*</sup></label>
    <input type="email" name="mail_utilisateur" id="mail_utilisateur">
    <span id="mail_erreur" class="erreur"></span>
    <label for="object_utilisateur" id="label_object_utilisateur">Objet : <sup>*</sup></label>
    <input type="text" name="object_utilisateur" id="object_utilisateur">
    <span id="object_erreur" class="erreur"></span>
    <label for="contenue_message_form_contact" id="label_textarea">Message : <sup>*</sup></label>
    <textarea name="contenue_message_form_contact" id="contenue_message_form_contact" cols="60" rows="10"></textarea>
    <span id="message_erreur" class="erreur"></span>
    <input type="submit" name="envoyer_formulaire_contact" id="envoyer_formulaire_contact" value="Envoyer le message " onclick="return validerFormulaire()">
  </fieldset>
</form>

<script>
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
</script>
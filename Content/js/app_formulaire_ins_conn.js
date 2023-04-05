// ! Affichage des formulire 

// Récupération des éléments HTML du formulaire d'inscription et de connexion
const formulaireInscription = document.getElementById('formulaire_inscription');
const formulaireConnexion = document.getElementById('formulaire_connexion');

// Récupération des boutons de basculement d'inscription et de connexion
const buttonInscription = document.getElementById('button_inscription');
const buttonConnexion = document.getElementById('button_connexion');

// Ajout de gestionnaires d'événements pour les boutons de basculement
buttonInscription.addEventListener('mousedown', function() {
  formulaireInscription.style.display = 'block';
  formulaireConnexion.style.display = 'none';
});

buttonConnexion.addEventListener('mousedown', function() {
  formulaireInscription.style.display = 'none';
  formulaireConnexion.style.display = 'block';
});

// Par défaut, le formulaire de connexion est affiché et le formulaire d'inscription est masqué
formulaireInscription.style.display = 'none';
formulaireConnexion.style.display = 'block';

// & Condition de soumission du formulaire 
document.getElementById('formulaire_inscription').addEventListener('submit', function(event) {
  let nom = document.getElementById('nom_utilisateur_inscription').value.trim();
  let prenom = document.getElementById('prenom_utilisateur_inscription').value.trim();
  let email = document.getElementById('mail_utilisateur_inscription').value.trim();
  let password = document.getElementById('mdp_utilisateur_inscription').value.trim();
  let confirm_password = document.getElementById('confirme_mdp_utilisateur_inscription').value.trim();
  let checkbox_condition = document.getElementById('condition_general').checked;

  let nom_regex = /^[a-zA-Z\s]{2,30}$/;
  let email_regex = /^\S+@\S+\.\S+$/;
  let password_regex = /^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

  // let error_messages = [];

  if (!nom_regex.test(nom)) {
      document.getElementById('nom_inscription_erreur').textContent = 'Le nom doit contenir entre 2 et 30 caractères.';
  } else {
      document.getElementById('nom_inscription_erreur').textContent = '';
  }

  if (!nom_regex.test(prenom)) {
      document.getElementById('prenom_inscription_erreur').textContent = 'Le prénom doit contenir entre 2 et 30 caractères.';
  } else {
      document.getElementById('prenom_inscription_erreur').textContent = '';
  }

  if (!email_regex.test(email)) {
      document.getElementById('mail_inscription_erreur').textContent = 'Le format de l\'e-mail est invalide (xxxx@xxxx.xx).';
  } else {
      document.getElementById('mail_inscription_erreur').textContent = '';
  }

  if (!password_regex.test(password)) {
      document.getElementById('password_inscription_erreur').textContent = 'Le mot de passe doit contenir au moins une majuscule, un chiffre et faire minimum 8 caractères.';
  } else {
      document.getElementById('password_inscription_erreur').textContent = '';
  }

  if (password !== confirm_password) {
      error_messages.push('Les mots de passe ne correspondent pas.');
  }

  if (!checkbox_condition) {
      document.getElementById('checkbox_condition_inscription_erreur').textContent = 'Vous devez accepter les conditions générales.';
  } else {
      document.getElementById('checkbox_condition_inscription_erreur').textContent = '';
  }
});

const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
  e.preventDefault(); // Empêcher la soumission traditionnelle du formulaire
  const formData = new FormData(form); // Créer une instance de FormData pour récupérer les données du formulaire
  fetch('/submit-form', { // Remplacez '/submit-form' par l'URL qui gère la soumission du formulaire
    method: 'POST',
    body: formData
  })
  .then(response => {
    // Gérer la réponse du serveur ici
    console.log(response);
  })
  .catch(error => {
    // Gérer les erreurs ici
    console.error(error);
  });
});
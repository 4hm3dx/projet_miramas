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

// & obligation d'accepterles condition d'utilisation

// Récupération de la case à cocher pour les conditions d'utilisation
const conditionCheckbox = document.getElementById('condition_general');

// Récupération du formulaire d'inscription et du bouton de soumission
const inscriptionForm = document.getElementById('formulaire_inscription');
const inscriptionSubmit = document.getElementById('submit_formulaire_inscription');

// Fonction de vérification de la case à cocher pour les conditions d'utilisation
function verifConditionCheckbox() {
  if (!conditionCheckbox.checked) {
    alert("Les conditions d'utilisation doivent être accepté avant de s'inscrire.");
    return false;
  } else {
    return true;
  }
}

// Ajout d'un écouteur d'événement sur le bouton de soumission du formulaire d'inscription
inscriptionSubmit.addEventListener('click', function(e) {
  if (!verifConditionCheckbox()) {
    e.preventDefault();
  }
});

// & Controle de la longueur du nom et prenom 
// Récupération des champs nom et prénom
const nomInput = document.getElementById('nom_utilisateur_inscription');
const prenomInput = document.getElementById('prenom_utilisateur_inscription');

// Ajout d'un écouteur d'événement pour vérifier la longueur des champs lors de la saisie
nomInput.addEventListener('input', function () {
  const nomValue = nomInput.value.trim();
  const nomLength = nomValue.length;
  if (nomLength < 2 || nomLength > 30) {
    nomInput.style.borderColor = "red";
  } else {
    nomInput.style.borderColor = "green";
  }
});

prenomInput.addEventListener('input', function () {
  const prenomValue = prenomInput.value.trim();
  const prenomLength = prenomValue.length;
  if (prenomLength < 2 || prenomLength > 30) {
    prenomInput.style.borderColor = "red";
  } else {
    prenomInput.style.borderColor = "green";
  }
});

// Ajout d'un écouteur d'événement pour empêcher la soumission du formulaire si les champs nom et prénom ne sont pas valides
document.getElementById("formulaire_inscription").addEventListener("submit", function(event){
  const nomValue = nomInput.value.trim();
  const nomLength = nomValue.length;
  const prenomValue = prenomInput.value.trim();
  const prenomLength = prenomValue.length;
  
  if (nomLength < 2 || nomLength > 30 || prenomLength < 2 || prenomLength > 30) {
    alert("Le nom et le prénom doivent contenir entre 2 et 30 caractères.");
    event.preventDefault();
  }
});

// a Controle du mail 
// Récupération de l'élément input de l'e-mail
const emailInput = document.getElementById('mail_utilisateur_inscription');

// Fonction de vérification du format de l'e-mail
function checkEmailFormat(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Ajout d'un écouteur d'événement sur l'input de l'e-mail
emailInput.addEventListener('input', function() {
  const emailValue = emailInput.value.trim();

  // Vérification du format de l'e-mail
  if (checkEmailFormat(emailValue)) {
    emailInput.style.borderColor = 'lightgreen'; // Input en vert si format valide
  } else {
    emailInput.style.borderColor = 'red'; // Input en rouge si format invalide
  }
});
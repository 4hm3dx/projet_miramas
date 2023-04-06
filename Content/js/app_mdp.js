// & Controle de la longueur et de la robutesse du mot de passe 
$(document).ready(function() {
    $('#mdp_utilisateur_inscription').on('input', function() {
        var password = $(this).val();
        var strength = 0;
        var progressBar = $('#strength_indicator');
        var passwordLength = password.length;

        // Vérification de la longueur du mot de passe
        if (passwordLength < 8) {
            strength -= 1;
        } else if (passwordLength > 7 && passwordLength < 12) {
            strength += 1;
        } else if (passwordLength > 11) {
            strength += 2;
        }

        // Vérification de la présence de chiffres
        if (/\d/.test(password)) {
            strength += 1;
        }

        // Vérification de la présence de lettres minuscules et majuscules
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
            strength += 1;
        }

        // Vérification de la présence de caractères spéciaux
        if (/[^A-Za-z0-9]/.test(password)) {
            strength += 1;
        }

        // Mise à jour de la barre de progression
        switch (strength) {
            case 0:
                progressBar.css('background-color', '#ff0000');
                progressBar.css('width', '25%');
                break;
            case 1:
                progressBar.css('background-color', '#ff7f00');
                progressBar.css('width', '50%');
                break;
            case 2:
                progressBar.css('background-color', '#ffff00');
                progressBar.css('width', '75%');
                break;
            case 3:
                progressBar.css('background-color', '#00ff00');
                progressBar.css('width', '100%');
                break;
            default:
                progressBar.css('background-color', '#ff0000');
                progressBar.css('width', '25%');
        }
    });
});

// & Affichage du mot de passe 
// Récupération des éléments du DOM
const togglePasswordVisibilityIns = document.querySelector("#toggle-password-visibility-i");
const togglePasswordVisibilityCon = document.querySelector("#toggle-password-visibility-c");
const passwordInputIns = document.querySelector("#mdp_utilisateur_inscription");
const passwordInputCon = document.querySelector("#mdp_utilisateur_connexion");

// Ajout de l'écouteur d'événement de clic pour le bouton d'œil dans le formulaire d'inscription
togglePasswordVisibilityIns.addEventListener("click", function() {
  // Si le type de l'input est "password", le changer en "text"
  if (passwordInputIns.type === "password") {
    passwordInputIns.type = "text";
    togglePasswordVisibilityIns.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else { // Sinon, le changer en "password"
    passwordInputIns.type = "password";
    togglePasswordVisibilityIns.innerHTML = '<i class="far fa-eye"></i>';
  }
});

// Ajout de l'écouteur d'événement de clic pour le bouton d'œil dans le formulaire de connexion
togglePasswordVisibilityCon.addEventListener("click", function() {
  // Si le type de l'input est "password", le changer en "text"
  if (passwordInputCon.type === "password") {
    passwordInputCon.type = "text";
    togglePasswordVisibilityCon.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else { // Sinon, le changer en "password"
    passwordInputCon.type = "password";
    togglePasswordVisibilityCon.innerHTML = '<i class="far fa-eye"></i>';
  }
});
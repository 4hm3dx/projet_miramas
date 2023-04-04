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
    // Pour la connexion
    const togglePasswordConnexion = document.querySelector('#toggle_password_connexion');
    const passwordConnexion = document.querySelector('#mdp_utilisateur_connexion');
    
    togglePasswordConnexion.addEventListener('click', function (e) {
        const type = passwordConnexion.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConnexion.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
    // Récupération de l'icône de l'oeil pour le mot de passe
    const togglePasswordInscription = document.querySelector('#toggle_password_inscription');
    // Récupération du champ de saisie du mot de passe pour le formulaire d'inscription
    const mdpUtilisateurInscription = document.querySelector('#mdp_utilisateur_inscription');
    
    // Ajout d'un gestionnaire d'événements sur le clic de l'icône de l'oeil
    togglePasswordInscription.addEventListener('click', function(e) {
      // Changement du type de champ de saisie pour afficher ou cacher le mot de passe
      const type = mdpUtilisateurInscription.getAttribute('type') === 'password' ? 'text' : 'password';
      mdpUtilisateurInscription.setAttribute('type', type);
      // Changement de l'icône pour montrer que le mot de passe est visible ou caché
      this.classList.toggle('fa-eye-slash');
    });


// const erreurNom = document.getElementById('nom_inscription_erreur');
// const erreurPrenom = document.getElementById('prenom_inscription_erreur');
// const erreurMail = document.getElementById('mail_inscription_erreur')
// const erreurMdp = document.getElementById('password_inscription_erreur');
// const confirmeMdp = document.getElementById('confirme_mdp_utilisateur');
// const erreurConditions = document.getElementById('checkbox_condition_inscription_erreur');

// const nom = document.getElementById('nom_utilisateur_inscription');
// const prenom = document.getElementById('prenom_utilisateur_inscription');
// const mail = document.getElementById('mail_utilisateur_inscription');
// const mdp = document.getElementById('mdp_utilisateur_inscription');
// const confirmMdp = document.getElementById('confirme_mdp_utilisateur_inscription');
// const conditions = document.getElementById('condition_general');


// // Validation du nom
// nom.addEventListener('blur', function () {
//     if (nom.length == 0) {
//         erreurNom.innerHTML = "Le nom est requis";
//         return false;
//     }

//     if (nom.length < 2) {
//         erreurNom.innerHTML = "Nom trop court";
//         return false;
//     }

//     if (!nom.match(/^[A-Za-z'-]/)) {
//         erreurNom.innerHTML = "Nom invalide";
//         return false;
//     }

//     erreurNom.innerHTML = '';
//     return true;
// });


// // Validation du prénom
// prenom.addEventListener('blur', function () {
//     if (prenom.length == 0) {
//         erreurPrenom.innerHTML = "Le prénom est requis";
//         return false;
//     }

//     if (prenom.length < 2) {
//         erreurPrenom.innerHTML = "Prénom trop court";
//         return false;
//     }

//     if (!prenom.match(/^[A-Za-z'-]/)) {
//         erreurPrenom.innerHTML = "Prenom invalide";
//         return false;
//     }

//     erreurPrenom.innerHTML = '';
//     return true;
// });


// // Validation de l'email
// mail.addEventListener('blur', function () {
//     if (mail.length == 0) {
//         erreurMail.innerHTML = "Email manquant";
//         return false;
//     }

//     if (mail.length < 5) {
//         erreurMail.innerHTML = "Veuillez saisir un mail valide";
//         return false;
//     }

//     if (!mail.match(/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/)) {
//         mailError.innerHTML = "Mail invalide";
//         return false;
//     }

//     erreurMail.innerHTML = '';
//     return true;
// });


// // Validation du mot de passe
// mdp.addEventListener('blur', function () {
//     if (mdp.length == 0) {
//         erreurMdp.innerHTML = "Mot de passe requis";
//         return false;
//     }

//     if (mdp.length < 8) {
//         erreurMdp.innerHTML = "Veuillez saisir au moins 8 caractères";
//         return false;
//     }

//     if (!mdp.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
//         passwordError.innerHTML = "Le mot de passe doit contenir au moins une lettre majuscule et un chiffre";
//         return false;
//     }

//     erreurMdp.innerHTML = '';
//     return true;
// });

// conditions.addEventListener('change', function () {
//     if (!conditions.checked) {
//         erreurConditions.innerHTML = "Vous devez accepter les conditions générales pour continuer";
//         return false;
//     }
//     erreurConditions.innerHTML = '';
//     return true;
// });

// // Validation de la confirmation du mot de passe
// confirmMdp.addEventListener('blur', function () {
//     if (confirmMdp.value !== mdp.value) {
//         confirmeMdp.innerHTML = "Les mots de passe ne correspondent pas";
//         return false;
//     }

//     confirmeMdp.innerHTML = '';
//     return true;
// });

// // Validation des conditions générales



// // Soumission du formulaire d'inscription
// const formInscription = document.getElementById('formulaire_inscription');
// formInscription.addEventListener('submit', function (event) {
//     event.preventDefault();
//     const isNomValid = nom.dispatchEvent(new Event('blur'));
//     const isConditionsValid = conditions.checked;
//     const isPrenomValid = prenom.dispatchEvent(new Event('blur'));
//     const isMailValid = mail.dispatchEvent(new Event('blur'));
//     const isMdpValid = mdp.dispatchEvent(new Event('blur'));
//     const isConfirmMdpValid = confirmMdp.dispatchEvent(new Event('blur'));

//     if (isNomValid && isPrenomValid && isMailValid && isMdpValid && isConfirmMdpValid && isConditionsValid) {
//         formInscription.submit();
//     }
// });

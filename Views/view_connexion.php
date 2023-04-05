<div class="formulaire_inscription_utilisateur">
    <form action="" method="POST" id="formulaire_inscription">
        <fieldset>
            <legend id="legend_inscription">Inscription</legend>
            <label class="label_nom" for="nom_utilisateur_inscription">Nom :<sup>*</sup> </label>
            <span id="nom_inscription_erreur" class="erreur"></span>
            <input type="text" name="nom_utilisateur_inscription" id="nom_utilisateur_inscription">
            <label class="label_prenom" for="prenom_utilisateur_inscription">Prénom : <sup>*</sup> </label>
            <span id="prenom_inscription_erreur" class="erreur"></span>
            <input type="text" name="prenom_utilisateur_inscription" id="prenom_utilisateur_inscription">
            <label class="label_mail" for="mail_utilisateur_inscription">E-mail : <sup>*</sup> </label>
            <span id="mail_inscription_erreur" class="erreur"></span>
            <input type="email" name="mail_utilisateur_inscription" id="mail_utilisateur_inscription">
            <label class="label_mdp" for="mdp_utilisateur_inscription">Mot De Passe : <sup>*</sup> </label>
            <i class="fa-regular fa-circle-question" title="Votre mot de passe doit contenir au moins 8 caractères, avec des lettres majuscules, des lettres minuscules et des chiffres."></i>
            <span id="password_inscription_erreur" class="erreur"></span>
            <input type="password" name="mdp_utilisateur_inscription" id="mdp_utilisateur_inscription">
            <i class="far fa-eye" id="toggle_password_inscription"></i>
            <div id="strength_indicator"></div>
            <br>
            <label class="label_confirme" for="confirme_mdp_utilisateur_inscription">Confirmation : <sup>*</sup> </label>
            <input type="password" name="confirme_mdp_utilisateur_inscription" id="confirme_mdp_utilisateur_inscription">
            <div class="condition_general_utilisation">
                <p>
                    <label class="label_checkbox_condition" for="condition_general"></label><sup>*</sup> 
                    <span id="checkbox_condition_inscription_erreur" class="erreur"></span>
                    <input type="checkbox" name="condition_general" id="condition_general">
                    En cochant cette case, j'accepte <a href="?controller=condition&action=condition">les conditions génerales</a> de ce site web. Ces conditions comprennent les règles et les obligations relatives à l'utilisation du site, la protection des données personnelles, les droits d'auteur et la propriété intellectuelle. J'ai lu attentivement ces conditions et je m'engage à les respecter.
                </p>
                <p>
                    <label class="label_checkbox_newsletter" for="souscription_newsletter"></label>
                    <input type="checkbox" name="souscription_newsletter" id="souscription_newsletter">
                    En cochant cette case, j'accepte de recevoir la newsletter de ce site web. Celle-ci contient des informations sur les nouveautés, les offres spéciales, les événements et les actualités du site. Je comprends que je peux me désabonner à tout moment en cliquant sur le <a href="?controller=newsletters&action=newsletter">lien de désabonnement</a> présent dans chaque e-mail de la newsletter.
                </p>
            </div>
            <input type="submit" id="submit_formulaire_inscription" value="Inscription"><br>
            <span id="se_connecter">Vous êtes déjà inscrit? <button id="button_connexion">Connexion</button></span>
        </fieldset>
    </form>
</div>

<div class="formulaire_connexion_utilisateur">
    <form action="" method="POST" id="formulaire_connexion">
        <fieldset>
            <legend id="legend_connexion">Connexion</legend>
            <label class="label_mail_connexion" for="mail_utilisateur_connexion">E-mail : <sup>*</sup> </label>
            <input type="email" name="mail_utilisateur_connexion" id="mail_utilisateur_connexion">
            <label class="label_mdp_connexion" for="mdp_utilisateur_connexion">Mot De Passe : <sup>*</sup> </label>
            <input type="password" name="mdp_utilisateur_connexion" id="mdp_utilisateur_connexion">
            <i class="far fa-eye" id="toggle_password_connexion"></i>
            <input type="submit" id="submit_formulaire_connexion" value="Connexion"><br>
            <span id="inscription">Vous n'êtes pas inscrit? <button id="button_inscription">Incrivez-vous !</button></span>
        </fieldset>
    </form>
</div>

<script>
    document.getElementById('formulaire_inscription').addEventListener('submit', function(event) {
    var nom = document.getElementById('nom_utilisateur_inscription').value.trim();
    var prenom = document.getElementById('prenom_utilisateur_inscription').value.trim();
    var email = document.getElementById('mail_utilisateur_inscription').value.trim();
    var password = document.getElementById('mdp_utilisateur_inscription').value.trim();
    var confirm_password = document.getElementById('confirme_mdp_utilisateur_inscription').value.trim();
    var checkbox_condition = document.getElementById('condition_general').checked;

    var nom_regex = /^[a-zA-Z\s]{2,30}$/;
    var email_regex = /^\S+@\S+\.\S+$/;
    var password_regex = /^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    var error_messages = [];

    if (!nom_regex.test(nom)) {
        error_messages.push('Le nom doit contenir entre 2 et 30 caractères.');
        document.getElementById('nom_inscription_erreur').textContent = 'Le nom doit contenir entre 2 et 30 caractères.';
    } else {
        document.getElementById('nom_inscription_erreur').textContent = '';
    }

    if (!nom_regex.test(prenom)) {
        error_messages.push('Le prénom doit contenir entre 2 et 30 caractères.');
        document.getElementById('prenom_inscription_erreur').textContent = 'Le prénom doit contenir entre 2 et 30 caractères.';
    } else {
        document.getElementById('prenom_inscription_erreur').textContent = '';
    }

    if (!email_regex.test(email)) {
        error_messages.push('Le format de l\'e-mail est invalide.');
        document.getElementById('mail_inscription_erreur').textContent = 'Le format de l\'e-mail est invalide.';
    } else {
        document.getElementById('mail_inscription_erreur').textContent = '';
    }

    if (!password_regex.test(password)) {
        error_messages.push('Le mot de passe doit contenir au moins une majuscule, un chiffre et faire minimum 8 caractères.');
        document.getElementById('password_inscription_erreur').textContent = 'Le mot de passe doit contenir au moins une majuscule, un chiffre et faire minimum 8 caractères.';
    } else {
        document.getElementById('password_inscription_erreur').textContent = '';
    }

    if (password !== confirm_password) {
        error_messages.push('Les mots de passe ne correspondent pas.');
    }

    if (!checkbox_condition) {
        error_messages.push('Vous devez accepter les conditions générales.');
        document.getElementById('checkbox_condition_inscription_erreur').textContent = 'Vous devez accepter les conditions générales.';
    } else {
        document.getElementById('checkbox_condition_inscription_erreur').textContent = '';
    }

    if (error_messages.length > 0) {
        event.preventDefault();
        var error_message_string = error_messages.join('\n');
        alert(error_message_string);
    }
});
</script>
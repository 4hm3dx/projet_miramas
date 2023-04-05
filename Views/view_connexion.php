<section class="formulaire_inscription_utilisateur">
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
            <div class="input_visibilite_mdp">
            <input type="password" name="mdp_utilisateur_inscription" id="mdp_utilisateur_inscription">
            <i class="far fa-eye" id="toggle_password_inscription"></i>
            </div>
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
</section>

<section class="formulaire_connexion_utilisateur">
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
</section>



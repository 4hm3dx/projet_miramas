<section class="formulaire_connexion_utilisateur">
    <form action="?controller=connexion&action=connexion_utilisateur" method="POST" id="formulaire_connexion"
        name="form2">
        <fieldset>
            <legend id="legend_connexion">Connexion</legend>
            <label class="label_mail_connexion" for="mail_utilisateur_connexion">E-mail : <sup></sup> </label>
            <input type="email" name="mail_utilisateur_connexion" id="mail_utilisateur_connexion">
            <label class="label_mdp_connexion" for="mdp_utilisateur_connexion">Mot De Passe : <sup></sup> </label>
            <div class="input_visibilite_mdp">
                <input type="password" name="mdp_utilisateur_connexion" id="mdp_utilisateur_connexion">
                <button type="button" id="toggle-password-visibility-c"><i class="far fa-eye"
                        id="toggle_password_inscription"></i>
                    <i class="far fa-eye-slash"></i>
                </button>
            </div>
            <input type="submit" id="submit_formulaire_connexion" name="submit_formulaire_connexion"
                value="Connexion"><br>
            <span id="inscription">Vous n'êtes pas inscrit? <button href="?controller=connexion&action=page_inscription"
                    id="button_inscription">Inscrivez-vous
                    !</button></span>
        </fieldset>
    </form>
</section>
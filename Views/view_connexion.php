<header>
	<!-- Barre de navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="?controller=home&action=home">
			<img src="Content/img/Logo_Amis_vieux_Miramas.jpg" alt="Logo" class="logo" id="logo_asso"/>
			<!-- <span class="navbar-title">Les amis du vieux Miramas</span> -->
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon" id="menu_hamburger"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="?controller=presentation&action=presentation">Presentation</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?controller=partenaires&action=partenaires">Partenaires</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?controller=recherche&action=recherche">Document</a>
				</li>
				<?php
				// var_dump($_SESSION);
				if (isset($_SESSION['user']) && $_SESSION['user']['id_roles'] !== 4) { ?>
					<li class="nav-item">
						<a class="nav-link" href="?controller=ajout_document&action=ajout_document">Ajout de document</a>
					</li>
				<?php }
				?>
				<?php
				if (!isset($_SESSION['user']['id_roles'])) {

					?>
					<li class="nav-item">
						<a href="?controller=connexion&action=connexion" class="nav-link button_connexion">Connexion</a>
					</li>
				<?php }
				if (isset($_SESSION['user']['id_roles'])) {

					?>
					<li class="nav-item">
						<a class="nav-link" href="?controller=connexion&action=deconnexion" id="deco" class="button_deconnexion"
							onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
					</li>
				<?php } ?>

			</ul>
		</div>
	</nav>
</header>
<section class="formulaire_connexion_utilisateur">
    <form action="?controller=connexion&action=connexion_utilisateur" method="POST" id="formulaire_connexion"
        name="form2" style="padding: 20px;">
        <fieldset>
            <legend id="legend_connexion">Connexion</legend>
            <label class="label_mail_connexion" for="mail_utilisateur_connexion">E-mail : <sup></sup> </label>
            <span id="span-mail-connexion"></span>
            <input type="email" name="mail_utilisateur_connexion" id="mail_utilisateur_connexion">
            <label class="label_mdp_connexion" for="mdp_utilisateur_connexion">Mot De Passe : <sup></sup> </label>
                <i class="fa-regular fa-circle-question" style="margin-bottom:5px;"
                    title="Votre mot de passe doit contenir au moins 8 caractères, avec des lettres majuscules, des lettres minuscules et des chiffres."></i>
                <span id="password_connexion_erreur" class="erreur"></span>
                <div class="input_visibilite_mdp">
                    <input type="password" name="mdp_utilisateur_connexion" id="mdp_utilisateur_connexion">
                    <button type="button" id="toggle-password-visibility-i"><i class="far fa-eye"
                            id="toggle_password_connexion"></i>
                        
                    </button>
                </div>
            <input type="submit" id="submit_formulaire_connexion" name="submit_formulaire_connexion"
                value="Connexion"><br>
            <span id="inscription">Vous n'êtes pas inscrit? <a href="?controller=home&action=inscription"
                    id="button_inscription">Inscrivez-vous
                    !</a></span>
        </fieldset>
    </form>
</section>

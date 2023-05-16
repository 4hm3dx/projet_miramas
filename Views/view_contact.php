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
<form action="?controller=contact&action=message_visiteur" method="POST" class="formulaire_contact">
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
    <input type="submit" name="envoyer_formulaire_contact" id="envoyer_formulaire_contact" value="Envoyer le message "
      onclick="return validerFormulaire()">
  </fieldset>
</form>
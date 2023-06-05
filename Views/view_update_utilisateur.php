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
<main>
<form action="?controller=utilisateur&action=update_utilisateur" method="post" id="addForm">
    <fieldset>
        <legend id="legend"><b>Modifier les informations d'un utilisateur</b></legend>
        <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= filter_var($utilisateur['nom'], FILTER_SANITIZE_STRING) ?>">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= filter_var($utilisateur['prenom']) ?>">
        <label for="mail">Mail :</label>
        <input type="text" name="mail" id="mail" value="<?= filter_var($utilisateur['mail'], FILTER_SANITIZE_EMAIL) ?>">
        <label for="id_roles">Roles Abonnée : </label>
        <input type="text" name="id_roles" id="id_roles" value="<?= filter_var($utilisateur['id_roles'], FILTER_SANITIZE_NUMBER_INT) ?>">
        <input type="submit" value="Modifier" name="submit" id="submit">
        <p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné | 4 => Visiteur qui a envoyé un message</p>
    </fieldset>
</form>
</main>
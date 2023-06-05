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
<div class="mention">
    <h1>Mentions Légales </h1>
    <p>
        Responsabilité éditoriale
        Le site « les amis du vieux miramas » est une publication de l’association des amis du vieux Miramas qui est une association Loi1901 dont les responsables sont élus :
        Directeur de la publication : Michel Galland, président
    </p>

    <p>
        Délégué à la protection des données (DPD) : A nommer
        Pour prendre contact avec l’association, le visiteur peut écrire à l’adresse ci-dessous :
        Association des Amis du Vieux Miramas
        Place des Cigales
        13140 MIRAMAS-LE-VIEUX
    </p>
    <h4>Crédits</h4>
    <p>
        Les articles réalisés dans les différentes rubriques du site sont diffusés par le bureau de l’association.
        Les photos sont mises à disposition de l’association pour illustrer le site en accord avec leurs auteurs. Elles sont soumises au droit d’auteur et toute autre utilisation est interdite (cf CGU du site).
    </p>
    <h4>Respect de la vie privée</h4>
    <p>
        En accédant à ce site, certaines informations relatives aux utilisateurs, telles que des adresses de protocole Internet, les logiciels utilisés, le temps passé, etc. sont enregistrées et conservées sur le serveur de l’hébergeur du site. Ces informations n'identifieront pas les utilisateurs et de telles informations ne seront utilisées que pour les seuls besoins de l'analyse de la fréquentation du site ou toute obligation légale soumise à la loi française.

        Si les utilisateurs fournissent des informations nominatives, ces informations ne seront ni publiées ni rendues disponibles à des tiers. L’association n’utilise pas les données nominatives au-delà du strict besoin de communication avec le visiteur (formulaire de contact, newsletter, vente boutique). Ces informations nominatives ne sont transmises à aucun tiers.

        En application de la loi n° 78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés, le visiteur dispose d'un droit d'accès, de rectification et de suppression des données qui le concerne (cf CGU).
    </p>
</div>
</main>
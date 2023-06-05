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
<h1 id="titrenews">Inscrivez-vous à notre newsletter</h1>
<p id="paragraphnews"> Vous êtes fasciné par le patrimoine de notre belle ville de Miramas ? Alors notre newsletter est
    faite pour vous !
    Recevez régulièrement les dernières informations et découvertes sur les monuments historiques du Vieux Miramas et
    l'histoire de notre ville directement dans votre boîte mail. Inscrivez vous dès maintenant pour rejoindre notre
    communauté d'amoureux de l'histoire et du patrimoine de Miramas !</p>

<form id="form-news" action="#" method="post">
    <div id="division-news">
        <input type="email" id="input-email-newsletter">
        <i class="fa-regular fa-circle-question" id="logo-point-newsletter"
            title="Pour s'inscrire ou se désinscrire, veuillez saisir une adresse mail valide"></i>
    </div>
    <div id="division-submit-newsletter">
        <input type="submit">
    </div>
</form>
</main>
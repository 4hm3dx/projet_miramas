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
<legend style="text-align:center;">Afficher tout les Message</legend>
<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Date d'envoi</th>
      <th>Objet</th>
      <th>Message</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($message as $m) : ?>
    <tr>
      <td class="td"><?= $m->nom ?></td>
      <td class="td"><?= $m->prenom ?></td>
      <td class="td"><?= $m->mail ?></td>
      <td class="td"><?= $m->date_message ?></td>
      <td class="td"><?= $m->object ?></td>
      <td class="td"><?= $m->message ?></td>
      <td class="trash td">
      <a href="?controller=message&action=delete_message&id=<?= $m->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
      </a>    
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</main>
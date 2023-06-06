<?php
// $role = $_SESSION['user']['id_roles'];
// echo $role;
if (isset($_SESSION['user']) && $_SESSION['user']['id_roles'] == 2) {

	?>
	<!-- <div class="container-fluid">
		<div class="row">
		</div>
		<div class="col-12 text-center" id="titre">
			Consultation de données enregistré dans la base de données
		</div>
	</div> -->
	<!-- <ul class="nav justify-content-center nav-pills" id="menu">
		<li class="nav-item dropdown">
			<a class="nav-link" href="?controller=home&action=home">Accueil</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				Utilisateurs
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="?controller=utilisateur&action=all_utilisateur_nom">Par Nom</a>
				<a class="dropdown-item" href="?controller=utilisateur&action=all_utilisateur_prenom">Par Prénom</a>
				<a class="dropdown-item" href="?controller=utilisateur&action=all_utilisateur_mail">Par E-mail</a>
				<a class="dropdown-item" href="?controller=utilisateur&action=all_utilisateur">Tous les Utilisateurs</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				Documents
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="?controller=document&action=all_titre_document">Par Titre</a>
				<a class="dropdown-item" href="?controller=document&action=all_format_document">Par Format</a>
				<a class="dropdown-item" href="?controller=document&action=all_utilisateur_document">Par
					Utilisateurs</a>
				<a class="dropdown-item" href="?controller=document&action=all_document">Tous les Documents</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				Messages
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="?controller=message&action=all_nom_message">Par Nom</a>
				<a class="dropdown-item" href="?controller=message&action=all_message_mail">Par E-mail</a>
				<a class="dropdown-item" href="?controller=message&action=all_message_objet">Par Objet</a>
				<a class="dropdown-item" href="?controller=message&action=all_message">Toutes les Messages</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				Annonces
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="?controller=annonce&action=all_annonce">Toutes les Annonces</a>
			</div>
		</li>
	</ul>
	</div> -->
<?php } ?>
<header>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="  width: 100%;">
        <a class="navbar-brand" href="?controller=home&action=home">
            <img src="Content/img/Logo_Amis_vieux_Miramas.jpg" alt="Logo" class="logo" id="logo_asso" />
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
				if (isset($_SESSION['user']) && $_SESSION['user']['id_roles'] == 2) { ?>
					<li class="nav-item">
						<a class="nav-link" href="?controller=crud&action=crud">Dashboard</a>
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
                        <a class="nav-link" href="?controller=connexion&action=deconnexion" id="deco"
                            class="button_deconnexion"
                            onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Déconnexion</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </nav>
</header>
<?php
// $role = $_SESSION['user']['id_roles'];
// echo $role;
if (isset($_SESSION['user']) && $_SESSION['user']['id_roles'] == 2) {

	?>
	<ul class="nav justify-content-center nav-pills" id="menu">
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
	</div>
<?php } ?>

<!-- <img src="../Content/img/img_crud.jpg" class="img_crud" alt=""> -->
<div class="texte_crud_explicatif">
<h2>Recherche dans la base de données</h2>

<p>En tant qu'administrateur, vous avez la possibilité d'effectuer des recherches dans la base de données pour trouver des 
    informations spécifiques sur les utilisateurs, les annonceurs, les documents et les messages envoyés par les 
    utilisateurs. 
    Cette fonctionnalité de recherche vous permet de filtrer et de trouver rapidement les données dont vous avez besoin.</p>

<h3>Recherche des utilisateurs</h3>
<p>Vous pouvez rechercher des utilisateurs en fonction de leur nom, prénom, adresse e-mail et tout les utilisateur. 
    Il vous suffit de saisir les informations pertinentes dans le champ de recherche approprié et de cliquer sur le bouton "Rechercher". Les résultats de la recherche afficheront les utilisateurs correspondants à vos critères de recherche.</p>
 
<h3>Recherche des annonceurs</h3>
<p>Si vous souhaitez trouver des annonceurs spécifiques, vous pouvez effectuer une recherche de tout les utilisateur.
     Utilisez le champ de recherche dédié aux annonceurs, saisissez les détails souhaités, puis cliquez sur "Rechercher" pour obtenir les résultats correspondants.</p>

<h3>Recherche des documents</h3>
<p>La recherche de documents vous permet de trouver des fichiers spécifiques dans la base de données.
     Vous pouvez rechercher des documents en fonction de leur titre, de le format de fichier, par utilisateur ayant publié le ou les documents.
     Il vous suffit d'entrer les détails souhaités dans le champ de recherche des documents et de cliquer sur "Rechercher" 
     pour afficher les résultats correspondants.</p>

<h3>Recherche des messages des utilisateurs</h3>
<p>Si vous souhaitez rechercher des messages envoyés par les utilisateurs, vous pouvez utiliser la fonction de recherche dédiée. 
    Vous pouvez rechercher des messages en fonction de leur contenu, du nom de l'expéditeur, et de son mail.
    . Saisissez les informations appropriées dans le champ de recherche des messages et cliquez sur "Rechercher" pour afficher les résultats correspondants.</p>

<p>La fonction de recherche dans la base de données vous permet de trouver rapidement des informations spécifiques et d'accéder aux données pertinentes pour gérer votre application de manière efficace. Utilisez ces fonctionnalités de recherche pour optimiser votre travail d'administration.</p>
</div>

<style>
    .texte_crud_explicatif {
  margin: 0 auto;
  padding: 20px;
  text-align: center;
  width: 80%;
}

@media screen and (max-width: 768px) {
  .texte_crud_explicatif {
    font-size: 14px;
    width: 95%;
  }
}
</style>
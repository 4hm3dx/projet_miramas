<header>
    <!-- Barre de navigation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style=" width: 100%;">
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

<main>
<form action="?controller=message&action=all_message_mail_list" method="POST" class="form_crud">
    <fieldset>
        <legend>Recherche d'un message E-mail</legend>
        <select name="mail_message" id="mail_message">
            <?php foreach ($mail_message as $m) : ?>
                <option value="<?= $m->mail ?>"><?= $m->mail ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Rechercher" name="submit">
        </fieldset>
    </form>
    

    <?php     
if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Date d'envoi</th>
                <th>Objet</th>
                <th>Message</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mail_message_list as $ml) : ?>
                <tr>
                    <td class="td"> <?= $ml->nom ?> </td>
                    <td class="td"> <?= $ml->prenom ?> </td>
                    <td class="td"> <?= $ml->mail ?> </td>
                    <td class="td"> <?= $ml->date_message ?></td>
                    <td class="td"> <?= $ml->object ?> </td>
                    <td class="td"> <?= $ml->message ?> </td>
                    <td class="trash td"><a href="?controller=message&action=delete_message&id=<?= $ml->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i></a> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php 
endif;
 ?>
 </main>
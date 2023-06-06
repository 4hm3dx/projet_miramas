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
<main>
<form action="?controller=annonce&action=update_annonce" method="post" id="addForm">
	<fieldset>
		<legend id="legend"><b>Modifier les informations d'un utilisateur</b></legend>
		<input type="text" name="id" value="<?= $annonce['id'] ?>">
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" value="<?= filter_var($annonce['nom'], FILTER_SANITIZE_STRING) ?>">
		<label for="texte">Texte :</label>
		<input type="text" name="texte" id="texte"
			value="<?= filter_var($annonce['texte'], FILTER_SANITIZE_STRING) ?>">
		<label for="image">Image : <sup>*</sup> <i class="fa-regular fa-circle-question"
				title="Votre fichier ne doit pas depasser les 5Mo et etre au format suivant : .png, .jpg, .jpeg, .mp3, .mp4."></i></label>
		<input type="file" name="image" id="image" value="<?= valid_input($annonces['image']) ?>">
		<input type="submit" value="Modifier" name="submit" id="submit_update">
		<p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné | 4 =>
			Visiteur qui a envoyé un message</p>
	</fieldset>
</form>

</main>

<?php function valid_input($data)
{
	//todo Supprime les espaces en début et fin de chaîne
	$data = trim($data);
	//todo Supprime les barres obliques inverses de la chaîne
	$data = stripslashes($data);
	//todo Supprime les balises et les caractères spéciaux
	$data = filter_var($data, FILTER_SANITIZE_STRING);
	//todo Convertit les caractères spéciaux en entités HTML
	$data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	//todo Encode les caractères spéciaux en UTF-8
	$data = filter_var($data, FILTER_SANITIZE_ENCODED);
	//todo Retourne la chaîne de caractères validée
	return $data;
} ?>

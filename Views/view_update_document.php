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
<form action="?controller=document&action=update_document" method="post" id="addForm">
    <fieldset>
        <legend id="legend"><b>Modifier les informations d'un document</b></legend>
        <input type="hidden" name="id" value="<?= $document['id'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= filter_var($document['nom'], FILTER_SANITIZE_STRING ) ?>">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= filter_var($document['titre'], FILTER_SANITIZE_STRING ) ?>">
        <label for="description">Description : </label>
        <input type="text" name="description" id="description" value="<?= filter_var($document['description'], FILTER_SANITIZE_STRING) ?>">
        <label for="date_publication">Date Publication : </label>
        <input type="date" name="date_publication" id="date_publication" value="<?= filter_var($document['date_publication'], FILTER_SANITIZE_NUMBER_INT) ?>">
        <label for="libelle">Libellé : </label>
        <input type="text" name="libelle" id="libelle" value="<?= filter_var($document['libelle'], FILTER_SANITIZE_STRING) ?>">
        <label for="affichage">Affichage : </label>
        <input type="text" name="affichage" id="affichage" value="<?= filter_var($document['affichage'], FILTER_SANITIZE_STRING) ?>">
        <label for="image">Image : <sup>*</sup> <i class="fa-regular fa-circle-question" title="Votre fichier ne doit pas depasser les 5Mo et etre au format suivant : .png, .jpg, .jpeg, .mp3, .mp4."></i></label>
        <input type="file" name="image" id="image" value="">
        <input type="submit" value="Modifier" name="submit" id="submit">
    </fieldset>
</form>

</main>
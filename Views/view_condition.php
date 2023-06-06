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
<section id="Mention_legal">
<h1>Mentions légales</h1>
<p class="detail_mention_legal">Conformément à la LOI n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique :</p>
<div class="information_hebergement">
    <div class="information_editeur">
        <h4>Informations éditeur</h4>
        <hr>
        <p>
            <b>Editeur </b>: Simplon, société par actions simplifiée au capital social de 17.780 euros 
            <br>
            SIREN 493 505 887 (RCS d’Annecy)TVA Intracommunautaire : FR77493505887 
            <br>
            61-81 avenue Charles de Gaulle 
            <br>
            74800 La Roche sur Foron 
            <br>
            04 58 00 14 21contact@codeur.com
            <b>Directeur</b> de la publication : Alex Daniel
    </p>
    </div>
    <div class="hebergement">
        <h4>Hébergement</h4>
        <hr>
        <p>
            Simplon 
            <br>
            2à boulevard Madeleine Rémusat 
            <br>
            13013 Marseille 
            <br>
            Tél : 04.96.46.44.87
        </p>
    </div>
</div>
<h3>Conditions d'utilisation</h3>
<p class="contenue_text">
Toute personne qui accède au site codeur.com s'engage à respecter les présentes conditions d'utilisation, 
qui pourront pour certains services être complétées par des conditions particulières. 
Les données diffusées sur le réseau internet et extranet peuvent être réglementées en termes d'usage ou 
être protégées par un droit de propriété.
</p>

<h3>Protection des données personnelles</h3>
<p class="contenue_text">
Nous vous invitons à prendre connaissance de notre <b>politique de confidentialité</b> qui présente les règles de protection 
des données personnelles dans le cadre de l'utilisation de notre plateforme.
</p>
</section>
</main>
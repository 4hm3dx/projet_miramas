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
<div id="presntation_partenaire">
	<img src="Content/img/gille.png" alt="#" id="partenaire_1">
	<img src="Content/img/lemiramar.png" alt="#" id="partenaire_2">
	<img src="Content/img/creperie.png" alt="#" id="partenaire_3">
</div>

<section id="detail_presentation_partenaire">
	<div class="partenaire_numero_1">
		<a href="https://www.glacierlequille.com/"><img src="Content/img/partenaire_grillé_glacier.png"
				alt="Notre partenaire le grillé glacier" id="img_couverture_partenaire1"></a>
		<p class="text_partenaire1">
			Il était une fois... <b>le Quillé </b>!
		</p>
		<p class="text_partenaire1">
			Notre enseigne de Miramas-le-Vieux, créée en 1982 et nichée dans les anciens remparts du village médiéval, a
			désormais deux petites sœurs à La Roque-d'Anthéron et Saint-Maximin : encore plus d'occasions de savourer
			nos glaces artisanales sur une terrasse perchée, dans un intérieur chaleureux ou au cœur d'une place
			provençale constellée de platanes.
		</p>
		<p class="text_partenaire1">
			Une table en terrasse
			Miramas-le-Vieux, La Roque-d'Anthéron, Saint-Maximin : dans ces trois lieux formant un triangle gourmand en
			Provence, les valeurs qui font notre réputation restent inchangées depuis bientôt quarante ans.
		</p>
	</div>
	<div class="partenaire_numero2">
		<a href="https://lemiramarlevieux.fr/"><img src="Content/img/miramar.png" alt=""
				id="img_couverture_partenaire2"></a>
		<p class="text_partenaire2">
			<b>Le Saviez-vous ?</b><br>
			Le soi-disant etang de berre, situé en contre bas du restaurant, est en réalité une mer. Elle est salée, et
			oui … cette mer communique avec la méditerranée par le canal de martigues.
		</p>
		<p class="text_partenaire2">
			les pêcheurs professionnels de la mer de berre vous proposent des poissons méditerranéens tels que le loup,
			la daurade, … depuis quelques temps, on y trouve aussi des moules, coques & crevettes grises qui ne sont pas
			encore commercialisées.
			voilà d’où vient le nom de miramas qui à l’époque s’appelait miramar, ce qui signifiait vue sur la mer (de
			berre, bien sûr). Le restaurant « le miramar » trouve ainsi toute sa place avec sa vue panoramique.
		</p>
		<p class="text_partenaire2">
			Au coeur de ce cadre exceptionnel, nos plats sont faits-maison et les produits sélectionnés avec soin par
			notre Chef. Souhaitant respecter, le plus possible, la saisonnalité des produits : nous proposons tout au
			long de l’année des suggestions en plus de notre carte.
		</p>
	</div>
	<div class="partenaire_numero3">
		<a href="https://www.lemisto.com/"><img src="Content/img/lemisto.png" alt="Notre partenaire le misto"
				id="img_couverture_partenaire3"></a>
		<p class="text_partenaire3">
			<b>Le Misto</b> est une Crêperie-Glacier surplombant la baie de l'étang de Berre.
		</p>
		<p class="text_partenaire3">
			C'est en 2018 que deux frères, Mathieu et Michaël ont décidé de donner une nouvelle vie au Misto, avec la
			volonté d'en faire un lieu convivial et familial à leur image.
		</p>
		<p class="text_partenaire3">
			L'excellence des produits, la qualité du service et l'innovation sont les maîtres mots de l'établissement
			dont le but est de vous offrir un moment inoubliable.
		</p>
		<p class="text_partenaire3">
			Mot Italien signifiant "Mixte", Le Misto c'est avant tout un mélange entre saveur et bonheur. <br>
			Ete comme hiver, à l'extérieur ou à l'intérieur, vous n'oublierez jamais d'être venu au misto
		</p>
	</div>
</section>
</main>
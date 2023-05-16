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
<section id="texte_image_presentation">
<div class="image_presentation">
        <img src="Content/img/croix_jubilé.jpg" alt="Image de presentation du site" id="img_presentation"><sub class="legend_img_presentation">Croix jubilé de 1874 | Situé a l'entre du village</sub>
    </div>
    <div class="texte_presentation">
        <p>
            C'est en 1976 que l'association des Amis du vieux Miramas voit le jour. <br>
            "Les anciens avaient bien travaillé pour animer le village avec de belles manifestations dont beaucoup se souviennent.
            Mais l'association est mise en sommeil en 1987 et en 2011, avec quelques bénévoles nous avons relancé son activité". 
             <br>
            Parmi les bénévoles, Gabriella Galland qui réside au village depuis 1996 précise que "dans les années 80, <br>
            Miramas le Vieux était surtout réputé pour ses glaciers d'où la venue d'un public nombreux et la multiplication de 
            nuisances pour les habitants. <br> L'association devenait un lieu de revendications, loin de l'objectif initial. <br></p>
        <p>
            Nous partageons avec d'autres l'envie de sauvegarder ce petit 
            bijou qu'est notre village et de valoriser son patrimoine. <br>
             Les adhérents n'envisagent pas de grandes manifestations, ils souhaitent simplement créer des contacts entre les habitants, créer une dynamique pour attirer les amoureux du 
            village. <br>
        </p>    
        <p>
            Pour cela l'association utilise les lieux propices comme la place Guy Salomon pour la projection de films. <br>
            L'église Notre Dame de Beauvezer et la chapelle Saint Julien servent d'écrin pour diverses manifestations, 
            soirées contes, concerts, lectures, soirée lyrique, chorale... <br> <br>
            Actuellement l'association compte une trentaine d'adhérents. <br>
            "Nous entretenons de bonnes relations avec l'office de tourisme qui depuis quelques années a 
            ouvert un point d'accueil sur le village pendant l'été. <br>
            Nous avons ainsi réalisé une exposition qui a eu un réel succès, sur la vie du village avec des photos et 
            des cartes postales anciennes que nous ont confié les habitants".</p>
    </div>
 
</section>
<img src="Content/img/eglise.jpg" alt="Image de couverture de miramas le vieux" id="img_couveture">
<section id="presentation_collab_asso">
    <div class="texte_presentation_asso">
        <p class="presentation_colab_asso">
        <b>L'association des amis du Vieux Miramas</b> est une association Loi 1901 
        dont le but est d'agir pour la protection et la sauvegarde d'un lieu 
        architectural reconnu: le village de Miramas-le-Vieux, classé monument 
        historique.
        </p>
        <br>
        <p class="presentation_colab_asso">
        Pour cela, notre association, outre le fait de permettre à toute 
        personne désireuse de faire connaitre ce village et sa richesse 
        patrimoniale en assurant un lien régulier, organise des activités en 
        lien avec la mise en valeur, la préservation du site: exposition, 
        concert, rencontres, éditiions de documents, etc.
        </p>
        <br>
        <p class="presentation_colab_asso">
        Cette association a été créée le 1° décembre 1976. Son siège social est 
        maintenant situé à Miramas-le-Vieux dans le local de l'ancienne mairie, 
        place des Cigales. <br>
        Son adhésion est ouverte à toute personne désireuse d'oeuvrer pour la 
        sauvegarde de ce patrimoine historique pittoresque et son rayonnement.

        </p>

        <!-- L'association <b>Les Amis du Vieux Miramas</b> a été fondée pour préserver et promouvoir le patrimoine culturel et historique de la région 
        de Miramas-le-Vieux, en Provence. <br>
        Nous organisons des visites guidées du village médiéval, des conférences et des événements culturels pour permettre aux visiteurs 
        de découvrir les richesses de notre patrimoine.
        </p>
        <br>
        <p class="presentation_colab_asso">
        Notre équipe est composée de bénévoles passionnés par l'histoire et la culture provençale, 
        qui mettent tout en œuvre pour offrir des expériences authentiques et mémorables aux visiteurs. <br>
        Nous sommes fiers de travailler main dans la main avec les habitants de Miramas-le-Vieux pour préserver ce joyau 
        de la Provence pour les générations futures.
        </p>
        <br>
        <p class="presentation_colab_asso">
        Si vous êtes intéressé par l'histoire et la culture provençale, nous vous invitons à nous rejoindre lors
         de nos prochaines visites guidées ou événements culturels. Vous pouvez également soutenir notre association en devenant 
         membre ou en faisant un don pour nous aider à continuer notre travail important de préservation du patrimoine de Miramas-le-Vieux.
        </p> -->
    </div>
</section>
<section id="mebre_equipe">
    <div class="membre1">
        <img src="Content/img/MichelGalland-President.jpg" alt="Presntation du President" class="presentation_equipe">
        <p>
            Michel GALLAND <br>
            President
        </p>
</div>
<div class="membre3">
    <img src="Content/img/CristopheBuquet-VicePresident.jpg" alt="Presntation du vice president" class="presentation_equipe">
    <p>
        Cristophe BUQUET <br>
        Vice-Président
    </p>
</div>
<div class="membre2">
    <img src="Content/img/PascaleCarpentier-Tresoriere.jpg" alt="Presntation du trésorier" class="presentation_equipe">
    <p>
    Pascale CARPENTIER <br>
        Trésorière
    </p>
</div>
    <!-- <div class="membre4">
        <img src="Content/img/membre_equipe.png" alt="Presntation du ...">
        <p>
            John Doe <br>
            President
        </p>
</div>
    <div class="membre5">
        <img src="Content/img/" alt="Presntation du ...">
        <p>
            John Doe <br>
            President
        </p>
</div>
    <div class="membre6">
        <img src="Content/img/membre_equipe.png" alt="Presntation du ...">
        <p>
            John Doe <br>
            President
        </p> -->
</div>
</section>
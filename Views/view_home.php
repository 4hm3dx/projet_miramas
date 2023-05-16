<header>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
<section id="image_text_presnetation_asso">
    <img src="Content/img/img_accueil1.jpg" alt="#" id="image_accueil_prototype">
    <h1 class="titre"> MIRAMAS-LE-VIEUX</h1>
    <p class="text_accueil">
        Miramas-le-Vieux est un village charmant et pittoresque situé dans les Bouches-du-Rhône, en Provence. Perché sur
        une colline,
        il offre une vue imprenable sur la plaine de la Crau et les Alpilles. La cité médiévale, nommée pour la première
        fois dans une
        charte médiévale datée de 1118, était autrefois une place forte défensive et a été longtemps une possession des
        moines de l’abbaye
        de Montmajour jusqu’à la Révolution.
    </p>
    <p class="text_accueil">
        Avec ses ruelles sinueuses et ses maisons en pierre, le village médiéval est célèbre pour son château datant du
        XIIIe siècle,
        les vestiges de rempart, les ruines du château, la porte Notre-Dame et la chapelle Saint-Julien. Le village est
        également le
        foyer de l'association Les Amis du Vieux Miramas, qui s'engage pour la préservation et la promotion du
        patrimoine culturel et
        historique de la région. Les activités de l'association comprennent des visites guidées du village, des
        conférences et des événements
        culturels.
    </p>
    <p class="text_accueil" id="last_text">
        Avec sa centaine d'habitants, Miramas-le-Vieux est un lieu de promenade idéal pour les amateurs d'histoire et de
        culture.
        Les visiteurs peuvent flâner dans les rues étroites et explorer les environs à pied ou à vélo. Avec ses
        panoramas époustouflants,
        son architecture pittoresque et son ambiance paisible, Miramas-le-Vieux est un véritable joyau médiéval
        provençal qui pourrait être
        classé comme l’un des plus beaux villages de France.
    </p>
    </div>
</section>
<section class="mignature_image">
    <div class="image_mini">
        <div class="mignature1">
            <img src="Content/img/carte-postale-miramas-23134.jpg" alt="#" id="prototype_mignature1">
            <p class="acces_au_village">LE VILLAGE</p>
            <p class="text_accueil">
                Village perché, Miramas-le-Vieux, dit le « Quillé » offre un panorama d’exception sur une côte sauvage
                insoupçonnée bordée par le parc de la Poudrerie. <br> <br>
                La diversité des paysages qui entourent le village, source de
                nombreuses balades, <br> ne peut laisser personne indifférent. <br><br>
                ➜ Visite recommandée par <a class="link_michelin"
                    href="https://voyages.michelin.fr/europe/france/provence-alpes-cote-dazur/bouches-du-rhone/miramas/miramas-le-vieux"
                    target="_blank">Michelin
                    Voyage</a>
            </p>
        </div>
        <div class="mignature2">
            <img src="Content/img/arbre_cedre.jpg" alt="#" id="prototype_mignature2">
            <p class="acces_au_village">ACCÈS AU VILLAGE</p>
            <p class="text_accueil">
                Miramas-le-Vieux est un village médiéval authentique qui regorge d’atouts typiques des villages
                provençaux : pierres,
                placette, glaciers, etc. <br>
                L’accès se fait par : <br></p>
            <ul>
                <li class="liste_acces_village">Saint-Chamas en venant de l'est.</li>
                <li class="liste_acces_village">Miramas-Gare en venant de l'ouest.</li>
            </ul>
            <p class="text_accueil">Ces deux routes convergent au bout d’une allée de pins, au pied du village.</p>
        </div>
    </div>
</section>
<section id="video_accueil">
    <h2 class="titre_video">Découvrir la ville</h2>
    <video width="940" height="660" controls id="prototype_video">
        <source src="Content/video/Découvrez_Miramas.mp4" type="video/mp4">

        Votre navigateur ne supporte pas la lecture de vidéos.
    </video>
</section>
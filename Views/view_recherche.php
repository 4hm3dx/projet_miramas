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
<section id="test_affichage_fomr_aside">
<aside class="suggestion_dernier_post">
    <h2 class="titre_dernier_document_ajout">Ajout Récent</h2>
    <ul class="liste">
        <?php foreach ($derniers_documents as $d) : ?>
            <li class="liste">
                <div class="dernier_post">
                    <h5 class="titre_dernier_post"><?php echo $d->titre ?></h5>
                    <img class="image_dernier_post" src="data:image/jpg;base64,<?php echo base64_encode($d->fichier) ?>" />
                </div><hr>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>

<?php// if ($position == 1) : ?>
<form action="?controller=recherche&action=recherche_document" method="POST" id="formulaire_recherche_document">
  <fieldset id="fieldset_formulaire_recherche">
<label for="select_titre" class="select_titre">Recherche par titre</label>
<select name="select_titre" id="select_titre">
  <option value="Choisissez un titre" disabled selected>Choisissez un titre</option>
  <?php foreach ($select_titre as $st) : ?>
  <option value="<?= $st->titre ?>"><?= $st->titre ?></option>
  <?php endforeach ?>
</select>  
    <input type="submit" id="submit_recherche_titre" name="submit_recherche_titre">
</form>

<form action="?controller=recherche&action=recherche_categorie" method="POST" id="formulaire_recherche_categorie">
  <label for="select_categorie" class="select_categorie">Recherche par catégorie</label>
  <select name="select_categorie" id="select_categorie">
    <option value="" disabled selected>Choisissez la catégorie</option>
    <?php foreach ($select_categorie as $s): ?>
      <option value="<?= $s->id ?>"><?= $s->libelle ?></option>
    <?php endforeach ?>
  </select>
  <input type="submit" id="submit_recherche_categorie" name="submit_recherche_categorie">
</form>
<form action="?controller=recherche&action=recherche_format" method="POST" id="formulaire_recherche_format">
  <label for="select_format" class="select_format">Recherche par format de fichier</label>
  <select name="select_format_fichier" id="select_format_fichier">
    <option value="" disabled selected>Choisissez le format</option>
    <?php foreach ($select_format_fichier as $s): ?>
      <option value="<?= $s->format ?>"><?= $s->format ?></option>
    <?php endforeach ?>
  </select>
  <input type="submit" id="submit_recherche_format" name="submit_recherche_format">
  <?php // var_dump($select_format_fichier); ?>
  </fieldset>
</form>
<br />
<?php // endif; ?>
</section>

<?php if ($position == 2): ?>
  <?php foreach ($recherche_categorie as $ac): ?>
<div class="resulat_recherche_document">
  <h1><?= $ac->titre ?></h1>
  <div class="affichage_document_recherche">
  <img class="img_document_recherche"src="data:image/<?php echo pathinfo($ac->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($ac->fichier); ?>" />
  <p> <?= $ac->description ?> </p>
  <div class="date_nom_recherche"></div>
  <sup class="sup_document_recherhe"><?= $ac->date_publication ?></sup>
  <sub class="sub_document_recherche"><?= $ac->nom  ?></sub>
  </div>
</div>
</div>
  <?php endforeach; ?>
  <?php endif; ?>
  
 

<?php if ($position == 3): ?>
  <?php foreach ($recherche_format as $s): ?>
    <div class="resulat_recherche_document">   
    <h1><?= $s->titre ?></h1>
    <div class="affichage_document_recherche">
    <img src="data:image/<?php echo pathinfo($s->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($s->fichier); ?>" />
    <p><?= $s->description ?></p>
  </div>
  <sup class="sup_document_recherhe_formart" id="sup_document"><?= $s->date_publication ?></sup>
  <sub class="sub_document_recherche_format"><?= $s->nom ?></sub>
</div>
  <?php endforeach; ?>
<?php endif; ?>

<?php if ($position == 4): ?>
  <?php foreach ($recherche_titre as $rt): ?>
    <div class="resulat_recherche_document">
    <h1><?= $rt->titre ?></h1>    
  <div class="affichage_document_recherche">
  <img src="data:image/<?php echo pathinfo($rt->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($rt->fichier); ?>" />
    <p><?= $rt->description ?></p>
    <sup class="sup_document_recherhe"> <?= $rt->date_publication ?> </sup>     
    <sub class="sub_document_recherche"><?= $rt->nom ?> </sub>
</div>  
</div>
     <?php endforeach; ?>
<?php endif; ?>
</main>
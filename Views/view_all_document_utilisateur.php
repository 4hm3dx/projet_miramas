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
<form action="?controller=document&action=all_utilisateur_document_list" method="POST" class="form_crud">
    <fieldset>
        <legend>Recherche de documents par Utilisateurs</legend>
        <select name="utilisateur_document" id="utilisateur_document">
            <?php foreach ($utilisateur_document as $ud) : ?>
                <option value="<?= $ud->nom ?>"><?= $ud->nom ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="submit">
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Titre</th>
                <th>Format</th>
                <th>Fichier</th>
                <th>Description</th>
                <th>Date de publication</th>
                <th>Catégorie</th>
                <th>Affichage <sup>*</sup></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateur_document_list as $udl) : ?>
                <tr>
                    <td class="td"> <?= $udl->nom ?> </td>
                    <td class="td"> <?= $udl->prenom ?> </td>
                    <td class="td"> <?= $udl->titre ?> </td>
                    <td class="td"> <?= $udl->format ?> </td>
                    <td class="td"><img src="data:image/<?php echo pathinfo($udl->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($udl->fichier); ?>" /></td>
                    <td class="td"> <?= $udl->description ?> </td>
                    <td class="td"> <?= $udl->date_publication ?></td>
                    <td class="td"><?= $udl->libelle ?></td>
                    <td class="td"><?= $udl->affichage ?></td>
                    <td class="td"><a href="?controller=document&action=update_document&id=<?= $udl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash td">
      <a href="?controller=document&action=delete_document&id=<?= $udl->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
      <i class="fa fa-trash"></i></a>   </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <sup class="information_boolean">Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
<?php endif; ?>
</main>
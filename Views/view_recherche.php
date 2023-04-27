<aside class="suggestion_dernier_post">
    <h2 class="titre_dernier_document_ajout">Derniers documents ajoutés</h2>
    <ul class="liste">
        <?php foreach ($derniers_documents as $d) : ?>
            <li class="liste">
                <div class="dernier_post">
                    <h5 class="titre_dernier_post"><?php echo $d->titre ?></h5>
                    <img class="image_dernier_post" src="data:image/jpg;base64,<?php echo base64_encode($d->fichier) ?>" /><hr>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>


<form action="?controller=recherche&action=recherche_document" method="POST" id="formulaire_recherche_document">
  <fieldset id="fieldset_formulaire_recherche">
    <legend id="legend_recherche_document">Rechercher un document</legend>
    <label for="recherche_manuel" class="recherche_manuel">Rechercher un document</label>
    <input type="text" name="recherche_manuel" id="recherche_manuel">
    <input type="submit" id="submit_recherche_manuel" name="submit_recherche_manuel">
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
  <?php var_dump($select_format_fichier); ?>
  </fieldset>
</form>
<br />


<?php if ($position !== 2): ?>

  <table class='table table-bordered table-responsive-md bg_table'>
    <thead>
      <tr>
        <th>Titre</th>
        <th>img</th>
        <th>description</th>
        <th>date, auteur</th>

      </tr>
    </thead>

    <body>
      <?php foreach ($recherche_categorie as $ac): ?>
        <tr>
          <td>
            <?= $ac->titre ?>
          </td>
          <td>
            <img
              src="data:image/<?php echo pathinfo($ac->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($ac->fichier); ?>" />
          </td>
          <td>
            <?= $ac->description ?>
          </td>
          <td>
            <?= $ac->date_publication ?>,
            <?= $ac->id_utilisateur ?>
          </td>

        </tr>
      <?php endforeach; ?>
    </body>
  </table>
<?php endif; ?>

<?php if ($position !== 1): ?>


  <table class='table table-bordered table-responsive-md bg_table'>
    <thead>
      <tr>
        <th>Titre</th>
        <th>img</th>
        <th>description</th>
        <th>date, auteur</th>

      </tr>
    </thead>


    <body>
      <?php foreach ($recherche_format as $s): ?>
        <tr>
          <td>
            <?= $s->titre ?>
          </td>
          <td>
            <img
              src="data:image/<?php echo pathinfo($s->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($s->fichier); ?>" />
          </td>
          <td>
            <?= $s->description ?>
          </td>
          <td>
            <?= $s->date_publication ?>,
            <?= $s->id_utilisateur ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </body>
  </table>
<?php endif; ?>
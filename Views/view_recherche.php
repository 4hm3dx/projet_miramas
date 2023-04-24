<aside class="suggestion_dernier_post">
  Suugestion des trois derniere post.
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
      <option value="<?= $s->id ?>"><?= $s->format ?></option>
    <?php endforeach ?>
  </select>
  <input type="submit" id="submit_recherche_format" name="submit_recherche_format">
  </fieldset>
</form>
<br />


<?php if ($position !== 1): ?>

  <table class='table table-bordered table-responsive-md bg_table'>
    <thead>
      <tr>
        <th>Titre</th>
        <th>Raison sociale</th>
        <th>Rue</th>
        <th>Code postal</th>
        <th>Localité</th>

      </tr>
    </thead>

    <body>
      <?php foreach ($recherche_categorie as $ac): ?>
        <tr>
          <td>
            <?= $ac->titre ?>
          </td>
          <td>
            <?= $ac->description ?>
          </td>
          <td>
            <?= $ac->rue_fournisseur ?>
          </td>



        </tr>
      <?php endforeach; ?>
    </body>
  </table>
<?php endif; ?>
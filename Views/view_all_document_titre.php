<form action="?controller=document&action=all_titre_document_list" method="POST">
    <fieldset>
        <select name="titre_document" id="titre_document">
            <legend>Recherche par titre du document</legend>
            <?php foreach ($titre_document as $td) : ?>
                <option value="<?= $td->titre ?>"><?= $td->titre ?></option>
            <?php endforeach ?>
          </select>
          <input type="submit" value="Rechercher" name="titre">
    </fieldset>
</form>

<?php if($position !== 1) : ?>
  <table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Titre</th>
      <th>Format</th>
      <th>Description</th>
      <th>Libellés</th>
      <th>Affichage</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($titre_document_list as $tdl) : ?>
    <tr>
      <td class="td"><?= $tdl->nom ?></td>
      <td class="td"><?= $tdl->prenom ?></td>
      <td class="td"><?= $tdl->titre ?></td>
      <td class="td"><?= $tdl->format ?></td>
      <td class="td"><?= $tdl->description ?></td>
      <td class="td"><?= $tdl->libelle ?></td>
      <td class="td"><?= $tdl->affichage ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $tdl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $tdl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup>Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
<?php endif ?>
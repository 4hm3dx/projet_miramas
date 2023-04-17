<form action="?controller=document&action=all_titre_list" method="POST">
    <fieldset>
        <select name="titre_document" id="titre_document">
            <legend>Recherche par auteur</legend>
            <?php foreach ($titre as $t) : ?>
                <option value="<?= $t->titre ?>"><?= $t->titre ?></option>
            <?php endforeach ?>
          </select>
          <input type="submit" value="Rechercher" name="titre">
    </fieldset>
</form>

<?php if($position !== 1) : ?>
  <?php var_dump($titre_list); ?>
<table class='table'>
  <thead>
    <tr>
      <th>nom</th>
      <th>prénom</th>
      <th>titre</th>
      <th>format</th>
      <th>description</th>
      <th>Libelle</th>
      <th>Affichage</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($titre_list as $tl) : ?>
    <tr>
      <td class="td"><?= $tl->nom ?></td>
      <td class="td"><?= $tl->prenom ?></td>
      <td class="td"><?= $tl->titre ?></td>
      <td class="td"><?= $tl->format ?></td>
      <td class="td"><?= $tl->description ?></td>
      <td class="td"><?= $tl->libelle ?></td>
      <td class="td"><?= $tl->affichage ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $tl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $tl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif ?>
<sup>Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
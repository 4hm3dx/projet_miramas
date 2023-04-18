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
    <?php foreach ($document as $d) : ?>
    <tr>
      <td class="td"><?= $d->nom ?></td>
      <td class="td"><?= $d->prenom ?></td>
      <td class="td"><?= $d->titre ?></td>
      <td class="td"><?= $d->format ?></td>
      <td class="td"><?= $d->description ?></td>
      <td class="td"><?= $d->libelle ?></td>
      <td class="td"><?= $d->affichage ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $d->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $d->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup>Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
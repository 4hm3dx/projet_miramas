<table class='table'>
  <thead>
    <tr>
      <th>nom</th>
      <th>prénom</th>
      <th>texte</th>
      <th>image</th>
      <th>logo</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($annonce as $a) : ?>
    <tr>
      <td class="td"><?= $a->nom ?></td>
      <td class="td"><?= $a->prenom ?></td>
      <td class="td"><?= $a->texte ?></td>
      <td class="td"><?= $a->image ?></td>
      <td class="td"><?= $a->logo ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $u->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $u->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
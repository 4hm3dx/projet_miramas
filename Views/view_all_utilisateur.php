<table class='table'>
  <thead>
    <tr>
      <th>id</th>
      <th>nom</th>
      <th>prénom</th>
      <th>email</th>
      <th>Abonnée</th>
      <th>Annonceur</th>
      <th>Admin</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utilisateur as $u) : ?>
    <tr>
      <td class="td"><?= $u->id ?></td>
      <td class="td"><?= $u->nom ?></td>
      <td class="td"><?= $u->prenom ?></td>
      <td class="td"><?= $u->mail ?></td>
      <td class="td"><?= $u->abonnee ?></td>
      <td class="td"><?= $u->annonceur ?></td>
      <td class="td"><?= $u->admin ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $u->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $u->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


  
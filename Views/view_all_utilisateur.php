<legend style="text-align:center;">Afficher tout les Utilisateurs</legend>
<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>E-mail</th>
      <th>Roles <sup>*</sup></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utilisateur as $u) : ?>
    <tr>
      <td class="td"><?= $u->nom ?></td>
      <td class="td"><?= $u->prenom ?></td>
      <td class="td"><?= $u->mail ?></td>
      <td class="td"><?= $u->id_roles ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $u->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash">
    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $u->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
    </a>
</td>    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné</sup>
 


  
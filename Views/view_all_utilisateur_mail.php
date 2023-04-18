<form action="?controller=utilisateur&action=all_utilisateur_mail_list" method="POST">
    <fieldset>
      <legend>Recherche d'utilisateur E-mail</legend>
        <select name="mail_utilisateur" id="mail_utilisateur">
            <?php foreach ($mail as $m) : ?>
                <option value="<?= $m->mail ?>"><?= $m->mail ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="mail_utilisateur">
        </select>
    </fieldset>
</form>
<?php if ($position == 2) : ?>

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
    <?php foreach ($utilisateur_mail_list as $uml) : ?>
    <tr>
      <td class="td"><?= $uml->nom ?></td>
      <td class="td"><?= $uml->prenom ?></td>
      <td class="td"><?= $uml->mail ?></td>
      <td class="td"><?= $uml->id_roles ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $u->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash">
    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $u->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
    </a>    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup class="information_boolean">Roles utilisateurs : 1 = Roles attribué, 0  Roles non attribué</sup>
<?php endif; ?>
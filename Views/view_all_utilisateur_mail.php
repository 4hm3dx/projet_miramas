<form action="?controller=utilisateur&action=all_utilisateur_mail_list" method="POST">
    <fieldset>
        <select name="utilisateur_mail" id="utilisateur_mail">
            <legend>Recherche d'utilisateur par mail : </legend>
            <?php foreach ($mail as $m) : ?>
                <option value="<?= $m->mail ?>"><?= $m->mail ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="utilisateur_mail">
        </select>
    </fieldset>
</form>
<?php if ($position !== 1) : ?>

<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>E-mail</th>
      <th>Role abonnée</th>
      <th>Role annonceur</th>
      <th>Role admin</th>
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
      <td class="td"><?= $uml->abonnee ?></td>
      <td class="td"><?= $uml->annonceur ?></td>
      <td class="td"><?= $uml->admin ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $uml->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $uml->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup>Roles utilisateurs : 1 = Roles attribué, 0  Roles non attribué</sup>
<?php endif; ?>
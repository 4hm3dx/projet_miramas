<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Objet</th>
      <th>Message</th>
      <th>Date d'envoi</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($message as $m) : ?>
    <tr>
      <td class="td"><?= $m->nom ?></td>
      <td class="td"><?= $m->prenom ?></td>
      <td class="td"><?= $m->mail ?></td>
      <td class="td"><?= $m->object ?></td>
      <td class="td"><?= $m->message ?></td>
      <td class="td"><?= $m->date_message ?></td>
      <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $m->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $m->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<legend style="text-align:center;">Afficher tout les Message</legend>
<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Mail</th>
      <th>Date d'envoi</th>
      <th>Objet</th>
      <th>Message</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($message as $m) : ?>
    <tr>
      <td class="td"><?= $m->nom ?></td>
      <td class="td"><?= $m->prenom ?></td>
      <td class="td"><?= $m->mail ?></td>
      <td class="td"><?= $m->date_message ?></td>
      <td class="td"><?= $m->object ?></td>
      <td class="td"><?= $m->message ?></td>
      <td class="trash">
      <a href="?controller=message&action=delete_message&id=<?= $m->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
      </a>    
    </tr>
    <?php var_dump($message)?>
    <?php endforeach; ?>
  </tbody>
</table>
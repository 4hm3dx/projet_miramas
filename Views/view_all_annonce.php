<legend style="text-align:center;">Afficher tout les Annonceurs</legend>
<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Texte</th>
      <th>Image</th>
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
      <td class="td"><?php
                      $data = base64_decode($a->image);
                      $finfo = new finfo(FILEINFO_MIME_TYPE);
                      $type = $finfo->buffer($data);
                      echo "<img src='data:$type;base64," . base64_encode($data) . "' />";
                      ?></td>
      <td class="td"><a href="?controller=annonce&action=update_annonce&id=<?= $a->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash td">
    <a href="?controller=annonce&action=delete_annonce&id=<?= $a->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
    </a>    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
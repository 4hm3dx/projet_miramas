<legend style="text-align:center;">Afficher tout les Documents</legend>
<table class='table'>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Titre</th>
      <th>Format</th>
      <th>Fichier</th>
      <th>Description</th>
      <th>Libellés</th>
      <th>Affichage <sup>*</sup></th>
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
      <td class="td"><img src="data:image/<?php echo pathinfo($d->fichier, PATHINFO_EXTENSION); ?>;base64,<?php echo base64_encode($d->fichier); ?>" /></td>
      <td class="td"><?= $d->description ?></td>
      <td class="td"><?= $d->libelle ?></td>
      <td class="td"><?= $d->affichage ?></td>
      <td class="td"><a href="?controller=document&action=update_document&id=<?= $d->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash td">
      <a href="?controller=document&action=delete_document&id=<?= $d->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
      <i class="fa fa-trash"></i></a>    
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<sup class="information_boolean">Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
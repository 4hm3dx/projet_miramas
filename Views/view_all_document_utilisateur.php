<form action="?controller=document&action=all_utilisateur_document_list" method="POST">
    <fieldset>
        <legend>Recherche de documents par Utilisateurs</legend>
        <select name="utilisateur_document" id="utilisateur_document">
            <?php foreach ($utilisateur_document as $ud) : ?>
                <option value="<?= $ud->nom ?>"><?= $ud->nom ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="submit">
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Titre</th>
                <th>Format</th>
                <th>Description</th>
                <th>Date de publication</th>
                <th>Libellés</th>
                <th>Affichage <sup>*</sup></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateur_document_list as $udl) : ?>
                <tr>
                    <td class="td"> <?= $udl->nom ?> </td>
                    <td class="td"> <?= $udl->prenom ?> </td>
                    <td class="td"> <?= $udl->titre ?> </td>
                    <td class="td"> <?= $udl->format ?> </td>
                    <td class="td"><?php
                      $data = base64_decode($udl->fichier);
                      $finfo = new finfo(FILEINFO_MIME_TYPE);
                      $type = $finfo->buffer($data);
                      echo "<img src='data:$type;base64," . base64_encode($data) . "' />";
                      ?></td>
                    <td class="td"> <?= $udl->description ?> </td>
                    <td class="td"> <?= $udl->date_publication ?></td>
                    <td class="td"><?= $udl->libelle ?></td>
                    <td class="td"><?= $udl->affichage ?></td>
                    <td class="td"><a href="?controller=document&action=update_document&id=<?= $udl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="trash td">
                    <a href="?controller=document&action=delete_document&id=<?= $udl->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i></a>   </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <sup class="information_boolean">Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
<?php endif; ?>
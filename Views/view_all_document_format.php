<form action="?controller=document&action=all_format_document_list" method="POST">
    <fieldset>
        <legend>Recherche de documents par Format</legend>
        <select name="format_document" id="format_document">
            <?php foreach ($format_document as $fd) : ?>
                <option value="<?= $fd->format?>"><?= $fd->format ?></option>
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
                <th>Affichage</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($format_document_list as $fdl) : ?>
                <tr>
                    <td class="td"> <?= $fdl->nom ?> </td>
                    <td class="td"> <?= $fdl->prenom ?> </td>
                    <td class="td"> <?= $fdl->titre ?> </td>
                    <td class="td"> <?= $fdl->format ?> </td>
                    <td class="td"> <?= $fdl->description ?> </td>
                    <td class="td"> <?= $fdl->date_publication ?></td>
                    <td class="td"><?= $fdl->libelle ?></td>
                    <td class="td"><?= $fdl->affichage ?></td>
                    <td class="td"><a href="?controller=document&action=update_document&id=<?= $fdl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="trash td">
                    <a href="?controller=document&action=delete_document&id=<?= $fdl->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i></a>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <sup class="information_boolean">Affichage des documents : 1 = Affiché, 0 = Masqué</sup>
<?php endif; ?>
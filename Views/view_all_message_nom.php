<form action="?controller=message&action=all_nom_message_list" method="POST">
    <fieldset>
        <legend>Recherche d'un message par Nom</legend>
        <select name="nom_message" id="nom_message">
            <?php foreach ($nom_message as $n) : ?>
                <option value="<?= $n->nom ?>"><?= $n->nom ?></option>
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
                <th>E-mail</th>
                <th>Date d'envoi</th>
                <th>Objet</th>
                <th>Message</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nom_message_list as $nml) : ?>
                <tr>
                    <td class="td"> <?= $nml->nom ?> </td>
                    <td class="td"> <?= $nml->prenom ?> </td>
                    <td class="td"> <?= $nml->mail ?> </td>
                    <td class="td"> <?= $nml->date_message ?></td>
                    <td class="td"> <?= $nml->object ?> </td>
                    <td class="td"> <?= $nml->message ?> </td>
                    <td class="trash"><a href="?controller=message&action=delete_message&id=<?= $nml->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i></a> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
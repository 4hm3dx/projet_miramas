<form action="?controller=message&action=all_message_objet_list" method="POST">
    <fieldset>
        <legend>Recherche d'un message par le nom d'utilisateur :</legend>
        <select name="objet_message" id="objet_message">
            <?php foreach ($objet_message as $om) : ?>
                <option value="<?= $om->object ?>"><?= $om->object ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="objet_message" >
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Objet</th>
                <th>Message</th>
                <th>Date d'envoi</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php var_dump($objet_message_list);
            foreach ($objet_message_list as $oml) : ?>
                <tr>
                    <td class="td"> <?= $oml->nom ?> </td>
                    <td class="td"> <?= $oml->prenom ?> </td>
                    <td class="td"> <?= $oml->mail ?> </td>
                    <td class="td"> <?= $oml->object ?> </td>
                    <td class="td"> <?= $oml->message ?> </td>
                    <td class="td"> <?= $oml->date_message ?></td>
                    <td><a href='?controller=livre&action=update_livre&id=<?= $oml->id ?>'><i class=" fa-solid fa-pen"></i></a></td>
                    <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $oml->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
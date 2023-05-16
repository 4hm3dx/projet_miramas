<form action="?controller=message&action=all_message_mail_list" method="POST" class="form_crud">
    <fieldset>
        <legend>Recherche d'un message E-mail</legend>
        <select name="mail_message" id="mail_message">
            <?php foreach ($mail_message as $m) : ?>
                <option value="<?= $m->mail ?>"><?= $m->mail ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Rechercher" name="submit">
        </fieldset>
    </form>
    

    <?php     
if ($position !== 1) : ?>
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
            <?php foreach ($mail_message_list as $ml) : ?>
                <tr>
                    <td class="td"> <?= $ml->nom ?> </td>
                    <td class="td"> <?= $ml->prenom ?> </td>
                    <td class="td"> <?= $ml->mail ?> </td>
                    <td class="td"> <?= $ml->date_message ?></td>
                    <td class="td"> <?= $ml->object ?> </td>
                    <td class="td"> <?= $ml->message ?> </td>
                    <td class="trash td"><a href="?controller=message&action=delete_message&id=<?= $ml->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i></a> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php 
endif;
 ?>
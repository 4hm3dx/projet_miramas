<form action="?controller=utilisateur&action=all_utilisateur_mail_list" method="POST" class="form_crud">
    <fieldset>
        <legend>Recherche par Nom d'utilisateur</legend>
        <select name="mail_utilisateur" id="mail_utilisateur">
            <?php foreach ($utilisateur_mail as $m) : ?>
                <option value="<?= $m->mail ?>"><?= $m->mail ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="submit" id="submit">
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Roles <sup>*</sup></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateur_mail_list as $uml) : ?>
                <tr>
                    <td class="td"> <?= $uml->nom ?> </td>
                    <td class="td"> <?= $uml->prenom ?> </td>
                    <td class="td"> <?= $uml->mail ?> </td>
                    <td class="td"> <?= $uml->id_roles ?> </td>
                    <td class="td"><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $uml->id ?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="trash td">
                    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $uml->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i>
                    </a></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné | 4 => Visiteur qui a envoyé un message</p>
<?php endif; ?>

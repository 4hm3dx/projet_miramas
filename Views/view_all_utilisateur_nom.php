<form action="?controller=utilisateur&action=all_utilisateur_nom_list" method="POST">
    <fieldset>
        <legend>Recherche par Nom d'utilisateur</legend>
        <select name="nom_utilisateur" id="nom_utilisateur">
            <?php foreach ($utilisateur_nom as $un) : ?>
                <option value="<?= $un->nom ?>"><?= $un->nom ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="utilisateur_nom" id="utilisateur_nom">
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
            <?php foreach ($utilisateur_nom_list as $unl) : ?>
                <tr>
                    <td class="td"> <?= $unl->nom ?> </td>
                    <td class="td"> <?= $unl->prenom ?> </td>
                    <td class="td"> <?= $unl->mail ?> </td>
                    <td class="td"> <?= $unl->id_roles ?> </td>
                    <td class="td"><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $unl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="trash td">
                    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $unl->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i>
                    </a></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné | 4 => Visiteur qui a envoyé un message</p>
<?php endif; ?>

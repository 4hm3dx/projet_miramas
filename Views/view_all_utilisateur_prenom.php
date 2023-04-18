<form action="?controller=utilisateur&action=all_utilisateur_prenom_list" method="POST">
    <fieldset>
        <legend>Recherche par Prénom utilisateur</legend>
        <select name="prenom_utilisateur" id="prenom_utilisateur">
            <?php foreach ($utilisateur_prenom as $up) : ?>
                <option value="<?= $up->prenom ?>"><?= $up->prenom ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" name="utilisateur_prenom">
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
            <?php foreach ($utilisateur_prenom_list as $upl) : ?>
                <tr>
                    <td class="td"> <?= $upl->nom ?> </td>
                    <td class="td"> <?= $upl->prenom ?> </td>
                    <td class="td"> <?= $upl->mail ?> </td>
                    <td class="td"> <?= $upl->id_roles ?> </td>
                    <td><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $u->id ?>"><i class="fa-solid fa-pen"></i></a></td>
      <td class="trash">
    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $u->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
        <i class="fa fa-trash"></i>
    </a>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <sup class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné</sup>
    <?php endif; ?>
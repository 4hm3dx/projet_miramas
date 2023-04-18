<form action="?controller=utilisateur&action=all_utilisateur_prenom_list" method="POST">
    <fieldset>
        <select name="prenom_utilisateur" id="prenom_utilisateur">
            <legend>Recherche par prénom</legend>
            <?php foreach ($utilisateur_prenom as $up) : ?>
                <option value="<?= $up->prenom ?>"><?= $up->prenom ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="utilisateur_prenom">
        </select>
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Role abonnée</th>
                <th>Role annonceur</th>
                <th>Role admin</th>
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
                    <td class="td"> <?= $upl->abonnee ?> </td>
                    <td class="td"> <?= $upl->annonceur ?> </td>
                    <td class="td"> <?= $upl->admin ?></td>
                    <td><a href='?controller=livre&action=update_livre&id=<?= $upl->id ?>'><i class=" fa-solid fa-pen"></i></a></td>
                    <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $upl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
            <sup>Roles utilisateurs : 1 = Roles attribué, 0  Roles non attribué</sup>
    <?php endif; ?>
<form action="?controller=utilisateur&action=all_utilisateur_nom_list" method="POST">
    <fieldset>
        <select name="nom_utilisateur" id="nom_utilisateur">
            <legend>Recherche par nom d'utilisateur</legend>
            <?php foreach ($utilisateur_nom as $un) : ?>
                <option value="<?= $un->nom ?>"><?= $un->nom ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="utilisateur_nom">
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
            <?php foreach ($utilisateur_nom_list as $unl) : ?>
                <tr>
                    <td class="td"> <?= $unl->nom ?> </td>
                    <td class="td"> <?= $unl->prenom ?> </td>
                    <td class="td"> <?= $unl->mail ?> </td>
                    <td class="td"> <?= $unl->abonnee ?> </td>
                    <td class="td"> <?= $unl->annonceur ?> </td>
                    <td class="td"> <?= $unl->admin ?></td>
                    <td><a href='?controller=livre&action=update_livre&id=<?= $unl->id ?>'><i class=" fa-solid fa-pen"></i></a></td>
                    <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $unl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
            <sup>Roles utilisateurs : 1 = Roles attribué, 0  Roles non attribué</sup>
    <?php endif; ?>

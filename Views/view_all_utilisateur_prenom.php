<form action="?controller=utilisateur&action=all_utilisateur_prenom_list" method="POST">
    <fieldset>
        <select name="prenom" id="prenom">
            <legend>Recherche par prénom</legend>
            <?php foreach ($prenom as $p) : ?>
                <option value="<?= $p->prenom ?>"><?= $p->prenom ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="prenom">
        </select>
    </fieldset>
</form>

<?php if ($position !== 1) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>email</th>
                <th>Roles abonnée</th>
                <th>Roles annonceur</th>
                <th>Roles admin</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prenom_list as $pl) : ?>
                <tr>
                    <td class="td"> <?= $pl->nom ?> </td>
                    <td class="td"> <?= $pl->prenom ?> </td>
                    <td class="td"> <?= $pl->mail ?> </td>
                    <td class="td"> <?= $pl->abonnee ?> </td>
                    <td class="td"> <?= $pl->annonceur ?> </td>
                    <td class="td"> <?= $pl->admin ?></td>
                    <td><a href='?controller=livre&action=update_livre&id=<?= $pl->id ?>'><i class=" fa-solid fa-pen"></i></a></td>
                    <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $pl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
            
    <?php var_dump($nom_list); endif; ?>
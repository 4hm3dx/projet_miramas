<form action="?controller=utilisateur&action=all_utilisateur_nom_list" method="POST">
    <fieldset>
        <select name="nomAuteur" id="nomAuteur">
            <legend>Recherche par auteur</legend>
            <?php foreach ($nom as $n) : ?>
                <option value="<?= $n->nom ?>"><?= $n->nom ?></option>
            <?php endforeach ?>
            <input type="submit" value="Rechercher" name="nom">
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
            <?php foreach ($nom_list as $nl) : ?>
                <tr>
                    <td class="td"> <?= $nl->nom ?> </td>
                    <td class="td"> <?= $nl->prenom ?> </td>
                    <td class="td"> <?= $nl->mail ?> </td>
                    <td class="td"> <?= $nl->abonnee ?> </td>
                    <td class="td"> <?= $nl->annonceur ?> </td>
                    <td class="td"> <?= $nl->admin ?></td>
                    <td><a href='?controller=livre&action=update_livre&id=<?= $nl->id ?>'><i class=" fa-solid fa-pen"></i></a></td>
                    <td class='trash'><a href='?controller=utilisateur&action=delete_utilisateur&id=<?= $nl->id ?>' style='color:red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fa fa-trash'></i></a></td>

                </tr>
                <?php endforeach; ?>
            </tbody>
            
    <?php var_dump($nom_list); endif; ?>

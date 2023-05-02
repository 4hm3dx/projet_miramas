<form action="?controller=utilisateur&action=update_utilisateur" method="post" id="addForm">
    <fieldset>
        <legend id="legend"><b>Modifier les informations d'un utilisateur</b></legend>
        <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= filter_var($utilisateur['nom'], FILTER_SANITIZE_STRING) ?>">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= filter_var($utilisateur['prenom']) ?>">
        <label for="mail">Mail :</label>
        <input type="text" name="mail" id="mail" value="<?= filter_var($utilisateur['mail'], FILTER_SANITIZE_EMAIL) ?>">
        <label for="id_roles">Roles Abonnée : </label>
        <input type="text" name="id_roles" id="id_roles" value="<?= filter_var($utilisateur['id_roles'], FILTER_SANITIZE_NUMBER_INT) ?>">
        <input type="submit" value="Modifier" name="submit" id="submit">
        <p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 2 => Annonceur | 3 => Abonné | 4 => Visiteur qui a envoyé un message</p>
    </fieldset>
</form>




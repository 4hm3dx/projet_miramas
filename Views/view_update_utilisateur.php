<form action="?controller=utilsateur&action=update_utilisateur" method="post" id="addForm">

    <fieldset>
        <legend id="legend"><b>Modifier les informtations d'un utilisateur</b></legend>
        <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $utilisateur['nom'] ?>">
        <label for="prenom">Prénom :<sup>*</sup></label>
        <input type="text" name="prenom" id="prenom" value="<?= $utilisateur['prenom'] ?>">
        <label for="mail">Mail :</label>
        <input type="text" name="mail" id="mail" value="<?= $utilisateur['mail'] ?>">
        <label for="abonnee">Roles Abonnée :</label>
        <input type="text" name="abonnee" id="abonnee" value="<?= $utilisateur['abonnee'] ?>">
        <label for="annonceur">Roles Annonceur :</label>
        <input type="text" name="annonceur" id="annonceur" value="<?= $utilisateur['annonceur'] ?>">
        <label for="admin">Roles Admin<sup>*</sup></label>
        <input type="text" name="admin" id="admin" value="<?= $utilisateur['admin'] ?>">
        <input type="submit" value="Modifier" name="submit" id="submit">
    </fieldset>
</form>
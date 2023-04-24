<form action="?controller=document&action=update_document" method="post" id="addForm">
    <fieldset>
        <legend id="legend"><b>Modifier les informations d'un document</b></legend>
        <!--! !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
        <input type="hidden" name="id" value="<?= $document['id'] ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= filter_var($document['nom'], FILTER_SANITIZE_STRING ) ?>">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= filter_var($document['titre'], FILTER_SANITIZE_STRING ) ?>">
        <label for="description">Description : </label>
        <input type="text" name="description" id="description" value="<?= filter_var($document['description'], FILTER_SANITIZE_STRING) ?>">
        <label for="date_publication">Date Publication : </label>
        <input type="date" name="date_publication" id="date_publication" value="<?= filter_var($document['date_publication'], FILTER_SANITIZE_NUMBER_INT) ?>">
        <label for="libelle">Libellé : </label>
        <input type="text" name="libelle" id="libelle" value="<?= filter_var($document['libelle'], FILTER_SANITIZE_STRING) ?>">
        <label for="affichage">Affichage : </label>
        <input type="text" name="affichage" id="affichage" value="<?= filter_var($document['affichage'], FILTER_SANITIZE_STRING) ?>">
        <label for="image">Image : <sup>*</sup> <i class="fa-regular fa-circle-question" title="Votre fichier ne doit pas depasser les 5Mo et etre au format suivant : .png, .jpg, .jpeg, .mp3, .mp4."></i></label>
        <input type="file" name="image" id="image" value="">
        <input type="submit" value="Modifier" name="submit" id="submit">
    </fieldset>
</form>



<?php 
// function valid_input($data)
    // {
        // todo Supprime les espaces en début et fin de chaîne
        // $data = trim($data);
        // todo Supprime les barres obliques inverses de la chaîne
        // $data = stripslashes($data);
        // todo Supprime les balises et les caractères spéciaux
        // $data = filter_var($data, FILTER_SANITIZE_STRING);
        // todo Convertit les caractères spéciaux en entités HTML
        // $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // todo Encode les caractères spéciaux en UTF-8
        // $data = filter_var($data, FILTER_SANITIZE_ENCODED);
        // todo Retourne la chaîne de caractères validée
        // return $data;
    // } 
    ?>
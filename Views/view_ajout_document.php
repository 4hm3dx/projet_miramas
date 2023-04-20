<section id="section-body-ajout-document">
    <section id="section-ajout-document">
        <h2 id="titre-ajout-document">Ajouter des ressources</h2>
        <div id="flex-ajout">
            <div id="division-ajout-document">
            <div class="checkbox-wrapper">
                <button id="popup-toggle-button">Ajouter une catégorie</button>
                   <!-- POPUP -->
             <div class="popup-wrapper">
                        <div class="popup-content">
                            <button class="close-button">&times;</button>
                            <form id="popup-form">
                                <label for="popup-input">Saisissez votre nom:</label>
                                <input type="text" id="popup-input">
                                <input type="submit"  >Soumettre</input>
                            </form>
                        </div>
            </div>
            <form action="?controller=ajout_document&action=ajout_document_bdd" method="POST" enctype="multipart/form-data">
            <label for="titre_document">Titre du document : <sup>*</sup></label>
            <input type="text" name="titre_document" class="titre_document">
            <label for="description_document">Description du document : <sup>*</sup></label>
            <input type="text" name="description_document" class="description_document">
            <label for="date_document">Date de publication : <sup>*</sup></label>
            <input type="date" name="date_document" class="date_document">
            <label for="select_categorie">Catégorie : <sup>*</sup></label>
            <select name="select_categorie" id="select_categorie">
                <?php foreach ($select_document as $sc) : ?>
                    <option value="<?= $sc->id ?>"><?= $sc->libelle ?></option>
                <?php endforeach ?>
            </select>
            <?php var_dump($select_utilisateur)?>
            <select name="select_utilisateur" id="select_utilisateur">
                <?php foreach ($select_utilisateur as $su) : ?>
                    <option value="<?= $su->id ?>"><?= $su->nom ?></option>
                    <?php endforeach ?>
            </select>
                    <input type="file" id="input-file-ajout-document" name="input-file-ajout-document">
                    <input type="submit" name="submit" id="input-submit-ajout-document" value="Ajouter">
                    <input type="reset" id="input-submit-supprimer" value="Annuler">
                </form>
                </div>
            </div>
          
        </div>
    </section>
</section>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
    //Controller se qu'on recois avec $_FILES
    if(isset($_FILES['image'])){
       $files = $_FILES['image'];
    

    if($files['error'] > 0){
        die("Error while uploading");
    }
    
    // tableau pour les extentions que l'on pourra telecharger
    $valideExt = ["jpg", "png", "jpeg", "mp4", "mp3"];
    // Taille des fichier recu 
    $maxSize = 3000000;
    
    //Controler l'extention du fichier envoyer
    $mimeType = mime_content_type($files['tmp_name']);
    $mimeType = explode('/', $mimeType);
    // var_dump(end($mimeType));
    $fileExt = end($mimeType);
    
    //controle si l'extention chargé fait partie de celle que j'autorise
    if (!in_array($fileExt, $valideExt)) {
        die("The file does not have an authorized extension ");
    }
    
    //Controler la taille du fichier 
    if($files['size'] > $maxSize){
        die("This file is too big.");
    }

    // Partie stockage du fichier telechargé 
    $tmpName = $_FILES['image']['tmp_name'];
    $uniqueName = md5(uniqid(rand(), true));
    // pathinfo = Renvoie des informations sur le chemin d'accès à un fichier

    $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $fileName = $uniqueName . '.' . $fileExt;
    $destination = "uploads/" . $fileName;

    $status = move_uploaded_file($tmpName, $destination);
    if(!$status) {
        die("Failed to upload file.");
    }
}}
?>
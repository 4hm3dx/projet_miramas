<form action="#" method="POST" class="formulaire_contact">
  <fieldset class="fieldset_formulaire_contact">
    <legend>Nous Contacter</legend>
    <div class="field-group">
        <label for="nom_utilisateur" class="name-fields" id="label_nom_utilisateur">Nom : <sup>*</sup></label>
        <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="name-fields">
    </div>
    <div class="field-group">
        <label for="prenom_utilisateur" class="name-fields" id="label_prenom_utilisateur">Prénom : <sup>*</sup></label>
        <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="name-fields">
    </div>
    <label for="mail_utilisateur" id="label_mail_utilisateur">Adresse mail : <sup>*</sup></label>
    <input type="email" name="mail_utilisateur" id="mail_utilisateur">
    <label for="object_utilisateur" id="label_object_utilisateur">Objet : <sup>*</sup></label>
    <input type="text" name="object_utilisateur" id="object_utilisateur">
    <label for="contenue_message_form_contact" id="label_textarea">Message : <sup>*</sup></label>
    <textarea name="contenue_message_form_contact" id="contenue_message_form_contact" cols="60" rows="10"></textarea>
    <!--<label for="envoyer_formulaire_contact"></label>-->
    <input type="submit" name="envoyer_formulaire_contact" id="envoyer_formulaire_contact" value="Envoyer le message ">
  </fieldset>
</form>
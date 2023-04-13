
<style>
.suggestion_dernier_post {
  float: left;
  width: 30%;
  height: 595px;
  background: black;
  color: white;
}

#formulaire_recherche_document {
  margin-left: 35%;
  width: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

#fieldset_formulaire_recherche {
  border: 1px solid black;
  padding: 30px;
  border-radius: 15px;
}

.recherche_manuel,
.select_categorie,
.select_format {
  display: block;
  margin-bottom: 10px;
}

#recherche_manuel,
#select_categorie,
#select_format_fichier {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
}

#submit_recherche_manuel,
#submit_recherche_categorie,
#submit_recherche_format {
  display: block;
  margin: 0 auto;
  padding: 10px;
}

#submit_recherche_manuel,
#submit_recherche_categorie,
#submit_recherche_format {
  margin-bottom: 10px;
}

/* CSS pour l'affichage en mode mobile */
@media only screen and (max-width: 768px) {
  h1 {
    font-size: 24px;
  }

  .suggestion_dernier_post {
    float: none;
    width: auto;
    text-align: center;
    margin: 20px auto 0;
  }

  #formulaire_recherche_document {
    margin-left: 0;
    width: 100%;
  }

  #recherche_manuel,
  #select_categorie,
  #select_format_fichier {
    margin-bottom: 10px;
  }
}
	</style>
<aside class="suggestion_dernier_post">
    Suugestion des trois derniere post. 
</aside>

<form action="?controller=recherche&action=recherche" method="POST" id="formulaire_recherche_document">
    <fieldset id="fieldset_formulaire_recherche">
        <legend id="legend_recherche_document">Rechercher un document</legend>
        <label for="recherche_manuel" class="recherche_manuel">Rechercher un document</label>
        <input type="text" name="recherche_manuel" id="recherche_manuel">
        <input type="submit" id="submit_recherche_manuel" name="submit_recherche_manuel">
        <label for="select_categorie" class="select_categorie">Recherche par catégorie</label>
        <select name="select_categorie" id="select_categorie">
            <option value="Categorie">Categorie</option>
            <option value="recherche_categorie">Boucler avec la BDD</option>
        </select>
        <input type="submit" id="submit_recherche_categorie" name="submit_recherche_categorie">
        <label for="select_format" class="select_format">Recherche par format de fichier</label>
            <select name="select_format_fichier" id="select_format_fichier">
                <option value="Format">Format du fichier</option>
                <option value="recherche_format">Boucler avec la BDD</option>
            </select>
            <input type="submit" id="submit_recherche_format" name="submit_recherche_format">
    </fieldset>
</form>
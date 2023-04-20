<?php 

class Controller_ajout_document extends Controller
{
    //* L'action par défaut redirige vers l'action "home"
    public function action_default()
    {
        $this->action_home();
    }

    public function action_ajout_document()
    {
        $model = Model::get_model();
        $select_document = $model->get_ajout_libelle();

        $this->render("ajout_document", compact('select_document'));
    }
    
    public function action_ajout_utilisateur_document()
    {
        $m = Model::get_model();
        $data = ["select_utilisateurs" => $m->get_ajout_utilisateur_document()];
        $this->render("ajout_document", $data);
        var_dump($data);
        // $model = Model::get_model();
        // $select_utilisateur = $model->get_ajout_utilisateur_document();

        // $this->render("ajout_document", compact('select_utilisateurs'));
    }

    public function ajout_categorie()
    {
        $m = Model::get_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $m->get_ajout_categorie();
        }
        $data = ["ajout_categorie" => $m->get_ajout_categorie()];
        $this->render("ajout_document", $data);
    }
    
    public function action_ajout_document_bdd()
    {
        $model = Model::get_model();

        $titre = filter_input(INPUT_POST, 'titre_document', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description_document', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date_document', FILTER_SANITIZE_STRING);
        $categorie = filter_input(INPUT_POST, 'select_categorie', FILTER_SANITIZE_NUMBER_INT);
        $fichier = $_FILES['input-file-ajout-document'];

        // Vérification des champs obligatoires
        if (!isset($titre) || !isset($description) || !isset($date) || !isset($categorie)) {
            // Redirection vers la page d'ajout de document avec un message d'erreur
            $this->redirect('?controller=ajout_document&action=ajout_document&error=1');
            return;
        }

        // Traitement du fichier
        $nom_fichier = '';
        if (isset($fichier['tmp_name']) && $fichier['tmp_name'] != '') {
            $nom_fichier = uniqid() . '.' . pathinfo($fichier['name'], PATHINFO_EXTENSION);
            $destination = __DIR__ . '/../uploads/' . $nom_fichier;
            move_uploaded_file($fichier['tmp_name'], $destination);
        }

        // Insertion du document dans la base de données
        $requete = $model->get_ajouter_document_bdd()->prepare("INSERT INTO document (titre, description, date_publication, id_categorie, fichier) VALUES (:titre, :description, :date_publication, :id_categorie, :fichier)");
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':date_publication', $date);
        $requete->bindParam(':id_categorie', $categorie);
        $requete->bindParam(':fichier', $destination);
        $requete->execute();

        // Redirection vers la page d'accueil avec un message de succès
        $this->redirect('?success=1');
    }
}
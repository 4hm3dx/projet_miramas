<?php
if (isset($_SESSION['user']['id_roles'])) {
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
            $ajout_utilisateur_document = $this->action_ajout_utilisateur();

            $this->action_ajout_utilisateur();
            $this->render("ajout_document", compact(['select_document', 'ajout_utilisateur_document']));
        }

        public function action_ajout_utilisateur()
        {
            $model = Model::get_model();
            return $model->get_ajout_utilisateur_document();
            // var_dump($ajout_utilisateur_document);
            // die();
            // $this->render("ajout_document", compact('ajout_utilisateur_document'));
        }

        public function action_ajout_categorie()
        {
            $m = Model::get_model();
            $ajout_categorie = "test"; // Initialisation de la variable
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $m->get_ajout_categorie($_POST['input_ajout_categorie']);
            }
            $data = ['select_document' => $m->get_ajout_libelle(), 'ajout_utilisateur_document' => $m->get_ajout_utilisateur_document()];
            $this->render("ajout_document", $data);


        }

        public function action_ajout_document_bdd()
        {
            $m = Model::get_model();

            $titre = filter_input(INPUT_POST, 'titre_document', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description_document', FILTER_SANITIZE_STRING);
            $date = filter_input(INPUT_POST, 'date_document', FILTER_SANITIZE_STRING);
            $categorie = filter_input(INPUT_POST, 'select_categorie', FILTER_SANITIZE_NUMBER_INT);
            $fichier = $_FILES['input-file-ajout-document'];

            // Vérification des champs obligatoires
            if (!isset($titre) || !isset($description) || !isset($date) || !isset($categorie)) {
                // Redirection vers la page d'ajout de document avec un message d'erreur
                $this->render('?controller=ajout_document&action=ajout_document&error=1');
                return;
            }

            $data = ["ajout_document_bdd" => $m->get_ajouter_document_bdd($titre, $description, $date, $categorie, $fichier),
     "document" => $m->get_all_document(),
             "select_categorie" => $m->get_recherche(),
     "select_format_fichier" => $m->get_liste_format(),
     "derniers_documents" => $m->get_derniers_documents(),
     'select_titre' => $m->get_recherche_titre(),
     "position" => 1
    ];
    $this->render("recherche", $data);
    }
}
}
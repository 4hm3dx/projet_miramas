<?php

class Controller_utilisateur extends Controller
{
    //* L'action par défaut redirige vers l'action "home"
    public function action_default()
    {
        $this->action_home();
    }


    //* L'action "all_utilisateur" récupère tous les utilisateurs via le modèle et les passe à la vue "all_utilisateur"
    public function action_all_utilisateur()
    {
        $m = Model::get_model();
        $data = ["utilisateur" => $m->get_all_utilisateur()];
        $this->render("all_utilisateur", $data);
    }

    public function action_all_utilisateur_nom()
    {
        $m = Model::get_model();
        $data = ["nom" => $m->get_all_nom(), "position" => 1];
        $this->render("all_utilisateur_nom", $data);
    }
    
    public function action_all_utilisateur_nom_list()
    {
            $m = Model::get_model();
            $data = ["nom_list" => $m->get_all_nom_list(), "nom" => $m->get_all_nom(), "position" => 2];
            $this->render("all_utilisateur_nom", $data);
    }

    public function action_all_utilisateur_prenom()
    {
        $m = Model::get_model();
        $data = ["prenom" => $m->get_all_prenom(), "position" => 1];
        $this->render("all_utilisateur_prenom", $data);
    }
    
    public function action_all_utilisateur_prenom_list()
    {
            $m = Model::get_model();
            $data = ["prenom_list" => $m->get_all_prenom_list(), "prenom" => $m->get_all_prenom(), "position" => 2];
            $this->render("all_utilisateur_prenom", $data);
    }

    public function action_update_utilisateur()
    {
        if (isset($_GET['id'])) {
            // recup utilisateur correspondant à l'ID
            $id = $_GET['id'];
            $m = Model::get_model();
            $data = ["utilisateur" => $m->get_update_utilisateur($id)];
            $this->render("update_utilisateur", $data);
        }
        if (isset($_POST['submit'])) {
            $m = Model::get_model();
            $m->get_update_utilisateur();
            $data = ["utilisateurs" => $m->get_all_utilisateurs()];
            $this->render("all_utilisateur", $data);
        }
    }
}

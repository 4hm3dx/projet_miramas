<?php

class Controller_utilisateur extends Controller
{
       //* L'action par défaut redirige vers l'action "home"
       public function action_default()
       {
           $this->action_home();
       }
   
       //* L'action "home" affiche la vue "home"
       public function action_home()
       {
           $this->render("home");
       }

    //* L'action "all_utilisateur" récupère tous les utilisateurs via le modèle et les passe à la vue "all_utilisateur"
    public function action_all_utilisateur()
    {
        $m = Model::get_model();
        $data = ["utilisateur" => $m->get_all_utilisateur(), "position" => 1];
        $this->render("all_utilisateur", $data);
    }

    public function action_all_utilisateur_nom()
    {
        $m = Model::get_model();
        $data = ["utilisateur_nom" => $m->get_all_utilisateur_nom(), "position" => 1];
        $this->render("all_utilisateur_nom", $data);
    }

    public function action_all_utilisateur_nom_list()
	{
    	$m = Model::get_model();
    	$utilisateur_nom = $m->get_all_utilisateur_nom();

    	if (isset($_POST['utilisateur_nom'])) {
    	    $nom = $_POST['utilisateur_nom'];
    	    $data = ["utilisateur_nom_list" => $m->get_all_utilisateur_nom_list($nom), "utilisateur_nom" => $utilisateur_nom, "position" => 2];
    	    $this->render("all_utilisateur_nom", $data);
    	} else {
        	$this->render("all_utilisateur_nom", ["utilisateur_nom" => $utilisateur_nom, "position" => 1]);
    	}
	}

    public function action_all_utilisateur_prenom()
    {
        $m = Model::get_model();
        $data = ["utilisateur_prenom" => $m->get_all_utilisateur_prenom(), "position" => 1];
        $this->render("all_utilisateur_prenom", $data);
    }

    public function action_all_utilisateur_prenom_list()
	{
    	$m = Model::get_model();
    	$utilisateur_prenom = $m->get_all_utilisateur_prenom();

    	if (isset($_POST['utilisateur_prenom'])) {
    	    $prenom = $_POST['utilisateur_prenom'];
    	    $data = ["utilisateur_prenom_list" => $m->get_all_utilisateur_prenom_list($prenom), "utilisateur_prenom" => $utilisateur_prenom, "position" => 2];
    	    $this->render("all_utilisateur_prenom", $data);
    	} else {
        	$this->render("all_utilisateur_prenom", ["utilisateur_prenom" => $utilisateur_prenom, "position" => 1]);
    	}
	}

    public function action_all_utilisateur_mail()
    {
        $m = Model::get_model();
        $data = ["mail" => $m->get_all_utilisateur_mail(), "position" => 1];
        $this->render("all_utilisateur_mail", $data);
    }

    public function action_all_utilisateur_mail_list()
    {
        $m = Model::get_model();
        $mail_utilisateur = $m->get_all_utilisateur_mail_list();
    
        if (isset($_POST['utilisateur_mail'])) {
            $mail = $_POST['utilisateur_mail'];
            $data = ["utilisateur_mail_list" => $m->get_all_utilisateur_mail_list($mail), "utilisateur_mail" => $mail_utilisateur, "position" => 2];
            $this->render("all_utilisateur_mail", $data);
        }
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

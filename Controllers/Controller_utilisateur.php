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
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $data = ["utilisateur_nom_list" => $m->get_all_utilisateur_nom_list($nom), "utilisateur_nom" => $utilisateur_nom, "position" => 2];
            $this->render("all_utilisateur_nom", $data);
        } else {
            $this->render("all_utilisateur_nom", ["utilisateur_nom" => $utilisateur_nom, "position" => 1]);
        }

        // Ajouter un message de débogage
        echo "La méthode action_all_utilisateur_nom_list() a été appelée.";
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
            $mail = $this->valid_input($_POST['utilisateur_mail']);
            $data = ["utilisateur_mail_list" => $m->get_all_utilisateur_mail_list($mail), "utilisateur_mail" => $mail_utilisateur, "position" => 2];
            $this->render("all_utilisateur_mail", $data);
        }
    }
    
    public function action_update_utilisateur()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $data = ["utilisateur" => $m->get_update_utilisateur($id)];
            $this->render("update_utilisateur", $data);
        } else if (isset($_POST['submit'])) {
            $m = Model::get_model();
            $m->get_update_utilisateur_bdd();
            $data = ["utilisateurs" => $m->get_all_utilisateur()];
            $this->render("all_utilisateur", $data);
        } else {
            header('Location: ?controller=utilisateur&action=all_utilisateur');
        }
    }

    //^ Delete un utilisateur 
    public function action_delete_utilisateur()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $m->get_delete_utilisateur($id);
            // $data = ["utilisateurs" => $m->get_all_utilisateur()];
            // $this->render("all_utilisateur", $data);
            $this->action_all_utilisateur();
            // header("Location: index.php?controller=utilisateur&action=all_utilisateur");
        }
    }

    function valid_input($data)
    {
        //todo Supprime les espaces en début et fin de chaîne
        $data = trim($data);
        //todo Supprime les barres obliques inverses de la chaîne
        $data = stripslashes($data);
        //todo Supprime les balises et les caractères spéciaux
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        //todo Convertit les caractères spéciaux en entités HTML
        $data = htmlspecialchars($data);
        // $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //todo Encode les caractères spéciaux en UTF-8
        $data = filter_var($data, FILTER_SANITIZE_ENCODED);
        //todo Retourne la chaîne de caractères validée
        return $data;
    }
}

<?php

class Controller_message extends Controller
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

    public function action_all_message()
    {
        $m = Model::get_model();
        $data = ["message" => $m->get_all_message()];
        $this->render("all_message", $data);
    }

    // rechercher un message par le nom de l'message qui l'a envoyé
    public function action_all_nom_message()
    {
        $m = Model::get_model();
        $data = ["nom_message" => $m->get_all_nom_message(), "position" => 1];
        $this->render("all_message_nom", $data);
    }

    public function action_all_nom_message_list()
	{
    	$m = Model::get_model();
    	$nom_message = $m->get_all_nom_message();

    	if (isset($_POST['nom_message'])) {
    	    $nom = $_POST['nom_message'];
    	    $data = ["nom_message_list" => $m->get_all_nom_message_list($nom_message), "nom_message" => $nom_message, "position" => 2];
    	    $this->render("all_message_nom", $data);
    	} else {
        	$this->render("all_message_nom", ["nom_message" => $nom_message, "position" => 1]);
    	}
	}
// ^ Mail
	public function action_all_message_mail()
    {
        $m = Model::get_model();
        $data = ["mail_message" => $m->get_all_message_mail(), "position" => 1];
        $this->render("all_message_mail", $data);
    }

    public function action_all_message_mail_list()
    {
        $m = Model::get_model();
        $mail_message = $m->get_all_message_mail();

        if (isset($_POST['mail_message'])) {
            $mail = $_POST['mail_message'];
            $data = ["mail_message_list" => $m->get_all_message_mail_list($mail), "mail_message" => $mail_message, "position" => 2];
            $this->render("all_message_mail", $data);
        }
    }
// ^ Objet
    public function action_all_message_objet()
    {
        $m = Model::get_model();
        $data = ["objet_message" => $m->get_all_message_objet(), "position" => 1];
        $this->render("all_message_objet", $data);
    }

    public function action_all_message_objet_list()
    {
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $m = Model::get_model();
        $objet_message = $m->get_all_message_objet();
    
        if (isset($_POST['objet_message'])) {
            $objet = $_POST['objet_message'];
            $data = ["objet_message_list" => $m->get_all_message_objet_list($objet), "objet_message" => $objet_message, "position" => 2];
            $this->render("all_message_objet", $data);
        }
    }

    // ^ Delete 
    public function action_delete_message()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $m->get_delete_message($id);
            $this->action_all_message();
        }
    }

}

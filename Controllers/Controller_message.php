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

    // rechercher un message par le nom de l'utilisateur qui l'a envoyé
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
    	    $data = ["nom_message_list" => $m->get_all_nom_message_list($nom), "nom_message" => $nom_message, "position" => 2];
    	    $this->render("all_message_nom", $data);
    	} else {
        	$this->render("all_message_nom", ["nom_message" => $nom_message, "position" => 1]);
    	}
	}

	public function action_all_message_mail()
    {
        $m = Model::get_model();
        $data = ["mail_message" => $m->get_all_message_mail(), "position" => 1];
        $this->render("all_message_mail", $data);
    }

    public function action_all_message_mail_list()
{
    $m = Model::get_model();
    $mail_message = $m->get_all_message_mail_list();

    if (isset($_POST['mail_message'])) {
        $nom = $_POST['mail_message'];
        $data = ["mail_message_list" => $m->get_all_message_mail_list($nom), "mail_message" => $mail_message, "position" => 2];
        $this->render("all_message_mail", $data);
    }
}
}

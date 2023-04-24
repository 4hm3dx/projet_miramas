<?php
class Controller_document extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_all_document()
    {
        $m = Model::get_model();
        $data = ["document" => $m->get_all_document()];
        $this->render("all_document", $data);
    }

    public function action_all_titre_document()
    {
        $m = Model::get_model();
        $data = ["titre_document" => $m->get_all_titre_document(), "position" => 1];
        $this->render("all_document_titre", $data);
    }

    public function action_all_titre_document_list()
	{
    	$m = Model::get_model();
    	$titre_document = $m->get_all_titre_document();

    	if (isset($_POST['titre_document'])) {
    	    $titre = $_POST['titre_document'];
    	    $data = ["titre_document_list" => $m->get_all_titre_document_list($titre), "titre_document" => $titre_document, "position" => 2];
    	    $this->render("all_document_titre", $data);
    	} else {
        	$this->render("all_document_titre", ["titre_document" => $titre_document, "position" => 1]);
    	}
	}


    public function action_all_format_document()
    {
        $m = Model::get_model();
        $data = ["format_document" => $m->get_all_format_document(), "position" => 1];
        $this->render("all_document_format", $data);
    }

    public function action_all_format_document_list()
	{
    	$m = Model::get_model();
    	$format_document = $m->get_all_format_document();

    	if (isset($_POST['format_document'])) {
    	    $format = $_POST['format_document'];
    	    $data = ["format_document_list" => $m->get_all_format_document_list($format), "format_document" => $format_document, "position" => 2];
    	    $this->render("all_document_format", $data);
    	} else {
        	$this->render("all_document_format", ["format_document" => $format_document, "position" => 1]);
    	}
	}

    public function action_all_utilisateur_document()
    {
        $m = Model::get_model();
        $data = ["utilisateur_document" => $m->get_all_utilisateur_document(), "position" => 1];
        $this->render("all_document_utilisateur", $data);
    }

    public function action_all_utilisateur_document_list()
	{
    	$m = Model::get_model();
    	$utilisateur_document = $m->get_all_utilisateur_document();

    	if (isset($_POST['utilisateur_document'])) {
    	    $utilisateur = $_POST['utilisateur_document'];
    	    $data = ["utilisateur_document_list" => $m->get_all_utilisateur_document_list($utilisateur), "utilisateur_document" => $utilisateur_document, "position" => 2];
    	    $this->render("all_document_utilisateur", $data);
    	} else {
        	$this->render("all_document_utilisateur", ["utilisateur_document" => $utilisateur_document, "position" => 1]);
    	}
	}

	// ^ update 
	public function action_update_document()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $data = ["document" => $m->get_update_document($id)];
            $this->render("update_document", $data);
        } else if (isset($_POST['submit'])) {
            $m = Model::get_model();
            $m->get_update_document_bdd();
            $data = ["document" => $m->get_all_document()];
            $this->render("all_document", $data);
        } else {
            header('Location: ?controller=document&action=all_document');
        }
    }

   
        // ^ Delete 
        public function action_delete_document()
        {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $m = Model::get_model();
                $m->get_delete_document($id);
                // $data = ["utilisateurs" => $m->get_all_utilisateur()];
                // $this->render("all_utilisateur", $data);
                $this->action_all_document();
                // header("Location: index.php?controller=utilisateur&action=all_utilisateur");
            }
        }
	

}
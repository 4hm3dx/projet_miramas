<?php

class Controller_annonce extends Controller
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

    public function action_all_annonce()
    {
        $m = Model::get_model();
        $date = ["annonce" => $m->get_all_annonce()];
        $this->render("all_annonce", $date);
    }

	    // ^ Delete 
		public function action_delete_annonce()
		{
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$m = Model::get_model();
				$m->get_delete_annonce($id);
				$this->action_all_annonce();
			}
		}

		public function action_update_annonce()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $m = Model::get_model();
            $data = ["annonce" => $m->get_update_annonce($id)];
            $this->render("update_annonce", $data);
        } else if (isset($_POST['submit'])) {
            $m = Model::get_model();
            $m->get_update_annonce_bdd();
            $data = ["annonces" => $m->get_all_annonce()];
            $this->render("all_annonce", $data);
        } else {
            header('Location: ?controller=annonce&action=all_annonce');
        }
    }
	
}

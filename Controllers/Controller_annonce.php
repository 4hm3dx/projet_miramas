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
}

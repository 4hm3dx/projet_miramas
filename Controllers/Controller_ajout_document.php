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
		$this->render("ajout_document");
	}
}
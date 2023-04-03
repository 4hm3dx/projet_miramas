<?php 

class Controller_recherche extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_recherche()
	{
		$this->render("recherche");
	}
}
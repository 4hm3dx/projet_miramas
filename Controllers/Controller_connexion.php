<?php 

class Controller_connexion extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_connexion()
	{
		$this->render("connexion");
	}
}
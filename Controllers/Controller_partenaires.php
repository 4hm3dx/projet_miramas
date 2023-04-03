<?php 

class Controller_partenaires extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_partenaires()
	{
		$this->render("partenaires");
	}
}
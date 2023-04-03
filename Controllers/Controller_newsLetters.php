<?php 

class Controller_newsletters extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_newsletters()
	{
		$this->render("newsletters");
	}

}
<?php 

class Controller_presentation extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_presentation()
	{
		$this->render("presentation");
	}

}
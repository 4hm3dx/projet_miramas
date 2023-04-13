<?php 

class Controller_condition extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_condition()
	{
		$this->render("condition");
	}
}
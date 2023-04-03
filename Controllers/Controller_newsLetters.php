<?php 

class Controller_newsLetters extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_newsLetters()
	{
		$this->render("newsLetters");
	}
}
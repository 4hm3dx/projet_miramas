<?php

class Controller_home extends Controller
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

	public function action_inscription()
	{
		$this->render("inscription");
	}

	public function action_mentions_legals()
	{
		$this->render("mentions_legals");
	}
}
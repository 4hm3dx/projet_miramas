<?php 

class Controller_crud extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_default()
	{
		$this->action_home();
	}

	public function action_crud()
	{
		$this->render("crud");
	}

	public function action_all_utilisateur()
	{
		$m = Model::get_model();
		$data = ["utilisateur" => $m->get_all_utilisateur()];
		$this->render("crud", $data);
	}
}

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
	    $m = Model::get_model();
	    $data = [
	        "select_categorie" => $m->get_recherche(),
	        "select_format_fichier" => $m->get_liste_format(),
	        "derniers_documents" => $m->get_derniers_documents(),
			'select_titre' => $m->get_recherche_titre(),
	        "position" => 1
	    ];
	    $this->render("recherche", $data);
	}

	public function action_recherche_document()
	{
		if (isset($_POST['select_titre'])) {
			$m = Model::get_model();
			$data = ["recherche_titre" => $m->get_submit_document(),
			"select_categorie" => $m->get_recherche(), 
			"select_format_fichier" => $m->get_liste_format(), 
			"derniers_documents" => $m->get_derniers_documents(),
			'select_titre' => $m->get_recherche_titre(),
			"position" => 4];
			$this->render("recherche", $data);
		}
	}

	public function action_recherche_categorie()
	{
		if (isset($_POST['select_categorie'])) {
			$m = Model::get_model();
			$data = ["recherche_categorie" => $m->get_submit_document(), 
			"select_categorie" => $m->get_recherche(), 
			"select_format_fichier" => $m->get_liste_format(), 
			"derniers_documents" => $m->get_derniers_documents(),
			'select_titre' => $m->get_recherche_titre(),
			"position" => 2];
			$this->render("recherche", $data);
		}
	}


	public function action_recherche_format()
	{
		if (isset($_POST['select_format_fichier'])) {
			$m = Model::get_model();
			$data = ["recherche_format" => $m->get_submit_document(),
			 "select_categorie" => $m->get_recherche(), 
			 "select_format_fichier" => $m->get_liste_format(), 
			 "derniers_documents" => $m->get_derniers_documents(),
			 'select_titre' => $m->get_recherche_titre(), 
			 "position" => 3];
			$this->render("recherche", $data);
		}
	}

	// ^ Affichage des 3 derniers post 
// 	public function derniers_documents()
// 	{
// 	// 	$m = Model::get_model();
// 	//     $data = ["derniers_documents" => $m->get_derniers_documents()];
// 	// 	// $derniers_documents = $this->document_model->get_derniers_documents();
// 	//     $this->view->afficher_derniers_documents($derniers_documents);
// 	// }

}
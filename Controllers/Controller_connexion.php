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
	public function action_inscription()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Validation des données d'entrée
			$Nom = filter_input(INPUT_POST, 'nom_utilisateur_inscription', FILTER_SANITIZE_STRING);
			$Prenom = filter_input(INPUT_POST, 'prenom_utilisateur_inscription', FILTER_SANITIZE_STRING);
			$Mail = filter_input(INPUT_POST, 'mail_utilisateur_inscription', FILTER_VALIDATE_EMAIL);
			$Password = filter_input(INPUT_POST, 'mdp', FILTER_UNSAFE_RAW);
			$Password_confirm = filter_input(INPUT_POST, 'confirme_mdp_utilisateur_inscription', FILTER_UNSAFE_RAW);
			$nom_regex = '/^[a-zA-Z\s]{2,30}$/';
			$password_regex = '/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
			$email_regex = '/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/';

			/*if (empty($Nom) || empty($Prenom) || empty($Mail) || empty($Password)) {
			echo 'Certains champs sont vides';
			exit;
			}*/

			$Nom = trim($Nom);
			$Prenom = trim($Prenom);
			$Mail = trim($Mail);
			$Password = trim($Password);
			$Password_confirm = trim($Password_confirm);

			if (!filter_var($Nom, FILTER_SANITIZE_STRING) || !filter_var($Prenom, FILTER_SANITIZE_STRING) || !preg_match($nom_regex, $Nom) || !preg_match($nom_regex, $Prenom)) {
				echo 'Format du nom ou du prénom incorrect';
				exit;
			}

			if (!filter_var($Mail, FILTER_VALIDATE_EMAIL) || !preg_match($email_regex, $Mail)) {
				echo 'Format de l\'adresse mail incorrect';
				exit;
			}


			if (preg_match($password_regex, $Password)) {
				echo 'Format du mot de passe incorrect';
				exit;
			}

			if (!isset($_POST['condition_general'])) {
				echo 'Checkbox non coché';
				exit;
			}

			if (!preg_match($password_regex, $Password_confirm)) {
				echo 'Format du mot de passe incorrect 2';
				exit;
			}

			if ($Password !== $Password_confirm) {
				echo 'Les mots de passe ne sont pas les mêmes';
			}


			// Hash de mot de passe
			$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

			// Insertion dans la base de données via le modèle
			$m = Model::get_model();
			$m->get_inscription($Nom, $Prenom, $Mail, $hashedPassword);

			$this->render("home");
		} else {
			$this->render("connexion");
		}
	}


}
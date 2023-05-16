<?php

class Controller_connexion extends Controller
{
	//* L'action par défaut redirige vers l'action "home"
	public function action_home()
	{
	}

	public function action_default()
	{
		$this->action_home();
	}

	public function action_connexion()
	{
		$this->render("connexion");
	}
	public function action_connexion_utilisateur()
	{

		if (isset($_POST['submit_formulaire_connexion'])) {
			$email = filter_input(INPUT_POST, 'mail_utilisateur_connexion', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'mdp_utilisateur_connexion', FILTER_SANITIZE_STRING);
			$password_regex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/';
			$email_regex = '/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/';

			if (empty($email) || empty($password)) {
				$this->render("connexion");
				var_dump($email);
				var_dump($password);
				echo 'empty';
				exit();
			}

			$email = trim($email);
			$password = trim($password);

			if (!preg_match($email_regex, $email) || !preg_match($password_regex, $password)) {
				echo 'email ou mot de passe incorrect';
				exit();
			}

			$m = Model::get_model();
			$user = $m->get_connexion_utilisateur($email, $password);
			if ($m->get_connexion_utilisateur($email, $password)) {
				// L'utilisateur existe dans la base de données
				// Vérifier si l'utilisateur est admin
				$_SESSION['user'] = array(
					'id' => $user['id'],
					'nom' => $user['nom'],
					'prenom' => $user['prenom'],
					'mail' => $user['mail'],
					'id_roles' => $user['id_roles']
				);


			}

			$this->render("home");
			// header("Location: ?controller=home&action=home");
		}
	}

	public function action_inscription()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Validation des données d'entrée
			$Nom = filter_input(INPUT_POST, 'nom_utilisateur_inscription', FILTER_SANITIZE_STRING);
			$Prenom = filter_input(INPUT_POST, 'prenom_utilisateur_inscription', FILTER_SANITIZE_STRING);
			$Mail = filter_input(INPUT_POST, 'mail_utilisateur_inscription', FILTER_VALIDATE_EMAIL);
			$Password = filter_input(INPUT_POST, 'mdp_utilisateur_inscription', FILTER_UNSAFE_RAW);
			$Password_confirm = filter_input(INPUT_POST, 'confirme_mdp_utilisateur_inscription', FILTER_UNSAFE_RAW);
			$nom_regex = '/^[a-zA-Z\s]{2,30}$/';
			$password_regex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/';
			$email_regex = '/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/';

			if (empty($Nom) || empty($Prenom) || empty($Mail) || empty($Password)) {
				echo 'Certains champs sont vides';
				exit;
			}

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


			if (!preg_match($password_regex, $Password)) {
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
				echo 'Les mots de passe ne sont pas identiques';
				exit;
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

	public function action_deconnexion()
	{
		// Démarre la mise en mémoire tampon
		ob_start();

		// Récupération des informations de cookie actuelles
		$params = session_get_cookie_params();

		// Expire le cookie en le réglant sur hier
		setcookie(session_name(), '', strtotime('-1 day'), $params['path'], $params['domain'], $params['secure'], $params['httponly']);

		// Détruit toutes les variables d'une session
		session_unset();

		// Destruction de la session
		session_destroy();

		// Redirection vers la page d'accueil
		header("Location: ?controller=home&action=home");

		// Vide la sortie mise en mémoire tampon sans l'envoyer au navigateur
		ob_end_clean();

		$this->render("home");
	}


	public function action_page_inscription()
	{
		$this->render('page_inscription');
	}


}
<?php

class Model
{ //* Début de la Classe

    private $bd;

    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    { //* Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=miramas"; //* Coordonnées de la BDD
        $login = "root"; //* Identifiant d'accès à la BDD
        $mdp = ""; //* Mot de passe d'accès à la BDD
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    //* get_model()

    public static function get_model()
    {
        //* Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    // Inscription
    public function get_inscription($Nom, $Prenom, $Mail, $Password)
    {

        $stmt = $this->bd->prepare("SELECT * FROM utilisateur WHERE mail = :Mail");
        $stmt->execute([':Mail' => $Mail]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            exit('Cet email existe déjà');
        }


        $r = "INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `mot_de_passe`, `id_roles`) VALUES (:Nom, :Prenom, :Mail, :Password, '1')";
        $stmt = $this->bd->prepare($r);
        $stmt->execute([
            ':Nom' => $Nom,
            ':Prenom' => $Prenom,
            ':Mail' => $Mail,
            ':Password' => $Password
        ]);

    }

    public function get_connexion_utilisateur($email, $password)
    {
        $requete = "SELECT * FROM `utilisateur` WHERE mail=:email";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['password'])) {
                // Le mot de passe est correct, renvoie l'utilisateur
                return $user;
            } else {
                echo 'mot de passe incorrect';
                // Le mot de passe est incorrect
                return false;
            }
        } else {
            echo 'l\'utilisateur n\'existe pas';
            // L'utilisateur n'existe pas dans la base de données
            return false;
        }
    }

    public function get_message_visiteur($nom, $prenom, $mail, $objet, $message)
    {
        $requete = "SELECT * FROM `utilisateur` WHERE mail=:email AND id_roles=:idr";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':idr', $idr);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // L'adresse mail existe dans la base de données
            $row = $stmt->fetch();

            if ($row['id_roles'] == 4) {
                // Récupérer l'id de l'utilisateur
                $id_utilisateur = $row['id_utilisateur'];

                // Insérer le message dans la table "message" avec la clé étrangère id_utilisateur
                $requete_insert = "INSERT INTO `message` (id_utilisateur, object, message) VALUES (:idu, :obj, :msg)";
                $stmt_insert = $this->bd->prepare($requete_insert);
                $stmt_insert->bindParam(':idu', $id_utilisateur);
                $stmt_insert->bindParam(':obj', $objet);
                $stmt_insert->bindParam(':msg', $message);
                $stmt_insert->execute();
            } else {
                echo 'Veuillez saisir un mail valide';
                exit();
            }


        } else {
            // L'adresse mail n'existe pas dans la base de données, il faut l'insérer
            $requete3 = "INSERT INTO `utilisateur` (nom, prenom, mail, id_roles) VALUES (:nom, :prenom, :email, :idr)";
            $stmt3 = $this->bd->prepare($requete3);
            $stmt3->bindParam(':nom', $nom);
            $stmt3->bindParam(':prenom', $prenom);
            $stmt3->bindParam(':email', $mail);
            $stmt3->bindParam(':idr', $idr);
            $stmt3->execute();

            // Récupérer l'id de l'utilisateur nouvellement inséré
            $id_utilisateur = $this->bd->lastInsertId();

            // Insérer le message dans la table message
            $requete2 = "INSERT INTO `message` (id_utilisateur, objet, contenu) VALUES (:idu, :obj, :cont)";
            $stmt2 = $this->bd->prepare($requete2);
            $stmt2->bindParam(':idu', $id_utilisateur);
            $stmt2->bindParam(':obj', $objet);
            $stmt2->bindParam(':cont', $message);
            $stmt2->execute();
        }
    }

    // RECHERCHE DE DOCUMENT !!! Ici on est au niveau de l'affichage, donc je veut afficher les options qu'il y'a dans mes select

    public function get_recherche()
    {
        $r = $this->bd->prepare("SELECT DISTINCT libelle FROM categorie");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_liste_format()
    {
        $r = $this->bd->prepare("SELECT DISTINCT format FROM document");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    // Submit 

    public function get_submit_document()
    {
        if (isset($_POST['recherche_manuel'])) {

            $r = $this->bd->prepare("SELECT titre, image, description FROM document WHERE titre =:titre");
            $r->bindParam(":titre", $titre);
            $r->execute();

            return $r->fetchAll(PDO::FETCH_OBJ);

        } else if (isset($_POST['select_categorie'])) {

            $liste = $_POST['select_categorie'];
            $r = $this->bd->prepare("SELECT * FROM categorie WHERE libelle = '$liste'");
            $r->execute();
            return $r->fetchAll(PDO::FETCH_OBJ);

        } else if (isset($_POST['select_format_fichier'])) {

            $liste = $_POST['select_format_fichier'];
            $r = $this->bd->prepare("SELECT * FROM document WHERE format = '$liste'");
            $r->execute();
            return $r->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
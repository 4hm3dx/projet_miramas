<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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


    //^ Affichega des utilisateurs
    public function get_all_utilisateur()
    {
        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par prenom
        // ! requete a modifier
        $r = $this->bd->prepare("SELECT u.id, u.nom, u.prenom, u.mail, u.id_roles, r.admin, r.annonceur, r.abonnee FROM utilisateur u
        INNER JOIN roles r ON u.id_roles = r.id");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_nom()
    {
        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par prenom
        $r = $this->bd->prepare("SELECT distinct nom FROM utilisateur;");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_nom_list()
    {
        if (isset($_POST['nom_utilisateur'])) {
            $nom = $this->valid_input($_POST['nom_utilisateur']);

            // Préparer la requête SQL pour sélectionner tous les utilisateurs ayant le même nom
            $r = $this->bd->prepare("SELECT id, nom, prenom, mail, id_roles FROM utilisateur WHERE nom = :nom;");

            $r->bindValue(':nom', $nom, PDO::PARAM_STR);
            // Exécuter la requête
            $r->execute();

            // Récupérer tous les résultats sous forme d'un tableau d'objets
            $resultats = $r->fetchAll(PDO::FETCH_OBJ);

            return $resultats;
        }
    }

    public function get_all_utilisateur_prenom()
    {
        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par prenom
        $r = $this->bd->prepare("SELECT distinct prenom FROM utilisateur;");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_prenom_list()
    {
        if (isset($_POST['prenom_utilisateur'])) {
            $prenom = $this->valid_input($_POST['prenom_utilisateur']);

            // Préparer la requête SQL pour sélectionner tous les utilisateurs ayant le même nom
            $r = $this->bd->prepare("SELECT id, nom, prenom, mail, id_roles FROM utilisateur WHERE prenom = :prenom;");

            $r->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            // Exécuter la requête
            $r->execute();

            // Récupérer tous les résultats sous forme d'un tableau d'objets
            return $r->fetchAll(PDO::FETCH_OBJ);

            // return $resultats;
        }
    }


    public function get_all_utilisateur_mail()
    {
        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par prenom
        $r = $this->bd->prepare("SELECT DISTINCT(mail) FROM utilisateur");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        // $tmp = $r->fetchAll(PDO::FETCH_OBJ);
        // var_dump($tmp);
        // return $tmp;
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_mail_list()
    {
        if (isset($_POST['mail_utilisateur'])) {
            $mail = $this->valid_input($_POST['mail_utilisateur']);
            //! try {} catch(PDOExeption) {$e->message()}

            // Préparer la requête SQL pour sélectionner tous les utilisateurs ayant le même nom
            $r = $this->bd->prepare("SELECT id, nom, prenom, mail, id_roles FROM utilisateur WHERE mail = :mail");

            $r->bindParam(':mail', $mail, PDO::PARAM_STR);
            // Exécuter la requête
            $r->execute();

            // $tmp = $r->fetchAll(PDO::FETCH_OBJ);
            // var_dump($tmp);
            // return $tmp;
            // Récupérer tous les résultats sous forme d'un tableau d'objets
            return $r->fetchAll(PDO::FETCH_OBJ);

        }
    }


    //^ Affichage des annonces
    public function get_all_annonce()
    {
        $r = $this->bd->prepare("SELECT a.texte, a.image, a.logo, u.nom, u.prenom, a.id FROM annonce a
        INNER JOIN utilisateur u ON u.id = a.id_utilisateur");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }


    //^ Affichage des messages 
    public function get_all_message()
    {
        $r = $this->bd->prepare("SELECT u.nom, u.prenom, u.mail, m.object, m.message, m.date_message, m.id FROM message m 
        INNER JOIN utilisateur u ON u.id = m.id_utilisateur");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_nom_message()
    {
        $r = $this->bd->prepare("SELECT DISTINCT nom FROM utilisateur");

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_nom_message_list($nom_message)
    {
        $nom_message = $this->valid_input($_POST["nom_message"]);
        $r = $this->bd->prepare("SELECT u.nom, u.prenom, u.mail, m.object, m.message, m.date_message FROM utilisateur u 
        INNER JOIN message m ON u.id = m.id_utilisateur WHERE u.nom = :nom;");
        $r->bindValue(':nom', $nom_message, PDO::PARAM_STR);

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_message_mail()
    {
        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par prenom
        $r = $this->bd->prepare("SELECT distinct mail FROM utilisateur;");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_message_mail_list()
    {
        // if (isset($_POST['mail'])) {
        $mail = $this->valid_input($_POST['mail_message']);

        // Préparer la requête SQL pour sélectionner tous les utilisateurs ayant le même nom
        $r = $this->bd->prepare("SELECT u.nom, u.prenom, u.mail, m.object, m.message, m.date_message FROM utilisateur u 
            JOIN message m ON u.id = m.id_utilisateur WHERE mail = :mail;");

        $r->bindValue(':mail', $mail, PDO::PARAM_STR);
        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
        // }
    }

    public function get_all_message_objet()
    {
        $r = $this->bd->prepare("SELECT DISTINCT object FROM message");

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_message_objet_list()
    {
        // if (isset($_POST['mail'])) {
        $objet = $this->valid_input($_POST['objet_message']);

        // Préparer la requête SQL pour sélectionner tous les utilisateurs ayant le même nom
        $r = $this->bd->prepare("SELECT u.nom, u.prenom, u.mail, m.object, m.message, m.date_message FROM utilisateur u 
            JOIN message m ON u.id = m.id_utilisateur WHERE object = :objet;");

        $r->bindValue(':objet', $objet, PDO::PARAM_STR);
        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
        // }
    }

    //^ Affichage des documents
    public function get_all_document()
    {
        $r = $this->bd->prepare("SELECT d.titre, d.format, d.description, u.nom, u.prenom, c.libelle, c.affichage, d.id, d.fichier FROM document d
        INNER JOIN utilisateur u ON u.id = d.id_utilisateur
        INNER JOIN categorie c ON c.id = d.id_categorie;");

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_titre_document()
    {

        // Préparer la requête SQL pour sélectionner tous les livres dans l'ordre alphabétique par titre
        $r = $this->bd->prepare("SELECT DISTINCT titre FROM document");

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_titre_document_list($titre_document)
    {
        // Récupérer la valeur de localite choisie par l'utilisateur depuis le formulaire
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $titre = $this->valid_input($_POST['titre_document']);

        // Préparer la requête SQL en utilisant une variable liée pour éviter les attaques par injection SQL
        $r = $this->bd->prepare("SELECT d.id, u.nom, u.prenom, d.titre, d.format, d.description, c.libelle, c.affichage, d.fichier  FROM document d  
        INNER JOIN utilisateur u ON u.id = d.id_utilisateur 
        INNER JOIN categorie c ON c.id = d.id_categorie WHERE titre = :titre");
        $r->bindValue(':titre', $titre, PDO::PARAM_STR);

        // Exécuter la requête
        $r->execute();

        // Récupérer tous les résultats sous forme d'un tableau d'objets
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_format_document()
    {
        $r = $this->bd->prepare("SELECT DISTINCT format FROM document");

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_format_document_list($format_document)
    {
        $format_document = $this->valid_input($_POST["format_document"]);
        $r = $this->bd->prepare("SELECT d.id, u.nom, u.prenom, d.titre, d.format, d.description, d.date_publication, c.libelle, c.affichage, d.fichier FROM utilisateur u 
        INNER JOIN document d ON u.id = d.id_utilisateur 
        INNER JOIN categorie c ON c.id = d.id_categorie WHERE format = :format;");
        $r->bindValue(':format', $format_document, PDO::PARAM_STR);

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_document()
    {
        $r = $this->bd->prepare("SELECT DISTINCT nom FROM utilisateur");

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_utilisateur_document_list($utilisateur_document)
    {
        $utilisateur_document = $this->valid_input($_POST["utilisateur_document"]);
        $r = $this->bd->prepare("SELECT d.id, u.nom, u.prenom, d.titre, d.format, d.description, d.date_publication, c.libelle, c.affichage, d.fichier FROM utilisateur u 
        INNER JOIN document d ON u.id = d.id_utilisateur 
        INNER JOIN categorie c ON c.id = d.id_categorie WHERE nom = :utilisateur;");
        $r->bindValue(':utilisateur', $utilisateur_document, PDO::PARAM_STR);

        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    //! Delete 
    // ^ Delete un utilisateur 
    public function get_delete_utilisateur($id)
    {
        $r = $this->bd->prepare("DELETE FROM utilisateur WHERE id = :id");
        $r->bindParam(':id', $id);
        $r->execute();
        //   header("Location: index.php?controller=utilisateur&action=all_utilisateur");
    }

    // ^ Delete un message
    public function get_delete_message($id)
    {
        $r = $this->bd->prepare("DELETE FROM message WHERE id = :id");
        $r->bindParam(':id', $id);
        $r->execute();
        //   header("Location: index.php?controller=utilisateur&action=all_utilisateur");
    }

    // ^ Delete un document
    public function get_delete_document($id)
    {
        $r = $this->bd->prepare("DELETE FROM document WHERE id = :id");
        $r->bindParam(':id', $id);
        $r->execute();
        //   header("Location: index.php?controller=utilisateur&action=all_utilisateur");
    }



    // ^ Delete une annonce 
    public function get_delete_annonce($id)
    {
        $r = $this->bd->prepare("DELETE FROM annonce WHERE id = :id");
        $r->bindParam(':id', $id);
        $r->execute();
        //   header("Location: index.php?controller=utilisateur&action=all_utilisateur");
    }


    // ! UPDATE
    public function get_update_utilisateur($id)
    {
        // $id = $_GET['id'];
        $r = $this->bd->prepare("SELECT * FROM utilisateur WHERE id = $id");

        $r->execute();

        return $r->fetch();
    }

    public function get_update_utilisateur_bdd()
    {
        // Récupérer les données du formulaire
        $id = $this->valid_input($_POST['id']);
        $nom = $this->valid_input($_POST['nom']);
        $prenom = $this->valid_input($_POST['prenom']);
        $mail = $this->valid_input($_POST['mail']);
        $id_roles = $this->valid_input($_POST['id_roles']);

        $r = $this->bd->prepare("UPDATE utilisateur  
        SET nom = :nom, prenom = :prenom, mail = :mail, id_roles = :id_roles 
        WHERE id = :id;");
        $r->bindParam(':nom', $nom);
        $r->bindParam(':prenom', $prenom);
        $r->bindParam(':mail', $mail);
        $r->bindParam(':id_roles', $id_roles);
        $r->bindParam(':id', $id);
        $r->execute();
    }

    public function get_update_annonce($id)
    {
        // $id = $_GET['id'];
        $r = $this->bd->prepare("SELECT u.nom, u.prenom, a.texte, a.image FROM annonce a 
        INNER JOIN utilisateur u ON u.id = a.id_utilisateur
        WHERE a.id = $id");

        $r->execute();

        return $r->fetch();
    }

    public function get_update_annonce_bdd()
    {
        // Récupérer les données du formulaire
        $id = $this->valid_input($_POST['id']);
        $nom = $this->valid_input($_POST['nom']);
        $prenom = $this->valid_input($_POST['prenom']);
        $mail = $this->valid_input($_POST['mail']);
        $id_roles = $this->valid_input($_POST['id_roles']);


        $r = $this->bd->prepare("UPDATE annonce a , utilisateur u 
        INNER JOIN annonce ON a.id_utilisateur = u.id
        SET a.texte = :texte, a.image = :image, a.logo = :logo,s u.nom = :nom 
        WHERE id = :id;");
        $r->bindParam(':nom', $nom);
        $r->bindParam(':prenom', $prenom);
        $r->bindParam(':mail', $mail);
        $r->bindParam(':id_roles', $id_roles);
        $r->bindParam(':id', $id);
        $r->execute();
    }

    public function get_update_document($id)
    {
        // $id = $_GET['id'];
        $r = $this->bd->prepare("SELECT d.id, u.nom, d.titre, d.description, c.libelle, c.affichage, d.fichier, d.date_publication 
        FROM document d 
        JOIN categorie c ON d.id_categorie = c.id
        JOIN utilisateur u ON d.id_utilisateur = u.id 
        WHERE d.id = $id");

        $r->execute();

        return $r->fetch();
    }

    public function get_update_document_bdd()
    {
        // Récupérer les données du formulaire
        $id = $this->valid_input($_POST['id']);
        $nom = $this->valid_input($_POST['nom']);
        $titre = $this->valid_input($_POST['titre']);
        $description = $this->valid_input($_POST['description']);
        $date_publication = $this->valid_input($_POST['date_publication']);
        $fichier = $this->valid_input($_POST['image']);
        $affichage = $this->valid_input($_POST['affichage']);
        $libelle = $this->valid_input($_POST['libelle']);



        $r = $this->bd->prepare("UPDATE document d
        INNER JOIN utilisateur u ON u.id = d.id_utilisateur
        INNER JOIN categorie c ON c.id = d.id_categorie
        SET u.nom = :nom, d.titre = :titre, d.description = :description, d.date_publication = :date_publication, d.fichier = :fichier, c.affichage = :affichage, c.libelle = :libelle
        WHERE d.id = :id;");
        $r->bindParam(':nom', $nom);
        $r->bindParam(':titre', $titre);
        $r->bindParam(':description', $description);
        $r->bindParam(':date_publication', $date_publication);
        $r->bindParam(':fichier', $fichier);
        $r->bindParam(':affichage', $affichage);
        $r->bindParam(':libelle', $libelle);
        $r->bindParam(':id', $id);
        $r->execute();
    }

    // ^ AJOUT DE DOCUMENT
    public function get_ajout_libelle()
    {
        $r = $this->bd->prepare("SELECT DISTINCT libelle, id FROM categorie");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_ajout_utilisateur_document()
    {
        $r = $this->bd->prepare("SELECT DISTINCT nom, id FROM utilisateur");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_ajouter_document_bdd()
    {
        $titre = $this->valid_input($_POST['titre_document']);
        $description = $this->valid_input($_POST['description_document']);
        $date_publication = $this->valid_input($_POST['date_document']);
        $fichier = $_FILES['input-file-ajout-document']['name'];
        $id_categorie = $this->valid_input($_POST['select_categorie']);
        $ajout_utilisateur_document = $this->valid_input($_POST['ajout_utilisateur_document']);
        // $fichier = $this->valid_input($_POST['fichier']);

        $r = $this->bd->prepare("INSERT INTO `document`(`titre`, `id_categorie`, `description`, `date_publication`, `id_utilisateur`, `fichier`) 
        VALUES (:titre, :id_categorie, :description, :date_publication, :id_utilisateur, :fichier)");

        $r->bindParam(':titre', $titre);
        $r->bindParam(':fichier', $fichier);
        $r->bindParam(':description', $description);
        $r->bindParam(':date_publication', $date_publication);
        $r->bindParam(':id_categorie', $id_categorie);
        $r->bindParam(':id_utilisateur', $ajout_utilisateur_document);
        // $r->bindParam(':fichier', $fichier);

        $r->execute();
    }

    // ^ Ajouter une categorie 
    public function get_ajout_categorie()
    {
        try {
            $libelle = $this->valid_input($_POST["input_ajout_categorie"]);

            $r = $this->bd->prepare("INSERT INTO categorie (`libelle`, `affichage`) VALUES (:libelle, 1)");
            $r->bindParam(':libelle', $libelle);

            $r->execute();
        } catch (PDOException $e) {
            // Affichage de l'erreur ou log de l'erreur
            echo "Une erreur est survenue lors de l'ajout de la catégorie : " . $e->getMessage();
            exit; // ou gestion de l'erreur
        }
    }

    public function get_inscription($Nom, $Prenom, $Mail, $Password)
    {

        $requete = "SELECT * FROM utilisateur WHERE mail = :Mail";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->execute();
        $row = $stmt->fetch();
        echo $row['id_roles'];
        $idr = $row['id_roles'];

        if ($stmt->rowCount() > 0 && $idr == 4) {

            $requete2 = "UPDATE `utilisateur` SET mot_de_passe = :password, id_roles = 1 WHERE mail = :mail";
            $stmt2 = $this->bd->prepare($requete2);
            $stmt2->bindParam(':mail', $Mail);
            $stmt2->bindParam(':password', $Password);
            $stmt2->execute();

        } else if ($stmt->rowCount() > 0 && $idr < 4) {

            exit('Cet email existe déjà');
        }


        if ($stmt->rowCount() == 0) {


            $r = "INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `mot_de_passe`, `id_roles`) VALUES (:Nom, :Prenom, :Mail, :Password, '1')";
            $stmt = $this->bd->prepare($r);
            $stmt->execute([
                ':Nom' => $Nom,
                ':Prenom' => $Prenom,
                ':Mail' => $Mail,
                ':Password' => $Password
            ]);
        }

    }

    public function get_connexion_utilisateur($email, $password)
    {
        $requete = "SELECT * FROM `utilisateur` WHERE mail=:email";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if (password_verify($password, $user['mot_de_passe'])) {
                // Le mot de passe est correct, renvoie l'utilisateur
                return $user;

            } else {
                echo 'mot de passe incorrect';
                echo $password;
                // Le mot de passe est incorrect
                return false;
            }
        } else {
            echo 'l\'utilisateur n\'existe pas';
            // L'utilisateur n'existe pas dans la base de données
            return false;
        }

        //   Démarre la session pour stocker l'ID de l'utilisateur connecté
        //  session_start();
        //  $_SESSION['user_id'] = $user->id;

        //  return $user;
    }

    public function get_message_visiteur($nom, $prenom, $mail, $objet, $message)
    {
        $requete = "SELECT * FROM `utilisateur` WHERE mail=:email ";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $mail);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($stmt->rowCount() > 0) {
            // L'adresse mail existe dans la base de données



            // Récupérer l'id de l'utilisateur
            $id_utilisateur = $row['id'];

            // Insérer le message dans la table "message" avec la clé étrangère id_utilisateur
            $requete_insert = "INSERT INTO `message` (id_utilisateur, object, message) VALUES (:idu, :obj, :msg)";
            $stmt_insert = $this->bd->prepare($requete_insert);
            $stmt_insert->bindParam(':idu', $id_utilisateur);
            $stmt_insert->bindParam(':obj', $objet);
            $stmt_insert->bindParam(':msg', $message);
            $stmt_insert->execute();



        } else if ($stmt->rowCount() == 0) {
            // L'adresse mail n'existe pas dans la base de données, il faut l'insérer
            $requete3 = "INSERT INTO `utilisateur` (nom, prenom, mail, id_roles) VALUES (:nom, :prenom, :email, 4)";
            $stmt3 = $this->bd->prepare($requete3);
            $stmt3->bindParam(':nom', $nom);
            $stmt3->bindParam(':prenom', $prenom);
            $stmt3->bindParam(':email', $mail);
            // $stmt3->bindParam(':idr', $idr);
            $stmt3->execute();

            // Récupérer l'id de l'utilisateur nouvellement inséré
            $id_utilisateur = $this->bd->lastInsertId();

            // Insérer le message dans la table message
            $requete2 = "INSERT INTO `message` (id_utilisateur, object, message) VALUES (:idu, :obj, :cont)";
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
        $r = $this->bd->prepare("SELECT DISTINCT libelle, id FROM categorie");
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
            $r = $this->bd->prepare("SELECT titre, format, description, date_publication, fichier, u.nom FROM document d
            INNER JOIN utilisateur u ON u.id = d.id_utilisateur
            WHERE id_categorie = '$liste'");
            $r->execute();
            return $r->fetchAll(PDO::FETCH_OBJ);

        } else if (isset($_POST['select_format_fichier'])) {

            $liste = $_POST['select_format_fichier'];
            $r = $this->bd->prepare("SELECT titre, format, description, date_publication, fichier, u.nom  FROM document d 
            INNER JOIN utilisateur u ON u.id = d.id_utilisateur
            WHERE format = '$liste'");
            $r->execute();
            return $r->fetchAll(PDO::FETCH_OBJ);
        }
    }

    // ^ Affichage des 3 derniers post sur la page de recherche
    public function get_derniers_documents()
    {
        $r = $this->bd->prepare("SELECT titre, fichier FROM document ORDER BY date_publication DESC LIMIT 3");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    function valid_input($data)
    {
        //todo Supprime les espaces en début et fin de chaîne
        // $data = trim($data);
        //todo Supprime les barres obliques inverses de la chaîne
        // $data = stripslashes($data);
        //todo Supprime les balises et les caractères spéciaux
        // $data = filter_var($data, FILTER_SANITIZE_STRING);
        //todo Convertit les caractères spéciaux en entités HTML
        // $data = filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //todo Encode les caractères spéciaux en UTF-8
        // $data = filter_var($data, FILTER_SANITIZE_ENCODED);
        //todo Retourne la chaîne de caractères validée
        return $data;
    }

}
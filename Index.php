<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<?php
//   // Récupérer l'URL de la page
//   $url = $_SERVER['REQUEST_URI'];

//   // Vérifier si l'URL contient la chaîne de requête
//   if (strpos($url, "?controller=home&action=home") !== false) {
//     // Ajouter une balise link pour charger le fichier de style
//     echo '<link rel="stylesheet" href="Content/css/style_recherche.css">';
//   }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Les Amis du Vieux Miramas</title>
    <meta name="description"
        content="Les Amis du Vieux Miramas est une association qui représente un petit village pittoresque et historique situé dans la ville de Miramas, dans la région Provence-Alpes-Côte d'Azur, en France.">
    <meta name="keywords" content="village, vieux miramas, histoire, patrimoine, évènements">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Les Amis du Vieux Miramas">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Liens boostrap nav  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- Link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- link boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


    <!-- Link Js -->
    <script src="Content/js/app_formulaire_contact.js" defer></script>
    <script src="Content/js/app_mdp.js" defer></script>
    <script src="Content/js/app_ajout_document.js" defer></script>
    <script src="Content/js/app_inscription.js" defer></script>
    <script src="Content/js/app_connexion.js" defer></script>




    <!-- Link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Link css -->
    <link rel="stylesheet" href="Content/css/style.css">
    <link rel="stylesheet" href="Content/css/style_newsletter.css">
    <link rel="stylesheet" href="Content/css/style_ajout_document.css">
    <link rel="stylesheet" href="Content/css/style_formulaire_connexion.css">
    <link rel="stylesheet" href="Content/css/style_formulaire_contact.css">
    <link rel="stylesheet" href="Content/css/style_condition.css">
    <link rel="stylesheet" href="Content/css/style_partenaire.css">
    <link rel="stylesheet" href="Content/css/style_accueil.css">
    <link rel="stylesheet" href="Content/css/style_table.css">
    <link rel="stylesheet" href="Content/css/style_presentation.css">
    <link rel="stylesheet" href="Content/css/style_recherche.css">
    <script>
        if (window.location.href.indexOf('?controller=home&action=home') > -1) {
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = 'Content/css/style_nav.css';
            document.head.appendChild(link);
        } 
    </script>


    <!-- Titre -->
    <title>Les amis du vieux miramas</title>
</head>


<body>

    <?php

    //* Inclure les fichiers nécessaires
    require_once 'Controllers/Controller.php';
    require_once 'Models/Model.php';
    // die("page index");
    // require_once 'Utils/header.php';
    
    //* Tableau des contrôleurs disponibles
    $controllers = ["home", "contact", "connexion", "ajout_document", "newsletters", "partenaires", "presentation", "recherche", "condition", "crud", "utilisateur", "document", "annonce", "message"];

    //* Nom du contrôleur par défaut
    $controller_default = "home";

    //* Vérifier si un contrôleur est spécifié dans l'URL
    if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
        //* Utiliser le nom spécifié si il est valide
        $nom_controller = $_GET['controller'];
    } else {
        //* Utiliser le nom par défaut si aucun nom n'est spécifié ou si le nom spécifié n'est pas valide
        $nom_controller = $controller_default;
    }

    //* Construire le nom de la classe correspondante au contrôleur
    $nom_classe = "Controller_" . $nom_controller;

    //* Construire le nom du fichier contenant la classe correspondante au contrôleur
    $nom_fichier = "Controllers/" . $nom_classe . ".php";

    //* Vérifier si le fichier existe
    if (file_exists($nom_fichier)) {
        //* Inclure le fichier
        require_once($nom_fichier);
        //* Instancier la classe correspondante au contrôleur
        $controller = new $nom_classe();
    } else {
        //* Afficher une erreur 404 si le fichier n'existe pas
        exit(trigger_error("Error 404 : not found", E_USER_ERROR));
    }

    //* Inclure le fichier de pied de page
    
    // echo '<br>' . "<b id='controller'>" . "Controller : " . $_GET['controller'] . "<br>" . "</b>";
    // echo "<b id='action'>" . "action : " . $_GET['action'] . "<br>" . "</b>";
    
    require_once 'Utils/footer.php';
    ?>
</body>

</html>
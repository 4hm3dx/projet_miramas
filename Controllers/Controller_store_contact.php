<?php

require_once "../Models/Model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validation des données d'entrée
    $nom = filter_input(INPUT_POST, 'nom_utilisateur', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom_utilisateur', FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST, 'email_utilisateur', FILTER_VALIDATE_EMAIL);
    $objet = filter_input(INPUT_POST, 'object_utilisateur', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'contenue_message_form_contact', FILTER_SANITIZE_SPECIAL_CHARS);

    $nom_regex = '/^[a-zA-Z\s]{2,30}$/';
    $mail_regex = '/^[A-Za-z0-9._-]+[@][A-Za-z]+[\.][a-z]{2,4}$/';
    $message_regex = '/^[a-zA-Z0-9.,?!\'"«»‹›„“”‘’ éàèùêâôûëïüç]+$/';




    if (empty($nom) || empty($prenom) || empty($mail) || empty($objet) || empty($message)) {
        echo json_encode(["msg" => 'Certains champs sont vides']);
        exit;
    }

    $nom = trim($nom);
    $prenom = trim($prenom);
    $mail = trim($mail);
    $objet = trim($objet);
    $message = trim($message);

    if (!filter_var($nom, FILTER_SANITIZE_STRING) || !filter_var($prenom, FILTER_SANITIZE_STRING) || !preg_match($nom_regex, $nom) || !preg_match($nom_regex, $prenom)) {
        echo json_encode(["msg" => 'Format du nom ou du prénom incorrect']);

        exit;
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || !preg_match($mail_regex, $mail)) {
        echo json_encode(["msg" => 'Format de l\'adresse mail incorrect']);

        exit;
    }

    if (!filter_var($objet, FILTER_SANITIZE_STRING) || !preg_match($message_regex, $objet) || !filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS) || !preg_match($message_regex, $message)) {
        echo json_encode(["msg" => 'Format de l\'objet ou du message incorrect']);

        exit;
    }

    $m = Model::get_model();
    $m->get_message_visiteur($nom, $prenom, $mail, $objet, $message);

    echo json_encode(["msg" => 'success']);
}

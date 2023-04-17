<?php
class Controller_document extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_all_document()
    {
        $m = Model::get_model();
        $data = ["document" => $m->get_all_document()];
        $this->render("all_document", $data);
    }

    public function action_all_titre()
    {
        $m = Model::get_model();
        $data = ["titre" => $m->get_all_titre(), "position" => 1];
        $this->render("all_document_titre", $data);
    }

    public function action_all_titre_list()
    {
        $m = Model::get_model();
        $data = ["titre_list" => $m->get_all_titre_list(), "titre" => $m->get_all_titre(), "position" => 2];
        $this->render("all_document_titre", $data);
    }
}
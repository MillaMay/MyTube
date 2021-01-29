<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->model('milla_model');
    }

    public function index()
    {
        session_start();

        $data['user'] = $this->milla_model->getUsers();
        $data['title'] = $this->search_model->getTitle($_GET['q']);
        $data['q'] = $this->search_model->getResultSearch($_GET['q']);

        $this->load->view('templates/header', $data);
        $this->load->view('milla/search', $data);
        $this->load->view('templates/footer');
    }
}
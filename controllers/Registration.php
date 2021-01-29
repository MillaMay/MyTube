<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration_model');
    }

    public function index()
    {
        $data['title'] = 'Регистрация';
        
        $this->load->view('templates/header', $data);
        $this->load->view('milla/registration', $data);
        $this->load->view('templates/footer');
    }
}
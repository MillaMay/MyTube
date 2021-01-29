<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('milla_model');
    }

    public function index()
    {
        session_start();
        
        $data['user'] = $this->milla_model->getUsers();
        $data['title'] = 'Вход';

        if (isset($_POST['email'])) {

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password'])) {

                $data['login'] = $this->login_model->getLogin($_POST['email'], $_POST['password']);
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('milla/login', $data);
        $this->load->view('templates/footer');
    }
}
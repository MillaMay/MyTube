<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reset_password_model');
    }

    public function index()
    {
        $data['title'] = 'Сброс пароля';
        
        $this->load->view('templates/header', $data);
        $this->load->view('milla/reset_password', $data);
        $this->load->view('templates/footer');
    }
}
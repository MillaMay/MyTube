<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tags_model');
        $this->load->model('milla_model');
    }

    public function index()
    {
        session_start();

        $data['user'] = $this->milla_model->getUsers();
        $data['title'] = $this->tags_model->getTitle();
        $data['tags_video'] = $this->tags_model->getTagsResult();
        $data['sum_video'] = $this->tags_model->getSumVideo();
        
        $this->load->view('templates/header', $data);
        $this->load->view('milla/tags', $data);
        $this->load->view('templates/footer');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('channel_model');
        $this->load->model('milla_model');
    }

    public function index()
    {
        session_start();

        $data['user'] = $this->milla_model->getUsers();
        $data['title'] = $this->channel_model->getTitle();
        $data['users'] = $this->channel_model->getUsers();
        $data['link_users'] = $this->channel_model->getSumLinkUsers();
        $data['video'] = $this->channel_model->getVideo();

        $this->load->view('templates/header', $data);
        $this->load->view('milla/channel');
        $this->load->view('templates/footer');
    }
}
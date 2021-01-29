<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('watch_model');
        $this->load->model('milla_model');
	}

    public function index()
    {
        session_start();

        $data['user'] = $this->milla_model->getUsers();
        $data['title'] = $this->watch_model->getTitle();
        $data['page_video'] = $this->watch_model->getFiles();
        $data['tags'] = $this->watch_model->getTags();
        $data['info_users'] = $this->watch_model->getUsers();
        $data['subscribers'] = $this->watch_model->getSumLinkUsers();
        $data['comments'] = $this->watch_model->getComments();
        $data['comments_sum'] = $this->watch_model->getSumComments();
        $data['related_column'] = $this->watch_model->getRelatedVideo();

        $this->load->view('templates/header', $data);
        $this->load->view('milla/watch', $data);
        $this->load->view('templates/footer');
    }
}
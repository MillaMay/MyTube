<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milla extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('milla_model');
		$this->load->model('login_model');
	}

	public function index()
	{
		session_start();

		if (isset($_POST['email'])) {

			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password'])) {

                $data['login'] = $this->login_model->getLogin($_POST['email'], $_POST['password']);
            }
		}
		
		$data['title'] = "MyTube";
		$data['video_trand'] = $this->milla_model->getTrandVideo();
		$data['user'] = $this->milla_model->getUsers();

		$this->load->view('templates/header', $data);
		$this->load->view('milla/index', $data);
		$this->load->view('templates/footer');
	}
}
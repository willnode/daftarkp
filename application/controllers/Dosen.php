<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/home');
		$this->load->view('widget/footer');
	}

}
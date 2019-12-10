<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

}
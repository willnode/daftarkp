<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function mhs()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function pengantar()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function jadwal()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function penjadwalan()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}
}
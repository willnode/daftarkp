<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function mahasiswa()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/mahasiswa');
		$this->load->view('widget/footer');
	}

	public function dosen()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/dosen');
		$this->load->view('widget/footer');
	}

	public function surat()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/surat');
		$this->load->view('widget/footer');
	}

	public function bimbingan()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/bimbingan');
		$this->load->view('widget/footer');
	}

	public function daftar()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/daftar');
		$this->load->view('widget/footer');
	}

	public function jadwal()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/jadwal');
		$this->load->view('widget/footer');
	}

	public function nilai()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/nilai');
		$this->load->view('widget/footer');
	}

	public function revisi()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/revisi');
		$this->load->view('widget/footer');
	}

	public function berkas()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/berkas');
		$this->load->view('widget/footer');
	}

}
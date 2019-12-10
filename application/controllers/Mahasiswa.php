<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function surat_pengantar()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function bimbingan()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function daftar_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function jadwal_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function nilai_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function revisi_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function berkas_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}
}
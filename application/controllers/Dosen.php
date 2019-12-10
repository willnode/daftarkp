<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/home');
		$this->load->view('widget/footer');
	}

	
	public function surat_pengantar()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/surat');
		$this->load->view('widget/footer');
	}

	public function bimbingan()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/bimbingan');
		$this->load->view('widget/footer');
	}

	public function daftar_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/daftar');
		$this->load->view('widget/footer');
	}

	public function jadwal_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/jadwal');
		$this->load->view('widget/footer');
	}

	public function nilai_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/nilai');
		$this->load->view('widget/footer');
	}

	public function revisi_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/revisi');
		$this->load->view('widget/footer');
	}

	public function berkas_sidang()
	{
		$this->load->view('widget/header');
		$this->load->view('sidang-dosen/berkas');
		$this->load->view('widget/footer');
	}

}
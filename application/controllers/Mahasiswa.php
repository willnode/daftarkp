<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home');
		$this->load->view('widget/footer');
	}

	public function surat($action='list')
	{
		$this->load->view('widget/header');
		if ($action=='list') {
			$data =  $this->db->get_where('surat', ['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/surat', [
				'data' => $data ?? (object)[
					'id_pembimbing' => 0,
					'nama_perusahaan' => '',
					'alamat_perusahaan' => '',
					'jangka_waktu' => '',
				],
				'dosen' => $this->db->get_where('dosen')->result(),
				'created' => boolval($data)
			]);
			$this->load->view('widget/footer');	
		} else if ($action=='update') {
			$data = [
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'id_pembimbing' => $this->input->post('id_pembimbing'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
			];
			$this->db->replace('surat', $data);
			redirect('mahasiswa/surat');
		}
	}


	public function bimbingan($action='list')
	{
		$this->load->view('widget/header');
		if ($action=='list') {
			$data =  $this->db->get_where('bimbingan', ['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/bimbingan', [
				'data' => $data ?? (object)[
					'id_bimbingan' => 0,
					'id_mahasiswa' => 0,
					'id_pembimbing' => 0,
					'topik_bimbingan' => '',
					'file_bimbingan' => '',
				],
				'dosen' => $this->db->get_where('dosen')->result(),
				'created' => boolval($data)
			]);
			$this->load->view('widget/footer');	
		} else if ($action=='update') {
			$data = [
				'id_bimbingan' => $this->input->post('id_bimbingan'),
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'id_pembimbing' => $this->input->post('id_pembimbing'),
				'topik_bimbingan' => $this->input->post('topik_bimbingan'),
				'file_bimbingan' => $this->input->post('file_bimbingan'),
			];
			$this->db->replace('bimbingan', $data);
			redirect('mahasiswa/bimbingan');
		}
	}

	public function daftar()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/daftar');
		$this->load->view('widget/footer');
	}

	public function jadwal()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/jadwal');
		$this->load->view('widget/footer');
	}

	public function nilai()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/nilai');
		$this->load->view('widget/footer');
	}

	public function revisi()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/revisi');
		$this->load->view('widget/footer');
	}

	public function berkas()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/berkas');
		$this->load->view('widget/footer');
	}
}
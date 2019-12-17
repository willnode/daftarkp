<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('mahasiswa/home', [
			'profil' => $this->db->get_where('mahasiswa', ['id_mahasiswa' => $this->session->id_mahasiswa])->row(),
		]);
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
				'created' => boolval($data),
				'editable' => check_config('allow_surat')
			]);
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
		$this->load->view('widget/footer');
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
					'tanggal' => '',
					'topik_bimbingan' => '',
					'file_bimbingan' => '',
				],
				'dosen' => $this->db->get_where('dosen')->result(),
				'created' => boolval($data),
				'editable' => check_config('allow_bimbingan')
			]);
		} else if ($action=='update') {
			$data = [
				'id_bimbingan' => $this->input->post('id_bimbingan'),
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'id_pembimbing' => $this->input->post('id_pembimbing'),
				'tanggal' => $this->input->post('tanggal'),
				'topik_bimbingan' => $this->input->post('topik_bimbingan'),
				'file_bimbingan' => form_file_upload('file_bimbingan', 'bimbingan'),
			];
			$this->db->replace('bimbingan', $data);
			redirect('mahasiswa/bimbingan');
		}
		$this->load->view('widget/footer');
	}

	public function daftar($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$data = $this->db->get_where('daftar, mahasiswa, dosen','mahasiswa.id_mahasiswa=daftar.id_mahasiswa and daftar.id_penguji=dosen.id_dosen',['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/daftar', [
				'data' => $data ?? (object)[
					'id_daftar' => 0,
					'id_mahasiswa' => 0,
					'id_penguji' => 0,
					'verifikasi_admin' => '',
					'nilai_lapangan' => 0,
					'file_daftar' => ''
				],
				'dosen' => $this->db->get_where('dosen')->result(),
				'created' => boolval($data),
				'editable' => check_config('allow_daftar'),
			]);
		}
		else if ($action == 'update') {
			$data = [
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'id_penguji' => $this->input->post('id_penguji'),
				'nilai_lapangan' => $this->input->post('nilai_lapangan'),
				'file_daftar' => form_file_upload('file_daftar','daftar'),
			];

			$this->db->replace('daftar', $data);

			redirect('mahasiswa/daftar');
		}
		$this->load->view('widget/footer');
	}

	public function jadwal($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action=='list') {
			$data =  $this->db->get_where('jadwal', ['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/jadwal', [
				'data' => $data ?? (object)[
					'id_jadwal' => 0,
					'id_mahasiswa' => 0,
					'waktu' => '',
					'verifikasi_penguji' => '',
					'verifikasi_pembimbing' => '',
				],
				'created' => boolval($data)
			]);
		} else if ($action=='update') {
			$data = [
				'id_jadwal' => $this->session->id_jadwal,
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'waktu' => $this->session->waktu,
				'verifikasi_penguji' => $this->input->post('verifikasi_penguji'),
				'verifikasi_pembimbing' => $this->input->post('verifikasi_pembimbing'),
			];
			$this->db->replace('jadwal', $data);
			redirect('mahasiswa/jadwal');
		}
		$this->load->view('widget/footer');
	}

	public function nilai($action='list')
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('mahasiswa/nilai', [
				'data' => $this->db->get_where('nilai, daftar, mahasiswa','mahasiswa.id_mahasiswa=nilai.id_mahasiswa AND mahasiswa.id_mahasiswa=daftar.id_mahasiswa' )->result()[0],
				'editable' => check_config('allow_nilai')
			]);
			$this->load->view('widget/footer');
	}
}

	public function revisi($action='list')
	{
		$this->load->view('widget/header');
		if ($action=='list') {
			$data =  $this->db->get_where('revisi', ['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/revisi', [
				'data' => $data ?? (object)[
					'id_revisi' => 0,
					'id_mahasiswa' => 0,
					'file_revisi' => '',
					'topik_bimbingan' => '',
					'verifikasi_penguji' => '',
				],
				'dosen' => $this->db->get_where('dosen')->result(),
				'created' => boolval($data),
				'editable' => check_config('allow_revisi')
			]);
		} else if ($action=='update') {
			$data = [
				'id_revisi' => $this->session->id_revisi,
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'file_revisi' => form_file_upload('file_revisi', 'revisi'),
				'topik_revisi' => $this->input->post('topik_revisi'),
				'verifikasi_penguji' => $this->input->post('verifikasi_penguji'),
			];
			$this->db->replace('revisi', $data);
			redirect('mahasiswa/revisi');
		}
		$this->load->view('widget/footer');
	}

	public function berkas($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action=='list') {
			$data =  $this->db->get_where('berkas', ['id_mahasiswa'=>$this->session->id_mahasiswa])->row();
			$this->load->view('mahasiswa/berkas', [
				'data' => $data ?? (object)[
					'id_berkas' => 0,
					'id_mahasiswa' => 0,
					'file_berkas' => '',
				],
				'created' => boolval($data)
			]);
		} else if ($action=='update') {
			$data = [
				'id_berkas' => $this->input->post('id_berkas'),
				'id_mahasiswa' => $this->session->id_mahasiswa,
				'file_berkas' => form_file_upload('file_berkas', 'berkas'),
			];
			$this->db->replace('berkas', $data);
			redirect('mahasiswa/berkas');
		}
		$this->load->view('widget/footer');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('admin/home');
		$this->load->view('widget/footer');
	}

	public function mahasiswa($action='list', $id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('admin/mahasiswa', [
				'data' => $this->db->get_where('mahasiswa,prodi','mahasiswa.prodi=prodi.id_prodi')->result()
			]);
		} else if ($action == 'create') {
			$this->load->view('admin/edit/mahasiswa', [
				'data' => (object)[
					'id_mahasiswa' => 0,
					'nim' => '',
					'nama_mhs' => '',
					'prodi' => 0,
					'username' => '',					
				],
				'prodi' => $this->db->get_where('prodi')->result()
			]);
		} else if ($action == 'edit') {
			$this->load->view('admin/edit/mahasiswa', [
				'data' => $this->db->get_where('mahasiswa,prodi,login',"mahasiswa.id_login=login.id_login AND mahasiswa.prodi=prodi.id_prodi AND mahasiswa.id_mahasiswa=$id")->result()[0],
				'prodi' => $this->db->get_where('prodi')->result()
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id])->row()->id_login;
			$this->db->delete('mahasiswa', ['id_mahasiswa' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('admin/mahasiswa');
		} else if ($action == 'update') {
			$data = [
				'nim' => $this->input->post('nim'),
				'nama_mhs' => $this->input->post('nama_mhs'),
				'prodi' => $this->input->post('prodi'),
			];
			$dataLogin = [
				'username' => $this->input->post('username'),
				'role' => 'mahasiswa',
			];
			if ($this->input->post('password')) {
				$dataLogin['password'] = $this->input->post('password');
			}
			if ($id == 0) {
				$this->db->insert('login', $dataLogin);
				$id_login = $this->db->insert_id();
				$data['id_login'] = $id_login;
				$this->db->insert('mahasiswa', $data);
			} else {
				$this->db->update('mahasiswa', $data, ['id_mahasiswa' => $id]);
			}
			redirect('admin/mahasiswa');
		}
		$this->load->view('widget/footer');
	}

	public function dosen($action='list', $id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('admin/dosen', [
				'data' => $this->db->get('dosen')->result()
			]);
		} else if ($action == 'create') {
			$this->load->view('admin/edit/dosen', [
				'data' => (object)[
					'id_dosen' => 0,
					'nip_dosen' => '',
					'nama_dosen' => '',
					'username' => '',					
				],
				]);
		} else if ($action == 'edit') {
			$this->load->view('admin/edit/dosen', [
				'data' => $this->db->get_where('dosen,login',"dosen.id_login=login.id_login AND dosen.id_dosen=$id")->result()[0],
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('dosen', ['id_dosen' => $id])->row()->id_login;
			$this->db->delete('dosen', ['id_dosen' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('admin/dosen');
		} else if ($action == 'update') {
			$data = [
				'nip_dosen' => $this->input->post('nip_dosen'),
				'nama_dosen' => $this->input->post('nama_dosen'),
			];
			$dataLogin = [
				'username' => $this->input->post('username'),
				'role' => 'dosen',
			];
			if ($this->input->post('password')) {
				$dataLogin['password'] = $this->input->post('password');
			}
			if ($id == 0) {
				$this->db->insert('login', $dataLogin);
				$id_login = $this->db->insert_id();
				$data['id_login'] = $id_login;
				$this->db->insert('dosen', $data);
			} else {
				$this->db->update('dosen', $data, ['id_dosen' => $id]);
			}
			redirect('admin/dosen');
		}
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
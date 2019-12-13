<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('role')) {
			redirect($this->session->role);
		} else {
			redirect("login");
		}
	}
	public function login()
	{
		if ($this->input->method() == 'post') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->db->get_where('login', ['username' => $username, 'password' => $password]);
			$result = $login->result();
			if(count( $result ) > 0) {
				$user = $result[0];
				$this->session->username = $user->username;
				$this->session->role = $user->role;
				if ($user->role == 'mahasiswa') {
					$this->session->id_mahasiswa = $this->db->get_where('mahasiswa', ['id_login'=>$user->id_login])->row()->id_mahasiswa;
				} else if ($user->role == 'dosen') {
					$this->session->id_dosen = $this->db->get_where('dosen', ['id_login'=>$user->id_login])->row()->id_dosen;
				} else if ($user->role == 'admin') {
					$this->session->id_admin = $this->db->get_where('admin', ['id_login'=>$user->id_login])->row()->id_admin;
					$this->session->jabatan = $this->db->get_where('admin', ['id_login'=>$user->id_login])->row()->jabatan;
				}
				redirect("$user->role/");
			}else{
				$this->load->view('static/login');
			}
		} else {
			$this->load->view('static/login');
		}
	}
	public function logout()
	{
		session_destroy();
		redirect("login");

	}
}

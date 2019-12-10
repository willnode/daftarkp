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

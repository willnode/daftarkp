<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('role')) {
			redirect("$user->role/");
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
			$user = $login->row();
			if($user) {
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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('role')) {
			redirect("$user->role/");
		} else {
			$this->load->view('widget/header');
			$this->load->view('static/home');
			$this->load->view('widget/footer');
		}
	}
	public function login()
	{
		if ($this->input->method() == 'post') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->db->get_where('user', ['username' => $username, 'password' => $password]);
			$user = $login->row();
			if($user) {
				$this->session->username = $user->username;
				$this->session->role = $user->role;
				redirect("$user->role/");
			}else{
				echo "<script>alert('Username dan Password yang anda masukkan salah Silahkan masukkan kembali');login.php'</script>\n";
			}
		} else {
			$this->load->view('login');
		}
	}
}

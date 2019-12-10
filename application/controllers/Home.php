<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('static/home');
		$this->load->view('widget/footer');
	}
	public function login()
	{
		if ($this->input->method() == 'post') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->db->get_where('user', ['username' => $username, 'password' => $password]);
			$user = $login->row();
			if($user) {
				$status = $user->hak_akses;
				if ($status == 'super_admin'){
					$this->session->username = $user->username;
					$this->session->status = $user->status;
					redirect("$user->status/home.php");
				}
			}else{
				echo "<script>alert('Username dan Password yang anda masukkan salah Silahkan masukkan kembali');login.php'</script>\n";
			}
		} else {
			$this->load->view('login');
		}
	}
}

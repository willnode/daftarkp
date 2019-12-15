<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function index()
	{
		$this->load->view('widget/header');
		$this->load->view('dosen/home', [
			'profil' => $this->db->get_where('dosen', ['id_dosen' => $this->session->id_dosen])->row(),
		]);
		$this->load->view('widget/footer');
	}

	public function surat($action='list', $id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('dosen/surat', [
				'data' => $this->db->get_where('surat, mahasiswa, dosen','mahasiswa.id_mahasiswa=surat.id_mahasiswa and surat.id_pembimbing=dosen.id_dosen' )->result(),
				'editable' => check_config('allow_surat')
			]);
		} else if ($action == 'edit') {
			$this->load->view('dosen/edit/surat', [
				'data' => $this->db->get_where('surat,mahasiswa,dosen',"mahasiswa.id_mahasiswa=surat.id_mahasiswa and surat.id_pembimbing=dosen.id_dosen AND surat.id_surat=$id")->result()[0],
				'dosen' => $this->db->get_where('dosen')->result()
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('surat', ['id_surat' => $id])->row()->id_login;
			$this->db->delete('surat', ['id_surat' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/surat');
		} else if ($action == 'update') {
			$data = [
				'id_pembimbing' => $this->input->post('id_pembimbing'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
				'jangka_waktu' => $this->input->post('jangka_waktu'),
				'file_surat' => form_file_upload('file_surat', 'surat'),
			];

			if (check_jabatan() == 'Koordinator'){
				$data['verifikasi_koordinator'] = $this->input->post('verifikasi_koordinator');
			}

			$this->db->update('surat', $data, ['id_surat' => $id]);

			redirect('dosen/surat');
		}
		$this->load->view('widget/footer');
	}


	public function bimbingan($action='list', $id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('dosen/bimbingan', [
				'data' => $this->db->get_where('bimbingan, mahasiswa, dosen','mahasiswa.id_mahasiswa=bimbingan.id_mahasiswa and bimbingan.id_pembimbing=dosen.id_dosen' )->result(),
				'editable' => check_config('allow_bimbingan')
			]);
		} else if ($action == 'edit') {
			$this->load->view('dosen/edit/bimbingan', [
				'data' => $this->db->get_where('bimbingan, mahasiswa, dosen',"mahasiswa.id_mahasiswa=bimbingan.id_mahasiswa and bimbingan.id_pembimbing=dosen.id_dosen AND bimbingan.id_bimbingan=$id")->result()[0],
				'dosen' => $this->db->get_where('dosen')->result()
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('bimbingan', ['id_bimbingan' => $id])->row()->id_login;
			$this->db->delete('bimbingan', ['id_bimbingan' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/bimbingan');
		} else if ($action == 'update') {
			$data = [
				'id_pembimbing' => $this->input->post('id_pembimbing'),
				'topik_bimbingan' => $this->input->post('topik_bimbingan'),
				'file_bimbingan' => form_file_upload('file_berkas', 'bimbingan')
			];

			$this->db->update('bimbingan', $data, ['id_bimbingan' => $id]);

			redirect('dosen/bimbingan');
		}
		$this->load->view('widget/footer');
	}

	public function daftar($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('dosen/daftar', [
				'data' => $this->db->get_where('daftar, mahasiswa, dosen','mahasiswa.id_mahasiswa=daftar.id_mahasiswa and daftar.id_penguji=dosen.id_dosen' )->result(),
				'editable' => check_config('allow_daftar')
			]);
		} else if ($action == 'edit') {
			$data = $this->db->get_where('daftar, mahasiswa, dosen',"mahasiswa.id_mahasiswa=daftar.id_mahasiswa and daftar.id_penguji=dosen.id_dosen AND daftar.id_daftar=$id")->result()[0];
			$this->load->view('dosen/edit/daftar', [
				'data' => $data,
				'dosen' => $this->db->get_where('dosen')->result(),
				'editable' => $data->verifikasi_admin!='Y' || $this->session->role == 'admin'
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('daftar', ['id_daftar' => $id])->row()->id_login;
			$this->db->delete('daftar', ['id_daftar' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/daftar');
		} else if ($action == 'update') {
			$data = [
				'id_penguji' => $this->input->post('id_penguji'),
				
			];

			if ($this->input->post('verifikasi_admin') !== null) {
				$data['verifikasi_admin'] = $this->input->post('verifikasi_admin');
			}

			$this->db->update('daftar', $data, ['id_daftar' => $id]);

			redirect('dosen/daftar');
		}
		$this->load->view('widget/footer');
	}

	public function jadwal($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$where = [
				'mahasiswa.id_mahasiswa=jadwal.id_mahasiswa',
				'mahasiswa.id_mahasiswa=surat.id_mahasiswa',
				'mahasiswa.id_mahasiswa=daftar.id_mahasiswa',
			];
			if ($this->session->role == 'dosen') {
				$where[] = '(surat.id_pembimbing='.$this->session->id_dosen.
				' OR daftar.id_penguji='.$this->session->id_dosen.')';
			}
			$this->load->view('dosen/jadwal', [
				'data' => $this->db->get_where('jadwal, mahasiswa, surat, daftar',join(' AND ', $where))->result()
			]);
		} else if ($action == 'edit') {
			$where = [
				'mahasiswa.id_mahasiswa=jadwal.id_mahasiswa',
				'mahasiswa.id_mahasiswa=surat.id_mahasiswa',
				'mahasiswa.id_mahasiswa=daftar.id_mahasiswa',
				"jadwal.id_jadwal=$id"
			];
			$data =  $this->db->get_where('jadwal, mahasiswa, surat, daftar',join(' AND ', $where))->result()[0];
			$this->load->view('dosen/edit/jadwal', [
				'data' => $data,
				'editablePenguji' => $data->id_penguji == $this->session->id_dosen || $this->session->role == 'admin',
				'editablePembimbing' => $data->id_pembimbing == $this->session->id_dosen || $this->session->role == 'admin',
				'editable' => $this->session->role == 'admin',
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('jadwal', ['id_jadwal' => $id])->row()->id_login;
			$this->db->delete('jadwal', ['id_jadwal' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/jadwal');
		} else if ($action == 'update') {
			$data = [];
			foreach (['waktu', 'verifikasi_penguji', 'verifikasi_pembimbing'] as $val) {
				if ($this->input->post($val) !== null) {
					$data[$val] = $this->input->post($val);
				}
			}

			$this->db->update('jadwal', $data, ['id_jadwal' => $id]);

			redirect('dosen/jadwal');
		}
		$this->load->view('widget/footer');
	}

	public function nilai($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('dosen/nilai', [
				'data' => $this->db->get_where('nilai, mahasiswa','mahasiswa.id_mahasiswa=nilai.id_mahasiswa' )->result(),
				'editable' => check_config('allow_nilai')
			]);
		} else if ($action == 'edit') {
			$this->load->view('dosen/edit/nilai', [
				'data' => $this->db->get_where('nilai, mahasiswa',"mahasiswa.id_mahasiswa=nilai.id_mahasiswa AND nilai.id_nilai=$id")->result()[0],
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('nilai', ['id_nilai' => $id])->row()->id_login;
			$this->db->delete('nilai', ['id_nilai' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/nilai');
		} else if ($action == 'update') {
			$data = [
				'nilai_pembimbing' => $this->input->post('nilai_pembimbing'),
				'nilai_penguji' => $this->input->post('nilai_penguji')
			];

			$this->db->update('nilai', $data, ['id_nilai' => $id]);

			redirect('dosen/nilai');
		}
		$this->load->view('widget/footer');
	}

	public function revisi($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$where = [
				'mahasiswa.id_mahasiswa=revisi.id_mahasiswa',
				'daftar.id_mahasiswa=mahasiswa.id_mahasiswa'
			];
			if ($this->session->role == 'dosen') {
				$where[] = 'daftar.id_penguji='.$this->session->id_dosen;
			}
			$this->load->view('dosen/revisi', [
				'data' => $this->db->get_where('revisi, mahasiswa, daftar',join(' AND ', $where))->result(),
				'editable' => check_config('allow_revisi')
			]);
		} else if ($action == 'edit') {
			$this->load->view('dosen/edit/revisi', [
				'data' => $this->db->get_where('revisi, mahasiswa',"mahasiswa.id_mahasiswa=revisi.id_mahasiswa AND revisi.id_revisi=$id")->result()[0],
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('revisi', ['id_revisi' => $id])->row()->id_login;
			$this->db->delete('revisi', ['id_revisi' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/revisi');
		} else if ($action == 'update') {
			$data = [
				'file_revisi' => form_file_upload('file_revisi', 'revisi'),
				'verifikasi_penguji' => $this->input->post('verifikasi_penguji')
			];

			$this->db->update('revisi', $data, ['id_revisi' => $id]);

			redirect('dosen/revisi');
		}
		$this->load->view('widget/footer');
	}

	public function berkas($action='list',$id=0)
	{
		$this->load->view('widget/header');
		if ($action == 'list') {
			$this->load->view('dosen/berkas', [
				'data' => $this->db->get_where('berkas, mahasiswa','mahasiswa.id_mahasiswa=berkas.id_mahasiswa' )->result()
			]);
		} else if ($action == 'edit') {
			$this->load->view('dosen/edit/berkas', [
				'data' => $this->db->get_where('berkas, mahasiswa',"mahasiswa.id_mahasiswa=berkas.id_mahasiswa AND berkas.id_berkas=$id")->result()[0],
			]);
		} else if ($action == 'delete') {
			$id_login = $this->db->get_where('berkas', ['id_berkas' => $id])->row()->id_login;
			$this->db->delete('berkas', ['id_berkas' => $id]);
			$this->db->delete('login', ['id_login' => $id_login]);
			redirect('dosen/berkas');
		} else if ($action == 'update') {
			$data = [
				'file_berkas' => form_file_upload('file_berkas', 'final')
			];

			$this->db->update('berkas', $data, ['id_berkas' => $id]);

			redirect('dosen/berkas');
		}
		$this->load->view('widget/footer');
	}

}
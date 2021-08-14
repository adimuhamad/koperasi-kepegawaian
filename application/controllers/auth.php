<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') == '1'){			
			redirect('dashboard');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header_login');
			$this->load->view('login');
			
		}else{
			$auth = $this->m_akun->cek_login();

			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Username atau Password Anda Salah!
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>!</div>');
				redirect('login');
			}else{
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);
				if($auth->role_id)
				{
					redirect('dashboard');
				}

			}
		}
	}

	public function signup()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]', [
			'matches' => 'Password Tidak Cocok'
		]);
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',[
			'matches' => 'Password Tidak Cocok'
		]);

		if ($this->form_validation->run() == FALSE)
		{

		$this->load->view('templates/header_login');
		$this->load->view('register');

		}else{

			$nama		= $this->input->post('nama');
			$username	= $this->input->post('username');
			$password	= md5($this->input->post('password'));

			$data = array(
				'nama'			=> $nama,
				'username'		=> $username,
				'password'		=> $password,
				'role_id'		=> 1,

			);

			// $this->db->insert($data, 'tb_akun');
			$this->m_akun->input_data($data, 'tb_akun');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
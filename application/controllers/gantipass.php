<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gantipass extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert">Login Terlebih Dahulu
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>!</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['tb_akun'] = $this->m_gantipass->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gantipass', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]',[
			'required' 		=> 'Password Harus Diisi',
			'matches'  		=> ''
		]);
		$this->form_validation->set_rules('passconf', 'Passconf', 'required|matches[password]',[
			'required' => '',
			'matches'  => 'Password Tidak Cocok'
		]);

		if ($this->form_validation->run() == FALSE)
		{

			$data['tb_akun'] = $this->m_gantipass->tampil_data()->result();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('gantipass', $data);
			$this->load->view('templates/footer');

		}else{
					
			$idAkun 	= $this->input->post('idAkun');
			$password 	= md5($this->input->post('password'));

			$data = array(
				'password'		=> $password,
			);

			$where = array(
				'idAkun' => $idAkun
			);

			$this->m_gantipass->update_data($where, $data, 'tb_akun');
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password telah berhasil diubah!</div>');
			redirect('dashboard');
		}
	}

}
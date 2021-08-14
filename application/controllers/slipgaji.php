<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slipgaji extends CI_Controller{

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
		$data['tb_slipgaji'] = $this->m_slip->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('slipgaji', $data);
		$this->load->view('templates/footer');
	}

	public function detail ($id_slip){
		$where = array('id_slip' => $id_slip);
		$data['tb_slipgaji'] = $this->m_slip->detail($where, 'tb_slipgaji')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detailslip', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_slip()
	{

		$data = array(
			'id_slip'		=> 0,
		);

		$this->m_slip->input_data($data, 'tb_slipgaji');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('slipgaji');
	}

	public function hapus ($id_slip)
	{
		$where = array ('id_slip' => $id_slip);
		$this->m_slip->hapus_data($where, 'tb_slipgaji');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('slipgaji');
	}

	public function edit ($id_slip){
		$where = array('id_slip' => $id_slip);
		$data['tb_slipgaji'] = $this->m_slip->edit_data($where, 'tb_slipgaji')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editslip', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$NIP	= $this->input->post('nip');
		$pangkat	= $this->input->post('pangkat');
		$gaji	= $this->input->post('gaji');
		$tunjangan	= $this->input->post('tunjangan');
		$potongan	= $this->input->post('potongan');
		$lembur	= $this->input->post('lembur');

		$data = array(
			'NIP'		=> $NIP,
			'id_pangkat'		=> $pangkat,
			'gaji'		=> $gaji,
			'tunjangan'		=> $tunjangan,
			'potongan'		=> $potongan,
			'lembur'		=> $lembur,
		);

		$where = array(
			'id_slip' => $id
		);

		$this->m_slip->update_data($where, $data, 'tb_slipgaji');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('slipgaji');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
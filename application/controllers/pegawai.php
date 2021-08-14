<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller{

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
		$data['tb_pegawai'] = $this->m_pegawai->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pegawai', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pegawai');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$NIP	= $this->input->post('nip');
		$Nama	= $this->input->post('nama');
		$Alamat	= $this->input->post('alamat');
		$Telepon	= $this->input->post('telepon');
		$Gaji	= $this->input->post('gaji');
		$Pangkat		= $this->input->post('pangkat');
		$Tipe		= $this->input->post('tipe');
		$slip		= $this->input->post('slip');

		$data = array(
			'NIP'		=> $NIP,
			'Nama'		=> $Nama,
			'Alamat'		=> $Alamat,
			'Telepon'	=> $Telepon,
			'Gaji_bersih'		=> $Gaji,
			'id_pangkat'			=> $Pangkat,
			'id_tipe'			=> $Tipe,
			'id_slip'			=> $slip,
		);
		$this->m_pegawai->input_data($data, 'tb_pegawai');

		$data = array(
			'nip'		=> $NIP,
			'nama'		=> $Nama,
			'id_pangkat'			=> $Pangkat,
			'gaji'		=> $Gaji,	
			'potongan'		=> 0,
			'tunjangan'		=> 0,		
		);

		$where = array(
			'id_slip' => $slip
		);
		$this->m_pegawai->update_data($where, $data, 'tb_slipgaji');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('pegawai');
	}

	public function hapus ($NIP)
	{
		$where = array ('NIP' => $NIP);
		$this->m_pegawai->hapus_data($where, 'tb_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('pegawai');
	}

	public function edit ($NIP){
		$where = array('NIP' => $NIP);
		$data['tb_pegawai'] = $this->m_pegawai->edit_data($where, 'tb_pegawai')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editpgw', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$NIP	= $this->input->post('nip');
		$Nama	= $this->input->post('nama');
		$Alamat	= $this->input->post('alamat');
		$Telepon	= $this->input->post('telepon');
		$Gaji	= $this->input->post('gaji');
		$Pangkat		= $this->input->post('pangkat');
		$Tipe		= $this->input->post('tipe');
		$slip		= $this->input->post('slip');

		$data = array(
			'NIP'		=> $NIP,
			'Nama'		=> $Nama,
			'Alamat'		=> $Alamat,
			'Telepon'	=> $Telepon,
			'Gaji_bersih'		=> $Gaji,
			'id_pangkat'			=> $Pangkat,
			'id_tipe'			=> $Tipe,
			'id_slip'			=> $slip,
		);

		$where = array(
			'NIP' => $NIP
		);

		$this->m_pegawai->update_data($where, $data, 'tb_pegawai');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('pegawai');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
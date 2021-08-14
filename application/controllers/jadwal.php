<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller{

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
		$data['tb_jadwal'] = $this->m_jadwal->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$NIP	= $this->input->post('nip');
		$alasan	= $this->input->post('alasan');
		$keterangan	= $this->input->post('keterangan');
		$mulai	= $this->input->post('mulai');
		$selesai	= $this->input->post('selesai');

		$data = array(
			'NIP'		=> $NIP,
			'alasan'		=> $alasan,
			'keterangan'		=> $keterangan,
			'jam_mulai'		=> $mulai,
			'jam_selesai'		=> $selesai,
		);

		$this->m_jadwal->input_data($data, 'tb_jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil ditambahkan!</div>');
		redirect('jadwal');
	}

	public function hapus ($Id_jadwal)
	{
		$where = array ('Id_jadwal' => $Id_jadwal);
		$this->m_jadwal->hapus_data($where, 'tb_jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('jadwal');
	}

	public function edit ($Id_jadwal){
		$where = array('Id_jadwal' => $Id_jadwal);
		$data['tb_jadwal'] = $this->m_jadwal->edit_data($where, 'tb_jadwal')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editjdw', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$NIP	= $this->input->post('nip');
		$alasan	= $this->input->post('alasan');
		$keterangan	= $this->input->post('keterangan');
		$mulai	= $this->input->post('mulai');
		$selesai	= $this->input->post('selesai');

		$data = array(
			'NIP'		=> $NIP,
			'alasan'		=> $alasan,
			'keterangan'		=> $keterangan,
			'jam_mulai'		=> $mulai,
			'jam_selesai'		=> $selesai,
		);

		$where = array(
			'Id_jadwal' => $id
		);

		$this->m_jadwal->update_data($where, $data, 'tb_jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('jadwal');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
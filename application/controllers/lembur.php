<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lembur extends CI_Controller{

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
		$data['tb_lembur'] = $this->m_lembur->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('lembur', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('lembur');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		include "koneksi.php";

		$NIP	= $this->input->post('nip');
		$mulai	= $this->input->post('mulai');
		$selesai	= $this->input->post('selesai');
		$jumlah	= $this->input->post('jumlah');
		$slip	= $this->input->post('slip');

		$data = array(
			'NIP'		=> $NIP,
			'mulai_lembur'		=> $mulai,
			'selesai_lembur'		=> $selesai,
			'gaji_lembur'		=> $jumlah,
		);

		$insert = mysqli_query($mysqli, "insert into tb_lembur set NIP='$NIP', mulai_lembur='$mulai', selesai_lembur='$selesai', gaji_lembur=$jumlah ");
		if($insert){
	    mysqli_query($mysqli, "update tb_slipgaji set lembur=lembur+$jumlah where id_slip='$slip' ");
	    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Stock telah berhasil ditambahkan!</div>');
	    redirect ('lembur');
		}
	}

	public function hapus ($id_lembur)
	{
		$where = array ('id_lembur' => $id_lembur);
		$this->m_lembur->hapus_data($where, 'tb_lembur');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('lembur');
	}

	public function edit ($id_lembur){
		$where = array('id_lembur' => $id_lembur);
		$data['tb_lembur'] = $this->m_lembur->edit_data($where, 'tb_lembur')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editlmb', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$NIP	= $this->input->post('nip');
		$mulai	= $this->input->post('mulai');
		$selesai	= $this->input->post('selesai');
		$gaji	= $this->input->post('gaji');

		$data = array(
			'NIP'		=> $NIP,
			'mulai_lembur'		=> $mulai,
			'selesai_lembur'		=> $selesai,
			'gaji_lembur'		=> $gaji,
		);

		$where = array(
			'id_lembur' => $id
		);

		$this->m_lembur->update_data($where, $data, 'tb_lembur');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('lembur');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
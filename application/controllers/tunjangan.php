<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tunjangan extends CI_Controller{

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
		$data['tb_tunjangan'] = $this->m_tunjang->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tunjangan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tunjangan');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		include "koneksi.php";

		$NIP	= $this->input->post('nip');
		$deskripsi	= $this->input->post('deskripsi');
		$jumlah	= $this->input->post('jumlah');
		$slip		= $this->input->post('slip');

		$insert = mysqli_query($mysqli, "insert into tb_tunjangan set NIP='$NIP', Deskripsi='$deskripsi', Besar_tunj='$jumlah' ");
		if($insert){
	    mysqli_query($mysqli, "update tb_slipgaji set tunjangan=tunjangan+$jumlah where id_slip='$slip' ");
	    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Stock telah berhasil ditambahkan!</div>');
	    redirect ('tunjangan');
		}
	}

	public function hapus ($Id_tunjangan)
	{
		$where = array ('Id_tunjangan' => $Id_tunjangan);
		$this->m_tunjang->hapus_data($where, 'tb_tunjangan');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('tunjangan');
	}

	public function edit ($Id_tunjangan){
		$where = array('Id_tunjangan' => $Id_tunjangan);
		$data['tb_tunjangan'] = $this->m_tunjang->edit_data($where, 'tb_tunjangan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edittjg', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id	= $this->input->post('id');
		$NIP	= $this->input->post('nip');
		$deskripsi	= $this->input->post('deskripsi');
		$jumlah	= $this->input->post('jumlah');

		$data = array(
			'NIP'		=> $NIP,
			'Deskripsi'		=> $deskripsi,
			'besar_tunj'		=> $jumlah,
		);

		$where = array(
			'Id_tunjangan' => $id
		);

		$this->m_tunjang->update_data($where, $data, 'tb_tunjangan');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('tunjangan');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
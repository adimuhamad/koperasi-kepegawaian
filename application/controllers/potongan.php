<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Potongan extends CI_Controller{

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
		$data['tb_potongan'] = $this->m_potong->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('potongan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('potongan');
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		include "koneksi.php";

		$NIP	= $this->input->post('nip');
		$deskripsi	= $this->input->post('deskripsi');
		$jumlah	= $this->input->post('jumlah');
		$slip		= $this->input->post('slip');

		$insert = mysqli_query($mysqli, "insert into tb_potongan set NIP='$NIP', Desk_potongan='$deskripsi', Besar_pot='$jumlah' ");
		if($insert){
	    mysqli_query($mysqli, "update tb_slipgaji set potongan=potongan+$jumlah where id_slip='$slip' ");
	    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Stock telah berhasil ditambahkan!</div>');
	    redirect ('potongan');
		}
	}

	public function hapus ($id_potongan)
	{
		$where = array ('id_potongan' => $id_potongan);
		$this->m_potong->hapus_data($where, 'tb_potongan');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil dihapus!</div>');
		redirect ('potongan');
	}

	public function edit ($id_potongan){
		$where = array('id_potongan' => $id_potongan);
		$data['tb_potongan'] = $this->m_potong->edit_data($where, 'tb_potongan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('editptg', $data);
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
			'Desk_potongan'		=> $deskripsi,
			'Besar_pot'		=> $jumlah,
		);

		$where = array(
			'id_potongan' => $id
		);

		$this->m_potong->update_data($where, $data, 'tb_potongan');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data telah berhasil diubah!</div>');
		redirect('potongan');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}
<?php

class M_gantipass extends CI_Model{

	public function tampil_data()
	{
		return $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')]);
	}

    public function update_data($where, $data, $table){
    	$this->db->where($where);
    	$this->db->update($table, $data);
    }
}
<?php

class M_akun extends CI_Model{

	public function cek_login()
	{
		$username = set_value('username');
		$password = md5(set_value('password'));

		$result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('tb_akun');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
}
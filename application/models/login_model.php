<?php

class Login_Model extends CI_Model {
	
	public function log_users_in($username, $password) {
		
		$where = array('username' => $username, 'password' => $password);
		
		$query = $this->db->from('utenti')->where($where)->get();
		$rank = $query->row()->rango;
		
		if ($query->num_rows() == 1) {
			$this->session->set_userdata(array('username' => $username, 'password' => $password, 'rank' => $rank));
			return true;
		} else {
			return false;
		}
	}
	
}
<?php

class Users_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		// constructor code
	}

	public function get_users_list($num, $offset) {
		
		$query = $this->db->get('utenti', $num, $offset)->result();
		return $query;
		
	}

}
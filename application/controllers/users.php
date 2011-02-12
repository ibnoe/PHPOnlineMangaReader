<?php

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users_model', 'users');
		$this->load->helper('date');
	}
	
	public function index() {
		// TODO: tutto
	}
	
	public function userlist() {
		
		$this->load->library('pagination');
		
		$config['base_url']   = base_url().'users/userlist/';
		$config['total_rows'] = $this->db->count_all('utenti');
		$config['per_page']   = '5';
		
		$this->pagination->initialize($config);
		
		$data['users_list'] = $this->users->get_users_list($config['per_page'], $this->uri->segment(3));
		
		$this->load->view('users/users_list_view', $data);
		
	}
	
}
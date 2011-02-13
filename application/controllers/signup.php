<?php

class Signup extends CI_Controller {
	
	public function index() {
	
		$this->load->model('Signup_model', 'sign');
	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');	
	
		if ($this->form_validation->run() != FALSE) {
			
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$email    = $this->input->post('email');
			
			$this->sign->add_user($username, $password, $email);
			
		}
		
			$this->load->view('signup/signup_form_view');
		
	}
	
}
<?php

class Signup extends CI_Controller {
	
	public function index() 
	{
		$this->load->model('Signup_model', 'sign');
	
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_is_unique_username');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|callback_is_unique_email');	
	
		$data['success_message'] = '';
	
		if ($this->form_validation->run() != FALSE) 
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$email    = $this->input->post('email');
			
			if ($this->sign->add_user($username, $password, $email))
				$data['success_message'] = '<p>User successfully created</p>';
		}
			$this->load->view('signup/signup_form_view', $data);
	}
	
	public function is_unique_username($str) 
	{
		$where = array('username' => $str);
		$query = $this->db->select('username')->where($where)->get('utenti');
		if ($query->num_rows() != 0)
		{
			$this->form_validation->set_message('is_unique_username', 'This username already exists');
			return false;
		} 
		else 
		{
			return true;
		}
	}
	
	public function is_unique_email($str) 
	{
		$where = array('email' => $str);
		$query = $this->db->select('email')->where($where)->from('utenti')->get();
		if ($query->num_rows() != 0)
		{
			$this->form_validation->set_message('is_unique_email', 'This email address is already used by someone else');
			return false;
		} 
		else 
		{
			return true;
		}
	}	
}
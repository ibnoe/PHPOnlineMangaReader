<?php

class Install extends CI_Controller {
	
	public function index()
	{
		$this->form_validation->set_rules('name', 'Site Name', 'trim|required');
		$this->form_validation->set_rules('host', 'Database Host', 'trim|required');
		$this->form_validation->set_rules('uname', 'Database Username', 'trim|required');
		$this->form_validation->set_rules('pswrd', 'Database Password', 'trim|required');
		$this->form_validation->set_rules('dbname', 'Database Name', 'trim|required');
		
		if ($this->form_validation->run() !== false)
		{
			$this->load->model('Install_model', 'install');
			
			$new_config = array(
				'name'   => $this->input->post('name'),
				'host'   => $this->input->post('host'),
				'uname'  => $this->input->post('uname'),
				'pswrd'  => $this->input->post('pswrd'),
				'dbname' => $this->input->post('dbname')
			);
			
			$this->install->set_config($new_config);
		}
		
		$this->load->view('install/install_form_view');
	}
	
}
<?php 

class Admin extends CI_Controller {
	
	public function index() {
		$this->load->view('admin/admin_index_view');
	}
	
	public function add_series() {
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('plot', 'Plot', 'trim|required');
		$this->form_validation->set_rules('magazine', 'Magazine', 'trim|required');
		$this->form_validation->set_rules('demographic', 'Demographic', 'trim|required');
		
		
	}
	
	public function manage_series() {
		
	}
	
	public function add_chapter() {
		
	}
	
	public function rem_chapter() {
		
	}
	
	public function insert_flash_news() {
		
	}
	
}
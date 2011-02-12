<?php

class Uploads extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Upload_model', 'ul');
	}
	
	public function index() {
		
		// imposta le regole di validazione
		$this->form_validation->set_rules('series', 'series', 'callback_check_value');
		$this->form_validation->set_rules('chapter', 'chapter', 'trim|required|integer');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		
		$data['errors'] = '';
		
		if ($this->form_validation->run() !== FALSE) {
			
			$series  = $this->input->post('series');  // recupera il dato inserito nel campo series del form
			$chapter = $this->input->post('chapter'); // recupera il dato inserito nel campo chapter del form
			$title   = $this->input->post('title');   // recupera il dato inserito nel campo title del form	
			
			$this->ul->create_chapter_dir($series, $chapter);
			$data['errors'] = $this->ul->upload($series, $chapter);
			
		}
		
		$data['series_titles'] = $this->ul->get_series_titles();
		$this->load->view('upload/upload_form_view', $data);
		
	}
	
	public function check_value($str) {
		if ($str == 'select') {
			$this->form_validation->set_message('check_value', 'You must select a %s');
			return false;	
		} else { 
			return true;
		}
	}
	
}
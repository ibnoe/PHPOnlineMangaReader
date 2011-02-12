<?php

class Login extends CI_Controller {

	public function index() {

		// controlla se l'utente è già loggato
		if ($this->session->userdata('username')) {
			redirect('users/cpanel/');
		}

		$this->load->model('Login_Model', 'login');
	
		// regole di validazione
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	
		// Controlla se il form è stato inviato e se non la validazione ha avuto successo
		if ($this->form_validation->run() === TRUE) {

			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			
			// Controlla se i dati sono corretti
			if ($this->login->log_users_in($username, $password) === TRUE) {

				redirect('users/cpanel/');

			} else {

				$data['login_error'] = "Utente non trovato";
			
			}
			
		}
		
			// Carica la view standard se non è stato inviato il form
			$data['title'] = 'Effettua il login';
			$this->load->view('login/login_form_view', $data);
		
	}
	
	public function logout() {
		
		// elimina la sessione -- log out
		$this->session->sess_destroy();
		redirect('login/');
		
	}

}
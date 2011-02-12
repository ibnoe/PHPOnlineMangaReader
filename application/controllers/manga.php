<?php

class Manga extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Home_Model', 'home');
		$this->load->helper('date');
	}

	public function index() {
	
		// Salva la view da caricare
		$data['main_view'] = 'home/home_view';
		
		// Recupero tutti i dati dal DB
		$data['flash_news']    = $this->home->flash_news(); // Recupera le ultime 5 flash news
		$data['chapters_list'] = $this->home->last_uploaded_chapters(10); // Ultimi capitoli
		$data['series_list']   = $this->home->series_list(); // Lista completa delle serie
		
		$this->load->view('public/template/template', $data);
		
	}

	public function series($series = FALSE) {
		
		if ($series === FALSE)
			redirect(base_url());
		
		$data['main_view'] = 'home/series_view';
		
		$data['series_info'] = $this->home->get_series_info($series); // Recupera tutte le info sulla serie richiesta
		$data['series_list'] = $this->home->series_list(); // Lista completa delle serie
		
		$this->load->view('public/template/template', $data);
		
	}
	
	public function view($series = FALSE, $chapter_num = FALSE, $page = 1) {
	
		if ($chapter_num === FALSE || $series === FALSE) {
			redirect(base_url());
		}
	
		$this->load->helper('file');
	
		$data['series']      = $series;
		$data['chapter_num'] = $chapter_num;
		$data['sel_page']    = (int) $page;
		
		$data['chapter_title'] = $this->home->get_chapter_title($series, $chapter_num); // Recupera il titolo del capitolo
		$data['images_array']  = $this->home->get_chapter_files($series, $chapter_num); // Recupera le pagine del capitolo e le inserisce in un array
		$data['page_num']      = count($data['images_array']); // Calcola il numero di pagine totali del capitolo

		$this->load->view('home/manga_view', $data);
		
	}
	
}
<?php

class Home_Model extends CI_Model {
	
	/* Metodi per "home_view" */
	
	public function last_uploaded_chapters($num) {
	
		/*
		@Parametri
			$num - numero di capitoli da recuperare
		
		@Return
			Array di oggetti / stringa vuota (se la query non produce risultati)
		
		@Descrizione
			Restituisce un array di oggetti che comprende gli ultimi "$num" capitoli uploadati
		*/
	
		$query = $this->db->from('capitoli')->join('serie', 'capitoli.id_serie = serie.id')
			->select('titolo_serie, titolo_capitolo, numero_capitolo, data')->limit($num)
			->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r) {
				$data[] = $r;
			}
		} else {
			$data = "";
		}
		
		return $data;
		
	}
	
	public function series_list() {

		/*
			@Parametri
				Nessuno
			
			@Return
				Array di oggetti / stringa vuota (se la query non produce risultati)
			
			@Descrizione
				Recupera dal database l'elenco completo delle serie
		*/
		
		$query = $this->db->from('serie')->select('titolo_serie, autore_serie')->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r) {
				$data[] = $r;
			}
		} else {
			$data = "";
		}
		
		return $data;
	}
	
	public function flash_news() {
		
		/*
			@Parametri
				Nessuno
				
			@Return
				Array di oggetti
				
			@Descrizione
				Recupera le ultime 5 flash news inserite
		*/
		
		$query = $this->db->from('news')->limit(5)->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r) {
				$data[] = $r;
			}
		} else {
			$data = "";
		}
		
		return $data;
		
	}
	
	/* Metodi per "series_view" */
	
	public function get_series_info($series) {
		
		/*
			@Parametri
				$series -- il nome della serie di cui recuperare le informazioni
			
			@Return
				Oggetto
				
			@Descrizione
				Recupera tutte le informazioni necessarie sulla serie desiderata
		*/
		
		$query = $this->db->from('serie')->where('titolo_serie', $series)->get()->row();
		
		return $query;
		
	}
	
	/* Metodi per "manga_view" */
	
	public function get_chapter_title($series, $chapter_num) {

		/*
			@Parametri
				$series  -- il nome della serie a cui appartiene il capitolo
				$chapter_num -- il numero del capitolo di cui recuperare il titolo 
			
			@Return
				Array
				
			@Descrizione
				Recupera il titolo del capitolo desiderato
		*/
		
		$where = array('numero_capitolo' => $chapter_num, 'titolo_serie' => $series);
		
		$query = $this->db->from('capitoli')->join('serie', 'capitoli.id_serie = serie.id')
			->where($where)->select('titolo_capitolo')->get()->row();
			
		return $query;
		
	}
	
	public function get_chapter_files($series, $chapter_num) {

		/*
			@Parametri
				$series  -- il nome della serie a cui appartiene il capitolo
				$chapter_num -- il numero del capitolo di cui recuperare l'elenco dei file
			
			@Return
				Array
				
			@Descrizione
				Genera un array contenente l'elenco di tutti i file del capitolo
		*/
		
		$dir = '.'.DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$series.DIRECTORY_SEPARATOR.$chapter_num.DIRECTORY_SEPARATOR;
		
		$file_array = get_filenames($dir);
		
		sort($file_array); // risolve un problema di posizionamento delle immagini nell'array
		
		return $file_array;
		
	}	

}
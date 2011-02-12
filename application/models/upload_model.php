<?php 

class Upload_model extends CI_Model {
	
	public function create_chapter_dir($series, $chapter) {
		if (!is_dir('./upload' . DIRECTORY_SEPARATOR . $series . DIRECTORY_SEPARATOR . $chapter)) {
			mkdir('./upload' . DIRECTORY_SEPARATOR . $series . DIRECTORY_SEPARATOR . $chapter, 0777);
		}
	}
	
	private function remove_chapter_dir($series, $chapter) {
		rmdir('./upload' . DIRECTORY_SEPARATOR . $series . DIRECTORY_SEPARATOR . $chapter);
	}
	
	 /**
	 * Uploads files to the selected directory 
	 * @param String $series
	 * @param Integer $chapter
	 */
	public function upload($series, $chapter) {
		
		// upload library configuration
		$config['upload_path']   = realpath(APPPATH . '../upload'. DIRECTORY_SEPARATOR . $series . DIRECTORY_SEPARATOR . $chapter);
		$config['allowed_types'] = 'gif|jpg|jpeg|png|zip';
		$config['max_size']	     = '6144';
		
		$where = array('numero_capitolo' => $chapter);
		$query = $this->db->from('capitoli')->select('numero_capitolo')->where($where)->get(); // check if the chapter already exists on the server
		
		if ($query->num_rows() == 0): // if it doesn't exists...
		
			$this->load->library('upload', $config);
			
			$this->create_chapter_dir($series, $chapter); // create a directory for the chapter
	
			if ($this->upload->do_upload() == FALSE) {
				$errors = array('error' => $this->upload->display_errors()); // save upload errors...
				if (!is_dir('./upload' . DIRECTORY_SEPARATOR . $series . DIRECTORY_SEPARATOR . $chapter))
					$this->remove_chapter_dir($series, $chapter);
			} else {
				$errors = array('error' => '<p>File uploaded successfully</p>');
			}

		else:

			$errors = array('error' => '<p>The chapter already exists</p>');
		
		endif;
		
		return $errors;
		
	}
	
	/**
	 * Fetch all series names
	 * @return Array of objects
	 */
	public function get_series_titles() {
		
		$query = $this->db->from('serie')->select('titolo_serie')->get();
		
		foreach ($query->result() as $r) {
			$data[] = $r->titolo_serie;
		}
		
		return $data;
	}
	
}
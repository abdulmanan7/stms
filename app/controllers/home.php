<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$this->load->view('home/index.php');
	}

}

/* End of file home.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/home.php */
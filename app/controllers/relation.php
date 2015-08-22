<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relation extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('relation_model', 'relation');
	}
	public function add_client($client_id = '') {
		(is_valid_id($client_id, 'client')) ? '' : show_error($this->lang->line('not_valid_id'));
		$is_added = $this->relation->add($client_id);
		if ($is_added > 0) {
			$this->session->set_flashdata('message', set_message($this->lang->line('db_client_added')));
			redirect('dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('message', set_message($this->lang->line('db_client_add_error')));
			redirect('dashboard', 'refresh');
		}
	}
	public function remove($client_id) {
		(is_valid_id($client_id, 'client')) ? '' : show_error($this->lang->line('not_valid_id'));
		$is_remove = $this->relation->remove($client_id);
		if ($is_remove) {
			$this->session->set_flashdata('message', set_message($this->lang->line('db_client_removed')));
			redirect('dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('message', set_message($this->lang->line('db_client_remove_error')));
			redirect('dashboard', 'refresh');
		}
	}

}

/* End of file relation.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/relation.php */
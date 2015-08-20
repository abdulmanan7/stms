<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  Company Model
 *
 * Author:  Abdul Manan
 *
 */

class Invoice_details_model extends CI_Model {
	public $comp_id;
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->comp_id = $this->session->userdata('company_id');
	}

	//CRUD Start
	public function add($data, $company_id = NULL) {
		$company_id         = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->insert_batch('tblinvoice_details', $data);
		return ($this->db->_error_message()) ? $this->common_lib->set_message($this->db->_error_message(), 'error') : $this->common_lib->set_message($this->lang->line('db_added_record'));
	}

	public function update($data, $company_id = NULL) {
		$company_id         = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->where('id', $data['id']);
		$this->db->where('company_id', $company_id);
		$this->db->update('tblinvoice', $data);

		return ($this->db->_error_message()) ? $this->common_lib->set_message($this->db->_error_message(), 'error') : $this->common_lib->set_message($this->lang->line('db_updated_record'));
	}

	public function delete($id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		if ($id > 0) {
			$this->db->where('id', $id);
			$this->db->where('company_id', $company_id);
			$this->db->limit(1, 0);
			$this->db->delete('tblinvoice');
			return ($this->db->affected_rows() > 0) ? $this->common_lib->set_message($this->lang->line('db_deleted_record')) : $this->common_lib->set_message($this->lang->line('db_delete_error'));
		} else {
			return $this->common_lib->set_message($this->lang->line('db_correct_id'), 'info');
		}
	}

	public function getinvoice($invoiceId = NULL, $company_id = NULL, $data = array()) {
		if (!empty($data)) {
			$this->db->limit($data['limit'], $data['offset']);
		}
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*')->from('tblinvoice');
		$this->$this->db->where('company_id', $company_id);
		//single record
		if ($invoiceId) {
			$this->db->where('id', $invoiceId);
		}

		if ($invoiceId) {
			return $this->db->get()->row_array();
		}

		//multiple list
		else {
			return $this->db->get()->result_array();
		}

	}
	function delete_page($id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		return $this->db->query("
	    DELETE FROM tblinvoice_details JOIN tblinvoice
	    ON tblinvoice_details.invoice_id = tblinvoice.id
	    WHERE tblinvoice.id = '" . $id . "'");
	}
	public function rec_count($company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		return $this->db->count_all_results("tblinvoice");
	}
}
<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  type Model
 *
 * Author:  Abdul Manan
 *
 */

class Invoice_type_model extends CI_Model {
	public $comp_id;
	public $table = array('name' => 'tblinvoice_type');
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->comp_id = $this->session->userdata('user_id');
	}

	//CRUD Start
	public function add($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->insert($this->table['name'], $data);
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_added_record'));
	}

	public function update($data, $company_id = NULL) {
		// pr($data);
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$Id = $this->uri->segment(3);
		$where = "id = $Id AND (company_id = $company_id OR company_id = 0)";
		$this->db->where($where, NULL, FALSE);
		$this->db->update($this->table['name'], $data);
		// pr($this->db->last_query());
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_updated_record'));
	}

	public function delete($id, $company_id = NULL) {
		$company_id = $company_id ? $company_id : $this->comp_id;
		if ($id > 0) {
			$this->db->where('id', $id);
			$this->db->where('is_system !=', '1');
			$this->db->where('company_id', $company_id);
			$this->db->limit(1, 0);
			$this->db->delete($this->table['name']);
			return ($this->db->affected_rows() > 0) ? set_message($this->lang->line('db_deleted_record')) : set_message($this->lang->line('db_delete_error'));
		} else {
			return set_message($this->lang->line('db_delete_error'), 'info');
		}
	}

	public function get($id = NULL, $data = array(), $company_id = NULL) {
		if (!empty($data)) {
			$this->db->limit($data['limit'], $data['offset']);
		}
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$where = "(`company_id` = $company_id OR `company_id` = 0)";
		$this->db->where($where, NULL, FALSE)->order_by('id', 'ASC');
		//single record
		if ($id) {
			$this->db->where('id', $id);
			return $this->db->get($this->table['name'])->row_array();
		}
		//multiple list
		else {
			return $this->db->get($this->table['name'])->result_array();
		}

	}
	public function rec_count($company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->or_where('company_id', 0);
		return $this->db->count_all_results("tblinvoice_type");
	}
}
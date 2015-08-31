<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	protected $_table = 'client';
	protected $return_type = 'array';
	protected $comp_id;
	public $_database;

	public function __construct() {
		parent::__construct();
		$this->comp_id = $this->session->userdata('user_id');
		$this->_database = $this->db;
	}
	public function count_all($table = '', $comp_check = TRUE) {
		if ($comp_check) {
			$this->db->where('company_id', $this->comp_id);
		}
		return $this->db->count_all($table);
	}
	public function record_exists($table, $field, $field_val, $comp_check = FALSE) {
		if ($comp_check) {
			$this->db->where('company_id', $this->comp_id);
		}
		$this->db->where($field, $field_val);
		$count = $this->db->count_all_results($table);
		if ($count > 0) {
			return TRUE;
		}
		return FALSE;
	}
	public function insert($data, $table) {
		if ($data !== FALSE) {
			$this->_database->insert($table, $data);
			$insert_id = $this->_database->insert_id();
			return $insert_id;
		} else {
			return FALSE;
		}
	}
	public function update($id, $data, $table = '') {
		$table = (!empty($table)) ? $table : $this->_table;
		if ($table == "kurta_pem") {
			$this->db->where('kurta_id', $data['kurta_id']);
		} else {
			$this->db->where('id', $id);
		}

		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return (bool) TRUE;
		}
		return (bool) FALSE;
	}
	/**
	 * Delete a row from the table by the primary value
	 */
	public function delete($id, $primary_key = 'id') {
		$this->_database->where($primary_key, $id);
		$result = $this->_database->delete($this->_table);
		return $result;
	}

	public function get($table, $comp_check = FALSE) {
		if ($comp_check) {
			$this->db->where('company_id', $this->comp_id);
		}
		return $this->db->get($table);
	}
	public function get_by() {
		if ($comp_check) {
			$this->db->where('company_id', $this->comp_id);
		}
		$where = func_get_args();

		$this->_set_where($where);
		$row = $this->_database->get($table)
			->{$this->_return_type()}();
		$this->_temporary_return_type = $this->return_type;

		$row = $this->trigger('after_get', $row);

		$this->_with = array();
		return $row;
	}
	protected function _set_where($params) {
		if (count($params) == 1 && is_array($params[0])) {
			foreach ($params[0] as $field => $filter) {
				if (is_array($filter)) {
					$this->_database->where_in($field, $filter);
				} else {
					if (is_int($field)) {
						$this->_database->where($filter);
					} else {
						$this->_database->where($field, $filter);
					}
				}
			}
		} else if (count($params) == 1) {
			$this->_database->where($params[0]);
		} else if (count($params) == 2) {
			if (is_array($params[1])) {
				$this->_database->where_in($params[0], $params[1]);
			} else {
				$this->_database->where($params[0], $params[1]);
			}
		} else if (count($params) == 3) {
			$this->_database->where($params[0], $params[1], $params[2]);
		} else {
			if (is_array($params[1])) {
				$this->_database->where_in($params[0], $params[1]);
			} else {
				$this->_database->where($params[0], $params[1]);
			}
		}
	}
}

/* End of file Common.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/models/Common.php */
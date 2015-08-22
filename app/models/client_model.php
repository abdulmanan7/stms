<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  client Model
 *
 * Version: 1
 *
 * Author:  Abdul Manan
 * 		   abdulmanan7@hotmail.com
 *	  	   @abdulmanan7
 *
 *
 */

class Client_model extends MY_Model {
	protected $_table = 'client';
	protected $return_type = 'array';
	protected $comp_id;
	public function __construct() {
		parent::__construct();
		$this->comp_id = $this->session->userdata('user_id');
	}
	public function insert($data, $table = '') {
		$this->db->insert($table, $data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
	public function get_kurta($params) {
		$this->db->select('k.*,client.id as clientId ,client.*');
		$this->db->from($this->_table);
		$this->db->join('kurta_pem k', 'k.client_id = client.id', 'left');
		if (isset($params['cellphone'])) {
			$this->db->where('client.cellphone', $params['cellphone']);
		}
		if (isset($params['name'])) {
			$this->db->where('client.name', $params['name']);
		}
		if (isset($params['client_id'])) {
			$this->db->where('client.id', $params['client_id']);
		}
		return $this->db->get()->row_array();
	}
	//This function is used for populating dropdown list.
	function get_client_by_cell($q, $company_id = NULL) {
		// $company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*');
		// $this->db->where('company_id', $company_id);
		// ($purchase_req === TRUE) ? $this->db->where('enable_stock', '1') : "";
		$this->db->like('cellphone', $q);
		$query = $this->db->get($this->_table);
		if ($query->num_rows > 0) {
			$new_row = '';
			foreach ($query->result_array() as $row) {
				$new_row['id'] = $row['id'];
				$new_row['label'] = $row['cellphone'];
				$new_row['name'] = $row['name'];
				// $new_row['name'] = htmlentities(stripslashes($row['name']));
				$row_set[] = $new_row; //build an array
			}
			return json_encode($row_set); //format the array into json data
		}
	}
	public function record_exists($table = 'client', $field, $field_val) {
		$this->db->where($field, $field_val);
		$count = $this->db->count_all_results($table);
		if ($count > 0) {
			return TRUE;
		}
		return FALSE;
	}
	public function get_clients($limit = '', $offset = '') {
		$this->db->limit($limit, $offset);
		$this->db->select();
		$this->db->join('client_company_relation r', 'r.client_id = client.id', 'left');
		$this->db->where('r.company_id', $this->comp_id);
		$res = $this->db->get($this->_table);
		return $res->result_array();
	}
	public function client_search($search, $row = FALSE) {
		$this->db->limit(1, 0);
		$this->db->where('cellphone', $search);
		$res = $this->db->get($this->_table);
		if ($row == TRUE) {
			return $res->row_array();
		}
		return $res->result_array();
	}
	public function update($id, $data, $table = '') {
		$this->db->where('client_id', $id);
		if ($table == "kurta_pem") {
			$this->db->where('kurta_id', $data['kurta_id']);
		}
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return (bool) TRUE;
		}
		return (bool) FALSE;
	}
	function get_by_cell($q) {
		$this->db->limit(10, 0);
		$this->db->like('cellphone', $q);
		$res = $this->db->get($this->_table);

		return $res->result_array();
	}
	function get_by_name($q) {
		$this->db->limit(10, 0);
		$this->db->like('name', $q);
		$res = $this->db->get($this->_table);

		return $res->result_array();
	}
}
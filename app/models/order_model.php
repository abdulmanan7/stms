<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model {
	protected $_table = 'orders';
	protected $return_type = 'array';
	function get_order_by_cell($q, $company_id = NULL) {
		// $company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*');
		// $this->db->where('company_id', $company_id);
		// ($purchase_req === TRUE) ? $this->db->where('enable_stock', '1') : "";
		$this->db->like('id', $q);
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
	public function record_exists($table = 'orders', $field, $field_val) {
		$this->db->where($field, $field_val);
		$count = $this->db->count_all_results($table);
		if ($count > 0) {
			return TRUE;
		}
		return FALSE;
	}
	public function get_orders($limit = '', $offset = '') {
		$this->db->limit($limit, $offset);
		$res = $this->db->get($this->_table);
		return $res->result_array();
	}
	public function order_search($search, $limit = '', $offset = '') {
		$this->db->limit($limit, $offset);
		$this->db->where('cellphone', $search);
		$res = $this->db->get($this->_table);
		return $res->result_array();
	}
	public function update($id, $data, $table = '') {
		$this->db->where('order_id', $id);
		if ($table == "kurta_pem") {
			$this->db->where('kurta_id', $data['kurta_id']);
		}
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return (bool) TRUE;
		}
		return (bool) FALSE;
	}
}

/* End of file order_model.php */
/* Location: ./application/models/order_model.php */
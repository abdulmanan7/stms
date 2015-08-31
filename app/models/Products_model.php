<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  Company Model
 *
 * Author:  Abdul Manan
 *
 */

class Products_model extends MY_Model {
	public $comp_id;
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->comp_id = $this->session->userdata('user_id');
	}

	//CRUD Start
	public function add($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;

		$this->db->insert('products', $data);
		$product_id = $this->db->insert_id();
		if ($product_id > 1) {
			return set_message($this->lang->line('db_added_record'));
		} else {
			return set_message($this->db->_error_message(), 'error');
		}

	}

	/*public function update($data, $company_id = NULL) {
	$company_id = ($company_id) ? $company_id : $this->comp_id;
	$data['company_id'] = $company_id;
	$this->db->where('id', $data['id']);
	$this->db->where('company_id', $company_id);
	$this->db->update('products', $data);
	return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_updated_record'));

	}*/
	public function delete($id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('id', $id);
		$this->db->where('company_id', $company_id);
		$this->db->limit(1, 0);
		$this->db->delete('products');
		return ($this->db->affected_rows() > 0) ? set_message($this->lang->line('db_deleted_record')) : set_message($this->lang->line('db_delete_error'));
	}

	public function getProduct($productId = NULL, $company_id = NULL, $data = array()) {
		if (!empty($data)) {
			$this->db->limit($data['limit'], $data['offset']);
		}
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*')->from('products')->where('company_id', $company_id);

		//single record
		if ($productId) {
			$this->db->where('id', $productId);
			return $this->db->get()->row_array();
		}
		//multiple list
		else {
			return $this->db->get()->result_array();
		}

	}
	//This function is used for populating dropdown list.
	function get_products($q, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*');
		$this->db->where('company_id', $company_id);
		$this->db->like('name', $q);
		$query = $this->db->get('products');
		$row_set = array();
		if ($query->num_rows > 0) {
			foreach ($query->result_array() as $row) {
				$new_row['id'] = htmlentities(stripslashes($row['id']));
				$new_row['label'] = htmlentities(stripslashes($row['name']));
				$new_row['price'] = htmlentities(stripslashes($row['price']));
				$row_set[] = $new_row; //build an array
			}
			return $row_set; //format the array into json data
		}
	}
	public function rec_count($company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		return $this->db->count_all_results("products");
	}
	public function validate_product($productId, $stock_entry = FALSE, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		if ($stock_entry) {
			$qr = $this->db->get_where('products', array('company_id' => $company_id, 'id' => $productId, 'enable_stock' => '1'));
		} else {
			$qr = $this->db->get_where('products', array('company_id' => $company_id, 'id' => $productId));
		}
		if ($qr->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
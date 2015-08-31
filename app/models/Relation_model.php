<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Name:  relation Model
 *
 *description:  it will store client and company relation
 * Version: 1
 *
 * Author:  Abdul Manan
 * 		   abdulmanan7@hotmail.com
 *	  	   @abdulmanan7
 *
 *
 */

class Relation_model extends CI_Model {
	protected $_table = 'client_company_relation';
	protected $return_type = 'array';
	public function __construct() {
		parent::__construct();
		$this->comp_id = $this->session->userdata('user_id');
	}

	public function add($client_id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data = array('client_id' => $client_id, 'company_id' => $this->comp_id);
		$this->db->insert($this->_table, $data);
		if ($this->db->insert_id() > 0) {
			return (bool) TRUE;
		}
		return (bool) FALSE;
	}
	public function remove($client_id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->where('client_id', $client_id);
		$this->db->limit(1, 0);
		$this->db->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			return (bool) TRUE;
		} else {
			return (bool) FALSE;
		}
	}
	public function get_status($client_id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->where('client_id', $client_id);
		$res = $this->db->get($this->_table);
		if ($res->num_rows() > 0) {
			return (bool) TRUE;
		} else {
			return (bool) FALSE;
		}
	}

}

/* End of file relation_model.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/models/relation_model.php */
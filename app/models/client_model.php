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
	public function insert_client($data, $table) {
		$this->db->insert($table, $data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
}
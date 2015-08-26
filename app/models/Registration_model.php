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
class Registration_model extends CI_Model {
	protected $_table = 'registration';
	protected $return_type = 'array';
	public function __construct() {
		parent::__construct();
	}
	public function adding_default_records($data) {
		$this->db->trans_start();
		$comp_id = $data['id'];
		//adding company
		$this->db->insert('company', $data);
		//adding currency
		$cur_data = array('company_id' => $comp_id);
		$this->db->insert('currency', $cur_data);
		//adding product
		$pro_data = array('company_id' => $comp_id, 'name' => 'Normal Suit', 'price' => '500', 'notes' => 'only Suit');
		$this->db->insert('products', $pro_data);
		//adding invoice statuses
		$inv_status_data = array(
			array(
				'company_id' => $comp_id,
				'name' => 'Pending',
				'is_system' => 1,
				'is_enable' => 1,
				'is_default' => 1,
			),
			array('company_id' => $comp_id,
				'name' => 'Paid',
				'is_system' => 1,
				'is_enable' => 1,
				'is_default' => 0,
			),
			array('company_id' => $comp_id,
				'name' => 'Partially Paid',
				'is_system' => 1,
				'is_enable' => 1,
				'is_default' => 0,
			),
		);
		$this->db->insert_batch('tblinvoice_statuses', $inv_status_data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return (bool) FALSE;
		} else {
			return (bool) TRUE;
		}
	}
}
/* End of file relation_model.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/models/relation_model.php */
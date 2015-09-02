<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  Company Model
 *
 * Author:  Abdul Manan
 *
 */

class Customer_care_model extends CI_Model {
	public $comp_id;
	protected $table = array('contact' => 'contact_us', 'sugestion' => 'give_sugestion', 'subscribe' => 'subscribe');
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->comp_id = $this->session->userdata('user_id');

	}

	//CRUD Start
	public function contact_save($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->insert($this->table['contact'], $data);
		if ($this->db->insert_id() > 0) {
			return set_message('Message Sent successfully ,we will contact you soon !thanks', 'success');
		}
		return set_message('Sorry ! message cannot be sent right now !try agian later', "error");
	}
	public function subscribe($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->insert($this->table['subscribe'], $data);
		if ($this->db->insert_id() > 0) {
			return set_message('Thanks you ! , you have apply for <b>' . $data['pakage_description'] . '! </b>our team will contact you soon !', 'success');
		}
		return set_message('Sorry ! your subscription cannot be made right now !try agian later', "error");
	}
}
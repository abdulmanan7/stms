<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Name:  Status Model
 *
 * Author:  Abdul Manan
 *
 */

class Invoice_status_model extends CI_Model {
	public $comp_id;
	protected $table = array('master' => 'tblinvoice_statuses', 'child' => 'tblinvoice_status');
	public function __construct() {
		parent::__construct();
		$this->load->helper('date');
		$this->comp_id = $this->session->userdata('user_id');
	}

	//CRUD Start
	public function add($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->insert($this->table['master'], $data);
		if ($data['is_default']) {
			if (!$data['is_enable']) {
				return "You have to make it Enable first.";
				die;
			} else {
				$status_id = $this->db->insert_id();
				$this->db->where('company_id', $company_id);
				$this->db->where('id !=', $status_id);
				$this->db->set('is_default', '0');
				$this->db->update($this->table['master']);
			}
		}
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_added_record'));
	}

	public function update($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$data['company_id'] = $company_id;
		$this->db->where('id', $data['id']);
		$this->db->where('company_id', $company_id);
		$this->db->update($this->table['master'], $data);
		if ($this->db->affected_rows() > 0) {
			$this->clearDefault($data['id']);
		}
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_updated_record'));
	}

	public function delete($id, $company_id = NULL) {
		$company_id = $company_id ? $company_id : $this->comp_id;
		if ($id > 0 && !$this->is_default($id, $company_id)) {
			$this->db->where('id', $id);
			$this->db->where('company_id', $company_id);
			$this->db->limit(1, 0);
			$this->db->delete($this->table['master']);
			return ($this->db->affected_rows() > 0) ? set_message($this->lang->line('db_deleted_record')) : set_message($this->lang->line('db_delete_error'));
		} else {
			return set_message($this->lang->line('db_correct_id'), 'info');
		}
	}

	public function get($invoice_statusesId = NULL, $company_id = NULL, $data = array()) {
		if (!empty($data)) {
			$this->db->limit($data['limit'], $data['offset']);
		}
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*')->from($this->table['master'])->where('company_id', $company_id);
		$this->db->or_where('company_id', 0)->order_by('is_default', 'DESC');
		//single record
		if ($invoice_statusesId) {
			$this->db->where('id', $invoice_statusesId);
		}

		if ($invoice_statusesId) {
			return $this->db->get()->row_array();
		}

		//multiple list
		else {
			return $this->db->get()->result_array();
		}

	}
	public function get_st($Id = NULL, $company_id = NULL) {
		// $company_id = ($company_id) ? $company_id : $this->comp_id;
		// $qryResult = $this->db->select()->from($this->table['child'])->where('invoice_id', $Id)->get()->result_array();
		// foreach ($qryResult as $key => $value) {
		// 	$qryResult[$key]['name'] = $this->db->select()->from($this->table['master'])->where(array('id' => $qryResult[$key]['invoice_statuses_id'], 'company_id' => $company_id))->or_where('company_id', 0)->get()->row('name');
		// }

		// return $qryResult;
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('tblinvoice_statuses.name,tblinvoice_status.*');
		$this->db->from($this->table['master']);
		$this->db->join('tblinvoice_status', 'tblinvoice_status.invoice_statuses_id = tblinvoice_statuses.id');
		$where = "tblinvoice_status.invoice_id = $Id AND (tblinvoice_statuses.company_id = $company_id OR tblinvoice_statuses.company_id = 0)";
		$this->db->where($where, NULL, FALSE)->order_by('tblinvoice_status.time_stamp', 'desc');
		$qryResult = $this->db->get()->result_array();
		return $qryResult;
	}
	public function get_st_last($Id = NULL, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$qryResult = $this->db->select()->from($this->table['child'])->where('invoice_id', $Id)->order_by('time_stamp', 'desc')->limit(1)->get()->row_array();
		$qryResult['status'] = $this->db->select()->from($this->table['master'])->where(array('id' => $qryResult['invoice_statuses_id'], 'company_id' => $company_id))->or_where('company_id', 0)->get()->row('name');

		return $qryResult;
	}
	public function getdefault($limit = 1, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->or_where('company_id', 0);
		$this->db->where('is_default', '1');
		$this->db->limit($limit);
		$query = $this->db->get($this->table['master']);
		return $query->row_array();
	}
	public function getstatusjson($limit = 1) {
		// $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
		$this->db->where('company_id', $this->comp_id);
		$this->db->or_where('company_id', 0);
		$this->db->where('is_default', '1');
		$this->db->limit($limit);
		$query = $this->db->get($this->table['master']);
		return $query->row_array();
	}
	public function add_details($data) {
		$this->db->insert($this->table['child'], $data);
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_added_record'));
	}
	public function rec_count($company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->or_where('company_id', 0);
		return $this->db->count_all_results($this->table['master']);
	}
	public function is_default($Id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->or_where('company_id', 0);
		$this->db->where('is_default', '1');
		$this->db->where('id', $Id);
		$query = $this->db->get($this->table['master']);
		return ($query->num_rows() > 0) ? TRUE : FALSE;
	}
	public function makeDefault($id) {
		$company_id = $this->comp_id;
		$where = "id = $id AND (company_id = '$company_id' OR company_id = 0)";
		$this->db->where($where, NULL, FALSE);
		// $this->db->where('id', $id);
		// $this->db->where('company_id', $company_id);
		$this->db->set('is_default', '1');
		$this->db->update($this->table['master']);
		if ($this->db->affected_rows() > 0) {
			$this->clearDefault($id);
		}
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_updated_record'));

	}
	private function clearDefault($id) {
		$company_id = $this->comp_id;
		$where = "id != $id AND (company_id = '$company_id' OR company_id = 0)";
		$this->db->where($where, NULL, FALSE);
		// $this->db->where('company_id', $company_id);
		$this->db->set('is_default', '0');
		$this->db->update($this->table['master']);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
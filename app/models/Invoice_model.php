<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/**
 * Name:  Invoice Model
 *
 * Author:  Abdul Manan
 *
 */
class Invoice_model extends CI_Model {
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
		$data = array('total' => '', 'totaltax' => '', 'subtotal' => '');
		/*	if (isset($data['product']['pending'])) {
		$data['product']['client_id'] = $data['client_id'];
		}*/
		$this->db->trans_start();
		foreach ($data['product']['product_id'] as $key => $val) {
			$data['subtotal'] += $data['product']['price'][$key] * $data['product']['qty'][$key];
			$data['totaltax'] += 0;
			$data['total'] = $data['subtotal'] + $data['totaltax'];
		}
		$product = $data['product'];
		unset($data['product']);
		$this->db->insert('tblinvoice', $data);
		//inserting data in invoice cache
		$invoiceID = $this->db->insert_id();
		//adding invoice count
		$this->add_invoice_count($invoiceID, $data['invoice_type']);
		//Adding Invoice Status
		$this->add_invoice_status($invoiceID);
		//add details
		$product['inv_id'] = $invoiceID;
		$this->_addInvoiceDetails($product);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_error'), 'error');
		} else {
			return set_message($this->lang->line('db_added_record'));
		}
	}
	public function update($data, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->trans_start();
		$data['company_id'] = $company_id;
		$data = array('total' => '', 'totaltax' => '', 'subtotal' => '');
		foreach ($data['product']['product_id'] as $key => $val) {
			$tax = $this->tax_details($data['product']['tax_type_id'][$key]);
			$data['subtotal'] += $data['product']['price'][$key] * $data['product']['qty'][$key];
			$data['totaltax'] += 0;
			$data['total'] = $data['subtotal'] + $data['totaltax'];
		}
		$cache_data = array('invoice_id' => $data['id'], 'total' => $data['total'], 'paid' => '0', 'pending' => $data['total']);
		$product = $data['product'];
		unset($data['product']);
		$this->db->where('id', $data['id']);
		$this->db->where('company_id', $company_id);
		$this->db->update('tblinvoice', $data);
		$status = $this->update_invoice_cache($cache_data);
		if (!$status) {
			$this->session->set_flashdata('message', set_message('cannot be update paid amount is greater then the new calculated total amount.', 'warning'));
		}
		$product['inv_id'] = $data['id'];
		//Updating details
		$this->updateInvoiceDetails($product);
		$this->db->trans_complete();
		return ($this->db->_error_message()) ? set_message($this->db->_error_message(), 'error') : set_message($this->lang->line('db_updated_record'));
	}
	private function updateInvoiceDetails($data, $user = NULL) {
		$this->db->where('invoice_id', $data['inv_id']);
		foreach ($data['invoice_details_id'] as $key => $val) {
			$this->db->where('id', $val)->delete('tblinvoice_details');
		}
		$this->_addInvoiceDetails($data);
	}
	private function add_invoice_status($invoiceID) {
		$invoice_statuses_id = $this->db->select('id')
			->where(array('is_default' => '1', 'company_id' => $this->comp_id))
			->get('tblinvoice_statuses')
			->row_array();
		$invoice_status['invoice_statuses_id'] = $invoice_statuses_id['id'];
		$invoice_status['invoice_id'] = $invoiceID;
		$this->db->insert('tblinvoice_status', $invoice_status);
		if ($this->db->insert_id() > 0) {
			return (bool) TRUE;
		}
		return (bool) FALSE;
	}
	private function _addInvoiceDetails($data, $user = NULL) {
		$client_id = $data['client_id'];
		$pending = $data['pending'];
		unset($data['client_id']);
		unset($data['pending']);
		foreach ($data['product_id'] as $key => $val) {
			$ins_data = array(
				'product_id' => $val
				, 'invoice_id' => $data['inv_id']
				, 'product_name' => $data['product_name'][$key]
				, 'price' => $data['price'][$key]
				, 'quantity' => $data['qty'][$key]
				, 'product_description' => $data['description'][$key]
				, 'tax_type_id' => 1
				, 'tax_type_name' => 'No_Vat'
				, 'tax_type_percentage' => 0
				, 'product_total' => $data['price'][$key] * $data['qty'][$key] * (0 / 100 + 1),
			);
			//adding cache
			$cache_data = array('client_id' => $client_id, 'invoice_id' => $data['inv_id'], 'product_id' => $val, 'pending' => $ins_data['product_total']);
			$this->invoice_lib->cache_invoice($cache_data);
			// pr($data);
			if (validateProduct($val, TRUE)) {
				$this->db->insert('tblstock', array('company_id' => $this->comp_id, 'product_id' => $val, 'quantity' => $data['qty'][$key],
					'movement' => STOCK_OUT, 'invoice_id' => $data['inv_id'],
				));
				$this->add_stock_cache($val);
			}
			$this->db->insert('tblinvoice_details', $ins_data);
		}
		return true;
	}
	private function tax_details($tax_id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		return $this->db->select('*')->where(array('id' => $tax_id, 'company_id' => $company_id))->get('tbltaxtype')->row_array();
	}
	private function currency_symbol($id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		return $this->db->select('*')->where(array('id' => $id, 'company_id' => $company_id))->get('tblcurrency')->row_array();
	}
	public function delete($id, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		if ($id > 0) {
			$this->db->where('invoice_id', $id);
			$this->db->delete('tblinvoice_details');
			$this->db->where('id', $id);
			$this->db->where('company_id', $company_id);
			$this->db->limit(1, 0);
			$this->db->delete('tblinvoice');
			$this->_clear_cache($id);
			return ($this->db->affected_rows() > 0) ? set_message($this->lang->line('db_deleted_record')) : set_message($this->lang->line('db_delete_error'));
		} else {
			return set_message($this->lang->line('db_correct_id'), 'info');
		}
	}
	public function getinvoice($invoiceId = NULL, $data = array(), $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->select('*')->where('company_id', $company_id)->order_by('id', 'DESC');
		if (!$invoiceId) {
			return $this->db->get('tblinvoice')->result_array();
		} else {
			$data['invoice'] = $this->db->where('id', $invoiceId)->get('tblinvoice')->row_array();
			$data['invoice_details'] = $this->db->select('*')->where('invoice_id', $invoiceId)->get('tblinvoice_details')->result_array();
			return $data;
		}
	}
	/**
	 * @param null $company_id
	 * @param array $data
	 * @return mixed
	 */
	public function getinvoiceList($company_id = NULL, $data = array(), $invoice_type = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$invoice_type = ($invoice_type) ? $invoice_type : 1;
		$this->db->select("t1.id,t5.count as invoice_id,t1.currency_id,t1.invoice_type,t1.client_name,t1.current_time_stamp, t1.total,t1.client_phone,t1.client_id,
							t2.invoice_id,t6.product_id,t3.id as 'invoice_statuses_id',t2.comment,
							t3.name as 'invoice_status'")
			->from("tblinvoice t1");
		$this->db->join('tblinvoice_status t2', 't2.invoice_id = t1.id');
		$this->db->join('tblinvoice_details t6', 't6.invoice_id = t1.id');
		$this->db->join('tblinvoice_status b2', 'b2.invoice_id = t2.invoice_id AND t2.time_stamp < b2.time_stamp', 'left');
		$this->db->join('tblinvoice_statuses t3', 't2.invoice_statuses_id = t3.id', 'left');
		$this->db->join('tblinvoice_type t4', 't1.invoice_type = t4.id', 'left');
		$this->db->join('invoice_count t5', 't1.id = t5.actual_id', 'left');
		$this->db->where('b2.time_stamp IS NULL', NULL, FALSE);
		$this->db->where('t5.type', $invoice_type);
		$this->db->where('t1.invoice_type', $invoice_type);
		$this->db->where('t1.company_id', $company_id);
		if (isset($data['start_date']) && isset($data['end_date'])) {
			$this->db->where("t2.invoice_statuses_id ='" . $data['status_id'] . "' AND t1.current_time_stamp BETWEEN '" . $data['start_date'] . "' and '" . $data['end_date'] . "'");
		}
		if (isset($data['limit']) && isset($data['offset'])) {
			$this->db->limit($data['limit'], $data['offset'])->order_by('id', 'DESC');
		}
		$qryResult = $this->db->get()->result_array();
		foreach ($qryResult as $key => $value) {
			$bal_inv = $this->invoice_lib->invoiceBalance($value['id']);
			// $qryResult[$key]['paid'] = $bal_inv['paid'];
			$qryResult[$key]['balance'] = $bal_inv;
		}
		return $qryResult;
	}
	private function recordExist($id) {
		$this->db->select('*')->from('tblinvoice_details')->where('id', $id);
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function rec_count($invoice_type = 1, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$this->db->where('company_id', $company_id);
		$this->db->where('invoice_type', $invoice_type);
		return $this->db->count_all_results("tblinvoice");
	}
	public function get_status($field, $company_id = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$id = $this->db->select('id')->where("name = '$field' AND (company_id = '$company_id' OR company_id = 0)")->from('tblinvoice_statuses')->get()->row('id');
		$this->db->where('invoice_statuses_id', $id);
		return $this->db->count_all_results("tblinvoice_status");
	}
	public function invoice_cache($data = array()) {
		$this->_clear_cache($data['invoice_id']);
		$success = $this->db->insert('cache_invoice', $data);
		if ($success) {
			return true;
		}
	}
	private function _clear_cache($invoice_id) {
		$this->db->where('invoice_id', $invoice_id)->delete('cache_invoice');
		return true;
	}
	public function update_invoice_cache($data) {
		$invoice_id = $data['invoice_id'];
		$total = $data['total'];
		$paid = $this->db->select('paid')->from('cache_invoice')->where('invoice_id', $invoice_id)->get()->row('paid');
		if ($paid > $total) {return false;}
		$data['pending'] = $total - $paid;
		$this->invoice_cache($data);
		return true;
	}
	public function productBalance($product_id = NULL, $companyId = NULL) {
		$comp_id = ($companyId) ? $companyId : $this->comp_id;
		$balQuery = "select * from cache_invoice where product_id=$product_id";
		$bal = $this->db->query($balQuery)->row_array();
		return $bal;
	}
	private function add_stock_cache($product_id) {
		$this->db->where('product_id', $product_id)->delete('cache_stock');
		$received = $this->db->select('sum(quantity) as quantity')->where('purchase_order_id >', '0')->where('product_id', $product_id)->get('tblstock')->row('quantity');
		$available = $this->db->select('sum(quantity*movement) as quantity')->where('product_id', $product_id)->get('tblstock')->row('quantity');
		$ordered = $this->db->select('sum(quantity) as quantity')->where('product_id', $product_id)->get('tblpurchase_order_details')->row('quantity');
		$data = array(
			'product_id' => $product_id
			, 'available_qty' => $available
			, 'pending_qty' => $ordered - $received,
		);
		$this->db->insert('cache_stock', $data);
		return ($this->db->_error_message()) ? $this->db->_error_message() : 'Record Added Successfully';
	}
	public function get_view($id, $company_id = NULL, $invoice_type = NULL) {
		$company_id = ($company_id) ? $company_id : $this->comp_id;
		$invoice_type = ($invoice_type) ? $invoice_type : INVOICE_TYPE;
		$this->db->select("t1.*,t7.product_id,t6.count as invoice_id,t2.invoice_statuses_id,t2.comment,t3.name as status,t4.id as invoice_type,t4.invoice_type as heading,t4.color,t5.logo,t4.footer_text")
			->from("tblinvoice t1");
		$this->db->join('tblinvoice_status t2', 't2.invoice_id = t1.id', 'left');
		$this->db->join('tblinvoice_details t7', 't7.invoice_id = t1.id', 'left');
		$this->db->join('tblinvoice_status b2', 'b2.invoice_id = t2.invoice_id AND t2.time_stamp < b2.time_stamp', 'left');
		$this->db->join('tblinvoice_statuses t3', 't2.invoice_statuses_id = t3.id', 'left');
		$this->db->join('tblcompany t5', 't1.company_id = t5.id', 'left');
		$this->db->join('tblinvoice_type t4', 't1.invoice_type = t4.id', 'left');
		$this->db->join('invoice_count t6', 't1.id = t6.actual_id', 'left');
		$this->db->where('b2.time_stamp IS NULL', NULL, FALSE);
		$where = "t1.id = $id AND (t1.company_id = $company_id OR t1.company_id = 0)";
		$this->db->where($where, NULL, FALSE);
		$this->db->where('t6.company_id', $company_id);
		$qryResult = $this->db->get()->row_array();
		if (!$qryResult) {
			$this->session->set_flashdata('message', set_message(lang('provide_correct_id'), "warning"));
			redirect('invoice');
			// pr(lang('not_valid_id'));
		}
		$bal_inv = $this->invoice_lib->invoiceBalance($qryResult['id']);
		// $qryResult['paid'] = $bal_inv['paid'];
		$qryResult['balance'] = $bal_inv;
		$qryResult['invoice_details'] = $this->db->select('*')->where('invoice_id', $qryResult['id'])->get('tblinvoice_details')->result_array();
		return $qryResult;
	}
	public function add_invoice_count($invoice_id, $invoice_type) {
		$q = "select IFNULL(max(count),0)+1 as count from invoice_count WHERE type=" . $invoice_type . " AND company_id=" . $this->comp_id;
		$count = $this->db->query($q)->row('count');
		$count_data = array('company_id' => $this->comp_id, 'actual_id' => $invoice_id, 'count' => $count, 'type' => $invoice_type);
		$this->db->insert('invoice_count', $count_data);
		return ($this->db->_error_message()) ? $this->db->_error_message() : TRUE;
	}
	public function get_dues($client_id = NULL) {
		$qry = "SELECT `t1`.*, IFNULL(sum(`t2`.`pending`), 0) as pending, IFNULL(`t3`.`available_qty`,0) as stock
				FROM (`tblproducts` t1)
				LEFT JOIN `cache_invoice` t2 ON `t1`.`id` = `t2`.`product_id`
				LEFT JOIN `cache_stock` t3 ON `t1`.`id` = `t3`.`product_id` group by t1.id";
		if ($client_id) {
			$qry .= "where='t2.client_id=' $client_id";
		}
		$qryResult = $this->db->query($qry)->result_array();
		return $qryResult;
	}
	public function productStock($p_id) {
		$comp_id = ($companyId) ? $companyId : $this->comp_id;
		$balQuery = "select available_qty from cache_stock where product_id=$p_id";
		$bal = $this->db->query($balQuery)->row_array();
		return $bal;
	}
}
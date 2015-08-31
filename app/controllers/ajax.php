<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Ajax extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			}
			$this->load->model('client_model', 'clientdb');
			/*$this->load->model('transaction_model');
		$this->load->model('stock_model');
		$this->load->model('payment_method_model');
		$this->load->model('invoice_status_model');
		$this->load->model('purchase_status_model');
		$this->load->model('currency_model');
		$this->lang->load('transaction');*/
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Clients',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => base_url('client/index'),
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('client'),
			'add_link' => 'client/add',
			'count' => $this->common->count_all('client'),
			'user_id' => $this->session->userdata('user_id'),
		);

		return $data;
	}
	public function get_client_by_cell() {
		if (isset($_GET['term'])) {
			$q = $_GET['term'];
			$res = $this->clientdb->get_by_cell($q);
			$row_set = array();
			foreach ($res as $row) {
				$new_row['id'] = $row['id'];
				$new_row['label'] = $row['name'];
				$new_row['value'] = $row['cellphone'];
				$row_set[] = $new_row; //build an array
			}
			echo json_encode($row_set);
		}
	}
	public function get_client_by_name() {
		if (isset($_GET['term'])) {
			$q = $_GET['term'];
			$res = $this->clientdb->get_by_name($q);
			$row_set = array();
			foreach ($res as $row) {
				$new_row['id'] = $row['id'];
				$new_row['label'] = $row['cellphone'];
				$new_row['value'] = $row['name'];
				$row_set[] = $new_row; //build an array
			}
			echo json_encode($row_set);
		}
	}
	public function get_client_details($value = '') {
		$param = $this->input->get('param');
		$data = $this->global_array();
		$data['heading'] = "Client View";
		$data['search_url'] = base_url('client/view');
		$data['tool'] = (bool) FALSE;
		if (is_numeric($param)) {
			$data['client'] = $this->clientdb->get_kurta($params = array('cellphone' => $param));
		} else {
			$data['client'] = $this->clientdb->get_kurta($params = array('name' => $param));
		}
		foreach ($data['client'] as $key => $val) {
			$data['kurtas'][$key] = $val;
			$data['client']['client_id'] = $val['client_id'];
			$data['client']['name'] = $val['name'];
			$data['client']['cellphone'] = $val['cellphone'];
			$data['client']['city'] = $val['city'];
			$data['client']['address'] = $val['address'];

		}
		$data['client_relation'] = client_relation($data['client']['client_id']);
		unset($data['client'][0]);
		echo $this->load->view('ajax/kurta_pem', $data, TRUE);

	}
	public function invoice_payment() {
		if ($_POST) {
			if ($_POST['total'] < $_POST['amount']) {
				return false;
			} else {
				if ($_POST['total'] == ($_POST['amount'] + $_POST['paid'])) {
					$_POST['payment_status'] = PAID;
				} else {
					$_POST['payment_status'] = PARTIALLY_PAID;
				}
				esc($_POST, TRUE);
				$message = $this->transaction_model->processInvoice($_POST);
				$this->session->set_flashdata('message', $message);

			}
		}
	}
	public function get_invoice_payment($id = NULL) {

		if (!$id) {
			$result = $this->transaction_model->gettransaction();
			// $statusJS[$invoice_status['id']] = $invoice_status;
		} else {
			$result = $this->transaction_model->gettransaction($id);
			// $statusJS[$invoice_status['id']] = $invoice_status;
		}
		// echo json_encode($statusJS);
		echo json_encode($result);
	}
	public function get_purchase_payment($id = NULL) {

		if (!$id) {
			$result = $this->transaction_model->get_purchase_trans();
		} else {
			$result = $this->transaction_model->get_purchase_trans($id);
		}
		// echo json_encode($statusJS);
		echo json_encode($result);
	}
	public function price_format() {
		$price = format_price($_POST['value'], $_POST['currency_id']);
		echo json_encode(array('price' => $price));
	}
	public function get_products() {
		$this->load->model('products_model');
		$result = $this->products_model->getProduct();
		$Product;
		foreach ($result as $key => $value) {

			$Product[$value['id']]['id'] = $value['id'];
			$Product[$value['id']]['value'] = $value['name'];
		}
		echo json_encode($Product);
	}
	function client_autocomplete() {
		if (isset($_GET['term'])) {
			$q = strtolower($_GET['term']);
			$res = $this->clientdb->get_client_by_cell($q);
			// pr($res);
			echo $res;
		}
	}
	public function get_currency($currencyid = NULL) {
		$currencyJS = array();
		if (!$currencyid) {
			$currency = $this->currency_model->getDefaultCurrency();
			$currencyJS[$currency['id']] = $currency;
		} else {
			$currency = $this->currency_model->getcurrency($currencyid);
			$currencyJS[$currency['id']] = $currency;
		}
		echo json_encode($currencyJS);
	}
	public function invoice_status_update() {
		esc($_POST['id']);
		$message = $this->invoice_status_model->makeDefault($_POST['id']);
		$this->session->flashdata('message', $message);
		echo $message;
	}
	public function purchase_status_update() {
		esc($_POST['id']);
		$message = $this->purchase_status_model->makeDefault($_POST['id']);
		$this->session->flashdata('message', $message);
		echo $message;
	}
	public function get_status($invoice_id = NULL) {
		$statusJS = array();
		if (!$invoice_id) {
			$invoice_status = $this->invoice_status_model->get();
			// $statusJS[$invoice_status['id']] = $invoice_status;
		} else {
			$invoice_status = $this->invoice_status_model->get_st($invoice_id);
			// $statusJS[$invoice_status['id']] = $invoice_status;
		}
		// echo json_encode($statusJS);
		echo json_encode($invoice_status);
	}
	public function add_invoice_status() {
		if ($_POST) {
			esc($_POST);
			$message = $this->invoice_status_model->add_details($_POST);
			$this->session->set_flashdata('message', $message);
			echo $message;
		}
	}

	public function payment_method() {
		$payment_method = $this->payment_method_model->getJson();
		echo json_encode($payment_method);
	}
}
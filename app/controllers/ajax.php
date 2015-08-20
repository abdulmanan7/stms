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
			/*$this->load->model('transaction_model');
		$this->load->model('stock_model');
		$this->load->model('payment_method_model');
		$this->load->model('invoice_status_model');
		$this->load->model('purchase_status_model');
		$this->load->model('currency_model');
		$this->lang->load('transaction');*/
		}
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
	public function add_stock() {
		if ($_POST) {
			if ($_POST['quantity'] > $_POST['order_quantity']) {
				return false;
			} else {
				unset($_POST['order_quantity']);
				esc($_POST, TRUE);
				$this->stock_model->add($_POST);
				return true;
			}
		}
	}
	public function purchase_payment() {
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
				$message = $this->transaction_model->processPurchase($_POST);
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
	public function get_stock() {
		$result = $this->stock_model->present_stock($_POST['product_id']);
		// echo json_encode($statusJS);
		echo json_encode($result);
	}
	function purchase_autocomplete() {
		$this->load->model('products_model');
		if (isset($_GET['term'])) {
			$q = strtolower($_GET['term']);
			$res = $this->products_model->get_products($q, TRUE);
			echo $res;
		}
	}
	function client_autocomplete() {
		$this->load->model('client_model', 'clientdb');
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
	public function get_purchase_status($purchase_id = NULL) {
		$statusJS = array();
		if (!$purchase_id) {
			$purchase_status = $this->purchase_status_model->get();
			// $statusJS[$invoice_status['id']] = $invoice_status;
		} else {
			$purchase_status = $this->purchase_status_model->get_st($purchase_id);
			// $statusJS[$invoice_status['id']] = $invoice_status;
		}
		// echo json_encode($statusJS);
		echo json_encode($purchase_status);
	}
	public function add_purchase_status() {
		if ($_POST) {
			esc($_POST);
			$message = $this->purchase_status_model->add_details($_POST);
			$this->session->set_flashdata('message', $message);
			echo $message;
		}
	}
	public function payment_method() {
		$payment_method = $this->payment_method_model->getJson();
		echo json_encode($payment_method);
	}
	public function add_recurring() {
		if ($_POST) {
			$st_date = date('Y-m-d H:i:s', strtotime($_POST['st_date']));
			$end_date = date('Y-m-d H:i:s', strtotime($_POST['end_date'] . " 23:59:59"));
			$_POST['st_date'] = $st_date;
			$_POST['end_date'] = $end_date;
			esc($_POST, TRUE);
			$is_created = $this->invoice_model->add_recurring($_POST);
			if ($is_created) {
				$message = $this->common_lib->set_message("Invoice Recurring Created for invoice# " . $_POST['invoice_id']);
			}
			return $this->session->set_flashdata('message', $message);
		}
	}
}
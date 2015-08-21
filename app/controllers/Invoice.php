<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Invoice extends CI_Controller {

	function __construct() {
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->load->model('invoice_model');
			$this->load->model('invoice_status_model');
			// $this->load->model('company_model');
			$this->load->model('client_model');
			$this->load->model('currency_model');
			$this->load->model('invoice_status_model');
			$this->lang->load('invoice');
		}

	}
	function global_array() {
		$data = array(
			'page_title' => lang('heading'),
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => 'invoice/index',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('invoice'),
			'add_link' => 'invoice/add',
			'count' => $this->invoice_model->rec_count(),
			'user_id' => $this->session->userdata('user_id'),
		);
		return $data;
	}
	public function index($page = 1) {
		$data = $this->global_array();
		$offset = isset($_GET['page']) && (int) $_GET['page'] != 0 ? $_GET['page'] : 1;
		$limit = 20;
		$type = 'all';
		$offset = ($offset > 1) ? $limit * ($offset - 1) : 0;

		if (isset($_GET['submit'])) {
			$extraprm = array(
				'limit' => $limit,
				'offset' => $offset,
				$type = 'all',
				'start_date' => date('Y-m-d H:i:s', strtotime($_GET['start_date'])),
				'end_date' => date('Y-m-d H:i:s', strtotime($_GET['end_date'] . " 23:59:59")),
				'status_id' => $_GET['status_id'],
			);
			$data['allinvoice'] = $this->invoice_model->getInvoiceList(NULL, $extraprm);
			$data['start_date'] = $_GET['start_date'];
			$data['end_date'] = $_GET['end_date'];
			$data['status_id'] = $_GET['status_id'];
		} else {
			$data['allinvoice'] = $this->invoice_model->getInvoiceList(NULL, $params = array('limit' => $limit, 'offset' => $offset, $type = 'all'));
		}
		//create pagination...
		$count = $this->invoice_model->rec_count();
		$pagination_url = "invoice?type=$type";
		$data["links"] = $this->common_lib->pagination($pagination_url, $count, $limit);

		$data['status'] = $this->invoice_status_model->get();
		$data['page'] = 'invoice/allinvoice';
		$this->load->view('template', $data);
	}
	public function add() {
		$data = $this->global_array();
		$data['heading'] = lang('heading_add');
		if ($_POST) {

			$this->form_validation->set_rules('client_id', $this->lang->line('validation_name_label'), 'required');
			$this->form_validation->set_rules('date', $this->lang->line('validation_date_label'), 'required');
			$this->form_validation->set_rules('product[]', $this->lang->line('validation_product_label'), 'required');
			$this->form_validation->set_rules('price[]', $this->lang->line('validation_price_label'), 'required|is_numeric');
			$this->form_validation->set_rules('qty[]', $this->lang->line('validation_quantity_label'), 'required|is_numeric');
			$this->form_validation->set_rules('tax_type[]', $this->lang->line('validation_tax_type_label'), 'required');

			if ($this->form_validation->run() == FALSE) {
				$clients = $this->client_model->get();
				$data['currency'] = $this->currency_model->getcurrency();
				foreach ($clients as $val) {

					$data['clients'][$val['id']] = $val['name'];

				}
				$data['selected_client'] = 1;
				//loading Tax
				$data['page'] = 'invoice/addinvoice';

				$this->load->view('template', $data);

			} else {

				/*foreach ($this->input->post('tax_type') as $key => $value) {
				$taxtype = $this->taxtype_model->gettax($value);
				$data['tax_type_id']['tax_type_id'] = $taxtype['id'];
				$data['tax_type_name']['tax_type_name'] = $taxtype['name'];
				$data['tax_type_percentage']['tax_type_percentage'] = $taxtype['percentage'];
				}*/

				$data['post'] = array(
					'totaltax' => $this->input->post('taxtotal'),
					'last_modified_ts' => date('Y-m-d H:i:s'),

				);

				$data['company'] = $this->company_model->getCompanyBySql();
				$data['client'] = $this->client_model->getclientBySql($this->input->post('client_id'));
				$data['currency'] = $this->currency_model->getcurrencyBySql($this->input->post('currency'));

				$data = $data['post'] + $data['client'] + $data['currency'] + $data['company'];

				$product['product_id'] = $this->input->post('product_id');
				$product['product_name'] = $this->input->post('product');
				$product['price'] = $this->input->post('price');
				$product['qty'] = $this->input->post('qty');
				$product['tax_type'] = $this->input->post('tax_type');
				$product['description'] = $this->input->post('description');
				$product['tax_type_id'] = $this->input->post('tax_type');
				$product['product_total'] = $this->input->post('total');
				$data['product'] = $product;
				$data['message'] = $this->invoice_model->add($data);

				$this->session->set_flashdata('message', $data);
				redirect('invoice');
			}

		} //end if data submited...
		else {
			$this->load->model('client_model');
			$clients = $this->client_model->get_all();
			// pr($clients);
			//check if client exist
			if (empty($clients)) {
				$message = $this->lang->line('validation_client_needed_label');
				$this->session->set_flashdata('message', $message);
				redirect('client');
			}
			$data['currency'] = $this->currency_model->getcurrency();
			//check if currency exist
			if (empty($data['currency'])) {
				$message = $this->lang->line('validation_currency_needed_label');
				$this->session->set_flashdata('message', $message);
				redirect('currency');
			}
			foreach ($clients as $val) {

				$data['clients'][$val['id']] = $val['name'];

			}

			$data['selected_client'] = 1;
			//loading Tax
			// $this->load->model('taxtype_model');
			// $data['taxs'] = $this->taxtype_model->gettax();

			$data['page'] = 'invoice/addinvoice';

			$this->load->view('template', $data);

		}
	} //Addition Function End
	function update($invoiceId) {
		$data = $this->global_array();
		$data['heading'] = lang('heading_update');
		if (!$invoiceId) {
			redirect('invoice');
		}
		if ($_POST) {
			$this->form_validation->set_rules('client_id', $this->lang->line('validation_name_label'), 'required');
			$this->form_validation->set_rules('date', $this->lang->line('validation_date_label'), 'required');
			$this->form_validation->set_rules('product[]', $this->lang->line('validation_product_label'), 'required');
			$this->form_validation->set_rules('price[]', $this->lang->line('validation_price_label'), 'required|numeric');
			$this->form_validation->set_rules('qty[]', $this->lang->line('validation_quantity_label'), 'required|numeric');
			$this->form_validation->set_rules('tax_type[]', $this->lang->line('validation_tax_type_label'), 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$data['invoice'] = $this->invoice_model->getinvoice($invoiceId);
				$data['currency'] = $this->currency_model->getcurrency();
				$clients = $this->client_model->getclient();
				foreach ($clients as $val) {

					$data['clients'][$val['id']] = $val['company_name'];

				}
				$data['selected_client'] = 1;
				//loading Tax
				$this->load->model('taxtype_model');
				$data['taxs'] = $this->taxtype_model->gettax();

				$data['selected_tax'] = 1;

				$data['page'] = 'invoice/updateinvoice';

				$this->load->view('template', $data);

			} else {

				$data['post'] = array(
					'id' => $invoiceId,
					'last_modified_ts' => date('Y-m-d H:i:s'),

				);
				$data['company'] = $this->company_model->getCompanyBySql();
				$data['client'] = $this->client_model->getclientBySql($this->input->post('client_id'));
				$data['currency'] = $this->currency_model->getcurrencyBySql($this->input->post('currency'));
				$data = $data['post'] + $data['company'] + $data['client'] + $data['currency'];

				$product['invoice_details_id'] = $this->input->post('invoice_details_id');
				$product['product_id'] = $this->input->post('product_id');
				$product['product_name'] = $this->input->post('product');
				$product['price'] = $this->input->post('price');
				$product['qty'] = $this->input->post('qty');
				$product['description'] = $this->input->post('description');
				$product['tax_type_id'] = $this->input->post('tax_type');
				$product['product_total'] = $this->input->post('total');

				$data['product'] = $product;

				$data['message'] = $this->invoice_model->update($data);
				$this->session->set_flashdata('message', $data);
				redirect('invoice');
			}

		} //end if data submited...
		else {
			$data['invoice'] = $this->invoice_model->getinvoice($invoiceId);
			$data['currency'] = $this->currency_model->getcurrency();
			$clients = $this->client_model->getclient();
			foreach ($clients as $val) {

				$data['clients'][$val['id']] = $val['company_name'];

			}
			$data['selected_client'] = 1;
			//loading Tax
			$this->load->model('taxtype_model');
			$data['taxs'] = $this->taxtype_model->gettax();

			$data['selected_tax'] = 1;

			$data['page'] = 'invoice/updateinvoice';
			$this->load->view('template', $data);
		}
	}
	function get_products() {
		$this->load->model('products_model');
		if (isset($_GET['term'])) {
			$q = strtolower($_GET['term']);
			$result = $this->products_model->get_products($q);
			json_encode($result);
		}
	}
	function singleinvoice($id) {
		$data = $this->global_array();
		$data['heading'] = lang('heading_view');
		$data['invoice'] = $this->invoice_model->getinvoice($id);
		$data['company'] = $this->company_model->getCompany();
		$data['invoice']['status'] = $this->invoice_status_model->get_st_last($id);
		$data['invoice']['invoice']['subtotal'] = floatFormat($data['invoice']['invoice']['subtotal']);
		$data['invoice']['invoice']['totaltax'] = floatFormat($data['invoice']['invoice']['totaltax']);
		$data['invoice']['invoice']['total'] = floatFormat($data['invoice']['invoice']['total']);
		foreach ($data['invoice']['invoice_details'] as $key => $val) {
			$data['invoice']['invoice_details'][$key]['product_total'] = floatFormat($data['invoice']['invoice_details'][$key]['product_total'], 2, '.', ',');
			$data['invoice']['invoice_details'][$key]['price'] = floatFormat($data['invoice']['invoice_details'][$key]['price']);
			$data['invoice']['invoice_details'][$key]['product_tax'] = floatFormat($data['invoice']['invoice_details'][$key]['tax_type_percentage'] / 100 * $data['invoice']['invoice_details'][$key]['price'] * $data['invoice']['invoice_details'][$key]['quantity']);
		}
		$data['page'] = 'invoice/invoice';
		$this->load->view('template', $data);

		return $data;
	}
	public function delete($id) {
		if (isset($id)) {
			$data['message'] = $this->invoice_model->delete($id);
			$this->session->set_flashdata('message', $data);
			redirect('invoice/index');
		} else {
			die("Select a Record first to delete");
		}
	}
	public function jsonCurrency($currencyid = NULL) {
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
	public function getstatusjson($id = NULL) {
		$statusJS = array();
		if (!$id) {
			$invoice_status = $this->invoice_status_model->get();
			// $statusJS[$invoice_status['id']] = $invoice_status;
		} else {
			$invoice_status = $this->invoice_status_model->get($id);
			// $statusJS[$invoice_status['id']] = $invoice_status;
		}
		// echo json_encode($statusJS);
		echo json_encode($invoice_status);
	}
	public function get_inv_st_json($id = NULL) {
		if (!$id) {
			$inv_st = $this->invoice_status_model->get_st();
			// $statusJS[$invoice_status['id']] = $invoice_status;
		} else {
			$inv_st = $this->invoice_status_model->get_st($id);
			// $statusJS[$invoice_status['id']] = $invoice_status;
		}
		// echo json_encode($statusJS);
		echo json_encode($inv_st);
	}
	public function getpdf($invoiceId = Null, $download = true) {
		$this->load->helper(array('dpdf', 'file'));
		// page info here, db calls, etc.
		$inv_id = ($invoiceId) ? $invoiceId : $_POST['emailinvoiceId'];
		$filename = 'invoice ' . date("d-m-Y_H-i", time());
		$pdfFilePath = realpath("_assets/pdfs");
		$pdfFilePath .= "/" . $filename . ".pdf";
		$data = $this->singleinvoice($inv_id); // pass data to the view
		$html = $this->load->view('invoice/invoicetopdf', $data, true); // render the view into HTML
		//        $pdf->SetHTMLFooter('<div style="text-align: right;border-top: solid 1px gray; font-size: 8pt;color:gray; font-style: italic;"></div>');
		if ($download) {
			pdf_create($html, $filename);
			redirect("invoice");
		} else {
			$data = pdf_create($html, '', FALSE);
			write_file($pdfFilePath, $data);
			return $pdfFilePath;
		}
	}

	public function sendemail() {
		$this->config->load('oinvoices', TRUE);
		$this->load->library('email');

		if (!empty($_POST['message'])) {
			$message = $this->input->post('message');
		} else {
			$message = $this->lang->line('email_message_text');
		}
		$emailTo = $this->input->post('email');
		$this->email->clear(true);

		$this->email->from($this->config->item('system_email', 'oinvoices'), $this->config->item('site_title', 'oinvoices'));
		$this->email->to($emailTo);
		$this->email->cc($this->input->post('cc'));

		$filepath = $this->getpdf($this->input->post('invoiceId'), FALSE);
		$this->email->attach($filepath);
		$this->email->subject($this->input->post('subject'));
		$this->email->message($message);
		if ($this->email->send()) {
			$data['message'] = "Email Send Successfully";
			$this->session->set_flashdata('message', $data);
			clean_dir($filepath);
			redirect('invoice');
			return TRUE;
		} else {
			$this->set_error('Email Sending unsuccessful');
			return FALSE;
		}
	}
	public function status() {
		$offset = isset($_GET['page']) && (int) $_GET['page'] != 0 ? $_GET['page'] : 1;
		$limit = LIMIT;
		$type = "all";

		$offset = ($offset > 1) ? $limit * ($offset - 1) : 0;

		$data['statuslist'] = $this->invoice_status_model->get(NULL, NULL, $data = array('limit' => $limit, 'offset' => $offset, $type = 'all'));

		//create pagination...
		$count = $this->invoice_status_model->rec_count();
		$pagination_url = "invoice/status?type=$type";
		$data["links"] = $this->common_lib->pagination($pagination_url, $count, $limit);

		$data['page'] = 'invoice/invoice_statuses/statuslist';
		$this->load->view('template', $data);
	}
	public function save_invoice_status($invoice_statusId = NULL) {
		if (is_null($invoice_statusId)) {
			if ($_POST) {
				$this->form_validation->set_rules('name', $this->lang->line('validation_name_label'), 'required');
				if ($this->form_validation->run() == FALSE) {
					$data['page'] = 'invoice/invoice_statuses/addstatus';
					$this->load->view('template', $data);
				} else {
					$data = array(
						'name' => $this->input->post('name'),
						'is_enable' => isset($_POST['is_enable']) ? $_POST['is_enable'] : '0',
						'is_default' => isset($_POST['is_default']) ? '1' : '0',
					);

					$data['message'] = $this->invoice_status_model->add($data);
					$this->session->set_flashdata('message', $data);
					redirect('setting/status');

				}

			} //end if data submited...
			else {

				$data['page'] = 'invoice/invoice_statuses/addstatus';
				$this->load->view('template', $data);

			}
		} //Update will be Done if ID is not send.
		else {
			if ($_POST) {

				$this->form_validation->set_rules('name', $this->lang->line('validation_name_label'), 'required');

				if ($this->form_validation->run() == FALSE) {
					//if there is any Error in Form validation.
					$data['updatestatus'] = $this->invoice_status_model->getinvoice_statuses($invoice_statusId);
					$data['page'] = 'invoice/invoice_statuses/editstatus';
					$this->load->view('template', $data);
				} else {
					$data = array(
						'name' => $this->input->post('name'),
						'id' => $invoice_statusId,
						'is_enable' => isset($_POST['is_enable']) ? $_POST['is_enable'] : '0',
						'is_default' => isset($_POST['is_default']) ? '1' : '0',
					);

					$data['message'] = $this->invoice_status_model->update($data);
					$data['statuslist'] = $this->invoice_status_model->get();
					$data['page'] = 'invoice/invoice_statuses/addstatus';
					$this->session->set_flashdata('message', $data);
					redirect('invoice/status');
				}
			} else {
				$data['updatestatus'] = $this->invoice_status_model->get($invoice_statusId);
				$data['page'] = 'invoice/invoice_statuses/editstatus';
				$this->load->view('template', $data);
			}
		}
	}
	public function delete_invoice_status() {
		$invoice_statusId = $this->uri->segment(3);
		$data['message'] = $this->invoice_status_model->delete($invoice_statusId);
		$this->session->set_flashdata('message', $data);
		redirect('invoice/status');
	}
	public function add_invoice_status_detail() {
		if ($_POST) {
			$data['message'] = $this->invoice_status_model->add_details($_POST);
			$this->session->set_flashdata('message', $data);
			redirect('invoice/status');
		}
	}
	public function email() {
//        pr(FCPATH."downloads\reports\.pdf");
		if (!empty($_POST['message'])) {
			$pdfmessage = $this->input->post('message');
		} else {
			$pdfmessage = $this->lang->line('email_message_text');
		}
		$this->load->library('pdf');
		$mpdf = $this->pdf->load();
		$data = $this->singleinvoice($_POST['emailinvoiceId']);
		$html = $this->load->view('invoice/invoicetopdf', $data, true);
		$mpdf->WriteHTML($html);

		$content = $mpdf->Output('', 'S');

		$content = chunk_split(base64_encode($content));
		$mailto = $this->input->post('email');
		if (!empty($_POST['cc'])) {
			$cc = $this->input->post('cc');
			$mailto = $this->input->post('email') . "," . $cc;
			$header = "cc: <" . $cc . ">\r\n";
		}
		$from_name = $this->config->item('site_title', 'ion_auth');
		$from_mail = $this->config->item('admin_email', 'ion_auth');
		//pr($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
		$uid = md5(uniqid(time()));
		$message = $pdfmessage;
		$subject = $this->input->post('subject');
		$filename = 'invoice ' . date("d-m-Y_H-i", time()) . '.pdf';
		$header = "From: " . $from_name . " <" . $from_mail . ">\r\n";

		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--" . $uid . "\r\n";
		$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message . "\r\n\r\n";
		$header .= "--" . $uid . "\r\n";
		$header .= "Content-Type: application/pdf; name=\"" . $filename . "\"\r\n";
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
		$header .= $content . "\r\n\r\n";
		$header .= "--" . $uid . "--";
		$is_sent = @mail($mailto, $subject, "", $header);
//        $this->load->library('email');
		//        $this->email->from($from_mail, $from_name);
		//        $this->email->to($mailto);
		//        $this->email->cc($this->input->post('cc'));
		//        $this->email->attach($header);
		//        $this->email->subject($subject);
		//        $this->email->message($message);
		if ($is_sent) {
			$data['message'] = "Email Send Successfully";
			$this->session->set_flashdata('message', $data);
			redirect('invoice');
			return TRUE;
		} else {
			$data['message'] = "Email Sending Fail";
			$this->session->set_flashdata('message', $data);
			redirect('invoice');
			return FALSE;
		}
		exit;
	}
}
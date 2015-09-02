<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Currency extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			set_flash('you are using free version ,you can use <b>Currency</b> subscribe below for full version.');
			redirect('customer_care/not_authorize', 'refresh');
			$this->load->model('currency_model');
			$this->lang->load('currency');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => lang('heading'),
			'heading' => 'Currency',
			'tool' => (bool) TRUE,
			'search_url' => 'currency/index',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('currency'),
			'add_link' => 'currency/add',
			'count' => $this->currency_model->rec_count(),
			'user_id' => $this->session->userdata('user_id'),
		);
		return $data;
	}
	public function index() {
		$data = $this->global_array();
		$offset = isset($_GET['page']) && (int) $_GET['page'] != 0 ? $_GET['page'] : 1;
		$limit = 20;
		$type = "all";
		$offset = ($offset > 1) ? $limit * ($offset - 1) : 0;
		$data['allcurrency'] = $this->currency_model->getcurrency(null, null, $params = array('limit' => $limit, 'offset' => $offset, $type = 'all'));
		//create pagination...
		$count = $this->currency_model->rec_count();
		$pagination_url = "currency?type=$type";
		$data["links"] = $this->common_lib->pagination($pagination_url, $count, $limit);
		$data['page'] = 'currency/allcurrency';
		$this->load->view('template', $data);
	}
	public function add() {
		$data = $this->global_array();
		$data['heading'] = lang('heading_add');
		$data['tool'] = (bool) FALSE;
		if ($_POST) {
			$this->form_validation->set_rules('title', $this->lang->line('validation_title_label'), 'required');
			$this->form_validation->set_rules('code', $this->lang->line('validation_code_label'), 'required');
			$this->form_validation->set_rules('value', $this->lang->line('validation_value_label'), 'required');
			$this->form_validation->set_rules('decimal_place', $this->lang->line('validation_decimal_place_label'), 'required|is_numeric');
			if ($this->form_validation->run() == FALSE) {
				$data['page'] = 'currency/addcurrency';
				$data['pageName'] = 'currencyPage';
				$this->load->view('template', $data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'id' => $this->uri->segment(3),
					'code' => $this->input->post('code'),
					'symbol_left' => $this->input->post('symbol_left'),
					'symbol_right' => $this->input->post('symbol_right'),
					'value' => $this->input->post('value'),
					'decimal_place' => $this->input->post('decimal_place'),
					'status' => $this->input->post('status'),
					'date_modified' => date('Y-m-d H:i:s'),
				);
				$data['message'] = $this->currency_model->add($data);
				$this->session->set_flashdata('message', $data);
				redirect('setting/currency');
			}
		} //end if data submited...
		else {
			$data['page'] = 'currency/addcurrency';
			$data['pageName'] = 'currencyPage';
			$this->load->view('template', $data);
		}
	}
	public function update() {
		$data = $this->global_array();
		$data['heading'] = lang('heading_update');
		if ($_POST) {
			$this->form_validation->set_rules('title', $this->lang->line('validation_title_label'), 'required');
			$this->form_validation->set_rules('code', $this->lang->line('validation_code_label'), 'required');
			$this->form_validation->set_rules('value', $this->lang->line('validation_value_label'), 'required');
			$this->form_validation->set_rules('decimal_place', $this->lang->line('validation_decimal_place_label'), 'required|is_numeric');
			if ($this->form_validation->run() == FALSE) {
				//if there is any Error in Form validation.
				$currencyId = $this->uri->segment(3);
				$data['updateCurrency'] = $this->currency_model->getcurrency($currencyId);
				$data['page'] = 'currency/editcurrency';
				$this->load->view('template', $data);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'id' => $this->uri->segment(3),
					'code' => $this->input->post('code'),
					'symbol_left' => $this->input->post('symbol_left'),
					'symbol_right' => $this->input->post('symbol_right'),
					'value' => $this->input->post('value'),
					'decimal_place' => $this->input->post('decimal_place'),
					'status' => $this->input->post('status'),
					'default' => $this->input->post('default'),
					'date_modified' => date('Y-m-d H:i:s'),
				);
				$data['message'] = $this->currency_model->update($data);
				$this->session->set_flashdata('message', $data);
				redirect('currency/index');
			}
		}
		//this code will be Execute when Update is called from the All currency Form.
		else {
			$currencyId = $this->uri->segment(3);
			if (!$currencyId) {
				redirect('currency');
			}
			$data['updateCurrency'] = $this->currency_model->getcurrency($currencyId);
			$data['page'] = 'currency/editcurrency';
			$this->load->view('template', $data);
		}
	}
	public function delete() {
		$key = $this->uri->segment(3);
		$data['message'] = $this->currency_model->delete($key);
		$this->session->set_flashdata('message', $data);
		redirect('currency');
	}
}
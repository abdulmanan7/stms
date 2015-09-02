<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_care extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->load->model('customer_care_model', 'customer_care');
			$this->lang->load('customer_care');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Feedback',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('customer_care'),
			'user_id' => $this->session->userdata('user_id'),
		);

		return $data;
	}
	public function index() {

	}
	public function feedback() {
		$data = $this->global_array();
		$data['page'] = 'customer_care/feedback';
		$this->load->view('template', $data);
	}
	public function not_authorize() {
		$data = $this->global_array();
		$data['page_title'] = 'Subscribe';
		$data['page'] = 'customer_care/free_subs_message';
		$this->load->view('template', $data);
	}
	public function contact_save() {
		$data = $this->global_array();
		if ($this->form_validation->run('contact_us') == FALSE) {
			$data['page_title'] = 'Subscribe';
			$data['page'] = 'customer_care/free_subs_message';
			$this->load->view('template', $data);
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'message' => $this->input->post('message'),
			);
			$message = $this->customer_care->contact_save($data);
			$this->session->set_flashdata('message', $message);
			redirect('customer_care/not_authorize');
		}
	}
	public function subscribe() {
		if ($this->form_validation->run('subscribe') == FALSE) {
			$data['page_title'] = 'Subscribe';
			$data['page'] = 'customer_care/free_subs_message';
			$this->load->view('template', $data);
		} else {
			$pakage_description = ($this->input->post('pakage') == '1') ? 'Bronze' : ($this->input->post('pakage') == '2') ? 'Silver' : 'Gold';
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'pakage_id' => $this->input->post('pakage'),
				'pakage_description' => $pakage_description,
			);
			$message = $this->customer_care->subscribe($data);
			$this->session->set_flashdata('message', $message);
			redirect('customer_care/not_authorize');
		}
	}
}

/* End of file customer_care.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/customer_care.php */
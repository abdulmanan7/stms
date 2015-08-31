<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_care extends CI_Controller {
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

}

/* End of file customer_care.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/customer_care.php */
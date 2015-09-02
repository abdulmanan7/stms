<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * auther by Abdul Manan
	 * developer at ithinq.net
	 */
	protected $data = array('client' => '');
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			set_flash('you are using free version ,you can use <b>Orders</b> subscribe below for full version.');
			redirect('customer_care/not_authorize', 'refresh');
			$this->lang->load('order');
			$this->load->model('order_model', 'orderdb');
			$this->load->model('client_model');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Order',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => 'order/index',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('order'),
			'add_link' => 'order/add',
			'count' => $this->common->count_all('orders'),
			'user_id' => $this->session->userdata('user_id'),
		);

		return $data;
	}
	public function index() {
		$data = $this->global_array();
		$limit = 20;
		$offset = isset($_GET['page']) && (int) $_GET['page'] != 0 ? $_GET['page'] : 1;
		// $offset = ($offset > 1) ? $limit * ($offset - 1) : 0;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->library('common_lib');
		$data['links'] = $this->common_lib->pagination('client/index', $data['count']);
		if ($this->input->get('search')) {
			$search = $this->input->get('search');
			$data['orders'] = $this->orderdb->order_search($search, $limit, $offset);
		} else {
			$data['clients'] = $this->orderdb->get_orders($limit, $offset);
		}
		$data['page'] = 'orders/orders';
		$this->load->view('template', $data);
	}
	public function get_client() {
		if (isset($_GET['term'])) {
			$q = $_GET['term'];
			$res = $this->client_model->get_by_term($q);
			// pr($res);
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
	public function get_client_info() {
		$cellphone = $this->input->get('cellphone');
		$res = $this->client_model->client_search($cellphone, TRUE);
		if ($this->input->is_ajax_request()) {
			$data['client'] = $res;
			echo $this->load->view('orders/ajax/client', $data, TRUE);
		} else {
			$data = $this->global_array();
			$data['client'] = $res;
			$data['page'] = 'orders/orders';
			$this->load->view('template', $data);
		}
	}
}

/* End of file order.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/order.php */?>
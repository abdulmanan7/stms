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
			'cloths_no' => array('1 Suit' => 1, '2 suits' => 2, '3 suits' => 3, '4 suits' => 4, '5 suits' => 5, '6 suits' => 6, '7 suits' => 7, '8 suits' => 8, '9 suits' => 9, '10 suits' => 10),
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
		$this->load->model('products_model', 'product');
		$data['products'] = $this->product->get_all();
		if ($this->input->is_ajax_request()) {
			$data['client'] = $res;
			$data['cloths_no'] = array('1 Suit' => 1, '2 suits' => 2, '3 suits' => 3, '4 suits' => 4, '5 suits' => 5, '6 suits' => 6, '7 suits' => 7, '8 suits' => 8, '9 suits' => 9, '10 suits' => 10);
			echo $this->load->view('orders/ajax/client', $data, TRUE);
		} else {
			$data = $this->global_array();
			$data['client'] = $res;
			$data['page'] = 'orders/orders';
			// pr($data);
			$this->load->view('template', $data);
		}
	}
}

/* End of file order.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/order.php */?>
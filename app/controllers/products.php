<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Products extends CI_Controller {
	private $fileerr = FALSE;
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->load->model('products_model');
			$this->lang->load('products');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Products',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => 'products/index',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('products'),
			'add_link' => 'products/add',
			'count' => $this->products_model->count_all(),
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
		$data['allproducts'] = $this->products_model->getProduct(NULL, NULL, $params = array('limit' => $limit, 'offset' => $offset, $type = 'all'));
		//create pagination...
		$count = $data['count'];
		$pagination_url = "products?type=$type";
		$data["links"] = $this->common_lib->pagination($pagination_url, $count, $limit);
		$data['page'] = 'products/allproducts';
		$this->load->view('template', $data);
	}
	public function add() {
		$data = $this->global_array();
		$data['heading'] = lang('heading_add');
		// pr($_POST);
		if ($_POST) {
			//	$this->load->library('form_validation');
			$this->form_validation->set_rules('name', $this->lang->line('validation_name_label'), 'required');
			$this->form_validation->set_rules('notes', $this->lang->line('validation_notes_label'), 'required');
			$this->form_validation->set_rules('price', $this->lang->line('validation_price_label'), 'required|is_numeric');
			if ($this->form_validation->run() == FALSE) {
				//$this->index();
				$data['page'] = 'products/addproduct';
				$this->load->view('template', $data);
			} else {
				$data = array(
					'name' => $this->input->post('name'),
					'notes' => $this->input->post('notes'),
					'price' => $this->input->post('price'),
				);
				//Escapping of data.
				esc($data, true);
				$message = $this->products_model->add($data);
				$this->session->set_flashdata('message', $message);
				redirect('products');
			}
		} //end if data submited...
		else {
			$data['page'] = 'products/addproduct';
			$this->load->view('template', $data);
		}
	}
	public function update() {
		$data = $this->global_array();
		$data['heading'] = lang('heading_update');
		if ($_POST) {
			$this->form_validation->set_rules('name', $this->lang->line('validation_name_label'), 'required');
			$this->form_validation->set_rules('notes', $this->lang->line('validation_notes_label'), 'required');
			$this->form_validation->set_rules('price', $this->lang->line('validation_price_label'), 'required|is_numeric');
			if ($this->form_validation->run() == FALSE) {
				//if there is any Error in Form validation.
				$productId = $this->uri->segment(3);
				$data['product'] = $this->products_model->getProduct($productId);
				$data['page'] = 'products/editproducts';
				$this->load->view('template', $data);
			} else {
				$productId = $this->uri->segment(3);
				$data = array(
					'name' => $this->input->post('name'),
					'id' => $productId,
					'notes' => $this->input->post('notes'),
					'price' => $this->input->post('price'),
				);
				//Escapping of data.
				esc($data, true);
				$is_updated = $this->products_model->update($productId, $data);
				if ($is_updated > 0) {
					$this->session->set_flashdata('message', set_message($this->lang->line('db_updated_record')));
				} else {
					$this->session->set_flashdata('message', set_message($this->lang->line('db_updated_error')));
				}

				redirect('products');
			}
		}
		//this code will be Execute when Update is called from the All Products Form.
		else {
			$productId = $this->uri->segment(3);
			if (!$productId) {
				redirect('products');
			}
			$data['product'] = $this->products_model->getProduct($productId);
			$data['page'] = 'products/editproducts';
			$this->load->view('template', $data);
		}
	}
	public function delete() {
		$productId = $this->uri->segment(3);
		(is_valid_id($productId, 'products')) ? '' : show_error($this->lang->line('not_valid_id'));
		$message = $this->products_model->delete($productId);
		$this->session->set_flashdata('message', $message);
		redirect('products');
	}
}
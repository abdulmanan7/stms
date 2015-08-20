<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * auther by Abdul Manan
	 * developer at ithinq.net
	 */
	public static $data = array('client' => '');
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->lang->load('client');
			$this->load->model('client_model', 'clientdb');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Clients',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => 'client/index',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('client'),
			'add_link' => 'client/add',
			'count' => $this->clientdb->count_all(),
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
		$data['links'] = $this->common_lib->pagination(base_url('client/index'), $data['count']);
		if ($this->input->get('search')) {
			$search = $this->input->get('search');
			$data['clients'] = $this->clientdb->client_search($search, $limit, $offset);
		} else {
			$data['clients'] = $this->clientdb->get_clients($limit, $offset);
		}
		$data['page'] = 'client/client';
		$this->load->view('template', $data);
	}
	public function add() {
		$data = $this->global_array();
		$data['heading'] = "Client Add";
		if ($this->input->post()) {
			(int) $id = $this->uri->segment(3);
			// print_r($this->input->post('name'));
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['page'] = 'client/add_client';
				$this->load->view('template', $data);
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cellphone' => $this->input->post('cellphone'),
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
				);

				$client_id = $this->clientdb->insert($post_data, 'client');
				if ($client_id > 0) {
					$this->session->set_flashdata('message', set_message("Record has been added successfully !"));
					$kurta_id = $this->clientdb->insert($k_data = array('client_id' => $client_id), 'kurta_pem');
					$post_data['client_id'] = (int) $client_id;
					$post_data['kurta_id'] = (int) $kurta_id;
					$this->choose_type($post_data);
				} else {
					$data['page'] = 'client/add_client';
					$this->load->view('template', $data);
				}
			}
		} else {
			$data['page'] = 'client/add_client';
			$this->load->view('template', $data);
		}
	}
	public function update($id = NULL) {
		(is_valid_id($id, 'client')) ? '' : show_404();
		$data = $this->global_array();
		$data['heading'] = "Client Updating";
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data['client'] = $this->clientdb->get($id);
				$data['page'] = 'client/update_client';
				$this->load->view('template', $data);
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cellphone' => $this->input->post('cellphone'),
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
				);

				$res = $this->clientdb->update($id, $post_data);
				if ($res > 0) {
					$this->session->set_flashdata('message', set_message("Record has been updated successfully !"));
					redirect('client', 'refresh');
				} else {
					$data['client'] = $this->clientdb->get($id);
					$data['page'] = 'client/update_client';
					$this->load->view('template', $data);
				}
			}
		} else {
			$this->session->set_flashdata('message', set_message("Please provide correct ID !", 'error'));
			$data['client'] = $this->clientdb->get($id);
			$data['page'] = 'client/update_client';
			$this->load->view('template', $data);
		}
	}
	private function choose_type($user_data) {
		$data = $this->global_array();
		$data['client'] = $user_data;
		$data['page'] = 'client/choose';
		$this->load->view('template', $data);
	}
	function add_kurta() {

		$data = $this->global_array();
		$data['heading'] = "Adding client Kurta";
		if ($this->input->get('client_id')) {
			$client_id = $this->input->get('client_id');
			$client_name = $this->input->get('name');
			$cellphone = $this->input->get('cellphone');
			$address = $this->input->get('address');
			$data['client'] = ['name' => $client_name, 'cellphone' => $cellphone, 'client_id' => $client_id, 'address' => $address];
		}
		if ($this->input->post('lambai')) {
			$this->form_validation->set_rules('lambai', 'lambai', 'required');
			$this->form_validation->set_rules('mora', 'mora', 'required');
			$this->form_validation->set_rules('shoulder', 'shoulder', 'required');
			$this->form_validation->set_rules('chatti', 'chatti', 'required');
			$this->form_validation->set_rules('tera', 'tera', 'required');
			$this->form_validation->set_rules('collar', 'collar', 'required');
			$this->form_validation->set_rules('asteen', 'asteen', 'required');
			$this->form_validation->set_rules('daman', 'daman', 'required');
			$this->form_validation->set_rules('shalwar', 'shalwar', 'required');
			$this->form_validation->set_rules('pancha', 'pancha', 'required');

			if ($this->form_validation->run() == FALSE) {
				//failer
				$data['page'] = 'client/add_kurta';
				$this->load->view('template', $data);
			} else {
				//successs
				$post_data = array(
					'client_id' => $this->input->post('client_id'),
					'lambai' => $this->input->post('lambai') . " " . $this->input->post('lambai-x'),
					'mora' => $this->input->post('mora') . " " . $this->input->post('mora-x'),
					'shoulder' => $this->input->post('shoulder') . " " . $this->input->post('shoulder-x'),
					'chatti' => $this->input->post('chatti') . " " . $this->input->post('chatti-x'),
					'tera' => $this->input->post('tera') . " " . $this->input->post('tera-x'),
					'collar' => $this->input->post('collar') . " " . $this->input->post('collar-x'),
					'asteen' => $this->input->post('asteen') . " " . $this->input->post('asteen-x'),
					'daman' => $this->input->post('daman') . " " . $this->input->post('daman-x'),
					'shalwar' => $this->input->post('shalwar') . " " . $this->input->post('shalwar-x'),
					'pancha' => $this->input->post('pancha') . " " . $this->input->post('pancha-x'),
				);
				$res = $this->clientdb->insert($post_data, 'kurta_pem');
				if ($res > 0) {
					$this->session->set_flashdata('message', set_message("Record has been added successfully !"));
					redirect('client');
				}
			}
		} else {
			$data['page'] = 'client/add_kurta';
			$this->load->view('template', $data);
		}
	}
	public function update_kurta($id = '') {
		$client_id = (isset($id)) ? $id : $this->input->post('client_id');
		(is_valid_id($client_id, 'client')) ? '' : show_404();
		$data = $this->global_array();
		$data['heading'] = "updating client kurta";
		$params = array('client_id' => $client_id);
		$data['client'] = $this->clientdb->get_kurta($params);
		$data['client']['kurta'] = '';

		foreach ($data['client'] as $key => $val) {
			$data['client']['kurta'][$key] = $val;

		}
		$kurta_id = $data['client']['kurta']['kurta_id'];
		unset($data['client']['kurta']['name']);
		unset($data['client']['kurta']['cellphone']);
		unset($data['client']['kurta']['city']);
		unset($data['client']['kurta']['address']);
		unset($data['client']['kurta']['id']);
		// pr($data);
		if ($this->input->post()) {
			$this->form_validation->set_rules('lambai', 'lambai', 'required');
			$this->form_validation->set_rules('mora', 'mora', 'required');
			$this->form_validation->set_rules('shoulder', 'shoulder', 'required');
			$this->form_validation->set_rules('chatti', 'chatti', 'required');
			$this->form_validation->set_rules('tera', 'tera', 'required');
			$this->form_validation->set_rules('collar', 'collar', 'required');
			$this->form_validation->set_rules('asteen', 'asteen', 'required');
			$this->form_validation->set_rules('daman', 'daman', 'required');
			$this->form_validation->set_rules('shalwar', 'shalwar', 'required');
			$this->form_validation->set_rules('pancha', 'pancha', 'required');

			if ($this->form_validation->run() == FALSE) {
				//failer
				$data['page'] = 'client/update_kurta';
				$this->load->view('template', $data);
			} else {
				//successs
				$post_data = array(
					'client_id' => $client_id,
					'kurta_id' => $kurta_id,
					'lambai' => $this->input->post('lambai') . " " . $this->input->post('lambai-x'),
					'mora' => $this->input->post('mora') . " " . $this->input->post('mora-x'),
					'shoulder' => $this->input->post('shoulder') . " " . $this->input->post('shoulder-x'),
					'chatti' => $this->input->post('chatti') . " " . $this->input->post('chatti-x'),
					'tera' => $this->input->post('tera') . " " . $this->input->post('tera-x'),
					'collar' => $this->input->post('collar') . " " . $this->input->post('collar-x'),
					'asteen' => $this->input->post('asteen') . " " . $this->input->post('asteen-x'),
					'daman' => $this->input->post('daman') . " " . $this->input->post('daman-x'),
					'shalwar' => $this->input->post('shalwar') . " " . $this->input->post('shalwar-x'),
					'pancha' => $this->input->post('pancha') . " " . $this->input->post('pancha-x'),
				);
				// pr($post_data);
				$res = $this->clientdb->update($client_id, $post_data, 'kurta_pem');
				if ($res == true) {
					$this->session->set_flashdata('message', set_message("Record has been updated successfully !"));
					redirect('client');
				} else {
					$this->session->set_flashdata('message', set_message("error while updating record <span class='badge'>" . $client_id . "</span> !", 'error'));
					redirect('client');
				}
			}
		} else {
			$data['page'] = 'client/update_kurta';
			$this->load->view('template', $data);
		}
	}
	function add_pant($data = []) {
		$data = $this->global_array();
		$data['heading'] = "Addning client pant";

	}
	function add_wasket($data = []) {
		$data = $this->global_array();
		$data['heading'] = "Client Add";

	}
	function add_jacket($data = []) {
		$data = $this->global_array();
		$data['heading'] = "Adding Client jacket";

	}
	public function view($client_id = '') {
		$data = $this->global_array();
		$data['heading'] = "Client View";
		$data['search_url'] = base_url('client/view');
		$data['tool'] = (bool) FALSE;
		//if search key is provide
		if ($this->input->get('search')) {
			$cellphone = $this->input->get('search');
			$params = array('cellphone' => $cellphone);
		} else {
			$params = array('client_id' => $client_id);
		}

		$data['client'] = $this->clientdb->get_kurta($params);
		$data['client']['kurta'] = '';

		foreach ($data['client'] as $key => $val) {
			$data['client']['kurta'][$key] = $val;

		}
		unset($data['client']['kurta']['id']);
		unset($data['client']['kurta']['name']);
		unset($data['client']['kurta']['cellphone']);
		unset($data['client']['kurta']['city']);
		unset($data['client']['kurta']['address']);
		$data['page'] = "client/client_view";
		// pr($data);
		// $data['page'] = "client/view";
		$this->load->view('template', $data);

	}
	public function delete($id = NULL) {
		(is_valid_id($id, 'client')) ? '' : show_404();
		$is_deleted = $this->clientdb->delete($id);
		if ($is_deleted) {
			$this->session->set_flashdata('message', set_message("Record has been removed successfully !"));
			redirect('client');
		} else {
			$this->session->set_flashdata('message', set_message("Error While Removing Record !", "error"));
			redirect('client');
		}
	}
}
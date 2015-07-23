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
		$this->lang->load('client');
		$this->load->model('client_model', 'client');
	}

	public function index() {
		$data['page'] = 'client/client';
		$this->load->view('template', $data);
	}
	public function add() {
		if ($this->input->post()) {
			(int) $id = $this->uri->segment(3);
			// print_r($this->input->post('name'));
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('cellphone', 'Cellphone', 'required');

			if ($this->form_validation->run() == FALSE) {
				//failer
				$data['page'] = 'client/add_client';
				$this->load->view('template', $data);
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cellphone' => $this->input->post('cellphone'),
					'address' => $this->input->post('address'),
				);
				if ($id > 0 && is_numeric($id)) {
					$res = $this->client->update($id, $post_data);
				} else {
					$res = $this->client->insert_client($post_data, 'client');
				}
				if ($res > 0) {
					$this->session->flashdata('message', set_message("Record has been added successfully !"));
					$post_data['client_id'] = (int) $res;
					$this->choose_type($post_data);
				} else {
					$data['page'] = 'client/add_client';
					$data['no_quick_access'] = 'yes';
					$this->load->view('template', $data);
				}
			}
		}
		$data['page'] = 'client/add_client';
		$data['no_quick_access'] = 'yes';
		$this->load->view('template', $data);
	}
	private function choose_type($data) {
		$data['client'] = $data;
		$data['page'] = 'client/choose';
		$this->load->view('template', $data);
	}
	function add_kurta() {
		// if (!is_numeric($this->uri->segment(3))) {
		// 	pr($this->uri->segment(3));
		// 	$this->session->flashdata('message', set_message('Please Provide a valid client ID.'));
		// 	redirect('client', 'refresh');
		// }

		// if ($this->uri->segment(3)) {
		// 	(int) $data['client_id'] = $this->uri->segment(3);
		// } else {
		// 	$this->session->flashdata('message', set_message('you cannot access without client id ,try again !'));
		// 	redirect('client');
		// }
		if ($this->input->get('client_id')) {
			$client_id = $this->input->get('client_id');
			$client_name = $this->input->get('name');
			$cellphone = $this->input->get('cellphone');
			$address = $this->input->get('address');
			$data['client'] = ['name' => $client_name, 'cellphone' => $cellphone, 'client_id' => $client_id, 'address' => $address];
		} else {
			$client_id = $this->input->post('client_id');
			$client_name = $this->input->post('name');
			$cellphone = $this->input->post('cellphone');
			$address = $this->input->post('address');
			$data['client'] = ['name' => $client_name, 'cellphone' => $cellphone, 'client_id' => $client_id, 'address' => $address];
		}

		if ($this->input->post('lambai')) {
			(int) $id = $this->uri->segment(4);
			$this->form_validation->set_rules('client_id', 'Client', 'required');
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
				$data['no_quick_access'] = 'yes';
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
					'asteen' => $this->input->post('asteen') . " " . $this->input->post('asteen'),
					'daman' => $this->input->post('daman') . " " . $this->input->post('daman-x'),
					'shalwar' => $this->input->post('shalwar') . " " . $this->input->post('shalwar-x'),
					'pancha' => $this->input->post('pancha') . " " . $this->input->post('pancha-x'),
				);
				$this->load->model('client');
				if ($id > 0 && is_numeric($id)) {
					$res = $this->client->update_kurta($id, $post_data);
				} else {
					$res = $this->client->insert_client($post_data, 'kurta_pem');
				}
				if ($res > 0) {
					// $this->session->flashdata('message', "Record has been added successfully !");
					$this->session->flashdata('message', set_message("Record has been added successfully !"));
					redirect('client');
				}
			}
		}
		$data['page'] = 'client/add_kurta';
		$data['no_quick_access'] = 'yes';
		$this->load->view('template', $data);
	}
	function add_pant($data = []) {
		;
	}
	function add_wasket($data = []) {
		;
	}
	function add_jacket($data = []) {
		;
	}
	public function view() {
		$data['page'] = "client/view";
		$this->load->view('template', $data);
	}
}
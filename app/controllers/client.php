<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * auther by Abdul Manan
	 * developer at ithinq.net
	 */

	public function index() {
		$data['page'] = 'client/client';
		$this->load->view('template', $data);
	}
	public function add() {
		if ($this->input->post()) {
			(int) $id = $this->uri->segment(3);
			// print_r($id);die;
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('cellphone', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				//failer
				$this->load->view('myform');
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cellphone' => $this->input->post('cellphone'),
					'address' => $this->input->post('address'),
				);
				$this->load->model('client');
				if ($id > 0 && is_numeric($id)) {
					print_r('expression');die;
					$res = $this->client->update($id, $post_data);
				} else {
					$res = $this->client->insert($post_data);
				}
				if ($res > 0) {
					$this->session->flashdata('message', "Record has been added successfully !");
					$this->load->view('formsuccess');
				}
				$this->load->view('formsuccess');
			}
		}
		$data['page'] = 'client/add_client';
		$this->load->view('template', $data);
	}
	function add_kurta($data=[]){
			if ($this->input->post()) {
			(int) $id = $this->uri->segment(3);
			// print_r($id);die;
			$this->form_validation->set_rules('name', 'Username', 'required');
			$this->form_validation->set_rules('cellphone', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				//failer
				$this->load->view('myform');
			} else {
				//successs
				$post_data = array(
					'name' => $this->input->post('name'),
					'cellphone' => $this->input->post('cellphone'),
					'address' => $this->input->post('address'),
				);
				$this->load->model('client');
				if ($id > 0 && is_numeric($id)) {
					$res = $this->client->update_kurta($id, $post_data);
				} else {
					$res = $this->client->insert_kurta($post_data);
				}
				if ($res > 0) {
					$this->session->flashdata('message', "Record has been added successfully !");
					$this->load->view('formsuccess');
				}
				$this->load->view('formsuccess');
			}
		}
		$data['page'] = 'client/signup';
		$this->load->view('template', $data);
	}
	function add_pant($data=[]){
		;
	}
	function add_wasket($data=[]){
		;
	}
	function add_jacket($data=[]){
		;
	}
	public function view() {
		$data['page'] = "client/view";
		$this->load->view('template', $data);
	}
}
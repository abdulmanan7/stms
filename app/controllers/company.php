<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	/**
	 * auther by Abdul Manan
	 * developer at ithinq.net
	 */

	public function index() {
		$page = 'company/registration';
		$this->load->view($page);
	}

	public function add() {
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
}

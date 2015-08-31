<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * auther by Abdul Manan
	 * developer at ithinq.net
	 */
	public static $data = array('client' => '');
	protected $comp_id;
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			$this->lang->load('client');
			$this->load->model('client_model', 'clientdb');
			$this->comp_id = $this->session->userdata('user_id');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Clients',
			'heading' => lang('heading'),
			'tool' => (bool) TRUE,
			'search_url' => base_url('client/index'),
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('client'),
			'add_link' => 'client/add',
			'count' => $this->common->count_all('client'),
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
			$data['clients'] = $this->clientdb->client_search($search);
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
			//check if record already exits
			$cell = $this->input->post('cellphone');
			$rec_exist = $this->common->record_exists('client', 'cellphone', $cell);
			if ($rec_exist == true) {
				$this->session->set_flashdata('message', set_message("User with cellphone No <strong>" . $cell . "</strong> already exist !", 'notify'));
				redirect('client/view?search=' . $cell, 'refresh');
			} else {
				(int) $id = $this->uri->segment(3);
				if ($this->form_validation->run('client') == FALSE) {
					$data['page'] = 'client/add_client';
					$this->load->view('template', $data);
				} else {
					//successs
					$post_data = array(
						'name' => $this->input->post('name'),
						'cellphone' => $this->input->post('cellphone'),
						'address' => $this->input->post('address'),
						'city' => $this->input->post('city'),
						'company_id' => $this->comp_id,
					);

					$kurta_id = $this->clientdb->save_client($post_data, 'client');
					if ($kurta_id > 0) {
						$this->session->set_flashdata('message', set_message("Record has been added successfully !"));
						$this->choose_type($kurta_id, 'client/update_kurta');
					} else {
						set_flash("Fail !while insert record for client !", 'error');
						$data['page'] = 'client/add_client';
						$this->load->view('template', $data);
					}
				}
			}
		} else {
			$data['page'] = 'client/add_client';
			$this->load->view('template', $data);
		}
	}
	public function update($id = '') {
		(is_valid_id($id, 'client')) ? '' : show_404();
		$data = $this->global_array();
		$data['heading'] = "Client Updating";
		if ($this->input->post()) {
			if ($this->form_validation->run('client') == FALSE) {
				$data['client'] = $this->clientdb->get_by($id);
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
					$data['client'] = $this->clientdb->get_by($id);
					$data['page'] = 'client/update_client';
					$this->load->view('template', $data);
				}
			}
		} else {
			// $this->session->set_flashdata('message', set_message("Please provide correct ID !", 'error'));
			$data['client'] = $this->clientdb->get_by($id);
			$data['page'] = 'client/update_client';
			$this->load->view('template', $data);
		}
	}
	public function choose_type($id, $link = '') {
		$data = $this->global_array();
		$data['link'] = (!empty($link)) ? $link : $this->input->get('link');
		$data['id'] = $id;
		$data['page'] = 'client/choose';
		$this->load->view('template', $data);
	}
	function add_kurta($client_id = '') {
		(is_valid_id($client_id, 'client')) ? '' : show_404();
		$data = $this->global_array();
		$data['heading'] = "Adding client Kurta";

		if ($this->input->post()) {

			if ($this->form_validation->run('kurta') == FALSE) {
				//failer
				$data['page'] = 'client/add_kurta2';
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
				$res = $this->common->insert($post_data, 'kurta_pem');
				if ($res > 0) {
					$this->session->set_flashdata('message', set_message("Record has been added successfully !"));
					redirect('client');
				}
			}
		} else {

			$data['client'] = $this->clientdb->get_by($client_id);
			$data['page'] = 'client/add_kurta2';
			$this->load->view('template', $data);
		}
	}
	public function update_kurta($kurta_id = '') {
		$kurta_id = (isset($kurta_id)) ? $kurta_id : $this->input->post('kurta_id');
		(is_valid_id($kurta_id)) ? '' : show_404();
		$data = $this->global_array();
		$data['heading'] = $this->lang->line('heading_kurta_update');
		$params = array('kurta_id' => $kurta_id);
		$data['client'] = $this->clientdb->get_kurta($params);

		foreach ($data['client'] as $key => $val) {
			$data['client']['kurta'][$key] = $val;

		}
		$client_id = $data['client']['kurta']['client_id'];
		unset($data['client']['kurta']['name']);
		unset($data['client']['kurta']['cellphone']);
		unset($data['client']['kurta']['city']);
		unset($data['client']['kurta']['address']);
		unset($data['client']['kurta']['id']);
		// pr($data);
		if ($this->input->post()) {

			if ($this->form_validation->run('kurta') == FALSE) {
				//failer
				$data['page'] = 'client/update_kurta2';
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
				$res = $this->common->update($client_id, $post_data, 'kurta_pem');
				if ($res == true) {
					set_flash("Record has been updated successfully !");
					redirect('client');
				} else {
					set_flash("error while updating record <span class='badge'>" . $client_id . "</span> !", 'error');
					redirect('client');
				}
			}
		} else {
			$data['page'] = 'client/update_kurta2';
			$this->load->view('template', $data);
		}
	}
	function add_pant($data = array()) {
		$data = $this->global_array();
		$data['heading'] = "Addning client pant";

	}
	function add_wasket($data = array()) {
		$data = $this->global_array();
		$data['heading'] = "Client Add";

	}
	function add_jacket($data =array()) {
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
		foreach ($data['client'] as $key => $val) {
			$data['kurtas'][$key] = $val;
			$data['client']['client_id'] = $val['id'];
			$data['client']['name'] = $val['name'];
			$data['client']['cellphone'] = $val['cellphone'];
			$data['client']['city'] = $val['city'];
			$data['client']['address'] = $val['address'];

		}
		// pr($data);
		unset($data['client'][0]);
		$data['page'] = "client/client_view";
		// pr($data);
		// $data['page'] = "client/view";
		$this->load->view('template', $data);

	}
	public function delete($id = NULL) {
		(is_valid_id($id, 'client')) ? '' : show_404();
		$is_deleted = $this->common->delete($id);
		if ($is_deleted) {
			$this->session->set_flashdata('message', set_message("Record has been removed successfully !"));
			redirect('client');
		} else {
			$this->session->set_flashdata('message', set_message("Error While Removing Record !", "error"));
			redirect('client');
		}
	}
}
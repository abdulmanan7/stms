<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public static $data = array('client' => '');
	function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		} else {
			// $this->lang->load('client');
			// $this->load->model('client_model', 'clientdb');
		}
	}
	function global_array() {
		$data = array(
			'page_title' => 'Dashboard',
			'user_name' => $this->session->userdata('username'),
			'refresh_url' => base_url('dashboard'),
			'add_link' => 'client/add',
			// 'count' => $this->clientdb->count_all(),
			'user_id' => $this->session->userdata('user_id'),
			'page' => 'dashboard/dashboard',
		);

		return $data;
	}
	public function index() {
		$data = $this->global_array();
		$this->load->model('client_model', 'clientdb');
		$data['clients'] = $this->clientdb->get_clients(10, 0);
		$this->load->view('template', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Controller {
	private $data = array(
	);
	function __construct() {
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('registration_model', 'registerdb');
		$this->lang->load('auth');
	}
	public function index() {
		$this->render_page();
	}
	public function sign_up() {
		$cellphone = ($this->input->post('username')) ? $this->input->post('username') : '0';
		// pr(var_dump($this->validate_username($cellphone)));
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . 'users' . '.email]');
		$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_phone_label'), 'is_unique[' . 'users' . '.username]');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = strtolower($this->input->post('email'));
			$additional_data = array(
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('username'),
			);
			$group = array('1'); // Sets user to admin. No need for array('1', '2') as user is always set to member by default
			$user_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			set_flash('Thank you ! you have just registered at Smart Tailor .give phone / password to login');
			if ($user_id > 0) {
				$comp_data = array('id' => $user_id, 'name' => $this->input->post('company'), 'phone' => $this->input->post('username'), 'email' => $email);
				$this->registerdb->adding_default_records($comp_data);
				redirect('auth', 'refresh');
			} else {
				pr('error while registring new username');
			}

		} else {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->render_page();
		}

	}
	public function render_page() {
		$this->data['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'text',
			'class' => 'form-control',
			'Placeholder' => 'Enter your email',
			'required' => 'required',
			'value' => $this->form_validation->set_value('email'),
		);
		$this->data['company'] = array(
			'name' => 'company',
			'id' => 'company',
			'type' => 'text',
			'class' => 'form-control',
			'Placeholder' => 'Enter your company',
			'required' => 'required',
			'value' => $this->form_validation->set_value('company'),
		);
		$this->data['username'] = array(
			'name' => 'username',
			'id' => 'username',
			'type' => 'text',
			'class' => 'form-control',
			'Placeholder' => 'Enter your phone',
			'required' => 'required',
			'value' => $this->form_validation->set_value('username'),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'class' => 'form-control',
			'Placeholder' => 'Enter password',
			'required' => 'required',
			'value' => $this->form_validation->set_value('password'),
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id' => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control',
			'Placeholder' => 'Confirm Password',
			'required' => 'required',
			'value' => $this->form_validation->set_value('password_confirm'),
		);
		$this->load->view('registration/registration', $this->data);
	}
}
/* End of file Registration.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/controllers/Registration.php */
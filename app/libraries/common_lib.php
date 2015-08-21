<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_lib {
	protected $ci;

	public function __construct() {
		$this->ci = &get_instance();
	}
	public function pagination($url, $count, $limit = '20') {
		$this->ci->load->library('pagination');
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->ci->pagination->initialize($config);
		return $this->ci->pagination->create_links();
	}
}

/* End of file common_lib.php */
/* Location: .//C/xampp/htdocs/projects/stms/app/libraries/common_lib.php */

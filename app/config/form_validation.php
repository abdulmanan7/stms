<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Validation rules
| -------------------------------------------------------------------
|
 */
// error
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';
$config = array(
	'client' => array(
		array(
			'field' => 'name',
			'label' => 'Username',
			'rules' => 'trim|required',
			// 'errors' => array(
			// 	'xss_clean' => 'You must provide.',
			// ),
		),
		array(
			'field' => 'cellphone',
			'label' => 'Mobile no',
			'rules' => 'trim|required',
		),
	),
	'kurta' => array(
		array(
			'field' => 'lambai',
			'label' => 'Lambai',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'mora',
			'label' => 'Mora',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'shoulder',
			'label' => 'Shoulder',
			'rules' => 'trim|required',
		),
		array(
			'field' => 'chatti',
			'label' => 'Chatti',
			'rules' => 'trim|required',
		), array(
			'field' => 'tera',
			'label' => 'Tera',
			'rules' => 'trim|required',
		), array(
			'field' => 'collar',
			'label' => 'Collar',
			'rules' => 'trim|required',
		), array(
			'field' => 'asteen',
			'label' => 'Asteen',
			'rules' => 'trim|required',
		), array(
			'field' => 'daman',
			'label' => 'Daman',
			'rules' => 'trim|required',
		), array(
			'field' => 'shalwar',
			'label' => 'Shalwar',
			'rules' => 'trim|required',
		), array(
			'field' => 'pancha',
			'label' => 'Pancha',
			'rules' => 'trim|required',
		),
	),
);
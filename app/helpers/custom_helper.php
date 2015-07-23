<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('dateformat')) {
	function dateformat($var = '', $time = FALSE) {
		if ($time) {
			$newDate = date("M d, Y, g:i a", strtotime($var));
		} else {
			$newDate = date("M d, Y", strtotime($var));
		}
		return $newDate;
	}
}
if (!function_exists('set_message')) {
	function set_message($msg, $type = 'success') {
		switch ($type) {
			case "error":
				return '<div class="alert alert-danger"><i class="fa fa-times-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'	 . $msg . '</div>';
				break;
			case "success":
				return '<div class="alert alert-success"><i class="fa fa-check-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'	 . $msg . '</div>';
				break;
			case "warning":
				return '<div class="alert alert-warning"><i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'	 . $msg . '</div>';
				break;
			default:
				return '<div class="alert alert-info"><i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'	 . $msg . '</div>';

		}
	}
}
if (!function_exists('pr')) {
	function pr($arr = array(), $ret = FALSE) {
		echo "<pre>";
		print_r($arr);
		if (!$ret) {
			die;
		}

		echo "</pre>";
	}
}
if (!function_exists('get_field')) {
	function get_field($field, $data = array()) {
		switch ($field) {
			case "email":
				return array(
					'name' => 'u_email',
					'type' => 'text',
					'maxlength' => '50',
					'class' => 'form-control',
					'value' => set_value('e_email'),
					'placeholder' => "Enter your Email Address",
				);

				break;
			case "password":
				return array(
					'name' => 'u_pwd',
					'type' => 'password',
					'maxlength' => '50',
					'class' => 'form-control',
					'id' => 'pwd',
					'placeholder' => "Enter your Password",
				);
				break;
			case "custom":
				if (count($data)) {
					$placeholder = (isset($data['placeholder'])) ? $data['placeholder'] : 'Enter you text here';
					$length = (isset($data['length'])) ? $data['length'] : '50';
					$id = (isset($data['id'])) ? $data['id'] : '';
					return array(
						'name' => $data['fieldName'],
						'type' => 'text',
						'maxlength' => $length,
						'id' => $id,
						'class' => 'form-control',
						'placeholder' => $placeholder,
					);
				}
				break;
			default:
				return array(
					'name' => 'textfiled',
					'type' => 'text',
					'maxlength' => '50',
					'class' => 'form-control',
					'placeholder' => "Enter your text",
				);
		}
	}
}

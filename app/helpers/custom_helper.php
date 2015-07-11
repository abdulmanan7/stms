<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

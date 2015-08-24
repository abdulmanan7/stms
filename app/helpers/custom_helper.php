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
if (!function_exists('client_relation')) {
	function client_relation($client_id) {
		$CI = &get_instance();
		$CI->load->model('relation_model');
		$res = $CI->relation_model->get_status($client_id);
		if ($res) {
			$parms = array('link' => 'relation/remove/' . $client_id, 'type' => 'default btn-xs', 'name' => 'client_rem_btn', 'tooltip' => 'remove client from list');
			return button($parms);
		} else {
			$parms = array('link' => 'relation/add_client/' . $client_id, 'type' => 'success btn-xs', 'name' => 'client_add_btn', 'tooltip' => 'add client to list');
			return button($parms);
		}

	}
}

if (!function_exists('set_message')) {
	function set_message($msg, $type = 'success') {
		switch ($type) {
			case "error":
				return '<div class="alert alert-danger"><i class="icon-bad-circle"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $msg . '</div>';
				break;
			case "success":
				return '<div class="alert alert-success"><i class="icon-check-sign"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $msg . '</div>';
				break;
			case "warning":
				return '<div class="alert alert-warning"><i class="icon-warning-sign"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $msg . '</div>';
				break;
			case "info":
				return '<div class="alert alert-info"><i class="icon-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $msg . '</div>';
				break;
			default:
				return '<div class="alert-notify"><i class="icon-foursquare"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $msg . '</div>';

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
if (!function_exists('get_domain')) {
	function get_domain() {
		$CI = &get_instance();
		return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/", "$1", $CI->config->slash_item('base_url'));
	}
}
if (!function_exists('add_url')) {
	function add_url($url) {
		return anchor(base_url($url), 'add product', "class='btn btn-success btn-xs'");
	}
}
if (!function_exists('get_cur_dec')) {
	function get_cur_dec() {
		$CI = &get_instance();
		$CI->load->model('currency_model');
		$dec_point = $CI->currency_model->getDefaultCurrency('decimal_place');
		round($dec_point);
		return $dec_point;
	}
}
if (!function_exists('floatFormat')) {
	function floatFormat($val, $dec = NULL) {
		$dec = (!$dec) ? get_cur_dec() : $dec;
		return number_format((float) $val, $dec, '.', ',');
	}
}
if (!function_exists('format_price')) {
	function format_price($val, $curency_id = NULL, $left_only = FALSE) {
		$CI = &get_instance();
		$CI->load->model('currency_model');
		if ($curency_id) {
			$Result = $CI->currency_model->getcurrency($curency_id);
			$dec_place = round($Result['decimal_place']);
			$value = number_format((float) $val, $dec_place, '.', ',');
			if ($left_only) {
				return $Result['symbol_left'] . " " . $value;
			}
			return $Result['symbol_left'] . $value . " " . $Result['symbol_right'];
		} else {
			$Result = $CI->currency_model->getDefaultCurrency();
			$dec_place = round($Result['decimal_place']);
			$value = number_format((float) $val, $dec_place, '.', ',');
			if ($left_only) {
				return $Result['symbol_left'] . " " . $value;
			}
			return $Result['symbol_left'] . " " . $value . " " . $Result['symbol_right'];
		}
	}
}
if (!function_exists('validateProduct')) {
	function validateProduct($product_id, $stock_entry = FALSE, $company_id = NULL) {
		if ($product_id == '0') {return FALSE;}
		$CI = &get_instance();
		$CI->load->model('products_model');
		$Result = $CI->products_model->validate_product($product_id);
		return $Result;
	}
}
if (!function_exists('clean_dir')) {
	function clean_dir($path) {
		$files = glob($path); // get all file names
		foreach ($files as $file) {
			// iterate files
			if (is_file($file)) {
				unlink($file);
			}
			// delete file
		}
	}
}
if (!function_exists('toArray')) {
	function toArray($obj) {
		if (is_object($obj)) {
			$obj = (array) $obj;
		}

		if (is_array($obj)) {
			$new = array();
			foreach ($obj as $key => $val) {
				$new[$key] = toArray($val);
			}
		} else {
			$new = $obj;
		}

		return $new;
	}
}
if (!function_exists('esc')) {
	function esc($val, $arr = FALSE) {
		if (is_array($val)) {
			return $val;
		}
		if ($arr) {
			$data = array();
			foreach ($val as $key => $element) {
				$data[$key] = htmlentities($element, ENT_QUOTES, "UTF-8");
			}
			return $data;
		} else {
			if (is_array($val)) {
				$data = array();
				foreach ($val as $key => $element) {
					$data[$key] = htmlentities($element, ENT_QUOTES, "UTF-8");
				}
				return $data;
			}
			$val = htmlentities($val, ENT_QUOTES, "UTF-8");
			return $val;
		}
	}
}
if (!function_exists('find_url')) {
	function find_url($val, $file_name = '') {
		switch ($val) {
			case 'base':
				return base_url();
				break;
			case 'assets':
				return base_url('assets/' . $file_name);
				break;
			case 'css':
				return base_url('assets/stylesheets/' . $file_name);
				break;
			case 'js':
				return base_url('assets/javascripts/' . $file_name);
				break;
			case 'images':
				return base_url('assets/images/' . $file_name);
				break;
			case 'fonts':
				return base_url('assets/fonts/' . $file_name);
				break;
			case 'res':
				return base_url('res/' . $file_name);
				break;
			default:
				return site_url();
				break;
		}
	}
}
if (!function_exists('is_valid_id')) {
	function is_valid_id($val, $table = FALSE) {
		if (empty($val)) {
			return (bool) FALSE;
		}
		if (!is_numeric($val)) {
			return (bool) FALSE;
		}
		if (is_null($val)) {
			return (bool) FALSE;
		}
		if ($table) {
			$ci = &get_instance();
			$model = $table . "_model";
			$ci->load->model($model);
			return $ci->$model->record_exists($table, 'id', $val);
		}
		return (bool) TRUE;
	}
}
if (!function_exists("find_style")) {
	function find_style($str = '') {
		if (strpos($str, '1/1') !== false) {
			return str_replace("1/1", "<sup>1/1</sup>", $str);
		}
		if (strpos($str, '1/2') !== false) {
			return str_replace("1/2", "<sup>1/2</sup>", $str);
		}
		if (strpos($str, '1/3') !== false) {
			return str_replace("1/3", "<sup>1/3</sup>", $str);
		}
		if (strpos($str, '1/4') !== false) {
			return str_replace("1/4", "<sup>1/4</sup>", $str);
		}
		if (strpos($str, ' 11') !== false) {
			return str_replace(" 11", "<sup>1/1</sup>", $str);
		}
		if (strpos($str, ' 12') !== false) {
			return str_replace(" 12", "<sup>1/2</sup>", $str);
		}
		if (strpos($str, ' 13') !== false) {
			return str_replace(" 13", "<sup>1/3</sup>", $str);
		}
		if (strpos($str, ' 14') !== false) {
			return str_replace(" 14", "<sup>1/4</sup>", $str);
		}
		return $str;
	}
}
if (!function_exists("find_return")) {
	function find_return($str = '', $start_string = NULL) {
		if ($start_string) {
			return substr($str, 0, $start_string);
		}
		if (strpos($str, '1/1') !== false) {
			return substr($str, -3);
		}
		if (strpos($str, '1/2') !== false) {
			return substr($str, -3);
		}
		if (strpos($str, '1/3') !== false) {
			return substr($str, -3);
		}
		if (strpos($str, '1/4') !== false) {
			return substr($str, -3);
		}
		if (strpos($str, ' 11') !== false) {
			return substr($str, -2);
		}
		if (strpos($str, ' 12') !== false) {
			return substr($str, -2);
		}
		if (strpos($str, ' 13') !== false) {
			return substr($str, -2);
		}
		if (strpos($str, ' 14') !== false) {
			return substr($str, -2);
		}
		//whe str is empty return
		return '';
	}
}
if (!function_exists("request_uri")) {
	function request_uri() {

		$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
		$base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
		$complete_url = $base_url . $_SERVER["REQUEST_URI"];

		return $complete_url;

	}
}
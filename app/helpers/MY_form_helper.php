<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('button')) {
	function button($type, $link = '', $tooltip = NULL, $size = '') {
		$size = (!empty($size)) ? ' btn-' . $size : '';
		$attributes = array('class' => 'btn btn-success');
		switch ($type) {
			case $type == 'add':
				$attributes = array('class' => 'btn btn-success');
				if ($tooltip) {
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'btn btn-success' . $size);
				}
				return anchor($link, lang('add_btn'), $attributes);
				break;
			case $type == 'edit':
				$attributes = array('class' => 'btn btn-warning');
				if ($tooltip) {
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'btn btn-warning' . $size);
				}
				return anchor($link, lang('edit_btn'), $attributes);
				break;
			case $type == 'del':
				$attributes = array('class' => 'btn btn-danger');
				if ($tooltip) {
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'delete btn btn-danger' . $size);
				}
				return anchor($link, lang('del_btn'), $attributes);
				break;
			case $type == 'save':
				$attributes = array('class' => 'btn btn-info');
				if ($tooltip) {
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'btn btn-info' . $size);
				}
				return anchor($link, lang('save_btn'), $attributes);
				break;
			case $type == 'view':
				$attributes = array('class' => 'btn btn-primary');
				if ($tooltip) {
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'btn btn-primary' . $size);
				}
				return anchor($link, lang('view_btn'), $attributes);
				break;
			default:
				$rem_id = (strpos($type['link'], 'remove') !== false) ? 'rem' : '';
				$attributes = array('id' => $rem_id, 'class' => 'btn btn-' . $type['type'], 'data-original-title' => $type['tooltip'], 'title' => '', 'data-toggle' => 'toolbar-tooltip');
				return anchor($type['link'], lang($type['name']), $attributes);
				break;
		}
	}
}
if (!function_exists('img_field')) {
	function img_field($field_name = '', $val = '', $img_name = '', $placeholder = '', $id = '') {
		$field_name_2nd = $field_name . "-x";
		$img_name = (!empty($img_name)) ? $img_name : $field_name . '.png';
		$id = (!empty($id)) ? $id : $field_name;
		$placeholder = (!empty($placeholder)) ? $placeholder : "placeholder_" . $field_name;
		return '<div class="img-field">
               <div class="img">
                <img src="' . find_url('images', 'entry/' . $img_name) . '" class="height-img img-responsive" alt="' . $img_name . '">
                </div>
                <div class="in-field">
            <div class="input-group">
                <input type="text" name="' . $field_name . '" value="' . find_return($val, 2) . '" class="form-control" id="' . $field_name . '" placeholder="' . lang($placeholder) . '">
            </div>
                <div class="input-group">
                <input type="text" name="' . $field_name_2nd . '" value="' . find_return($val) . '" class="form-control" id="' . $field_name_2nd . '" placeholder="e.g 1/2,1/4">
            </div>
                </div>
            </div>';
	}
}
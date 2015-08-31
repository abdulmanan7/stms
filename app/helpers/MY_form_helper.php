<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('button')) {
	function button($type, $link = '', $tooltip = NULL, $size = '', $icon = '') {
		$size = (!empty($size)) ? ' btn-' . $size : '';
		$attributes = array('class' => 'btn btn-success');
		switch ($type) {
			case $type == 'add':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-success ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('add_btn') . '</a>';
				return $btn;
				break;
			case $type == 'add_detail':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-success ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('add_detail_btn') . '</a>';
				return $btn;
				break;
			case $type == 'edit':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-warning ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('edit_btn') . '</a>';
				return $btn;
				break;
			case $type == 'del':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-danger ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('del_btn') . '</a>';
				return $btn;
				break;
			case $type == 'save':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-info ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('save_btn') . '</a>';
				return $btn;
				break;
			case $type == 'view':
				$btn = '<a href="' . base_url($link) . '"';
				if ($tooltip) {
					$btn .= 'data-toggle="tooltip" data-original-title="' . $tooltip . '"';
				}
				$btn .= 'class="btn btn-primary ' . $size . '">';
				if (!empty($icon)) {
					$btn .= '<i class="' . $icon . '"> </i>';
				}
				$btn .= lang('view_btn') . '</a>';
				return $btn;
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
if (!function_exists('box_img')) {
	function box_img($val = '', $img_name = '', $img_x = '.png') {
		return '<div class="img-box">
               <div class="box-img">
                <img src="' . find_url('images', 'entry/' . $img_name . $img_x) . '" class="img-inside" alt="Image">
                </div>
                <div class="box-text">' . find_style($val) . '</div>
                </div>';
	}
}
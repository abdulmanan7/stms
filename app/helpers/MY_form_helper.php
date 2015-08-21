<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('button')) {
	function button($type = '', $link = '', $tooltip = NULL, $size = '') {
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
					$attributes = array('data-original-title' => $tooltip, 'title' => '', 'data-toggle' => 'toolbar-tooltip', 'class' => 'btn btn-danger' . $size);
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
				return anchor($link, lang('submit_btn'), 'class="btn btn-default"');
				break;
		}
	}
}
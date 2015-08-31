<?php

$this->load->view('partial/header');
// // $this->load->view('partial/main-menu');
// if (!isset($no_quick_access)) {
// 	$this->load->view('partial/quick_access');
// }
$this->load->view($page);
$this->load->view('partial/footer');
// $this->load->view('partial/tail');
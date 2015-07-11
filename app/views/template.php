<?php

$this->load->view('partial/head');
$this->load->view('partial/header');
$this->load->view('partial/main-menu');
$this->load->view($page);
$this->load->view('partial/footer');
$this->load->view('partial/tail');
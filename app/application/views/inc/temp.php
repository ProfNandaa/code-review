<?php

$this->load->view("inc/header");
if (!isset($plain)) {
	$this->load->view("inc/menu");
}
$this->load->view($main);
$this->load->view("inc/footer");
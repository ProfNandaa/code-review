<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $data;

	private function _load_view()
	{
		$this->load->view("inc/temp", $this->data);
	}

	public function index()
	{
		$this->data["main"] = "home/index";
		$this->_load_view();
	}


}

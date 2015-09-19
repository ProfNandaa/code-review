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
		$this->is_logged_in();
		$this->data["main"] = "home/index";
		$this->_load_view();
	}

	public function welcome()
	{
		$this->data["plain"] = true;
		$this->data["main"] = "home/welcome";
		$this->_load_view();
	}

	private function is_logged_in()
	{
		if (!$this->userdata->is_logged_in) {
			redirect("home/welcome");
		}
	}

}

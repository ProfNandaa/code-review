<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repos extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model("repos_model");
		$this->is_logged_in();
	}

	private function _load_view()
	{
		$this->load->view("inc/temp", $this->data);
	}

	public function index()
	{
		$this->data["main"] = "repo/index";
		$this->data["repos"] = $this->repos_model
				->get_repos($this->session->uid);
		$this->_load_view();
	}

	public function add($mode = "submit")
	{
		if ($mode == "submit") {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("url", "Repo URL",
					"required|valid_url");

			if ($this->form_validation->run()) {
				$url = $this->input->post("url");
				$url = str_replace("https://", "", $url);
				$url = str_replace("http://", "", $url);
				$url = explode("/", $url);

				//if had a trailing '/'
				if (count($url) == 4) array_pop($url);
				if (count($url) == 3) {
					//valid repo url
					$repo = array(
							"url" => $this->input->post("url"),
							"username" => $url[1],
							"repo" => $url[2],
							"uid" => $this->session->uid
						);
					$this->repos_model->add_repo($repo);
				} else {
					// not a valid repo url
					$this->session->set_flashdata("error", "Not a valid repo URL");
				}
				redirect("repos");
			}
		}
	}

	private function is_logged_in()
	{
		if (!$this->session->is_logged_in) {
			redirect("home/welcome");
		}
	}

}

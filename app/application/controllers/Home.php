<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $data;
	private $git_config = array(
				'client_id' => '450698595794669db58b',
				'client_secret' => '0ca68f68d6529c0c91ea3b65d490fdf2e9062f7d',
				'redirect_url' => 'http://localhost/code-review/app/home/welcome', 
				'app_name' => 'CodeReview'
			);

	function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
	}

	private function _load_view()
	{
		$this->load->view("inc/temp", $this->data);
	}

	public function index()
	{
		if ($this->session->github_data) {
			$this->user_model->register_user();
		} else {
			redirect("home/login");
		}
		// var_dump($this->session->github_data); die();
		$this->is_logged_in();
		$this->data["main"] = "home/index";
		$this->_load_view();
	}

	public function welcome()
	{
		if(isset($_GET['code'])) {
			$this->load->library("GithubApi", $this->git_config);
			$git = $this->githubapi;
			$git->getUserDetails();
			$this->session->set_userdata('github_data',$git->getAllUserDetails());
			$this->session->set_userdata('is_logged_in', true);
			redirect("home/index");
		}
		if ($this->session->github_data) {
			redirect("home/index");
		}

		$this->data["plain"] = true;
		$this->data["main"] = "home/welcome";
		$this->_load_view();
	}

	public function login()
	{
		$url = "https://github.com/login/oauth/authorize?client_id=" . 
						$this->git_config['client_id'] . "&redirect_uri=" . 
						$this->git_config['redirect_url']."&scope=user";
		redirect($url);
	}

	private function is_logged_in()
	{
		if (!$this->session->is_logged_in) {
			redirect("home/welcome");
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("home/welcome");
	}

}

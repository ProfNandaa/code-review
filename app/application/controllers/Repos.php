<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repos extends CI_Controller {

	private $data;
	private $git_config;

	function __construct()
	{
		parent::__construct();
		$this->load->model("repos_model");
		$this->is_logged_in();
		$this->load->config("github");
		$this->git_config = $this->config->config['github'];
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

	public function review($id = 0)
	{
		$repo = $this->repos_model->get_repo($id);
		if ($repo) {
			$url = "https://api.github.com/repos/" . $repo->username .
						"/" . $repo->repo . "/comments";

			// redirect($url);
			$this->load->library("GithubApi", $this->git_config);
			$res = $this->githubapi->sendGeneralReq($url);

			$comments = $res[1];
			if (count($comments) > 0) {
				$sample = $comments[0];

				echo "<h2>//Sample</h2>";
				var_dump($sample->user->login);
				var_dump($sample->body);
				echo "<h2>//Full</h2>";
				var_dump($comments);
			}

		} else {
			redirect("repos");
		}
	}

	private function is_logged_in()
	{
		if (!$this->session->is_logged_in) {
			redirect("home/welcome");
		}
	}

}

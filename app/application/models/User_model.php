<?php

class User_model extends CI_Model {

	function register_user()
	{
		$github = $this->session->github_data;
		// check if user registered first
		if ($this->session->registered) {
			return true;
		} else {
			$this->db->where("github_username", $github->login);
			$result = $this->db->get("user");
			if ($result->num_rows() > 0) {
				$result = $result->result();
				$result = $result[0];
				$this->session->set_userdata("uid", $result->uid);
				$this->session->set_userdata("registered", true);
				return true;
			} else {
				$user = array(
					"email" => $github->email,
					"name" => $github->name,
					"company" => $github->company,
					"location" => $github->location,
					"github_id" => $github->id,
					"github_username" => $github->login,
					"profile_image" => $github->avatar_url,
					"github_url" => $github->url
				);
				return $this->db->insert("user", $user);
			}
		}
	}
}
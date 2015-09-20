<?php

class Repos_model extends CI_Model {

	function add_repo($repo)
	{
		// check for duplicate by same user
		$sql = "SELECT * 
				FROM repo
				WHERE repo = '" . $repo['repo'] .
				"' AND username = '" . $repo['username'] . "'";
		$result = $this->db->query($sql);
		if ($result->num_rows() == 0) {
			return $this->db->insert("repo", $repo);
		}
		return false;
	}

	function get_repos($uid)
	{
		$this->db->where("uid", $uid);
		return $this->db->get("repo");
	}
}
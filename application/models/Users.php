<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	//Function To Insert New User To Database
	public function Insert_user($user_data)
	{
		$this->db->insert('users', $user_data);
	}

	//Function To Get Users From Database to Check If User Exist or Not
	public function get_user($user_data)
	{
		$allUsers = $this->db->get_where('users', array('UserName' => $user_data['UserName'],
												 		'Password' => $user_data['Password']));
		$num_rows = $allUsers->num_rows();
		return $num_rows;
	}

}

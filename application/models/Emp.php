<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Model {

	//Function To Insert New Job To Database
	public function Insert_Employee($emp_data)
	{
		$this->db->insert('employee', $emp_data);
	}

}

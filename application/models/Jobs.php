<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Model {

	//Function To Insert New Job To Database
	public function Insert_Job($job_data)
	{
		$this->db->insert('jobs', $job_data);
	}

}

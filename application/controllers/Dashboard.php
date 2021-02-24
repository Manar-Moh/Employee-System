<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jobs');
	}

	public function index()
	{
		$this->load->view('Dashboard/Dash_home');
	}

	public function AddJob()
	{

		$this->load->view('Dashboard/add_job');
	}

	//Function To Add New Job
	public function InsertJob()
	{	
		if($this->input->post('Add-Job')){
			$jobName = $this->input->post('Job-Name');
			$jobs_data = array('JobName' => $jobName );
			$this->Jobs->Insert_Job($jobs_data);
			echo "<script>alert('Insert New Job To')</script>";
			redirect('Dashboard/AddJob','refresh');

		}
	}

}

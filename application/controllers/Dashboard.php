<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jobs');
		$this->load->model('Emp');
	}

	public function index()
	{
		$this->load->view('Dashboard/Dash_home');
	}

	public function AddJob()
	{

		$this->load->view('Dashboard/add_job');
	}

	public function jobList()
	{

		$this->load->view('Dashboard/jobList');
	}

	public function updateJobView($id)
	{

		$this->load->view('Dashboard/update_job',$id);
	}

	public function addEmpView()
	{

		$this->load->view('Dashboard/add_emp');
	}

	public function EmpListView()
	{

		$this->load->view('Dashboard/empList');
	}

	public function updateEmpView($id)
	{

		$this->load->view('Dashboard/update_emp',$id);
	}

	//Function To Add New Job
	public function InsertJob()
	{	
		if($this->input->post('Add-Job')){
			$jobName = $this->input->post('Job-Name');
			$jobs_data = array('JobName' => $jobName );
			$this->Jobs->Insert_Job($jobs_data);
			echo "<script>alert('Insert New Job Done')</script>";
			redirect('Dashboard/jobList','refresh');

		}
	}

	//Function To Add New Emp
	public function InsertEmp()
	{	
		if($this->input->post('Add-Emp')){
			$empName = $this->input->post('Emp-name');
			$empEmail = $this->input->post('Emp-Email');
			$empPhone = $this->input->post('Emp-Phone');
			$empJop = $this->input->post('Emp-Job');
			$emp_data = array('EmpName' => $empName,
							  'EmpEmail' => $empEmail,
							  'EmpPhone' => $empPhone,
						      'EmpJob' => $empJop);
			$this->Emp->Insert_Employee($emp_data);
			echo "<script>alert('Insert New Employee Done')</script>";
			redirect('Dashboard/EmpListView','refresh');

		}
	}


	//Function To Update Job
	public function UpdateJob_Process($id)
	{	
		if($this->input->post('update-Job')){
			$JobName = $this->input->post('Job-Name');
			$job_data = array('JobName' => $JobName );
			$this->db->where('JobID', $id);
			$this->db->update('jobs', $job_data);
			redirect('Dashboard/jobList','refresh');

		}
	}

	//Function To Delete Job
	public function DeleteJob_Process($id)
	{	
		$this->db->where('JobID', $id);
		$this->db->delete('jobs');
		redirect('Dashboard/jobList','refresh');
	}

	//Function To Delete Employee
	public function DeleteEmp_Process($id)
	{	
		$this->db->where('EmpID', $id);
		$this->db->delete('employee');
		redirect('Dashboard/EmpListView','refresh');
	}

	//Function To Update Emp
	public function UpdateEmp_Process($id)
	{	
		if($this->input->post('update-Emp')){
			$empName = $this->input->post('Emp-name');
			$empEmail = $this->input->post('Emp-Email');
			$empPhone = $this->input->post('Emp-Phone');
			$empJop = $this->input->post('Emp-Job');
			$emp_data = array('EmpName' => $empName,
							  'EmpEmail' => $empEmail,
							  'EmpPhone' => $empPhone,
						      'EmpJob' => $empJop);
			$this->db->where('EmpID', $id);
			$this->db->update('employee', $emp_data);
			redirect('Dashboard/EmpListView','refresh');

		}
	}

}

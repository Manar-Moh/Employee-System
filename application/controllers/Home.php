<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users');
	}
	public function index()
	{
		$this->load->view('inc/header');
		$this->load->view('home');
		$this->load->view('inc/footer');
	}
	public function Register()
	{
		$this->load->view('inc/header');
		$this->load->view('register');
		$this->load->view('inc/footer');
	}

	//Function To Collect UserInfo after Login
	public function LoginProcess()
	{
		if($this->input->post('submit_login')){
			$username = $this->input->post('login-username');
			$password = md5($this->input->post('login-password'));
			$user_data = array('UserName' => $username, 'Password' => $password );

			//Check If User Exist Or Not
			$num_rows = $this->Users->get_user($user_data);
			if($num_rows == 1){
				$_SESSION['UserName'] = $user_data['UserName']; 
				echo "<script>alert('Welcome ".$_SESSION['UserName']."')</script>";
				redirect('Dashboard','refresh');
			}
			else{
				echo "<script>alert('Username Or Password Incorrect!')</script>";
				redirect('home','refresh');
			}

		}
		else redirect('home','refresh');
	}

	//Function To Collect UserInfo after Register
	public function RegisterProcess()
	{
		if($this->input->post('submit_Register')){
			$email 	   = $this->input->post('Register-Email');
			$username  = $this->input->post('Register-username');
			$password  = md5($this->input->post('Register-password'));
			$user_data = array('Email' => $email , 'UserName' => $username,
							   'Password' => $password);
			$this->Users->Insert_user($user_data);
			redirect('home','refresh');
		}
		else redirect('home','refresh');
	}

	//Function To Logout 
    public function Logout()
	{
		session_unset();
		session_destroy();
		redirect('home','refresh');
	}
}

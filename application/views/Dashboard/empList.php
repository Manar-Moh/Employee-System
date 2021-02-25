<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(!$_SESSION['UserName']){
		redirect('home','refresh');
	}
?>

	<?php $this->load->view('Dashboard/inc/Dashboard_header');?>

  	<!--Start Navbar-->
  	<?php $this->load->view('Dashboard/inc/navbar');?>

  	
  	<div class="container">
  		<div class="row">
  			<!--Start sidebar-->
  			<div class="col-12 col-lg-4">
  				<?php $this->load->view('Dashboard/inc/sidebar');?>
  			</div>
			<!--Start Job List Section-->
  			<div class="col-12 col-lg-8" style="margin-top: 60px">
  				<table class="table table-bordered" style="text-align: center;">
  					<tr>
  						<th>ID</th>
	  					<th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Job</th>
	  					<th>Edit</th>
	  					<th>Delete</th>
  					</tr>
  					<?php

  						$EmployeeList = $this->db->get('employee');
  						foreach ($EmployeeList->result() as $emp) { 
                $empjobList = $this->db->get_where('jobs', array('JobID' => $emp->EmpJob));
                $empjob = $empjobList->row()->JobName;
                ?>

  							<tr>
  								<td><?php echo $emp->EmpID;?></td>
  								<td><?php echo $emp->EmpName;?></td>
                  <td><?php echo $emp->EmpEmail;?></td>
                  <td><?php echo $emp->EmpPhone;?></td>
                  <td><?php echo $empjob;?></td>
  								<td><a href="<?php echo site_url('Dashboard/updateEmpView/'.$emp->EmpID);?>" class="btn btn-warning btn-block">Edit</a></td>
  								<td><a href="<?php echo site_url('Dashboard/DeleteEmp_Process/'.$emp->EmpID)?>" class="btn btn-danger btn-block">Delete</a></td>
  							</tr>
  					
  						<?php }
  					?>
  				</table>

  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(!$_SESSION['UserName']){
		redirect('home','refresh');
	}
	$id = $this->uri->segment(3);
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
			<!--Start Add Job Section-->
  			<div class="col-12 col-lg-8">
  				<div class="card" style="margin-top: 60px">
				  <div class="card-header">Update Employee Information</div>
				  <div class="card-body">
				    <?php echo form_open('Dashboard/UpdateEmp_Process/'.$id);?>
				   		 <!--Job Name-->
				    	<?php 
				    		$empinfo = $this->db->get_where('employee', array('EmpID' => $id));
				    		foreach ($empinfo->result() as $emp) { ?>
				    			<!--Name-->
								<div class="form-group">
									<input type="text" name="Emp-name"
									 	   value="<?php echo $emp->EmpName;?>" 
									 	   class="form-control" required>
								</div>
						    	<!--Email-->
								<div class="form-group" style="margin-top: 20px">
									<input type="Email" name="Emp-Email"
									 	    value="<?php echo $emp->EmpEmail;?>"
									 	     class="form-control" required>
								</div>
								<!--Phone-->
								<div class="form-group">
									<input type="Phone" name="Emp-Phone"
									 	    value="<?php echo $emp->EmpPhone;?>"
									 	     class="form-control" required>
								</div>
								<!--Job-->
								<div class="form-group">
									<select name="Emp-Job" class="form-control">
										<?php
											$alljobs = $this->db->get('jobs');
											foreach ($alljobs->result() as $job) { 
												
												?>
												<option value="<?php echo $job->JobID?>">
													<?php echo $job->JobName?>
												</option>
										  <?php 
										    }
										?>
									</select>
								</div>
				    		<?php }?>
				    	<!--Update Button-->
				    	<div class="form-group">
						<input type="Submit" name="update-Emp"
						 	   value="Update" class="btn btn-success btn-block">
						</div>
				    <?php echo form_close();?>
				  </div>
				</div>
  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
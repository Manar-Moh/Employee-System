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
			<!--Start Add Job Section-->
  			<div class="col-12 col-lg-8">
  				<div class="card" style="margin-top: 60px">
				  <div class="card-header">Add Employee</div>
				  <div class="card-body">
				    <?php echo form_open('Dashboard/InsertEmp');?>
				    	<!--Name-->
						<div class="form-group">
							<input type="text" name="Emp-name"
							 	   placeholder="Name" class="form-control" required>
				    	<!--Email-->
						<div class="form-group" style="margin-top: 20px">
							<input type="Email" name="Emp-Email"
							 	   placeholder="Email" class="form-control" required>
						</div>
						<!--Phone-->
						<div class="form-group">
							<input type="Phone" name="Emp-Phone"
							 	   placeholder="Phone" class="form-control" required>
						</div>
						<!--Job-->
						<div class="form-group">
							<select name="Emp-Job" class="form-control">
								<option value="" selected=""></option>
								<?php
									$alljobs = $this->db->get('jobs');
									foreach ($alljobs->result() as $job) { ?>
										<option value="<?php echo $job->JobID?>">
											<?php echo $job->JobName?>
										</option>
									<?php }
								?>
							</select>
						</div>
						<!--Add Button-->
						<div class="form-group">
							<input type="Submit" name="Add-Emp"
							 	   value="Add Employee" class="btn btn-success btn-block">
						</div>
				    <?php echo form_close();?>
				  </div>
				</div>
  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
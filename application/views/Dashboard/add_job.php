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
				  <div class="card-header">Add Job</div>
				  <div class="card-body">
				    <?php echo form_open('Dashboard/InsertJob');?>
				    <!--Job Name-->
				    <label>Job Name</label>
				    <div class="form-group">
						<input type="text" name="Job-Name"
						 	   class="form-control" required>
					</div>
					<!--Add Button-->
					<div class="form-group">
						<input type="Submit" name="Add-Job"
						 	   value="Add Job" class="btn btn-success">
					</div>
				    <?php echo form_close();?>
				  </div>
				</div>
  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
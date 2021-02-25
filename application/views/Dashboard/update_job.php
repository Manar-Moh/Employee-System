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
				  <div class="card-header">Update Job</div>
				  <div class="card-body">
				    <?php echo form_open('Dashboard/UpdateJob_Process/'.$id);?>
				   		 <!--Job Name-->
				    	<?php 
				    		$jobinfo = $this->db->get_where('jobs', array('JobID' => $id));
				    		foreach ($jobinfo->result() as $job) { ?>
				    			<label>Job Name</label>
							    <div class="form-group">
									<input type="text" name="Job-Name"
									 	   class="form-control" required value="<?php echo $job->JobName?>">
								</div>
				    		<?php }
				    	?>
				    	<!--Update Button-->
				    	<div class="form-group">
						<input type="Submit" name="update-Job"
						 	   value="Update Job" class="btn btn-success btn-block">
					</div>
				    <?php echo form_close();?>
				  </div>
				</div>
  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
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
	  					<th>Edit</th>
	  					<th>Delete</th>
  					</tr>
  					<?php
  						$jobs = $this->db->get('jobs');
  						foreach ($jobs->result() as $job) { ?>

  							<tr>
  								<td><?php echo $job->JobID;?></td>
  								<td><?php echo $job->JobName;?></td>
  								<td><a href="<?php echo site_url('Dashboard/updateJobView/'.$job->JobID);?>" class="btn btn-warning btn-block">Edit</a></td>
  								<td><a href="<?php echo site_url('Dashboard/DeleteJob_Process/'.$job->JobID)?>" class="btn btn-danger btn-block">Delete</a></td>
  							</tr>
  					
  						<?php }
  					?>
  				</table>

  			</div>
  		</div>
  	</div>

	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(!$_SESSION['UserName']){
		redirect('home','refresh');
	}
?>

	<?php $this->load->view('Dashboard/inc/Dashboard_header');?>

  	<!--Start Navbar-->
  	<?php $this->load->view('Dashboard/inc/navbar');?>

	<!--Start sidebar-->
    <div class="container">
  		<div class="row">
  			<div class="col-12 col-lg-4">
  				<?php $this->load->view('Dashboard/inc/sidebar');?>
  			</div>
  		</div>
  	</div>
  	
	<?php $this->load->view('Dashboard/inc/Dashboard_footer');?>
  
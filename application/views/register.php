<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="col col-lg-8 offset-lg-2">
			<div class="card" style="margin-top: 100px">
				<div class="card-header">Register</div>
				<div class="card-body">
					<?php echo form_open('home/RegisterProcess');?>
						<!--Email-->
						<div class="form-group">
							<input type="Email" name="Register-Email"
							 	   placeholder="Email" class="form-control" required>
						</div>
						<!--Username-->
						<div class="form-group">
							<input type="text" name="Register-username"
							 	   placeholder="Username" class="form-control" required>
						</div>
						<!--Password-->
						<div class="form-group">
							<input type="Password" name="Register-password"
							 	   placeholder="Password" class="form-control" required>
						</div>
						<!--Submit & Register Buttons-->
						<div class="form-group">
							<input type="Submit" name="submit_Register"
							 	   value="Register" class="btn btn-success">
						    <a href="<?php echo site_url('home')?>" class="btn btn-warning">Login As Admin</a>
						</div>
					<?php echo form_close();?> 
				</div>
			</div>
		</div>
	</div>
</div>
	 		
			<!-- start: Main Menu -->
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?=base_url()?>dashboard/">Dashboard</a> 
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a>Admin Profile</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
<?php
	if($this->session->userdata('error_msg'))
	{
?>
<div class="alert alert-<?=$this->session->userdata('error_cls')?>">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<?=$this->session->userdata('error_msg')?>
</div>
<?php		
$this->session->unset_userdata('error_msg');
$this->session->unset_userdata('error_cls');

	}
?>						

				<div class="box span6" style="margin-left:0px">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Admin Profile</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">

						
						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="date01">First Name</label>
							  <div class="controls">
								<input type="text" name="fname" class="input-xlarge" value="<?=$this->session->userdata('admin_fname')?>" >
								  <?php echo '<span style="color:red">'.form_error('fname').'</span>';?>
							  </div>
							
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Last Name</label>
							  <div class="controls">
								<input type="text" name="lname" class="input-xlarge" value="<?=$this->session->userdata('admin_lname')?>" >
								<?php echo '<span style="color:red">'.form_error('lname').'</span>';?>
							  </div>
							  
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Account Email</label>
							  <div class="controls">
								<input type="text" name="username" class="input-xlarge" value="<?=$this->session->userdata('admin_username')?>" >
								
								<?php echo '<span style="color:red">'.form_error('username').'</span>';?>
							  </div>
							</div>

							      
							<div class="form-actions">
							  <button type="submit" name="btn_save" class="btn btn-primary">Save changes</button>
							  <a href="<?=base_url()?>dashboard/">
							  	<button type="button" class="btn">Cancel</button>
							  </a>							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->






				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Change Password</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
 						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="date01">Old Passowrd</label>
							  <div class="controls">
								<input type="password" name="password" class="input-xlarge" >
								  <?php echo '<span style="color:red">'.form_error('password').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">New Password</label>
							  <div class="controls">
								<input type="password" name="Npassword" class="input-xlarge"  >
								<?php echo '<span style="color:red">'.form_error('Npassword').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Confirm Password</label>
							  <div class="controls">
								<input type="password" name="Cpassword" class="input-xlarge" >
								<?php echo '<span style="color:red">'.form_error('Cpassword').'</span>';?>
							  </div>
							</div>
							      
							<div class="form-actions">
							  <button type="submit" name="btn_password" class="btn btn-primary">Save Password</button>
							  <a href="<?=base_url()?>dashboard/">
							  	<button type="button" class="btn">Cancel</button>
							  </a>							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->


			</div><!--/row-->
</div><!--/.fluid-container-->

		 

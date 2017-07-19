<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?=base_url()?>dashboard/">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<i class="icon-wrench"></i>
			<a>Website Settings</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<i class="icon-phone-sign"></i>
			<a>Contact Us</a>
		</li>
	</ul>

	 		
			
			
			 		
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
		 		
			<div class="row-fluid sortable">		
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="icon-phone-sign"></i><span class="break"></span>Update Contact Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php
	$result = $this->db->query("select * from tbl_contact_us WHERE id = '1'")->row();
	if($result)
	{
?>					
						<form  class="form-horizontal"    method="post">
						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="email_id">Email Id</label>
							  <div class="controls">
								<input type="text" name="email_id" class="input-xlarge" required=""	 value="<?=$result->email_id?>" >
								  <?php echo '<span style="color:red">'.form_error('email_id').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="phone_no">Phone No</label>
							  <div class="controls">
								<input type="text" name="phone_no" class="input-xlarge" required=""	value="<?=$result->phone_no?>" >
								  <?php echo '<span style="color:red">'.form_error('phone_no').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fax_no">Fax No</label>
							  <div class="controls">
								<input type="text" name="fax_no" class="input-xlarge" required=""	value="<?=$result->fax_no?>" >
								  <?php echo '<span style="color:red">'.form_error('fax_no').'</span>';?>
							  </div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="fax_no">Address</label>
							  <div class="controls">
							  	<textarea name="address" class="input-xlarge" required=""><?=$result->address?></textarea>
								<?php echo '<span style="color:red">'.form_error('address').'</span>';?>
							  </div>
							</div>
							
							 
							
							<div class="form-actions">
							
							    <button type="submit" name="btn_save_contact" class="btn btn-primary">Update Contact</button> 
							</div>
						  </fieldset>
						</form>   
<?php
	}
?>
					</div>
				</div>
			</div>

</div><!--/.content-->
	
		

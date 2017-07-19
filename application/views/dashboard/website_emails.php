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
			<i class="icon-envelope"></i>
			<a>Website Emails</a>
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
						<h2><i class="icon-envelope"></i><span class="break"></span>Update Website Emails</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php
	$result = $this->db->query("select * from tbl_website_email WHERE id = '1'")->row();
	if($result)
	{
?>					
						<form  class="form-horizontal" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="info_email">Info Email</label>
							  <div class="controls">
								<input type="text" name="info_email" class="input-xlarge" required=""	value="<?=$result->info_email?>" >
								  <?php echo '<span style="color:red">'.form_error('info_email').'</span>';?>
							  </div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="contact_email">Contact Email</label>
							  <div class="controls">
								<input type="text" name="contact_email" class="input-xlarge" required=""	 value="<?=$result->contact_email?>" >
								  <?php echo '<span style="color:red">'.form_error('contact_email').'</span>';?>
							  </div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="support_email">Support Email</label>
							  <div class="controls">
								<input type="text" name="support_email" class="input-xlarge" required=""	 value="<?=$result->support_email?>" >
								  <?php echo '<span style="color:red">'.form_error('support_email').'</span>';?>
							  </div>
							</div>
							 
							 
							<div class="form-actions">
							  <button type="submit" name="btn_save_website_email" class="btn btn-primary">Update Website Emails</button> 
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
	
		

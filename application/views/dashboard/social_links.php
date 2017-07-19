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
			<i class="icon-hand-right"></i>
			<a>Social Links</a>
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
						<h2><i class="icon-hand-right"></i><span class="break"></span>Update Social Links</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php
	$result = $this->db->query("select * from tbl_social_links WHERE id = '1'")->row();
	if($result)
	{
?>					
						<form  class="form-horizontal" method="post">
						  <fieldset>
							<div class="control-group">
							   <label class="control-label" for="fb_link">  Facebook</label>
							  <div class="controls">
								<input type="url" name="fb_link" class="input-xlarge"   value="<?=$result->fb_link?>" >
								<?php echo '<span style="color:red">'.form_error('fb_link').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							   <label class="control-label" for="tw_link">  Twiter</label>
							  <div class="controls">
								<input type="url" name="tw_link" class="input-xlarge"  value="<?=$result->tw_link?>" >
								<?php echo '<span style="color:red">'.form_error('tw_link').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							   <label class="control-label" for="g_link">  Google+</label>
							  <div class="controls">
								<input type="url" name="g_link" class="input-xlarge"   value="<?=$result->g_link?>" >
								<?php echo '<span style="color:red">'.form_error('g_link').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							   <label class="control-label" for="ln_link">  LinkedIn</label>
							  <div class="controls">
								<input type="url" name="ln_link" class="input-xlarge"  value="<?=$result->ln_link?>" >
								<?php echo '<span style="color:red">'.form_error('ln_link').'</span>';?>
							  </div>
							</div>
							
							 	 
							<div class="form-actions">
							  <button type="submit" name="btn_save_social_links" class="btn btn-primary">Update Website Emails</button> 
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
	
		

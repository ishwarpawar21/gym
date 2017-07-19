<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?=base_url()?>dashboard/">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<a>Locality</a>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Locality</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post">
 						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="locality_name">Enter New Locality</label>
							  <div class="controls">
								<input type="text" name="locality_name" class="input-xlarge" >
								  <?php echo '<span style="color:red">'.form_error('locality_name').'</span>';?>
							  </div>
							</div>
							
							<div class="form-actions">
							  <button type="submit" name="btn_save_locility" class="btn btn-primary">Save Locality</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon map-marker"></i><span class="break"></span>Manage Locality</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th width="80">Sr No</th>
								  <th>Locality</th>
								  <th width="100">Status</th>
								  <th width="150">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							      
							 
<?php
$num=1;
	$result=$this->db->query("select * from locality ORDER BY locality_name ASC");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>	
						<tr>
								<td><?=$num?></td>
								<td class="center"><?=$row->locality_name?></td>
								<td class="center">
<?php
if($row->status=="1")
{
?>									
									<span class="label label-success">Active</span>
<?php
}else
{ ?>
									<span class="label label-important">Inactive</span>
<?php }
?>
								</td>
								<td class="center">
									 
									<a class="btn btn-info btn-setting" onclick="updatefunc('<?=base64_encode($row->id)?>','<?=$row->locality_name?>')">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="<?=base_url()?>dashboard/localities?ch=del&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								
<?php
if($row->status=="1")
{
?>									
									<a class="btn btn-danger" style="background-color: #ff0000;border-color: #ff4646" title data-rel="tooltip" data-original-title="Make This Inactive" href="<?=base_url()?>dashboard/localities?ch=inact&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-down"></i>                          									</a>
<?php
}
else
{
?>
									<a class="btn btn-warning green" title data-rel="tooltip" data-original-title="Make This Active" href="<?=base_url()?>dashboard/localities?ch=act&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-up"></i>                          									</a>

<?php	
}
?>								</td>			
							</tr>
<?php
		$num++;}
		
	}
	
	
?>							
								
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

</div><!--/.content-->
	
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>Update Locality</h3>
		</div>
		<form class="form-horizontal" method="post">
		<input type="hidden" id="loc_id" name="loc_id" >
			<div class="modal-body">
					<fieldset>
						<div class="control-group">
						<label class="control-label" for="date01">Enter New Locality :</label>
							<div class="controls">
								<input type="text" name="locality_name" id="locality_name" class="input-xlarge" >
								<?php echo '<span style="color:red">'.form_error('locality_name').'</span>';?>
							</div>
						</div>
					</fieldset>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				 <button name="btn_update_locality" class="btn btn-primary" type="submit">Update Locality</button> 
			</div>
		</form>
	</div>
	<script>
		function updatefunc(id,locality_name)
		{
			document.getElementById('loc_id').value=id;
			document.getElementById('locality_name').value=locality_name;			
		}
	</script>	

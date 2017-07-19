<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?=base_url()?>dashboard/">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<img  src="<?=base_url()?>assets/dashboard/gym_gry.png" width="16" height="16"/>
			<a> Gyms</a>
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<a>Manage All Gyms</a>
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
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><img  src="<?=base_url()?>assets/dashboard/gym_blk.png" width="20" height="20"/> <span class="break"></span>Manage All Gym</h2>
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
								  <th>Gym Name</th>
								  <th>Locality</th>
								  <th width="100">Status</th>
								  <th width="150">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							      
							 
<?php
$num=1;
	$result=$this->db->query("select * from tbl_gym_details ORDER BY date_tyme desc");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>	
						<tr>
								<td><?=$num?></td>
								<td class="center"><?=$row->gym_title?></td>
								<td class="center"><?=$row->gym_locality?></td>
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
									 
									<!-- Edit gym details --> 
									<a class="btn btn-info" href="<?=base_url()?>dashboard/gym?page=gym-edit&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<!-- //Edit gym details -->
									
									<!-- Delete gym details --> 
									<a class="btn btn-danger" href="<?=base_url()?>dashboard/gym?ch=del&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white trash"></i> 
									</a>
									<!-- //Delete gym details --> 
									 
									 
									 <!-- Status gym details -->
<?php
if($row->status=="1")
{
?>									
									<a class="btn btn-danger" style="background-color: #ff0000;border-color: #ff4646" title data-rel="tooltip" data-original-title="Make This Inactive" href="<?=base_url()?>dashboard/gym?ch=inact&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-down"></i>                          									</a>
<?php
}
else
{
?>
									<a class="btn btn-warning green" title data-rel="tooltip" data-original-title="Make This Active" href="<?=base_url()?>dashboard/gym?ch=act&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-up"></i>                          									</a>

<?php	
}
?>								
 									<!-- //Status gym details -->
								</td>			
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
	
	 
	<script>
		function updatefunc(id,locality_name)
		{
			document.getElementById('loc_id').value=id;
			document.getElementById('locality_name').value=locality_name;			
		}
	</script>	

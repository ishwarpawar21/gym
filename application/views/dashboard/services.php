 
<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?=base_url()?>dashboard/">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<a >Service</a>
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
						<h2><i class="halflings-icon briefcase"></i><span class="break"></span>Add New Service</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form enctype="multipart/form-data" class="form-horizontal" id="Targetform"  method="post">
						<input type="hidden" name="btn_save_services" id="btn_save_services" required=""/>
 						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="service_name">Enter New Service</label>
							  <div class="controls">
								<input type="text" name="service_name" class="input-xlarge" required="" placeholder="Enter New Service">
								  <?php echo '<span style="color:red">'.form_error('service_name').'</span>';?>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="fileInput">Select Image (jpg Only)</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput"><input  class="input-file uniform_on" name="userfile" id="userfile" type="file"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div>
							  </div>
							</div>
							
							
							<div class="form-actions">
							
							    <button onclick="checkImg('userfile','720','480')" type="button" name="1btn_save_services" class="btn btn-primary">Save Service</button> 
							</div>
						  </fieldset>
						</form>   

					</div>
				</div>
			</div>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon briefcase"></i><span class="break"></span>Manage Service</h2>
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
								  <th>Service</th>
								  <th width="120">Image</th>
								  <th width="100">Status</th>
								  <th width="150">Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							      
							 
<?php
$num=1;
	$result=$this->db->query("select * from tbl_service ORDER BY service_name ASC");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>	
						<tr>
								<td><?=$num?></td>
								<td class="center"><?=$row->service_name?></td>
								<td width="150" class="center">
<?php
$img_path=FCPATH."assets/upload/service/".$row->id.".jpg";
	if(is_file($img_path))
	{
?>		       			
		       			<img src="<?=base_url()?>assets/upload/service/<?=$row->id?>.jpg"   width="150" height="150" alt=""/>
<?php
}
else
{
	echo "No Image Preview";
}
?>        									
								</td>
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
									 
									<a class="btn btn-info btn-setting" onclick="updatefunc('<?=base64_encode($row->id)?>',<?=$row->id?>,'<?=$row->service_name?>')"  title data-rel="tooltip" data-original-title="Update This activity">
										<i class="halflings-icon white edit"></i>                                            
									</a>
									<a class="btn btn-danger" href="<?=base_url()?>dashboard/services?ch=del&id=<?=base64_encode($row->id)?>" title data-rel="tooltip" data-original-title="Delete This activity" >
										<i class="halflings-icon white trash"></i> 
									</a>
<?php
if($row->status=="1")
{
?>									
									<a class="btn btn-info" style="background-color: #ff0000;border-color: #ff4646" title data-rel="tooltip" data-original-title="Make This Inactive" href="<?=base_url()?>dashboard/services?ch=inact&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-down"></i>                          								</a>
<?php
}
else
{
?>
									<a class="btn btn-warning green" title data-rel="tooltip" data-original-title="Make This Active" href="<?=base_url()?>dashboard/services?ch=act&id=<?=base64_encode($row->id)?>">
										<i class="halflings-icon white thumbs-up"></i>                          								</a>

<?php	
}
?>									
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
	
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>Update Service</h3>
		</div>
		<form enctype="multipart/form-data" class="form-horizontal" method="post">
		<input type="hidden" id="act_id" name="act_id" >
			<div class="modal-body">
					<fieldset>
						<div class="control-group">
						<label class="control-label" for="date01">Enter New Service :</label>
							<div class="controls">
								<input type="text" name="service_name" id="service_name" class="input-xlarge" >
								<?php echo '<span style="color:red">'.form_error('service_name').'</span>';?>
							</div>
						</div>
						
						<div class="control-group" id="image_data">
							  <label class="control-label" for="fileInput">Previous Image </label>
							  <div class="controls">
							  	<img name="userfile" id="userfile1"  width="200" height="200" src="../../1.jpg" />
							  </div>
						</div>
						
						<div class="control-group">
							  <label class="control-label" for="fileInput">Select Image (Jpg Only)</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput"><input  class="input-file uniform_on" name="userfile" id="userfile" type="file"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div>
							  </div>
						</div>
						
					</fieldset>
			</div>
			<div class="modal-footer">
			<input type="hidden" name="btn_update_activity" id="btn_update_activity" required=""/>
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				 <button onclick="checkImg('userfile','720','480')" name="1btn_update_activity" class="btn btn-primary" type="submit">Update Service</button> 
			</div>
		</form>
	</div>
	<script>
		function updatefunc(id,nm,service_name)
		{
			document.getElementById('act_id').value=id;
			document.getElementById('service_name').value=service_name;
			validateImageURL("../assets/upload/service/"+nm+".jpg");
		}
	 

function imageExists(url, callback) {
    var img = new Image();
    img.onload = function() { callback(true); };
    img.onerror = function() { callback(false); };
    img.src = url;
  }

  
  function validateImageURL(imageUrl)
    {
        imageExists(imageUrl, function(exists) {
        if(exists)
        {
        	document.getElementById('image_data').style.display="block";
        	document.getElementById('userfile1').src=imageUrl;
        }else
        {  document.getElementById('image_data').style.display="none";
           
		}
      });
      
    }
    

function checkImg(img,w,h)
{
 	 var nm='#'+img;
  var FileUploadPath = document.getElementById(img).value;

		if (FileUploadPath != "") 
		{
		        var file = $(nm)[0].files[0];
				var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
				var reader = new FileReader();
		        var img = new Image();
		        var _URL = window.URL || window.webkitURL;
		        reader.readAsDataURL(file);
				reader.onload = function(_file) 
				{
		        	img.src= _file.target.result;
		        	if(Extension != "jpg")
					{
						document.getElementById('btn_save_services').value="";
						document.getElementById('btn_update_activity').value="";
						alert('Select Image jpg only');	
					}else if(img.width==w||img.height==h)
					{
						document.getElementById('btn_save_services').value="1";
						document.getElementById('btn_update_activity').value="1";
			  			$('#Targetform').submit();
			  		}
					else
					{
						document.getElementById('btn_save_services').value="";
						document.getElementById('btn_update_activity').value="";
						alert('Select Image of '+w+' x '+h);	
					}
		        } 
       }
       else
       { 
       		document.getElementById('btn_save_services').value="1";
			document.getElementById('btn_update_activity').value="1";
			$('#Targetform').submit();	
	   }
	    	  
}
	</script>	
    
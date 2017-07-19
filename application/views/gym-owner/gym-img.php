	<?php

		$id="";
		$result=$this->db->query("select * from tbl_gym_details where gym_by='".$this->session->userdata('username')."'")->row();
		if($result)
		{
			$id=$result->id;
		}
	?>	
	<div class="destinations">
			<div class="destination-places">
				<div class="wrap">
						<div class="destination-places-head">
							<h3 align="center">Gym Images </h3>
						</div>
				<center>
<?php 
	if($this->session->userdata('error_msg'))
	{
		echo $this->session->userdata('error_msg');
		$this->session->unset_userdata('error_msg');
	}
?>
				</center>
				
					<div class="destination-places-grids">
						 
						 
				<h2 align="center" style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"> Uploaded Images </h2>

						 
						<table  style="margin: 0 auto">
							<tr>
<?php
for($i=1;$i<=5;$i++)
{
	$img_path=FCPATH.'assets/upload/gym_img/'.$id.'_'.$i.'.jpg';
	if(file_exists($img_path))
	{
?>
								<td align="center" style="width:150px">
									<img  src="<?=base_url()?>assets/upload/gym_img/<?=$id?>_<?=$i?>.jpg?tt=<?=time()?>" width="100" height="100"/><br/>
									<span>Image <?=$i?></span>
								</td>
								
<?php		
	}
}
?>							
								
							 </tr>
						</table>
					
			<h2 align="center" style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"> Select Images (jpg Only) </h2>			
						 	<form method="POST" enctype="multipart/form-data" id="update_frm" >
								<input name ="ids" type="hidden" value="<?=base64_encode($id)?>" />
						
								<table width="100%">
									<tr>
										<td style="text-align: right"> Gym Image 1 :  </td>
										<td> <input type="file"  style="margin: 20px"  name="files1" />  </td>
									</tr>
									
									<tr>
										<td style="text-align: right"> Gym Image 2 :  </td>
										<td> <input type="file"  style="margin: 20px"  name="files2" />  </td>
									</tr>
									
									<tr>
										<td style="text-align: right"> Gym Image 3 :  </td>
										<td> <input type="file"  style="margin: 20px"  name="files3" />  </td>
									</tr>
									
									<tr>
										<td style="text-align: right"> Gym Image 4 :  </td>
										<td> <input type="file"  style="margin: 20px"  name="files4" />  </td>
									</tr>
									
									<tr>
										<td style="text-align: right"> Gym Image 5 :  </td>
										<td> <input type="file"  style="margin: 20px"  name="files5" />  </td>
									</tr>
									
								</table>
						    	
						    	
						     
						   
      
       							<hr style="margin: 10px 30px"/>
						<table width="100%">
							<tr>
							<td width="280"></td> 
							<td>
								<input type="submit" name="btn_edit_gym_img" class="submit1" value="Update Gym Details" style="margin-left:30px; float:left ">
							</td>
					 		</tr>
					 	</table>
						</form>
					</div>
				</div>
			</div>
</div>
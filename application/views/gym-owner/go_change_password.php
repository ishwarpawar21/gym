 <style>
 	.setP p
 	{
		margin-left:10px;
		margin-top:10px;
		 
	}
 </style>
<!---start-destinatiuons---->
		<div class="destinations">
			 
			<div class="destination-places">
				<div class="wrap">
					<div class="destination-places-head">
						<h3 align="center">Update Password</h3>
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
						<div style="width: 100%;">
						<form method="post">
						    	 <table style="width:100%" >
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Old Password:</td>
						    			<td style="vertical-align: middle !important">
						    				<input type="password" name="Opassword" id="Opassword" class="text1 setwidth" placeholder="Old Password"  >
						    				<?php echo '<span  class="setP" style="color:red;font-size:12px;margin-left:10px;margin-top:10px;">'.form_error('Opassword').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">New Password:</td>
						    			<td style="vertical-align: middle !important"><input type="password" name="Npassword" class="text1 setwidth" placeholder="New Password"  >
						    				<?php echo '<br/><span  class="setP" style="color:red;font-size:12px;margin-left:10px;margin-top:10px;">'.form_error('Npassword').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Confirm New Password :</td>
						    			<td style="vertical-align: middle"><input type="password" name="Cpassword" class="text1 setwidth" placeholder="Confirm New Password"  >
						    				<?php echo '<span class="setP" style="color:red;font-size:12px;">'.form_error('Cpassword').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right"></td>
						    			<td><input type="submit" class="submit1" name="btn_edit_password" value="Update Password" style="margin-left: 10px" ></td>
						    		</tr>
						    		
						    		</table>
						    	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
 
	$result=$this->db->query("select * from tbl_gym_owner where email='".$this->session->userdata('username')."'")->row();
	if($result)
	{
		$f_name=$result->f_name;
		$l_name=$result->l_name;
		$ph_no=$result->ph_no;
		$mob_no=$result->mob_no;
		 
?>
	
<!---start-destinatiuons---->
		<div class="destinations">
			 
			<div class="destination-places">
				<div class="wrap">
					<div class="destination-places-head">
						<h3 align="center">Gym Owner Profile </h3>
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
						<form method="POST">
							<input type="hidden" name="id" value="<?=base64_encode($result->id)?>" />
						    	 <table style="width:100%" >
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">First Name :</td>
						    			<td>
						    				<input type="text" name="f_name" id="f_name" class="text1 setwidth" placeholder="Frist Name" value="<?=$f_name?>"  required="" >
						    				<?php echo '<span style="color:red;font-size:12px;">'.form_error('f_name').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Last Name :</td>
						    			<td><input type="text" class="text1 setwidth" name="l_name" id="l_name" placeholder="Last Name" value="<?=$l_name?>" >
						    				<?php echo '<span style="color:red;font-size:12px;">'.form_error('l_name').'</span>' ;?>
						    			</td>
						    			
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Phone No :</td>
						    			<td><input type="text" class="text1 setwidth" placeholder="Phone No"  name="ph_no" id="ph_no" placeholder="Last Name" value="<?=$ph_no?>"  >
						    				<?php echo '<span style="color:red;font-size:12px;">'.form_error('ph_no').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Mobile No:</td>
						    			<td><input type="text" class="text1 setwidth" placeholder="Mobile No"  name="mob_no" id="mob_no" placeholder="Last Name" value="<?=$mob_no?>"  >
						    				<?php echo '<span style="color:red;font-size:12px;">'.form_error('mob_no').'</span>' ;?>
						    			</td>
						    		</tr>
						    		
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right"></td>
						    			<td><input type="submit" class="submit1" name="btn_edit_profile"  value="Save Profile" style="margin-left: 10px"  >
						    				
						    			</td>
						    		</tr>
						    		
						    		 
						    		</table>
						    	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<?php
	}
?> 

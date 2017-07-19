		<!---start-contact---->
		<div class="contact" style="margin-bottom: 0px">
			
				<div class="contact-info">
				<div class="wrap">
					 <div class="contact-grids">
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Already Member, Login Here</h5>
								    <form method="post" >
							          <div class="contact-form">
										<div class="contact-to">
<?php
if($this->session->userdata('log_error_msg'))
{
	echo $this->session->userdata('log_error_msg');
}
?>										
											
										
					                     	<input type="text" class="text" name="email_id" placeholder="Email Id"  style="width: 100%">
					                     	
					                     	<input type="password" class="text" name="passwords" placeholder="Password" style="width: 100%;margin: 10px 0">
					                     	<div style="float: left;width: 100%;color:red;font-size:12px;">
					                    		<?php echo '<span>'.form_error('email_id').'</span>'; ?>	
					                    	</div>
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;">
					                    		<?php echo '<span>'.form_error('passwords').'</span>'; ?>	
					                    	</div>
										</div>
										<span><input type="submit" name="btn_logged_in" value="Login"></span>
						                <div class="clear"></div>
						               </div>
				           			</form>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1 div_width" >
								    <h5>Not A member, Register Your Gym Here</h5>
									
									<form method="post">
										 <div style="float:left;width: 100%">
						           			<input type="text" class="text1 setwidth" name="f_name" placeholder="First Name" value="<?=set_value('f_name')?>" >
					                     	<input type="text" class="text1 setwidth" name="l_name" placeholder="Last Name"  value="<?=set_value('l_name')?>" >
					                     	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('f_name').'</span>'; ?>	
					                    	</div>
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('l_name').'</span>'; ?>	
					                    	</div>
				                     	</div>
				                     	 <div style="float:left;width: 100%">
					                     	<span style="margin-left: 10px">Account Details</span><br/>
					                     	<input type="text" class="text1 setwidth" name="email" placeholder="Email Id"  value="<?=set_value('email')?>" >
					                     	<input type="password" class="text1 setwidth" name="password" placeholder="Password"  >
					                     	<input type="password" class="text1 setwidth" name="cpassword" placeholder="Confirm Password" > 	
					                    	
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('email').'</span>'; ?>	
					                    	</div>
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('password').'</span>'; ?>	
					                    	</div>
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('cpassword').'</span>'; ?>	
					                    	</div>
					                    </div>
					                    	
	
					                    
					                    
					                    <div style="float:left;width: 100%">
					                     	<span style="margin-left: 10px">Personal Details</span><br/>
					                     	<input type="text" class="text1 setwidth" name="ph_no" placeholder="Phone No"  value="<?=set_value('ph_no')?>" >
					                     	<input type="text" class="text1 setwidth" name="mob_no" placeholder="Mobile No"  value="<?=set_value('mob_no')?>" >
					                     	
					                     	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('ph_no').'</span>'; ?>	
					                    	</div>
					                    	<div style="float: left;width: 100%;color:red;font-size:12px;margin-left:10px">
					                    		<?php echo '<span>'.form_error('mob_no').'</span>'; ?>	
					                    	</div>
					                    </div>
					                    
					                    <div style="float:left;width: 100%;">
					                     	<span style="margin: 10px;font-size: 12px;">By clicking Register, you agree to our Terms. </span>
					                    </div>
				                    	<div style="float:left;width: 100%; margin: 10px">
					                     	<input type="submit" class="submit1" name="btn_save_gym_owner" value="Register" style="float:left ">
					                    </div>
				                    	 
				                    </form>
				                    
								</div>
								
								<div class="clear"></div>
					 </div>
					 	 
				</div>
			</div>
		</div>
		<!----//End-contact---->
		
  
    
     
	<link rel="stylesheet" href="<?=base_url()?>assets/site/css/bjqs.css" />
 	 <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css' /> 
 	 <link rel="stylesheet" href="<?=base_url()?>assets/site/css/demo.css" />
  	 <script src="<?=base_url()?>assets/site/js/jquery.min.js"></script>
     <script src="<?=base_url()?>assets/site/js/bjqs-1.3.min.js"></script>
     
<style>


.settbl 
{
	width: 90%;
	margin: 0 auto;
	font-size: 0.875em;
	color: #5D6E80;
}
	.settbl th
	{
		padding: 5px;
		font-weight: bold;
		background: #5D6E80;
		color: #fff;
		border: 1px solid #5D6E80;
	}
	.settbl td
	{
		padding-left: 10px;
		border: 1px solid #5D6E80;
	}

.settbl1 td
{
	width: 90%;
	margin: 0 auto;
	font-size: 0.875em;
	color: #5D6E80;
}	

ul.populars {
  padding: 1em 0 0;
}

.populars li {
display: inline-block;
width: 48%
}

.populars li a {
  color: #838383;
  font-size: 1em;
}
.populars li i {
  width: 17px;
  height: 17px;
  background: url(<?=base_url()?>assets/site/images/img-sprite.png)no-repeat -562px -40px;
  display: inline-block;
  vertical-align: middle;
  margin-right: 16px;
}
.settbl11 tr td
{
	color: #5D6E80;
	margin: 5px;
	padding: 4px;
	font-size: 14px;
}
</style>	
<!----start-find-place---->
		<div class="find-place">
			<div class="wrap">
				<div class="p-h">
					<span>FIND YOUR</span>
					<label>GYM</label>
				</div>
				<!---strat-date-piker---->
				  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
				  <script>
				  $(function() {
				    $( "#datepicker" ).datepicker();
				  });
				  </script>
				<!---/End-date-piker---->
				<div class="p-ww">
					<form>
						<span> Where</span>
						<input class="dest" type="text" value="Distination" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Distination';}">
						<span> Which</span>
						<input class="text"  type="text" value="Gym Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Gym Name';}">
						<input type="submit" value="Search" />
					</form>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		
		
		
		<div class="criuses" style="margin-top: 100px">
			
				<!----//End-find-place---->
				<!---start-criuse-grids----->
				<div class="criuse-main" style="padding-bottom: 10px">
					<div class="wrap">
						  					
						<div class="criuse-grids" id="valsx" >
							<div class="criuse-grid">
								<div class="criuse-grid-head">
									<div class="criuse-img">
										<div class="criuse-pic">
											
					       <div id="banner-slide" style="height: 320px; max-width: 100%;">
					 		  <ul class="bjqs">
<?php
$img_cnt=1;
	for($img_cnt=1;$img_cnt<6;$img_cnt++)
	{
		$img_path=FCPATH.'assets/upload/gym_img/'.$id.'_'.$img_cnt.'.jpg';
		if(file_exists($img_path))
		{
?>
			<li><img src="<?=base_url()?>assets/upload/gym_img/<?=$id?>_<?=$img_cnt?>.jpg?tt=<?=time()?>" ></li>
<?php			
		}
	}
?>					 		  
					          
					        </ul>
					      </div>
					      <script class="secret-source">
					        jQuery(document).ready(function($) {
					          
					          $('#banner-slide').bjqs({
					            animtype      : 'slide',
					            height        : 460,
					            width         : document.getElementById('valsx').offsetWidth,
					            responsive    : true,
					            randomstart   : true
					          });
					          
					        });
					      </script>
						<script src="js/libs/jquery.secret-source.min.js"></script>

    <script>
    jQuery(function($) {

        $('.secret-source').secretSource({
            includeTag: false
        });

    });
    </script>
						
										</div>
										<div class="criuse-pic-info">
												<div class="criuse-pic-info-top">
													<div class="criuse-pic-info-top-place-name">
														<h2><label><?=$gym_locality?></label><span><?=$gym_title?></span></h2>
													</div>
												</div>
												<div class="criuse-pic-info-price">
													<p><span>Starting Form</span> <h4> 
													<?php 
									$resultx=$this->db->query("select * from tbl_gym_fees_structure where id = '".$id."'")->row();
									if($resultx)
									{
										if($resultx->days>0)
										{
											echo "&#x20B9 ".$resultx->days;	
										}
										else
										if($resultx->weekly>0)
										{
											echo "&#x20B9 ".$resultx->weekly;	
										}
										else
										if($resultx->monthly>0)
										{
											echo "&#x20B9 ".$resultx->monthly;	
										}
										else
										if($resultx->quarterly>0)
										{
											echo "&#x20B9 ".$resultx->quarterly;	
										}
										else
										if($resultx->half_yearly>0)
										{
											echo "&#x20B9 ".$resultx->half_yearly;	
										}
										else
										if($resultx->yearly>0)
										{
											echo "&#x20B9 ".$resultx->yearly;	
										}
										else
										{
											echo "--";
										}
									}
									?>
													
													</h4></p>
												</div>
										</div>
									</div>
									<div class="criuse-info">
										<div class="criuse-info-left">
												<ul>
													<li><a class="c-hotel" href="#"><span> </span>
														<?=$gym_address?>
													 </a></li>
													<div class="clear"> </div>
												</ul>
											 
										</div>
										 
										<div class="clear"> </div>
									</div>
								</div>
								<div class="criuse-grid-info">
									<div class="blog-grid" style="padding-bottom: 10px;border-bottom: none">
									<h1 style="margin-left: 25px"><a href="#">Gym Timing</a></h1>
									<hr/>
<?php
	$result=$this->db->query("select * from tbl_gym_timing where id='".$id."'")->row();
	if($result)
	{
?>									
										<table class="settbl">
											<thead>
												<th>Days</th>
												<th>Morning</th>
												<th>Afternoon</th>
												<th>Evening</th>
											</thead>
											<tbody>
												<tr>
													<td>Sunday</td>
													<td align="center"> <?php if($result->sunday_MF!=NULL && $result->sunday_MT != NULL)
														{ echo $result->sunday_MF.' To '.$result->sunday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->sunday_AF!=NULL && $result->sunday_AT != NULL)
														{ echo $result->sunday_AF.' To '.$result->sunday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->sunday_EF!=NULL && $result->sunday_ET != NULL)
														{ echo $result->sunday_EF.' To '.$result->sunday_ET; }
														else { echo '--';} ?> </td>
														
												</tr>
												
												<tr>
													<td>Monday</td>
														<td align="center"> <?php if($result->monday_MF!=NULL && $result->monday_MT != NULL)
														{ echo $result->monday_MF.' To '.$result->monday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->monday_AF!=NULL && $result->monday_AT != NULL)
														{ echo $result->monday_AF.' To '.$result->monday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->monday_EF!=NULL && $result->monday_ET != NULL)
														{ echo $result->monday_EF.' To '.$result->monday_ET; }
														else { echo '--';} ?> </td>
												</tr>
												
												<tr>
													<td>Tuesday</td>
														<td align="center"> <?php if($result->tuesday_MF!=NULL && $result->tuesday_MT != NULL)
														{ echo $result->tuesday_MF.' To '.$result->tuesday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->tuesday_AF!=NULL && $result->tuesday_AT != NULL)
														{ echo $result->tuesday_AF.' To '.$result->tuesday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->tuesday_EF!=NULL && $result->tuesday_ET != NULL)
														{ echo $result->tuesday_EF.' To '.$result->tuesday_ET; }
														else { echo '--';} ?> </td>
												</tr>
												
												<tr>
													<td>Wednesday</td>
														<td align="center"> <?php if($result->wednesday_MF!=NULL && $result->wednesday_MT != NULL)
														{ echo $result->wednesday_MF.' To '.$result->wednesday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->wednesday_AF!=NULL && $result->wednesday_AT != NULL)
														{ echo $result->wednesday_AF.' To '.$result->wednesday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->wednesday_EF!=NULL && $result->wednesday_ET != NULL)
														{ echo $result->wednesday_EF.' To '.$result->wednesday_ET; }
														else { echo '--';} ?> </td>
												</tr>
												
												<tr>
													<td>Thursday</td>
														<td align="center"> <?php if($result->thursday_MF!=NULL && $result->thursday_MT != NULL)
														{ echo $result->thursday_MF.' To '.$result->thursday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->thursday_AF!=NULL && $result->thursday_AT != NULL)
														{ echo $result->thursday_AF.' To '.$result->thursday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->thursday_EF!=NULL && $result->thursday_ET != NULL)
														{ echo $result->thursday_EF.' To '.$result->thursday_ET; }
														else { echo '--';} ?> </td>
												</tr>
												
												<tr>
													<td>Friday</td>
														<td align="center"> <?php if($result->friday_MF!=NULL && $result->friday_MT != NULL)
														{ echo $result->friday_MF.' To '.$result->friday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->friday_AF!=NULL && $result->friday_AT != NULL)
														{ echo $result->friday_AF.' To '.$result->friday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->friday_EF!=NULL && $result->friday_ET != NULL)
														{ echo $result->friday_EF.' To '.$result->friday_ET; }
														else { echo '--';} ?> </td>
												</tr>
												
												<tr>
													<td>Saturday</td>
														<td align="center"> <?php if($result->saturday_MF!=NULL && $result->saturday_MT != NULL)
														{ echo $result->saturday_MF.' To '.$result->saturday_MT; }
														else { echo '--';} ?> </td>
														
													<td align="center"> <?php if($result->saturday_AF!=NULL && $result->saturday_AT != NULL)
														{ echo $result->saturday_AF.' To '.$result->saturday_AT; }
														else { echo '--';} ?> </td>
														
													<td align="center" > <?php if($result->saturday_EF!=NULL && $result->saturday_ET != NULL)
														{ echo $result->saturday_EF.' To '.$result->saturday_ET; }
														else { echo '--';} ?> </td>
												</tr>
											</tbody>
										</table>
<?php
}
?>										
									</div>
									
									<div class="blog-grid" style="padding-bottom: 10px;border-bottom: none">
										<h1 style="margin-left: 25px"><a href="#">Fees Structure</a></h1>
										<hr/>
<?php
	$result=$this->db->query("select * from tbl_gym_fees_structure where id='".$id."'")->row();
	if($result)
	{
?>

									
										<table class="settbl11" style="width: 90%;margin: 0 auto">
											<tr>
												<td align="left">Days</td>
												<td align="right"> <?php if($result->days != NULL) { echo '&#x20B9 '.$result->days.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											
											<tr>
												<td align="left">Weekly</td>
												<td align="right"> <?php if($result->weekly != NULL) { echo '&#x20B9 '.$result->weekly.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											
											<tr>
												<td align="left">Monthly</td>
												<td align="right"> <?php if($result->monthly != NULL) { echo '&#x20B9 '.$result->monthly.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											<tr>
												<td align="left">Quarterly</td>
												<td align="right"> <?php if($result->quarterly != NULL) { echo '&#x20B9 '.$result->quarterly.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											<tr>
												<td align="left">Half yearly</td>
												<td align="right"> <?php if($result->half_yearly != NULL) { echo '&#x20B9 '.$result->half_yearly.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											<tr>
												<td align="left">Yearly</td>
												<td align="right"> <?php if($result->yearly != NULL) { echo '&#x20B9 '.$result->yearly.' /-'; }else { echo "N/A"; } ?> </td>
											</tr>
											
										</table>
<?php		
	}
?>											
									</div> 
									
								</div>
								<div class="criuse-grid-info" >
									<div class="blog-grid" style="padding-bottom: 10px;border-bottom: none">
										<h1 style="margin-left: 25px"><a href="#">Activities</a></h1>
										<hr/>
										 
											<ul class="populars">
<?php
	$result=$this->db->query("select * from tbl_gym_activity where id='".$id."'");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>
			<li><a href="#"><i> </i><?=$row->activity_name?></a></li>
<?php			
		}
	}
	
?>											
											 
											</ul>
										 
										
									</div>
									
									<div class="blog-grid" style="padding-bottom: 10px;border-bottom: none">
										<h1 style="margin-left: 25px"><a href="#">Services</a></h1>
										<hr/>
										
											<ul class="populars">
<?php
	$result=$this->db->query("select * from tbl_gym_service where id='".$id."'");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>
			<li><a href="#"><i> </i><?=$row->service_name?></a></li>
<?php			
		}
	}
	
?>	
											</ul>
									 </div>
									
									
									
									
									<div class="clear"> </div>
								</div>
							</div>
							 
							
						</div>
						 
					</div>
				</div>
				<!---//End-criuse-grids----->
			</div>
			
			<div class="contact" style="margin-bottom:0px; padding-bottom:0px">
				<div class="wrap">
					<h1 style="color: #2C3E50;text-transform: uppercase;font-weight: 600;font-size: 1.5em;">Gym Location</h1>
				</div>
				<div class="contact-info">
					<div class="map" style="display: block">
					 	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?=base_url()?>application/views/gym-location.php?lat=<?=$gym_lat?>&lng=<?=$gym_lng?>"></iframe>
					 </div>
				</div>
			</div>
			
			
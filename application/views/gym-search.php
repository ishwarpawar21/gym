
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
<style>
	.links a,.links strong
	{
		  float: left;
		  padding: 4px 12px;
		  line-height: 20px;
		  text-decoration: none;
		  background-color: #fff;
		  border: 1px solid #ddd;
	}
	.links strong
	{
		background-color: #1DD2AF;
		border: 1px solid #1DD2AF;
		color: #fff;
	}
</style>
		<!----//End-find-place---->
		<div class="destination-places" style="margin-top: 0">
				<div class="wrap">
					<div class="destination-places-head">
						<h3>Gym Result </h3>
					 </div>
					
					<div class="destination-places-grids">
					
<?php
$num=1;
foreach($results as $row) {

?>

		<div class="destination-places-grid" <?php if($num%3==0) {echo 'style="margin-right:0px"';} ?> >
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
							<?php
								$img_path=FCPATH.'assets/upload/gym_img/'.$row->id.'_1_1.jpg';
								if(file_exists($img_path))
								{
							?>
									<a href="<?=base_url()?>site/gym_view?gym=<?=base64_encode($row->id)?>">
										<img src="<?=base_url()?>assets/upload/gym_img/<?=$row->id?>_1_1.jpg" title="<?=$row->gym_title?>" />
									</a>
							<?php			
								}
								else
								{
							?>
									<a href="<?=base_url()?>site/gym_view?gym=<?=base64_encode($row->id)?>">
										<img src="<?=base_url()?>assets/upload/gym_img/np.jpg" title="<?=$row->gym_title?>" />
									</a>
							<?php		
								}
							?>
								
								<a href="#" class="popup"> </a>
								<a href="#" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								 <ul class="dest-place-opt-cast">
									<li><a class="d-place" href="#"><?=$row->gym_title?></a></li>
									<li><a class="d-price" href="#"><?php 
									$resultx=$this->db->query("select * from tbl_gym_fees_structure where id = '".$row->id."'")->row();
									if($resultx)
									{
										if($resultx->days>0)
										{
											echo "From &#x20B9 ".$resultx->days;	
										}
										else
										if($resultx->weekly>0)
										{
											echo "From &#x20B9 ".$resultx->weekly;	
										}
										else
										if($resultx->monthly>0)
										{
											echo "From &#x20B9 ".$resultx->monthly;	
										}
										else
										if($resultx->quarterly>0)
										{
											echo "From &#x20B9 ".$resultx->quarterly;	
										}
										else
										if($resultx->half_yearly>0)
										{
											echo "From &#x20B9 ".$resultx->half_yearly;	
										}
										else
										if($resultx->yearly>0)
										{
											echo "From &#x20B9 ".$resultx->yearly;	
										}
									}
									?></a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
					
<?php  
$num++;  
}
?>					
			 			
						
						
						 
					
						 
						 
						<div class="clear"> </div>
					</div>
					
					<div class="links" >
						<?php echo $links; ?>
					</div>
				</div>
			</div>
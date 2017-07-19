<?php

	$lat='21.7679';
	$lng='78.8718';
	$gym_title="";
	$gym_address="";
	$gym_locality="";
	
	$result=$this->db->query("select * from tbl_gym_details where id='".base64_decode($_GET['id'])."'")->row();
	if($result)
	{
		$lat=$result->gym_lat;
		$lng=$result->gym_lng;
		$gym_title=$result->gym_title;
		$gym_address=$result->gym_address;
		$gym_locality=$result->gym_locality;
		
	}
	$days="";
	$weekly="";
	$monthly="";
	$quarterly="";
	$half_yearly="";
	$yearly="";
	
	
	$result=$this->db->query("select * from tbl_gym_fees_structure where id='".base64_decode($_GET['id'])."'")->row();
	if($result)
	{
		$days=$result->days;
		$weekly=$result->weekly;
		$monthly=$result->monthly;
		$quarterly=$result->quarterly;
		$half_yearly=$result->half_yearly;
		$yearly=$result->yearly;
		
	}
	
	
	$sunday_MF="";	$sunday_MT="";	$sunday_AF="";	$sunday_AT="";	$sunday_EF="";	$sunday_ET="";
	$monday_MF="";	$monday_MT="";	$monday_AF="";	$monday_AT="";	$monday_EF="";	$monday_ET="";
	$tuesday_MF="";	$tuesday_MT="";	$tuesday_AF="";	$tuesday_AT="";	$tuesday_EF="";	$tuesday_ET="";
	$wednesday_MF="";	$wednesday_MT="";	$wednesday_AF="";	$wednesday_AT="";	$wednesday_EF="";	$wednesday_ET="";
	$thursday_MF="";	$thursday_MT="";	$thursday_AF="";	$thursday_AT="";	$thursday_EF="";	$thursday_ET="";
	$friday_MF="";	$friday_MT="";	$friday_AF="";	$friday_AT="";	$friday_EF="";	$friday_ET="";
	$saturday_MF="";	$saturday_MT="";	$saturday_AF="";	$saturday_AT="";	$saturday_EF="";	$saturday_ET="";
	
	
	$result=$this->db->query("select * from tbl_gym_timing where id='".base64_decode($_GET['id'])."'")->row();
	if($result)
	{
		$sunday_MF=$result->sunday_MF;
		$sunday_MT=$result->sunday_MT;
		$sunday_AF=$result->sunday_AF;
		$sunday_AT=$result->sunday_AT;
		$sunday_EF=$result->sunday_EF;
		$sunday_ET=$result->sunday_ET;
		
		$monday_MF=$result->monday_MF;
		$monday_MT=$result->monday_MT;
		$monday_AF=$result->monday_AF;
		$monday_AT=$result->monday_AT;
		$monday_EF=$result->monday_EF;
		$monday_ET=$result->monday_ET;
		
		$tuesday_MF=$result->tuesday_MF;
		$tuesday_MT=$result->tuesday_MT;
		$tuesday_AF=$result->tuesday_AF;
		$tuesday_AT=$result->tuesday_AT;
		$tuesday_EF=$result->tuesday_EF;
		$tuesday_ET=$result->tuesday_ET;
		
		$wednesday_MF=$result->wednesday_MF;
		$wednesday_MT=$result->wednesday_MT;
		$wednesday_AF=$result->wednesday_AF;
		$wednesday_AT=$result->wednesday_AT;
		$wednesday_EF=$result->wednesday_EF;
		$wednesday_ET=$result->wednesday_ET;
		
		$thursday_MF=$result->thursday_MF;
		$thursday_MT=$result->thursday_MT;
		$thursday_AF=$result->thursday_AF;
		$thursday_AT=$result->thursday_AT;
		$thursday_EF=$result->thursday_EF;
		$thursday_ET=$result->thursday_ET;
		
		$friday_MF=$result->friday_MF;
		$friday_MT=$result->friday_MT;
		$friday_AF=$result->friday_AF;
		$friday_AT=$result->friday_AT;
		$friday_EF=$result->friday_EF;
		$friday_ET=$result->friday_ET;
		
		$saturday_MF=$result->saturday_MF;
		$saturday_MT=$result->saturday_MT;
		$saturday_AF=$result->saturday_AF;
		$saturday_AT=$result->saturday_AT;
		$saturday_EF=$result->saturday_EF;
		$saturday_ET=$result->saturday_ET;
		
	}
	 
	
?>
    <style type="text/css">
      #google_map {width: 550px; height: 350px;margin-top:10px;margin-left:auto;margin-right:auto;}
      .Mbtn {
  background: #2492FF;
  background-image: -webkit-linear-gradient(top, #2492FF, #2980b9);
  background-image: -moz-linear-gradient(top, #2492FF, #2980b9);
  background-image: -ms-linear-gradient(top, #2492FF, #2980b9);
  background-image: -o-linear-gradient(top, #2492FF, #2980b9);
  background-image: linear-gradient(to bottom, #2492FF, #2980b9);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Verdana, Geneva, sans-serif;
  color: #ffffff;
  font-size: 12px;
  padding: 5px 20px 5px 20px;
  text-decoration: none;
  border:none;
  cursor:pointer;
  font-weight:bold;
  
}

.Mbtn:hover {
  background: #FFAC59;
  background-image: -webkit-linear-gradient(top, #FFAC59, #FFAC59);
  background-image: -moz-linear-gradient(top, #FFAC59, #FFAC59);
  background-image: -ms-linear-gradient(top, #FFAC59, #FFAC59);
  background-image: -o-linear-gradient(top, #FFAC59, #FFAC59);
  background-image: linear-gradient(to bottom, #FFAC59, #FFAC59);
  text-decoration: none;
}
  </style>
  
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script type="text/javascript">


    var mapCenter = new google.maps.LatLng(<?=$lat?>,<?=$lng?>); //Google map Coordinates
      var map
	  var marker
      function initialize() //function initializes Google map
      {
        var googleMapOptions =
        {
            center: mapCenter, // map center
            zoom: 5, //zoom level, 0 = earth view to higher value
            panControl: true, //enable pan Control
            zoomControl: true, //enable zoom control
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL //zoom control size
             },
            scaleControl: true, // enable scale control
            mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
        };
        map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);
		
			// alert(mapCenter.lat());
			// alert(mapCenter.lng());
			 
			
      }

        function addMyMarker() {

   
			 //function that will add markers on button click
            marker = new google.maps.Marker({
                position:mapCenter,
                map: map,
                  draggable:true,
                  animation: google.maps.Animation.DROP,
                title:"This a new marker!",
              icon: "http://maps.google.com/mapfiles/ms/micons/blue.png"
            });
        	
		 google.maps.event.addListener(marker, 'dragend', function() 
                 {
                 
                    document.getElementById('txtLat').value=(marker.getPosition().lat());
                    document.getElementById('txtLng').value=(marker.getPosition().lng());
                   /* document.getElementById('locate').submit();*/
            });
			
		}
		
		 google.maps.event.addListener(map, 'click', function(event) {
    if (marker) {
    marker.setMap(null);    //code          
    }
      //creting info window instance
      var infowindow = new google.maps.InfoWindow({
      content: 'selected location'
  });
      //adding pointer click event to open infowindow
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  
  
			
  });
  
  alert();
 
    </script>  
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
			<a>Gyms</a> 
			<i class="icon-angle-right"></i>
		</li>
		
		<li>
			<i class="icon-file-alt"></i>
			<a>Add New Gym</a>
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
						<h2><img  src="<?=base_url()?>assets/dashboard/gym_blk.png" width="20" height="20"/> <span class="break"></span>Add New Gym</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
 				
						<form class="form-horizontal" enctype="multipart/form-data" method="post">
						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label" for="gym_title">Gym Title</label>
							  <div class="controls">
								<input type="text" name="gym_title" id="gym_title" required="" style="width: 70%" value="<?=$gym_title?>" />
								  <?php echo '<span style="color:red">'.form_error('gym_title').'</span>';?>
							  </div>
							</div>
							
							 <div class="control-group">
							  <label class="control-label" for="gym_address">Gym Address</label>
							  <div class="controls">
								<textarea class="cleditor" name="gym_address" id="textarea2" required="" rows="1" ><?=$gym_address?></textarea>
								<?php echo '<span style="color:red">'.form_error('gym_address').'</span>';?>
							  </div>
							</div>  
							
							<div class="control-group">
							  <label class="control-label" for="gym_locality">Gym Locality</label>
							  <div class="controls">
								<select style="min-width: 250px" name="gym_locality" required="">
									<option value>Select Location of your Gym</option>
<?php
	$result=$this->db->query("select * from locality WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>									
									<option value="<?=$row->locality_name?>"  <?php if($gym_locality==$row->locality_name) { echo 'selected=""' ; } ?> ><?=$row->locality_name?></option>
<?php
		}
	}
?>									
								</select>
								  <?php echo '<span style="color:red">'.form_error('gym_locality').'</span>';?>
							  </div>
							</div>
							
					
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Location </h2></div>
					<center>Drag Marker To Set Gym Location</center>
					
<script>
document.addEventListener("DOMContentLoaded", function() {
 initialize();addMyMarker();
});			
		</script>
					<div class="control-group" style="padding: 10px;">
						<div id="google_map" ></div>
						<input type="hidden" id="txtLat" name="gym_lat" value="<?=$lat?>" required=""/>    
       					 <input type="hidden" id="txtLng" name="gym_lng" value="<?=$lng?>" required=""/>
					</div>
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Fees Structure</h2></div>
							<div class="control-group">
								  <label class="control-label" for="days">Day</label>
								  <div class="controls">
									<input type="text" name="days" value="<?=$days?>" style="width: 200px" >
									  <?php echo '<span style="color:red">'.form_error('days').'</span>';?>
								  </div>
							</div>  
							
							<div class="control-group">
								  <label class="control-label" for="weekly">Weekly</label>
								  <div class="controls">
									<input type="text" name="weekly" value="<?=$weekly?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('weekly').'</span>';?>
								  </div>
							</div>
							
							<div class="control-group">
								  <label class="control-label" for="monthly">Monthly</label>
								  <div class="controls">
									<input type="text" name="monthly" value="<?=$monthly?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('monthly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="quarterly">Quarterly</label>
								  <div class="controls">
									<input type="text" name="quarterly" value="<?=$quarterly?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('quarterly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="half_yearly">Half yearly</label>
								  <div class="controls">
									<input type="text" name="half_yearly" value="<?=$half_yearly?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('half_yearly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="yearly">Yearly</label>
								  <div class="controls">
									<input type="text" name="yearly" value="<?=$yearly?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('yearly').'</span>';?>
								  </div>
							</div>   
							  
							
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Timing </h2></div>
					
					<table class="table table-bordered table-striped table-condensed" style="width: 80%;margin: 0 auto;">
							  <thead>
								  <tr>
									  <th>Days</th>
									  <th width="205" style="text-align: center">Morning</th>
									  <th width="205" style="text-align: center">Afternoon</th>
									  <th  width="205" style="text-align: center">Evening</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>Sunday</td>
									<td class="center">
									
										<select style="width: 100px" name="sunday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($sunday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($sunday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($sunday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($sunday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($sunday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($sunday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($sunday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($sunday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($sunday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($sunday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($sunday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($sunday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($sunday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($sunday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="sunday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($sunday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($sunday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($sunday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($sunday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($sunday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($sunday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($sunday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($sunday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($sunday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($sunday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($sunday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($sunday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($sunday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($sunday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="sunday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($sunday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($sunday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($sunday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($sunday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($sunday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($sunday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($sunday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($sunday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($sunday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($sunday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($sunday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($sunday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($sunday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($sunday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>
								    
								    
								    <tr>
									<td>Monday</td>
									<td class="center">
									
										<select style="width: 100px" name="monday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($monday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($monday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($monday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($monday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($monday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($monday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($monday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="monday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($monday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($monday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($monday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($monday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($monday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($monday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($monday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="monday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($monday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($monday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($monday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($monday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($monday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($monday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($monday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="monday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($monday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($monday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($monday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($monday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($monday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($monday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($monday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="monday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($monday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($monday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($monday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($monday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($monday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($monday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($monday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="monday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($monday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($monday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($monday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($monday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($monday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($monday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($monday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>
								
								<tr>
									<td>Tuesday</td>
									<td class="center">
									
										<select style="width: 100px" name="tuesday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($tuesday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($tuesday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($tuesday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($tuesday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($tuesday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($tuesday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($tuesday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($tuesday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($tuesday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($tuesday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($tuesday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($tuesday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($tuesday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($tuesday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="tuesday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($tuesday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($tuesday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($tuesday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($tuesday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($tuesday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($tuesday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($tuesday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($tuesday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($tuesday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($tuesday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($tuesday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($tuesday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($tuesday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($tuesday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="tuesday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($tuesday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($tuesday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($tuesday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($tuesday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($tuesday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($tuesday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($tuesday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($tuesday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($tuesday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($tuesday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($tuesday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($tuesday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($tuesday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($tuesday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>   
								
								<tr>
									<td>Wednesday</td>
									<td class="center">
									
										<select style="width: 100px" name="wednesday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($wednesday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($wednesday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($wednesday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($wednesday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($wednesday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($wednesday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($wednesday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($wednesday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($wednesday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($wednesday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($wednesday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($wednesday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($wednesday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($wednesday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="wednesday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($wednesday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($wednesday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($wednesday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($wednesday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($wednesday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($wednesday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($wednesday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($wednesday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($wednesday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($wednesday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($wednesday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($wednesday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($wednesday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($wednesday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="wednesday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($wednesday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($wednesday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($wednesday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($wednesday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($wednesday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($wednesday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($wednesday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($wednesday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($wednesday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($wednesday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($wednesday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($wednesday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($wednesday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($wednesday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>    
								
								<tr>
									<td>Thursday</td>
									<td class="center">
									
										<select style="width: 100px" name="thursday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($thursday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($thursday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($thursday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($thursday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($thursday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($thursday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($thursday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($thursday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($thursday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($thursday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($thursday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($thursday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($thursday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($thursday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="thursday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($thursday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($thursday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($thursday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($thursday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($thursday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($thursday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($thursday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($thursday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($thursday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($thursday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($thursday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($thursday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($thursday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($thursday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="thursday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($thursday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($thursday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($thursday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($thursday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($thursday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($thursday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($thursday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($thursday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($thursday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($thursday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($thursday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($thursday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($thursday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($thursday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr> 
								
								<tr>
									<td>Friday</td>
									<td class="center">
									
										<select style="width: 100px" name="friday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($friday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($friday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($friday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($friday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($friday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($friday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($friday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="friday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($friday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($friday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($friday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($friday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($friday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($friday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($friday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="friday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($friday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($friday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($friday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($friday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($friday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($friday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($friday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="friday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($friday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>											<option value="01:00"  <?php if($friday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($friday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($friday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($friday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($friday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($friday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="friday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($friday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($friday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($friday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($friday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($friday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($friday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($friday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="friday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($friday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($friday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($friday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($friday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($friday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($friday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($friday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>   
								
								<tr>
									<td>Saturday</td>
									<td class="center">
									
										<select style="width: 100px" name="saturday_MF">
											<option value>From</option>
											<option value="06:00" <?php if($saturday_MF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($saturday_MF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($saturday_MF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($saturday_MF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($saturday_MF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($saturday_MF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($saturday_MF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_MT">
											<option value>To</option>
											<option value="06:00" <?php if($saturday_MT=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if($saturday_MT=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if($saturday_MT=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if($saturday_MT=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if($saturday_MT=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if($saturday_MT=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if($saturday_MT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="saturday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if($saturday_AF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($saturday_AF=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($saturday_AF=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($saturday_AF=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($saturday_AF=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($saturday_AF=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($saturday_AF=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if($saturday_AT=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if($saturday_AT=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if($saturday_AT=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if($saturday_AT=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if($saturday_AT=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if($saturday_AT=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if($saturday_AT=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="saturday_EF">
											<option value>From</option>
											<option value="06:00" <?php if($saturday_EF=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($saturday_EF=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($saturday_EF=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($saturday_EF=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($saturday_EF=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($saturday_EF=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($saturday_EF=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_ET">
											<option value>To</option>
											<option value="06:00" <?php if($saturday_ET=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if($saturday_ET=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if($saturday_ET=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if($saturday_ET=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if($saturday_ET=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if($saturday_ET=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if($saturday_ET=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>                      
							  </tbody>
						 </table>
					 
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Activities </h2></div>
					
						
						<div class="control-group" style="padding: 10px;">
<?php
	$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>
							<div class="span3" style="text-align: left;margin-left:20px">
						<!--		  <img src="<?=base_url()?>assets/upload/activity/<?=$row->id?>.jpg" width="60" height="60"/> -->
								  <div style="margin: 5px 0px"><input type="checkbox" name="act_<?=$row->id?>" value="<?=$row->activity_name?>" style="width: 200px"
								  <?php
								   $q=$this->db->query("select * from tbl_gym_activity WHERE id ='".base64_decode($_GET['id'])."' and activity_name = '".$row->activity_name."'")->row();
								   if($q)
								   {
								   	echo 'checked=""';
								   }
								   ?>
								   
								  
								   ><?=$row->activity_name?>	</div>
							</div> 
<?php			
		}
	}
?>						
						 </div>
					
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Services </h2></div>
					
						
						<div class="control-group" style="padding: 10px;">
<?php
	$result=$this->db->query("select * from tbl_service WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			
?>
							<div class="span3" style="text-align: left;margin-left:20px">
						<!--		  <img src="<?=base_url()?>assets/upload/activity/<?=$row->id?>.jpg" width="60" height="60"/> -->
								  <div style="margin: 5px 0px"><input type="checkbox" name="service_<?=$row->id?>" value="<?=$row->service_name?>" style="width: 200px"  
								  <?php
								   $q=$this->db->query("select * from tbl_gym_service WHERE id ='".base64_decode($_GET['id'])."' and service_name = '".$row->service_name."'")->row();
								   if($q)
								   {
								   	echo 'checked=""';
								   }
								   ?> ><?=$row->service_name?>	</div>
							</div> 
<?php			
		}
	}
?>						
						 </div>
					
					
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Images </h2></div>
					
					<div class="span12" style="text-align: center;margin: 20px">
						 
							<h2 align="left" style="margin-left: 50px">Uploaded Images</h2>
<?php
for($i=1;$i<=5;$i++)
{
	$img_path=FCPATH.'assets/upload/gym_img/'.base64_decode($_GET['id']).'_'.$i.'.jpg';
	if(file_exists($img_path))
	{
?>
						<div class="span2">
								<img src="<?=base_url()?>assets/upload/gym_img/<?=base64_decode($_GET['id'])?>_<?=$i?>.jpg?tt=<?=time()?>" width="100" height="100" style="height: 100px"/>
								<br/> 
								<span>Image <?=$i?></span>
							</div>
<?php		
	}
}
?>							 
					 </div>
					
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 1</label>
							  <div class="controls">
							  	<input class="input-file uniform_on"  name="files1" id="fileInput" type="file">
							  </div>
							</div> 
							 
							 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 2</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="files2" id="fileInput" type="file">
							  </div>
							</div> 
							 
							 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 3</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="files3" id="fileInput" type="file">
							  </div>
							</div> 
							 
							 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 4</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="files4" id="fileInput" type="file">
							  </div>
							</div> 
							 
							 
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 5</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="files5" id="fileInput" type="file">
							  </div>
							</div> 
							 
							
							<div class="form-actions">
							    <button type="submit" name="btn_edit_gym_det" class="btn btn-primary">Save New Gym Details</button> 
							    <a href="<?=base_url()?>dashboard/gym?page=gym-manage">
							    	<button type="button" class="btn">Back</button>
							    </a>
							</div>
						  </fieldset>
						  <input type="hidden" name="id" value="<?=$_GET['id']?>" />
						</form>   
 
					</div>
				</div>
			</div>

</div><!--/.content-->
	
		

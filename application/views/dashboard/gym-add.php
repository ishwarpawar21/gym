
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


    var mapCenter = new google.maps.LatLng(21.7679,78.8718); //Google map Coordinates
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
								<input type="text" name="gym_title" id="gym_title" required="" style="width: 70%" value="<?=set_value('gym_title')?>" />
								  <?php echo '<span style="color:red">'.form_error('gym_title').'</span>';?>
							  </div>
							</div>
							
							 <div class="control-group">
							  <label class="control-label" for="gym_address">Gym Address</label>
							  <div class="controls">
								<textarea class="cleditor" name="gym_address" id="textarea2" required="" rows="1" ><?=set_value('gym_address')?></textarea>
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
									<option value="<?=$row->locality_name?>"  <?php if(set_value('gym_locality')==$row->locality_name) { echo 'selected=""' ; } ?> ><?=$row->locality_name?></option>
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
						<input type="hidden" id="txtLat" name="gym_lat" value="21.7679" required=""/>    
       					 <input type="hidden" id="txtLng" name="gym_lng" value="78.8718" required=""/>
					</div>
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Fees Structure</h2></div>
							<div class="control-group">
								  <label class="control-label" for="days">Day</label>
								  <div class="controls">
									<input type="text" name="days" value="<?=set_value('days')?>" style="width: 200px" >
									  <?php echo '<span style="color:red">'.form_error('days').'</span>';?>
								  </div>
							</div>  
							
							<div class="control-group">
								  <label class="control-label" for="weekly">Weekly</label>
								  <div class="controls">
									<input type="text" name="weekly" value="<?=set_value('weekly')?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('weekly').'</span>';?>
								  </div>
							</div>
							
							<div class="control-group">
								  <label class="control-label" for="monthly">Monthly</label>
								  <div class="controls">
									<input type="text" name="monthly" value="<?=set_value('monthly')?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('monthly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="quarterly">Quarterly</label>
								  <div class="controls">
									<input type="text" name="quarterly" value="<?=set_value('quarterly')?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('quarterly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="half_yearly">Half yearly</label>
								  <div class="controls">
									<input type="text" name="half_yearly" value="<?=set_value('half_yearly')?>" style="width: 200px" >
									<?php echo '<span style="color:red">'.form_error('half_yearly').'</span>';?>
								  </div>
							</div>   
							
							<div class="control-group">
								  <label class="control-label" for="yearly">Yearly</label>
								  <div class="controls">
									<input type="text" name="yearly" value="<?=set_value('yearly')?>" style="width: 200px" >
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
											<option value="06:00" <?php if(set_value('sunday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('sunday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('sunday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('sunday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('sunday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('sunday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('sunday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('sunday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('sunday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('sunday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('sunday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('sunday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('sunday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('sunday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="sunday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('sunday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('sunday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('sunday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('sunday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('sunday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('sunday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('sunday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('sunday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('sunday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('sunday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('sunday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('sunday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('sunday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('sunday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="sunday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('sunday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('sunday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('sunday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('sunday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('sunday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('sunday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('sunday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="sunday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('sunday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('sunday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('sunday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('sunday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('sunday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('sunday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('sunday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>
								    
								    
								    <tr>
									<td>Monday</td>
									<td class="center">
									
										<select style="width: 100px" name="monday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('monday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('monday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('monday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('monday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('monday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('monday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('monday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="monday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('monday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('monday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('monday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('monday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('monday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('monday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('monday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="monday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('monday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('monday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('monday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('monday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('monday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('monday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('monday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="monday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('monday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('monday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('monday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('monday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('monday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('monday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('monday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="monday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('monday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('monday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('monday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('monday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('monday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('monday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('monday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="monday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('monday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('monday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('monday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('monday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('monday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('monday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('monday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>
								
								<tr>
									<td>Tuesday</td>
									<td class="center">
									
										<select style="width: 100px" name="tuesday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('tuesday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('tuesday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('tuesday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('tuesday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('tuesday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('tuesday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('tuesday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('tuesday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('tuesday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('tuesday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('tuesday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('tuesday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('tuesday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('tuesday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="tuesday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('tuesday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('tuesday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('tuesday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('tuesday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('tuesday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('tuesday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('tuesday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('tuesday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('tuesday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('tuesday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('tuesday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('tuesday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('tuesday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('tuesday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="tuesday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('tuesday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('tuesday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('tuesday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('tuesday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('tuesday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('tuesday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('tuesday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="tuesday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('tuesday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('tuesday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('tuesday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('tuesday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('tuesday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('tuesday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('tuesday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>   
								
								<tr>
									<td>Wednesday</td>
									<td class="center">
									
										<select style="width: 100px" name="wednesday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('wednesday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('wednesday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('wednesday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('wednesday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('wednesday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('wednesday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('wednesday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('wednesday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('wednesday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('wednesday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('wednesday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('wednesday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('wednesday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('wednesday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="wednesday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('wednesday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('wednesday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('wednesday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('wednesday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('wednesday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('wednesday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('wednesday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('wednesday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('wednesday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('wednesday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('wednesday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('wednesday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('wednesday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('wednesday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="wednesday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('wednesday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('wednesday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('wednesday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('wednesday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('wednesday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('wednesday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('wednesday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="wednesday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('wednesday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('wednesday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('wednesday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('wednesday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('wednesday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('wednesday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('wednesday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>    
								
								<tr>
									<td>Thursday</td>
									<td class="center">
									
										<select style="width: 100px" name="thursday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('thursday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('thursday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('thursday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('thursday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('thursday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('thursday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('thursday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('thursday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('thursday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('thursday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('thursday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('thursday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('thursday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('thursday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="thursday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('thursday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('thursday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('thursday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('thursday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('thursday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('thursday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('thursday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('thursday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('thursday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('thursday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('thursday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('thursday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('thursday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('thursday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="thursday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('thursday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('thursday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('thursday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('thursday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('thursday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('thursday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('thursday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="thursday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('thursday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('thursday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('thursday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('thursday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('thursday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('thursday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('thursday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr> 
								
								<tr>
									<td>Friday</td>
									<td class="center">
									
										<select style="width: 100px" name="friday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('friday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('friday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('friday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('friday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('friday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('friday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('friday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="friday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('friday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('friday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('friday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('friday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('friday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('friday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('friday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="friday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('friday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('friday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('friday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('friday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('friday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('friday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('friday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="friday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('friday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('friday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('friday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('friday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('friday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('friday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('friday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="friday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('friday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('friday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('friday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('friday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('friday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('friday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('friday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="friday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('friday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('friday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('friday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('friday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('friday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('friday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('friday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>                                       
								</tr>   
								
								<tr>
									<td>Saturday</td>
									<td class="center">
									
										<select style="width: 100px" name="saturday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('saturday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('saturday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('saturday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('saturday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('saturday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('saturday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('saturday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_MT">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('saturday_MT')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('saturday_MT')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('saturday_MT')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('saturday_MT')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('saturday_MT')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('saturday_MT')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('saturday_MT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
									</td>
									<td class="center">
										<select style="width: 100px" name="saturday_AF">
											<option value>From</option>
											<option value="12:00"  <?php if(set_value('saturday_AF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('saturday_AF')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('saturday_AF')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('saturday_AF')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('saturday_AF')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('saturday_AF')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('saturday_AF')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_AT">
											<option value>To</option>
											<option value="12:00"  <?php if(set_value('saturday_AT')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
											<option value="01:00"  <?php if(set_value('saturday_AT')=='01:00') { echo 'selected=""' ; } ?>>01:00</option>
											<option value="02:00"  <?php if(set_value('saturday_AT')=='02:00') { echo 'selected=""' ; } ?>>02:00</option>
											<option value="03:00"  <?php if(set_value('saturday_AT')=='03:00') { echo 'selected=""' ; } ?>>03:00</option>
											<option value="04:00"  <?php if(set_value('saturday_AT')=='04:00') { echo 'selected=""' ; } ?>>04:00</option>
											<option value="05:00"  <?php if(set_value('saturday_AT')=='05:00') { echo 'selected=""' ; } ?>>05:00</option>
											<option value="06:00"  <?php if(set_value('saturday_AT')=='06:00') { echo 'selected=""' ; } ?>>06:00</option>
										</select>
										
									</td>
									<td class="center">
										<select style="width: 100px" name="saturday_EF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('saturday_EF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('saturday_EF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('saturday_EF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('saturday_EF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('saturday_EF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('saturday_EF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('saturday_EF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="width: 100px" name="saturday_ET">
											<option value>To</option>
											<option value="06:00" <?php if(set_value('saturday_ET')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00" <?php if(set_value('saturday_ET')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00" <?php if(set_value('saturday_ET')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00" <?php if(set_value('saturday_ET')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00" <?php if(set_value('saturday_ET')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00" <?php if(set_value('saturday_ET')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00" <?php if(set_value('saturday_ET')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
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
								  <div style="margin: 5px 0px"><input type="checkbox" name="act_<?=$row->id?>" value="<?=$row->activity_name?>" style="width: 200px" <?php if(set_value('act_'.$row->id)==$row->activity_name) { echo 'checked=""'; } ?> ><?=$row->activity_name?>	</div>
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
								  <div style="margin: 5px 0px"><input type="checkbox" name="service_<?=$row->id?>" value="<?=$row->service_name?>" style="width: 200px"  <?php if(set_value('service_'.$row->id)==$row->service_name) { echo 'checked=""'; } ?> ><?=$row->service_name?>	</div>
							</div> 
<?php			
		}
	}
?>						
						 </div>
					
					
					
					
					<div class="box-header" style="margin: 5px 30px"><h2> Gym Images </h2></div>
					
							<div class="control-group">
							  <label class="control-label" for="fileInput">Gym Image 1</label>
							  <div class="controls">
							  	<input class="input-file uniform_on" required="" name="files1" id="fileInput" type="file">
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
							    <button type="submit" name="btn_save_gym_det" class="btn btn-primary">Save New Gym Details</button> 
							</div>
						  </fieldset>
						</form>   
 
					</div>
				</div>
			</div>

</div><!--/.content-->
	
		

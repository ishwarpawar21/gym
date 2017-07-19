
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
   
    </script>  
    
<!---start-destinatiuons---->
		<div class="destinations">
			<div class="destination-places">
				<div class="wrap">
				
					<div class="destination-places-head">
						<h3 align="center">Gym Details </h3>
					</div>
					
					<center>
					<?php 
						if($this->session->userdata('error_msg'))
						{
							echo $this->session->userdata('error_msg');
						}
					?>
					</center>
				
					<div class="destination-places-grids">
					
					<form method="post"  enctype="multipart/form-data">
					
					 <div style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"><h2> Gym Information   </h2></div>
					 
							<div style="float:left;width: 100%;">
						    	 <table style="width:100%" >
						    		<tr>
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Title :</td>
						    			<td><input type="text"  name="gym_title" id="gym_title" class="text1 setwidth" placeholder="Frist Name"  value="<?=set_value('gym_title')?>" >
						    				<?php echo '<span style="color:red">'.form_error('gym_title').'</span>';?>
						    			</td>
						    		</tr>
						    		<tr>
						    			<td style="vertical-align:middle !important;" align="right">Gym Address :</td>
						    			<td>
						    				<textarea class="text1 setwidth" name="gym_address" id="gym_address" placeholder="Gym Address"></textarea>
						    				<?php echo '<span style="color:red">'.form_error('gym_address').'</span>';?>
						    				
						    			</td>
						    		</tr>

						    		<tr valign="top">
						    			<td style="vertical-align:middle !important;" align="right">Gym Locality :</td>
						    			<td>
						    				<select class="text1 setwidth" name="gym_locality" required="">
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
						    			</td>
						    		</tr>
 							</table>

<div style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"><h2> Gym Location </h2></div>

<script>
document.addEventListener("DOMContentLoaded", function() {
 initialize();addMyMarker();
});			
		</script> 
		
				<table style="width:100%" >
					<tr>
							<td>
							<div>
								<div id="google_map" ></div>
								<input type="hidden" id="txtLat" name="gym_lat" value="21.7679" required=""/>    
       						 	<input type="hidden" id="txtLng" name="gym_lng" value="78.8718" required=""/>
							</div>
						</td>
					</tr>
					
				 
				</table>	
						 <div style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"><h2> Fees Structure </h2></div>
							<table style="width:100%" >
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Day : </td>
						    			<td>
						    				<input type="text" class="text1" name="days" value="<?=set_value('days')?>" style="width: 200px" >
									  		<?php echo '<span style="color:red">'.form_error('days').'</span>';?>
									  	</td>
						    		</tr>
						    		
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Weekly : </td>
						    			<td>
						    				<input type="text" name="weekly"class="text1" value="<?=set_value('weekly')?>" style="width: 200px" >
											<?php echo '<span style="color:red">'.form_error('weekly').'</span>';?>
									  	</td>
						    		</tr>
						    		 
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Monthly : </td>
						    			<td>
						    				<input type="text" name="monthly" class="text1" value="<?=set_value('monthly')?>" style="width: 200px" >
											<?php echo '<span style="color:red">'.form_error('monthly').'</span>';?>
									  	</td>
						    		</tr>
						    		
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Quarterly : </td>
						    			<td>
						    				<input type="text" name="quarterly" class="text1" value="<?=set_value('quarterly')?>" style="width: 200px" >
											<?php echo '<span style="color:red">'.form_error('quarterly').'</span>';?>
									  	</td>
						    		</tr>
						    		
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Half yearly : </td>
						    			<td>
						    				<input type="text" name="half_yearly" class="text1" value="<?=set_value('half_yearly')?>" style="width: 200px" >
											<?php echo '<span style="color:red">'.form_error('half_yearly').'</span>';?>
									  	</td>
						    		</tr>
						    		
						    		<tr valign="top">
						    			<td style=" vertical-align:middle !important;width:30% !important;" align="right">Yearly : </td>
						    			<td>
						    				<input type="text" name="yearly" class="text1" value="<?=set_value('yearly')?>" style="width: 200px" >
											<?php echo '<span style="color:red">'.form_error('yearly').'</span>';?>
									  	</td>
						    		</tr>
						    		
						    	</table>
						    	
						    	
						    	 <div style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"><h2> Gym Timing   </h2></div>
						    	 
						    	 
						    	 <table class="table" style="width: 80%;margin: 0 auto;">
							  <thead>
								  <tr style="background: #7F91A2;color: #fff">
									  <th style="padding: 10px;margin:5px 0px; font-weight:bold">Days</th>
									  <th width="205" style="text-align: center;font-weight:bold">Morning</th>
									  <th width="205" style="text-align: center;font-weight:bold">Afternoon</th>
									  <th width="205" style="text-align: center;font-weight:bold">Evening</th>                                          
								  </tr>
							  </thead>   
							  <tbody >
								<tr>
									<td style="vertical-align: middle;margin-top: 10px !important"><strong>Sunday</strong></td>
									<td class="center">
									
										<select style="margin-top:10px; width: 100px" name="sunday_MF">
											<option value>From</option>
											<option value="06:00" <?php if(set_value('sunday_MF')=='06:00') { echo 'selected=""' ; } ?> >06:00</option>
											<option value="07:00"  <?php if(set_value('sunday_MF')=='07:00') { echo 'selected=""' ; } ?> >07:00</option>
											<option value="08:00"  <?php if(set_value('sunday_MF')=='08:00') { echo 'selected=""' ; } ?> >08:00</option>
											<option value="09:00"  <?php if(set_value('sunday_MF')=='09:00') { echo 'selected=""' ; } ?> >09:00</option>
											<option value="10:00"  <?php if(set_value('sunday_MF')=='10:00') { echo 'selected=""' ; } ?> >10:00</option>
											<option value="11:00"  <?php if(set_value('sunday_MF')=='11:00') { echo 'selected=""' ; } ?> >11:00</option>
											<option value="12:00"  <?php if(set_value('sunday_MF')=='12:00') { echo 'selected=""' ; } ?> >12:00</option>
										</select>
										
										<select style="margin-top:10px;width: 100px" name="sunday_MT">
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
									<td style="vertical-align: middle">Monday</td>
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
									<td style="vertical-align: middle">Tuesday</td>
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
									<td style="vertical-align: middle">Wednesday</td>
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
									<td style="vertical-align: middle">Thursday</td>
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
									<td  style="vertical-align: middle">Friday</td>
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
									<td style="vertical-align: middle">Saturday</td>
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
<div style="width: 100%;float: left"">
						 
				<h2 style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"> Gym Activities </h2>
				<div style="width: 100%; display: block !important;float: left"">
<?php
	$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
	$num=3;
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			 
			
?>
					 		<div style="margin:5px 50px; width: 200px;float: left">
								<input type="checkbox" name="act_<?=$row->id?>" value="<?=$row->activity_name?>"  <?php if(set_value('act_'.$row->id)==$row->activity_name) { echo 'checked=""'; } ?> >
								 <?=$row->activity_name?>
					  		</div>
<?php			
			 
			$num++;
		}
	}
?>						
				</div> 
</div>



<div style="width: 100%;float: left"">
						 
				<h2 style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"> Gym Activities </h2>
				<div style="width: 100%; display: block !important;float: left"">
<?php
	$result=$this->db->query("select * from tbl_service WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
?>
							<div style="margin:5px 50px; width: 200px;float: left">
						<!--		  <img src="<?=base_url()?>assets/upload/activity/<?=$row->id?>.jpg" width="60" height="60"/> -->
								   <input type="checkbox" name="service_<?=$row->id?>" value="<?=$row->service_name?>" <?php if(set_value('service_'.$row->id)==$row->service_name) { echo 'checked=""'; } ?> ><?=$row->service_name?>	
							</div> 
<?php			
		}
	}
?>							
				</div> 
</div>
				
				
				   

<div style="width: 100%;float: left"">
						 
				<h2 style="margin: 5px 30px;background: #eee;font-size: 16px;padding:10px; line-height: 16px;"> Gym Activities </h2>

						<table style="width: 100%">
							<tr style="padding: 10px">
						    	<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Image 1 : </td>
						    	<td> <input class="input-file uniform_on" style="margin: 20px" name="files1" id="fileInput" type="file"></td>
						    </tr>
						    
						    <tr style="padding: 10px">
						    	<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Image 2 : </td>
						    	<td> <input class="input-file uniform_on" style="margin: 20px" name="files2" id="fileInput" type="file"></td>
						    </tr>
						    
						     <tr style="padding: 10px">
						    	<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Image 3 : </td>
						    	<td> <input class="input-file uniform_on" style="margin: 20px" name="files3" id="fileInput" type="file"></td>
						    </tr>
						    
						    <tr style="padding: 10px">
						    	<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Image 4 : </td>
						    	<td> <input class="input-file uniform_on" style="margin: 20px" name="files4" id="fileInput" type="file"></td>
						    </tr>
						    
						    <tr style="padding: 10px">
						    	<td style=" vertical-align:middle !important;width:30% !important;" align="right">Gym Image 5 : </td>
						    	<td> <input class="input-file uniform_on" style="margin: 20px" name="files5" id="fileInput" type="file"></td>
						    </tr>
						    
						   
						</table>
     
</div>						 
						 
						 <hr style="margin: 10px 30px"/>
					 <input type="submit" name="btn_save_gym_details" class="submit1" value="Save Gym Details" style="margin-left:30px; float:left ">
						 
					        </div>
				            
				           
					</form>
					
						<div class="clear"> </div>
					</div>
				</div>
			</div>
			<!---start-destinations-pagenation---->
				 
			<!---//End-destinations-pagenation---->
			<!---loading-more-script--->
			<!---//loading-more-script--->
		</div>
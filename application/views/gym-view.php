		<link rel="stylesheet" href="<?=base_url()?>assets/site/css/bjqs.css">
 	 <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 
 	 <link rel="stylesheet" href="<?=base_url()?>assets/site/css/demo.css">
  	 <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     <script src="<?=base_url()?>assets/site/js/bjqs-1.3.min.js"></script>

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
		
		
		
		<div class="criuses">
			<div class="criuses-head">
				 
			</div>
				<!----//End-find-place---->
				<!---start-criuse-grids----->
				<div class="criuse-main">
					<div class="wrap">
						<div class="criuse-head1">
							<h3 style="color: #1DD2AF;padding: 5px 0">CHEAPEST Criuse</h3>
						</div>
						
						<div  style="height: 500px">
							
					       <div id="banner-slide">
					 		  <ul class="bjqs">
					          <li><a href=""><img src="<?=base_url()?>assets/site/images/img/banner01.jpg" title="Automatically generated caption"></a></li>
					          <li><img src="<?=base_url()?>assets/site/images/img/banner02.jpg" title="Automatically generated caption"></li>
					          <li><img src="<?=base_url()?>assets/site/images/img/banner03.jpg" title="Automatically generated caption"></li>
					        </ul>
					      </div>
					      <script class="secret-source">
					        jQuery(document).ready(function($) {
					          
					          $('#banner-slide').bjqs({
					            animtype      : 'slide',
					            height        : 320,
					            width         : 620,
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
						
						<div class="criuse-grids">
							<div class="criuse-grid">
								<div class="criuse-grid-head">
									<div class="criuse-img">
										<div class="criuse-pic">
											<img src="<?=base_url()?>assets/site/images/s1.jpg" title="criuse-name" />
										</div>
										<div class="criuse-pic-info">
												<div class="criuse-pic-info-top">
													<div class="criuse-pic-info-top-place-name">
														<h2><label>Spain</label><span>BARCELONA</span></h2>
													</div>
												</div>
												<div class="criuse-pic-info-price">
													<p><span>Starting Form</span> <h4>250 $</h4></p>
												</div>
										</div>
									</div>
									<div class="criuse-info">
										<div class="criuse-info-left">
											<ul>
												<li><a class="c-hotel" href="#"><span> </span>6 Nights VIp/Luurious hotel </a></li>
												<li><a class="c-air" href="#"><span> </span> Return Air Ticket</a></li>
												<li><a class="c-fast" href="#"><span> </span> Complimentry beark fast</a></li>
												<li><a class="c-car" href="#"><span> </span> Car for All transfers</a></li>
												<div class="clear"> </div>
											</ul>
										</div>
										<div class="criuse-info-right">
											<ul>
												<li><a class="c-face" href="#"><span> </span> </a></li>
												<li><a class="c-twit" href="#"><span> </span> </a></li>
												<li><a class="c-tub" href="#"><span> </span> </a></li>
												<li><a class="c-pin" href="#"><span> </span> </a></li>
											</ul>
										</div>
										<div class="clear"> </div>
									</div>
								</div>
								<div class="criuse-grid-info">
									<h1><a href="#">Lorem Ipsum is typesetting industry</a></h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
									<a class="btn" href="#">DeTails</a>
								</div>
							</div>
							 
							
						</div>
						 
					</div>
				</div>
				<!---//End-criuse-grids----->
			</div>
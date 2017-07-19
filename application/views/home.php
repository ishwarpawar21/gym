

		<!----start-images-slider---->
		<div class="<?=base_url()?>assets/site/images-slider">
			<!-- start slider -->
		    <div id="fwslider">
		        <div class="slider_container">
		            <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="<?=base_url()?>assets/site/images/slider-bg.jpg" alt=""/>
		                <!-- /Slide image -->
		                <!-- Texts container -->
		                <div class="slide_content">
		                    <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title">FITNESS MADE SIMPLE</h4>
		                        <!-- /Text title -->
		                        <!-- Text description -->
		                        <p class="description">Find the best gyms in your locality | Currently only in Delhi-NCR.</p>
		                        <!-- /Text description -->
		                         
		                    </div>
		                </div>
		                 <!-- /Texts container -->
		            </div>
		            <!-- /Duplicate to create more slides -->
		            <div class="slide">
		                <img src="<?=base_url()?>assets/site/images/slider-bg.jpg" alt=""/>
		                <div class="slide_content">
		                     <div class="slide_content_wrap">
		                        <!-- Text title -->
		                        <h4 class="title">FITNESS MADE SIMPLE</h4>
		                        <!-- /Text title -->
		                        <!-- Text description -->
		                        <p class="description">Find the best gyms in your locality | Currently only in Delhi-NCR.</p>
		                        <!-- /Text description -->
		                         
		                    </div>
		                </div>
		            </div>
		            <!--/slide -->
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
		    </div>
		    <!--/slider -->
		</div>
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
		<!----//End-find-place---->
		 <div class="destination-places" style="margin-top: 0">
				<div class="wrap">
					<div class="destination-places-head">
						<h3>Popular Gym </h3>
					</div>
					<div class="destination-places-grids">
			 			<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="<?=base_url()?>assets/site/images/d1.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="#" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								 <ul class="dest-place-opt-cast">
									<li><a class="d-place" href="#">Golds Gym</a></li>
									<li><a class="d-price" href="#">Starting Form 800</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="<?=base_url()?>assets/site/images/d2.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="#" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								 
								 <ul class="dest-place-opt-cast">
									<li><a class="d-place" href="#">Golds Gym</a></li>
									<li><a class="d-price" href="#">Starting Form 800</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid last-d-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="<?=base_url()?>assets/site/images/d3.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="#" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								 <ul class="dest-place-opt-cast">
									<li><a class="d-place" href="#">Golds Gym</a></li>
									<li><a class="d-price" href="#">Starting Form 800</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
			</div>
		<!----start-clients---->
		<div class="clients">
			<div class="client-head">
				<h3>Happy Clients</h3>
				<span>what customer say about us and why love our services!</span>
			</div>
			<div class="client-grids">
				<ul class="bxslider">
				  <li>
				  	<p>Lorem Ipsum is simply dummy text of the printing and typeset industry. Lorem Ipsum has been the industry's standard dummy text ever hen an with new version look.</p>
				  	<a href="#">Client Name</a>
				  	<span>United States</span>
				  	<label> </label>
				  </li>
				  <li>
				  	<p>Lorem Ipsum is simply dummy text of the printing and typeset industry. Lorem Ipsum has been the industry's standard dummy text ever hen an with new version look.</p>
				  	<a href="#">Client Name</a>
				  	<span>United States</span>
				  	<label> </label>
				  </li>
				  <li>
				  	<p>Lorem Ipsum is simply dummy text of the printing and typeset industry. Lorem Ipsum has been the industry's standard dummy text ever hen an with new version look.</p>
				  	<a href="#">Client Name</a>
				  	<span>United States</span>
				  	<label> </label>
				  </li>
				  <li>
				  	<p>Lorem Ipsum is simply dummy text of the printing and typeset industry. Lorem Ipsum has been the industry's standard dummy text ever hen an with new version look.</p>
				  	<a href="#">Client Name</a>
				  	<span>United States</span>
				  	<label> </label>
				  </li>
				  <li>
				  	<p>Lorem Ipsum is simply dummy text of the printing and typeset industry. Lorem Ipsum has been the industry's standard dummy text ever hen an with new version look.</p>
				  	<a href="#">Client Name</a>
				  	<span>United States</span>
				  	<label> </label>
				  </li>
				</ul>
			</div>
		</div>
		<!----//End-clients---->
		<!----start-footer---->
		
		<!----//End-footer---->
		

<!DOCTYPE HTML>
<html>
	<head>
		<title><?=$pege_header?> </title>
		<link href="<?=base_url()?>assets/site/css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="<?=base_url()?>assets/site/js/jquery.min.js"></script>
		<!---script---->
		<link rel="stylesheet" href="<?=base_url()?>assets/site/css/jquery.bxslider.css" type="text/css" />
		<script src="<?=base_url()?>assets/site/js/jquery.bxslider.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.bxslider').bxSlider({
						 auto: true,
 						 autoControls: true,
						 minSlides: 4,
						 maxSlides: 4,
						 slideWidth:450,
						 slideMargin: 10
					});
				});
			</script>
		<!---//script---->
		<!---smoth-scrlling---->
			<script type="text/javascript">
				$(document).ready(function(){
									$('a[href^="#"]').on('click',function (e) {
									    e.preventDefault();
									    var target = this.hash,
									    $target = $(target);
									    $('html, body').stop().animate({
									        'scrollTop': $target.offset().top
									    }, 1000, 'swing', function () {
									        window.location.hash = target;
									    });
									});
								});
				</script>
		<!---//smoth-scrlling---->
		<!----start-top-nav-script---->
		<script type="text/javascript" src="<?=base_url()?>assets/site/js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!----//End-top-nav-script---->
		<!---webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---webfonts---->
		<!--start slider -->
	    <link rel="stylesheet" href="<?=base_url()?>assets/site/css/fwslider.css" media="all">
		<script src="<?=base_url()?>assets/site/js/jquery-ui.min.js"></script>
		<script src="<?=base_url()?>assets/site/js/css3-mediaqueries.js"></script>
		<script src="<?=base_url()?>assets/site/js/fwslider.js"></script>
		<!--end slider -->
		<!---calender-style---->
		<link rel="stylesheet" href="<?=base_url()?>assets/site/css/jquery-ui.css" />
		<!---//calender-style---->
	</head>
	<body>
		<!----start-wrap---->
			<!----start-top-header----->
			<div class="top-header" id="header">
				<div class="wrap">
				<div class="top-header-left">
					<ul>
<?php
if($this->session->userdata('is_logged_in'))
{
?>
						<li><a href="<?=base_url()?>gym_owner/"><span> </span><?=($this->session->userdata('f_name').' '.$this->session->userdata('l_name'))?></a></li>
<?php
}else
{
?>
						<li><a href="<?=base_url()?>site/gym_owner_login"><span> </span>Gym Login</a></li>
						<li><p><span> </span>Not a Member ? </p>&nbsp;<a class="reg" style="color: #1DD2AF" href="<?=base_url()?>site/gym_owner_login"> Register Your Gym</a></li>
<?php	
}

?>						
						
						
						
						
						<li><p class="contact-info">Call Us Now : <?php
							$result=$this->db->query("select phone_no from tbl_contact_us WHERE id = '1'")->row();
							if($result)
							{ echo $result->phone_no; }
						?></p></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="top-header-right">
					<ul>
						<li><a class="face" href="#"><span> </span></a></li>
						<li><a class="twit" href="#"><span> </span></a></li>
						<li><a class="thum" href="#"><span> </span></a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
			<!----//End-top-header----->
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!--- start-logo---->
				<div class="logo">
					<a href="index.html"><img src="<?=base_url()?>assets/site/images/logo.png" title="voyage" /></a>
				</div>
				<!--- //End-logo---->
				<!--- start-top-nav---->
				<div class="top-nav" >
						<ul class="flexy-menu thick orange" style="float: right; margin-right: 0;">
						
							 
							<li <?php if(current_url()==(base_url().'site/gym_view')){echo'style="float:left"';}?>  <?php if(current_url()==base_url()){echo'class="active"';}?> ><a href="<?=base_url()?>">Home</a></li>
							<li <?php if(current_url()==(base_url().'site/gym_view')){echo'style="float:left"';}?> <?php if(current_url()==base_url().'site/gym'){echo'class="active"';}?> ><a href="<?=base_url()?>site/gym">Gym</a></li>
							<li <?php if(current_url()==(base_url().'site/gym_view')){echo'style="float:left"';}?> <?php if(current_url()==base_url().'site/about_us'){echo'class="active"';}?> ><a href="<?=base_url()?>site/about_us">ABout Us</a></li>
							<li <?php if(current_url()==(base_url().'site/gym_view')){echo'style="float:left"';}?> <?php if(current_url()==base_url().'site/contact_us'){echo'class="active"';}?> ><a href="<?=base_url()?>site/contact_us">Contact Us</a></li>
							
							
							
							
						</ul>
						 
						<!----search-scripts---->
						<script src="<?=base_url()?>assets/site/js/modernizr.custom.js"></script>
						<script src="<?=base_url()?>assets/site/js/classie.js"></script>
						<script src="<?=base_url()?>assets/site/js/uisearch.js"></script>
						 
						<!----//search-scripts---->
				</div>
				<!--- //End-top-nav---->
				<div class="clear"> </div>
			</div>
			<!---//End-header---->
		</div>
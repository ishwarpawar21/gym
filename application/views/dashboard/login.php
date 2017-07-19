<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?=$page_title?></title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?=base_url()?>assets/dashboard/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/dashboard/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?=base_url()?>assets/dashboard/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?=base_url()?>assets/dashboard/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/dashboard/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(<?=base_url()?>assets/dashboard/img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					 
					<h2 align="center" style=" font-family: 'Open Sans'; font-size: 18px;font-weight: bold;">Login to your account</h2>
					
<?php
	if($this->session->userdata('d_login_error'))
	{
		echo "<center style='color:red;font-size:12px;'>".$this->session->userdata('d_login_error')."</center>";
		$this->session->unset_userdata('d_login_error');
	}
?>						
					
					<form class="form-horizontal" method="post">
					
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="type username"/>
								
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

							<div class="button-login">	
								<button type="submit" name="btn_login" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
<!--					
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>	
-->				
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="<?=base_url()?>assets/dashboard/js/jquery-1.9.1.min.js"></script>
	<script src="<?=base_url()?>assets/dashboard/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="<?=base_url()?>assets/dashboard/js/jquery-ui-1.10.0.custom.min.js"></script>
	 
		 
		 
	 
		 
		<script src="<?=base_url()?>assets/dashboard/js/jquery.uniform.min.js"></script>
		 	<script src="<?=base_url()?>assets/dashboard/js/jquery.cleditor.min.js"></script>
	 	<script src="<?=base_url()?>assets/dashboard/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>

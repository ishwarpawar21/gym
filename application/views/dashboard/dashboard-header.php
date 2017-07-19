<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?=$page_header?></title>
	<meta name="description" content="Gym Website">
	<meta name="author" content="<?=$this->session->userdata('admin_name')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="<?=base_url()?>assets/dashboard/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/dashboard/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?=base_url()?>assets/dashboard/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?=base_url()?>assets/dashboard/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?=base_url()?>assets/dashboard/img/favicon.ico">
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Gym Website</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?=$this->session->userdata('admin_fname').' '.$this->session->userdata('admin_lname')?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="<?=base_url()?>dashboard/admin_profile"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="<?=base_url()?>dashboard/d_logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
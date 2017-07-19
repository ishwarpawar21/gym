<style>
.table select
{
	padding: 5px;
	font-family: "Open Sans",sans-serif;
  	border: 1px solid rgba(192, 192, 192, 0.61);
  	color: #626262;
  	background: #FFF none repeat scroll 0% 0%;
	  float: left;
	  outline: medium none;
	  font-size: 0.85em;
	  transition: border-color 0.3s ease 0s;
	  box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.05);
	  border-radius: 4px;
}
.account_menu ul li a
{
		  color: #FFF;
		  transition: 0.5s all;
		  -webkit-transition: 0.5s all;
		  -moz-transition: 0.5s all;
		  -o-transition: 0.5s all;
		  font-size: 1em;
		  margin-left: 10px;
 		 margin-right: 10px;
}
.account_menu ul 
{
     list-style: none;
 	 margin: 0px;
  	 padding: 0px;
}
.account_menu ul li 
{
  display: inline-block;
}
.account_menu ul li span
{
  color: #fff;
}
	 
      #google_map {width: 70%; height: 350px;margin-top:10px;margin-left:auto;margin-right:auto;}
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
  
<div class="destinations">
			<div class="destination-head" >
				<div class="wrap account_menu">
					
					<ul>
						<li><a href="<?=base_url()?>gym_owner/go_acc">Gym Details</a><span>|</span></li>
						<li><a href="<?=base_url()?>gym_owner/go_acc?pg=<?=base64_encode('gym-img')?>">Gym Images</a><span>|</span></li>
						<li><a href="<?=base_url()?>gym_owner/go_acc?pg=<?=base64_encode('go_profle')?>">Update Owner Profile</a><span>|</span></li>
						<li><a href="<?=base_url()?>gym_owner/go_acc?pg=<?=base64_encode('go_change_password')?>">Change Password</a><span>|</span></li>
						<li><a href="<?=base_url()?>gym_owner/go_acc?pg=<?=base64_encode('logout')?>">Logout</a></li>
						<div class="clear"> </div>
					</ul>
					
				</div>
			</div>
			 
</div>
<?php
	if(isset($_GET['pg']))
	{
		$pg=base64_decode($_GET['pg']);
		if($pg=="logout")
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		$this->load->view('gym-owner/'.$pg);
	}else
	{
		$result=$this->db->query("select * from tbl_gym_details where gym_by = '".$this->session->userdata('username')."'")->row();
		if($result)
		{
			$this->load->view('gym-owner/gym-edit');
		}
		else
		{
			$this->load->view('gym-owner/gym-add');	
		}
		
	}
?>


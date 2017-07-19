<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	
	public function __construct() {
		parent::__construct();
		 $this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('common_model');
		$this->check_login();
		 $this->website_name="Raj Gym Website ";
	}
	
	public function index()
	{
		//print_r($this->session->userdata('admin_settings'));
		$this->wd();
	}
	public function check_login()
	{
		if($this->session->userdata('admin_logged_in')!='1')
		{
			$this->session->set_userdata('d_login_error',"Please Enter your username and password.");
			redirect(base_url().'login/d_login');
		}
		
	}
	
	/**
	* page name wd= welcome dashboard 
	* 
	* @return
	*/
	public function wd()
	{
		$data['page_header']="Dashboard Home | " . $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/home');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function d_logout() 
	{
		$this->session->sess_destroy();
		redirect(base_url().'login/d_login');		
	}
	
	public function admin_profile()
	{
		if(isset($_POST['btn_save']))
		{
			$this->form_validation->set_rules('fname','First Name','required|xss_clean|trim');
			$this->form_validation->set_rules('lname','Last Name','required|xss_clean|trim');
			$this->form_validation->set_rules('username','Account Email','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				$data_field=array(
					'username'=>$_POST['username'],
					'fname'=>$_POST['fname'],
					'lname'=>$_POST['lname']
				);
				$result=$this->common_model->update_records('tlb_admin_profile',$data_field,'username','1');
				if($result)
				{
					$this->session->set_userdata('error_msg','Admin Details Updated Sucessfully..');
					$this->session->set_userdata('error_cls','success');
				}
				else
				{
					$this->session->set_userdata('error_msg','Error occurred, Try again...');
					$this->session->set_userdata('error_cls','error');
				}
					redirect(base_url().'dashboard/admin_profile');
			}
			
		}
		else
		if(isset($_POST['btn_password']))
		{
			$this->form_validation->set_rules('password','Old Password','required|xss_clean|trim');
			$this->form_validation->set_rules('Npassword','New Password','min_length[4]|max_length[10]|required|xss_clean|trim');
			$this->form_validation->set_rules('Cpassword','Confirm Password','matches[Npassword]|required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if(($_POST['password'])!=$this->session->userdata('admin_password'))
				{
					$this->session->set_userdata('error_msg','Please enter correct previous password');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
					$data_field=array(
						'password'=>md5($_POST['Npassword']),
					);
					$result=$this->common_model->update_records('tlb_admin_profile',$data_field,'username',$this->session->userdata('admin_username'));
					if($result)
					{
						$this->session->set_userdata('admin_password',$_POST['Npassword']);
						$this->session->set_userdata('admin_logged_in','1');
					
						$this->session->set_userdata('error_msg','Account Password Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
					redirect(base_url().'dashboard/admin_profile');
			}
			
		}
		$data['page_header']="Admin Profile | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/admin-profile');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function localities()
	{
		if(isset($_POST['btn_save_locility']))
		{
			
			$this->form_validation->set_rules('locality_name','Locality','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from locality WHERE locality_name = '".$_POST['locality_name']."'")->row())
				{
					$this->session->set_userdata('error_msg','Unable To Add, Locality Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
					$maxid=0;
					$maxid=$this->common_model->search_maxid('locality');
					
					$data_field=array('id'=>$maxid,'locality_name'=>$_POST['locality_name']);
					$result=$this->common_model->insert_records('locality',$data_field);
					if($result)
					{
						$this->session->set_userdata('error_msg','New Locality Added Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
				redirect(base_url().'dashboard/localities');
			}
		}
		else
		if(isset($_POST['btn_update_locality']))
		{
			$this->form_validation->set_rules('locality_name','Locality','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from locality WHERE locality_name = '".$_POST['locality_name']."'")->row())
				{
					$this->session->set_userdata('error_msg','Unable To Add, Locality Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
				
					$data_field=array(
						'locality_name'=>$_POST['locality_name']
					);
					$result=$this->common_model->update_records('locality',$data_field,'id',base64_decode($_POST['loc_id']));
					if($result)
					{
						$this->session->set_userdata('error_msg','Locality Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
					redirect(base_url().'dashboard/localities');
			}
			
		}
		else
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='del')
			{
				$result=$this->common_model->deleteRecords('locality',base64_decode($_GET[id]));
				if($result)
					{
						$this->session->set_userdata('error_msg','Locality Deleted Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			
			else if($_GET['ch']=='act')
			{
				$result=$this->common_model->updateStatus('locality',base64_decode($_GET[id]),'1');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='inact')
			{
				$result=$this->common_model->updateStatus('locality',base64_decode($_GET['id']),'0');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			redirect(base_url().'dashboard/localities');
		}
		
		$data['page_header']="Manage Localities | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/localities');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	
	
	public function activities()
	{
		if(isset($_POST['btn_save_activity']))
		{
			$this->form_validation->set_rules('activity_name','Activity','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from tlb_activity WHERE activity_name = '".$_POST['activity_name']."'")->row())
				{
					$this->session->set_userdata('error_msg','Unable To Add, Activity Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
					$maxid=$this->common_model->search_maxid('tlb_activity');
					
					$data_field=array('id'=>$maxid,'activity_name'=>$_POST['activity_name']);
					$result=$this->common_model->insert_records('tlb_activity',$data_field);
					$config=array(
						'upload_path' => 'assets/upload/activity',
						'allowed_types' => 'jpg',
						'file_name'=> $maxid.'.jpg',
						'overwrite'=> True
					);
								
					$this->load->library('upload',$config);
					$this->upload->do_upload();
					//print_r($this->upload->data());
					//exit;
				
					if($result)
					{
						$this->session->set_userdata('error_msg','New Activity Added Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
				redirect(base_url().'dashboard/activities');
			}
		}
		else
		if(isset($_POST['btn_update_activity']))
		{
			$this->form_validation->set_rules('activity_name','Activity','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from tlb_activity WHERE id <> '".base64_decode($_POST['act_id'])."' and activity_name = '".$_POST['activity_name']."'")->row())
				{
				
					$this->session->set_userdata('error_msg','Unable To Add, Activity Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
				
					$data_field=array(
						'activity_name'=>$_POST['activity_name']
					);
					$result=$this->common_model->update_records('tlb_activity',$data_field,'id',base64_decode($_POST['act_id']));
					if($result)
					{
						$config=array(
						'upload_path' => 'assets/upload/activity',
						'allowed_types' => 'jpg',
						'file_name'=> base64_decode($_POST['act_id']).'.jpg',
						'overwrite'=> True
					);
								
					$this->load->library('upload',$config);
					$this->upload->do_upload();
					
						$this->session->set_userdata('error_msg','Activity Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
					redirect(base_url().'dashboard/activities');
			}
			
		}
		else
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='del')
			{
				$result=$this->common_model->deleteRecords('tlb_activity',base64_decode($_GET['id']));
				if($result)
					{
						$img_path=FCPATH."assets/upload/activity/".base64_decode($_GET['id']).".jpg";
						unlink($img_path);
						$this->session->set_userdata('error_msg','Activity Deleted Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='act')
			{
				$result=$this->common_model->updateStatus('tlb_activity',base64_decode($_GET['id']),'1');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='inact')
			{
				$result=$this->common_model->updateStatus('tlb_activity',base64_decode($_GET['id']),'0');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			redirect(base_url().'dashboard/activities');
		}
		
		$data['page_header']="Manage Activities | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/activities');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	
	
	
	
	public function services()
	{
		if(isset($_POST['btn_save_services']))
		{			
			$this->form_validation->set_rules('service_name','Service','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from tbl_service WHERE service_name = '".$_POST['service_name']."'")->row())
				{
					$this->session->set_userdata('error_msg','Unable To Add, Service Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
					$maxid=$this->common_model->search_maxid('tbl_service');
					$data_field=array('id'=>$maxid,'service_name'=>$_POST['service_name']);
					$result=$this->common_model->insert_records('tbl_service',$data_field);
					$config=array(
						'upload_path' => 'assets/upload/service',
						'allowed_types' => 'jpg',
						'file_name'=> $maxid.'.jpg',
						'overwrite'=> True
					);
								
					$this->load->library('upload',$config);
					$this->upload->do_upload();
					//print_r($this->upload->data());
					//exit;
				
					if($result)
					{
						$this->session->set_userdata('error_msg','New Service Added Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
				redirect(base_url().'dashboard/services');
			}
		}
		else
		if(isset($_POST['btn_update_activity']))
		{
			$this->form_validation->set_rules('service_name','Service','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				if($this->db->query("select * from tbl_service WHERE id <> '".base64_decode($_POST['act_id'])."' and service_name = '".$_POST['service_name']."'")->row())
				{
				
					$this->session->set_userdata('error_msg','Unable To Add, Service Already Availble...');
					$this->session->set_userdata('error_cls','error');
				}
				else
				{
				 	$data_field=array(
						'service_name'=>$_POST['service_name']
					);
					$result=$this->common_model->update_records('tbl_service',$data_field,'id',base64_decode($_POST['act_id']));
					if($result)
					{
						$config=array(
						'upload_path' => 'assets/upload/service',
						'allowed_types' => 'jpg',
						'file_name'=> base64_decode($_POST['act_id']).'.jpg',
						'overwrite'=> True
					);
								
					$this->load->library('upload',$config);
					$this->upload->do_upload();
					
						$this->session->set_userdata('error_msg','Service Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				}
					redirect(base_url().'dashboard/services');
			}
		}
		else
		if(isset($_GET['ch']))
		{
			if($_GET['ch']=='del')
			{
				$result=$this->common_model->deleteRecords('tbl_service',base64_decode($_GET[id]));
				if($result)
					{
						$img_path=FCPATH."assets/upload/service/".base64_decode($_GET[id]).".jpg";
						unlink($img_path);
						$this->session->set_userdata('error_msg','Service Deleted Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='act')
			{
				$result=$this->common_model->updateStatus('tbl_service',base64_decode($_GET[id]),'1');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='inact')
			{
				$result=$this->common_model->updateStatus('tbl_service',base64_decode($_GET['id']),'0');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			redirect(base_url().'dashboard/services');
		}
		
		$data['page_header']="Manage Services | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/services');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function contact_us()
	{
		if(isset($_POST['btn_save_contact']))
		{
			$this->form_validation->set_rules('email_id','Email Id','required|xss_clean|trim');
			$this->form_validation->set_rules('phone_no','Phone No','required|xss_clean|trim');
			$this->form_validation->set_rules('fax_no','Fax No','required|xss_clean|trim');
			$this->form_validation->set_rules('address','Address','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				$data_field=array(
						'email_id'=>$_POST['email_id'],
						'phone_no'=>$_POST['phone_no'],
						'fax_no'=>$_POST['fax_no'],
						'address'=>$_POST['address']
				);
				$result=$this->common_model->update_records('tbl_contact_us',$data_field,'id','1');
				if($result)
				{
				 
						$this->session->set_userdata('error_msg','Service Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				redirect(base_url().'dashboard/contact_us/');
					
			}
			
		}
		$data['page_header']="Manage Services | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/contact_us');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function website_emails()
	{
		
		
		if(isset($_POST['btn_save_website_email']))
		{
			$this->form_validation->set_rules('info_email','Info Email','required|valid_email|trim');
			$this->form_validation->set_rules('contact_email','Contact Email','required|valid_email|trim');
			$this->form_validation->set_rules('support_email','Support Email','required|trim|valid_email');
			
			if($this->form_validation->run())
			{
				$data_field=array(
						'info_email'=>$_POST['info_email'],
						'contact_email'=>$_POST['contact_email'],
						'support_email'=>$_POST['support_email'],
				);
					$result=$this->common_model->update_records('tbl_website_email',$data_field,'id','1');
					if($result)
					{
					 	$this->session->set_userdata('error_msg','Website Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				redirect(base_url().'dashboard/website_emails/');
					
			}
			
		}
		$data['page_header']="Website Settings | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/website_emails');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	
	
	public function social_links()
	{
	  	if(isset($_POST['btn_save_social_links']))
		{
			$this->form_validation->set_rules('fb_link','Facebook Link','prep_url|trim');
			$this->form_validation->set_rules('tw_link','Twitter Link','prep_url|trim');
			$this->form_validation->set_rules('g_link','Google+ Link','trim|prep_url');
			$this->form_validation->set_rules('ln_link','LinkedIn Link','trim|prep_url');
			
			if($this->form_validation->run())
			{
				$data_field=array(
						'fb_link'=>$_POST['fb_link'],
						'tw_link'=>$_POST['tw_link'],
						'g_link'=>$_POST['g_link'],
						'ln_link'=>$_POST['ln_link'],
				);
					$result=$this->common_model->update_records('tbl_social_links',$data_field,'id','1');
					if($result)
					{
					 	$this->session->set_userdata('error_msg','Social Links Updated Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
				redirect(base_url().'dashboard/social_links/');
					
			}
			
		}
		$data['page_header']="Website Settings | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/social_links');
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function gym()
	{
		$page="gym-add";
		if(isset($_GET['page']))
		{$page=$_GET['page'];}
		
		if(isset($_POST['btn_save_gym_det']))
		{
			$this->form_validation->set_rules('gym_title','Gym Title','required|xss_clean');
			$this->form_validation->set_rules('gym_address','Gym Address','required|xss_clean');
			$this->form_validation->set_rules('gym_locality','Gym Locality','required|xss_clean');
			$this->form_validation->set_rules('days','Days Fees','required|xss_clean');
			$this->form_validation->set_rules('weekly','Weekly Fees','required|xss_clean');
			$this->form_validation->set_rules('monthly','Monthly Fees','required|xss_clean');
			$this->form_validation->set_rules('quarterly','Quarterly Fees','required|xss_clean');
			$this->form_validation->set_rules('half_yearly','Half Yearly Fees','required|xss_clean');
			$this->form_validation->set_rules('yearly','Yearly Fees','required|xss_clean');
			
			$this->form_validation->set_rules('sunday_MF','','xss_clean');
			$this->form_validation->set_rules('sunday_MT','','xss_clean');
			$this->form_validation->set_rules('sunday_AF','','xss_clean');
			$this->form_validation->set_rules('sunday_AT','','xss_clean');
			$this->form_validation->set_rules('sunday_EF','','xss_clean');
			$this->form_validation->set_rules('sunday_ET','','xss_clean');
			$this->form_validation->set_rules('monday_MF','','xss_clean');
			$this->form_validation->set_rules('monday_MT','','xss_clean');
			$this->form_validation->set_rules('monday_AF','','xss_clean');
			$this->form_validation->set_rules('monday_AT','','xss_clean');
			$this->form_validation->set_rules('monday_EF','','xss_clean');
			$this->form_validation->set_rules('monday_ET','','xss_clean');
			$this->form_validation->set_rules('tuesday_MF','','xss_clean');
			$this->form_validation->set_rules('tuesday_MT','','xss_clean');
			$this->form_validation->set_rules('tuesday_AF','','xss_clean');
			$this->form_validation->set_rules('tuesday_AT','','xss_clean');
			$this->form_validation->set_rules('tuesday_EF','','xss_clean');
			$this->form_validation->set_rules('tuesday_ET','','xss_clean');
			$this->form_validation->set_rules('wednesday_MF','','xss_clean');
			$this->form_validation->set_rules('wednesday_MT','','xss_clean');
			$this->form_validation->set_rules('wednesday_AF','','xss_clean');
			$this->form_validation->set_rules('wednesday_AT','','xss_clean');
			$this->form_validation->set_rules('wednesday_EF','','xss_clean');
			$this->form_validation->set_rules('wednesday_ET','','xss_clean');
			$this->form_validation->set_rules('thursday_MF','','xss_clean');
			$this->form_validation->set_rules('thursday_MT','','xss_clean');
			$this->form_validation->set_rules('thursday_AF','','xss_clean');
			$this->form_validation->set_rules('thursday_AT','','xss_clean');
			$this->form_validation->set_rules('thursday_EF','','xss_clean');
			$this->form_validation->set_rules('thursday_ET','','xss_clean');
			$this->form_validation->set_rules('friday_MF','','xss_clean');
			$this->form_validation->set_rules('friday_MT','','xss_clean');
			$this->form_validation->set_rules('friday_AF','','xss_clean');
			$this->form_validation->set_rules('friday_AT','','xss_clean');
			$this->form_validation->set_rules('friday_EF','','xss_clean');
			$this->form_validation->set_rules('friday_ET','','xss_clean');
			$this->form_validation->set_rules('saturday_MF','','xss_clean');
			$this->form_validation->set_rules('saturday_MT','','xss_clean');
			$this->form_validation->set_rules('saturday_AF','','xss_clean');
			$this->form_validation->set_rules('saturday_AT','','xss_clean');
			$this->form_validation->set_rules('saturday_EF','','xss_clean');
			$this->form_validation->set_rules('saturday_ET','','xss_clean');
			
	
	$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			$this->form_validation->set_rules('act_'.$row->id,'','xss_clean');
		}
	}
	
	$result=$this->db->query("select * from tbl_service  WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			$this->form_validation->set_rules('service_'.$row->id,'','xss_clean');
		}
	}
		
			if($this->form_validation->run())
			{
				$maxid=$this->common_model->search_maxid('tbl_gym_details');
				
				// tbl_gym_details
				$data_fields=array(
					'id'=>$maxid,
					'gym_title'=>$_POST['gym_title'],
					'gym_address'=>$_POST['gym_address'],
					'gym_locality'=>$_POST['gym_locality'],
					'gym_lat'=>$_POST['gym_lat'],
					'gym_lng'=>$_POST['gym_lng'],
				);
				
				$this->common_model->insert_records('tbl_gym_details',$data_fields);
				
				// tbl_gym_fees_structure
				$data_fields=array(
					'id'=>$maxid,
					'days'=>$_POST['days'],
					'weekly'=>$_POST['weekly'],
					'monthly'=>$_POST['monthly'],
					'quarterly'=>$_POST['quarterly'],
					'half_yearly'=>$_POST['half_yearly'],
					'yearly'=>$_POST['yearly'],
				);
				
				$this->common_model->insert_records('tbl_gym_fees_structure',$data_fields);
				
				// tbl_gym_timing
				$data_fields=array(
					'id'=>$maxid,
					'sunday_MF'=>$_POST['sunday_MF'],
					'sunday_MT'=>$_POST['sunday_MT'],
					'sunday_AF'=>$_POST['sunday_AF'],
					'sunday_AT'=>$_POST['sunday_AT'],
					'sunday_EF'=>$_POST['sunday_EF'],
					'sunday_ET'=>$_POST['sunday_ET'],
					
					'monday_MF'=>$_POST['monday_MF'],
					'monday_MT'=>$_POST['monday_MT'],
					'monday_AF'=>$_POST['monday_AF'],
					'monday_AT'=>$_POST['monday_AT'],
					'monday_EF'=>$_POST['monday_EF'],
					'monday_ET'=>$_POST['monday_ET'],
					
					'tuesday_MF'=>$_POST['tuesday_MF'],
					'tuesday_MT'=>$_POST['tuesday_MT'],
					'tuesday_AF'=>$_POST['tuesday_AF'],
					'tuesday_AT'=>$_POST['tuesday_AT'],
					'tuesday_EF'=>$_POST['tuesday_EF'],
					'tuesday_ET'=>$_POST['tuesday_ET'],
					
					'wednesday_MF'=>$_POST['wednesday_MF'],
					'wednesday_MT'=>$_POST['wednesday_MT'],
					'wednesday_AF'=>$_POST['wednesday_AF'],
					'wednesday_AT'=>$_POST['wednesday_AT'],
					'wednesday_EF'=>$_POST['wednesday_EF'],
					'wednesday_ET'=>$_POST['wednesday_ET'],
					
					'thursday_MF'=>$_POST['thursday_MF'],
					'thursday_MT'=>$_POST['thursday_MT'],
					'thursday_AF'=>$_POST['thursday_AF'],
					'thursday_AT'=>$_POST['thursday_AT'],
					'thursday_EF'=>$_POST['thursday_EF'],
					'thursday_ET'=>$_POST['thursday_ET'],
					
					'friday_MF'=>$_POST['friday_MF'],
					'friday_MT'=>$_POST['friday_MT'],
					'friday_AF'=>$_POST['friday_AF'],
					'friday_AT'=>$_POST['friday_AT'],
					'friday_EF'=>$_POST['friday_EF'],
					'friday_ET'=>$_POST['friday_ET'],
					
					'saturday_MF'=>$_POST['saturday_MF'],
					'saturday_MT'=>$_POST['saturday_MT'],
					'saturday_AF'=>$_POST['saturday_AF'],
					'saturday_AT'=>$_POST['saturday_AT'],
					'saturday_EF'=>$_POST['saturday_EF'],
					'saturday_ET'=>$_POST['saturday_ET'],
					
				);
				
				$this->common_model->insert_records('tbl_gym_timing',$data_fields);
				
$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			if(isset($_POST['act_'.$row->id]))
			{
				$data_fields=array(
					'id'=>$maxid,
					'activity_name'=>$_POST['act_'.$row->id],
				);
				
				$this->common_model->insert_records('tbl_gym_activity',$data_fields);
			}
		}
	}		
	
	$result=$this->db->query("select * from  tbl_service  WHERE status='1' ");
	if($result->result()>0)
	{
		foreach($result->result() as $row)
		{
			if(isset($_POST['service_'.$row->id]))
			{
				$data_fields=array(
					'id'=>$maxid,
					'service_name'=>$_POST['service_'.$row->id],
				);
				
				$this->common_model->insert_records('tbl_gym_service',$data_fields);
			}
		}
	}			
			
	 
				$this->load->library('upload');
 
				
				$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $maxid.'_1.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files1");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_1.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_1_1.jpg';
					$config["width"] = 480;
					$config["height"] = 250;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_1.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_1.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				 
				
				$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $maxid.'_2.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files2");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_2.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_2.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				 
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $maxid.'_3.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files3");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_3.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_3.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $maxid.'_4.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files4");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_4.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_4.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $maxid.'_5.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files5");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_5.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_5.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
				
	 
	 			$this->session->set_userdata('error_msg','New Gym Added successfylly')	 ;
	 			$this->session->set_userdata('error_cls','success')	 ;
	 			redirect(base_url().'dashboard/gym?page=gym-manage');
				
			}
		}
		else
		if(isset($_POST['btn_edit_gym_det']))
		{
			
			$this->form_validation->set_rules('gym_title','Gym Title','required|xss_clean');
			$this->form_validation->set_rules('gym_address','Gym Address','required|xss_clean');
			$this->form_validation->set_rules('gym_locality','Gym Locality','required|xss_clean');
			
			$this->form_validation->set_rules('days','Days Fees','is_numeric|required|xss_clean');
			$this->form_validation->set_rules('weekly','Weekly Fees','is_numeric|required|xss_clean');
			$this->form_validation->set_rules('monthly','Monthly Fees','is_numeric|required|xss_clean');
			$this->form_validation->set_rules('quarterly','Quarterly Fees','is_numeric|required|xss_clean');
			$this->form_validation->set_rules('half_yearly','Half Yearly Fees','is_numeric|required|xss_clean');
			$this->form_validation->set_rules('yearly','Yearly Fees','is_numeric|required|xss_clean');
			
			$this->form_validation->set_rules('sunday_MF','','xss_clean');
			$this->form_validation->set_rules('sunday_MT','','xss_clean');
			$this->form_validation->set_rules('sunday_AF','','xss_clean');
			$this->form_validation->set_rules('sunday_AT','','xss_clean');
			$this->form_validation->set_rules('sunday_EF','','xss_clean');
			$this->form_validation->set_rules('sunday_ET','','xss_clean');
			$this->form_validation->set_rules('monday_MF','','xss_clean');
			$this->form_validation->set_rules('monday_MT','','xss_clean');
			$this->form_validation->set_rules('monday_AF','','xss_clean');
			$this->form_validation->set_rules('monday_AT','','xss_clean');
			$this->form_validation->set_rules('monday_EF','','xss_clean');
			$this->form_validation->set_rules('monday_ET','','xss_clean');
			$this->form_validation->set_rules('tuesday_MF','','xss_clean');
			$this->form_validation->set_rules('tuesday_MT','','xss_clean');
			$this->form_validation->set_rules('tuesday_AF','','xss_clean');
			$this->form_validation->set_rules('tuesday_AT','','xss_clean');
			$this->form_validation->set_rules('tuesday_EF','','xss_clean');
			$this->form_validation->set_rules('tuesday_ET','','xss_clean');
			$this->form_validation->set_rules('wednesday_MF','','xss_clean');
			$this->form_validation->set_rules('wednesday_MT','','xss_clean');
			$this->form_validation->set_rules('wednesday_AF','','xss_clean');
			$this->form_validation->set_rules('wednesday_AT','','xss_clean');
			$this->form_validation->set_rules('wednesday_EF','','xss_clean');
			$this->form_validation->set_rules('wednesday_ET','','xss_clean');
			$this->form_validation->set_rules('thursday_MF','','xss_clean');
			$this->form_validation->set_rules('thursday_MT','','xss_clean');
			$this->form_validation->set_rules('thursday_AF','','xss_clean');
			$this->form_validation->set_rules('thursday_AT','','xss_clean');
			$this->form_validation->set_rules('thursday_EF','','xss_clean');
			$this->form_validation->set_rules('thursday_ET','','xss_clean');
			$this->form_validation->set_rules('friday_MF','','xss_clean');
			$this->form_validation->set_rules('friday_MT','','xss_clean');
			$this->form_validation->set_rules('friday_AF','','xss_clean');
			$this->form_validation->set_rules('friday_AT','','xss_clean');
			$this->form_validation->set_rules('friday_EF','','xss_clean');
			$this->form_validation->set_rules('friday_ET','','xss_clean');
			$this->form_validation->set_rules('saturday_MF','','xss_clean');
			$this->form_validation->set_rules('saturday_MT','','xss_clean');
			$this->form_validation->set_rules('saturday_AF','','xss_clean');
			$this->form_validation->set_rules('saturday_AT','','xss_clean');
			$this->form_validation->set_rules('saturday_EF','','xss_clean');
			$this->form_validation->set_rules('saturday_ET','','xss_clean');
			
	
				$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
				if($result->result()>0)
				{
					foreach($result->result() as $row)
					{
						$this->form_validation->set_rules('act_'.$row->id,'','xss_clean');
					}
				}
				
				$result=$this->db->query("select * from tbl_service  WHERE status='1' ");
				if($result->result()>0)
				{
					foreach($result->result() as $row)
					{
						$this->form_validation->set_rules('service_'.$row->id,'','xss_clean');
					}
				}
				
				if($this->form_validation->run())
				{
					$id=base64_decode($_POST['id']);
					
						// tbl_gym_details
						$data_fields=array(
							'gym_title'=>$_POST['gym_title'],
							'gym_address'=>$_POST['gym_address'],
							'gym_locality'=>$_POST['gym_locality'],
							'gym_lat'=>$_POST['gym_lat'],
							'gym_lng'=>$_POST['gym_lng'],
						);
						
						$this->common_model->update_records('tbl_gym_details',$data_fields,'id',$id);
						
						// tbl_gym_fees_structure
						$data_fields=array(
							'days'=>$_POST['days'],
							'weekly'=>$_POST['weekly'],
							'monthly'=>$_POST['monthly'],
							'quarterly'=>$_POST['quarterly'],
							'half_yearly'=>$_POST['half_yearly'],
							'yearly'=>$_POST['yearly'],
						);
				
						$this->common_model->update_records('tbl_gym_fees_structure',$data_fields,'id',$id);
						
						
						// tbl_gym_timing
				$data_fields=array(
					'sunday_MF'=>$_POST['sunday_MF'],
					'sunday_MT'=>$_POST['sunday_MT'],
					'sunday_AF'=>$_POST['sunday_AF'],
					'sunday_AT'=>$_POST['sunday_AT'],
					'sunday_EF'=>$_POST['sunday_EF'],
					'sunday_ET'=>$_POST['sunday_ET'],
					
					'monday_MF'=>$_POST['monday_MF'],
					'monday_MT'=>$_POST['monday_MT'],
					'monday_AF'=>$_POST['monday_AF'],
					'monday_AT'=>$_POST['monday_AT'],
					'monday_EF'=>$_POST['monday_EF'],
					'monday_ET'=>$_POST['monday_ET'],
					
					'tuesday_MF'=>$_POST['tuesday_MF'],
					'tuesday_MT'=>$_POST['tuesday_MT'],
					'tuesday_AF'=>$_POST['tuesday_AF'],
					'tuesday_AT'=>$_POST['tuesday_AT'],
					'tuesday_EF'=>$_POST['tuesday_EF'],
					'tuesday_ET'=>$_POST['tuesday_ET'],
					
					'wednesday_MF'=>$_POST['wednesday_MF'],
					'wednesday_MT'=>$_POST['wednesday_MT'],
					'wednesday_AF'=>$_POST['wednesday_AF'],
					'wednesday_AT'=>$_POST['wednesday_AT'],
					'wednesday_EF'=>$_POST['wednesday_EF'],
					'wednesday_ET'=>$_POST['wednesday_ET'],
					
					'thursday_MF'=>$_POST['thursday_MF'],
					'thursday_MT'=>$_POST['thursday_MT'],
					'thursday_AF'=>$_POST['thursday_AF'],
					'thursday_AT'=>$_POST['thursday_AT'],
					'thursday_EF'=>$_POST['thursday_EF'],
					'thursday_ET'=>$_POST['thursday_ET'],
					
					'friday_MF'=>$_POST['friday_MF'],
					'friday_MT'=>$_POST['friday_MT'],
					'friday_AF'=>$_POST['friday_AF'],
					'friday_AT'=>$_POST['friday_AT'],
					'friday_EF'=>$_POST['friday_EF'],
					'friday_ET'=>$_POST['friday_ET'],
					
					'saturday_MF'=>$_POST['saturday_MF'],
					'saturday_MT'=>$_POST['saturday_MT'],
					'saturday_AF'=>$_POST['saturday_AF'],
					'saturday_AT'=>$_POST['saturday_AT'],
					'saturday_EF'=>$_POST['saturday_EF'],
					'saturday_ET'=>$_POST['saturday_ET'],
					
				);
				
				$this->common_model->update_records('tbl_gym_timing',$data_fields,'id',$id);
				
				// gym_Activity
				
				$this->common_model->deleteRecords('tbl_gym_activity',$id);
				
				$result=$this->db->query("select * from tlb_activity  WHERE status='1' ");
				if($result->result()>0)
				{
					foreach($result->result() as $row)
					{
						if(isset($_POST['act_'.$row->id]))
						{
							$data_fields=array(
								'id'=>$id,
								'activity_name'=>$_POST['act_'.$row->id],
							);
							
							$this->common_model->insert_records('tbl_gym_activity',$data_fields);
						}
					}
				}	
				
				
				// gym_services
				
				$this->common_model->deleteRecords('tbl_gym_service',$id);
				
				$result=$this->db->query("select * from  tbl_service  WHERE status='1' ");
				if($result->result()>0)
				{
					foreach($result->result() as $row)
					{
						if(isset($_POST['service_'.$row->id]))
						{
							$data_fields=array(
								'id'=>$id,
								'service_name'=>$_POST['service_'.$row->id],
							);
							
							$this->common_model->insert_records('tbl_gym_service',$data_fields);
						}
					}
				}
				
				
				
				
				$this->load->library('upload');
 
				
				$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_1.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files1");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_1.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_1_1.jpg';
					$config["width"] = 480;
					$config["height"] = 250;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_1.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_1.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				 
				
				$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_2.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files2");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_2.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_2.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_3.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files3");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_3.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_3.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_4.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files4");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_4.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_4.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
	 			$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_5.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files5");
				$datas=($this->upload->data());
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_5.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_5.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;
					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
				$this->session->set_userdata('error_msg','Selected Gym detailes updated successfylly')	 ;
	 			$this->session->set_userdata('error_cls','success')	 ;
				redirect(base_url().'dashboard/gym?page=gym-manage');		
				
				}
		
		}
		else
		if(isset($_GET['ch']))
		{
			 	
			if($_GET['ch']=='del')
			{
				$result=$this->common_model->deleteRecords('tbl_gym_details',base64_decode($_GET['id']));
				$result=$this->common_model->deleteRecords('tbl_gym_fees_structure',base64_decode($_GET['id']));
				$result=$this->common_model->deleteRecords('tbl_gym_timing',base64_decode($_GET['id']));
				$result=$this->common_model->deleteRecords('tbl_gym_activity',base64_decode($_GET['id']));
				$result=$this->common_model->deleteRecords('tbl_gym_service',base64_decode($_GET['id']));
				$result=$this->common_model->deleteRecords('tbl_gym_service',base64_decode($_GET['id']));
				if($result)
					{
						$img_path=FCPATH."assets/upload/gym_img/".base64_decode($_GET['id'])."_1.jpg";
						unlink($img_path);
						$img_path=FCPATH."assets/upload/gym_img/".base64_decode($_GET['id'])."_2.jpg";
						unlink($img_path);
						$img_path=FCPATH."assets/upload/gym_img/".base64_decode($_GET['id'])."_3.jpg";
						unlink($img_path);
						$img_path=FCPATH."assets/upload/gym_img/".base64_decode($_GET['id'])."_4.jpg";
						unlink($img_path);
						$img_path=FCPATH."assets/upload/gym_img/".base64_decode($_GET['id'])."_5.jpg";
						unlink($img_path);
						
						$this->session->set_userdata('error_msg','Gym Removed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='act')
			{
				$result=$this->common_model->updateStatus('tbl_gym_details',base64_decode($_GET['id']),'1');
				if($result)
					{
						$this->session->set_userdata('error_msg','Gym Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			else if($_GET['ch']=='inact')
			{
				$result=$this->common_model->updateStatus('tbl_gym_details',base64_decode($_GET['id']),'0');
				if($result)
					{
						$this->session->set_userdata('error_msg','Status Changed Sucessfully..');
						$this->session->set_userdata('error_cls','success');
					}
					else
					{
						$this->session->set_userdata('error_msg','Error occurred, Try again...');
						$this->session->set_userdata('error_cls','error');
					}
			}
			redirect(base_url().'dashboard/gym?page=gym-manage');
		
			 
		}
		$data['page_header']="Website Settings | ". $this->website_name;
		$this->load->view('dashboard/dashboard-header',$data);
		$this->load->view('dashboard/dashboard-left-menu');
		$this->load->view('dashboard/'.$page);
		$this->load->view('dashboard/dashboard-footer');
	}
	
	public function upload_form() 
	{
		$this->load->view('dashboard/upload_form');
	}
	
}

?>
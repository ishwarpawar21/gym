<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller  {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->website_name="Raj Website";
		$this->load->model('common_model');
	}
	
	public function index()
	{
		$data['pege_header']="Home | ".$this->website_name;
		
		$this->load->view('site-header',$data);
		$this->load->view('home');
		$this->load->view('site-footer');
	}
	
	public function gym_owner_login()
	{
		$data['pege_header']="Login/Register | ".$this->website_name;
		
		if(isset($_POST['btn_save_gym_owner']))
		{
			$this->form_validation->set_rules('f_name','First Name','required|xss_clean|trim');
			$this->form_validation->set_rules('l_name','Last Name','required|xss_clean|trim');
			$this->form_validation->set_rules('email','Email Name','required|xss_clean|trim|valid_email');
			$this->form_validation->set_rules('password','Password','min_length[4]|max_length[12]|required|xss_clean|trim');
			$this->form_validation->set_rules('cpassword','Confirm Password','matches[password]required|xss_clean|trim');
			$this->form_validation->set_rules('ph_no','Phone No','required|xss_clean|trim');
			$this->form_validation->set_rules('mob_no','Mobile No','required|xss_clean|trim');
			
			if($this->form_validation->run())
			{
				$maxid=$this->common_model->search_maxid('tbl_gym_owner');
				$data_field=array(
					'id'=>$maxid,
					'f_name'=>$_POST['f_name'],
					'l_name'=>$_POST['l_name'],
					'email'=>$_POST['email'],
					'password'=>md5($_POST['password']),
					'ph_no'=>$_POST['ph_no'],
					'mob_no'=>$_POST['mob_no'],
				);
				$result=$this->common_model->insert_records('tbl_gym_owner',$data_field);
				if($result)
				{
					$this->session->set_userdata('username',$_POST['email']);
					$this->session->set_userdata('f_name',$_POST['f_name']);
					$this->session->set_userdata('l_name',$_POST['l_name']);
					$this->session->set_userdata('passwords',$_POST['password']);
					$this->session->set_userdata('is_logged_in','1');
					redirect(base_url().'gym_owner');
				}else
				{
					$this->session->set_userdata('error_msg','<span style="color:red;font-size:14px;">Error Occurred, Try to register again after some time.</span>');	
				}
			}
			
		}
		else
		if(isset($_POST['btn_logged_in']))
		{
			$this->form_validation->set_rules('email_id','Email Id','required|xss_clean|trim|valid_email');
			$this->form_validation->set_rules('passwords','Password','required|xss_clean|trim');
			if($this->form_validation->run())
			{
				 
				$result=$this->db->query("select * from tbl_gym_owner where email = '".$_POST['email_id']."' and password = '".md5($_POST['passwords'])."'")->row();
				if($result) 
				{
					$this->session->set_userdata('username',$_POST['email_id']);
					$this->session->set_userdata('f_name',$result->f_name);
					$this->session->set_userdata('l_name',$result->l_name);
					$this->session->set_userdata('passwords',$_POST['passwords']);
					$this->session->set_userdata('is_logged_in','1');
					redirect(base_url().'gym_owner');
				}
				else
				{
					$this->session->set_userdata('log_error_msg','<span style="font-size:12px;color:red">Invalid Email id or Password.</span>');
					redirect(base_url().'site/gym_owner_login');
				}
			}		
		}
		$this->load->view('site-header',$data);
		$this->load->view('gym-owner-login');
		$this->load->view('site-footer');
	}
	
	public function gym()
	{
		$header['pege_header']="Gym Result | ".$this->website_name;
		$this->load->library('pagination');
		$this->load->library('table');
		 
        
        $config = array();
        $config["base_url"] = base_url() . "site/gym";
        $this->db->where('status','1');
        $config["total_rows"] = $this->db->get('tbl_gym_details')->num_rows();
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
   		$choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
    
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->common_model->fetch_gym($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
          
		$this->load->view('site-header',$header);
		$this->load->view('gym-search',$data);
		$this->load->view('site-footer');
	}
	
	
	public function gym_view()
	{
		
		if(isset($_GET['gym']) && $_GET['gym']!=NULL)
		{	
				$id=base64_decode($_GET['gym']);
				$result=$this->db->query("select * from tbl_gym_details where id='".$id."' and status='1'")->row();
				if($result)
				{
					$header['pege_header']=$result->gym_title." | ".$this->website_name;
					$this->load->view('site-header',$header);
					$this->load->view('gym-view1',$result);
					$this->load->view('site-footer');	
				}
				else
				{
					$this->session->userdata('gym_error_msg','Invalid Selection.');
					redirect(base_url().'site/gym/');
				}
				
		}
		else
		{
			redirect(base_url().'site/gym/');
		}
		
	}
	
	public function contact_us()
	{
			$header['pege_header']="Contact Us | ".$this->website_name;
					$this->load->view('site-header',$header);
					$this->load->view('contact-us');
					$this->load->view('site-footer');	
	}
}
?>
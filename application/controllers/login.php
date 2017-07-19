<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('common_model');
	}
	
	public function d_login()
	{
		if(isset($_POST['btn_login']))
		{
			$this->form_validation->set_rules('username','Username','required|xss_clean|trim');
			$this->form_validation->set_rules('password','Password','min_length[4]|max_length[10]|required|xss_clean|trim');
		
			if($this->form_validation->run())
			{
					$result=$this->common_model->login_function('tlb_admin_profile',$_POST['username'],$_POST['password']);
					if($result)
					{
						/*$admin_settings=array(
						'admin_username'=>$result->username;
						'admin_password'=>$result->password;
						'admin_name'=>$result->username;
						
						);*/
						$this->session->set_userdata('admin_username',$result->username);
						$this->session->set_userdata('admin_password',$_POST['password']);
						$this->session->set_userdata('admin_fname',$result->fname);
						$this->session->set_userdata('admin_lname',$result->lname);
						$this->session->set_userdata('admin_logged_in','1');
						
						redirect(base_url().'dashboard');
					}
					else
					{
						$this->session->set_userdata('d_login_error',"Invalid Username password");
						redirect(base_url().'login/d_login');
					}
			}	
		}
		$data['page_title']='Dashboard Login | Gym Website';
		$this->load->view('dashboard/login',$data);
	}
	
	
}

?>
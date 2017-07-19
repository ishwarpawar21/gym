<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	function loginByFacebook()
{ 
    $this->load->library('fb_connect'); 
    $param['redirect_uri']=site_url("user/facebook");
    redirect($this->fb_connect->getLoginUrl($param));
} 

function facebook()
{ 
    $this->load->library('fb_connect'); 
    if (!$this->fb_connect->user_id) 
    { 
        //Handle not logged in,
    } 
    else
    { 
        $fb_uid = $this->fb_connect->user_id; 
        $fb_usr = $this->fb_connect->user; 
        //Handle user logged in,by updating session 
        //print_r($fb_usr) will help to see what is returned 
    } 
} 

	function upload_test()
	{
		if(isset($_POST['sub_files']))
		{
			$config['upload_path'] = 'assets/dashboard';
	        $config['allowed_types'] = 'gif|jpg|jpeg|png';
	        $config['max_size']    = '8024';
	        $config['remove_spaces']= TRUE;  
	        $config['encrypt_name'] = TRUE;
	        $this->load->library('upload');
	        
	          $this->upload->initialize($config);

	        if($this->upload->do_multi_upload("files")) {
	            //Code to run upon successful upload.
	        }

	           
		}
		$this->load->view('upload_1');

	}
	
	
	function upload_test1()
	{
		$this->load->library('upload');
 
				$config=array(
						'upload_path' => 'assets/upload/service',
						'allowed_types' => 'jpg',
						'file_name'=> '1_1.jpg',
						'overwrite'=> True,
						'max_width'=>'200',
						'max_height'=>'200',
						
					);
								
					 
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files1");
				
		print_r($this->upload->data());
		echo "<br/>";
		 
		 
				$config=array(
						'upload_path' => 'assets/upload/service',
						'allowed_types' => 'jpg',
						'file_name'=> '1_2.jpg',
						'overwrite'=> True,
						'width'=>200,
						'height'=>200,
						
					);
								
					 
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files2");
		
			print_r($this->upload->data()		);
		echo "<br/>";
		exit;
		$this->load->view('upload_1');

	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
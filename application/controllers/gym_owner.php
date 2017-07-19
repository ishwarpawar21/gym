<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gym_owner extends CI_Controller {
	function __construct() {
		parent::__construct();
			$this->load->library('session');
		$this->load->library('form_validation');
		$this->website_name="Raj Website";
		$this->load->model('common_model');
		$this->check_login();
	}
	
	public function check_login()
	{
		if(!$this->session->userdata('username'))
		{
			redirect(base_url().'site/gym_owner_login');
		}
	}
	public function index()
	{
		$this->go_acc();
	}
	
	public function go_acc()
	{
		$data['pege_header']="Rajendra Patil | ".$this->website_name;
	
		if(isset($_POST['btn_save_gym_details']))
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
					'gym_by'=>$this->session->userdata('username'),
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
				//echo "<br/>";
				
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
				//echo "<br/>";
				
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
				//echo "<br/>";
				
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
				//echo "<br/>";
				
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
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$maxid.'_5.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$maxid.'_5.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
					 
				}
			

	 
	 			$this->session->set_userdata('error_msg','<span style="color:green">Gym Details Added Successfully</span>');
	 			redirect(base_url().'gym_owner/go_acc');
				
			}
		}
		
		if(isset($_POST['btn_edit_gym_details']))
		{
			$id=base64_decode($_POST['ids']);
			
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
				
				
				$this->session->set_userdata('error_msg','Gym details updated successfully');
				redirect(base_url().'gym_owner');		
	 				
				
				}
		}
		if($this->input->post('btn_edit_gym_img'))
		{
				$id=base64_decode($this->input->post('ids'));
				//echo($id);
				//exit;
				$this->load->library('upload');
 
				
				$config=array('upload_path' => 'assets/upload/gym_img', 'allowed_types' => 'jpg', 'file_name'=> $id.'_1.jpg', 'overwrite'=> True,);
				$this->upload->initialize($config); // Important
				$this->upload->do_upload("files1");
				$datas=($this->upload->data());
				//echo "<br/>"; 
				//exit; 
				
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
				//print_r($this->upload->data());
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
				$datas=array();
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
				//echo "<br/>";
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
				//echo "<br/>";
				
				if($datas['file_size'] >0 )
				{
					$config["source_image"] = 'assets/upload/gym_img/'.$id.'_5.jpg';
					$config['new_image'] = 'assets/upload/gym_img/'.$id.'_5.jpg';
					$config["width"] = 1080;
					$config["height"] = 460;

					$this->load->library('image_lib', $config);
					$this->image_lib->fit();
				}
				
				$this->session->set_userdata('error_msg','<span style="color:Green">Gym details updated successfylly</span>');
				redirect(base_url().'gym_owner/go_acc?pg='.base64_encode('gym-img'));
			
		}
		if(isset($_POST['btn_edit_profile']))
		{
			$this->form_validation->set_rules('f_name','First Name','required|xss_clean|trim');
			$this->form_validation->set_rules('l_name','Last Name','required|xss_clean|trim');
			$this->form_validation->set_rules('ph_no','Phone No','required|xss_clean|trim');
			$this->form_validation->set_rules('mob_no','Mobile No','required|xss_clean|trim');
			
			if($this->form_validation->run())
			{
					$data_field=array(
						'f_name'=>$_POST['f_name'],
						'l_name'=>$_POST['l_name'],
						'ph_no'=>$_POST['ph_no'],
						'mob_no'=>$_POST['mob_no'],
					);
					
					$result=$this->common_model->update_records('tbl_gym_owner',$data_field,'id',base64_decode($_POST['id']));
					if($result)
					{
						$this->session->set_userdata('f_name',$_POST['f_name']);
						$this->session->set_userdata('l_name',$_POST['l_name']);
						$this->session->set_userdata('error_msg','<span style="color:green">Profile Updated Successfully</span>');
					}
					else
					{
						$this->session->set_userdata('error_msg','<span style="color:red">Error occurred, Try again...</span>');
					}
					redirect(base_url().'gym_owner/go_acc?pg='.base64_encode('go_profle'));
			}
		}
		if(isset($_POST['btn_edit_password']))
		{
			$this->form_validation->set_rules('Opassword','Old Password','required|xss_clean|trim');
			$this->form_validation->set_rules('Npassword','New Password','max_length[12]|min_length[4]|required|xss_clean|trim');
			$this->form_validation->set_rules('Cpassword','Confirm Password','matches[Npassword]|required|xss_clean|trim');
			
			if($this->form_validation->run())
			{ 
			 	if($_POST['Opassword']==$this->session->userdata('passwords'))
					{
						$data_field=array('password' => md5($_POST['Npassword']));
						$result=$this->common_model->update_records('tbl_gym_owner',$data_field,'email',$this->session->userdata('username'));
						if($result)
						{
							$this->session->set_userdata('passwords',$_POST['Npassword']);
							$this->session->set_userdata('error_msg','<span style="font-size:14px;color:green">Password Updated Successfully</span>');
						}
						else
						{
							$this->session->set_userdata('error_msg','<span style="font-size:14px;color:red">Error occurred, Try again...</span>');
						}
						
					}
					else
					{
						$this->session->set_userdata('error_msg','<span style="font-size:14px;color:red">Invalid Old Password</span>');
					}
					redirect(base_url().'gym_owner/go_acc?pg='.base64_encode('go_change_password'));
			}
		
		}
		$this->load->view('site-header',$data);
		$this->load->view('gym-owner/account');
		$this->load->view('site-footer');
	}
	
	public function go_profle()
	{
		$data['pege_header']="Rajendra Patil | ".$this->website_name;
	
		$this->load->view('site-header',$data);
		$this->load->view('gym-owner/go_profle');
		$this->load->view('site-footer');
	}
}
?>
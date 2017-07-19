<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	
	
	public function login_function($tbl,$username,$password)
	{
			$val_array=array();
			$result=$this->db->query("select * from ".$tbl." where username = '".$username."' and password = '".md5($password)."'")->row();
			
			if($result) 
			{return $result;}
			else
			{return $val_array;}
	}
	
	public function update_records($tbl,$data_field,$col_name,$col_val)
	{
		$this->db->where($col_name,$col_val);
		$result=$this->db->update($tbl,$data_field);
		if($result)
		{return TRUE;}
		else
		{return false;}
			
	}
	
	public function insert_records($tbl,$data_field)
	{
		$result=$this->db->insert($tbl,$data_field);
		if($result) 
		{return true;}
		else
		{return false;}
	}
	
	public function search_maxid($tbl)
	{ 	$maxid=0;
		$result=$this->db->query("select max(id) as maxid from ".$tbl)->row();
		if($result)
		{
			$maxid=$result->maxid;	
		}
		$maxid++;
		return $maxid;
	}
	
	
	public function deleteRecords($tbl,$val)
	{ 	
		$this->db->where('id',$val);
		$result=$this->db->delete($tbl);
		if($result) 
		{return true;}
		else
		{return false;}
	}
	
	public function updateStatus($tbl,$id,$val)
	{
		echo $tbl.'<br/>';
		echo $id.'<br/>';
		echo $val.'<br/>';
		
	
		$data_field=array('status'=>$val);
		$this->db->where('id',$id);
		$result=$this->db->update($tbl,$data_field);
		if($result)
		{return TRUE;}
		else
		{return false;}
	}
	
	public function fetch_gym($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('status','1');
        $query = $this->db->get("tbl_gym_details");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
}

?>
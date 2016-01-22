<?php class Admin_model extends CI_Model
{

	/*************************
	* Admin Login
	***********************/

	function login($email,$password)
	{
		$this->db->where(array('email'=>$email,'password'=>$password));
		$r=$this->db->get('admin');
		$res=$r->row_array();
		if($r->num_rows()>0)
		{
			return $res;
		}
		else
		{
			return 0;
		}
	}
	
	/*************************
	* Get the ALL user Details
	***********************/
	
	function getUser(){
		
		$query = $this->db->query("SELECT reg.*,u.id,u.username,u.email,u.avail,p.type_name,u.id as user_id,c.name AS city,
		s.name AS state, cty.name AS country FROM fm_places AS reg
		INNER JOIN user AS u ON  u.id 		= reg.user_id
		INNER JOIN cities AS c ON  reg.city		= c.id
		INNER JOIN states AS s ON reg.state	 	= s.id
		INNER JOIN countries AS cty ON reg.country  = cty.id
		INNER JOIN place_type AS p ON p.pID = reg.place_type_id
		ORDER BY reg.id desc");
		$results = $query->result_array();
		return $results;
	}

	/*************************
	* Change Status
	***********************/
	
	function changestatus($id,$status)
	{
		$this->db->where('id',$id);
		$this->db->update('user',array('avail'=>$status));
		//echo $this->db->last_query();die;
		return true;
	}
	
	/***************************************
	* Get the single user Details Json format
	**************************************/

	function viewSingleUser($id){
		
		$query = $this->db->query("SELECT * FROM users WHERE user_id='$id'");
		$results = $query->row_array();		
		echo json_encode($results);
	}
	/****************************
	* Get the single user Details
	***************************/

	function getUserDetails($id){
		
		$query = $this->db->query("SELECT * FROM users WHERE user_id='$id'");
		$results = $query->row_array();		
		return $results;
	}
	
	
	/**********************************
	* Get the single user MEDIA Details
	**********************************/
	function viewSingleUserMedia($id){
		$all = array();
		$query = $this->db->query("SELECT * FROM media_detail WHERE user_id='$id'");		
		$results = $query->result_array();			
			foreach($results as $media_detail_val){		
					 $medresults['title'] 		= $media_detail_val['title'];
					 $medresults['description'] = $media_detail_val['description'];
					 $medresults['price'] 		= $media_detail_val['price'];
					 $medresults['id'] 			= $media_detail_val['id'];
					$all[] = $medresults;									
			}	
		return $all;
	}

	/****************************************
	* Get the single user MEDIA FILES Details
	****************************************/

    function media_file_detail($id){				
         $query=$this->db->query("SELECT id, media_id, media_file, thumbnail FROM  media WHERE media_id ='$id'");
		 $results = $query->result_array();			 
		 return $results;
	}

	/******************
	* Delete User
	********************/
	
	function deleteUser($id){

		$query2 = $this->db->query("DELETE FROM users WHERE user_id='$id'");
		return true;	
	}
	
	/******************************
	* User Registration 
	******************************/

	
	function register()
	{
		$data = array(
		  'username' 	 => mysql_real_escape_string($this->input->post('InputUserName')),
		  'email'   	 => mysql_real_escape_string($this->input->post('InputEmail')),
		  'password'     => md5($this->input->post('InputPassword')),
		  'address'      => mysql_real_escape_string($this->input->post('InputAddress'))
		);
		$this->db->insert('user', $data); 
		$last_id = $this->db->insert_id();
		return $last_id;	
	
	}
	
}
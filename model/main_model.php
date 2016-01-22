<?php
class Main_model extends CI_Model
{

	/**************************
	*  Show user
	***************************/
    function showUser($email,$password){
	
	   	echo "SELECT * FROM user WHERE email='".$email."' AND password = '".md5($password)."' AND avail='Y'";
	   $query   = $this->db->query("SELECT * FROM user WHERE email='".$email."' AND password = '".md5($password)."' AND avail='Y'");
	   echo $query->num_rows() ;
	   if($query->num_rows() == 1)
	   {
	     $results =  $query->row_array();
		 print_r($results);
	     return $results;
	   }
	   else{
	      return false;
	   }
	}
	
	/******************************
	*  First Registration Form data
	******************************/

	
	function register($data)
	{
		$email = trim($data['email']);
		$email = strtolower($email);		
		$query = $this->db->query('SELECT * FROM user where email="'.$email.'"');	
		if($query->num_rows() > 0){
			return  $results = "Email Already Exist";
		}else{
		
		$verificationText	 = $this->random_password(8);
		$data['confirmation_code'] = $verificationText;
		$this->db->insert('user', $data); 
		$last_id = $this->db->insert_id();
		if($last_id > 0)
		{
			
			$msg = "Dear User,<br />Please click on below URL or paste into your browser to verify your Email Address<br /><br /><a href='".base_url()."home/verifyEmail/".$verificationText."'> Verify Email </a><br /><br />Thanks<br />Clickrideshare";
	
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			
			$this->email->set_newline("\r\n");
			$this->email->from('support@clickrideshare.com', "Clickrideshare");
			$this->email->to($data['email']);  
			$this->email->subject("Email Verification");
			$this->email->message($msg);
			
			if($this->email->send()) {		
				return $success_msg = SUCCESS_MSG;
			}
			else
			{
				return $success_msg = 'Mail not sent due to some technical issue please try again';
			}	
		}	
		else{
				return  $results = "Failed to save data!";		
			}
		}			
	}
	
	/******************************
	*  Verification Email Address
	******************************/
	 function verifyEmailAddress($confirmation_code){  	 
		$sql = "UPDATE user SET avail='Y' WHERE confirmation_code='".$confirmation_code."'";
		$this->db->query($sql, array($confirmation_code));		
		return $this->db->affected_rows(); 
	 }
	
	/******************************
	*  Login Form 
	******************************/
	
	 function login($data)
	 {
	   $this -> db -> select('id, email');
	   $this -> db -> from('user');
	   $this -> db -> where('email', $data['email']);
	   $this -> db -> where('avail', 'Y');
	   $this -> db -> where('password', MD5($data['password']));
	   $this -> db -> limit(1);
	 
	 
	   $query = $this -> db -> get();
	
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	 }
	 
	 #Get place Type
	 function getPlacetype(){
		 
		$query  = $this->db->get('place_type');
		return $query->result_array();
		 
	 } // end getPlacetype
	 
	  #Get Country
	 function getCountry()
	 {
		 $query  = $this->db->get('countries');
		 return $query->result_array();
	 }

	 
	 #Get State
	 function getState($cid)
	 {
		 
//		 $query  = $this->db->select('StateID,StateName')->from('state')->where('countryID',$cid);
		 $query  = $this->db->select('id, name')->from('states')->where('country_id',$cid);
		 $query = $this->db->get();
		 return $query->result();
	 }
	 
	 #Get City
	  function getCity($cid = null,$sid) {

//		 $query  = $this->db->select('CityID,CityName')->from('city')->where(array('countryID '=> $cid,'StateID' => $sid));
		 $query  = $this->db->select('id, name')->from('cities')->where(array('state_id '=> $sid));
		 $query = $this->db->get();
		 return $query->result();
	  
	  } // end getCity
	  
	  /*----------------------
	   Save Org Registration
	  -----------------------*/
	  function insertfm_Place($data)
	  {
		 $this->db->insert('fm_places',$data);
		  $last_id = $this->db->insert_id();
	      return $last_id;			  
		  
	  } // end insertfm_Place	 
	  
	  /*----------------------
	   Update Organisation 
	  -----------------------*/	  
	  function updatefm_place($data,$id){

			$this->db->select("email");
			$this->db->from('user');
			$this->db->where('id',$data['user_id']);
			$query  = $this->db->get();
			$result = $query->row_array();			
			$this->load->library('email');		
			$msg = "Dear User,<br />Your change will be reflect after verification within next 48 hours.Thanks";
	
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';

			$list = array($result['email'], 'admin@example.com');
			$this->email->initialize($config);
			
			$this->email->set_newline("\r\n");
			$this->email->from('support@clickrideshare.com', "Clickrideshare");
			$this->email->to($list);  
			$this->email->subject("Updation Mail");
			$this->email->message($msg);
			
			if($this->email->send()) {				 
				$data['status']  = 'N';
				$query = $this->db->where('id',$id);
				$query = $this->db->update('fm_places',$data);
				return true;								
		  } else {
				return false;
			}	
	  }
	  
	  /*------------------------
	    Generate Random Password
	  -------------------------*/
	  function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
	}
	
	  
	  #Get User Places
	  function userfm_place($uid,$where = NULL) {	
			$query = $this->db->from('fm_places');
			$query = $this->db->where('user_id',$uid);
			$query = $this->db->where('status','Y');
			$query = $this->db->get();
			return $query->result();
	  
	  } // end userfm_place
	  
	  function deletePlace($id) {
		  
		  return $this->db->delete('fm_places',array('id' => $id));
		  
	  }
	  function updatePlace($id) {
		  
		  $query = $this->db->from('fm_places');
		  $query = $this->db->where('id', $id);
		  	$query = $this->db->get();
			return $query->row_array();
	  }
	  
	  #Show Place per type
		function showfm_place($placetypeid){
			
			$query = $this->db->from('fm_places')->where('place_type_id',$placetypeid);
		  	$query = $this->db->get();
			return $query->result();
			
		}
		#Get per Place detail 
		function detail_places($cid,$sid,$cty,$fid)
		{
/*			$query = $this->db->from('fm_places')->join('countries','countries.id = fm_places.country');
			$query = $this->db->join('state','state.StateID = fm_places.state');
			$query = $this->db->join('city','city.cityID = fm_places.city');
			if($sid != ''){
			$query = $this->db->where('fm_places.state',$sid);
			}
			
			if($cty != ''){
			$query = $this->db->where('fm_places.city',$cty);
			}
			$query = $this->db->where('fm_places.country',$cid);
			$query = $this->db->where('fm_places.place_type_id',$fid);
		  	$query = $this->db->get();
			return $query->result();*/
			$query = $this->db->query("SELECT reg.* FROM fm_places AS reg WHERE reg.country ='".$cid."' AND reg.state = '".$sid."' AND city = '".$cty."' AND reg.place_type_id = '".$fid."'");
			//echo $this->db->last_query();
			return $query->result();
		}
		
		//Get per Place detail 
		function getDetailOfPlaces($id){
			
			$query = $this->db->query("SELECT f.*,u.email,c.name as country_name,s.name as state_name,city.name as city_name FROM fm_places AS f 
			INNER JOIN user AS u on u.id = f.user_id
			INNER JOIN countries AS c ON f.country = c.id
			INNER JOIN states AS s ON f.state = s.id
			INNER JOIN cities AS city ON f.city = city.id");
		  	
			return $query->row_array();
			
		}
		
	/*****************************
	* 	// Check Password
	******************************/

	function changePassword($old_password,$new_password,$email) {
			$query =  $this->db->query("UPDATE user SET password='".md5($new_password)."' WHERE email = '".$email."' AND password='".md5($old_password)."'");
			//echo $this->db->last_query();
			if($this->db->affected_rows() > 0){
				return true;
			}
			else{
				return false;
			}
	}
	 

		/*****************************
		* 	//  Check Email Availablity
		******************************/
		function check_email_availablity()
		{
			$email = trim($this->input->post('email'));
			$email = strtolower($email);		
			$query = $this->db->query('SELECT * FROM user where email="'.$email.'"');	
			if($query->num_rows() > 0)
				return false;
			else
				return true;
		}
		
		/*****************************
		* 	//  Check Email Availablity
		******************************/
		
		function deleteImage($id) {		 	 
			$this->db->where('id',$id);
			$this->db->update('fm_places',array('image' => ''));	
			return true;
	  }
	  
	  
}
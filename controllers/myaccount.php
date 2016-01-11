<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Myaccount extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('main_model');    
 
	  if($this->session->userdata('logged_in'))
	   {
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];	

	 } else	{			 
		redirect('home', 'refresh');
	   }			
		}			
		
	function index()
	 {
		
		  if($this->session->userdata('logged_in') == true)
	   {
		//$session_data = $this->session->userdata('logged_in');
		//$data['email'] = $session_data['email'];
		redirect('myaccount/myprofile');			   
	 } else	{			 
		redirect('home', 'refresh');
	   }
	 }



	public function myprofile() {
		
		//echo $this->main_model->userfm_place('72','Great');
		//die;
		$data['email'] = $this->session->userdata['logged_in']['email'];
		$myplaces['places'] = $this->main_model->userfm_place($this->session->userdata['logged_in']['id']);

				/*** LOAD FORM TO ADD PLACES **/
				$res['placetype'] = $this->main_model->getPlacetype();
				$res['country'] = $this->main_model->getCountry();
					$this->load->view('common/header');                
					$this->load->view('common/myaccount_header_logo_form',$data);  
					$this->load->view('common/navigation');                		   
//					$this->load->view('myaccount/myaccount',$res);                
					if($this->uri->segment(3) == 'addplace') {						
						$this->load->view('myaccount/myaccount',$res);                
					} else {
						$this->load->view('myaccount/myplaces',$myplaces);                
					} //endif
					$this->load->view('common/footer');         	
	
	/*** (END)LOAD FORM TO ADD PLACES **/
	
//		$_POST = unset('add_place');
		if(isset($_POST['add_place'])) {
			
		$data = array('place_typeID' => $this->sanitize($this->input->post('place_typeID')),
					  'userID'     => $this->session->userdata['logged_in']['id'],
					  //'placename'   => $_POST['placename'],
					  'countryID'	 => $this->sanitize($this->input->post('countryID')),
					  'StateID'     => $this->sanitize($this->input->post('StateID')),
					  'cityID' => $this->sanitize($this->input->post('cityID')),
					  'lon'   => $this->sanitize($this->input->post('lon')),
					  'lat'    => $this->sanitize($this->input->post('lat')),
					  'address'  => $this->sanitize($this->input->post('address')),
					  'description'  => $this->sanitize($this->input->post('description')),
					  'mobile'      => $this->sanitize($this->input->post('mobile')),
					  'landline'      => $this->sanitize($this->input->post('landline')),
					  'rooms' => $this->sanitize($this->input->post('rooms_available')),
					  'facilities' =>$this->sanitize($this->input->post('facilities')),
					  'contact_person' => $this->sanitize($this->input->post('contact_person')),
					  'organisation' => $this->sanitize($this->input->post('organisation')),
					  //'picture' => $filename
					);

	/*		if($_FILES['userfile']['size'] > 0){
				$filename = time().$_FILES['userfile']['name'];
				if(move_uploaded_file($_FILES['userfile']['tmp_name'],'./uploads/'.$filename)){					
					$data['picture'] = $filename;		
				} // endif
			} // endif	
*/
			if(!empty($_FILES['userfile']) && $_FILES['userfile']['tmp_name'] !=''){
				$tmp = explode('.',$_FILES['userfile']['name']);			
				$profile_image = round(microtime(true)).'.'.end($tmp);
				if($_FILES['userfile']['error']==0){
					/* if (is_dir(base_url().'uploads/'.$data['userID'])){  
						 mkdir(base_url().'uploads/'.$data['userID']);
					 }
					 else{
						
					 }*/
					move_uploaded_file($_FILES['userfile']['tmp_name'],"uploads/".$profile_image);
				}
				$data['picture'] = $profile_image;
			}
			
//						echo '<pre>'; print_r($data); die;
			
			if(is_int($this->uri->segment(3)) || $this->uri->segment(3) != 'addplace') {
				$result = $this->main_model->updatefm_Place($data,$this->uri->segment(3));
				//die;
			} else 
			{		
				$result = $this->main_model->insertfm_Place($data);
				redirect('myaccount/myprofile');

			} //endif
		} // endif
	} //end addplace
	 
		
	public function deletePlace(){
			
			if(isset($_POST['action_id'])){
						
					$fm_ID = $_POST['action_id'];
					
					$data = $this->main_model->deletePlace($fm_ID);
						
			}
	
	} // end function deletePlace
	
	public function updatePlace() {
		
			
			$id =  $this->uri->segment(3);
			$data['placetype'] = $this->main_model->getPlacetype();
			$data['country'] = $this->main_model->getCountry();
		//	echo '<pre>'; print_r($data['country']); die;
			$data['state'] = $this->main_model->getState($data['country'][0]['countryID']);
		//	echo '<pre>'; print_r($data['State']); die;
			$data['updateRec'] = $this->main_model->updatePlace($id);
			$data['city'] = $this->main_model->getCity($data['updateRec']['countryID'],$data['updateRec']['StateID']);
			//echo '<pre>'; print_r($data['city']); die;
			
			//echo '<pre>'; print_r($data); die;
					$this->load->view('common/header');                
					$this->load->view('common/myaccount_header_logo_form');                
					$this->load->view('common/navigation');                		   
					$this->load->view('myaccount/myaccount',$data);                
					$this->load->view('common/footer');         	
			
		
	} // end function updatePlace
	
	
	/*****************************
	* 	// Change Password
	******************************/

	function changePassword() {
		 if($this->input->post('old_password')!='' && $this->input->post('new_password') !=''){
			$old_password  =  $this->input->post('old_password');
			$new_password  =  $this->input->post('new_password');
			//print_r($this->session->all_userdata());
			$email = $this->session->userdata['logged_in']['email'];
			$chgPwd =  $this->main_model->changePassword($old_password,$new_password,$email);
			if($chgPwd > 0){				
				$data['pwdMsg'] = "Password Changed Successfully";
				$this->load->view('common/header');                
				$this->load->view('common/myaccount_header_logo_form');                
				$this->load->view('common/navigation');                		   
				$this->load->view('myaccount/change_password',$data);                
				$this->load->view('common/footer');    
			}
			else{
				$data['pwdMsg'] = "Old Password Not Match";
				$this->load->view('common/header');                
				$this->load->view('common/myaccount_header_logo_form');                
				$this->load->view('common/navigation');                		   
				$this->load->view('myaccount/change_password',$data);                
				$this->load->view('common/footer');   
			}
		 }
		 else{
				$this->load->view('common/header');                
				$this->load->view('common/myaccount_header_logo_form');                
				$this->load->view('common/navigation');                		   
				$this->load->view('myaccount/change_password');                
				$this->load->view('common/footer');         	
		 }
		
	}
	
	/*****************************
	* 	// Delete Image
	******************************/
	function deleteImage(){
					if($this->input->post('action_id') != ''){
					echo $fm_ID = $this->input->post('action_id') ;
					$data = $this->main_model->deleteImage($fm_ID);					 
			}
	} 
	/*****************************
	* 	// Sanitize input
	******************************/

	function sanitize($in) {
		$in = addslashes(htmlspecialchars(strip_tags(trim($in))));
		return @mysql_real_escape_string($in);
	}

} 

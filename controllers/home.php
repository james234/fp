<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('email');	
		 if(!$this->session->userdata('logged_in'))
	    {
		// $session_data = $this->session->userdata('logged_in');
		// $data['email'] = $session_data['email'];		 
		// $this->load->view('common/header');                
		// $this->load->view('common/myaccount_header_logo_form',$data);                              
		// $this->load->view('common/navigation');                		   
		// $this->load->view('myaccount/myaccount');                		
		// $this->load->view('common/footer');      		 
	   // }
	   // else
	   // {		  
		// $this->load->view('common/header');
		// $this->load->view('common/header_logo_form');                
		// $this->load->view('common/navigation');                		   
		// $this->load->view('common/slider');                		   		
		// $this->load->view('home');
		// $this->load->view('common/footer');		 
		 // redirect('home', 'refresh');
	   
	   }
	}

		
	function index()
	 {		 
		 
	   if($this->session->userdata('logged_in'))
	   {
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];		 
		$this->load->view('common/header');                
		$this->load->view('common/myaccount_header_logo_form',$data);                              
		// $this->load->view('common/navigation');                		   
		// $this->load->view('myaccount/myaccount');                		
		// $this->load->view('common/footer');      		 
	   }
	   else
	  {		  
		$this->load->view('common/header');
		$this->load->view('common/header_logo_form');                
			 
		// redirect('home', 'refresh');
	   }
	   $this->load->view('common/navigation');                		   
		$this->load->view('common/slider');                		   		
		$this->load->view('home');
		$this->load->view('common/footer');	
	 }
	 
	 /******************************
	*  Verification Email Address
	******************************/
	 function verifyMail($confirmation_code=NULL){  
	 //$confirmation_code = $this->uri->segment(2);	 
	  $noRecords = $this->main_model->verifyEmailAddress($confirmation_code);  
	  if ($noRecords > 0){
	   $error = "Email Verified Successfully!"; 
	  }else{
	   $error = "Sorry Unable to Verify Your Email!"; 
	  }
		  $data['errormsg'] = $error; 		  
		  $this->load->view('common/header');
		  $this->load->view('common/header_logo_form',$data);                			 
		  $this->load->view('common/navigation');                		   
		  $this->load->view('common/slider');                		   		
		  $this->load->view('home');
		  $this->load->view('common/footer');	  
	 }
	 
	 
	/******************************
	*  logout
	******************************/
 
	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();	   
	   redirect('home', 'refresh');
	 }
	
	/******************************
	*  famous_places
	******************************/	
	
	function famous_places(){
		 
	    $data['allplaces'] = $this->main_model->showfm_place(2);
			$this->load->view('common/header');
			 if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
			$this->load->view('common/navigation');                		   
			//$this->load->view('common/slider');                		   
//			if($this->uri->segment(3)){
//				$place['detail'] = $this->main_model->detailfm_place($this->uri->segment(3));
				$place['type'] = 1;
				$place['country'] = $this->main_model->getCountry();
				$this->load->view('placedetail',$place);
			
//			} else {
//				$this->load->view('place',$data);
//			} // endif
			
			//$this->load->view('place',$data);
			$this->load->view('common/footer');	
	}
	
	
	/******************************
	*  dharmshala
	******************************/
	
	function dharmshala(){
	
			$data['allplaces'] = $this->main_model->showfm_place(2);
			$this->load->view('common/header');
			 if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
			$this->load->view('common/navigation');                		   
			//$this->load->view('common/slider');                		   
//			if($this->uri->segment(3)){
//				$place['detail'] = $this->main_model->detailfm_place($this->uri->segment(3));
				$place['type'] = 1;
				$place['country'] = $this->main_model->getCountry();
				$this->load->view('placedetail',$place);
			
//			} else {
//				$this->load->view('place',$data);
//			} // endif
			
			//$this->load->view('place',$data);
			$this->load->view('common/footer');		 
	
	}
	
	/******************************
	*  hotels
	******************************/

	function hotels(){
	
			$data['allplaces'] = $this->main_model->showfm_place(2);
			$this->load->view('common/header');                
			if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
		   $this->load->view('common/navigation');                
			           		   
			//$this->load->view('common/slider');                		   
//			if($this->uri->segment(3)){
//				$place['detail'] = $this->main_model->detailfm_place($this->uri->segment(3));
				$place['type'] = 2;
				$place['country'] = $this->main_model->getCountry();
				$this->load->view('placedetail',$place);
			
//			} else {
//				$this->load->view('place',$data);
//			} // endif
			
			//$this->load->view('place',$data);
			$this->load->view('common/footer');		 
	
	}
	

	
	/******************************
	*  guest_house
	******************************/
	
	function guest_house(){

			$data['allplaces'] = $this->main_model->showfm_place(2);	
			$this->load->view('common/header');                
			if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }	
		   $this->load->view('common/navigation');  			
//			if($this->uri->segment(3)){
//				$place['detail'] = $this->main_model->detailfm_place($this->uri->segment(3));
				$place['type'] = 3;
				$place['country'] = $this->main_model->getCountry();
				$this->load->view('placedetail',$place);
			
//			} else {
//				$this->load->view('place',$data);
//			} // endif
			
			//$this->load->view('place',$data);
			$this->load->view('common/footer');		 
	
	}
	
	/******************************
	*  ticket_booking
	******************************/
	
	function ticket_booking(){
			$data['allplaces'] = $this->main_model->showfm_place(2);			
			$place['type'] = 4;			
			$place['country'] = $this->main_model->getCountry();
			
			$this->load->view('common/header');                
			if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
		   $this->load->view('common/navigation');  
			$this->load->view('placedetail',$place);
			$this->load->view('common/footer');		 
	
	}
	
	/******************************
	*  contact_us
	******************************/	
	function contact_us(){
		$res['data'] = '';
		if(isset($_POST['send'])){
			$name		    = $this->input->post('name');
			$InputEmail     = $this->input->post('InputEmail');
			$mobile 		= $this->input->post('mobile');
			$message		= $this->input->post('message');
			
			$message = "Name = $name <br> Email : $InputEmail <br> Mobile : $mobile <br> Message : $message";
			$this->email->from('support@fp.com', 'fp');
			$this->email->to('mithundhiman@gmail.com');
			$this->email->subject('Contact us');
			$this->email->message($message);
			$this->email->send();
			$res['data'] = CONTACT_US;
		}
		$this->load->view('common/header');
		$this->load->view('common/header_logo_form');                			 
		$this->load->view('common/navigation');                		   		
		$this->load->view('contact_us',$res);
		$this->load->view('common/footer');	
	}

	#Get State per country
	public function showState()
	{ 
		$data = $this->main_model->getState($this->input->post('cid'));		
		foreach($data as $dat){
			
			echo '<option value="'.$dat->StateID.'">'.$dat->StateName.'</option>';
			
		} //endforeach
		
	}
	#Get City per State
	public function showCity()
	{
		$data = $this->main_model->getCity($_POST['cid'],$_POST['sid']);
		
		foreach($data as $dat){
			
			echo '<option value="'.$dat->CityID.'">'.$dat->CityName.'</option>';
			
		} //endforeach
		
	}
	
	public function listPlaces() {
		$fid = $_POST['fid'];
		$data['type']  =  $_POST['fid'];
		if($this->input->post('countryID'))	{	
		$countryID = $this->input->post('countryID');
		$StateID = $this->input->post('StateID');
		$cityID =  $this->input->post('cityID');		
		$data['places'] = $this->main_model->detailfm_place($countryID,$StateID,$cityID,$fid);
		
		//echo '<pre>'; print_r($data['places']); echo '</pre>'; 
		
			//$this->load->view('common/navigation'); 
			//$this->load->view('place',$data);
			if($this->session->userdata('logged_in'))
		        {
					$session_data = $this->session->userdata('logged_in');
					$data['email'] = $session_data['email'];
					$this->load->view('common/myaccount_header_logo_form',$data);                              
		       }
		      else{
				   $this->load->view('common/header_logo_form'); 
		      }
	        $this->load->view('common/navigation'); 
			$this->load->view('placedetail',$data);
			$this->load->view('common/footer');		 
		}
		else{
			
			//$this->load->view('common/navigation'); 				
			$this->load->view('common/header');                
			if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
		   $this->load->view('common/navigation'); 
			$data['noFound'] = "No Result Found";
			$this->load->view('placedetail',$data);
			$this->load->view('common/footer');		 
		}
		
	} // end listHotel
	
	
	/* show the detail of the place */
	public function detail() {
		$id = $this->uri->segment(3);
		$data['places'] = $this->main_model->getDetailOfPlaces($id);	

                       $this->load->view('common/header');                
			if($this->session->userdata('logged_in'))
		   {
			$session_data = $this->session->userdata('logged_in');
			$data['email'] = $session_data['email'];
			$this->load->view('common/myaccount_header_logo_form',$data);                              
		   }
		   else{
			   $this->load->view('common/header_logo_form'); 
		   }
		   $this->load->view('common/navigation'); 
		$this->load->view('place',$data);
		$this->load->view('common/footer');		 
	}
}

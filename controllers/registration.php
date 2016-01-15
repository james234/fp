<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registration extends CI_Controller {

  function __construct()
	{
		parent::__construct();
	  	$this->load->model('main_model');    
		$this->load->helper('url');		
	}
	
	/******************************
	*  Registration Form
	******************************/
	
	public function index()
	{
		$this->load->view('common/header');                
		$this->load->view('common/header_logo_form');                
		$this->load->view('common/navigation');                		   
		$this->load->view('registration_view');                
		$this->load->view('common/footer');                
	}
	
	/******************************
	*  Registration Form Submitted
	******************************/
	
	public function register()
	{
	  $data = array(
		'username' 	=> $this->input->post('InputUserName'),
		'email' 	=> $this->input->post('InputEmail'),
		'password' 	=> md5($this->input->post('InputPassword')),
		'address' 	=> $this->input->post('InputAddress')
	  );
	  
	    $data = array_filter($data);
		$res['data'] = $this->main_model->register($data);		
		$this->load->view('common/header');                
		$this->load->view('common/header_logo_form');                
		$this->load->view('common/navigation');                		   
		$this->load->view('registration_view',$res);                
		$this->load->view('common/footer');                
	}
	
	/******************************
	*  Login Form 
	******************************/
	
	public function login()
	{

				$data = array(
					'email' 	=> $this->input->post('InputEmail'),
					'password' 	=> $this->input->post('InputPassword')
				);	  
				$data = array_filter($data);
				$res['data'] = $this->main_model->login($data);
				
				$res['placetype'] = $this->main_model->getPlacetype();
				$res['country'] = $this->main_model->getCountry();

				//check if username and password is correct
				if (!empty($res['data'])) //active user record is present
				{
					 //set the session variables
					 $sessiondata = array(
						  'id'    => $res['data'][0]->id, 	
						  'email' => $res['data'][0]->email                              
					 );
					$this->session->set_userdata('logged_in',$sessiondata);
/*					$this->load->view('common/header');                
					$this->load->view('common/myaccount_header_logo_form');                
					$this->load->view('common/navigation');                		   
					$this->load->view('myaccount/myaccount',$res);                
					$this->load->view('common/footer');         	
*/
					redirect('myaccount/myprofile');
				}
				else
				{
					$this->session->set_flashdata('error_msg', '<div class="alert alert-danger text-center">Invalid email and password!</div>');
					$data['error_msg'] = $this->session->flashdata('error_msg');
					
					$this->load->view('common/header');                
					$this->load->view('common/header_logo_form');                
					$this->load->view('common/navigation');                		   
					$this->load->view('login_view',$data);                
					$this->load->view('common/footer');         
				}
								
	} // end login		
	
		/*****************************
		* 	//  Check Email Availablity
		******************************/

	function check_email_availablity()
		{
			$get_result = $this->main_model->check_email_availablity();			
			if(!$get_result )
			echo '<span style="color:#f00">Email already in use. </span>';
			else
			echo '<span style="color:#0c0">Email Available</span>';
		}


}	

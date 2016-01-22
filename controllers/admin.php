<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

  function __construct()
	{
		parent::__construct();
	  	$this->load->model('admin_model');
		
		$fnc = $this->uri->segment(2);
        $email = $this->session->userdata('email');
        if ($fnc != 'login' || $fnc == '') {
            if (empty($email)) {
                redirect('admin/login');
            }
        }
        if (!empty($email) && $fnc == 'login') {
            redirect('admin/index');
        }
	}
	
	
    function index()
    {
        $data['file'] = "admin/dashboard";		
        $this->load->view('admin/template', $data);
		
    }
	
	
	/*************************
	* Admin Login
	***********************/	
	function login()
    {
	$email=$this->input->post('email');
	$password=md5($this->input->post('password'));
		
        if ($email) {
            $result = $this->admin_model->login($email,$password);
			
            if ($result['id']) {
                $user_data = $result;				
                $this->session->set_userdata($user_data);
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('warning', 'Please enter valid details.');				
                redirect('admin/login');
            }
        }
        $this->load->view('admin/login');
    }
	
	/****************************
	* User Details
	***************************/
	function users(){
		
		$data['userDetails']  =    $this->admin_model->getUser();
		$data['file'] = 'admin/user/user_detail';
		$this->load->view('admin/template',$data);
	}
	/****************************
	* Get the single user Details
	***************************/
	
	function viewSingleUser(){
		
		$this->admin_model->viewSingleUser($this->input->post('id'));		
		
	}	
	
	/*************************
	* Change Status
	***********************/

	function changestatus()
	{
 		$id=$this->uri->segment(3);
 		$status=$this->uri->segment(4);
		if($status=='N')
		{
			$this->admin_model->changestatus($id,'N');
			$this->session->set_flashdata('status', '<div style="color:green; text-align: center;">'.'User Succesfully Verified'.'</div>');
		}
		else
		{
			$this->admin_model->changestatus($id,'Y');
			$this->session->set_flashdata('status', '<div style="color:green; text-align: center;">'.'User Succesfully Unverified'.'</div>');
		}
		redirect('admin/users');
	}
	
	/***************************************
	* single user MEDIA and FILES Details
	****************************************/
	function viewSingleUserMedia(){
		
		$id = $this->uri->segment(3);
		$data['email'] = $this->admin_model->getUserDetails($id);	
		$data['albums'] = $this->admin_model->viewSingleUserMedia($id);	
                 //print_r($data['albums']);	
                foreach($data['albums'] as $albms){
					$media[] = $this->admin_model->media_file_detail($albms['id']);
                }
               $data['medias'] = @$media;
			   
		$this->load->view('admin/common/header');
		$this->load->view('admin/single_user_media',$data);
		$this->load->view('admin/common/footer');
		
	}
	
	/******************
	* Delete User
	********************/

	function deleteUser(){
		$id = $this->uri->segment(3);
		$this->admin_model->deleteUser($id);
		$this->session->set_flashdata('status', '<div style="color:green; text-align: center;">'.'User Succesfully Deleted'.'</div>');
		redirect('admin/dashboard');

	}
	/******************
	* Offer
	********************/

	function offer(){
	
		$this->load->view('admin/common/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/common/footer');	

	}

	/******************
	* logout
	********************/

	function logout()
	     {
			 
			$this->session->unset_userdata(array('admin'=>'','admin_id'=>'','admin_name'=>''));
			redirect('admin/index');
		 }	


	/******************
	* Create Business
	********************/

	function create_business()
	{
		$this->load->view('admin/common/header');
		$this->load->view('admin/business/create');
		$this->load->view('admin/common/footer');	
		
	}	 


}                           
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Xme extends CI_Controller {

	function __construct(){
		
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
                $this->load->model('auth_model', 'auth');
                $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->model('project_model');
		$this->load->model('group_model');
		$this->load->model('places_model');
		$this->load->model('guest_model');
		$this->load->library('email');
		$this->load->library('session');
		
         if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page 
			redirect('auth/login', 'refresh');
		}
        
    }



	function index(){
	
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "XPLATFORM";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/user_home',$data);
		$this->load->view('include/footer');  

	}
	
	function my_details(){
	
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
				$this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->country_code);
				$query = $this->db->get();
				$country = $query->row();
                $data['user'] = $user;
                $data['country'] = $country;
				 
	    $data['title'] = "MY DETAILS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details',$data);
		$this->load->view('include/footer');  

	}
	
	function SaveUserDetails(){
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		
		$action=$_POST['action'];
		if(!empty($_POST['first_name']) || !empty($_POST['last_name']) || !empty($_POST['salutation']) || !empty($_POST['quick_intro']) || !empty($_POST['gender']) || !empty($_FILES['image']['name'])){
			$userdata['first_name']=$_POST['first_name'];
			$userdata['last_name']=$_POST['last_name'];
			$userdata['salutation']=$_POST['salutation'];
			$userdata['gender']=$_POST['gender']; 
			if(!empty($_POST['quick_intro'])){
				$userdata['quick_intro']=$_POST['quick_intro'];
			}
			
			if(!empty($_FILES['image']['name'])){
				$filename = $_FILES['image']['name'];
				$userdata['avatar'] = $_FILES['image']['name'];
				$uploadurl= './assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$filename;
				move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
			}
		}
		if(!empty($_POST['designation']) || !empty($_POST['company_address']) || !empty($_POST['company']) || !empty($_POST['company_country']) || !empty($_POST['company_postal_code'])){
			
			$userdata['designation']=$_POST['designation'];
			$userdata['company_address']=$_POST['company_address'];
			$userdata['company']=$_POST['company'];
			$userdata['country']=$_POST['company_country'];
			$userdata['pincode']=$_POST['company_postal_code'];
			
		}
		
		if(!empty($_POST['phone']) || !empty($_POST['country_code']) || !empty($_POST['did']) || !empty($_POST['tel']) || !empty($_POST['extension'])){
			
			
			$userdata['phone']=$_POST['phone'];
			$userdata['country_code']=$_POST['country_code'];
			$userdata['did']=$_POST['did'];
			$userdata['tel']=$_POST['tel'];
			$userdata['extension']=$_POST['extension'];
			
		}
		
		if(!empty($userdata)){
			$userdata['last_edit_datetime']=date("Y-m-d G:i:s");
			$userdata['last_edit_ip_address']=$_SERVER['REMOTE_ADDR'];
			$userdata['last_edit_xmanage_id']='XP'.$this->session->userdata('user_id');
			$userdata['last_edit_username']=$this->session->userdata('username');
			$this->auth->SaveUserDetails($userid,$userdata);
		}
		
		
		
		redirect($action);
		 

	}
	
	function my_details_edit(){
	      $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->country_code);
				$query = $this->db->get();
				$country = $query->row();
                $data['user'] = $user;
                $data['country'] = $country;
	
	    $data['title'] = "MY DETAILS EDIT";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_edit',$data);
		$this->load->view('include/footer');  

	}
	
	function my_details_success(){
	      
		$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
               $this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->country_code);
				$query = $this->db->get();
				$country = $query->row();
                $data['user'] = $user;
                $data['country'] = $country;
	    $data['title'] = "MY DETAILS SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_success',$data);
		$this->load->view('include/footer');  

	}
	
	function companyinfo_edit(){
	      
	$userid = $this->session->userdata('user_id');
		$data['CountryCode']  = $this->common->getCountryCode();
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "COMPANY INFO EDIT";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_edit',$data);
		$this->load->view('include/footer');   

	}
	
	function contactinfo_edit(){
	      
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
				$data['CountryCode']  = $this->common->getCountryCode();
	    $data['title'] = "CONTACT INFO EDIT";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_edit',$data); 
		$this->load->view('include/footer');   

	}
	
	function companyinfo_success(){
	            
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->country_code);
				$query = $this->db->get();
				$country = $query->row(); 
                $data['user'] = $user;
                $data['country'] = $country;
	    $data['title'] = "COMPANY INFO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_success',$data);
		$this->load->view('include/footer');   

	}
	
	function contactinfo_success(){
	            
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $this->db->select('*');
				$this->db->from('xf_mst_country');
				$this->db->where('id',$user->country_code);
				$query = $this->db->get();
				$country = $query->row(); 
                $data['user'] = $user;
                $data['country'] = $country;
	    $data['title'] = "CONTACT INFO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_success',$data);
		$this->load->view('include/footer');   

	}      
	
	function contactinfo_deactivate(){
	                 $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "DEACTIVATE INFO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_deactivate',$data);
		$this->load->view('include/footer');   

	} 
	
	
	function contactinfo_account(){
	                 $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "CONTACT INFO ACCOUNT";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account',$data);
		$this->load->view('include/footer');   

	} 
	
	function contactinfo_account_success(){
	                 $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "CONTACT INFO ACCOUNT SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account_success',$data);
		$this->load->view('include/footer');   

	} 
	
	function contactinfo_account_nosuccess(){
	                 $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "CONTACT INFO ACCOUNT NO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account_nosuccess',$data);
		$this->load->view('include/footer');   

	} 
 	
	
	function companyinfo_nosuccess(){
	            $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "COMPANY INFO NO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_nosuccess',$data);   
		$this->load->view('include/footer');   

	}
	
	function contactinfo_nosuccess(){
	            $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "CONTACT INFO NO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_nosuccess',$data);   
		$this->load->view('include/footer');   

	}
	
	function changepassword_nosuccess(){
	            $userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "CHANGE PASSWORD NO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword_nosuccess',$data);      
		$this->load->view('include/footer');   

	}
	
	function changepassword_success(){
		$userid = $this->session->userdata('user_id');

		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$password=$this->ion_auth->hash_password($_POST['password']);
		$result=$this->auth->updatepassword($userid,$password);
		if($result==true){
	    $data['title'] = "CHANGE PASSWORD SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword_success',$data);      
		$this->load->view('include/footer');
		}else{
			$data['title'] = "CHNAGE PASSWORD NO SUCCESS";   
			$this->load->view('include/header', $data);
			$this->load->view('include/menu');
			$this->load->view('xme/changepassword_nosuccess',$data);      
			$this->load->view('include/footer');
		}

	}   
	
	function changenewpassword(){
		$userid = $this->session->userdata('user_id');
		$otp=$_POST['otp'];
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		
		$result=$this->auth->checkuser_otp($userid,$otp);
         if($result==true){
			$data['title'] = "CHNAGE NEW PASSWORD";   
			$this->load->view('include/header', $data);
			$this->load->view('include/menu');
			$this->load->view('xme/changenewpassword',$data);      
			$this->load->view('include/footer');
		 }else{
			$data['msg'] = "PLEASE ENTER VALID OTP.";
			$data['title'] = "CHNAGE PASSWORD";
			$this->load->view('include/header', $data);
			$this->load->view('include/menu');
			$this->load->view('xme/changepassword',$data);
			$this->load->view('include/footer');
		 }
			

	}      
	
	function my_details_nosuccess(){
	      
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "MY DETAILS NO SUCCESS";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_nosuccess',$data);   
		$this->load->view('include/footer');  

	}
	
	function password(){
	
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	    $data['title'] = "PASSWORD";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/password',$data);
		$this->load->view('include/footer');  

	}
	
	function changepassword(){
		
	$userid = $this->session->userdata('user_id');
		$this->ion_auth->resendOtp($userid);
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	 
	    $data['title'] = "CHNAGE PASSWORD";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword',$data);
		$this->load->view('include/footer');  

	}
	
	function deactivate_account(){
		
		$userid = $this->session->userdata('user_id');
		
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
	  
	    $data['title'] = "DEACTIVATE ACCOUNT";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/deactivate_account',$data);
		$this->load->view('include/footer');  

	}
	
	function deactivate_account_otp(){
		
		$userid = $this->session->userdata('user_id');
		$this->ion_auth->resendOtp($userid);
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
	  
	    $data['title'] = "DEACTIVATE ACCOUNT";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/deactivate_account_otp',$data);
		$this->load->view('include/footer');  

	}
	
	function deactivate_account_success(){
		$userid = $this->session->userdata('user_id');
		$otp=$_POST['otp'];
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		
		$result=$this->auth->checkuser_otp($userid,$otp);
         if($result==true){
			$userdata['active']=0;
			$userdata['last_edit_datetime']=date("Y-m-d G:i:s");
			$this->auth->SaveUserDetails($userid,$userdata);
			$data['title'] = "DEACTIVATE ACCOUNT SUCCESS";   
			$this->load->view('include/header', $data);
			$this->load->view('include/menu');
			$this->load->view('xme/deactivate_account_success',$data);      
			$this->load->view('include/footer');
		 }else{
			redirect('/xme/deactivate_account_nosuccess');
		 }
			

	}
	
	function deactivate_account_nosuccess(){
		$userid = $this->session->userdata('user_id');
		$otp=$_POST['otp'];
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;

		$data['title'] = "DEACTIVATE ACCOUNT NOT SUCCESS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/deactivate_account_nosuccess',$data);
		$this->load->view('include/footer');
		 
	}
	
	
	 
	function registration(){
	
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['projects'] = $this->places_model->myProjectsById(NULL,$userid);
                $data['user'] = $user;
	    $data['title'] = "REGISTRATION";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/registration',$data);
		$this->load->view('include/footer');  

	}
}

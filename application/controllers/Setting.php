<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Setting extends CI_Controller {

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
		$this->load->model('Setting_model');
		$this->load->model('guest_model');
		$this->load->library('email');
		$this->load->library('session');
         
        
    }



	function index(){
	
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/index',$data);

	}
	
	function teams_of_use(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/teams_of_use',$data);

	}
	
	function addteams(){
	
	   $data['data1'] = $this->Setting_model->checkentryornot();
	   $data['title'] = "XPLATFORM";
		$this->load->view('setting/addteams',$data);

	}
	function addterms_success(){
	
	   $data['data1'] = $this->Setting_model->checkentryornot();
	   $data['title'] = "XPLATFORM";
		$this->load->view('setting/addterms_success',$data);

	}
	
	function addterms_post($id=false)
	{
		$array = array();
		$record=$this->Setting_model->checkentryornot();
		if(empty($record)){
			$array['terms_of_use']=$this->input->post('terms_of_use');
			$array['created_at']=date("Y-m-d G:i:s");
			$array['updated_at']=date("Y-m-d G:i:s");
			$lastId=$this->Setting_model->insert($array);
			if($lastId){
				echo $lastId; 
				
			}
		}else{
			$array['terms_of_use']=$this->input->post('terms_of_use');
			$array['updated_at']=date("Y-m-d G:i:s");
			$result=$this->Setting_model->UpdateData($array);
			echo true;
		}
			
	}
	
	
	function privacy_policy(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/privacy_policy',$data);

	}
	
	function addprivacy_policy(){
	
	   $data['data1'] = $this->Setting_model->checkentryornot();
	   $data['title'] = "XPLATFORM";
		$this->load->view('setting/addprivacy_policy',$data);

	}
	
	function addprivacy_policy_post($id=false)
	{
		$array = array();
		$record=$this->Setting_model->checkentryornot();
		if(empty($record)){
			$array['privacy_policy']=$this->input->post('privacy_policy');
			$array['created_at']=date("Y-m-d G:i:s");
			$array['updated_at']=date("Y-m-d G:i:s");
			$lastId=$this->Setting_model->insert($array);
			if($lastId){
				echo $lastId; 
				
			}
		}else{
			$array['privacy_policy']=$this->input->post('privacy_policy');
			$array['updated_at']=date("Y-m-d G:i:s");
			$result=$this->Setting_model->UpdateData($array);
			echo true;
		}
			
	}
	
	function privacy_policy_success(){
	
	   $data['data1'] = $this->Setting_model->checkentryornot();
	   $data['title'] = "XPLATFORM";
		$this->load->view('setting/privacy_policy_success',$data);

	}
	
	
	function logo(){
	
		$data['data1'] = $this->Setting_model->checkentryornot();
		$data['title'] = "XPLATFORM";
		$this->load->view('setting/logo',$data);

	}
	
	function addlogo(){
	
		$data['data1'] = $this->Setting_model->checkentryornot();
		$data['title'] = "XPLATFORM";
		$this->load->view('setting/add_logo',$data);

	}
	
	function set_default_logo(){
	
		$array['new_logo']=NULL;
		$result=$this->Setting_model->UpdateData($array); 
			echo true;
		

	}
	
	function addlogo_post($id=false)
	{
		$array = array();
		$record=$this->Setting_model->checkentryornot();
		if(empty($record)){
			
			$filename=$_FILES['new_logo']['name'];
			$array['new_logo']=$_FILES['new_logo']['name'];
			$uploadurl= './assets/images/'.$filename;
			move_uploaded_file($_FILES['new_logo']['tmp_name'],$uploadurl);
			$array['created_at']=date("Y-m-d G:i:s");
			$array['updated_at']=date("Y-m-d G:i:s");
			$lastId=$this->Setting_model->insert($array);
			if($lastId){
				echo $lastId; 
				
			}
		}else{
			$filename=$_FILES['new_logo']['name'];
			$array['new_logo']=$_FILES['new_logo']['name'];
			$uploadurl= './assets/images/'.$filename;
			move_uploaded_file($_FILES['new_logo']['tmp_name'],$uploadurl);
			$array['updated_at']=date("Y-m-d G:i:s");
			$result=$this->Setting_model->UpdateData($array);
			echo true;
		}
			
	}
	
	function logo_success(){
	
		$data['data1'] = $this->Setting_model->checkentryornot();
		$data['title'] = "XPLATFORM";
		$this->load->view('setting/logo_success',$data);

	}
	
	function header_homepage(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/header_homepage',$data);

	}
	function set_default_header(){
	
		$array['headerhome_where_do_u_wish_to_go']=1;
		$array['xplatform_whats_hot']=1;
		$array['xconnect_whats_new']=1;
		$result=$this->Setting_model->UpdateData($array); 
			echo true;
		

	}
	
	function addheader_homepage(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/addheader_homepage',$data);

	}
	
	
	function addheader_homepage_post($id=false)
	{
		$array = array();
		
		$record=$this->Setting_model->checkentryornot();
		if(empty($record)){
			if($_POST['check1']==1){ 
				$check1=1;
			}else{ $check1=NULL; }
			if($_POST['check2']==1){ 
				$check2=1;
			}else{ $check2=NULL; }
			if($_POST['check3']==1){ 
				$check3=1;
			}else{ $check3=NULL; }
			$array['headerhome_where_do_u_wish_to_go']=$check1;
			$array['xplatform_whats_hot']=$check2;
			$array['xconnect_whats_new']=$check3;
			$array['created_at']=date("Y-m-d G:i:s");
			$array['updated_at']=date("Y-m-d G:i:s");
			$lastId=$this->Setting_model->insert($array);
			if($lastId){
				echo $lastId; 
				
			}
		}else{
			if($_POST['check1']==1){ 
				$check1=1;
			}else{ $check1=NULL; }
			if($_POST['check2']==1){ 
				$check2=1;
			}else{ $check2=NULL; }
			if($_POST['check3']==1){ 
				$check3=1;
			}else{ $check3=NULL; }
			$array['headerhome_where_do_u_wish_to_go']=$check1;
			$array['xplatform_whats_hot']=$check2;
			$array['xconnect_whats_new']=$check3;
			$array['updated_at']=date("Y-m-d G:i:s");
			$result=$this->Setting_model->UpdateData($array);
			echo true;
		}
			
	}
	
	function header_homepage_success(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/header_homepage_success',$data);

	}
	
	function header_explore(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/header_lets_explore',$data);

	}
	
	function addexplore(){
		$data['data1'] = $this->Setting_model->checkentryornot();
	    $data['title'] = "XPLATFORM";
		$this->load->view('setting/header_add_explore',$data);

	}
	function explore_success(){
	
	   $data['data1'] = $this->Setting_model->checkentryornot();
	   $data['title'] = "XPLATFORM";
		$this->load->view('setting/explore_success',$data);

	}
	function addexplore_post($id=false)
	{
		$array = array();
		
		$record=$this->Setting_model->checkentryornot();
		if(empty($record)){
			
			
			$array['header_lets_explore_title']=$_POST['header_lets_explore_title'];
			$array['created_at']=date("Y-m-d G:i:s");
			$array['updated_at']=date("Y-m-d G:i:s");
			$lastId=$this->Setting_model->insert($array);
			if($lastId){
				echo $lastId; 
				
			}
		}else{
			
			$array['header_lets_explore_title']=$_POST['header_lets_explore_title'];
			
			$array['updated_at']=date("Y-m-d G:i:s");
			$result=$this->Setting_model->UpdateData($array);
			echo true;
		}
			
	}
	
	
	
}

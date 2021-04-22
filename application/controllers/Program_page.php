<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_page extends CI_Controller {

	function __construct(){
        parent::__construct();
         $this->load->database();
		$this->load->library('form_validation');
                $this->load->model('auth_model', 'auth');
                $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->model('zone_model');
		$this->load->model('content_model');
		$this->load->model('floor_model');
		$this->load->model('project_model');
		$this->load->model('post_model');
		$this->load->model('group_model');
		$this->load->model('Audio_model');
		$this->load->model('Ondemand_model');
		$this->load->model('Program_model');
		$this->load->model('Video_model');
		$this->load->model('Places_model');
		$this->load->model('ProgramFront_model','p_model');
		$this->load->library('email');
		$this->load->library('session');
                		// if (!$this->ion_auth->logged_in())
		// {
			
			// redirect('auth/login', 'refresh');
		// }
       
    }
	
	public function index($project=0,$floor=0)
	{
		// print_r($project);
		// die;
		if(empty($project)){
			$data['No_registerUser']='<p class="pl-kkc">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
		}
		
		if(!empty($project)){
			$check=$this->Places_model->FetchProjectTypeId($project);
			
			$project_type=$check->project_type;
			if($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED'){
				
				if (!$this->ion_auth->logged_in())
					{
						
						$projectdata=$this->project_model->FetchSecDataById($project);
							$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
							$data['No_registerUser_condition']=true;
					}else{
						
						if(!empty($project)){ 
							
								
								// if (!$this->ion_auth->logged_in())
									// {
										// redirect('auth/login', 'refresh');
									// }
									$user_id = $this->session->userdata('user_id');
									if(!empty($user_id)){  
										
										$No_registerUser=$this->Places_model->checkNo_registerUser($user_id,$project);
										
										if($No_registerUser==false){
											
											$projectdata=$this->project_model->FetchSecDataById($project);
											$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
											$data['No_registerUser_condition']=true;
										}else{
											
											$data['No_registerUser']='';
										}
									} 
							
							
						}
					} 
					
			}else{
				$data['No_registerUser']='';
				$data['No_registerUser_condition']=false;
				// if ($this->ion_auth->logged_in())
					// {
						// $data['No_registerUser_condition']=false;
					// }
			}
			
		}else{
			$data['No_registerUser_condition']=true;
		}
		
		
		
		
				
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if($this->session->userdata('checkdata')==TRUE){
			
			if($user->check_user1!=1){ 
				redirect('places/places_step1');
			}
			if($user->check_user2!=1){ 
				redirect('places/places_step2');
			}
			
		}
		
		
		
		$this->session->set_userdata('checkdata',false);
		if($project>0)
		{
			$data['programs'] = $this->p_model->FetchProjectById($project);
		}
		// else{
			
			// $data['programs'] = $this->p_model->FetchProject($project);
		// }
		if($project!=0 && empty($data['No_registerUser'])){
		$data['floors']=$this->Places_model->getFloorPlanbyProject($project);
		}else{
			$data['floors']=0;
		}
		$project_name=$this->p_model->getProjectNamebyProjectId($project);
		
		$data['project_name']=$project_name->project_name;
		if(count($data['floors'])==1){
			$id=$data['floors'][0]->id;
			
		}elseif(!empty($floor)){
			$id=$floor; 
		}else{
			$id=$data['floors'][0]->id; 
		}
		
		$res=$this->floor_model->FetchDataById($id);
		if($res){
		$Img=base_url().'assets/floor_plan/'.$res->file_name . $res->file_type;
		}else{
			$Img=0;
		}
		$floor_plan_drop_point=explode(',',$res->floor_plan_drop_point);
		
		$data['floor']=$id; 
		$data['project']=$project;
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		
		if($project>0 && $floor>0){
		$history['ip_address']=$_SERVER['REMOTE_ADDR'];
		$history['project_id']=$project;
		$history['floor_plan_id']=$floor;
		//print_r($history);die;
		$GetHistory=$this->Places_model->FetchHistoryById($history);
		//print_r($GetHistory);die;
			if(!empty($GetHistory)){
				$activity=$GetHistory->activity;  
				$activity1=explode(',',$activity);
				$left=$activity1[1]-26;
				if($left >0){
					$myleft=$left;
				}else{
					$myleft=0;
				}
				$data['left']=$myleft;
				
				$da=$floor_plan_drop_point[1]/2;
				$top=$activity1[0]-$da+100;
				if($top >0){
					$mytop=$top;
				}else{
					$mytop=0;
				}
				$data['top']=$mytop;
			}
		}
		
		$data['title'] = "PROGRAM";
		$this->load->view('include/header', $data);
		 $this->load->view('include/menu');
		 $this->load->view('program_page/program');
		 $this->load->view('include/footer');
	}
	
	public function redirectanother($project=0,$floor=0)
	{
		// print_r($project);
		// die;
		if(empty($project)){
			$data['No_registerUser']='<p class="pl-kkc">FOR YOUR CONTROLS TO WORK, A PLACE MUST BE SELECTED FIRST.</p>';
		}
		
		if(!empty($project)){
			$check=$this->Places_model->FetchProjectTypeId($project);
			
			$project_type=$check->project_type;
			if($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED'){
				
				if (!$this->ion_auth->logged_in())
					{
						
						$projectdata=$this->project_model->FetchSecDataById($project);
							$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
							$data['No_registerUser_condition']=true;
					}else{
						
						if(!empty($project)){ 
								// if (!$this->ion_auth->logged_in())
									// {
										// redirect('auth/login', 'refresh');
									// }
									$user_id = $this->session->userdata('user_id');
									if(!empty($user_id)){  
										
										$No_registerUser=$this->Places_model->checkNo_registerUser($user_id,$project);
										
										if($No_registerUser==false){
											
											$projectdata=$this->project_model->FetchSecDataById($project);
											$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
											$data['No_registerUser_condition']=true;
										}else{
											
											$data['No_registerUser']='';
										}
									} 
						}
					} 
					
			}else{
				$data['No_registerUser']='';
				$data['No_registerUser_condition']=false;
				// if ($this->ion_auth->logged_in())
					// {
						// $data['No_registerUser_condition']=true;
					// }
			}
			
		}else{
			$data['No_registerUser_condition']=true;
		}
		
		
				
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if($this->session->userdata('checkdata')==TRUE){ 
			
			if($user->check_user1!=1){ 
				redirect('places/places_step1');
			}
			if($user->check_user2!=1){ 
				redirect('places/places_step2');
			}
			
		}
		
		
		
		$this->session->set_userdata('checkdata',false);

		if($project>0)
		{
			$data['programs'] = $this->p_model->FetchProjectById($project);
		}
		// else{
			
			// $data['programs'] = $this->p_model->FetchProject($project);
		// }
		if($project!=0 && empty($data['No_registerUser'])){
		$data['floors']=$this->Places_model->getFloorPlanbyProject($project);
		}else{
			$data['floors']=0;
		}
		$project_name=$this->p_model->getProjectNamebyProjectId($project);
		
		$data['project_name']=$project_name->project_name;
		if(count($data['floors'])==1){
			$id=$data['floors'][0]->id;
			
		}elseif(!empty($floor)){
			$id=$floor; 
		}else{
			$id=$data['floors'][0]->id; 
		}
		
		$res=$this->floor_model->FetchDataById($id);
		if($res){
		$Img=base_url().'assets/floor_plan/'.$res->file_name . $res->file_type;
		}else{
			$Img=0;
		}
		$floor_plan_drop_point=explode(',',$res->floor_plan_drop_point);
		$data['floor']=$id; 
		$data['project']=$project;
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		
		if($project>0 && $floor>0){
		$history['user_id']=$this->session->userdata('user_id');
		$history['project_id']=$project;
		$history['floor_plan_id']=$floor;
		$GetHistory=$this->Places_model->FetchHistoryById($history);
		$data['GetHistory']=$GetHistory;
		//print_r($GetHistory);die;
			if(!empty($GetHistory)){
				$activity=$GetHistory->activity;  
				$activity1=explode(',',$activity);
				$left=$activity1[1]-26;
				if($left >0){
					$myleft=$left;
				}else{
					$myleft=0;
				}
				$data['left']=$myleft;
				
				$da=$floor_plan_drop_point[1]/2;
				$top=$activity1[0]-$da+100;
				if($top >0){
					$mytop=$top;
				}else{
					$mytop=0;
				}
				$data['top']=$mytop;
			}
		}
		
		$data['title'] = "PROGRAM";
		$this->load->view('include/header', $data);
		 $this->load->view('include/menu');
		 $this->load->view('program_page/program');
		 $this->load->view('include/footer');
	}
	
	public function proceed($project=0,$floor=0,$program=0)
	{
		
		
		if($project>0)
		{
			$data['programs'] = $this->p_model->FetchProjectById($project);
		}
		// else{
			
			// $data['programs'] = $this->p_model->FetchProject($project);
		// }
		if($project!=0){
		$data['floors']=$this->Places_model->getFloorPlanbyProject($project);
		}else{
			$data['floors']=0;
		}
		$project_name=$this->p_model->getProjectNamebyProjectId($project);
		
		$data['project_name']=$project_name->project_name;
		if(count($data['floors'])==1){
			$id=$data['floors'][0]->id;
			
		}elseif(!empty($floor)){
			$id=$floor; 
		}else{
			$id=$data['floors'][0]->id; 
		}
		
		$res=$this->floor_model->FetchDataById($id);
		if($res){
		$Img=base_url().'assets/floor_plan/'.$res->file_name . $res->file_type;
		}else{
			$Img=0;
		}
		$floor_plan_drop_point=explode(',',$res->floor_plan_drop_point);
		
		$data['floor']=$floor;
		$data['project']=$project;
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		
		if($project>0 && $floor>0){
		$history['user_id']=$this->session->userdata('user_id');
		$history['project_id']=$project;
		//$history['floor_plan_id']=$floor;
		$GetHistory=$this->Places_model->FetchHistoryById($history);
		$data['GetHistory']=$GetHistory;
			// if(!empty($GetHistory)){
				// $activity=$GetHistory->activity;
				// $activity1=explode(',',$activity);
				// $data['left']=$activity1[0]-21;
				
				// $da=$floor_plan_drop_point[1]/2;
				// $data['top']=$activity1[1]-$da-8;
			// }
		}
		$array['id']=$program; 
		$myprogram=$this->p_model->FetchFloorDataById($array);
		
		$position=json_decode($myprogram->program_position);
		$data['myprogram']=$myprogram;
		$data['ProgramTop']=$position->top;
		$data['ProgramLeft']=$position->left;
		$data['proceed'] = true;
		$data['title'] = "PROGRAM";
		$this->load->view('include/header', $data);
		 $this->load->view('include/menu');
		 $this->load->view('program_page/program');
		 $this->load->view('include/footer');
	}
	
	
	public function GetFloorByProgram() 
	{
		$data['floor_plan_id']=$_POST['floor_id']; 
		$data['id']=$_POST['id']; 
		$floor=$this->p_model->FetchFloorDataById($data);
		$position=json_decode($floor->program_position);
		$dyTopPos=$position->top;
		$dyLeftPos=$position->left;

		if(in_array($dyTopPos, range(0, 690)) && in_array($dyLeftPos, range(0, 1280))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+54;
			$Fleft=$dyLeftPos-379;
		}

		if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(0, 200))) {
			$popupAI=rand(1000,9999);
			// $Ftop=$dyTopPos+163;
			// $Fleft=$dyLeftPos+114;
			$Ftop=$dyTopPos+261;
			$Fleft=$dyLeftPos+34;
			
		}
		if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(0, 200))) {
			$popupAI=rand(1000,9999);
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+61;
			$Fleft=$dyLeftPos+36;
			
		}
		if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(201, 500))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+63; 
			$Fleft=$dyLeftPos+36; 
		}
		if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(501, 1000))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+56;
			$Fleft=$dyLeftPos-381; 
		}
		if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(1001, 1280))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+56;
			$Fleft=$dyLeftPos-379;
		}
		if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(951, 1280))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+259;
			$Fleft=$dyLeftPos-384;
		}
		if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(501, 950))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+255;   
			$Fleft=$dyLeftPos+37; 
		}
		if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(201, 500))) {
			$popupAI=rand(1000,9999);
			$Ftop=$dyTopPos+257;
			$Fleft=$dyLeftPos+34;
		}
		
		$data['popupAI']=$popupAI;
		$data['Ftop']=$Ftop;
		$data['Fleft']=$Fleft;
		$data['top']=$position->top;
		$data['left']=$position->left;
		echo json_encode($data);
		
	}
	
	public function placeByzone() 
	{
		$grid_val=$_POST['grid_val']; 
		$floorId=$_POST['floorId']; 
		$floor=$this->Places_model->FetchFloorDataById($floorId);
		$zone=$this->Places_model->placeByzoneName($floor->floor_plan_id,$grid_val);
		$data['zone_type']=$zone->zone_type;
		$data['zone_name']=$zone->zone_name;
		echo json_encode($data);
		
	}
	 
	
	
	
	
}

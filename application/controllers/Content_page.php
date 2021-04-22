<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Content_page extends CI_Controller {

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
		$this->load->model('ContentFront_model','c_model');
		$this->load->library('email');
		$this->load->library('session');
                		// if (!$this->ion_auth->logged_in())
		// {
			
			// redirect('auth/login', 'refresh');
		// }
        
    } 
	
	public function index($project=0,$floor=0)
	{
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
							$check=$this->Places_model->FetchProjectTypeId($project);
							$project_type=$check->project_type;
							if($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED'){
								
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
							else{
								
								if ($this->ion_auth->logged_in())
									{
										
										$data['No_registerUser_condition']=false;
									}else{
										$data['No_registerUser']='';
									}
								
								
							}
						}
					} 
					
			}else{
				
				if ($this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=false;
					}
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
			$data['contents'] = $this->c_model->FetchContentById($project);
			$data['videos'] = $this->c_model->FetchVideoById($project);
			$data['audios'] = $this->c_model->FetchAudioById($project);
		}
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
		$data['project_id']=$project;
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		if($project>0 && $floor>0){
		$history['ip_address']=$_SERVER['REMOTE_ADDR'];
		$history['project_id']=$project;
		$history['floor_plan_id']=$floor;
		//print_r($history);die;
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

		 $data['title'] = "CONTENT";
		$this->load->view('include/header', $data);
             $this->load->view('include/menu');
             $this->load->view('content_page/content');
             $this->load->view('include/footer');
	}
	 
	public function redirectanother($project=0,$floor=0)
	{
		
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
							$check=$this->Places_model->FetchProjectTypeId($project);
							$project_type=$check->project_type;
							if($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED'){
								
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
							else{
								
								if ($this->ion_auth->logged_in())
									{
										
										$data['No_registerUser_condition']=false;
									}else{
										$data['No_registerUser']='';
									}
								
								
							}
						}
					} 
					
			}else{
				
				if ($this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=false;
					}
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
			$data['contents'] = $this->c_model->FetchContentById($project);
			$data['videos'] = $this->c_model->FetchVideoById($project);
			$data['audios'] = $this->c_model->FetchAudioById($project);
		}
		
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
		$data['project_id']=$project; 
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		$data['selected_project_type'] = $project_type;
		if($project>0 && $floor>0){
		$history['user_id']=$this->session->userdata('user_id');
		$history['project_id']=$project;
		$history['floor_plan_id']=$floor;
		$GetHistory=$this->Places_model->FetchHistoryById($history);
		$data['GetHistory']=$GetHistory;
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
		
		$data['title'] = "CONTENT";
		$this->load->view('include/header', $data);
		 $this->load->view('include/menu');
		 $this->load->view('content_page/content');
		 $this->load->view('include/footer');
	}
	
	public function GetContentById()  
	{
		$id=$_POST['id']; 
		$demand=$this->c_model->OnContentById($id);
		if($demand){
		$data['file_name']=base_url().'assets/on_demand_content/'.$demand->oncontent_file_name;
		$data['file_size']=$demand->oncontent_file_size; 
		$data['file_type']=$demand->oncontent_type; 
		echo json_encode($data);
		}else{
			
		}
		
	}
	
	public function GetVideoById()  
	{
		$id=$_POST['id']; 
		$video=$this->c_model->VideStreamById($id);
		// $url=$video->video_stream_url;
		// if (preg_match('/\Stream Not Available\b/', $this->get_data($url))) {
			// echo 'No Stream Available';
		// }else{
			// echo $url;
		// }
		if($video){
		echo $video->video_stream_url;
		}else{
			
		}
		
	}
	public function GetAudioById()  
	{
		$id=$_POST['id']; 
		$audio=$this->c_model->AudioStreamById($id);
		$url=$audio->audio_stream_url;
		if (preg_match('/\Stream Not Available\b/', $this->get_data($url))) {
			echo 'No Stream Available';
		}else{
			echo $url;
		}
		// if($audio){
		// echo $audio->audio_stream_url;
		// }else{
			
		// }
		
	}
	
	function get_data($url)
	{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return json_encode(strip_tags($data));
	}
	
	
	
}

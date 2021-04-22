<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Places extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
                $this->load->model('auth_model', 'auth');
                $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('Common_model','common');
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
                		
		
		
    }
	
	public function index($project=0,$floor=0,$project_type1=0)
	{
		// if($this->common->userStatus() == 0)
		// {
			// redirect('home/config', 'refresh');
		// }
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
							if($projectdata->project_show_homepage=='no'){
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
								$data['No_registerUser_condition']=true;
							}else{
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
								$data['No_registerUser_condition']=true;
							}
					}else{
						if(!empty($project)){ 
								// if (!$this->ion_auth->logged_in())
									// {
										// redirect('auth/login', 'refresh');
									// }
									$user_id = $this->session->userdata('user_id');
									if(!empty($user_id)){  
										
										$No_registerUser=$this->Places_model->checkNo_registerUser($user_id,$project);
										//$get_registerUser=$this->Places_model->get_registerUser($user_id,$project);
										//print_r($No_registerUser);die;
										if($No_registerUser==false){
											//print_r('if');die;
											$projectdata=$this->project_model->FetchSecDataById($project);
											if($projectdata->project_show_homepage=='no'){
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
												$data['No_registerUser_condition']=true;
											}else{
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
												$data['No_registerUser_condition']=true;
											}
											
										}else{
											 
											$url = MMURL."users/login";
											$post_data = array (
												"login_id" => $No_registerUser->mm_email,
												"password" => 'Xfactor@12345'
											);
											$ch = curl_init();
				 
											curl_setopt($ch, CURLOPT_URL, $url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_HEADER, 1);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
											$response = curl_exec($ch);
											$header_text = substr($response, 0, strpos($response, "\r\n\r\n"));
							
											foreach (explode("\r\n", $header_text) as $i => $line)
												if ($i === 0)
													$headers['http_code'] = $line;
												else
												{
													list ($key, $value) = explode(': ', $line);
							
													$headers[$key] = $value;
												}
											$this->session->set_userdata('token',$headers['Token']);
											curl_close($ch);
											$this->session->set_userdata('loggedin',$No_registerUser->mm_id);
											// echo 'mm id for the user ',$No_registerUser->mm_id;
											// print_r($this->session->set_userdata('loggedin',$No_registerUser->mm_id));die;
											$projectdata=$this->project_model->FetchSecDataById($project);
											if($projectdata->project_show_homepage=='no'){
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
												$data['No_registerUser_condition']=true;
											}else{
												
												$data['No_registerUser']='';
											}
											
										}
									} 
						}
					}
					
			}else{
				
				if ($this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=false;

						// For no Registration required type of project user registration proccess starts here. 

						$user_id = $this->session->userdata('user_id');
						$project_id = $project;
						$userinstance = $this->common->getuserByUserId($user_id);
						$user_table_check = $this->common->getChatUsersByProjectUser($user_id,$project_id);
						$project_details = $this->project_model->FetchSecDataById($project_id);
						$guesttabledetail = $this->common->getGuestUserDetail($user_id,$project_id);
						
						if(empty($guesttabledetail)){
							if(empty($user_table_check)){
								$mmregister = mmNoRegUserSignUp($user_id,$userinstance->username,$project_id);
								$data = array(
									"xmanage_id" => $userinstance->xmanage_id,
									"group_id" => $project_details->group_id,
									"project_id" => $project_id,
									"user_id" => $user_id,
									"mm_id" => $mmregister['mm_id'],
									"mm_username" => $mmregister['mm_username'],
									"mm_email" => $mmregister['mm_email']
								);
								$adduser = $this->common->AddChatUser($data);
								$login = mmlogin($mmregister['mm_email']);
								$this->session->set_userdata('token',$login);
								$this->session->set_userdata('loggedin',$mmregister['mm_id']);
							}
							else{
								$login = mmlogin($user_table_check->mm_email);
								$this->session->set_userdata('token',$login);
								$this->session->set_userdata('loggedin',$user_table_check->mm_id);
							}
						}
						else{
							$No_registerUser = $this->common->getGuestUserDetail($user_id,$project_id);
							$login = mmlogin($No_registerUser->mm_email);
							$this->session->set_userdata('token',$login);
							$this->session->set_userdata('loggedin',$No_registerUser->mm_id);
						}

					}
					$projectdata=$this->project_model->FetchSecDataById($project);
											if($projectdata->project_show_homepage=='no'){
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
												$data['No_registerUser_condition']=true;
											}else{
												
												$data['No_registerUser']='';
											}
			}
			
		}else{
								
			$data['No_registerUser_condition']=true;
			
		}
		
		
		
		
		$this->session->set_userdata('project_id',$project);
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if($this->session->userdata('checkdata')==TRUE){
			
			if($user->check_user1!=1){ 
				redirect('places/places_step1');
			}
			if($user->check_user2!=1){ 
				redirect('places/places_step2');
			}
			// if($user->check_user1==1 && $user->check_user2==1){
				// redirect('places'); 
			// }
		}
		
		
		
		$this->session->set_userdata('checkdata',false);
		
		if(($_POST['project_type'])){
			$project_type1=$_POST['project_type'];
		}else{
			$project_type1=urldecode($project_type1);
		}
		
		if($project_type1!==0)
		{
			$data['projects'] = $this->Places_model->FetchProjectById($project_type1);
		}
		else
		{
			$data['projects'] = $this->Places_model->FetchAllProject();
		}
		// print_r($data['projects']);
		// die;
		if($this->ion_auth->logged_in()){
				$email=$this->session->userdata('email');
				$user_id=$this->session->userdata('user_id');
				$data['myprojects'] = $this->Places_model->myProjectsById($email,$user_id);
				
			}
			$this->session->set_userdata('project',$project);
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
		$data['selected_project_type'] = $project_type1;
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
		
		$data['title'] = " LET'S EXPLORE";
		$this->load->view('include/header', $data);
		 
		 $this->load->view('include/menu');
		 $this->load->view('places/places',$data);
		 $this->load->view('include/footer');
	}
	
	public function redirectanother($project=0,$floor=0,$project_type1=0)
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
							if($projectdata->project_show_homepage=='no'){
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
								$data['No_registerUser_condition']=true;
							}else{
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
								$data['No_registerUser_condition']=true;
							}
							
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
												if($projectdata->project_show_homepage=='no'){
													$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
													$data['No_registerUser_condition']=true;
												}else{
													$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
											$data['No_registerUser_condition']=true; 
												}
											
										}else{
											$url = MMURL."users/login";
											$post_data = array (
												"login_id" => $No_registerUser->mm_email,
												"password" => 'Xfactor@12345'
											);
											$ch = curl_init();
				 
											curl_setopt($ch, CURLOPT_URL, $url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_HEADER, 1);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
											$response = curl_exec($ch);
											//print_r($response);
											$header_text = substr($response, 0, strpos($response, "\r\n\r\n"));
							
											foreach (explode("\r\n", $header_text) as $i => $line)
												if ($i === 0)
													$headers['http_code'] = $line;
												else
												{
													list ($key, $value) = explode(': ', $line);
							
													$headers[$key] = $value;
												}
											$this->session->set_userdata('token',$headers['Token']);
											curl_close($ch);
											$this->session->set_userdata('loggedin',$No_registerUser->mm_id);
											$projectdata=$this->project_model->FetchSecDataById($project);
											if($projectdata->project_show_homepage=='no'){
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
												$data['No_registerUser_condition']=true;
											}else{
												
												$data['No_registerUser']='';
											}
										}
									} 
						}
					}
					
			}else{
				
				if ($this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=false;
						// For no Registration required type of project user registration proccess starts here. 

						$user_id = $this->session->userdata('user_id');
						$project_id = $project;
						$userinstance = $this->common->getuserByUserId($user_id);
						$user_table_check = $this->common->getChatUsersByProjectUser($user_id,$project_id);
						$project_details = $this->project_model->FetchSecDataById($project_id);
						$guesttabledetail = $this->common->getGuestUserDetail($user_id,$project_id);
						
						if(empty($guesttabledetail)){
							if(empty($user_table_check)){
								$mmregister = mmNoRegUserSignUp($user_id,$userinstance->username,$project_id);
								$data = array(
									"xmanage_id" => $userinstance->xmanage_id,
									"group_id" => $project_details->group_id,
									"project_id" => $project_id,
									"user_id" => $user_id,
									"mm_id" => $mmregister['mm_id'],
									"mm_username" => $mmregister['mm_username'],
									"mm_email" => $mmregister['mm_email']
								);
								$adduser = $this->common->AddChatUser($data);
								$login = mmlogin($mmregister['mm_email']);
								$this->session->set_userdata('token',$login);
								$this->session->set_userdata('loggedin',$mmregister['mm_id']);
							}
							else{
								$login = mmlogin($user_table_check->mm_email);
								$this->session->set_userdata('token',$login);
								$this->session->set_userdata('loggedin',$user_table_check->mm_id);
							}
						}
						else{
							$No_registerUser = $this->common->getGuestUserDetail($user_id,$project_id);
							$login = mmlogin($No_registerUser->mm_email);
							$this->session->set_userdata('token',$login);
							$this->session->set_userdata('loggedin',$No_registerUser->mm_id);
						}
					}
					$projectdata=$this->project_model->FetchSecDataById($project);
											if($projectdata->project_show_homepage=='no'){
												$data['No_registerUser']='<p class="pl-kkc pl-kkc1">THIS PLACE IS NOT AVAILABLE CURRENTLY.</p>';
												$data['No_registerUser_condition']=true;
											}else{
												
												$data['No_registerUser']='';
											}
			}
			
		}else{
								
			$data['No_registerUser_condition']=true;
			
		}
		
		
		
		
		$this->session->set_userdata('project_id',$project);
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if($this->session->userdata('checkdata')==TRUE){
			
			if($user->check_user1!=1){ 
				redirect('places/places_step1');
			}
			if($user->check_user2!=1){ 
				redirect('places/places_step2');
			}
			// if($user->check_user1==1 && $user->check_user2==1){
				// redirect('places'); 
			// } 
		} 
		
		
		
		$this->session->set_userdata('checkdata',false);
		
		if(isset($_POST['project_type'])){ 
			$project_type1=$_POST['project_type'];
		}else{
			$project_type1=urldecode($project_type1);
		}
		
		if($project_type1!==0)
		{
			$data['projects'] = $this->Places_model->FetchProjectById($project_type1);
		}
		else
		{
			
			$data['projects'] = $this->Places_model->FetchProjectById();
		}
		if($this->ion_auth->logged_in()){
				$email=$this->session->userdata('email');
				$user_id=$this->session->userdata('user_id');
				$data['myprojects'] = $this->Places_model->myProjectsById($email,$user_id);
				
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
			
		}elseif($floor){
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
		$data['selected_project_type'] = $project_type1;
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
		
		$data['title'] = " LET'S EXPLORE";
		$this->load->view('include/header', $data);
		 $this->load->view('include/menu');
		 $this->load->view('places/places',$data);
		 $this->load->view('include/footer');
	}
	
	
	
	public function placeByFloorHistory() 
	{
		$grid_val=$_POST['grid_val']; 
		$floorId=$_POST['floorId']; 
		$data['grid_id']=$grid_val; 
		$data['floor_plan_id']=$_POST['floorId']; 
		$data['zone_id']=$_POST['zone_id']; 
		$data['zone_text']=$_POST['zone_text']; 
		$data['activity']=$_POST['activity']; 
		$data['project_id']=$_POST['project']; 
		$data['module_name']=$_POST['module_name']; 
		$data['top']=$_POST['top']; 
		$data['left']=$_POST['left']; 
		$data1=$this->project_model->FetchDataById($data['project_id']); 
		$data['group_id']=$data1->group_id;
		$data['activity_time']=date('Y-m-d G:i:s');
		$data['user_id']=$this->session->userdata('user_id');
		$data['created_at']=date('Y-m-d G:i:s');
		$data['created_by']=$this->session->userdata('username');
		$data['ip_address']=$_SERVER['REMOTE_ADDR'];
		$this->Places_model->insertHistory($data);
		$floor=$this->Places_model->FetchFloorDataById($floorId);
		$checkGrid=$this->Places_model->GridByData($grid_val,$floor->floor_plan_id);
		
		if($checkGrid!=false){
			$zone_id=$checkGrid->zone_id;
			$floorId=$floor->floor_plan_id;
			$contentData=$this->Places_model->ZoneFloorByContentId($zone_id,$floorId);
			if($contentData){
				echo $contentData->contentset_id;
			}
		}
		
	}
	
	public function UpdatePostIconHistory() 
	{
		$data['floor_plan_id']=$_POST['floor_id']; 
		$data['project_id']=$_POST['project_id']; 
		$data['zone_id']=$_POST['zone_id']; 
		$data['feature_name']=$_POST['feature_name']; 
		$data['module_refid']=$_POST['module_refid']; 
		$data['module_name']=$_POST['module_name']; 
		$data1=$this->project_model->FetchDataById($data['project_id']); 
		$data['group_id']=$data1->group_id;
		$data['activity_time']=date('Y-m-d G:i:s');
		$data['user_id']=$this->session->userdata('user_id');
		$data['created_at']=date('Y-m-d G:i:s');
		$data['created_by']=$this->session->userdata('username');
		$data['ip_address']=$_SERVER['REMOTE_ADDR'];
		$SUCCESS=$this->Places_model->insertHistory($data);
		echo 'SUCCESS';
		
		
		
	}
	
	public function WorkshopHistory() 
	{
		if(!empty($this->session->userdata("workshopid"))){
			$wordshop=$this->session->userdata("workshopid");
		}else{
			$wordshop=$_POST['module_refid'];
		}
		if($wordshop != $_POST['module_refid']){
			$this->db->select('*');
			$this->db->from('xf_workshop_attendance');
			$this->db->where('workshop_id',$wordshop);
			$this->db->order_by('id','DESC');
			$query = $this->db->get(); 
			$data1 = $query->row();
			
			$data2['logout_time']=date('Y-m-d G:i:s');
			$data2['exit_module']='WORKSHOP';
			$this->Places_model->updateWorkshopHistory($wordshop,$data1->id,$data2);
		} 
		$data['project_id']=$_POST['project_id'];   
		$data['workshop_id']=$_POST['module_refid']; 
		$data1=$this->project_model->FetchDataById($data['project_id']); 
		$data['group_id']=$data1->group_id;
		$data['login_time']=date('Y-m-d G:i:s');
		$data['user_id']=$this->session->userdata('user_id');
		$data['created_at']=date('Y-m-d G:i:s');
		$data['created_by']=$this->session->userdata('username');
		$data['ip_address']=$_SERVER['REMOTE_ADDR']; 
		$SUCCESS=$this->Places_model->insertWorkshopHistory($data); 
		
		echo 'SUCCESS';
	}
	
	public function WorkshopExitHistory() 
	{
		 $this->db->select('*');
		$this->db->from('xf_workshop_attendance');
		$this->db->where('workshop_id',$this->session->userdata("workshopid"));
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data1 = $query->row();

		$data['logout_time']=date('Y-m-d G:i:s');
		$data['exit_module']=$_POST['module_name'];
		
		$SUCCESS=$this->Places_model->updateWorkshopHistory($this->session->userdata("workshopid"),$data1->id,$data);
		$this->session->set_userdata('workshopid',false); 
		echo 'SUCCESS';
	}
	
	public function placeByzone() 
	{
		$grid_val=$_POST['grid_val']; 
		$floorId=$_POST['floorId']; 
		$floor=$this->Places_model->FetchFloorDataById($floorId);
		$zone=$this->Places_model->placeByzoneName($floor->floor_plan_id,$grid_val);
		$data['zone_id']=$zone->zone_id;
		$data['zone_type']=$zone->zone_type;
		$data['zone_name']=$zone->zone_name; 
		echo json_encode($data);
		
	}
	
	public function getContentData() 
	{
		
		
		$content_id=$_POST['content_id']; 
		$grid_val=$_POST['grid_val'];  
		 
		//$content_id='XCNT967147';  
		$data['data']=$this->Places_model->ContentSetDataById($content_id);
		$floor=$this->Places_model->getfloorPlanById($data['data']->flor_plan_id);
		$data['icons'] = $this->Places_model->FetchIconsDataById($data['data']->flor_plan_id,$content_id); 
		$data['videos'] = $this->Places_model->FetchVideoDataById($data['data']->x_content_id);
                $data['images'] = $this->Places_model->FetchImageDataById($data['data']->x_content_id);
		$zone=$this->Places_model->placeByzoneName($data['data']->flor_plan_id,$grid_val);
		//echo $data['data']->flor_plan_id;XCFP1594876670
		// print_r($content_id); 
		// die;
		$data['floor_id']=$floor->id;   
		$data['project_id']=$data['data']->project_id; 
		$data['zone_id']=$zone->id; 
		$data['zone_type']=$zone->zone_type; 
		$data['zone_name']=$zone->zone_name; 
		$data['userdetails'] = $this->common->userdetailsbyViewTable($this->session->userdata('user_id'),$data['data']->project_id);
		$user_id=$this->session->userdata('user_id');
		
		$guest=$this->Places_model->GetGuestDataByEmail($user_id,$data['data']->project_id);
		if($guest){ 
			$data['guest']=$guest->guest_type.', '.$guest->username.', '.$guest->company;
		}else{
			$userid = $this->session->userdata('user_id');
			$guest = $this->ion_auth->user($userid)->row();
			$data['guest']='Walk-In, '.$guest->username.', '.$guest->company;
		}
		 
		
		$data['title'] = " LET'S EXPLORE";
		$this->load->view('places/contentset_info',$data);
		
		
	}
	
	
	
	
	function getContentDataforPost(){
	
	
		$post_id=$_POST['post_id']; 
		$project_id  = $_POST['project_id'];
		$data['userdetails'] = $this->common->userdetailsbyViewTable($this->session->userdata('user_id'),$project_id);
		$infoicon_mapping=$this->Places_model->ContentByPostId($post_id); 
		$iconid= $infoicon_mapping->info_icon;
		
		//$data['iconid']= $infoicon_mapping->info_icon;
		$data['post_id']= $post_id;

		if(empty($post_id)){
			$data['posts']=$this->Places_model->PostsOwnerDataByIconId($iconid);
			}else{
				$data['posts']=$this->Places_model->PostsOwnerDataByPostId($post_id);
		}
		$guestID = $data['posts']->post_owner;
		$data['postguest'] = $this->common->GuestDetails($guestID);
		$icon_id=$_POST['icon_id'];
		
		$data['postowner']=$this->Places_model->FetchPostsDataByIconId($icon_id);
		
		
		//print_r($data['iconid']);  exit; 
		$conent_mapping=$this->Places_model->contentbyInfoPostId($iconid,$project_id); 
		//print_r($conent_mapping);die;
		//$data['content_name']=$conent_mapping->
		
		$infoicon=$this->Places_model->infoIcondata($iconid); 
	        $zoneid = $infoicon->zone_id;
		//  print_r($data['icons']);  exit;
		
		//$content_id='XCNT967147';  
		$data['data']=$this->Places_model->ContentSetDataById($conent_mapping->content_set_id);
		//print_r($conent_mapping);print_r('----');print($data['data']);die;
		
		//$data['icons'] = $this->Places_model->FetchPostIconsDataById($data['data']->flor_plan_id,$data['data']->id,$post_id); 
		$data['icons'] = $this->Places_model->FetchIconsDataById($data['data']->flor_plan_id,$data['data']->id); 
		$data['iconid']=$data['icons'][0]->id;
			
		//  print_r($data['icons']);  exit;
		
		 
		$data['videos'] = $this->Places_model->FetchVideoDataById($data['data']->x_content_id);
                $data['images'] = $this->Places_model->FetchImageDataById($data['data']->x_content_id);
		$zone=$this->Places_model->getZoneContentName($zoneid,$conent_mapping->content_set_id,$data['data']->flor_plan_id);
		
		//getZoneContentName($contentset,$floorId)
		$data['zone_type']=$zone->zone_type; 
		$data['zone_name']=$zone->zone_name; 
		
		$email=$this->session->userdata('email');
		
		$guest=$this->Places_model->GetGuestDataByEmail($email,$project_id);
		if($guest){
			$data['guest']=$guest->username.', '.$guest->company;
		}else{
			$userid = $this->session->userdata('user_id');
			$guest = $this->ion_auth->user($userid)->row();
			$data['guest']='Walk-In, '.$guest->username.', '.$guest->company;
		}
		$floor=$this->Places_model->getfloorPlanById($data['data']->flor_plan_id);
		$data['floor_id']=$floor->id;  
		$data['project_id']=$data['data']->project_id; 
		$data['zone_id']=$zone->zone_id; 
		
		$data['title'] = "PLACES";
		$data['post_data'] = $this->Places_model->dataPostId($post_id);
		//print_r($data['data']);die;
		$this->load->view('places/contentset_info_post',$data);
	
	
	
	}
	
	
	
	 
	public function postslider() 
	{
		
		$files=$this->Places_model->FetchPostFilesData($_POST['post_id']);
		foreach($files as $video){
				$sliderId='slider_'.$video->id;
				if(!empty($sliderId=='slider_'.$files[0]->id)){
					$class='active';
					$checked='checked';
				
				}else{ 
					$class='';
					$checked='';
				} 
             		$vidstring .= '
					'.$video->file_name.', '.$video->file_size.' MB <br/>';  
					$videoUrl=base_url().'assets/post/'.$video->file_name;
					if($video->type=='image'){
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}else{
						$img='
						<video class="slide-img" id="postvideostop'.$sliderId.'" controls>
						  <source src="'.$videoUrl.'" type="video/mp4">
						</video>'; 
					}
					$slider .='
					<input type="radio" name="slider" class="trigger adcl1 adcl1'.$sliderId.'" id="'.$sliderId.'" '.$checked.' />
					<div class="slide">
					  <figure class="slide-figure"> 
						'.$img.'
					  </figure>
					</div>
					';  
					$videoTab .='
					<li class="slider-nav__item adcl1 adcl1'.$sliderId.' '.$class.'"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="'.$sliderId.'">0</label></li>
					<script>
						$(document).ready(function(){
							   
							$(".adcl1'.$sliderId.'").click(function(){
								$("#postvideostop'.$sliderId.'").trigger("pause");
								$(".adcl1").removeClass("active");
								$(".adcl1'.$sliderId.'").addClass("active");
								
							});
						});
					</script>
					'; 
					 
				$output .='
								  <div class="slider-wrapper">
								  <div class="slider">
									'.$slider.'
							
										
									</div>
									<ul class="slider-nav">
										'.$videoTab.'
										
								  </ul>
								
							 </div>';
				echo $output;
			}
	}
	public function GetPostByIconId() 
	{
		$icon_id=$_POST['icon_id'];
		$post_id=$_POST['post_id'];
		if(empty($post_id)){
		$posts=$this->Places_model->FetchPostsDataByIconId($icon_id);
		//print_r($posts);die;
		$post_id=$posts->post_id;
		$files=$this->Places_model->FetchPostFilesData($post_id);
		}else{
			$posts=$this->Places_model->dataPostId($post_id);
			$files=$this->Places_model->FetchPostFilesData($posts->post_id);
		}
		
		
		if(!empty($posts->post_title)){
			$vidstring = '';
            $slider = '';
            $videoTab = '';
			
			foreach($files as $video){
				$sliderId='slider_'.$video->id;
				if(!empty($sliderId=='slider_'.$files[0]->id)){
					$class='active';
					$checked='checked';
					$slide='just-img';
				}else{ 
					$class='';
					$checked='';
					$slide='';
				} 
             		$vidstring .= '
					'.$video->file_name.', '.$video->file_size.' MB <br/>';  
					$videoUrl=base_url().'assets/post/'.$video->file_name;
					if($video->type=='image'){
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}else{
						$img='
						<video class="slide-img" id="postvideostop'.$sliderId.'" controls>
						  <source src="'.$videoUrl.'" type="video/mp4">
						</video>'; 
					}
					$slider .='
					<input type="radio" name="slider" class="trigger adcl1 adcl1'.$sliderId.'" id="'.$sliderId.'" '.$checked.' />
					<div class="slide slide'.$sliderId.' '.$slide.'">
					  <figure class="slide-figure"> 
						'.$img.'
					  </figure>
					</div>
					';  
					$videoTab .='
					<li class="slider-nav__item adcl1 adcl1'.$sliderId.' '.$class.'"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="'.$sliderId.'">0</label></li>
					<script>
						$(document).ready(function(){
							
	
							   
							
							$(".adcl1'.$sliderId.'").click(function(){
								$("#postvideostop'.$sliderId.'").trigger("pause");
								$(".slide").removeClass("just-img");
							$(".slide'.$sliderId.'").addClass("just-img");
								$(".adcl1").removeClass("active");
								$(".adcl1'.$sliderId.'").addClass("active");
								
							});
						});
					</script>
					'; 
			}
			$output .='
						<div class="details-in">
							<h2>POST TYPE </h2>
							<p> '.$posts->post_type.'</p>
						</div>
						<div class="details-in">
							<h2>POST OWNER </h2>
							<p> '.$posts->guest_type.', '.$posts->username.'</p>
						</div>
						<div class="details-in">
							<h2>POST TITLE </h2>
							<p> '.$posts->post_title.'</p>  
						</div>
						
						<div class="details-in">
							<h2>VISUALS / VIDEOS</h2>
							<div class="contant-slider">
								  <div class="slider-wrapper">
								  <div class="slider">
									'.$slider.'
							
										
									</div>
									<ul class="slider-nav">
										'.$videoTab.'
										
								  </ul>
								</div>
							 </div>
						</div>
						<div class="details-in">
							<h2>WEBSITE</h2>
							<p class="running_latter"> '.$posts->website.'</p>    
						</div>
						<div class="details-in">
							<h2>AVAILABILITY </h2>
							<p> '.$posts->post_availability.'</p>
						</div>
						<div class="details-in">
							<h2>PRICE </h2>
							<p> '.$posts->price.'</p>
						</div>
						<div class="details-in"> 
							<h2>POST DETAILS </h2>
							<p> '.$posts->post_details.'</p>
						</div>
	
			 
			';
			
			
		}else{
			$output .='<p> SELECT ANY INFO ICON TO USE THIS FEATURE.</p>';
		}
		
		echo $output;
	}
     
	 public function GetPostOwnerByIconId() 
	{
		$icon_id=$_POST['icon_id']; 
		$post_id=$_POST['post_id'];
		if(empty($post_id)){
		$posts=$this->Places_model->PostsOwnerDataByIconId($icon_id);
		}else{
		$posts=$this->Places_model->PostsOwnerDataByPostId($post_id);
		}
		$data['quick_intro']=$posts->quick_intro;
		$data['guest_type']=$posts->guest_type; 
		$data['username']=$posts->username; 
		$data['company']=$posts->company; 
		$data['designation']=$posts->designation; 
		$this->session->unset_userdata('channelID');
		//print_r($posts->username);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."users/username/".$posts->mm_username,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata("token"),
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$partnerUserId =  json_decode($response);
		//print_r($partnerUserId);die;
		$this->session->set_userdata("partnerloggedin",$posts->mm_username);
		//print_r($this->session->userdata("partnerloggedin"));die;
		$curl = curl_init();
		$param = array($this->session->userdata("loggedin"),$partnerUserId->id);
		//print_r($param);die;
		//$param = array('h4z7gwsyc7gffjto98bzphksdy','wnz6prhzp7fkjdypmheh8ufsoh');
		//print_r(json_encode($param));die;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."channels/direct",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>json_encode($param),
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata("token"),
			"Content-Type: application/json"
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		$channel = json_decode($response);
		$this->session->set_userdata('channelID',$channel->id);
		//echo $channel->id;die;
		if(!empty($posts)){
		$output .='<div class="quick-intro-scroll"> 
							<table>
							<tbody>
							
							<tr style="padding-bottom: 10px;">
							<td colspan="2"> <b>ABOUT '.$posts->guest_type.' </b> </td>   
							</tr>
							
							<tr>
							<td>DISPLAY NAME</td>
							<td></td>
							</tr>
							
							<tr>
							<td colspan="2" class="sp_abc zone-label">'.$posts->username.'</td>
							</tr>
							
							<tr>
							<td>COMPANY NAME</td>
							<td></td>
							</tr>
							
							<tr>
							<td colspan="2" class="sp_abc zone-label">'.$posts->company.'</td>
							</tr>
							
							<tr>
							<td>DESIGNATION</td>
							<td></td>
							</tr>
							
							<tr>
							<td colspan="2" class="sp_abc zone-label">'.$posts->designation.'</td>
							</tr>
							
							<tr>
							<td>Quick INTRO</td>
							<td></td>
							</tr>
							
							<tr>
							<td colspan="2" class="sp_abc zone-label">'.$posts->quick_intro.'</td>
							</tr>
							
							</tbody>
							</table>
							
							
					</div>';
		}else{
			$output='<p> SELECT ANY INFO ICON TO USE THIS FEATURE.</p>';
		} 
		echo $output;
	}
     

	 public function GetChatOwnerByIconId() 
	{
		$icon_id=$_POST['icon_id']; 
		$post_id=$_POST['post_id'];
		if(empty($post_id)){
		$posts=$this->Places_model->PostsOwnerDataByIconId($icon_id);
		}else{
		$posts=$this->Places_model->PostsOwnerDataByPostId($post_id);
		}
		$data['quick_intro']=$posts->quick_intro;
		$data['guest_type']=$posts->guest_type; 
		$data['username']=$posts->username; 
		$data['company']=$posts->company; 
		$data['designation']=$posts->designation; 
		$user_id=$this->session->userdata('user_id');

		if($user_id != $posts->id){
			if(!empty($posts)){
				if ($posts->avatar) { 
						$avatar ='<img src="'.base_url().'assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$posts->avatar.'" />';;
					} else { 
						$avatar ='<img src="'.base_url().'assets/images/GUEST_MALE.png" class="img-fluid">';
					 }
			$output .='<div class="current-chat"> CURRENT CHAT : </div>'.$avatar.'
					<div class="nearme-detail" data-val="'.$posts->username.'">
						<p>'.$posts->guest_type . ', ' . $posts->salutation . ' ' . $posts->first_name . ' ' . $posts->last_name . ', ' . $posts->company.';
						</p>
					</div>';
			}else{
				$output='<p> SELECT ANY INFO ICON TO USE THIS FEATURE.</p>';
			} 
		}else{
			$output = '<p>YOU ARE THE POST OWNER.</p><p>CHECK INCOMING MESSAGES THROUGH CHAT FEATURE.</p><p>CHAT BOX BELOW ALLOWS YOU TO CHECK CHAT CONNECTIVITY.</p>';
		}
		  

		echo $output;
	}
     
	 public function GetButtonTypeByIconId() 
	{
		$icon_id=$_POST['icon_id'];
		$post_id=$_POST['post_id'];
		
		if(empty($post_id)){
		$posts=$this->Places_model->FetchPostsDataByIconId($icon_id);
		
		}else{
			$posts=$this->Places_model->dataPostId($post_id);
			
		}
		
		$data['post_type']=$posts->post_type;
		$data['btn_url']=$posts->btn_url;
		
		echo json_encode($data);
	}
     
	 
	 
	 public function GetPostByIconIdInfo()  
	{
		$icon_id=$_POST['icon_id'];
		$posts=$this->Places_model->FetchPostsDataByIconId($icon_id);
		
		if(!empty($posts)){
			$data['post_title']=$posts->post_title;
			$data['post_details']=$posts->post_details;
			echo json_encode($data);
		}
	}
        
	public function places_step1($S_VIEW=NULL) 
	{
		$project_id = $this->session->userdata('project_id');
		$this->session->set_userdata('checkdata',false);
		$data_header['title'] = "LET'S EXPLORE";
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['S_VIEW'] = $S_VIEW;
		$this->load->view('include/header', $data_header);
		$this->load->view('include/menu');
		if($_POST){
			$array['check_user1']=$_POST['check_user'];
			$this->Places_model->UpdateUserInfo($userid,$array); 
			if($user->check_user2==1){
				redirect('places/index/'.$project_id);
			}else{
				redirect('places/places_step2');
			}
		}else{
			$this->load->view('avatar/avatar_step1',$data);
		}
		$this->load->view('include/footer');
	}
	public function placesPost_step1($S_VIEW=NULL) 
	{
		
		$userid = $this->session->userdata('user_id');
		$project_id = $this->session->userdata('project_id');
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		if($_POST){
			$array['check_user1']=$_POST['check_user'];
			$this->Places_model->UpdateUserInfo($userid,$array);
			if($user->check_user2==1){
				
				if($S_VIEW=='S_VIEW'){
					redirect('simple_view/places/'.$project_id);
				}else{
					redirect('places/index/'.$project_id);
				}
			}else{
				redirect('places/places_step2'); 
			}
		}else{
			if($user->check_user2==1){
				if($S_VIEW=='S_VIEW'){
					redirect('simple_view/places/'.$project_id);
				}else{
				redirect('places/index/'.$project_id);
				}
			}else{
				redirect('places/places_step2'); 
			}
		}
		
	}
	public function places_step2($S_VIEW=NULL) 
	{
		$project_id = $this->session->userdata('project_id');
		$this->session->set_userdata('checkdata',false);
		$data_header['title'] = "LET'S EXPLORE";
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$this->load->view('include/header', $data_header);
		$this->load->view('include/menu');
		if($_POST){
			$array['check_user2']=$_POST['check_user'];
			$this->Places_model->UpdateUserInfo($userid,$array);
			redirect('places/index/'.$project_id);
		}else{
			$this->load->view('avatar/avatar_step2',$data);
		}
		$this->load->view('include/footer');
	}
	public function placesPost_step2($S_VIEW=NULL) 
	{
		
		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['S_VIEW'] = $S_VIEW;
		$project_id = $this->session->userdata('project_id');
		if($_POST){
			$array['check_user2']=$_POST['check_user'];
			$this->Places_model->UpdateUserInfo($userid,$array);
			if($S_VIEW=='S_VIEW'){
					redirect('simple_view/places/'.$project_id);
				}else{
					redirect('places/index/'.$project_id);
				}
		}else{
			if($S_VIEW=='S_VIEW'){
					redirect('simple_view/places/'.$project_id);
				}else{
			redirect('places/index/'.$project_id);
				}
		}
		
	}
	
	// public function GetFloorByProject()
	// {
		// $id=$_POST['floor_id'];
		// $data=$this->Places_model->getFloorPlanbyProject($id);
		// $floordata='';
		// $floordata = '<option value="">SELECT A FLOOR PLAN</option>';
		// if(count($data)>0){
		// foreach($data as $val){
			// $floordata .='<option value='.$val->id.'>'.$val->floor_plan_name.'</option>';
		// }
		// }
		// echo $floordata;
	// }
	 
	// public function assignProgramGetImg()
	// {
		// $id=$_POST['floorId']; 
		// $res=$this->floor_model->FetchDataById($id);
		// $Img=base_url().'assets/floor_plan/'.$res->file_name . $res->file_type;
		// $floor_plan_drop_point=explode(',',$res->floor_plan_drop_point);
		// $data['floorId']=$id;
		// $data['project']=$res->project_id;
		// $data['width']=$floor_plan_drop_point[0];
		// $data['height']=$floor_plan_drop_point[1];
		// $data['img']=$Img;
		// echo json_encode($data);
	// }
	
}

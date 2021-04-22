<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Workshop extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
                $this->load->model('auth_model', 'auth');
                $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->model('Workshop_model');
		$this->load->model('group_model');
		$this->load->model('Places_model');
		$this->load->model('floor_model');
		$this->load->model('project_model');
		$this->load->library('email');
		$this->load->model('ProgramFront_model'); 
		$this->load->library('session');
		$this->load->model('ProgramFront_model','p_model');
                		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//redirect('auth/login', 'refresh');
		}
        
    }
	
	public function index($project=false,$floor=0,$workshopid=false)
	{
		
		if(empty($project)){
			$data['No_registerUser']='<p class="pl-kkc">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
		}
		
		if(!empty($project)){
			$check=$this->Places_model->FetchProjectTypeId($project);
			$data['group_id']=$check->group_id;
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
				
				if (!$this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=true;
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
		
	      $data['title'] = "WORKSHOP"; 
	      
	      
	      $data['workshops']=$this->Workshop_model->FetchworkshopAllData($project);
	      $data['project'] =$project; 
		  $data['floor']=$floor;
	      $project_name=$this->ProgramFront_model->getProjectNamebyProjectId($project);
		$data['project_type']=$project_name->project_type;
		$data['project_name']=$project_name->project_name;
	      $this->load->view('include/header', $data);
             $this->load->view('include/menu');
			 
			 
	 	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."users/".$this->session->userdata('loggedin')."/teams",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,  
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata('token'),
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$team_data = json_decode($response);
		//print_r($this->session->userdata('loggedin'));die;
		
		$curl = curl_init();

	// added on 14-Feb
			if (!empty($team_data->id != 'api.context.session_expired.app_error' )) {
			
				curl_setopt_array($curl, array(
					CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams/" . $team_data[0]->id . "/channels",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer " . $this->session->userdata('token'),
						"Content-Type: application/json"
					),
				)
				);

			$response = curl_exec($curl);

			curl_close($curl);
			$data['allgroups'] = json_decode($response);
			}
			else {
				$data['allgroups'] = '';
			}
			
// end added on 14- Feb

//		curl_close($curl);								//commented on 14-Feb
//		$data['allgroups'] = json_decode($response);    //commented on 14-Feb
			 //print_r($data['allgroups']);die;
			 
			 
			 $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQURIED","ONSITE NO REG REQURIED","HYBRID NO REG REQURIED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS");
		
		}
		
		
		$type1=array("VIRTUAL SHOP REG REQUIRED","VIRTUAL SHOP NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("VIRTUAL SHOP OWNER","VIRTUAL SHOP REP");
		
		}
		
		
		
		$type1=array("SHOP REG REQUIRED","SHOP NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("SHOP OWNER","SHOP REP");
		}
		
		
	    
		
               $type1=array("VENUE REG REQUIRED","VENUE NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("VENUE OWNER","VENUE REP");
		
		}
		
		
	        $type1=array("PROPERTY REG REQUIRED","PROPERTY NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("PROPERTY OWNER","PROPERTY AGENT"); 
		
		}
		
		
		 
		
		
		$type1=array("DEMO REG REQUIRED","DEMO NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS");
		
		}
		
		
             $data['AllonlineDropdown']=$where_in;
			$data['userdetails'] = $this->common->Chatuserdetails($this->session->userdata('user_id'),$project);
             if(!empty($workshopid)){
              $data['workshopid'] =$workshopid; 
              $this->session->set_userdata('workshopid',$workshopid); 
              $data['allonline'] = $this->Workshop_model->FetchAllOnlineDataById($workshopid);
              $data['workshop_data'] = $this->Workshop_model->FetchDataById($workshopid);
              $this->load->view('workshop/workshop2',$data);
             }else{
             
             $this->load->view('workshop/workshop',$data);
             }
             
             
             $this->load->view('include/footer');
	}
	
	public function redirectanother($project=0,$floor=0,$workshopid=0)
	{
		
		if(empty($project)){
			$data['No_registerUser']='<p class="pl-kkc">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
		} 
		
		if(!empty($project)){
			$check=$this->Places_model->FetchProjectTypeId($project);
			$data['group_id']=$check->group_id;
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
				
				if (!$this->ion_auth->logged_in())
					{
						$data['No_registerUser_condition']=true;
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
		
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		$data['selected_project_type'] = $project_type1;
		if($project>0 && $floor>0){
		$history['user_id']=$this->session->userdata('user_id');
		$history['project_id']=$project;
		//$history['floor_plan_id']=$floor;
		$GetHistory=$this->Places_model->FetchHistoryById($history);
		$data['GetHistory']=$GetHistory;
			if(!empty($GetHistory)){
				$activity=$GetHistory->activity; 
				$activity1=explode(',',$activity);
				$data['left']=$activity1[0]-21;
				
				$da=$floor_plan_drop_point[1]/2;
				$data['top']=$activity1[1]-$da-8;
			}
		}
		 $data['title'] = "WORKSHOP"; 
	      
	      
	      $data['workshops']=$this->Workshop_model->FetchworkshopAllData($project);
	      $data['project'] =$project; 
	      
	      $project_name=$this->ProgramFront_model->getProjectNamebyProjectId($project);
		
		$data['project_type']=$project_name->project_type;
		$data['project_name']=$project_name->project_name;
	      $this->load->view('include/header', $data);
             $this->load->view('include/menu');
             $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQURIED","ONSITE NO REG REQURIED","HYBRID NO REG REQURIED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS");
		
		}
		
		
		$type1=array("VIRTUAL SHOP REG REQUIRED","VIRTUAL SHOP NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("VIRTUAL SHOP OWNER","VIRTUAL SHOP REP");
		
		}
		
		
		
		$type1=array("SHOP REG REQUIRED","SHOP NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("SHOP OWNER","SHOP REP");
		}
		
		
	    
		
               $type1=array("VENUE REG REQUIRED","VENUE NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("VENUE OWNER","VENUE REP");
		
		}
		
		
	        $type1=array("PROPERTY REG REQUIRED","PROPERTY NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("PROPERTY OWNER","PROPERTY AGENT"); 
		
		}
		
		
		 
		
		
		$type1=array("DEMO REG REQUIRED","DEMO NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE","PROPERTY OWNER","PROPERTY AGENT","PROPERTY VIEWER","VENUE OWNER","VENUE REP","VISITOR","SHOP OWNER","SHOP REP","SHOPPER");
		
		}
			$data['userdetails'] = $this->common->Chatuserdetails($this->session->userdata('user_id'),$project);
		
             $data['AllonlineDropdown']=$where_in;
             if(!empty($workshopid)){
              $data['workshopid'] =$workshopid; 
			  $this->session->set_userdata('workshopid',$workshopid);
			  $data['allonline'] = $this->Workshop_model->FetchAllOnlineDataById($workshopid);
              $data['workshop_data'] = $this->Workshop_model->FetchDataById($workshopid);
              $this->load->view('workshop/workshop2',$data);
             }else{
             
             $this->load->view('workshop/workshop',$data);
             }
             
             
             $this->load->view('include/footer');
	}
	 
	
	function allonline(){
				
				$workshopid=$_POST['workshopid'];
				//$project=$_POST['project_id'];
                //$users= $this->common->allonlineUsers($project);
                $users=$this->Workshop_model->FetchAllOnlineDataById($workshopid);
				
				if($users!=false){

			$data='';
			$logged_in = $this->session->userdata('loggedin');
			$tempArray = [];
			$last_post_edit = '';
			foreach($users as $mydata){
					if(!empty($mydata->avatar)){
						$img='
						<img src="'.base_url().'assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$mydata->avatar.'" />';
					}else{
						if($mydata->gender == 'Male'||'MALE'||'male'){
							$img='<img src="'.base_url().'assets/images/GUEST_MALE.png"/>';
						}
						else{
							$img='<i class="far fa-user-circle" aria-hidden="true"></i>';
						}
					}
					$ID = $mydata->mm_id.'__'.$logged_in;
					$res_msg_count = getUsersNotification($ID);
					if (empty($last_post_edit)){
						array_push($tempArray,$mydata);
						$last_post_edit = $res_msg_count['last_post'];
					}

					elseif($res_msg_count['last_post'] > $last_post_edit){
						array_unshift($tempArray,$mydata);
						$last_post_edit = $res_msg_count['last_post'];
					}
					else{
						array_push($tempArray,$mydata);
					}
				}

				foreach($tempArray as $mydata){
					if(!empty($mydata->avatar)){
						$img='
						<img src="'.base_url().'assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$mydata->avatar.'" />';
					}else{
						if($mydata->gender == 'Male'||'MALE'||'male'){
							$img='<img src="'.base_url().'assets/images/GUEST_MALE.png"/>';
						}
						else{
							$img='<i class="far fa-user-circle" aria-hidden="true"></i>';
						}
					}

					$ID = $mydata->mm_id.'__'.$logged_in;

					// Function for notification count starts here

					$res_msg_count = getUsersNotification($ID);
					$data .='<div class="nearme-box clearfix rowguest openChatBox" data-unread-msg="'.$res_msg_count['count']->msg_count.'"  data-guest-gender="'.$mydata->gender.'" data-guest-type="'.$mydata->guest_type.'"  data-val="'.$mydata->mm_username.'" data-last-post="'.$res_msg_count['last_post'].'">
					<div class="chatbox_img">
					'.$img. ' 
					<div class="nearme-detail">
					<p>'.$mydata->guest_type.', '.$mydata->salutation .' '. $mydata->first_name.' '. $mydata->last_name.', '.$mydata->company.'</p>
					</div>';
					if($res_msg_count['count']->status_code !='404' && $res_msg_count['count']->msg_count>0) {
						if($res_msg_count['count']->msg_count > 99){
							$msg_count = '99+';
						}else{
							$msg_count = $res_msg_count['count']->msg_count;
						}
					$data .='<div class="notification" id="notifi_count">
						<span class="msg_count">'.$msg_count.'</span>
						</div>';
					}
					$data .='</div>
					</div>
					';
				}

			
			
		}else{
			$data='<p class="work-msgright">NO GUESTS ARE ONLINE CURRENTLY.</p>';
		}
		$data .='<script>
					$(".openChatBox").click(function(){
						
						var username = $(this).attr("data-val");
						
					$.ajax({
						url:"'. base_url().'chat_box/createChannel",
						method: "post",
						data: {username:username},
						success: function(response){
							console.log(response);
						}
					 
					});
					  $.fancybox.open({
						maxWidth  : 800,
						fitToView : true,
						width     : "100%", 
						height    : "auto",
						autoSize  : true,
						type        : "ajax",
						src         : "'. base_url().'chat/testchat",
						ajax: { 
						   settings: { data : "username="+username+"&workshop=1", type : "POST" } 
						},
						touch: false,
						
					});
					
					
				})
					</script>';
		echo $data;
            
            
    }
        
	
	public function fullscreen()
	{
		$data['title'] = "WORKSHOP";
		$this->load->view('workshop/fullscreen');
	}
	
	
	
       public function showall()
        {

			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];

			$data['title'] = "Workshop Listing";
			$this->load->view('workshop/all_show',$data);
			 
       }
       
       
       function addNew($id=false,$project_id=0){
       
        if($id){
			$data['title'] = "Edit Workshop"; 
			$data['action'] = 'EDIT'; 
			$data['project_select'] = $project_id;
			$data['workshop'] = $id;
			$data['group_id'] = $_POST['group_id'];

			$data['workshop'] = $this->Workshop_model->FetchDataById($id);
			//$data['zone'] = $this->Workshop_model->getZoneById($id);    
        }else{
			 $data['title'] = "Add Workshop";
			 $data['action'] = 'ADD'; 
			 $data['project_select'] = $_POST['project'];
			 $data['group_id'] = $_POST['group_id'];
			// $data['project_data'] = $this->Workshop_model->FetchDataById($_POST['project']); 
        }
        
        $data['chat_groups'] = $this->Workshop_model->FetchAllChatGroups($_POST['project']);
					
        $this->load->view('workshop/addNew',$data); 
       
       
       }
       
       
       function processAdd($id=false){
       
       
       
       if($id){
          
          $data = array( 
          'startdatetime'=>$this->input->post('start_datetime'),
          'enddatetime'=>$this->input->post('end_datetime'),
          'location'=>$this->input->post('location'),
          'chat_group'=>$this->input->post('chat_group'),
          'instructions'=>$this->input->post('instructions'),
          'workshop_name'=>$this->input->post('workshop_name'),
          'last_edited_date_time'=>date('Y-m-d G:i'),
          'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_id_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username')
        ); 
        
        
        $insertid = $this->Workshop_model->editWorkshopById($data,$id);
        echo $id;
       
       }else{
       
       
              
          $data = array( 
          'project_id'=>$this->input->post('project_id'),
          'group_id'=>$this->input->post('group_id'),
          'chat_group'=>$this->input->post('chat_group'),
          'workshop_xm_id'=>'XWS'.$this->input->post('project_id').rand(1000000000,9999999999),
          'startdatetime'=>$this->input->post('start_datetime'),
          'enddatetime'=>$this->input->post('end_datetime'),
          'location'=>$this->input->post('location'),
          'instructions'=>$this->input->post('instructions'),
          'workshop_name'=>$this->input->post('workshop_name'),
		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
		  'created_username'=>$this->session->userdata('username'),
          'ctreated_id_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_id_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username')
        ); 
        
        
        $insertid = $this->Workshop_model->saveAddZone($data);
        echo $insertid;
       

       
       }
     
       }
	



    function addNewSuccess($id,$action='ADD'){
       
        
        $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
        if($action=='ADD'){
            $data['title'] = "Add  Success";
            
        }else{
            $data['title'] = "Edit  Success";
            
        }
        $data['workshop'] = $this->Workshop_model->FetchDataById($id);
	 $data['action'] = $_POST['action'];

        $this->load->view('workshop/addNewSuccess',$data);   
    }
    
    
    
    function processAddStep3($workshopid=false){
    
    
    if($workshopid){
        $data = array(
			'screenurl1'=>$this->input->post('screenurl1'),
			'screenurl2'=>$this->input->post('screenurl2'),
			'screenurl3'=>$this->input->post('screenurl3'),
			'screenremarks1'=>$this->input->post('screenremarks1'),
			'screenremarks2'=>$this->input->post('screenremarks2'),
			'screenremarks3'=>$this->input->post('screenremarks3'),
			'edit_steps'=>'3',
    
    );
    
    $this->Workshop_model->updateWorkshopUrl($data,$workshopid);
    
    echo $workshopid;
    
    } 
    
  
    }
    
    
    
    
        public function search()
		{
        
        
			$data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['workshop']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['workshop'])){
					if(!empty($_POST['workshop'] == 'workshop-not-ended')){
						$searchFloor=array('xf_mst_workshop.enddatetime > NOW()'=>NULL);
					}
					if(!empty($_POST['workshop']=='workshop-ended')){
						$searchFloor=array('xf_mst_workshop.enddatetime < NOW()'=>NULL);
					}
				} 
				if(!empty($_POST['selectShortBy']== 'workshopid')){
					$searchDataOrderByAsc='xf_mst_workshop.id';
				}
				if(!empty($_POST['selectShortBy']== 'workshopid-a-z')){
					$searchDataOrderByAsc='xf_mst_workshop.workshop_name';
				}
				if(!empty($_POST['selectShortBy']== 'workshop-location-a-z')){
					$searchDataOrderByAsc='xf_mst_workshop.location';
				}
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->Workshop_model->search($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$_POST['project']); 
				  
			}else{
                           //echo $_POST['project'];   exit;
				$data1=$this->Workshop_model->FetchAllData($_POST['project']);
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
						
			   
                                            if(!empty($data['last_edited_date_time'])){
                                              $lastedit = $data['last_edited_date_time'];  
                                            }else{
                                             $lastedit = 'NIL';   
                                            }
                                            
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="view" id='.$data['id'].'  onclick="reply_click(this.id)"   >

                               <td class="deletesingle" >
								
								<input type="checkbox"   data-project="'.$data['workshop_name'].'"  id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass hide"></label>
								</td>
								<td>'.$lastedit.'</td>
                                                              <td>'.$data['workshop_xm_id'].'</td>
								<td class="project_namecls" >'.$data['workshop_name'].'</td>
								<td >'.$data['startdatetime'].'</td>
								<td>'.$data['enddatetime'].'</td> 
								<td>'.$data['screenurl1'] .'</td>
								<td>'.$data['screenurl2'] .'</td> 
								<td>'.$data['screenurl3'] .'</td> 
 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
	}
	
	
	function getWorkshopDataById(){
	
	$id=$_POST['workshop'];
	$data=$this->Workshop_model->FetchDataById($id);
	echo json_encode(array('result'=>$data));

	}
	
	
	function getWorkshopData(){
	
	               $id=$_POST['zone'];
		       $data=$this->Workshop_model->FetchDataById($id);
                    
			$output = '';
			if($data > 0)
			{
				$grid=''; 
				$drop_point='';
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
   
                                
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){
                                    $last_edited_ip_address= $data->last_edited_ip_address;
                                    }else{ 
                                        $last_edited_ip_address= "NIL";  
                                        
                                    }
				
				if(!empty($data->last_edited_xmanage_id)){ 
                                    $last_edited_xmanage_id= $data->last_edited_xmanage_id; 
                                    
                                }else{
                                    $last_edited_xmanage_id= "NIL"; 
                                    }
				
				if(!empty($data->last_edited_username)){ 
                                    $last_edited_username= $data->last_edited_username;
                                    }else{ 
                                        $last_edited_username= "NIL"; 
                                        }
					
					$output .= '    
                                        
                                        <tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span id="multipleprojectselect" style="color:black;" > '.$data->workshop_name.'</span></p></td>
					</tr>
                                        
                                        <tr id="currentlyViewing">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span> <span class="pname"> '.$data->workshop_name.'</span></p></td>
					</tr>
            
					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">WORKSHOP CREATION INFO</h5></td>
					</tr>
					<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Project Id</td>
						<td>'.$data->proj_id.'</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_date_time .'h</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->ctreated_id_address.'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Created User Name</td>
						<td>'.$data->created_username.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$data->last_edited_id_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$data->last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$data->last_edited_username.'</td>
					  </tr>
					 
                                        
      
					 
					
					<tr>
					<td colspan="2" class="zoneassigntd"><b style="font-size: 16px;">WORKSHOP INFO</b></td>
					</tr>
					<tr>
						<td>WORKSHOP NAME</td>
						<td>'.$data->workshop_name.'</td>
					</tr>
					
					<tr>
						<td>WORKSHOP LOCATION</td>
						<td>'.$data->location.'</td>
					</tr>  
					
					
					<tr>
						<td>WORKSHOP INSTRUCTIONS</td>
						<td></td>
					</tr>
					    
					<tr>
						<td colspan="2" class="res_clas sp_abc what-hots-details-right running_latter">'.$data->instructions.'</td>
						
					  </tr>
					
					
					<tr>
						<td>WORKSHOP START DATE & TIME</td>
						<td>'.$data->startdatetime.'</td>
					</tr>
					
					
					<tr>
						<td>WORKSHOP END DATE & TIME </td>
						<td>'.$data->enddatetime.'</td>
					</tr>
					
					<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
					
					<tr>
				        <td>SCREEN  1 REMARKS</td>
						<td>'.$data->screenremarks1.'</td>
					</tr> 
					
					<tr>
						<td>SCREEN  1 URL</td>
						<td></td>
					</tr>
					
					
					<tr>
						<td colspan="2"  class="res_clas sp_abc running_latter">'.$data->screenurl1.'</td>						
					</tr>   
				     
					 <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
					 
					 
					 <tr>
				        <td>SCREEN  2 REMARKS</td>
						<td>'.$data->screenremarks2.'</td>
					</tr>
				 
					
					<tr>
						<td>SCREEN 2 URL</td>
						<td></td>
					</tr>
					
					<tr>
						<td  colspan="2" class="res_clas sp_abc running_latter">'.$data->screenurl2.'</td>
						
					  </tr>
					 
					    <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
					
					<tr class="">
				        <td>SCREEN  3 REMARKS</td>
						<td>'.$data->screenremarks3.'</td>
					</tr> 
					
					<tr>
						<td>SCREEN 3 URL</td>
						<td></td>
					</tr>
					
					<tr>
						<td  colspan="2" class="res_clas sp_abc running_latter">'.$data->screenurl3.'</td>
						
					  </tr>
					 
					</tr>
                                        
                                        
                                        
                                        
                                        
					<tr class="">
					<td colspan="2" class="zoneassigntd"><b style="font-size: 16px;">ATTENDEES INFO</b></td>
					</tr>
					<tr>
						<td>ATTENDEES COUNT</td>
						<td>NIL</td>
					</tr>
					

                                        
         
                                        ';
			}else{
				$output .= '
						<p><span class="current-bold">Currently Selected : </span>NO WORKSHOP SELECTED</p>
						
					 ';
			}
			
			echo $output;
	
	
	
	
	}
	
	
	
	function deleteSelectedWorkshops(){

	         $ids = $_POST['ids'];
                 $data['project_select'] = $_POST['project'];
                 $data['group_id'] = $_POST['group_id'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['workshops'] = $this->Workshop_model->getWorkshopByIdWhereIN($where_in); 
                 
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['workshops']=$this->Workshop_model->FetchAllData($_POST['project']);  
                    
                }
               
	        $data['title'] = "Delete ";
                $data['ids'] = $ids;
                 
		$this->load->view('workshop/deleteSelected',$data);
	
	
	
	}
	
	
	
	
	function deleteSelectedSuccessWorkshops(){
	
	         $ids = $_POST['ids'];
	         $data['project_select'] = $_POST['project'];
                 $data['group_id'] = $_POST['group_id'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['workshops'] = $this->Workshop_model->getWorkshopByIdWhereIN($where_in);
                   $this->Workshop_model->deeleteWorkshopByIdWhereIN($where_in); 
                 
                }else{
                   $data['title'] = "Delete ALl";
                   $data['selected'] = FALSE;
                   $data['workshops']=$this->Workshop_model->FetchAllData($_POST['project']); 
                   $this->Workshop_model->deeleteWorkshopByProject($_POST['project']);  
                    
                }
               
	        $data['title'] = "Delete ";
                $data['ids'] = $ids;
                 
		$this->load->view('workshop/deleteSelectedSuccess',$data);
	
	
	
	}
	
	
	
	
	
	
		public function guestList($id=false)
		{
			
			
			$data['title'] = "GUEST";
			$data['action'] = $_POST['action'];
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$data['workshopid'] = $_POST['workshopid'];
			
			
		       $check=$this->Places_model->FetchProjectTypeIdGuest($data['project_select']);
		       $project_type=$check->project_type;
	               $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE");
		
		}
		
		
		$type2=array("VIRTUAL SHOP REG REQUIRED","VIRTUAL SHOP NO REG REQUIRED");
		if(in_array($project_type, $type2)){
		$where_in = array("VIRTUAL SHOP OWNER","VIRTUAL SHOP REP","SHOPPER");
		
		}
		

		$type3=array("SHOP REG REQUIRED","SHOP NO REG REQUIRED");
		if(in_array($project_type, $type3)){
		$where_in = array("SHOP OWNER","SHOP REP","SHOPPER");
		}
		
               $type4=array("VENUE REG REQUIRED","VENUE NO REG REQUIRED");
		if(in_array($project_type, $type4)){
		$where_in = array("VENUE OWNER","VENUE REP","VISITOR");
		
		}
		
		
	        $type5=array("PROPERTY REG REQUIRED","PROPERTY NO REG REQUIRED");
		if(in_array($project_type, $type5)){
		$where_in = array("PROPERTY OWNER","PROPERTY AGENT","PROPERTY VIEWER");
		
		}
		 		
		$type6=array("DEMO REG REQUIRED","DEMO NO REG REQUIRED");
		if(in_array($project_type, $type6)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOTH PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE","PROPERTY OWNER","PROPERTY AGENT","PROPERTY VIEWER","VENUE OWNER","VENUE REP","VISITOR","SHOP OWNER","SHOP REP","SHOPPER");
		
		}
			
			
			
			$data['gtypes'] = $where_in;
			
			if(empty($data['workshopid']) || $data['workshopid']==0){
			$data['workshopid'] = trim($_POST['workshop']);
			}else{
			$data['workshopid'] =trim($_POST['workshopid']);
			
			}		 
     
			$this->load->view('workshop/guest_assign',$data);
		}
	
	
		function assignGuestWorkshop($workshop_id=false){
		
		   $ids = $_POST['ids'];
                  $ids_arr = explode(',', $ids);
                  $this->Workshop_model->deleteMappingWorkshop($workshop_id);
                  foreach($ids_arr as $id){
                  $data = array(
                  "workshop_id"=>$workshop_id,
                  "guest_id"=>$id
                  );
                  $this->Workshop_model->saveWorkShopmapping($data);
                  
                  }
                  
                  echo $workshop_id;
                  
                  
                  
		
		}
		
		
		
	 function addWorkshopStep3(){
 
         $data['title'] = "Add Workshop";
         $data['action'] = $_POST['action'];
         $data['project_select'] = $_POST['project'];
         $data['group_id'] = $_POST['group_id'];
         $data['workshop_id'] = $_POST['workshop_id'];
         
         if(!empty($data['workshop_id']) && $data['workshop_id']!=0){
         
          $data['workshop_id'] = $_POST['workshop_id'];
         }else{
          $data['workshop_id'] = $_POST['workshop'];
         
         }
         
         
       // print_r($_POST);  exit;
      		$data['workshop'] = $this->Workshop_model->FetchDataById($data['workshop_id']);
         $this->load->view('workshop/addNewstep3',$data); 
	   
	   
	   }
		
		
		
        function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->Workshop_model->deleteJunkRecordWorkshop($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      //  redirect("Location: config/".$group_id."/".$project_id);
        exit();
        }else{
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }		
		
		
		
		
		
		
		
		
	
	
	 
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Xfootprint extends CI_Controller {

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
		$this->load->model('xfootprint_model');
		$this->load->model('whatshot_model');
		$this->load->library('email');
		$this->load->library('session');
         
        
    }



	function index(){
	
	
	$userid = $this->session->userdata('user_id');
	
	$data['userStatus'] = $this->common->userStatus();
	//print_r($data['userStatus']);die;
                $user = $this->ion_auth->user($userid)->row(); 
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
				$data['data1']=$this->whatshot_model->FetchAllSlotsAssignData();
	       $data['title'] = "XPLATFORM";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/user_home',$data);
		$this->load->view('include/footer');  

	}
	
function allfoot($project_id=0){
	
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	         $userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user_id'] = $user_id;
                 
                $data['guestData'] = $this->guest_model->FetchFootprintDataById($user_id,$project_id);
				$id=$user_id;
				$data['group_id'] = $this->session->userdata('group');
				$data['project_id'] = $project_id;
				
				 
				$data['projects_details'] = $this->project_model->FetchDataById($project_id);
                             //  $data['projects'] = $this->project_model->get_projects_not_ended();
				 
				
	        $data['title'] = "ALL FOOTPRINTS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xfootprintall/allfootprint',$data);
		$this->load->view('include/footer');  

	} 
	
	
	
	
	
	function guestcount($project_id=0){
	
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	         $userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user_id'] = $user_id;
                 
                $data['guestData'] = $this->guest_model->FetchFootprintDataById($user_id,$project_id);
				$id=$user_id;
				$data['group_id'] = $this->session->userdata('group');
				$data['project_id'] = $project_id;
				
				 
				$data['projects_details'] = $this->project_model->FetchDataById($project_id);
                             //  $data['projects'] = $this->project_model->get_projects_not_ended();
				 
				
	        $data['title'] = "GUEST COUNTS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xfootprintall/guestcounts',$data);
		$this->load->view('include/footer');  

	} 
	
	
	
	
	function printguestcount(){
	
	///print_r($_POST);
	
	        $data['title'] = "GUEST COUNTS";
	       
	       
	       
	       
	       $data['projects_details'] = $this->project_model->FetchDataById($_POST['project_id']);
	       
		 
		 
		$this->load->view('xfootprintall/guestcountPrint',$data);
		   
		
 
	
	 
	}
	
	
	
	
	
	function searchGuestCount(){
	
	
	
		       $data1='';
			$searchData='';
			$searchDataOrderBy='';
			$projectid=47;

			if(1){
			
			
			//if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){

				if(!empty($_POST['selectData']=='SIGNIN')){
					
					//$searchData=array('xf_guest_count.module_name'=>'SIGN IN');
				}
				
			  
				 
				if(!empty($_POST['selectShortBy']== 'ACT_DETAILS')){
					$searchDataOrderByAsc='xf_guest_count.module_name';
				}
				if(!empty($_POST['selectShortBy']== 'IP_ADDRESS')){
					$searchDataOrderByAsc='xf_guest_count.ip_address';
				}
				if(!empty($_POST['selectShortBy']== 'GUEST_ID')){
					$searchDataOrderByAsc='xf_guest_count.xguest_id';
				}
				if(!empty($_POST['selectShortBy']== 'EMAIL')){
					$searchDataOrderBy='xf_guest_count.email';
				}
				
				if(!empty($_POST['selectShortBy'] == 'ACTIVITY')){
					$searchDataOrderByAsc='xf_guest_count.module_name';
				} 
				
				if(!empty($_POST['selectShortBy']== 'latest')){
					$searchDataOrderBy='xf_guest_count.created_at';
				}  
				if(!empty($_POST['selectShortBy']== 'earliest')){
				 	$searchDataOrderByAsc='xf_guest_count.created_at';
				}
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
		        	$start_date = trim($_POST['start_date']);
				$end_date = trim($_POST['end_date']);
			 
				
				$data1=$this->xfootprint_model->searchguestCount($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$start_date,$end_date,$projectid);
				
			}
			
			else{
				$data1=$this->project_model->get_allprojects($group_id);
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								 
							
								$getdata='';
								$showbtn='';
								 
								if(!empty($data->activity_time)){
									$startDate='<td class="loweditbt">'.$data->activity_time.'h</td>';
									
								} 
								 
							 
								 
							     $output .= '<tr data-hid='.$data->id.' id='.$data->id.' onclick="reply_click(this.id)" class="row'.$data->id.'">
								 
								<td style="font-weight:100;" class="loweditbt">'.$data->count_date.'</td>
								
								<td style="font-weight:100;" >'.$data->total.'</td>
								<td style="font-weight:100;" >'.$data->preregweb.'</td>
								<td style="font-weight:100;text-transform: lowercase !important;"  class="project_namecls"   >'.$data->preregad.'</td> 
								<td style="font-weight:100;" >'.$data->onlineregweb.'</td>
								<td style="font-weight:100;" >'.$data->onlineregad.'</td>
								<td style="font-weight:100;" >'.$data->onsireregweb.'</td>
								<td style="font-weight:100;" >'.$data->onsiteregad.'</td>
								<td style="font-weight:100;" >'.$data->guestlitsupload.'</td>
								 
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " > 
                                                              <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="9" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	
	
	function search(){
	
	
			$data1='';
			$searchData='';
			$searchDataOrderBy='';
			$projectid=47;

			if(1){
			
			
			//if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){

				if(!empty($_POST['selectData']=='SIGNIN')){
					
					$searchData=array('xf_mst_places_users_history.module_name'=>'SIGN IN');
				}
				
				if(!empty($_POST['selectData']=='SIGNOUT')){
					
					$searchData=array('xf_mst_places_users_history.module_name'=>'SIGN OUT'); 
				}
                                
                                if(!empty($_POST['selectData']=='FLOOR_PLAN')){
					
					$searchData=array('xf_mst_places_users_history.module_name'=>'FLOOR PLAN'); 
				}
				
				
			       if(!empty($_POST['selectData']=='INFO_ICON')){
					
					$searchData=array('xf_mst_places_users_history.module_name'=>'INFO ICON'); 
				}
				
				
				if(!empty($_POST['selectData']=='WORKSHOPS')){
					
					$searchData=array('xf_mst_places_users_history.module_name'=>'WORKSHOPS'); 
				}
				 
				
				 
				if(!empty($_POST['selectShortBy']== 'ACT_DETAILS')){
					$searchDataOrderByAsc='xf_mst_places_users_history.module_name';
				}
				if(!empty($_POST['selectShortBy']== 'IP_ADDRESS')){
					$searchDataOrderByAsc='xf_mst_places_users_history.ip_address';
				}
				if(!empty($_POST['selectShortBy']== 'GUEST_ID')){
					$searchDataOrderByAsc='xf_guest_users.xguest_id';
				}
				if(!empty($_POST['selectShortBy']== 'EMAIL')){
					$searchDataOrderBy='xf_guest_users.email';
				}
				
				if(!empty($_POST['selectShortBy'] == 'ACTIVITY')){
					$searchDataOrderByAsc='xf_mst_places_users_history.module_name';
				} 
				
				if(!empty($_POST['selectShortBy']== 'latest')){
					$searchDataOrderBy='xf_mst_places_users_history.created_at';
				}
				if(!empty($_POST['selectShortBy']== 'earliest')){
					$searchDataOrderByAsc='xf_mst_places_users_history.created_at';
				}
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				
				
				$start_date = trim($_POST['start_date']);
				$end_date = trim($_POST['end_date']);
			 
				
				$data1=$this->xfootprint_model->search($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$start_date,$end_date,$projectid);
				
			}
			
			else{
				$data1=$this->project_model->get_allprojects($group_id);
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								 
							
								$getdata='';
								$showbtn='';
								 
								if(!empty($data->activity_time)){
									$startDate='<td class="loweditbt">'.$data->activity_time.'h</td>';
									
								} 
							
							
							
							/* $projectuserfootpint =$this->xfootprint_model->getUserFootprintData($data->project_id,$data->user_ID);
							
							if($projectuserfootpint->guest_type=='UNKNOWN'){
							
							
							$xguestid= 'UNKNOWN';
							$xgemail= 'UNKNOWN';
							$gcompany= 'UNKNOWN';
							$modulenamex= 'UNKNOWN';
							$activitytxtappend= 'UNKNOWN';
							
							
							}else if($projectuserfootpint->guest_type=='NOT ON GUEST LIST'){
							
							
							$xguestid= 'NOT ON GUEST LIST';
							$xgemail= $data->gemail;
							$gcompany= $data->gcompany;
							$modulenamex= $data->module_name;
							
							
							}else{
							
						 
							  
							
							}   */
							
							
							
							
							$xguestid= $data->xguest_id;
							$xgemail= $data->gemail;
							$gcompany= $data->gcompany;
							$modulenamex= $data->module_name;
							 
							
							$activitydata = $this->xfootprint_model->getActivity($data->id);
							$modulename = $activitydata->module_name;
							
							
							if($modulename=='FLOOR PLAN'){
							
							$p1= '<p>'.$activitydata->floor_plan_name.'</p>';
							$p2= '<p>'.$activitydata->zone_name.'</p>';
							$activitytxtappend= $modulename.$p1.$p2;
							
							}
							
							
							
							if($modulename=='WORKSHOP'){
							
							$p1= '<p>'.$activitydata->floor_plan_name.'</p>';
							$p2= '<p>'.$activitydata->feature_name.'</p>';
							$activitytxtappend= $modulename.$p1.$p2;
							
							}
							
							
							
							
							if($modulename=='INFO ICON'){
							
							$p1= '<p>'.$activitydata->floor_plan_name.'</p>';
							$p2= '';
							$activitytxtappend= $modulename.$p1.$p2;

							

							}
							
							 
							if($modulename=='SIGNIN'){
			
							$activitytxtappend= 'SIGN IN';
							
							}
							
							
							 
								 
							 $output .= '<tr data-hid='.$data->gtpid.' id='.$data->id.' onclick="reply_click(this.id)" class="row'.$data->id.'">
								 
								<td style="font-weight:100;" class="loweditbt">'.$data->activity_time.'</td>
								<td style="font-weight:100;" >'.$data->ip_address.'</td>
								<td style="font-weight:100;" >'.$xguestid.'</td>
								<td style="font-weight:100;text-transform: lowercase !important;"  class="project_namecls"   >'.$xgemail.'</td> 
								<td style="font-weight:100;" >'.$gcompany.'</td>
								<td style="font-weight:100;" >'.$modulenamex.'</td>
								<td style="font-weight:100;" >'.$activitytxtappend.'</td>
								 
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " > 
      <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="9" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	
 
	
  public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->guest_model->FetchDataById($id); 
			$data1=$this->guest_model->FetchAllData($project=NULL);
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-status-1" style="color:#00b050!important;" >CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				    
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
					$DataField=json_decode($data->key);
					
					
					if($DataField->remark_1 == NULL){  $remark_1= "REMARKS 1 "; }else{ $remark_1= $DataField->remark_1; }
					if($DataField->remark_1 ==NULL){  $remark_1msg= "DISABLE"; }else{ $remark_1msg= "SHOW"; }
					if($DataField->remark_2 ==NULL){  $remark_2= "REMARKS 2 "; }else{ $remark_2= $DataField->remark_2; }
					if($DataField->remark_2 ==NULL){  $remark_2msg= "DISABLE"; }else{ $remark_2msg= "SHOW"; }
					if($DataField->remark_3 ==NULL){  $remark_3= "REMARKS 3 "; }else{ $remark_3= $DataField->remark_3; }
					if($DataField->remark_3 ==NULL){  $remark_3msg= "DISABLE"; }else{ $remark_3msg= "SHOW"; }
					if($DataField->remark_4 ==NULL){  $remark_4= "REMARKS 4 "; }else{ $remark_4= $DataField->remark_4; }
					if($DataField->remark_4 ==NULL){  $remark_4msg= "DISABLE"; }else{ $remark_4msg= "SHOW"; }
					if($DataField->remark_5 ==NULL){  $remark_5= "REMARKS 5 "; }else{ $remark_5= $DataField->remark_5; }
					if($DataField->remark_5 ==NULL){  $remark_5msg= "DISABLE"; }else{ $remark_5msg= "SHOW"; }
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span> <span id="multipleGUESTSelect" style="color:black;" > '.$data->first_name.'</span></p></td>
					   </tr>  
						
						
						 
						<tr>
							<td colspan="2" class="top-fc"><h5>GUEST CREATION INFO</h5></td>
						</tr>  
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr>   
						<td class="">Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td class="">GUEST ID </td>
						<td>'.$data->xguest_id.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					   <tr>
						<td class="">GUEST REGISTRATION TYPE </td>
						<td>'.$data->guest_registration_type.'</td>
					  </tr>
					  
					    <tr>
						<td class="">GUEST TYPE </td>
						<td>'.$data->guest_type.'</td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
		
					  <tr>
						<td class="">MASS UPLOAD FILE NAME</td>
						<td>'.$data->mass_upload_filename.'</td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_date_time .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>    
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr>    
						<td class="">Created User Name</td>
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
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					
					
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST PERSONAL INFO</b></td>
						</tr>
						
						<tr>
						<td>SALUTATION</td>
						<td class="" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td class="" >'.$data->last_name.'</td>
					  </tr>
					  <tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td class="">'.$data->username.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td class="">'.$data->gender.'</td>
					  </tr>
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm">'.$data->quick_intro.'</td>
					  </tr>
					      
					  	  
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST COMPANY & WORK INFO</b></td>
						</tr>
						
						<tr>
						<td>COMPANY NAME</td>
						<td class="" ></td>
					  </tr>
					  
					  <tr>
					  <td colspan="2" class="res_clas sp_abc"> '.$data->company.' </td>		 
					</tr>
					  
					  					  <tr>
						<td>COMPANY ADDRESS</td>
						<td class="" >'.$data->company_address.'</td>
					  </tr>
					  <tr>
						<td>COMPANY POSTAL CODE</td>
						<td  >'.$data->pincode.'</td>
					  </tr>
					  <tr> 
						<td>DESIGNATION</td>
						<td>'.$data->designation.'</td>
					  </tr>
					  <tr>
						<td>EMAIL</td>
						<td class="running_latter"></td>
					  </tr>
					  
					  <tr>
					  <td colspan="2" class="res_clas sp_abc running_latter"> '.$data->email.' </td>		 
					</tr>
					  
					  <tr>
						<td>COUNTRY CODE</td>
						<td>'.$data->country_code.'</td>
					  </tr>
					  
					  <tr>
						<td>MOBILE</td>
						<td>'.$data->phone.'</td>
					  </tr>
					  
					  <tr>
						<td>DID</td>
						<td>'.$data->did.'</td>
					  </tr>
					  <tr>
						<td>TEL</td>
						<td>'.$data->tel.'</td>
					  </tr>
					  <tr>
						<td>EXTENSION</td>
						<td>'.$data->extension.'</td>
					  </tr>
					  
					     
					  <body>  
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST MISC INFO</b></td>
						</tr>
						
						<tr>
						<td  class="sp_dj">'.$remark_1.'</td>
						 <td>'.$remark_1msg.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">'.$remark_2.'</td>
						<td>'.$remark_2msg.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">'.$remark_3.'</td>
						 <td>'.$remark_3msg.'</td>
					  </tr>
					  <tr>
						<td  class="sp_dj">'.$remark_4.'</td>
						<td>'.$remark_4msg.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">'.$remark_5.'</td>
						<td>'.$remark_5msg.'</td>
					  </tr>
					  
					  
					  
					  
					    <body>
						<tr>
					<td colspan="2" class="floor-ck"><b style="font-size: 16px;"> GUEST ATTENDANCE INFO</b></td>
						</tr>
						
					<tr>
						<td>ATTENDANCE STATUS</td>
						<td class="" ></td>
					  </tr>
					  
					   <tr>
						<td>CHECK IN DATE & TIME</td>
						<td class="" ></td>
					  </tr>
					  <tr>
						<td>CHECK IN IP ADDRESS</td>
						<td  ></td>
					  </tr>
					  <tr> 
						<td>CHECK IN SOURCE</td>
						<td></td>
					  </tr>
					  <tr> 
						<td>CHECK OUT DATE & TIME</td>
						<td></td>
					  </tr>
					  
					   <tr> 
						<td>CHECK OUT IP ADDRESS</td>
						<td></td>
					  </tr>
					  
					   <tr> 
						<td>CHECK OUT SOURCE</td>
						<td></td>
					  </tr>
					  
					  
					  
					  
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
		
		
		
		
		
		
	
  public function searchSingleDataGuest()
		{
			$id=$_GET['clicked_id'];
			$data=$this->xfootprint_model->FetchDataById($id); 
			$data1=$this->xfootprint_model->FetchAllData($project=NULL);
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-status-1" style="color:#00b050!important;" >CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				    
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';

				 
					
					
					 
					$output .= '
					
 
						 
						 
					    <body>
						<tr>
						<td class="">TOTAL COUNT</td>
						<td>'.$data->total.'</td>
					  </tr>
					  <tr>   
						<td class="">PREREGWB</td> 
						<td>'.$data->preregweb.'</td>
					  </tr>   
					  <tr>
						<td class="">PREREGAD </td>
						<td>'.$data->preregad.'</td>
					  </tr>
					  
					  
					   <tr>
						<td class="">ONLINEREGWEB </td>
						<td>'.$data->onlineregweb.'</td>
					  </tr>
					  
					    <tr>
						<td class="">ONLINEREGAD </td>
						<td>'.$data->onlineregad.'</td>
					  </tr>
		
					  <tr>
						<td class="">ONSITEREGWB</td>
						<td>'.$data->onsireregweb.'</td>
					  </tr>
					  
					      
					  <tr>
						<td>GUEST LIST UPLOAD</td>
						<td>'.$data->guestlitsupload .'</td>
					  </tr>
				 
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}		
		
		
		
		
		
		
	public function getPreviousCounts($yesterday){
	
	
	$return = $this->xfootprint_model->getPreviousCounts($yesterday);
	
	return $return;
	
	
	}
	
	
	
		
	function insertTodayCount($today){
	
	
	
	$projects = $this->xfootprint_model->getGuestUpdatesProjectIdsAll();
	
	
	
	foreach($projects as $project){
	 
	$datapro =  array(
	'project_id'=>$project['project_id'],
	'count_date'=>$today
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro);
	
	if(empty($data_exist)){
	$this->xfootprint_model->insertProjectCountTable($datapro);
	}
	
	
	
	
	
	}
	
	
	
	
	$preregweb = $this->xfootprint_model->getGuestCountTodaypreregweb($today);
	$preregad = $this->xfootprint_model->getGuestCountTodaypreregad($today);
	$onlineregweb = $this->xfootprint_model->getGuestCountTodayonlineregweb($today);
	$onlineregad = $this->xfootprint_model->getGuestCountTodayonlineregad($today);
	$onsireregweb = $this->xfootprint_model->getGuestCountTodayonsiteregweb($today);
	$onsiteregad = $this->xfootprint_model->getGuestCountTodayonsiteregad($today);
	$guestlitsupload = $this->xfootprint_model->getGuestCountTodayguestlitsupload($today);
	 
	
	  
	$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($today)));
	
 

	  
	 
	if(!empty($preregweb)){

        foreach($preregweb as $datapreregweb){
	 
	$projectid= $datapreregweb['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);

	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->preregweb;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'preregweb'=>$datapreregweb['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	}else{
	
	 
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	//print_r($data_exist);   exit;
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'preregweb'=>$data_exist['preregweb']
	);
	//print_r($dataupdate);   exit;
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	}
	
	
	
	
	if(!empty($preregad)){

	foreach($preregad as $datapreregad){
	 
	$projectid= $datapreregad['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);
		
	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->preregad;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'preregad'=>$datapreregad['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	
	}else{
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'preregad'=>$data_exist['preregad']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	
	}
	
	
	
	
	
	if(!empty($onlineregweb)){
	
	
	
	
	foreach($onlineregweb as $dataonlineregweb){
	 
	$projectid= $dataonlineregweb['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);
	
 
	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->onlineregweb;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'onlineregweb'=>$dataonlineregweb['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	
	}else{
	
	
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'onlineregweb'=>$data_exist['onlineregweb']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	}
	
	
	
	
	
	
	
	
	if(!empty($onlineregad)){
	

	foreach($onlineregad as $dataonlineregad){
	 
	$projectid= $dataonlineregad['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);
	
	
	
	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->onlineregad;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'onlineregad'=>$dataonlineregad['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	}else{
	
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'onlineregad'=>$data_exist['onlineregad']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	}
	
	
	
	
	if(!empty($onsireregweb)){
	
	 
	foreach($onsireregweb as $dataonsireregweb){
	 
	$projectid= $dataonsireregweb['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);
	
 
	
	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->onsireregweb;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'onsireregweb'=>$dataonsireregweb['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	
	}else{
	
	
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'onsireregweb'=>$data_exist['onsireregweb']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	
	}
	
	
	
	
	
	if(!empty($onsiteregad)){
	
	
	
	foreach($onsiteregad as $dataonsiteregad){
	 
	$projectid= $dataonsiteregad['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);
	
	
	 
	
	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->onsiteregad;
	}else{
	$yescount = 0;
	}
	
	$dataupdate=array(
	'onsiteregad'=>$dataonsiteregad['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	}else{
	
	
	
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'onsiteregad'=>$data_exist['onsiteregad']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	
	
	}
	
	
	
	
	if(!empty($guestlitsupload)){
	
 
	foreach($guestlitsupload as $dataguestlitsupload){
	 
	$projectid= $dataguestlitsupload['project_id'];
	
	$returnyesterday = $this->xfootprint_model->getPreviousCounts($yesterday,$projectid);

	if(!empty($returnyesterday)){
	$yescount = $returnyesterday->guestlitsupload;
	}else{
	$yescount = 0;
	}
	
	
	$dataupdate=array(
	'guestlitsupload'=>$dataguestlitsupload['tot'] + $yescount
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	
	}else{
	
	
	
	$yesterdayprojects = $this->xfootprint_model->getGuestUpdatesProjectIdsgUESTcOUNT($yesterday);	
	foreach($yesterdayprojects as $yesterdayproject){
	 
	$datapro =  array(
	'project_id'=>$yesterdayproject['project_id'],
	'count_date'=>$yesterday
	);
	
	
	$data_exist=  $this->xfootprint_model->getProjectCountTable($datapro)[0];
	
	if(!empty($data_exist)){
	
	$dataupdate = array(
	'guestlitsupload'=>$data_exist['guestlitsupload']
	);
	
	$this->xfootprint_model->updateCountTable($dataupdate,$yesterdayproject['project_id'],$today);

	}

	}
	
	
	
	}
	
	
	
/*	foreach($onlineregad as $dataonline){
	// print_r($dataonline['tot']);  exit;
	$projectid= $dataonline['project_id'];
	$dataupdate=array(
	'onlineregad'=>$dataonline['tot']
	);
	$this->xfootprint_model->updateCountTable($dataupdate,$projectid,$today);
	}
	
	
	
	*/
	
	
	
	

	
	
	
	}
		
		
		
		
	public function updateProjectCounts(){
	
	$today = date('Y-m-d');
	
	
	echo $today;
	
	
	$this->insertTodayCount($today);	
	
	
 	
	
	
	
	
	
	}	
		
		
		
		
		
		
		
		
		
		
		
		
 
	
	
	
 
}

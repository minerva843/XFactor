<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Guest extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
	$this->load->library('form_validation');
        $this->load->model('Guest_model', 'guest_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->model('Ion_auth_model');
		$this->load->model('Places_model');
		$this->load->model('Guest_model');
		//$this->load->model('Project_model');
		$this->load->model('project_model','project_m');
		
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('project_model','project_m');
        
    }
	
	 
		public function index()
		{
			
			 
			$data['title'] = "GUEST";
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			
			
		      
			
			
		       $check=$this->Places_model->FetchProjectTypeIdGuest($data['project_select']);
		       $project_type=$check->project_type;
	               $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOK PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE");
		
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
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOK PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE","PROPERTY OWNER","PROPERTY AGENT","PROPERTY VIEWER","VENUE OWNER","VENUE REP","VISITOR","SHOP OWNER","SHOP REP","SHOPPER");
		
		}
			
			
		$data['gtypes'] = $where_in;		
			
			
			$this->load->view('guest/all_guest',$data);
		}
		
		
		
		
		
		
		function searchChatGroupGuest(){
		
		
		        $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$project = trim($_POST['project']);
			//$workshop = trim($_POST['project']);
			$groupchat = trim($_POST['groupchat']);
			$groupchatid = trim($_POST['groupchatid']);
			if($groupchat!=1){
			$hide = 'hide';
			
			}
			
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					 
				$search= trim($_POST['selectData']); 
					
					
				}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='xf_guest_users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='xf_guest_users.company';
				}
				if(!empty($_POST['selectShortBy'] == 'gtype-a-z')){
					$searchDataOrderByAsc='xf_guest_users.guest_type';
				}
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				// print_r($searchDataOrderByAsc);  exit;
				$data1=$this->guest_m->searchGroupChatGuest($search,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project,$groupchatid);
				 
				
			}
			
			else{
				$mapping = $this->guest_m->getChatGroupMapping($groupchatid);
				$data1 = $this->guest_m->FetchAllDataGroupChatGuest($project,NULL,$groupchatid,$mapping);
	
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checked='';
						if(!empty($data['gstmapid'])){
						$checked = 'checked';
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
							 
								<td class="deletesingle" >
								
								<input type="checkbox" '.$checked.' data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xguest_id'].'</td>
								<td >'.$data['guest_registration_type'].'</td>
								
								<td>'.$data['guest_type'] .'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td>'.$data['email'] .'</td> 
								<td>'.$data['phone'] .'</td> 
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
		
		
		
		
		
		function searchWorkshopGuest(){
		
		
		        $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$project = trim($_POST['project']);
			
			$workshop = trim($_POST['workshop']);
			$workshopid = trim($_POST['workshopid']);
			if($workshop!=1){
			$hide = 'hide';
			}
			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData']) ){
				if(!empty($_POST['selectData'])){
					 
				$searchFloor= trim($_POST['selectData']); 
					
				}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.first_name ASC';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.last_name ASC';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchDataOrderByAsc='xf_guest_users.email ASC'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='xf_guest_users.company ASC';
				}
				if(!empty($_POST['selectShortBy'] == 'gtype-a-z')){
					$searchDataOrderByAsc='xf_guest_users.guest_type ASC';
				}
				
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_latest')){
					$searchDataOrderByAsc='xf_guest_users.created_date_time ASC';
				}
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='xf_guest_users.created_date_time DESC';
				}
				
				
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_latest')){
					$searchDataOrderByAsc='xf_guest_users.last_edited_date_time ASC';
				}
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='xf_guest_users.last_edited_date_time DESC';
				}
				
				
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				$data1 = $this->guest_m->searchWorkshopGuest($searchFloor,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project,$workshopid);
				 
				
			}
			
			else{
				$mapping = $this->guest_m->getWorkshopMapping($workshopid);
				$data1 = $this->guest_m->FetchAllDataWorkshopGuest($project,NULL,$workshopid,$mapping);
	
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checked='';
						if(!empty($data['wrkid'])){
						$checked = 'checked';
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
							 
								<td class="deletesingle" >
								
								<input type="checkbox" '.$checked.' data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xguest_id'].'</td>
								<td >'.$data['guest_registration_type'].'</td>
								
								<td>'.$data['guest_type'] .'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td>'.$data['email'] .'</td> 
								<td>'.$data['phone'] .'</td> 
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
		
		
    
		public function search()
		{
			 
			$searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$project = trim($_POST['project']);
			$workshop = trim($_POST['workshop']);
			if($workshop!=1){
			$hide = 'hide';
			
			}
			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					//$searchFloor=array('f.floor_plan_grid_type'=>$_POST['floor_plan']);
				 
			if(!empty($_POST['selectData'])){
						$searchGuestType=array('xf_guest_users.guest_type '=>trim($_POST['selectData'])); 
					}
					
				}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='xf_guest_users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='xf_guest_users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='xf_guest_users.company';
				}
				if(!empty($_POST['selectShortBy'] == 'gtype-a-z')){
					$searchDataOrderByAsc='xf_guest_users.guest_type';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='xf_guest_users.created_date_time';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='xf_guest_users.created_date_time';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='xf_guest_users.last_edited_date_time';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='xf_guest_users.last_edited_date_time';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->guest_m->search($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project,$searchDataOrderByDsc);
				
				
			}
			
			else{
				
				$data1=$this->guest_m->FetchAllData($project);
				
				 
				
			}
			$countdata=0;
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
							 
							
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xguest_id'].'</td>
								<td >'.$data['guest_registration_type'].'</td>
								
								<td>'.$data['guest_type'] .'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td>'.$data['email'] .'</td> 
								<td>'.$data['phone'] .'</td> 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
						$countdata++;	  
					}
					
				}else{ 
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				$mydata['data']=$output;
				//$mydata['countdata']=count($countdata);
				$mydata['countdata']=$countdata;
				echo json_encode($mydata);
			
		}
		
		
		function getFloorPlanCoordData($floor){
			$data=$this->guest_m->FetchDataByIdXFP($floor); 
			echo json_encode(array('response'=>array('image'=>$data->file_name.$data->file_type,'plan_id'=>$data->floor_plan_id,'coordinates'=>$data->floor_plan_drop_point)));
			
		}
		
		
		
		
	public function searchSingleDataWorkshop()
		{
			$id=$_GET['clicked_id'];
			$data=$this->guest_m->FetchDataById($id); 
			$data1=$this->guest_m->FetchAllData($project=NULL);
			$checkNull='';
			if(!empty($_GET['chat_action'])){
				if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
				}else{
							$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED: </span> NO GUEST SELECTED</p><div class="display-step-status" id="displaystatus" >
									 <h5>STEP 2 OF 3</h5>
									
									
									 </div><p>SELECT GROUP CHAT ATTENDEES.</p><p>CLICK NEXT WHEN DONE.</p>';
				}
			}else{
				if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
				}else{
							$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED: </span> NO GUEST SELECTED</p><div class="display-step-status" id="displaystatus" >
									 <h5>STEP 2 OF 3</h5>
									
									
									 </div><p>SELECT WORKSHOP ATTENDEES.</p><p>CLICK NEXT WHEN DONE.</p>';
				}
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
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->first_name.'</span></p></td>
					    </tr>
						
						
						<tr>
							<td colspan="2" class="top-fc"><h5>GUEST CREATION  INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td>GUEST ID </td>
						<td>'.$data->xguest_id.'</td>
					  </tr>
					  
					  
					  <tr>
<td colspan="2" class="res_clas sp_abc a-space"></td>
</tr>
					  
					  <tr class="fl_space">
						<td>MASS UPLOAD FILE NAME</td>
						<td>-</td>
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
						<td class="textprojectname" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td  >'.$data->last_name.'</td>
					  </tr>
					  <!--tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td></td>
					  </tr-->
					  <tr>
						<td>GENDER</td>
						<td>'.$data->gender.'</td>
					  </tr>
					  
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter quick_intro_guest">'.$data->quick_intro.'</td>
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
						<td class="" ></td>
					  </tr>
					        
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm">'.$data->company_address.'</td>
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
		
		
		public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->guest_m->FetchDataById($id); 
			$data1=$this->guest_m->FetchAllData($project=NULL);
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>';  
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
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->first_name.'</span></p></td>
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
						<td class="fl_spaceid">Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td class="fl_spaceid">GUEST ID </td>
						<td>'.$data->xguest_id.'</td>
					  </tr>
					  
					  
					   <tr>
						<td class="fl_spaceid">GUEST REGISTRATION TYPE </td>
						<td>'.$data->guest_registration_type.'</td>
					  </tr>
					  
					    <tr>
						<td class="fl_spaceid">GUEST TYPE </td>
						<td>'.$data->guest_type.'</td>
					  </tr>
		
						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
					  <tr>
						<td class="fl_spaceid">MASS UPLOAD FILE NAME</td>
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
						<td class="fl_spaceid">Created User Name</td>
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
						<td class="fl_spaceid" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="fl_spaceid" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td class="fl_spaceid" >'.$data->last_name.'</td>
					  </tr>
					  <tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td class="fl_spaceid">'.$data->username.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td class="fl_spaceid">'.$data->gender.'</td>
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
						<td class="" ></td>
					  </tr>
					       
					   <tr>
					  <td colspan="2" class="res_clas sp_abc"> '.$data->company_address.' </td>		 
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
        
  
      
        
	public function addstep1($id=false,$operation='ADD')
	{
		$data['project_select'] = $_POST['project'];
		$check=$this->Places_model->FetchProjectTypeIdGuest($data['project_select']);
		$project_type=$check->project_type;
	    $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOK PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE");
		
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
		$where_in = array("ORGANISER","SPONSOR","EXHIBITOR","PARTNER","SPEAKER","PANELIST","VIP","CELEBRITY","PERFORMER","FEATURED","OTHERS","BOOTH ORGANISER","BOOTH SPONSOR","BOOTH EXHIBITOR","BOOTH PARTNER","BOOTH SPEAKER","BOOK PANELIST","BOOTH VIP","BOOTH CELEBRITY","BOOTH PERFORMER","BOOTH FEATURED","BOOTH OTHERS","DELEGATE","PROPERTY OWNER","PROPERTY AGENT","PROPERTY VIEWER","VENUE OWNER","VENUE REP","VISITOR","SHOP OWNER","SHOP REP","SHOPPER");
		
		}
	
		$data['guesttypes'] = $where_in;
		$CountryCode = $this->common->getCountryCode();
		$data['CountryCode'] = $CountryCode;
		
		
		$query = $this->db->get_where('xf_mst_project', array('id' => $_POST['project']));
		$proj=$query->row();
		$project_type=$proj->project_type;
		
		
		if(strpos($project_type,"NO REG REQUIRED")){
		
		$data['no_reg'] = 1;
		
		}else{
		$data['no_reg'] = 0;
		
		}
		
		
		if(!empty($id)){
			
			$data['title'] = "GUEST";
			$data['action'] = "EDIT";
			$data['group_id'] = $_POST['group_id'];
			$data['data1'] =$this->guest_m->FetchDataById($id);
			//$pre_array = (array) $data['data1'];
		
			//array_push($pre_array, array('gprimary' => $pre_array['id']));
			//unset($pre_array['id']);
			/*$pre_array_insert['gprimary'] = $pre_array['id'];
			$pre_array_insert['user_id'] = $pre_array['user_id'];
			$pre_array_insert['project_id'] = $pre_array['project_id'];
			$pre_array_insert['group_id'] = $pre_array['group_id'];
			$pre_array_insert['xguest_id'] = $pre_array['xguest_id'];
			$pre_array_insert['mm_id'] = $pre_array['mm_id'];
			$pre_array_insert['mm_username'] = $pre_array['mm_username'];
			$pre_array_insert['mm_email'] = $pre_array['mm_email'];
			$pre_array_insert['first_name'] = $pre_array['first_name'];
			$pre_array_insert['last_name'] = $pre_array['last_name'];
			$pre_array_insert['username'] = $pre_array['username'];
			$pre_array_insert['guest_type'] = $pre_array['guest_type'];
			$pre_array_insert['guest_registration_type'] = $pre_array['guest_registration_type'];
			$pre_array_insert['phone'] = $pre_array['phone'];
			$pre_array_insert['email'] = $pre_array['email'];
			$pre_array_insert['password'] = $pre_array['password'];
			$pre_array_insert['dob'] = $pre_array['dob'];
			$pre_array_insert['salutation'] = $pre_array['salutation'];
			$pre_array_insert['gender'] = $pre_array['gender'];
			$pre_array_insert['company'] = $pre_array['company'];
			$pre_array_insert['country_code'] = $pre_array['country_code'];
			$pre_array_insert['country'] = $pre_array['country'];
			$pre_array_insert['pincode'] = $pre_array['pincode'];
			$pre_array_insert['tel'] = $pre_array['tel'];
			$pre_array_insert['did'] = $pre_array['did'];
			$pre_array_insert['extension'] = $pre_array['extension'];
			$pre_array_insert['company_address'] = $pre_array['company_address'];
			$pre_array_insert['designation'] = $pre_array['designation'];
			$pre_array_insert['avatar'] = $pre_array['avatar'];
			$pre_array_insert['qrcode'] = $pre_array['qrcode'];
			$pre_array_insert['remark_1'] = $pre_array['remark_1'];
			$pre_array_insert['remark_2'] = $pre_array['remark_2'];
			$pre_array_insert['remark_3'] = $pre_array['remark_3'];
			$pre_array_insert['remark_4'] = $pre_array['remark_4'];
			$pre_array_insert['remark_5'] = $pre_array['remark_5'];
			$pre_array_insert['status'] = $pre_array['status'];
			$pre_array_insert['active'] = $pre_array['active'];
			$pre_array_insert['otp'] = $pre_array['otp'];
			$pre_array_insert['steps'] = $pre_array['steps'];
			$pre_array_insert['quick_intro'] = $pre_array['quick_intro'];
			$pre_array_insert['ip_address'] = $pre_array['ip_address'];
			$pre_array_insert['created_on'] = $pre_array['created_on'];
			$pre_array_insert['updated_at'] = $pre_array['updated_at'];
			$pre_array_insert['created_date_time'] = $pre_array['created_date_time'];
			$pre_array_insert['created_ip_address'] = $pre_array['created_ip_address'];
			$pre_array_insert['created_xmanage_id'] = $pre_array['created_xmanage_id'];
			$pre_array_insert['created_username'] = $pre_array['created_username'];
			$pre_array_insert['last_edited_date_time'] = $pre_array['last_edited_date_time'];
			$pre_array_insert['last_edited_ip_address'] = $pre_array['last_edited_ip_address'];
			$pre_array_insert['last_edited_xmanage_id'] = $pre_array['last_edited_xmanage_id'];
			$pre_array_insert['last_edited_username'] = $pre_array['last_edited_username'];
			$pre_array_insert['chat_enable'] = $pre_array['chat_enable'];
			
			$pre_array_insert['chat_channels'] = $pre_array['chat_channels'];
			$pre_array_insert['new_u'] = $pre_array['new_u']; */
			
			
			
		//	$this->guest_m->preinsert($pre_array_insert);			
			
			
                       $this->load->view('guest/addstep1',$data);
		}else{
			$data['title'] = "GUEST";
			$data['action'] = "ADD";
			$data['group_id'] = $_POST['group_id'];
			$this->load->view('guest/addstep1',$data);
		}
	}
	
	
	
	function deleteSelectedGUESTSsuccess(){
	
		
                $data['project_select'] = $_POST['project'];
                if(!empty($_POST['ids'])){
                  $ids = $_POST['ids'];
				  //print_r($ids);
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected Success";
                  $data['selected'] = TRUE;
                  $data['success'] = TRUE;
                  $data['ids'] = $ids;
                  $data['guests'] = $this->guest_m->getByIdWhereIN($ids_arr); 
				  //print_r($data['guests']);die;
                  $this->guest_m->DeleteDataByMultipleIdGuest($ids_arr); 
				  foreach($data['guests'] as $gID)
				  {
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."users/".$gID['mm_id'],
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "DELETE",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					//echo $response; die; 
				  }
                     
                }else{
                
                $data['selected'] = FALSE;
                $data['title'] = "Delete Selected Success";
                $data['guests'] = $this->guest_m->getByIdWhereIN(array(),$_POST['project']);
                
                $this->guest_m->DeleteDataByMultipleIdGuest(array(),$_POST['project']);  
                }  
                $data['group_id'] = $_POST['group_id'];             
		$this->load->view('guest/deleteallsucess',$data);
	
	
	
	
	}
	
	
	function deleteSelectedGUESTS(){
	
	       
                $data['project_select'] = $_POST['project'];
                if(!empty($_POST['ids'])){
                  $ids = $_POST['ids'];
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
                  $data['guests'] = $this->guest_m->getByIdWhereIN($ids_arr); 
                  
        
                  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['guests'] = $this->guest_m->getByIdWhereIN(array(),$_POST['project']); 
                 
                    
                }
               $data['group_id'] = $_POST['group_id'];
		$this->load->view('guest/deleteall',$data);
	
	}
	
	
	function addstep1Post($id=false)
	{
		    
		
		$userdatamobile=array();
		$userdata = array();
	       $where = array(
			'email'=>$this->input->post('email'),
			'project_id'=>$_POST['project']
			);
			
		if(empty($id)){
			$userdata = $this->Guest_model->FetchDataByWhere($where);		//check for duplicate record in Guest table
			
			if(empty($id) && !empty($userdata)){
			
				$return['erroremail'] = "Email Already Exist";
		
			}
			
		}

		if(empty($userdata)){		//if no record in Guest table
		      
		
			if($_FILES){
				$filename = $_FILES['image']['name'];
				$uploadurl= './assets/images/'.$filename;
				move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
				$array['avatar']=$filename;
				$array2['avatar']=$filename;
			}
			if(!empty($id)){
				$array['guest_type']=$this->input->post('guest_type');
				$array['salutation']=$this->input->post('salutation');
				$array['gender']=$this->input->post('gender');
				$array['first_name']=$this->input->post('first_name');
				$array['last_name']=$this->input->post('last_name');
				$array['country_code']=$this->input->post('country_code');
				$array['email']=$this->input->post('email');
				$array['phone']=$this->input->post('mobile');
				$array['username']=$this->input->post('username');
				$array['quick_intro']=$this->input->post('quick_intro');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['edit_steps']=1;
				$result=$this->guest_m->UpdateData($id,$array);
				if($result==true){
					//echo $id;
					$return['error'] = FALSE;
					echo json_encode(array('response'=>$return,'gid'=>$id));
				}
				
			}else{
			
		
				$check=$this->Places_model->FetchProjectTypeIdGuest($_POST['project']);		//get project type
				$project_type=$check->project_type;
				$type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
				if(in_array($project_type, $type1)){
		
					$guest_registration_type =  'PREREGAD';
	
				}else{
					$guest_registration_type =  'ONLINEAD';
		
			}
				$xmanage_id='XP'.rand(100000000000000,999999999999999);
				$otp=rand(100000,999999);
				$array['otp']=$otp;
				$array['steps']=1;
				$array['project_id']=$this->input->post('project_id');
				$array['group_id']=$this->input->post('group_id');
				$array['xguest_id'] = 'XPGS'.rand(100000000000000,999999999999999);
				$array['guest_registration_type'] = $guest_registration_type;
				$array['email']=$this->input->post('email');
				$array['phone']=$this->input->post('mobile');
				$array['country_code']=$this->input->post('country_code');
				$array['guest_type']=strtoupper($this->input->post('guest_type'));
				$array['salutation']=strtoupper($this->input->post('salutation'));
				$array['gender']=strtoupper($this->input->post('gender'));
				$array['first_name']=$this->input->post('first_name');
				$array['last_name']=$this->input->post('last_name');
				$array['username']=$this->input->post('username');
				$array['quick_intro']=$this->input->post('quick_intro');
				$array['created_date_time']=date("Y-m-d G:i");
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date("Y-m-d G:i"); 
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['edit_steps']=1;
				//$array['xmanage_id']='XCG'.rand(1000000000,9999999999);

                $array['user_id']=$user_id;
				
				$lastId=$this->guest_m->insert($array);
				$data_guest=$this->guest_m->FetchDataById($lastId); 
				
		//		print_r(' guest data--'); print_r($array);die;
				//$this->ion_auth->mattermostSignup($array['email'],$array['username'],$lastId,$array['project_id']);
								
				$result_email_exist = $this->Ion_auth_model->getUserByEmailPhoneUsername(trim($array['email']));
				

 				if(empty($result_email_exist)){
			        $data_in_users = array(
						'xmanage_id' => $xmanage_id,
						'create_user_byadmin' => true,
						'user_type' => 'GUEST',
						'first_name' => $data_guest->first_name,
						'last_name' => $data_guest->last_name,
						'company' => $data_guest->company,
						'phone' => $data_guest->phone,
						'gender' =>$data_guest->gender,
						'active' =>1,
						'username' => $data_guest->username,
						'salutation'=>$data_guest->salutation,
						'country_code' => $data_guest->country_code,
						'registration_type' => $guest_registration_type,
						'quick_intro'=> $data_guest->quick_intro,
						'created_datetime'=>date('Y-m-d G:i:s'),
						'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
						'created_username'=>$this->session->userdata('username'),
						'last_edit_datetime'=>date('Y-m-d G:i:s'),
						'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
						'last_edit_xmanage_id'=>$this->session->userdata('xmanage_id'),
						'last_edit_username'=>$this->session->userdata('username')
					);
					$identity = $data_guest->email;
					$password = $this->ion_auth->hash_password($data_guest->phone);
					$email = $data_guest->email;
					$data_return = $this->ion_auth->register($identity, $password, $email, $data_in_users,array(),$array['project_id'],TRUE);
					if(empty($data_return['id'])){
						$user_id=$data_return;
					}else{
						$user_id = $data_return['id'];
						$new = $data_return['new'];
					}
					 
					$this->GenarateQRCode($user_id);
					$this->guest_m->UpdateDataByEmail($data_guest->email,$user_id);
					$array3 = array(
					'new_u'=>1
					);
				$result=$this->guest_m->UpdateData($lastId,$array3);
				if($data_guest->group_id!==1){
				$this->db->insert('users_groups',
								  [ 'group_id' => $data_guest->group_id,
									'user_id'  => $user_id ]); 
				}
			
			}else{
				$user_id = $result_email_exist[0]->id;
				$this->guest_m->UpdateDataByEmail($data_guest->email,$user_id);
			
			}


			$user_table_check = $this->common->getChatUsersByProjectUser($user_id, $this->input->post('project_id'));
			if(empty($user_table_check)){
				$mattrmostUser = $this->ion_auth->mattermostSignup($user_id,$this->input->post('username'),$lastId,$this->input->post('project_id'));
			}else{
				$mattrmostUser = array(
					'mm_id' => $user_table_check->mm_id,
					'mm_username' => $user_table_check->mm_username,
					'mm_email' => $user_table_check->mm_email 
				);
			}
			$this->project_m->updatemm($mattrmostUser,$lastId); 
			$this->common->deletegetChatUsersInfoByProjectUser($user_id,$this->input->post('project_id'));
				
				if($lastId != false){
						//echo $lastId;
						$return['error'] = FALSE;
						echo json_encode(array('response'=>$return,'gid'=>$lastId));
					} 
			}


		}else{
			$return['error'] = TRUE;
			echo json_encode(array('response'=>$return));
		}




		
	}
	
	
	function addstep3Post($id=false){ 
		
						
	                       $id=$_POST['id'];
						   $data_guest=$this->guest_m->FetchGuestSingleDataById($id); 
						   //Generate QR CODE
						   $user =  $this->ion_auth->user($data_guest->user_id)->row();
						//$qrcode=$this->GenarateQRCode($id);
						$qrcode='<img src="'. base_url().'assets/qrphp/temp/'.$user->qrcode.'" />';
						//Generate QR CODE
						
	                       if($_POST['no_reg']==1){
	                       $array['steps']= 4;
	                       $array['edit_steps']=4;
	                       }else{
	                       //$array['steps']=3;
	                       }
				if(!empty($id)){
					//$data_guest=$this->guest_m->FetchDataById($id); 
				$array['company']=$this->input->post('company_name');
				$array['company_address']=$this->input->post('company_address');
				$array['country']=$this->input->post('country');
				$array['pincode']=$this->input->post('pincode');
				$array['designation']=$this->input->post('designation');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['edit_steps']=3;
				$result=$this->guest_m->UpdateData($id,$array);
				
				
				 
			        //$result_email_exist = $this->Ion_auth_model->getUserByEmail(trim($data_guest->email));
				if($_POST['no_reg']==1){
						
						
			        //$this->guest_m->UpdateDataByEmail($data_guest->email,$result_email_exist[0]->id);
			        
			        }
					if($_POST['action']!='EDIT'){
			        
			         $this->Ion_auth_model->CreateUserSuccessMail($user->id,$qrcode,TRUE,$data_guest->project_id,$data_guest->new_u);
			        }
			        $data_us = array(
			        'company'=>$array['company'],
					'company_address'=>$array['company_address'],
					'company_postal_code'=>$array['pincode'],
					'country_code'=>$array['country'],
					'designation'=>$array['designation']
					
			        );
			        $this->Ion_auth_model->updateUserTable($user->id,$data_us);
				 
				if($result==true){
					echo $id;
				}
				
			}
	
	}
	
	
		function addstep4Post()
	{
		$id=$_POST['id'];
		if(!empty($id)){
			if($this->input->post('remarks1')=='undefined'){
				$array['remark_1']='NIL';
			}else{
				$array['remark_1']=$this->input->post('remarks1');
			}
			
			if($this->input->post('remarks2')=='undefined'){
				$array['remark_2']='NIL';
			}else{
				$array['remark_2']=$this->input->post('remarks2');
			}
			
			if($this->input->post('remarks3')=='undefined'){
				$array['remark_3']='NIL';
			}else{
				$array['remark_3']=$this->input->post('remarks3');
			}
			
			if($this->input->post('remarks4')=='undefined'){
				$array['remark_4']='NIL';
			}else{
				$array['remark_4']=$this->input->post('remarks4');
			}
			
			if($this->input->post('remarks5')=='undefined'){
				$array['remark_5']='NIL';
			}else{
				$array['remark_5']=$this->input->post('remarks5');
			}
			
			
			$array['steps']=4;
			$array['edit_steps']=4;
			$result=$this->guest_m->UpdateData($id,$array);
			// $data_guest=$this->guest_m->FetchGuestSingleDataById($id); 
			// $result_email_exist = $this->Ion_auth_model->getUserByEmail(trim($data_guest->email));
			// $user =  $this->ion_auth->user($data_guest->user_id)->row();
			// $qrcode='<img src="'. base_url().'assets/qrphp/temp/'.$user->qrcode.'" />';
			
			//if(empty($result_email_exist)){
			        // $data_in_users = array(
			        // 'first_name' => $data_guest->first_name,
				// 'last_name' => $data_guest->last_name,
				// 'company' => $data_guest->company,
				// 'phone' => $data_guest->phone,
				// 'gender' =>$data_guest->gender,
				// 'active' =>1,
				// 'username' => $data_guest->username,
				// 'salutation'=>$data_guest->salutation,
				// 'country_code' => $data_guest->country_code
				// );
				// $identity = $data_guest->email;
				// $password = $this->ion_auth->hash_password($data_guest->phone);
				// $email = $data_guest->email;
				// $user_id = $this->ion_auth->register($identity, $password, $email, $data_in_users,array(),TRUE);
				// $this->guest_m->UpdateDataByEmail($data_guest->email,$user_id);
				
				// if($_POST['action']!='EDIT'){ 
				
				// $this->Ion_auth_model->CreateUserSuccessMail($user_id,false,TRUE,$data_guest->project_id);
				// }
				
		   
			// }else{
			
			// $this->guest_m->UpdateDataByEmail($data_guest->email,$result_email_exist[0]->id);
			// if($_POST['action']!='EDIT'){
			// $this->Ion_auth_model->CreateUserSuccessMail($result_email_exist[0]->id,false,TRUE,$data_guest->project_id,$data_guest->new_u);
			// }
			// }
			// if($_POST['action']!='EDIT'){
			// $this->Ion_auth_model->CreateUserSuccessMail($user->id,$qrcode,TRUE,$data_guest->project_id,$data_guest->new_u);
			// }
			if($result==true){
				echo $id;
			}
		}
		
	}
	
	
	
	function GenarateQRCode($user_id=NULL)
	{
		$user =  $this->ion_auth->user($user_id)->row();
		//$project=$this->ion_auth->JoinprojectId($user_id);
		//Generate QR CODE
		$BasePath= preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '',$_SERVER['SCRIPT_FILENAME']);
		$TemUrl = './assets/qrphp/temp/';
		include "qrphp/qrlib.php";    
		$errorCorrectionLevel = 'L'; 
		$matrixPointSize = 4; 
		
		$url='User Id: '.$user_id.',  EMAIL ID: '.$user->email;
		$filename = $TemUrl.'test'.md5($url).'.png';
		QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$qrcode=basename($filename);
		$this->db->where('id',$user_id);
		$this->db->update('users', array('qrcode'=>$qrcode));
		// if(!empty($user_id) && !empty($project->project_id)){
			
			// $url='User Id: '.$user_id.',  EMAIL ID: '.$user->email;
			// $filename = $TemUrl.'test'.md5($url).'.png';
			// QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			// $qrcode=basename($filename);
			// $this->db->where('user_id',$user_id);
			// $this->db->where('project_id',$project->project_id);
			// $this->db->update('xf_guest_users', array('qrcode'=>$qrcode));
		// }else{
			
			// $url='User Id: '.$user_id.',  EMAIL ID: '.$user->email;
			// $filename = $TemUrl.'test'.md5($url).'.png';
			// QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			
			// $qrcode=basename($filename);
			// $this->db->where('id',$user_id);
			// $this->db->update('users', array('qrcode'=>$qrcode));
		// }
 
		
		return $qrcode='<img src="'. base_url().'assets/qrphp/temp/'.basename($filename).'" />';
	}
	
	public function addstep2($id=false)
	{
	
	
		$id=$_POST['id'];
		$CountryCode = $this->common->getCountryCode();
		$data['title'] = "GUEST";
		$data['id'] = $id;
		$data['action'] = $_POST['action'];
		$data['data1'] =$this->guest_m->FetchDataById($id);
		$data['CountryCode'] = $CountryCode;
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$query = $this->db->get_where('xf_mst_project', array('id' => $_POST['project']));
		$proj=$query->row();
		$project_type=$proj->project_type;
		
		
		if(strpos($project_type,"NO REG REQUIRED")){
		
		$data['no_reg'] = 1;
		
		}else{
		$data['no_reg'] = 0;
		
		}
		$this->load->view('guest/addstep2',$data);
		
		
	}
	
	function addstep2Post()
	{
	
	      //print_r($_POST); 
		$id=$_POST['id'];
		if(!empty($id)){
			//$array['steps']=2;
			
			$array['did']=$this->input->post('did');
			$array['tel']=$this->input->post('tel');
			$array['extension']=$this->input->post('extension');
			$array['edit_steps']=2;
			$result=$this->guest_m->UpdateData($id,$array);
			if($result==true){
				echo $id;
			}
		}
		
	}
	
	public function addstep3($id=false)
	{

		$CountryCode = $this->common->getCountryCode();
		$data['CountryCode'] = $CountryCode;
		$id=$_POST['id'];
		$data['title'] = "GUEST";
		$data['id'] = $id;
		$data['action'] = $_POST['action'];
		$data['data1'] =$this->guest_m->FetchDataById($id);
		$data['project_select'] = $_POST['project'];
		$query = $this->db->get_where('xf_mst_project', array('id' => $_POST['project']));
		$proj=$query->row();
		$project_type=$proj->project_type;
		
		
		if(strpos($project_type,"NO REG REQUIRED")){
		
		$data['no_reg'] = 1;
		
		}else{
		$data['no_reg'] = 0;
		
		}
		$data['group_id'] = $_POST['group_id'];
		$this->load->view('guest/addstep3',$data);
		
		
	}
	
	
	
	function addstep4(){
		$CountryCode = $this->common->getCountryCode();
		$data['CountryCode'] = $CountryCode;
		$id=$_POST['id'];
		$data['title'] = "GUEST";
		$data['id'] = $id;
		$data['action'] = $_POST['action'];
		$data['project_select'] = $_POST['project'];
		$UserData=$this->project_m->get_project_id($_POST['project']);
		$DataField=json_decode($UserData->key);  
		$data['alldata'] = $UserData;
		$data['DataField'] = $DataField;
		$data['data1'] =$this->guest_m->FetchDataById($id);
		$data['group_id'] = $_POST['group_id'];
		$this->load->view('guest/addstep4',$data);
	
	}
	
	
	
 
	
 
	
	
	function addGuestSuccess(){
	
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['title'] = "ADD SUCCESS"; 
		$id=$_POST['id'];
		$data['action'] = $_POST['action'];
		$data['guest']=$this->guest_m->FetchDataById($id); 
		$data['DataField']=json_decode($data['guest']->key);
		       $datau=array(
       'edit_steps'=>4
       );
        $this->guest_m->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
        $this->guest_m->updateOldData($id,$datauu);
		$this->load->view('guest/addSuccess',$data);
	
	
	}
	
 
  
        
        function  upload_guest_file(){
        
               $data['title'] = "Floor Plan Edit Successful ";
               $this->load->view('include/header', $data);
		$this->load->view('guest/upload_excel');
		$this->load->view('include/footer');
        
        }
        
        
        function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->guest_m->deleteJunkRecordGuest($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        exit();
        }else{
        
        $olddata =  $this->guest_m->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($data)){
         $this->guest_m->updateOldData($id,$data); 
        }
       
       $datau=array(
       'edit_steps'=>4
       );
        $this->guest_m->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
        $this->guest_m->updateOldData($id,$datauu);
        
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        exit;
        }
        

        }
        
        
        
        
        
	
	
}

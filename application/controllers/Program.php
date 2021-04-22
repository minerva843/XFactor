<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Program extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('program_model','program_m');
		$this->load->model('project_model');
		$this->load->model('Guest_model','guest_m');
		$this->load->model('Places_model');
		$this->load->library('email');
		$this->load->library('session');
        
    }
	
	
		public function index()
		{
			$data['project'] =$_POST['project'];
			$data['title'] = "ALL PROGRAM"; 
			$this->load->view('program/allProgram',$data);
		} 
		
		public function search()
		{
			$project=$_POST['project'];
			$data1='';
			$searchData='';
			$searchFloorOrderBy='';
			if(!empty($_POST['select_program']) || !empty($_POST['program_shortby']) || !empty($_POST['AllSearchData'])){
				
				if(!empty($_POST['select_program'] == 'program_not_completed')){
					$searchData=array('prog.program_end_date_time >'=> date('Y-m-d G:i'));
				}
				if(!empty($_POST['select_program']=='program_completed')){
					$searchData=array('prog.program_end_date_time <'=>date('Y-m-d G:i'));
				}
				
				if(!empty($_POST['program_shortby'] == 'program_title')){
					$searchDataOrderByAsc='prog.program_title';
				}
				if(!empty($_POST['program_shortby'] == 'program_status')){
					$searchDataOrderByAsc='prog.program_status'; 
				}
			
				if(!empty($_POST['program_shortby'] == 'program_duration_shortest')){
					$searchDataOrderByAsc='prog.program_start_date_time';
				}
				if(!empty($_POST['program_shortby'] == 'program_duration_longest')){
					$searchDataOrderBy='prog.program_start_date_time';
				}
				if(!empty($_POST['program_shortby'] == 'program_startdate_latest')){
					$searchDataOrderByAsc='prog.program_duration';
				}
				if(!empty($_POST['program_shortby'] == 'program_startdate_earliest')){
					$searchDataOrderBy='prog.program_duration';
				}
				// if(!empty($_POST['program_shortby'] == 'latest_created_program' || $_POST['program_shortby'] == 'earliest_created_program')){
					// $searchDataOrderBy='prog.created_date_time';
				// }
				// if(!empty($_POST['program_shortby'] == 'latest_edit_program' || $_POST['program_shortby'] == 'earliest_edit_program')){
					// $searchDataOrderBy='prog.last_edited_date_time';
				// }
				if(!empty($_POST['program_shortby']== 'latest_created_program')){
					$searchDataOrderBy='prog.created_date_time';
				}
				if(!empty($_POST['program_shortby']== 'earliest_created_program')){
					$searchDataOrderByAsc='prog.created_date_time';
				}
				if(!empty($_POST['program_shortby']== 'latest_edit_program')){
					$searchDataOrderBy='prog.last_edited_date_time';
				}
				if(!empty($_POST['program_shortby'] == 'earliest_edit_program')){
					$searchDataOrderByAsc='prog.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData']; 
				}
				$data1=$this->program_m->searchAssignmentProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				
			}else{
				$data1=$this->program_m->FetchAllData($project);
			}
				$output = '';
				if($data1 > 0)
				{
					
					foreach($data1 as $data){
								if(!empty($data['last_edited_date_time'])){
								$last_edited_date_time=date('Y-m-d G:i',strtotime($data['last_edited_date_time']));
								}else{
									$last_edited_date_time="NIL";
								}
								if($data['program_start_date_time']>date('Y-m-d G:i')){
									$program_status="NOT STARTED";
								}
								if($data['program_end_date_time']<date('Y-m-d G:i')){
									$program_status="ENDED";
								}
								if($data['program_start_date_time'] == date('Y-m-d G:i') || $data['program_end_date_time'] >date('Y-m-d G:i')){
									$program_status="LIVE";
								}
								
								
								$floorlocation=json_decode($data['program_position']);
								if(!empty($floorlocation)){
									$location='X='.$floorlocation->left.' Y='.$floorlocation->top;
								}else{
									$location='';
								}
								
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle">
								
								<input type="checkbox" data-project="'.$data['program_title'].'" id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>'.$last_edited_date_time.'</td>
								<td>'.$data['program_id'].'</td>
								<td class="project_namecls" >'.$data['program_title'].'</td> 
								<td>'.$program_status.'</td> 
								<td>'.date('Y-m-d G:i',strtotime($data['program_start_date_time'])) .'</td>
								<td>'.$data['program_duration'].' Minutes</td>  
								<td>'.$data['program_location'].'</td> 
								<td>'.$data['assigned'].'</td> 
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
		
		public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->program_m->FetchDataById($id); 
			$data1=$this->program_m->FetchAllData();
			$checkNull='';
			if(!empty($data1)){
				$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>
				
				';
			}else{
				$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>
				';
			}
			$output = '';
			if($data > 0)
			{
				
				$files=$this->program_m->FetchFilesDataById($data->program_id);
				$program_duration='';
				$program_status='';
				
				$images=$files->file_name;
				
				if($data->program_start_date_time > date('Y-m-d G:i')){
					$program_status="NOT STARTED";
				}
				if($data->program_end_date_time < date('Y-m-d G:i')){
					$program_status="ENDED";
				}
				if($data->program_start_date_time == date('Y-m-d G:i') || $data->program_end_date_time > date('Y-m-d G:i')){
					$program_status="LIVE";
				}
			
				//$countdate=(date('Y-m-d G:i',strtotime($data->program_end_date_time))-date('Y-m-d G:i',strtotime($data->program_start_date_time)))/60;
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= date('Y-m-d G:i',strtotime($data->last_edited_date_time)); }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  } 
					// $floorlocation=explode(',',$data->floor_plan_drop_point);
					// if(!empty($floorlocation[0])){
						// $location='x='.$floorlocation[0].',y='.$floorlocation[1];
					// }else{
						// $location='';
					// }
					$programPresenter='';
					$mydata=json_decode($data->program_presenter);
					if($mydata){
								foreach($mydata as $val){
									$res=$this->program_m->GuestUserNameById($val);
									if(!empty($res)){
									$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
									}
								
								} 
					}
								
					$output .= '
					     <tr>
							<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->program_title.'</span></p></td>
						</tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span><span class="pname"> '.$data->program_title.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>PROGRAM CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="table-spacing">
						<td>Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Product Id</td>
						<td>'.$data->proj_id.'</td>
					  </tr>
					  <tr>
						<td>Floor Plan Id</td>
						<td>'.$data->floor_id.'</td> 
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr> 
					  <tr>
						<td>PROGRAM Id</td>
						<td>'.$data->program_id.'</td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr> 
						<td>Created date & time</td>
						<td>'.date('Y-m-d G:i',strtotime($data->created_date_time)).'</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr class="table-spacing">
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
							<td colspan="2" class="top-fc12 spc_clas res_clas sp_abc a-space"><b style="font-size: 16px;">PROGRAM INFO</b></td>
						</tr>   
					  <tr>
						<td>PROGRAM START DATE & TIME</td>
						<td>'.$data->program_start_date_time.'</td>
					  </tr>
					  <tr>
						<td>PROGRAM END DATE & TIME</td>
						<td>'.$data->program_end_date_time.'</td>
					  </tr>
					  
					  <tr>
						<td  class="sp_dj">PROGRAM PRESENTER</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc1 textprojectname">'.$programPresenter.'</td>
						
					  </tr>
					  
					  <tr>
						<td>PROGRAM TITLE</td>
						<td>'.$data->program_title.'</td> 
					  </tr>
					  <tr>
						<td>PROGRAM DETAILS</td>
						<td></td>
					  </tr>         
					  
					  <tr>
						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->program_details.'</td>
					  </tr>
					  
					  <tr>
						<td>PROGRAM IMAGE</td>
						<td>
							'.$images.'
						</td>
					  </tr>
					   <tr>
						<td>PROGRAM LOCATION</td>
						<td>'.$data->program_location.'</td>
					  </tr>
					  <tr>
						<td>PROGRAM DURATION</td>
						<td>'.$data->program_duration.' Minutes</td>
					  </tr>
					  
					  <tr>
						<td>PROGRAM STATUS</td>
						<td>'.$program_status.'</td>
					  </tr>
					  
					
					
					
					';
			}else{
				$output .= '
						'.$checkNull.'
						
						
					 ';
			}
			
			echo $output;
			
		}
        
   
	public function addprogram($id=false)
	{
		$project=$_POST['project'];
		if(!empty($id)){ 
			$data['project'] =$_POST['project'];
			$data['title'] = "Update Program";
			$data['data1'] = $this->program_m->FetchDataById($id);
			$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
            $this->load->view('program/addprogram',$data);
		}else{
			$data['project'] =$_POST['project'];
			$data['title'] = "Add Program";
			$this->load->view('program/addprogram',$data);
		}
	}
	
	function addstep1Program($id=false)
	{
		
		if($_POST){
			
			$array = array();
			$result=array();
			if(!empty($id)){
				$start=strtotime($this->input->post('program_start_date_time'));
				$end=strtotime($this->input->post('program_end_date_time'));
				$duration=$end-$start; 
				$duration=$duration/60;
				$array['program_duration']=$duration;
				$array['program_location']=$this->input->post('program_location');
				//$array['program_presenter']=$this->input->post('program_presenter');
				$array['program_title']=strtoupper($this->input->post('program_title'));
				$array['program_details']=$this->input->post('program_details');
				$array['program_start_date_time']=date('Y-m-d G:i',strtotime($this->input->post('program_start_date_time')));
				$array['program_end_date_time']=date('Y-m-d G:i',strtotime($this->input->post('program_end_date_time')));
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
			}else{
				$start=strtotime($this->input->post('program_start_date_time'));
				$end=strtotime($this->input->post('program_end_date_time'));
				$duration=$end-$start;
				$duration=$duration/60;
				$array['project_id']=$_POST['project_id'];
				$project=$_POST['project_id'];
				$data=$this->project_model->FetchDataById($project);
				$array['group_id']=$data->group_id; 
				
				$array['program_duration']=$duration;
				$array['program_location']=$this->input->post('program_location');
				//$array['program_presenter']=$this->input->post('program_presenter');
				$array['program_title']=strtoupper($this->input->post('program_title'));
				$array['program_details']=$this->input->post('program_details');
				$array['program_start_date_time']=date('Y-m-d G:i',strtotime($this->input->post('program_start_date_time')));
				$array['program_end_date_time']=date('Y-m-d G:i',strtotime($this->input->post('program_end_date_time')));
				$array['created_date_time']=date('Y-m-d G:i');
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['program_id']='XCPGM'.rand(1000000000,9999999999);
			}
			if(!empty($id)){
				$id=$this->program_m->UpdateData($id,$array);
				$data1= $this->program_m->FetchDataById($id);
				//$files = $this->program_m->FetchFilesDataById($data1->program_id);
				$countfiles = count($_FILES['files']['name']); 
					if(!empty($countfiles)){ 
							$filename = $_FILES['files']['name'];
							$uploadurl= './assets/program/'.$filename;
							move_uploaded_file($_FILES['files']['tmp_name'],$uploadurl);
							$result['file_name']=$_FILES['files']['name'];
							$filemb=$_FILES['files']['size'] / (1024 * 1024);
							$result['file_size']=number_format($filemb,2);
							
							$filetype=pathinfo($filename, PATHINFO_EXTENSION);
							$result['file_type'] = $filetype;
							if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
								$result['type']='image'; 
							}else{
								$result['type']='video';
							}
							$result['xmanage_id'] = $data1->program_id;
							$result['xmanage_module'] = 'PROGRAM';
							$this->program_m->DelFilesById($data1->program_id);
							$this->program_m->addFiles($result);
					}
					echo $id;
				
			}else{
			$lastId=$this->program_m->insert($array);
			if($lastId){
					$countfiles = count($_FILES['files']['name']); 
					if(!empty($countfiles)){
					
					
							$filename = $_FILES['files']['name'];
							$uploadurl= './assets/program/'.$filename;
							move_uploaded_file($_FILES['files']['tmp_name'],$uploadurl);
							$result['file_name']=$_FILES['files']['name'];
							$filemb=$_FILES['files']['size']/ (1024 * 1024);
							$result['file_size']=number_format($filemb,2);
							$filetype=pathinfo($filename, PATHINFO_EXTENSION);
							$result['file_type'] = $filetype;
							if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
								$result['type']='image';
							}else{
								$result['type']='video';
							}
							$result['xmanage_id'] = $array['program_id'];
							$result['xmanage_module'] = 'PROGRAM';
							$this->program_m->addFiles($result);
						
					}
					echo $lastId;
				}
				else{
					$data['error_msg'] = "SOMTHING WENT WRONG.PLEASE TRY AGAIN.";
					$data['title'] = "Add Program";
					$this->load->view('program/addprogram',$data);
				}
			}
		}
		
	}
	
	
	public function programCreateSuccess($id=false)
	{
		if(!empty($id)){ 
			
			$data['title'] = "Add Program";
			$data['data1'] = $this->program_m->FetchDataById($id);
			$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
            $this->load->view('program/programCreateSuccess',$data);
		}
	}
	
	
	function addProgramGuestlist($id=false)
	{
		//$data['data1'] = $this->program_m->FetchDataById(41);
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		$data['title'] = "Assign";
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
			
			
		$data['gtypes'] = $where_in;	
		
		
		
		
		$this->load->view('program/addProgramGuestList',$data);
	}
	
	public function addProgramSearchList()
		{
			$data1='';
			$project = $_POST['project'];
			$searchData='';
			$searchFloorOrderBy='';
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
					$searchDataOrderByAsc='xf_guest_users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='xf_guest_users.company';
				}
				if(!empty($_POST['selectShortBy'] == 'gtype-a-z')){
					$searchDataOrderByAsc='xf_guest_users.guest_type';
				}
				if(!empty($_POST['selectShortBy']== 'latest_created_project')){
					$searchFloorOrderBy='created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'earliest_created_project')){
					$searchDataOrderByAsc='created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'latest_edit_project')){
					$searchFloorOrderBy='last_edited_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit_project')){
					$searchDataOrderByAsc='last_edited_date_time';
				}
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->program_m->searchGuest($search,$AllSearchData,$searchFloorOrderBy,$searchDataOrderByAsc,$project);
				// print_r($searchDataOrderByAsc);  exit;
				
				 
				
			}
			else{
				$data1=$this->program_m->FetchAllGuestData($project);
			}
				$output = '';
				if($data1 > 0)
				{
					$id=$_POST['id'];
					$selectedData=$this->program_m->FetchDataById($id);
					foreach($data1 as $data){
								if(!empty($data['last_edited_date_time'])){
								$last_edited_date_time=date('Y-m-d G:i',strtotime($data['last_edited_date_time']));
								}else{
									$last_edited_date_time="NIL";
								}
								if($data['program_start_date_time'] > date('Y-m-d G:i')){
					$program_status="NOT STARTED";
				}
				if($data['program_end_date_time'] < date('Y-m-d G:i')){
					$program_status="ENDED";
				}
				if($data['program_start_date_time'] == date('Y-m-d G:i') || $data['program_end_date_time'] > date('Y-m-d G:i')){
					$program_status="LIVE";
				}
								// $dropInPoint=$this->program_m->FetchDataById($data['id']); 
								// $floorlocation=explode(',',$dropInPoint->floor_plan_drop_point);
								// if(!empty($floorlocation[0])){
									// $location='x='.$floorlocation[0].',y='.$floorlocation[1];
								// }else{
									// $location='';
								// }
								$getdata='';
								$mydata=json_decode($selectedData->program_presenter);
								foreach($mydata as $val){
									if($val==$data['id']){
										$getdata .="checked";
									}else{
										$getdata .='';
									}
								
								} 
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle">
								<input type="checkbox" id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" '.$getdata.'>
								<label for="d_'.$data['id'].'" class="deletClass"></label>
								</td>
								
								<td>'.$data['guest_type'].'</td>
								<td>'.$data['username'].'</td> 
								<td>'.$data['email'].'</td> 
								
								<td>'.$data['phone'].'</td>  
								<td>'.$data['company'].'</td> 
							
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="5" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
		}
		
		public function ProgramGuestSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->program_m->FetchGuestDataById($id); 
			
			$output = '';
			if($data > 0)
			{
				if($data->program_start_date_time > date('Y-m-d G:i')){
					$program_status="NOT STARTED";
				}
				if($data->program_end_date_time < date('Y-m-d G:i')){
					$program_status="ENDED";
				}
				if($data->program_start_date_time == date('Y-m-d G:i') || $data->program_end_date_time > date('Y-m-d G:i')){
					$program_status="LIVE";
				}
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= date('Y-m-d G:i',strtotime($data->last_edited_date_time)); }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  } 
					// $floorlocation=explode(',',$data->floor_plan_drop_point);
					// if(!empty($floorlocation[0])){
						// $location='x='.$floorlocation[0].',y='.$floorlocation[1];
					// }else{
						// $location='';
					// }
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
							<td colspan="2" class="top-fc"><h5>GUEST CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="table-spacing">
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
						<td>CHAT USER Id</td>
						<td>'.$data->proj_id.'</td> 
					  </tr>
					  <tr>
						<td>CHAT STATUS</td>
						<td>ENABLE</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					 
					  <tr>
						<td>Created date & time</td>
						<td>'.date('Y-m-d G:i',strtotime($data->created_date_time)).'</td>
					  </tr>
					  <tr>
						<td>Created ip address</td> 
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr class="table-spacing">
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
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->quick_intro.'</td>
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
						<td></td>
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
				$output .= '';
			}
			
			echo $output;
			
		}
        
   
	function AddProgramGuest($id=false)
	{
		if($_POST){
			$ids=json_encode($_POST['ids']);
			$array['program_presenter']=$ids;
			$id=$_POST['id'];
			$id=$this->program_m->UpdateData($id,$array);
			if($id){
				echo $id;
			}
			
		}
	}
	
	public function viewAddProgramsSuccessful($id)
	{
		$data['title'] = "Add Program Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->program_m->FetchDataById($id);
		$programPresenter='';
		$mydata=json_decode($data['data1']->program_presenter);
		foreach($mydata as $val){
			$res=$this->program_m->GuestUserNameById($id);
			if(!empty($res)){
			$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
			}
		} 
		$data['programPresenter'] = $programPresenter;
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		

		
		
		
		$this->load->view('program/viewAddProgramsSuccessful',$data);
		
	}
	public function editprogramstep1($id=false)
	{
		$data['title'] = "Update Program";
		$data['project_select'] = $_POST['project'];
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		$this->load->view('program/editprogramstep1',$data);
		
	}
	
	public function editprogramSuccess($id=false)
	{
		if(!empty($id)){ 
			$data['title'] = "Update Program";
			$data['data1'] = $this->program_m->FetchDataById($id);
			$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
            $this->load->view('program/editprogramSuccess',$data);
		}
	}
	
	function editProgramGuestlist($id=false)
	{
		//$data['data1'] = $this->program_m->FetchDataById(15);
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['project_select'] = $_POST['project'];
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		$data['title'] = "Add Program";
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
		$this->load->view('program/editProgramGuestList',$data);
	}
	
	
	public function delImg()
	{
		$id=$_POST['id'];
		$id=$this->program_m->DelFileById($id);
		if($id){
			echo "success";
		}
	}
	
	public function vieweditProgramsSuccessful($id)
	{
		$data['title'] = "Update Program";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->program_m->FetchDataById($id);
		$programPresenter='';
		$mydata=json_decode($data['data1']->program_presenter);
		
		foreach($mydata as $val){
			$res=$this->program_m->GuestUserNameById($val);
			if(!empty($res)){
									$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
									}
		
		} 
		
		$data['programPresenter'] = $programPresenter;
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		
				$datau=array(
               'edit_steps'=>2
               );
               $this->program_m->updateOldData($id,$datau); 
        
        
              $datauu=array(
             'edit_steps'=>0
              );
              $this->program_m->updateOldData($id,$datauu);
		
		
		
		$this->load->view('program/vieweditProgramsSuccessful',$data);
		
	}
	
	
	function allassignments($id=false)
	{
		$project=$_POST['project'];
		$data['project'] = $project;
		$data['title'] = "Add Program";
		$this->load->view('program/allassignments',$data);
	}
	
	
	public function allAssignmentSearchList()
		{
			$project=$_POST['project'];
			$data1='';
			$searchData='';
			$searchFloorOrderBy='';
			if(!empty($_POST['select_program']) || !empty($_POST['program_shortby']) || !empty($_POST['AllSearchData'])){
				
				if(!empty($_POST['select_program'] == 'program_not_completed')){
					$searchData=array('prog.program_end_date_time >'=> date('Y-m-d G:i'));
				}
				if(!empty($_POST['select_program']=='program_completed')){
					$searchData=array('prog.program_end_date_time <'=>date('Y-m-d G:i'));
				}
				
				
				if(!empty($_POST['program_shortby'] == 'program_title')){
					$searchDataOrderByAsc='prog.program_title';
				}
				if(!empty($_POST['program_shortby'] == 'program_status')){
					$searchDataOrderByAsc='prog.program_status'; 
				}
				if(!empty($_POST['program_shortby'] == 'program_startdate_latest' || $_POST['program_shortby'] == 'program_startdate_earliest')){
					$searchDataOrderBy='p.program_start_date_time';
				}
				if(!empty($_POST['program_shortby'] == 'program_duration_shortest')){
					$searchData=array('prog.program_end_date_time >'=>date('Y-m-d G:i'));
				}
				if(!empty($_POST['program_shortby'] == 'program_duration_longest')){
					$searchData=array('prog.program_end_date_time >'=>date('Y-m-d G:i'));
				}
				if(!empty($_POST['program_shortby'] == 'latest_created_program' || $_POST['program_shortby'] == 'earliest_created_program')){
					$searchDataOrderBy='prog.created_date_time';
				}
				if(!empty($_POST['program_shortby'] == 'latest_edit_program' || $_POST['program_shortby'] == 'earliest_edit_program')){
					$searchDataOrderBy='prog.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData']; 
				}
				
				$data1=$this->program_m->searchAssignmentProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				
			}else{
				$data1=$this->program_m->FetchAllAssignmentData($project);
			}
				$output = '';
				if($data1 > 0)
				{
					
					foreach($data1 as $data){
								if(!empty($data['last_edited_date_time'])){
								$last_edited_date_time=date('Y-m-d G:i',strtotime($data['last_edited_date_time']));
								}else{
									$last_edited_date_time="NIL";
								}
								if($data['program_start_date_time'] > date('Y-m-d G:i')){
					$program_status="NOT STARTED";
				}
				if($data['program_end_date_time'] < date('Y-m-d G:i')){
					$program_status="ENDED";
				}
				if($data['program_start_date_time'] == date('Y-m-d G:i') || $data['program_end_date_time'] > date('Y-m-d G:i')){
					$program_status="LIVE";
				}
								// $dropInPoint=$this->program_m->FetchDataById($data['id']); 
								// $floorlocation=explode(',',$dropInPoint->floor_plan_drop_point);
								// if(!empty($floorlocation[0])){
									// $location='x='.$floorlocation[0].',y='.$floorlocation[1];
								// }else{
									// $location='';
								// }
								$floorlocation=json_decode($data['program_position']);
								if(!empty($floorlocation)){
									$location='X='.$floorlocation->left.' Y='.$floorlocation->top;
								}else{
									$location='';
								}
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle">
								
								<input type="checkbox" id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>'.$last_edited_date_time.'</td>
								<td>'.$data['program_id'].'</td>
								<td>'.$data['program_title'].'</td> 
								<td>'.$program_status.'</td> 
								
								<td>'.$data['floor_plan_name'].'</td>  
								<td>'.$location.'</td> 
								
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
		
		public function allAssignmentSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->program_m->FetchDataById($id); 
			
			$output = '';
			if($data > 0)
			{
				
				$files=$this->program_m->FetchFilesDataByIdArray($data->program_id);
				//print_r($files);  exit;
				$program_duration='';
				$program_status='';
				$images= array();
				foreach($files as $val){
					$images[] = $val['file_name'];
				}
				
				$imageslist = implode(', ',$images);
				
				if($data->program_start_date_time > date('Y-m-d G:i')){
					$program_status="NOT STARTED";
				}
				if($data->program_end_date_time < date('Y-m-d G:i')){
					$program_status="ENDED";
				}
				if($data->program_start_date_time == date('Y-m-d G:i') || $data->program_end_date_time > date('Y-m-d G:i')){
					$program_status="LIVE";
				}
				
				
				//$countdate=(date('Y-m-d G:i',strtotime($data->program_end_date_time))-date('Y-m-d G:i',strtotime($data->program_start_date_time)))/60;
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= date('Y-m-d G:i',strtotime($data->last_edited_date_time)); }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  } 
					
					$programPresenter='';
					$mydata=json_decode($data->program_presenter);
					
					//print_r($mydata); exit;
					if($mydata){
								foreach($mydata as $val){
									$res=$this->program_m->GuestUserNameById($val);
									if(!empty($res)){
									$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
									}
								
								} 
					}
					$output .= '
					<tr>
							<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY VIEWING : </span>'.$data->program_title.'</p></td>
						</tr>
						<tr>
							<td colspan="2" class="top-fc"><h5>PROGRAM CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="table-spacing">
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
						<td>Floor Plan Id</td>
						<td>'.$data->floor_id.'</td> 
					  </tr>
					  
					  <tr>
						<td>PROGRAM Id</td>
						<td>'.$data->program_id.'</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Created date & time</td>
						<td>'.date('Y-m-d G:i',strtotime($data->created_date_time)).'</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr class="table-spacing">
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
							<td colspan="2" class="top-fc12 res_clas sp_abc a-space"><b style="font-size: 16px;">PROGRAM INFO</b></td> 
						</tr>
					  <tr>
						<td>PROGRAM START DATE & TIME</td>
						<td>'.date('Y-m-d G:i',strtotime($data->program_start_date_time)).'</td>
					  </tr>
					  <tr>
						<td>PROGRAM END DATE & TIME</td>
						<td>'.date('Y-m-d G:i',strtotime($data->program_end_date_time)).'</td>
					  </tr>
					   <tr>
						<td  class="sp_dj">PROGRAM PRESENTER</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc1 textprojectname">'.$programPresenter.'</td>
						
					  </tr>
					  <tr>
						<td>PROGRAM TITLE</td>
						<td>'.$data->program_title.'</td>
					  </tr>
					  <tr>
						<td>PROGRAM DETAILS</td>
						<td></td>
					  </tr>    
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->program_details.'</td>
					  </tr>
					  <tr>
						<td>PROGRAM IMAGE</td> 
						<td>
							
						</td>  
					  </tr>
					  
					   <tr>						
						<td colspan="2" class="res_clas sp_abc">'.$imageslist.'</td>
					  </tr>
					  
					   <tr>
						<td>PROGRAM LOCATION</td>
						<td>'.$data->program_location.'</td>
					  </tr>
					  <tr>
						<td>PROGRAM DURATION</td>
						<td>'.$data->program_duration.' Minutes</td>
					  </tr>
					  
					  <tr>
						<td>PROGRAM STATUS</td>
						<td>'.$program_status.'</td>
					  </tr>
					  
					
					
					
					';
			}else{
				$output .= '
						<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>
						
						
					 ';
			}
			
			echo $output;
			
		}
        
	
	function ViewAssignment($id=false)
	{
		//$data['data1'] = $this->program_m->FetchDataById(41);
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		$data['title'] = "Add Program";
		$this->load->view('program/ViewAllAssignments',$data);
	}
	
	function clearSelectedAssignment($id=false)
	{
		$project=$_POST['project']; 
		$data['project'] = $project;
		$data['title'] = "Add Program";
		$this->load->view('program/clearSelectedAssignment',$data);
	}
	public function clearSelectedAssignmentSuccess()
	{
		$project=$_POST['project'];
		$data['project'] = $project;
		$id=$_SESSION['SelectedIds'];
		$array['floor_plan_id']=NULL;
		//$array['program_location']=NULL;
		$array['program_position']=NULL;
		$array['assigned']='no';
		$res=$this->program_m->clearSelectedData($id,$array);
		$data['title'] = "Delete PROGRAMS";
		$this->load->view('program/clearSelectedAssignmentSuccess',$data);
	}
	public function clearAllSelectedAssignment()
	{
		$project=$_POST['project'];
		$data['project'] = $project;
		$data['title'] = "Delete All Floor Plans";
		$data['data1']=$this->program_m->FetchAllData($project);
		$this->load->view('program/clearAllSelectedAssignment',$data);
	}
	public function clearAllAssignmentSuccess() 
	{
		$project=$_POST['project'];
		$data['project'] = $project;
		$_SESSION['DeleteData']=$this->program_m->FetchAllData($project);
		$array['floor_plan_id']=NULL;
		//$array['program_position']=NULL;
		$array['program_position']=NULL;
		$array['assigned']='no';
		$res=$this->program_m->clearAllData($array);
		$data['title'] = "Delete All PROGRAMS";
		$this->load->view('program/clearAllSelectedAssignmentSuccess',$data);
	}
	
	
	
	
	
	
	public function deleteAllprograms()
	{
		$project=$_POST['project'];
		$data['title'] = "Delete All Floor Plans";
		$data['data1']=$this->program_m->FetchAllData($project);
		$data['project']=$project;
		$this->load->view('program/deleteAllprograms',$data);
	}
	
	
	public function alldeleteprogram() 
	{
		$project=$_POST['project'];
		$this->program_m->FetchAllData($project);
		$this->program_m->DeleteAllDataByMultipleId($project);
		$_SESSION['DeleteData']=$this->program_m->FetchAllData($project);
		
		$data['project']=$project;
		$data['title'] = "Delete All PROGRAMS";
		$this->load->view('program/deleteAllProgramSuccess',$data);
	}
	
	public function programsingledelete()
	{
		
		foreach($_POST['delval'] as $ids){
			$id[]=$ids;
		}
		$_SESSION['SelectedIds']=$id;
		$_SESSION['Singledata']=count($_POST['delval']);
		$_SESSION['SelectedDelete']=$this->program_m->FetchDataByMultipleId($id);
		
	}
	
	
	public function programSelectMultidelete()
	{
		$data['title'] = "Delete Program";
		$this->load->view('program/programSelectMultidelete',$data);
	}
	
	public function ProgramselecteddeleteSuccess()
	{
		$id=$_SESSION['SelectedIds'];
		
		$this->program_m->DeleteImageDataByMultipleId($id);
		$res=$this->program_m->DeleteDataByMultipleId($id);
		$data['title'] = "Delete PROGRAMS";
		$this->load->view('program/ProgramselecteddeleteSuccess',$data);
	}
	
	public function assignProgramGetImg()
	{
		$id=$_POST['floorId']; 
		$res=$this->floor_m->FetchDataById($id);
		$Img=base_url().'assets/program/'.$res->file_name . $res->file_type;
		$floor_plan_drop_point=explode(',',$res->floor_plan_drop_point);
		$data['width']=$floor_plan_drop_point[0];
		$data['height']=$floor_plan_drop_point[1];
		$data['img']=$Img;
		echo json_encode($data);
	}
	
	public function assignProgram($id=false)
	{
		$project=$_POST['project'];
		if(!empty($id)){ 
			
			$data['title'] = "ASSIGN PROGRAM";
			$data['data1'] = $this->program_m->FetchDataById($id);
			$data['floorplans'] = $this->floor_m->FetchAllData($data['data1']->project_id);
			$data['programs'] = $this->program_m->FetchAllData($data['data1']->project_id);
			$data['project'] = $project; 
            $this->load->view('program/assignProgram',$data);
		}else{ 
			$data['floorplans'] = $this->floor_m->FetchAllData($project);
			$data['programs'] = $this->program_m->FetchAllData($project);
			$data['title'] = "ASSIGN PROGRAM";
			$project=$_POST['project'];
			$data['project'] = $project;
			$this->load->view('program/assignProgram',$data);
		}
	}
	
	public function GetselectedProgram()
	{
		$floor=$_POST['floor'];
		$id=$_POST['program'];
		$data=$this->program_m->FetchDataById($id);
		if($data->floor_plan_id == $floor){
			$postintion=json_decode($data->program_position);
			$da['top']=$postintion->top;
			$da['left']=$postintion->left;
			echo json_encode($da);
		}
	} 
	
	public function assignProgramstep1($id=false)
	{
		if($_POST){
			if(!empty($this->input->post('iconval'))){
			$position=json_decode($this->input->post('iconval'));
			$top=intval($position->top);
			$left=intval($position->left);
			$program_position='{"top":'.$top.',"left":'.$left.'}';
			//$array['program_position']=$this->input->post('iconval');
			$array['program_position']=$program_position;
			}else{
				 
				$array['program_position']='{"top":340,"left":640}';
			}
			$array['floor_plan_id']=$this->input->post('floor');
			$array['assigned']='yes';
			$id=$this->input->post('program');
			$id=$this->program_m->UpdateData($id,$array);
			if($id){
				echo $id;
			}
		}
	}
	
	public function assignProgramstep2($id=false)
	{
			$project=$_POST['project'];
			$data['project'] = $project;
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['floor']=$this->floor_m->FetchDataById($data['data1']->floor_plan_id); 
		$data['floorplans'] = $this->floor_m->FetchAllData($project);
		$data['programs'] = $this->program_m->FetchAllData($project);
		$data['title'] = "ASSIGN PROGRAM";
		$this->load->view('program/assignProgramstep2',$data);
		
	}
	
	public function assignProgramSuccess($id=false)
	{
		$project=$_POST['project'];
			$data['project'] = $project;
		$data['data1'] = $this->program_m->FetchDataById($id);
		$data['floor']=$this->floor_m->FetchDataById($data['data1']->floor_plan_id); 
		$data['floorplans'] = $this->floor_m->FetchAllData($project);
		$data['programs'] = $this->program_m->FetchAllData($project);
		$data['title'] = "ASSIGN PROGRAM";
		$this->load->view('program/assignProgramSuccess',$data);
		
	}
	
	
	
	
      function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->program_m->deleteJunkRecordProgram($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      //  redirect("Location: config/".$group_id."/".$project_id);
        exit();
        }else{
        
        
        
        $olddata =  $this->program_m->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($olddata)){
         $this->program_m->updateOldData($id,$data); 
        }
        
               $datau=array(
       'edit_steps'=>2
       );
        $this->program_m->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
        $this->program_m->updateOldData($id,$datauu);
        
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }
	
	
	
	
	
	

}

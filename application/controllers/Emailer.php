<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Emailer extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('program_model','program_m');
		$this->load->model('ion_auth_model');
		$this->load->model('project_model');
		$this->load->model('Guest_model','guest_m');
		$this->load->model('Places_model');
		$this->load->model('post_model');
		$this->load->model('emailer_model');
		$this->load->library('email');
		$this->load->library('session');
        
    }
	
	
		public function index()
		{
			
			$data['project'] =$_POST['project'];
			$data['group_id'] =$_POST['group_id'];
			$data['title'] = "ALL EMAILER"; 
			$this->load->view('emailer/allemailer',$data);
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
				
				if(!empty($_POST['program_shortby'] == 'EMAILER_title')){
					$searchDataOrderByAsc='e.emailer_title';
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
				$data1=$this->emailer_model->searchAssignmentProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				
			}else{
				$data1=$this->emailer_model->FetchAllData($project);
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
								
								
								$emailer_owner=$this->emailer_model->GuestUserNameById($data['emailer_owner']);
								$emailer_owner=$emailer_owner->guest_type.', '.$emailer_owner->username;
								$programPresenter='';
								$mydata=json_decode($data['emailer_users']);
								
								foreach($mydata as $val){
									$res=$this->emailer_model->GuestUserNameById($val);
									if(!empty($res)){
															$programPresenter.=$res->guest_type.', '.$res->username.'</br>';
															}
								
								}
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle">
								
								<input type="checkbox" data-project="'.$data['emailer_title'].'" id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>'.$last_edited_date_time.'</td>
								<td>'.$data['emailer_id'].'</td>
								<td class="project_namecls" >'.$data['emailer_title'].'</td> 
								<td>'.$emailer_owner.'</td> 
								<td>'.$data['emailer_owner_bcc'].'</td>  
								
								<!--td>'.$programPresenter.'</td-->  
								  
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
			$data=$this->emailer_model->FetchDataById($id); 
			$data1=$this->emailer_model->FetchAllData();
			$checkNull='';
			if(!empty($data1)){
				$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO EMAILER SELECTED</p>
				
				';
			}else{
				$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO EMAILER SELECTED</p>
				';
			}
			$output = '';
			if($data > 0)
			{
	
				
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
					$mydata=json_decode($data->emailer_users);
					if($mydata){
								foreach($mydata as $val){
									$res=$this->emailer_model->GuestUserNameById($val);
									if(!empty($res)){
									$programPresenter.=$res->email.'</br>';
									}
								
								} 
					}
								
								
								$emailer_owner=$this->emailer_model->GuestUserNameById($data->emailer_owner);
								$emailer_owner=$emailer_owner->guest_type.', '.$emailer_owner->username;
					$output .= '
					     <tr>
							<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->emailer_title.'</span></p></td>
						</tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span><span class="pname"> '.$data->emailer_title.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>EMAILER CREATION INFO</h5></td>
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
						<td>EMAILER Id</td>
						<td>'.$data->emailer_id.'</td>
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
							<td colspan="2" class="top-fc12 spc_clas res_clas sp_abc a-space"><b style="font-size: 16px;">EMAILER INFO</b></td>
						</tr>   
					  <tr>
						<td>EMAIL TITLE</td>
						<td>'.$data->emailer_title.'</td>
					  </tr>
					  <tr>
						<td>EMAILER OWNER</td>
						<td>'.$emailer_owner.'</td>
					  </tr>
					  
					      
					  
					  <tr>
						<td>EMAILER OWNER BCC</td>
						<td class="running_latter">'.$data->emailer_owner_bcc.'</td> 
					  </tr>
					  
						
					  
					  <tr>   
						<td>EMAILER USERS</td>
						<td></td> 
					  </tr>
					  <tr>
						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$programPresenter.'</td>   
					  </tr>
					  
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
					  
					  
					  <tr>
						<td>EMAILER DETAILS</td>
						<td></td>
					  </tr>    
					  
					  <tr class="user-detailsmailer">						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->emailer_details.'</td>   
					  </tr>
					      
					  
					  <tr>
						<td>EMAILER PDF 1</td>
						<td>
						</td>
					  </tr>
					  
					   <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a target="_blank" href="'.base_url().'assets/emailer/'.$data->pdf1.'">'.$data->pdf1.'</a></td>
					  </tr>
					  
					  
					  <tr>
						<td>EMAILER PDF 2</td>
						<td>
							
						</td>
					  </tr>
					  
					   <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a target="_blank" href="'.base_url().'assets/emailer/'.$data->pdf2.'">'.$data->pdf2.'</a></td>
					  </tr>
					  
					  <tr>
						<td>EMAILER PDF 3</td>
						<td>
							
						</td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a target="_blank" href="'.base_url().'assets/emailer/'.$data->pdf3.'">'.$data->pdf3.'</a></td>
					  </tr>
					  
					  
					   <tr>
						<td>EMAILER IMAGE 1</td>
						<td>
							
						</td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a href="">'.$data->image1.' </a></td>
					  </tr>
					  
					  <tr>
						<td>EMAILER IMAGE 2</td>
						<td>
							
						</td>
					  </tr>
					  
					   <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a href="">'.$data->image2.' </a></td>
					  </tr>
					  
					  <tr>
						<td>EMAILER IMAGE 3</td>
						<td>
							
						</td>
					  </tr>
					  
					   <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm"><a href="">'.$data->image3.' </a></td>
					  </tr>
					  
					
					
					
					';
			}else{
				$output .= '
						'.$checkNull.'
						
						
					 ';
			}
			 
			echo $output;
			
		}
         
   
	public function addEmailer($id=false)
	{
		$project=$_POST['project'];
		$group_id=$_POST['group_id'];
		$data['data']=$this->post_model->GuestUsers($project);
		if(!empty($id)){ 
			$data['group_id'] =$_POST['group_id'];
			$data['project'] =$_POST['project'];
			$data['title'] = "Update Emailer";
			$data['data1'] = $this->emailer_model->FetchDataById($id);
            $this->load->view('emailer/add',$data);
		}else{
			$data['group_id'] =$group_id;
			$data['project'] =$_POST['project'];
			$data['title'] = "Add Emailer";
			$this->load->view('emailer/add',$data);
		}
	}
	
	function addPostData($id=false)
	{
		
		if($_POST){
			
			$array = array();
			$result=array();
			if(!empty($id)){
				$array['edit_steps']=1;
				$array['emailer_owner']=$_POST['emailer_owner']; 
				$array['emailer_owner_bcc']=$_POST['emailer_owner_bcc']; 
				$array['emailer_title']=$_POST['emailer_title']; 
				$array['emailer_details']=$_POST['emailer_details'];
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
			}else{
				$array['edit_steps']=1;
				$array['project_id']=$_POST['project_id'];
				$array['group_id']=$_POST['group_id']; 
				$array['emailer_owner']=$_POST['emailer_owner']; 
				$array['emailer_owner_bcc']=$_POST['emailer_owner_bcc']; 
				$array['emailer_title']=$_POST['emailer_title']; 
				$array['emailer_details']=$_POST['emailer_details']; 
				$array['created_date_time']=date('Y-m-d G:i');
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['emailer_id']='XCEML'.rand(100000000000000,999999999999999);
			} 
			if(!empty($id)){
				
				
				//$files = $this->program_m->FetchFilesDataById($data1->program_id);
				$countfiles1 = count($_FILES['image1']['name']); 
				if(!empty($countfiles1)){
					$filename = $_FILES['image1']['name'];
					$uploadurl= './assets/emailer/'.$filename;
					move_uploaded_file($_FILES['image1']['tmp_name'],$uploadurl);
					$filemb1=$_FILES['image1']['size'] / (1024 * 1024);
					$array['image1_size']=number_format($filemb1,2);
					$array['image1']=$filename;
					
				}
				$countfiles2 = count($_FILES['image2']['name']); 
				if(!empty($countfiles2)){
					$filename2 = $_FILES['image2']['name'];
					$uploadurl2= './assets/emailer/'.$filename2;
					move_uploaded_file($_FILES['image2']['tmp_name'],$uploadur2);
					$filemb2=$_FILES['image2']['size'] / (1024 * 1024);
					$array['image2_size']=number_format($filemb2,2);
					$array['image2']=$filename2;
				}
				$countfiles3 = count($_FILES['image3']['name']); 
				if(!empty($countfiles3)){
					$filename3 = $_FILES['image3']['name'];
					$uploadurl3= './assets/emailer/'.$filename3;
					move_uploaded_file($_FILES['image3']['tmp_name'],$uploadurl3);
					$filemb3=$_FILES['image3']['size'] / (1024 * 1024);
					$array['image3_size']=number_format($filemb3,2);
					$array['image3']=$filename3;
				}
				$countfiles4 = count($_FILES['pdf1']['name']); 
				if(!empty($countfiles4)){
					$filename4 = $_FILES['pdf1']['name'];
					$uploadurl4= './assets/emailer/'.$filename4;
					move_uploaded_file($_FILES['pdf1']['tmp_name'],$uploadurl4);
					$filemb4=$_FILES['pdf1']['size'] / (1024 * 1024);
					$array['pdf1_size']=number_format($filemb4,2);
					$array['pdf1']=$filename4;
				}
				$countfiles5 = count($_FILES['pdf2']['name']); 
				if(!empty($countfiles5)){
					$filename5 = $_FILES['pdf2']['name'];
					$uploadurl5= './assets/emailer/'.$filename5;
					move_uploaded_file($_FILES['pdf2']['tmp_name'],$uploadurl5);
					$filemb5=$_FILES['pdf2']['size'] / (1024 * 1024);
					$array['pdf2_size']=number_format($filemb5,2);
					$array['pdf2']=$filename5;
				}
				
				$countfiles6 = count($_FILES['pdf3']['name']); 
				if(!empty($countfiles6)){
					$filename6 = $_FILES['pdf3']['name'];
					$uploadurl6= './assets/emailer/'.$filename6;
					move_uploaded_file($_FILES['pdf3']['tmp_name'],$uploadurl6);
					$filemb6=$_FILES['pdf3']['size'] / (1024 * 1024);
					$array['pdf3_size']=number_format($filemb6,2);
					$array['pdf3']=$filename6;
				}
				$id=$this->emailer_model->UpdateData($id,$array);
					echo $id;
				
			}else{
				$countfiles1 = count($_FILES['image1']['name']); 
				if(!empty($countfiles1)){
					$filename = $_FILES['image1']['name'];
					$uploadurl= './assets/emailer/'.$filename;
					move_uploaded_file($_FILES['image1']['tmp_name'],$uploadurl);
					$filemb1=$_FILES['image1']['size'] / (1024 * 1024);
					$array['image1_size']=number_format($filemb1,2);
					$array['image1']=$filename;
					
				}
				$countfiles2 = count($_FILES['image2']['name']); 
				if(!empty($countfiles2)){
					$filename2 = $_FILES['image2']['name'];
					$uploadurl2= './assets/emailer/'.$filename2;
					move_uploaded_file($_FILES['image2']['tmp_name'],$uploadurl2);
					$filemb2=$_FILES['image2']['size'] / (1024 * 1024);
					$array['image2_size']=number_format($filemb2,2);
					$array['image2']=$filename2;
				}
				$countfiles3 = count($_FILES['image3']['name']); 
				if(!empty($countfiles3)){
					$filename3 = $_FILES['image3']['name'];
					$uploadurl3= './assets/emailer/'.$filename3;
					move_uploaded_file($_FILES['image3']['tmp_name'],$uploadurl3);
					$filemb3=$_FILES['image3']['size'] / (1024 * 1024);
					$array['image3_size']=number_format($filemb3,2);
					$array['image3']=$filename3;
				}
				$countfiles4 = count($_FILES['pdf1']['name']); 
				if(!empty($countfiles4)){
					$filename4 = $_FILES['pdf1']['name'];
					$uploadurl4= './assets/emailer/'.$filename4;
					move_uploaded_file($_FILES['pdf1']['tmp_name'],$uploadurl4);
					$filemb4=$_FILES['pdf1']['size'] / (1024 * 1024);
					$array['pdf1_size']=number_format($filemb4,2);
					$array['pdf1']=$filename4;
				}
				$countfiles5 = count($_FILES['pdf2']['name']); 
				if(!empty($countfiles5)){
					$filename5 = $_FILES['pdf2']['name'];
					$uploadurl5= './assets/emailer/'.$filename5;
					move_uploaded_file($_FILES['pdf2']['tmp_name'],$uploadurl5);
					$filemb5=$_FILES['pdf2']['size'] / (1024 * 1024);
					$array['pdf2_size']=number_format($filemb5,2);
					$array['pdf2']=$filename5;
				}
				$countfiles6 = count($_FILES['pdf3']['name']); 
				if(!empty($countfiles6)){ 
					$filename6 = $_FILES['pdf3']['name'];
					$uploadurl6= './assets/emailer/'.$filename6;
					move_uploaded_file($_FILES['pdf3']['tmp_name'],$uploadurl6);
					$filemb6=$_FILES['pdf3']['size'] / (1024 * 1024);
					$array['pdf3_size']=number_format($filemb6,2);
					$array['pdf3']=$filename6;
				}
				$lastId=$this->emailer_model->insert($array);
				echo $lastId;
				
			}
		}
		
	}
	
	
	
	function addGuestlist($id=false)
	{
		//$data['data1'] = $this->program_m->FetchDataById(41);
		$data['data1'] = $this->emailer_model->FetchDataById($id);
		
		$data['title'] = "EMAILER GUESTS";
		$data['project_select'] = $_POST['project'];
		$data['project'] = $_POST['project'];
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
		
		
		
		
		$this->load->view('emailer/addGuestList',$data);
	}
	
	public function addSearchList()
		{
			$data1='';
			$project = $_POST['project'];
			$group_id = $_POST['group_id'];
			
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
				$data1=$this->emailer_model->searchGuest($search,$AllSearchData,$searchFloorOrderBy,$searchDataOrderByAsc,$project);
				// print_r($searchDataOrderByAsc);  exit;
				
				 
				
			}
			else{
				$data1=$this->emailer_model->FetchAllGuestData($project);
			}
				$output = '';
				if($data1 > 0)
				{
					$id=$_POST['id'];
					$selectedData=$this->emailer_model->FetchDataById($id);
					foreach($data1 as $data){
								if(!empty($data['last_edited_date_time'])){
								$last_edited_date_time=date('Y-m-d G:i',strtotime($data['last_edited_date_time']));
								}else{
									$last_edited_date_time="NIL";
								}
								
								// $dropInPoint=$this->program_m->FetchDataById($data['id']); 
								// $floorlocation=explode(',',$dropInPoint->floor_plan_drop_point);
								// if(!empty($floorlocation[0])){
									// $location='x='.$floorlocation[0].',y='.$floorlocation[1];
								// }else{
									// $location='';
								// }
								$getdata='';
								$mydata=json_decode($selectedData->emailer_users);
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
		
		public function GuestSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->emailer_model->FetchGuestDataById($id); 
			
			$output = '';
			if($data > 0)
			{
				
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
						<td class="" >'.$data->company.'</td>
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
						<td>'.$data->email.'</td>
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
        
   
	function AddGuest($id=false)
	{
		if($_POST){
			$ids=json_encode($_POST['ids']);
			$array['emailer_users']=$ids;
			$array['edit_steps']=2;
			$id=$_POST['id']; 
			$id1=$_POST['id']; 
			$id=$this->emailer_model->UpdateData($id,$array);
			$myids=json_decode($ids);
			
			foreach($myids as $guestid){
				$res=$this->ion_auth_model->sendEmailerEmail($guestid,$id1);
				
			}
			
			$userscount=count($myids);
			if($res=='success'){
				//send Bcc email
				$this->BccSendEmail($id,$userscount);
			}
			
			if($id1){ 
				echo $id1; 
			}
				  
			}
	}
	
	public function BccSendEmail($id,$userscount)
	{
		$query1 = $this->db->get_where('xf_mst_emailer', array('id' => $id));
		$emailerdata=$query1->row();
	
		$emailer_owner_bcc=$emailerdata->emailer_owner_bcc;

		$emailer_owner=$emailerdata->emailer_owner;
		$query3 = $this->db->get_where('xf_guest_users', array('id' => $emailer_owner));
		$emailer_ownerdata=$query3->row();
		
		$query2 = $this->db->get_where('xf_mst_project', array('id' => $emailerdata->project_id));
		$project=$query2->row();
		$sub='XPLATFORM - ALL EMAILERS SENT'; 
		
		$data=array('emailerdata'=>$emailerdata,'project_id'=>$project->project_id,'userscount'=>$userscount);

		$msg = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('emailer_bcc_email', 'ion_auth'), $data, true);

		$this->email->clear();
		$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
		$this->email->to($emailer_owner_bcc);
		$this->email->bcc('admin@xplatform.live');		//mail to Admin as bcc always
		$this->email->subject($sub);
		$this->email->message($msg); 
		$result=$this->email->send();
		if($result){
			return 'success';
		}else{
			return 'error';
		}
	}
	
	
		public function viewAddSuccessful($id)
	{
		$data['title'] = "Add Emailer Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->emailer_model->FetchDataById($id);
		$programPresenter='';
		$mydata=json_decode($data['data1']->emailer_users);
		foreach($mydata as $val){
			$res=$this->emailer_model->GuestUserNameById($id);
			if(!empty($res)){
			$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
			}
		} 
		$data['emaileruser'] = $programPresenter;
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		
		$this->load->view('emailer/AddSuccessful',$data);
		
	}
	public function edit($id=false)
	{
		$data['title'] = "Update Emailer";
		$data['project_select'] = $_POST['project'];
		$data['project'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['data']=$this->post_model->GuestUsers($_POST['project']);
		$data['data1'] = $this->emailer_model->FetchDataById($id);
		//$data['files'] = $this->program_m->FetchFilesDataById($data['data1']->program_id);
		$this->load->view('emailer/edit',$data);
		
	}
	
	
	
	function editGuestlist($id=false)
	{
		//$data['data1'] = $this->program_m->FetchDataById(15);
		$data['data1'] = $this->emailer_model->FetchDataById($id);
		$data['project_select'] = $_POST['project'];
		$data['project'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		
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
		$this->load->view('emailer/editGuestList',$data);
	}
	
	
	
	
	public function vieweditSuccessful($id)
	{
		$data['title'] = "Update Program";
		$data['success_msg'] = "SUCCESSFUL";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['data1'] = $this->emailer_model->FetchDataById($id);
		$programPresenter='';
		$mydata=json_decode($data['data1']->emailer_users);
		
		foreach($mydata as $val){
			$res=$this->emailer_model->GuestUserNameById($val);
			if(!empty($res)){
									$programPresenter.=$res->guest_type.', '.$res->first_name.' '.$res->last_name.'</br>' .$res->designation.', '.$res->company.'</br></br>';
									}
		
		} 
		
		$data['emaileruser'] = $programPresenter;
		
				// $datau=array(
               // 'edit_steps'=>2
               // );
               // $this->program_m->updateOldData($id,$datau); 
        
        
              // $datauu=array(
             // 'edit_steps'=>0
              // );
              // $this->program_m->updateOldData($id,$datauu);
		
		
		
		$this->load->view('emailer/editSuccessful',$data);
		
	}
	
	
	
	
	
	
	public function delFile()
	{
		$id=$_POST['id'];
		$file=$_POST['file'];
		
		if($file=='pdf1'){
			$array['pdf1']=NULL;
			$array['pdf1_size']=NULL;
		}
		if($file=='pdf2'){
			$array['pdf2']=NULL;
			$array['pdf2_size']=NULL;
		}
		if($file=='pdf3'){
			$array['pdf3']=NULL;
			$array['pdf3_size']=NULL;
		}
		if($file=='image1'){
			$array['image1']=NULL;
			$array['image1_size']=NULL;
		}
		if($file=='image2'){
			$array['image2']=NULL;
			$array['image2_size']=NULL;
		}
		if($file=='image3'){
			$array['image3']=NULL;
			$array['image3_size']=NULL;
		}
		$this->emailer_model->UpdateData($id,$array); 
		echo 'Delete File.';
		
	} 
	
	public function deleteAllEmailer()
	{
		$project=$_POST['project'];
		$group_id=$_POST['group_id'];
		$data['title'] = "Delete All Floor Plans";
		$data['data']=$this->emailer_model->EmailerFetchAllData($project);
		$data['project']=$project;
		$data['project_select']=$project;
		$data['group_id']=$group_id;
		$this->load->view('emailer/deleteAllEmailer',$data);
	}
	
	
	public function deleteAllSuccess() 
	{
		$project=$_POST['project']; 
		$group_id=$_POST['group_id']; 
		$_SESSION['DeleteData']=$this->emailer_model->EmailerFetchAllData($project);
		$this->emailer_model->DeleteAllImage($project);
		$this->emailer_model->deleteAll($project);
		$data['project']=$project;
		$data['project_select']=$project; 
		$data['group_id']=$group_id;
		$data['title'] = "Delete All PROGRAMS";
		$this->load->view('emailer/deleteAllSuccess',$data);
	} 
	
	public function Emailersingledelete()
	{
		
		foreach($_POST['delval'] as $ids){
			$id[]=$ids;
		}
		$_SESSION['SelectedIds']=$id; 
		$_SESSION['Singledata']=count($_POST['delval']);
		$_SESSION['SelectedDelete']=$this->emailer_model->FetchDataByMultipleId($id);
		
	}
	
	
	public function EmailerSelectMultidelete()
	{
		$project=$_POST['project']; 
		$group_id=$_POST['group_id'];
		$data['project']=$project;
		$data['project_select']=$project; 
		$data['group_id']=$group_id;
		$data['title'] = "Delete Program";
		$this->load->view('emailer/selectMultidelete',$data);
	}
	
	public function EmailerselecteddeleteSuccess()
	{
		$project=$_POST['project']; 
		$group_id=$_POST['group_id'];
		$data['project']=$project;
		$data['project_select']=$project; 
		$data['group_id']=$group_id;
		$id=$_SESSION['SelectedIds'];
		$this->emailer_model->DeleteImageDataByMultipleId($id);
		$res=$this->emailer_model->DeleteDataByMultipleId($id);
		$data['title'] = "Delete PROGRAMS"; 
		$this->load->view('emailer/selecteddeleteSuccess',$data);
	}
	
	
	
	
	
	
      function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->emailer_model->deleteJunkRecordEmailer($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      //  redirect("Location: config/".$group_id."/".$project_id);
        exit();
        }else{
        
        
        
        $olddata =  $this->emailer_model->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($olddata)){
         $this->emailer_model->updateOldData($id,$data); 
        }
        
               $datau=array(
       'edit_steps'=>2
       );
        $this->emailer_model->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
        $this->emailer_model->updateOldData($id,$datauu);
        
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }
	
	
	
	
	
	

}

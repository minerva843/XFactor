<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
		$this->load->model('project_model','project_m');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('program_model','program_m');
		$this->load->model('setting_model');
		$this->load->model('group_model');
		$this->load->library('email');
		$this->load->model('auth_model', 'auth');
		$this->load->library('session');
		$this->load->model('common_model', 'common');
		$this->load->model('floor_model');
		$this->load->model('post_model');
		$this->load->model('content_model');
		$this->load->model('ondemand_model');
		$this->load->model('program_model');
		 // if (!$this->ion_auth->logged_in())
		// { 
		 	// redirect('auth/login', 'refresh');
		// } 
        
    }  
		
	
	public function index() 
	{
		

		$data['group_id']=$_POST['group_id'];
		$data['data1'] = $this->project_m->get_projects();
		$data['title'] = "Project List";  
		$this->load->view('project/allProject', $data);
	}
        
        
        function deleteSelectedProjects(){
				$group=$_POST['group_id'];
				$data['group_id'] = $group;
                 $ids = $_POST['ids'];
                 $ids_arr = explode(',', $ids);
                 $where_in = array('id',$ids_arr);
		 $data['title'] = "Delete Selected Zones";
                $data['selected'] = TRUE;
                $data['data1'] = $this->project_m->getProjectByIdWhereIN($where_in);    
				
		 $data['title'] = "Project List";  
		 $this->load->view('project/deleteAll', $data);  
		foreach($_POST['delval'] as $ids){
			$id[]=$ids;
		}
		$_SESSION['SelectedIds']=$id;
		$_SESSION['Singledata']=count($_POST['delval']);
		$_SESSION['SelectedDelete']=$this->project_m->FetchDataByMultipleId($id);
           
        }
		
		function projectSelectMultidelete()
		{
			$group=$_POST['group_id'];
				$data['group_id'] = $group;
			$data['title'] = "Delete PROJECT";
			$this->load->view('project/projectSelectMultidelete',$data);
		}
		
		public function ProjectselecteddeleteSuccess()
		{
			$group=$_POST['group_id'];
				$data['group_id'] = $group;
			$id=$_SESSION['SelectedIds'];
			//Delete all Files
			$this->project_m->DeleteImageDataByMultipleId($id);
			$this->floor_model->DeleteAllImage($id);
			$this->post_model->DeleteAllDataByMultipleId($id);
			$this->program_model->DeleteAllDataByMultipleId($id);
			$this->content_model->DeleteAllDataId($id);
			 $this->ondemand_model->DeleteAllImage($id);
			
			$res=$this->project_m->DeleteDataByMultipleId($id);
			$data['title'] = "Delete Project";
			$this->load->view('project/ProjectselecteddeleteSuccess',$data);
		}
        
        function deleteAllprojects(){
            $group=$_POST['group_id'];
				$data['group_id'] = $group;
          	$data['data1'] = $this->project_m->get_allprojects($group);
		$data['title'] = "Project List";  
		$this->load->view('project/deleteAll', $data);  
            
        }
        
        
        function deleteAllprojectsSuccess(){
            $group=$_POST['group_id'];
				$data['group_id'] = $group;
		$_SESSION['DeleteData'] = $this->project_m->get_projects($group);
		// Delete All Files
		foreach($_SESSION['DeleteData'] as $pro){
			$this->floor_model->DeleteAllImage($pro->id);
			$this->post_model->DeleteAllDataByMultipleId($pro->id);
			$this->program_model->DeleteAllDataByMultipleId($pro->id);
			$this->content_model->DeleteAllDataId($pro->id);
			 $this->ondemand_model->DeleteAllImage($pro->id);
		}
		$this->project_m->DeleteAllImage($group);
		$this->project_m->deleteAllprojects($group);
		$data['title'] = "Project List";  
		$this->load->view('project/deleteAllSuccess', $data);  
            
        }
		function refereseDeleteSession(){
            
			unset($_SESSION['SelectedIds']); 
			session_destroy($_SESSION['SelectedIds']); 
			echo 'success';
        }
        
        
   
	public function search()
		{

			$data1='';
			$searchData='';
			$searchDataOrderBy='';
			$group_id=$_POST['group_id'];
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					
					//$searchData=array('p.project_type'=>$_POST['selectData']); 
				}
				if(!empty($_POST['selectData'] == 'REG_REQUIRED')){
					$searchWhereIn=array('SHOP REG REQUIRED','ONLINE REG REQUIRED','ONSITE REG REQUIRED','HYBRID REG REQUIRED','PROPERTY REG REQUIRED','VIRTUAL SHOP REG REQUIRED','VENUE REG REQUIRED','DEMO REG REQUIRED');
                                }else{
                                    if(!empty($_POST['selectData'])){
                                    $searchData=array('p.project_type'=>$_POST['selectData']);     
                                    }
                                    
                                    
                                }
				if(!empty($_POST['selectData']=='NO_REG_REQUIRED')){
					
					$searchWhereIn=array('SHOP NO REG REQUIRED','ONLINE NO REG REQUIRED','ONSITE NO REG REQUIRED','HYBRID NO REG REQUIRED','PROPERTY NO REG REQUIRED','VIRTUAL SHOP NO REG REQUIRED','VENUE NO REG REQUIRED','DEMO NO REG REQUIRED');
                                }else{
                                    if(!empty($_POST['selectData'])){
                                   $searchData=array('p.project_type'=>$_POST['selectData']);  
                                    }
                                }
				
				if(!empty($_POST['selectData']=='allproject_completed')){
					
					$searchData=array('p.event_end_date_time < NOW()'=>NULL ,'(p.event_end_date_time IS NOT NULL OR p.event_end_date_time="")'=>NULL);
				}
				
				if(!empty($_POST['selectData']=='allproject_not_started')){
					
					$searchData=array('p.event_start_date_time > NOW()'=>NULL); 
				}
                                
                                if(!empty($_POST['selectData']=='allproject_live')){
					
					$searchData=array('p.event_start_date_time <='=>date('Y-m-d')); 
				}
				 
				
				if(!empty($_POST['selectShortBy']== 'project_name_asc')){
					//$searchDataOrderBy=array('p.project_name'=>'ASC');
					$searchDataOrderByAsc='p.project_name';
				}
				if(!empty($_POST['selectShortBy']== 'project_status')){
					$searchDataOrderByAsc='p.project_status';
				}
				if(!empty($_POST['selectShortBy']== 'project_type')){
					$searchDataOrderByAsc='p.project_type';
				}
				if(!empty($_POST['selectShortBy']== 'project_audience_type')){
					$searchDataOrderByAsc='p.project_audience_type';
				}
				if(!empty($_POST['selectShortBy']== 'project_start_latest')){
					$searchDataOrderBy='p.event_start_date_time';
				}
				
				if(!empty($_POST['selectShortBy'] == 'project_start_earliest')){
					$searchDataOrderByAsc='p.event_start_date_time';
				} 
				
				if(!empty($_POST['selectShortBy']== 'latest_created_project')){
					$searchDataOrderBy='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'earliest_created_project')){
					$searchDataOrderByAsc='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'latest_edit_project')){
					$searchDataOrderBy='p.last_edited_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit_project')){
					$searchDataOrderByAsc='p.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->project_m->searchProject($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$searchWhereIn,$AllSearchData,$group_id);
				
			}
			
			else{
				$data1=$this->project_m->get_allprojects($group_id);
			}
			
				$output = '';
				if(count($data1) > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= date('Y-m-d G:i',strtotime($data->last_edited_date_time)).'h'; }else{ $last_edited_date_time= "NIL";  }
								
								if(date('Y-m-d',strtotime($data->event_start_date_time)) > date('Y-m-d')){
									$project_status="NOT STARTED";
								}
								if((date('Y-m-d',strtotime($data->event_start_date_time)) == date('Y-m-d')) || (date('Y-m-d',strtotime($data->event_start_date_time)) < date('Y-m-d'))){
									$project_status="LIVE";
								}
								if( !empty($data->event_end_date_time) && date('Y-m-d',strtotime($data->event_end_date_time)) < date('Y-m-d')){ 
									$project_status="ENDED";
								}
								$getdata='';
								$showbtn='';
								if(!empty($_SESSION['SelectedIds'])){
									foreach($_SESSION['SelectedIds'] as $val){
									if($val==$data->id){
										$getdata .="checked";
									}else{
										$getdata .='';
									}
								
									}
									$showbtn='';
								}else{
										$showbtn='style="display:none;"';
								}
								if(!empty($data->event_start_date_time)){
									$startDate='<td class="loweditbt">'.$data->event_start_date_time.'h</td>';
									
								}else{
									$startDate='<td>NIL</td>';
									
								}
								
								if(!empty($data->event_end_date_time)){
									
									$endDate='<td class="loweditbt">'.$data->event_end_date_time.'h</td>';
								}else{
									
									$endDate='<td>NIL</td>';
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="">
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data->project_name.'" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  '.$showbtn.'>
								<label for="d_'.$data->id.'" '.$showbtn.' class="deletClass hide"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>'.$data->project_id.'</td>
								<td class="project_namecls">'.$data->project_name.'</td> 
								<td>'.$data->project_type.'</td>
								<td>'.$data->project_audience_type.'</td>
								<td>'.$project_status.'</td>
								'.$startDate.'
								'.$endDate.'
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " > 
      <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output = '
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
			$data=$this->project_m->FetchDataById($id); 
			
			$output = '';
			$data1=$this->project_m->get_projects();
					$checkNull='';
					if(empty($data1)){
						$checkNull .='<p><span id="currentlyselected" class="current-bold">CURRENTLY SELECTED : </span> NO PROJECT SELECTED</p>
						<p class="dhg"><b>THERE ARE NO PROJECTS.</b></p>
						<p class="hjk">TO START, CLICK ADD.</p>   
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROJECT SELECTED</p>';  
					}
			if($data > 0)
			{
				
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
				if(date('Y-m-d',strtotime($data->event_start_date_time)) >date('Y-m-d')){
						$project_status="NOT STARTED";
					}
					if((date('Y-m-d',strtotime($data->event_start_date_time)) == date('Y-m-d')) || (date('Y-m-d',strtotime($data->event_start_date_time)) < date('Y-m-d'))){
						$project_status="LIVE";
					}
					if(!empty($data->event_end_date_time) && date('Y-m-d',strtotime($data->event_end_date_time)) < date('Y-m-d')){ 
						$project_status="ENDED";
					}
			
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= date('Y-m-d G:i',strtotime($data->last_edited_date_time)).'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_id_address)){ $last_edited_ip_address= $data->last_edited_id_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
				
				
				$DataField=json_decode($data->key);
					
					if($DataField->salutation ==1){  $salutation= "show"; }else{ $salutation= "DISABLE"; }
					if($DataField->gender ==1){  $gender= "show"; }else{ $gender= "DISABLE"; }
					if($DataField->first_name ==1){  $first_name= "show"; }else{ $first_name= "DISABLE"; }
					if($DataField->last_name ==1){  $last_name= "show"; }else{ $last_name= "DISABLE"; }
					if($DataField->username ==1){  $username= "show"; }else{ $username= "DISABLE"; }
					if($DataField->email ==1){  $email= "show"; }else{ $email= "DISABLE"; }
					if($DataField->country_code ==1){  $country_code= "show"; }else{ $country_code= "DISABLE"; }
					if($DataField->mobile ==1){  $mobile= "show"; }else{ $mobile= "DISABLE"; }
					if($DataField->did ==1){  $did= "show"; }else{ $did= "DISABLE"; } 
					if($DataField->tel ==1){  $tel= "show"; }else{ $tel= "DISABLE"; }
					if($DataField->extension ==1){  $extension= "show"; }else{ $extension= "DISABLE"; }
					if($DataField->company_name ==1){  $company_name= "show"; }else{ $company_name= "DISABLE"; }
					if($DataField->company_address ==1){  $company_address= "show"; }else{ $company_address= "DISABLE"; }
					if($DataField->designation ==1){  $designation= "show"; }else{ $designation= "DISABLE"; }
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
					if($data->register_url){
						$row ='
						<div class="qr">
						<script>
						$(".qr").ClassyQR({
						   create: true, 
						   type: "text",  
						   text: "'.$data->register_url.'"
						});
						</script>
						
					  ';
					}else{ $row="NIL"; }
					
					if($data->checkin_page_url){ 
						$row1 ='
						<div class="qr1">
						<script>
						$(".qr1").ClassyQR({
						   create: true, 
						   type: "text",  
						   text: "'.$data->checkin_page_url.'"
						});
						</script>
						</td> 
					  ';
					}else{ $row1="NIL"; }
					
					if(!empty($data->event_start_date_time)){
						$eventstartDate='<td class="loweditbt sp_abc1">'.$data->event_start_date_time.'h</td>';
						
					}else{
						$eventstartDate='<td>NIL</td>';
						
					}
					if(!empty($data->event_end_date_time)){
						
						$eventendDate='<td class="loweditbt sp_abc1">'.$data->event_end_date_time.'h</td>';
					}else{
						
						$eventendDate='<td>NIL</td>';
					}
					if(!empty($data->setup_start_date_time !=='NOT APPLICABLE')){
						
						$setupstartDate='<td class="loweditbt sp_abc1">'.$data->setup_start_date_time.'h</td>';
					}else{
						
						$setupstartDate='<td>NIL</td>';
					}
					if(!empty($data->setup_end_date_time !=='NOT APPLICABLE')){
						
						$setupendDate='<td class="loweditbt sp_abc1">'.$data->setup_end_date_time.'h</td>';
					}else{
						
						$setupendDate='<td>NIL</td>';
					}
					if(!empty($data->strike_start_date_time !=='NOT APPLICABLE')){
						
						$strikestartDate='<td class="loweditbt sp_abc1">'.$data->strike_start_date_time.'h</td>';
					}else{
						
						$strikestartDate='<td>NIL</td>';
					}
					if(!empty($data->strike_end_date_time !=='NOT APPLICABLE')){
						
						$strikeendDate='<td class="loweditbt sp_abc1">'.$data->strike_end_date_time.'h</td>';
					}else{
						
						$strikeendDate='<td>NIL</td>';
					}
					
					
					
					$output .= '
					<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->project_name.'</span></p></td>
					</tr>
                                        
                     <tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :&nbsp;</span><span class="pname">'.$data->project_name.'</span></p></td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">PROJECT CREATION INFO</h5></td>
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
						<td>'.$data->project_id.'</td>
					  </tr>
					 <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>Created date & time</td>
						<td class="loweditbt">'.$data->created_date_time.'h</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Created XMANAGE Id</td>
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
						<td class="loweditbt">'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited XMANAGE Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					
					
					<body>
						<tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">PROJECT INFO</b></td>
						</tr>
					  <tr>
						<td  class="sp_dj">PROJECT NAME</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc1 textprojectname">'.$data->project_name.'</td>
						
					  </tr>
					  <tr>
						<td>PROJECT TYPE</td>
						<td class="sp_abc1">'.$data->project_type.'</td>
					  </tr>
					  <tr>
						<td>VENUE</td>
						<td class="sp_abc1">'.$data->venue_name.'</td>
					  </tr>
					  
					  <tr>
						<td class="sp_dj">VENUE ADDRESS</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" class="sp_abc">'.$data->venue_address.'</td>
					</tr>
					  <tr>
						<td>SETUP START DATE & TIME</td>
						'.$setupstartDate.'
					  </tr>
					  <tr>
						<td>SETUP END DATE & TIME</td>
						'.$setupendDate.'
					  </tr>
					  
					  <tr>
						<td>EVENT START DATE & TIME </td>
						'.$eventstartDate.'
					  </tr>
					  <tr>
						<td>EVENT END DATE & TIME </td>
						'.$eventendDate.'
					  </tr>
					  <tr>
						<td>STRIKE START DATE & TIME </td>
						'.$strikestartDate.'
					  </tr>
					  <tr>
						<td>STRIKE END DATE & TIME </td>
						'.$strikestartDate.'
					  </tr>
					  
					
						<tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">PROJECT INFO (FOR HOME PAGE)</b></td>
						</tr>
					  <tr>
						<td>PROJECT SHOW ON HOME PAGE</td>
						<td>'.$data->project_show_homepage.'</td>
					  </tr>
					  <tr>
						<td>PROJECT AUDIENCE TYPE</td>
						<td>'.$data->project_audience_type.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">PROJECT DESCRIPTION</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc df_xpm">'.$data->project_description.'</td>
						
					  </tr>
					  <tr>
						<td  class="sp_dj">PROJECT HEADER VISUAL</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc">'.$data->project_header_visual.'</td>
					  </tr>
					  <tr>
						<td>PROJECT STATUS</td>
						<td>'.$project_status.'</td> 
					  </tr>
					  
					  <tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">PROJECT WEBSITE ADDRESS</b></td>
						</tr>
					  <tr>
					  <tr>
						<td class="sp_dj">LETS EXPLORE URL :</td>
						<td></td>
					  </tr> 
					  <tr>
						<td colspan="2" class="res_clas sp_abc"><a target="_blank" href='.base_url().'places/index/'.$data->id.'>'.base_url().'places/index/'.$data->id.'</a></td>
						
					  </tr>
					  <tr>
						<td class="sp_dj">SIMPLE VIEW URL :</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc"><a target="_blank" href='.base_url().'simple_view/post/'.$data->id.'>'.base_url().'simple_view/post/'.$data->id.'</a></td>
					  </tr> 
					
					<body>
					<tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">CLIENT & POINT OF CONTACT INFO</b></td>
						</tr>
					<tr>
						<td>CLIENT COMPANY NAME</td>
						<td>'.$data->client_company_name.'</td>
					</tr>
					<tr>
						<td  class="sp_dj">CLIENT COMPANY ADDRESS</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" class="sp_abc">'.$data->client_company_address.'</td>
					</tr>
					<tr>
						<td>CLIENT COMPANY POSTAL CODE</td>
						<td>'.$data->client_country .' +'.$data->client_company_postal_code.'</td>
					</tr>
					<tr>
						<td>POINT OF CONTACT NAME</td>
						<td>'.$data->point_contact_name.'</td>
					</tr>
					<tr>
						<td>COUNTRY CODE</td>
						<td>'.$data->client_country .' +'. $data->client_country_code.'</td>
					</tr>
					<tr>
						<td>POINT OF CONTACT MOBILE</td>
						<td>'.$data->point_contact_mobile.'</td>
					</tr>
					<tr>
						<td>POINT OF CONTACT EMAIL</td>
						<td class="df_xpm">'.$data->point_contact_email.'</td>
					</tr> 
					<tr>
						<td class="sp_dj">ADDITIONAL NOTES</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" class="sp_abc df_xpm">'.$data->additional_notes.'</td>
					</tr>
					
					
					<tr>
						<td colspan="2" class="spc_clas"><b style="font-size: 16px;">REGISTRATION PAGE FORM INFO</b></td>
					</tr>
					  <tr>
						<td class="sp_dj">REGISTRATION PAGE URL</td>
						<td></td>
					  </tr> 
					  <tr>
						<td colspan="2" class="res_clas sp_abc"><a target="_blank" href='.$data->register_url.'>'.$data->register_url.'</a></td>
						
					  </tr>
					  <tr>
						<td class="sp_dj">CHECK IN PAGE URL</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc"><a target="_blank" href='.$data->checkin_page_url.'>'.$data->checkin_page_url.'</a></td>
					  </tr>  
					  <tr>
						<td class="sp_dj">REGISTRATION PAGE HEADER VISUAL</td>
						<td></td>
					  </tr>
					  <tr>
						<td colspan="2" class="sp_abc">'.$data->register_header_image.'</td>
					  </tr>
					  <tr>
						<td>SALUTATION</td>
						<td>'.$salutation.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td>'.$gender.'</td> 
					  </tr>
					  <tr>
						<td>FIRST NAME</td>
						<td>'.$first_name.'</td> 
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td>'.$last_name.'</td> 
					  </tr>
					  <tr>
						<td>PREFERRED NAME TO BE DISPLAYED</td>
						<td>'.$username.'</td> 
					  </tr>
					  <tr>
						<td>EMAIL</td>
						<td>'.$email.'</td> 
					  </tr>
					  <tr>
						<td>COUNTRY CODE</td>
						<td>'.$country_code.'</td> 
					  </tr>
					  <tr>
						<td>MOBILE</td>
						<td>'.$mobile.'</td> 
					  </tr>
					  <tr>
						<td>DID</td>
						<td>'.$did.'</td> 
					  </tr>
					  <tr>
						<td>TEL</td>
						<td>'.$tel.'</td> 
					  </tr>
					  <tr>
						<td>EXTENSION</td>
						<td>'.$extension.'</td> 
					  </tr>
					  <tr>
						<td>COMPANY NAME</td>
						<td>'.$company_name.'</td> 
					  </tr>
					  <tr>
						<td>COMPANY ADDRESS</td>
						<td>'.$company_address.'</td> 
					  </tr>
					  <tr>
						<td>DESIGNATION</td>
						<td>'.$designation.'</td> 
					  </tr>
					  <tr>
						<td  class="sp_dj">'.$remark_1.'</td>
						 <td>'.$remark_1msg.'</td>
					  </tr><!--tr>
						<td colspan="2" class="sp_abc">'.$remark_1msg.'</td>
					  </tr-->
					  <tr>
						<td class="sp_dj">'.$remark_2.'</td>
						<td>'.$remark_2msg.'</td>
					  </tr><!--tr>
						<td colspan="2" class="sp_abc">'.$remark_2msg.'</td> 
					  </tr-->
					  <tr>
						<td class="sp_dj">'.$remark_3.'</td>
						 <td>'.$remark_3msg.'</td>
					  </tr><!--tr>
						<td colspan="2" class="sp_abc">'.$remark_3msg.'</td>
					  </tr-->
					  <tr>
						<td  class="sp_dj">'.$remark_4.'</td>
						<td>'.$remark_4msg.'</td>
					  </tr><!--tr>
						<td colspan="2" class="sp_abc">'.$remark_4msg.'</td> 
					  </tr-->
					  <tr>
						<td class="sp_dj">'.$remark_5.'</td>
						<td>'.$remark_5msg.'</td>
					  </tr><!--tr> 
						<td colspan="2" class="sp_abc">'.$remark_5msg.'</td>  
					  </tr-->
					  <tr> 
						<td>
						PROJECT REGISTRATION QR CODE</td>
						<td>'.$row.'</td>
						</tr>
						<tr> 
						<td>
						PROJECT CHECK IN PAGE QR CODE</td>
						<td>'.$row1.'</td>
						</tr>
					</body>'
					;
			}else{
				$output .= ''.$checkNull.'';
			}
			
			echo $output;
			
		}
        
	function add_post_step1($id=NULL)
	{
		$group=$_POST['group_id'];
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
               // print_r($MyProject); exit;
		}else{
			$MyProject='';
		}
       $CountryCode = $this->common->getCountryCode();
	  
		$datap = array();
				if(!empty($id)){
					$datap['id'] = $id; 
					$project_type=$MyProject->project_type;
					$datap['project_name'] = $this->input->post('project_name'); 
					//$datap['project_type'] = $this->input->post('project_type'); 
					$datap['venue_name'] = $this->input->post('venue_name'); 
					$datap['venue_address'] = $this->input->post('venue_address'); 
					$datap['venue_country'] = $this->input->post('country'); 
					$datap['venue_postal_code'] = $this->input->post('venue_postal_code');
					if(!empty($project_type == 'SHOP REG REQUIRED' || $project_type == 'SHOP NO REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'VENUE NO REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'PROPERTY NO REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VIRTUAL SHOP NO REG REQUIRED')){
						$datap['setup_start_date_time'] = 'NOT APPLICABLE'; 
						$datap['setup_end_date_time'] = 'NOT APPLICABLE'; 
						$datap['strike_start_date_time'] = 'NOT APPLICABLE'; 
						$datap['strike_end_date_time'] = 'NOT APPLICABLE';
					}else{
						//$datap['setup_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('setup_start_date_time'))); 
						//$datap['setup_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('setup_end_date_time'))); 
						//$datap['strike_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('strike_start_date_time'))); 
						//$datap['strike_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('strike_end_date_time')));
                                                
                                                
                                                $datap['setup_start_date_time'] = $this->input->post('setup_start_date_time'); 
						$datap['setup_end_date_time'] = $this->input->post('setup_end_date_time'); 
						$datap['strike_start_date_time'] = $this->input->post('strike_start_date_time'); 
						$datap['strike_end_date_time'] = $this->input->post('strike_end_date_time');
					
                                                
					}						
					//$datap['event_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('event_start_date_time'))); 
					//$datap['event_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('event_end_date_time'))); 
                                        
                                        $datap['event_start_date_time'] = $this->input->post('event_start_date_time'); 
					if(!empty($this->input->post('event_end_date_time')))
										{ 
					$even_end_date=$this->input->post('event_end_date_time'); }else{  $even_end_date='';}
					$datap['event_end_date_time'] = $even_end_date;
					
						
										 
					$datap['last_edited_date_time']=date("Y-m-d G:i");
					$datap['last_edited_id_address']=$_SERVER['REMOTE_ADDR'];
					
					//corrected by Rajeev 13Mar
				//	$datap['last_edited_xmanage_id']= 'XP'.$this->session->userdata('user_id');
					$datap['last_edited_xmanage_id']= $this->session->userdata('xmanage_id');
					$datap['last_edited_username']=$this->session->userdata('username');
					
					
				}else{
					$project_type=$this->input->post('project_type'); 
					$datap['project_steps'] = 1; 
					$datap['group_id'] = $this->input->post('group'); 
					$datap['project_name'] = $this->input->post('project_name'); 
					$datap['project_type'] = $this->input->post('project_type'); 
					$datap['venue_name'] = $this->input->post('venue_name');  
					$datap['venue_address'] = $this->input->post('venue_address'); 
					$datap['venue_country'] = $this->input->post('country'); 
					$datap['venue_postal_code'] = $this->input->post('venue_postal_code'); 
					if(!empty($project_type == 'SHOP REG REQUIRED' || $project_type == 'SHOP NO REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'VENUE NO REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'PROPERTY NO REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VIRTUAL SHOP NO REG REQUIRED')){
						$datap['setup_start_date_time'] = 'NOT APPLICABLE'; 
						$datap['setup_end_date_time'] = 'NOT APPLICABLE'; 
						$datap['strike_start_date_time'] = 'NOT APPLICABLE'; 
						$datap['strike_end_date_time'] = 'NOT APPLICABLE';
					}else{
						//$datap['setup_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('setup_start_date_time'))); 
						//$datap['setup_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('setup_end_date_time'))); 
						//$datap['strike_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('strike_start_date_time'))); 
						//$datap['strike_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('strike_end_date_time')));
                                                
                                                
                                                $datap['setup_start_date_time'] = $this->input->post('setup_start_date_time'); 
						$datap['setup_end_date_time'] = $this->input->post('setup_end_date_time'); 
						$datap['strike_start_date_time'] = $this->input->post('strike_start_date_time'); 
						$datap['strike_end_date_time'] = $this->input->post('strike_end_date_time');
					
                                                
					}

					//$datap['event_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('event_start_date_time'))); 
					//$datap['event_end_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('event_end_date_time'))); 
                                        
                                        
                                        $datap['event_start_date_time'] = date('Y-m-d G:i',strtotime($this->input->post('event_start_date_time'))); 
										if(!empty($this->input->post('event_end_date_time')))
										{ 
									$even_end_date=$this->input->post('event_end_date_time'); }else{  $even_end_date='';}
					$datap['event_end_date_time'] = $even_end_date;
					
						 
					$datap['last_edited_date_time']=date("Y-m-d G:i");
					$datap['last_edited_id_address']=$_SERVER['REMOTE_ADDR'];
					//corrected by Rajeev on 13-Mar
					//$datap['last_edited_xmanage_id']= 'XP'.$this->session->userdata('user_id');
					$datap['last_edited_xmanage_id']= $this->session->userdata('xmanage_id');
					$datap['last_edited_username']=$this->session->userdata('username');
					$datap['created_date_time']=date("Y-m-d G:i");
					$datap['created_ip_address']=$_SERVER['REMOTE_ADDR']; 
					$datap['created_xmanage_id']=$this->session->userdata('xmanage_id');
					$datap['created_username']=$this->session->userdata('username');
					$datap['project_id']='XCPRO'.rand(1000000000,9999999999);
					$datap['user_id']=$this->session->userdata('user_id');
				}
				
					if(!empty($id)){
						
						$id=$this->project_m->update_project($datap);
					}else{
						$id=$this->project_m->insert_project($datap);
						
					}
					if($id){
						echo $id;
						//echo "error";
					}else{
						echo "error";
					}
	}
	
	public function add($id=false)
	{
		$group=$_POST['group_id'];
	
		$data['group'] = $this->group_model->get_group_byId($group);
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if(!empty($group)){
			$data['group_id'] = $group;
		}else{
			$data['group_id'] = $MyProject->group_id;
		}
       $CountryCode = $this->common->getCountryCode();
			$data['title'] = "Project Add";
			
			$data['data1'] = $MyProject;
			$data['CountryCode']=$CountryCode;
			$data['groups']=$this->group_model->get_groups();
			$this->load->view('project/addproject',$data);
			
			
		
	}
	
	function add_post_step2($id=NULL)
	{
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject=''; 
		}
		$datap = array();
				if(!empty($_FILES)){
				$uploadurl= './assets/project/';
				$config = array(
					'upload_path' => $uploadurl,
					'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
					'overwrite' => TRUE,
					'max_size' => 0, 
					'max_height' => 0,
					'max_width' => 0,
					'encrypt_name' => FALSE,
				);
				 $this->upload->initialize($config);
				$this->load->library('upload', $config); 
				if(!$this->upload->do_upload('project_header_visual'))
				{ 
					$this->form_validation->set_rules("image", $this->upload->display_errors());
					echo $this->upload->display_errors();
					//return FALSE;
				}
				else
				{
					$imageDetailArray = $this->upload->data();
					//return TRUE;
				}
				$datap['project_header_visual']=$imageDetailArray['file_name'];
				}
				$datap['id'] = $id; 
				
				$datap['project_show_homepage'] = $this->input->post('project_show_homepage'); 
				$datap['project_audience_type'] = $this->input->post('project_audience_type'); 
				$datap['project_description'] = $this->input->post('project_description'); 
				$datap['registration_form_status'] = $this->input->post('registration_form_status'); 
				
				$id=$this->project_m->update_project($datap);
				if($id){
					echo $id;
				}else{
					$data['title'] = "Project Add";
					$data['data1'] = $MyProject;
					$this->load->view('project/addstep2project',$data);
				}
	}
	
	
	function addstep2project($id=false)
	{
		$group=$_POST['group_id'];
		
		$data['group'] = $this->group_model->get_group_byId($group);
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if(!empty($group)){
			$data['group_id'] = $group;
		}else{
			$data['group_id'] = $MyProject->group_id;
		}
		
		$data['title'] = "Project Add";
		$data['data1'] = $MyProject;
		$datap['id'] = $id; 
		$datap['project_steps'] = 2;
		
		$this->project_m->update_project($datap);
		$this->load->view('project/addstep2project',$data);
		
	}
	
	function addstep3($id=false)
	{
		$group=$_POST['group_id'];
		
		$data['group'] = $this->group_model->get_group_byId($group);
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if(!empty($group)){
			$data['group_id'] = $group;
		}else{
			$data['group_id'] = $MyProject->group_id;
		}
		
		$data['CountryCode']=$this->common->getCountryCode();
		//$data['group_id'] = $_POST['group_id'];
		$data['data1'] = $MyProject;
		$data['title'] = "Project Add";
		$datap['id'] = $id; 
		$datap['project_steps'] = 3; 
		
		$this->project_m->update_project($datap);
		$this->load->view('project/addstep3project',$data);
		
	}
	
	
	function addstep3project($id=false)
	{
		 
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject=''; 
		}
              
		if($_POST){
				$datap = array();
				$datap['id'] = $id;
				$datap['client_company_name'] = $this->input->post('client_company_name'); 
				$datap['client_company_address'] = $this->input->post('client_company_address'); 
				$datap['client_country'] = $this->input->post('client_country'); 
				$datap['client_company_postal_code'] = $this->input->post('client_company_postal_code'); 
				$datap['point_contact_name'] = $this->input->post('point_contact_name'); 
				$datap['client_country_code'] = $this->input->post('client_country_code'); 
				$datap['point_contact_mobile'] = $this->input->post('point_contact_mobile'); 
				$datap['point_contact_email'] = $this->input->post('point_contact_email'); 
				$datap['additional_notes'] = $this->input->post('additional_notes'); 
				
				
								
				$id=$this->project_m->update_project($datap);
				if($id){
                                    
					echo $id; 
				}else{

					$data['CountryCode']=$this->common->getCountryCode(); 
					$data['data1'] = $MyProject;
					$data['title'] = "Project Add";
					$this->load->view('project/addstep3project',$data);
				}
		}
	}
	
	function addstep4($id=false)
	{
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		$project_type=$MyProject->project_type;
			$data['group_id'] = $_POST['group_id'];
			 if($project_type == 'SHOP NO REG REQUIRED' || $project_type == 'ONLINE NO REG REQUIRED' || $project_type == 'ONSITE NO REG REQUIRED' || $project_type == 'HYBRID NO REG REQUIRED' || $project_type == 'PROPERTY NO REG REQUIRED' || $project_type == 'VIRTUAL SHOP NO REG REQUIRED' || $project_type == 'VENUE NO REG REQUIRED' || $project_type == 'DEMO NO REG REQUIRED'){
				$datap['id'] = $id;  
				$datap['project_steps'] = 4; 
				//$datap['edit_steps'] = 4;
				$this->project_m->update_project($datap);
				$data['DataField']=json_decode($MyProject->key); 
				$data['data1'] = $MyProject;
				$data['title'] = "Project Add";
				$this->load->view('project/addprojectsuccess',$data);
			 }else{
			
				$random=$this->generateRandomString();
				$data['url'] = base_url().'project/register_page/xmanage'.$random;
				$data['check_url'] = base_url().'project/check_in_page/xmanage'.$random;
				$data['no_required_msg'] ='';
				$data['data1'] = $MyProject;
				$data['disable'] = '';
				$data['title'] = "Project Add";
				$this->load->view('project/addstep4project',$data);
			 }
		
	}
	
	function addstep4project($id=false)
	{
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if($_POST){
			
			$remark1 = $this->input->post('remark_1');
			$remark2 = $this->input->post('remark_2');
			$remark3 = $this->input->post('remark_3');
			$remark4 = $this->input->post('remark_4');
			$remark5 = $this->input->post('remark_5');
			if(!empty($this->input->post('remark1_label'))){
				$remark1 = $this->input->post('remark1_label');
			}else{
				$remark1 =0;
			}
			if(!empty($this->input->post('remark2_label'))){
				
				$remark2 = $this->input->post('remark2_label');
				
			}else{
				$remark2=0;
			}
			if(!empty($this->input->post('remark3_label'))){
				
				$remark3 = $this->input->post('remark3_label');
				
			}else{
				$remark3=0;
			}
			if(!empty($this->input->post('remark4_label'))){
				
				$remark4 = $this->input->post('remark4_label');
				
			}else{ 
				$remark4=0;
			}
			if(!empty($this->input->post('remark5_label'))){
				
				$remark5 = $this->input->post('remark5_label');
				
			}else{
				$remark5=0;
			}
			
			
			if($_FILES){
			$uploadurl= './assets/project/';
				$config = array(
					'upload_path' => $uploadurl,
					'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
					'overwrite' => TRUE,
					'max_size' => 0, 
					'max_height' => 0,
					'max_width' => 0,
					'encrypt_name' => FALSE,
				);
				 $this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('register_header_image'))
				{ 
					$this->form_validation->set_rules("image", $this->upload->display_errors());
					echo $this->upload->display_errors();
					//return FALSE;
				}
				else
				{
					$imageDetailArray = $this->upload->data();
					//return TRUE;
				}
				$datap['register_header_image']=$imageDetailArray['file_name'];
			}else{
				$datap['register_header_image']='NIL';
			}
			
			$field_val1 = array(
				'salutation'=>$this->input->post('salutation'),
				'gender'=>$this->input->post('gender'),
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'country_code'=>$this->input->post('country_code'),
				'mobile'=>$this->input->post('mobile'),
				'did'=>$this->input->post('did'),
				'tel'=>$this->input->post('tel'),
				'extension'=>$this->input->post('extension'),
				'company_name'=>$this->input->post('company_name'),
				'company_address'=>$this->input->post('company_address'),
				'designation'=>$this->input->post('designation'),
				"remark_1"=>$remark1,
				"remark_2"=>$remark2,
				"remark_3"=>$remark3,
				"remark_4"=>$remark4,
				"remark_5"=>$remark5
			);
			$datap['key']=json_encode($field_val1);
			$datap['id']=$id;
			$datap['register_url']=$this->input->post('url');
			$datap['checkin_page_url']=$this->input->post('check_url');
			$datap['project_register_qrcode']=$this->input->post('url');
			
			$id=$this->project_m->temp_add_form($datap);
			if($id)
			{
				echo $id;
			}
			
		}else{
			$project_type=$MyProject->project_type;
			$data['group_id'] = $_POST['group_id'];
			 if($project_type == 'SHOP NO REG REQUIRED' || $project_type == 'ONLINE NO REG REQUIRED' || $project_type == 'ONSITE NO REG REQUIRED' || $project_type == 'HYBRID NO REG REQUIRED' || $project_type == 'PROPERTY NO REG REQUIRED' || $project_type == 'VIRTUAL SHOP NO REG REQUIRED' || $project_type == 'VENUE NO REG REQUIRED' || $project_type == 'DEMO NO REG REQUIRED'){
				$datap['id'] = $id;  
				$datap['project_steps'] = 4; 
				//$datap['edit_steps'] = 4;
				$this->project_m->update_project($datap);
				$data['DataField']=json_decode($MyProject->key); 
				$data['data1'] = $MyProject;
				$data['title'] = "Project Add";
				$this->load->view('project/addprojectsuccess',$data);
			 }else{
			
				$random=$this->generateRandomString();
				$data['url'] = base_url().'project/register_page/xmanage'.$random;
				$data['check_url'] = base_url().'project/check_in_page/xmanage'.$random;
				$data['no_required_msg'] ='';
				$data['data1'] = $MyProject;
				$data['disable'] = '';
				$data['title'] = "Project Add";
				$this->load->view('project/addstep4project',$data);
			 }
			
		}
	}
	
	function projectError($id=false)
	{
		$MyProject=$this->project_m->FetchDataById($id);
		$data['DataField']=json_decode($MyProject->key);
		$data['data1'] = $MyProject;
		$data['title'] = "Project Add";
		$this->load->view('project/projectnotsuccess',$data);
	}
	
	function addprojectsuccess($id=false)
	{
		$data['group_id'] = $_POST['group_id'];
		$datap['id'] = $id; 
		$datap['project_steps'] = 4;  
		$this->project_m->update_project($datap);
		$MyProject=$this->project_m->FetchDataById($id);
		$data['DataField']=json_decode($MyProject->key);
		$data['data1'] = $MyProject;
		$data['title'] = "Project Add";
		$this->load->view('project/addprojectsuccess',$data);
	}
	
	function editprojectsuccess($id=false)
	{
		$MyProject=$this->project_m->FetchDataById($id);
		$data['DataField']=json_decode($MyProject->key);
		$data['data1'] = $MyProject;
		$data['title'] = "Project Add";
		                $datap['id'] = $id;  
				
				$datap['edit_steps'] = 4;
				$this->project_m->update_project($datap);
		$this->load->view('project/editprojectsuccess',$data);
	}
	
	
	 
	function editstep1($id=false)
	{
		$group=$_POST['group_id'];
		
		$data['group'] = $this->group_model->get_group_byId($group);
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if(!empty($group)){
			$data['group_id'] = $group;
		}else{
			$data['group_id'] = $MyProject->group_id;
		}
		
		$data['title'] = "Project Add";
		$data['data1'] = $MyProject;
		
		$data['CountryCode']=$this->common->getCountryCode();
		$data['groups']=$this->group_model->get_groups();
		
		$this->load->view('project/editstep1',$data);
	}
	 
	function editstep2($id=false)
	{
		$group=$_POST['group_id'];
		
		$data['group'] = $this->group_model->get_group_byId($group);
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		if(!empty($group)){
			$data['group_id'] = $group;
		}else{
			$data['group_id'] = $MyProject->group_id;
		}
		$data['title'] = "Project Add";
		$data['data1'] = $MyProject;
		$data['CountryCode']=$this->common->getCountryCode();
		$data['groups']=$this->group_model->get_groups();
		$this->load->view('project/editstep2',$data);
	}
	
	function editstep3($id=false)
	{
		
		if(!empty($id)){
		$MyProject=$this->project_m->FetchDataById($id);
		}else{
			$MyProject='';
		}
		
		$data['title'] = "Project Add";
		$data['data1'] = $MyProject;
		$data['CountryCode']=$this->common->getCountryCode();
		$data['groups']=$this->group_model->get_groups();
		$this->load->view('project/editstep3',$data);
	}
	
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		if($this->input->post('submit')){
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = "Project Edit";
				$data['project'] = $this->project_model->get_project_id($id);
				$this->load->view('include/header', $data);
				$this->load->view('project/edit',$data);
				$this->load->view('include/footer');
			} 
			else
			{
				$datap = array();
				$datap['id'] = $this->input->post('id'); 
				$datap['projectgroup'] = $this->input->post('projectgroup'); 
				$datap['name'] = $this->input->post('name'); 
				$datap['venue'] = $this->input->post('venue'); 
				$datap['setupstart'] = $this->input->post('setupstart'); 
				$datap['setupend'] = $this->input->post('setupend'); 
				$datap['standbystart'] = $this->input->post('standbystart'); 
				$datap['standbyend'] = $this->input->post('standbyend'); 
				$datap['strikestart'] = $this->input->post('strikestart'); 
				$datap['strikeend'] = $this->input->post('strikeend'); 
				$datap['clientcompanyname'] = $this->input->post('clientcompanyname'); 
				$datap['clientcompanyaddress'] = $this->input->post('clientcompanyaddress'); 
				$datap['contactname'] = $this->input->post('contactname'); 
				$datap['areacode'] = $this->input->post('areacode'); 
				$datap['contactmobile'] = $this->input->post('contactmobile'); 
				$datap['contactemail'] = $this->input->post('contactemail'); 
				$datap['additionalnotes'] = $this->input->post('additionalnotes'); 
				
				
				$edit = $this->project_model->edit_project($datap);
				//print_r($edit);die;
				if($edit == 1)
				{
					$this->session->set_flashdata('success', 'Project Edited Successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Unable to edit.');
				}

				
				redirect(base_url("project/index"));
			}
			
			
		} else {
			$data['title'] = "Project Edit";
			$data['project'] = $this->project_model->get_project_id($id);
			//print_r($data['project']);die;
			$this->load->view('include/header', $data);
			$this->load->view('project/edit', $data);
			$this->load->view('include/footer');
			
		}
		
		//print_r($id);die;
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		//print_r($id);die;
		$del = $this->project_model->delete_project($id);
		if($del == 1)
		{
			$this->session->set_flashdata('success', 'Project Deleted Successfully');
		}
		else
		{
			$this->session->set_flashdata('error', 'Unable to delete.');
		}

		
		redirect(base_url("project/index"));
	}
	
	public function project_add_details()
	{
		//$register_id=$this->project_m->last_register_id();
		$random=$this->generateRandomString();
		
		$url = 'http://13.235.169.150/XFactor/project/register_page/xmanage'.$random;
		
		if($this->input->post('submit')){
			
			$remark1 = $this->input->post('remark_1');
			$remark2 = $this->input->post('remark_2');
			$remark3 = $this->input->post('remark_3');
			$remark4 = $this->input->post('remark_4');
			$remark5 = $this->input->post('remark_5');
			if($remark1 == 1){
				$remark1 = $this->input->post('remark1_label');
			}
			if($remark2 == 1){
				$remark2 = $this->input->post('remark2_label');
			}
			if($remark3 == 1){
				$remark3 = $this->input->post('remark3_label');
			}
			if($remark4 == 1){
				$remark4 = $this->input->post('remark4_label');
			}
			if($remark5 == 1){
				$remark5 = $this->input->post('remark5_label');
			}
			
			$project_id = 1;
			$field_val1 = array(
				'salutation'=>$this->input->post('salutation'),
				'gender'=>$this->input->post('gender'),
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'pincode'=>$this->input->post('pincode'),
				'mobile'=>$this->input->post('mobile'),
				'did'=>$this->input->post('did'),
				'tel'=>$this->input->post('tel'),
				'extension'=>$this->input->post('extension'),
				'company_name'=>$this->input->post('company_name'),
				'company_address'=>$this->input->post('company_address'),
				'designation'=>$this->input->post('designation'),
				"remark_1"=>$remark1,
				"remark_2"=>$remark2,
				"remark_3"=>$remark3,
				"remark_4"=>$remark4,
				"remark_5"=>$remark5
			);
			$field_val=json_encode($field_val1);
			
			if($this->project_m->temp_add_form($field_val,$project_id,$url) == true){
				$data['msg'] = "SUCCESSFUL";
				$data['title'] = "Project Add Details";
				$this->load->view('include/header', $data);
				$this->load->view('project/add_details');
				$this->load->view('include/footer');
			}
			else{
				$data['url'] = $url;
				$data['title'] = "Project Add Details";
				$this->load->view('include/header', $data);
				$this->load->view('project/add_details');
				$this->load->view('include/footer');
			}
		}
		else{
			$data['url'] = $url;
			$data['title'] = "Project Add Details";
			$this->load->view('include/header', $data);
			$this->load->view('project/add_details');
			$this->load->view('include/footer');
		}
	}
	
	public function register_page(){
		//print_r('hi');die;
		$full_url= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$CountryCode = $this->common->getCountryCode();
		if($_POST)
		{
			$full_url=$this->input->post('url');
			// $rules = $this->rules();
			// $this->form_validation->set_rules($rules);
			
			// if ($this->form_validation->run() == false) {
				
				 // $UserData=$this->project_m->checkurl($full_url);
				 // $DataField=json_decode($UserData->key); 
				 // $data['alldata'] = $UserData; 
				 // $data['DataField'] = $DataField;
				// $data['title'] = "REGISTRATION FORM";
				// $this->load->view('include/header', $data);
				// $this->load->view('project/temp_registration_page');
				// $this->load->view('include/footer');
			// } 
			$password=$this->input->post('password');
			$ip_address = $this->input->ip_address();
			$form_data=array(
				'project_id'=>$this->input->post('project_id'),
				'salutation'=>$this->input->post('salutation'),
				'gender'=>$this->input->post('gender'),
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'password' => $this->hash_password($password),
				'pincode'=>$this->input->post('pincode'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'),
				'dob'=>$this->input->post('bday_year').'-'.$this->input->post('month').'-'.$this->input->post('date'), 
				'did'=>$this->input->post('did'),
				'tel'=>$this->input->post('tel'),
				'extension'=>$this->input->post('extension'),
				'designation'=>$this->input->post('designation'),
				'remark_1'=>$this->input->post('remark_1'),
				'remark_2'=>$this->input->post('remark_2'), 
				'remark_3'=>$this->input->post('remark_3'),
				'remark_4'=>$this->input->post('remark_4'),
				'remark_5'=>$this->input->post('remark_5'),
				'active'=>1,
				'ip_address' => $ip_address,
				'created_on' => time()
			);
			
			// print_r($form_data);
			// die;
				if($this->project_m->InsertGenerateForm($form_data) ==true){ 
					
			
			 
				
				
				
					redirect('/auth/login');
				}
				else{
					redirect($full_url);
				}
				
				
				
			//}
		}
		else
		{
			if($UserData=$this->project_m->checkurl($full_url)){
				$dateFromDatabase=strtotime($UserData->event_start_date_time .':00');
				$datetime = strtotime(date('Y-m-d G:i:s')); 
				$registration_form_status=$UserData->registration_form_status;
				if($registration_form_status==1){
					
					$registerstatus='default';
				}
				if($registration_form_status==2){
					
					$registerstatus='open';
				}
				if($registration_form_status==3){
					$registerstatus='close';
				}
				if(empty($registration_form_status)){
					$registerstatus=false;
				}
				$dateTwelveHoursAgo = 43200 + $datetime;  
				
				
			        $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
					if($registerstatus==false){
						if($dateFromDatabase >= $dateTwelveHoursAgo){
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						}else{
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
							
						}
					}
					if($registerstatus=='default'){
						if($dateFromDatabase >= $dateTwelveHoursAgo){
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						}else{
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
							
						}
					}
					if($registerstatus=='open'){
						
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						
					}
					if($registerstatus=='close'){
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
						
					}
				
				
				
				
				}else{
				
				
				$project_data = $this->project_m->FetchProjectById($project_id);
				if( empty($project_data->event_end_date_time) || (date('Y-m-d',strtotime($project_data->event_start_date_time)) == date('Y-m-d')) || (date('Y-m-d',strtotime($project_data->event_start_date_time)) < date('Y-m-d'))){
									if($registerstatus==false){
						if($dateFromDatabase >= $dateTwelveHoursAgo){
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						}else{
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
							
						}
					}
									if(!empty($registerstatus=='default')){
						if($dateFromDatabase >= $dateTwelveHoursAgo){
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM"; 
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						}else{
							
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode; 
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
							
						}
					}
					if($registerstatus=='open'){
						
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$data['checkfront']=true;
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/temp_registration_page',$data);
							$this->load->view('include/footer');
						
					}
					if($registerstatus=='close'){
						
							$DataField=json_decode($UserData->key);  
							$data['alldata'] = $UserData;
							$data['DataField'] = $DataField;
							$data['CountryCode'] = $CountryCode;
							$data['title'] = "REGISTRATION FORM";
							$this->load->view('include/header',$data);
							$this->load->view('include/menu',$data);
							$this->load->view('project/registration_closed',$data);
							$this->load->view('include/footer');
						
					}
									
									
						}
				}
			}
			else
			{
				
				$data['title'] = "REGISTRATION FORM";
				$data['checkfront']=true;
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
				$data['CountryCode'] = $CountryCode;
				$this->load->view('auth/create_user',$data);
				$this->load->view('include/footer');
			}
		}
		
	}
	
	public function matterLogin($username)
	{
		$url = MMURL."users/login";

				$post_data = array (
					"login_id" => 'xfactor',
					"password" => 'Xfactor@12345'
				);
				
				 //print_r($post_data);die;
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
					//print_r($headers['Token']);
				$this->session->set_userdata('admintoken',$headers['Token']);
				//print_r($this->session->userdata('token'));die;
				curl_close($ch);
	}
	
	private function hash_password($password){
   return password_hash($password, PASSWORD_BCRYPT); 
	}
	
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	
	function registersuccess($id=false) {
		if($id){
			$data['data']=$this->project_m->get_userData_id($id);
			$data['title'] = "REGISTRATION FORM";
			
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			$this->load->view('project/project_register_success',$data);
			$this->load->view('include/footer');
		}else{
			$data['title'] = "REGISTRATION FORM";
			
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			$this->load->view('project/project_register_success',$data);
			$this->load->view('include/footer');
		}
	}
	
	function registerunsuccess() {
			$data['title'] = "REGISTRATION FORM";
			
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			$this->load->view('project/project_register_unsuccess',$data);
			$this->load->view('include/footer');
	}
	
	
	function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->project_m->deleteJunkRecordGuest($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      
        exit();
        }else{
        

        $olddata =  $this->project_m->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($olddata)){
         $this->project_m->updateOldData($id,$data); 
        }
       
       $datau=array(
       'edit_steps'=>4
       );
       $this->project_m->updateOldData($id,$datau); 
       
       
              $datauu=array(
       'edit_steps'=>0
       );
       $this->project_m->updateOldData($id,$datauu); 
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
         
         exit;
        }
        

        }
	
	
	
	
}	
	


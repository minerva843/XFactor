<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Floor extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->model('project_model','project_m');
        
    }
	
	
		public function index()
		{
			if(!empty($_SESSION['DeleteData'])){
				session_unset('DeleteData');
			}
			$data['title'] = "Floor Plans Sorting";
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$data['data1'] = $this->floor_m->FetchAllData($_POST['project']);
			//print_r($data);die;
			$this->load->view('floor/floor_plans_sorting',$data);
		}
		
		public function search()
		{
			$data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$project = trim($_POST['project']);
			//print_r($project);die;
			if(!empty($_POST['floor_plan']) || !empty($_POST['floor_shortby']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['floor_plan'] == 1 || $_POST['floor_plan'] == 2 || $_POST['floor_plan'] == 3)){
					$searchFloor=array('f.floor_plan_grid_type'=>$_POST['floor_plan']);
				}else{
					if(!empty($_POST['floor_plan'] == 'project_not_completed')){
						$searchFloor=array('p.setup_start_date_time >'=>date('Y-m-d G:i:s')); 
					}
					if(!empty($_POST['floor_plan']=='project_completed')){
						$searchFloor=array('p.setup_end_date_time <'=>date('Y-m-d G:i:s'));
					}
				}
				if(!empty($_POST['floor_shortby'] == 'floor_plan_A-Z')){
					$searchDataOrderByAsc='f.floor_plan_name';
				}
				if(!empty($_POST['floor_shortby'] == 'project_A-Z')){
					$searchDataOrderByAsc='p.project_name';
				}
				if(!empty($_POST['floor_shortby'] == 'project_latest')){
					$searchFloorOrderBy='p.event_start_date_time'; 
				}
				
				if(!empty($_POST['floor_shortby'] == 'project_earliest')){
					$searchDataOrderByAsc='p.event_start_date_time';
				}
				if(!empty($_POST['floor_shortby'] == 'grid_smallest')){
					$searchFloor=array('f.floor_plan_grid_type'=>1);
				}
				if(!empty($_POST['floor_shortby'] == 'latest_created_floor')){
					$searchFloorOrderBy='f.created_date_time';
				}
				
				if(!empty($_POST['floor_shortby'] == 'earliest_created_floor')){
					$searchDataOrderByAsc='f.created_date_time';
				}
				if(!empty($_POST['floor_shortby'] == 'latest_edit_floor')){
					$searchFloorOrderBy='f.last_edited_date_time';
				}
				
				if(!empty($_POST['floor_shortby'] == 'earliest_edit_floor')){
					$searchDataOrderByAsc='f.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->floor_m->searchFloor($searchFloor,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				//print_r($data1); exit;
				
			}
			
			else{
				$data1=$this->floor_m->FetchAllData($project);
				
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
						
						if($data['floor_plan_grid_type']==1){ $grid= '16 : 9'; }elseif($data['floor_plan_grid_type'] ==2){ $grid= '32 : 18'; }elseif($data['floor_plan_grid_type']==3){ $grid= '48 : 27'; }
						
						$floor_plan_drop_point=explode(',',$data['floor_plan_drop_point']);
						$drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];
						
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['floor_plan_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass hide"></label>
								</td>
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data['floor_plan_id'].'</td>
								<td class="project_namecls" >'.$data['floor_plan_name'].'</td>
								
								<td>'.$data['each_square'] .' Meter</td>
								<td>'.$drop_point .'</td> 
								<td>'.$data['project_name'].'
								</td> 
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
		
		
		function getFloorPlanCoordData($floor){
			$data=$this->floor_m->FetchDataByIdXFP($floor); 
			echo json_encode(array('response'=>array('image'=>$data->file_name.$data->file_type,'plan_id'=>$data->floor_plan_id,'coordinates'=>$data->floor_plan_drop_point)));
			
		}
		
		
		public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->floor_m->FetchDataById($id); 
			$data1=$this->floor_m->FetchAllData($project=NULL);
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO FLOOR PLANS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED :</span> NO FLOOR PLANS SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				$grid=''; 
				$drop_point='';
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if($data->floor_plan_grid_type==1){ $grid= 'GRID TYPE, 16 : 9'; }elseif($data->floor_plan_grid_type ==2){ $grid= 'GRID TYPE, 32 : 18'; }elseif($data->floor_plan_grid_type==3){ $grid= 'GRID TYPE, 48 : 27'; }
				
				$floor_plan_drop_point=explode(',',$data->floor_plan_drop_point);
				$drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];
				
				
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
					
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" > '.$data->floor_plan_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->floor_plan_name.'</span></p></td>
					    </tr>
						    
						
						<tr>
							<td colspan="2" class="top-fc"><h5>FLOOR PLAN CREATION INFO</h5></td>
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
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>Project Id</td>
						<td>'.$data->proj_id.'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Floor Plan Id</td>
						<td>'.$data->floor_plan_id.'</td>
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">FLOOR PLAN INFO</b></td>
						</tr>
						
						<tr>
						<td>PROJECT NAME</td>
						<td class="" ></td>
					   </tr>
					   
					   <tr>
						
						<td class="sp_abc df_xpm" colspan="2" >'.$data->project_name.'</td>
					   </tr>
					  
					  					  <tr>
						<td>PROJECT TYPE</td>
						<td class="" >'.$data->project_type.'</td>
					  </tr>
					  
					  <tr>
						<td>FLOOR PLAN NAME</td>
						<td class="textprojectname" ></td>
					  </tr>
					  
					  
					  <tr>
						<td class="textprojectname sp_abc df_xpm" colspan="2"  >'.$data->floor_plan_name.'</td>
					  </tr>
					  
					       
					  
					  <!--tr> 
						<td>FLOOR PLAN GRID TYPE</td>
						<td>'.$grid.'</td>
					  </tr-->
					  <tr>
						<td>FLOOR PLAN DROP IN POINT</td>
						<td>'.$drop_point.'</td>
					  </tr>
					  <tr>
						<td>FLOOR FILE NAME</td>
						<td>'.$data->file_name.'</td>
					  </tr>
					  
					  <tr>
						<td>FLOOR PLAN FILE TYPE</td>
						<td>'.$data->file_type.'</td>
					  </tr>
					  					  <tr>
						<td>FLOOR PLAN FILE SIZE</td>
						<td>'.$data->file_size.'KB</td>
					  </tr>
					
					
					<body>
					<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">FLOOR PLAN SCALE INFO</b></td>
						</tr>
					<tr>
						<td>EACH SQUARE</td>
						<td>'.$data->each_square.' METER</td>
					</tr>
					</body>
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
        
        
	
	public function floorPlanssorting2()
	{
		$data['title'] = "Floor Plans Sorting2";
		$this->load->view('include/header', $data);
		$this->load->view('floor/floor_plans_sorting2');
		$this->load->view('include/footer');
	}
	
		function floorCreateSuccess($id=false){
			$data['title'] = "Floor Created";
			$data['data'] = $this->floor_m->FetchDataById($id);
			$this->load->view('floor/floorCreateSuccess',$data);
        }
        function floorGrid($id=false)
		{
			$id=$id;
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
		
			if($_POST && !isset($_POST['project']) && empty($_POST['project'])){
				
				if(!empty($_POST['drop_point'])){
					$floor_plan_drop_point=$_POST['drop_point'];
				}else{
					$floor_plan_drop_point = '400,250';
				}
				$floor=explode(',',$floor_plan_drop_point);
				$y=$floor[1];
				$x=$floor[0];
				if($y<=690){
					$floor_plan_drop_point_y=$y;
				}else{
					$floor_plan_drop_point_y=690;
				}
				if($x<=1280){
					$floor_plan_drop_point_x=$x;
				}else{
					$floor_plan_drop_point_x=1280;
				}
				$dropimg=$floor_plan_drop_point_x.','.$floor_plan_drop_point_y;
				$result=$this->floor_m->UpdateDropPoint($id,$dropimg);
					if($result==true){
						$id= $id; 
						echo $id;
						//redirect('/floor/viewAddFloorPlansSuccessful/'.$id);
					}
					else{
						$data['title'] = "Floor Grid";
						$data['data'] = $this->floor_m->FetchDataById($id);
						$this->load->view('floor/floorGrid',$data); 
					}
			}else{
				
				$data['title'] = "Floor Grid";
				$data['data'] = $this->floor_m->FetchDataById($id);
				$this->load->view('floor/floorGrid',$data);

			}
          
        }
        
	public function addStep1FloorPlans($id=false)
	{
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
        $data['project_data'] = $this->project_m->FetchDataById($_POST['project']); 
		if(!empty($id)){
			$id= $id;
			$data['title'] = "Update Floor Grid";
			$data['projects']=$this->project_m->get_projects();
			$data['data'] = $this->floor_m->FetchDataById($id);
            $this->load->view('floor/addStep1FloorPlans',$data);
		}else{
			$data['projects']=$this->project_m->get_projects();
			$data['title'] = "Add Floor Plans";
			$this->load->view('floor/addStep1FloorPlans',$data);
		}
	}
	function addstep1FloorBackPOSt($id=false)
	{
		$id= $id;
		if($_POST){
			 
			 
			$array=array();
			if(!empty($_FILES['image']['name'])){
				
				$uploadurl= './assets/floor_plan/';
				//$newName = "floor_plan".rand(1000000,9999999).date('Y-m-d').".".pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
				$newName = pathinfo($_FILES["image"]['name'], PATHINFO_FILENAME);

				$config = array(
					'upload_path' => $uploadurl,
					'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
					'overwrite' => TRUE,
					'max_size' => 0, 
					'max_height' => 0,
					'max_width' => 0,
					'encrypt_name' => FALSE,
					'file_name' => $newName
				);
				 $this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image'))
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
			
				$array['file_name']=pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME);
				$array['file_type']=$imageDetailArray['file_ext'];
				$array['file_size']=$imageDetailArray['file_size'];
			
			}else{
			
			$data = $this->floor_m->FetchDataById($id);
			$array['file_name']=$data->file_name;
			$array['file_type']=$data->file_type;
			$array['file_size']=$data->file_size;
			}
			$array['project_id']=$this->input->post('project_name');
			$array['floor_plan_name']=$this->input->post('floor_plan_name');
			$array['each_square']=$this->input->post('measurment');
			$array['last_edited_date_time']=date("Y-m-d G:i:s");
			$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
			$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
			$array['last_edited_username']=$this->session->userdata('username');
			
			$result=$this->floor_m->UpdateData($id,$array);
			if($result==true){
				$id1 = $id;
				echo $id1;
			}
			else{
				$id1 = $id;
				echo $id1;
			}
				
			 
		}else{
			$data['projects']=$this->project_m->get_projects();
			$data['title'] = "Update Floor Grid";
			$data['data'] = $this->floor_m->FetchDataById($id);
            $this->load->view('floor/addStep1FloorPlansback',$data);
		}
	}
	
	function addstep1FloorPOSt($id=false)
	{
		
 
			
			$array = array();
			if($_FILES){
				$uploadurl= './assets/floor_plan/';
				//$newName = "floor_plan".rand(1000000,9999999).date('Y-m-d').".".pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
				$newName = pathinfo($_FILES["image"]['name'], PATHINFO_FILENAME);
				$config = array(
					'upload_path' => $uploadurl,
					'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
					'overwrite' => TRUE,
					'max_size' => 0, 
					'max_height' => 0,
					'max_width' => 0,
					'encrypt_name' => FALSE,
					'file_name' => $newName
				);
				 $this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image'))
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
				$array['file_name']=pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME);
				$array['file_type']=$imageDetailArray['file_ext'];
				$array['file_size']=$imageDetailArray['file_size'];
			}
			if(!empty($id)){
				$array['project_id']=$this->input->post('project_name');
				$array['floor_plan_name']=$this->input->post('floor_plan_name');
				$array['each_square']=$this->input->post('measurment');
				$array['last_edited_date_time']=date("Y-m-d G:i:s");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
				$result=$this->floor_m->UpdateData($id,$array);
				if($result==true){
					echo $id;
				}
				
			}else{
				
				$array['group_id']=$this->session->userdata('group_id');
				$array['project_id']=$this->input->post('project_name');
				$array['floor_plan_name']=$this->input->post('floor_plan_name');
				//$array['floor_plan_grid_type']=$this->input->post('floor_plan_grid_type');
				//$array['each_square']=$this->input->post('each_square');
				$array['each_square']=$this->input->post('measurment');
				$array['created_date_time']=date("Y-m-d G:i:s");
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date("Y-m-d G:i:s");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
	
				$lastId=$this->floor_m->insert($array);
				if($lastId != false){
					$array1['floor_plan_id']='XCFP'.rand(1000000000,9999999999);
					
						// $alpha = range('A', 'I'); 
						// for ($i=0,$row=1; $row <= 9;$i++, $row++) { 
						 // for ($col=1; $col <= 16; $col++) {
						 // $p = $col;
									// if($p>9){
							   // $text = $alpha[$i].$p;
							   // } else { 
							   // $text =  $alpha[$i].'0'.$p;
								// }                
								// $GridData=array('zone_id'=>NULL,'zone_type'=>NULL,'zone_name'=>NULL,'floor_plan_xid'=>$array1['floor_plan_id'],'grid_id'=>$text);
								 // $result=$this->floor_m->SaveGridZoneMappingData($GridData);
						 // }   
						// }
					if($this->floor_m->InsertFloorId($lastId,$array1)){
						echo $lastId; 
					}
				}
			}
			
		//}
		
	}
	
	public function addstep3FloorPlans($id=false)
	{
		$data['title'] = "Add Floor Plans Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['data'] = $this->floor_m->FetchDataById($id);
		$this->load->view('floor/addStep3FloorPlans',$data);
		
	}
	
	public function viewAddFloorPlansSuccessful($id)
	{
		$data['data'] = $this->floor_m->FetchDataById($id);
		$data['title'] = "Add Floor Plans Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['id'] = $id;
		
		$this->load->view('floor/viewAddFloorPlansSuccessful',$data);
		
	}
	
	public function editStep1FloorPlans($id)
	{
		$id=$id;
		if($_POST && !isset($_POST['project']) && empty($_POST['project'])){
			
			$array['floor_plan_name']=$this->input->post('floor_plan_name');
			$array['each_square']=$this->input->post('measurment');
			$array['last_edited_date_time']=date("Y-m-d G:i:s");
			$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
			$array['last_edited_xmanage_id']='XM123456789012';
			$array['last_edited_username']='admin@gmail.com';
			$result=$this->floor_m->UpdateData($id,$array);
			if($result==true){
				$id1 = $id;
				echo $id1;
			}
			else{
				$id1 = $id;
				echo $id1;
			}
				
			
		}else{
			$data['project_select'] = $_POST['project'];
			$data['id'] = $id;
			
			$data['group_id'] = $_POST['group_id'];
			$data['title'] = "Edit Floor Plans";
			$data['data'] = $this->floor_m->FetchDataById($id);
			$this->load->view('floor/editStep1FloorPlans',$data);
		}
	}
	
	
	public function editStep2FloorPlans($id=false)
	{
		$id= $id;
		$data['project_select'] = $_POST['project'];
			$data['id'] = $id;
			
			$data['group_id'] = $_POST['group_id'];
		$data['title'] = "Edit Floor Plans";
		$data['data'] = $this->floor_m->FetchDataById($id);
		$this->load->view('floor/editStep2FloorPlans',$data);
	}
	
	public function floorPlanEditScuccessfull($id=false)
	{ 
		$data['title'] = "Edit Floor Plans Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['project_select'] = $_POST['project'];
			$data['id'] = $id;
			
			$data['group_id'] = $_POST['group_id'];
		$data['data'] = $this->floor_m->FetchDataById($id);
		$this->load->view('floor/floorPlanEditScuccessfull',$data);
	}
	
	
	public function deleteAllFloorPlans()
	{
		$data['title'] = "Delete All Floor Plans";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['data1']=$this->floor_m->FetchAllData($_POST['project']);
		$this->load->view('floor/deleteAllFloorPlans',$data);
	}
	
	
	public function floordeleteAll() 
	{
		$_SESSION['DeleteData']=$this->floor_m->FetchAllData($_POST['project']);
		$this->floor_m->DeleteAllImage($_POST['project']);
		$this->floor_m->deleteAllfloor($_POST['project']);
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$data['title'] = "Delete All Floor Plans";
		$this->load->view('floor/deleteAllFloorPlansSuccess',$data);
	}
	
	public function floorsingledelete()
	{
		
		foreach($_POST['delval'] as $ids){
			$id[]=$ids;
		}
		$_SESSION['SelectedIds']=$id;
		$_SESSION['Singledata']=count($_POST['delval']);
		$_SESSION['SelectedDelete']=$this->floor_m->FetchDataByMultipleId($id);
		//$data['title'] = "Delete Floor Plans";
		//$this->load->view('floor/deleteSelectedFloorPlans',$data);
		
	}
	
	
	public function floorplansingledelete()
	{
		$data['title'] = "Delete Floor Plans";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$this->load->view('floor/deleteSelectedFloorPlans',$data);
	}
	
	public function floorplanselecteddelete()
	{
		$id=$_SESSION['SelectedIds'];
		$this->floor_m->DeleteImageDataByMultipleId($id);
		$res=$this->floor_m->DeleteDataByMultipleId($id);
		$data['title'] = "Delete Floor Plans";
		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		$this->load->view('floor/deleteSelectedFloorPlansSuccess',$data);
	}
	
	
	
	
	
	public function viewEditFloorPlans()
	{
		$data['title'] = "View Edit Floor Plans";
		$this->load->view('include/header', $data);
		$this->load->view('floor/viewEditFloorPlans');
		$this->load->view('include/footer');
	}
	
	
	
	public function deleteFloorPlans()
	{
		$data['title'] = "Delete All Floor Plans";
		$this->load->view('include/header', $data);
		$this->load->view('floor/deleteFloorPlans');
		$this->load->view('include/footer');
	}
	
	public function viewAddFloorPlansNotSuccess()
	{
		$data['title'] = "View Add Floor Plans Not Successfull";
		$this->load->view('include/header', $data);
		$this->load->view('floor/viewAddFloorPlansNotSuccess');
		$this->load->view('include/footer');
	}
        
        
        function floorplanWithoutEntry(){
         	$data['title'] = "Floor pan without entry";
		$this->load->view('include/header', $data);
		$this->load->view('floor/floorplanWithoutEntry');
		$this->load->view('include/footer');   
        }
        
        function uploadfloorPlanProgress(){
                $data['title'] = "Upload Floor Plan Progress";
		$this->load->view('include/header', $data);
		$this->load->view('floor/uploadfloorPlanProgress');
		$this->load->view('include/footer'); 
            
        }
        
        
        function floorplanWithEntry(){
                $data['title'] = "Upload Floor Plan Progress";
		$this->load->view('include/header', $data);
		$this->load->view('floor/floorplanWithEntry');
		$this->load->view('include/footer');   
            
        }
        
        
        function floorSearchResult(){
            
                $data['title'] = "Floor Search Result ";
		$this->load->view('include/header', $data);
		$this->load->view('floor/floorSearchResult');
		$this->load->view('include/footer');  
        }
        
       
        
        
        function floorPlanEditUnscuccessfull(){
           
         $data['title'] = "Floor Plan Edit Successful ";
		$this->load->view('include/header', $data);
		$this->load->view('floor/floorPlanEditUnscuccessfull');
		$this->load->view('include/footer'); 
            
        }
        
        function processaddStep1FloorPlans($id){
            
            	$this->load->view('include/header', $data);
		$this->load->view('floor/viewAddStep1FloorPlans');
		$this->load->view('include/footer');
        }
        
        
       function deleteJunkRecord($id,$group_id,$project_id,$action=NULL,$step){
        
        if($action=='ADD'){
        $this->floor_m->deleteJunkRecordFloor($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      //  redirect("Location: config/".$group_id."/".$project_id);
        exit();
        }else{
        
        
        
        $olddata =  $this->floor_m->getOldUpdateData($id);  
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($data)){
         $this->floor_m->updateOldData($id,$data); 
        }
        
        
               $datau=array(
       'edit_steps'=>2
       );
        $this->floor_m->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
        $this->floor_m->updateOldData($id,$datauu);
        
        
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }
        
        
        
        
        
	
	
}

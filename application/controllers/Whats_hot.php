<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Whats_hot extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
	$this->load->library('form_validation');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('program_model','program_m');
		$this->load->model('post_model');
		$this->load->model('whatshot_model');
		$this->load->model('project_model');
		$this->load->model('Icon_model');
		$this->load->model('Zone_model');
		$this->load->library('email');
		$this->load->library('session');
        
    }
	
	
		public function index()
		{
			
			$data['title'] = "WHAT'S HOT"; 
			$data['project'] = 567; 
			$this->load->view('whats_hot/index',$data);
		} 
		
	public function search()
		{
			$project='';
			$data1=''; 
			$searchData='';
			$searchDataOrderBy='';
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				if(!empty($_POST['selectData'] == 'INFO')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'INFO');
				}
				if(!empty($_POST['selectData'] == 'PROMOTION')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'PROMOTION');
				}
				if(!empty($_POST['selectData'] == 'CONTEST')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'CONTEST');
				}
				if(!empty($_POST['selectData'] == 'LUCKY DRAW')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'LUCKY DRAW');
				}
				
				if(!empty($_POST['selectData'] == 'assigned')){
					$searchData=array('xf_whatshot_slots.whatshot_id IS NOT NULL'=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned')){
						$searchData=array('xf_whatshot_slots.whatshot_id IS NULL'=> NULL);
					}

				if(!empty($_POST['selectShortBy']== 'whatshot_title')){
					
					$searchDataOrderByAsc='xf_mst_whatshot.whatshot_title';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='xf_mst_whatshot.last_edited_date_time';
				}
			
				$data1=$this->whatshot_model->searchProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchFileDataOrderByAsc,$project);
				
			}
			 
			else{
				$data1=$this->whatshot_model->FetchAllData();
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
								 $AllSlot=$this->whatshot_model->FetchSlotsDataById($data->id);
								 $All_slot='';
								if(!empty($AllSlot)){
									$assign_slot='YES';
									foreach($AllSlot as $slot){
										$All_slot .='SLOT '.$slot->slot_id.'</br>';
									}
								}else{
									$assign_slot='NO';
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="view">
								<td class="deletesingle" >
								
								<input data-project="'.$data->whatshot_title.'" type="checkbox" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  >
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>'.$data->whatshot_id.'</td>
								<td>'.$data->whatshot_title.'</td> 
								<td>'.$data->file_name.'</td>
								<td>'.$data->file_type.'</td>
								<td class="running_latter">'.$data->whatshot_btnurl.'</td>
								<td>'.$assign_slot.'</td>
								
								
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
	
	public function assignsearch()
		{
			$project='';
			$data1=''; 
			$searchData='';
			$searchDataOrderBy='';
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				if(!empty($_POST['selectData'] == 'INFO')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'INFO');
				}
				if(!empty($_POST['selectData'] == 'PROMOTION')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'PROMOTION');
				}
				if(!empty($_POST['selectData'] == 'CONTEST')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'CONTEST');
				}
				if(!empty($_POST['selectData'] == 'LUCKY DRAW')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'LUCKY DRAW');
				}
				
				if(!empty($_POST['selectData'] == 'assigned')){
					$searchData=array('xf_whatshot_slots.whatshot_id IS NOT NULL'=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned')){
						$searchData=array('xf_whatshot_slots.whatshot_id IS NULL'=> NULL);
					}

				if(!empty($_POST['selectShortBy']== 'whatshot_title')){
					
					$searchDataOrderByAsc='xf_mst_whatshot.whatshot_title';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='xf_mst_whatshot.last_edited_date_time';
				}
				$data1=$this->whatshot_model->searchProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchFileDataOrderByAsc,$project);
				
			}
			 
			else{
				$data1=$this->whatshot_model->FetchAllData();
			} 
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
								 $AllSlot=$this->whatshot_model->FetchSlotsDataById($data->id);
								 $All_slot='';
								if(!empty($AllSlot)){
									$assign_slot='YES';
									foreach($AllSlot as $slot){
										$All_slot .='SLOT '.$slot->slot_id.'</br>';
									}
								}else{
									$assign_slot='NO';
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="view">
								<td class="deletesingle" >
								
								<input data-project="'.$data->whatshot_title.'" type="radio" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  >
								<label for="d_'.$data->id.'"  class="deletClass"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>'.$data->whatshot_id.'</td>
								<td>'.$data->whatshot_title.'</td> 
								<td>'.$data->file_name.'</td>
								<td>'.$data->file_type.'</td>
								<td class="running_latter">'.$data->whatshot_btnurl.'</td>
								<td>'.$assign_slot.'</td>
								
								
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
			$assign=$_GET['assign']; 
			if(!empty($assign)){
				$slot=$this->whatshot_model->FetchSlotDataById($id);
				$data=$this->whatshot_model->FetchDataById($slot->whatshot_id);
				$checkNull .="<p><span>CURRENTLY SELECTED : </span> NO WHAT'S HOT ENTRY ASSIGNED TO THIS SLOT</p>"; 
				$commonpart ='<tr>
						<td colspan="2" class="top-fp" style="padding-top: 0px;"><p><span>CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->whatshot_title.'</span></p></td>
					</tr> <tr id="currentlyViewing" style="display:none;">
						<td  colspan="2" class=""><p><span class="current-bold">CURRENTLY VIEWING : </span>SLOT '.$slot->slot_id.'</p></td>
					</tr>';
			}else{
				$data=$this->whatshot_model->FetchDataById($id);
				$checkNull .="<p><span class='current-bold'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>"; 
				$commonpart ='<tr>
						<td colspan="2" class="top-fp" style="padding-top: 0px;"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->whatshot_title.'</span></p></td>
					</tr> <tr id="currentlyViewing" style="display:none;">
						<td  colspan="2" class=""><p><span class="current-bold">CURRENTLY VIEWING : </span>'.$data->whatshot_title.'</p></td>
					</tr>';
			}
			        
			
			$output = '';
			$data1=$this->whatshot_model->FetchAllData();
					$checkNull='';
					if(empty($data1)){
						$checkNull .="<p><span id='currentlyselected' class='current-bold'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>
						
						<p class='hjk'>TO START, CLICK ON A WHAT'S HOT ENTRY.</p>
						";
					}
					
			if($data > 0 || !empty($assign))
			{
			
				if(empty($slot->whatshot_id) && !empty($assign)){
					if(!empty($slot->slot_id)){
						if(!empty($data->whatshot_title)){
							$title=$data->whatshot_title;
						}else{
							$title='SLOT '.$slot->slot_id;
						}
						$slo='
						<tr>  
						<td colspan="2" class="top-fp" style="padding-top: 0px;"><p><span>CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$title.'</span></p></td>
					</tr> <tr id="currentlyViewing" style="display:none;">
						<td  colspan="2" class=""><p><span class="current-bold">CURRENTLY VIEWING : </span>'.$title.'</p></td>
					</tr>
						// <p><span id="currentlyselected" class="current-bold">CURRENTLY SELECTED : </span> SLOT '.$slot->slot_id.'</p>
						
						// <p class="hjk">NO WHAT’S HOT ENTRY ASSIGNED TO THIS SLOT.</p>
						';
					}else{ 
						$slo ="<p><span id='currentlyselected' class='current-bold'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>   
						
						
						";
					}
					$output .=$slo;
				}else{
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
					 
					$videoUrl=base_url().'assets/whats_hot/'.$data->file_name;
					if($data->file_type=='video'){
						$img=' 
						<video controls class="slide-img">
						  <source src="'.$videoUrl.'" type="video/mp4" >
						</video>';
						
					}else{       
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}       
					
					
			
							$AllSlot=$this->whatshot_model->FetchSlotsDataById($data->id);
								 $All_slot='';
								if(!empty($AllSlot)){
									$assign_slot='YES';
									foreach($AllSlot as $slot){
										$All_slot .='SLOT '.$slot->slot_id.'</br>';
									}
								}else{
									$assign_slot='NO';
								}
					
					$output .= '
					'.$commonpart.'


					<tr>
						<td colspan="2" class="top-fp" style="padding-top: 50px;">
						
						'.$img.'
						</td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">WHAT’S HOT CREATION INFO</h5></td>
					</tr>
					
						 
					    <body>
						
					
					  
					  <tr>
						<td>WHAT’S HOT Id</td>
						<td>'.$data->whatshot_id.'</td>
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
						<td>'.$data->last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited XMANAGE Id</td>
						<td>'.$data->last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$data->last_edited_username.'</td>
					  </tr>
					    
					
					<body>
						<tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">WHAT’S HOT INFO</b></td>
						</tr>
					 
					  <tr>
						<td>WHAT’S HOT POSTED DATE</td>
						<td class="sp_abc1">'.$data->whatshot_posted_date.'</td>
					  </tr> <tr>
						<td>WHAT’S HOT TYPE</td>
						<td class="sp_abc1">'.$data->whatshot_type.'</td>
					  </tr>
					  <tr>
						<td>WHAT’S HOT BUTTON URL</td>
						<td class="sp_abc1 running_latter">'.$data->whatshot_btnurl.'</td>
					  </tr>
					  
					  <tr>
						<td>WHAT’S HOT REMARKS</td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc">'.$data->whatshot_remarks.'</td>
					  </tr> 

					  
					  <tr>
						<td>WHAT’S HOT TITLE</td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc">'.$data->whatshot_title.'</td>
					  </tr>  <tr>
						<td>WHAT’S HOT DETAILS</td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc what-hots-details-right">'.$data->whatshot_desc.'</td>   
					  </tr>      
					  
					  <tr>
						<td>WHAT’S HOT IMAGE / VIDEO SIZE </td> 
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="sp_abc">'.$data->file_name.', '.$data->file_size.'MB</td>  
					  </tr>
					  
					 
					  <tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">WHAT’S HOT SLOT ASSIGNMENT INFO</b></td>
						</tr>
						
					 
					  
					  <tr>
						<td>WHAT’S HOT ASSIGNED</td>
						<td class="sp_abc1">'.$assign_slot.'</td>
					  </tr>
					  
					 
					  
					  <tr>
						<td>WHAT’S HOT ASSIGNED TO SLOT</td>
						<td class="sp_abc1">'.$All_slot.'</td>
					  </tr>
					  
					
					</body>
					';
				}
			}else{
				$output .= ''.$checkNull.'';
			}
			
			echo $output;
			
		}
        
  
		public function assign()
		{
			
			$data['title'] = "WHAT'S HOT"; 
			$this->load->view('whats_hot/assignslots',$data);
		} 
		
		public function assignslots()
		{
			$ids=$_POST['ids'];
			$data['ids']=$_POST['ids'];
			$data['action']=$_POST['action'];
			$where_in = explode(',', $ids);
			$data['title'] = "WHAT'S HOT"; 
			$this->load->view('whats_hot/assign',$data);
		} 
		
		
		function assignremove(){
			$ids=$_POST['ids'];
			$data['action']=$_POST['action'];
			$data['whatid']=$_POST['whatid'];
			$where_in = explode(',', $ids);
			if(!empty($_POST['action']=='REMOVE')){
				$update['whatshot_id']=NULL;
				$update['last_edited_date_time']=date('Y-m-d G:i');
				$update['last_edited_by']=$this->session->userdata('xmanage_id');
				$update['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
			}else{
				$update['whatshot_id']=$_POST['whatid'];
				$update['last_edited_date_time']=date('Y-m-d G:i');
				$update['last_edited_by']=$this->session->userdata('xmanage_id');
				$update['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];;
			}
			$this->whatshot_model->UpdateWhereInSlotData($where_in,$update);
			$data['data1'] = $this->whatshot_model->FetchDataById($_POST['whatid']);
			$data['title'] = "WHAT'S HOT";
			
			$this->load->view('whats_hot/AddSuccessful',$data);
            
		}
			
	public function searchassign()
		{
			$project='';
			$data1=''; 
			$searchData='';
			$searchDataOrderBy='';
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
			if(!empty($_POST['selectData'] == 'INFO')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'INFO');
				}
				if(!empty($_POST['selectData'] == 'PROMOTION')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'PROMOTION');
				}
				if(!empty($_POST['selectData'] == 'CONTEST')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'CONTEST');
				}
				if(!empty($_POST['selectData'] == 'LUCKY DRAW')){
					$searchData=array('xf_mst_whatshot.whatshot_type'=> 'LUCKY DRAW');
				}
				
				if(!empty($_POST['selectData'] == 'assigned')){
					$searchData=array('xf_whatshot_slots.whatshot_id IS NOT NULL'=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned')){
						$searchData=array('xf_whatshot_slots.whatshot_id IS NULL'=> NULL);
					}


				if(!empty($_POST['selectShortBy']== 'whatshot_title')){
					
					$searchDataOrderByAsc='xf_mst_whatshot.whatshot_title';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='xf_whatshot_slots.last_edited_date_time';
				}
			
				$data1=$this->whatshot_model->searchAssignProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchFileDataOrderByAsc,$project);
				
			}
			 
			else{
				$data1=$this->whatshot_model->FetchAllAssignData();
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
								 $AllSlot=$this->whatshot_model->FetchSlotsDataById($data->whats_id);
								 $All_slot='';
								if(!empty($AllSlot)){
									$assign_slot='YES';
									// foreach($AllSlot as $slot){
										// $All_slot .='SLOT '.$slot->slot_id.'</br>';
									// }
								}else{
									$assign_slot='NO';
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="view">
								<td class="deletesingle" >
								
								<input data-project="SLOT '.$data->slot_id.'" type="checkbox" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  >
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>SLOT '.$data->slot_id.'</td>
								<td>'.$data->whatshot_id.'</td>
								<td>'.$data->whatshot_title.'</td> 
								<td>'.$data->file_name.'</td>
								<td>'.$data->file_type.'</td>
								<td class="running_latter">'.$data->whatshot_btnurl.'</td>
								<td>'.$assign_slot.'</td>
								
								
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
		
  
	public function add($id=false)
	{
		
		$data['action'] = "ADD";
		if(!empty($id)){  
			
			$data['title'] = "Update POST";
			$data['data1'] = $this->whatshot_model->FetchDataById($id);
            $this->load->view('whats_hot/add',$data);
		}else{
			
			$data['data1']=$this->whatshot_model->FetchDataById($id);
			$data['title'] = "Add POST";
			$this->load->view('whats_hot/add',$data);
		}
	}
	
	function addstep1post($id=false)
	{
		if($_POST){
			if(!empty($id)){
				$filename = $_FILES['image']['name'];
				if(count($filename)>0){
					$uploadurl= './assets/whats_hot/'.$filename;
					move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
					$array['file_name']=$_FILES['image']['name'];
					$filemb=$_FILES['image']['size'] / (1024 * 1024);
					$array['file_size']=number_format($filemb,2);
					$filetype=pathinfo($filename, PATHINFO_EXTENSION);
					
					if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
						$array['file_type']=$filetype;
					}else{
						$array['file_type']='video';
					}
				}
				
				$array['whatshot_type']=$this->input->post('whatshot_type'); 
				if($this->input->post('whatshot_type')=='INFO'){
					$array['whatshot_btnurl']=NULL;
				}else{
					$array['whatshot_btnurl']=$this->input->post('whatshot_btnurl');
				}
				$array['whatshot_desc']=$this->input->post('whatshot_desc'); 
				$array['whatshot_btnurl']=$this->input->post('whatshot_btnurl'); 
				$array['whatshot_title']=$this->input->post('whatshot_title');
				$array['whatshot_remarks']=$this->input->post('whatshot_remarks');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$this->whatshot_model->UpdateData($id,$array);
				echo $id;
			}else{

				$filename = $_FILES['image']['name'];
				$uploadurl= './assets/whats_hot/'.$filename;
				move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
				$array['file_name']=$_FILES['image']['name'];
				$filemb=$_FILES['image']['size'] / (1024 * 1024);
				$array['file_size']=number_format($filemb,2);
				$filetype=pathinfo($filename, PATHINFO_EXTENSION);
				
				if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
					$array['file_type']=$filetype;
				}else{
					$array['file_type']='video';
				}
				$array['whatshot_type']=$this->input->post('whatshot_type'); 
				if($this->input->post('whatshot_type')=='INFO'){
					$array['whatshot_btnurl']=NULL;
				}else{
					$array['whatshot_btnurl']=$this->input->post('whatshot_btnurl');
				}
				$array['whatshot_desc']=$this->input->post('whatshot_desc'); 
				 
				$array['whatshot_title']=$this->input->post('whatshot_title');
				$array['whatshot_remarks']=$this->input->post('whatshot_remarks');
				$array['whatshot_posted_date']=date('Y-m-d G:i');
				$array['created_date_time']=date('Y-m-d G:i');
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['whatshot_id']='XWH'.rand(100000000000000,999999999999999);
				
				$id=$this->whatshot_model->insert($array);
				echo $id;
			}	
		}
	}
	
	
	public function AddSuccessful($id=NULL)
	{
		
		
		$data['action'] = $_POST['action'];
		$data['title'] = "Add Post Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->whatshot_model->FetchDataById($id);
		
		$this->load->view('whats_hot/AddSuccessful',$data);
		
	}
	
	
	public function edit($id=false)
	{ 
		$data['action'] = 'EDIT';
		$data['title'] = "Update POST";
		$data['data1'] = $this->whatshot_model->FetchDataById($id);
		
		$this->load->view('whats_hot/add',$data);
		
	}
	
	
	
	public function delImg()
	{
		$id=$_POST['id'];
		$array['file_name']=NULL;
		$array['file_size']=NULL;
		$array['file_type']=NULL;
		$id=$this->whatshot_model->UpdateData($id,$array);
	}
	
	
	function deleteSelected(){
            
                
				
                $ids = $_POST['ids'];
				if(empty($_POST['action'])){
					if(!empty($ids)){
						
					  $ids_arr = explode(',', $ids);
					  
					  $where_in = $ids_arr;
					  $data['title'] = "Delete Selected";
					  $data['selected'] = TRUE;
					  $data['ids'] = $ids;
					  $data1 = $this->whatshot_model->FetchDataByMultipleId($where_in);  
					}else{
					   $data['title'] = "Delete All"; 
					   $data['ids'] = '';
					   $data['selected'] = FALSE;
					   $data1=$this->whatshot_model->FetchAllData();  
					}
                }
                
				if($_POST['action']=='REMOVE'){
					$ids_arr = explode(',', $ids);
                  
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE; 
                  $data['ids'] = $ids;
                  $data1 = $this->whatshot_model->FetchSlotsDataByMultipleId($where_in);
				  $data['data'] = $data1;
					$data['action'] = $_POST['action'];
					$this->load->view('whats_hot/removeslots', $data);
				}else{
					$data['title'] = "Delete List";
					$data['data'] = $data1;
					$this->load->view('whats_hot/deleteAllposts', $data);
				}
		  
		  
            
        }
        
        
      function removeSlotsSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids; 
                  $data['selected'] = TRUE;
                  $alldata= $this->whatshot_model->FetchSlotsDataByMultipleId($where_in); 
				  $this->whatshot_model->RemoveDataByMultipleId($where_in);
                }
                
                
                 $data['data'] = $alldata;
		$data['title'] = "Post List";  
		$this->load->view('whats_hot/removeSlotsSuccess', $data);  
            
        }

		function deleteSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids; 
                  $data['selected'] = TRUE;
                  $alldata= $this->whatshot_model->FetchDataByMultipleId($where_in); 
				  
                 $this->whatshot_model->DeleteImageDataByMultipleId($where_in); 
				 $this->whatshot_model->DeleteDataByMultipleId($where_in);
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
				  
                   $alldata=$this->whatshot_model->FetchAllData();  
                   $alldata=$this->whatshot_model->DeleteAllImage();  
                    $this->whatshot_model->deleteAll();
                }
                
                
                 $data['data'] = $alldata;
		$data['title'] = "Post List";  
		$this->load->view('whats_hot/deleteAllPostSuccess', $data);  
            
        }
	
	
	 
	
    
        
       function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->whatshot_model->deleteJunkRecordPost($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      
        exit();
        }else{
        
		$fdata=[];
		$postdata=$this->whatshot_model->FetchDataById($id);
        $folddata =  $this->whatshot_model->getFilesOldUpdateData($postdata->post_id); 
		
        foreach($folddata as  $fold){
			$fdata=array('xmanage_module'=>$fold['module_name'],'xmanage_id'=>$fold['post_xmanage_id'],'file_name'=>$fold['file_name'],'type'=>$fold['file_type'],'file_size'=>$fold['file_size']);
			$this->whatshot_model->InsertFilesTableOldData($fdata);
        }
        
         
        $olddata =  $this->whatshot_model->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
           
        if(!empty($data)){
         $this->whatshot_model->updateOldData($id,$data); 
        }
		 $datau=array(
       'edit_steps'=>2
       );
        $this->whatshot_model->updateOldData($id,$datau);
        
               $datauu=array(
       'edit_steps'=>0
       );
        $this->whatshot_model->updateOldData($id,$datauu);
		
		//Get Files Data
		
        
        
        
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }
	
	
	

}

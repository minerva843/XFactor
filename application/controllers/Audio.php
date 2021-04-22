<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Audio extends CI_Controller {

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
		$this->load->model('Audio_model');
        
    }
	
	
		public function index()
		{
			if(!empty($_SESSION['DeleteData'])){
				session_unset('DeleteData');
			}
			$project=$_POST['project'];
			$data['project'] = $_POST['project'];
			$data['title'] = "audio STREAM";
			$data['project_select'] = $_POST['project'];
			$data['data1'] = $this->Audio_model->FetchAllData();
			$this->load->view('audio/show_all',$data);
		}
		
		public function search()
		{
			$project=$_POST['project'];
			$searchData='';
			if(!empty($_POST['floor_plan']) || !empty($_POST['floor_shortby']) || !empty($_POST['AllSearchData'])){
				// if(!empty($_POST['floor_plan'] == 'all_document')){
					// $searchData=array('p.oncontent_type'=>'DOCUMENT');
				// }else{
					// if(!empty($_POST['floor_plan'] == 'all_image')){
						// $searchData=array('p.oncontent_type'=>'IMAGE');
					// }
					// if(!empty($_POST['floor_plan']=='all_audio')){
						// $searchData=array('p.oncontent_type'=>'audio');
					// }
					// if(!empty($_POST['floor_plan']=='all_audio')){
						// $searchData=array('p.oncontent_type'=>'AUDIO');
					// }
				// }
				if(!empty($_POST['floor_shortby'] == 'audio_source')){
					$searchDataOrderByAsc='p.audio_stream_source'; 
				}
				if(!empty($_POST['floor_shortby'] == 'audio_name')){
					$searchDataOrderByAsc='p.audio_stream_name';
				}
				
				
				if(!empty($_POST['floor_shortby'] == 'latest_created')){
					$searchFloorOrderBy='p.created_date_time';
				}
				 
				if(!empty($_POST['floor_shortby'] == 'earliest_created')){
					$searchDataOrderByAsc='p.created_date_time';
				}
				if(!empty($_POST['floor_shortby'] == 'latest_edit')){
					$searchFloorOrderBy='p.last_edited_date_time';
				}
				
				if(!empty($_POST['floor_shortby'] == 'earliest_edit')){
					$searchDataOrderByAsc='p.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData']; 
				}
				$data1=$this->Audio_model->searchProgram($searchData,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				
			}
			
			else{
				$data1=$this->Audio_model->FetchAllData($project);
			}
				$output = '';
				if($data1 > 0)
				{
					
					foreach($data1 as $data){
						
						if(!empty($data->last_edited_date_time)){
							$last_edited_date_time=$data->last_edited_date_time.'h';
						}else{
							$last_edited_date_time="NIL";
						}
						
						$checkId='SengleView_'.$data->id;
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data->audio_stream_name.'" id="d_'.$data->id.'" name="delete_val[]" value="'.$data->id.'" class="deletClas" style="display:none;">
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data->audio_stream_id.'</td>
								
								<td>'.$data->audio_stream_source.'
								</td> 
								<td>'.$data->audio_stream_name.'</td>
								<td>'.$data->audio_stream_url.'</td> 
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " >
      <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="7" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
		}
		
		
		
		
		public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->Audio_model->FetchDataById($id); 
			$data1=$this->Audio_model->FetchAllData();
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<tr>  
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span style="color:black;" > NO AUDIO STREAM SELECTED</span></p></td>
					   </tr>  
						<p class="hjk">TO START, CLICK ON AN AUDIO STREAM ENTRY.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO AUDIO STREAM SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
				
					
					$output .= '
					 
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span id="multipleprojectselect" style="color:black;" >'.$data->audio_stream_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span> <span class="pname">'.$data->audio_stream_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>AUDIO STREAM CREATION INFO</h5></td>
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
						<td>AUDIO STREAM Id</td>
						<td>'.$data->audio_stream_id.'</td>
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
						<td>'.$data->last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$data->last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$data->last_edited_username.'</td>
					  </tr>
					
					
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">AUDIO STREAM INFO</b></td>
						</tr>
					  <tr>
						<td>AUDIO STREAM SOURCE</td>
						<td class="" >'.$data->audio_stream_source.'</td>
					  </tr>
					  
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>AUDIO STREAM NAME</td>
						<td>'.$data->audio_stream_name.'</td>
					  </tr>
					  
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>AUDIO STREAM URL</td>
						<td></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->audio_stream_url.'</td>
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
        

	public function addStep1($id=false)
	{
		
		$project=$_POST['project'];
		$data['project'] =$project;
		if(!empty($id)){
			$id= $id; 
			
			$data['title'] = "AUDIO STREAM";
			$data['data'] = $this->floor_m->FetchDataById($id);
            $this->load->view('audio/addStep',$data);
		}else{
			$data['title'] = "AUDIO STREAM";
			$this->load->view('audio/addStep',$data);
		}
	}
	
	function addstepPOSt($id=false)
	{
		 
			$array = array();
			
			if(!empty($id)){
				$array['audio_stream_name']=$this->input->post('audio_stream_name');
				$array['audio_stream_source']=$this->input->post('audio_stream_source');
				$array['audio_stream_url']=$this->input->post('audio_stream_url');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
				$result=$this->Audio_model->UpdateData($id,$array);
				if($result==true){
					echo $id;
				}
				
			}else{
				
				$array['group_id']=1;
				$array['project_id']=$_POST['project_id'];
				$array['audio_stream_name']=$this->input->post('audio_stream_name');
				$array['audio_stream_source']=$this->input->post('audio_stream_source');
				$array['audio_stream_url']=$this->input->post('audio_stream_url');
				$array['created_date_time']=date("Y-m-d G:i");
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['audio_stream_id']='XCAS'.rand(1000000000,9999999999);
				
				$lastId=$this->Audio_model->insert($array);
				if($lastId){
					echo $lastId; 
					
				}
			}
			
		//}
		
	}
	
	
	public function AddSuccessful($id=false)
	{
		$data['title'] = "audio STREAM Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->Audio_model->FetchDataById($id);
		$this->load->view('audio/AddSuccessful',$data);
		
	}
	
	public function editStep($id)
	{
		
		$data['title'] = "audio STREAM";
		$data['data'] = $this->Audio_model->FetchDataById($id);
		$this->load->view('audio/editStep',$data);
		
	}
	
	
	
	
	public function EditSuccessful($id=false)
	{ 
		$data['title'] = "audio STREAM Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->Audio_model->FetchDataById($id);
		$this->load->view('audio/EditSuccessful',$data);
	}
	
	
       
    
	function deleteSelected(){
            $project=$_POST['project'];
				$_SESSION['project']=$_POST['project'];
                $ids = $_POST['ids'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
                  $data1 = $this->Audio_model->FetchDataByMultipleId($where_in);  
                }else{
                   $data['title'] = "Delete"; 
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
                   $data1=$this->Audio_model->FetchAllData($project);  
                }
                $project=$data1[0]->project_id;
                $data['project'] = $project;
                $data['data'] = $data1;
		$data['title'] = "Delete List";  
		$this->load->view('audio/delete', $data);  
            
        }
        
        
      function deleteSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids;
                  $data['selected'] = TRUE;
                  $_SESSION['DeleteData']= $this->Audio_model->FetchDataByMultipleId($where_in); 
				  $this->Audio_model->DeleteDataByMultipleId($where_in);
                }else{ 
                   $data['title'] = "Delete";
                   $data['selected'] = FALSE;
				  
                   $_SESSION['DeleteData']=$this->Audio_model->FetchAllData($_SESSION['project']);  
                    $this->Audio_model->deleteAll($_SESSION['project']);
                }
                
                
                 $data['data'] = $_SESSION['DeleteData'];
		$data['title'] = "Delete";  
		$this->load->view('audio/deleteSuccess', $data);  
            
        }
	
        
        
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class OnDemand extends CI_Controller {

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
		$this->load->model('ondemand_model');
		$this->load->model('post_model');
        
    }
	
	
		public function index()
		{
			if(!empty($_SESSION['DeleteData'])){
				session_unset('DeleteData');
			}
			$project=$_POST['project'];
			$data['title'] = "On Demand";
			$data['project'] = $_POST['project'];
			//$data['data1'] = $this->ondemand_model->FetchAllData();
			$this->load->view('on_demand/show_all',$data);
		}
		
		public function search()
		{
			$project=$_POST['project'];
			if(!empty($_POST['floor_plan']) || !empty($_POST['floor_shortby']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['floor_plan'] == 'all_document')){
					$searchData=array('p.oncontent_type'=>'DOCUMENT');
				}else{
					if(!empty($_POST['floor_plan'] == 'all_image')){
						$searchData=array('p.oncontent_type'=>'IMAGE');
					}
					if(!empty($_POST['floor_plan']=='all_video')){
						$searchData=array('p.oncontent_type'=>'VIDEO');
					}
					if(!empty($_POST['floor_plan']=='all_audio')){
						$searchData=array('p.oncontent_type'=>'AUDIO');
					}
				}
				if(!empty($_POST['floor_shortby'] == 'oncontent_owner')){
					$searchDataOrderByAsc='u.username';
				}
				if(!empty($_POST['floor_shortby'] == 'oncontent_title')){
					$searchDataOrderByAsc='p.oncontent_title';
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
				$data1=$this->ondemand_model->searchProgram($searchData,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project);
				
			}
			
			else{
				$data1=$this->ondemand_model->FetchAllData($project);
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
						if($data->oncontent_file_size){
							$filesize=$data->oncontent_file_size.' MB';
						}else{
							$filesize='NIL';
						}
						$checkId='SengleView_'.$data->id;
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class=" ">
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data->oncontent_title.'" id="d_'.$data->id.'" name="delete_val[]" value="'.$data->id.'" class="deletClas" style="display:none;">
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data->oncontent_id.'</td>
								<td class="project_namecls" >'.$data->guest_type.', ' .$data->username.'</td>
								<td>'.$data->oncontent_title.'
								</td> 
								<td>'.$data->oncontent_type.'</td>
								<td>'.$data->oncontent_file_name.'</td>
								<td>'.$filesize.'</td>
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " >
                                <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="10" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
		}
		
		
		
		
		public function searchSingleData()
		{
			$id=$_GET['clicked_id'];
			$data=$this->ondemand_model->FetchDataById($id); 
			$data1=$this->ondemand_model->FetchAllData();
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span style="color:black;" >NO CONTENT SELECTED</span></p></td>
					   </tr>
						<p class="hjk">TO START, CLICK ON A ON DEMAND CONTENT ENTRY.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>';
					}
			$output = '';
			if($data > 0)  
			{
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
				
					
            $slider = '';
					$videoUrl=base_url().'assets/on_demand_content/'.$data->oncontent_file_name;
					if($data->oncontent_type=='IMAGE'){
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}
					
					if($data->oncontent_type=='VIDEO'){
						$img='
						<video class="slide-img" controls>
						  <source src="'.$videoUrl.'" type="video/mp4">
						</video>';
					}
					
					if($data->oncontent_type=='AUDIO'){
						$img='
						<audio class="slide-img" controls>
						  <source src="'.$videoUrl.'" type="audio/mp3">
						</audio>';
					}
					
					if($data->oncontent_type=='DOCUMENT'){
						$img='
						<a href="'.$videoUrl.'" class="demand_doc" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" ></a>';
					}
					//else{
						// $img='
						// <video class="slide-img" controls>
						  // <source src="'.$videoUrl.'" type="video/mp4">
						// </video>';
					// }
					// $slider .='
					// <input type="radio" name="slider" class="trigger" checked="checked" />
					// <div class="slide">
					  // <figure class="slide-figure">
						// <iframe src="'.$videoUrl.'" class="slide-img"></iframe>
					  // </figure>
					// </div>
					// ';
					
			
					$output .= '
					 
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span id="multipleprojectselect" style="color:black;" >'.$data->oncontent_title.'</span></p></td>
					   </tr>
						
						 
						<tr id="currentlyViewing" style="display:contents;"> 
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span> <span class="pname">'.$data->oncontent_title.'</span></p></td>
					    </tr>
						
						<tr>
						<td colspan="2" class="top-fc"> 
						<a href='.$videoUrl.'> 
						'.$img.'</a>
						</td>
					</tr> 
						<tr>
							<td colspan="2" class="top-fc"><h5>ON DEMAND CREATION INFO</h5></td>
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
						<td>ODCONTENT Id</td>
						<td>'.$data->oncontent_id.'</td>
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">ON DEMAND CONTENT INFO</b></td>
						</tr>
					  <tr>
						<td>ODCONTENT OWNER</td>
						<td class="" >'.$data->guest_type.', '.$data->username.'</td>
					  </tr>
					  <tr> 
						<td>ODCONTENT TITLE</td>
						<td>'.$data->oncontent_title.'</td>
					  </tr>
					  <tr>
						<td>ODCONTENT TYPE</td>
						<td>'.$data->oncontent_type.'</td>
					  </tr>
					  <tr>
						<td>ODCONTENT FILE NAME</td>
						<td>'.$data->oncontent_file_name.'</td>
					  </tr>
					  
					  <tr>
						<td>ODCONTENT FILE SIZE</td>
						<td>'.$data->oncontent_file_size.' MB</td>
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
		
		$project_id=$_POST['project'];
		if(!empty($id)){
			$id= $id; 
			$data['title'] = "On Demand";
			$data['data1'] = $this->ondemand_model->FetchDataById($id);
			$data['data']=$this->post_model->GuestUsers($data['data1']->project_id); 
			
            $this->load->view('on_demand/addStep',$data);
		}else{
			$data['data']=$this->post_model->GuestUsers($project_id);
			$data['title'] = "On Demand";
			$data['project'] =$project_id;
			$this->load->view('on_demand/addStep',$data);
		}
	}
	
	function addstepPOSt($id=false)
	{
		 
			$array = array();
			if($_FILES){
				$filename = $_FILES['image']['name'];
				$uploadurl= './assets/on_demand_content/'.$filename;
				move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
				$array['oncontent_file_name']=$_FILES['image']['name'];
				$filemb=$_FILES['image']['size'] / (1024 * 1024);
				$array['oncontent_file_size']=number_format($filemb,2);
				$filetype=pathinfo($filename, PATHINFO_EXTENSION);
				$array['oncontent_file_type'] = $filetype;
				if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
					$array['oncontent_type']='IMAGE';
				}
				if($filetype=='MP4' || $filetype=='mp4'){
					$array['oncontent_type']='VIDEO';
				}
				if($filetype=='MP3' || $filetype=='mp3'){
					$array['oncontent_type']='AUDIO';
				}
				if($filetype=='PDF' || $filetype=='pdf'){
					$array['oncontent_type']='DOCUMENT';
				}
				
			}
			if(!empty($id)){
				$array['oncontent_owner']=$this->input->post('oncontent_owner');
				$array['oncontent_title']=$this->input->post('oncontent_title');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
				$result=$this->ondemand_model->UpdateData($id,$array);
				if($result==true){
					echo $id;
				}
				
			}else{
				
				$array['group_id']=1;
				$array['project_id']=$_POST['project_id'];
				$array['oncontent_owner']=$this->input->post('oncontent_owner');
				$array['oncontent_title']=$this->input->post('oncontent_title');
				$array['created_date_time']=date("Y-m-d G:i");
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date("Y-m-d G:i");
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['oncontent_id']='XCOD'.rand(1000000000,9999999999);
				
				$lastId=$this->ondemand_model->insert($array);
				if($lastId){
					echo $lastId; 
					
				}
			}
			
		//}
		
	}
	
	
	public function AddSuccessful($id=false)
	{
		$data['title'] = "On Demand Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->ondemand_model->FetchDataById($id);
		$this->load->view('on_demand/AddSuccessful',$data);
		
	}
	
	public function editStep($id)
	{
		
		$data['title'] = "On Demand";
		$data2=$this->ondemand_model->FetchDataById($id);
		$data['data']=$this->post_model->GuestUsers($data2->project_id); 
		$data['data1'] = $this->ondemand_model->FetchDataById($id);
		$this->load->view('on_demand/editStep',$data);
		
	} 
	
	
	
	
	public function EditSuccessful($id=false)
	{ 
		$data['title'] = "On Demand Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->ondemand_model->FetchDataById($id);
		$this->load->view('on_demand/EditSuccessful',$data);
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
                  $data1 = $this->ondemand_model->FetchDataByMultipleId($where_in);  
                }else{
                   $data['title'] = "Delete"; 
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
                   $data1=$this->ondemand_model->FetchAllData($project);  
                }
                $project=$data1[0]->project_id;
                $data['project'] = $project;
                $data['data'] = $data1;
		$data['title'] = "Delete List";  
		$this->load->view('on_demand/delete', $data);  
            
        }
        
        
      function deleteSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids;
                  $data['selected'] = TRUE;
                  $_SESSION['DeleteData']= $this->ondemand_model->FetchDataByMultipleId($where_in); 
				  $this->ondemand_model->DeleteImageDataByMultipleId($where_in);
				  $this->ondemand_model->DeleteDataByMultipleId($where_in);
                }else{
                   $data['title'] = "Delete";
                   $data['selected'] = FALSE;
				  
                   $_SESSION['DeleteData']=$this->ondemand_model->FetchAllData($_SESSION['project']);  
                    $this->ondemand_model->DeleteAllImage($_SESSION['project']);
                    $this->ondemand_model->deleteAll($_SESSION['project']);
                }
                
                
                 $data['data'] = $_SESSION['DeleteData'];
		$data['title'] = "Delete";  
		$this->load->view('on_demand/deleteSuccess', $data);  
            
        }
	
        
        
	
	
}

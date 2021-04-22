<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);

class Post extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
	$this->load->library('form_validation');
        $this->load->model('floor_model', 'floor_m');
        $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('program_model','program_m');
		$this->load->model('post_model');
		$this->load->model('project_model');
		$this->load->model('Icon_model');
		$this->load->model('Zone_model');
		$this->load->library('email');
		$this->load->library('session');
        
    }
	
	
		public function index()
		{
			$project=$_POST['project'];
			unset($_SESSION['DeleteData']);
			$data['project'] = $project; 
			$data['title'] = "ALL POST"; 
			$data['data1'] = $this->post_model->FetchAllData();
			$where_in_icons = array();
			$icons_pos = $this->Icon_model->getPositionPostNotAssign($_POST['project']);
			foreach($icons_pos as $icon){
			
			if(empty($icon['mapid'])){
			$where_in_icons[] = $icon['id'];
			}

			}
			if(!empty($where_in_icons)){
			$this->Icon_model->clearPositionPostNotAssign($where_in_icons);
			}
			
			
			$this->load->view('post/allPost',$data);
		} 
		
	public function search()
		{
			$project=$_POST['project'];
			$data1=''; 
			$searchData='';
			$searchDataOrderBy='';
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				if(!empty($_POST['selectData'] == 'assigned')){
					$searchData=array('xf_mst_content_post_mapping.post_id IS NOT NULL'=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned')){
						$searchData=array('xf_mst_content_post_mapping.post_id IS NULL'=> NULL);
					}

				if(!empty($_POST['selectShortBy']== 'post_title')){
					//$searchDataOrderBy=array('p.project_name'=>'ASC');
					$searchDataOrderByAsc='p.post_title';
				}
				if(!empty($_POST['selectShortBy']== 'post_owner')){
					$searchDataOrderByAsc='u.username';
				}
				
				if(!empty($_POST['selectShortBy']== 'post_content_set')){
					$searchFileDataOrderByAsc='f.post_content_set';
				}
				
				
				
				
				if(!empty($_POST['selectShortBy']== 'latest_created')){
					$searchDataOrderBy='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'earliest_created')){
					$searchDataOrderByAsc='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'latest_edit')){
					$searchDataOrderBy='p.last_edited_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='p.last_edited_date_time';
				}
			
				$data1=$this->post_model->searchProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchFileDataOrderByAsc,$project);
				
			}
			 
			else{
				$data1=$this->post_model->FetchAllData($project);
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
								
								$imagefiles=$this->post_model->FetchImageFilesDataById($data->post_id);
								if($imagefiles>0){
									$imagefiles=$imagefiles;
								}else{
									$imagefiles=0;
								}
								$videofiles=$this->post_model->FetchVideoFilesDataById($data->post_id);
								if($videofiles>0){
									$videofiles=$videofiles;
								}else{
									$videofiles=0;
								}
								$infoicon=$this->post_model->FetchInfoIconCountDataById($data->id);
								if($infoicon>0){
									$infoicon=$infoicon;
								}else{
									$infoicon='NIL';
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="">
								<td class="deletesingle" >
								
								<input data-project="'.$data->post_title.'" type="checkbox" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  >
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>'.$data->post_id.'</td>
								<td>'.$data->guest_type.', '.$data->username.'</td> 
								<td>'.$data->post_title.'</td>
								
								<td>'.$videofiles.'</td> 
								<td>'.$imagefiles.'</td> 
								<td>'.$infoicon.'</td>
								
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
			$data=$this->post_model->FetchDataById($id); 
			
			$output = '';
			$data1=$this->post_model->FetchAllData();
					$checkNull='';
					if(empty($data1)){
						$checkNull .='<p><span id="currentlyselected" class="current-bold">CURRENTLY SELECTED : </span> NO POST SELECTED</p>
						
						<p class="hjk">TO START, CLICK ON A POST ENTRY.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO POST SELECTED</p>';
					}
			if($data > 0)
			{
				$floor_id='';
				$zon_id='';
				$info_icon_id='';
				$ids=$this->post_model->FetchIdsByPostId($data->id);
				
				if(!empty($ids)){
					foreach($ids as $myid){
						$floor_id .=$myid->flor_plan_id.'</br>';
						$zon_id .=$myid->zon_id.'</br>';
						$info_icon_id .=$myid->info_icon_id.'</br>';
					}
				}
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					$videos=$this->post_model->FetchFilesDataById($data->post_id);
					  $vidstring = '';
            $slider = '';
            $videoTab = '';
			$imagefiles=$this->post_model->FetchImageFilesDataById($data->post_id);
				if($imagefiles>0){
					$imagefiles=$imagefiles;
				}else{
					$imagefiles=0;
				}
				$videofiles=$this->post_model->FetchVideoFilesDataById($data->post_id);
				if($videofiles>0){
					$videofiles=$videofiles;
				}else{
					$videofiles=0;
				}
				
				$totalfiles=$videofiles+$imagefiles;
				
			foreach($videos as $video){
				$sliderId='slider_'.$video->id;
				if(!empty($sliderId=='slider_'.$videos[0]->id)){
					$class='active';
					$checked='checked';
				
				}else{ 
					$class='';
					$checked='';
				}
             		$vidstring .= '
					'.$video->file_name.', '.$video->file_size.' MB <br/>';  
					$videoUrl=base_url().'assets/post/'.$video->file_name;
					if($video->type=='image'){
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}else{       
						$img=' 
						<video controls class="slide-img" id="slide-img'.$sliderId.'">
						  <source src="'.$videoUrl.'" type="video/mp4" >
						</video>';
					}       
					$slider .='
					<input type="radio" name="slider" class="trigger adcl1 adcl1'.$sliderId.'" id="'.$sliderId.'" '.$checked.' />
					<div class="slide">
					  <figure class="slide-figure">
						'.$img.'
					  </figure> 
					</div>
					';
					$videoTab .='
					<li class="slider-nav__item adcl1 adcl1'.$sliderId.' '.$class.'"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="'.$sliderId.'">0</label></li>
					<script>
						$(".adcl1'.$sliderId.'").click(function(){
							$("#slide-img'.$sliderId.'").trigger("pause");
							$(".adcl1").removeClass("active");
							$(".adcl1'.$sliderId.'").addClass("active");
							
						})
					</script>
					';  
			}
			$AssignData=$this->post_model->FetchAssignDataById($data->id);
								$assignmentInfo='';
								foreach($AssignData as $val){
									$infoIcon .=$val->info_icon_id.'<br>';
									$assignmentInfo .=$val->project_name.' INFO ICON'.$val->info_icon_number.'</br>';
								}
					$countImg=$this->post_model->FetchImageFilesDataById($data->post_id);
					$countVideo= $this->post_model->FetchVideoFilesDataById($data->post_id);
					if($data->post_availability =='AVAILABLE' || $data->post_availability=='ENDED'){
						$post_status=$data->post_availability;
					}
					$output .= '
					<tr>
						<td colspan="2" class="top-fp" style="padding-top: 0px;"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->post_title.'</span></p></td>
					</tr> <tr id="currentlyViewing" style="display:none;">
						<td  colspan="2" class=""><p><span class="current-bold">CURRENTLY VIEWING : </span>'.$data->post_title.'</p></td>
					</tr>


					<tr>   
						<td colspan="2" class="top-fp" style="padding-top: 40px;">
						
						<div class="contant-slider">
					  
				  <div class="slider-wrapper">
				  <div class="slider">
					'.$slider.'
					
								
			  </div>
			  <ul class="slider-nav">
			  					'.$videoTab.'
			  					
			  			  </ul>
			</div>
					 </div>
						</td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">POST CREATION INFO</h5></td>
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
						<td>FLOOR PLAN Id</td>
						<td>'.$floor_id.'</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>ZONE Id</td>
						<td>'.$zon_id.'</td>
					  </tr>
					
					  <tr>
						<td>POST Id</td> 
						<td>'.$data->post_id.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
						<tr>
						<td>INFO ICON Id</td>
						<td>'.$info_icon_id.'</td>
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
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">POST INFO</b></td>
						</tr>
					 
					  <tr>
						<td>POST STATUS</td>
						<td class="sp_abc1">'.$data->post_availability.'</td>
					  </tr> <tr>
						<td>POST TYPE</td>
						<td class="sp_abc1">'.$data->post_type.'</td>
					  </tr>
					  <tr>
						<td>POST OWNER</td>
						<td class="sp_abc1">'.$data->guest_type.', '.$data->username.'</td>
					  </tr>
					  <tr>
						<td>POST TITLE</td>
						<td class="sp_abc1">'.$data->post_title.'</td>
					  </tr>
					  <tr>
						<td>POST DETAILS</td>
						<td class="sp_abc1 running_latter"></td>  
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->post_details.'</td>
					  </tr>      
					  
					  <tr>
						<td>POST IMAGE / VIDEO FILE & SIZE </td>    
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="sp_abc">'.$vidstring.'</td>  
					  </tr>
					  
					  <tr>
						<td>POST ASSIGNMENT</td>
						<td class="sp_abc1">'.$assignmentInfo.'</td>
					  </tr>
					  <tr>
						<td>IMAGE FILE COUNT </td>
						<td class="sp_abc1">'.$imagefiles.'</td>
					  </tr>
					  <tr>
						<td>VIDEO FILE COUNT </td>
						<td class="sp_abc1">'.$videofiles.'</td>
					  </tr>
					  <tr>
						<td>TOTAL FILE COUNT </td>
						<td class="sp_abc1">'.$totalfiles.'</td>
					  </tr>
					  <tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">POST EXTERNAL LINK INFO</b></td>
						</tr>
						
					  <tr>
						<td>WEBSITE </td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					   <tr>
						<td colspan="2" class="sp_abc1 res_clas sp_abc running_latter">'.$data->website.'</td>
					  </tr>
					  
					  <tr>
						<td>SHOPPING CART ITEM ID</td>
						<td class="sp_abc1">'.$data->venue_name.'</td>
					  </tr>
					  
					  <tr>
						<td>BUTTON URL</td>
						<td class="sp_abc1"></td>
					  </tr>
					             
					  <tr>
						<td colspan="2" class="sp_abc1 res_clas sp_abc running_latter">'.$data->btn_url.'</td>
					  </tr>
					       
					  
					  <tr>
						<td>PRICE</td>
						<td class="sp_abc1">'.$data->price.'</td>
					  </tr>
					  <!-- tr>
						<td>STATUS</td>
						<td class="sp_abc1">'.$data->venue_name.'</td>
					  </tr -->
					
					
					</body>
					';
			}else{
				$output .= ''.$checkNull.'';
			}
			
			echo $output;
			
		}
        
   function icons() { 
        $data['post_type'] = "POST";
        $data['title'] = "Grid and Floor";
        $data['project_select'] = $_POST['project'];
        $data['icons'] = $this->Icon_model->getAllIcons($_POST['project']);
        
        $data['zones'] = $this->Zone_model->getZoneAssignedByProject($data['project_select']);
        $this->load->view('icon/icon_assign',$data);
    }
	public function addpost($id=false)
	{
		
		$project_id=$_POST['project'];
		if(!empty($id)){ 
			$data['project_id'] = $project_id;
			$data['title'] = "Update POST";
			
			$data['data1'] = $this->post_model->FetchDataById($id);
			$data['data']=$this->post_model->GuestUsers($data['data1']->project_id);
			$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
            $this->load->view('post/addpost',$data);
		}else{
			
			$data['data']=$this->post_model->GuestUsers($project_id); 
			$data['title'] = "Add POST";
			$data['project_id'] = $project_id;
			$this->load->view('post/addpost',$data);
		}
	}
	
	function addstep1post($id=false)
	{
		//die;
		if($_POST){
			$img_id1=$_POST['img_id1'];
			$img_id2=$_POST['img_id2'];
			$img_id3=$_POST['img_id3'];
			$img_id4=$_POST['img_id4'];
			$img_id5=$_POST['img_id5'];
			
			if(!empty($id)){
				
				
				$array['edit_steps']=1; 
				$array['post_availability']=$this->input->post('post_availability'); 
				$array['post_type']=$this->input->post('post_type'); 
				$array['post_owner']=$this->input->post('post_owner'); 
				$array['post_title']=strtoupper($this->input->post('post_title'));
				$array['post_details']=$this->input->post('post_details');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				
			}else{
				
				$array['project_id']=$this->input->post('project_id');
				$array['steps']=1;
				
				$data=$this->project_model->FetchDataById($array['project_id']);
				$array['group_id']=$data->group_id;
				$array['post_availability']=$this->input->post('post_availability');
				$array['post_type']=$this->input->post('post_type');
				$array['post_owner']=$this->input->post('post_owner');
				$array['post_title']=strtoupper($this->input->post('post_title'));
				$array['post_details']=$this->input->post('post_details');
				$array['created_date_time']=date('Y-m-d G:i');
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edited_date_time']=date('Y-m-d G:i');
				$array['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edited_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edited_username']=$this->session->userdata('username');
				$array['post_id']='XCPOST'.rand(1000000000,9999999999);
			}
			if(!empty($id)){
				$id=$this->post_model->UpdateData($id,$array);
				$data1= $this->post_model->FetchDataById($id);
				//$files = $this->program_m->FetchFilesDataById($data1->program_id);
				//$countfiles = count($_FILES['files']['name']); 
				$result['xmanage_module'] = 'POST';
				$imagefiles = count($_FILES['image']['name']); 
				if(!empty($imagefiles)){
						$filename = $_FILES['image']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image']['name'];
						$filemb=$_FILES['image']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $data1->post_id;
						$this->post_model->addFiles($result);
						if(!empty($imagefiles) && !empty($img_id1)){
							$this->post_model->DelFileById($img_id1);
						}
				}
				$imagefiles2 = count($_FILES['image2']['name']); 
				if(!empty($imagefiles2)){
						$filename = $_FILES['image2']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image2']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image2']['name'];
						$filemb=$_FILES['image2']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $data1->post_id;
						$this->post_model->addFiles($result);
						if(!empty($imagefiles2) && !empty($img_id2)){
						$this->post_model->DelFileById($img_id2);
						}
				}
				$imagefiles3 = count($_FILES['image3']['name']); 
				if(!empty($imagefiles3)){
						$filename = $_FILES['image3']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image3']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image3']['name'];
						$filemb=$_FILES['image3']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image'; 
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $data1->post_id;
						$this->post_model->addFiles($result);
						if(!empty($imagefiles3) && !empty($img_id3)){
						$this->post_model->DelFileById($img_id3);
						}
				}
				$imagefiles4 = count($_FILES['image4']['name']); 
				if(!empty($imagefiles4)){
						$filename = $_FILES['image4']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image4']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image4']['name'];
						$filemb=$_FILES['image4']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $data1->post_id;
						$this->post_model->addFiles($result);
						if(!empty($imagefiles4) && !empty($img_id4)){
						$this->post_model->DelFileById($img_id4);
						}
				}
				$imagefiles5 = count($_FILES['image5']['name']); 
				if(!empty($imagefiles5)){ 
						$filename = $_FILES['image5']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image5']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image5']['name'];
						$filemb=$_FILES['image5']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $data1->post_id;
						$this->post_model->addFiles($result);
						if(!empty($imagefiles5) && !empty($img_id5)){
						$this->post_model->DelFileById($img_id5);
						}
					
				}
					echo $id;
				
			}else{
			$lastId=$this->post_model->insert($array);
			if($lastId){
					//$countfiles = count($_FILES['files']['name']); 
					$result['xmanage_module'] = 'POST';
				$imagefiles = count($_FILES['image']['name']); 
				if(!empty($imagefiles)){
						$filename = $_FILES['image']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image']['name'];
						$filemb=$_FILES['image']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $array['post_id'];
						$this->post_model->addFiles($result);
					
				}
				$imagefiles2 = count($_FILES['image2']['name']); 
				if(!empty($imagefiles2)){
						$filename = $_FILES['image2']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image2']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image2']['name'];
						$filemb=$_FILES['image2']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] =$array['post_id'];
						$this->post_model->addFiles($result);
					
				}
				$imagefiles3 = count($_FILES['image3']['name']); 
				if(!empty($imagefiles3)){
						$filename = $_FILES['image3']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image3']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image3']['name'];
						$filemb=$_FILES['image3']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $array['post_id'];
						$this->post_model->addFiles($result);
					
				}
				$imagefiles4 = count($_FILES['image4']['name']); 
				if(!empty($imagefiles4)){
						$filename = $_FILES['image4']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image4']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image4']['name'];
						$filemb=$_FILES['image4']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $array['post_id'];
						$this->post_model->addFiles($result);
					
				}
				$imagefiles5 = count($_FILES['image5']['name']); 
				if(!empty($imagefiles5)){
						$filename = $_FILES['image5']['name'];
						$uploadurl= './assets/post/'.$filename;
						move_uploaded_file($_FILES['image5']['tmp_name'],$uploadurl);
						$result['file_name']=$_FILES['image5']['name'];
						$filemb=$_FILES['image5']['size'] / (1024 * 1024);
						$result['file_size']=number_format($filemb,2);
						$filetype=pathinfo($filename, PATHINFO_EXTENSION);
						$result['file_type'] = $filetype;
						if($filetype=='JPEG' || $filetype=='jpeg' || $filetype=='PNG' || $filetype=='png' || $filetype=='JPG' || $filetype=='jpg'){
							$result['type']='image';
						}else{
							$result['type']='video';
						}
						$result['xmanage_id'] = $array['post_id'];
						$this->post_model->addFiles($result);
					
				}
					echo $lastId;
				}
				
			}
		}
		
	}
	
	public function addstep2($id=false)
	{
		if(!empty($id)){ 
			
			$data['title'] = "Add Post";
			$data['data1'] = $this->post_model->FetchDataById($id);
			$data['data']=$this->post_model->GuestUsers($data['data1']->project_id);
			$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
            $this->load->view('post/addstep2',$data);
		}
	}
	
	function addstep2post($id=false)
	{
		if($_POST){
			if(!empty($id)){
				$data=$this->post_model->FetchDataById($id);
				if($data->post_type=='INFO'){
					$array['btn_url']='NOT APPLICABLE';
				}else{
					$array['btn_url']=$this->input->post('btn_url');
				}
				$array['website']=$this->input->post('website'); 
				$array['price']=$this->input->post('price'); 
			}
			if(!empty($id)){
				$id=$this->post_model->UpdateData($id,$array);
					echo $id;
			}
		}
		
	}
	
	
	public function viewAddPostsSuccessful($id)
	{
		$array['steps']=2;
		$this->post_model->UpdateData($id,$array);
		$data['title'] = "Add Post Successfull";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->post_model->FetchDataById($id);
		$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
		$data['image'] = $this->post_model->FetchImageFilesDataById($data['data1']->post_id);
		$data['video'] = $this->post_model->FetchVideoFilesDataById($data['data1']->post_id);
		$this->load->view('post/viewAddPostsSuccessful',$data);
		
	}
	public function editstep1($id=false) 
	{
		$project_id=$_POST['project'];
		$data['title'] = "Update POST";
		$data['data1'] = $this->post_model->FetchDataById($id);
		$data['data']=$this->post_model->GuestUsers($data['data1']->project_id);
		$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
		$data['image'] = $this->post_model->FetchImageFilesDataById($data['data1']->post_id);
		$data['video'] = $this->post_model->FetchVideoFilesDataById($data['data1']->post_id);
		$this->load->view('post/editstep1',$data);
		
	}
	
	public function editstep2($id=false)
	{ 
		$data['title'] = "Update POST";
		$data['data1'] = $this->post_model->FetchDataById($id);
		$data['data']=$this->post_model->GuestUsers($data['data1']->project_id);
		$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
		$this->load->view('post/editstep2',$data);
		
	}
	
	
	public function delImg()
	{
		$id=$_POST['id'];
		$post_id=$_POST['post_id'];
		$id=$this->post_model->DelFileById($id);
		if($id){
			$files=$this->post_model->FetchFilesDataById($post_id);
			$count=count($files[0]->id);
			if($count>0){
				$finalcount=1;
			}else{
				$finalcount='';
			}
			echo $finalcount;
		}
	}
	
	public function vieweditpostsuccessful($id)
	{
		$data['title'] = "Update POST";
		$data['success_msg'] = "SUCCESSFUL";
		$data['data1'] = $this->post_model->FetchDataById($id);
		$data['files'] = $this->post_model->FetchFilesDataById($data['data1']->post_id);
		$data['image'] = $this->post_model->FetchImageFilesDataById($data['data1']->post_id);
		$data['video'] = $this->post_model->FetchVideoFilesDataById($data['data1']->post_id);
		
		$datau=array(
                 'edit_steps'=>2
                 
                );
               $this->post_model->updateOldData($id,$datau);
               // $datauu=array(
               // 'edit_steps'=>0
               // );
               // $this->post_model->updateOldData($id,$datauu);
		$this->load->view('post/vieweditPostSuccessful',$data);
		
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
                  $data1 = $this->post_model->FetchDataByMultipleId($where_in);  
                }else{
                   $data['title'] = "Delete All"; 
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
                   $data1=$this->post_model->FetchAllData($project);  
                }
                
                $data['data'] = $data1;
		$data['title'] = "Delete List";  
		$this->load->view('post/deleteAllposts', $data);  
            
        }
        
        
      function deleteSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids; 
                  $data['selected'] = TRUE;
                  $_SESSION['DeleteData']= $this->post_model->FetchDataByMultipleId($where_in); 
				  $this->post_model->DeleteImageDataByMultipleId($where_in);
				  $this->post_model->DeleteDataByMultipleId($where_in);
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
				  
                   $_SESSION['DeleteData']=$this->post_model->FetchAllData($_SESSION['project']);  
                    $this->post_model->DeleteAllDataByMultipleId($_SESSION['project']);
                    $this->post_model->deleteAll($_SESSION['project']);
                }
                
                
                 $data['data'] = $_SESSION['DeleteData'];
		$data['title'] = "Post List";  
		$this->load->view('post/deleteAllPostSuccess', $data);  
            
        }
	
	
	public function postassignment()
		{
			$project=$_POST['project'];
			$data['project'] = $project; 
			$data['title'] = "ALL POST"; 
			$data['data1'] = $this->post_model->FetchAllData($project);
			$this->load->view('post/all_assignment',$data);
		} 
		
	public function searchassignment()
		{
			$project=$_POST['project'];
			$data1='';
			$searchData='';
			$searchDataOrderBy='';
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				if(!empty($_POST['selectData'] == 'assigned')){
					$searchData=array('xf_mst_content_post_mapping.post_id IS NOT NULL'=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned')){
						$searchData=array('xf_mst_content_post_mapping.post_id IS NULL'=> NULL);
					}
				 
				
				if(!empty($_POST['selectShortBy']== 'post_title')){
					//$searchDataOrderBy=array('p.project_name'=>'ASC');
					$searchDataOrderByAsc='p.post_title';
				}
				if(!empty($_POST['selectShortBy']== 'post_owner')){
					$searchDataOrderByAsc='u.username';
				}
				
				if(!empty($_POST['selectShortBy']== 'post_content_set')){
					$searchFileDataOrderByAsc='f.post_content_set';
				} 

				if(!empty($_POST['selectShortBy']== 'latest_created')){
					$searchDataOrderBy='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'earliest_created')){
					$searchDataOrderByAsc='p.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'latest_edit')){
					$searchDataOrderBy='p.last_edited_date_time'; 
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='p.last_edited_date_time';
				}
			
				$data1=$this->post_model->searchProgram($searchData,$searchDataOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchFileDataOrderByAsc,$project);
				
			}
			 
			else{
				$data1=$this->post_model->FetchAllData($project); 
			}
			
				$output = '';
				if($data1 > 0) 
				{
					
					foreach($data1 as $data){
								if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
								
								$AssignData=$this->post_model->FetchAssignDataById($data->id);
								$infoIcon='';
								$assignInfo='';
								$assignmentInfo='';
								foreach($AssignData as $val){
									$infoIcon .=$val->info_icon_id.'<br>';
									$assignInfo .=$val->project_name.' '.$val->zone_name.' INFO ICON'.$val->info_icon_number.'</br>';
								}
								
								$files=$this->post_model->FetchFilesDataById($data->post_id);
								$filedata='';
								foreach($files as $file){
									$filedata .=$file->file_name.',<br>'; 
								}
							 $output .= '<tr id='.$data->id.' onclick="reply_click(this.id)" class="">
								<td class="deletesingle" >
								
								<input data-project="'.$data->post_title.'" type="checkbox" id="d_'.$data->id.'" name="delete_val" value="'.$data->id.'" class="deletClas"  >
								<label for="d_'.$data->id.'"  class="deletClass hide"></label>
								</td>
								<td class="loweditbt">'.$last_edited_date_time.'</td>
								<td>'.$data->post_id.'</td>
								<td>'.$data->post_title.'</td>
								<td>'.$filedata.'</td>  
								<td>'.$infoIcon.'</td>
								<td>'.$assignInfo.'</td>
								
								<td class="chk2"><input type="checkbox" id="c_'.$data->id.'" name="rigtcheck" class="rightcheck'.$data->id.' " > 
      <label style="display:none;" for="c_'.$data->id.'" class="rightcheck rightcheck'.$data->id.'"></label>
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
		
		public function searchassignmentData()
		{ 
			$id=$_GET['clicked_id'];
			$data=$this->post_model->FetchDataById($id); 
			
			$output = '';
			$data1=$this->post_model->FetchAllData();
					$checkNull='';
					if(empty($data1)){
						$checkNull .='<p><span id="currentlyselected" class="current-bold">CURRENTLY SELECTED : </span> NO POST SELECTED</p>
						
						<p class="hjk">TO START, CLICK ON A POST ENTRY.</p>      
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO POST SELECTED</p>';
					}
			if($data > 0)
			{
				$floor_id='';
				$zon_id='';
				$info_icon_id='';
				$ids=$this->post_model->FetchIdsByPostId($data->id);
				if(!empty($ids)){
					foreach($ids as $myid){
						$floor_id .=$myid->flor_plan_id.'</br>';
						$zon_id .=$myid->zon_id.'</br>';
						$info_icon_id .=$myid->info_icon_id.'</br>';
					}
				}
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				$videos=$this->post_model->FetchFilesDataById($data->post_id);
					  $vidstring = '';
            $slider = '';
            $videoTab = '';
			foreach($videos as $video){
				$sliderId='slider_'.$video->id;
				if(!empty($sliderId=='slider_'.$videos[0]->id)){
					$class='active';
					$checked='checked';
				
				}else{ 
					$class='';
					$checked='';
				}
             		$vidstring .= '
					'.$video->file_name.', '.$video->file_size.' MB <br/>';  
					$videoUrl=base_url().'assets/floor_plan/'.$video->file_name;
					if($video->type=='image'){
						$img='<img class="slide-img" src="'.$videoUrl.'">
						';
					}else{       
						$img=' 
						<video controls class="slide-img" id="slide-img'.$sliderId.'">
						  <source src="'.$videoUrl.'" type="video/mp4" >
						</video>';
					}       
					$slider .='
					<input type="radio" name="slider" class="trigger adcl1 adcl1'.$sliderId.'" id="'.$sliderId.'" '.$checked.' />
					<div class="slide">
					  <figure class="slide-figure">
						'.$img.'
					  </figure> 
					</div>
					';
					$videoTab .='
					<li class="slider-nav__item adcl1 adcl1'.$sliderId.' '.$class.'"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="'.$sliderId.'">0</label></li>
					<script>
						$(".adcl1'.$sliderId.'").click(function(){
							$("#slide-img'.$sliderId.'").trigger("pause");
							$(".adcl1").removeClass("active");
							$(".adcl1'.$sliderId.'").addClass("active");
							
						})
					</script>
					';  
			}
			$AssignData=$this->post_model->FetchAssignDataById($data->id);
								$assignmentInfo='';
								foreach($AssignData as $val){
									$infoIcon .=$val->info_icon_id.'<br>';
									$assignmentInfo .=$val->project_name.' INFO ICON'.$val->info_icon_number.'</br>';
								}
					$countImg=$this->post_model->FetchImageFilesDataById($data->post_id);
					$countVideo= $this->post_model->FetchVideoFilesDataById($data->post_id);
				
					if($data->post_availability =='AVAILABLE' || $data->post_availability=='ENDED'){
						$post_status=$data->post_availability;
					}
					$output .= '
					<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleprojectselect" style="color:black;" >'.$data->post_title.'</span></p></td>
					</tr>
                                        
                                        <tr id="currentlyViewing" style="">
						<td  colspan="2" class=""><p><span class="current-bold">CURRENTLY VIEWING : </span>'.$data->post_title.'</p></td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc">
						
						<div class="contant-slider">
					  
				  <div class="slider-wrapper">
				  <div class="slider">
					'.$slider.'
					
								
			  </div>
			  <ul class="slider-nav">
			  					'.$videoTab.'
			  					
			  			  </ul>
			</div>
					 </div>
						</td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">POST CREATION INFO</h5></td>
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
						<td>FLOOR PLAN Id</td>
						<td>'.$floor_id.'</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>ZONE Id</td>
						<td>'.$zon_id.'</td>
					  </tr>
					  
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>POST Id</td> 
						<td>'.$data->post_id.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
						<tr>
						<td>INFO ICON Id</td>
						<td>'.$info_icon_id.'</td>
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
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">POST INFO</b></td>
						</tr>
					 
					  <tr>
						<td>POST STATUS</td>
						<td class="sp_abc1">'.$data->post_availability.'</td>
					  </tr>
					  <tr>
						<td>POST TYPE</td>
						<td class="sp_abc1">'.$data->post_type.'</td>
					  </tr>
					  <tr>
						<td>POST OWNER</td>
						<td class="sp_abc1">'.$data->guest_type.', '.$data->username.'</td>
					  </tr>
					  <tr>
						<td>POST TITLE</td>
						<td class="sp_abc1">'.$data->post_title.'</td>
					  </tr>
					  <tr>
						<td>POST DETAILS</td>
						<td class="sp_abc1 running_latter"></td>    
					  </tr>    
					  
					  <tr>						
						<td colspan="2" class="res_clas sp_abc running_latter">'.$data->post_details.'</td>
					  </tr>
					  
					  <tr>
						<td>POST IMAGE / VIDEO FILE & SIZE </td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					   <tr>
						<td colspan="2" class="sp_abc">'.$vidstring.'</td>  
					  </tr>   
					  
					  
					  <tr>
						<td>POST ASSIGNMENT</td>
						<td class="sp_abc1">'.$assignmentInfo.'</td>
					  </tr>
					  <tr>
						<td>IMAGE FILE COUNT </td>
						<td class="sp_abc1">'.count($countImg).'</td>
					  </tr>
					  <tr>
						<td>VIDEO FILE COUNT </td>
						<td class="sp_abc1">'.count($countVideo).'</td>
					  </tr>
					  <tr>
						<td>TOTAL FILE COUNT </td>
						<td class="sp_abc1">'.count($videos).'</td>
					  </tr>
					  <tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">POST EXTERNAL LINK INFO</b></td>
						</tr>
					  <tr>
						<td>WEBSITE</td>
						<td class="sp_abc1"></td>
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="sp_abc1 res_clas sp_abc running_latter">'.$data->website.'</td>     
					  </tr> 
					  
					  <tr>
						<td>SHOPPING CART ITEM ID</td>
						<td class="sp_abc1">'.$data->venue_name.'</td>
					  </tr>
					  <tr>
						<td>BUTTON URL</td>
						<td class="sp_abc1"></td>
					  </tr>    
					   <tr>    
						
						<td colspan="2" class="sp_abc1 sp_abc1 res_clas sp_abc running_latter">'.$data->btn_url.'</td>
					  </tr>
					  
					  <tr>
						<td>PRICE</td>
						<td class="sp_abc1">'.$data->price.'</td>
					  </tr>
					  <tr>
						<!-- td>STATUS</td>
						<td class="sp_abc1">'.$data->venue_name.'</td>
					  </tr -->
					
					</body>
					';
			}else{
				$output .= ''.$checkNull.'';
			}
			
			echo $output;
			
		}
        
	

	
	function clearSelected(){
            $project=$_POST['project'];
				$_SESSION['project']=$_POST['project'];
                $ids = $_POST['ids'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
                  $data1 = $this->post_model->FetchDataByMultipleId($where_in);  
                }else{
                   $data['title'] = "Delete All";
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
                   $data1=$this->post_model->FetchAllData($project);  
                }
                
                $data['data'] = $data1;
		$data['title'] = "Delete List";  
		$this->load->view('post/clearposts', $data);  
            
        }
        
        
      function clearSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
				
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr; 
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data1 = $this->post_model->FetchDataByMultipleId($where_in);  
                 $this->post_model->ClearDeleteDataByMultipleId($where_in);  
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
                   $data1=$this->post_model->FetchAllData($_SESSION['project']);  
                   //$data1=$this->post_model->ClrearAll($_SESSION['project']);  
                    
                }
                
                
                 $data['data'] = $data1;
		$data['title'] = "Post List";  
		$this->load->view('post/clearAllPostSuccess', $data);  
            
        }
        
        
       function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->post_model->deleteJunkRecordPost($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      
        exit();
        }else{
        
		$fdata=[];
		$postdata=$this->post_model->FetchDataById($id);
        $folddata =  $this->post_model->getFilesOldUpdateData($postdata->post_id); 
		
        foreach($folddata as  $fold){
			$fdata=array('xmanage_module'=>$fold['module_name'],'xmanage_id'=>$fold['post_xmanage_id'],'file_name'=>$fold['file_name'],'type'=>$fold['file_type'],'file_size'=>$fold['file_size']);
			$this->post_model->InsertFilesTableOldData($fdata);
        }
        
         
        $olddata =  $this->post_model->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        if(!empty($data)){
         $this->post_model->updateOldData($id,$data); 
        }
		 $datau=array(
       'edit_steps'=>2
       );
        $this->post_model->updateOldData($id,$datau);
        
               $datauu=array(
       'edit_steps'=>0
       );
        $this->post_model->updateOldData($id,$datauu);
		
		//Get Files Data
		
        
        
      
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }
	
	
	

}

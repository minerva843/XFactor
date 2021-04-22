<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(1);

class Content extends CI_Controller {

        function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('auth_model', 'auth');
		$this->load->model('floor_model', 'floor_m');
        $this->load->model('Zone_model');
        $this->load->model('Content_model');
        $this->load->model('Project_model');
        $this->load->helper(['form', 'url']);
        $this->load->model('common_model', 'common');
        $this->load->library('email');
        $this->load->library('session');
    }
    
    

     function assignContentSetZone($id=false) {
		$data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
        $data['zones'] = $this->Zone_model->getZonesdist();
        $data['zone_types'] = $this->Zone_model->getZonesTypes();
        $data['selectedzones'] = $this->Zone_model->getSelectedZones();
        $data['FloorData'] = $this->floor_m->FetchDataById(base64_decode($id));
        $data['title'] = "Zone Grid";
        $data['project_select'] = $_POST['project'];
        $data['floor_plans'] = $this->floor_m->FetchAllData($_POST['project']);
        //$this->load->view('include/header', $data); 
        $this->load->view('contentset/assignContentSetZone', $data);
        //$this->load->view('include/footer');
    }




function getContentForFloorZoneAssignments($floor_plan){

                   $contentset = $this->Content_model->getContentForFloorZoneAssignments($floor_plan);
                   echo json_encode(array('response'=>$contentset));


}



function clearAllAssignments($floorplanid){
        
        $return = $this->Content_model->clearAllAssignments($floorplanid);
        
}


function saveZoneContentMapping(){

 
    	$data_delete = array(
    		'zone_id'=> $this->input->post('zone_id'),
    		'floor_plan_xid' => $this->input->post('floor_id'),
  //  		'contentset_id' => $this->input->post('contentset')
    	);
        $this->Content_model->deleteZoneContentMapping($data_delete);
		if(empty($this->input->post('contentset'))){
			$contentset=NULL;
		}else{
			$contentset=$this->input->post('contentset');
		}
        $data = array(
            'contentset_id' => $contentset,
            'zone_id' => $this->input->post('zone_id'),
            'floor_plan_xid'=> $this->input->post('floor_id'),
            'zone_type' => trim($this->input->post('zonetype')),
            'zone_name'=> trim($this->input->post('zone_name')),
        );
		if(!empty($contentset)){
			$this->Content_model->updateContentSet($data);
		}
        $return = $this->Content_model->saveZoneContentMapping($data);
        echo $return;
        exit;

}

function getFloorPlanContentSet($project){

        $contents = $this->Content_model->getFloorPlanContentSet($project);
        
        $options = "<option value=''>SELECT CONTENT SET</option>
					<option value='0'>NULL</option>
		";
        
        foreach ($contents as $content) {
         
         if(!empty($content->content_set_name)){
            $options.="<option value='".$content->id."'>".$content->content_set_name."<option/>"; 
         }
            
        }
        
        echo $options;


}



    function addNew() {
        $data['title'] = "zones";
        $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
        $this->load->view('contentset/addNew',$data);
 
    }
    
    
    
            function deleteSelected(){
            
                $ids = $_POST['ids'];
                $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];	
                if(!empty($ids)){
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
                  $data1 = $this->Content_model->getIdWhereIN($where_in);  
                }else{
                   $data['title'] = "Delete All";
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
                   $data1=$this->Content_model->FetchAllDataDel($_POST['project']);  
                }
                
                $data_files_content = array(); 
                foreach ($data1 as $data_sub){
                    $videos = $this->Content_model->getDataVideoByXId($data_sub['x_content_id']);
                    $images = $this->Content_model->getDataImgByXId($data_sub['x_content_id']);
                    $data_files_content[] = array('content'=>$data_sub,'videos'=>$videos,'img'=>$images);             
                }
                
               
             
                $data['data_files_content'] = $data_files_content;
		 $data['title'] = "Delete List";  
		 $data['group_id'] = $_POST['group_id'];
		$this->load->view('contentset/deleteAll', $data);  
            
        }
        
        
      function deleteSelectedSuccess(){ 
            
                $ids = $_POST['ids'];
	        $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
		$data['group_id'] = $_POST['group_id'];			
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data1 = $this->Content_model->getIdWhereIN($where_in);  
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
                   $data1=$this->Content_model->FetchAllDataDel($_POST['project']);  
                    
                }
                
                $data_files_content = array(); 
                foreach ($data1 as $data_sub){
                    $videos = $this->Content_model->getDataVideoByXId($data_sub['x_content_id']);
                    $this->Content_model->DeleteVideoDataByMultipleId($data_sub['x_content_id']);
                    $this->Content_model->DeleteImageDataByMultipleId($data_sub['x_content_id']);
                    $images = $this->Content_model->getDataImgByXId($data_sub['x_content_id']);
                    $data_files_content[] = array('content'=>$data_sub,'videos'=>$videos,'img'=>$images);             
                } 
               $data['data_files_content'] = $data_files_content;
               $_SESSION['data_files_content'] = $data_files_content;
		$data['title'] = "Project List";
		
		if($data['selected']){
		
		$this->Content_model->deleteContentSetDataWhereIn($where_in);
		}else{
		
		$this->Content_model->deleteContentSetDataByProject($_POST['project']);
		}  
		$this->load->view('contentset/deleteAllSuccess', $data);  
            
        }
    
    
    
function UploadVideos(){
  
		$xcid = 'XCNT'. rand(10000000,99999999);
		$data = array(
		'content_set_name'=>$this->input->post('content_set'),
		'x_content_id' => $xcid
		); 
		$data['created_date_time']=date("Y-m-d G:i");
		$data['ctreated_id_address']=$_SERVER['REMOTE_ADDR'];
		$data['project_id']=$_POST['project'];
		$data['created_xmanage_id']= $this->session->userdata('xmanage_id');
		$data['created_username']= $this->session->userdata('username');
		$data['last_edited_date_time']=date("Y-m-d G:i");
		$data['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
		$data['last_edited_xmanage_id']= $this->session->userdata('xmanage_id');
		
		$data['project_id'] = $_POST['project'];
		$data['group_id'] = $this->session->userdata('group_id');

		$data['last_edited_username']= $this->session->userdata('username'); 
		$cid = $this->Content_model->saveContentSetMaster($data);

		$upload_location = "temp/";
		/* Upload image */

		$filename_image = trim($_FILES['fileimage']['name']);
		// echo $filename_image;  exit;
		//print_r($data);  
		$path_image = $upload_location.$filename_image;
		if(move_uploaded_file($_FILES['fileimage']['tmp_name'],$path_image)){

			$path_image = $path_image;
			$data_image_file = array(
			'xmanage_id'  => $xcid,
			'file_name' => $filename_image,
			'type' => 'image',
			'xmanage_module'=>'CONTENT',
			'file_size'=>$_FILES['fileimage']['size']
		);
		// print_r($data_image_file);  
		$cidimg = $this->Content_model->saveFilespath($data_image_file);
		}




   $filename = trim($_FILES['videfiles']['name']);
   $path = $upload_location.$filename;
     if(move_uploaded_file($_FILES['videfiles']['tmp_name'],$path)){
     
        $data_video_file = array(
        'xmanage_id'  => $xcid,
        'file_name' => $filename,
        'type' => 'video',
        'xmanage_module'=>'CONTENT',
        'file_size'=>$_FILES['videfiles']['size']
        );
        $cidv = $this->Content_model->saveFilespath($data_video_file);
     }
echo $cid; 
        
    }
    
    
    
    function editUploadVideos($xcid){
        $id=$_POST['cid'];
        $upload_location = "temp/";
		$data['last_edited_date_time']=date("Y-m-d G:i");
		$data['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
		$data['last_edited_xmanage_id']= $this->session->userdata('xmanage_id');
		$data['last_edited_username']= $this->session->userdata('username');
/* Upload image */

     if(!empty($_FILES['fileimage']['name'])){
         
       
		 $filename_image = trim($_FILES['fileimage']['name']);
		 $path_image = $upload_location.$filename_image;
		 if(move_uploaded_file($_FILES['fileimage']['tmp_name'],$path_image)){
			 
			$path_image = $path_image;
			$data_image_file = array(
			'xmanage_module'=>'CONTENT',
			'file_name' => $filename_image,
			'file_size'=>$_FILES['fileimage']['size']
			);
			$where=array('xmanage_id'  => $xcid,'type' => 'image','xmanage_module'=>'CONTENT');
			$cidimg = $this->Content_model->UpdateFilespath($data_image_file,$where);
			
		 }
	 }
	 if(!empty($_FILES['videfiles']['name'])){
		
		   $filename = trim($_FILES['videfiles']['name']);
		  
			 $path = $upload_location.$filename;

			 // Upload file
			 if(move_uploaded_file($_FILES['videfiles']['tmp_name'],$path)){

				$data_video_file = array(
				'xmanage_id'  => $xcid,
				'file_name' => $filename,
				'type' => 'video',
				'xmanage_module'=>'CONTENT',
				'file_size'=>$_FILES['videfiles']['size']
				);
				$where=array('xmanage_id'  => $xcid,'type' => 'video','xmanage_module'=>'CONTENT');
				$cidv = $this->Content_model->UpdateFilespath($data_video_file,$where);
			 }
		   
		
    }     
        echo $id;
        
    }
    
    
    function processAddContent(){
        
        
        
        
        
    }
    
    
    function showAllData()
    {
			$data['title'] = "Zone Listing";
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$data['data1'] = $this->Content_model->FetchAllZonesData();
			$this->load->view('contentset/show_all',$data);
    }
    
    
    function addNewSuccess($id=false){
			$data['title'] = "addNewSuccess";
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$data['videos'] = $this->Content_model->getDataVideoById($id);
                       $data['images'] = $this->Content_model->getDataImgById($id);
			$this->load->view('contentset/addNewSuccess',$data);
        
    }
    
    function editSuccess($id=false){
        $data['title'] = "editSuccess";
          $data['project_select'] = $_POST['project'];
		  $data['group_id'] = $_POST['group_id'];
		$data['videos'] = $this->Content_model->getDataVideoById($id);
            $data['images'] = $this->Content_model->getDataImgById($id);
	$this->load->view('contentset/editSuccess',$data);
    }
    
    
   public function search()
		{
			$data1='';
			$search='';
			$searchOrderBy='';
                       $data['project_select'] = $_POST['project'];	
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
			
			
			
				if(!empty($_POST['selectData'] == 'assigned_only')){
					$search=array('xf_mst_content_zone_mapping.zone_name !='=> NULL);
				}
				
					
				if(!empty($_POST['selectData'] == 'unassigned_only')){
						$search=array('xf_mst_content_zone_mapping.zone_name'=> Null);
					}
					
					
					
				if(!empty($_POST['selectShortBy'] == 'name_asc')){
					$searchOrderByAsc= 'xf_mst_content_set.content_set_name';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'zone_type_asc')){
					$searchOrderByAsc= 'xf_mst_content_zone_mapping.zone_type';
				} 
				
				
				if(!empty($_POST['selectShortBy'] == 'zone_asc')){
					$searchOrderByAsc= 'xf_mst_content_zone_mapping.zone_name';
				}
				
				if(!empty($_POST['selectShortBy'] == 'floor_plan_az')){
					$searchOrderByAsc= 'xf_mst_floor_plan.floor_plan_name';
				}
				
				

				if(!empty($_POST['selectShortBy'] == 'latest')){
					$searchOrderByAsc= 'xf_mst_content_set.created_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'latest_edit')){
					$searchOrderByAsc= 'xf_mst_content_set.last_edited_date_time';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'earliest_created')){
					$searchOrderByDesc= 'xf_mst_content_set.created_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchOrderByDesc= 'xf_mst_content_set.last_edited_date_time';
				}
				
				
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				$data1=$this->Content_model->searchData($search,$searchOrderByAsc,$searchOrderByDesc,$AllSearchData,$_POST['project']);
				
			}else{
				$data1=$this->Content_model->FetchAllData($_POST['project']);
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					//print_r($data1); exit;
					foreach($data1 as $data){
						$videos = $this->Content_model->getDataVideoById($data['id']);
						
						$zonemapping = $this->Content_model->getDataZoneMappingByContentSetId($data['id']);
						$zname='';
						$ztype='';
						 foreach($zonemapping as $val){
							 $zname .=$val->zone_name.'<br/>';
							 $ztype .=$val->zone_type.'<br/>'; 
						 }
						  
						 
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="view" id='.$data['id'].' onclick="reply_click(this.id)">
                                                             
                                                               <td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['content_set_name'].'" id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>&nbsp;'.$data['last_edited_date_time'].'</td>
                                                                <td>'.$data['x_content_id'].'</td>
								<td class="project_namecls">'.$data['content_set_name'].'</td>
								<td>'.count($videos).'</td>
								 
                                                                  
                                                                <td>'.$zname.'</td>
                                                                <td>'.$ztype.'</td>

								   <td>'.$data['floor_plan_name'].'</td>
								   <td>'.$data['project_name'].'</td>   
								  
 
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
        
        
        
        
        function getDataById(){
            $id = trim($_POST['id']);
            
            if(!empty($_POST['id'])){
            
         
            
            $videos = $this->Content_model->getDataVideoById($id);
            $images = $this->Content_model->getDataImgById($id);
            
            $vidstring = '';
            $slider = '';
            $videoTab = '';
			$zonemapping = $this->Content_model->getDataZoneMappingByContentSetId($id);
						$zname='';
						$ztype='';
						 foreach($zonemapping as $val){
							 $zname .=$val->zone_name.'<br/>';
							 $ztype .=$val->zone_type.'<br/>'; 
						 }
            if(!empty($videos) && !empty($images)){
            
            
            foreach ($videos as $video){ 
					$sliderId='slider_'.$video['xmanage_id'];
             		$vidstring .= '
					'.$video['file_name'].', '.round(($video['file_size']/1024)/1024,2).' MB <br/>';  
					$videoUrl=base_url().'temp/'.$video['file_name'];
					$slider .='
					<input type="radio" name="slider" class="trigger" id="'.$sliderId.'" checked="checked" />
					<div class="slide">
					  <figure class="slide-figure">
						<!--img class="slide-img" src="assets/images/what-img1.png" -->
						
						<video class="slide-img" controls>
						  <source src="'.$videoUrl.'" type="video/mp4">  
						</video>   
					  </figure>
					</div>
					';
					$videoTab .='
					<!--li class="slider-nav__item"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="'.$sliderId.'">0</label></li-->
					';
            } 
            if(!empty($video['last_edited_date_time'])){ $last_edited_date_time= date('Y-m-d G:i',strtotime($video['last_edited_date_time'])); }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($video['last_edited_ip_address'])){ $last_edited_ip_address= $video['last_edited_ip_address']; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($video['last_edited_xmanage_id'])){ $last_edited_xmanage_id= $video['last_edited_xmanage_id']; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($video['last_edited_username'])){ $last_edited_username= $video['last_edited_username']; }else{ $last_edited_username= "NIL";  }
				$img=base_url().'temp/'.$images[0]['file_name'];
            $data_html = '  
			<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span id="multipleprojectselect" style="color:black;" >'.$video['content_set_name'].'</span></p></td>
			</tr>
			
			<tr id="currentlyViewing" >   
					<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span> <span class="pname">'.$video['content_set_name'].'</span></p></td>
			</tr>
					    
					
					<tr>
						<td colspan="2" class="top-fc">
						
						<div class="contant-slider">
					  <h2>CONTENT SET VIDEO</h2>   
				  <div class="slider-wrapper">
				  <div class="slider">
					'.$slider.'
					
								
			  </div>
			  <!--ul class="slider-nav">
			  					'.$videoTab.'
			  					
			  			  </ul-->
			</div>
					 </div>
						</td>
					</tr>
					
					
					<tr>
						<td colspan="2" class="top-fp">
						<div class="contant-img">
					   <h2>CONTENT SET IMAGE</h2>   
					 <img src="'.$img.'" alt="">
					  
					  </div>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="top-fp">CONTENT SET CREATION INFO</td>
					</tr>
			<tr>
			
					<tr>
						<td>Group</td>
						<td>'.$video['group_name'].'</td>
					  </tr>
					  <tr class="table-spacing">
						<td>Group Status</td> 
						<td>'.$video['group_status'].'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					   <tr>
						<td>Project Id</td>
						<td>'.$video['projectxmid'].'</td>
					  </tr>
					  <tr>
						<td>FLOOR PLAN Id</td>
						<td>'.$video['fpid'].'</td>
					  </tr>
					  <tr>
						<td>ZONE Id</td>
						<td>'.$video['zoneid'].'</td>
					  </tr>
					  <tr>
						<td>CONTENT SET ID</td>
						<td>'.$video['x_content_id'].'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					 
					  <tr>
						<td>Created date & time</td>
						<td>'.$video['created_date_time'].'</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$video['ctreated_id_address'].'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$video['created_xmanage_id'].'</td>
					  </tr>
					  <tr class="table-spacing">
						<td>Created User Name</td>
						<td>'.$video['created_username'].'</td>
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
					  <tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">CONTENT SET INFO</h5></td>
					</tr>
					
					 <tr>
				<td>CONTENT SET NAME</td>
						<td>'.$video['content_set_name'].'</td>
						</tr>
						<tr>
				<td>PROJECT NAME</td>
						<td>'.$video['project_name'].'</td>
						</tr>
						
						<tr>
				<td>FLOOR PLAN NAME</td>
						<td>'.$video['floor_plan_name'].'</td>
						</tr>
						<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">CONTENT SET ASSIGNMENT INFO</h5></td>
					</tr>
						
						<tr>
				<td>ASSIGNED ZONE NAMES</td>
						<td>'.$zname.'</td>
						</tr>
						<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">CONTENT SET VIDEO / IMAGE CONTENT INFO</h5></td>
					</tr>
						<tr>
				<td>VIDEO FILE COUNT</td>
						<td>'.count($videos).'</td>
						</tr>
						<tr class="table-spacing">
					<td style="width:115px;">VIDEO FILES & SIZE</td> 
					<td>'.$vidstring.'</td>
					</tr>		
					  
                          

					  <tr>
						<td>IMAGE FILE COUNT</td>
						<td>'.count($images).'</td>
					  </tr>
					 
					 <tr>
						<td>IMAGE FILE & SIZE</td>
						<td>'.$images[0]['file_name'].', '.round(($images[0]['file_size']/1024)/1024,2).' MB
						</td>
					  </tr>  ';
            
            
            echo $data_html;
            
            }else{
            $data_html = '<p><span>Current Selected:</span>NO CONTENT SET SELECTED.</p><h5>THERE ARE NO CONTENT.</h5><p>TO START, CLICK ADD.</p>
					 ';			 
	     echo $data_html;
            }
               }else{
               
            $data_html = '<p><span>Current Selected:</span>NO CONTENT SET SELECTED.</p><h5>THERE ARE NO CONTENT.</h5><p>TO START, CLICK ADD.</p>
					 ';
			 
	     echo $data_html;
               
               }
            
            
        }
        
        
        
       public function deleteAll()
	{
		$data['title'] = "Delete All Content Set";
		$data['project_select'] = $_POST['project'];
		$data['data1']=$this->Content_model->FetchAllData($_POST['project']);
		$this->load->view('contentset/deleteAll',$data);
	}
        
        
        function edit($cid){
         $data['title'] = "Edit Content";
           $data['project_select'] = $_POST['project'];
           $data['group_id'] = $_POST['group_id'];
         $videos = $this->Content_model->getDataVideoById($cid);
         $images = $this->Content_model->getDataImgById($cid);
         $data['videos'] = $videos;
         $data['images']= $images;
         
       // print_r($images); exit;
         $this->load->view('contentset/edit',$data);

        }

        
 
    
   

}

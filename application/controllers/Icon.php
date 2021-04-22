<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');


class Icon extends CI_Controller {

    function __construct() {
        parent::__construct();
		//error_reporting(E_ALL); 
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('auth_model', 'auth');
		$this->load->model('floor_model', 'floor_m');
        $this->load->model('Zone_model');
        $this->load->model('Icon_model');
        $this->load->model('Project_model');
        $this->load->model('post_model');
         $this->load->model('Content_model');
        $this->load->helper(['form', 'url']);
        $this->load->model('common_model', 'common');
        $this->load->library('email');
        $this->load->library('session');
    }
    
    
    
        
    function saveDragIconPosition() {

        $data = array(
            'drag_position' => $this->input->post('drag_position'),
            'zone_id' => $this->input->post('zone_id'),
            'info_icon_id' => $this->input->post('icon_id')
        );
        $this->auth->saveDragIconPosition($data);
    }
    
    
     public function showallicon()
    {
			$data['title'] = "icon Listing";
			$data['project_select'] = $_POST['project'];
			$data['data1'] = $this->Icon_model->FetchAllData($_POST['project']);
			//$this->load->view('include/header', $data);
			$this->load->view('icon/icon_list',$data);
			//$this->load->view('include/footer');
    }

 
 
    function previewIcons($zone) {
        $data['title'] = "Grid and Floor";
        $this->load->view('include/header', $data);
        $data['icon_positions'] = $this->Zone_model->getZoneIcons($zone);
        $this->load->view('grid/viewicons4', $data);
        $this->load->view('include/footer');
    }

    function icons() { 
		$data['post_type'] = "ICON";
        $data['title'] = "Grid and Floor";
        $data['project_select'] = $_POST['project'];
        $data['icons'] = $this->Icon_model->getAllIcons($_POST['project']);
       
        $data['zones'] = $this->Zone_model->getZoneAssignedByProject($data['project_select']);
        $this->load->view('icon/icon_assign',$data);
    }
    
    
    function getContentImage(){
    
    $zoneid = $this->input->post('zoneid');
    
    
   $mappindzone =  $this->Content_model->getContentSetIdFromMapping($zoneid);
   $content_id = $mappindzone[0]->contentset_id;
    
    
    $xmdatacontent = $this->Content_model->getContentXMId($content_id);
	
    $floor = $this->Content_model->getFloorplan($zoneid);
      
   
    
    $imagedata = $this->Content_model->getFloorFile($xmdatacontent->x_content_id);
   $data['file']= $imagedata->file_name;
   $data['zone_name']= $mappindzone[0]->zone_name;
   // $floor_plan_drop_point=explode(',',$imagedata->floor_plan_drop_point);
	// $data['width']=$floor_plan_drop_point[0];
	// $data['height']=$floor_plan_drop_point[1];
 
    echo json_encode(array('response'=>$data));
    
    
    
    
    }
    
    
    function ViewAssignment($content_id){
    
        $data['title'] = "Post Assign";
        $data['project_select'] = $_POST['project'];
        $data['icons'] = $this->Icon_model->getAllIconsAssignedContents($_POST['project'],$content_id);
        $data['posts']=$this->post_model->FetchAllData($data['project_select']);
         
       $xmdatacontent = $this->Content_model->getContentXMId($content_id);
       
       
       $data['imagedata'] = $this->Content_model->getContentXMIdFile($xmdatacontent->x_content_id);
    	 
        $this->load->view('icon/viewAssignment',$data);
    
    
    }
    
    
    function iconsPostAssign($zoneid){
        $data['title'] = "Post Assign";
        $data['project_select'] = $_POST['project'];
       
        $data['icons'] = $this->Icon_model->getAllIconsAssigned($_POST['project'],NULL,$zoneid);
        $data['posts']=$this->post_model->FetchAllData($data['project_select']);
       $mappindzone =  $this->Content_model->getContentSetIdFromMapping($zoneid);
       $content_id = $mappindzone[0]->contentset_id;
       $xmdatacontent = $this->Content_model->getContentXMId($content_id);
       //$data['imagedata'] = $this->Content_model->getContentXMIdFile($xmdatacontent[0]->x_content_id);
    	// = 
		$floor = $this->Content_model->getFloorplan($zoneid);

    $imagedata = $this->Content_model->getFloorFile($xmdatacontent->x_content_id);
   $data['zone_name']= $mappindzone[0]->zone_name;
   $data['zone_id']= $zoneid;
   $data['imagedata']= $imagedata->file_name.$imagedata->file_type;
   // $floor_plan_drop_point=explode(',',$imagedata->floor_plan_drop_point);
	// $data['width']=$floor_plan_drop_point[0];
	// $data['height']=$floor_plan_drop_point[1];
	
        $this->load->view('icon/post_assign',$data);
    
    }
    
    
    function updatePostMapping(){
    $zone_id=$_POST['zone_id'];
    $project_id=$_POST['project'];
    $data = array(
    'post_id'=>$this->input->post('post_id'),
    'post_name'=>$this->input->post('post_text'),
    'info_icon'=>$this->input->post('info_icon')
    
    );
   
    $update_icon=$this->Icon_model->check_duplicate_icon_update_post($this->input->post('info_icon'));
	if($update_icon==true){
		$res=$this->Icon_model->savePostIconMapping($data);
		echo $res;
	}else{ 
		
		$this->Icon_model->savePostIconMapping($data);
	}
   

    }
    
	public function updateassignIconPosition() {

        $zone_id=$_POST['zone_id'];
		$project_id=$_POST['project'];
       $allicon= $this->Icon_model->getAllIconsAssigned($project_id,NULL,$zone_id);
	   foreach($allicon as $icon){
				$id=$icon['id'];
				$this->Icon_model->updateAssignIcon($id);
	   }
        
    }
     
    
    
    function allAssignments(){
    
    			$data['title'] = "Icon All Listing";
			$data['project_select'] = $_POST['project'];
			$data['data1'] = $this->Icon_model->FetchAllData($_POST['project']);
			$this->load->view('icon/icon_list_assign',$data);
			 
 
    
    
    }
    
    
    
    
    function searchAssigned(){
    
                       $data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['selectData'])){
				if(!empty($_POST['selectData'])){
                                        
                                        if($_POST['selectData']=='icon_assigned_only'){
                                         $search=array('xf_mst_icon_positions.drag_position IS NOT NULL'=> NULL); 
                                        }else{
                                         $search=array('xf_mst_icon_positions.drag_position IS NULL'=> NULL);   
                                        }
					
                                }else{
                                  $search= array();  
                                }
				$data1=$this->Icon_model->search($search,$searchFloorOrderBy,$_POST['project']);
				  
			}elseif(!empty($_POST['shortby'])){
				 
				
				if(!empty($_POST['shortby'] == 'zone-type')){
					$searchFloorOrderBy=array('xf_mst_zones.zone_type'=>'ASC');
				}
				if(!empty($_POST['shortby'] == 'zone_A-Z')){
					$searchFloorOrderBy=array('xf_mst_zones.zone_name'=>'ASC');
				}
                                
                                
                                if(!empty($_POST['shortby'] == 'floor_pan_A-Z')){
					$searchFloorOrderBy=array('xf_mst_floor_plan.floor_plan_name'=>'ASC');
				}
                                
                                if(!empty($_POST['shortby'] == 'floor_pan_A-Z')){
					$searchFloorOrderBy=array('xf_mst_floor_plan.floor_plan_name'=>'ASC');
				}
                                
                                
                                
				if(!empty($_POST['shortby'] == 'project_latest' || $_POST['shortby'] == 'project_earliest')){
					$searchFloorOrderBy=array('xf_mst_project.created'=>'desc');
				}
				if(!empty($_POST['shortby'] == 'grid_smallest')){
					$searchFloor=array('xf_mst_zones.floor_plan_grid_type'=>1);
				}
				if(!empty($_POST['shortby'] == 'latest_created_floor' || $_POST['shortby'] == 'earliest_created_floor')){
					$searchFloorOrderBy=array('xf_mst_zones.created_date_time'=>'desc');
				}
				if(!empty($_POST['shortby'] == 'latest_edit_floor' || $_POST['shortby'] == 'earliest_edit_floor')){
					$searchFloorOrderBy=array('xf_mst_zones.last_edited_date_time'=>'desc');
				}
				
				$data1=$this->Icon_model->search($searchFloor,$searchFloorOrderBy,$_POST['project']);
                                
			}else{
                           
				$data1=$this->Icon_model->getAllIconsAssigned($_POST['project']);
				//print_r($data1);  exit;
                                
                             
			}
				$output = '';
				
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
                                              $drop_point = json_decode($data['drag_position']);
											  if(!empty($drop_point))
											  $myposition='x='.$drop_point->top.',y='.$drop_point->left.'';
										  else
											  $myposition=''; 
                                              //print_r();  exit;
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr data-contentset="'.$data['content_set_id'].'" data-zoneids="'.$data['zone_id'].'" class="" id='.$data['id'].' onclick="reply_click(this.id)" > 

                                                               <td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['zone_name'].'ICON'.$data['info_icon_number'].'"   id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>'.$data['last_edited_date_time'].'</td>
                                                                <td>'.$data['info_icon_id'].'</td>
								<td class="project_namecls" >'.$data['zone_name'].'-ICON '.$data['info_icon_number'].'</td>
								<td>YES</td>
								<td>
								'.$data['content_set_name'].'
								</td> 
								  
								<td>'.$myposition.'</td> 
 
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
        
       
			$data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['selectData'])){
				if(!empty($_POST['selectData'])){
                                        
                                        if($_POST['selectData']=='icon_assigned_only'){
                                         $search=array('xf_mst_icon_positions.drag_position IS NOT NULL'=> NULL); 
                                        }else{
                                         $search=array('xf_mst_icon_positions.drag_position IS NULL'=> NULL);   
                                        }
					
                                }else{
                                  $search= array();  
                                }
				$data1=$this->Icon_model->search($search,$searchFloorOrderBy,$_POST['project']);
				  
			}elseif(!empty($_POST['shortby'])){
				 
				
				if(!empty($_POST['shortby'] == 'zone-type')){
					$searchFloorOrderBy=array('xf_mst_zones.zone_type'=>'ASC');
				}
				if(!empty($_POST['shortby'] == 'zone_A-Z')){
					$searchFloorOrderBy=array('xf_mst_zones.zone_name'=>'ASC');
				}
                                
                                
                                if(!empty($_POST['shortby'] == 'floor_pan_A-Z')){
					$searchFloorOrderBy=array('xf_mst_floor_plan.floor_plan_name'=>'ASC');
				}
                                
                                if(!empty($_POST['shortby'] == 'floor_pan_A-Z')){
					$searchFloorOrderBy=array('xf_mst_floor_plan.floor_plan_name'=>'ASC');
				}
                                
                                
                                
				if(!empty($_POST['shortby'] == 'project_latest' || $_POST['shortby'] == 'project_earliest')){
					$searchFloorOrderBy=array('xf_mst_project.created'=>'desc');
				}
				if(!empty($_POST['shortby'] == 'grid_smallest')){
					$searchFloor=array('xf_mst_zones.floor_plan_grid_type'=>1);
				}
				if(!empty($_POST['shortby'] == 'latest_created_floor' || $_POST['shortby'] == 'earliest_created_floor')){
					$searchFloorOrderBy=array('xf_mst_zones.created_date_time'=>'desc');
				}
				if(!empty($_POST['shortby'] == 'latest_edit_floor' || $_POST['shortby'] == 'earliest_edit_floor')){
					$searchFloorOrderBy=array('xf_mst_zones.last_edited_date_time'=>'desc');
				}
				
				$data1=$this->Icon_model->search($searchFloor,$searchFloorOrderBy,$_POST['project']);
                                
			}else{
                           
				$data1=$this->Icon_model->FetchAllData($_POST['project']);
				 
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
					if(!empty($data['drag_position'])){
                                              $drop_point = json_decode($data['drag_position']);
                                              if(!empty($drop_point->left)){
                                              $drop_point_left = $drop_point->left;
                                              $drop_point_top = $drop_point->top;
                                              
                                              }
                                              
                                          }else{
                                          $drop_point_left ='';
                                          $drop_point_top = '';
                                          }
                                              //print_r($drop_point); exit;
                                             if(!empty($data['drag_position'])){
                                             $flag = 'YES';
                                             }else{
                                             $flag = 'NO';
                                             }
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="" id='.$data['id'].' onclick="reply_click(this.id)" >

                                                               <td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['zone_name'].'ICON'.$data['info_icon_number'].'"   id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass"></label>
								</td>
								<td>'.$data['last_edited_date_time'].'</td>
                                                                <td>'.$data['info_icon_id'].'</td>
								<td class="project_namecls" >'.$data['zone_name'].'-ICON '.$data['info_icon_number'].'</td>
								<td>'.$flag.'</td>
								<td>
								'.$data['content_set_name'].'
								</td> 
								  
								<td>x='.$drop_point_top.',y='.$drop_point_left.'</td> 
 
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
        
        
        
        function searchSingleData(){
        
                       $data1=$this->Icon_model->FetchAllData($_POST['project']);
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO ICONS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>';
					}
			$output = '';
			
			if(isset($_POST['clicked_id']) && !empty($_POST['clicked_id'])){
			$id = trim($_POST['clicked_id']);
			$data=$this->Icon_model->FetchDataById($id)[0]; 
			
			$datapost=$this->Icon_model->getIconPostMapped($id); 
			
			}else{
			$data = array();
			
			}
			

			if(!empty($data))
			{
				$grid=''; 
				$drop_point='';
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
                                //$drop_point = json_decode($data->drag_position);
                               // print_r($data->drag_position);  exit;
                                if(!empty($data->drag_position)){
                                              $drop_point = json_decode($data->drag_position);
                                              if(!empty($drop_point->left)){
                                              $drop_point_left = $drop_point->left;
                                              $drop_point_top = $drop_point->top;
                                              
                                              }
                                              
                                          }else{
                                          $drop_point_left ='';
                                          $drop_point_top = '';
                                          }
                                
                                
                                 if(!empty($data->content_set_name)){
                                             $flag = 'YES';
                                             }else{
                                             $flag = 'NO';
                                             }
 
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_id_address)){ $last_edited_ip_address= $data->last_edited_id_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
					
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span><span id="multipleprojectselect" style="color:black;" > '.$data->zone_name.' '.'INFO ICON'.$data->info_icon_number.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="visibility:hidden;">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING:</span><span class="pname"> '.$data->zone_name.' '.'INFO ICON'.$data->info_icon_number.'</span></p></td>
					    </tr>
						
						
						<tr>
							<td colspan="2" class="top-fc" style="padding-top: 19px;"><h5>INFO ICON CREATION INFO</h5></td>
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
						<td>'.$data->flor_plan_id.'</td>
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
						<td>'.$data->ctreated_id_address.'</td>
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">INFO ICON INFO</b></td>
						</tr>
						
						<tr>
						<td>INFO ICON NAME</td>
						<td class="" >'.$data->zone_name.'-ICON '.$data->info_icon_number.'</td>
					  </tr>
					  
					  					  <tr>
						<td>INFO ICON ASSIGN</td>
						<td class="" >'.$flag.'</td>
					  </tr>
					  <tr>
						<td>INFO ICON IMAGE AFTER VIDEO: </td>
						<td class="textprojectname" >'.$data->file_name.'</td>
					  </tr>
					  <tr> 
						<td>INFO ICON POSITION </td>
						<td>x = '.$drop_point_left.' , y = '.$drop_point_top.'</td>
					  </tr>
					 
					
					<body>
					<tr>
				<td colspan="2" class="floor-ck"><b style="font-size: 16px;">POSTS ASSIGNMENT INFO</b></td>
						</tr>
					<tr>
						<td>ASSIGNED POST TITLE </td>
						<td>'.$data->post_name.'</td>
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
        
        
        


function getinfoIconsDisplay($zone,$project){
$icons = $this->Icon_model->getAllIconsofZone($zone,$project);



$html ='';
     foreach ($icons as $icon){  
		if(empty($icon['drag_position'])){
			$action=$icon['info_icon_number'];
			$disabled = '';
		$html = $html.' <div id="draggable'.$icon['id'].'" data-boxid="'.$icon['id'].'" data-boxNum="'.$icon['info_icon_number'].'" class="draggable" '.$disabled.'>'.$action.'</div>';

		}else{
			$action='';
			$disabled = 'style="pointer-events: none;"';
			$html = $html.' <div class="whiteicon draggable" '.$disabled.'>'.$action.'</div>';
 
		}
     //$html = $html.' <div id="draggable'.$icon['id'].'" data-boxid="'.$icon['info_icon_number'].'" style="background: green; color: white;border-radius: 50%;" class="draggable hide" >'.$icon['info_icon_number'].'</div>';
  
      }      

echo $html;

}


function getinfoIconsDisplayRight($zone,$project){
$icons = $this->Icon_model->getAllIconsofZone($zone,$project);




$html ='';
    foreach ($icons as $icon){ 
    $posx='';
    $posy=''; 
    $positions =array();
    if(!empty($icon['drag_position'])){
     $positions = json_decode($icon['drag_position']);
     
     //print_r($positions);
     $posx =  $positions->left;
     $posy =  $positions->top;
     $addtxt = 'REMOVE';
     //$disabled = 'style="pointer-events: none;"';
     $disabled = '';
    }else{
    $addtxt = 'ADD';
    $disabled = '';
    }
    
      
     $html = $html.' <tr id="'.$icon['id'].'" data-id="'.$icon['id'].'" '.$disabled.' class="myclick_row"> 
      <td id="icon'.$icon['id'].'" data-iconid="'.$icon['id'].'" class="btn icon">INFO ICON '.$icon['info_icon_number'].'</td>
      <td id="position'.$icon['id'].'" ><a href="#" data-iconid="'.$icon['id'].'">'.$posx.','.$posy.'</a></td>
      <td id="action'.$icon['id'].'" class="action anchor_add" > <a href="#" data-iconid="'.$icon['id'].'" data-action="'.$addtxt.'" class="add ">'.$addtxt.'</a></td>
      <td class="chk2">
	  <input type="checkbox" id="c_'.$icon['id'].'" name="rigtcheck" class="rightcheck'.$icon['id'].' " >
      <label style="display:none;" for="c_'.$icon['id'].'" class="rightcheck rightcheck'.$icon['id'].'"></label>
								</td>
      </tr>'; 
     }       

echo $html;

 
}
     function addnewicon($iconid,$project){
	
	$icons = $this->Icon_model->addnewicon($iconid,$project);

	
			
		 
		 $html1 = '<div id="draggable'.$icons->id.'" data-iconid="'.$icons->id.'" data-boxid="'.$icons->id.'" style="background: green; color: white;border-radius: 50%;" class="draggable " >'.$icons->info_icon_number.'</div>';
	 

echo json_encode($html1);

}

 function getselectedinfoIconsDisplay($zone=NULL,$project=NULL){
	
	$icons = $this->Icon_model->getAllIconsofZone($zone,$project);

	$html1 =''; 
     foreach ($icons as $icon){   
		if(!empty($icon['drag_position'])){
			//$disabled = 'style="pointer-events: none;"';
		 $pixels = json_decode($icon['drag_position'],TRUE);
		 $html1 = $html1.'<div style="background: red; color: white;border-radius: 50%;pointer-events: none;right: auto;bottom: auto;position:absolute;top:'.$pixels['top'].';left:'.$pixels['left'].';" class="draggable ui-widget-content" >'.$icon['info_icon_number'].'</div>';
	  
		}  
      }   

echo $html1;

}   

public function AddAndRemovePosition($project=NULL) {

        $data = array(
            'iconid' => $this->input->post('iconid'),
            'project_id'=> $project,
        );

        
        $this->Icon_model->updatePositionInDB($data);
		$icons = $this->Icon_model->getAllIconsofZone($this->input->post('zone_id'),$project);

		$html ='';
			foreach ($icons as $icon){ 
			$posx='';
			$posy=''; 
			$positions =array();
			if(!empty($icon['drag_position'])){
			 $positions = json_decode($icon['drag_position']);
			 
			 //print_r($positions);
			 $posx =  $positions->left;
			 $posy =  $positions->top;
			 $addtxt = 'REMOVE';
			 //$disabled = 'style="pointer-events: none;"';
			 $disabled = '';
			}else{
			$addtxt = 'ADD';
			$disabled = '';
			}
		    
			  
			 $html = $html.' <tr id="'.$icon['id'].'" data-id="'.$icon['id'].'" '.$disabled.' class="myclick_row"> 
      <td id="icon'.$icon['id'].'" data-iconid="'.$icon['id'].'" class="btn icon">INFO ICON '.$icon['info_icon_number'].'</td>
      <td id="position'.$icon['id'].'" ><a href="#" data-iconid="'.$icon['id'].'">'.$posx.','.$posy.'</a></td>
      <td id="action'.$icon['id'].'" class="action anchor_add" > <a href="#" data-iconid="'.$icon['id'].'" data-action="'.$addtxt.'" class="add ">'.$addtxt.'</a></td>
      <td class="chk2">
	  <input type="checkbox" id="c_'.$icon['id'].'" name="rigtcheck" class="rightcheck'.$icon['id'].' " >
      <label style="display:none;" for="c_'.$icon['id'].'" class="rightcheck rightcheck'.$icon['id'].'"></label>
								</td>
      </tr>';
			 }   

		echo $html;
    }
	
	
	
        
		
public function saveDragIconPositioninDB() {
	$boxNum=$_POST['boxNum'];
	$iconPosition=$this->Icon_model->icon_adjustment($boxNum);
	
	$pixels = json_decode($this->input->post('drag_position'));
	if(!empty($iconPosition->y_axis_adjustment)){
		$top=preg_split('/(?<=[0-9])(?=[a-z]+)/i',$pixels->top);
		$topres=intval($iconPosition->y_axis_adjustment+($top[0]));
		
		$left=preg_split('/(?<=[0-9])(?=[a-z]+)/i',$pixels->left);
		$leftres=intval($iconPosition->x_axis_adjustment+($left[0]));
		$position='{"top":"'.$topres.'px","left":"'.$leftres.'px"}';
			$data = array(  
				'drag_position' => $position,
				'zone_id' => $this->input->post('zone_id'),
				'info_icon_id' => $this->input->post('icon_id'),
				'project_id'=> $this->input->post('project_id'),
			); 
			
			
			$this->Icon_model->savePositionInDB($data);
	} 
		$icons = $this->Icon_model->getAllIconsofZone($this->input->post('zone_id'),$this->input->post('project_id'));

		$html ='';
			foreach ($icons as $icon){ 
			$posx='';
			$posy=''; 
			$positions =array();
			if(!empty($icon['drag_position'])){
			 $positions = json_decode($icon['drag_position']);
			 
			 //print_r($positions);
			 $posx =  $positions->left;
			 $posy =  $positions->top;
			 $addtxt = 'REMOVE';
			 //$disabled = 'style="pointer-events: none;"';
			 $disabled = '';
			}else{
			$addtxt = 'ADD';
			$disabled = '';
			}
		   
			  
			 $html = $html.' <tr id="'.$icon['id'].'" data-id="'.$icon['id'].'" '.$disabled.' class="myclick_row"> 
      <td id="icon'.$icon['id'].'" data-iconid="'.$icon['id'].'" class="btn icon">INFO ICON '.$icon['info_icon_number'].'</td>
      <td id="position'.$icon['id'].'" ><a href="#" data-iconid="'.$icon['id'].'">'.$posx.','.$posy.'</a></td>
      <td id="action'.$icon['id'].'" class="action anchor_add" > <a href="#" data-iconid="'.$icon['id'].'" data-action="'.$addtxt.'" class="add ">'.$addtxt.'</a></td>
      <td class="chk2">
	  <input type="checkbox" id="c_'.$icon['id'].'" name="rigtcheck" class="rightcheck'.$icon['id'].' " >
      <label style="display:none;" for="c_'.$icon['id'].'" class="rightcheck rightcheck'.$icon['id'].'"></label>
								</td> 
      </tr>';
			 }   

		echo $html;
    }
	
		    
         function getIconData(){
            			
            			
            		if(!empty($_POST['clicked_id'])){
            		  $id = trim($_POST['clicked_id']);
            		  $data=$this->Icon_model->FetchDataById($id)[0];  
			  $xmdatacontent = $this->Content_model->getInfoContentXMId($id);
			  
			  
			  if(!empty($xmdatacontent[0]->content_set_id)){
			  $contentsetxmid = $this->Content_model->getContentXMId($xmdatacontent[0]->content_set_id);
                         $imagedata = $this->Content_model->getContentXMIdFile(trim($contentsetxmid->x_content_id))[0];
                         $imagedatafile_name = $imagedata->file_name;
			  }else{
			  $imagedatafile_name='';
			  }
			  
			 
            		
            		}
            	         //print_r($_POST['project']); exit;
			 $data1=$this->Icon_model->FetchAllData($_POST['project']);
			 $checkNull='';
					 if(empty($data1)){
						 $checkNull .='<p class="dhg">THERE ARE NO ICONS.</p>
						 <p class="hjk">TO START, CLICK ADD.</p>
						 ';
					 }else{
						 $checkNull .='<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>';
					 }
			 $output = '';
			 if(!empty($data))
			 {
				 
					 $output .= '

						 <tr>
						 <td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span><span id="multipleprojectselect" style="color:black;" > '.$data->zone_name.' '.'INFO ICON'.$data->info_icon_number.'</span></p></td>
					    </tr>
						
						
						 <tr id="currentlyViewing" style="display:none;">
						 <td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING:</span><span class="pname"> '.$data->zone_name.' '.'INFO ICON'.$data->info_icon_number.'</span></p></td>
					    </tr>
						
						   
						 
					     <body>
						 <tr>
						 
						 <td><div class="contant-img">
					    
					  <img src="'.base_url().'temp/'.$imagedatafile_name.'" alt="Image not available">
					  
					   </div></td>
					   </tr>
			 
					 ';
			 }else{
			 
				 $output .= '
						 
						
					  ';
			 }
			
			 echo $output;
			
         }
        
        
        function deleteSelected(){
                $ids = $_POST['ids'];
                $ids_arr = explode(',', $ids);
                $where_in = array('xf_mst_icon_positions.id',$ids_arr);
				$data['selected'] = TRUE;
		$data['title'] = "Delete ICONS";
		$data['project_select'] = $_POST['project'];
		$data['action'] = "CLEAR ASSIGNMENT";
		$data['ids'] = $_POST['ids'];
                $data['data1'] = $this->Icon_model->getByIdWhereIN($ids_arr,$_POST['project']);    
  
		$this->load->view('icon/deleteAll',$data);
            
        }
        
        
        function deleteSuccess(){
            
		$data['title'] = "Delete";
		$data['project_select'] = $_POST['project'];
		
		if(isset($_POST['ids']) && !empty($_POST['ids'])){
		
		$ids = $_POST['ids'];
                $ids_arr = explode(',', $ids);
                $where_in = array('xf_mst_icon_positions.id',$ids_arr);
		$data['title'] = "Delete ICONS";
		//$data['project_select'] = $_POST['project'];
		$data['action'] = "CLEAR ASSIGNMENT";
		$data['ids'] = $_POST['ids'];
		$data['selected'] = TRUE;
                $data['data1'] = $this->Icon_model->getByIdWhereIN($ids_arr,$_POST['project']);  
                //$this->Icon_model->deeleteByIdWhereIN($ids_arr);    
			$this->load->view('icon/deleteSuccess',$data);
		
		}else{
		$data['action'] = "CLEAR ALL";
		$data['selected'] = FALSE;
		$data['data1']=$this->Icon_model->FetchAllData($_POST['project']); //$data1=$this->Icon_model->FetchAllData();
		//$this->Icon_model->deeleteByProject($_POST['project']);  
		$this->load->view('icon/deleteSuccess',$data);
		}
		
		
		
		
        }    
        
        
       public function deleteAll()
	{
		$data['title'] = "CLEAR ALL";
		$data['project_select'] = $_POST['project'];
		$data['action'] = "CLEAR ALL";
		$data['selected'] = FALSE;
		$data['data1']=$this->Icon_model->FetchAllData($_POST['project']); 
		$this->load->view('icon/deleteAll',$data);
	}
	
	
	
	
    
        
//   function icons() {
//        $data['title'] = "Grid and Floor";
//        $data['zones'] = $this->Zone_model->getZonesdist2();
//    //    $this->load->view('include/header', $data);
//        $this->load->view('icon/icon_assign',$data);
//   //     $this->load->view('include/footer');
//    }
   
    
   

}

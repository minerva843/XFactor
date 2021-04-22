<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Zone extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('auth_model', 'auth');
		$this->load->model('floor_model', 'floor_m');
        $this->load->model('Zone_model');
        $this->load->model('Project_model');
        $this->load->model('Icon_model');
        
        $this->load->helper(['form', 'url']);
        $this->load->model('common_model', 'common');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    
     public function showallzones()
    {
         
                       $data['project_select'] = $_POST['project'];
                       $data['group_id'] = $_POST['group_id'];
			$data['title'] = "Zone Listing";
			$data['data1'] = $this->Zone_model->FetchAllZonesData();
			//$this->load->view('include/header', $data);
			$this->load->view('zone/all_zones',$data);
			//$this->load->view('include/footer');
    }

 

    function floorPlansFields() { 
        $data['title'] = "floorPlansFields";
        $this->load->view('include/header', $data);
        $this->load->view('zone/floorPlansFields');
        $this->load->view('include/footer');
    }

    function zones() {
        $data['title'] = "zones";
        $this->load->view('include/header', $data);
        $this->load->view('zone/zones');
        $this->load->view('include/footer');
    }

    function asssignGrid($id=false) {
        $data['title'] = "Assign Zone Grid";
        $data['project_select'] = $_POST['project'];
        $data['floor_plans'] = $this->floor_m->FetchAllData($_POST['project']);
        $data['id'] = $id;
        $data['zones'] = $this->Zone_model->getZonesdist2($_POST['project']);
        $data['zone_types'] = $this->Zone_model->getZonesTypes();
        $this->load->view('zone/zoneAssign', $data);
      //  $this->load->view('include/inner_footer');
    }

    function saveZoneMapping() {
    
    	$data_delete = array(
    		//'zone_id'=> $this->input->post('zone_id'),
    		'floor_plan_xid' => $this->input->post('floor_id'),
    		'grid_id' => $this->input->post('grid')
    	);
        $this->Zone_model->deleteZoneMapping($data_delete);
    
        $data = array(
            'grid_id' => $this->input->post('grid'),
            'zone_id' => $this->input->post('zone_id'),
            'floor_plan_xid'=> $this->input->post('floor_id'),
            'zone_type' => trim($this->input->post('zone_type')),
            'zone_name'=> trim($this->input->post('zone_name')),
        );
        $return = $this->Zone_model->saveZoneMapping($data);
        echo $return;
        exit;
    }



    function previewIcons($zone) {
        $data['title'] = "Grid and Floor";
        $this->load->view('include/header', $data);
        $data['icon_positions'] = $this->Zone_model->getZoneIcons($zone);
        $this->load->view('grid/viewicons4', $data);
        $this->load->view('include/footer');
    }

    function icons() {
        $data['title'] = "Grid and Floor";
        $data['zones'] = $this->Zone_model->getZonesdist2();
    //    $this->load->view('include/header', $data);
        $this->load->view('icon/icon_assign',$data);
   //     $this->load->view('include/footer');
    }

    function projectRegistrationlandig() {
        $data['title'] = "projectRegistrationlandig";
        $this->load->view('include/header', $data);
        $this->load->view('zone/projectRegistrationlandig');
        $this->load->view('include/footer');
    }

    function guestFields() {
        $data['title'] = "guestFields";
        $this->load->view('include/header', $data);
        $this->load->view('zone/guestFields');
        $this->load->view('include/footer');
    }

    function guestFiledList() {
        $data['title'] = "guestFiledList";
        $this->load->view('include/header', $data);
        $this->load->view('zone/guestFiledList');
        $this->load->view('include/footer');
    }
    
    function zoneList(){
        $data['title'] = "Zones List";
        $this->load->view('include/header', $data);
        $this->load->view('zone/zone_list');
        $this->load->view('include/footer');  
        
    }
    
    function getFloorPlanbyProject($project){
        
        $floors = $this->floor_m->getFloorPlanbyProject($project);
       
        $options = "<option value=''>SELECT A FLOOR PLAN</option>";
        
        foreach ($floors as $floor) {
               $options  .= "<option value='".$floor->floor_plan_id."'>".strtoupper($floor->floor_plan_name)."<option/>"; 
        }
        
        echo $options;
        //echo count($floors);
        
    }
    
     function filterZone() {
        header('Content-Type: application/json');
        $zone_id = $this->input->post('zone_id');
        $floorplan = $this->input->post('floorplan');
        $filtered_zones = $this->Zone_model->filterZoneAssignedList($zone_id,$floorplan);
        echo json_encode(array('filter2' => $filtered_zones));
        exit;
    }
    
    function getFloorPlanZones($floorplan){
    
    
        $floors = $this->Zone_model->getFloorPlanZones($floorplan);
        
   
       
        $options = "<option value=''>SELECT ZONE NAME</option>";
        
        foreach ($floors as $floor) {
         
         if(!empty($floor->zone_name)){
            $options.="<option  data-zonetype='".$floor->zone_type."' value='".$floor->id."'>".strtoupper($floor->zone_name)."<option/>"; 
         }
            
        }
        
        echo $options;
    
    
    }
    
    
    
     
    function addNewZone($id=false,$project_id=0){
       
        if($id){
        $data['title'] = "Edit Zones"; 
        $data['action'] = 'EDIT'; 
		$data['project_select'] = $project_id;
	//$data['project_select'] = $_POST['project'];
        $data['project_data'] = $this->Project_model->FetchDataById($project_id);
        $data['zone'] = $this->Zone_model->getZoneById($id);    
        }else{
         $data['title'] = "Add Zone";
         $data['action'] = 'ADD'; 
         $data['project_select'] = $_POST['project'];
         $data['group_id'] = $_POST['group_id'];
         $data['project_data'] = $this->Project_model->FetchDataById($_POST['project']); 
        }
		
        $this->load->view('zone/addNewZone',$data);   
    }
             
    
    function addNewZoneSuccess($id,$action){
       
        
        $data['project_select'] = $_POST['project'];
        if($action=='ADD'){
            $data['title'] = "Add Zones Success";
            $data['action'] = "ADD";
        }else{
            $data['title'] = "Edit Zones Success";
            $data['action'] = "EDIT";
        }
        $data['zone'] = $this->Zone_model->getZoneById($id);
	$data['gridsarr'] = $this->Zone_model->getZoneAssignedGridsById(trim($id));
	$pgrids='';
	   foreach ($data['gridsarr'] as $grid){ 
                          $pgrids .=  $grid['grid_id'].','; 
                            
                        }
	
	$data['grids']=	$pgrids;
        $this->load->view('zone/addNewZoneSuccess',$data);   
    }
    
   function addNewZoneFailed(){
        $data['title'] = "Add Zones Success";
        $this->load->view('include/header', $data);
        $this->load->view('zone/addNewZoneFailed');
       $this->load->view('include/footer');   
    }
    
    function processAddZone($id=false){
        
        $project_id = trim($_POST['project_id']);
        $group_id = $this->session->userdata('group_id');
        $flor_plan_id = trim($_POST['floor_plan']);
        if(!$id){
         $zone_id = 'XCZ'.$project_id.rand(1000000000,9999999999);   
        }
        
        $zone_type = trim($_POST['zone_type']);
        $zone_name = trim($_POST['zone_name']);
        
        if($id){
          $data = array(
          'project_id'=>$project_id,
          'group_id'=>$group_id,
          'flor_plan_id'=>$flor_plan_id,
          'zone_type'=>$zone_type,
          'zone_name'=>$zone_name,
          'project_xm_id'=>$this->input->post('xproject_id'),
          'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_id_address'=>$this->input->ip_address(),
		  'last_edited_username'=>$this->session->userdata('username')
        ); 
        }else{
          $data = array(
          'project_id'=>$project_id,
          'flor_plan_id'=>$flor_plan_id,
          'group_id'=>$group_id,
          'zone_id'=>$zone_id,
          'project_xm_id'=>$this->input->post('xproject_id'),
          'zone_type'=>$zone_type,
          'zone_name'=>$zone_name,
		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
		  'created_username'=>$this->session->userdata('username'),
          'ctreated_id_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_id_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username')
        );  
        }

        
        if($id){
           $response =  $this->Zone_model->saveUpdateZone($data,$id); 
        }else{
            
          $response =  $this->Zone_model->saveAddZone($data); 

          for($i=0;$i<50;$i++){
              $data_icon = array(        
              'project_id'=>$project_id,
              'flor_plan_id'=>$flor_plan_id,
              'group_id'=>$group_id,
              'zone_id'=>$zone_id,
              'info_icon_id'=>'XICN-'.rand(1000000000,9999999999).$i,
              'zone_id'=>$response,
              'info_icon_number'=>$i+1,
              'ctreated_id_address'=>$this->input->ip_address(),
              		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmange_id'),
		  'created_username'=>$this->session->userdata('username'),
          'ctreated_id_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=>$this->session->userdata('xmange_id'),
          'last_edited_id_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username') 
              );
              $this->Icon_model->saveIcon($data_icon);
          }
 
        }

        echo $response;
    }
    
    

    
    
    
    
    public function search()
		{
        
        
			$data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['zone']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['zone'])){
					$searchFloor=array('xf_mst_zones.zone_type'=>$_POST['zone']);
				}else{
//					if(!empty($_POST['zone'] == 'project_not_completed')){
//						$searchFloor=array('xf_mst_project.status'=>0);
//					}
//					if(!empty($_POST['zone']=='project_completed')){
//						$searchFloor=array('xf_mst_project.status'=>1);
//					}
				}
				
				if(!empty($_POST['selectShortBy']== 'zone-type')){
					$searchDataOrderByAsc='xf_mst_zones.zone_type';
				}
				if(!empty($_POST['selectShortBy']== 'zone_name')){
					$searchDataOrderByAsc='xf_mst_zones.zone_name';
				}
				if(!empty($_POST['selectShortBy']== 'floor_plan_name')){
					$searchDataOrderByAsc='xf_mst_floor_plan.floor_plan_name';
				}
				// if(!empty($_POST['selectShortBy']== 'project_name')){
					// $searchDataOrderByAsc='xf_mst_project.project_name';
				// }
				
				// if(!empty($_POST['selectShortBy']== 'project_start_earlist')){
					// $searchDataOrderByAsc='xf_mst_project.event_start_date_time';
				// }
				
				// if(!empty($_POST['selectShortBy']== 'project_start_latest')){
					// $searchDataOrderBy='xf_mst_project.event_start_date_time';
				// }
				if(!empty($_POST['selectShortBy']== 'latest_created')){
					$searchDataOrderBy='xf_mst_zones.created_date_time';
				}
				if(!empty($_POST['selectShortBy']== 'earliest_created')){
					$searchDataOrderByAsc='xf_mst_zones.created_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'latest_edit')){
					$searchDataOrderBy='xf_mst_zones.last_edited_date_time';
				}
				if(!empty($_POST['selectShortBy'] == 'earliest_edit')){
					$searchDataOrderByAsc='xf_mst_zones.last_edited_date_time';
				}
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->Zone_model->searchZone($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$_POST['project']); 
				  
			}else{
                           //echo $_POST['project'];   exit;
				$data1=$this->Zone_model->FetchAllData($_POST['project']);
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
						
						 $content_set_name=$this->Zone_model->getContentSetByZoneId(trim($data['id']));
                        $grids = $this->Zone_model->getZoneAssignedGridsById(trim($data['id']));
                        $pgrids = '';
			$totalgrid=count($grids);
						
                        foreach ($grids as $grid){ 
                          $pgrids .=  $grid['grid_id'].'</br>';  
                            
                        }
                        //$gridString = implode(',', $pgrids);
                        $gridString =  $pgrids;
                                            if(!empty($data['last_edited_date_time'])){
                                              $lastedit = $data['last_edited_date_time'];  
                                            }else{
                                             $lastedit = 'NIL';   
                                            }
                                            
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="view" id='.$data['id'].' >

                               <td class="deletesingle" >
								
								<input type="checkbox"   data-project="'.$data['zone_name'].'"  id="d_'.$data['id'].'" name="delete_val" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'" style="display:none;" class="deletClass hide"></label>
								</td>
								<td>'.$lastedit.'</td>
                                                              <td>'.$data['zone_id'].'</td>
								<td>'.$data['zone_type'].'</td>
								<td class="project_namecls">'.$data['zone_name'].'</td>
								<td>'.$gridString.'</td> 
								<td>'.$data['floor_plan_name'] .'</td>
								<td>'.$content_set_name->content_set_name .'</td> 
 
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
        
        
        
        function getZoneData(){
            
                        $id=$_POST['zone'];
			            $data=$this->Zone_model->getZoneById(trim($id));
                        $grids = $this->Zone_model->getZoneAssignedGridsById(trim($id));
						$content_set_name=$this->Zone_model->getContentSetByZoneId(trim($id));

                        //$pgrids = array();
                        foreach ($grids as $grid){
                          $pgrids .=  $grid['grid_id'].'</br>'; 
                            
                        }
                      //  $gridString = implode(',', $pgrids); 
                        $gridString =$pgrids; 
			$output = '';
			if($data > 0)
			{
				$grid=''; 
				$drop_point='';
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
 
                                
                                if($data->floor_plan_grid_type==1){ 
                                    $grid= 'GRID TYPE, 16 : 9';
                                    }elseif($data->floor_plan_grid_type ==2){
                                        $grid= 'GRID TYPE, 32 : 18'; 
                                        
                                    }elseif($data->floor_plan_grid_type==3){
                                        $grid= 'GRID TYPE, 48 : 27';
                                        
                                    }
				
				$floor_plan_drop_point=explode(',',$data->floor_plan_drop_point);
				$drop_point='x='.$floor_plan_drop_point[0].',y='.$floor_plan_drop_point[1];
                                
                                
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){
                                    $last_edited_ip_address= $data->last_edited_ip_address;
                                    }else{ 
                                        $last_edited_ip_address= "NIL";  
                                        
                                    }
				
				if(!empty($data->last_edited_xmanage_id)){ 
                                    $last_edited_xmanage_id= $data->last_edited_xmanage_id; 
                                    
                                }else{
                                    $last_edited_xmanage_id= "NIL"; 
                                    }
				
				if(!empty($data->last_edited_username)){ 
                                    $last_edited_username= $data->last_edited_username;
                                    }else{ 
                                        $last_edited_username= "NIL"; 
                                        }
					
					$output .= '    
                                        <tbody>
                                        <tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span> <span id="multipleprojectselect" style="color:black;" > '.$data->zone_name.'</span></p></td>
					</tr>
                                        
                                        <tr id="currentlyViewing" >
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span><span class="pname"> '.$data->zone_name.'</span></p></td>
					</tr>

					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">ZONE CREATION INFO</h5></td>
					</tr>
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
						<td>ZONE Id</td>
						<td>'.$data->zone_id.'</td>
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
						<td>'.$data->last_edited_id_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$data->last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$data->last_edited_username.'</td>
					  </tr>
					<tr>
						<td colspan="2" class="top-fc"><h5 class="spc_cl">ZONE INFO</h5></td>
					</tr>
                                        </tbody>

					 <tbody>
					 <tr>
						<td>ZONE TYPE</td>
						<td>'.$data->zone_type.'</td>
					  </tr>
					  <tr class="table-spacing">
						<td>ZONE NAME / DESCRIPTION</td>
						<td>'.$data->zone_name.'</td>
					  </tr>
					</tbody>
                                        


					<tbody>
					<tr>
					<td colspan="2" class="zoneassigntd"><b style="font-size: 16px;">ZONE ASSIGNMENT INFO</b></td>
					</tr>
					<tr>
						<td>ZONE ASSIGNMENT</td>
						<td>'.$gridString.'</td>
					</tr>
					
					<tr>
						<td>CONTENT SET FOR ZONE</td>
						<td>'.$content_set_name->content_set_name.'</td>
					</tr>
					
					   
					</tr>
                                        </tbody>
                                       
                                        <tbody>
					<tr>
					<td colspan="2" class="floorplantd"><b style="font-size: 16px;">FLOOR PLAN INFO</b></td>
					</tr>
					<tr>
						<td>PROJECT NAME </td>
						<td>'.$data->project_name.'</td>
					</tr>
					<tr> 
						<td>FLOOR PLAN NAME</td>
						<td>'.$data->floor_plan_name.'</td>
					</tr>
					<tr>
						<td>FLOOR PLAN FILE NAME</td>
						<td>'.$data->file_name.'</td>
					</tr>
					<tr>
						<td>FLOOR PLAN GRID TYPE</td>
						<td>'.$grid.'</td>
					</tr>
					  
					<tr>
					<td>FLOOR POINT DROP IN POINT</td>
						<td>'.$drop_point.'</td>
					</tr>
					 <tr>
					<td>FILE NAME</td>
					<td>'.$data->file_name.'</td>
					</tr>
                                        
                                          <tr>
					<td>FILE TYPE</td>
					<td>'.$data->file_type.'</td>
					</tr>
                                        
                                           <tr>
					<td>FILE SIZE</td>
					<td>'.$data->file_size.'KB</td>
					</tr>

                                        </tbody>


					';
			}else{
				$output .= '
						<p><span class="current-bold">Currently Selected : </span> NO ZONE SELECTED</p>  
						
					 ';
			}
			
			echo $output;
            
        }
        
        
        function deleteSelectedZone(){
                $ids = $_POST['ids'];
                $data['project_select'] = $_POST['project'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                 // print_r($where_in); exit;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $zones = $this->Zone_model->getZoneByIdWhereIN($where_in); 
                  
                  foreach ($zones as $zone){
                   $grids = $this->Zone_model->getZoneAssignedGridsById(trim($zone['id']));
                   
                   foreach ($grids as $grid){
                    $grids_arr[] =   $grid['grid_id'] ;
                   }
                   $grids_str = implode(',', $grids_arr);
                   $data['zone'][] =   array('zone'=>$zone,'grids'=>$grids_str);   
                  }
                  
                  
                  
                  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                  // $data1=$this->Content_model->FetchAllData();  
                    
                }
              //  $where_in = array('xf_mst_zones.id',$ids_arr);
		        $data['title'] = "Delete Zones";
                $data['ids'] = $ids;
                $data['selected'] = FALSE;
              //  $data['zone'] = $this->Zone_model->getZoneByIdWhereIN($where_in);    
  
		$this->load->view('zone/deleteSelectedZone',$data);
            
        }
        
        
        function deleteAllZoneSuccess(){
            
            $data['project_select'] = $_POST['project'];
			$zones = $this->Zone_model->FetchAllData($_POST['project']);
		
                foreach ($zones as $zone){
					
                   $grids = $this->Zone_model->getZoneAssignedGridsById(trim($zone['id']));
                   
                   foreach ($grids as $grid){
                    $grids_arr[] =   $grid['grid_id'] ;
                   }
                   $grids_str = implode(',', $grids_arr);
                   $data['zones'][] =   array('zone'=>$zone,'grids'=>$grids_str); 
                   //$data['zone']['grids'] =   
                      
                  }
                
					
				$data['title'] = "Delete All Zones";

				$this->load->view('zone/deleteAllZoneSuccess',$data);
				$data['title'] = "Delete All Zones";
				$this->Zone_model->deleteZoneAll($_POST['project']); 

        }
        
        
        
        
        
        
       function getGridsForFloorZones($floorplan){
            
            		
            	    if(isset($_POST['zone'])){
            	    $zone = trim($_POST['zone']);
            	    }else{
            	    $zone = '';
            	    }
		
                   $grids = $this->Zone_model->getGridsForFloorZones($floorplan,$zone);
					if(!empty($grids)){
						$output='';
						foreach($grids as $val){
							$text=$val->grid_id;
							if(!empty($val->zone_type)){
								$zone_type=$val->zone_type;
							}else{
								$zone_type='Unused';
							}
							if(!empty($val->zone_name)){
								$zone_name=$val->zone_name;
								$action='EDIT';
							}else{ 
								$zone_name='NOT ASSIGNED';
								$action='ADD';
							}
							$myclass='';
							$output .='
								<tr> 
									<td style="padding:4px"   class="gridboxtd "'.$myclass.'" id="action_'.$text.'"><a href="#" class="gridbox" style="color:black;" id="get_'.$text.'">'.$text.'</a>
									</td>
								   <td id="type'.$text.'" style="padding:4px">'.$zone_type.'</td>
								   <td id="zname'.$text.'" style="padding:4px">'.$zone_name.'</td>
								   <td id="edit'.$text.'" data-grid="'.$text.'" class="edit_grid chk2" style="padding:4px">'.$action.'</td>                    
	
								</tr>
							';
						}
					}
					echo $output;
                  // echo json_encode(array('response'=>$grids));
                   
    
        }
        
        
        
        function clearAllAssignments($floorplanid){
        
			$return = $this->Zone_model->clearAllAssignments($floorplanid);
        
        } 
		
		function clearAllZoneData($floorplanid){
			$data=array('zone_id'=>NULL,'zone_type'=>NULL,'zone_name'=>NULL);
			$result=$this->Zone_model->saveUpdateAllZoneData($data,$floorplanid);
			
			   if(isset($_POST['zone'])){
            	    $zone = trim($_POST['zone']);
            	    }else{
            	    $zone = '';
            	    }
		
                   $grids = $this->Zone_model->getGridsForFloorZones($floorplanid,$zone);
					if(!empty($grids)){
						$output='';
						foreach($grids as $val){
							$text=$val->grid_id;
							if(!empty($val->zone_type)){
								$zone_type=$val->zone_type;
							}else{
								$zone_type='Unused';
							}
							if(!empty($val->zone_name)){
								$zone_name=$val->zone_name;
								$action='EDIT';
							}else{ 
								$zone_name='NOT ASSIGNED';
								$action='ADD';
							}
							$myclass='';
							$output .='
								<tr> 
									<td style="padding:4px"   class="gridboxtd "'.$myclass.'" id="action_'.$text.'"><a href="#" class="gridbox" style="color:black;" id="get_'.$text.'">'.$text.'</a>
									</td>
								   <td id="type'.$text.'" style="padding:4px">'.$zone_type.'</td>
								   <td id="zname'.$text.'" style="padding:4px">'.$zone_name.'</td>
								   <td id="edit'.$text.'" data-grid="'.$text.'" class="edit_grid chk2" style="padding:4px">'.$action.'</td>                    
	
								</tr>
							';
						}
					}
					echo $output;
        }
        
        
        
        
        
        function deleteSelectedZoneSuccess(){
            
            
                $ids = $_POST['ids'];
                $data['project_select'] = $_POST['project'];
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                 // print_r($where_in); exit;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $zones= $this->Zone_model->getZoneByIdWhereIN($where_in); 
                $data['selected'] = TRUE;
		$data['title'] = "Delete Selected Zones";
		
		
		
		
		 foreach ($zones as $zone){
					
                   $grids = $this->Zone_model->getZoneAssignedGridsById(trim($zone['id']));
                   
                   foreach ($grids as $grid){
                    $grids_arr[] =   $grid['grid_id'] ;
                   }
                   $grids_str = implode(',', $grids_arr);
                   $data['zones'][] =   array('zone'=>$zone,'grids'=>$grids_str); 
                   //$data['zone']['grids'] =   
                      
                  } 
		
		
		
		
		
		
		
		
		$this->Zone_model->deleteZoneByIdWhereIN($where_in); 
		$this->load->view('zone/deleteAllZoneSuccess',$data);
        }
        }
        
       public function deleteAllZones()
	{
		$data['title'] = "Delete All Zones";
		//$data['data1']=$this->Zone_model->FetchAllData();
                $data['project_select'] = $_POST['project'];
                $zones = $this->Zone_model->FetchAllData();
                foreach ($zones as $zone){
                   $grids = $this->Zone_model->getZoneAssignedGridsById(trim($zone['id']));
                   //print_r($zone['id']);
                   foreach ($grids as $grid){
                    $grids_arr[] =   $grid['grid_id'] ;
                   }
                   $grids_str = implode(',', $grids_arr);
                   $data['zones'][] =   array('zone'=>$zone,'grids'=>$grids_str); 
                   //$data['zone']['grids'] =   
                      
                  }
                
                
		$this->load->view('zone/deleteZoneAll',$data);
	}
    
   
    
   

}

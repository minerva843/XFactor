<?php

class Content_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    

        
 


	function saveContentSetMaster($data){
		$this->db->insert('xf_mst_content_set',$data);
                return $this->db->insert_id();

	}

    	function saveFilespath($data){
		$this->db->insert('xf_mst_files',$data);
                return $this->db->insert_id();

	}
	
	function UpdateFilespath($data=NULL,$where=NULL){
		$this->db->where($where);
            $this->db->update('xf_mst_files',$data);
	}
    
        function saUpdatecontent($data,$id){
            $this->db->where('x_content_id',$id);
            $this->db->update('xf_mst_files',$data);
            return $id; 
            
        }
        
        function filterZone($zone_type){
           // $sql = "SELECT  FROM `xf_mst_grid_zone_mapping` JOIN xf_mst_zones ON xf_mst_grid_zone_mapping.zone_id=xf_mst_zones.zone_id where xf_mst_grid_zone_mapping.zone_id;
            
            $zones_ids = $this->getZonesId($zone_type);
            foreach ($zones_ids as $zid){
               $zones_ids_arr[] = $zid['zone_id']; 
            }
             
 
            $this->db->select("grid_id,xf_mst_grid_zone_mapping.zone_id");
            $this->db->where_in('xf_mst_grid_zone_mapping.zone_id',$zones_ids_arr);
            $this->db->join('xf_mst_zones','xf_mst_grid_zone_mapping.zone_id=xf_mst_zones.zone_id');
            $this->db->from('xf_mst_grid_zone_mapping');
            $query = $this->db->get();

            return $query->result_array();
        }  
        
        function saveAddZone($data){
            $this->db->insert('xf_mst_zones',$data);
            return $this->db->insert_id();
            
        }
        
        
        function saveUpdateZone($data,$id){
            $this->db->where('id',$id);
            $this->db->update('xf_mst_zones',$data);
            return $id; 
            
        }
       
       
       function getContentXMId($content_id){
      
               $this->db->select('*');
                $this->db->where('id',$content_id);
		$this->db->from('xf_mst_content_set');
		$query = $this->db->get();
		// print_r($this->db->last_query());
		return $query->row();	
       	
       
       
       }
       
    
    
           function getInfoContentXMId($content_id){
      
               $this->db->select('*');
                $this->db->where('id',$content_id);
		$this->db->from('xf_mst_icon_positions');
		$query = $this->db->get();
		// print_r($this->db->last_query());
		return $query->result();	
       	
       
       
       }   
       
       
       
              function getFloorFile($content_id){
       
                $this->db->select('*');
                $this->db->where('xmanage_id',$content_id);
                $this->db->where('type','image');
		 $this->db->from('xf_mst_files');
		 $this->db->limit(1);
				$this->db->order_by("id", "desc");
		 $query = $this->db->get();
		 return $query->row();	
       }

	   function getContentXMIdFile($id){
       
                $this->db->select('*');
                $this->db->where('xmanage_id',$id);
                $this->db->where('type','image');
				$this->db->limit(1);
				$this->db->order_by("id", "desc");
		 $this->db->from('xf_mst_files');
		 $query = $this->db->get();
		 return $query->result();	
       }
       
       
       function getContentSetIdFromMapping($zone){
                $this->db->select('*');
                $this->db->where('zone_id',$zone);
		$this->db->from('xf_mst_content_zone_mapping');
		$query = $this->db->get();
		return $query->result();
       
       }
	   
	   function getFloorplan($zone){
                $this->db->select('*');
                $this->db->where('id',$zone);
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->row();
       
       }
        
        
        function updateContentIdInIcon($data){
            $this->db->where('flor_plan_id',$data['floor_plan_xid']);
            $this->db->where('zone_id',$data['zone_id']);
            $data2 = array(
            'content_set_id' => $data['contentset_id']
            );
            $this->db->update('xf_mst_icon_positions',$data2);
            
          //print_r($this->db->last_query());
            
         
        }
        
        function updateContentSet($data){
            $this->db->where('id',$data['contentset_id']);
            $data2 = array(
            'flor_plan_id' => $data['floor_plan_xid']
            );
            $this->db->update('xf_mst_content_set',$data2);
            
            $this->updateContentIdInIcon($data);
        }
        
        function FetchAllZonesData(){
		$this->db->select('*');
		$this->db->from('xf_mst_zones');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
        
        
        function searchData($search=NULL,$searchOrderByAsc=NULL,$searchOrderByDesc=NULL,$AllSearchData=NULL,$project=NULL){
            
        
$this->db->select('xf_mst_content_set.*,xf_mst_content_zone_mapping.zone_type,xf_mst_content_zone_mapping.zone_name,xf_mst_project.project_name,xf_mst_floor_plan.floor_plan_id,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.file_size,xf_mst_floor_plan.file_type,xf_mst_floor_plan.file_name,floor_plan_grid_type,floor_plan_drop_point');
		

		 $this->db->from('xf_mst_content_set');
	         $this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_content_set.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_content_set.project_id','left');
	        $this->db->join('xf_mst_content_zone_mapping', 'xf_mst_content_set.id = xf_mst_content_zone_mapping.contentset_id','left');
		

		
		if(!empty($search)){
		$this->db->where($search);
		}
		
		
		if(!empty($project)){
		$this->db->where('xf_mst_content_set.project_id',$project);
		}
		
		
		if(!empty($AllSearchData)){
		
				$this->db->group_start();
				$this->db->like('xf_mst_project.project_name',$AllSearchData);
				$this->db->or_like('xf_mst_project.project_id',$AllSearchData); 
				$this->db->or_like('xf_mst_content_set.content_set_name',$AllSearchData);
				$this->db->or_like('xf_mst_floor_plan.floor_plan_name',$AllSearchData);
				$this->db->or_like('xf_mst_content_set.created_date_time',$AllSearchData);
				$this->db->or_like('xf_mst_content_set.x_content_id',$AllSearchData);
				//$this->db->or_like('p.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
		
		
		}
		
		if(!empty($searchOrderByAsc)){
		 $this->db->order_by($searchOrderByAsc,'ASC');
		}

	       if(!empty($searchOrderByDesc)){
	       $this->db->order_by($searchOrderByDesc,'DESC');
	       }
		 
		 
		$query = $this->db->get();
		//print_r($this->db->last_query()); exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
        
        
        
        
         function getFloorPlanContentSet($project){
            
               $this->db->select('*');
                $this->db->where('project_id',$project);
		$this->db->from('xf_mst_content_set');
		$query = $this->db->get();
		

		return $query->result();
        }
        
        
        
      function getContentForFloorZoneAssignments($floorplan){
               $this->db->select("xf_mst_zones.*,xf_mst_content_zone_mapping.contentset_id,xf_mst_content_set.content_set_name");
               $this->db->where('xf_mst_zones.flor_plan_id',$floorplan);
               $this->db->from('xf_mst_zones');
		$this->db->join('xf_mst_content_zone_mapping','xf_mst_zones.id=xf_mst_content_zone_mapping.zone_id','left');
		$this->db->join('xf_mst_content_set', 'xf_mst_content_set.id = xf_mst_content_zone_mapping.contentset_id','left');
		
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$array  =  $query->result();
                return $array;
        
        }
        
        
        
                function clearAllAssignments($floorplan){
        
        	
        //  $this->db->where('xf_mst_grid_zone_mapping.zone_id',$zone);
          $this->db->where('xf_mst_content_zone_mapping.floor_plan_xid',$floorplan);
          $this->db->delete('xf_mst_content_zone_mapping');	
        
        
        
        }
        
        
        	function saveZoneContentMapping($data){
		$this->db->insert('xf_mst_content_zone_mapping',$data);
                return $this->db->insert_id();

	}
        
        
        
       function deleteZoneContentMapping($where){
        
        $this->db->where($where);
        $this->db->delete('xf_mst_content_zone_mapping');
        
        }
        

        function deleteContentSetDataWhereIn($where_in){
        $this->db->where_in('xf_mst_content_set.id',$where_in);
        $this->db->delete('xf_mst_content_set');
        
        }
        
        
        function deleteContentSetDataByProject($project_id){
        $this->db->where('xf_mst_content_set.project_id',$project_id);
        $this->db->delete('xf_mst_content_set');
        }
        
        
        
       function getIdWhereIN($where_in){
               $this->db->select('xf_mst_content_set.*,xf_mst_project.project_name,xf_mst_project.project_id as xproj,xf_mst_floor_plan.floor_plan_id as xfpid,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.file_size,xf_mst_floor_plan.file_type,xf_mst_floor_plan.file_name,floor_plan_grid_type,floor_plan_drop_point,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');


               $this->db->where_in('xf_mst_content_set.id',$where_in);  
		$this->db->from('xf_mst_content_set');
		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_content_set.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_content_set.project_id','left');
                 $this->db->join('xf_mst_group', 'xf_mst_content_set.group_id = xf_mst_group.id','left');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
        }
        
        
        
        
         function FetchAllDataDel($project=NULL){
             
          	
$this->db->select('xf_mst_content_set.*,xf_mst_project.project_id as xproj,xf_mst_content_zone_mapping.zone_type,xf_mst_content_zone_mapping.zone_name,xf_mst_project.project_name,xf_mst_floor_plan.floor_plan_id as xfpid,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.file_size,xf_mst_floor_plan.file_type,xf_mst_floor_plan.file_name,floor_plan_grid_type,floor_plan_drop_point,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
		
		if(!empty($project)){
		$this->db->where('xf_mst_content_set.project_id',$project);
		}
		
		$this->db->from('xf_mst_content_set');
 		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_content_set.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_content_set.project_id','left');
		
		$this->db->join('xf_mst_content_zone_mapping', 'xf_mst_content_set.id = xf_mst_content_zone_mapping.contentset_id','left');
		  $this->db->join('xf_mst_group', 'xf_mst_content_set.group_id = xf_mst_group.id','left');
		

                //$this->db->join('xf_mst_zones', 'xf_mst_zones.zone_id = xf_mst_content_set.zone_id','left');
                //$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id','left');
                $this->db->group_by('xf_mst_content_set.x_content_id');
		$this->db->order_by('xf_mst_content_set.last_edited_date_time','DESC');
		$query = $this->db->get();
		//print_r($this->db->last_query()); exit;
		$data = $query->result_array();
               
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
	
	function getDataZoneMappingByContentSetId($id=NULL){
              
          	
$this->db->select('xf_mst_zones.*');
		
		
		
		$this->db->from('xf_mst_content_zone_mapping');
		
		$this->db->join('xf_mst_zones', 'xf_mst_zones.id = xf_mst_content_zone_mapping.zone_id','left');
	$this->db->where('xf_mst_content_zone_mapping.contentset_id',$id);
		$query = $this->db->get();
		//print_r($this->db->last_query()); exit;
		$data = $query->result();
               
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
	
	
	
	
	       function FetchAllData($project=NULL){
             
          	
$this->db->select('xf_mst_content_set.*,xf_mst_project.project_id as xproj,xf_mst_content_zone_mapping.zone_type,xf_mst_content_zone_mapping.zone_name,xf_mst_project.project_name,xf_mst_floor_plan.floor_plan_id as xfpid,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.file_size,xf_mst_floor_plan.file_type,xf_mst_floor_plan.file_name,floor_plan_grid_type,floor_plan_drop_point');
		
		if(!empty($project)){
		$this->db->where('xf_mst_content_set.project_id',$project);
		}
		
		$this->db->from('xf_mst_content_set');
 		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_content_set.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_content_set.project_id','left');
		
		$this->db->join('xf_mst_content_zone_mapping', 'xf_mst_content_set.id = xf_mst_content_zone_mapping.contentset_id','left');
		 // $this->db->join('xf_mst_group', 'xf_mst_content_set.group_id = xf_mst_group.id','left');
		

                //$this->db->join('xf_mst_zones', 'xf_mst_zones.zone_id = xf_mst_content_set.zone_id','left');
                //$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id','left');
                $this->db->group_by('xf_mst_content_set.x_content_id');
		$this->db->order_by('xf_mst_content_set.last_edited_date_time','DESC');
		$query = $this->db->get();
		//print_r($this->db->last_query()); exit;
		$data = $query->result_array();
               
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
        
        
		
		
        function getDataVideoById($cid){
            
                $this->db->select('xf_mst_files.*,xf_mst_content_set.*,xf_mst_content_set.id as cid,xf_mst_content_set.flor_plan_id as fpid,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as projectxmid,xf_mst_project.project_name,xf_mst_zones.zone_id as zoneid,xf_mst_zones.zone_name,xf_mst_floor_plan.floor_plan_name');
                $this->db->where('xf_mst_content_set.id',$cid);
                 $this->db->where('xf_mst_files.type','video');
		$this->db->from('xf_mst_files');
                $this->db->join('xf_mst_content_set', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id','left');
                  $this->db->join('xf_mst_group', 'xf_mst_content_set.group_id = xf_mst_group.id','left');
                   $this->db->join('xf_mst_project', 'xf_mst_content_set.project_id = xf_mst_project.id','left');
				   		$this->db->join('xf_mst_content_zone_mapping', 'xf_mst_content_set.id = xf_mst_content_zone_mapping.contentset_id','left');
					$this->db->join('xf_mst_zones', 'xf_mst_zones.id = xf_mst_content_zone_mapping.zone_id','left');
					$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_content_zone_mapping.floor_plan_xid','left');
				$this->db->limit(1);
				$this->db->order_by('xf_mst_files.id','DESC');
		$query = $this->db->get();
		$data = $query->result_array();
               //print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		}   
            
        } 
		function getById($cid){ 
            
                $this->db->select('*');
                $this->db->where('id',$cid);
                 
		$this->db->from('xf_mst_content_set');
		$query = $this->db->get();
		$data = $query->row();
               //print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		}   
            
        }
		
        
        
       function getData($cid){
            
                $this->db->select('xf_mst_files.*');
                $this->db->where('xf_mst_content_set.id',$cid);
		$this->db->from('xf_mst_files');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}   
            
        }
        
        
        function getDataImgById($cid){
                $this->db->select('xf_mst_files.*');
                $this->db->where('xf_mst_content_set.id',$cid);
                 $this->db->where('xf_mst_files.type','image'); 
		$this->db->from('xf_mst_files');
                $this->db->join('xf_mst_content_set', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id');
				$this->db->limit(1);
				$this->db->order_by('xf_mst_files.id','DESC');
		$query = $this->db->get();
		$data = $query->result_array();
          ///      print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		} 
            
        }
		
		
        
        
        
        
        function getDataVideoByXId($cid){
            
                $this->db->select('*');
                $this->db->where('xmanage_id',$cid);
                 $this->db->where('type','video');
		$this->db->from('xf_mst_files');
		$this->db->limit(1);
		$query = $this->db->get();
		$data = $query->result_array();
               //print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		}   
            
        }
		function DeleteAllDataId($id){
            
          $this->db->select('*');
		$this->db->from('xf_mst_content_set');
		$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id');
		$this->db->where_in('xf_mst_content_set.project_id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= 'temp/'.$img->file_name;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
        }
		
		function DeleteVideoDataByMultipleId($cid){
            
                $this->db->select('*');
                $this->db->where('xmanage_id',$cid);
                 $this->db->where('type','video');
				$this->db->from('xf_mst_files');
				$this->db->limit(1);
				$query = $this->db->get();
				$data = $query->result();
					   
				if($data){ 
					foreach($data as $img){
						$uploadurl= 'temp/'.$img->file_name;
						unlink($uploadurl);
						
						
					}
				}else{
					return false;
				}   
            
        }
        
        
        function DeleteImageDataByMultipleId($cid){
                $this->db->select('*');
                $this->db->where('xmanage_id',$cid);
                 $this->db->where('type','image');
		$this->db->from('xf_mst_files');
                $this->db->limit(1);
		$query = $this->db->get();
		$data = $query->result();
		if($data){ 
			foreach($data as $img){
						//$uploadurl= './assets/emailer/'.$img->file_name;
						$uploadurl= 'temp/'.$img->file_name;
						unlink($uploadurl);
						
						
						
					}
		}else{
			return false;
		} 
             
        }
		
		function getDataImgByXId($cid){
                $this->db->select('*');
                $this->db->where('xmanage_id',$cid);
                 $this->db->where('type','image');
		$this->db->from('xf_mst_files');
                $this->db->limit(1);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
             
        }
        
       
        
        
        function FetchDataId($id){
                $this->db->select('xf_mst_files.*');
                $this->db->select('xf_mst_content_set.id',$cid);
		$this->db->from('xf_mst_files');
                $this->db->join('xf_mst_content_set', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        }
	
}
?>

<?php

class Zone_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
  	function getZonesTypes(){

		$this->db->distinct();
		$this->db->select("zone_type");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}
        
          function getZones(){

		$this->db->select("*");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}

         function getZonesdist(){
                 $this->db->distinct();
		$this->db->select("zone_name");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}
        
         function getZonesdist2($project=NULL){
                $this->db->distinct();
		$this->db->select("zone_name,zone_id");
		if(!empty($project)){
		$this->db->where('xf_mst_zones.project_id',$project);
		}
		$this->db->from('xf_mst_zones');
                $this->db->group_by('zone_name');
		$query = $this->db->get();
		return $query->result();
	}
	function saveZoneMapping($data){
		$this->db->insert('xf_mst_grid_zone_mapping',$data);
                return $this->db->insert_id();

	}
        
      
        
        
        function getZoneAssignedGridsById($zone_id){
                $this->db->select("grid_id");
                $this->db->where('zone_id',$zone_id); 
		$this->db->from('xf_mst_grid_zone_mapping');
		$query = $this->db->get();
              //  print_r($this->db->last_query()); exit;
		$array  =  $query->result_array();
		if($array){
                return $array;
		}else
		{
			return false;
		}
            
        }
        
        
        
                
        function getZoneAssignedByProject($projectid){
                $this->db->select("*");
                $this->db->where('project_id',$projectid); 
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
              //  print_r($this->db->last_query()); exit;
		$array  =  $query->result_array();
		if($array){
                return $array;
		}else
		{
			return false;
		}
            
        }
        
        
        
        function filterZoneAssignedList($zone_id,$floorplan){
        $this->db->select('*');
        $this->db->where('zone_id',$zone_id);
        $this->db->where('floor_plan_xid',$floorplan);
        $this->db->from('xf_mst_grid_zone_mapping');
        $query = $this->db->get();
       // print_r($this->db->last_query()); exit;
        return $query->result();
        
        }
                
        
      function getFloorPlanZones($xfp){
            
               $this->db->select('*');
                $this->db->where('flor_plan_id',$xfp);
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		
		///print_r($this->db->last_query()); exit;
		return $query->result();
        }
        
        
        
        function getSelectedZones(){
          
            	$this->db->select("grid_id");
		$this->db->from('xf_mst_grid_zone_mapping');
		$query = $this->db->get();
		$array  =  $query->result();
                $arr = array_column($array,"grid_id");
                return $arr;
            
        }
        
        
        
        function getGridsForFloorZones($floorplan,$zone=''){
        
               $this->db->select("*");
               if(!empty($zone)){
				$this->db->where('zone_id',$zone);
               }
               
               $this->db->where('floor_plan_xid',$floorplan);
			  $this->db->from('xf_mst_grid_zone_mapping');
			  $this->db->order_by("grid_id", "asc");
			  
			  
		$query = $this->db->get();
		$array  =  $query->result();
                return $array;
        
        }
        
        
        function clearAllAssignments($floorplan){
        
        	
        //  $this->db->where('xf_mst_grid_zone_mapping.zone_id',$zone);
          $this->db->where('xf_mst_grid_zone_mapping.floor_plan_xid',$floorplan);
          $this->db->delete('xf_mst_grid_zone_mapping');	
        
        
        
        }
        
        
        function deleteZoneByIdWhereIN($where_in){
         
    
          $this->db->where_in('xf_mst_zones.id',$where_in);
          $this->db->delete('xf_mst_zones');
        
        }
        
        
        function deleteZoneAll($project_id){
       
	   $this->db->where('project_id',$project_id);
          $query=$this->db->delete('xf_mst_zones');
		if($query){
			return true; 
		}else{
			return false;
		}
        
        }
        
        function getZonesId($zone_type){
            $this->db->select("zone_id");
            $this->db->where('zone_name',$zone_type);
            $this->db->from('xf_mst_zones');
            $query = $this->db->get();
            return $query->result_array();
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
        
        
        function getZoneById($id){
                $this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_project.project_name as project_name,xf_mst_floor_plan.file_size,xf_mst_floor_plan.file_type,xf_mst_floor_plan.file_name,xf_mst_floor_plan.floor_plan_grid_type,xf_mst_floor_plan.floor_plan_drop_point,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as proj_id');
                
                
		$this->db->from('xf_mst_zones');
 		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
				$this->db->join('xf_mst_group', 'xf_mst_project.group_id = xf_mst_group.id','left');
				$this->db->where('xf_mst_zones.id',$id);
		$query = $this->db->get();
//print_r($this->db->last_query()); exit;
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
        }

		function getContentSetByZoneId($id){ 
			$this->db->select('xf_mst_content_set.content_set_name');    
			$this->db->from('xf_mst_content_zone_mapping');
			$this->db->join('xf_mst_content_set', 'xf_mst_content_zone_mapping.contentset_id = xf_mst_content_set.id','left');
			$this->db->where('xf_mst_content_zone_mapping.zone_id',$id);
			$query = $this->db->get();
			$data = $query->row();
			if($data){ 
				return $data;
			}else{
				return false;
			} 
        }
        
        
                function getZoneByIdWhereIN($where_in){
                $this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.floor_plan_id as fpid,xf_mst_project.project_id as projectxmid ,xf_mst_project.project_name as project_name,file_size,file_type,file_name,floor_plan_grid_type,floor_plan_drop_point,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
              
             //   if(!empty($where_in)){
                   $this->db->where_in('xf_mst_zones.id',$where_in);  
             //   }
               // print_r($where_in);  exit;
		$this->db->from('xf_mst_zones');
 		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
                $this->db->join('xf_mst_group', 'xf_mst_project.group_id = xf_mst_group.id','left');
		$query = $this->db->get();
                //print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
        }
        
        
        function saveUpdateZone($data,$id){
            $this->db->where('id',$id);
            $this->db->update('xf_mst_zones',$data);
            return $id;  
            
        }

		function saveUpdateAllZoneData($data,$id){
            $this->db->where('floor_plan_xid',$id);
            $data=$this->db->update('xf_mst_grid_zone_mapping',$data);
            return $data; 
            
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
        
        
        function searchZone($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
          	$this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_project.project_name,xf_mst_project.event_start_date_time');
		$this->db->from('xf_mst_zones');
		$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_mst_zones.zone_name',$AllSearchData);
				$this->db->or_like('xf_mst_zones.zone_id',$AllSearchData); 
				$this->db->or_like('xf_mst_zones.zone_type',$AllSearchData);
				$this->db->or_like('xf_mst_floor_plan.floor_plan_name',$AllSearchData);
				$this->db->or_like('xf_mst_zones.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchFloor)){
		$this->db->where($searchFloor);
		}
		
	   
		
		$this->db->where('xf_mst_zones.project_id',$_POST['project']);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC');
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		$query = $this->db->get();
		// print_r($this->db->last_query()); exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
        
        
        
        function deleteZoneMapping($where){
        
        $this->db->where($where);
        $this->db->delete('xf_mst_grid_zone_mapping');
        
        }
        
        
         function FetchAllData($project_id=NULL){
             
             
          	$this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_floor_plan.floor_plan_id as fpid,xf_mst_project.project_id as project_xid,xf_mst_project.project_name as project_name,file_size,file_type,file_name,floor_plan_grid_type,floor_plan_drop_point,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
		 $this->db->from('xf_mst_zones'); 
 		 $this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
	        $this->db->join('xf_mst_group', 'xf_mst_project.group_id = xf_mst_group.id','left');
		if(!empty($project_id)){ 
		$this->db->where('xf_mst_zones.project_id',$project_id);
		}
$this->db->order_by("xf_mst_zones.last_edited_date_time", "desc");
		$query = $this->db->get();
		 //print_r($this->db->last_query()); exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
        
        
 
}
?>

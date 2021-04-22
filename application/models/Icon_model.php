<?php

class Icon_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
 
 
        
        function getZoneIcons($zone){
            
                
                $this->db->select("*");
                $this->db->where('zone_id',$zone);
		$this->db->from('xf_mst_icon_positions');
		$query = $this->db->get();
		return $query->result();
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
       
 
      function delete_icons($icon){
            
            $this->db->where('info_icon_id',$icon);
            $this->db->delete('xf_mst_icon_positions');
            
        }
        
     function saveIcon($data){
                // $this->delete_icons($data['info_icon_id']);
		$this->db->insert('xf_mst_icon_positions',$data);

	}
       
       function savePositionInDB($data){
       //$this->delete_icons($data['info_icon_id']);
      // print_r($data);
       $this->db->where('xf_mst_icon_positions.id',$data['info_icon_id']);
       $this->db->where('xf_mst_icon_positions.zone_id',$data['zone_id']);
       $this->db->where('xf_mst_icon_positions.project_id',$data['project_id']);
       $data2 = array(
       'drag_position'=>$data['drag_position'],
       );
       $this->db->update('xf_mst_icon_positions',$data2);
       
       
     //  print_r($this->db->last_query());
       
       }

	   function updatePositionInDB($data){
       $this->check_duplicate_icon_update_post($data['iconid']);
      // print_r($data);
       $this->db->where('xf_mst_icon_positions.id',$data['iconid']);
       $this->db->where('xf_mst_icon_positions.project_id',$data['project_id']);
       $data2 = array(
       'drag_position'=>NULL,
       ); 
       $this->db->update('xf_mst_icon_positions',$data2);
       
       
     //  print_r($this->db->last_query());
       
       }
	   
	   function check_duplicate_icon_update_post($infoid){
       
       $this->db->where('info_icon',$infoid);
	   $data2 = array(
       'post_id'=>NULL,
       'post_name'=>NULL
       );
          
            //$this->db->delete('xf_mst_content_post_mapping');
      // if($this->db->update('xf_mst_content_post_mapping',$data2))
       if($this->db->delete('xf_mst_content_post_mapping'))
		{
			return true;
		}
		else
		{
			return false;
		}
       
    
       }
	   
	   function updateAssignIcon($infoid){
		   $result=$this->db->get_where('xf_mst_content_post_mapping', array('info_icon' => $infoid))->row();
			   if(empty($result->post_id)){
				   $this->db->where('id',$infoid);
				   $this->db->update('xf_mst_icon_positions',array('drag_position' => NULL));
			   }

       }  
       
        
       // function delete_iconsmapping($infoid){
            // $this->db->where('info_icon',$infoid);
          
            // $this->db->delete('xf_mst_content_post_mapping');
 
       // }
       
       
       
      function deeleteByIdWhereIN($where_in){
		
	$data = array(
	'drag_position'=>NULL,
	'content_set_id'=>NULL
	);
	 $this->db->where_in('xf_mst_icon_positions.id',$where_in); 
	 $this->db->update('xf_mst_icon_positions',$data);
	}
	
	
	function deeleteByProject($project){
       $data = array(
	'drag_position'=>NULL,
	'content_set_id'=>NULL
	);
         $this->db->where('xf_mst_icon_positions.project_id',$project); 
	 $this->db->update('xf_mst_icon_positions',$data);
	
	}
       
       
       
       function savePostIconMapping($data){
      
       //$this->delete_iconsmapping($data['info_icon']);
       
	   if($this->db->insert('xf_mst_content_post_mapping',$data)){
			return true;
		}
		else
		{
			return false; 
		}
	   
       }
       
       
       function FetchDataById($iconid){
       
               $this->db->select('xf_mst_icon_positions.*,xf_mst_zones.zone_name,xf_mst_content_set.content_set_name,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as proj_id,xf_mst_content_post_mapping.post_name,xf_mst_files.file_name');
                $this->db->where('xf_mst_icon_positions.id',$iconid);
                $this->db->where('xf_mst_files.type','image');
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_group', 'xf_mst_icon_positions.group_id = xf_mst_group.id','left');
		
		$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		 
		
		$this->db->join('xf_mst_content_post_mapping', 'xf_mst_icon_positions.id = xf_mst_content_post_mapping.info_icon','left');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_content_set.x_content_id','left');
		 
		$query = $this->db->get();
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
       
       }
       
       
       function getIconPostMapped($icon){
 
       
       }
       
       
       
       function getAllIconsAssignedContents($project=NULL,$content_id=NULL){
       
               $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name');
                if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
		
		 
	        if(!empty($content_id)){ 
		$this->db->where('xf_mst_icon_positions.content_set_id',$content_id);
		}
		
		
		
                $this->db->where('xf_mst_icon_positions.drag_position IS NOT NULL',NULL);
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id','left');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		 
		$query = $this->db->get();
		
		///print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
       
       }
 
 
 function getAllIconsAssigned($project=NULL,$content_id=NULL,$zone_id=NULL){
                $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name');
                if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
		  
		
	        if(!empty($content_id)){ 
		$this->db->where('xf_mst_icon_positions.content_set_id',$content_id);
		}
		
		if(!empty($zone_id)){ 
		$this->db->where('xf_mst_icon_positions.zone_id',$zone_id);
		}
		
		
		
                $this->db->where('xf_mst_icon_positions.drag_position IS NOT NULL',NULL);
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		 
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
 
 }
 
 
 function clearPositionPostNotAssign($where_in){
 $this->db->where_in('id',$where_in);
 $data_udate= array(
 'drag_position'=>NULL
 );
 
 $this->db->update('xf_mst_icon_positions',$data_udate);
 
 }
 
  
 
 function getPositionPostNotAssign($project_id){
 
             $this->db->select('xf_mst_icon_positions.id,xf_mst_content_post_mapping.id as mapid');
               
		$this->db->where('xf_mst_icon_positions.project_id',$project_id);
		
              // $this->db->where('xf_mst_content_post_mapping.zone_id',$zone);
		$this->db->from('xf_mst_icon_positions');
	       // $this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_content_post_mapping', 'xf_mst_icon_positions.id = xf_mst_content_post_mapping.info_icon','left');
		 
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 
 }
 
 
 
  
 function getAllIconsofZoneRight($zone,$project){
                    $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.x_content_id,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name,xf_mst_zones.zone_id as xzone_id');
               if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
               $this->db->where('xf_mst_icon_positions.zone_id',$zone);
		$this->db->from('xf_mst_icon_positions');
	        $this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		 
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
 
 
 
 
 function getAllIconsofZone($zone,$project){
                    $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.x_content_id,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name,xf_mst_zones.zone_id as xzone_id');
               if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
               $this->db->where('xf_mst_icon_positions.zone_id',$zone);
		$this->db->from('xf_mst_icon_positions');
	        $this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		 
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
 
 
  function getByIdWhereIN($ids_arr=NULL,$project=NULL){
 	
     $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.x_content_id,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name,xf_mst_zones.zone_id as xzone_id,xf_mst_project.project_id');
                if(!empty($project)){ 
		 $this->db->where('xf_mst_icon_positions.project_id',$project);
		}
		 if(!empty($ids_arr)){
                   $this->db->where_in('xf_mst_icon_positions.id',$ids_arr);  
                }
               // $this->db->where('xf_mst_icon_positions.drag_position IS NOT NULL',NULL);
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		 
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
		
		
		
		
		
		
		
		
        }
        
     
      /*       function delete_icons($icon){
            
            $this->db->where('info_icon_id',$icon);
            $this->db->delete('xf_mst_icon_positions');
            
        }   
        
         function saveDragIconPosition($data){
                 $this->delete_icons($data['info_icon_id']);
		$this->db->insert('xf_mst_icon_positions',$data);

	}*/
     
        
        function search($searchZone=NULL,$searchOrderBy=NULL,$project_id=NULL){
            
          	$this->db->select('xf_mst_icon_positions.*,xf_mst_zones.zone_name,xf_mst_content_set.content_set_name');
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		 $this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		if(!empty($searchZone)){
		$this->db->where($searchZone);
		}
		$this->db->where('xf_mst_icon_positions.project_id',$project_id);
		if(!empty($searchZone)){
			$this->db->order_by($searchOrderBy);
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
         
        function getAllIcons($project=NULL){
            
                $this->db->select('xf_mst_icon_positions.*');
                		if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
            //    $this->db->where('xf_mst_icon_positions.project_id',$project);
		$this->db->from('xf_mst_icon_positions');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}    
        }
		
		function addnewicon($iconid=NULL,$project=NULL){
            
                $this->db->select('xf_mst_icon_positions.*');
                		 
		$this->db->where('xf_mst_icon_positions.id',$iconid);
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		
            //    $this->db->where('xf_mst_icon_positions.project_id',$project);
		$this->db->from('xf_mst_icon_positions');
		$query = $this->db->get();
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}    
        }
		
		function icon_adjustment($boxNum=NULL){
            
                $this->db->select('*');
		
             $this->db->where('icon_number',$boxNum);
		$this->db->from('xf_mst_icon_adjustment');
		$query = $this->db->get();
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}    
        }
        
         function FetchAllData($project=NULL){
             
             
           	     $this->db->select('xf_mst_icon_positions.*,xf_mst_content_set.x_content_id,xf_mst_content_set.content_set_name,xf_mst_zones.zone_name,xf_mst_zones.zone_id as xzone_id,xf_mst_project.project_id');
		$this->db->from('xf_mst_icon_positions');
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
               $this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
               $this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		
		if(!empty($project)){ 
		$this->db->where('xf_mst_icon_positions.project_id',$project);
		}
//		if(!empty($searchFloorOrderBy)){ 
//			$this->db->order_by($searchFloorOrderBy);
//		}
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

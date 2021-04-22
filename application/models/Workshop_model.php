<?php

class Workshop_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
   
 
        
        
   
        
        
        function deleteMappingWorkshop($workshopid){
        
    
          $this->db->where_in('workshop_guest_assign.workshop_id',$workshopid);
          $this->db->delete('workshop_guest_assign');
        
        }
        
        
        function FetchAllChatGroups($project_id){
        
        
                $this->db->select('*');
                $this->db->where('project_id',$project_id);
		$this->db->from('xf_mst_chat_groups');
		$this->db->order_by("group_chat_name", "ASC");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
        
        
        }
        
        
        

        
        function saveAddZone($data){
            $this->db->insert('xf_mst_workshop',$data);
            return $this->db->insert_id();
            
        }
        
        
        function FetchDataById($id){
                $this->db->select('xf_mst_workshop.*,xf_mst_project.project_id as proj_id,xf_mst_group.group_name,xf_mst_group.status as group_status');
                
                
		$this->db->from('xf_mst_workshop');
 		$this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
 		$this->db->join('xf_mst_group', 'xf_mst_workshop.group_id = xf_mst_group.id','left');
		
		$this->db->where('xf_mst_workshop.id',$id);
		$query = $this->db->get();
 
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
        }
		
		function FetchAllOnlineDataById($id){
			$user_id=$this->session->userdata('user_id'); 
                $this->db->select('xf_guest_users.*,users.avatar');
		$this->db->from('workshop_guest_assign');
 		$this->db->join('xf_mst_workshop', 'xf_mst_workshop.id = workshop_guest_assign.workshop_id','left');
 		$this->db->join('xf_guest_users', 'xf_guest_users.id = workshop_guest_assign.guest_id','left');
 		$this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
		$this->db->join('users', 'xf_guest_users.user_id = users.id');
		$this->db->where('workshop_guest_assign.workshop_id',$id);
		$this->db->where('xf_guest_users.user_id !=',$user_id);
		$this->db->where('DATE_FORMAT(users.last_login,"%Y-%m-%d")',date('Y-m-d'));
		$this->db->order_by("workshop_guest_assign.id", "desc");
		$query = $this->db->get();
 
		$data = $query->result();
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
        
        
        function search($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
          	$this->db->select('xf_mst_workshop.*');
		$this->db->from('xf_mst_workshop');
		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_mst_workshop.workshop_name',$AllSearchData);
				$this->db->or_like('xf_mst_workshop.workshop_xm_id',$AllSearchData); 
				$this->db->or_like('xf_mst_workshop.location',$AllSearchData);
				//$this->db->or_like('xf_mst_workshop.floor_plan_name',$AllSearchData);
				//$this->db->or_like('xf_mst_workshop.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchFloor)){
		$this->db->where($searchFloor);
		}
		
	   
		
		$this->db->where('xf_mst_workshop.project_id',$_POST['project']);
		
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
             
             
          	$this->db->select('xf_mst_workshop.*,xf_mst_project.project_id as project_xid,xf_mst_project.project_name as project_name,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
		 $this->db->from('xf_mst_workshop'); 
 		// $this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
	        $this->db->join('xf_mst_group', 'xf_mst_workshop.group_id = xf_mst_group.id','left');
		if(!empty($project_id)){ 
		$this->db->where('xf_mst_workshop.project_id',$project_id);
		}
$this->db->order_by("xf_mst_workshop.last_edited_date_time", "desc");
		$query = $this->db->get();
		 //print_r($this->db->last_query()); exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
	
	function FetchworkshopAllData($project_id=NULL){
             $this->db->select('*');
			 $this->db->from('xf_guest_users');
             $this->db->where('project_id',$project_id);
             $this->db->where('user_id',$this->session->userdata('user_id'));
			 $this->db->order_by("id", "desc");
			 $query1 = $this->db->get();
			 $result=$query1->row(); 
			 
			 if(!empty($result)){ 
				$guest_id=$result->id;
				$this->db->select('xf_mst_workshop.*,xf_mst_project.project_id as project_xid');
				 $this->db->from('xf_mst_workshop'); 
				// $this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
						$this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
					$this->db->join('workshop_guest_assign', 'workshop_guest_assign.workshop_id = xf_mst_workshop.id','left');
				
				$this->db->where('workshop_guest_assign.guest_id',$guest_id);
				$this->db->where('xf_mst_workshop.project_id',$project_id);
				
				$this->db->order_by("xf_mst_workshop.last_edited_date_time", "desc");
				$query = $this->db->get();
				 //print_r($this->db->last_query()); exit;
				$data = $query->result_array();
				if($data){ 
					return $data;
				}else{
					return false;
				}
			 }else{
				 return false;
			 }
          	 
	}
	
	
	function getWorkshopByIdWhereIN($where_in){
	
	
	         $this->db->select('xf_mst_workshop.*,xf_mst_project.project_id as projectxmid ,xf_mst_project.project_name as project_name,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
              
            
                $this->db->where_in('xf_mst_workshop.id',$where_in);  
              
		$this->db->from('xf_mst_workshop');
 		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
                $this->db->join('xf_mst_group', 'xf_mst_workshop.group_id = xf_mst_group.id','left');
		$query = $this->db->get();
             //   print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	function deeleteWorkshopByIdWhereIN($where_in){
	
	 $this->db->where_in('xf_mst_workshop.id',$where_in); 
	 $this->db->delete('xf_mst_workshop');
	
	
	}
	
	
	function deeleteWorkshopByProject($project){
	
         $this->db->where_in('xf_mst_workshop.project_id',$project); 
	 $this->db->delete('xf_mst_workshop');
	
	}
	
	
	function editWorkshopById($data,$id){
	
	 $this->db->where('xf_mst_workshop.id',$id); 
	 $this->db->update('xf_mst_workshop',$data);
	
	}
	
	
	function saveWorkShopmapping($data){
	
	
	$this->db->insert('workshop_guest_assign',$data);
	
	}
	
	
	function updateWorkshopUrl($data,$id){
	$this->db->where('id',$id);
	$this->db->update('xf_mst_workshop',$data);
	
	}
        
        
        function deleteAllfloor()
	{
//		$query=$this->db->empty_table('xf_mst_zones');
		if($query){
			return true; 
		}else{
			return false;
		}
	}
	
	
	
	
	     function deleteJunkRecordWorkshop($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_workshop');
		$this->deleteJunkRecordWorkshopMapping($id);
		if($data){
			return true;
		}else{
			return false;
		}
		
		
    }	
    
    
    	     function deleteJunkRecordWorkshopMapping($id){
     
		$this->db->where('workshop_id',$id);
		$data=$this->db->delete('workshop_guest_assign');
		if($data){
			return true;
		}else{
			return false;
		}
		
		
    }
	
	
	
}
?>

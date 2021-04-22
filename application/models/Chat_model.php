<?php

class Chat_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
   

        function deleteMappingChatGroup($groupchatid){
          $this->db->where_in('chat_group_guest_assign.chat_group_id',$groupchatid);
          $this->db->delete('chat_group_guest_assign');
        
        }
        

        function saveAddChatGroup($data){
            $this->db->insert('xf_mst_chat_groups',$data);
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
        
        
        
        function FetchGroupDataById($id){
        	
                $this->db->select('*');
		$this->db->from('xf_mst_chat_groups');
		$this->db->where('xf_mst_chat_groups.id',$id);
		$query = $this->db->get();
 
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        }
		
		function FetchAllGroupData()
		{
			$this->db->select('*');
			$this->db->from('xf_mst_chat_groups');
			$this->db->join('chat_group_guest_assign' , 'xf_mst_chat_groups.id = chat_group_guest_assign.chat_group_id');
			$query = $this->db->get();
	 
			$data = $query->result_array();
			if($data){ 
				return $data;
			}else{
				return false;
			}
		}
		
		function FetchUser($id){
        	
                $this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.id',$id);
		$query = $this->db->get();
 
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        }
        
        
        
		
		function FetchAllOnlineDataById($id){
			$email=$this->session->userdata('email'); 
                $this->db->select('xf_guest_users.*');
		$this->db->from('workshop_guest_assign');
 		$this->db->join('xf_mst_workshop', 'xf_mst_workshop.id = workshop_guest_assign.workshop_id','left');
 		$this->db->join('xf_guest_users', 'xf_guest_users.id = workshop_guest_assign.guest_id','left');
 		$this->db->join('xf_mst_project', 'xf_mst_workshop.project_id = xf_mst_project.id','left');
		$this->db->join('users', 'xf_guest_users.user_id = users.id');
		$this->db->where('workshop_guest_assign.workshop_id',$id);
		$this->db->where('xf_guest_users.email !=',$email);
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
        
   //Rajeev: Updated to get data from view instead of Guest table to handle condition of data in either Guest or Chat table
   
       function getChatGroupByIdWhereIN($where_in,$project){
/*
         $this->db->select('xf_guest_users.*,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as projx_id');
		if(!empty($where_in)){
                   $this->db->where_in('xf_guest_users.id',$where_in);  
                }
  
		$this->db->from('xf_guest_users');
		 $this->db->join('xf_mst_group', 'xf_guest_users.group_id = xf_mst_group.id','left');
		$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_guest_users.project_id','left');
*/		

		$this->db->select('xf_vw_chatusers.*,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as projx_id');

		if(!empty($where_in)){
			$this->db->where_in('xf_vw_chatusers.id',$where_in);  
		}

		$this->db->from('xf_vw_chatusers');
		$this->db->join('xf_mst_group', 'xf_vw_chatusers.group_id = xf_mst_group.id');
		$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_vw_chatusers.project_id');
		
		$this->db->where('xf_vw_chatusers.project_id',$project);

		$query = $this->db->get();
		

		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        }
        
        
        function getChatCreateInfo($id){
        	
			$this->db->select('xf_mst_chat_groups.*,xf_mst_group.group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as xproj');
			$this->db->where('xf_mst_chat_groups.id',$id);  
			$this->db->from('xf_mst_chat_groups');

			$this->db->join('xf_mst_group', 'xf_mst_chat_groups.group_id = xf_mst_group.id','left');
			$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_chat_groups.project_id','left');

			$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        }
        
        
        function doChatGroupEnableDisableByIdWhereIN($where_in,$action,$data_source=NULL){
			if($action=='ENABLE'){
                $data = array(
                'chat_enable'=>1
                );
                }else{
                $data = array(
                'chat_enable'=>0
                );
                }
			if($data_source=='GUEST'){
				if(!empty($where_in)){
					   $this->db->where_in('xf_guest_users.id',$where_in);  
					}
				$this->db->update('xf_guest_users',$data);
			}else{
				if(!empty($where_in)){
					   $this->db->where_in('xf_chat_users.id',$where_in);  
					}
				$this->db->update('xf_chat_users',$data);
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
	
	
	
	function FetchAllDataChatGroups($project_id=NULL){
	
	  	$this->db->select('xf_mst_chat_groups.*');
		$this->db->from('xf_mst_chat_groups'); 

		if(!empty($project_id)){ 
			$this->db->where('xf_mst_chat_groups.project_id',$project_id);
		}
		$this->db->order_by("xf_mst_chat_groups.last_edited_date_time", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	}


	function GroupUsersCount($chat_group_id)
	{
		$this->db->select('chat_group_guest_assign.*');
		$this->db->from('chat_group_guest_assign');
		$this->db->where('chat_group_guest_assign.chat_group_id',$chat_group_id);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
        
        
        
        
        
       function FetchAllDataChatGroupsJoin($project_id=NULL){
	
	  	$this->db->select('xf_mst_chat_groups.*,xf_mst_group.group_name,xf_mst_group.status as group_status,xf_mst_project.project_id as xproject_id');
		 $this->db->from('xf_mst_chat_groups'); 
 		// $this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_chat_groups.project_id = xf_mst_project.id','left');
	        $this->db->join('xf_mst_group', 'xf_mst_chat_groups.group_id = xf_mst_group.id','left');
		if(!empty($project_id)){ 
		$this->db->where('xf_mst_chat_groups.project_id',$project_id);
		}
$this->db->order_by("xf_mst_chat_groups.last_edited_date_time", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	}
        
        
        
        
        function searchGroupCHatData($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
          	$this->db->select('xf_mst_chat_groups.*');
		$this->db->from('xf_mst_chat_groups');
		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_mst_chat_groups.group_chat_name',$AllSearchData);
				//$this->db->or_like('xf_mst_chat_groups.workshop_xm_id',$AllSearchData); 
				//$this->db->or_like('xf_mst_chat_groups.location',$AllSearchData);
				//$this->db->or_like('xf_mst_workshop.floor_plan_name',$AllSearchData);
				//$this->db->or_like('xf_mst_workshop.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchFloor)){
		$this->db->where($searchFloor);
		}
		
	   
		
		$this->db->where('xf_mst_chat_groups.project_id',$_POST['project']);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC');
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		$query = $this->db->get();
		
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
	
	
	function getGroupChatByIdWhereIN($where_in){
	
	
	         $this->db->select('xf_mst_chat_groups.*,xf_mst_project.project_id as projectxmid ,xf_mst_project.project_name as project_name,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
              
            
                $this->db->where_in('xf_mst_chat_groups.id',$where_in);  
              
		$this->db->from('xf_mst_chat_groups');
 		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
                $this->db->join('xf_mst_project', 'xf_mst_chat_groups.project_id = xf_mst_project.id','left');
                $this->db->join('xf_mst_group', 'xf_mst_chat_groups.group_id = xf_mst_group.id','left');
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	
	
	
	function deeleteGroupChatByIdWhereIN($where_in){
	
	 $this->db->where_in('xf_mst_chat_groups.id',$where_in); 
	 $this->db->delete('xf_mst_chat_groups');
	}
	
	
	function deeleteGroupChatByProject($project){
	
         $this->db->where('xf_mst_chat_groups.project_id',$project); 
	 $this->db->delete('xf_mst_chat_groups');
	
	}
	
	
	function editChatGroupById($data,$id){
	
	 $this->db->where('xf_mst_chat_groups.id',$id); 
	 $this->db->update('xf_mst_chat_groups',$data);
	
	}
	
	
	function saveGroupChatpmapping($data){
	
	$this->db->insert('chat_group_guest_assign',$data);
	
	}
	
	
	function updateWorkshopUrl($data,$id){
	$this->db->where('id',$id);
	$this->db->update('xf_mst_workshop',$data);
	
	}
        
        

//Rajeev: updated to get data from both guest as well as chat users table to handle no registration cases ->28Feb

	function getusers($project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_vw_chatusers');
		$this->db->where_in('xf_vw_chatusers.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function getusersDetails($id)
	{
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where_in('xf_guest_users.mm_id',$id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
//Rajeev: updated to get data from view instead of guest table -28-Feb

	function searchusers($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
        $this->db->select('xf_vw_chatusers.*');
  		$this->db->from('xf_vw_chatusers');
	
		
		if(!empty($project)){ 
		$this->db->where('xf_vw_chatusers.project_id',$project);
		}
		//$this->db->where('xf_guest_users.chat_channels >',0);
		if(!empty($searchFloor)){
			$this->db->where($searchFloor);
			}
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_vw_chatusers.first_name',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.last_name',$AllSearchData); 
				$this->db->or_like('xf_vw_chatusers.guest_type',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.email',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.phone',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.company',$AllSearchData);
				$this->db->group_end();
		} 


			
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC');
		}
		if(!empty($searchDataOrderByAsc)){
			 $this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		$query = $this->db->get();
		//print_r($this->db->last_query()); die;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
        
        
        
    function deleteJunkRecordGroupChat($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_chat_groups');
		$this->deleteJunkRecordGroupChatUsers($id);
		if($data){
			return true;
		}else{
			return false;
		}
		
		
    }
    
    
        function deleteJunkRecordGroupChatUsers($id){
     
		$this->db->where('chat_group_id',$id);
		$data=$this->db->delete('chat_group_guest_assign');
		if($data){
			return true;
		}else{
			return false;
		}
		
		
    }
    
    
    
    function getOldUpdateData($id){
		$this->db->select('tmp_edit_cache.*');
		$this->db->from('tmp_edit_cache');
		$this->db->where('tmp_edit_cache.pk_id',$id);
		$this->db->where('tmp_edit_cache.module_name','CHAT');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
     }
     
     	function updateOldData($id,$data){
	$this->db->where('id',$id);
	$this->db->update('xf_mst_chat_groups',$data);
	
	}
        
  // added by Rajeev to get the list of all chat users - 28-Feb-2021      

     function FetchChatUsersList($project=NULL,$group=NULL,$searchOrderBy=NULL){
	
		$this->db->select('xf_vw_chatusers.*');
		$this->db->from('xf_vw_chatusers');

		
		if(!empty($project)){ 
			$this->db->where('xf_vw_chatusers.project_id',$project);
		}
		if(!empty($group)){ 
			$this->db->where('xf_vw_chatusers.group_id',$group);
		}
		
		
 		if(!empty($searchOrderBy)){
 			$this->db->order_by($searchOrderBy);
 		}else{
 		
 		$this->db->order_by('xf_vw_chatusers.last_edited_date_time','desc');
 		
 		}
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
// End Function	FetchChatUsersList

// added by Rajeev to get the list of all chat users - 28-Feb-2021  

      function searchChatUsers($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL,$searchDataOrderByDsc=NULL){
            
		$this->db->select('xf_vw_chatusers.*');
		$this->db->from('xf_vw_chatusers');
			
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_vw_chatusers.first_name',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.last_name',$AllSearchData); 
				$this->db->or_like('xf_vw_chatusers.guest_type',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.email',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.email',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.phone',$AllSearchData);
				$this->db->or_like('xf_vw_chatusers.company',$AllSearchData);				

				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
			$this->db->where($searchGuestType);
		}

		$this->db->where('xf_vw_chatusers.project_id',$_POST['project']);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'ASC');
		}
		if(!empty($searchDataOrderByAsc)){
			 $this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		
		if(!empty($searchDataOrderByDsc)){
			 $this->db->order_by($searchDataOrderByDsc,'DESC');
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

// Rajeev: get data for chat_users table as no data found in Guest -28-Feb-2021

	function FetchUserDataById($id,$project){
		$this->db->select('xf_chat_users.*,users.*,users.last_edit_datetime last_edited_date_time, users.last_edit_ip_address last_edited_ip_address, users.last_edit_xmanage_id last_edited_xmanage_id,users.last_edit_username last_edited_username,users.created_datetime created_date_time,prj.project_id as projectID,grp.group_name,grp.status as group_status,grp.id as gro_id');
//		$this->db->select('users.*');
		$this->db->from('xf_chat_users');
		$this->db->join('users', 'xf_chat_users.user_id = users.id');
		$this->db->join('xf_mst_project as prj' , 'xf_chat_users.project_id = prj.id');
		$this->db->join('xf_mst_group as grp' , 'xf_chat_users.group_id = grp.id');
		$this->db->where('xf_chat_users.id',$id);
		$this->db->where('xf_chat_users.project_id',$project);
			
		
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
// End FetchUserDataById
	
}

<?php

class Usermanage_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
   


                
        function FetchDataById($id){
                $this->db->select('xf_mst_group.*');
                
		$this->db->from('xf_mst_group');
 		
		$this->db->where('xf_mst_group.id',$id);
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
		$this->db->from('xf_mst_group');
		$this->db->where('xf_mst_group.id',$id);
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
		

        

        
        
        function getGroupCreateInfo($id){
        	
        	   $this->db->select('xf_mst_group.*');
                   $this->db->where('xf_mst_group.id',$id);  
		   $this->db->from('xf_mst_group');
		
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        }
        
        
        
        function getGroupCreateInfoWithTabs($id){
        	  	
        	 $sql ="SELECT t1.*,t2.`config_page`,GROUP_CONCAT(t2.`tab_name`) as tabs FROM xf_mst_group as t1 LEFT JOIN xf_module_mst as t2 ON find_in_set(t2.id,t1.confg_tabs) WHERE t1.id=".$id." GROUP BY t1.id";
        	 $query = $this->db->query($sql);
                $data =  $query->result_array();
              //  print_r($this->db->last_query());  exit; 
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        }
        
        

	
	
	function FetchAllDataUserGroups(){
	
	  	$this->db->select('xf_mst_group.*');
		$this->db->from('xf_mst_group'); 
		
		$this->db->order_by("xf_mst_group.created_date_time", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	}

 

        
        
        
        
        function searchGroupUserData($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
          	$this->db->select('xf_mst_group.*,count(users_groups.id) as usercount');
		$this->db->from('xf_mst_group');
		$this->db->join('users_groups', 'users_groups.group_id = xf_mst_group.id','left');
		if(!empty($AllSearchData)){ 
				$this->db->group_start(); 
				$this->db->like('xf_mst_group.group_name',$AllSearchData);
				$this->db->or_like('xf_mst_group.ugxid',$AllSearchData); 
				$this->db->group_end();
		} 
		if(!empty($searchFloor)){
		$this->db->where($searchFloor);
		}
		 
	   
		
		//$this->db->where('xf_mst_chat_groups.project_id',$_POST['project']);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC');
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		$this->db->group_by('xf_mst_group.id');
		$this->db->order_by('xf_mst_group.last_edited_date_time','DESC');
		$query = $this->db->get();
		
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
        
  
        function deleteUserGroupid($userid,$user_group){
        
        $this->db->where('users_groups.user_id',$userid);
		$this->db->where('users_groups.group_id',$user_group);
        $this->db->delete('users_groups');
        
        }
        
        
         function FetchAllData(){
             
             
          	$this->db->select('xf_mst_group.*');
		$this->db->from('xf_mst_group'); 
 		
               $this->db->order_by("xf_mst_group.last_edited_date_time", "desc");
		$query = $this->db->get();
		 //print_r($this->db->last_query()); exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
	
	
	function getGroupUsersByIdWhereIN($where_in){

	        $this->db->select('xf_mst_group.*');
                $this->db->where_in('xf_mst_group.id',$where_in);  
		$this->db->from('xf_mst_group');
 		 
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	function deeleteUsersGroupsByIdWhereIN($where_in){
		
                $this->db->where_in('xf_mst_group.id',$where_in);  
		$this->db->delete('xf_mst_group');
 		 
		 
	
	
	}
	
	
	
		function deeleteUsersGroupsAll(){
		
               // $this->db->where_in('xf_mst_group.id',$where_in);  
		$this->db->delete('xf_mst_group');
 		 
		 
	
	
	}
	
	
	function getUsersByIdWhereINMain($where_in){
	
	
		$this->db->select('users.*');
                $this->db->where_in('users.id',$where_in);  
		$this->db->from('users');
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query()); exit;
		if($data){ 
			return $data;
		}else{
			return false;
		}

	}
	
	
	
	
     function getUsersByIdWhereINMainFileUpload($where_in){
	
	
		$this->db->select('users_upload_history.*');
                $this->db->where_in('users_upload_history.id',$where_in);  
		$this->db->from('users_upload_history');
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());
		if($data){ 
			return $data;
		}else{
			return false;
		}

	}
	
	
	
	function getGroupUersmapped($group_id){
	  
	        $this->db->select('users_groups.*,users.first_name,users.last_name,users.email,users.phone,users.id as uid');
                $this->db->where_in('users_groups.group_id',$group_id);  
		$this->db->from('users_groups');
 		$this->db->join('users', 'users.id = users_groups.user_id');
		$query = $this->db->get();
		$data = $query->result_array();
		
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	function getGroupUersmappedCount($group_id){
	  
	        $this->db->select('users_groups.*');
                $this->db->where_in('users_groups.group_id',$group_id);  
		$this->db->from('users_groups');
 		
		$rows = $this->db->get()->num_rows();
		//$data = $query->result_array();
		
		if($rows){ 
			return $rows;
		}else{
			return 0;
		} 
	
	
	}
	
	
	function getGroupUersmappedCountinGroup($group_id){
	
	        $this->db->select('users_groups.*,users.id as userid');
                 
               // $this->db->where('users.active',1);  
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
 		$this->db->where('users_groups.group_id',$group_id);
		$rows = $this->db->get()->num_rows();
		if($rows){ 
			return $rows;
		}else{
			return 0;
		} 
	
	
	}
	
	
	
	
		function getGroupsMappedOnUsersmain($userid){
	
		$this->db->select('xf_mst_group.*,users_groups.group_id as grpid,users_groups.user_id as uidg');
                $this->db->where('users_groups.user_id',$userid);   
		$this->db->from('users_groups');
		$this->db->join('xf_mst_group', 'xf_mst_group.id = users_groups.group_id');
 		$this->db->order_by('xf_mst_group.id','desc');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return 0;
		} 

	}
	
	
	
		function getGroupUersmappedCountSuspend($group_id){
	
	       $this->db->select('users_groups.*,users.id as userid');
               
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
 		 $this->db->where('users_groups.group_id',$group_id); 
               $this->db->where('users.active',0);  
		$rows = $this->db->get()->num_rows();
		if($rows){ 
			return $rows;
		}else{
			return 0;
		} 
	
	
	}
	
	
	
	function getGroupUersmappedCountLive($group_id){
	
	        $this->db->select('users_groups.*,users.id as userid');
               
		$this->db->from('users');
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
 		 $this->db->where('users_groups.group_id',$group_id); 
                $this->db->where('users.active',1);  
		$rows = $this->db->get()->num_rows();
		if($rows){ 
			return $rows;
		}else{
			return 0;
		} 
	
	
	
	}
	
	
     function saveAddUserGroup($data){
            $this->db->insert('xf_mst_group',$data);
            return $this->db->insert_id();
            
        }
	
	
	function updateUserGroupid($data){
	       $this->db->select('users_groups.*');
		$this->db->from('users_groups');
		$this->db->where('users_groups.user_id',$data['user_id']);
		$this->db->where('users_groups.group_id',$data['group_id']);
		
		
		$query = $this->db->get();
		$data2 = $query->row();
		if(empty($data2)){
		$this->db->insert('users_groups',$data);
		}
	
	
	
	}
	
	function updateUserGroupConfigid($data){
		
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('group_id',$data['group_id']);
	$this->db->update('users_groups',array('group_admin'=>$data['value']));
	
	}
	
	
	
	function FetchUsertableDataById($id){
 
		$this->db->select('users.*,users_groups.group_id,users_groups.group_admin');
		$this->db->from('users');
		//$this->db->join('users_groups', 'xf_mst_group.id = users_groups.group_id');
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
		$this->db->where('users.id',$id); 
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	 
	function FetchUserGroupDataById($id){ 
		$this->db->select('*');
		$this->db->from('xf_mst_group');
		$this->db->join('users_groups', 'xf_mst_group.id = users_groups.group_id');
		$this->db->join('users', 'users.id = users_groups.user_id');
		$this->db->where('users.id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false; 
		}
	}
	
	
		function FetchUserGroupDataByName($name){ 
		$this->db->select('*');
		$this->db->from('xf_mst_group'); 
		$this->db->where('xf_mst_group.group_name',$name);
		$query = $this->db->get();
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false; 
		}
	}
	
	
	
	// function FetchUserProjectDataById($id){ 
		// $this->db->select('p.*');
		// $this->db->from('xf_mst_project as p');
		// $this->db->join('xf_guest_users', 'xf_guest_users.user_id = users.id');
		// $this->db->join('users', 'users.id = users_groups.user_id');
		// $this->db->where('users.id',$id);
		// $query = $this->db->get();
		// $data = $query->result();
		// if($data){ 
			// return $data;
		// }else{
			// return false;
		// }
	// }
	
	
	

	
	
	
function FetchAllDataUsersData(){
	
	 
	        $this->db->select('*');
		$this->db->from('users');
	       $this->db->order_by('last_edit_datetime','desc');
 		$query = $this->db->get();
 		
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	
	}
	
	
	
	
	
	
	function FetchAllDataUsersDataNotAssign($usergroup){
	
	 
		
		$sql = "SELECT `users_groups`.`group_id`, `users`.*, `users_groups`.`id` as `uid` FROM `users` LEFT JOIN `users_groups` ON `users`.`id` = `users_groups`.`user_id` WHERE `users`.`id` NOT IN(SELECT users_groups.user_id from users_groups where users_groups.group_id=$usergroup) GROUP BY users.id ORDER BY `users`.`last_edit_datetime` DESC";
	
	//$this->db->order_by('last_edit_datetime','desc');
	       
 		$query = $this->db->query($sql);
               //return $query->result_array();
 		//print_r($this->db->last_query());
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 

	}
	
	
	
	function FetchAllDataUsersDataMAin(){
	
		$this->db->select('users.*');
		$this->db->from('users');
	
 		$query = $this->db->get();
 		
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	function FetchAllDataUsersDataMAinFileUpload(){
	
	        $this->db->select('users_upload_history.*');
		$this->db->from('users_upload_history');
	
 		$query = $this->db->get();
 		
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	
		function FetchAllDataUsersDataAssignedConfig($group_id){
	
	
	        $this->db->select('users.*,users_groups.user_id,users_groups.group_id,users_groups.group_admin');
		$this->db->from('users_groups');
		$this->db->join('users', 'users.id = users_groups.user_id');
	       $this->db->where('users.user_type','GROUPA');
	       $this->db->where('users_groups.group_id',$group_id);
		   $this->db->order_by('users.last_edit_datetime','DESC');
 		$query = $this->db->get();
 		
 		
 	
		$data = $query->result_array();
		
		if($data){ 
			return $data;
		}else{
			return false;
		}  
	
	
	
	}
	
	function FetchAllDataUsersDataAssigned($group_id){
	
	
	        $this->db->select('users.*,users_groups.user_id,users_groups.group_id,users_groups.group_admin');
		$this->db->from('users_groups');
		$this->db->join('users', 'users.id = users_groups.user_id');
	       $this->db->where('users_groups.group_id',$group_id);
		   $this->db->order_by('users.last_edit_datetime','DESC');
 		$query = $this->db->get();
 		
 		
 	
		$data = $query->result_array();
		
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	
	}
	
	
	

	
	
	
	
	
	
	     function searchUsersMainAssigned($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchDataOrderByDsc=NULL,$group_id){
            
                $this->db->select('users.*,users_groups.user_id,users_groups.group_id,users_groups.group_admin');
          	
		$this->db->from('users_groups');
		$this->db->join('users', 'users.id = users_groups.user_id');
				
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('users.first_name',$AllSearchData);
				$this->db->or_like('users.last_name',$AllSearchData); 
				$this->db->or_like('users.username',$AllSearchData);
				$this->db->or_like('users.display_name',$AllSearchData);
				$this->db->or_like('users.email',$AllSearchData);
				$this->db->or_like('users.phone',$AllSearchData);
				$this->db->or_like('users.company',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}
		
		
		$this->db->where('users_groups.group_id',$group_id);
		
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
		 
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }

		function searchUsersMainAssignedConfig($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchDataOrderByDsc=NULL,$group_id){
            
                $this->db->select('users.*,users_groups.user_id,users_groups.group_id,users_groups.group_admin');
          	
		$this->db->from('users_groups');
		$this->db->join('users', 'users.id = users_groups.user_id');
				
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('users.first_name',$AllSearchData);
				$this->db->or_like('users.last_name',$AllSearchData); 
				$this->db->or_like('users.username',$AllSearchData);
				$this->db->or_like('users.display_name',$AllSearchData);
				$this->db->or_like('users.email',$AllSearchData);
				$this->db->or_like('users.phone',$AllSearchData);
				$this->db->or_like('users.company',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}
		$this->db->where('users.user_type','GROUPA');
		
		$this->db->where('users_groups.group_id',$group_id);
		
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
		 
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
	
	
	
	
	
	
	      function searchUsersMain($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchDataOrderByDsc=NULL,$usergroup=NULL){
            
                $this->db->select('users.*');
          	
		$this->db->from('users');
		//$this->db->join('users_groups', 'users.id = users_groups.user_id');
				
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('users.first_name',$AllSearchData);
				$this->db->or_like('users.last_name',$AllSearchData); 
				$this->db->or_like('users.username',$AllSearchData);
				$this->db->or_like('users.display_name',$AllSearchData);
				$this->db->or_like('users.email',$AllSearchData);
				$this->db->or_like('users.phone',$AllSearchData);
				$this->db->or_like('users.company',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}
		// if(!empty($usergroup)){
		// $this->db->where('users_groups.group_id',$usergroup);
		// }

		
		
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
		 
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
	
	
	
	
	
	function updateTabsinGroup($user_group,$ids){
	
	$data = array(
	'confg_tabs'=>$ids
	);
	$this->db->where('id',$user_group);
	$this->db->update('xf_mst_group',$data);
	
	
	}
	
	
	
	function getAllTabs(){
	
	        $this->db->select('xf_module_mst.*');
		$this->db->from('xf_module_mst'); 
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	
	
	
	}
	
	
	
	
	
	function deeleteGroupChatByIdWhereIN($where_in){
	
	 $this->db->where_in('xf_mst_group.id',$where_in); 
	 $this->db->delete('xf_mst_group');
	}
	
	
	
	function deeleteByIdWhereINUsersTable($where_in){
	
	
	 $this->db->where_in('users.id',$where_in); 
	 $this->db->delete('users');
	 
	 $this->db->where_in('users_groups.user_id',$where_in); 
	 $this->db->delete('users_groups');
	
	}
	
	
	function deeleteUsersAllmainlist(){
	
	// $this->db->where_in('users.id',$where_in); 
	 $this->db->truncate('users');
	 
	 $this->db->where_in('users_groups.user_id',$where_in); 
	 //$this->db->truncate('users_groups');
	
	}
	
	
	function deeleteFileUploadUserByIdWhereIN($where_in){
	
	 $this->db->where_in('users_upload_history.id',$where_in); 
	 $this->db->delete('users_upload_history');
	 //print_r($this->db->last_query());die;
	
	}
	
	function FetchDataByIdUploadUser($id){
	
	        $this->db->select('users_upload_history.*');
		$this->db->from('users_upload_history');
		$this->db->where('users_upload_history.id',$id);
		//$this->db->join('users', 'xf_guest_users.user_id = users.id','left');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
	function deeleteGroupChatByProject(){
	
       
	// $this->db->empty_table('xf_mst_group');
	
	}
	
	
	function deeleteFileUploadUserByAll(){
	
//	 $this->db->empty_table('users_upload_history');
	/// print_r($this->db->last_query());die;
	
	}
	
	
	function editUserGroupById($data,$id){
	
	 $this->db->where('xf_mst_group.id',$id); 
	 $this->db->update('xf_mst_group',$data);
	
	}
	
	
	function saveGroupChatpmapping($data){
	
	$this->db->insert('chat_group_guest_assign',$data);
	
	}
	

	
	function getusers($project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		// $this->db->where('xf_guest_users.chat_channels >',0);
		$this->db->where_in('xf_guest_users.project_id',$project_id);
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
	
	function searchusers($searchFloor=NULL,$searchDataOrderByAsc=NULL,$searchDataOrderBy=NULL,$AllSearchData=NULL,$project=NULL){
            
              $this->db->select('xf_guest_users.*');
          	//$this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_project.project_name,xf_mst_project.event_start_date_time');
		$this->db->from('xf_guest_users');
		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		
		if(!empty($project)){ 
		$this->db->where('xf_guest_users.project_id',$project);
		}
		//$this->db->where('xf_guest_users.chat_channels >',0);
		if(!empty($searchFloor)){
			$this->db->where($searchFloor);
			}
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_guest_users.first_name',$AllSearchData);
				$this->db->or_like('xf_guest_users.last_name',$AllSearchData); 
				$this->db->or_like('xf_guest_users.guest_type',$AllSearchData);
				$this->db->or_like('xf_guest_users.email',$AllSearchData);
				$this->db->or_like('xf_guest_users.phone',$AllSearchData);
				$this->db->or_like('xf_guest_users.company',$AllSearchData);
				$this->db->group_end();
		} 


		// $this->db->where('xf_guest_users.project_id',$_POST['project']);
		
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
        
        
        
	
}

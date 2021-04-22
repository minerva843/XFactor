<?php

class Guest_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_guest_users',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	
	
	    public function insertUser($userdata){
		if($this->db->insert('xf_guest_users',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	
	    public function preinsert($userdata){
		if($this->db->insert('pre_xf_guest_users',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	
	public function usersinsert($userdata,$project_id){
		if($this->db->insert('users',$userdata)){
			$id=$this->db->insert_id();
			$insert=$this->db->insert('users_projects',array('user_id'=>$id,'project_id'=>$project_id));
			$this->db->insert('users_groups',array('user_id'=>$id,'group_id'=>2));
			if($insert){
				return $id;
			}else{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	function InsertFloorId($lastId,$array1){
		$this->db->where('id',$lastId);
		if($this->db->update('xf_guest_users', $array1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function UpdateData($id,$array){
		$this->db->where('id',$id);
		if($this->db->update('xf_guest_users', $array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
	function UpdateDataUser($id,$array){
		$this->db->where('id',$id);
		if($this->db->update('users', $array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function UpdateDataByEmail($email,$user_id){
			$this->db->where('email',$email);
			$array = array(
			'user_id'=>$user_id
			);
		        $this->db->update('xf_guest_users', $array);
	
	}
	
	function FetchGuestSingleDataById($id){
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchDataById($id){
		$this->db->select('xf_guest_users.*,p.key,p.project_id as projectID,gro.group_name,gro.status as group_status,gro.id as gro_id,users.avatar as userAvatar');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.id',$id);
		$this->db->join('users', 'xf_guest_users.user_id = users.id','left');
		$this->db->join('xf_mst_group as gro', 'xf_guest_users.group_id = gro.id','left');
		$this->db->join('xf_mst_project as p', 'p.id = xf_guest_users.project_id','left');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	
	function FetchDataByIdUser($id){
		$this->db->select('users.*,xf_mst_group.group_name,xf_mst_group.status as group_status');
		$this->db->from('users');
		$this->db->where('users.id',$id);
		$this->db->join('users_groups', 'users.id = users_groups.user_id');
		$this->db->join('xf_mst_group', 'xf_mst_group.id = users_groups.group_id');
		//$this->db->join('users', 'xf_guest_users.user_id = users.id','left');
		//$this->db->join('xf_mst_group as gro', 'xf_guest_users.group_id = gro.id','left');
		//$this->db->join('xf_mst_project as p', 'p.id = xf_guest_users.project_id','left');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	
	function FetchDataByIdUpload($id){
		$this->db->select('guest_upload_history.*,p.key,gro.group_name,gro.status as group_status,gro.id as gro_id');
		$this->db->from('guest_upload_history');
		$this->db->where('guest_upload_history.id',$id);
		//$this->db->join('users', 'xf_guest_users.user_id = users.id','left');
		$this->db->join('xf_mst_group as gro', 'guest_upload_history.group_id = gro.id','left');
		$this->db->join('xf_mst_project as p', 'p.id = guest_upload_history.project_id','left');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	function FetchAllDataGuestUploadInList($filename){
		
		$this->db->select('f.*');
		$this->db->from('xf_guest_users as f');
		$this->db->where_in('f.mass_upload_filename',$filename); 
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	

	

       function getOldUpdateData($id){
		$this->db->select('tmp_edit_cache.*');
		$this->db->from('tmp_edit_cache');
		$this->db->where('tmp_edit_cache.pk_id',$id);
		$this->db->where('tmp_edit_cache.module_name','GUEST');
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
	$this->db->update('xf_guest_users',$data);
	
	}
	
	function FetchDataByUserId($id){
		$this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.user_id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}


	function FetchDataByUserIdProjectId($id,$projectId){
		$this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.user_id',$id);
		$this->db->where('xf_guest_users.project_id',$projectId);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
function FetchDataByWhere($where){
		
		
		$this->db->select('*');
		$this->db->where('steps',4);
		$this->db->from('xf_guest_users');
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result();
		//print_r($this->db->last_query());
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	
	function FetchDataByWhereUser($where){
		 
		 
		$this->db->select('*');
		
		$this->db->from('users');
		$this->db->where($where);
		$query = $this->db->get();
		$data = $query->result();
		//print_r($this->db->last_query());
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	
	}
	
	
	
	
	
	function FetchDataByMultipleId($id){
		$this->db->select('f.*,p.project_name,p.project_status,p.project_id as proj_id,gro.group_name,gro.status as group_status,gro.id as gro_id');
		$this->db->from('xf_guest_users as f');
		$this->db->join('xf_mst_group as gro', 'f.group_id = gro.id','left');
		$this->db->join('xf_mst_project as p', 'p.id = f.project_id','left');
		$this->db->where_in('f.id',$id); 
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function DeleteDataByMultipleId($id){
		$this->db->where_in('id',$id);
		$data=$this->db->delete('xf_guest_users');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function FetchDataByWhereUserUnlockStatus($id){
		$this->db->where_in('login',$id);
		$data=$this->db->delete('login_attempts');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	
      function DeleteDataByMultipleIdGuest($idarr=NULL,$project=NULL){
		//$this->db->where_in('id',$idarr);
		
		//print_r();  exit;
		
		if(!empty($project)){ 
		 $this->db->where('xf_guest_users.project_id',$project);
		}
		 if(!empty($idarr)){
                   $this->db->where_in('xf_guest_users.id',$idarr);  
                }
		
		
		$data=$this->db->delete('xf_guest_users');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	
	
	
	function DeleteDataByMultipleIdGuestupload($idarr=NULL,$project=NULL){
	
			
		if(!empty($project)){ 
		 $this->db->where('guest_upload_history.project_id',$project);
		}
		 if(!empty($idarr)){
                   $this->db->where_in('guest_upload_history.id',$idarr);  
                }
		
		$data=$this->db->delete('guest_upload_history');
		if($data){
			return true;
		}else{
			return false;
		}
	
	
	
	
	
	}
	
	
	
	

        
        function FetchDataByIdXFP($xfp){
            
          	$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('floor_plan_id',$xfp);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}  
        }
        
        
        function getByIdWhereIN($ids_arr=NULL,$project=NULL){
        
             $this->db->select('xf_guest_users.*,p.key,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
                if(!empty($project)){ 
		 $this->db->where('xf_guest_users.project_id',$project);
		}
		 if(!empty($ids_arr)){
                   $this->db->where_in('xf_guest_users.id',$ids_arr);  
                }
				$this->db->join('xf_mst_project as p', 'p.id = xf_guest_users.project_id','left');
                 $this->db->where('xf_guest_users.steps',4);
               // $this->db->where('xf_mst_icon_positions.drag_position IS NOT NULL',NULL);
		$this->db->from('xf_guest_users');
		 $this->db->join('xf_mst_group', 'xf_guest_users.group_id = xf_mst_group.id','left');
		//$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		//$this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		 
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
		
        
        
        }
        
        
        function getByIdWhereINupload($ids_arr=NULL,$project=NULL){
        
                $this->db->select('guest_upload_history.*,xf_mst_group.group_name as group_name,xf_mst_group.status as group_status');
                if(!empty($project)){ 
		 $this->db->where('guest_upload_history.project_id',$project);
		}
		 if(!empty($ids_arr)){
                   $this->db->where_in('guest_upload_history.id',$ids_arr);  
                }
		$this->db->join('xf_mst_project as p', 'p.id = guest_upload_history.project_id','left');
		$this->db->from('guest_upload_history');
		 $this->db->join('xf_mst_group', 'guest_upload_history.group_id = xf_mst_group.id','left');
		//$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
		 
		$query = $this->db->get();
		$data = $query->result_array();
		
		//print_r($this->db->last_query());
		if($data){ 
			return $data;
		}else{
			return false;
		}
        
        
        
        }
        
        
        
        
	function update_file_uploads($data){
	
	$this->db->insert('guest_upload_history',$data);
	return $this->db->insert_id();

	}
	
	
	function update_file_uploads_users($data){
	
	$this->db->insert('users_upload_history',$data);
	return $this->db->insert_id();

	}
	
	
	function get_guest_file_upload_data($id){
		
	        $this->db->select('*');
		$this->db->from('guest_upload_history');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
	
	
	
	
	function get_guest_file_upload_data_user($id){
		
	        $this->db->select('*');
		$this->db->from('users_upload_history');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
	
	function check_guest_file_exist($file){
			
	        $this->db->select('*');
		$this->db->from('guest_upload_history');
		$this->db->where('file_name',$file);
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	
	
function check_guest_file_exist_users($file){
			
	        $this->db->select('*');
		$this->db->from('users_upload_history');
		$this->db->where('file_name',$file);
		$query = $this->db->get();
		$data = $query->result_array();
		 
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
        
        
        
        
        function FetchAllDataAsSellers($project,$where_in=NULL){
			$userid = $this->session->userdata('user_id');
                $this->db->select('xf_guest_users.*,u.avatar');
                
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'xf_guest_users.user_id = u.id');
		if(!empty($project)){ 
		$this->db->where('xf_guest_users.project_id',$project);
		}
		$this->db->where('u.id !=',$userid);
		$this->db->where('steps',4);
	//	$this->db->where('DATE_FORMAT(u.last_login,"%Y-%m-%d")',date('Y-m-d'));

		//$this->db->where('xf_guest_users.guest_type NOT IN()',NULL);
		$this->db->where_in('xf_guest_users.guest_type ', $where_in);
 		$this->db->order_by('xf_guest_users.guest_type','ASC');
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
        
        }
        
        
	
	function FetchAllData($project=NULL,$searchFloorOrderBy=NULL){
	
	
	        $this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		//$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
              // $this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
               //$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		
		if(!empty($project)){ 
		$this->db->where('xf_guest_users.project_id',$project);
		}
		
		$this->db->where('steps',4);
		
 		if(!empty($searchFloorOrderBy)){
 			$this->db->order_by($searchFloorOrderBy);
 		}else{
 		
 		$this->db->order_by('xf_guest_users.id','desc');
 		
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
	
	






	     function FetchAllDataUsersUpload(){
	
	        $this->db->select('users_upload_history.*');
		$this->db->from('users_upload_history');
 		$this->db->order_by('users_upload_history.id','desc');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	
	}



	
	
	
	
	
     function FetchAllDataGuestUpload($project=NULL,$searchFloorOrderBy=NULL){
	
	
	        $this->db->select('guest_upload_history.*');
		$this->db->from('guest_upload_history');
		
		if(!empty($project)){ 
		$this->db->where('guest_upload_history.project_id',$project);
		}
		

 		if(!empty($searchFloorOrderBy)){
 			$this->db->order_by($searchFloorOrderBy);
 		}else{
 		
 		$this->db->order_by('guest_upload_history.id','desc');
 		
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
	
	
	
	
	
function getWorkshopMapping($workshopid){
	
	   	$this->db->select('*');
		$this->db->from('workshop_guest_assign');
		$this->db->where('workshop_id',$workshopid);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}  
	
	}
	
	
	
	
	function getChatGroupMapping($chat_group_id){
	
	   	$this->db->select('*');
		$this->db->from('chat_group_guest_assign');
		$this->db->where('chat_group_id',$chat_group_id);
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}  
	
	}
	
	
	
	
	
function FetchAllDataGroupChatGuest($project=NULL,$searchFloorOrderBy=NULL,$groupchatid=NULL,$mapping=NULL){
	
		
 		
 		$this->db->group_by('xf_guest_users.id');
		$query = "SELECT `xf_guest_users`.*, `chat_group_guest_assign`.`chat_group_id` as `chat_group_id`, `chat_group_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `chat_group_guest_assign` ON `chat_group_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `chat_group_guest_assign`.`chat_group_id` =".$groupchatid." WHERE `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 ORDER BY `xf_guest_users`.`id` DESC";
		

		$res = $this->db->query($query);
		
		$data = $res->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	
	
	
	
	}
	
	
	
	function FetchAllDataWorkshopGuest($project=NULL,$searchFloorOrderBy=NULL,$workshopid=NULL,$mapping=NULL){
	
	
 		
		$query = "SELECT `xf_guest_users`.*, `workshop_guest_assign`.`workshop_id` as `wrkid`, `workshop_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `workshop_guest_assign` ON `workshop_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `workshop_guest_assign`.`workshop_id` =".$workshopid." WHERE `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 ORDER BY `xf_guest_users`.`id` DESC";
		
	
		$res = $this->db->query($query);
		//print_r($this->db->last_query()); //exit;
		$data = $res->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	
	
	
	
	}
	
	
	
		function searchGroupChatGuest($search=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc='xf_guest_users.id ASC',$AllSearchData=NULL,$project=NULL,$groupchatid=NULL){
	
	//print_r($searchDataOrderByAsc);  exit;
	if(!empty($search)){
	
	 $query = "SELECT `xf_guest_users`.*, `chat_group_guest_assign`.`chat_group_id` as `wrkid`, `chat_group_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `chat_group_guest_assign` ON `chat_group_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `chat_group_guest_assign`.`chat_group_id` =".$groupchatid." WHERE `xf_guest_users`.`guest_type` = '".$search."' AND  `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 AND  (xf_guest_users.first_name LIKE '%".$AllSearchData."%' OR xf_guest_users.last_name LIKE '%".$AllSearchData."%' OR xf_guest_users.guest_type LIKE '%".$AllSearchData."%' OR xf_guest_users.email LIKE '%".$AllSearchData."%' OR xf_guest_users.phone LIKE '%".$AllSearchData."%' OR xf_guest_users.company LIKE '%".$AllSearchData."%' ) ORDER BY xf_guest_users.id ASC";
	
	}else{
	
	
	 $query = "SELECT `xf_guest_users`.*, `chat_group_guest_assign`.`chat_group_id` as `wrkid`, `chat_group_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `chat_group_guest_assign` ON `chat_group_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `chat_group_guest_assign`.`chat_group_id` =".$groupchatid." WHERE `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 AND  (xf_guest_users.first_name LIKE '%".$AllSearchData."%' OR xf_guest_users.last_name LIKE '%".$AllSearchData."%' OR xf_guest_users.guest_type LIKE '%".$AllSearchData."%' OR xf_guest_users.email LIKE '%".$AllSearchData."%' OR xf_guest_users.phone LIKE '%".$AllSearchData."%' OR xf_guest_users.company LIKE '%".$AllSearchData."%' ) ORDER BY $searchDataOrderByAsc";
	
	
	}
	
	       
		
		$res = $this->db->query($query);
		//print_r($this->db->last_query());  exit;
		$data = $res->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	function searchWorkshopGuest($searchWorkshop=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc='xf_guest_users.id ASC',$AllSearchData=NULL,$project=NULL,$workshopid=NULL){
	
	
	if(!empty($searchWorkshop)){
	
	 $query = "SELECT `xf_guest_users`.*, `workshop_guest_assign`.`workshop_id` as `wrkid`, `workshop_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `workshop_guest_assign` ON `workshop_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `workshop_guest_assign`.`workshop_id` =".$workshopid." WHERE `xf_guest_users`.`guest_type` = '".$searchWorkshop."' AND  `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 AND  (xf_guest_users.first_name LIKE '%".$AllSearchData."%' OR xf_guest_users.last_name LIKE '%".$AllSearchData."%' OR xf_guest_users.guest_type LIKE '%".$AllSearchData."%' OR xf_guest_users.email LIKE '%".$AllSearchData."%' OR xf_guest_users.phone LIKE '%".$AllSearchData."%' OR xf_guest_users.company LIKE '%".$AllSearchData."%' ) ORDER BY xf_guest_users.id ASC";
	
	}else{
	
	
	 $query = "SELECT `xf_guest_users`.*, `workshop_guest_assign`.`workshop_id` as `wrkid`, `workshop_guest_assign`.`guest_id` as `gstmapid` FROM `xf_guest_users` LEFT JOIN `workshop_guest_assign` ON `workshop_guest_assign`.`guest_id` = `xf_guest_users`.`id` AND `workshop_guest_assign`.`workshop_id` =".$workshopid." WHERE `xf_guest_users`.`project_id` = '".$project."' AND `xf_guest_users`.`steps` = 4 AND  (xf_guest_users.first_name LIKE '%".$AllSearchData."%' OR xf_guest_users.last_name LIKE '%".$AllSearchData."%' OR xf_guest_users.guest_type LIKE '%".$AllSearchData."%' OR xf_guest_users.email LIKE '%".$AllSearchData."%' OR xf_guest_users.phone LIKE '%".$AllSearchData."%' OR xf_guest_users.company LIKE '%".$AllSearchData."%' ) ORDER BY $searchDataOrderByAsc";
	
	
	}
	
	       
		
		$res = $this->db->query($query);
		//print_r($this->db->last_query());  exit;
		$data = $res->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	
	
	
       function searchUsersListUpload($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchDataOrderByDsc=NULL){
            
                $this->db->select('users_upload_history.*');
          	
		$this->db->from('users_upload_history');
		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('users_upload_history.file_name',$AllSearchData);
				$this->db->or_like('users_upload_history.xguestfileid',$AllSearchData); 
				 
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}

		//$this->db->where('guest_upload_history.project_id',$_POST['project']);
		
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
	
	
	
	
	
	
	
       function searchGuestListUpload($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL,$searchDataOrderByDsc=NULL){
            
                $this->db->select('guest_upload_history.*');
          	//$this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_project.project_name,xf_mst_project.event_start_date_time');
		$this->db->from('guest_upload_history');
		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		
		//$this->db->where('steps',4);		
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('guest_upload_history.file_name',$AllSearchData);
				$this->db->or_like('guest_upload_history.xguestfileid',$AllSearchData); 
				 
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}

		//$this->db->where('guest_upload_history.project_id',$_POST['project']);
		
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
	
	
	
	
	
        function search($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL,$searchDataOrderByDsc=NULL){
            
                $this->db->select('xf_guest_users.*');
          	//$this->db->select('xf_mst_zones.*,xf_mst_floor_plan.floor_plan_name,xf_mst_project.project_name,xf_mst_project.event_start_date_time');
		$this->db->from('xf_guest_users');
		//$this->db->join('xf_mst_floor_plan', 'xf_mst_floor_plan.floor_plan_id = xf_mst_zones.flor_plan_id','left');
		//$this->db->join('xf_mst_project', 'xf_mst_zones.project_id = xf_mst_project.id','left');
		
		
		$this->db->where('steps',4);		
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
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}

		$this->db->where('xf_guest_users.project_id',$_POST['project']);
		
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
        
        function get_all_guest_by_projectID($id)
		{ 
			$this->db->select('xf_guest_users.*,users.avatar as userAvatar');
			$this->db->from('xf_guest_users');
			$this->db->join('users','users.id = xf_guest_users.user_id');
			$this->db->where('xf_guest_users.project_id',$id);
			$this->db->order_by('xf_guest_users.id','ASC');
			$query = $this->db->get();
			$data = $query->result();
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		function get_footprint_user_by_projectID($id,$footprint)
		{
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			//$this->db->join('users','users.id = vw_xf_users_footprints.user_id','left');
			$this->db->where('vw_xf_users_footprints.project_id',$id);
			if($footprint == 'nologin')
			{
				$this->db->where('vw_xf_users_footprints.First_Name','UNKNOWN');
			}
			else if($footprint == 'login')
			{
				$this->db->where('vw_xf_users_footprints.First_Name !=','UNKNOWN');
			}
			$this->db->order_by('vw_xf_users_footprints.First_Name','ASC');
			//$this->db->group_by('vw_xf_users_footprints.user_id');
			$query = $this->db->get();
			//PRINT_R($this->db->last_query());die;
			$data = $query->result();
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		function search_footprint_user_by_projectID($id,$search)
		{
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			//$this->db->join('users','users.id = vw_xf_users_footprints.user_id','left');
			$this->db->where('vw_xf_users_footprints.project_id',$id);
			if(!empty($search))
			{
				$this->db->group_start();
				$this->db->like('vw_xf_users_footprints.guest_type',$search);
				$this->db->or_like('vw_xf_users_footprints.First_Name',$search); 
				$this->db->or_like('vw_xf_users_footprints.last_name',$search);
				$this->db->or_like('vw_xf_users_footprints.company',$search);
				$this->db->group_end();
			}
			$this->db->order_by('vw_xf_users_footprints.First_Name','ASC');
			//$this->db->group_by('vw_xf_users_footprints.user_id');
			$query = $this->db->get();
			//PRINT_R($this->db->last_query());die;nbasffr
			$data = $query->result();
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		function FetchFootprintDataById($userID,$project_id)
		{
			//print_r($userID);
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			$this->db->where('vw_xf_users_footprints.user_id',$userID);
			$this->db->where('vw_xf_users_footprints.project_id',$project_id);
			$query = $this->db->get();
			$data = $query->row();
			//print_r($data);die;
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		
     function deleteJunkRecordGuest($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_guest_users');
		if($data){
			return true;
		}else{
			return false;
		}
		
		
    }
    
    
    
   
	
	
	
}
?>

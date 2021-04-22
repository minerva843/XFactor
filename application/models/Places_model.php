<?php

class Places_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    
	
	
	function insertHistory($data){
		if($this->db->insert('xf_mst_places_users_history',$data)){
			//return $this->db->insert_id();
			return true;
		} 
		else
		{
			return false; 
		}
	}
	
	function insertWorkshopHistory($data){
		if($this->db->insert('xf_workshop_attendance',$data)){
			//return $this->db->insert_id();
			return true;
		} 
		else
		{
			return false; 
		} 
	} 
	
	function updateWorkshopHistory($workshop_id=NULL,$id=NULL,$data=NULL){
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('workshop_id',$workshop_id);
		$this->db->where('id',$id);
		if($this->db->update('xf_workshop_attendance', $data))
		{ 
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function inserticonHistory($data){
		if($this->db->insert('xf_mst_icon_history',$data)){
			//return $this->db->insert_id();
			return true;
		}
		else
		{
			return false; 
		}
	}
	
	
	
	function ContentByPostId($post_id){
	         $this->db->select('*');
		$this->db->from('xf_mst_content_post_mapping');
		$this->db->where('post_id',$post_id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
	function GetMyLocationByUserId($user_id,$project_id,$floor_id){
	         $this->db->select('*');
		$this->db->from('xf_mst_places_users_history');
		$this->db->where('user_id',$user_id);
		$this->db->where('project_id',$project_id);
		$this->db->where('floor_plan_id',$floor_id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}

	function GetFloordataByFloorId($floor_id){
		$this->db->select('*');
   $this->db->from('xf_mst_floor_plan'); 
   $this->db->where('id',$floor_id);
   $this->db->order_by('id','DESC');
   $query = $this->db->get();
   $data = $query->row();
   if($data){
	   return $data;
   }else{
	   return false;
   }

}

function GetNearMeAllUsers($project_id=NULL,$floor=NULL)
{
	$user_id=$this->session->userdata('user_id');
	$this->db->select('xf_vw_nearme.*');
	$this->db->from('xf_vw_nearme');
	$this->db->where('project_id',$project_id);
	$this->db->where('floor_plan_id',$floor);
	$this->db->where("user_id !=",$user_id); 
	$query = $this->db->get();
	$data = $query->result();
	if($data){
		return $data;
	}else{
		return false;
	}

}
	
	// function GetNearMeAllUsers($project_id=NULL,$floor=NULL){
	// 	$current = new DateTime();
	// 	$hoursToSubtract = 2;
	// 	$current->sub(new DateInterval("PT{$hoursToSubtract}H"));
	// 	$newTime = $current->format('Y-m-d H:i');
	// 	//print_r($newTime);die;
	// 	$user_id=$this->session->userdata('user_id');
	//     $this->db->select('xf_mst_places_users_history.*,u.guest_type,u.salutation,u.mm_id,u.first_name,u.last_name,u.username,u.mm_username,u.company,users.avatar as myavatar');
	// 	$this->db->from('xf_mst_places_users_history');
	// 	$this->db->join('xf_guest_users as u', 'xf_mst_places_users_history.user_id = u.user_id','xf_mst_places_users_history.project_id = u.project_id','left');
	// 	$this->db->join('users', 'users.id = u.user_id');
	// 	$this->db->where("u.project_id",$project_id);
	// 	//$this->db->where("activity_time",date('Y-m-d H:i:s',time()-7200)); 
	// 	$this->db->where("activity_time <=",$newTime); 
	// 	$this->db->where("xf_mst_places_users_history.user_id !=",$user_id); 
	// 	$this->db->where("xf_mst_places_users_history.project_id",$project_id); 
	// 	$this->db->where("xf_mst_places_users_history.floor_plan_id",$floor); 
	// 	$this->db->group_by('user_id'); 
	// 	$this->db->order_by('activity_time','DESC');
	// 	$query = $this->db->get();
	// 	$data = $query->result();
	// 	echo 'helllllooooo',$this->db->last_query();
	// 	if($data){
	// 		return $data;
	// 	}else{
	// 		return false;
	// 	}
	
	// } 

	// function GetNearMeAllUsersNoReg($project_id=NULL,$floor=NULL){
	// 	$current = new DateTime();
	// 	$hoursToSubtract = 2;
	// 	$current->sub(new DateInterval("PT{$hoursToSubtract}H"));
	// 	$newTime = $current->format('Y-m-d H:i');
	// 	$user_id=$this->session->userdata('user_id');
	//     $this->db->select('xf_mst_places_users_history.*,u.mm_id,u.mm_username,u.mm_email,users.first_name,users.last_name,users.username,users.company,users.salutation,users.user_type,users.avatar as myavatar');
	// 	$this->db->from('xf_mst_places_users_history');
	// 	$this->db->join('xf_chat_users as u', 'xf_mst_places_users_history.user_id = u.user_id','xf_mst_places_users_history.project_id = u.project_id','left');
	// 	$this->db->join('users', 'users.id = u.user_id');
	// 	$this->db->where("u.project_id",$project_id);
	// 	//$this->db->where("(activity_time == now())");
	// 	$this->db->where("activity_time <=", $newTime);
	// 	$this->db->where("xf_mst_places_users_history.user_id !=",$user_id); 
	// 	$this->db->where("xf_mst_places_users_history.project_id",$project_id); 
	// 	$this->db->where("xf_mst_places_users_history.floor_plan_id",$floor); 
	// 	$this->db->group_by('user_id');  
	// 	$this->db->order_by('activity_time','DESC');
	// 	$query = $this->db->get();
	// 	$data = $query->result();
	// 	//print_r($this->db->last_query());die;
	// 	if($data){
	// 		return $data;
	// 	}else{
	// 		return $data;
	// 	}
	
	// }
	
	
	function contentbyInfoPostId($iconid,$project_id){
	
		$this->db->select('*');
		$this->db->from('xf_mst_icon_positions');
		$this->db->where('id',$iconid);
		$this->db->where('project_id',$project_id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
	
	function dataPostId($postid){
	
	        $this->db->select('post.*,u.username,u.guest_type');
		$this->db->from('xf_mst_post_info as post');
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->where('post.id',$postid); 
		
		//below line uncommented on 31-Dec by Rajeev
		$this->db->where('post.project_id',$project_id);
		$this->db->where('u.project_id',$project_id);

//added by Rajeev 31-Dec 2020
		$this->db->order_by("post.last_edited_date_time", "desc");	
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	function get_user_history($id,$project,$footprint){
	
	     
		/*$this->db->select('history.*,floorPlan.floor_plan_name,zones.zone_name');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->join('xf_mst_floor_plan as floorPlan', 'history.floor_plan_id = floorPlan.id');
		$this->db->join('xf_mst_zones as zones', 'history.zone_id = zones.id');
		$this->db->where('history.user_id',$id); 
		$this->db->where('history.project_id',$project);
		$this->db->where('module_name','FLOOR PLAN');		
		//$query = $this->db->get();
		$subQuery1 = $this->db->_compile_select();
		
		$this->db->_reset_select();
		
		$this->db->select('history.*,content_set.content_set_name,content_set.content_set_name');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->join('xf_mst_icon_positions as iconPos', 'history.module_refid = iconPos.id');
		$this->db->join('xf_mst_content_set as content_set', 'iconPos.content_set_id = content_set.id');
		$this->db->where('history.user_id',$id); 
		$this->db->where('history.project_id',$project);
		$this->db->where('module_name','ICON');		
		//$query = $this->db->get();
		$subQuery2 = $this->db->_compile_select();
		
		$this->db->_reset_select();
		
		$this->db->select('history.*,content_set.content_set_name,content_set.content_set_name');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->join('xf_mst_icon_positions as iconPos', 'history.module_refid = iconPos.id');
		$this->db->join('xf_mst_content_set as content_set', 'iconPos.content_set_id = content_set.id');
		$this->db->where('history.user_id',$id); 
		$this->db->where('history.project_id',$project);
		$this->db->where('module_name','ICON');		
		//$query = $this->db->get();
		$subQuery2 = $this->db->_compile_select();
		
		$this->db->_reset_select();
		
		$this->db->query("select * from ($subQuery1 UNION $subQuery2) as unionTable");*/
		
		$this->db->select('*');
		$this->db->from('xf_vw_footprint');
		$this->db->where('project_id',$project);
		if (strpos($id, ".") !== false) {
			$this->db->where('xf_vw_footprint.ip_address',$id); 
		}
		else
		{
			$this->db->where('xf_vw_footprint.user_ID',$id); 
		}

		if(!empty($footprint))
		{
			$this->db->where('module_name',$footprint);
		}
		$this->db->order_by('activityTime','ASC');
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		
		$data = $query->result();
		//print_r($data);die;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	function UpdateData($id,$array){
		$this->db->where('id',$id);
		if($this->db->update('xf_mst_post_info', $array))
		{
			return $id;
		}
		else
		{
			return false;
		}
	}
	
	function FetchPostsById($project=NULL){
		$this->db->select('post.*,u.guest_type,u.salutation,u.gender,u.first_name,u.last_name,u.username,u.mm_username,u.company,uu.avatar');
		$this->db->from('xf_mst_post_info as post');
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->join('users as uu', 'u.user_id = uu.id','left'); 
		$this->db->where('post.project_id',$project);
		$this->db->where('post.steps',2);
		
		//added by Rajeev on 31-Dec2020
		$this->db->order_by("post.last_edited_date_time", "desc");
		//
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit; 
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function checkNo_registerUser($user_id=NULL,$project=NULL){
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('project_id',$project);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
		function get_registerUser($user_id=NULL,$project=NULL){
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('project_id',$project);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function UpdateUserInfo($id,$array){
		$this->db->where('id',$id);
		if($this->db->update('users', $array))
		{
			return $id;
		} 
		else
		{
			return false;
		}
	}
	
	function GetGuestDataByEmail($user_id=NULL,$project=NULL){
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('project_id',$project);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function FetchFloorDataById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_floor_plan');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchVideoDataById($id){
		
		$this->db->select('*');
		$this->db->from('xf_mst_files');
		$this->db->where('type','video');
		$this->db->where('xmanage_id',$id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{ 
			return false;
		}
	}
	
	function FetchImageDataById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_files');
		$this->db->where('type','image');
		$this->db->where('xmanage_id',$id);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function myProjectsById($email,$user_id){
		$this->db->select('p.*,xf_guest_users.email,xf_guest_users.id as guestid,xf_guest_users.user_id');
		$this->db->from('xf_guest_users');
		$this->db->join('xf_mst_project as p', 'p.id = xf_guest_users.project_id');
		$this->db->join('xf_mst_group', 'xf_mst_group.id = p.group_id');
		$this->db->where('xf_mst_group.status','LIVE');
		$this->db->where('xf_guest_users.user_id',$user_id); 
		$this->db->order_by('p.created_date_time','DESC');
		$query = $this->db->get();  
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function FetchHistoryById($id){
		$user_id=$this->session->userdata('user_id');
		
		$project=$id['project_id'];
		$floor_plan_id=$id['floor_plan_id'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$date=date('Y-m-d');
		$sql="Select * from xf_mst_places_users_history where project_id='$project' AND floor_plan_id='$floor_plan_id' AND activity_time>='$date' AND (user_id='$user_id' OR ip_address ='$ip') order by activity_time DESC";    
		$query = $this->db->query($sql);
		
		//print_r($this->db->last_query());die;
		$data = $query->row(); 
		//print_r($data);die;
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function GridByData($grid_id=NULL,$floor_id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_grid_zone_mapping');
		$this->db->where('grid_id',$grid_id);
		$this->db->where('floor_plan_xid',$floor_id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function ZoneFloorByContentId($zone_id=NULL,$floorId=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_content_zone_mapping'); 
		$this->db->where('zone_id',$zone_id);
		$this->db->where('floor_plan_xid',$floorId);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function ContentSetDataById($id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_content_set'); 
		$this->db->where('id',$id); 
		//$this->db->where('x_content_id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function getfloorPlanById($id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_floor_plan'); 
		$this->db->where('floor_plan_id',$id); 
		//$this->db->where('x_content_id',$id);
		$query = $this->db->get();
		$data = $query->row(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function FetchIconsDataById($floor_id=NULL,$content_id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_icon_positions'); 
		//$this->db->where('id',$id); 
		$this->db->where('flor_plan_id',$floor_id);
		$this->db->where('content_set_id',$content_id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchPostIconsDataById($floor_id=NULL,$content_id=NULL,$post_id=NULL){
		$this->db->select('xf_mst_icon_positions.*,xf_mst_content_post_mapping.info_icon,xf_mst_content_post_mapping.post_id');
		$this->db->from('xf_mst_icon_positions'); 
		$this->db->join('xf_mst_content_post_mapping', 'xf_mst_content_post_mapping.info_icon = xf_mst_icon_positions.id','left');
		$this->db->where('xf_mst_icon_positions.flor_plan_id',$floor_id);
		$this->db->where('xf_mst_icon_positions.content_set_id',$content_id);
		$this->db->where('xf_mst_content_post_mapping.post_id',$post_id);
		//$this->db->limit(1); 
		$this->db->group_by('xf_mst_content_post_mapping.post_id');
		$this->db->order_by('xf_mst_content_post_mapping.info_icon','DESC');
		$query = $this->db->get(); 
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchPostsDataByIconId($icon_id=NULL){
		$this->db->select('post.*,xf_mst_content_post_mapping.info_icon,u.username,u.guest_type,u.first_name,u.last_name,');
		$this->db->from('xf_mst_content_post_mapping'); 
		$this->db->join('xf_mst_post_info as post', 'post.id = xf_mst_content_post_mapping.post_id','left');
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->where('info_icon',$icon_id);
		$query = $this->db->get(); 
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function PostsOwnerDataByIconId($icon_id=NULL){
		$this->db->select('post.*,xf_mst_content_post_mapping.info_icon,users.id,users.avatar,u.username,u.salutation,u.first_name,u.last_name,u.mm_username,u.guest_type,u.quick_intro,u.company,u.designation'); 
		$this->db->from('xf_mst_content_post_mapping'); 
		$this->db->join('xf_mst_post_info as post', 'post.id = xf_mst_content_post_mapping.post_id','left');
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->join('users', 'users.id = u.user_id','left');
		$this->db->where('info_icon',$icon_id);
		$query = $this->db->get(); 
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function PostsOwnerDataByPostId($post_id=NULL){
		$this->db->select('post.*,u.username,u.mm_username,u.guest_type,u.quick_intro,u.company,u.designation,users.avatar,users.id'); 
		$this->db->from('xf_mst_post_info as post'); 
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->join('users', 'users.id = u.user_id','left');
		$this->db->where('post.id',$post_id);
		$query = $this->db->get(); 
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchPostFilesData($post_id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_files'); 
		$this->db->where('xmanage_id',$post_id);
		$this->db->limit(5);
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllProject(){
		// $this->db->select('project_type,id');
		// $this->db->from('xf_mst_project');
		// $this->db->where('project_show_homepage','yes');
		// if(!empty($project_type)){
		// $this->db->where('project_type',$project_type);
		// } 
		// $this->db->where('project_steps',4);
		// $this->db->order_by('project_type', 'ASC');
		// $this->db->group_by('project_type');
		
		$this->db->select('*');
		$this->db->from('xf_mst_project_type');
		//$this->db->where('sequence BETWEEN 1 AND 16');
		$this->db->order_by('sequence', 'ASC'); 
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data; 
		}else{
			return false;
		}
	}
	
	function FetchProjectById($project_type=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_project_type');
		if(!empty($project_type)){
		$this->db->where('name',$project_type);
		}  
		//$this->db->where('sequence BETWEEN 1 AND 16');
		$this->db->order_by('sequence', 'ASC');
		 
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data; 
		}else{
			return false;
		}
	}
	 
	function FetchProjectTypeId($project=NULL){ 
		$this->db->select('project_type,id');
		$this->db->from('xf_mst_project');
		//$this->db->where('group_id',$id);
		//$this->db->where('project_show_homepage','yes');
		$this->db->where('id',$project);
		$this->db->where('project_steps',4);
		$query = $this->db->get();
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	
	function FetchProjectTypeIdGuest($project=NULL){
	
		$this->db->select('project_type,id,project_name');
		$this->db->from('xf_mst_project');
		//$this->db->where('group_id',$id);
		//$this->db->where('project_show_homepage','yes');
		$this->db->where('id',$project);
		$this->db->where('project_steps',4);
		$query = $this->db->get();
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	function get_projects(){
		$this->db->select('project_type,id');
		$this->db->from('xf_mst_project');
		$this->db->where('project_show_homepage','yes');
		$this->db->where('project_steps',4);
		$this->db->order_by('project_type', 'ASC');
		$this->db->group_by('project_type');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function placeByzoneName($floorId,$grid_val){
		$this->db->select('*');
		$this->db->from('xf_mst_grid_zone_mapping');
		$this->db->where('floor_plan_xid',$floorId);
		$this->db->where('grid_id',$grid_val);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	function getZoneContentName($zoneid,$contentset,$floorId){
	        $this->db->select('*');
		$this->db->from('xf_mst_content_zone_mapping');
		$this->db->where('floor_plan_xid',$floorId);
		$this->db->where('contentset_id',$contentset);
		$this->db->where('zone_id',$zoneid);
		
		
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		
		
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	
	}
	
	
	
	function infoIcondata($infoicon){
	
	
		$this->db->select('*');
		$this->db->from('xf_mst_icon_positions');
		//$this->db->where('floor_plan_xid',$floorId);
		//$this->db->where('contentset_id',$contentset);
		$this->db->where('id',$infoicon);
		
		
		$query = $this->db->get();
		
		//print_r($this->db->last_query());  exit;
		
		
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	function FetchDataById($id){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,u.username,u.guest_type');
		$this->db->from('xf_mst_post_info as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		$this->db->join('xf_guest_users as u', 'p.post_owner = u.id','left');
		$this->db->where('p.id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}

	
	function GetPostInfoById($post_id=NULL){
		$this->db->select('xf_mst_icon_positions.drag_position ,post.id,post.post_title,post.post_details,xf_mst_content_post_mapping.info_icon,u.username,u.guest_type,u.quick_intro,u.company'); 
		$this->db->from('xf_mst_content_post_mapping'); 
		$this->db->join('xf_mst_post_info as post', 'post.id = xf_mst_content_post_mapping.post_id','left');
		$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
		$this->db->join('xf_mst_icon_positions', 'xf_mst_icon_positions.id = xf_mst_content_post_mapping.info_icon','left');
		$this->db->where('xf_mst_content_post_mapping.post_id',$post_id);
		$query = $this->db->get(); 
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
        
        function getFloorPlanbyProject($project_id){
                $this->db->select('*');
                $this->db->where('project_id',$project_id);
               
		$this->db->from('xf_mst_floor_plan');
		$this->db->order_by('floor_plan_name', 'ASC'); 
		$query = $this->db->get();
		$data=$query->result();
		 if($data){
			 return $data;
		 }else{
			 return false;
		 }
            
        }
	
	
	
}
?>

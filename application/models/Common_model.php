<?php

class Common_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function getCountryCode(){
		$this->db->select('*');
		$this->db->from('xf_mst_country');
		if($query=$this->db->get()){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function allonline($project=NULL)
	{
		$userid = $this->session->userdata('user_id');
		$this->db->select('users.*,u.guest_type,u.mm_username');  
		$this->db->from('users');
		$this->db->join('xf_guest_users as u', 'u.user_id = users.id','left');
		$this->db->where('users.id !=',$userid);
		$this->db->where('u.project_id',$project);
		$this->db->where('DATE_FORMAT(users.last_login,"%Y-%m-%d")',date('Y-m-d'));
		if($query=$this->db->get()){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	// public function allonlineUsers($project=NULL)
	// {
	// 	$userid = $this->session->userdata('user_id');
	// 	$this->db->select('users.*,u.guest_type,u.mm_username,u.mm_id');  
	// 	$this->db->from('users');
	// 	$this->db->join('xf_guest_users as u', 'u.user_id = users.id','left');
	// 	$this->db->where('users.id !=',$userid);
	// 	$this->db->where('u.project_id',$project);
	// 	$this->db->where('DATE_FORMAT(users.last_login,"%Y-%m-%d")',date('Y-m-d'));
	// 	if($query=$this->db->get()){
	// 		//print_r($this->db->last_query());die;
	// 		return $query->result();
	// 	}else{
	// 		return false;
	// 	}
	// }


	public function allonlineUsers($project=NULL)
	{
		$userid = $this->session->userdata('user_id');
		$this->db->select('xf_guest_users.*,u.avatar');  
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		$this->db->where('xf_guest_users.user_id !=',$userid);
		$this->db->where('xf_guest_users.project_id',$project);
		$this->db->where('DATE_FORMAT(u.last_login,"%Y-%m-%d")',date('Y-m-d'));
		//$this->db->where('u.last_login < (CURRENT_TIMESTAMP() - 3600*24)');
		//$this->db->where('u.last_login < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 24 HOUR))',NULL,FALSE);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->result(); 
		}else{
			return false;
		}
	}



	public function allonlineUsersNoRegReq($project=NULL)
	{
		$userid = $this->session->userdata('user_id');
		$this->db->select('xf_chat_users.*,u.avatar,u.first_name,u.last_name,u.salutation,u.gender,u.company,u.user_type');  
		$this->db->from('xf_chat_users');
		$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
		$this->db->where('xf_chat_users.user_id !=',$userid);
		$this->db->where('xf_chat_users.project_id',$project);
		$this->db->where('DATE_FORMAT(u.last_login,"%Y-%m-%d")',date('Y-m-d'));
		//$this->db->where('u.last_login < (CURRENT_TIMESTAMP() - 3600*24)');
		//$this->db->where('u.last_login < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 24 HOUR))',NULL,FALSE);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->result();
		}else{
			return false;
		}
	}


	
	public function storeloginhistory($data)
	{ 
		$this->db->insert('login_history',$data);
                return $this->db->insert_id();
	}
	
	public function updateloginhistory($data,$id)
	{ 
		$this->db->where('id',$id);
		$this->db->or_where('ip_address',$data['ip_address']);
            $this->db->update('login_history',$data);
		
	}
	
	public function checklastlogouthistory()
	{ 
		$this->db->select('*');
		$this->db->from('login_history');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->order_by("id", "desc");
		if($query=$this->db->get()){ 
			return $query->row();
		}else{
			return false;
		}
	}
	
	
	public function username($username)
	{
		$this->db->select('users.*,u.guest_type,u.quick_intro');
		$this->db->from('users');
		$this->db->join('xf_guest_users as u', 'u.user_id = users.id','left');
		$this->db->where('users.username',$username);
		
		if($query=$this->db->get()){ 
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function dusername($mm_id)
	{
		$this->db->select('xf_guest_users.*,u.avatar');
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		$this->db->where('xf_guest_users.mm_id',$mm_id);
		$query=$this->db->get();
	//	print_r($query->num_rows());
	//	print_r(',');
		
		
		if($query->num_rows()<=0){
	//		print_r('else ');print_r($query->num_rows());
			
			$this->db->select('*');
			$this->db->from('xf_chat_users');
			$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
			$this->db->where('xf_chat_users.mm_id',$mm_id);
			
			if($query=$this->db->get()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return $query->row();;
		}

	}


	public function guestDeatilsPartnerLogged($mm_username,$projectId)
	{
		$this->db->select('xf_guest_users.*,u.avatar');
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		$this->db->where('xf_guest_users.mm_username',$mm_username);
		$this->db->where('xf_guest_users.project_id',$projectId);
		$query=$this->db->get();
		if($query->row()<=0){
			$this->db->select('*');
			$this->db->from('xf_chat_users');
			$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
			$this->db->where('xf_chat_users.mm_username',$mm_username);
			$this->db->where('xf_chat_users.project_id',$projectId);
			
			if($query=$this->db->get()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return $query->row();;
		}

		// $this->db->select('*');
		// $this->db->from('xf_guest_users');
		// //$this->db->join('xf_guest_users as u', 'u.user_id = users.id','left');
		// $this->db->where('xf_guest_users.mm_username',$mm_username);
		// $this->db->where('xf_guest_users.project_id',$projectId);
		
		// if($query=$this->db->get()){
		// 	return $query->row();
		// }else{
		// 	return false;
		// }


	}


	public function musername($username)
	{

		$this->db->select('xf_guest_users.*,u.avatar');
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		$this->db->where('xf_guest_users.mm_username',$username);
		$query=$this->db->get();
		if($query->row()<=0){
			$this->db->select('*');
			$this->db->from('xf_chat_users');
			$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
			$this->db->where('xf_chat_users.mm_username',$username);
			
			if($query=$this->db->get()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return $query->row();
		}
		// $this->db->select('xf_guest_users.*,u.avatar');
		// $this->db->from('xf_guest_users');
		// $this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		// $this->db->where('xf_guest_users.mm_username',$username);
		
		// if($query=$this->db->get()){
		// 	//print_r($this->db->last_query());die;
		// 	return $query->row();
		// }else{
		// 	return false;
		// }
	}
	
	public function mmusername($username)
	{
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.mm_username',$username);
		
		if($query=$this->db->get()){
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function getdbusername($mm_id)
	{
		$this->db->select('*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.mm_id',$mm_id);
		$query=$this->db->get();
		if($query->row()<=0){
			$this->db->select('*');
			$this->db->from('xf_chat_users');
			$this->db->where('xf_chat_users.mm_id',$mm_id);
			$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
			if($query=$this->db->get()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return $query->row();
		}
	}

	public function getxfchatusername($mm_id)
	{
		$this->db->select('*');
		$this->db->from('xf_chat_users');
		$this->db->where('xf_chat_users.mm_id',$mm_id);
		
		if($query=$this->db->get()){
			return $query->row();
		}else{
			return false;
		}
	}

	public function GuestDetails($guestID)
	{
		$this->db->select('xf_guest_users.* ,u.avatar as useravatar');
		$this->db->from('xf_guest_users');
		$this->db->join('users as u', 'u.id = xf_guest_users.user_id','left');
		$this->db->where('xf_guest_users.id',$guestID);
		

		if($query=$this->db->get()){
			//print_r($query->row());die;
			return $query->row();
		}else{
			return false;
		}

	}
	
	public function userdetails($userid)
	{
		$this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.user_id',$userid);
		// $this->db->where('xf_guest_users.project_id',$projectID);
		//$this->db->where('xf_guest_users.project_id',$projectid);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function groupChat($gpmm_id)
	{
		$this->db->select('xf_mst_chat_groups.*');
		$this->db->from('xf_mst_chat_groups');
		$this->db->where('xf_mst_chat_groups.mm_group_id',$gpmm_id);
		// $this->db->where('xf_guest_users.project_id',$projectID);
		//$this->db->where('xf_guest_users.project_id',$projectid);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function userdetailsbyViewTable($userid,$project)
	{ 
		$this->db->select('xf_vw_chatusers.*');
		$this->db->from('xf_vw_chatusers');
		$this->db->where('xf_vw_chatusers.user_id',$userid);
		$this->db->where('xf_vw_chatusers.project_id',$project);
		// $this->db->where('xf_guest_users.project_id',$projectID);
		//$this->db->where('xf_guest_users.project_id',$projectid);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->row();
		}else{
			return false;
		}
	}

	public function getuserByUserId($user_id)
	{
		$this->db->select('users.*');
		$this->db->from('users');
		$this->db->where('users.id',$user_id);
		if($query=$this->db->get()){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getGuestUserDetail($user_id,$project_id)
	{
		$this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.user_id',$user_id);
		$this->db->where('xf_guest_users.project_id',$project_id);
		if($query=$this->db->get()){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getChatUsersByProjectUser($user_id,$project_id)
	{

		$this->db->select('xf_chat_users.*');
		$this->db->from('xf_chat_users');
		$this->db->where('xf_chat_users.user_id',$user_id);
		$this->db->where('xf_chat_users.project_id',$project_id);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());
			return $query->row();
		}else{
			return false;
		}
		return 1;
	}

	function deletegetChatUsersInfoByProjectUser($user_id,$project_id){
	
		$this->db->where('xf_chat_users.user_id',$user_id); 
		$this->db->where('xf_chat_users.project_id',$project_id); 
		$this->db->delete('xf_chat_users');
	   }
	


	public function getChatUsersInfoByProjectUser($user_id,$project_id)
	{

		$this->db->select('xf_chat_users.*,u.first_name,u.last_name,u.salutation,u.gender,u.company,u.last_login');
		$this->db->from('xf_chat_users');
		$this->db->where('xf_chat_users.user_id',$user_id);
		$this->db->where('xf_chat_users.project_id',$project_id);
		$this->db->join('users as u', 'u.id = xf_chat_users.user_id','left');
		if($query=$this->db->get()){
			//print_r($this->db->last_query());
			return $query->row();
		}else{
			return false;
		}
		return 1;
	}

	public function AddChatUser($data)
	{
		$this->db->insert('xf_chat_users',$data);
		return $this->db->insert_id();
	}


	public function Chatuserdetails($userid,$projectID)
	{
		$this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		$this->db->where('xf_guest_users.user_id',$userid);
		$this->db->where('xf_guest_users.project_id',$projectID);
		//$this->db->where('xf_guest_users.project_id',$projectid);
		if($query=$this->db->get()){
			//print_r($this->db->last_query());die;
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function userStatus()
	{
		$user_id=$this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('users'); 
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		$user=$query->row();
		return $user->active;
	}
}
?>
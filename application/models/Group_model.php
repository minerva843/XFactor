<?php 
class Group_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_groups()
	{
		$this->db->select('xf_mst_group.*');
		$this->db->from('xf_mst_group');
		$this->db->order_by('xf_mst_group.id','DESC');
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		
		return $query->result();
	}
	
	public function get_group_byId($id=NULL)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_group');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function get_admin_groups($id=NULL)
	{
		$this->db->select('xf_mst_group.*');
		$this->db->from('xf_mst_group');
		$this->db->join('users_groups','users_groups.group_id=xf_mst_group.id');
		$this->db->where('users_groups.user_id',$this->session->userdata('user_id'));
		$this->db->where('users_groups.group_admin',1);
		$this->db->order_by('xf_mst_group.id','DESC');
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		
		return $query->result();
	}
	
	public function get_chat_groups($user_id)
	{
		$this->db->select('*');
		$this->db->from('chat_group_guest_assign');
		$this->db->join('xf_mst_chat_groups' , 'chat_group_guest_assign.chat_group_id=xf_mst_chat_groups.id');
		$this->db->where('guest_id',$user_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		return $query->result();
	}
	
	public function groupDetl($mmid)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_chat_groups');
		$this->db->where('xf_mst_chat_groups.mm_group_id',$mmid);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function alluser($groupID)
	{
		$this->db->select('chat_group_guest_assign.*,xf_guest_users.*,users.avatar');
		$this->db->from('chat_group_guest_assign');
		$this->db->join('xf_guest_users','chat_group_guest_assign.guest_id=xf_guest_users.id');
		$this->db->join('users','xf_guest_users.user_id=users.id');
		$this->db->where_in('chat_group_guest_assign.chat_group_id', $groupID);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_project_id($id)
	{
		$query = $this->db->get_where('xf_mst_project', array('id' => $id));
		return $query->row();
	}
	
	public function FetchDataById($id)
	{
		$this->db->select('p.*,group.group_name,group.status as group_status');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id');
		$this->db->where('p.id',$id);
		$query = $this->db->get();
		
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	public function insert_xf_mst_project($data){
		//print_r($data);die;
		if($this->db->insert('xf_mst_project',$data)){
			return true;
		}
		else
		{
			return false;
		}
	} 
	
	public function edit_project($data)
	{
		//print_r($data);die;
		$this->db->where('id',$data['id']);
		if($this->db->update('xf_mst_project', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete_project($id)
	{
		//print_r($data);die;
		$this->db->where('id', $id);
		if($this->db->delete('xf_mst_project'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function temp_add_form($field_val,$xf_mst_project_id,$url)
	{
		$this->db->where('id',$xf_mst_project_id);
		if($this->db->update('xf_mst_project', array('key'=>$field_val,'register_url'=>$url))){
			return true;
		}else{
			return false;
		}
	}
	
	public function last_register_id()
	{
		$this->db->from('xf_mst_project_master_field');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		//print_R($this->db->last_query());die;
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function checkurl($full_url=NULL)
	{
		$query = $this->db->get_where('xf_mst_project',array('register_url'=>$full_url));
		if($query){
			return $query->row();
		}else{
			return false; 
		}
	}
	
	public function InsertGenerateForm($form_data)
	{
		if($this->db->insert('xf_mst_users',$form_data)){
			//$lastid=$this->db->insert_id();
			
			return true;
		}else{
			return false;
		}
	}
	
}
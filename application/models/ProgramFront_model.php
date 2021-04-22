<?php

class ProgramFront_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    
	
	
	function insertHistory($data){
		if($this->db->insert('xf_mst_program_users_history',$data)){
			//return $this->db->insert_id();
			return true;
		}
		else
		{
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
	
	function FetchFloorDataById($data){
		$this->db->select('*');
		$this->db->from('xf_mst_program_info');
		$this->db->where($data);
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
		//$this->db->where('id',$id); 
		$this->db->where('x_content_id',$id);
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
	
	function FetchPostsDataByIconId($icon_id=NULL){
		$this->db->select('post.*,xf_mst_content_post_mapping.info_icon,u.username,u.guest_type');
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
	
	function FetchPostFilesData($post_id=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_files'); 
		$this->db->where('xmanage_id',$post_id);
		$this->db->limit(5);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchProjectById($project=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_program_info');
		//$this->db->join('xf_mst_project as pro', 'xf_mst_program_info.project_id = pro.id','left');
		// $this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		$this->db->where('project_id',$project);
		//$this->db->where('floor_plan_id',$floor);
		$this->db->order_by('program_start_date_time', 'ASC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function FetchProject($project=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_program_info');
		//$this->db->join('xf_mst_project as pro', 'xf_mst_program_info.project_id = pro.id','left');
		// $this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		$this->db->where('project_id',$project);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function get_projects(){
		$this->db->select('xf_mst_program_info.*,gro.group_name,gro.status as group_status,gro.id as gro_id');
		$this->db->from('xf_mst_program_info');
		$this->db->join('xf_mst_project as pro', 'xf_mst_program_info.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		$this->db->order_by('xf_mst_program_info.id', 'DESC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function getProjectNamebyProjectId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_project');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
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

	
	
	
        
        function getFloorPlanbyProgram($id){
                $this->db->select('*');
                $this->db->where('id',$id);
		$this->db->from('xf_mst_program_info');
		$query = $this->db->get();
		$data=$query->row();
		 if($data){
			 return $data;
		 }else{
			 return false;
		 }
            
        }
		
		function getFloorPlan($id){
                $this->db->select('*');
                $this->db->where('id',$id);
		$this->db->from('xf_mst_floor_plan');
		$query = $this->db->get();
		$data=$query->row();
		 if($data){
			 return $data;
		 }else{
			 return false;
		 }
            
        }
	
	
	
}
?>

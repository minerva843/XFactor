<?php

class ContentFront_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
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
	
	function FetchContentById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_on_demand_content');
		$this->db->where('project_id',$id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$data = $query->result();  
		if($data){
			return $data;
		}else{
			return false; 
		}
	}
	
	function OnContentById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_on_demand_content');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();  
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function VideStreamById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_video_stream');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();  
		if($data){
			return $data; 
		}else{
			return false;
		}
	}
	function FetchVideoById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_video_stream');
		$this->db->where('project_id',$id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;  
		}else{
			return false;
		}
	}
	
	function AudioStreamById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_audio_stream');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;  
		}else{
			return false;
		}
	}
	function FetchAudioById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_audio_stream'); 
		$this->db->where('project_id',$id);
		$this->db->order_by('id', 'DESC');
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

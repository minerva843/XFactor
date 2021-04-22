<?php

class Post_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_post_info',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
	}
	
	public function addFiles($arr){
		if($this->db->insert('xf_mst_files',$arr)){ 
			return $this->db->insert_id(); 
		}
		else
		{
			return false; 
		}
	}
	
	function InsertFloorId($lastId,$array1){
		$this->db->where('id',$lastId);
		if($this->db->update('xf_mst_post_info', $array1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function DeleteImageDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_post_info');
		$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_post_info.post_id');
		$this->db->where_in('xf_mst_post_info.id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/post/'.$img->file_name;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
	}
	
	function DeleteAllDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_post_info');
		$this->db->join('xf_mst_files', 'xf_mst_files.xmanage_id = xf_mst_post_info.post_id');
		$this->db->where_in('xf_mst_post_info.project_id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/post/'.$img->file_name;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
	}
	
	function UpdateDropPoint($id,$floor_plan_drop_point){
		$this->db->where('id',$id);
		if($this->db->update('xf_mst_post_info', array('floor_plan_drop_point'=>$floor_plan_drop_point)))
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
		if($this->db->update('xf_mst_post_info', $array))
		{
			return $id;
		}
		else
		{
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
	
	function FetchIdsByPostId($id){
		$this->db->select('icon.info_icon_id,icon.flor_plan_id,xf_mst_zones.zone_id as zon_id');
		$this->db->from('xf_mst_content_post_mapping as p');
		$this->db->join('xf_mst_icon_positions as icon', 'p.info_icon = icon.id');
		$this->db->join('xf_mst_zones', 'icon.zone_id = xf_mst_zones.id');
		$this->db->where('p.post_id',$id);
		$query = $this->db->get();
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchFilesDataById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_files');
		$this->db->where('xmanage_id',$id);
		$this->db->limit(5);
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchImageFilesDataById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_files');
		$this->db->where('xmanage_id',$id);
		$this->db->where('xmanage_module','POST');
		$this->db->where('type','image');
		$this->db->limit(5);
		$this->db->order_by("id", "ASC");
		$query = $this->db->get();
		$data = $query->num_rows();
		if($data){
			return $data;
		}else{ 
			return false;
		}
	}
	function FetchVideoFilesDataById($id){ 
		// $sql = "SELECT * FROM xf_mst_files WHERE xmanage_id ='$id' AND type ='video' limit 5"; 
			// $data=$this->db->query($sql); 
		$this->db->select('*');
		$this->db->from('xf_mst_files');
		$this->db->where('xmanage_id',$id);
		$this->db->where('xmanage_module','POST');
		$this->db->where('type','video');
		$this->db->order_by("id", "ASC");
		$this->db->limit(5);
		$query = $this->db->get();
		$data = $query->num_rows();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchInfoIconCountDataById($id){  
		
		$this->db->select('*');
		$this->db->from('xf_mst_content_post_mapping');
		$this->db->where('post_id',$id);
		$query = $this->db->get();
		$data = $query->num_rows();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllGuestData(){
		$this->db->select('*');
		$this->db->from('xf_mst_guest_info'); 
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function searchGuest($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_guest_info');
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC'); 
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC'); 
		}
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		$query = $this->db->get();
		
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchGuestDataById($id){
            
        $this->db->select('guest.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_guest_info as guest');
		$this->db->join('xf_mst_group as gro', 'guest.group_id = gro.id','left');
		$this->db->join('xf_mst_project as pro', 'guest.project_id = pro.id' ,'left');
		$this->db->where('guest.id',$id);
		$query = $this->db->get();
		$data = $query->row();
		
		if($data){
			return $data;
		}else{
			return false; 
		}  
        }
	
	function GuestUsers($id=false)
	{
		 $this->db->select('*'); 
		$this->db->from('xf_guest_users');
		// $this->db->join('users', 'users.email = xf_guest_users.email','left');
		// $this->db->join('users_projects', 'users_projects.user_id = users.id' ,'left');
		// $this->db->where('users_projects.project_id',$id);
		$this->db->where('steps',4); 
		$this->db->where('project_id',$id); 
		$query = $this->db->get();
		$data = $query->result();
		
		if($data){
			return $data;
		}else{
			return false; 
		}  
        
	}
	
	function FetchDataByMultipleId($id){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,u.username,u.guest_type');
		$this->db->from('xf_mst_post_info as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		$this->db->join('xf_guest_users as u', 'p.post_owner = u.id','left');
		$this->db->where('p.steps',2);
		$this->db->where_in('p.id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function DelFileById($id){
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_files');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function DeleteDataByMultipleId($id){
		$this->db->where_in('id',$id);
		$data=$this->db->delete('xf_mst_post_info');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function ClearDeleteDataByMultipleId($id){
		$this->db->where_in('post_id',$id);
		$data=$this->db->delete('xf_mst_content_post_mapping');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteAll($id)
	{
		$this->db->where_in('project_id',$id);
		$query=$this->db->delete('xf_mst_post_info');

		if($query){
			return true; 
		}else{
			return false;
		}
	}
	
	function ClrearAll()
	{
		$this->db->where('post_id',$id);
		$data=$this->db->delete('xf_mst_content_post_mapping');

		if($data){
			return true; 
		}else{
			return false;
		}
	}
        
        function FetchDataByIdXFP($xfp){
            
          	$this->db->select('*');
		$this->db->from('xf_mst_post_info');
		$this->db->where('floor_plan_id',$xfp);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false; 
		}   
        } 
	
	function FetchAssignDataById($id=NULL){
		$this->db->select('xf_mst_content_post_mapping.*,xf_mst_icon_positions.info_icon_id,xf_mst_icon_positions.info_icon_number,xf_mst_zones.zone_name,pro.project_name');
		$this->db->from('xf_mst_content_post_mapping');
		$this->db->join('xf_mst_icon_positions', 'xf_mst_icon_positions.id = xf_mst_content_post_mapping.info_icon','left');
		$this->db->join('xf_mst_project as pro', 'xf_mst_icon_positions.project_id = pro.id','left');
		
		$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id','left');
		$this->db->where('xf_mst_content_post_mapping.post_id',$id); 
		$this->db->order_by("xf_mst_content_post_mapping.id", "desc");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function FetchAllData($project=NULL){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,u.username,u.guest_type');
		$this->db->from('xf_mst_post_info as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		//$this->db->join('xf_mst_content_post_mapping', 'xf_mst_content_post_mapping.post_id = p.id','left');
		$this->db->join('xf_guest_users as u', 'p.post_owner = u.id','left');
		$this->db->where('p.steps',2);
		$this->db->where('p.project_id',$project);  
		$this->db->order_by("p.last_edited_date_time", "desc");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function searchProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchFileDataOrderByAsc=NULL,$project=NULL){
		if(!empty($searchFileDataOrderByAsc)){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,u.username,u.guest_type,count(f.xmanage_id) as files_asc');
		}else{
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,u.username,u.guest_type');
		} 
		$this->db->from('xf_mst_post_info as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		
		$this->db->join('xf_mst_content_post_mapping', 'xf_mst_content_post_mapping.post_id = p.id','left');
		
		$this->db->join('xf_guest_users as u', 'p.post_owner = u.id','left');
		if(!empty($searchFileDataOrderByAsc)){
		$this->db->join('xf_mst_files as f', 'f.xmanage_id = p.post_id','left');
		}
		  
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		$this->db->where('p.steps',2);
		$this->db->where('p.project_id',$project);
		if(!empty($AllSearchData)){
			//for($i=0;$i<=count($searchAll);$i++){
				$this->db->group_start();
				$this->db->like('p.post_title',$AllSearchData);
				$this->db->or_like('p.post_id',$AllSearchData); 
				$this->db->or_like('u.guest_type',$AllSearchData); 
				$this->db->or_like('u.username',$AllSearchData);
				$this->db->or_like('p.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
			//} 
		}
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC'); 
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC'); 
		}
		if(!empty($searchFileDataOrderByAsc)){
			$this->db->group_by('f.xmanage_id');
			$this->db->order_by('files_asc','ASC'); 
		}
		$query = $this->db->get();
		
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
        
        function getFloorPlanbyProject($project_id){
                $this->db->distinct();
                $this->db->select('floor_plan_id,floor_plan_name');
                $this->db->where('project_id',$project_id);
                $this->db->where('floor_plan_id IS NOT NULL',NULL);
		$this->db->from('xf_mst_post_info');
		$query = $this->db->get();
		return $query->result();
		 
            
        }
        
        
       function deleteJunkRecordPost($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_post_info');
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
		$this->db->where('tmp_edit_cache.module_name','POSTS');
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function getFilesOldUpdateData($id){
		$this->db->select('tmp_edit_cache.*');
		$this->db->from('tmp_edit_cache');
		$this->db->where('tmp_edit_cache.post_xmanage_id',$id);
		$this->db->where('tmp_edit_cache.module_name','POST');
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
	$this->db->update('xf_mst_post_info',$data);
	
	}
	
	function InsertFilesTableOldData($data){
		if($this->db->insert('xf_mst_files',$data)){
				return $this->db->insert_id();
			}
			else
			{
				return false; 
			}
	
	}
	
	

	
}
?>

<?php

class Audio_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_audio_stream',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
	}
	
	
	function InsertFloorId($lastId,$array1){
		$this->db->where('id',$lastId);
		if($this->db->update('xf_mst_audio_stream', $array1))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function UpdateDropPoint($id,$floor_plan_drop_point){
		$this->db->where('id',$id);
		if($this->db->update('xf_mst_audio_stream', array('floor_plan_drop_point'=>$floor_plan_drop_point)))
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
		if($this->db->update('xf_mst_audio_stream', $array))
		{
			return $id;
		}
		else
		{
			return false;
		}
	}
	
	function FetchDataById($id){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_audio_stream as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		
		$this->db->where('p.id',$id);
		$query = $this->db->get();
		$data = $query->row();
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
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$data = $query->result();
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
	
	
	
	function FetchDataByMultipleId($id){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_audio_stream as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
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
		$data=$this->db->delete('xf_mst_audio_stream');
		if($data){
			return true; 
		}else{
			return false;
		}
	}
	
	function deleteAll($id=NULL)
	{
		$this->db->where_in('project_id',$id);
		$query=$this->db->delete('xf_mst_audio_stream');
		if($query){
			return true; 
		}else{
			return false;
		}
	}
        
        function FetchDataByIdXFP($xfp){
            
          	$this->db->select('*');
		$this->db->from('xf_mst_audio_stream');
		$this->db->where('floor_plan_id',$xfp);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false; 
		}   
        } 
	
	function FetchAllData($project=NULL){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_audio_stream as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
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
	
	function searchProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_audio_stream as p');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		
		
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		$this->db->where('p.project_id',$project);
		if(!empty($AllSearchData)){
			//for($i=0;$i<=count($searchAll);$i++){ 
				$this->db->group_start();
				$this->db->like('p.audio_stream_name',$AllSearchData);
				$this->db->or_like('p.audio_stream_source',$AllSearchData); 
				$this->db->or_like('p.audio_stream_url',$AllSearchData); 
				$this->db->or_like('p.audio_stream_id',$AllSearchData); 
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
		$this->db->from('xf_mst_audio_stream');
		$query = $this->db->get();
		return $query->result();
		 
            
        }
	
	
	
}
?>
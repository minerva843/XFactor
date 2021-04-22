<?php

class Floor_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_floor_plan',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	public function SaveGridZoneMappingData($userdata){
		if($this->db->insert('xf_mst_grid_zone_mapping',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}
	
	function InsertFloorId($lastId,$array1){
		$this->db->where('id',$lastId);
		if($this->db->update('xf_mst_floor_plan', $array1))
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
		$this->db->from('xf_mst_floor_plan');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/floor_plan/'.$img->file_name.$img->file_type;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
	}
	
	function DeleteAllImage($id){
		$this->db->select('*');
		$this->db->from('xf_mst_floor_plan');
		$this->db->where_in('project_id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/floor_plan/'.$img->file_name.$img->file_type;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
	}

	
	function UpdateDropPoint($id,$floor_plan_drop_point){
		$this->db->where('id',$id);
		if($this->db->update('xf_mst_floor_plan', array('floor_plan_drop_point'=>$floor_plan_drop_point)))
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
		if($this->db->update('xf_mst_floor_plan', $array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function FetchDataById($id){
		$this->db->select('f.*,p.project_name,p.project_type,p.project_status,p.project_id as proj_id,gro.group_name,gro.status as group_status,gro.id as gro_id');
		$this->db->from('xf_mst_floor_plan as f');
		$this->db->join('xf_mst_group as gro', 'f.group_id = gro.id','left');
		$this->db->join('xf_mst_project as p', 'p.id = f.project_id','left');
		$this->db->where('f.id',$id);

		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchDataByMultipleId($id){
		$this->db->select('f.*,p.project_name,p.project_status,p.project_id as proj_id,gro.group_name,gro.status as group_status,gro.id as gro_id');
		$this->db->from('xf_mst_floor_plan as f');
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
		$data=$this->db->delete('xf_mst_floor_plan');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteAllfloor($id=NULL)
	{
		$this->db->where('project_id',$id);
		$query=$this->db->delete('xf_mst_floor_plan');
//		$query=$this->db->empty_table('xf_mst_floor_plan');
		if($query){
			return true; 
		}else{
			return false;
		}
	}
        
        function FetchDataByIdXFP($xfp){
            
          	$this->db->select('*');
		$this->db->from('xf_mst_floor_plan');
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
	//echo $project;  
		$this->db->select('f.*,p.project_name,p.project_status,p.project_id as proj_id,gro.group_name,gro.status as group_status,gro.id as gro_id'); 
		//if(!empty($project)){
		
		//}
		//$_SESSION['project']=552;
		$this->db->from('xf_mst_floor_plan as f');
		$this->db->join('xf_mst_project as p', 'p.id = f.project_id','left'); 
		$this->db->join('xf_mst_group as gro', 'f.group_id = gro.id','left');
		 //$this->db->where('f.project_id',$_SESSION['project']);
		 //added by Ritika on 30-09-2020
		if(!empty($project))
		{
			$this->db->where('f.project_id',$project); 
		}	
		
		//$this->db->where('f.project_id',570);
		//$this->db->order_by("f.id", "desc");
		$this->db->order_by('f.last_edited_date_time','DESC');
		$query = $this->db->get();
		
		//print_r($this->db->last_query()); die;
		$data = $query->result_array();
		
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function searchFloor($searchFloor=false,$searchFloorOrderBy=false,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL){
		$this->db->select('f.*,p.project_name,p.project_status,p.project_id as proj_id,p.event_start_date_time');
		$this->db->from('xf_mst_floor_plan as f');
		$this->db->join('xf_mst_project as p', 'p.id = f.project_id','left');
		if(!empty($searchFloor)){
		$this->db->where($searchFloor);
		}
		//added by Ritika on 30-09-2020
		if(!empty($project)){
		$this->db->where('f.project_id',$project);
		}
		if(!empty($AllSearchData)){
			
				$this->db->group_start();
				$this->db->like('f.floor_plan_name',$AllSearchData);
				$this->db->or_like('f.floor_plan_id',$AllSearchData); 
				$this->db->or_like('p.project_name',$AllSearchData);
				$this->db->or_like('f.each_square',$AllSearchData);
				$this->db->or_like('f.floor_plan_drop_point',$AllSearchData);
				$this->db->or_like('f.last_edited_date_time',$AllSearchData);
				$this->db->group_end();
			
		}
		if(!empty($searchFloorOrderBy)){
			$this->db->order_by($searchFloorOrderBy,'DESC');
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
        
        function getFloorPlanbyProject($project_id){
               //$this->db->distinct();
                $this->db->select('floor_plan_id,floor_plan_name');
                $this->db->where('project_id',$project_id);
               // $this->db->where('floor_plan_id IS NOT NULL',NULL);
		$this->db->from('xf_mst_floor_plan');
		$query = $this->db->get();
		return $query->result();
		 
            
        }
        
        
        function deleteJunkRecordFloor($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_floor_plan');
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
		$this->db->where('tmp_edit_cache.module_name','FLOOR');
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
	$this->db->update('xf_mst_floor_plan',$data);
	
	}
	
	
	
	
}
?>

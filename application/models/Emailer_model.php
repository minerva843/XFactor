<?php

class Emailer_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_emailer',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
	}
	
	
	
	function InsertFloorId($lastId,$array1){
		$this->db->where('id',$lastId);
		if($this->db->update('xf_mst_emailer', $array1))
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
		if($this->db->update('xf_mst_program_info', array('floor_plan_drop_point'=>$floor_plan_drop_point)))
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
		if($this->db->update('xf_mst_emailer', $array))
		{
			return $id;
		}
		else
		{
			return false;
		}
	}
	
	function FetchDataById($id){
		$this->db->select('e.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_emailer as e');
		$this->db->join('xf_mst_project as pro', 'e.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'e.group_id = gro.id','left');
		$this->db->where('e.id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{ 
			return false; 
		} 
	}
	
	
	
	
	
	function FetchDataByMultipleId($id){
		$this->db->select('e.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_emailer as e');
		$this->db->join('xf_mst_project as pro', 'e.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'e.group_id = gro.id','left');
		
		$this->db->where_in('e.id',$id);
		$this->db->order_by("e.id", "desc");
		$query = $this->db->get();
		$data = $query->result();
		
		if($data){
			return $data;
		}else{
			return false;
		}
		
	}
	

	function DeleteDataByMultipleId($id){
		$this->db->where_in('id',$id);
		$data=$this->db->delete('xf_mst_emailer');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function DeleteImageDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_emailer');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				//$uploadurl= './assets/emailer/'.$img->file_name;
				if(!empty($img->image1)){
					unlink('./assets/emailer/'.$img->image1);
				}
				if(!empty($img->image2)){
					unlink('./assets/emailer/'.$img->image2);
				}
				if(!empty($img->image3)){
					unlink('./assets/emailer/'.$img->image3);
				}
				if(!empty($img->pdf1)){
					unlink('./assets/emailer/'.$img->pdf1);
				}
				if(!empty($img->pdf2)){
					unlink('./assets/emailer/'.$img->pdf2);
				}
				if(!empty($img->pdf3)){
					unlink('./assets/emailer/'.$img->pdf3);
				}
				
			}
			
		}else{
			return false;
		} 
	}
	
	function DeleteAllImage($id){
		$this->db->select('*');
		$this->db->from('xf_mst_emailer');
		$this->db->where('project_id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				//$uploadurl= './assets/emailer/'.$img->file_name;
				unlink('./assets/emailer/'.$img->image1);
				unlink('./assets/emailer/'.$img->image2);
				unlink('./assets/emailer/'.$img->image3);
				unlink('./assets/emailer/'.$img->pdf1);
				unlink('./assets/emailer/'.$img->pdf2);
				unlink('./assets/emailer/'.$img->pdf3);
				
			}
			
		}else{
			return false;
		} 
	}
	
	function deleteAll($id=false)
	{
		$this->db->where('project_id',$id);
		$data=$this->db->delete('xf_mst_emailer');
		if($data){
			return true; 
		}else{
			return false;
		}
	}
        
        
	
	function FetchAllData($project=NULL){
		$this->db->select('e.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_emailer as e');
		$this->db->join('xf_mst_project as pro', 'e.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'e.group_id = gro.id','left');
		$this->db->where('e.project_id',$project); 
		
		$this->db->order_by("e.last_edited_date_time", "desc");

		
		$query = $this->db->get();
		$data = $query->result_array();
		
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function EmailerFetchAllData($project=NULL){
		$this->db->select('e.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id');
		$this->db->from('xf_mst_emailer as e');
		$this->db->join('xf_mst_project as pro', 'e.project_id = pro.id','left');
		$this->db->join('xf_mst_group as gro', 'e.group_id = gro.id','left');
		$this->db->where('e.project_id',$project); 
		
		$this->db->order_by("e.last_edited_date_time", "desc");

		
		$query = $this->db->get();
		$data = $query->result();
		
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllGuestData($project=NULL){
		$this->db->select('*');
		
		if(!empty($project)){
		$this->db->where('project_id',$project);
		}
		$this->db->from('xf_guest_users');
		
		$this->db->order_by("id", "desc");
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
		$this->db->from('xf_guest_users as guest');
		$this->db->join('xf_mst_project as pro', 'guest.project_id = pro.id' ,'left');
		$this->db->join('xf_mst_group as gro', 'guest.group_id = gro.id','left');
		
		$this->db->where('guest.id',$id);
		$query = $this->db->get();
		$data = $query->row();
		
		if($data){
			return $data;
		}else{
			return false; 
		}  
        } 
		
		function GuestUserNameById($id){
            
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
		
		function FetchProjectTypeIdGuest($id){
            
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
	
	
	function FetchAllAssignmentData($project=NULL){
		$this->db->select('p.*,gro.group_name,gro.status as group_status,gro.id as gro_id,pro.project_id as proj_id,floor.floor_plan_id as floor_id,floor.file_name,floor.file_type,floor.floor_plan_drop_point,floor.floor_plan_name');
		$this->db->from('xf_mst_program_info as p');
		$this->db->join('xf_mst_group as gro', 'p.group_id = gro.id','left');
		$this->db->join('xf_mst_floor_plan as floor', 'p.floor_plan_id = floor.id','left');
		$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->where('p.project_id',$project); 
		$this->db->order_by("p.id", "desc");
		$query = $this->db->get();
		$data = $query->result_array();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	function searchAssignmentProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$project=NULL){
		$this->db->select('e.*,pro.project_id as proj_id');
		$this->db->from('xf_mst_emailer as e');
		
		$this->db->join('xf_mst_project as pro', 'e.project_id = pro.id','left');
		
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		
		$this->db->where('e.project_id',$project); 
	
		if(!empty($AllSearchData)){
			
				$this->db->group_start();
				$this->db->like('e.emailer_title',$AllSearchData);
				$this->db->or_like('e.emailer_id',$AllSearchData); 
				//$this->db->or_like('e.emailer_id',$AllSearchData); 
				
				$this->db->group_end();
			
		}
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC'); 
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC'); 
		}
		$this->db->order_by('e.last_edited_date_time','DESC');
		$query = $this->db->get();
		
		$data = $query->result_array(); 
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	function searchProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL){
		$this->db->select('prog.*,p.event_start_date_time,p.event_end_date_time');
		$this->db->from('xf_mst_program_info as prog');
		$this->db->join('xf_mst_project as p', 'p.id = prog.project_id','left');
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
	
	function searchGuest($search=NULL,$AllSearchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$project=NULL){
		$this->db->select('*');
		$this->db->from('xf_guest_users');
	
		if(!empty($search)){
		$this->db->where('guest_type',$search);
		}
		
		
		$this->db->where('project_id',$project);
		$this->db->where('steps',4);
		if(!empty($AllSearchData)){
			//for($i=0;$i<=count($searchAll);$i++){
				$this->db->group_start();
				$this->db->like('first_name',$AllSearchData);
				$this->db->or_like('last_name',$AllSearchData); 
				$this->db->or_like('username',$AllSearchData); 
				$this->db->or_like('guest_type',$AllSearchData);
				$this->db->or_like('email',$AllSearchData);
				$this->db->or_like('phone',$AllSearchData);
				$this->db->or_like('company',$AllSearchData);
				
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
		
		$data = $query->result_array();
		
		//print_r($this->db->last_query()); exit;
		
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
		$this->db->from('xf_mst_program_info');
		$query = $this->db->get();
		return $query->result();
		 
            
        }
        
             function deleteJunkRecordEmailer($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_emailer');
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
		$this->db->where('tmp_edit_cache.module_name','EMAILER');
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
	$this->db->update('xf_mst_emailer',$data);
	
	
		
		
    }
	
	
	
}
?>

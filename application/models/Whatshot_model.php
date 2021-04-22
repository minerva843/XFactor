<?php

class Whatshot_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_whatshot',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
	}
	
	
	
	
	function UpdateData($id,$array){
		$this->db->where('id',$id);
		if($this->db->update('xf_mst_whatshot', $array))
		{
			return $id;
		}
		else
		{
			return false;
		}
	}
	
	function UpdateWhereInSlotData($id,$array){
		$this->db->where_in('id',$id);
		if($this->db->update('xf_whatshot_slots', $array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function FetchDataById($id){
		$this->db->select('*');
		$this->db->from('xf_mst_whatshot');
		//$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchSlotDataById($id){ 
		$this->db->select('*');
		$this->db->from('xf_whatshot_slots');
		//$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		
		$this->db->where('id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	

	
	function FetchDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_whatshot');
		//$this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function DeleteImageDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_whatshot');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/whats_hot/'.$img->file_name;
				unlink($uploadurl);
				
			}
			
		}else{
			return false;
		} 
	}
	
	function DeleteAllImage(){
		$this->db->select('*');
		$this->db->from('xf_mst_whatshot');
		
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/whats_hot/'.$img;
				unlink($uploadurl);
			}
			
		}else{
			return false;
		} 
	}
	
	function FetchSlotsDataByMultipleId($id){
		$this->db->select('xf_mst_whatshot.*');
		$this->db->from('xf_whatshot_slots');
		$this->db->join('xf_mst_whatshot', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id');
		$this->db->where_in('xf_whatshot_slots.id',$id);
		$this->db->where('xf_whatshot_slots.whatshot_id is  NOT NULL');
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
		$data=$this->db->delete('xf_mst_whatshot');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function RemoveDataByMultipleId($id){
		$update['whatshot_id']=NULL;
		$update['last_edited_date_time']=date('Y-m-d G:i');
		$update['last_edited_by']=$this->session->userdata('xmanage_id');
		$update['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
		$this->db->where_in('id',$id);
		if($this->db->update('xf_whatshot_slots', $update))
		{
			return true;
		}else{
			return false;
		}
	}
	
	
	
	function deleteAll()
	{
		
		//$query=$this->db->delete('xf_mst_post_info');
		$query=$this->db->empty_table('xf_mst_whatshot');
		if($query){
			return true; 
		}else{
			return false;
		}
	}
	
	
	
	function FetchSlotsDataById($project=NULL){
		$this->db->select('*');
		$this->db->from('xf_whatshot_slots');
		$this->db->join('xf_mst_whatshot', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id');
		$this->db->where('xf_whatshot_slots.whatshot_id',$project); 
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllSlotsAssignData($project=NULL){
		$this->db->select('xf_whatshot_slots.slot_id,xf_whatshot_slots.id,xf_mst_whatshot.whatshot_title,xf_mst_whatshot.id as whats_id,xf_whatshot_slots.last_edited_date_time,xf_mst_whatshot.whatshot_id,xf_mst_whatshot.file_name,xf_mst_whatshot.file_type,xf_mst_whatshot.whatshot_btnurl,xf_mst_whatshot.whatshot_desc,xf_mst_whatshot.whatshot_posted_date');
		$this->db->from('xf_whatshot_slots');
		$this->db->join('xf_mst_whatshot', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id');
		$this->db->where('xf_whatshot_slots.whatshot_id is  NOT NULL');   
		$this->db->order_by("xf_whatshot_slots.slot_id", "ASC");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllAssignData($project=NULL){
		$this->db->select('xf_whatshot_slots.slot_id,xf_whatshot_slots.id,xf_mst_whatshot.whatshot_title,xf_mst_whatshot.id as whats_id,xf_whatshot_slots.last_edited_date_time,xf_mst_whatshot.whatshot_id,xf_mst_whatshot.file_name,xf_mst_whatshot.file_type,xf_mst_whatshot.whatshot_btnurl');
		$this->db->from('xf_whatshot_slots');
		$this->db->join('xf_mst_whatshot', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id','left');
		$this->db->order_by("xf_whatshot_slots.slot_id", "ASC");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function FetchAllData($project=NULL){
		$this->db->select('*');
		$this->db->from('xf_mst_whatshot');
		// $this->db->join('xf_mst_project as pro', 'p.project_id = pro.id','left');
		// $this->db->join('xf_mst_group as gro', 'pro.group_id = gro.id','left');
		
		$this->db->order_by("last_edited_date_time", "desc");
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function searchAssignProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchFileDataOrderByAsc=NULL,$project=NULL){
		
		$this->db->select('xf_whatshot_slots.slot_id,xf_whatshot_slots.id,xf_mst_whatshot.whatshot_title,xf_mst_whatshot.whatshot_type,xf_mst_whatshot.id as whats_id,xf_whatshot_slots.last_edited_date_time,xf_mst_whatshot.whatshot_id,xf_mst_whatshot.file_name,xf_mst_whatshot.file_type,xf_mst_whatshot.whatshot_btnurl');
		
		$this->db->from('xf_whatshot_slots');
		$this->db->join('xf_mst_whatshot', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id','left');
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		
		if(!empty($AllSearchData)){
			
				$this->db->group_start();
				$this->db->like('xf_mst_whatshot.whatshot_title',$AllSearchData);
				$this->db->or_like('xf_mst_whatshot.whatshot_id',$AllSearchData); 
				
				$this->db->group_end();
			
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
	
	function searchProgram($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$searchFileDataOrderByAsc=NULL,$project=NULL){
		
		$this->db->select('xf_mst_whatshot.*');
		
		$this->db->from('xf_mst_whatshot');
		$this->db->join('xf_whatshot_slots', 'xf_mst_whatshot.id = xf_whatshot_slots.whatshot_id','left');
		if(!empty($searchData)){
		$this->db->where($searchData);
		}
		
		if(!empty($AllSearchData)){
			
				$this->db->group_start();
				$this->db->like('xf_mst_whatshot.whatshot_title',$AllSearchData);
				$this->db->or_like('xf_mst_whatshot.whatshot_id',$AllSearchData); 
				
				$this->db->group_end();
			
		}
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'DESC'); 
		}
		if(!empty($searchDataOrderByAsc)){
			$this->db->order_by($searchDataOrderByAsc,'ASC'); 
		}
		
		$this->db->group_by('xf_mst_whatshot.whatshot_id');
		$query = $this->db->get();
		
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
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
    
    
	
	
		
	

	
}

?>

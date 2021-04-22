<?php

class Setting_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_setting',$userdata)){
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
	}
	
	
	
	function UpdateData($array){
		
		if($this->db->update('xf_mst_setting', $array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
	function checkentryornot(){
		 $this->db->select('*');
		$this->db->from('xf_mst_setting');
		//$this->db->order_by("id", "desc");
		$query = $this->db->get();
		
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	
}
?>
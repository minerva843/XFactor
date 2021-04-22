<?php

class Auth_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
    public function insert($userdata){
		if($this->db->insert('xf_mst_users',$userdata)){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function ForgetPassword($email)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_users');
		$this->db->where('email',$email);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		} else{
			return false;
		}
	}
	
	
	
	public function CheckId($id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_users');
		$this->db->where('id',$id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		} else{
			return false;
		}
	}
	
	public function checkuser_otp($id,$otp) 
	{
		
		$data = array('id'=>$id,'otp'=>$otp);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($data);
		$this->db->limit(1);
		$query = $this->db->get();
		$result=$query->row();
		
		if($query->num_rows() > 0){
			return true;
		} else{
			return false;
		}
		
		// $this->db->select('*');
		// $this->db->from('users');
		// $this->db->where('id',$id);
		// $this->db->where('otp',$otp);
		// $query = $this->db->get();
		// $query=$query->num_rows();
		// if($query){
			// return true;
		// }else{
			// return false;
		// }
	}
	
	public function ResetPassword($id,$password)
	{
		$this->db->set('password', $password);
		$this->db->where('id', $id);
		$query=$this->db->update('xf_mst_users');
		
		if($query){
			return true;
		} else{
			return false;
		}
	}
	
	public function updatepassword($id,$password)
	{
		$this->db->set('active', 1);
		$this->db->set('password', $password);
		$this->db->where('id', $id);
		$query=$this->db->update('users');
		
		if($query){
			return true;
		} else{
			return false;
		}
	}
	
	public function SaveUserDetails($id,$data)
	{
		
		$this->db->where('id', $id);
		$query=$this->db->update('users',$data);
		
		if($query){
			return true;
		} else{
			return false;
		} 
	}
	
	public function login($userdata)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_users');
		$this->db->where('email',$userdata['email']);
		$this->db->where('password',$userdata['password']);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		} else{
			return false;
		}
	}
	
	public function compareOtp($reqotp,$email)
	{
		
		$data = array('email'=>$email,'loginotp'=>$reqotp);
		$this->db->select('*');
		$this->db->from('xf_mst_users');
		$this->db->where($data);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		} else{
			return false;
		}
	}
	
	public function ForgetUserId($userdata)
	{
		$this->db->select('email');
		$this->db->from('xf_mst_users');
		$this->db->where($userdata);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		} else{
			return false;
		}
	}

	function getZonesTypes(){

		$this->db->distinct();
		$this->db->select("zone_type");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}

    function getZones(){

		$this->db->select("*");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}

 function getZonesdist(){
                 $this->db->distinct();
		$this->db->select("zone_name");
		$this->db->from('xf_mst_zones');
		$query = $this->db->get();
		return $query->result();
	}
        
         function getZonesdist2(){
                 $this->db->distinct();
		$this->db->select("zone_name,zone_id");
		$this->db->from('xf_mst_zones');
                $this->db->group_by('zone_name');
		$query = $this->db->get();
		return $query->result();
	}
	function saveZoneMapping($data){
		$this->db->insert('xf_mst_grid_zone_mapping',$data);

	}
        
        
        function delete_icons($icon){
            
            $this->db->where('info_icon_id',$icon);
            $this->db->delete('xf_mst_icon_positions');
            
        }
        
       function saveDragIconPosition($data){
                 $this->delete_icons($data['info_icon_id']);
		$this->db->insert('xf_mst_icon_positions',$data);

	}
        
        function getZoneIcons($zone){
            
                
                $this->db->select("*");
                $this->db->where('zone_id',$zone);
		$this->db->from('xf_mst_icon_positions');
		$query = $this->db->get();
		return $query->result();
        }
        
        function getSelectedZones(){
          
            	$this->db->select("grid_id");
		$this->db->from('xf_mst_grid_zone_mapping');
		$query = $this->db->get();
		$array  =  $query->result();
                $arr = array_column($array,"grid_id");
                return $arr;
            
        }
        
        function getZonesId($zone_type){
            $this->db->select("zone_id");
            $this->db->where('zone_name',$zone_type);
            $this->db->from('xf_mst_zones');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        function filterZone($zone_type){
           // $sql = "SELECT  FROM `xf_mst_grid_zone_mapping` JOIN xf_mst_zones ON xf_mst_grid_zone_mapping.zone_id=xf_mst_zones.zone_id where xf_mst_grid_zone_mapping.zone_id;
            
            $zones_ids = $this->getZonesId($zone_type);
            foreach ($zones_ids as $zid){
               $zones_ids_arr[] = $zid['zone_id']; 
            }
             
 
            $this->db->select("grid_id,xf_mst_grid_zone_mapping.zone_id");
            $this->db->where_in('xf_mst_grid_zone_mapping.zone_id',$zones_ids_arr);
            $this->db->join('xf_mst_zones','xf_mst_grid_zone_mapping.zone_id=xf_mst_zones.zone_id');
            $this->db->from('xf_mst_grid_zone_mapping');
            $query = $this->db->get();

            return $query->result_array();
        } 
	
	public function sendotp($otp,$email)
	{
		$this->db->set('loginotp', $otp);
		$this->db->where('email', $email);
		$query=$this->db->update('xf_mst_users');
		
		if($query){
			return true;
		} else{
			return false;
		}
	}
	
}
?>
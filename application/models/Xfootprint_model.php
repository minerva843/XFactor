<?php

class Xfootprint_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
    }
    
   
	
   
	function FetchDataById($id){
		$this->db->select('*');
		$this->db->from('xf_guest_count');
		$this->db->where('xf_guest_count.id',$id);
		 
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	
	function getActivity($id){
	
	
	
		$this->db->select('*');
		$this->db->from('xf_vw_footprint');
		$this->db->where('xf_vw_footprint.id',$id);
		 
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	
	function getUserFootprintData($project,$user){
	
	
		$this->db->select('*');
		$this->db->from('vw_xf_users_footprints');
		$this->db->where('vw_xf_users_footprints.project_id',$project);
		$this->db->where('vw_xf_users_footprints.user_ID',$user);
		 
		$query = $this->db->get();
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	}
	
 
        
        
	
	function FetchAllData($project=NULL,$searchFloorOrderBy=NULL){
	
	
	        $this->db->select('xf_guest_users.*');
		$this->db->from('xf_guest_users');
		//$this->db->join('xf_mst_zones', 'xf_mst_icon_positions.zone_id = xf_mst_zones.id');
              // $this->db->join('xf_mst_content_set', 'xf_mst_icon_positions.content_set_id = xf_mst_content_set.id','left');
               //$this->db->join('xf_mst_project', 'xf_mst_project.id = xf_mst_icon_positions.project_id','left');
		
		if(!empty($project)){ 
		$this->db->where('xf_guest_users.project_id',$project);
		}
		
		$this->db->where('steps',4);
		
 		if(!empty($searchFloorOrderBy)){
 			$this->db->order_by($searchFloorOrderBy);
 		}else{
 		
 		$this->db->order_by('xf_guest_users.id','desc');
 		
 		}
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	
	}
	
 
	
	
 
	function getPreviousCounts($yesterday,$projectid){
	
	        $this->db->select('*');
		$this->db->from('xf_guest_count');
		$this->db->where('xf_guest_count.count_date',$yesterday);
		$this->db->where('xf_guest_count.project_id',$projectid);
		 $this->db->group_by('project_id');
		 
		 
		$query = $this->db->get();
		
		//print_r($this->db->last_query()); //exit;
		$data = $query->row();
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	function insertProjectCountTable($data){
	
	$this->db->insert('xf_guest_count',$data);
	
	}
	
	
	
	function updateCountTable($data,$projectid,$today){
	$this->db->where('project_id',$projectid);
	$this->db->where('count_date',$today);
	$this->db->update('xf_guest_count',$data);
	
	}
	
	
	function getProjectCountTable($data){
	
	
	
		 
                $this->db->select('*');
		$this->db->from('xf_guest_count');
		
		$this->db->where($data);
		   
		$query = $this->db->get();
		 //print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	
	}
	
	
	
	
	function getGuestUpdatesProjectIds($today){
	
		$this->db->distinct();
                $this->db->select('project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		 
		$this->db->group_by('project_id');
		 
		$query = $this->db->get();
		 
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
	
	
	
	
	
	function getGuestUpdatesProjectIdsAll(){
	
		$this->db->distinct();
                $this->db->select('project_id');
		$this->db->from('xf_guest_users');
		
		//$this->db->where('date(created_date_time)',$today);
		 
		$this->db->group_by('project_id');
		 
		$query = $this->db->get();
		 
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
	
	
	
	
	function getGuestUpdatesProjectIdsgUESTcOUNT($yesterday){
	
		//$this->db->distinct();
                $this->db->select('*');
		$this->db->from('xf_guest_count');
		
		$this->db->where('date(count_date)',$yesterday);
		 
		 
		 
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
	
	
	
	function getGuestCountTodaypreregweb($today){
	
                $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','PREREGWB');
		$this->db->group_by('project_id');
		 
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
	
	
	
	
		function getGuestCountTodaypreregad($today){
	
                $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','PREREGAD');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
	
	
	
		function getGuestCountTodayonlineregweb($today){
	
                 $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','ONLINEWB');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	
	}
 
 
 
 
 
 
 function getGuestCountTodayonlineregad($today){
 
                $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','ONLINEAD');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
	
	
	
	
	 function getGuestCountTodayonsiteregweb($today){
 
                $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','ONSITEWEB');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
 
 
 
 
 function getGuestCountTodayonsiteregad($today){
 
                $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','ONSITEAD');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
 
 
 
 function getGuestCountTodayguestlitsupload($today){
 
               $this->db->select('COUNT(*) as tot,project_id');
		$this->db->from('xf_guest_users');
		
		$this->db->where('date(created_date_time)',$today);
		$this->db->where('guest_registration_type','MASS UPLOAD');
		 $this->db->group_by('project_id');
		$query = $this->db->get();
		//print_r($this->db->last_query()); //exit;
		$data = $query->result_array();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
 
 }
	
	
	
	
        function search($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$start_date,$end_date,$projectid){
       
             
                $this->db->select('xf_mst_places_users_history.*,xf_guest_users.xguest_id,xf_guest_users.email as gemail,xf_guest_users.company as gcompany,xf_guest_users.id as gtpid ');
          	 
		$this->db->from('xf_mst_places_users_history');
		$this->db->join('xf_guest_users', 'xf_mst_places_users_history.user_id = xf_guest_users.user_id');
		 
	        $this->db->where('xf_mst_places_users_history.created_at >=', $start_date);
                $this->db->where('xf_mst_places_users_history.created_at <=', $end_date);
	
		$this->db->where_in('xf_mst_places_users_history.module_name',['FLOOR PLAN','INFO ICON','WORKSHOP','SIGN IN','LOGOUT']);
	
			
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				//$this->db->like('xf_mst_places_users_history.first_name',$AllSearchData);
				$this->db->or_like('xf_mst_places_users_history.module_name',$AllSearchData); 
				//$this->db->or_like('xf_mst_places_users_history.guest_type',$AllSearchData);
				$this->db->or_like('xf_guest_users.email',$AllSearchData);
				$this->db->or_like('xf_guest_users.xguest_id',$AllSearchData);
				$this->db->or_like('xf_guest_users.company',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}

		$this->db->where('xf_mst_places_users_history.project_id',$projectid);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'ASC');
		}
		if(!empty($searchDataOrderByAsc)){
			 $this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		
		if(!empty($searchDataOrderByDsc)){
			 $this->db->order_by($searchDataOrderByDsc,'DESC');
		}
		$query = $this->db->get();
		 // PRINT_R($this->db->last_query());die;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}  
            
        }
        
        
        
        
        
        function searchguestCount($searchGuestType=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$AllSearchData=NULL,$start_date,$end_date,$projectid){
        
        
        
               $time=strtotime($start_date);
               $month=date("m",$time); 
               $year=date("Y",$time);

               $this->db->select('xf_guest_count.*'); 
          	 
		$this->db->from('xf_guest_count');
		//$this->db->join('xf_guest_users', 'xf_mst_places_users_history.user_id = xf_guest_users.user_id');
		// DATE_FORMAT(compareDayAndTime, '%m-%d')
	      //  $this->db->where('YEAR(xf_guest_count.count_date)',$year );
	       //  $this->db->where('MONTH(xf_guest_count.count_date)',$month);
	         
	         $this->db->where('xf_guest_count.count_date >=', $start_date);
                $this->db->where('xf_guest_count.count_date <=', $end_date);
                
		 
			
		if(!empty($AllSearchData)){ 
				$this->db->group_start();
				$this->db->like('xf_guest_count.onsiteregad',$AllSearchData);
				$this->db->like('xf_guest_count.guestlitsupload',$AllSearchData);
				$this->db->or_like('xf_guest_count.preregweb',$AllSearchData); 
				$this->db->or_like('xf_guest_count.onsireregweb',$AllSearchData);
				$this->db->or_like('xf_guest_count.preregad',$AllSearchData);
				$this->db->or_like('xf_guest_count.onlineregweb',$AllSearchData);
				$this->db->or_like('xf_guest_count.onlineregad',$AllSearchData);
				$this->db->group_end();
		} 
		if(!empty($searchGuestType)){
		$this->db->where($searchGuestType);
		}

		$this->db->where('xf_guest_count.project_id',$projectid);
		
		if(!empty($searchDataOrderBy)){
			$this->db->order_by($searchDataOrderBy,'ASC');
		}
		if(!empty($searchDataOrderByAsc)){
			 $this->db->order_by($searchDataOrderByAsc,'ASC');
		}
		
		if(!empty($searchDataOrderByDsc)){
			 $this->db->order_by($searchDataOrderByDsc,'DESC');
		}
		$query = $this->db->get();
		 // PRINT_R($this->db->last_query());die;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
        
        
        }
        
        
        
        
 
		
		function get_footprint_user_by_projectID($id,$footprint)
		{
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			//$this->db->join('users','users.id = vw_xf_users_footprints.user_id','left');
			$this->db->where('vw_xf_users_footprints.project_id',$id);
			if($footprint == 'nologin')
			{
				$this->db->where('vw_xf_users_footprints.First_Name','UNKNOWN');
			}
			else if($footprint == 'login')
			{
				$this->db->where('vw_xf_users_footprints.First_Name !=','UNKNOWN');
			}
			$this->db->order_by('vw_xf_users_footprints.First_Name','ASC');
			//$this->db->group_by('vw_xf_users_footprints.user_id');
			$query = $this->db->get();
			//PRINT_R($this->db->last_query());die;
			$data = $query->result();
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		function search_footprint_user_by_projectID($id,$search)
		{
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			//$this->db->join('users','users.id = vw_xf_users_footprints.user_id','left');
			$this->db->where('vw_xf_users_footprints.project_id',$id);
			if(!empty($search))
			{
				$this->db->group_start();
				$this->db->like('vw_xf_users_footprints.guest_type',$search);
				$this->db->or_like('vw_xf_users_footprints.First_Name',$search); 
				$this->db->or_like('vw_xf_users_footprints.last_name',$search);
				$this->db->or_like('vw_xf_users_footprints.company',$search);
				$this->db->group_end();
			}
			$this->db->order_by('vw_xf_users_footprints.First_Name','ASC');
			//$this->db->group_by('vw_xf_users_footprints.user_id');
			$query = $this->db->get();
			//PRINT_R($this->db->last_query());die;nbasffr
			$data = $query->result();
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		function FetchFootprintDataById($userID,$project_id)
		{
			//print_r($userID);
			$this->db->select('*');
			$this->db->from('vw_xf_users_footprints');
			$this->db->where('vw_xf_users_footprints.user_id',$userID);
			$this->db->where('vw_xf_users_footprints.project_id',$project_id);
			$query = $this->db->get();
			$data = $query->row();
			//print_r($data);die;
			if($data){
				return $data;
			}else{
				return false;
			}
		}
		
		
 
    
    
    
   
	
	
	
}
?>

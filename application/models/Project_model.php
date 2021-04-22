<?php 
class Project_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_projects()
	{
		
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		 
		$this->db->where('p.project_steps',4); 
		// $this->db->delete('xf_mst_project');
		//$this->db->where('p.group_id',$_SESSION['SingleGroupId']);
		$this->db->order_by('p.last_edited_date_time','DESC');   
		//$this->db->order_by('p.id','DESC');  
		$query = $this->db->get();
		
		return $query->result(); 
	}

	public function get_allprojects($group=NULL)
	{
		
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		 
		$this->db->where('p.group_id',$group); 
		$this->db->where('p.project_steps',4); 
		// $this->db->delete('xf_mst_project');
		//$this->db->where('p.group_id',$_SESSION['SingleGroupId']);
		$this->db->order_by('p.last_edited_date_time','DESC');   
		//$this->db->order_by('p.id','DESC');  
		$query = $this->db->get();
		
		return $query->result(); 
	}
	
	
	
	public function get_projects_not_ended()
	{
		
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id,char_length(project_description) as count_pro_desc');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		//$this->db->where('group.group_status','LIVE');
		// $this->db->where('p.project_steps',4); 
		//$this->db->where('p.event_start_date_time <= CURRENT_DATE()'); 
		//$this->db->where('char_length(p.event_end_date_time) <= 10'); 
		//$this->db->where('(p.event_start_date_time <= CURRENT_DATE() and p.event_end_date_time >=CURRENT_DATE()) OR (p.event_start_date_time > CURRENT_DATE())');  
		$this->db->where('(p.project_show_homepage="yes") and (p.project_steps=4) and (group.status="LIVE") and (((p.event_start_date_time <= CURRENT_DATE() and char_length(p.event_end_date_time) <= 10) )OR (p.event_start_date_time <= CURRENT_DATE() and p.event_end_date_time >=CURRENT_DATE() OR (p.event_start_date_time > CURRENT_DATE())))'); 
				
				
		// $this->db->or_where('p.event_start_date_time >=',date('Y-m-d')); 
		// $this->db->where('(p.event_end_date_time <=now())'); 
		// $this->db->where('p.event_end_date_time',NULL,true); 
		//$this->db->where('p.event_start_date_time BETWEEN "'. date('Y-m-d', strtotime(date('Y-m-d'))). '" and ""'); 
		//$this->db->where("(p.event_end_date_time >= now())",NULL); 
		$this->db->order_by('p.event_start_date_time','DESC');   
		$this->db->limit(12);
		$query = $this->db->get(); 
		return $query->result(); 
	}
	 
	function get_projects_in_desc(){
	        $this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id,char_length(project_description) as count_pro_desc');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		 $this->db->where('p.project_show_homepage','yes');
		 $this->db->where('group.status','LIVE');
		$this->db->where('p.project_steps',4); 
		//$this->db->where('p.event_start_date_time >= NOW()',NULL); 
		// $this->db->delete('xf_mst_project');
		//$this->db->where('p.group_id',$_SESSION['SingleGroupId']);
		$this->db->order_by('p.event_start_date_time','DESC');   
		//$this->db->order_by('p.id','DESC');  
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		return $query->result(); 
	
	}
	
	
	public function get_projects_delete()
	{
		$NotEmpty=array('project_name'=> NULL,'venue_name'=> NULL,'project_type'=> NULL,'venue_address'=> NULL,'project_audience_type'=> NULL,'project_description'=> NULL,'project_show_homepage'=> NULL,'client_company_name'=> NULL,'client_company_address'=> NULL,'client_company_postal_code'=> NULL,'client_country_code'=> NULL,'point_contact_name'=> NULL,'venue_postal_code'=> NULL,'point_contact_mobile'=> NULL,'point_contact_email'=> NULL);
		$this->db->or_where($NotEmpty);
		$this->db->delete('xf_mst_project'); 
		
	}
	
	public function get_project_id($id)
	{
		$query = $this->db->get_where('xf_mst_project', array('id' => $id));
		return $query->row();
		
	}
	
	public function get_userData_id($id)
	{
				
		$this->db->select('p.project_name,p.register_header_image');
		$this->db->from('users_projects as u');
		$this->db->join('xf_mst_project as p', 'p.id = u.project_id','left');
		$this->db->where('u.user_id',$id);
		$query = $this->db->get();
		$data = $query->row();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	function DeleteDataByMultipleId($id){
		$this->db->where_in('id',$id);
		$data=$this->db->delete('xf_mst_project');
		if($data){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteAllprojects($id=NULL)
	{
		$this->db->where('group_id',$id);
		$data=$this->db->delete('xf_mst_project');
		if($data){
			return true; 
		}else{
			return false;
		}
	}
	
	public function FetchDataById($id)
	{
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		$this->db->where('p.id',$id);
		//$this->db->where('p.project_steps',4); 
		$query = $this->db->get();
	 
		$data = $query->row();
		if($data){ 
			return $data; 
		}else{
			return false;
		}
	}
	public function FetchProjectById($id)
	{
		$this->db->select('p.id as project_id,p.project_name as project_name,group.group_name,group.id as gro_id');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		$this->db->where('group.id',$id);
		$this->db->where('group.status !=','SUSPENDED');
		$this->db->where('p.project_steps',4);
		$this->db->order_by('p.created_date_time','desc');
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	public function FetchConfigById($id)
	{
		$this->db->select('group.*');
		$this->db->from('xf_mst_group as group');
		$this->db->where('group.id',$id);
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
	}
	function DeleteImageDataByMultipleId($id){
		$this->db->select('*');
		$this->db->from('xf_mst_project');
		$this->db->where_in('id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/project/'.$img->project_header_visual;
				unlink($uploadurl);
				$uploadurl2= './assets/project/'.$img->register_header_image;
				unlink($uploadurl2);
				
			}
			
		}else{
			return false;
		} 
	} 
	function DeleteAllImage($id){
		$this->db->select('*');
		$this->db->from('xf_mst_project');
		$this->db->where_in('group_id',$id);
		$query = $this->db->get();
		$data = $query->result();
		if($data){
			foreach($data as $img){
				$uploadurl= './assets/project/'.$img->project_header_visual;
				unlink($uploadurl);
				$uploadurl2= './assets/project/'.$img->register_header_image;
				unlink($uploadurl2);
				
			}
			
		}else{
			return false;
		} 
	}
	
	public function FetchConfigName($id)
	{
		//print_r($id);die;
		$this->db->select('module.*');
		$this->db->from('xf_module_mst as module');
		$this->db->where_in('module.id',$id);
		$this->db->where('sequence_id !=',99);
		$this->db->order_by('module.sequence_id','asc');
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	public function FetchFrontprint($id)
	{
		//print_r($id);die;
		$this->db->select('module.*');
		$this->db->from('xf_module_mst as module');
		$this->db->where_in('module.id',$id);
		$this->db->where('sequence_id',99);
		$query = $this->db->get();
		print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
		public function FetchProjectDataById($id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_project');
		//$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		$this->db->where('xf_mst_project.id',$id);
		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	public function FetchGroupProjectDataById($id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_project');
		//$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		$this->db->where('xf_mst_project.group_id',$id);
				$this->db->where('project_steps',4);

		$query = $this->db->get();
		//print_r($this->db->last_query());  exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	public function FetchSecDataById($id)
	{
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
	
	
	
	public function insert_project($data){
		//print_r($data);die;
		if($this->db->insert('xf_mst_project',$data)){
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	} 
	
	public function update_project($data)
	{
		//print_r($data);die;
		$this->db->where('id',$data['id']);
		if($this->db->update('xf_mst_project', $data))
		{
			return $data['id'];
		}
		else
		{
			return false;
		} 
	}
	
	public function updatemm($mm_user,$id)
	{
		//print_r($data);die;
		//$data['mm_id'] = $mm_id;
		$this->db->where('id',$id);
		if($this->db->update('xf_guest_users', $mm_user))
		{
			return $id;
		}
		else
		{
			return false;
		} 
	}
	
	public function getGuestID($user_id,$project_id)
	{
		$this->db->select('id');
		$this->db->from('xf_guest_users');
		$this->db->where('user_id',$user_id);
		$this->db->where('project_id',$project_id);
		$query = $this->db->get();
		$data = $query->row(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
	
	function searchProject($searchData=NULL,$searchDataOrderBy=NULL,$searchDataOrderByAsc=NULL,$searchWhereIn=NULL,$AllSearchData=NULL,$group=NULL){
		
		$searchAll=array('project_id','project_name','project_type','project_audience_type','event_start_date_time','event_end_date_time','last_edited_date_time');
		
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id');
                $this->db->where('p.project_steps',4);
                $this->db->where('p.group_id',$group);
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		

		
               // $this->db->where_in('p.project_type',$searchWhereIn);
		if(!empty($searchWhereIn)){ 
                    $this->db->where_in('p.project_type',$searchWhereIn);
//			for($i=0;$i<=count($searchWhereIn);$i++){
//				$this->db->where('p.project_steps',4);
//			$this->db->or_where('p.project_type',$searchWhereIn[$i]);
//			}
                }else{
                 if(!empty($searchData)){
		 $this->db->where($searchData);
		} 
                }
		
		if(!empty($AllSearchData)){
			//for($i=0;$i<=count($searchAll);$i++){
				$this->db->group_start();
				$this->db->like('p.project_name',$AllSearchData);
				$this->db->or_like('p.project_id',$AllSearchData); 
				$this->db->or_like('p.project_type',$AllSearchData);
				$this->db->or_like('p.project_audience_type',$AllSearchData);
				$this->db->or_like('p.event_start_date_time',$AllSearchData);
				$this->db->or_like('p.event_end_date_time',$AllSearchData);
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
	//	print_r($this->db->last_query()); exit;
		$data = $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		}
	}
	
	public function edit_project($data)
	{
		//print_r($data);die;
		$this->db->where('id',$data['id']);
		if($this->db->update('xf_mst_project', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete_project($id)
	{
		//print_r($data);die;
		$this->db->where('id', $id);
		if($this->db->delete('xf_mst_project'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function temp_add_form($data)
	{
		$this->db->where('id',$data['id']);
		if($this->db->update('xf_mst_project', $data)){
			return $data['id'];
		}else{
			return false;
		}
	}
	
	public function last_register_id()
	{
		$this->db->from('xf_mst_project_master_field');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		//print_R($this->db->last_query());die;
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function checkurl($full_url=NULL)
	{
		$query = $this->db->get_where('xf_mst_project',array('register_url'=>$full_url));
		if($query){
			return $query->row();
		}else{
			return false; 
		}
	}
	
	public function InsertGenerateForm($form_data)
	{
	
	
		if($this->db->insert('xf_guest_users',$form_data)){
			$lastid=$this->db->insert_id();
			
			return $lastid;
		}else{
			return false;
		}
	}
        
        // function FetchDataByMultipleId($id){
		// $this->db->select('*');
		// $this->db->from('xf_mst_project');
		// $this->db->where_in('id',$id);
		// $query = $this->db->get();
		// $data = $query->result(); 
		// if($data){
			// return $data;
		// }else{
			// return false;
		// }
	// }
	function FetchDataByMultipleId($id){
		$this->db->select('p.*,group.group_name,group.status as group_status,group.id as gro_id');
		$this->db->from('xf_mst_project as p');
		$this->db->join('xf_mst_group as group', 'p.group_id = group.id','left');
		$this->db->where_in('p.id',$id);
		$query = $this->db->get();
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		}
	}
        
    function getProjectByIdWhereIN($where_in=false){
                $this->db->select('*');
              
                if(empty($where_in)){
                   $this->db->where_in($where_in);  
                }
                
		$query = $this->db->get('xf_mst_project'); 
		return $query->result();
		if($data){ 
			return $data;
		}else{
			return false;
		} 
    }
	
	function getUser($email)
	{
		//print_r($username);
		$this->db->select('*');
		$this->db->from('xf_guest_users as u');
		$this->db->where('u.email',$email);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->row(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function on_demand_set_storage($group_id,$project_id)
	{
		//print_r($username);
		$this->db->select('*');
		$this->db->from('xf_mst_on_demand_content as dcs');
		$this->db->where('dcs.group_id',$group_id);
		$this->db->where('dcs.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function on_content_set_storage($group_id,$project_id)
	{
		
		$this->db->select('*');
		$this->db->from('xf_mst_content_set as content_set');
		$this->db->join('xf_mst_files as files','content_set.x_content_id = files.xmanage_id');
		$this->db->where('files.xmanage_module','CONTENT');
		$this->db->where('content_set.group_id',$group_id);
		$this->db->where('content_set.project_id',$project_id);
		
		
		//print_r($username);
		// $this->db->select('*');
		// $this->db->from('xf_mst_content_set as content_set');
		// $this->db->where('content_set.xmanage_module','CONTENT_SET');
		// $this->db->where('content_set.group_id',$group_id);
		// $this->db->where('content_set.project_id',$project_id);
		
		$query = $this->db->get();
		
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function on_post_storage($group_id,$project_id)
	{
		//print_r($username);
		$this->db->select('*');
		$this->db->from('xf_mst_post_info as post_info');
		$this->db->join('xf_mst_files as files','post_info.post_id = files.xmanage_id');
		$this->db->where('files.xmanage_module','POST');
		$this->db->where('post_info.group_id',$group_id);
		$this->db->where('post_info.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}

	public function on_program_storage($group_id,$project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_program_info as program');
		$this->db->join('xf_mst_files as files','program.program_id = files.xmanage_id');
		$this->db->where('files.xmanage_module','PROGRAM');
		$this->db->where('program.group_id',$group_id);
		$this->db->where('program.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	public function on_floor_storage($group_id,$project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_floor_plan as floor_plan');
		//$this->db->where('floor_plan.xmanage_module','PROGRAM');
		$this->db->where('floor_plan.group_id',$group_id);
		$this->db->where('floor_plan.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	public function on_excel_storage($group_id,$project_id)
	{
		$this->db->select('*');
		$this->db->from('guest_upload_history as guest_upload');
		//$this->db->where('floor_plan.xmanage_module','PROGRAM');
		$this->db->where('guest_upload.group_id',$group_id);
		$this->db->where('guest_upload.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return false;
		} 
	}
	
	function signed_visitors_today($group_id,$project_id,$guest_reg_type)
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		$this->db->select('history.*,guest.guest_registration_type');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->join('xf_guest_users as guest', 'history.user_id = guest.user_id');
		$this->db->group_by('history.ip_address');
		$this->db->where('DATE(history.activity_time)',$curr_date);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($guest_reg_type))
		{
			$this->db->where('guest.guest_registration_type',$guest_reg_type);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function signed_visitors_start($group_id,$project_id,$guest_reg_type)
	{
		
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.ip_address');
		$this->db->join('xf_guest_users as guest', 'history.user_id = guest.user_id');
		$this->db->join('xf_mst_project as project', 'history.project_id = project.id');
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('DATE(project.created_date_time) < DATE(history.activity_time)');
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($guest_reg_type))
		{
			$this->db->where('guest.guest_registration_type',$guest_reg_type);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function not_signed_visitors_today($group_id,$project_id,$guest_reg_type)
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.ip_address');
		//$this->db->join('users as u', 'history.user_id = u.id');
		$this->db->where('history.user_id',NULL);
		//$this->db->where('history.ip_address !=','NULL');
		$this->db->where('DATE(history.activity_time)',$curr_date);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function not_signed_visitors_start($group_id,$project_id,$guest_reg_type)
	{
		
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.ip_address');
		$this->db->join('xf_mst_project as project', 'history.project_id = project.id');
		$this->db->where('history.user_id',NULL);
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('DATE(project.created_date_time) < DATE(history.activity_time)');
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		$query = $this->db->get();
		//-print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_workshop($group_id,$project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_workshop as workshop');
		$this->db->where('workshop.group_id',$group_id);
		$this->db->where('workshop.project_id',$project_id);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_workshop_by_prj($group_id,$project_id)
	{
		$this->db->select('count(Distinct user_id) as count,workshop.workshop_name, workshop.id, workshop.startdatetime,workshop.enddatetime,workshop.screenurl1,workshop.screenurl2,workshop.screenurl3,workshop.screenremarks1,workshop.screenremarks2,workshop.screenremarks3');
		$this->db->from('xf_workshop_attendance as attendance');
		$this->db->join('xf_mst_workshop as workshop','attendance.workshop_id=workshop.id');
		$this->db->where('workshop.group_id',$group_id);
		$this->db->where('workshop.project_id',$project_id);
		//$this->db->where('attendance.login_time >=','workshop.startdatetime');
		$this->db->group_by('workshop.workshop_name, workshop.id, workshop.startdatetime,workshop.enddatetime');
		$this->db->order_by('count(Distinct user_id)','desc');
		//$this->db->limit(5);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}

	
	function login_user($wID)
	{
		$this->db->select("DATE_FORMAT(login_time,'%Y-%m-%d %H') peakTime, count(distinct user_id) countUsers");
		$this->db->from('xf_workshop_attendance as attendance');
		$this->db->where('attendance.workshop_id',$wID);
		$this->db->group_by('project_id, workshop_id, peakTime');
		$this->db->order_by('countUsers', 'desc');
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->row(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_attendees($group_id,$project_id)
	{
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_name','WORKSHOP');
		$this->db->where('history.module_refid !=',NULL);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		$this->db->group_by('history.user_id');
		$query = $this->db->get();
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_attendees_in_workshop($workshopID)
	{
		$this->db->select('count(Distinct user_id) as count,history.activity_time');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_refid',$workshopID);
		$this->db->group_by('HOUR(history.activity_time)');
		$this->db->order_by('count(Distinct user_id)','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result_array(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_attendees_group_user($workshopID)
	{
		
		$this->db->select('*');
		$this->db->from('xf_mst_workshop as workshop');
		$this->db->where('workshop.id',$workshopID);
		$wp = $this->db->get();
		$data = $wp->row();
		
		$this->db->select('count(user_id) as click');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_refid',$workshopID);
		$this->db->where('history.feature_name','SCREEN1');
		$query1 = $this->db->get();
		$screen1 = $query1->row();
		
		$this->db->select('count(user_id) as click');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_refid',$workshopID);
		$this->db->where('history.feature_name','SCREEN2');
		$query2 = $this->db->get();
		$screen2 = $query2->row();
		
		$this->db->select('count(user_id) as click');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_refid',$workshopID);
		$this->db->where('history.feature_name','SCREEN3');
		$query3 = $this->db->get();
		$screen3 = $query3->row(); 
		
		$final['screenclick1'] = $screen1->click;
		$final['screenclick2'] = $screen2->click;
		$final['screenclick3'] = $screen3->click;
		
		
		if($final){
			return $final;
		}else{
			return 0;
		} 
	}
	
	function get_user_time($wID,$userID,$activityTime)
	{
		$this->db->select('activity_time');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->where('history.module_refid !=',$wID);
		$this->db->where('history.user_id',$userID);
		$this->db->where('history.activity_time >',$activityTime);
		$this->db->limit(1);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->row(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function total_attendees_user($workshopID)
	{
		$this->db->select('attendance.workshop_id,attendance.user_id,SUM(TIME_TO_SEC(TIMEDIFF(attendance.logout_time,attendance.login_time))) as staytime');
		$this->db->from('xf_workshop_attendance as attendance');
		$this->db->where('attendance.workshop_id',$workshopID);
		//$this->db->group_by('attendance.user_id');
		//$this->db->order_by('id','desc');
		//$this->db->limit(2);
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->result_array(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function module_signed_visitors_today($group_id,$project_id,$module)
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.user_id');
		//$this->db->join('users as u', 'history.user_id = u.id','inner');
		$this->db->where('DATE(history.activity_time)',$curr_date);
		$this->db->where('history.user_id !=',NULL);
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($module))
		{
			$this->db->where('history.module_name',$module);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function module_signed_visitors_start($group_id,$project_id,$module)
	{
		
		$this->db->select('history.*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.user_id');
		//$this->db->join('users as u', 'history.user_id = u.id');
		$this->db->join('xf_mst_project as project', 'history.project_id = project.id');
		$this->db->where('DATE(project.created_date_time) < DATE(history.activity_time)');
		$this->db->where('history.user_id !=',NULL);
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($module))
		{
			$this->db->where('history.module_name',$module);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function module_not_signed_visitors_today($group_id,$project_id,$module)
	{
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.ip_address');
		//$this->db->join('users as u', 'history.user_id = u.id');
		$this->db->where('DATE(history.activity_time)',$curr_date);
		$this->db->where('history.user_id',NULL);
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($module))
		{
			$this->db->where('history.module_name',$module);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	function module_not_signed_visitors_start($group_id,$project_id,$module)
	{
		
		$this->db->select('*');
		$this->db->from('xf_mst_places_users_history as history');
		$this->db->group_by('history.ip_address');
		//$this->db->join('users as u', 'history.user_id = u.id');
		$this->db->join('xf_mst_project as project', 'history.project_id = project.id');
		$this->db->where('DATE(project.created_date_time) < DATE(history.activity_time)');
		$this->db->where('history.user_id',NULL);
		$this->db->where('history.ip_address !=',NULL);
		$this->db->where('history.group_id',$group_id);
		$this->db->where('history.project_id',$project_id);
		if(!empty($module))
		{
			$this->db->where('history.module_name',$module);
		}
		$query = $this->db->get();
		//print_r($this->db->last_query());die;
		$data = $query->num_rows(); 
		if($data){
			return $data;
		}else{
			return 0;
		} 
	}
	
	
	     function deleteJunkRecordGuest($id){
     
		$this->db->where('id',$id);
		$data=$this->db->delete('xf_mst_project');
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
		$this->db->where('tmp_edit_cache.module_name','PROJECT');
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
	$this->db->update('xf_mst_project',$data);
	
	}
	
	
	function FetchAllDataGuestUploadInList($filename){
		
		$this->db->select('f.*');
		$this->db->from('xf_guest_users as f');
		$this->db->where_in('f.mass_upload_filename',$filename); 
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
	
	
	
	
	function FetchAllDataGuestUploadInListUsers($filename){
		
		$this->db->select('f.*');
		$this->db->from('users as f');
		$this->db->where_in('f.mass_upload_filename',$filename); 
		$query = $this->db->get();
		$data = $query->result_array();
		//print_r($this->db->last_query());  exit;
		if($data){
			return $data;
		}else{
			return false;
		}
	
	
	}
    
    
    
	
	function getdetailed_data($historyID,$x)
	{
		$this->db->select('*');
		$this->db->from('xf_vw_footprint as history');
		$this->db->where('history.id',$historyID);
		$query = $this->db->get();
		$data = $query->row();
		//print_r($data);die;
		if($data->module_name == 'FLOOR PLAN')
		{
			$this->db->select('history.top,history.left,floor.floor_plan_name,zone.zone_name,floor.file_name,floor.file_type,floor.floor_plan_drop_point');
			$this->db->from('xf_mst_places_users_history as history');
			$this->db->join('xf_mst_floor_plan as floor', 'history.floor_plan_id = floor.id','left');
			$this->db->join('xf_mst_zones as zone', 'history.zone_id = zone.id','left');
			$this->db->where('history.id',$historyID);
			$query = $this->db->get();
			$data = $query->row();
			$final = array();
			$final['module'] = 'FLOOR PLAN';
			$final['name'] = $data->floor_plan_name;
			if(!empty($data->zone_name))
			{
				$final['zone_name'] = $data->zone_name;
			}
			else
			{
				$final['zone_name'] = 'UNUSED SPACE';
			}
			
			$final['image'] = $data->file_name.$data->file_type;
			$final['floor_plan_drop_point'] = $data->floor_plan_drop_point;
			$final['icons'][0]['top'] = $data->top;
			$final['icons'][0]['left'] = $data->left;
			//print_r($final);die;
			
		}
		else if($data->module_name == 'INFO ICON')
		{
			//print_r($data->module_refId);die;
			$this->db->select('*');
			$this->db->from('xf_mst_icon_positions as icon_positions');
			$this->db->join('xf_mst_content_set as contentSet', 'icon_positions.content_set_id = contentSet.id','left');
			$this->db->join('xf_mst_files as files', 'contentSet.x_content_id = files.xmanage_id','left');
			$this->db->join('xf_mst_content_post_mapping as mapping', 'mapping.info_icon = icon_positions.id','left');
			$this->db->join('xf_mst_post_info as post', 'mapping.post_id = post.id','left');
			$this->db->group_by('files.type');
			$this->db->where('mapping.info_icon',$data->module_refId);
			//$this->db->where('icon_positions.drag_position !=','NULL');
			$this->db->where('files.type','image');
			$queryy = $this->db->get();
			//print_r($this->db->last_query());die;
			$dataa = $queryy->row();
			//print_r($dataa);die;
			$final = array();
			$final['module'] = 'ICON';
			$final['name'] = $dataa->file_name;
			$final['zone_name'] = 'INFO ICON '.$dataa->info_icon_number.', '.$dataa->post_title;
			$final['image'] = $dataa->file_name;
			$final['icons'][0]['drag_position'] = $dataa->drag_position;
			$final['icons'][0]['post_title'] = $dataa->post_title;
			$final['icons'][0]['post_details'] = $dataa->post_details;
			//print_r($final);die;
			/*$this->db->select('*');
			$this->db->from('xf_mst_icon_positions as iconPosition');
			$this->db->where('iconPosition.drag_position !=','NULL');
			$this->db->join('xf_mst_content_post_mapping as mapping', 'mapping.info_icon = iconPosition.id');
			$this->db->join('xf_mst_post_info as post', 'mapping.post_id = post.id');
			$this->db->where('iconPosition.content_set_id ',$dataa->content_set_id);
			$query1 = $this->db->get();
			$final['icons'] = $query1->result_array();
			print_r($query1->result_array());
			foreach($query1->result_array() as $qK => $qV)
			{
				print_r($qV);
				$loc = json_decode($qV['drag_position']);
				$final['icons'][$qK]['top'] = $loc->top;
				$final['icons'][$qK]['left'] = $loc->left;
			}*/
			//print_r($final);die;
		}
		else if($data->module_name == 'WORKSHOP')
		{
			$this->db->select('footprint.activityTime,footprint.zone_name,footprint.feature_name,workshop.workshop_name,workshop.screenurl1,workshop.screenurl2,workshop.screenurl3,workshop.screenremarks1,workshop.screenremarks2,workshop.screenremarks3,users.username,users.designation,users.company,users.avatar');
			$this->db->from('xf_vw_footprint as footprint');
			$this->db->join('xf_mst_workshop as workshop', 'footprint.module_refid = workshop.id','left');
			$this->db->join('users', 'footprint.user_ID = users.id','left');
			//$this->db->join('xf_mst_zones as zone', 'history.zone_id = zone.id','left');
			$this->db->where('footprint.id',$historyID);
			if($x == 'e')
			{
				$this->db->where('footprint.zone_name','ENTRY');
			}
			else if($x == 'x')
			{
				$this->db->where('footprint.zone_name','EXIT');
			}
			
			$query = $this->db->get();
			//print_r($this->db->last_query());die;
			$data = $query->row();
			///print_r($data);die;
			
			
			$final = array();
			$final['module'] = 'WORKSHOP';
			$final['activityTime'] = $data->activityTime;
			$final['name'] = $data->workshop_name;
			if(!empty($x))
			{
				$final['zone_name'] = $data->workshop_name;
			}
			else
			{
				$final['zone_name'] = $data->feature_name;
			}
			$final['avatar'] = $data->avatar;
			$final['username'] = $data->username;
			$final['company'] = $data->company;
			$final['designation'] = $data->designation;
			$final['screenurl1'] = $data->screenurl1;
			$final['screenurl2'] = $data->screenurl2;
			$final['screenurl3'] = $data->screenurl3;
			$final['screenremarks1'] = $data->screenremarks1;
			$final['screenremarks2'] = $data->screenremarks2;
			$final['screenremarks3'] = $data->screenremarks3;
			//print_r($final);die;
		}
		
		if($final){
			return $final;
		}else{
			return 0;
		} 
	}
	
}

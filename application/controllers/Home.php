<?php
defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0);
//session_start();
class Home extends CI_Controller {

	function __construct(){
		
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
                $this->load->model('auth_model', 'auth');
                $this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form','url']);
		$this->load->model('common_model','common');
		$this->load->model('project_model');
		$this->load->model('group_model');
		$this->load->model('places_model');
		$this->load->model('guest_model');
		$this->load->model('whatshot_model');
		$this->load->library('email');
		$this->load->library('session');
         
        
    }



	function index(){
	
	
	$userid = $this->session->userdata('user_id');
	
	$data['userStatus'] = $this->common->userStatus();
	//print_r($data['userStatus']);die;
                $user = $this->ion_auth->user($userid)->row(); 
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
				$data['data1']=$this->whatshot_model->FetchAllSlotsAssignData();
				
	       $data['title'] = "XPLATFORM";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/user_home',$data);
		$this->load->view('include/footer');  

	}
	
	function whatshotpopup(){
	
		$whatshot_id=$_POST['whatshot_id'];
		$slot_id=$_POST['slot_id'];
	$data['data1']=$this->whatshot_model->FetchDataById($whatshot_id);
	       $data['title'] = "XPLATFORM";
		
		$this->load->view('frontend/whatshotpopup',$data);
		 

	}
	function xmanage_config()
	{
		$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
				if($user->user_type =='GUEST' || $user->user_type =='GROUPA' || empty($userid)){
					redirect('/');
				} 
                $data['user'] = $user;
                //$data['projects'] = 
               
	       $data['title'] = "XMANAGE CONFIG";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xmanage/xmanage',$data);
		$this->load->view('include/footer');
	}
	
	public function config($group=0,$project=0)
	{
		$user_id=$this->session->userdata('user_id');
		$userid = $this->session->userdata('user_id');
	 //Changed by Kamod on 18-03-21
                $user = $this->ion_auth->user($userid)->row();
				if($user->user_type =='GUEST' || empty($userid)){
					redirect('/');
				} 
		if($user->user_type=='SUPERA'){
			
		}else{
			if(!empty($group)){
				$this->db->select('*');
				$this->db->from('users_groups'); 
				$this->db->where('user_id',$user_id);
				$this->db->where('group_id',$group);
				$this->db->where('group_admin',1);
				$query1 = $this->db->get();
				$groupcheck=$query1->row();
				if(empty($groupcheck)){
					redirect('/');
				}else{
					$group=$group;
				}
			}
		}
		//Changed by Kamod on 18-03-21
		$this->db->select('*');
		$this->db->from('users'); 
		$this->db->where('id',$user_id);
		$query = $this->db->get();
		$user=$query->row();
		//print_r($user);
		$group_id=$user->group_id;
		
		if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
		$data['userStatus'] = $this->common->userStatus();
		//print_r($group);die;
		//print_r($this->session->userdata("token"));die;
		if($user->user_type=='SUPERA'){ 
			$data['groups'] = $this->group_model->get_groups();
		}else{
			$data['groups'] = $this->group_model->get_admin_groups();
		}
		/*******Changed by Ritika on 01-10-2020********/
		if($group>0)
		{
			$data['projects'] = $this->project_model->FetchProjectById($group);
			
			$data['config_tabs'] = $this->project_model->FetchConfigById($group);
			$confgTab = explode(',',$data['config_tabs'][0]->{'confg_tabs'});
			//print_r($confgTab);die;
			$data['config_tabs']['cabs'] = $this->project_model->FetchConfigName($confgTab);
			if(in_array(20, $confgTab))
			{
				$this->session->set_userdata('Fp',1);
			}
			else
			{
				$this->session->set_userdata('Fp',0);
			}
			
			
		}
		// else   
		// {
			// $data['projects'] = $this->project_model->get_projects();
		// }
		//print_r($data['projects']);

		$data['home_page_check'] = true;
		$data['title'] = "XCONNECT - CONFIG PAGE";
		$data['group'] = $group;
		$data['project'] = $project;
		$this->session->set_userdata('group_id',$group);
		//$this->session->set_userdata('project',$project);
		
		$this->load->view('include/header', $data);
		$this->load->view('include/menu',$data);
		$this->load->view('homepage/home');
		$this->load->view('include/footer');
	} 
	 
	 
	 
	function selectAGroup()
	{
		
		$group_id=$_POST['group'];
		$data=$this->project_model->FetchProjectById($group_id);
		$_SESSION['SingleGroupId']=$group_id;
		$_SESSION['GroupData']=$data;
		$output .='<option value="">SELECT A PROJECT TO CONFIGURE</option>';
		foreach($data as $val){
			$output .='<option value='.$val->project_id .'>'.$val->project_name .' </option>';
		}
		$_SESSION['output']=$output;
		echo $output;
	}
	
	
	
	public function test()
	{
		$data['title'] = "Home Page";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('homepage/home');
		$this->load->view('include/footer');
	}
        
        function home2(){
                $data['title'] = "XPLATFORM";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('homepage/virtual_view');
		$this->load->view('include/footer'); 
        }
        
        
       function support(){
	
	$userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	       $data['title'] = "SUPPORT";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/support');
		$this->load->view('include/footer');  
	}

	function corporate_enquiry(){
	
	$userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	       $data['title'] = "CORPORATE ENQUIRIES";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/corporate_enquiry');
		$this->load->view('include/footer');  
	}
	
	function let_explore(){
	
	$userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	       $data['title'] = "LET'S EXPLORE";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/let_explore');
		$this->load->view('include/footer');  
	}
	
	function all_listings_places(){
	
	$userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
	       $data['title'] = "XCONNECT (ALL PLACES)";
	         $data['projects'] = $this->project_model->get_projects_in_desc();
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('frontend/all_listings_places',$data);
		$this->load->view('include/footer');  
	}
        
	
	function summary($gp_id,$prj_id){
	
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['project'] = $this->project_model->get_project_id($prj_id);
				$this->session->set_userdata('project',$prj_id);
				$this->session->set_userdata('group',$gp_id);
				$data['project_id'] = $prj_id;
				$data['group_id'] = $gp_id;
	       $data['title'] = "SUMMARY & STATISTICS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/summary',$data);
		$this->load->view('include/footer');  

	}
	
	function figures($group=0,$project=0){
	
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
				
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "FIGURES";
		   $data['project_id'] = $project;
				$data['group_id'] = $group;
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/figures',$data);
		$this->load->view('include/footer');  

	}
	
	function attendance($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "ATTENDANCE";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/attendance',$data);
		$this->load->view('include/footer');  
 
	}
	
	function footprints($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	  
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
				$data['group_id'] = $this->session->userdata('group');
				$data['project_id'] = $this->session->userdata('project');
				$data['projects_details'] = $this->project_model->FetchDataById($this->session->userdata('project'));
                $data['projects'] = $this->project_model->get_projects_not_ended();
				//$data['guest'] = $this->guest_model->get_all_guest_by_projectID($this->session->userdata('project'));
				if($this->input->post())
				{
					//print_r($this->input->post());die;
					if(!empty($this->input->post('search')))
					{
						//print_r($this->input->post());die;
						$data['guest'] = $this->guest_model->search_footprint_user_by_projectID($this->session->userdata('project'), $this->input->post('search'));
						
						$html = '';
						foreach($data['guest']  as $user)
						{
							$html .= '<div class="nearme-box clearfix rowguest"> ';
							$html .= '<a href="'.base_url().'home/program_foot/'.$user->user_ID.'">';
								if(empty($user->avatar)) {
									$html .= '<i class="far fa-user-circle" aria-hidden="true"></i> ';
								} else {
									$html .= '<img src="'.base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$user->avatar).'">';
								}
							$html .= '<div class="nearme-detail">';
							if($user->guest_type == 'UNKNOWN'){
							$html .= '<p>'.$user->guest_type.', '.$user->ip_address.'</p>';
							}
							else 
							{
								$html .= '<p>'. $user->guest_type.', '.$user->salutation.' '.$user->First_Name.' '.$user->last_name.', '.$user->company.'</p>';
							}
							$html .= '</div>';
							$html .= '</a>';
							$html .= '</div>';
						}
						echo $html;die;
						
					}
					else if(!empty($this->input->post('footprint')))
					{
						$data['guest'] = $this->guest_model->get_footprint_user_by_projectID($this->session->userdata('project'), $this->input->post('footprint'));
						$data['guest_foot'] = $this->input->post('footprint');
					}
					else
					{
						//print_r($data['guest']);die;
						$data['guest'] = $this->guest_model->get_footprint_user_by_projectID($this->session->userdata('project'), '');
						//print_r($data['guest']);die;
						$html = '';
						foreach($data['guest']  as $user)
						{
							$html .= '<div class="nearme-box clearfix rowguest"> ';
							$html .= '<a href="'.base_url().'home/program_foot/'.$user->user_ID.'">';
								if(empty($user->avatar)) {
									$html .= '<i class="far fa-user-circle" aria-hidden="true"></i> ';
								} else {
									$html .= '<img src="'.base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$user->avatar).'">';
								}
							$html .= '<div class="nearme-detail">';
							if($user->guest_type == 'UNKNOWN'){
							$html .= '<p>'.$user->guest_type.', '.$user->ip_address.'</p>';
							}
							else 
							{
								$html .= '<p>'. $user->guest_type.', '.$user->salutation.' '.$user->First_Name.' '.$user->last_name.', '.$user->company.'</p>';
							}
							$html .= '</div>';
							$html .= '</a>';
							$html .= '</div>';
						}
						echo $html;die;
					}
					
				}
				else
				{
					//print_r('guestgg');die;
					$data['guest'] = $this->guest_model->get_footprint_user_by_projectID($this->session->userdata('project'),'');
					$data['guest_foot'] = $this->input->post('footprint');
				}
				
				//print_r($data['guest']);
	       $data['title'] = "FOOTPRINTS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/footprints',$data);
		$this->load->view('include/footer');  

	} 
	
	function storage($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
		if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
		$userid = $this->session->userdata('user_id');
		 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		//$data['projects'] = 
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$on_demand_set = $this->project_model->on_demand_set_storage($group_id,$project_id);
		
		$on_demand_set_storage = 0;
		foreach($on_demand_set as $on_demand_set)
		{
			$on_demand_set_storage += $on_demand_set->oncontent_file_size;
		}
		
		$on_content_set = $this->project_model->on_content_set_storage($group_id,$project_id);
				
		$on_content_set_storage = 0;
		foreach($on_content_set as $on_content_set)
		{
			$on_content_set_storage += $on_content_set->file_size;
		}
		
		$on_post = $this->project_model->on_post_storage($group_id,$project_id);
				
		$on_post_storage = 0;
		foreach($on_post as $on_post)
		{
			$on_post_storage += $on_post->file_size;
		}
		
		$program = $this->project_model->on_program_storage($group_id,$project_id);
		//print_r($others);die;
		$on_program_storage = 0;
		foreach($program as $program)
		{
			//print_r($others->file_size);
			$on_program_storage += $program->file_size;
			//print_r($on_others_storage);
		}
		
		$floor = $this->project_model->on_floor_storage($group_id,$project_id);
		$excel = $this->project_model->on_excel_storage($group_id,$project_id);
		//print_r($others);die;
		$on_floor_storage = 0;
		foreach($floor as $floor)
		{
			//print_r($others->file_size);
			$on_floor_storage += $floor->file_size;
			//print_r($on_others_storage);
		}
		
		$on_excel_storage = 0;
		foreach($excel as $excel)
		{
			//print_r($others->file_size);
			$on_excel_storage += $excel->file_size;
			//print_r($on_others_storage);
		}
		//print_r($on_others_storage);die;
		$data['group_id'] = $group_id;
		$data['project_id'] = $project_id;
		$data['on_demand_set_storage'] = number_format($on_demand_set_storage*0.001, 2);
		$data['on_content_set_storage'] = number_format($on_content_set_storage*0.001*0.001*0.001, 2);
		$data['on_post_storage'] = number_format($on_post_storage*0.001, 2);
		$data['on_others_storage'] = number_format($on_program_storage*0.001, 2) + number_format($on_floor_storage*0.001*0.001, 2) + number_format($on_excel_storage*0.001*0.001*0.001, 2);
		$data['total_storage'] = $data['on_post_storage'] + $data['on_demand_set_storage'] + $data['on_content_set_storage'] + $data['on_others_storage'];
		
		$data['title'] = "STORAGE";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/storage',$data);
		$this->load->view('include/footer');  

	}
	
	function traffic($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
		if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
		$userid = $this->session->userdata('user_id');
		 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		//$data['projects'] = 
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'');
		$data['signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'');
		$data['not_signed_visitors_today'] = $this->project_model->not_signed_visitors_today($group_id,$project_id,'');
		$data['not_signed_visitors_start'] = $this->project_model->not_signed_visitors_start($group_id,$project_id,'');
		//print_r($data['not_signed_visitors_start']);die;
		$data['title'] = "TRAFFIC";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/traffic',$data);
		$this->load->view('include/footer');  

	}
	
	function workshop_foot($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "workshop_foot";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/workshop_foot',$data);
		$this->load->view('include/footer');  

	}  


function post_foot($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "post_foot";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/post_foot',$data);
		$this->load->view('include/footer');  

	} 

function program_foot($user_id=NULL,$history_id=NULL,$x=NULL){
	
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
                $user = $this->ion_auth->user($userid)->row();
                $data['user_id'] = $user_id;
                //$data['guest_id'] = $guest_id;
                $data['guestData'] = $this->guest_model->FetchFootprintDataById($user_id,$this->session->userdata('project'));
				$id=$user_id;
				$data['group_id'] = $this->session->userdata('group');
				$data['project_id'] = $this->session->userdata('project');
				
				if(!empty($this->input->post()))
				{
					//print_r($this->input->post('footprint'));
					$this->session->set_userdata('footPrint',$this->input->post('footprint'));
					$data['userHistory']=$this->places_model->get_user_history($id,$this->session->userdata('project'), $this->input->post('footprint'));
					$data['footHis'] = $this->input->post('footprint');
				}
				else if($this->session->userdata('footPrint'))
				{
					//$this->session->set_userdata('footPrint',$this->input->post('footprint'));
					$data['userHistory']=$this->places_model->get_user_history($id,$this->session->userdata('project'), $this->session->userdata('footPrint'));
					$data['footHis'] = $this->session->userdata('footPrint');
				}
				else
				{
					//print_r('ki');
					$data['userHistory']=$this->places_model->get_user_history($id,$this->session->userdata('project'),'');
					$data['footHis'] = $this->input->post('footprint');
				}
				$data['projects_details'] = $this->project_model->FetchDataById($this->session->userdata('project'));
                $data['projects'] = $this->project_model->get_projects_not_ended();
				if(!empty($history_id))
				{
					$data['history_id'] = $history_id;
					//print_r($x);
					$data['getdetailed_data'] = $this->project_model->getdetailed_data($history_id,$x);
					if($data['getdetailed_data']['module'] == 'WORKSHOP' )
					{
						if(!empty($x))
						{
							$data['selection'] = $data['getdetailed_data']['activityTime'];
						}
						else
						{
							$data['selection'] = $history_id;
						}
						
					}
					else
					{
						$data['selection'] = $history_id;
					}
					//print_r($data['getdetailed_data']);die;
					//print_r($data['selection']);die;
				}
				
	       $data['title'] = "program_foot";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/program_foot',$data);
		$this->load->view('include/footer');  

	} 

function info_foot(){
	
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                //$data['projects'] = 
                $data['projects'] = $this->project_model->get_projects_not_ended();
	       $data['title'] = "info_foot";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/info_foot',$data);
		$this->load->view('include/footer');  

	}  	
	
	function guest($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
		if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
		$userid = $this->session->userdata('user_id');
	 
        $user = $this->ion_auth->user($userid)->row();
        $data['user'] = $user;
                //$data['projects'] = 
        $data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		
		$data['not_signed_visitors_today'] = $this->project_model->not_signed_visitors_today($group_id,$project_id,'');
		$data['not_signed_visitors_start'] = $this->project_model->not_signed_visitors_start($group_id,$project_id,'');
		
		$data['signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'');
		$data['signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'');
		
		$data['preregwb_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'PREREGWB');
		$data['preregwb_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'PREREGWB');
		
	    $data['preregad_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'PREREGAD');
		$data['preregad_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'PREREGAD');
		
		$data['onlinewb_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'ONLINEWB');
		$data['onlinewb_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'ONLINEWB');
		
		$data['onlinead_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'ONLINEAD');
		$data['onlinead_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'ONLINEAD');
		
		$data['onsitewb_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'ONSITEWB');
		$data['onsitewb_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'ONSITEWB');
		
		$data['onsitead_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'ONSITEAD');
		$data['onsitead_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'ONSITEAD');
		
		$data['mass_signed_visitors_today'] = $this->project_model->signed_visitors_today($group_id,$project_id,'MASS UPLOAD');
		$data['mass_signed_visitors_start'] = $this->project_model->signed_visitors_start($group_id,$project_id,'MASS UPLOAD');
		
		$data['title'] = "GUEST";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/guest',$data);
		$this->load->view('include/footer');  

	}
	
	function my_avatar($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$data['projects'] = $this->project_model->get_projects_not_ended();
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['avatar_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'AVATAR');
		$data['avatar_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'AVATAR');
		$data['avatar_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'AVATAR');
		$data['avatar_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'AVATAR');
	    $data['title'] = "MY AVATAR";
		
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/my_avatar',$data);
		$this->load->view('include/footer');  

	}
	
	function chat($group=0,$project=0){
		$data['project_id'] = $project;
				$data['group_id'] = $group;
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	 
                $user = $this->ion_auth->user($userid)->row();
                $data['user'] = $user;
                $data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
                $data['projects'] = $this->project_model->get_projects_not_ended();
				$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['chat_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'CHAT');
		$data['chat_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'CHAT');
		$data['chat_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'CHAT');
		$data['chat_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'CHAT');
	       $data['title'] = "CHAT";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/chat',$data);
		$this->load->view('include/footer');  

	}
	
	function content($group=0,$project=0){
		$data['project_id'] = $project;
				$data['group_id'] = $group;
	if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	$userid = $this->session->userdata('user_id');
	 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project')); 
		$data['projects'] = $this->project_model->get_projects_not_ended();
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['content_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'CONTENT');
		$data['content_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'CONTENT');
		$data['content_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'CONTENT');
		$data['content_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'CONTENT');
	    $data['title'] = "CONTENT";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/content',$data);
		$this->load->view('include/footer');  

	}
	
	function workshop($group=0,$project=0){
		$data['project_id'] = $project;
				$data['group_id'] = $group;
		if (!$this->ion_auth->logged_in())
		{ 
			 redirect('auth/login', 'refresh');
		}
	
	$userid = $this->session->userdata('user_id');
	 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$data['projects'] = $this->project_model->get_projects_not_ended();
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['workshop_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'WORKSHOP');
		$data['workshop_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'WORKSHOP');
		$data['workshop_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'WORKSHOP');
		$data['workshop_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'WORKSHOP');
		
		$data['total_workshop'] = $this->project_model->total_workshop($group_id,$project_id);
		$data['total_attendees'] = $this->project_model->total_attendees($group_id,$project_id);
		
		$data['top_workshop_by_prj'] = $this->project_model->total_workshop_by_prj($group_id,$project_id);
		//print_r($data['total_workshop_by_prj']);die;
		if($data['top_workshop_by_prj'])
		{
			foreach($data['top_workshop_by_prj'] as $sKey => $sVal)
			{
				//print_r($sVal);
				$total_attendees = $this->project_model->total_attendees_in_workshop($sVal->id);
				$group_user = $this->project_model->total_attendees_group_user($sVal->id);
				$total_attendees_user = $this->project_model->total_attendees_user($sVal->id);
				$loginUser = $this->project_model->login_user($sVal->id);
				$start_date = new DateTime($sVal->startdatetime);
				$since_start = $start_date->diff(new DateTime($sVal->enddatetime));
				//print_r($group_user);die;
			
				$workshop[$sKey]['workshopID'] = $sVal->id;
				$workshop[$sKey]['Name'] = $sVal->workshop_name;
				$workshop[$sKey]['total_attendees'] = $sVal->count;
				//$workshop[$sKey]['attendees'] = $sVal->workshop_name;
				$workshop[$sKey]['attendees'] = $loginUser->countUsers;
				$workshop[$sKey]['peak_attendees'] = $loginUser->peakTime;
				$workshop[$sKey]['avg_attendees'] = round($sVal->count/$since_start->h);
				$workshop[$sKey]['avg_stay_time'] = round($total_attendees_user[0]['staytime']/$sVal->count);
				$workshop[$sKey]['screenurl1'] = $sVal->screenurl1;
				$workshop[$sKey]['screenurl2'] = $sVal->screenurl2;
				$workshop[$sKey]['screenurl3'] = $sVal->screenurl3;
				$workshop[$sKey]['screenremarks1'] = $sVal->screenremarks1;
				$workshop[$sKey]['screenremarks2'] = $sVal->screenremarks2;
				$workshop[$sKey]['screenremarks3'] = $sVal->screenremarks3;
				$workshop[$sKey]['screenclick1'] = $group_user['screenclick1'];
				$workshop[$sKey]['screenclick2'] = $group_user['screenclick2'];
				$workshop[$sKey]['screenclick3'] = $group_user['screenclick3'];
			}
		}
		
		$data['workshop'] = $workshop;
		//print_r($data['workshop']);die;
		
	    $data['title'] = "WORKSHOPS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/workshop',$data);
		$this->load->view('include/footer');  

	}
	
	function posts($group=0,$project=0){
		$data['project_id'] = $project;
				$data['group_id'] = $group;
	
	$userid = $this->session->userdata('user_id'); 
	 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$data['projects'] = $this->project_model->get_projects_not_ended();
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['post_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'POSTS');
		$data['post_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'POSTS');
		$data['post_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'POSTS');
		$data['post_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'POSTS');
	    $data['title'] = "POSTS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/posts',$data);
		$this->load->view('include/footer');  

	}
	
	function program($group=0,$project=0){
	$data['project_id'] = $project;
				$data['group_id'] = $group;
	$userid = $this->session->userdata('user_id'); 
	 
		$user = $this->ion_auth->user($userid)->row();
		$data['user'] = $user;
		$data['project'] = $this->project_model->get_project_id($this->session->userdata('project'));
		$data['projects'] = $this->project_model->get_projects_not_ended();
		$group_id = $this->session->userdata('group');
		$project_id = $this->session->userdata('project');
		$data['program_signed_visitors_today'] = $this->project_model->module_signed_visitors_today($group_id,$project_id,'PROGRAM');
		$data['program_signed_visitors_start'] = $this->project_model->module_signed_visitors_start($group_id,$project_id,'PROGRAM');
		$data['program_not_signed_visitors_today'] = $this->project_model->module_not_signed_visitors_today($group_id,$project_id,'PROGRAM');
		$data['program_not_signed_visitors_start'] = $this->project_model->module_not_signed_visitors_start($group_id,$project_id,'PROGRAM');
	    $data['title'] = "PROGRAM";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('summary/program',$data);
		$this->load->view('include/footer');  

	}
	
	function my_details(){
	
	
	    $data['title'] = "MY DETAILS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details',$data);
		$this->load->view('include/footer');  

	}
	
	function my_details_edit(){
	      
	
	    $data['title'] = "MY DETAILS Edit";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_edit',$data);
		$this->load->view('include/footer');  

	}
	
	function my_details_success(){
	      
	
	    $data['title'] = "MY DETAILS success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_success',$data);
		$this->load->view('include/footer');  

	}
	
	function companyinfo_edit(){
	      
	
	    $data['title'] = "Company info edit";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_edit',$data);
		$this->load->view('include/footer');   

	}
	
	function contactinfo_edit(){
	      
	
	    $data['title'] = "Contact info edit";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_edit',$data); 
		$this->load->view('include/footer');   

	}
	
	function companyinfo_success(){
	            
	
	    $data['title'] = "Company info success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_success',$data);
		$this->load->view('include/footer');   

	}
	
	function contactinfo_success(){
	            
	
	    $data['title'] = "Contact info success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_success',$data);
		$this->load->view('include/footer');   

	}      
	
	function contactinfo_deactivate(){
	                 
	    $data['title'] = "De activate info success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_deactivate',$data);
		$this->load->view('include/footer');   

	} 
	
	
	function contactinfo_account(){
	                 
	    $data['title'] = "Contact Info account";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account',$data);
		$this->load->view('include/footer');   

	} 
	
	function contactinfo_account_success(){
	                 
	    $data['title'] = "Contact Info account Success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account_success',$data);
		$this->load->view('include/footer');   

	} 
	
	function contactinfo_account_nosuccess(){
	                 
	    $data['title'] = "Contact Info account No Success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_account_nosuccess',$data);
		$this->load->view('include/footer');   

	} 
 	
	
	function companyinfo_nosuccess(){
	            
	    $data['title'] = "Company info no success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/companyinfo_nosuccess',$data);   
		$this->load->view('include/footer');   

	}
	
	function contactinfo_nosuccess(){
	            
	    $data['title'] = "Contact info no success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/contactinfo_nosuccess',$data);   
		$this->load->view('include/footer');   

	}
	
	function changepassword_nosuccess(){
	            
	    $data['title'] = "change password no success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword_nosuccess',$data);      
		$this->load->view('include/footer');   

	}
	
	function changepassword_success(){
	            
	    $data['title'] = "change password success";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword_success',$data);      
		$this->load->view('include/footer');   

	}   
	
	function changenewpassword(){
	            
	    $data['title'] = "change new password";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changenewpassword',$data);      
		$this->load->view('include/footer');   

	}      
	
	function my_details_nosuccess(){
	      
	
	    $data['title'] = "MY DETAILS Nosuccess";   
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/my_details_nosuccess',$data);   
		$this->load->view('include/footer');  

	}
	
	function password(){
	
	
	    $data['title'] = "PASSWORD";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/password',$data);
		$this->load->view('include/footer');  

	}
	
	function changepassword(){
	
	
	    $data['title'] = "changepassword";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/changepassword',$data);
		$this->load->view('include/footer');  

	}
	
	
	
	
	function registration(){
	
	
	    $data['title'] = "REGISTRATION";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('xme/registration',$data);
		$this->load->view('include/footer');  

	}
}

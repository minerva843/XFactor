<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManage extends CI_Controller
{

	function __construct()     
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('auth_model', 'auth');
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['form', 'url']);
		$this->load->model('common_model', 'common');
		$this->load->library('table');
		$this->load->model('project_model','project_m');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->helper('common_helper');
		$this->load->model('group_model');
		$this->load->model('Guest_model');
		$this->load->model('Chat_model');
		$this->load->model('Usermanage_model');
		$this->load->model('Ion_auth_model');
		
		$this->load->model('floor_model');
		$this->load->model('post_model');
		$this->load->model('content_model');
		$this->load->model('ondemand_model');
		$this->load->model('program_model');
		
		
		
		if (!$this->ion_auth->logged_in()) {
			//redirect('auth/login', 'refresh');
		}
	}

	 
 
     function showAllgroups(){
			$data['title'] = "Users Groups";
			$this->load->view('users_group/all_show',$data);
	
	}
	 
	 
	 
	 function usersGroupListassign(){
	 
	 $data['title'] = "Assign User";
	 $this->load->view('users_manage/all_show',$data);
	 
	 }
	 
	 
	 
	 function usersGroupListassign_user(){
	 
	 $data['title'] = "Assign User";
	 $this->load->view('user_manage_mod/all_show',$data);
	 
	 }
	 
	 
	 
	function usersListAll(){
	 
	 $data['title'] = " User";
	 $this->load->view('users_mgmt/users_list/all_show',$data);
	 
	 }
	 
	 
	 
	 function addNewUserMainUpload(){
	 
	 $data['title'] = "Upload";
	 $this->load->view('users_mgmt/users_list/addNew',$data);
	 
	 
	 
	 }
	 
	 
	 
	 function removeSelectedGroupUsers(){
	 
	               $data['action'] = 'ASSIGN';
	               $data['title'] = "Edit Assign user"; 
	               $data['usergroup_id'] = $_POST['grp_id']; 
	
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($data['usergroup_id']);  
			$data['users_ingroup'] = $this->Usermanage_model->FetchAllDataUsersDataAssigned($data['usergroup_id']);
		       $this->load->view('users_manage/editassignUsersremove',$data);
	 
	 }
	 
	 function configSelectedGroupUsers($id=NULL){ 
			
	               $data['action'] = 'ASSIGN';
	               $data['title'] = "Edit Assign user"; 
	               $data['usergroup_id'] = $id; 
	
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($data['usergroup_id']);  
			$data['users_ingroup'] = $this->Usermanage_model->FetchAllDataUsersDataAssignedConfig($data['usergroup_id']);
		       $this->load->view('users_manage/editassignUsersconfig',$data);
	 
	 }
	 
	 
	 
	function removeSelectedGroupUsers_new(){
	 
	               $data['action'] = 'ASSIGN';
	               $data['title'] = "Edit Assign user"; 
	               $data['usergroup_id'] = $_POST['grp_id']; 
	
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($data['usergroup_id']);  
			$data['users_ingroup'] = $this->Usermanage_model->FetchAllDataUsersDataAssigned($data['usergroup_id']);
		       $this->load->view('user_manage_mod/editassignUsersremove',$data);
	 
	 }
	 
	 
	 

	function addNewUserGroup($id=false){
	if($id){
        $data['title'] = "Edit GROUP"; 
        $data['action'] = 'EDIT'; 
        $data['group'] = $this->Usermanage_model->FetchGroupDataById($id);
        $data['group_info'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($id)[0];  
        
        }else{
         $data['title'] = "Add  Chat";
         $data['action'] = 'ADD'; 
         $data['error']=$_POST['error'];
         
        }
        $this->load->view('users_group/addNew',$data); 
	}
	
	
	
	
	function addNewUserGroupError($id=false){
		if($id){
			$data['title'] = "Edit GROUP"; 
			$data['action'] = 'EDIT'; 
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($id);
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($id)[0];  
			
			}else{
			 $data['title'] = "Add  Chat";
			 $data['action'] = 'ADD'; 
			 if($_POST['error']==0){
				 $data['error']=1;
			 }
			 if($_POST['error']==00){
				  
				 $data['msg']=1;
			 
			}
			
		   
		}
	 $this->load->view('users_group/addNewError',$data); 
	}
	
	
	
	
	function addNewUserMain($id=false){
	
	
	if($id){
        $data['title'] = "EDIT User"; 
        $data['action'] = 'EDIT'; 
        //$data['group'] = $this->Usermanage_model->FetchGroupDataById($id);
        //$data['group_info'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($id)[0];  
        $data['data1'] =$this->Guest_model->FetchDataByIdUser($id);
        
        }else{
         $data['title'] = "Add  User";
         $data['action'] = 'ADD'; 
         
        }
                $CountryCode = $this->common->getCountryCode();
		$data['CountryCode'] = $CountryCode;
		
        $this->load->view('users_mgmt/addNew',$data); 
	
	
	
	}
	
	
	
	
	
	function addstep1Post($id=false)
	{
		    
		
		$userdatamobile=array();
		$userdata = array();
	       $where = array(
			'email'=>$this->input->post('email'),
			);
			
			//print_r($where);  exit;
		if(empty($id)){
		$userdata = $this->Guest_model->FetchDataByWhereUser($where);
		if(empty($id) && !empty($userdata)){
		$return['erroremail'] = "Email Already Exist";
		
		}
		}
		if(!empty($this->input->post('email')) && !empty($this->input->post('unlock'))){
			$this->Guest_model->FetchDataByWhereUserUnlockStatus($this->input->post('email'));
		}
	        
		
		//if(empty($userdatamobile) && empty($userdata) && empty($userdatausername)){
		if(empty($userdata)){
		      
		
			if($_FILES){
				$filename = $_FILES['image']['name'];
				$uploadurl= './assets/images/'.$filename;
				move_uploaded_file($_FILES['image']['tmp_name'],$uploadurl);
				$array['avatar']=$filename;
				$array2['avatar']=$filename;
			}
			if(!empty($id)){
				$array['user_type']=$this->input->post('guest_type');
				$array['salutation']=$this->input->post('salutation');
				$array['gender']=$this->input->post('gender');
				$array['active']=$this->input->post('active');
				$array['first_name']=$this->input->post('first_name');
				$array['last_name']=$this->input->post('last_name');
				$array['country_code']=$this->input->post('country_code');
				$array['email']=$this->input->post('email');
				$array['phone']=$this->input->post('mobile');
				$array['username']=$this->input->post('username');
				$array['quick_intro']=$this->input->post('quick_intro');
				$array['last_edit_datetime']=date("Y-m-d G:i");
				$array['last_edit_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edit_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edit_username']=$this->session->userdata('username');
				$array['edit_steps']=1;
				$result=$this->Guest_model->UpdateDataUser($id,$array);
				if($result==true){
					//echo $id;
					$return['error'] = FALSE;
					echo json_encode(array('response'=>$return,'gid'=>$id));
				}
				
			}else{
			
			
			
	
		              $guest_registration_type =  'ONLINEAD';
		
			        $xmanage_id='XP'.rand(100000000000000,999999999999999);
				$otp=rand(100000,999999);
				$array['otp']=$otp;
				$array['steps']=1;
				
				$array['registration_type'] = $guest_registration_type;
				$array['email']=$this->input->post('email');
				$array['phone']=$this->input->post('mobile');
				$array['country_code']=$this->input->post('country_code');
				$array['guest_type']=strtoupper($this->input->post('guest_type'));
				$array['salutation']=strtoupper($this->input->post('salutation'));
				$array['gender']=strtoupper($this->input->post('gender'));
				$array['first_name']=$this->input->post('first_name');
				$array['last_name']=$this->input->post('last_name');
				$array['active']=$this->input->post('active');
				$array['username']=$this->input->post('username');
				$array['quick_intro']=$this->input->post('quick_intro');
				$array['created_datetime']=date("Y-m-d G:i");
				$array['created_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['created_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['created_username']=$this->session->userdata('username');
				$array['last_edit_datetime']=date("Y-m-d G:i"); 
				$array['last_edit_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edit_xmanage_id']=$this->session->userdata('xmanage_id');
				$array['last_edit_username']=$this->session->userdata('username');
				 
				//echo $array['email'];
				$result_email_exist = $this->Ion_auth_model->getUserByEmailPhoneUsername($array['email']);
				

 				if(empty($result_email_exist)){
			        $data_in_users = array(
				'create_user_byadmin' => true, 
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
			        'first_name' => $array['first_name'],
				'last_name' => $array['last_name'],
				//'company' => $data_guest->company,
				'otp' => $array['otp'],
				'phone' => $array['phone'],
				'gender' =>$array['gender'],
				'active' =>$array['active'],
				'registration_type' => $guest_registration_type,
				'username' => $array['username'],
				'salutation'=>$array['salutation'],
				'country_code' => $array['country_code'],
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
				);
				$identity = $array['email'];
				$password = $this->ion_auth->hash_password($array['phone']);
				$email = $array['email'];
				$data_return = $this->ion_auth->register($identity, $password, $email, $data_in_users,array(),FALSE,FALSE);
				$user_id = $data_return['id'];
				$new = $data_return['new'];
				if(empty($data_return['id'])){
						$user_id=$data_return;
					}else{
						$user_id = $data_return['id'];
						$new = $data_return['new'];
					}
				$this->GenarateQRCode($user_id);
				
				               $return['error'] = FALSE;
						echo json_encode(array('response'=>$return,'gid'=>$user_id));
			
			}else{
			                       $return['error'] = FALSE;
						echo json_encode(array('response'=>$return,'gid'=>$user_id));
			
			}

	
				
			}


		}else{
		$return['error'] = TRUE;
		echo json_encode(array('response'=>$return));
		}




		
	}
	
	
	
	
	public function addstep2($id=false)
	{
	
	
		$id=$_POST['id'];
		$CountryCode = $this->common->getCountryCode();
		$data['title'] = "USER";
		$data['id'] = $id;
		$data['action'] = $_POST['action'];
		$data['data1'] =$this->Guest_model->FetchDataByIdUser($id);
		
		$data['CountryCode'] = $CountryCode;
		
		
		$this->load->view('users_mgmt/addstep2',$data);
		
		
	}
	
	
	
	
	function addstep2Post()
	{
	
	     
		$id=$_POST['id'];
		if(!empty($id)){
			//$array['steps']=2;
			
			$array['did']=$this->input->post('did');
			$array['tel']=$this->input->post('tel');
			$array['extension']=$this->input->post('extension');
			$array['edit_steps']=2;
			$result=$this->Guest_model->UpdateDataUser($id,$array);
			if($result==true){
				echo $id;
			}
		}
		
	}
	
	
	
	
		public function addstep3($id=false)
	{

		$CountryCode = $this->common->getCountryCode();
		$data['CountryCode'] = $CountryCode;
		$id=$_POST['id'];
		$data['title'] = "USER";
		$data['id'] = $id;
		$data['action'] = $_POST['action'];
		$data['data1'] =$this->Guest_model->FetchDataByIdUser($id);

		$this->load->view('users_mgmt/addstep3',$data);
		
		
	}
	
	
	
	
	
		function GenarateQRCode($user_id=NULL)
	{
		$user =  $this->ion_auth->user($user_id)->row();
		$project=$this->ion_auth->JoinprojectId($user_id);
		//Generate QR CODE
		$BasePath= preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '',$_SERVER['SCRIPT_FILENAME']);
		$TemUrl = './assets/qrphp/temp/';
		include "qrphp/qrlib.php";    
		$errorCorrectionLevel = 'L'; 
		$matrixPointSize = 4; 
		$url='USER ID: '.$user_id.',  EMAIL ID: '.$user->email;
		$filename = $TemUrl.'test'.md5($url).'.png';
		QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$qrcode=basename($filename);
		$this->db->where('id',$user->id);
		$this->db->update('users', array('qrcode'=>$qrcode));
		// if(!empty($user_id) && !empty($project->project_id)){
			
			// $url='USER ID: '.$user_id.',  EMAIL ID: '.$user->email;
			// $filename = $TemUrl.'test'.md5($url).'.png';
			// QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			// $qrcode=basename($filename);
			// $this->db->where('user_id',$user_id);
			// $this->db->where('project_id',$project->project_id);
			// $this->db->update('xf_guest_users', array('qrcode'=>$qrcode));
		// }else{
			
		// }
 
		
		return $qrcode='<img src="'. base_url().'assets/qrphp/temp/'.basename($filename).'" />';
	}
	
	
	
	
	
	
		function addstep3Post($id=false){ 
		
						
	                       $id=$_POST['id'];
						   //Generate QR CODE
						   $user =  $this->ion_auth->user($id)->row();
						$user =  $this->ion_auth->user($user->user_id)->row();
						//$qrcode=$this->GenarateQRCode($id);
						$qrcode='<img src="'. base_url().'assets/qrphp/temp/'.$user->qrcode.'" />';
						
						//Generate QR CODE
						
	                       if($_POST['no_reg']==1){
	                       $array['steps']= 3;
	                       $array['edit_steps']=3;
	                       }else{
	                       //$array['steps']=3;
	                       }
				if(!empty($id)){
					//$data_guest=$this->Guest_model->FetchDataByIdUser($id);
				$array['company']=$this->input->post('company_name');
				$array['company_address']=$this->input->post('company_address');
				$array['country']=$this->input->post('country');
				$array['pincode']=$this->input->post('pincode');
				$array['designation']=$this->input->post('designation');
				$array['last_edit_datetime']=date("Y-m-d G:i");
				$array['last_edit_ip_address']=$_SERVER['REMOTE_ADDR'];
				$array['last_edit_xmanage_id']=$user->xmanage_id;
				$array['last_edit_username']=$this->session->userdata('username');
				$array['edit_steps']=3;
				$result=$this->Guest_model->UpdateDataUser($id,$array); 
				
				
				 
			       
					 if($_POST['action']!='EDIT'){
			        
			         $this->Ion_auth_model->CreateUserSuccessMail($user->id,$qrcode,FALSE,TRUE,$data_guest->new_u);
			        }
			       
				if($result==true){
					echo $id;
				}
				
			}
	
	}
	
	
	
	
	
		function addUserSuccess(){
	
		 
		$data['title'] = "ADD SUCCESS"; 
		$id=$_POST['id'];
		$data['action'] = $_POST['action'];
		$data['guest']=$this->Guest_model->FetchDataByIdUser($id); 
		$data['DataField']=json_decode($data['guest']->key);
     $datau=array(
       'edit_steps'=>4
       );
       // $this->guest_m->updateOldData($id,$datau); 
        
        
       $datauu=array(
       'edit_steps'=>0
       );
       // $this->guest_m->updateOldData($id,$datauu);
		$this->load->view('users_mgmt/addSuccess',$data);
	
	
	}
	
	
		
		
	
function processAddGroup($id=false){


	 if(!empty($id)){
		
		if($this->input->post('group_type')=='RESERVED'){
			 $data = array( 
			  'status'=>$this->input->post('group_status'),
			  'last_edited_date_time'=>date('Y-m-d G:i'),
			  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
			  'last_edited_ip_address'=>$this->input->ip_address(),
			  'last_edited_username'=>$this->session->userdata('username')
			); 
		}else{
			 $data = array( 
			  'status'=>$this->input->post('group_status'),
			  'group_type'=>$this->input->post('group_type'),
			  'last_edited_date_time'=>date('Y-m-d G:i'),
			  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
			  'last_edited_ip_address'=>$this->input->ip_address(),
			  'last_edited_username'=>$this->session->userdata('username')
			); 
		}
	
	 
        $insertid = $this->Usermanage_model->editUserGroupById($data,$id);
        echo $id;
       }else{
       
       
     $group_type = $this->input->post('group_type');
	$groupname= strtoupper($this->input->post('group_name'));
	
	$groupdatadb = $this->Usermanage_model->FetchUserGroupDataByName($groupname);
	if(!empty($groupdatadb)){
		echo 00; exit;
	}

	
	$arrayxp = $fruits = json_decode (RESERVED_GROUPS);
	if($group_type=='RESERVED'){
	
	if (!in_array($groupname, $arrayxp))
        {
        echo 0; exit;
        }


	}else{
	
	if (in_array($groupname, $arrayxp))
        {
        echo 0; exit;
        }
	
	
	} 
       
       
       

	   $data = array( 
          'status'=>$this->input->post('group_status'),
          'ugxid'=>'XPGR'.rand(100000000000000,9999999999999999),
          'group_name'=>strtoupper($this->input->post('group_name')),
          'group_type'=>$this->input->post('group_type'),
		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
		  'created_username'=>$this->session->userdata('username'),
          'created_ip_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_ip_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username')
        ); 

        $insertid = $this->Usermanage_model->saveAddUserGroup($data);
        echo $insertid; exit;
	}
	
	
	}
	
	

	

	
	function groupCreateSuccess($id){
	        
	               
	               $data['action'] = $_POST['action'];
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($id)[0];  
			$data['group_info1'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($id)[0]; 
		       $this->load->view('users_group/createGroupSuccess',$data);
	
	
	
	}
	
	
	
	function editGroupPermissions($id){
	
	               $data['action'] = $_POST['action'];
	               $data['title'] = "Edit Permissions"; 
	               $data['usergroup_id'] = $id; 
			//$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($id)[0]; 
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($id);  
			//$data['tabs'] = $this->Usermanage_model->getAllTabs($data['group_info']['id']);
			//$user_data = $this->Usermanage_model->FetchGroupDataById($usregroupid); 
		        $this->load->view('users_permissions/editPermissions',$data);
	
	
	
	
	}
	
	
	function assignUsertoGroup($id){
	               $data['action'] = $_POST['action'];
	               $data['title'] = "Edit Assign user"; 
	               $data['usergroup_id'] = $id; 
			
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($id);  
			$data['users_ingroup']=$this->Usermanage_model->FetchAllDataUsersDataNotAssign($id);
		        $this->load->view('users_manage/editassignUsers',$data);
	
	
	}
	
	
	
      function assignUsertoGroup_new($id){
	               $data['action'] = $_POST['action'];
	               $data['title'] = "Edit Assign user"; 
	               $data['usergroup_id'] = $id; 
			
			$data['group'] = $this->Usermanage_model->FetchGroupDataById($id);  
			//$data['users_ingroup']=$this->Usermanage_model->FetchAllDataUsersDataAssigned($id); 
			$data['users_ingroup']=$this->Usermanage_model->FetchAllDataUsersDataNotAssign($id);
		        $this->load->view('user_manage_mod/editassignUsers',$data);
	
	
	}
	
	
	
	function allUsersList(){
	$usergroup = $_POST['usergroup'];
	                $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			
			       if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData']=='all_live')){
					$searchGuestType=array('users.active'=>1);
					}
					if(!empty($_POST['selectData'] =='all_suspend')){
						$searchGuestType=array('users.active '=>2); 
					}
					if(!empty($_POST['selectData'] =='all_deactivated')){
						$searchGuestType=array('users.active '=>0); 
					}
					if(!empty($_POST['selectData'] =='guest')){
						$searchGuestType=array('users.user_type '=>'GUEST'); 
					}
					if(!empty($_POST['selectData'] =='group')){
						
						$searchGuestType=array('users.user_type '=>'GROUPA'); 
					}
					if(!empty($_POST['selectData'] =='super')){
						$searchGuestType=array('users.user_type '=>'SUPERA'); 
					}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='users.company';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users.created_datetime';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users.created_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='users.last_edit_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users.last_edit_datetime';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Usermanage_model->searchUsersMain($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc,$usergroup);
				
				
			}
			
			else{
				
				$data1=$this->Usermanage_model->FetchAllDataUsersDataNotAssign($usergroup);
						 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edit_datetime'])){
							$last_edited_date_time=$data['last_edit_datetime'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						if($data['active']==1){
							$userstatus='ACTIVE';
						}
						if($data['active']==2){
							$userstatus='SUSPENDED';
						}
						if($data['active']==0){
							$userstatus='DEACTIVATED';
						}
						$checkId='SengleView_'.$data['id'];
						
							
							 $output .= '<tr id='.$data['id'].'  class="viewusermain">
							 
							
								<td class="deletesingle" >
								<input type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas " style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data['xmanage_id'].'</td>
								<td>'.$userstatus.'</td>
								<td >'.$data['registration_type'].'</td>  
								
								<td>'.$data['user_type'].'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td class="running_latter">'.$data['email'] .'</td>    
								 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
								
							  </tr> 
							   
							  ';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	
	}
	
	
	
	function allUsersListConfig(){
	
	
	               $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$group_id = $_POST['usergroup'];
			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData']=='all_live')){
					$searchGuestType=array('users.active'=>1);
					}
					if(!empty($_POST['selectData'] =='all_suspend')){
						$searchGuestType=array('users.active '=>2); 
					}
					if(!empty($_POST['selectData'] =='all_deactivated')){
						$searchGuestType=array('users.active '=>0); 
					}
					if(!empty($_POST['selectData'] =='guest')){
						$searchGuestType=array('users.user_type '=>'GUEST'); 
					}
					if(!empty($_POST['selectData'] =='group')){
						
						$searchGuestType=array('users.user_type '=>'GROUPA'); 
					}
					if(!empty($_POST['selectData'] =='super')){
						$searchGuestType=array('users.user_type '=>'SUPERA'); 
					}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='users.company';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users.created_datetime';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users.created_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='users.last_edit_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users.last_edit_datetime';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Usermanage_model->searchUsersMainAssignedConfig($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc,$group_id);
				
				 
			}
			
			else{
				
				$data1=$this->Usermanage_model->FetchAllDataUsersDataAssignedConfig($group_id);
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edit_datetime'])){
							$last_edited_date_time=$data['last_edit_datetime'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						if($data['active']==1){
							$userstatus='ACTIVE';
						}
						if($data['active']==2){
							$userstatus='SUSPENDED';
						}
						if($data['active']==0){
							$userstatus='DEACTIVATED';
						}
						$checkId='SengleView_'.$data['id'];
						
						$checked='';
						if(!empty($data['group_admin'])){ 
							$checked='checked';
						}
							 $output .= '<tr id='.$data['id'].'  class="viewusermainremove">
								<td class="deletesingle" > 
								
								<input  type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;" '.$checked.'>
								<label for="d_'.$data['id'].'"  class="deletClass" '.$checked.'></label>
								</td>
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xmanage_id'].'</td>
								<td>'.$userstatus.'</td>
								<td >'.$data['registration_type'].'</td>
								
								<td>'.$data['user_type'].'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td class="running_latter">'.$data['email'] .'</td>    
								
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
								
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	}
	
	
	
	function allUsersListAssigned(){
	
	
	               $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$group_id = $_POST['usergroup'];
			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData']=='all_live')){
					$searchGuestType=array('users.active'=>1);
					}
					if(!empty($_POST['selectData'] =='all_suspend')){
						$searchGuestType=array('users.active '=>2); 
					}
					if(!empty($_POST['selectData'] =='all_deactivated')){
						$searchGuestType=array('users.active '=>0); 
					}
					if(!empty($_POST['selectData'] =='guest')){
						$searchGuestType=array('users.user_type '=>'GUEST'); 
					}
					if(!empty($_POST['selectData'] =='group')){
						
						$searchGuestType=array('users.user_type '=>'GROUPA'); 
					}
					if(!empty($_POST['selectData'] =='super')){
						$searchGuestType=array('users.user_type '=>'SUPERA'); 
					}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='users.company';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users.created_datetime';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users.created_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='users.last_edit_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users.last_edit_datetime';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Usermanage_model->searchUsersMainAssigned($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc,$group_id);
				
				
			}
			
			else{
				
				$data1=$this->Usermanage_model->FetchAllDataUsersDataAssigned($group_id);
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edit_datetime'])){
							$last_edited_date_time=$data['last_edit_datetime'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						if($data['active']==1){
							$userstatus='ACTIVE';
						}
						if($data['active']==2){
							$userstatus='SUSPENDED';
						}
						if($data['active']==0){
							$userstatus='DEACTIVATED';
						}
						$checkId='SengleView_'.$data['id'];
						
						$checked='';
						if(!empty($data['group_admin'])){
							$checked='checked';
						}
							 $output .= '<tr id='.$data['id'].'  class="viewusermainremove">
								<td class="deletesingle" > 
								
								<input  type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass"></label>
								</td>
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xmanage_id'].'</td>
								<td>'.$userstatus.'</td>
								<td >'.$data['registration_type'].'</td>
								
								<td>'.$data['user_type'].'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td class="running_latter">'.$data['email'] .'</td> 
								
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
								
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	}
	
	
	
	
	
	
	function updateTabsuserGroupassign(){
	    
	    $user_group = $_POST['user_group'];
	    $ids = $_POST['ids'];
	    $config_ids = $_POST['config_ids'];
	    $idsarr = explode(',',$ids);
	    $config_idsarr = explode(',',$config_ids);
	    
	    foreach($idsarr as $userid){
	    $data = array(
	    'user_id'=>$userid,
	    'group_id'=>$user_group
	    );
		
	    $this->Usermanage_model->updateUserGroupid($data);

	    }
		// foreach($config_idsarr as $configuserid){
	    // $config_data = array(
	    // 'user_id'=>$configuserid,
	    // 'group_id'=>$user_group,
		// 'value'=>1 
	    // );
		 // $this->Usermanage_model->updateUserGroupConfigid($config_data);
		// }
	    
	               $data['action'] = 'ASSIGN';
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($user_group)[0];  
			$data['group_info1'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($user_group)[0]; 
			 $data['group_users'] = $this->Usermanage_model->getGroupUersmapped($user_group); 
		       $this->load->view('users_manage/createGroupSuccess',$data);
	
	
	
	}
	
	
	
	
	
	function updateTabsuserGroupassign_new(){
	    
	    $user_group = $_POST['user_group'];
	    $ids = $_POST['ids'];
		 $config_ids = $_POST['config_ids'];
	    $idsarr = explode(',',$ids);
	    $config_idsarr = explode(',',$config_ids);
	    foreach($idsarr as $userid){
	    $data = array(
	    'user_id'=>$userid,
	    'group_id'=>$user_group
	    );
	   
	    $this->Usermanage_model->updateUserGroupid($data);
 
	    }
		foreach($config_idsarr as $configuserid){
	    $config_data = array(
	    'user_id'=>$configuserid,
	    'group_id'=>$user_group,
		'value'=>1
	    );
		 $this->Usermanage_model->updateUserGroupConfigid($config_data);
		}
	    
	               $data['action'] = 'ASSIGN';
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($user_group)[0];  
			$data['group_info1'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($user_group)[0]; 
			 $data['group_users'] = $this->Usermanage_model->getGroupUersmapped($user_group); 
		       $this->load->view('user_manage_mod/createGroupSuccess',$data);
	
	
	
	}
	
	
	
	function updateuserGroupassignRemove(){
	
	    $user_group = $_POST['user_group'];
	    $ids = $_POST['ids'];
	    $idsarr = explode(',',$ids);
	    
	    foreach($idsarr as $userid){
	    $data = array(
	    'user_id'=>$userid,
	    'group_id'=>$user_group
	    );
	   
	      $this->Usermanage_model->deleteUserGroupid($userid,$user_group);
 
	    }
		
	    
	    $data['action'] = 'REMOVE';
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($user_group)[0];  
			$data['group_info1'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($user_group)[0]; 
			//  $data['group_users'] = $this->Usermanage_model->getGroupUersmapped($user_group); 
		       $this->load->view('users_manage/createGroupSuccess',$data);

	
	}
	
	
	function updateuserGroupassignConfig(){
	
	    $user_group = $_POST['user_group'];
	    $ids = $_POST['ids'];
		if(!empty($ids)){
			$idsarr = explode(',',$ids);
			
			foreach($idsarr as $userid){
			$data = array(
			'user_id'=>$userid,
			'group_id'=>$user_group,
			'value'=>1
			);
		   
			  $this->Usermanage_model->updateUserGroupConfigid($data);
	 
			}
		}
	    $config_ids = $_POST['config_ids'];
		if(!empty($config_ids)){
			$config_idsarr = explode(',',$config_ids);
			foreach($config_idsarr as $configuserid){
			$config_data = array(
			'user_id'=>$configuserid,
			'group_id'=>$user_group,
			'value'=>0
			);
			 $this->Usermanage_model->updateUserGroupConfigid($config_data);
			}
		}
	    $data['action'] = 'CONFIG';
			$data['group_info'] = $this->Usermanage_model->getGroupCreateInfo($user_group)[0];  
			$data['group_info1'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($user_group)[0]; 
			//  $data['group_users'] = $this->Usermanage_model->getGroupUersmapped($user_group); 
		       $this->load->view('users_manage/createGroupSuccess',$data);

	
	}
	
	
	
	
	function searchSingleDataUserMainremove(){
	
	               $id=$_POST['id'];
			$group_id=$_POST['group_id'];
			$data=$this->Usermanage_model->FetchUsertableDataById($id); 
			$users_ingroup=$this->Usermanage_model->FetchAllDataUsersDataAssigned($group_id); 
			
			$stuser='';
			$UsersGroup=$this->Usermanage_model->FetchUserGroupDataById($id);
				
				//$UsersProject=$this->Usermanage_model->FetchUserProjectDataById($data->id);
				$UserGroupsData='';
				if($UsersGroup){
					foreach($UsersGroup as $groupval){ 
						if($groupval->status=='LIVE'){
							 $groupstatus='LIVE';
							 }else{
							 $groupstatus='SUSPENDED';
							 }
						if($groupval->group_admin){
							 $config='YES';
							 }else{
							 $config='NO';
							 }
						$stuser .='
						<tr>     
							<td>GROUP ID</td>
							<td class="">'.$groupval->ugxid.'</td> 
						  </tr>
						  
						  <tr>     
							<td>GROUP STATUS</td>
							<td class="">'.$groupstatus.'</td>
						  </tr>
						  
						   <tr>     
							<td>GROUP TYPE</td>
							<td class="">'.$groupval->group_type.'</td>
						  </tr>
						
						<tr>     
							<td>GROUP NAME</td>
							<td class="">'.$groupval->group_name.'</td>
						  </tr>
						  
						  <tr>     
							<td>CONFIG PAGE ACCESS</td>
							<td class="">'.$config.'</td>
						  </tr>
						  
						 
						  
						  <tr>   
						<td colspan="2" class="res_clas sp_abc a-space border-bottoms"></td>
						</tr>

						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
						  ';
					}
				}
			// if(!empty($users_ingroup)){
			
			   // foreach($users_ingroup as $user){
			       // $stuser = $stuser.'<tr>
					// <td>FIRST NAME</td>
						// <td class="" >'.$user['first_name'].'</td>
					  // </tr>
					  // <tr>
						// <td>LAST NAME</td>
						// <td>'.$user['last_name'].'</td>
					  // </tr>
					  // <tr>
						// <td>EMAIL</td>
						// <td></td>
					  // </tr>
					  
					   // <tr>
						// <td colspan="2" class="res_clas sp_abc running_latter"> '.$user['email'].' </td>						
					  // </tr>
					      
					  // <tr> 
						// <td>PHONE</td>
						// <td class="" >'.$user['phone'].'</td>
					  // </tr>
					  // <tr>
// <td colspan="2" class="res_clas sp_abc a-space border-bottoms"></td>
// </tr>
					  // <tr>
// <td colspan="2" class="res_clas sp_abc a-space"></td>
// </tr>';
			       	
			       	// }
			       	
			       	// }
			
			
			$data1=$this->Usermanage_model->FetchAllDataUsersData();
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO USERS.</p>
						
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				 if($data->active){
				 $userstatus='ACTIVE';
				 }else{
				 $userstatus='SUSPENDED';
				 }
				
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edit_datetime)){ $last_edited_date_time= $data->last_edit_datetime.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edit_ip_address)){ $last_edited_ip_address= $data->last_edit_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edit_xmanage_id)){ $last_edited_xmanage_id= $data->last_edit_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edit_username)){ $last_edited_username= $data->last_edit_username; }else{ $last_edited_username= "NIL";  } 
					
				 	$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span><span id="multipleGUESTSelect" style="color:black;" > '.$data->first_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->first_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>USER CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>USER XMANAGE ID</td>
						<td>'.$data->xmanage_id.'</td>     
					  </tr>
					  <tr>
						<td class="">USER STATUS </td>
						<td>'.$userstatus.'</td>
					  </tr>
					  <tr>
						<td class="">REGISTRATION TYPE</td>
						<td>'.$data->registration_type.'</td>
					  </tr>
					  <tr>
						<td class="fl_spaceid">USER TYPE</td>
						<td>'.$data->user_type.'</td>
					  </tr>
					  
					  
					  
					
					
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_datetime .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>    
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr>    
						<td class="fl_spaceid">Created User Name</td>
						<td>'.$data->created_username.' </td>
					  </tr>
						
						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					  
					  
					  <body>
						
					  
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm"></td>
					  </tr>
				
				
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER PERSONAL INFO</b></td>
						</tr>
						
						<tr>
						<td>SALUTATION</td>
						<td class="" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td class="" >'.$data->last_name.'</td>
					  </tr>
					  <tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td class="">'.$data->username.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td class="">'.$data->gender.'</td>
					  </tr>
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm">'.$data->quick_intro.'</td>
					  </tr>
					  
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER COMPANY INFO</b></td>
						</tr>
						
						<tr>
						<td>COMPANY NAME</td>
						<td class="" >'.$data->company.'</td>
					  </tr>
					  
					  					  <tr>
						<td>COMPANY ADDRESS</td>
						<td class="" ></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter"> '.$data->company_address.' </td>						
					  </tr>
					  
					  <tr>
						<td>COMPANY POSTAL CODE</td>
						<td class="fl_spaceid" >'.$data->country.', '.$data->pincode.'</td>
					  </tr> 
					  <tr> 
						<td>DESIGNATION</td>
						<td class="fl_spaceid">'.$data->designation.'</td>
					  </tr>
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER CONTACT INFO</b></td>
						</tr>
						
						<tr>
						<td>EMAIL</td>
						<td class="fl_spaceid" ></td>  
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter"> '.$data->email.' </td>						
					  </tr>
					  
					  	 <tr>
						<td>COUNTRY CODE</td>
						<td class="" >'.$data->country_code.'</td>
					  </tr>
					  <tr>
						<td>MOBILE</td>
						<td class="" >'.$data->phone.'</td>
					  </tr>
					  <tr> 
						<td>DID</td>
						<td class="">'.$data->did.'</td>
					  </tr>
					  
					  <tr> 
						<td>TEL</td>
						<td class="">'.$data->tel.'</td>
					  </tr>
					  
					  
					  <tr> 
						<td>EXTENSION</td>
						<td class="fl_spaceid">'.$data->extension.'</td>
					  </tr> 
					  
					      
					  	  <tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER GROUP INFO</b></td>
						</tr>
				
				
				
				<tr>
<td colspan="2" class="sp_abc1 textprojectname">'.$stuser.'</td>

</tr>
					
					
					  
					  
					  
					  
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
	
	
	
	
	}
	
	
	
	
	
	public function searchSingleDataUserMain()
		{
			$id=$_POST['id'];
			$group_id=$_POST['group_id'];
			$data=$this->Usermanage_model->FetchUsertableDataById($id); 
			$users_ingroup=$this->Usermanage_model->FetchAllDataUsersDataAssigned($group_id); 
			
			$stuser='';
			$UsersGroup=$this->Usermanage_model->FetchUserGroupDataById($id);
				
				//$UsersProject=$this->Usermanage_model->FetchUserProjectDataById($data->id);
				$UserGroupsData='';
				if($UsersGroup){
					foreach($UsersGroup as $groupval){
						if($groupval->status=='LIVE'){
							 $groupstatus='LIVE';
							 }else{
							 $groupstatus='SUSPENDED';
							 }
						if($groupval->group_admin){
							 $config='YES';
							 }else{
							 $config='NO';
							 }
						$stuser .='
						<tr>     
							<td>GROUP ID</td>
							<td class="">'.$groupval->ugxid.'</td> 
						  </tr>
						  
						  <tr>     
							<td>GROUP STATUS</td>
							<td class="">'.$groupstatus.'</td>
						  </tr>
						  
						   <tr>     
							<td>GROUP TYPE</td>
							<td class="">'.$groupval->group_type.'</td>
						  </tr>
						
						<tr>     
							<td>GROUP NAME</td>
							<td class="">'.$groupval->group_name.'</td>
						  </tr>
						  
						  <tr>     
							<td>CONFIG PAGE ACCESS</td>
							<td class="">'.$config.'</td>
						  </tr>
						  
						 
						  
						  <tr>   
						<td colspan="2" class="res_clas sp_abc a-space border-bottoms"></td>
						</tr>

						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
						  ';
					}
				}
			
			
			$data1=$this->Usermanage_model->FetchAllDataUsersData();
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO USERS.</p>
						
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				 
				if($data->active){
				 $userstatus='ACTIVE';
				 }else{
				 $userstatus='SUSPENDED';
				 }
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edit_datetime)){ $last_edited_date_time= $data->last_edit_datetime.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edit_ip_address)){ $last_edited_ip_address= $data->last_edit_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edit_xmanage_id)){ $last_edited_xmanage_id= $data->last_edit_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edit_username)){ $last_edited_username= $data->last_edit_username; }else{ $last_edited_username= "NIL";  }
					
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span><span id="multipleGUESTSelect" style="color:black;" > '.$data->first_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->first_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>USER CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>USER XMANAGE ID</td>
						<td>'.$data->xmanage_id.'</td>
					  </tr>
					  <tr>
						<td class="">USER STATUS </td>
						<td>'.$userstatus.'</td>
					  </tr>
					  <tr>
						<td class="">USER REGISTRATION TYPE</td>
						<td>'.$data->registration_type.'</td>
					  </tr>
					  <tr>
						<td class="fl_spaceid">USER TYPE</td>
						<td>'.$data->user_type.'</td>
					  </tr>
					  
					  
					
					
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_datetime .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>    
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr>    
						<td class="">Created User Name</td>
						<td>'.$data->created_username.'</td>
					  </tr>
					    

						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>						
					  
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>   
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					  
					      
					  <body>
						
					  
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm"></td>
					  </tr>
				
				
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER PERSONAL INFO</b></td>
						</tr>
						
						<tr>
						<td>SALUTATION</td>
						<td class="" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td class="" >'.$data->last_name.'</td>
					  </tr>
					  <tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td class="">'.$data->username.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td class="">'.$data->gender.'</td>
					  </tr>
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm">'.$data->quick_intro.'</td>
					  </tr>
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER COMPANY INFO</b></td>
						</tr>
						
						<tr>
						<td>COMPANY NAME</td>
						<td class="" >'.$data->company.'</td>
					  </tr>
		 			  
					  					  <tr>
						<td>COMPANY ADDRESS</td>
						<td class="" ></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc"> '.$data->company_address.' </td>						
					  </tr>
					  
					  <tr>
						<td>COMPANY POSTAL CODE</td>
						<td class="fl_spaceid" >'.$data->country.', '.$data->pincode.'</td>
					  </tr>
					  <tr> 
						<td>DESIGNATION</td>
						<td class="fl_spaceid">'.$data->designation.'</td>
					  </tr>
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER CONTACT INFO</b></td>
						</tr>
						
						<tr>
						<td>EMAIL</td>
						<td class="fl_spaceid" ></td>
					  </tr>
					  
					   <tr>
	
						<td colspan="2" class="res_clas sp_abc running_latter"> '.$data->email.' </td>		 
						</tr>
					  
					  	<tr>
						<td>COUNTRY CODE</td>
						<td class="" >'.$data->country_code.'</td>
					  </tr>
					  <tr>
						<td>MOBILE</td>
						<td class="" >'.$data->phone.'</td>
					  </tr>
					  <tr> 
						<td>DID</td>
						<td class="">'.$data->did.'</td>
					  </tr>
					  
					  <tr> 
						<td>TEL</td>
						<td class="">'.$data->tel.'</td>
					  </tr>
					  
					  
					  <tr> 
						<td>EXTENSION</td>
						<td class="fl_spaceid">'.$data->extension.'</td>
					  </tr>
					      
					  	  <tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER GROUP INFO</b></td>
						</tr>
				
				
				
				<tr>
<td colspan="2" class="sp_abc1 textprojectname">'.$stuser.'</td>

</tr>
					
					
					  
					  
					  
					  
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
	
	
	
      function updateTabs(){
	
	$user_group = $_POST['user_group'];
	$ids = $_POST['ids'];
	$this->Usermanage_model->updateTabsinGroup($user_group,$ids);
	
	$data['action'] = 'EDIT';
	$data['group_info'] = $this->Usermanage_model->getGroupCreateInfoWithTabs($user_group)[0]; 		
        $this->load->view('users_permissions/createGroupSuccess',$data);  

	}
	
	
	
	function allgrouppermissions(){
	
	              
	               $data['title'] = "Group Permissions"; 
			
		        $this->load->view('users_permissions/all_show',$data);
	
	
	
	
	}
	
	
	
	
	function deleteSelectedGroupUsers(){
		
		  $ids = $_POST['ids'];
              
                if(!empty($ids)){
				  	//$data['usersCount'] = $this->Chat_model->GroupUsersCount($data['group_info']['id']);
                  	$ids_arr = explode(',', $ids);
                  	$where_in = $ids_arr;
                  	$data['title'] = "Delete Selected";
                  	$data['ids'] = $ids;
                  	$data['selected'] = TRUE;
                   $data['single'] = FALSE;
                  if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
                  }
                  
		       $data['groups_info'] = $this->Usermanage_model->getGroupUsersByIdWhereIN($where_in);
		     //  $_SESSION['groups_info'] = $this->Usermanage_model->getGroupUsersByIdWhereIN($where_in);
		       //$data['usersCount'] = $this->Usermanage_model->getGroupUersmappedCount($data['groups_info']['id']);
				  
	  
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
                   $data['groups_info']=$this->Usermanage_model->FetchAllDataUserGroups();  
                 //  $_SESSION['groups_info']=$this->Usermanage_model->FetchAllDataUserGroups();  
                    
                }
               
	        $data['title'] = "Delete Group  ";
                $data['ids'] = $ids;
		$this->load->view('users_group/deleteSelected',$data);
		}
		
		
		
		
		
		
		
	function deleteSelectedGroupUsersSuccess(){
		 
		  $ids = $_POST['ids'];
               
                if(!empty($ids)){            
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['ids'] = $where_in;
                  $data['selected'] = TRUE;
                   if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
				  }
				  
                  $data['groups_info'] = $this->Usermanage_model->getGroupUsersByIdWhereIN($where_in);
                  $_SESSION['groups_info'] = $this->Usermanage_model->getGroupUsersByIdWhereIN($where_in);
                  foreach($data['groups_info'] as $group){
					  $allproject=$this->project_m->FetchGroupProjectDataById($group['id']);
					  foreach($allproject as $pro){
						  $this->floor_model->DeleteAllImage($pro->id);
							$this->post_model->DeleteAllDataByMultipleId($pro->id);
							$this->program_model->DeleteAllDataByMultipleId($pro->id);
							$this->content_model->DeleteAllDataId($pro->id);
							 $this->ondemand_model->DeleteAllImage($pro->id);
					  }
					  $this->project_m->DeleteAllImage($group['id']);
				  }
		    
				  

                  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['groups_info']=$this->Usermanage_model->FetchAllDataUserGroups();
                   $_SESSION['groups_info']=$this->Usermanage_model->FetchAllDataUserGroups();
				   foreach($data['groups_info'] as $group){
					  $allproject=$this->project_m->FetchGroupProjectDataById($group['id']);
					  foreach($allproject as $pro){
						  $this->floor_model->DeleteAllImage($pro->id);
							$this->post_model->DeleteAllDataByMultipleId($pro->id);
							$this->program_model->DeleteAllDataByMultipleId($pro->id);
							$this->content_model->DeleteAllDataId($pro->id);
							 $this->ondemand_model->DeleteAllImage($pro->id);
					  }
					  $this->project_m->DeleteAllImage($group['id']);
				  }
                    $this->Usermanage_model->deeleteUsersGroupsAll();  
                    
                }
               
	        $data['title'] = "Delete  ";
                $data['ids'] = $ids;
               // print_r($data['groups_info']);  exit;
		$this->load->view('users_group/deleteSelectedSuccess',$data);
		}
		
		
	
	
	
	
	function deleteSelectedUsersSuccessMain(){
		 
		  $ids = $_POST['ids'];
                 
                if(!empty($ids)){            
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['ids'] = $ids;
                  $data['selected'] = TRUE;
                   if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
				  }
				  
                  $data['users'] = $this->Usermanage_model->getUsersByIdWhereINMain($where_in);
		   $this->Usermanage_model->deeleteByIdWhereINUsersTable($where_in);
				    
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['users']=$this->Usermanage_model->FetchAllDataUsersDataMAin(); 
                   $this->Usermanage_model->deeleteUsersAllmainlist();  
                    
                }
               
	        $data['title'] = "Delete Users ";
                $data['ids'] = $ids;
                $data['action']='DELETE';
		$this->load->view('users_mgmt/deleteSelectedSuccess',$data);
		}
	
	
	
	


      function deleteUsersMainByFileUpload(){
                $ids = $_POST['ids'];  
                if(!empty($ids)){
				  	
                  	$ids_arr = explode(',', $ids);
                  	$where_in = $ids_arr;
                  	$data['title'] = "Delete Selected";
                  	$data['ids'] = $ids;
                  	$data['selected'] = TRUE;
                  
                  if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
                  }
                  
		       $data['files'] = $this->Usermanage_model->getUsersByIdWhereINMainFileUpload($where_in);
		       //$data['usersCount'] = $this->Usermanage_model->getGroupUersmappedCount($data['groups_info']['id']);
				  
	  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['files']=$this->Usermanage_model->FetchAllDataUsersDataMAinFileUpload();  
                    
                }
               
	        $data['title'] = "Delete Users  ";
                $data['ids'] = $ids;
		$this->load->view('users_mgmt/users_list/deleteSelected',$data);
      
      
      
      }

	
	  
	
	  function deleteUsersMainByFileUploadSuccess(){
                $ids = $_POST['ids'];  
                if(!empty($ids)){
				  	
                  	$ids_arr = explode(',', $ids);
                  	$where_in = $ids_arr;
                  	$data['title'] = "Delete Selected";
                  	$data['ids'] = $ids;
                  	$data['selected'] = TRUE;
                  
                  if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
                  }
                  
		       $data['files'] = $this->Usermanage_model->getUsersByIdWhereINMainFileUpload($where_in);
		       
		       $this->Usermanage_model->deeleteFileUploadUserByIdWhereIN($where_in);
				   
	  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['files']=$this->Usermanage_model->FetchAllDataUsersDataMAinFileUpload();  
                    $this->Usermanage_model->deeleteFileUploadUserByAll();
                    
                }
                
                
                
                $uploadfilesarr = array();
                foreach($data['files'] as $fileupload){ 
                $uploadfilesarr[] = $fileupload['file_name'];
                }
                
                
                $template1 = array(
                'table_open' => '<table border="1" class="table" cellpadding="2" cellspacing="0" class="mytable">'
                 );

                 $this->table->set_template($template1);
                 $this->table->set_heading(array('FILE NAME','FIRST NAME', 'LAST NAME','PREFERRED NAME', 'COUNTRY CODE', 'MOBILE','EMAIL'));
                
                $guestsinlist=$this->project_m->FetchAllDataGuestUploadInListUsers($uploadfilesarr);
                
                foreach($guestsinlist as $fileguest){
              
              $this->table->add_row($fileguest['mass_upload_filename'], $fileguest['first_name'], $fileguest['last_name'],$fileguest['username'],$fileguest['country_code'], $fileguest['phone'],$fileguest['email']);
              
              }
                
                
                 
                                     $deletedrowsguests = $this->table->generate();
                                      $message_table = $deletedrowsguests;
					$this->email->clear();
					$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
					$this->email->to($this->session->userdata('email'));
					$this->email->bcc('admin@xplatform.live');

					$subj = 'XPLATFORM USERS MASS DATA ENTRY DELETED';
				        $this->email->subject($subj);
					
					$data_mass['table_body'] = $message_table;
					$data_mass['username'] = $this->session->userdata('username');
					//$data_mass['project_name'] = $project_name;
					$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_mass_upload_delete', 'ion_auth'), $data_mass, true);
					$this->email->message($message);

					if ($this->email->send())
					{
					 echo 'success mail'; 
					}else{
						//echo $this->email->print_debugger();
						echo 'error'; 
					} 
                
       
	        $data['title'] = "Delete Users  ";
                $data['ids'] = $ids;
		$this->load->view('users_mgmt/users_list/deleteSelectedSuccess.php',$data);
      
      
      
      }
	
	
	
	

		
      function deleteUsersMainByUsers(){
      
                $ids = $_POST['ids'];
              
                if(!empty($ids)){
				  	
                  	$ids_arr = explode(',', $ids);
                  	$where_in = $ids_arr;
                  	$data['title'] = "Delete Selected";
                  	$data['ids'] = $ids;
                  	$data['selected'] = TRUE;
                  
                  if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
                  }
                  
		       $data['users'] = $this->Usermanage_model->getUsersByIdWhereINMain($where_in);
		       //$data['usersCount'] = $this->Usermanage_model->getGroupUersmappedCount($data['groups_info']['id']);
				  
	  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['users']=$this->Usermanage_model->FetchAllDataUsersDataMAin();  
                    
                }
               
	        $data['title'] = "Delete Users  ";
                $data['ids'] = $ids;
                $data['action']='DELETE';
		$this->load->view('users_mgmt/deleteSelected',$data);
      
      
      
      }
		
		
		
		
		
		
	function searchUsergroupPermissions(){
	
		
		       $data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			
			
			if(!empty($_POST['guest']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['guest']=='live')){
					$searchFloor=array('xf_mst_group.status'=>'LIVE');
				} 
				if(!empty($_POST['guest']=='suspended')){
					$searchFloor=array('xf_mst_group.status'=>'SUSPENDED');
				} 
				if(!empty($_POST['guest']=='reserved')){ 
					$searchFloor=array('xf_mst_group.group_type'=>'RESERVED');
				} 
				if(!empty($_POST['guest']=='not_reserved')){
					$searchFloor=array('xf_mst_group.group_type'=>'NOT RESERVED');
				} 
				
				if(!empty($_POST['selectShortBy']== 'group-chat-a-z')){
					$searchDataOrderByAsc='xf_mst_group.group_name';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'group-type-a-z')){
					$searchDataOrderByAsc='xf_mst_group.group_type';
				}
				
				if(!empty($_POST['selectShortBy']== 'user-count-most')){
					$searchDataOrderByAsc='xf_mst_group.group_type';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'user-count-least')){
					$searchDataOrderByAsc='xf_mst_group.group_type';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'created_first')){
					//$searchDataOrderByAsc='xf_mst_group.group_type';
					$searchDataOrderByDsc='xf_mst_group.created_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'created_earliest')){
					
					$searchDataOrderByAsc='xf_mst_group.created_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'edited_first')){
					
					$searchDataOrderByDsc='xf_mst_group.last_edited_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'edited_earliest')){
					
					$searchDataOrderByAsc='xf_mst_group.last_edited_date_time';
				}
				
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->Usermanage_model->searchGroupUserData($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData); 
				  
			}else{
                          
				$data1=$this->Usermanage_model->FetchAllDataUserGroups();
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					//print_r($data1);die;
					foreach($data1 as $data){
						$usersCount = $this->Usermanage_model->getGroupUersmappedCount($data['id']);
						
						 $group_info= $this->Usermanage_model->getGroupCreateInfoWithTabs($data['id'])[0];
						 if(!empty($group_info['confg_tabs'])){
			        $arrconfigstabs = $group_info['confg_tabs'];
				$arrm = explode(",",$group_info['tabs']);
				
			        }
				
				$tabstr= '';
				if(!empty($arrm)){
				foreach($arrm as $tab){
				$tabstr = $tabstr.'<p>'.$tab.'</p>';
				
				}
				}else{
				$tabstr = '';
				} 
						
						
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="viewgroup" id='.$data['id'].' >
							 
							 
							 
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['group_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
					
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data['ugxid'] .'</td>
								<td >'.$data['group_type'].'</td>  
								<td>'.$data['status'] .'</td>
								<td>'.$data['group_name'] .'</td> 
								<td>'.$usersCount.'</td> 
								<td>'.$tabstr.'</td> 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
	
	
	
	
	}
	
	
	
	
	
	
	
	 public function searchSingleDataUserUpload()
		{
			$id=$_POST['id'];
			$data=$this->Usermanage_model->FetchDataByIdUploadUser($id); 
			$data1=$this->Usermanage_model->FetchAllDataUsersDataMAinFileUpload();  
			//$guestsinlist=$this->Guest_model->FetchAllDataGuestUploadInList($data->file_name);
			
			$list = '';
			
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO USER LIST.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER LIST SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
				
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span><span id="multipleGUESTSelect" style="color:black;" > '.$data->file_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p class="current-bold"><span>CURRENTLY VIEWING :</span><span class="pname"> '.$data->file_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>USER LIST CREATION INFO</h5></td>
						</tr>
					    <body>

					  <tr>
						<td class="fl_spaceid">USER LIST ID </td>
						<td>'.$data->xguestfileid.'</td>
					  </tr>
					  
					  
		 
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_datetime .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>    
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr>    
						<td class="">Created User Name</td>
						<td>'.$data->created_username.'</td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					
					
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER LIST INFO</b></td>
						</tr>
						
						<tr>
						<td>MASS UPLOAD FILE NAME</td>
						<td class="fl_spaceid" >'.$data->file_name.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FILE TYPE </td>
						<td class="fl_spaceid" >'.$data->file_type.'</td>
					  </tr>
					  <tr>
						<td>FILE SIZE</td>
						<td class="fl_spaceid" >'.round(($data->file_size/1024)).' KB</td>
					  </tr>
					  <tr> 
						<td>NUMBER OF INSERTS</td>
						<td class="fl_spaceid">'.$data->total_inserts.'</td>
					  </tr>
					   
					   
					
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
	
	
	
	
	
	
	function tabsListAll(){
	
	                       $data1='';
			        $searchFloor='';
			        $searchFloorOrderBy='';
				$data1=$this->Usermanage_model->getAllTabs();
				$usregroupid = $_POST['usergroup'];
				$user_data = $this->Usermanage_model->FetchGroupDataById($usregroupid); 
				$arrconfigstabs = $user_data->confg_tabs;
				$arrm = explode(",",$arrconfigstabs);
				
                 
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';

					foreach($data1 as $data){
						//$usersCount = $this->Usermanage_model->getGroupUersmappedCount($data['id']);
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						
						if(in_array($data['id'],$arrm)){
						$checked = 'checked';
						}else{
						$checked = '';
						}
						$checkId='SengleView_'.$data['id'];

							 $output .= 
 
							 '<tr class="" id='.$data['id'].' >

								<td class="deletesingle" >
								
								<input type="checkbox"  '.$checked.'  data-project="'.$user_data->group_name.'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;" >
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
					
								
								<td>'.$data['config_page'] .'</td>
								<td>'.$data['tab_name'] .'</td>
								
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	
	
	
	}
	
	

	
	function searchUsergroup(){
	
	
	               $data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			//$data['project_select'] = $_POST['project'];
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData']=='live')){
					$searchFloor=array('xf_mst_group.status'=>'LIVE');
				} 
				if(!empty($_POST['selectData']=='suspended')){
					$searchFloor=array('xf_mst_group.status'=>'SUSPENDED');
				} 
				if(!empty($_POST['selectData']=='reserved')){
					$searchFloor=array('xf_mst_group.group_type'=>'RESERVED');
				} 
				if(!empty($_POST['selectData']=='not_reserved')){
					$searchFloor=array('xf_mst_group.group_type'=>'NOT RESERVED');
				} 
				
				if(!empty($_POST['selectShortBy']== 'group-chat-a-z')){
					$searchDataOrderByAsc='xf_mst_group.group_name';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'group-type-a-z')){
					$searchDataOrderByAsc='xf_mst_group.group_type';
				}
				
				if(!empty($_POST['selectShortBy']== 'user-count-most')){
					$searchDataOrderByDsc='usercount';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'user-count-least')){
					$searchDataOrderByAsc='usercount';
				}
				
				
				
				
				if(!empty($_POST['selectShortBy']== 'created_first')){
					//$searchDataOrderByAsc='xf_mst_group.group_type';
					$searchDataOrderByDsc='xf_mst_group.created_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'created_earliest')){
					
					$searchDataOrderByAsc='xf_mst_group.created_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'edited_first')){
					
					$searchDataOrderByDsc='xf_mst_group.last_edited_date_time';
				}
				
				if(!empty($_POST['selectShortBy']== 'edited_earliest')){
					
					$searchDataOrderByAsc='xf_mst_group.last_edited_date_time';
				}
				
				
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->Usermanage_model->searchGroupUserData($searchFloor,$searchDataOrderByAsc,$searchDataOrderByDsc,$AllSearchData); 
				  
			}else{
                          
				$data1=$this->Usermanage_model->FetchAllDataUserGroups();
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					//print_r($data1);die;
					foreach($data1 as $data){
						$usersCount = $this->Usermanage_model->getGroupUersmappedCount($data['id']);
						//echo count($usersCount);
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id']; 
							 $output .= '<tr id='.$data['id'].' class="viewgroup">
							 
							 
							 
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['group_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
					
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data['ugxid'] .'</td>
								<td >'.$data['group_type'].'</td>  
								<td>'.$data['status'] .'</td>
								<td>'.$data['group_name'] .'</td> 
								<td>'. $usersCount .'</td> 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
			
	
	
	
	
	}
	
	
	
	
	
	
 public function searchSingleDataUserById()
		{
			 
					  
			
	               $id=$_POST['id'];
			//$group_id=$_POST['group_id'];
			$data=$this->Usermanage_model->FetchUsertableDataById($id); 
			 
			//$users_ingroup=$this->Usermanage_model->FetchAllDataUsersDataAssigned($group_id); 
			
			$stuser='';
			if(!empty($users_ingroup)){
			
			   foreach($users_ingroup as $user){
			       	$stuser = $stuser.'';
			       	
			       	}
			       	
			       	}
			
			
			$data1=$this->Usermanage_model->FetchAllDataUsersData();
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO USERS.</p>
						
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER SELECTED</p>';
					}
			$output = '';
			if($data > 0)
			{
				$UsersGroup=$this->Usermanage_model->FetchUserGroupDataById($data->id);
				
				//$UsersProject=$this->Usermanage_model->FetchUserProjectDataById($data->id);
				$UserGroupsData='';
				if($UsersGroup){
					foreach($UsersGroup as $groupval){
						if($groupval->status=='LIVE'){
							 $groupstatus='LIVE';
							 }else{
							 $groupstatus='SUSPENDED';
							 }
							 
							 if($groupval->group_admin){
							 $config='YES';
							 }else{
							 $config='NO';
							 }
						$UserGroupsData .='
						<tr>     
							<td>GROUP ID</td>
							<td class="">'.$groupval->ugxid.'</td> 
						  </tr>
						  
						  <tr>     
							<td>GROUP STATUS</td>
							<td class="">'.$groupstatus.'</td>
						  </tr>
						  
						   <tr>     
							<td>GROUP TYPE</td>
							<td class="">'.$groupval->group_type.'</td>
						  </tr>
						
						<tr>     
							<td>GROUP NAME</td>
							<td class="">'.$groupval->group_name.'</td>
						  </tr>
						  
						  <tr>     
							<td>CONFIG PAGE ACCESS</td>
							<td class="">'.$config.'</td>
						  </tr>
						  
						 
						  
						  <tr>   
						<td colspan="2" class="res_clas sp_abc a-space border-bottoms"></td>
						</tr>

						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
						</tr>
						  ';
					}
				}
				
				
				 if($data->active){
				 $userstatus='ACTIVE';
				 }
				 if($data->active==2){
				 $userstatus='SUSPENDED';
				 }
				 if($data->active==0){
				 $userstatus='DEACTIVATED';
				 }
				
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edit_datetime)){ $last_edited_date_time= $data->last_edit_datetime.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edit_ip_address)){ $last_edited_ip_address= $data->last_edit_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edit_xmanage_id)){ $last_edited_xmanage_id= $data->last_edit_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edit_username)){ $last_edited_username= $data->last_edit_username; }else{ $last_edited_username= "NIL";  } 
					
				 	$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span><span id="multipleGUESTSelect" style="color:black;" > '.$data->first_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->first_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>USER CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>USER XMANAGE ID</td>
						<td>'.$data->xmanage_id.'</td>  
					  </tr>
					  <tr>
						<td class="">USER STATUS </td>
						<td>'.$userstatus.'</td>
					  </tr>
					  <tr>
						<td>USER REGISTRATION TYPE</td>
						<td class="" >'.$data->registration_type.'</td>
					  </tr>   
					  <tr>
						<td class="fl_spaceid">USER TYPE</td>
						<td>'.$data->user_type.'</td>
					  </tr>
					  
					  
					
					
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_datetime .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>    
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr>    
						<td class="">Created User Name</td>
						<td>'.$data->created_username.' </td>
					  </tr>   
					  
						<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
										  
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					  
					  
					  
					  
					  
					<body>
						  
					  
					   
					  
					  
					  
					  
					  
					  
					  
					
				
				
				<tr>
<td colspan="2" class="sp_abc1 textprojectname">'.$stuser.'</td>

</tr>
					  
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm"></td>
					  </tr>
				
				
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER PERSONAL INFO</b></td>
						</tr>
						
						<tr>
						<td>SALUTATION</td>
						<td class="" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td class="" >'.$data->last_name.'</td>
					  </tr>
					  <tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td class="">'.$data->username.'</td>
					  </tr>
					  <tr>
						<td>GENDER</td>
						<td class="">'.$data->gender.'</td>
					  </tr>
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  <tr>						
						<td colspan="2" class="text-running-latter sp_abc df_xpm">'.$data->quick_intro.'</td>
					  </tr>
					  
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER COMPANY INFO</b></td>
						</tr>
						
						<tr>
						<td>COMPANY NAME</td>
						<td class="" >'.$data->company.'</td>
					  </tr>
					  
					  					  <tr>
						<td>COMPANY ADDRESS</td>
						<td class="" ></td>
					  </tr>   
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc"> '.$data->company_address.' </td>						
					  </tr>    
					  
					  <tr>
						<td>COMPANY POSTAL CODE</td>
						<td class="fl_spaceid" >'.$data->country.', '.$data->pincode.'</td>
					  </tr>
					  <tr> 
						<td>DESIGNATION</td>
						<td class="fl_spaceid">'.$data->designation.'</td>
					  </tr>
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER CONTACT INFO</b></td>
						</tr>
						
						<tr>
						<td>EMAIL</td>
						<td class="fl_spaceid" ></td>  
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter"> '.$data->email.' </td>						
					  </tr>
					  
					  	 <tr>
						<td>COUNTRY CODE</td>
						<td class="" >'.$data->country_code.'</td>
					  </tr>
					  <tr>
						<td>MOBILE</td>
						<td class="" >'.$data->phone.'</td>
					  </tr>
					  <tr> 
						<td>DID</td>
						<td class="">'.$data->did.'</td>
					  </tr>
					  
					  <tr> 
						<td>TEL</td>
						<td class="">'.$data->tel.'</td>
					  </tr>
					  
					  
					  <tr>     
						<td>EXTENSION</td>
						<td class="">'.$data->extension.'</td>
					  </tr>
					  
					      
					  	  
					
					  
					  <body>
						<tr>
						<td colspan="2" class="floor-ck"><b style="font-size: 16px;">USER GROUP INFO</b></td>
						</tr>
				
					  '.$UserGroupsData.'
					  
					  
					  
					  
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;			  
					  
					  
			
		}
		
		


      public function searchSingleDataUser()
		{
			
			if(!empty($_GET['id'])){
				$id=$_GET['id'];
			}else{
				$id=$_POST['id'];
			}
			
			$data=$this->Usermanage_model->FetchDataById($id); 
			
			       $group_info= $this->Usermanage_model->getGroupCreateInfoWithTabs($id)[0]; 
			       $usersCount = $this->Usermanage_model->getGroupUersmappedCount($id);
			       
			       $users = $this->Usermanage_model->getGroupUersmapped($id); 
			       $stuser='';
			       if(!empty($users)){
			       	
			             foreach($users as $user){
			       	$stuser = $stuser.'<tr>
					<td>FIRST NAME</td>
						<td class="" >'.$user['first_name'].'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td>'.$user['last_name'].'</td>
					  </tr>
					  <tr>
						<td>EMAIL</td>
						<td></td>
					  </tr>  
					      
					   <tr>
						<td colspan="2" class="res_clas sp_abc running_latter"> '.$user['email'].' </td>		 
						</tr>
					  
					  <tr> 
						<td>PHONE</td>
						<td class="" >'.$user['phone'].'</td>
					  </tr>    
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space border-bottoms"></td>
					    </tr>   
					  <tr>
<td colspan="2" class="res_clas sp_abc a-space"></td>
</tr>';
			       	
			       	}
			       
			       }
			       
			       

			        if(!empty($group_info['confg_tabs'])){
			        $arrconfigstabs = $group_info['confg_tabs'];
				$arrm = explode(",",$group_info['tabs']);
				
			        }
				
				$tabstr= '';
				if(!empty($arrm)){
				foreach($arrm as $tab){
				$tabstr = $tabstr.'<p>'.$tab.'</p>';
				
				}
				}else{
				$tabstr = '<p></p>';
				}
			
			$data1=$this->Usermanage_model->FetchAllData();
			$checkNull='';
			if(empty($data1)){
			$checkNull .='<p class="dhg">THERE ARE NO GROUPS.</p>  
						 
						';
			}else{
			$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GROUPS SELECTED</p><div class="display-step-status" id="displaystatus" ></div>';
			}
			$output = '';
			if($data > 0)
			{
				 
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';

				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
					
					
					$output .= '

						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleGUESTSelect" style="color:black;" > '.$data->group_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span><span class="pname"> '.$data->group_name.'</span></p></td>
					    </tr>
					    
					
						<tr>
							<td colspan="2" class="top-fc"><h5>GROUP CREATION INFO</h5></td>
						</tr>
					    <body>
					
					  
					  <tr>
						<td>Created date & time</td>
						<td>'.$data->created_date_time .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data->created_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data->created_xmanage_id.'</td>
					  </tr>
					  <tr class="">
						<td>Created User Name</td>
						<td>'.$data->created_username.'</td>
					  </tr>
					              					    
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>'.$last_edited_date_time.'</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>'.$last_edited_ip_address.'</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>'.$last_edited_xmanage_id.'</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>'.$last_edited_username.'</td>
					  </tr>
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GROUP INFO</b></td>
						</tr>
						
						<tr>
						<td>GROUP ID</td>
						<td class="" >'.$data->ugxid.'</td>
					  </tr>
					  
					  					  <tr>
						<td>GROUP TYPE</td>
						<td class="" >'.$data->group_type.'</td>
					  </tr>
					  <tr>
						<td>GROUP STATUS</td>
						<td  >'.$data->status.'</td>
					  </tr>
					  <tr> 
						<td>GROUP NAME</td>
						<td class="textprojectname" ></td>
					  </tr>
					  
					   <tr>	
						<td colspan="2" class="res_clas sp_abc textprojectname"> '.$data->group_name.' </td>		 
						</tr>
					  
					  <tr>
						<td>NUMBER OF USERS</td>
						<td>'.$usersCount.'</td>
					  </tr>
					          
					
					  
					  
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GROUP PERMISSION INFO</b></td>
						</tr>
						
					
				  
					  <tr>
						<td>CONFIG PAGE TAB NAMES</td>
						<td class=""></td>  
					  </tr>
					  
					  
					  
					  
					<tr>
					<td colspan="2" class="sp_abc1 textprojectname">'.$tabstr.'</td>

					</tr>
					  
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm"></td>
					  </tr>
					  
					  
					  
					<body>
					<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GROUP USERS INFO</b></td>
					 </tr>
					 '.$stuser.'';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
		
		
		
		
		
		
		
		

function allUsersManage(){


     $data['title'] = "All Users";
     $data['ucount']=$this->Usermanage_model->FetchAllDataUsersData();
     $this->load->view('users_mgmt/all_show',$data);
	
	 

}





function searchUserManageMaster(){


	                $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
					if(!empty($_POST['selectData']=='all_live')){
					$searchGuestType=array('users.active'=>1);
					}
					if(!empty($_POST['selectData'] =='all_suspend')){
						$searchGuestType=array('users.active '=>2); 
					}
					if(!empty($_POST['selectData'] =='all_deactivated')){
						$searchGuestType=array('users.active '=>0); 
					}
					if(!empty($_POST['selectData'] =='guest')){
						$searchGuestType=array('users.user_type '=>'GUEST'); 
					}
					if(!empty($_POST['selectData'] =='group')){
						
						$searchGuestType=array('users.user_type '=>'GROUPA'); 
					}
					if(!empty($_POST['selectData'] =='super')){
						$searchGuestType=array('users.user_type '=>'SUPERA'); 
					}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='users.company';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users.created_datetime';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users.created_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='users.last_edit_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users.last_edit_datetime';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Usermanage_model->searchUsersMain($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc); 
				
				
			}
			
			else{
				
				$data1=$this->Usermanage_model->FetchAllDataUsersData();
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					$countdata=0;
					foreach($data1 as $data){
						
						if(!empty($data['last_edit_datetime'])){
							$last_edited_date_time=$data['last_edit_datetime'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						if($data['active']==1){
							$userstatus='ACTIVE';
						}
						if($data['active']==2){
							$userstatus='SUSPENDED';
						}
						if($data['active']==0){
							$userstatus='DEACTIVATED';
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].'  class="viewusermainlist">
							 
							
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xmanage_id'].'</td>
								<td>'.$userstatus.'</td>
								<td >'.$data['registration_type'].'</td>
								
								<td>'.$data['user_type'].'</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td>'.$data['email'] .'</td> 
								 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  $countdata++;
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				//echo $output;
				$mydata['data']=$output;
				//$mydata['countdata']=count($countdata);
				$mydata['countdata']=$countdata;
				echo json_encode($mydata);
	


}




	
	

function searchUserManage(){


	                $searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					//$searchFloor=array('f.floor_plan_grid_type'=>$_POST['floor_plan']);
				 
			if(!empty($_POST['selectData'])){
						// $searchGuestType=array('users.guest_type '=>trim($_POST['selectData'])); 
					}
					
				}
				if(!empty($_POST['selectShortBy'] == 'fname-a-z')){
					$searchDataOrderByAsc='users.first_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					$searchDataOrderByAsc='users.last_name';
				}
				if(!empty($_POST['selectShortBy'] == 'email-a-z')){
					$searchFloorOrderBy='users.email'; 
				}
				
				if(!empty($_POST['selectShortBy'] == 'company-a-z')){
					$searchDataOrderByAsc='users.company';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users.created_datetime';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users.created_datetime';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					$searchDataOrderByDsc='users.last_edited_date_time';
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users.last_edited_date_time';
				}
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Usermanage_model->searchUsersMain($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc);
				
				
			}
			
			else{
				
				$data1=$this->Usermanage_model->FetchAllDataUsersData();
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edit_datetime'])){
							$last_edited_date_time=$data['last_edit_datetime'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].'  class="viewusermain">
							 
							
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['first_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$data['xmanage_id'].'</td>
								<td >'.$data['registration_type'].'</td>
								
								<td>-</td>
								<td class="project_namecls"  >'.$data['first_name'] .'</td> 
								<td>'.$data['last_name'].'
								</td> 
								<td>'.$data['company'] .'</td> 
								<td>'.$data['email'] .'</td> 
								<td>'.$data['phone'] .'</td> 
								<td class="chk2"><input type="checkbox" id="c_'.$data['id'].'" name="rigtcheck" class="rightcheck'.$data['id'].' " >
      <label style="display:none;" for="c_'.$data['id'].'" class="rightcheck rightcheck'.$data['id'].'"></label>
								</td> 
							  </tr>';
							  
					}
					
				}else{
					$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
				}
				
				echo $output;
	


}	
		
		
		
		
		
		
	

     function deleteJunkRecord($id,$group_id,$project_id,$action,$step){
        
        if($action=='ADD'){
        $this->Chat_model->deleteJunkRecordGroupChat($id); 
        redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
      //  redirect("Location: config/".$group_id."/".$project_id);
        exit();
        }else{
        
        $olddata =  $this->Chat_model->getOldUpdateData($id); 
        foreach($olddata as  $old){
        $data[strtolower($old['column_name'])] = $old['old_value'];
        }
        
        
        if(!empty($data)){
         $this->Chat_model->updateOldData($id,$data);
        }
        
       $datau=array(
       'edit_steps'=>2
       );
        $this->Chat_model->updateOldData($id,$datau);
       
        
        
        
         redirect('/home/config/'.$group_id.'/'.$project_id, 'refresh');
        }
        

        }	
	
	
	
}




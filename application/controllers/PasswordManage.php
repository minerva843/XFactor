<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordManage extends CI_Controller
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
		
		
		
		
		
		if (!$this->ion_auth->logged_in()) {
			//redirect('auth/login', 'refresh');
		}
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
		
        $this->load->view('password_manage/addNew',$data); 
	
	
	
	}
	
	
	
	
	
	function addstep1Post($id=false)
	{
		    
		if($_POST){
			
			$password=$this->ion_auth->hash_password($_POST['password']);
			$this->auth->updatepassword($id,$password);
			echo $id;
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
		$this->load->view('password_manage/addSuccess',$data);
	
	
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
						if($groupval->status=='ACTIVE'){
							 $groupstatus='ACTIVE';
							 }else{
							 $groupstatus='SUSPENDED';
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
						<td></td>
					  </tr>
					  
					   <tr>	
						<td colspan="2" class="res_clas sp_abc running_latter fl_spaceid"> '.$data->created_username.' </td>		 
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
						<td class="fl_spaceid" >'.$data->company_postal_code.'</td>
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
		
		

		

function allUsersPasswordManage(){


     $data['title'] = "All Users";
     $data['ucount']=$this->Usermanage_model->FetchAllDataUsersData();
     $this->load->view('password_manage/all_show',$data);
	
	 
 
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




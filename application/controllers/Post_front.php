<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_front extends CI_Controller
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
		$this->load->model('zone_model');
		$this->load->model('content_model');
		$this->load->model('floor_model');
		$this->load->model('project_model');
		$this->load->model('post_model');
		$this->load->model('group_model');
		$this->load->model('Audio_model');
		$this->load->model('Ondemand_model');
		$this->load->model('Guest_model');
		$this->load->model('Program_model');
		$this->load->model('Video_model');
		$this->load->model('Places_model');
		$this->load->model('ProgramFront_model', 'p_model');
		$this->load->library('email');
		$this->load->library('session');
		// if (!$this->ion_auth->logged_in())
		// {

		// redirect('auth/login', 'refresh');
		// }

	}

	public function index($project = 0, $floor = 0, $post_id = 0)
	{
		if (empty($project)) {
			$data['No_registerUser'] = '<p class="pl-kkc">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
		}

		if (!empty($project)) {
			$check = $this->Places_model->FetchProjectTypeId($project);

			$project_type = $check->project_type;
			if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

				if (!$this->ion_auth->logged_in()) {

					$projectdata = $this->project_model->FetchSecDataById($project);
					$data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
					$data['No_registerUser_condition'] = true;
				} else {

					if (!empty($project)) {
						// $check = $this->Places_model->FetchProjectTypeId($project);
						// $project_type = $check->project_type;
						// if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

							// if (!$this->ion_auth->logged_in())
							// {
							// redirect('auth/login', 'refresh');
							// }
							$user_id = $this->session->userdata('user_id');
							if (!empty($user_id)) {

								$No_registerUser = $this->Places_model->checkNo_registerUser($user_id, $project);

								if($No_registerUser==false){

								$projectdata=$this->project_model->FetchSecDataById($project);
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
								$data['No_registerUser_condition']=true;
								}else{

								$data['No_registerUser']='';
								}
							}
						// } else {

							// if ($this->ion_auth->logged_in()) {

								// $data['No_registerUser_condition'] = true;
							// } else {
								// $data['No_registerUser'] = '';
							// }
						// }
					}
				}
			} else {
				$data['No_registerUser']='';
				$data['No_registerUser_condition']=false;

				// if (!$this->ion_auth->logged_in()) {
					// $data['No_registerUser_condition'] = true;
				// }
			}
		} else {
			$data['No_registerUser_condition'] = true;
		}




		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if ($this->session->userdata('checkdata') == TRUE) {

			if ($user->check_user1 != 1) {
				redirect('places/places_step1');
			}
			if ($user->check_user2 != 1) {
				redirect('places/places_step2');
			}
		}



		$this->session->set_userdata('checkdata', false);

		if ($post_id != 0) {
			$data['post_positions'] = $this->Places_model->GetPostInfoById($post_id);
		}

		if ($project !== 0) {
			$data['posts'] = $this->Places_model->FetchPostsById($project);
		}


		if ($project != 0) {
			$data['floors'] = $this->Places_model->getFloorPlanbyProject($project);
		} else {
			$data['floors'] = 0;
		}
		$project_name = $this->p_model->getProjectNamebyProjectId($project);

		$data['project_name'] = $project_name->project_name;
		if (count($data['floors']) == 1) {
			$id = $data['floors'][0]->id;
		} elseif (!empty($floor)) {
			$id = $floor;
		} else {
			$id = $data['floors'][0]->id;
		}
		$res = $this->floor_model->FetchDataById($id);
		if ($res) {
			$Img = base_url() . 'assets/floor_plan/' . $res->file_name . $res->file_type;
		} else {
			$Img = 0;
		}

		$floor_plan_drop_point = explode(',', $res->floor_plan_drop_point);
		if (!empty($floor)) {
			$data['floor'] = $id;
		} else {
			$data['floor'] = 0;
		}
		$data['project_id'] = $project;
		$data['width'] = $floor_plan_drop_point[0];
		$data['height'] = $floor_plan_drop_point[1];
		$data['img'] = $Img;
		$data['selected_project_type'] = $project_type;
		if ($project > 0 && $floor > 0) {
			$history['user_id'] = $this->session->userdata('user_id');
			$history['project_id'] = $project;
			$history['floor_plan_id'] = $floor;
			$GetHistory = $this->Places_model->FetchHistoryById($history);
			$data['GetHistory'] = $GetHistory;
			if (!empty($GetHistory)) {
				$activity = $GetHistory->activity;
				$activity1 = explode(',', $activity);
				$left = $activity1[1] - 26;
				if ($left > 0) {
					$myleft = $left;
				} else {
					$myleft = 0;
				}
				$data['left'] = $myleft;

				$da = $floor_plan_drop_point[1] / 2;
				$top = $activity1[0] - $da + 100;
				if ($top > 0) {
					$mytop = $top;
				} else {
					$mytop = 0;
				}
				$data['top'] = $mytop;
			}
		}
		$type1 = array("ONLINE REG REQUIRED", "ONSITE REG REQUIRED", "HYBRID REG REQUIRED", "ONLINE NO REG REQURIED", "ONSITE NO REG REQURIED", "HYBRID NO REG REQURIED");
		if (in_array($project_type, $type1)) {
			$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS");
		}


		$type1 = array("VIRTUAL SHOP REG REQUIRED", "VIRTUAL SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VIRTUAL SHOP OWNER", "VIRTUAL SHOP REP");
		}



		$type1 = array("SHOP REG REQUIRED", "SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("SHOP OWNER", "SHOP REP");
		}




		$type1 = array("VENUE REG REQUIRED", "VENUE NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VENUE OWNER", "VENUE REP");
		}


		$type1 = array("PROPERTY REG REQUIRED", "PROPERTY NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("PROPERTY OWNER", "PROPERTY AGENT");
		}





		$type1 = array("DEMO REG REQUIRED", "DEMO NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("");
		}

		$data['sellers'] = $this->Guest_model->FetchAllDataAsSellers($project, $where_in);
		//$data['sellers'] = $this->common->allonline();
		$data['guesttypes'] = $where_in;
		$data['AllonlineDropdown'] = $where_in;
		if (!empty($this->session->userdata('loggedin')) && $this->session->userdata('loggedin') != '' && $this->session->userdata('loggedin') != 'api.user.login.invalid_credentials_email_username') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $this->session->userdata('token'),
					"Content-Type: application/json"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$team_data = json_decode($response);
			//print_r($team_data);die;

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams/" . $team_data[0]->id . "/channels",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $this->session->userdata('token'),
					"Content-Type: application/json"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$data['allgroups'] = json_decode($response);
		} else {
			$data['allgroups'] = '';
		}
		$data['title'] = "POSTS";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('post_front/post_front');
		$this->load->view('include/footer');
	}

	public function redirectanother($project = 0, $floor = 0)
	{
		if (empty($project)) {
			$data['No_registerUser'] = '<p class="pl-kkc">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
		}

		if (!empty($project)) {
			$check = $this->Places_model->FetchProjectTypeId($project);

			$project_type = $check->project_type;
			if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

				if (!$this->ion_auth->logged_in()) {

					$projectdata = $this->project_model->FetchSecDataById($project);
					$data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
					$data['No_registerUser_condition'] = true;
				} else {

					if (!empty($project)) {
						// $check = $this->Places_model->FetchProjectTypeId($project);
						// $project_type = $check->project_type;
						// if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

							// if (!$this->ion_auth->logged_in())
							// {
							// redirect('auth/login', 'refresh');
							// }
							$user_id = $this->session->userdata('user_id');
							if (!empty($user_id)) {

								$No_registerUser = $this->Places_model->checkNo_registerUser($user_id, $project);

								if($No_registerUser==false){

								$projectdata=$this->project_model->FetchSecDataById($project);
								$data['No_registerUser']='<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href='.$projectdata->register_url .'>'.$projectdata->register_url.'</a></p>';
								$data['No_registerUser_condition']=true;
								}else{

								$data['No_registerUser']='';
								}
							}
						// } else {

							// if ($this->ion_auth->logged_in()) {

								// $data['No_registerUser_condition'] = true;
							// } else {
								// $data['No_registerUser'] = '';
							// }
						// }
					}
				}
			} else {
				$data['No_registerUser']='';
				$data['No_registerUser_condition']=false;

				// if (!$this->ion_auth->logged_in()) {
					// $data['No_registerUser_condition'] = true;
				// }
			}
		} else {
			$data['No_registerUser_condition'] = true;
		}



		$userid = $this->session->userdata('user_id');
		$user = $this->ion_auth->user($userid)->row();
		if ($this->session->userdata('checkdata') == TRUE) {

			if ($user->check_user1 != 1) {
				redirect('places/places_step1');
			}
			if ($user->check_user2 != 1) {
				redirect('places/places_step2');
			}
		}



		$this->session->set_userdata('checkdata', false);

		if ($project !== 0) {
			$data['posts'] = $this->Places_model->FetchPostsById($project);
			//echo "posts";  exit;
		}


		if ($project != 0) {
			$data['floors'] = $this->Places_model->getFloorPlanbyProject($project);
		} else {
			$data['floors'] = 0;
		}
		$project_name = $this->p_model->getProjectNamebyProjectId($project);

		$data['project_name'] = $project_name->project_name;
		$project_type = $project_name->project_type;
		if (count($data['floors']) == 1) {
			$id = $data['floors'][0]->id;
		} elseif (!empty($floor)) {
			$id = $floor;
		} else {
			$id = $data['floors'][0]->id;
		}
		$res = $this->floor_model->FetchDataById($id);
		if ($res) {
			$Img = base_url() . 'assets/floor_plan/' . $res->file_name . $res->file_type;
		} else {
			$Img = 0;
		}

		$floor_plan_drop_point = explode(',', $res->floor_plan_drop_point);
		if (!empty($floor)) {
			$data['floor'] = $id;
		} else {
			$data['floor'] = 0;
		}
		$data['project_id'] = $project;
		$data['width'] = $floor_plan_drop_point[0];
		$data['height'] = $floor_plan_drop_point[1];
		$data['img'] = $Img;
		$data['selected_project_type'] = $project_type;
		if ($project > 0 && $floor > 0) {
			$history['user_id'] = $this->session->userdata('user_id');
			$history['project_id'] = $project;
			$history['floor_plan_id'] = $floor;
			$GetHistory = $this->Places_model->FetchHistoryById($history);
			$data['GetHistory'] = $GetHistory;
			if (!empty($GetHistory)) {
				$activity = $GetHistory->activity;
				$activity1 = explode(',', $activity);
				$left = $activity1[1] - 26;
				if ($left > 0) {
					$myleft = $left;
				} else {
					$myleft = 0;
				}
				$data['left'] = $myleft;

				$da = $floor_plan_drop_point[1] / 2;
				$top = $activity1[0] - $da + 100;
				if ($top > 0) {
					$mytop = $top;
				} else {
					$mytop = 0;
				}
				$data['top'] = $mytop;
			}
		}

		$data['title'] = "POSTS";


		$type1 = array("ONLINE REG REQUIRED", "ONSITE REG REQUIRED", "HYBRID REG REQUIRED", "ONLINE NO REG REQURIED", "ONSITE NO REG REQURIED", "HYBRID NO REG REQURIED");
		if (in_array($project_type, $type1)) {
			$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS");
		}


		$type1 = array("VIRTUAL SHOP REG REQUIRED", "VIRTUAL SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VIRTUAL SHOP OWNER", "VIRTUAL SHOP REP");
		}



		$type1 = array("SHOP REG REQUIRED", "SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("SHOP OWNER", "SHOP REP");
		}




		$type1 = array("VENUE REG REQUIRED", "VENUE NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VENUE OWNER", "VENUE REP");
		}


		$type1 = array("PROPERTY REG REQUIRED", "PROPERTY NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("PROPERTY OWNER", "PROPERTY AGENT");
		}





		$type1 = array("DEMO REG REQUIRED", "DEMO NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS", "DELEGATE", "PROPERTY OWNER", "PROPERTY AGENT", "PROPERTY VIEWER", "VENUE OWNER", "VENUE REP", "VISITOR", "SHOP OWNER", "SHOP REP", "SHOPPER");
		}
		// print_r($where_in);
		// die; 
		$data['sellers'] = $this->Guest_model->FetchAllDataAsSellers($project, $where_in);
		//$data['sellers'] = $this->common->allonline();
		$data['guesttypes'] = $where_in;
		$data['AllonlineDropdown'] = $where_in;
		//echo "<pre>";
		//print_r($data); exit;
		if (!empty($this->session->userdata('loggedin')) && $this->session->userdata('loggedin') != '' && $this->session->userdata('loggedin') != 'api.user.login.invalid_credentials_email_username') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $this->session->userdata('token'),
					"Content-Type: application/json"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$team_data = json_decode($response);
//		print_r($team_data);die;

			$curl = curl_init();
			
	// added on 14-Feb
			if (!empty($team_data->id != 'api.context.session_expired.app_error' )) {
			
				curl_setopt_array($curl, array(
					CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams/" . $team_data[0]->id . "/channels",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer " . $this->session->userdata('token'),
						"Content-Type: application/json"
					),
				)
				);

			$response = curl_exec($curl);

			curl_close($curl);
			$data['allgroups'] = json_decode($response);
			}
			else {
				$data['allgroups'] = '';
			}
			
// end added on 14- Feb
			
		} else {
			$data['allgroups'] = '';
		}
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);
		$data['userdetails']=$userdetails;
		$data['user_table_check']=$user_table_check;
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('post_front/post_front', $data);
		$this->load->view('include/footer');
	}

	function AllSellers()
	{
		$project = $_POST['project_id'];
		//print_r($project);die;
		$project_name = $this->p_model->getProjectNamebyProjectId($project);

		$data['project_name'] = $project_name->project_name;
		$project_type = $project_name->project_type;
		$type1 = array("ONLINE REG REQUIRED", "ONSITE REG REQUIRED", "HYBRID REG REQUIRED", "ONLINE NO REG REQURIED", "ONSITE NO REG REQURIED", "HYBRID NO REG REQURIED");
		if (in_array($project_type, $type1)) {
			$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS");
		}


		$type1 = array("VIRTUAL SHOP REG REQUIRED", "VIRTUAL SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VIRTUAL SHOP OWNER", "VIRTUAL SHOP REP");
		}



		$type1 = array("SHOP REG REQUIRED", "SHOP NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("SHOP OWNER", "SHOP REP");
		}




		$type1 = array("VENUE REG REQUIRED", "VENUE NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("VENUE OWNER", "VENUE REP");
		}


		$type1 = array("PROPERTY REG REQUIRED", "PROPERTY NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			$where_in = array("PROPERTY OWNER", "PROPERTY AGENT");
		}





		$type1 = array("DEMO REG REQUIRED", "DEMO NO REG REQUIRED");
		if (in_array($project_type, $type1)) {
			//$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS", "DELEGATE", "PROPERTY OWNER", "PROPERTY AGENT", "PROPERTY VIEWER", "VENUE OWNER", "VENUE REP", "VISITOR", "SHOP OWNER", "SHOP REP", "SHOPPER");
			$where_in = array("BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS");

		}

		$sellers = $this->Guest_model->FetchAllDataAsSellers($project, $where_in);
		$data = '';
		// if ($userdetails->chat_enable == 0) {
		// echo '<div>CHAT FUNCTION HAS BEEN DISABLED.</div>';
		// } else {
		$logged_in = $this->session->userdata('loggedin');
		$tempArray = [];
		$last_post_edit = '';
		//print_r($sellers);
		foreach ($sellers as $mydata) {
			$ID = $mydata['mm_id'] . '__' . $logged_in;
			$res_msg_count = getUsersNotification($ID);

			if (empty($last_post_edit)) {
				array_push($tempArray, $mydata);
				$last_post_edit = $res_msg_count['last_post'];
			} elseif ($res_msg_count['last_post'] > $last_post_edit) {
				array_unshift($tempArray, $mydata);
				$last_post_edit = $res_msg_count['last_post'];
			} else {
				array_push($tempArray, $mydata);
			}
		}
		$project_id = $_POST['project_id'];
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);
		if ($userdetails->chat_enable != 0 || !empty($user_table_check)) {
			foreach ($tempArray as $seller) {
				$res_msg_count = getUsersNotification($ID);
				// print_r($seller);die;


				//print_r($res_msg_count['count']->msg_count);die;
				$data .= '<div class="nearme-box clearfix rowguest Post_frontr_reapetguest-sellers" data-guest-type="' . $seller['guest_type'] . '" data-val="' . $seller['mm_username'] . '" data-last-post="' . $res_msg_count['last_post'] . '">';

				if (!empty($seller['avatar'])) {
					$data .= '<img src="' . base_url() . 'assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $seller['avatar'] . '" />';
				} else {
					if ($seller['gender'] == 'Male' || 'MALE' || 'male') {
						$data .= '<img src="' . base_url() . 'assets/images/GUEST_MALE.png"/>';
					} else {
						$data .= '<i class="far fa-user-circle" aria-hidden="true"></i>';
					}
				}
				$data .= '<div class="nearme-detail">
					<p>' . $seller['guest_type'] . ', ' . $seller['salutation'] . ' ' . $seller['first_name'] . ' ' . $seller['last_name'] . ', ' . $seller['company'] . '</p>
					</div>';
				if ($res_msg_count['count']->status_code != '404' && $res_msg_count['count']->msg_count > 0) {
					$data .= '<div class="notification" id="notifi_count">
					<span class="msg_count">' . $res_msg_count['count']->msg_count . '</span>
						</div>';
				}
				$data .= '</div>';
			}
			$data .= '<script>
				$(".Post_frontr_reapetguest-sellers").click(function() {
					
					var username = $(this).attr("data-val");
						
					$.ajax({
						url:"' . base_url() . '/chat_box/createChannel",
						method: "post",
						data: {username:username},
						success: function(response){
							console.log(response);
						}
					 
					});
					  $.fancybox.open({
						maxWidth  : 800,
						fitToView : true,
						width     : "100%", 
						height    : "auto",
						autoSize  : true,
						type        : "ajax",
						src         : "' . base_url() . 'chat/testchat",
						ajax: { 
						   settings: { data : "username="+username, type : "POST" } 
						},
						touch: false,
						
					});
				})
				</script>';
		} else {
			if (!$this->ion_auth->logged_in()) {
				$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
		}
		echo $data;
		//}

	}


	function GetNearMeUsers()
	{
		$project_id = $_POST['project_id'];
		$floor_id = $_POST['floor_id'];
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);    # for getting the data for the chat enable and disable
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'),$project_id);  #for getting the data in case of no registration required of project for the users.

		if($userdetails->chat_enable != 0 || !empty($user_table_check)){
			$userid = $this->session->userdata('user_id');
			$nearme = $this->Places_model->GetMyLocationByUserId($userid,$project_id,$floor_id);
			$floor = $this->Places_model->GetFloordataByFloorId($floor_id);
			if ($nearme != false) {
				$each_square=$floor->each_square;

				$MyCurrentX = $nearme->top - 210;   # 210 is subtracted due to the container size so that the size cames correct.
				$MyCurrentY = $nearme->left;



				$MinCurrentX = $MyCurrentX - (231*$each_square);
				$MinCurrentY = $MyCurrentY - (240*$each_square);

				$MaxCurrentX = $MyCurrentX + (231*$each_square);
				$MaxCurrentY = $MyCurrentY + (240*$each_square);
				$project_id = $_POST['project_id'];
				$floor_id = $_POST['floor_id'];

				$AllUsersGuest = $this->Places_model->GetNearMeAllUsers($project_id, $floor_id);

				$data = '';
				$logged_in = $this->session->userdata('loggedin');
				$tempArray = [];
				$last_post_edit = '';
				foreach ($AllUsersGuest as $mydata) {
					$user2x = $mydata->top - 210;  # 210 is subtracted due to the container size so that the size cames correct.
					$user2y = $mydata->left;

					//if(($user2x>=$MinCurrentX && $user2x <=$MaxCurrentX) && ($user2y>=$MinCurrenty && $user2y <=$MaxCurrentY)){
					if (in_array($user2x, range($MinCurrentX, $MaxCurrentX)) && in_array($user2y, range($MinCurrentY, $MaxCurrentY))) {
						$ID = $mydata->mm_id . '__' . $logged_in;
						// Function for notification count starts here
	
						$res_msg_count = getUsersNotification($ID);
						if (empty($last_post_edit)) {
							array_push($tempArray, $mydata);
							$last_post_edit = $res_msg_count['last_post'];
						} elseif ($res_msg_count['last_post'] > $last_post_edit) {
							array_unshift($tempArray, $mydata);
							$last_post_edit = $res_msg_count['last_post'];
						} else {
							array_push($tempArray, $mydata);
						}
					}
					// Function for notification count ends here
				}
				foreach ($tempArray as $mydata) {
					$ID = $mydata->mm_id . '__' . $logged_in;
					// Function for notification count starts here

					$res_msg_count = getUsersNotification($ID);
					if (!empty($mydata->myavatar)) {
						$img = '
						<img src="' . base_url() . 'assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $mydata->myavatar . '" />';
					} else {
						if ($mydata->gender == 'Male' || 'MALE' || 'male') {
							$img = '<img src="' . base_url() . 'assets/images/GUEST_MALE.png"/>';
						} else {
							$img = '<i class="far fa-user-circle" aria-hidden="true"></i>';
						}

					}
					if(!empty($mydata->guest_type)){
						$guest_type = $mydata->guest_type;
					}
					else{
						$guest_type = 'GUEST';
					}
					$data .= '<div class="nearme-box clearfix rowguest1 nearme-chat" data-unread-msg="' . $res_msg_count['count']->msg_count . '"  data-guest-gender="' . $mydata->gender . '" data-guest-type="' . $mydata->guest_type . '"  data-val="' . $mydata->mm_username . '">
					<div class="chatbox_img">
					' . $img . ' 
					<div class="nearme-detail">
					<p>' . $guest_type . ', ' . $mydata->salutation . ' ' . $mydata->first_name . ' ' . $mydata->last_name . ', ' . $mydata->company . '</p>
					</div>';

					if ($res_msg_count['count']->status_code != '404' && $res_msg_count['count']->msg_count > 0) {
						$data .= '<div class="notification" id="notifi_count">
					<span class="msg_count">' . $res_msg_count['count']->msg_count . '</span></div>';

					}
					$data .= '</div>
					</div>';
				}
				$data .= '

					
				<script>
				$(".nearme-chat").click(function(){
					var username = $(this).attr("data-val");
					$.fancybox.open({
					maxWidth  : 800,
					fitToView : true,
					width     : "100%", 
					height    : "auto",
					autoSize  : true,
					type        : "ajax",
					src         : "' . base_url() . 'chat/testchat",
					ajax: { 
						settings: { data : "username="+username, type : "POST" } 
					},
					touch: false,
					
				});
				
				var username = $(this).attr("data-val");
				$.ajax({
					url:"' . base_url() . '/chat_box/createChannel",
					method: "post",
					data: {username:username},
					success: function(response){
						console.log(response);
					}
					
				});
			})
				</script>
				';
			}

		}
		else{
			if (!$this->ion_auth->logged_in()) {
				$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
			//$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
		}
		echo $data;
	}
}

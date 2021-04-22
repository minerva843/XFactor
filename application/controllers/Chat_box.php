<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Chat_box extends CI_Controller
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
		$this->load->model('guest_model');
		$this->load->model('group_model');
		$this->load->model('Audio_model');
		$this->load->model('Ondemand_model');
		$this->load->model('Program_model');
		$this->load->model('Video_model');
		$this->load->model('Places_model');
		$this->load->model('ProgramFront_model', 'p_model');
		$this->load->library('email');
		$this->load->library('session');
		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			//redirect('auth/login', 'refresh');
		}
	}

	public function getusername($userID)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL . "users/" . $userID,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $this->session->userdata("token"),
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$res = json_decode($response);
		return $res->username;
	}

	public function index($project = 0, $floor = 0)
	{
		// echo $today=strtotime(date('Y-m-d'));
		// date("Y-m-d", '1605614486');
		// die;
		//print_r($this->session->userdata("token"));
		//$Jsonchannel = $this->createChannel();
		//$channel = json_decode($Jsonchannel);
		//$msg = $this->sendMessage($channel->{'id'});
		//print_r($msg);die;

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
						$check = $this->Places_model->FetchProjectTypeId($project);
						$project_type = $check->project_type;
						if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

							// if (!$this->ion_auth->logged_in())
							// {
							// redirect('auth/login', 'refresh');
							// }
							$user_id = $this->session->userdata('user_id');
							if (!empty($user_id)) {

								$No_registerUser = $this->Places_model->checkNo_registerUser($user_id, $project);

								if ($No_registerUser == false) {

									$projectdata = $this->project_model->FetchSecDataById($project);
									$data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
									$data['No_registerUser_condition'] = true;
								} else {

									$data['No_registerUser'] = '';
								}
							}
						} else {

							if ($this->ion_auth->logged_in()) {

								$data['No_registerUser_condition'] = true;
							} else {
								$data['No_registerUser'] = '';
							}
						}
					}
				}
			} else {

				if (!$this->ion_auth->logged_in()) {
					$data['No_registerUser_condition'] = true;
				}
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
		if ($project !== 0) {
			$data['posts'] = $this->Places_model->FetchPostsById($project);
		}


		if ($project != 0 && empty($data['No_registerUser'])) {
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
		$data['floor'] = $id;
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
		if ($project !== 0) {
			$data['allonline'] = $this->common->allonline($project);
		}

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
			$data['allgroup'] = $this->group_model->get_chat_groups();
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


		$data['AllonlineDropdown'] = $where_in;
		$data_header['title'] = "CHAT";
		$this->load->view('include/header', $data_header);
		$this->load->view('include/menu');
		$this->load->view('chat_box/chat_box', $data);
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
						$check = $this->Places_model->FetchProjectTypeId($project);
						$project_type = $check->project_type;
						if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

							// if (!$this->ion_auth->logged_in())
							// {
							// redirect('auth/login', 'refresh');
							// }
							$user_id = $this->session->userdata('user_id');
							if (!empty($user_id)) {

								$No_registerUser = $this->Places_model->checkNo_registerUser($user_id, $project);

								if ($No_registerUser == false) {

									$projectdata = $this->project_model->FetchSecDataById($project);
									$data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
									$data['No_registerUser_condition'] = true;
								} else {

									$data['No_registerUser'] = '';
								}
							}
						} else {

							if ($this->ion_auth->logged_in()) {

								$data['No_registerUser_condition'] = true;
							} else {
								$data['No_registerUser'] = '';
							}
						}
					}
				}
			} else {

				if (!$this->ion_auth->logged_in()) {
					$data['No_registerUser_condition'] = true;
				}
			}
			//print_r($this->session->userdata('user_id'));


		} else {
			$data['No_registerUser_condition'] = true;
		}
		//$data['userdetails'] = $this->common->userdetails($this->session->userdata('user_id'),$project);
		$data['userdetails'] = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project);
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
		if ($project !== 0) {
			$data['posts'] = $this->Places_model->FetchPostsById($project);
		}


		if ($project != 0 && empty($data['No_registerUser'])) {
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
		$data['floor'] = $id;
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
		if ($project !== 0) {
			$data['allonline'] = $this->common->allonline($project);
		}
		$data_header['title'] = "CHAT";
		$this->load->view('include/header', $data_header);
		$this->load->view('include/menu');
		//print_r($this->session->userdata('loggedin'));
		// print_r($project);die;
		$data['guest'] = $this->guest_model->FetchDataByUserIdProjectId($this->session->userdata('user_id'), $project);
		// print_r($data['guest']);die;
		//echo 'chat_box session',$this->session->userdata('token');
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
			//print_r($response);die;
			curl_close($curl);
			$team_data = json_decode($response);
			//print_r($team_data);die;

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

//			curl_close($curl);								//commented on 14-Feb
//			$data['allgroups'] = json_decode($response);	//commented on 14-Feb


			//print_r($this->session->userdata('user_id'));die;
			//print_r($project);die;
			// print_r($this->session->userdata('user_id'));
			// print_r($project);
			$data['guest'] = $this->guest_model->FetchDataByUserIdProjectId($this->session->userdata('user_id'), $project);

			// print_r('=====================');
			// print_r($this->session->userdata('user_id'));
			// print_r($project);die;
			// print_r($data['guest']);
			//print_r($this->session->userdata('user_id'));die;
			// print_r($data['guest']->id);


			//print_r($data['allgroup']);die;
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
			$where_in = array("ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOTH PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS", "DELEGATE", "PROPERTY OWNER", "PROPERTY AGENT", "PROPERTY VIEWER", "VENUE OWNER", "VENUE REP", "VISITOR", "SHOP OWNER", "SHOP REP", "SHOPPER");
		}


		$data['AllonlineDropdown'] = $where_in;
		//print_r($data['allgroup']);die;

		//print_r($data['userdetails']);die;

		$this->load->view('chat_box/chat_box', $data);
		//$this->load->view('include/virtual_view_menu');
		$this->load->view('include/footer');
	}


	public function createChannel()
	{
		$this->session->unset_userdata('channelID');
		//print_r($this->input->post('username'));die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL . "users/username/" . $this->input->post('username'),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $this->session->userdata("token"),
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);

		//print_r('hi');
		//print_r($response);die;
		curl_close($curl);
		$partnerUserId =  json_decode($response);
		$this->session->set_userdata("partnerloggedin", $this->input->post('username'));
		//print_r($this->session->userdata("partnerloggedin"));die;
		$curl = curl_init();
		$param = array($this->session->userdata("loggedin"), $partnerUserId->id);
		//print_r($param);die;
		//$param = array('h4z7gwsyc7gffjto98bzphksdy','wnz6prhzp7fkjdypmheh8ufsoh');
		//print_r(json_encode($param));die;
		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL . "channels/direct",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($param),
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $this->session->userdata("token"),
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$channel = json_decode($response);
		$this->session->set_userdata('channelID', $channel->id);
		//print_r($this->session->userdata('channelID'));
		echo $channel->id;
		die;
	}

	public function grpChatMsg()
	{


		$this->session->set_userdata('channelID', $this->input->post('grpID'));
	}

	public function attachImg()
	{
		if($_FILES) {
			echo $_FILES;die;
		}
	}
	
	public function sendMessage()
	{
		//print_r($_FILES);die;
		$this->sendTextMessage($this->input->post('msg'),$_FILES);
		//echo $att;die;
	}

	public function sendTextMessage($msg,$files)
	{
		$channelID = $this->session->userdata('channelID');
		//print_r($this->session->userdata('channelID'));echo '<br/>';
		//print_r($channelID);echo '<br/>';print_r($this->session->userdata("token"));die;
		if($msg)
		{
			$curl = curl_init();
			$param = array('channel_id' => $channelID, 'message' => $msg);
			//print_r($param);die;
			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "posts",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($param),
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $this->session->userdata("token"),
					"Content-Type: application/json"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			//echo $response;
			$final = json_decode($response);
			$this->session->set_userdata('newMsg', $final->id);
			$epoch = $final->create_at;
			$seconds = $epoch / 1000;
			$dt_date = date("d M Y", $seconds);  // convert UNIX timestamp to PHP DateTime
			$dt_time = date("H:i:s", $seconds);
			$username = getdbusername($final->user_id);
			$html .= '<div class="date-main"><div class="date">' . $dt_date . '</div></div>';
			$html .= '<div class="left" style="width:100%;float:left">';
			$html .= '<h2 style="text-align:right;">' . strtoupper($username) . '<br></h2>';
			$html .= '<p class="chat_user_msg" style="text-align:right; font-size:18px;">' . $final->message . '</p><br>';
			$html .= '<p class="chat_user_time">' .$dt_time. '<p>'; 
			echo $html;
		}
		
		if($files) {
			
			$uploadurl= './assets/mattermost/';
			$config = array(
				'upload_path' => $uploadurl,
				'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG|pdf|PDF|mp4|MP4|mp3|MP3",
				'overwrite' => TRUE,
				'max_size' => 0, 
				'max_height' => 0,
				'max_width' => 0,
				'encrypt_name' => FALSE,
			);
			$this->upload->initialize($config);
			$this->load->library('upload', $config); 
			if($this->upload->do_upload('myfile'))
			{
				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL => MMURL . "files?channel_id=".$channelID,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => array('files' => new CURLFILE($uploadurl.str_replace(' ', '_', $files['myfile']['name']))),
					CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer " . $this->session->userdata("token"),
						"Content-Type: multipart/form-data"
					),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				//$res = $response;
				//echo 'API RESPONSE - ' .$res;
				
				$ress = json_decode($response);
				//print_r($ress->{'file_infos'}[0]->id);
				$curl = curl_init();
				$param = array('channel_id' => $channelID, 'message' => $msg, 'file_ids' => array($ress->{'file_infos'}[0]->id));
				
				curl_setopt_array($curl, array(
					CURLOPT_URL => MMURL . "posts",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($param),
					CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer " . $this->session->userdata("token"),
						"Content-Type: application/json"
					),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$final = json_decode($response);
				
				
				$epoch = $final->create_at;
				$seconds = $epoch / 1000;
				$dt_date = date("d M Y", $seconds);  // convert UNIX timestamp to PHP DateTime
				$dt_time = date("H:i:s", $seconds);
				$username = getdbusername($final->user_id);
				$html .= '<div class="date-main"><div class="date">' . $dt_date . '</div></div>';
				$html .= '<div class="left" style="width:100%;float:left">';
				$html .= '<h2 style="text-align:right;">' . strtoupper($username) . '<br></h2>';
			if(!empty($final->message)) {
					$html .= '<p class="chat_user_msg" style="text-align:right; font-size:18px;">' . $final->message . '</p><br>';
				}
				if(!empty($final->metadata->files)){
					$curl = curl_init();

					curl_setopt_array($curl, array(
						CURLOPT_URL => MMURL."files/".$final->metadata->files[0]->id."/link",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer " . $this->session->userdata("token"),
						"Content-Type: application/json"
						),
						));

					$response = curl_exec($curl);

					curl_close($curl);
					//echo $response;
					//echo $CI->session->userdata("token");echo '------';
					//echo $CI->session->userdata('channelID');
					$link = json_decode($response);
					$ext = $final->metadata->files[0]->extension;
					if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG')
					{
						$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="100px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
					}
					else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
					{
						$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.base_url('assets/images/icon/'.strtolower($final->metadata->files[0]->extension).'.png').'"  width="100px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
					}
					else
					{
						$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="100px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
					}
					$html .= '<p class="chat_file_name" style="text-align:right;">' .$final->metadata->files[0]->name. '<p>';
				}
				$html .= '<p class="chat_user_time">' .$dt_time. '<p>'; 
				$html .= '<script>$("#chat_msg").animate({scrollTop: parseInt($("#chat_msg")[0].scrollHeight)}, 1000);</script>'; 
				echo $html;
				
				
				$filename = $uploadurl.$files['myfile']['name'];
				/*if (file_exists($filename)) {
					unlink($filename);
					echo 'File '.$filename.' has been deleted';die;
				  } else {
					echo 'Could not delete '.$filename.', file does not exist';die;
				  }*/
			}
			else{
				echo 'FILE NOT UPLOADED';die;
			}
		
		}
		die;
	}

	public function attachFile()
	{
		
		//print_r($_FILES);
		
		if($_FILES) {
			
		$uploadurl= './assets/mattermost/';
		$config = array(
			'upload_path' => $uploadurl,
			'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
			'overwrite' => TRUE,
			'max_size' => 0, 
			'max_height' => 0,
			'max_width' => 0,
			'encrypt_name' => FALSE,
		);
		$this->upload->initialize($config);
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('project_header_visual'))
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "files?channel_id=cbp17m7nz3gbmbya4u4ah15ony",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => array('files' => new CURLFILE('/var/www/html/XFactor/assets/mattermost/'.$_FILES['project_header_visual']['name'])),
				CURLOPT_HTTPHEADER => array(
					"Authorization: Bearer " . $this->session->userdata("token"),
					"Content-Type: multipart/form-data"
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo 'API RESPONSE - ' . $response;
			$filename = '/var/www/html/XFactor/assets/mattermost/'.$_FILES['project_header_visual']['name'];
			if (file_exists($filename)) {
				unlink($filename);
				echo 'File '.$filename.' has been deleted';die;
			  } else {
				echo 'Could not delete '.$filename.', file does not exist';die;
			  }
		}
		else{
			echo 'FILE NOT UPLOADED';die;
		}
		
		}
		$this->load->view('include/header', $data);
		//$this->load->view('include/menu');
		$this->load->view('chat_box/attachFile');
		$this->load->view('include/footer');
	}

	function selectAGroup()
	{
		$group_id = $_POST['group'];
		$data = $this->project_model->FetchProjectById($group_id);
		$_SESSION['SingleGroupId'] = $group_id;
		$_SESSION['GroupData'] = $data;
		$output .= '<option value="">SELECT A PROJECT TO CONFIGURE</option>';
		$selectpro = '';
		foreach ($data as $val) {
			$output .= '<option value=' . $val->project_id . '>' . $val->project_name . ' </option>';
		}
		$_SESSION['output'] = $output;
		echo $output;
	}



	public function python_chat()
	{
		$data['title'] = "Chat";

		$this->load->view('python_chat/python_chat', $data);
	}

	function home2()
	{
		$data['title'] = "Virtual Home Page";
		$this->load->view('include/header', $data);
		$this->load->view('include/menu');
		$this->load->view('homepage/virtual_view');
		$this->load->view('include/footer');
	}


	function userHome()
	{

		$data['title'] = "Virtual Home Page";
		$this->load->view('include/header', $data);
		//$this->load->view('include/menu');
		$this->load->view('frontend/user_home');
		$this->load->view('include/footer');
	}




	function allonline()
	{

		$project = $_POST['project_id'];
		$users_guest = $this->common->allonlineUsers($project);
		$noreguserData = $this->common->allonlineUsersNoRegReq($project);
		$users = array_merge($users_guest,$noreguserData);			
		if ($users != false) {

			$data = '';
			$logged_in = $this->session->userdata('loggedin');
			$tempArray = [];
			$last_post_edit = '';
			foreach ($users as $mydata) {


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

			$project_id = $_POST['project_id'];
			$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
			$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);			

			if ($userdetails->chat_enable != 0 || !empty($user_table_check)) {
				foreach ($tempArray as $mydata) {
					if (!empty($mydata->avatar)) {
						$img = '
						<img src="' . base_url() . 'assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $mydata->avatar . '" />';
					} else {
						if ($mydata->gender == 'Male' || 'MALE' || 'male') {
							$img = '<img src="' . base_url() . 'assets/images/GUEST_MALE.png"/>';
						} else {
							$img = '<i class="far fa-user-circle" aria-hidden="true"></i>';
						}
					}

					$ID = $mydata->mm_id . '__' . $logged_in;

					// Function for notification count starts here

					$res_msg_count = getUsersNotification($ID);
					if(!empty($mydata->guest_type)){
						$guest_type = $mydata->guest_type;
					}
					else{
						$guest_type = 'GUEST';
					}
					$data .= '<div class="nearme-box clearfix rowguest openChatBox onlinesearch" data-unread-msg="' . $res_msg_count['count']->msg_count . '"  data-guest-gender="' . $mydata->gender . '" data-guest-type="' . $mydata->guest_type . '"  data-val="' . $mydata->mm_username . '" data-last-post="' . $res_msg_count['last_post'] . '">
					<div class="chatbox_img">
					' . $img . ' 
					<div class="nearme-detail">
					<p>' . $guest_type. ', ' . $mydata->salutation . ' ' . $mydata->first_name . ' ' . $mydata->last_name . ', ' . $mydata->company . '</p>
					</div>';
					if ($res_msg_count['count']->status_code != '404' && $res_msg_count['count']->msg_count > 0) {
						if ($res_msg_count['count']->msg_count > 99) {
							$msg_count = '99+';
						} else {
							$msg_count = $res_msg_count['count']->msg_count;
						}
						$data .= '<div class="notification" id="notifi_count">
						<span class="msg_count">' . $msg_count . '</span>
						</div>';
					}
					$data .= '</div>
					</div>
					';
				}
			} else {
				if (!$this->ion_auth->logged_in()) {
				$data .= '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data .= '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
			}


			$data .= '<script>
					$(".openChatBox").click(function(){
						
						var username = $(this).attr("data-val");
						
					$.ajax({
						url:"' . base_url() . 'chat_box/createChannel",
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
		}else{
			if (!$this->ion_auth->logged_in()) {
				$data .= '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data .= '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
		}
		echo $data;
	}


	function chatGroup()
	{
		$userID = $this->input->post('userID');
		$project_id = $_POST['project_id'];
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$data['allgroup'] = $this->group_model->get_chat_groups($userdetails->id);
		$html = '';
		//print_r($data['allgroup']);die;
		if (!empty($userdetails)) {
			if ($userdetails->chat_enable != 0) {
				if(!empty($data['allgroup'])){
					foreach ($data['allgroup'] as $group) {
						//if($group->type != 'D' && $group->display_name != 'Town Square' && $group->display_name != 'Off-Topic') {
	
						$html .= '<div class="nearme-box clearfix openSellerChatBox groupsearchlist" data-val="' . $group->mm_group_id . '">';
	
	
						if ($group->mm_group_id) { 
							$notification = getGroupNotification($group->mm_group_id);
						};
	
						if ($group->chat_image) {
							$html .= '<img src="' . base_url() . 'assets/group_chat_images/' . $group->chat_image . '">';
						} else {
							$html .= '<img src="' . base_url() . 'assets/images/chat/GROUP_CHAT_DEFAULT_IMAGE.png"/>';
							
						}
						$html .= '<div class="nearme-detail">';
						$html .= '<p>' . $group->group_chat_name . '</p>';
						$html .= '</div>';
						if ($notification->status_code != '404' && $notification->msg_count > 0) {
							if ($notification->msg_count > 99) {
								$msg_count = '99+';
							} else {
								$msg_count = $notification->msg_count;
							}
							$html .= '<div class="notification" id="notifi_count">';
							$html .= '<span class="msg_count">' . $msg_count . '</span>';
							$html .= '</div>';
						}
	
						$html .= '</div>';
					}
				}
				else{
					$html .= '<div class="fron-postion"><p class="gsm-pd">THERE IS NO GROUP CHAT CURRENTLY.</p></div>';
				}

			} else {
				$html .= '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
		} else {
			$html .= '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE INVITED BY THE PLACE OWNER TO BE ABLE TO USE THIS FEATURE.</p></div>';
		}

/****************Uncomment by Ritika due to not opening popup********************/
		 $html .= '<script>$(".openSellerChatBox").click(function() {
		 	var grpID = $(this).attr("data-val");
console.log(grpID);
		 	$.fancybox.open({
				maxWidth: 800,
		 		fitToView: true,
		 		width: "100%",
				height: "auto",
		 		autoSize: true,
		 		type: "ajax", 
		 		src: "' . base_url() . 'chat/testchat2",
		 		ajax: {
		 			settings: {
		 				data: "username=" + grpID,
		 				type: "POST"
					}
				},
				touch: false,

		 	}); 

			var grpID = $(this).attr("data-val");
		 	$.ajax({
		 		url: "' . base_url('/chat_box/grpChatMsg') . '", 
		 		method: "post",
		 		data: {
		 			grpID: grpID
		 		},
				success: function(response) {
					console.log(response);
		 		}

		});


		 });</script>';

		echo $html;
		die;
	}


	function PastChats()
	{
		
		$project_id = $_POST['project_id'];
		$module = $_POST['module'];
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);    # for getting the data for the chat enable and disable
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'),$project_id);  #for getting the data in case of no registration required of project for the users.
		if (!empty($this->session->userdata('loggedin')) && $this->session->userdata('loggedin') != '' && $this->session->userdata('loggedin') != 'api.user.login.invalid_credentials_email_username') {
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "users/" . $this->session->userdata('loggedin') . "/teams/" . TEAMID . "/channels",
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
			$allgroups1 = json_decode($response);
			if($allgroups1->message = 'No channels were found'){
				$allgroups = '';
			}else{
				$allgroups = $allgroups1;
			}
			$data = '';
//print_r($allgroups1);die;
// commented on 13-Mar no use of function
//			$noreguserData = $this->common->getChatUsersInfoByProjectUser($this->session->userdata('user_id'), $project_id);
	
			
			 
			if($userdetails->chat_enable != 0 || !empty($user_table_check)){
	
				foreach ($allgroups as $group) {
					//print_r($group); print_r(',');
					if ($group->display_name != 'Town Square' && $group->display_name != 'Off-Topic') {

						if ($group->type == 'D') {
							$logged_in = $this->session->userdata('loggedin');
							
							
							$uu = str_replace($logged_in, "", $group->name);
							
							$username = getusername(str_replace("_", "", $uu));
							
							// print_r(str_replace("_", "", $uu));die;
							// $dbusername1 = getdbusername(str_replace("_", "", $uu));
							// if(!empty($dbusername1)){
							// 	//print('if part');
							// 	//print_r($uu);
							// 	$dbusername = $dbusername1; 
							// }
							// else{
							// 	$dbusername = $this->common->getxfchatusername(str_replace("_", "", $uu));
							// }
							//print_r($dbusername);
							if ($username != 'surveybot') {
							//	print_r($uu);
							
								$user = getfulldetail(str_replace("_", "", $uu)); 
								
								
// commented on 13-Mar	as no use of it
//								$getUserAvatar = GuestDetails($user->id);
								
								$getmmuserdetails = getMMUserDetailsByUsername($username);
								
							//	 
							//	print_r($user);print_r('----');
								// print_r($user->mm_id);die;
								
								if ($getmmuserdetails->first_name == $project_id) {
									
								//	print_r($getmmuserdetails);die;
								
									if ($user->mm_id) {
								//		print_r($user->mm_id);die;
										$ID = $user->mm_id . '__' . $logged_in;

										// Function for notification count starts here

										$res_msg_count = getUsersNotification($ID);

										$data .= '<div class="nearme-box clearfix Post_frontr_reapetguest openChatBox pastsearchlist" data-val="' . $username . '" data-guest-type="' . $user->guest_type .'">';
										if ($user->avatar) {
											$data .= '<img src="' . base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $user->avatar) . '" />';
										} else {
											if (strtolower($user->gender) == "male") {
												$data .= '<img src="' . base_url('assets/images/GUEST_MALE.png') . '" />';
											} else {
												$data .= '<i class="far fa-user-circle" aria-hidden="true"></i>';
											}
										}

										$data .= '<div class="nearme-detail">';
										if(!empty($user->guest_type)){
											$guest_type = $user->guest_type;
										}
										else{
											$guest_type = 'GUEST';
										}
										if (empty($user->first_name)) {
											$data .= '<p>' . $dbusername . '</p>';
										} else {
											$data .= '<p>' . $guest_type . ', ' . $user->salutation . ' ' . $user->first_name . ' ' . $user->last_name . ', ' . $user->company . '</p>';
										}
										$data .= '</div>';
										if ($res_msg_count['count']->status_code != '404' && $res_msg_count['count']->msg_count > 0) {
											if ($res_msg_count['count']->msg_count > 99) {
												$msg_count = '99+';
											} else {
												$msg_count = $res_msg_count['count']->msg_count;
											}
											$data .= '<div class="notification" id="notifi_count">
											<span class="msg_count">' . $msg_count . '</span>
											</div>';
										}

										$data .= '</div>';
									}
								}
							}
						} else {
							
							if($module == 'chat') {
							if ($group->id) {
								$notification = getGroupNotification($group->id);
							};
							$group->chat_image = getGroupChat($group->id);
							$data .= '<div class="nearme-box clearfix openSellerChatBox" data-val="' . $group->id . '">';
							if ($group->chat_image) {
								$data .= '<img src="' . base_url() . 'assets/group_chat_images/' . $group->chat_image . '">';
							} else {
								$data .= '<img src="' . base_url() . 'assets/images/chat/GROUP_CHAT_DEFAULT_IMAGE.png">';
							}
							$data .= '<div class="nearme-detail">
								<p>' . $group->display_name . '</p> 
							</div>';
							if ($notification->status_code != '404' && $notification->msg_count > 0) {
								if ($notification->msg_count > 99) {
									$msg_count = '99+';
								} else {
									$msg_count = $notification->msg_count;
								}
								$data .= '<div class="notification" id="notifi_count">';
								$data .= '<span class="msg_count">' . $msg_count . '</span>';
								$data .= '</div>';
							}
							$data .= '</div>';
							}
						}
					}
				}
				if(!empty($_POST["workshop"])){
						$data .= '<script>
						$(".Post_frontr_reapetguest").click(function(){
							
							var username = $(this).attr("data-val");
							
						$.ajax({
							url:"' . base_url() . 'chat_box/createChannel",
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
						$data .= '<script>$(".openSellerChatBox").click(function() {
							var grpID = $(this).attr("data-val");
				
							$.fancybox.open({
								maxWidth: 800,
								fitToView: true,
								width: "100%",
								height: "auto",
								autoSize: true,
								type: "ajax",
								src: "' . base_url() . 'chat/testchat2",
								ajax: {
									settings: {
										data: "username=" + grpID,
										type: "POST"
									}
								},
								touch: false,
				
							});
				
							var grpID = $(this).attr("data-val");
							$.ajax({
								url: "' . base_url('/chat_box/grpChatMsg') . '",
								method: "post",
								data: {
									grpID: ' . grpID . '
								},
								success: function(response) {
									console.log(response);
								}
				
							});
				
				
						});</script>';
				}else{
					$data .= '<script>
						$(".Post_frontr_reapetguest").click(function(){
							
							var username = $(this).attr("data-val");
							
						$.ajax({
							url:"' . base_url() . 'chat_box/createChannel",
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
						$data .= '<script>$(".openSellerChatBox").click(function() {
							var grpID = $(this).attr("data-val");
				
							$.fancybox.open({
								maxWidth: 800,
								fitToView: true,
								width: "100%",
								height: "auto",
								autoSize: true,
								type: "ajax",
								src: "' . base_url() . 'chat/testchat2",
								ajax: {
									settings: {
										data: "username="+grpID,
										type: "POST"
									}
								},
								touch: false,
				
							});
				
							var grpID = $(this).attr("data-val");
							$.ajax({
								url: "' . base_url('/chat_box/grpChatMsg') . '",
								method: "post",
								data: {
									grpID: grpID 
								},
								success: function(response) {
									console.log(response);
								}
				
							});
				
				
						});</script>';
				}
				

				
			}
			else{
				if (!$this->ion_auth->logged_in()) {
					$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
				} else {
					$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
				}
			}
			
		}else{
					if (!$this->ion_auth->logged_in()) {
					$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
				} else {
					$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
				}
			}
			echo $data;
	}
}

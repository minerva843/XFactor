<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
//session_start();
class Simple_view extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->database();
        $this
            ->load
            ->library('form_validation');
        $this
            ->load
            ->model('auth_model', 'auth');
        $this
            ->load
            ->library(['ion_auth', 'form_validation']);
        $this
            ->load
            ->helper(['form', 'url']);
        $this
            ->load
            ->model('common_model', 'common');
        $this
            ->load
            ->model('zone_model');
        $this
            ->load
            ->model('content_model');
        $this
            ->load
            ->model('floor_model');
        $this
            ->load
            ->model('project_model');
        $this
            ->load
            ->model('post_model');
        $this
            ->load
            ->model('group_model');
        $this
            ->load
            ->model('Audio_model');
        $this
            ->load
            ->model('Ondemand_model');
        $this
            ->load
            ->model('Program_model');
        $this
            ->load
            ->model('Video_model');
        $this
            ->load
            ->model('Places_model');
        $this
            ->load
            ->model('guest_model');
        $this
            ->load
            ->model('ProgramFront_model', 'p_model');
        $this
            ->load
            ->model('ContentFront_model', 'c_model');
        $this
            ->load
            ->library('email'); 
        $this
            ->load
            ->library('session');
        // if (!$this->ion_auth->logged_in())
        // {
			// redirect('auth/login', 'refresh');
        // }

    }

    function index()
    {

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "Simple Home Page";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/home');
        $this
            ->load
            ->view('include/footer');
    }

    function register()
    {

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "Register";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/register');
        $this
            ->load
            ->view('include/footer');
    }

    function avatar($project = 0)
    {

        if (!empty($project)) {
            $check = $this
                ->Places_model
                ->FetchProjectTypeId($project);

            $project_type = $check->project_type;
            if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {

                    $projectdata = $this
                        ->project_model
                        ->FetchSecDataById($project);
                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                    $data['No_registerUser_condition'] = true;
                } else {
                    if (!empty($project)) {
                        $check = $this
                            ->Places_model
                            ->FetchProjectTypeId($project);
                        $project_type = $check->project_type;
                        if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                            $user_id = $this
                                ->session
                                ->userdata('user_id');
                            if (!empty($user_id)) {

                                $No_registerUser = $this
                                    ->Places_model
                                    ->checkNo_registerUser($user_id, $project);

                                if ($No_registerUser == false) {
                                    $projectdata = $this
                                        ->project_model
                                        ->FetchSecDataById($project);
                                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                                    $data['No_registerUser_condition'] = true;
                                } else {
                                    $data['No_registerUser'] = '';
                                }
                            }
                        } else {

                            $data['No_registerUser'] = '';
                        }
                    }
                }
            }
        } else {
            $data['No_registerUser_condition'] = true;
        }

        $this
            ->session
            ->set_userdata('project', $project);
        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }

        $this
            ->session
            ->set_userdata('checkdata', false);

        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;

        $data['project_id'] = $project;

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "MY AVATAR";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/avatar');
        $this
            ->load
            ->view('include/footer');
    }

    function program($project = 0)
    {

        if (!empty($project)) {
            $check = $this
                ->Places_model
                ->FetchProjectTypeId($project);

            $project_type = $check->project_type;
            if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {

                    $projectdata = $this
                        ->project_model
                        ->FetchSecDataById($project);
                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                    $data['No_registerUser_condition'] = true;
                } else {

                    if (!empty($project)) {

                        $user_id = $this
                            ->session
                            ->userdata('user_id');
                        if (!empty($user_id)) {

                            $No_registerUser = $this
                                ->Places_model
                                ->checkNo_registerUser($user_id, $project);

                            if ($No_registerUser == false) {

                                $projectdata = $this
                                    ->project_model
                                    ->FetchSecDataById($project);
                                $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                                $data['No_registerUser_condition'] = true;
                            } else {

                                $data['No_registerUser'] = '';
                            }
                        }
                    }
                }
            } else {
                $data['No_registerUser'] = '';
                $data['No_registerUser_condition'] = false;
                // if ($this->ion_auth->logged_in())
                // {
                // $data['No_registerUser_condition']=true;
                // }

            }
        } else {
            $data['No_registerUser_condition'] = true;
        }

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }

        $this
            ->session
            ->set_userdata('checkdata', false);
        $this
            ->session
            ->set_userdata('project', $project);
        if ($project > 0) {
            $data['programs'] = $this
                ->p_model
                ->FetchProjectById($project);
        }

        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;

        $data['project_id'] = $project;

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "PROGRAM";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/program');
        $this
            ->load
            ->view('include/footer');
    }

    function post($project = 0)
    {

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

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }

        $this
            ->session
            ->set_userdata('checkdata', false);
        $this
            ->session
            ->set_userdata('project', $project);

        if ($project !== 0) {
            $data['posts'] = $this
                ->Places_model
                ->FetchPostsById($project);
        }

        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;

        $data['project_id'] = $project;

        $data['selected_project_type'] = $project_type;

        $type1 = array(
            "ONLINE REG REQUIRED",
            "ONSITE REG REQUIRED",
            "HYBRID REG REQUIRED",
            "ONLINE NO REG REQURIED",
            "ONSITE NO REG REQURIED",
            "HYBRID NO REG REQURIED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "ORGANISER",
                "SPONSOR",
                "EXHIBITOR",
                "PARTNER",
                "SPEAKER",
                "PANELIST",
                "VIP",
                "CELEBRITY",
                "PERFORMER",
                "FEATURED",
                "OTHERS",
                "BOOTH ORGANISER",
                "BOOTH SPONSOR",
                "BOOTH EXHIBITOR",
                "BOOTH PARTNER",
                "BOOTH SPEAKER",
                "BOOK PANELIST",
                "BOOTH VIP",
                "BOOTH CELEBRITY",
                "BOOTH PERFORMER",
                "BOOTH FEATURED",
                "BOOTH OTHERS"
            );
        }

        $type1 = array(
            "VIRTUAL SHOP REG REQUIRED",
            "VIRTUAL SHOP NO REG REQUIRED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "VIRTUAL SHOP OWNER",
                "VIRTUAL SHOP REP"
            );
        }

        $type1 = array(
            "SHOP REG REQUIRED",
            "SHOP NO REG REQUIRED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "SHOP OWNER",
                "SHOP REP"
            );
        }

        $type1 = array(
            "VENUE REG REQUIRED",
            "VENUE NO REG REQUIRED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "VENUE OWNER",
                "VENUE REP"
            );
        }

        $type1 = array(
            "PROPERTY REG REQUIRED",
            "PROPERTY NO REG REQUIRED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "PROPERTY OWNER",
                "PROPERTY AGENT"
            );
        }

        $type1 = array(
            "DEMO REG REQUIRED",
            "DEMO NO REG REQUIRED"
        );
        if (in_array($project_type, $type1)) {
            $where_in = array(
                "ORGANISER", "SPONSOR", "EXHIBITOR", "PARTNER", "SPEAKER", "PANELIST", "VIP", "CELEBRITY", "PERFORMER", "FEATURED", "OTHERS", "BOOTH ORGANISER", "BOOTH SPONSOR", "BOOTH EXHIBITOR", "BOOTH PARTNER", "BOOTH SPEAKER", "BOOK PANELIST", "BOOTH VIP", "BOOTH CELEBRITY", "BOOTH PERFORMER", "BOOTH FEATURED", "BOOTH OTHERS", "DELEGATE", "PROPERTY OWNER", "PROPERTY AGENT", "PROPERTY VIEWER", "VENUE OWNER", "VENUE REP", "VISITOR", "SHOP OWNER", "SHOP REP", "SHOPPER"
            );
        }
        $data['AllonlineDropdown'] = $where_in;
        $data['sellers'] = $this
            ->guest_model
            ->FetchAllDataAsSellers($project, $where_in);
        //$data['sellers'] = $this->common->allonline();
        $data['guesttypes'] = $where_in;
        if (
            !empty($this
                ->session
                ->userdata('loggedin')) && $this
            ->session
            ->userdata('loggedin') != '' && $this
            ->session
            ->userdata('loggedin') != 'api.user.login.invalid_credentials_email_username'
        ) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => MMURL . "users/" . $this
                    ->session
                    ->userdata('loggedin') . "/teams",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $this
                        ->session
                        ->userdata('token'),
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $team_data = json_decode($response);
            //print_r($team_data);die;
			
			
            $curl = curl_init();

   	// added on 18-Feb
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
			
// end added on 18- Feb
			
			
            $data['guest'] = $this
                ->guest_model
                ->FetchDataByUserId($this
                    ->session
                    ->userdata('user_id'));
            //print_r($data['guest']);die;
            $data['allgroup'] = $this
                ->group_model
                ->get_chat_groups($data['guest']->id);
        }

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "POSTS";
        //$data['userdetails'] = $this->common->userdetails($this->session->userdata('user_id'));
        $project_id = $_POST['project_id'];
        //$data['userdetails'] = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);
		$data['userdetails']=$userdetails;
		$data['user_table_check']=$user_table_check;
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');

        $this
            ->load
            ->view('simple_view/posts', $data);

        $this
            ->load
            ->view('include/footer');
    }

    function content($project = 0)
    {

        if (!empty($project)) {
            $check = $this
                ->Places_model
                ->FetchProjectTypeId($project);

            $project_type = $check->project_type;
            if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {

                    $projectdata = $this
                        ->project_model
                        ->FetchSecDataById($project);
                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                    $data['No_registerUser_condition'] = true;
                } else {

                    if (!empty($project)) {
                        $check = $this
                            ->Places_model
                            ->FetchProjectTypeId($project);
                        $project_type = $check->project_type;
                        if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                            $user_id = $this
                                ->session
                                ->userdata('user_id');
                            if (!empty($user_id)) {

                                $No_registerUser = $this
                                    ->Places_model
                                    ->checkNo_registerUser($user_id, $project);

                                if ($No_registerUser == false) {

                                    $projectdata = $this
                                        ->project_model
                                        ->FetchSecDataById($project);
                                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                                    $data['No_registerUser_condition'] = true;
                                } else {

                                    $data['No_registerUser'] = '';
                                }
                            }
                        } else {

                            if ($this
                                ->ion_auth
                                ->logged_in()
                            ) {

                                $data['No_registerUser_condition'] = false;
                            } else {
                                $data['No_registerUser'] = '';
                            }
                        }
                    }
                }
            } else {

                if ($this
                    ->ion_auth
                    ->logged_in()
                ) {
                    $data['No_registerUser_condition'] = false;
                }
            }
        } else {
            $data['No_registerUser_condition'] = true;
        }

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }

        $this
            ->session
            ->set_userdata('checkdata', false);
        $this
            ->session
            ->set_userdata('project', $project);
        if ($project > 0) {
            $data['contents'] = $this
                ->c_model
                ->FetchContentById($project);
            $data['videos'] = $this
                ->c_model
                ->FetchVideoById($project);
            $data['audios'] = $this
                ->c_model
                ->FetchAudioById($project);
        }

        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;

        $data['project_id'] = $project;

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        $data['title'] = "CONTENT";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/content');
        $this
            ->load
            ->view('include/footer');
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

		$sellers = $this->guest_model->FetchAllDataAsSellers($project, $where_in);
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
				//print_r($seller);
				$res_msg_count = getUsersNotification($seller->id);
				 //print_r($res_msg_count);die;


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
						src         : "' . base_url() . 'simple_view/chat_popup_allonline",
						ajax: { 
						   settings: { data : "username="+username, type : "POST" } 
						},
						touch: false,
						
					});
				})
				</script>';
		}else{
			if (!$this->ion_auth->logged_in()) {
				$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
		}
		echo $data;
		//}

	}


    function chat($project = 0)
    {

        if (!empty($project)) {
            $check = $this->Places_model->FetchProjectTypeId($project);

            $project_type = $check->project_type;
            if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {

                    $projectdata = $this
                        ->project_model
                        ->FetchSecDataById($project);
                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                    $data['No_registerUser_condition'] = true;
                } else {

                    if (!empty($project)) {
                        $check = $this
                            ->Places_model
                            ->FetchProjectTypeId($project);
                        $project_type = $check->project_type;
                        if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                            $user_id = $this
                                ->session
                                ->userdata('user_id');
                            if (!empty($user_id)) {

                                $No_registerUser = $this
                                    ->Places_model
                                    ->checkNo_registerUser($user_id, $project);

                                if ($No_registerUser == false) {

                                    $projectdata = $this
                                        ->project_model
                                        ->FetchSecDataById($project);
                                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                                    $data['No_registerUser_condition'] = true;
                                } else {

                                    $data['No_registerUser'] = '';
                                }
                            }
                        } else {

                            if ($this
                                ->ion_auth
                                ->logged_in()
                            ) {

                                $data['No_registerUser_condition'] = true;
                            } else {
                                $data['No_registerUser'] = '';
                            }
                        }
                    }
                }
            } else {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {
                    $data['No_registerUser_condition'] = true;
                }
            }
        } else {
            $data['No_registerUser_condition'] = true;
        }

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }
        if ($project !== 0) {
            $data['posts'] = $this
                ->Places_model
                ->FetchPostsById($project);
        }

        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;
        $this
            ->session
            ->set_userdata('project', $project);

        $data['project_id'] = $project;

        if ($project !== 0) {
            $data['allonline'] = $this
                ->common
                ->allonline($project);
        }

        if (
            !empty($this
                ->session
                ->userdata('loggedin')) && $this
            ->session
            ->userdata('loggedin') != '' && $this
            ->session
            ->userdata('loggedin') != 'api.user.login.invalid_credentials_email_username'
        ) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => MMURL . "users/" . $this
                    ->session
                    ->userdata('loggedin') . "/teams",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . $this
                        ->session
                        ->userdata('token'),
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $team_data = json_decode($response);
            //print_r($team_data);die;
            $curl = curl_init();
			
			
  	// added on 18-Feb
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
			
// end added on 18- Feb
			
			
            $data['guest'] = $this->guest_model->FetchDataByUserId($this->session->userdata('user_id'));
            //print_r($data['guest']);die;
            $data['allgroup'] = $this
                ->group_model
                ->get_chat_groups($data['guest']->id);
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
		
        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;
        //$data['userdetails'] = $this->common->userdetails($this->session->userdata('user_id'));
        $project_id = $_POST['project_id'];
        $data['userdetails'] = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
        $data['title'] = "CHAT";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/chat', $data);
        $this
            ->load
            ->view('include/footer');
    }

    function places($project = 0)
    {

        $this
            ->session
            ->set_userdata('project', $project);
        if (!empty($project)) {
            $check = $this
                ->Places_model
                ->FetchProjectTypeId($project);

            $project_type = $check->project_type;
            if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                if (!$this
                    ->ion_auth
                    ->logged_in()) {

                    $projectdata = $this
                        ->project_model
                        ->FetchSecDataById($project);
                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                    $data['No_registerUser_condition'] = true;
                } else {

                    if (!empty($project)) {
                        $check = $this
                            ->Places_model
                            ->FetchProjectTypeId($project);
                        $project_type = $check->project_type;
                        if ($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED') {

                            $user_id = $this
                                ->session
                                ->userdata('user_id');
                            if (!empty($user_id)) {

                                $No_registerUser = $this
                                    ->Places_model
                                    ->checkNo_registerUser($user_id, $project);

                                if ($No_registerUser == false) {

                                    $projectdata = $this
                                        ->project_model
                                        ->FetchSecDataById($project);
                                    $data['No_registerUser'] = '<p class="pl-kkc pl-kkc1">REGISTRATION IS REQUIRED FOR THIS PLACE.<br/>YOU ARE ABLE TO REGISTER AT : <a href=' . $projectdata->register_url . '>' . $projectdata->register_url . '</a></p>';
                                    $data['No_registerUser_condition'] = true;
                                } else {
                                    $url = MMURL . "users/login";
                                    $post_data = array(
                                        "login_id" => $No_registerUser->mm_email,
                                        "password" => 'Xfactor@12345'
                                    );
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_URL, $url);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_HEADER, 1);
                                    curl_setopt($ch, CURLOPT_POST, 1);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
                                    $response = curl_exec($ch);
                                    //print_r($response);
                                    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

                                    foreach (explode("\r\n", $header_text) as $i => $line)
                                        if ($i === 0)
                                            $headers['http_code'] = $line;
                                        else {
                                            list($key, $value) = explode(': ', $line);

                                            $headers[$key] = $value;
                                        }
                                    //print_r($headers['Token']);
                                    $this->session->set_userdata('token', $headers['Token']);
                                    // echo 'places session ',$this->session->set_userdata('token',$headers['Token']);die;
                                    //print_r($this->session->userdata('token'));die;
                                    curl_close($ch);
                                    $this->session->set_userdata('loggedin', $No_registerUser->mm_id);
                                    $data['No_registerUser'] = '';
                                }
                            }
                        } else {

                            if ($this
                                ->ion_auth
                                ->logged_in()
                            ) {

                                $data['No_registerUser_condition'] = true;
                                $data['No_registerUser_condition']=false;
                                // For no Registration required type of project user registration proccess starts here. 
        
                                $user_id = $this->session->userdata('user_id');
                                $project_id = $project;
                                $userinstance = $this->common->getuserByUserId($user_id);
                                $user_table_check = $this->common->getChatUsersByProjectUser($user_id,$project_id);
                                $project_details = $this->project_model->FetchSecDataById($project_id);
                                $guesttabledetail = $this->common->getGuestUserDetail($user_id,$project_id);
                                
                                if(empty($guesttabledetail)){
                                    if(empty($user_table_check)){
                                        $mmregister = mmNoRegUserSignUp($user_id,$userinstance->username,$project_id);
                                        $data = array(
                                            "xmanage_id" => $userinstance->xmanage_id,
                                            "group_id" => $project_details->group_id,
                                            "project_id" => $project_id,
                                            "user_id" => $user_id,
                                            "mm_id" => $mmregister['mm_id'],
                                            "mm_username" => $mmregister['mm_username'],
                                            "mm_email" => $mmregister['mm_email']
                                        );
                                        $adduser = $this->common->AddChatUser($data);
                                        $login = mmlogin($mmregister['mm_email']);
                                        $this->session->set_userdata('token',$login);
                                        $this->session->set_userdata('loggedin',$mmregister['mm_id']);
                                    }
                                    else{
                                        $login = mmlogin($user_table_check->mm_email);
                                        $this->session->set_userdata('token',$login);
                                        $this->session->set_userdata('loggedin',$user_table_check->mm_id);
                                    }
                                }
                                else{
                                    $No_registerUser = $this->common->getGuestUserDetail($user_id,$project_id);
                                    $login = mmlogin($No_registerUser->mm_email);
                                    $this->session->set_userdata('token',$login);
                                    $this->session->set_userdata('loggedin',$No_registerUser->mm_id);
                                }
        
                            } else {
                                $data['No_registerUser'] = '';
                            }
                        }
                    }
                } 
            } else {
					
                if (!$this
                    ->ion_auth
                    ->logged_in()) {
                    $data['No_registerUser_condition'] = true;
                }
            }
        } else {
            $data['No_registerUser_condition'] = true;
        }

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        if (
            $this
            ->session
            ->userdata('checkdata') == true
        ) {

            if ($user->check_user1 != 1) {
                redirect('places/places_step1/S_VIEW');
            }
            if ($user->check_user2 != 1) {
                redirect('places/places_step2/S_VIEW');
            }
        }

        $data['projects'] = $this
            ->Places_model
            ->FetchProjectById();
        if ($this
            ->ion_auth
            ->logged_in()
        ) {
            $email = $this
                ->session
                ->userdata('email');
            $user_id = $this
                ->session
                ->userdata('user_id');
            $data['myprojects'] = $this
                ->Places_model
                ->myProjectsById($email, $user_id);
        }
        $project_name = $this
            ->p_model
            ->getProjectNamebyProjectId($project);

        $data['project_name'] = $project_name->project_name;

        $data['project_id'] = $project;
        $data['project'] = $project;

        $userid = $this
            ->session
            ->userdata('user_id');
        $user = $this
            ->ion_auth
            ->user($userid)->row();
        $data['user'] = $user;

        $data['title'] = "PLACES";
        $this
            ->load
            ->view('include/header', $data);
        $this
            ->load
            ->view('include/menu');
        $this
            ->load
            ->view('simple_view/places');
        $this
            ->load
            ->view('include/footer');
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
					<p>' . $guest_type . ', ' . $mydata->salutation . ' ' . $mydata->first_name . ' ' . $mydata->last_name . ', ' . $mydata->company . '</p>
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
						src         : "' . base_url() . 'simple_view/chat_popup_allonline",
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

    function chat_popup_allonline()
    {
        $username = $_POST['username'];
        $data['getlogged'] = $this
            ->ion_auth
            ->user($this
                ->session
                ->userdata('user_id'))
            ->row();
        $data['partnerlogged'] = $this
            ->common
            ->musername($username);
        $data['partnerGuest'] = $this
            ->common->guestDeatilsPartnerLogged($username, $_SESSION['project']);
            $logged_in = $this->session->userdata('loggedin');
            $param = array('channel_id'=>$this->session->userdata('channelID'));
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
              CURLOPT_URL => MMURL."channels/members/".$logged_in."/view",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS =>json_encode($param),
              CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$this->session->userdata("token"),
                "Content-Type: application/json"
              ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
        $this
            ->load
            ->view('simple_view/chat_popup_allonline', $data);
    }

    function testchat2()
    {
        $username = $_POST['username'];
        $data['getlogged'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $data['grpD'] = $this->group_model->groupDetl($username);
        $data['users'] = $this->group_model->alluser($data['grpD']->user_id);
        
        
        $logged_in = $this->session->userdata('loggedin');
        $param = array('channel_id'=>$this->session->userdata('channelID'));
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => MMURL."channels/members/".$logged_in."/view",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>json_encode($param),
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$this->session->userdata("token"),
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $this->load->view('simple_view/chat_group_popup', $data);
    }

    function chatGroup()
	{
		$userID = $this->input->post('userID');
		$project_id = $_POST['project_id'];
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$data['allgroup'] = $this->group_model->get_chat_groups($userdetails->id);
		$html = '';

		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);
		if (!empty($userdetails)) {
			if ($userdetails->chat_enable != 0 || !empty($user_table_check)) {
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
				}else{
					$html .= '<div class="fron-postion"><p class="gsm-pd">THERE IS NO GROUP CHAT CURRENTLY.</p></div>';
				}
			} else {
				if (!$this->ion_auth->logged_in()) {
					$html .= '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
				} else {
					$html .= '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
				}
			}
		} else {
			$html .= '<div class="fron-postion"><p class="gsm-pd">GROUP CHAT FEATURE WILL BE AVAILABLE ONLY AFTER REGISTRATION IN PROJECT.</p></div>';
		}


		 $html .= '<script>$(".openSellerChatBox").click(function() {
		 	var grpID = $(this).attr("data-val");

		 	$.fancybox.open({
		 		maxWidth: 800,
		 		fitToView: true,
		 		width: "100%",
		 		height: "auto",
		 		autoSize: true,
		 		type: "ajax",
		 		src: "' . base_url() . 'simple_view/testchat2",
		 		ajax: {
		 			settings: {
		 				data: "username=" +grpID,
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
		$userdetails = $this->common->Chatuserdetails($this->session->userdata('user_id'), $project_id);
		$user_table_check = $this->common->getChatUsersByProjectUser($this->session->userdata('user_id'), $project_id);
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
			//$noreguserData = $this->common->getChatUsersInfoByProjectUser($this->session->userdata('user_id'), $project_id);
			//print_r($allgroups);
			if($userdetails->chat_enable != 0 || !empty($user_table_check)){
				foreach ($allgroups as $group) {

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
								$user = getfulldetail(str_replace("_", "", $uu));
								//print_r($user);
								//$getUserAvatar = GuestDetails($user->id);
								$getmmuserdetails = getMMUserDetailsByUsername($username);
								if ($getmmuserdetails->first_name == $project_id) {
									if ($user->mm_id) {

										$ID = $user->mm_id . '__' . $logged_in;

										// Function for notification count starts here

										$res_msg_count = getUsersNotification($ID);

										$data .= '<div class="nearme-box clearfix Post_frontr_reapetguest pastsearchlist openChatBox" data-val="' . $username . '" data-guest-type="' . $user->guest_type . '">';
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
				$data .= '<script>
				$(".Post_frontr_reapetguest").click(function(){
					
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
					src         : "' . base_url() . 'simple_view/chat_popup_allonline",
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
						src: "' . base_url() . 'simple_view/testchat2",
						ajax: {
							settings: {
								data: "username=" +grpID,
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
			else{
				if(!$this->ion_auth->logged_in()) {
				$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else {
				$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
			}
			//echo $data;
		}else{
			if(!$this->ion_auth->logged_in()) {
				$data = '<div class="fron-postion"><p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p></div>';
			} else{
				$data = '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
			}
			
		}
		echo $data;
	}
}

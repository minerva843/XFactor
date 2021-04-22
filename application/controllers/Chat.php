<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
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
		$this->load->library('email');
		$this->load->library('session');
		$this->load->helper('common_helper');
		$this->load->model('group_model');
		$this->load->model('Guest_model');
		$this->load->model('Chat_model');
		
		if (!$this->ion_auth->logged_in()) {
			//redirect('auth/login', 'refresh');
		}
	}

	public function index()
	{
		$data['title'] = "My Chat";
		$this->load->view('include/header', $data);
		$this->load->view('chat/test');
		$this->load->view('include/footer');
	}



	function chatbox()
	{

		$data_header['title'] = "My Chat";
		$this->load->view('include/header', $data_header);
		$this->load->view('include/menu');
		$this->load->view('chat/chat_box', $data);
		$this->load->view('include/footer');
	}



	function testchat()
	{
		$username=$_POST['username'];
		//print($username);die;
		$data['getlogged'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['partnerlogged'] = $this->common->musername($username);
		$logged_in = $this->session->userdata('loggedin');
		//print_r($logged_in);die;
		$data['partnerGuest'] = $this->common->guestDeatilsPartnerLogged($username,$_SESSION['project']);
		//print_r($data['partnerGuest']);die;
		//print_r($data['partnerlogged']);die;
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
		//echo $response;
		
		
		$data['workshop']=$_POST['workshop'];
		$this->load->view('chat/test3',$data);
	}

	function testchat1()
	{
		$this->load->view('chat/test_chat1');
	}



	function testchat2()
	{
		$username=$_POST['username'];
		$data['getlogged'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['grpD'] = $this->group_model->groupDetl($username);
		$data['users'] = $this->group_model->alluser($data['grpD']->id); 
		$logged_in = $this->session->userdata('loggedin'); 
		//print_r($username);die;
		// $data['getlogged'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		// $data['grpD'] = $this->group_model->groupDetl($this->session->userdata('channelID'));
		// $data['users'] = $this->group_model->alluser($data['grpD']->user_id); 
		//print_r($data['users']);die;
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
		//print_r($response);
		curl_close($curl);
		$data['workshop']=$_POST['workshop'];
		$this->load->view('chat/test_chat2',$data);
	}

	function groupuserinfo()
	{
		$this->load->view('chat/groupuserinfo');
	}


	function testchat3()
	{
		$this->load->view('chat/test_chat3');
	}


	public function chatMsg()
	{
		$CI = &get_instance();
		//print_r($CI->session->userdata('channelID'));die;
		$url = MMURL."channels/" . $CI->session->userdata('channelID') . "/posts";

		//print_r($post_data);die;
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer " . $CI->session->userdata("token"),
			"Content-Type: application/json"
		));
		$response = curl_exec($ch);
		
	//	sleep(1);
//		print_r($response);
//		print_r(" --- "); die;
		$chats = json_decode($response);
//		print_r('chat object');
//		print_r($chats);die;
		$userIDs = array();
		$i = 0;
		//print_r($this->session->userdata());die;
		$dateFilter = array();
		//print_r($chats->{'posts'});die;
		
		foreach ($chats->{'posts'} as $pKey => $pVal) {
			//print_r($pVal->{'metadata'}->{'files'}[0]);
			if (!in_array($pVal->user_id, $userIDs)) {
				$userIDs[$i] = $pVal->user_id;
				$i++;
			}

			if (strpos($pVal->message, 'removed from the channel') === false && strpos($pVal->message, 'added to the channel') === false && strpos($pVal->message, 'joined the channel') === false && strpos($pVal->message, 'updated the channel') === false) {
				if(!empty($pVal->{'metadata'})) {
					$dateFilter[$pVal->create_at] = $pVal->user_id . '-' . $pVal->message . '-' . $pVal->{'metadata'}->{'files'}[0]->{'id'} . '-' . $pVal->{'metadata'}->{'files'}[0]->{'name'};
				}
			else
				{
					$dateFilter[$pVal->create_at] = $pVal->user_id . '-' . $pVal->message;
				}
		
			}
			
		}
		//print_r($userIDm);die;
		//$html = '<div class="chat">';
		ksort($dateFilter);
	//	print_r($dateFilter);die;
		// $timestamp = 1604317884158;
		// $datetime = new DateTime("@$timestamp");
		// echo $datetime->format('d-m-Y H:i:s');
		// die;
//		$mil = 1604317884158;
//		$seconds = $mil / 1000;
		//echo date("d-m-Y", $seconds);

		if (!empty((array)$dateFilter)) {
			foreach ($dateFilter as $pKey => $pVal) {
				//print_r($userIDs[1]);
				$ch = explode('-', $pVal);
				//if ($ch[0] == $userIDs[1]) {
//					print_r($ch[2]);
//commented on 23 Feb
					
				if(!empty($ch[2]))
					{
						$curl = curl_init();

						curl_setopt_array($curl, array(
							CURLOPT_URL => MMURL."files/".$ch[2]."/link",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "GET",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer " . $CI->session->userdata("token"),
							"Content-Type: application/json"
							),
							));

						$response = curl_exec($curl);

						curl_close($curl);
						//echo $response;
						//echo $CI->session->userdata("token");echo '------';
						//echo $CI->session->userdata('channelID');
						$link = json_decode($response);
					} 
//END commented on 23 Feb					
					if ($ch[0] == $this->session->userdata('loggedin')) {
						$epoch = $pKey;
						$seconds = $epoch / 1000;
						$dt_date = date("d M Y", $seconds);  // convert UNIX timestamp to PHP DateTime
						$dt_time = date("H:i:s", $seconds);
						$username = getdbusername($ch[0]);
						$html .= '<div class="date-main"><div class="date">' . $dt_date . '</div></div>';
						$html .= '<div class="left" style="width:100%;float:left">';
						$html .= '<h2 style="text-align:right;">' . strtoupper($username) . '<br></h2>';
						if(!empty($ch[1])) {
						$html .= '<p class="chat_user_msg" style="text-align:right; font-size:18px;">' . $ch[1] . '</p><br>';
						}
						if(!empty($ch[3])){
							$ext = pathinfo($ch[3], PATHINFO_EXTENSION);
							if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG')
							{
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
							}
							else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
							{
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'"  target="_blank"><img src="'.base_url('assets/images/icon/'.strtolower($ext).'.png').'"  width="60px"></a></br><a target="_blank" href="'.$link->link.'" download class="download-doc">DOWNLOAD</a></p>';  
							}
							else
							{
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'"  target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
							}
							$html .= '<p class="chat_file_name" style="text-align:right;">' .$ch[3]. '<p>'; 
						}
					  
					$html .= '<p class="chat_user_time">' .$dt_time. '<p>'; 
					$html .= '</div>'; 
				}
//commented on 23 Feb				
				 else  {
					$epoch = $pKey;
					$seconds = $epoch / 1000;
					$dt_date = date("d M Y", $seconds);  // convert UNIX timestamp to PHP DateTime
					$dt_time = date("H:i:s",$seconds);
					$username = getdbusername($ch[0]);
					$html .= '<div class="date-main"><div class="date">' . $dt_date . '</div></div>';
					$html .= '<div class="right" style="width:100%;float:right">';
					$html .= '<h2 style="text-align:left;">' . strtoupper($username) . '<br></h2>';
					if(!empty($ch[1])) {
						$html .= '<p class="chat_user_msg" style="text-align:left; font-size:18px;">' . $ch[1] . '</p><br>';
						}
					if(!empty($ch[3])){
						$ext = pathinfo($ch[3], PATHINFO_EXTENSION);
							if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG')
							{
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
							}
							else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
							{
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.base_url('assets/images/icon/'.strtolower($ext).'.png').'"  width="60px"></a></br><a target="_blank" href="'.$link->link.'" download class="download-doc">DOWNLOAD</a></p>';
							}
							else
							{
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a href="'.$link->link.'" target="_blank" download="'.$link->link.'" class="download-doc">DOWNLOAD</a></p>';
							}
							$html .= '<p class="chat_file_name" style="text-align:left;">' .$ch[3]. '<p>';
					}
					$html .= '<p class="chat_user_time">' .$dt_time. '<p>';      
					$html .= '</div>';
				}
			}
			$html .= '<script>$("#chat_msg").animate({scrollTop: parseInt($("#chat_msg")[0].scrollHeight)}, 1000);</script>'; 
		} else {
			$html .= '<div class="center" style="width:100%;float:right">';
			$html .= '<p style="text-align:center;">YOU CAN START CHATTING NOW.</p>';
			$html .= '</div>';
		}
		
		echo $html;
		die;
		curl_close($ch);
	}
	
	public function chatRef()
	{
		
		$logged_in = $this->session->userdata('loggedin');
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL . "users/" . $logged_in . "/channels/" . $this->session->userdata('channelID') . "/unread",
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
		$res_msg_count = json_decode($response);
		//echo $res_msg_count->msg_count;die;
		if($res_msg_count->msg_count > 0)
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => MMURL . "channels/" . $this->session->userdata('channelID'). "/posts",
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
			$finall = json_decode($response);
			//echo $final.'====='.$finall->posts->{$finall->order[0]};die;
			if($this->session->userdata('lastMsgID') != $finall->posts->{$finall->order[0]}){
			$final = $finall->posts->{$finall->order[0]};
			$this->session->set_userdata('lastMsgID',$final);
			$epoch = $final->create_at;
					$seconds = $epoch / 1000;
					$dt_date = date("d M Y", $seconds);  // convert UNIX timestamp to PHP DateTime
					$dt_time = date("H:i:s", $seconds);
					$username = getdbusername($final->user_id);
					$html .= '<div class="date-main"><div class="date">' . $dt_date . '</div></div>';
					$html .= '<div class="left" style="width:100%;float:left">';
					$html .= '<h2 style="text-align:left;">' . strtoupper($username) . '<br></h2>';
				if(!empty($final->message)) {
						$html .= '<p class="chat_user_msg" style="text-align:left; font-size:18px;float: left;">' . $final->message . '</p><br>';
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
							$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a target="_blank" href="'.$link->link.'" download class="download-doc">DOWNLOAD</a></p>';
						}
						else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
						{
							$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.base_url('assets/images/icon/'.strtolower($final->metadata->files[0]->extension).'.png').'"  width="60px"></a></br><a target="_blank" href="'.$link->link.'" download class="download-doc">DOWNLOAD</a></p>';
						}
						else
						{
							$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" target="_blank"><img src="'.$link->link.'"  width="60px"></a></br><a target="_blank" href="'.$link->link.'" download class="download-doc">DOWNLOAD</a></p>';
						}
						$html .= '<p class="chat_file_name" style="text-align:left;float: left;">' .$final->metadata->files[0]->name. '<p>';
					}
					$html .= '<p class="chat_user_time" style="float: left;text-align:left;">' .$dt_time. '<p>'; 
					$html .= '<script>$("#chat_msg").animate({scrollTop: parseInt($("#chat_msg")[0].scrollHeight)}, 1000);</script>'; 
					echo $html;
		}
		
		}		
	}

	public function getusername($userID)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL."users/" . $userID,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer " . $this->session->userdata("admintoken"),
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$res = json_decode($response);
		// print_r($res);die;
		return $res->username;
	}
	
	public function getdbusername($mm_id)
	{
		$userd = $this->common->getdbusername($mm_id);
		return $userd->username;
	}
	
	public function attachFile()
	{
		//$image = $this->input->post('image');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."files?channel_id=1m4znedibf8hppo5sjxpabzjuo",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => array('files'=> new CURLFILE('/Users/ritika/img-1.jpg')),
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer uiu8cutu4jr95ycbxyb9sqjk9h",
			"Content-Type: multipart/form-data"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		//return $response;
	}
	
	
	
	function individual_all(){
	

		$data['project_select'] = $_POST['project'];
		$data['group_id'] = $_POST['group_id'];
		
	// Rajeev: replaced below call from Guest Model to new method in CHAT model
//		$totalUser=$this->Guest_model->FetchAllData($_POST['project']);
		$totalUser=$this->Chat_model->FetchChatUsersList($_POST['project'],$_POST['group_id']);
		
		$data['totalUserCount'] = count($totalUser);
		$data['title'] = "Individual Chat Listing";
	

		$this->load->view('chat/individual/all_show',$data);
	
	
	}
	
	
	function group_chat_list(){
	
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$groupCount=$this->Chat_model->FetchAllDataChatGroups($_POST['project']);
			$data['totalGroupCount'] = count($groupCount);
			$data['title'] = "Group Chat Listing";
			$this->load->view('chat/group/all_show',$data);
	
	
	}




	function chat_logs_list(){
	
			$data['project_select'] = $_POST['project'];
			$_SESSION['project'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			$users = $this->Chat_model->getusers($_POST['project']);
			$data['totalChatUsers'] = count($users);
			$data['title'] = "Chat Logs Listing";
			$this->load->view('chat/logs/all_show',$data);
	
	
	}
	
	function channel_logs_list()
	{
			$data['mmid'] = $_POST['mmid'];
			$_SESSION['mmid'] = $_POST['mmid'];
			$user = $this->Chat_model->getusersDetails($data['mmid']);
			$data['guest'] = $user[0]->id;
		$username = $this->getdbusername($_POST['mmid']);
		$data['username'] = $username ;
		$_SESSION['setuser'] = $username;
		$data['project'] = $_SESSION['project'];
		// print_r($data['project']);die;
		$this->session->set_userdata('msg_sender', $username);
		$data['title'] = "Chat Logs Listing";
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."users/".$data['mmid']."/teams/".TEAMID."/channels",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata('admintoken'),
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$allgroups = json_decode($response);
		//print_r($allgroups);die;
		$individual = array();
		$gp = array();
		
		foreach($allgroups as $key => $allgroup)
		{
			if($allgroup->type == 'D')
			{
				$individual[$key] = $allgroup;
			}
			else
			{
				if($allgroup->display_name != 'Town Square' && $allgroup->display_name != 'Off-Topic')
				{
					$gp[$key] = $allgroup;
				}
			}
			
			
		}
		if($allgroups->status_code != '404' ){
			$data['totalchats'] = count($individual);
			$data['totalgpchats'] = count($gp);
			$data['total'] = count($individual)+count($gp);
		}
		else{
			$data['totalchats']  = 'DATA CANNOT BE RETRIEVED.';
			$data['totalgpchats'] = 'DATA CANNOT BE RETRIEVED.';
			$data['total'] = 'DATA CANNOT BE RETRIEVED.';
		}
		//print_r($data);die;
		$this->load->view('chat/logs/all_chat',$data);
	
	
	}
	
	function channel_chat_log_list()
	{
		$cc = explode('_', $_POST['channelid']);
		$data['channelid'] = $cc[0];
		$username = getdbusername($cc[1]);
		$data['username'] = $_SESSION['setuser'];
		$data['mmid'] = $_SESSION['mmid'];
		//print_r($data['channelid']);print_r($username);die;
		$this->session->set_userdata('msg_recipient', $username);
		$data['title'] = "Chat Logs Listing";
		//print_r($data);die;
		$this->load->view('chat/logs/all_channel_chat',$data);
	
	
	}
	
	
	function addNewGroupChat($id=false,$project_id=0){
	if($id){
        $data['title'] = "Edit CHAT GROUP"; 
        $data['action'] = 'EDIT'; 
	$data['project_select'] = $project_id;
	$data['chat_group_id'] = $id;
        $data['group_chat'] = $this->Chat_model->FetchGroupDataById($id); 
        $data['group_id'] = $_POST['group_id'];  
        }else{
         $data['title'] = "Add Group Chat";
         $data['action'] = 'ADD'; 
         $data['project_select'] = $_POST['project'];
         $data['group_id'] = $_POST['group_id'];
        }
        $this->load->view('chat/group/addNew',$data); 
	}
	
	
	
	
		
         function guestList($id=false)
		{
			
			$data['title'] = "GUEST";
			$data['action'] = $_POST['action'];
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
			//$data['workshopid'] = $_POST['workshopid'];
			//$data['workshop'] = $_POST['workshop'];
			
			if(empty($data['groupchatid']) || $data['groupchatid']==0){
			$data['groupchatid'] = trim($_POST['groupchat']);
			}else{
			$data['groupchatid'] =trim($_POST['groupchatid']);
			
			}		 
     
			$this->load->view('chat/group/guest_assign',$data);
		}
		
		
		
		function assignGuestGroupChat($groupchatid=false){
	          $ids = $_POST['ids'];
                  $ids_arr = explode(',', $ids);
				  $gpdetail = $this->Chat_model->FetchGroupDataById($groupchatid);
				 // print_r($gpdetail);die;
				 $curl = curl_init();

					curl_setopt_array($curl, array(
						  CURLOPT_URL => MMURL."channels/".$gpdetail->mm_group_id."/members",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "GET",
						  CURLOPT_POSTFIELDS =>json_encode($param),
						  CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer ".$this->session->userdata('admintoken'),
							"Content-Type: application/json"
						),
					));

					$response = curl_exec($curl);
					curl_close($curl);
					foreach(json_decode($response) as $res)
					{
						if($res->roles != 'channel_user channel_admin')
						{
							$curl = curl_init();

							curl_setopt_array($curl, array(
								  CURLOPT_URL => MMURL."channels/".$gpdetail->mm_group_id."/members/".$res->user_id,
								  CURLOPT_RETURNTRANSFER => true,
								  CURLOPT_ENCODING => "",
								  CURLOPT_MAXREDIRS => 10,
								  CURLOPT_TIMEOUT => 0,
								  CURLOPT_FOLLOWLOCATION => true,
								  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								  CURLOPT_CUSTOMREQUEST => "DELETE",
								  CURLOPT_HTTPHEADER => array(
									"Authorization: Bearer ".$this->session->userdata('admintoken'),
									"Content-Type: application/json"
								),
							));

							$response = curl_exec($curl);
							curl_close($curl);
						}
						
					}
                  $this->Chat_model->deleteMappingChatGroup($groupchatid);
                  foreach($ids_arr as $id){
					  $userdetail = $this->Chat_model->FetchUser($id);
					  
					  $param = array('user_id'=>$userdetail->mm_id);
					   
					
					$curl = curl_init();

					curl_setopt_array($curl, array(
						  CURLOPT_URL => MMURL."channels/".$gpdetail->mm_group_id."/members",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>json_encode($param),
						  CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer ".$this->session->userdata('admintoken'),
							"Content-Type: application/json"
						),
					));

					$response = curl_exec($curl);

					curl_close($curl);  
					  
                  $data = array(
                  "chat_group_id"=>$groupchatid,
                  "guest_id"=>$id
                  );
                  $this->Chat_model->saveGroupChatpmapping($data);
                  
                  }                  
                  echo $groupchatid;

		}
		
		
		

		
		
	
	
function processAddGroupChat($id=false){


//print_r($_FILES);  exit;
if(!empty($_FILES["file"]['name'])){


                               $uploadurl= './assets/group_chat_images/';
				//$newName = "floor_plan".rand(1000000,9999999).date('Y-m-d').".".pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
				$newName = $_FILES["file"]['name'];
				//print_r($newName);die;
				$config = array(
					'upload_path' => $uploadurl,
					'allowed_types' => "jpg|JPG|png|PNG|jpeg|JPEG",
					'overwrite' => TRUE,
					'max_size' => 0, 
					'max_height' => 0,
					'max_width' => 0,
					'encrypt_name' => FALSE,
					'file_name' => $newName
				);
				 $this->upload->initialize($config);
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('file'))
				{ 
					$this->form_validation->set_rules("image", $this->upload->display_errors());
					echo $this->upload->display_errors();
				 	

				}
				else
				{
					$imageDetailArray = $this->upload->data();
					//$data['chat_image']=pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME).$imageDetailArray['file_ext'];
					
					
				}


}
 $filenametosave =  pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME).$imageDetailArray['file_ext'];
//  print_r($filenametosave);die;
		  
 //$data['chat_image']=pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME).'.'.$imageDetailArray['file_ext'];
	 if($id){
			$gpdetail = $this->Chat_model->FetchGroupDataById($id);
			$param = array('id' => $gpdetail->mm_group_id, 'display_name'=>$this->input->post('chat_group_name'),'purpose'=>$this->input->post('remarks')); 
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => MMURL."channels/".$gpdetail->mm_group_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "PUT",
			  CURLOPT_POSTFIELDS =>json_encode($param),
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$this->session->userdata('admintoken'),
				"Content-Type: application/json"
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
		  
		
	if(!empty($filenametosave)){
	  $data = array( 
          'group_chat_name'=>$this->input->post('chat_group_name'),
          'remarks'=>$this->input->post('remarks'),
          'last_edited_date_time'=>date('Y-m-d G:i'),
          'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_ip_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username'),
          'edit_steps'=>2,
          'chat_image'=>pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME).$imageDetailArray['file_ext']
        ); 
	}else{
	  $data = array( 
          'group_chat_name'=>$this->input->post('chat_group_name'),
          'remarks'=>$this->input->post('remarks'),
          'last_edited_date_time'=>date('Y-m-d G:i'),
          'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_ip_address'=>$this->input->ip_address(),
          'edit_steps'=>2,
          'last_edited_username'=>$this->session->userdata('username')
        ); 
	
	
	}	  

        
       
        $insertid = $this->Chat_model->editChatGroupById($data,$id);
        echo $id;
       
       }else{
		   $name1 = str_replace(" ","_",strtolower($this->input->post('chat_group_name')));
		   $name = $name1.$this->input->post('project_id').rand(100000,999999);
		   $param = array('team_id' => TEAMID,'name'=>$name, 'display_name'=>$this->input->post('chat_group_name'),'purpose'=>$this->input->post('remarks'),'type'=>'P'); 
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => MMURL."channels",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>json_encode($param),
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$this->session->userdata('admintoken'),
				"Content-Type: application/json"
			  ),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$createdgp = json_decode($response);
			 
	if(!empty($filenametosave)){
           $data = array( 
          'project_id'=>$this->input->post('project_id'),
          'group_id'=>$this->input->post('group_id'),
          'remarks'=>$this->input->post('remarks'),
          'group_xm_id'=>'XCG'.$this->input->post('project_id').rand(1000000000,9999999999),
		  'mm_group_id'=>$createdgp->id,
          'group_chat_name'=>$this->input->post('chat_group_name'),
		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
		  'created_username'=>'XP'.$this->session->userdata('username'),
          'created_ip_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_ip_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username'),
          'chat_image'=>pathinfo($imageDetailArray['file_name'], PATHINFO_FILENAME).$imageDetailArray['file_ext']
        ); 
	}else{
	
	   $data = array( 
          'project_id'=>$this->input->post('project_id'),
          'group_id'=>$this->input->post('group_id'),
          'remarks'=>$this->input->post('remarks'),
          'group_xm_id'=>'XCG'.$this->input->post('project_id').rand(1000000000,9999999999),
		  'mm_group_id'=>$createdgp->id,
          'group_chat_name'=>$this->input->post('chat_group_name'),
		  'created_date_time'=>date("Y-m-d G:i"),
		  'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
		  'created_username'=>$this->session->userdata('username'),
          'created_ip_address'=>$this->input->ip_address(),
		  'last_edited_date_time'=>date('Y-m-d G:i'),
		  'last_edited_xmanage_id'=> $this->session->userdata('xmanage_id'),
          'last_edited_ip_address'=>$this->input->ip_address(),
          'last_edited_username'=>$this->session->userdata('username')
        ); 
	}		

        
        
        $insertid = $this->Chat_model->saveAddChatGroup($data);
        echo $insertid;
       
	
	}
	
	
	}
	
	

	function enabledisableChat(){
	
			$ids = $_POST['ids'];
			$action = $_POST['action'];
			$data['action'] = $_POST['action'];
			$data['project_select'] = $_POST['project'];
			$project =$_POST['project'];
			if(!empty($ids)){
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = $action." Selected";
                  $data['selected'] = TRUE;
                  $data['chatguestusers'] = $this->Chat_model->getChatGroupByIdWhereIN($where_in,$project); 
                   
                }
		 
			$data['ids'] = $ids;
			foreach($ids_arr as $val){
				$mydata=$this->Chat_model->getChatGroupByIdWhereIN($val,$project);
				$data_source=$mydata[0]['data_source'];
				$this->Chat_model->doChatGroupEnableDisableByIdWhereIN($val,$action,$data_source); 
			}
			
               
			$this->load->view('chat/individual/enabledisableSelected',$data);
	
	}
	
	
	
	
	function enableDisableSelectedSuccessChats(){
	
	
	
	
	}
	
	
	function groupChatCreateSuccess(){
	        $id = $_POST['groupchat_id'];
	        $action = $_POST['action'];
	        $data['action'] = $_POST['action'];
			$data['project_select'] = $_POST['project'];
			$data['group_info'] = $this->Chat_model->getChatCreateInfo($id)[0];  
			$data['usersCount'] = $this->Chat_model->GroupUsersCount($data['group_info']['id']);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL."channels/".$data['group_info']['mm_group_id'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$this->session->userdata('admintoken'),
				"Content-Type: application/json"
			),
			));

			$response = curl_exec($curl);
			$data['mm_group_info'] = json_decode($response);
		$this->load->view('chat/group/createGroupSuccess',$data);
	
	
	
	}
	
	
	function deleteSelectedGroupChats(){
		
		  $ids = $_POST['ids'];
                 $data['project_select'] = $_POST['project'];
				 $data['group_id'] = $_POST['group_id'];
				 
                
                if(!empty($ids)){
				  	//$data['usersCount'] = $this->Chat_model->GroupUsersCount($data['group_info']['id']);
                  	$ids_arr = explode(',', $ids);
                  	$where_in = $ids_arr;
                  	$data['title'] = "Delete Selected";
                  	$data['ids'] = $ids;
                  	$data['selected'] = TRUE;
                  
                  if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
                  }
                  
				  $data['groups_info'] = $this->Chat_model->getGroupChatByIdWhereIN($where_in);
				  $data['usersCount'] = $this->Chat_model->GroupUsersCount($data['groups_info'][0]['id']);
				  $curl = curl_init();

				  curl_setopt_array($curl, array(
					CURLOPT_URL => MMURL."channels/".$data['groups_info'][0]['mm_group_id'],
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_HTTPHEADER => array(
					  "Authorization: Bearer ".$this->session->userdata('admintoken'),
					  "Content-Type: application/json"
					),
				  ));
	  
				  $response = curl_exec($curl);
				  
				  curl_close($curl);
				  $data['mm_group_info'] = json_decode($response);
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['groups_info']=$this->Chat_model->FetchAllDataChatGroupsJoin($_POST['project']);  
                    
                }
               
	        $data['title'] = "Delete Group Chat ";
                $data['ids'] = $ids;
		$this->load->view('chat/group/deleteSelected',$data);
		}
		
		
		
		
		
		
		
	function deleteSelectedGroupChatsSuccess(){
		
		  $ids = $_POST['ids'];
                 $data['project_select'] = $_POST['project'];
                 $data['group_id'] = $_POST['group_id'];
                if(!empty($ids)){            
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['ids'] = $ids;
                  $data['selected'] = TRUE;
                   if(count($_POST['ids'])==1){
                   $data['single'] = TRUE;
				  }
				  foreach($ids_arr as $idds){
					$gpdetail = $this->Chat_model->FetchGroupDataById($idds);
					//print_r($gpdetail->mm_group_id);
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."channels/".$gpdetail->mm_group_id.'?permanent=true',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "DELETE",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json"
					  ),
					));
		
					$response = curl_exec($curl);
		
					curl_close($curl);
				  	echo $response;

				  };
                  $data['groups_info'] = $this->Chat_model->getGroupChatByIdWhereIN($where_in);
				  $this->Chat_model->deeleteGroupChatByIdWhereIN($where_in);
				  

                  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['groups_info']=$this->Chat_model->FetchAllDataChatGroupsJoin($_POST['project']);
                  // $this->Chat_model->deeleteGroupChatByProject($_POST['project']);  
                    
                }
               
	        $data['title'] = "Delete Group Chat ";
                $data['ids'] = $ids;
		$this->load->view('chat/group/deleteSelectedSuccess',$data);
		}
		
		
	function searchSingleDataGruopChat(){
	
		
		    $id=$_POST['groupchat'];
			$data=$this->Chat_model->getChatCreateInfo($id)[0]; 
			$usersCount = $this->Chat_model->GroupUsersCount($data['id']);

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => MMURL."channels/".$data['mm_group_id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$this->session->userdata('admintoken'),
				"Content-Type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			$mm_group_channel = json_decode($response);

			curl_close($curl);
			
			$checkNull='';
			if(empty($data1)){
			$checkNull .='<p class="dhg">THERE ARE NO CHAT GROUPS.</p>
						 
						';
			}else{
			$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED:</span> NO CHAT GROUP SELECTED</p><div class="display-step-status" id="displaystatus" ></div>';
			}
			$output = '';
			if($data > 0)
			{   
				 
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
				

 
				
				if(!empty($data['last_edited_date_time'])){ $last_edited_date_time= $data['last_edited_date_time'].'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data['last_edited_ip_address'])){ $last_edited_ip_address= $data['last_edited_ip_address']; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data['last_edited_xmanage_id'])){ $last_edited_xmanage_id= $data['last_edited_xmanage_id']; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data['last_edited_username'])){ $last_edited_username= $data['last_edited_username']; }else{ $last_edited_username= "NIL";  }
					
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span><span id="multipleGUESTSelect" style="color:black;" > '.$data['group_chat_name'].'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING:</span><span class="pname"> '.$data['group_chat_name'].'</span></p></td>
					    </tr>
					    
					
						<tr>
							<td colspan="2" class="top-fc"><h5>CHAT GROUP CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data['group_name'].'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Group Status</td>
						<td>'.$data['group_status'].'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>PROJECT ID </td>
						<td>'.$data['xproj'].'</td>
					  </tr>
					  
					  <tr>
						<td>GROUP CHAT ID </td>
						<td>'.$data['group_xm_id'].'</td>
					  </tr>
					  
					<tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					   
					  <tr>
						<td>Created date & time</td>
						<td>'.$data['created_date_time'] .'H</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>'.$data['created_ip_address'].'</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>'.$data['created_xmanage_id'].'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Created User Name</td>
						<td>'.$data['created_username'].'</td>
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">CHAT GROUP INFO</b></td>
						</tr>
						
						<tr>
						<td>GROUP CHAT NAME</td>
						<td class="" >'.$data['group_chat_name'].'</td>
					  </tr>
					  
					  <tr>
						<td>GROUP CHAT GUEST TYPE</td>
						<td class="" >NXNXN</td>
					  </tr>
					  <tr>
						<td>GROUP CHAT REMARKS</td>
						<td  ></td>
					  </tr>
					     
					   <tr>
					  <td colspan="2" class="res_clas sp_abc"> '.$data['remarks'].' </td>		 
					  </tr>
					  
					  <tr> 
						<td>GROUP CHAT IMAGE</td>
						<td>'.$data['chat_image'].'</td>   
					  </tr>
					  <tr>
						<td>GROUP CHAT NO OF USERS</td>
						<td>'.count($usersCount).'</td>
					  </tr>
					  <tr>
						<td>GROUP CHAT MESSAGE COUNT</td>
						<td>'.$mm_group_channel->total_msg_count.'</td>
					  </tr>
					  	
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
	
	
	
	}
	
	
	
	
	
	
	
	function searchGroupchat(){
	
	
	               $data1='';
			$searchFloor='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['guest']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['guest'])){
					
				} 
				
				if(!empty($_POST['selectShortBy']== 'group-chat-a-z')){
					$searchDataOrderByAsc='xf_mst_chat_groups.group_chat_name';
				}
				
				
				if(!empty($_POST['selectShortBy']== 'last-message')){
					//$searchDataOrderByAsc='xf_mst_chat_groups.group_chat_name';
				}
				
				
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$data1=$this->Chat_model->searchGroupCHatData($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$_POST['project']); 
				  
			}else{
                          
				$data1=$this->Chat_model->FetchAllDataChatGroups($_POST['project']);
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					//print_r($data1);die;
					foreach($data1 as $data){
						$usersCount = $this->Chat_model->GroupUsersCount($data['id']);
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr class="viewgroup" id='.$data['id'].' >
							 
							 
							 
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['group_chat_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
					
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								<td>'.$data['group_xm_id'] .'</td>
								<td >'.$data['group_chat_name'].'</td>
								<td>'. count($usersCount) .'</td> 
								<td>'.$last_edited_date_time.'</td> 
								<td>'.$data['remarks'] .'</td> 
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
	
		
	function searchIndividual(){
	
// Rajeev: updated to get the data from xf_vw_chatusers instead of xf_guest_users - 28-Feb-2021

	        $data1='';
			$searchFloor='';
//			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['guest']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['guest'])){
					if(!empty($_POST['guest'] == 'all-enabled')){
						$searchFloor=array('xf_vw_chatusers.chat_enable'=>1);
					}
					if(!empty($_POST['guest']=='all-disabled')){
						$searchFloor=array('xf_vw_chatusers.chat_enable'=>0);
					}
				} 
				if(!empty($_POST['selectShortBy']== 'chat-status')){
					$searchDataOrderByAsc='xf_vw_chatusers.id';
				}
				
				if(!empty($_POST['selectShortBy']== 'guest-type')){
					$searchDataOrderByAsc='xf_vw_chatusers.guest_type';
				}
				if(!empty($_POST['selectShortBy']== 'guest-name-a-z')){
					$searchDataOrderByAsc='xf_vw_chatusers.username';
				}
				if(!empty($_POST['selectShortBy']== 'email-a-z')){
					$searchDataOrderByAsc='xf_vw_chatusers.email';
				}
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
// Rajeev: replaced Guest_model search function by chat model search function
//				$data1=$this->Guest_model->search($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$_POST['project']); 
				$data1=$this->Chat_model->searchChatUsers($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$_POST['project']); 
				  
			}else{
                           //echo $_POST['project'];   exit;
				$data1=$this->Chat_model->FetchChatUsersList($_POST['project']);
				
				//$output['totalUserCount'] = count($data1);
                                
                             
			}
				$output = '';
				if($data1 > 0)
				{
					$grid=''; 
					$drop_point='';
					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['last_edited_date_time'])){
							$last_edited_date_time=$data['last_edited_date_time'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						
						if($data['chat_enable']==1){
						
						$enabledisable = 'ENABLE';
						
						}else{
						$enabledisable='DISABLED';
						}
						
						$checkId='SengleView_'.$data['id'];
						// $curl = curl_init();

						// curl_setopt_array($curl, array(
						//   CURLOPT_URL => MMURL."users/".$data['mm_id']."/teams/".TEAMID."/channels",
						//   CURLOPT_RETURNTRANSFER => true,
						//   CURLOPT_ENCODING => "",
						//   CURLOPT_MAXREDIRS => 10,
						//   CURLOPT_TIMEOUT => 0,
						//   CURLOPT_FOLLOWLOCATION => true,
						//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						//   CURLOPT_CUSTOMREQUEST => "GET",
						//   CURLOPT_HTTPHEADER => array(
						// 	"Authorization: Bearer ".$this->session->userdata('admintoken'),
						// 	"Content-Type: application/json"
						//   ),
						// ));

						// $response = curl_exec($curl);

						// curl_close($curl);
						// $allgroups = json_decode($response);
						// //print_r($allgroups);die;
						// $individual = array();
						// $gp = array();
						
						// foreach($allgroups as $key => $allgroup)
						// {
						// 	if($allgroup->type == 'D')
						// 	{
						// 		$individual[$key] = $allgroup;
						// 	}
						// 	else
						// 	{
						// 		if($allgroup->display_name != 'Town Square' && $allgroup->display_name != 'Off-Topic')
						// 		{
						// 			$gp[$key] = $allgroup;
						// 		}
						// 	}
							
							
						// }
						 
						
							 $output .= '<tr class="view" id='.$data['id'].' >
							 
							 
							 
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['username'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td>'.$enabledisable.'</td>
								<td>'.$data['guest_type'] .'</td>
								<td >'.$data['username'].'</td>
								<td>'.$data['email'] .'</td> 
								<td>'.$data['phone'] .'</td> 
								<td>'.$data['company'] .'</td> 
								

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
	
	
	
	
// Rajeev: Updated to get right side data from both Guest and Users table depending upon value of Data Source in xf_vw_chatusers 	
      public function searchSingleDataGuest()
		{
			 $id=$_POST['guest'];
			$data=$this->Guest_model->FetchDataById($id);
			
//			$data1=$this->Guest_model->FetchAllData($project=NULL);
			$project = $_SESSION['project'];
			
			if(empty($data)) {
				
				$data=$this->Chat_model->FetchUserDataById($id,$project);
				
			}

			$checkNull='';
			
			if(empty($data)){
				$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>';
			}else{
				$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p><div class="display-step-status" id="displaystatus" ></div>';
			}
			$output = '';
			if($data > 0)
			{
				 
				$project_name='';
				$last_edited_date_time='';
				$last_edited_ip_address='';
				if($data->chat_enable){
					$chatstatus = 'ENABLED';
				
				}else{
					$chatstatus = 'DISABLED';
				}

 
				
				if(!empty($data->last_edited_date_time)){ $last_edited_date_time= $data->last_edited_date_time.'h'; }else{ $last_edited_date_time= "NIL";  }
					
				if(!empty($data->last_edited_ip_address)){ $last_edited_ip_address= $data->last_edited_ip_address; }else{ $last_edited_ip_address= "NIL";  }
				
				if(!empty($data->last_edited_xmanage_id)){ $last_edited_xmanage_id= $data->last_edited_xmanage_id; }else{ $last_edited_xmanage_id= "NIL";  }
				
				if(!empty($data->last_edited_username)){ $last_edited_username= $data->last_edited_username; }else{ $last_edited_username= "NIL";  }
					$DataField=json_decode($data->key);
					
					
					if($DataField->remark_1 == NULL){  $remark_1= "REMARKS 1 "; }else{ $remark_1= $DataField->remark_1; }
					if($DataField->remark_1 ==NULL){  $remark_1msg= "DISABLE"; }else{ $remark_1msg= "SHOW"; }
					if($DataField->remark_2 ==NULL){  $remark_2= "REMARKS 2 "; }else{ $remark_2= $DataField->remark_2; }
					if($DataField->remark_2 ==NULL){  $remark_2msg= "DISABLE"; }else{ $remark_2msg= "SHOW"; }
					if($DataField->remark_3 ==NULL){  $remark_3= "REMARKS 3 "; }else{ $remark_3= $DataField->remark_3; }
					if($DataField->remark_3 ==NULL){  $remark_3msg= "DISABLE"; }else{ $remark_3msg= "SHOW"; }
					if($DataField->remark_4 ==NULL){  $remark_4= "REMARKS 4 "; }else{ $remark_4= $DataField->remark_4; }
					if($DataField->remark_4 ==NULL){  $remark_4msg= "DISABLE"; }else{ $remark_4msg= "SHOW"; }
					if($DataField->remark_5 ==NULL){  $remark_5= "REMARKS 5 "; }else{ $remark_5= $DataField->remark_5; }
					if($DataField->remark_5 ==NULL){  $remark_5msg= "DISABLE"; }else{ $remark_5msg= "SHOW"; }


					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."users/".$data->mm_id."/teams/".TEAMID."/channels",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$allgroups = json_decode($response);
					//print_r($allgroups->status_code);die;
					$individual = array();
					$gp = array();
					
					foreach($allgroups as $key => $allgroup)
					{
						if($allgroup->type == 'D')
						{
							$individual[$key] = $allgroup;
						}
						else
						{
							if($allgroup->display_name != 'Town Square' && $allgroup->display_name != 'Off-Topic')
							{
								$gp[$key] = $allgroup;
							}
						}
						
						
					}
					// print_r($individual);die;
					// print_r($gp);

					if($allgroups->status_code != '404' ){
						$totalchats = count($individual);
						$totalgpchats = count($gp);
					}
					else{
						$totalchats = 'DATA CANNOT BE RETRIEVED.';
						$totalgpchats = 'DATA CANNOT BE RETRIEVED.';
					}
					
					 
					$output .= '
					

						
						<tr>
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED : </span><span id="multipleGUESTSelect" style="color:black;" > '.$data->username.'</span></p></td>
					   </tr>
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING : </span><span class="pname"> '.$data->username.'</span></p></td>
						</tr>

						<tr>
						<td>TOTAL NO OF CHAT FOR USER</td>
						<td>'.$totalchats .'</td>
						</tr>

						<tr>
						<td>TOTAL NO OF GROUP CHAT FOR USER</td>
						<td>'.$totalgpchats.'</td>
						</tr>

						<tr>
							<td colspan="2" class="top-fc"><h5>GUEST CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr class="fl_space">
						<td>Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
					  <tr>
						<td>PROJECT ID </td>
						<td>'.$data->projectID.'</td>
					  </tr>
					  
					  <tr>
						<td>CHAT STATUS </td>
						<td>'.$chatstatus.'</td>
					  </tr>
					   <tr>
						<td colspan="2" class="res_clas sp_abc a-space"></td>
					  </tr>
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
					  <tr class="fl_space">
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST PERSONAL INFO</b></td>
						</tr>
						
						<tr>
						<td>SALUTATION</td>
						<td class="" >'.$data->salutation.'</td>
					  </tr>
					  
					  					  <tr>
						<td>FIRST NAME</td>
						<td class="textprojectname" >'.$data->first_name.'</td>
					  </tr>
					  <tr>
						<td>LAST NAME</td>
						<td  >'.$data->last_name.'</td>
					  </tr>
					  <!--tr> 
						<td>DISPLAYED / PRINTED NAME</td>
						<td></td>
					  </tr-->
					  <tr>
						<td>GENDER</td>
						<td>'.$data->gender.'</td>
					  </tr>
					          
					  
					  <tr>
						<td>QUICK INTRO</td>
						<td></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="res_clas sp_abc running_latter quick_intro_guest">'.$data->quick_intro.'</td>
					  </tr>
					  
					  
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST COMPANY & WORK INFO</b></td>
						</tr>
						
						<tr>
						<td>COMPANY NAME</td>
						<td class="" ></td>
					  </tr>
					  
					   <tr>
					  <td colspan="2" class="res_clas sp_abc"> '.$data->company.' </td>		 
					</tr>   
					  
					  	<tr>
						<td>COMPANY ADDRESS</td>
						<td class=""></td>  
					  </tr>
					  
					  <tr>						
						<td colspan="2" class="sp_abc df_xpm">'.$data->company_address.'</td>
					  </tr>
					  
					  <tr>
						<td>COMPANY POSTAL CODE</td>
						<td  >'.$data->pincode.'</td>
					  </tr>
					  <tr> 
						<td>DESIGNATION</td>
						<td>'.$data->designation.'</td>
					  </tr>
					  <tr>
						<td>EMAIL</td>
						<td class="running_latter"></td>
					  </tr>
					  
					  <tr>     
					  <td colspan="2" class="res_clas sp_abc running_latter"> '.$data->email.' </td>		 
					</tr>
					  
					  <tr>
						<td>COUNTRY CODE</td>
						<td>'.$data->country_code.'</td>
					  </tr>
					  
					  <tr>
						<td>MOBILE</td>
						<td>'.$data->phone.'</td>
					  </tr>
					  
					  <tr>
						<td>DID</td>
						<td>'.$data->did.'</td>
					  </tr>
					  <tr>
						<td>TEL</td>
						<td>'.$data->tel.'</td>
					  </tr>
					  <tr>
						<td>EXTENSION</td>
						<td>'.$data->extension.'</td>
					  </tr>
					  
					 
					  <body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST MISC INFO</b></td>
						</tr>
						
						<tr>
						<td  class="sp_dj">'.$remark_1.'</td>
						 <td>'.$remark_1msg.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">'.$remark_2.'</td>
						<td>'.$remark_2msg.'</td>
					  </tr> 
					  <tr>
						<td class="sp_dj">'.$remark_3.'</td>
						 <td>'.$remark_3msg.'</td>
					  </tr>
					  <tr>
						<td  class="sp_dj">'.$remark_4.'</td>
						<td>'.$remark_4msg.'</td>
					  </tr>
					  <tr>
						<td class="sp_dj">'.$remark_5.'</td>
						<td>'.$remark_5msg.'</td>
					  </tr>
					  
					  
					  
					  
					    <body>
						<tr>
					<td colspan="2" class="floor-ck"><b style="font-size: 16px;"> GUEST ATTENDANCE INFO</b></td>
						</tr>
						
					<tr>
						<td>ATTENDANCE STATUS</td>
						<td class="" ></td>
					  </tr>
					  
					   <tr>
						<td>CHECK IN DATE & TIME</td>
						<td class="" ></td>
					  </tr>
					  <tr>
						<td>CHECK IN IP ADDRESS</td>
						<td  ></td>
					  </tr>
					  <tr> 
						<td>CHECK IN SOURCE</td>
						<td></td>
					  </tr>
					  <tr> 
						<td>CHECK OUT DATE & TIME</td>
						<td></td>
					  </tr>
					  
					   <tr> 
						<td>CHECK OUT IP ADDRESS</td>
						<td></td>
					  </tr>
					  
					   <tr> 
						<td>CHECK OUT SOURCE</td>
						<td></td>
					  </tr>
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  	
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}

//Rajeev: updated to get data from both guest as well as chat users table to handle no registration cases ->28Feb
	
	public function getusers()
	{
		if($this->input->post())
		{
			$data1='';
			$searchFloorChatLog='';
			$searchFloorOrderBy='';
			$data['project_select'] = $_POST['project'];
			if(!empty($_POST['guest']) || !empty($_POST['selectShortByUsers']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['guest'])){
					if(!empty($_POST['guest'] == 'all-enabled')){
						$searchFloorChatLog=array('xf_vw_chatusers.chat_enable'=>1);
					}
					if(!empty($_POST['guest']=='all-disabled')){
						$searchFloorChatLog=array('xf_vw_chatusers.chat_enable'=>0);
					}
				} 
				
				if(!empty($_POST['selectShortByUsers']== 'guest-type')){
					$searchDataOrderByAsc='xf_vw_chatusers.guest_type';
				}
				if(!empty($_POST['selectShortByUsers']== 'guest-name-a-z')){
					$searchDataOrderByAsc='xf_vw_chatusers.first_name';
				}
				if(!empty($_POST['selectShortByUsers']== 'email-a-z')){
					$searchDataOrderByAsc='xf_vw_chatusers.email';
				}
				 
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				$users=$this->Chat_model->searchusers($searchFloorChatLog,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$this->input->post('project')); 
//				$users=$this->Chat_model->searchChatUsers($searchFloorChatLog,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$this->input->post('project')); 

				//$users = $this->Chat_model->search($searchFloor,$searchDataOrderByAsc,$searchDataOrderBy,$AllSearchData,$this->input->post('project'));
				  
			}else{
    
				$users = $this->Chat_model->getusers($this->input->post('project'));
         
                             
			}

			if(empty($users)){
				$output .= '
						 <tr>
						  <td colspan="8" align="center">No Data Found</td>
						 </tr>
						 ';
			}
			else{

					foreach($users as $user)
				{
					//print_R($user->chat_enable);die;
					if($user->chat_enable == '1'){
						$chat_status = 'ENABLE';
					}
					else{
						$chat_status = 'DISABLE';
					}
					$output .= '<tr class="view" id='.$user->id.' >
						<td class="deletesingle" >
						
						<input type="radio" data-project="'.$user->username.'" id="d_'.$user->id.'" name="delete_val[]" value="'.$user->mm_id.'" class="deletClas" style="display:none;">
						<label for="d_'.$user->id.'" class="deletClass '.$hide.'"></label>
						</td>';
					$output .= '<td id="chat_enable">'.$chat_status.'</td>';
					$output .= '<td>'.$user->guest_type.'</td>';
					$output .= '<td>'.$user->first_name.' '.$user->last_name.'</td>';
					
					$output .= '<td>'.$user->email.'</td>';
					// $output .= '<td>'.count($gp).'</td>';
					$output .= '<td class="chk2"><input type="checkbox" id="c_'.$user->id.'" name="rigtcheck" class="rightcheck'.$user->id.' " > 
      <label style="display:none;" for="c_'.$user->id.'" class="rightcheck rightcheck'.$user->id.'"></label>
									</td> ';
					$output .= '</tr>';
					
				}
				//die;
			}
			
			echo $output;
		}
	}
	
	public function getChannel()
	{
		if($this->input->post())
		{
		// 	curl_setopt_array($curl, array(
		//   CURLOPT_URL => MMURL."users/".$this->input->post('mmid')."/teams",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 0,
		//   CURLOPT_FOLLOWLOCATION => true,  
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		// 	"Authorization: Bearer ".$this->session->userdata('admintoken'),
		// 	"Content-Type: application/json"
		//   ),
		// ));

		// $response = curl_exec($curl);
		
		// $team_data = json_decode($response);
		
		// curl_close($curl);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."users/".$this->input->post('mmid')."/teams/".TEAMID."/channels",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata('token'),
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		
		curl_close($curl);
		//print_r(count(json_encode($response)));die;
		$all = array();
		if(!empty($_POST['guest']))
		{
			if($_POST['guest'] == 'individual')
			{
				foreach(json_decode($response) as $key =>  $channel)
				{
					if($channel->type == 'D')
					{
						$all[$key] = $channel;
					}
				}
				
			}
			else if($_POST['guest'] == 'group')
			{
				foreach(json_decode($response) as $key =>  $channel)
				{
					if($channel->type == 'P')
					{
						$all[$key] = $channel;
					}
				}
			}
		}
		else
		{
			foreach(json_decode($response) as $key =>  $channel)
			{
				if($channel->type != 'O')
				{
					$all[$key] = $channel;
				}
				
			}
			$allgp = $this->Chat_model->FetchAllGroupData();
		}
			foreach($all as $channel)
			{
				//print_r($channel);die;
				if($channel->display_name != 'Off-Topic' && $channel->display_name != 'Town Square') {
				$epoch = $channel->last_post_at;
				$seconds = $epoch / 1000;
				$dt_date = date("Y M d H:i:s", $seconds);  // convert UNIX timestamp to PHP DateTime
				
				if($channel->type == 'D')
				{
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));
					if(!empty($username)) {
						$output .= '<tr class="view" id='.$channel->id.' >
									<td class="deletesingle" >
										<input type="radio"  id="d_'.$channel->id.'" name="channel_val" value="'.$channel->id.'" data-val="'.str_replace("_","",str_replace($this->input->post('mmid'),"",$channel->name)).'" class="channelClas" style="display:none;">
										<label for="d_'.$channel->id.'" class="channelClas '.$hide.'"></label>
									</td>';
						$output .= '<td id="channel_date">'.$dt_date.'</td>';
					}
				}   
				else
				{
					$output .= '<tr class="view" id='.$channel->id.' >
							<td class="deletesingle" >
								<input type="radio"  id="d_'.$channel->id.'" name="channel_val" value="'.$channel->id.'" data-val="'.str_replace("_","",str_replace($this->input->post('mmid'),"",$channel->name)).'" class="channelClas" style="display:none;">
								<label for="d_'.$channel->id.'" class="channelClas '.$hide.'"></label>
							</td>';
					$output .= '<td id="channel_date">'.$dt_date.'</td>';
				}
				if($channel->type == 'D')
				{
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));	
					if(!empty($username)) {
						$output .= '<td id="channel_type">Individual</td>';
					}
				}
				else
				{
					$output .= '<td id="channel_type">Group</td>';
				}
				if($channel->type == 'D')
				{
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					// print_r($this->input->post('mmid'));
					// print_r(str_replace("_","",$uu));die;
					$username = getdbusername(str_replace("_","",$uu));
					//print_r($username);exit;
					$user = getfulldetail(str_replace("_","",$uu));
					if(!empty($user->first_name))
					{
						$output .= '<td id="channel_name">'.$user->first_name.' '.$user->last_name.'</td>';
					}
					
				}
				else
				{
					$output .= '<td id="channel_name">'.$channel->display_name.'</td>';
				}
				
				if($channel->type == 'D'){
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));
					if(!empty($username))
					{
						$output .= '<td>NOT APPLICABLE</td>';
					}
				}
				else{
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."channels/".$channel->id."/members",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$muser = json_decode($response);
					
					$p = '';
					$email = '';
					foreach($muser as $userm){
						//print_r($userm->user_id);die;
						$username = getdbusername($userm->user_id);
						$user = getfulldetail($userm->user_id);
						//print_r($user);
						
						if(empty($user->first_name))
						{
							$p .= $username;
						}
						else
						{
							$p .= $user->first_name.' '.$user->last_name;
						}
						
						$email .= $user->email;
					}
					
					
					$output .= '<td>'.$p.'</td>';
				}

				if($channel->type == 'D'){
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));	
					if(!empty($username)) {
						$output .= '<td id="channel_des">NOT APPLICABLE</td>';
					}
				}
				else{
					if(empty($channel->purpose)){
						$output .='<td id="channel_des">NO DESCRIPTION PROVIDED</td>';
					}
					else{
						$output .= '<td id="channel_des">'.$channel->purpose.'</td>';
					}
				}


				if($channel->type == 'D')
				{
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));
					$user = getfulldetail(str_replace("_","",$uu));
					if(!empty($username)) {
					$output .= '<td id="channel_email">'.$user->email.'</td>';
					}
					
				}
				else
				{
					$output .= '<td id="channel_email">'.$email.'</td>';   
				}
				if($channel->type == 'D')
				{
					$uu = str_replace($this->input->post('mmid'),"",$channel->name);
					$username = getdbusername(str_replace("_","",$uu));
					if(!empty($username)) {
						$output .= '<td class="chk2"><input type="checkbox" id="c_'.$channel->id.'" name="rigtcheck" class="rightcheck'.$channel->id.' " > 
      <label style="display:none;" for="c_'.$channel->id.'" class="rightcheck rightcheck'.$channel->id.'"></label>
							</td>';
						$output .= '</tr>';
					}
				}
				else
				{
					$output .= '<td class="chk2"><input type="checkbox" id="c_'.$channel->id.'" name="rigtcheck" class="rightcheck'.$channel->id.' " > 
      <label style="display:none;" for="c_'.$channel->id.'" class="rightcheck rightcheck'.$channel->id.'"></label>
							</td>';
						$output .= '</tr>';
				}
				}
			}
			echo $output;
		}
	}
	
	public function getChat()
	{
		$channelID = $this->input->post('channelid');
		//print_r($channelID);die;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."/channels/".$channelID."/posts",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer " .$this->session->userdata("token"),
			"Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$chats = json_decode($response);
		$userIDs = array();
		$i = 0;
		$dateFilter = array();
		//print_r($chats->{'posts'});die;
		foreach ($chats->{'posts'} as $pKey => $pVal) {
			//print_r($pVal->user_id);
			if (!in_array($pVal->user_id, $userIDs)) {
				$userIDs[$i] = $pVal->user_id;
				$i++;
			}

			if (strpos($pVal->message, 'removed from the channel') === false && strpos($pVal->message, 'added to the channel') === false && strpos($pVal->message, 'joined the channel') === false && strpos($pVal->message, 'updated the channel') === false) {
				if(!empty($pVal->{'metadata'})) {
					$dateFilter[$pVal->id.'-'.$pVal->create_at] = $pVal->user_id . '-' . $pVal->message . '-' . $pVal->{'metadata'}->{'files'}[0]->{'id'} . '-' . $pVal->{'metadata'}->{'files'}[0]->{'name'};
				}
			else
				{
					$dateFilter[$pVal->id.'-'.$pVal->create_at] = $pVal->user_id . '-' . $pVal->message;
				}
		
			}
		}
		//$html = '<div class="chat">';
		ksort($dateFilter);
		//print_r($dateFilter);die;

		// $timestamp = 1604317884158;
		// $datetime = new DateTime("@$timestamp");
		// echo $datetime->format('d-m-Y H:i:s');
		// die;
		$mil = 1604317884158;
		$seconds = $mil / 1000;
		//echo date("d-m-Y", $seconds);
		if (!empty((array)$dateFilter)) {
			foreach ($dateFilter as $pKey => $pVal) {
				//print_r($userIDs[1]);
				$chkey = explode('-', $pKey);
				$ch = explode('-', $pVal);
				if(!empty($_POST['guest']))
				{
					//print_r($_POST['guest']);die;
					if($_POST['guest'] == 'sender')
					{
						
						//print_r($ch[0]);print_r($this->session->userdata('msg_sender'));die;
						if($this->getdbusername($ch[0]) == $this->session->userdata('msg_sender')) {
							$epoch = $chkey[1];
							$seconds = $epoch / 1000;
							$dt_date = date("d M Y H:i:s", $seconds);  // convert UNIX timestamp to PHP DateTime
							// $username = $this->getdbusername($ch[0]);
							if(!empty($this->getdbusername($ch[0]))){
								$username = $this->getdbusername($ch[0]);
							}else{
								$username = 'GROUP ADMIN';
							}
							$html .= '<tr class="view" id='.$chkey[0].' >
							<td class="deletesingle" >
								<input type="checkbox"  id="d_'.$chkey[0].'" name="chat_val" value="'.$ch[2].'"  class="chatClas" style="display:none;">
								<label for="d_'.$chkey[0].'" class="chatClas '.$hide.'"></label>
							</td>';
							$html .= '<td>' . $dt_date . '</td>';
							$html .= '<td>' . $username . '</td>';
							$html .= '<td>';
							if(!empty($ch[1])){
								$html .= '<span>'.$ch[1] .'</span>'; 
							}
							if(!empty($ch[3])){
								$html .= '<span>Attachment : '.$ch[3].'</span>';
							}
							$html .= '</td>';
							$html .= '<td class="chk2"><input type="checkbox" id="c_'.$chkey[0].'" name="rigtcheck" class="rightcheck'.$chkey[0].' ">
								<label style="display:none;" for="c_'.$chkey[0].'" class="rightcheck rightcheck'.$chkey[0].'"></label>
							</td>';
							$html .= '</tr>';
							
						}
						
					}
					else if($_POST['guest'] == 'recipient')
					{
						
						if($this->getdbusername($ch[0]) == $this->session->userdata('msg_recipient')) {
							$epoch = $chkey[1];
							$seconds = $epoch / 1000;
							$dt_date = date("d M Y H:i:s", $seconds);  // convert UNIX timestamp to PHP DateTime
							if(!empty($this->getdbusername($ch[0]))){
								$username = $this->getdbusername($ch[0]);
							}else{
								$username = 'GROUP ADMIN';
							}
							//$username = $this->getdbusername($ch[0]);
							$html .= '<tr class="view" id='.$chkey[0].' >
							<td class="deletesingle" >
								<input type="checkbox"  id="d_'.$chkey[0].'" name="chat_val" value="'.$ch[2].'" class="chatClas" style="display:none;">
								<label for="d_'.$chkey[0].'" class="chatClas '.$hide.'"></label>
							</td>';
							$html .= '<td>' . $dt_date . '</td>';
							$html .= '<td>' . $username . '</td>';
							$html .= '<td>';
							if(!empty($ch[1])){
								$html .= '<span>'.$ch[1] .'</span>'; 
							}
							if(!empty($ch[3])){
								$html .= '<span>Attachment : '.$ch[3].'</span>';
							}
							$html .= '</td>';
							$html .= '<td class="chk2"><input type="checkbox" id="c_'.$chkey[0].'" name="rigtcheck" class="rightcheck'.$chkey[0].' ">
								<label style="display:none;" for="c_'.$chkey[0].'" class="rightcheck rightcheck'.$chkey[0].'"></label>
							</td>';
							$html .= '</tr>';
						}
					}
				}
				else
				{
					$epoch = $chkey[1];
						$seconds = $epoch / 1000;
						$dt_date = date("d M Y H:i:s", $seconds);  // convert UNIX timestamp to PHP DateTime
						if(!empty($this->getdbusername($ch[0]))){
							$username = $this->getdbusername($ch[0]);
						}else{
							$username = 'GROUP ADMIN';
						}	
						//$username = $this->getdbusername($ch[0]);					
						$html .= '<tr class="view" id='.$chkey[0].' >
							<td class="deletesingle" >
								<input type="checkbox"  id="d_'.$chkey[0].'" name="chat_val" value="'.$chkey[0].'" class="chatClas" style="display:none;">
								<label for="d_'.$chkey[0].'" class="chatClas '.$hide.'"></label>
							</td>';
						$html .= '<td>' . $dt_date . '</td>';
						$html .= '<td>' . $username . '</td>';
						$html .= '<td>';
							if(!empty($ch[1])){
								$html .= '<span>'.$ch[1] .'</span>'; 
							}
							if(!empty($ch[3])){
								$html .= '<span>Attachment : '.$ch[3].'</span>';
							}
							$html .= '</td>';
						$html .= '<td class="chk2"><input type="checkbox" id="c_'.$chkey[0].'" name="rigtcheck" class="rightcheck'.$chkey[0].' ">
								<label style="display:none;" for="c_'.$chkey[0].'" class="rightcheck rightcheck'.$chkey[0].'"></label>
							</td>';
							$html .= '</tr>';
				}
				
			}
		}
		else{
			$html .= '
			<tr>
			 <td colspan="8" align="center">No Chat Found For This Channel</td>
			</tr>
			';
			// print_r('Empty');
		}
		//$html .= '</div>';
		echo $html;
		die;
	}
	
	function deleteSelected(){
            $channelid=$_POST['channelid'];
				$_SESSION['channelid']=$_POST['channelid'];
				$data['channelid']=$_POST['channelid'];
                $ids = $_POST['ids'];
				//print_r($ids);print_r($channelid);
				//die;
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  
                  //$where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
				  $post = array();
				  foreach($ids_arr as $id) {
                  $curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."posts/".$id,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json",
						"X-Requested-With: XmlHttpRequest"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$post[$id] =json_decode($response); 				
					
				  }
				 // print_r();
				  $data['data'] = $post;
                }else{
                   $data['title'] = "Delete All"; 
                   $data['ids'] = '';
                   $data['selected'] = FALSE;
				   $curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."channels/".$channelid,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json",
						"X-Requested-With: XmlHttpRequest"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$data1=json_decode($response);  
				   $data['data'] = $data1;
				   
                }
                
                
		$data['title'] = "Delete List";  
		$this->load->view('chat/logs/deleteAll', $data);  
            
        }
		
		 function deleteAllSuccess(){ 
            
                $ids = $_POST['ids'];
				$channelid = $_SESSION['channelid'];
				$data['channelid'] = $_SESSION['channelid'];
				$data['project'] = $_SESSION['project'];
				//print_r($channelid);die;
                if(!empty($ids)){
                    
                  $ids_arr = explode(',', $ids);
                  //$where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
				  $data['ids'] = $ids;
                  $data['selected'] = TRUE;
                 // $_SESSION['DeleteData']= $this->post_model->FetchDataByMultipleId($where_in); 
				  //$this->post_model->DeleteDataByMultipleId($where_in);
				  foreach($ids_arr as $idd)
				  {
					  $curl = curl_init();

						curl_setopt_array($curl, array(
						  CURLOPT_URL => MMURL."posts/".$idd,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "DELETE",
						  CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer ".$this->session->userdata('admintoken'),
							"Content-Type: application/json"
						  ),
						));

						$response = curl_exec($curl);

						curl_close($curl);
						//echo $response;
				  }
                }else{
                   $data['title'] = "Delete All";
                   $data['selected'] = FALSE;
				   //print_r($channelid);die;
				   $curl = curl_init();

						curl_setopt_array($curl, array(
						  CURLOPT_URL => MMURL."channels/".$channelid,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "DELETE",
						  CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer ".$this->session->userdata('admintoken'),
							"Content-Type: application/json"
						  ),
						));

						$response = curl_exec($curl);

						curl_close($curl);
				   
						echo $response;
				  
                   //$_SESSION['DeleteData']=$this->post_model->FetchAllData($_SESSION['project']);  
                    //$this->post_model->deleteAll();
                }
                
                $curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => MMURL."channels/".$channelid,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Authorization: Bearer ".$this->session->userdata('admintoken'),
						"Content-Type: application/json",
						"X-Requested-With: XmlHttpRequest"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
				   
				   
                   $data1=json_decode($response);
                $data['data'] = $data1;
				$data['title'] = "CHAT LOGS LIST";  
				$this->load->view('chat/logs/deleteAllSuccess', $data);  
            
        }
	
	function getChannelDetails()
	{
		$channelid = $_POST['channelid'];
		//print_r($channelid);die;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => MMURL."channels/".$channelid,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"Authorization: Bearer ".$this->session->userdata('admintoken'),
			"Content-Type: application/json",
			"X-Requested-With: XmlHttpRequest"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
	   echo $response;die;
	   
	   $data1 = json_decode($response);
	  $output .= '<tr>
							<td colspan="2" class="top-fc"><h5>CHANNEL CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>CHANNEL NAME</td>
						<td>'.$data->group_name.'</td>
					  </tr>';
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




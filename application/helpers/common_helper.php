<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('chatMsg')) {
	function chatMsg()
	{
		$CI = &get_instance();
		//print_r($CI->session->userdata('channelID'));die;
		$url = MMURL . "channels/" . $CI->session->userdata('channelID') . "/posts";

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
		//print_r($this->session->userdata('token'));die;
		$chats = json_decode($response);
		//print_r($CI->session->userdata('channelID'));
		//print_r($chats);die;
		$userIDs = array();
		$i = 0;
		$dateFilter = array();
		foreach ($chats->{'posts'} as $pKey => $pVal) {
			//print_r($pVal->user_id);
			if (!in_array($pVal->user_id, $userIDs)) {
				$userIDs[$i] = $pVal->user_id;
				$i++;
			}

			if (strpos($pVal->message, 'removed from the channel') === false && strpos($pVal->message, 'added to the channel') === false && strpos($pVal->message, 'joined the channel') === false) {
				if(!empty($pVal->{'metadata'})) {
					$dateFilter[$pVal->create_at] = $pVal->user_id . '-' . $pVal->message . '-' . $pVal->{'metadata'}->{'files'}[0]->{'id'} . '-' . $pVal->{'metadata'}->{'files'}[0]->{'name'};
				}
				else
				{
					$dateFilter[$pVal->create_at] = $pVal->user_id . '-' . $pVal->message;
				}
		
			}
		}
		//$html = '<div class="chat">';
		ksort($dateFilter);
		if (!empty((array)$dateFilter)) {
			foreach ($dateFilter as $pKey => $pVal) {
				//print_r($userIDs[1]);
				$ch = explode('-', $pVal);
				
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
				
				
				if ($ch[0] == $CI->session->userdata('loggedin')) {
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
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><img src="'.$link->link.'"  width="100px"></p>';
							}
							else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
							{
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><a href="'.$link->link.'" download><img src="'.base_url('assets/images/icon/'.strtolower($ext).'.png').'"  width="100px"></a></p>';
							}
							else
							{
								$html .= '<p class="chat_user_img" style="text-align:right; font-size:18px;"><img src="'.$link->link.'"  width="100px"></p>';
							}
							$html .= '<p class="chat_file_name" style="text-align:right;">' .$ch[3]. '<p>';
						}
					 
					$html .= '<p class="chat_user_time">' .$dt_time. '<p>'; 
					$html .= '</div>';				} 
				
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
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><img src="'.$link->link.'"  width="100px"></p>';
							}
							else if($ext == 'mp4' || $ext == 'MP4' || $ext == 'mp3' || $ext == 'MP3' || $ext == 'pdf' || $ext == 'PDF')
							{
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><a href="'.$link->link.'" download><img src="'.base_url('assets/images/icon'.strtolower($ext).'.png').'"  width="100px"></a></p>';
							}
							else
							{
								$html .= '<p class="chat_user_img" style="text-align:left; font-size:18px;"><img src="'.$link->link.'"  width="100px"></p>';
							}
							$html .= '<p class="chat_file_name" style="text-align:left;">' .$ch[3]. '<p>';
					}
					$html .= '<p class="chat_user_time">' .$dt_time. '<p>';
					$html .= '</div>';
				}
			}
		} else {
			$html .= '<div class="center" style="width:100%;float:right">';
			$html .= '<p style="text-align:center;">YOU CAN START CHATTING NOW.</p>';
			$html .= '</div>';
		}
		//$html .= '</div>';
		return $html;
		die;
		curl_close($ch);
	}
}
function getusername($userID)
{
	$CI = &get_instance();
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
			"Authorization: Bearer " . $CI->session->userdata("token"),
			"Content-Type: application/json"
		),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	$res = json_decode($response);
	return $res->username;
}



function getUsersNotification($ID)
{
	$CI = &get_instance();
	$logged_in = $CI->session->userdata('loggedin');

	//Getting Channel ID starts here

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => MMURL . "teams/" . TEAMID . "/channels/name/" . $ID,
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
	$res_channel_id = json_decode($response);


	if ($res_channel_id->status_code == '404') {
		$id = explode('__', $ID);
		$ID1 = $id[1] . '__' . $id[0];
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => MMURL . "teams/" . TEAMID . "/channels/name/" . $ID1,
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
		$res_channel_id1 = json_decode($response);
		$channel_id_response = $res_channel_id1;
	} else {
		$channel_id_response =  $res_channel_id;
	}
	$seconds = $channel_id_response->last_post_at / 1000;
	$date = date('Y-m-d H:i:s', $seconds);
	//print_r($channel_id_response);

	//Getting Channel ID ends here



	//Getting Unread Message starts here

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => MMURL . "users/" . $logged_in . "/channels/" . $channel_id_response->id . "/unread",
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
	$res_msg_count = json_decode($response);

	//Getting Unread Message ends here
	$notificationArray['count'] = $res_msg_count;
	$notificationArray['last_post'] = $date;
	return $notificationArray;
}

function getGroupNotification($channelId)
{
	$CI = &get_instance();
	$logged_in = $CI->session->userdata('loggedin');
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => MMURL . "users/" . $logged_in . "/channels/" . $channelId . "/unread",
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
	$res_msg_count = json_decode($response);

	//Getting Unread Message ends here

	return $res_msg_count;
}

function getMMUserDetailsByUsername($username)
{
	$CI = &get_instance();
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => MMURL."users/username/".$username,
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
	$user = json_decode($response);
	return $user;
}

function matterAdminLogin($username,$password)
{
	$CI = &get_instance();
	$url = MMURL."users/login";

			$post_data = array (
				"login_id" => $username,
				"password" => $password
			);
			
			 //print_r($post_data);die;
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
				else
				{
					list ($key, $value) = explode(': ', $line);

					$headers[$key] = $value;
				}
				//print_r($headers['Token']);
			$CI->session->set_userdata('admintoken',$headers['Token']);
			//print_r($CI->session->userdata('token'));die;
			curl_close($ch);
}

function mmNoRegUserSignUp($user_id,$username,$project_id)
{
	$CI = &get_instance();
	
	$url = MMURL."users";
			$username1 = str_replace(" ", "_", $username);
			$somerandom = rand(10,999);
			$post_data = array (
				"email" => $username1.$user_id.$project_id.$somerandom.'@xfactor.com',
				"username" => $username1.$user_id.$project_id.$somerandom,
				"first_name" => $project_id,
				"password" => 'Xfactor@12345'
			);
			
			 
			$ch = curl_init();
			 
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
			$output = curl_exec($ch);
			 
			curl_close($ch);
			 
			$matterUser = json_decode($output);
			//print_r($matterUser);
			matterAdminLogin(MMADMINUSERNAME,MMADMINPASSWORD);
			//print_r($matterUser->id);
			//print_r($CI->session->userdata('admintoken'));die;
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => MMURL."users/".$matterUser->id."/roles",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "PUT",
			  CURLOPT_POSTFIELDS =>"{\"roles\":\"system_user system_admin\"}",
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$CI->session->userdata('admintoken'),
				"Content-Type: application/json"
			  ),
			));

			$response = curl_exec($curl);
			//print_r($response);

			curl_close($curl);
			
			$post_dataa = array (
				"team_id" => TEAMID,
				"user_id" => $matterUser->id
			);
			$curll = curl_init();

			curl_setopt_array($curll, array(
			  CURLOPT_URL => MMURL."teams/".TEAMID."/members",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>json_encode($post_dataa),
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$CI->session->userdata('admintoken'),
				"Content-Type: application/json",
				"X-Requested-With: XMLHttpRequest"
			  ),
			));

			$responsee = curl_exec($curll);
			//print_r($responsee);

			curl_close($curll);
			$matterUsers['mm_id'] = $matterUser->id;
			$matterUsers['mm_username'] = $matterUser->username;
			$matterUsers['mm_email'] = $matterUser->email;
			//echo $matterUsers['mm_id'],$matterUsers['mm_username'],$matterUsers['mm_email'];die;
			return $matterUsers;
}

function mmlogin($mm_email)
{
	$CI = &get_instance();
	$url = MMURL."users/login";
	$post_data = array (
		"login_id" => $mm_email,
		"password" => 'Xfactor@12345'
	);
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
	$response = curl_exec($ch);
	$header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

	foreach (explode("\r\n", $header_text) as $i => $line)
		if ($i === 0)
			$headers['http_code'] = $line;
		else
		{
			list ($key, $value) = explode(': ', $line);

			$headers[$key] = $value;
		}
	curl_close($ch);
	$UserToken['token']=$headers['Token'];
	return $UserToken['token'];
}



function getdbusername($mm_id)
{
	$CI = &get_instance();
	$CI->load->model('common_model', 'common');
	$userd = $CI->common->getdbusername($mm_id);
	//print_r($userd->username);die;
	return $userd->username;
}

function getfulldetail($username)
{
	$CI = &get_instance();
	$CI->load->model('common_model', 'common');
	$fulldetail = $CI->common->dusername($username);
	return $fulldetail;
}

function GuestDetails($guestID)
{
	$CI = &get_instance();
	$CI->load->model('common_model', 'common');
	$guestDeatils = $CI->common->GuestDetails($guestID);
	return $guestDeatils;
}

function getGroupChat($gpmm_id)
{
	$CI = &get_instance();
	$CI->load->model('common_model', 'common');
	$userd = $CI->common->groupChat($gpmm_id);
	//print_r($userd->username);die;
	return $userd->chat_image;
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
$this->load->library('session');
		$this->lang->load('auth');
                $this->load->model('common_model', 'common');
				$this->load->model('project_model','project_m');
				$this->load->model('setting_model');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	 
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page 
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
                        redirect('auth/login', 'refresh');
		}
		else
		{
			$this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			
			//USAGE NOTE - you can do more complicated queries like this
			//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $this->data);
		}
	}
        
        
        function forgot_user(){
                       $data['title']='FORGOT USER ID';
					   $this->data['CountryCode']  = $this->common->getCountryCode();
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data); 
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_user', $this->data);
                        $this->load->view('include/footer');  
            
        }
        
        
        function forgot_password_user(){
            
                       
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_user_password');
                        $this->load->view('include/footer');   
            
        }
        
        
        function retrive_user(){
            
                       
                        $first_name = $this->input->post('first_name');
                        $last_name = $this->input->post('last_name');
                        $country_code = $this->input->post('country_code');
                        $mobile = $this->input->post('phone');
                       // $email = $this->input->post('email');
						
                        // $gender = strtolower($this->input->post('gender'));
                        // $birthday = strtolower($this->input->post('bday_year'));
                        // $company = strtolower($this->input->post('company'));
                        
                        
                        
                        
                        
                        $getuserid= $this->ion_auth->retriveUserId($first_name,$last_name,$country_code,$mobile);
                        
						$this->data['user']=$getuserid;
						$this->load->view('include/header');
						$this->load->view('include/menu',$data);
						$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'retrive_user', $this->data);
						$this->load->view('include/footer');
						
                        
        }

	/**
	 * Log the user in
	 */
	public function login($user_id=NULL,$project_id=NULL)
	{
		$this->data['title'] = $this->lang->line('login_heading');
		
		
		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page 
				$checklogoutuser=$this->common->checklastlogouthistory();
				if(empty($checklogoutuser->logout_datetime)){
					$array['user_id']=$this->session->userdata('user_id');
					$array['ip_address']=$_SERVER['REMOTE_ADDR'];
					$array['logout_datetime']=date("Y-m-d G:i:s");
					$id=$checklogoutuser->id;
					$this->common->updateloginhistory($array,$id);
					
					$array1['user_id']=$this->session->userdata('user_id');
					$array1['ip_address']=$_SERVER['REMOTE_ADDR'];
					$array1['login_datetime']=date("Y-m-d G:i:s");
					$this->common->storeloginhistory($array1);
				}else{
					$array['user_id']=$this->session->userdata('user_id');
					$array['ip_address']=$_SERVER['REMOTE_ADDR'];
					$array['login_datetime']=date("Y-m-d G:i:s");
					$this->common->storeloginhistory($array);
				}
				$this->session->set_userdata('checkdata',TRUE);
				//$_SESSION['checkdata']=1;
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				$mmuser  = $this->project_m->getUser($this->input->post('identity'));
				//print_r($mmuser);
				$url = MMURL."users/login";
				$post_data = array (
					"login_id" => $mmuser->mm_username,
					"password" => 'Xfactor@12345'
				);
				//print_r($post_data);die;
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
					//print_r($headers['Token']);
				$proRes = json_decode(substr($response, strpos($response, "\r\n\r\n")));
				//print_r($headers['Token']);die;
				$this->session->set_userdata('token',$headers['Token']);
				$this->session->set_userdata('loggedin',$proRes->id);
				// print_r(MMADMINUSERNAME);
				// print_r(MMADMINPASSWORD);die;
				curl_close($ch);
				$this->matterAdminLogin(MMADMINUSERNAME,MMADMINPASSWORD);
				
				
				$projectData=$this->project_m->FetchProjectDataById($this->session->userdata('project_id'))[0];
				
				
				if(!empty($projectData)){
					$registerUrl=$projectData->register_url;
					$this->session->unset_userdata('project_id');
					//header('Location: '.$registerUrl.'');
					redirect($registerUrl);
				}else{
					
					redirect('/', 'refresh');
				}
				
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];

			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			]; 
			$data['UserData']=$this->ion_auth->user($user_id)->row();
                       $data['title']="LOGIN";
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
                        $this->load->view('include/footer');
		}
	}
	
	public function matterAdminLogin($username,$password)
	{
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
					//print_r($headers);
				$this->session->set_userdata('admintoken',$headers['Token']);
				//print_r($this->session->userdata('admintoken'));die;
				curl_close($ch);
	}
	
	
	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";
		$checklogoutuser=$this->common->checklastlogouthistory();
		//print_r($checklogoutuser);die;
		$array['user_id']=$this->session->userdata('user_id');
		$array['ip_address']=$_SERVER['REMOTE_ADDR'];
		$array['logout_datetime']=date("Y-m-d G:i:s");
		$id=$checklogoutuser->id;
		$this->common->updateloginhistory($array,$id);
		// log the user out
		$this->ion_auth->logout();
		
		// redirect them to the login page
		redirect('auth/login', 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
                    echo "Plse login"; exit;
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			];
			$this->data['new_password'] = [
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			];

			// render
                        
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			 $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'change_password', $this->data);
                         $this->load->view('include/footer');
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{ 
                                
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
			];

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                      
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
                        $this->load->view('include/footer');
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		
		if (!$code)
		{
			show_404();
		}

		$this->data['title'] = $this->lang->line('reset_password_heading');
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
                        $this->load->view('include/footer');
				
			}
			else
			{
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($identity);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
                       
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
			redirect("auth/forgot_password", 'refresh');
                        $this->load->view('include/footer');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			$this->data['identity'] = $this->config->item('identity', 'ion_auth');

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}
	
	
	
	function register(){
	
	
		$this->data['title'] = $this->lang->line('create_user_heading');
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
		//	redirect('auth', 'refresh');
		}
		$user_ids=$this->session->userdata('user_id');
		$user=$this->ion_auth->user($user_ids)->row();
		 
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		//$this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		 
		//$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|is_unique[users.phone]');
		$this->form_validation->set_rules('mobile', 'Phone', 'trim|required');
		//$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		if(empty($user_ids)){
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		}
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|trim|xss_clean|is_unique[users.email]');
			//$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|is_unique[users.email]');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|trim|is_unique[users.email]');
			//$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|trim');
		}
		
		$url=$this->input->post('url');
		$project_name=$this->input->post('project_name');
		$register_header_image=$this->input->post('register_header_image');
		
		if ($this->form_validation->run() === TRUE)
		{
                       $otp=rand(100000,999999);
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password1 = $this->input->post('password');
			if(empty($user_ids)){
			$password=$this->ion_auth->hash_password($password1);
			}else{
				$password=$user->password;
			}
			$project_id=$this->input->post('project_id');
			$xmanage_id='XP'.rand(100000000000000,999999999999999);
			if(!empty($project_id)){
			$additional_data1 = [
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
				'registration_type' => 'GUEST',
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'), 
				'gender' => $this->input->post('gender'),
				'email' => $email,
				'password' => $password,
				//'salutation' => $this->input->post('gender'),
				'otp' => $otp,
				'username' => $this->input->post('username'), 
				'dob' => $this->input->post('bday_year'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'), 
				'did'=>$this->input->post('did'),
				'tel'=>$this->input->post('tel'),
				'extension'=>$this->input->post('extension'),
				'designation'=>$this->input->post('designation'),
				'remark_1'=>$this->input->post('remark_1'),
				'remark_2'=>$this->input->post('remark_2'), 
				'remark_3'=>$this->input->post('remark_3'),
				'remark_4'=>$this->input->post('remark_4'),
				'remark_5'=>$this->input->post('remark_5'),
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
			];
			
			
			$project_data = $this->project_m->FetchProjectById($project_id);
							
        $project_type=$project_data->project_type;
		$type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
							$guest_registration_type = 'PREREGWB';	
							}else{
							$guest_registration_type = 'ONLINEWB';

							}
			
			
			$additional_data = [
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
				
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'registration_type' => $guest_registration_type,
				'otp' => $otp,
				'username' => $this->input->post('username'), 
				//'dob' => $this->input->post('bday_year'), 
				//'project_id'=>$this->input->post('project_id'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'),
				'dob'=>$this->input->post('bday_year'),
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
				
			];
			}else{
			
	
				$additional_data = [
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				//'salutation' => $this->input->post('gender'),
				'registration_type' => 'WALK INS',
				'otp' => $otp,
				'username' => $this->input->post('username'), 
				//'dob' => $this->input->post('bday_year'), 
				//'project_id'=>$this->input->post('project_id'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'),
				'dob'=>$this->input->post('bday_year'),
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
				
			];
			} 
			
		} 
             
		if ($this->form_validation->run() === TRUE) 
		{
			$data_return =  $this->ion_auth->register($identity, $password, $email, $additional_data,array(),0,FALSE);
			// print_r($data_return); 
			// die;
			$user_id = $data_return['id'];
			$new = $data_return['new'];
			 //$new = 0;
			 
			
			 $this->session->unset_userdata('admintoken');	
			 
			  
				
                        if($user_id){
						
                       // check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth/otp/".$user_id."/".$new, 'refresh');   
                        }else{
                  			
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			if(!empty($url)){
				$this->data['url']=$url;
				$this->data['project_name']=$project_name;
				$this->data['register_header_image']=$register_header_image;
			
                        
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
			$this->load->view('project/project_register_unsuccess', $this->data); 
                        $this->load->view('include/footer');
			}else{
					
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
					$this->_render_page('auth/createuser_unsuccess', $this->data);
                    $this->load->view('include/footer');
			}
						
						
                        }

		}
		else
		{
                        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))); 
						$this->data['CountryCode']  = $this->common->getCountryCode();
			if(!empty($url)){
			
				
						$UserData=$this->project_m->checkurl($url);
						$DataField=json_decode($UserData->key);  
					    $this->data['alldata'] = $UserData;
					    $this->data['DataField'] = $DataField; 
                        $data['checkfront']=true;
                      $data['title']="REGISTRATION FORM";
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
						$this->data['reset_data'] = $_POST;
						$this->_render_page('project/temp_registration_page',$this->data);
                        $this->load->view('include/footer');
			}else{
				
                $this->data['reset_data'] = $_POST;
				$data['checkfront']=true;
				$data['title']="REGISTER AN ACCOUNT";
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user',$this->data);
                $this->load->view('include/footer');
			}
		}
	
	
	
	
	}
	
	
	
	

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		
		$this->data['title'] = $this->lang->line('create_user_heading');
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
		//	redirect('auth', 'refresh');
		}
		$user_ids=$this->session->userdata('user_id');
		$user=$this->ion_auth->user($user_ids)->row();
		
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		//$this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		
		//$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|is_unique[users.phone]');
		$this->form_validation->set_rules('mobile', 'Phone', 'trim|required');
		//$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		if(empty($this->session->userdata('email'))){
			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		}
		
		if ($identity_column !== 'email')
		{
			//$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|trim|xss_clean|is_unique[users.email]');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|[users.email]');
		}
		else
		{
			//$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|trim|is_unique[users.email]');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|trim');
		}
		
		$url=$this->input->post('url');
		$project_name=$this->input->post('project_name');
		$register_header_image=$this->input->post('register_header_image');
		
		if ($this->form_validation->run() === TRUE)
		{
                       $otp=rand(100000,999999);
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			
			$password1 = $this->input->post('password');
			if(empty($user_ids)){
			$password=$this->ion_auth->hash_password($password1);
			}else{
				$password=$user->password;
			}
			$project_id=$this->input->post('project_id');
			$xmanage_id='XP'.rand(100000000000000,999999999999999);
			if(!empty($project_id)){
			$additional_data1 = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'email' => $email,
				'password' => $password,
				//'salutation' => $this->input->post('gender'),
				'otp' => $otp,
				'steps'=>4,
				'username' => $this->input->post('username'), 
				'dob' => $this->input->post('bday_year'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'), 
				'did'=>$this->input->post('did'),
				'tel'=>$this->input->post('tel'),
				'extension'=>$this->input->post('extension'),
				'designation'=>$this->input->post('designation'),
				'remark_1'=>$this->input->post('remark_1'),
				'remark_2'=>$this->input->post('remark_2'), 
				'remark_3'=>$this->input->post('remark_3'),
				'remark_4'=>$this->input->post('remark_4'),
				'remark_5'=>$this->input->post('remark_5')
			];
			
			
			$project_data = $this->project_m->FetchProjectById($project_id);
							
        $project_type=$project_data->project_type;
		$type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
							$guest_registration_type = 'PREREGWB';	
							}else{
							$guest_registration_type = 'ONLINEWB';

							}
			
			
			$additional_data = [
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'registration_type' => $guest_registration_type,
				'otp' => $otp,
				'username' => $this->input->post('username'), 
				'password' => $password,
				//'dob' => $this->input->post('bday_year'), 
				//'project_id'=>$this->input->post('project_id'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'),
				'dob'=>$this->input->post('bday_year'),
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
				
				
			];
			}else{
			
	
				$additional_data = [
				'xmanage_id' => $xmanage_id,
				'user_type' => 'GUEST',
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company_name'),
				'phone' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				//'salutation' => $this->input->post('gender'),
				'registration_type' => 'WALK INS',
				'otp' => $otp,
				'username' => $this->input->post('username'), 
				'password' => $password,
				//'dob' => $this->input->post('bday_year'), 
				//'project_id'=>$this->input->post('project_id'),
				'salutation'=>$this->input->post('salutation'),
				'country_code' => $this->input->post('country_code'),
				'phone'=>$this->input->post('mobile'),
				'dob'=>$this->input->post('bday_year'),
				'created_datetime'=>date('Y-m-d G:i:s'),
				'created_xmanage_id'=>$xmanage_id,
				'created_username'=>$this->input->post('username'),
				'last_edit_datetime'=>date('Y-m-d G:i:s'),
				'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
				'last_edit_xmanage_id'=>$xmanage_id,
				'last_edit_username'=>$this->input->post('username')
				
			];
			} 
			
		} 
             
		if ($this->form_validation->run() === TRUE) 
		{
			$data_return =  $this->ion_auth->register($identity, $password, $email, $additional_data,array(),$project_id);
			$user_id = $data_return['id'];
			$new = $data_return['new'];
			 
			 $this->session->unset_userdata('admintoken');	
               if($user_id){
					$query = $this->db->get_where('xf_guest_users', array('user_id' => $user_id,'project_id'=>$project_id));
					$alreadyproject=$query->row();
					
			 if(!empty($project_id) && empty($alreadyproject)){ 
								
			 $project_data = $this->project_m->FetchProjectDataById($project_id)[0];
				
                        $project_type=$project_data->project_type;

			 $type1=array("ONLINE REG REQUIRED","ONSITE REG REQUIRED","HYBRID REG REQUIRED","ONLINE NO REG REQUIRED","ONSITE NO REG REQUIRED","HYBRID NO REG REQUIRED");
		if(in_array($project_type, $type1)){
							$guest_registration_type = 'PREREGWB';	
							}else{
							$guest_registration_type = 'ONLINEWB';

							}	
								if(!empty($user->xmanage_id)){
									$xmanage_id=$user->xmanage_id;
								}else{
									$xmanage_id=$xmanage_id;
								}
								//$group_id = $project_data->gro_id;
								$additional_data1['user_id'] =$user_id; 
								$additional_data1['project_id'] =$project_id; 
								$additional_data1['group_id'] =$project_data->group_id; 
								$additional_data1['xguest_id'] ='XPGS'.rand(100000000000000,999999999999999);
								$additional_data1['guest_registration_type'] = $guest_registration_type;
								$additional_data1['last_edited_date_time']=date("Y-m-d G:i");
							   $additional_data1['last_edited_ip_address']=$_SERVER['REMOTE_ADDR'];
							   $additional_data1['last_edited_xmanage_id']=$xmanage_id;
							   $additional_data1['last_edited_username']=$user->username; 
							   $additional_data1['created_date_time']=date("Y-m-d G:i");
							   $additional_data1['created_ip_address']=$_SERVER['REMOTE_ADDR'];
							   $additional_data1['created_xmanage_id']=$xmanage_id;
							   //$additional_data1['last_edited_username']=$this->session->userdata('username');
							   $additional_data1['created_username']=$user->username;
								$lastID=$this->project_m->InsertGenerateForm($additional_data1);
								  // check to see if we are creating the user
			// redirect them back to the admin page
				
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			//print_r($user_id);print_r($this->input->post('project_id'));
			$guestID = $this->project_m->getGuestID($user_id,$project_id);

			$mattrmostUser = $this->ion_auth->mattermostSignup($user_id,$this->input->post('username'),$lastID,$project_id);
			//print_r($mattrmostUser);die;
			//print_r($guestID);die;
			$this->project_m->updatemm($mattrmostUser,$lastID);
			redirect("auth/otp/".$user_id."/".$new, 'refresh');
							}else{
								
								$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
									if(!empty($url)){
										$this->data['url']=$url;
										$this->data['project_name']=$project_name;
										$this->data['register_header_image']=$register_header_image;
									
												
											   $this->load->view('include/header');
								$this->load->view('include/menu',$data);
									$this->load->view('project/project_register_unsuccess', $this->data); 
												$this->load->view('include/footer');
									}else{
											
											   $this->load->view('include/header');
								$this->load->view('include/menu',$data);
											$this->_render_page('auth/createuser_unsuccess', $this->data);
											$this->load->view('include/footer');
									}
							}
                        
                        }else{
       
                            			
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			if(!empty($url)){
				
				$this->data['url']=$url;
				$this->data['project_name']=$project_name;
				$this->data['register_header_image']=$register_header_image;
			
                        
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
			$this->load->view('project/project_register_unsuccess', $this->data); 
                        $this->load->view('include/footer');
			}else{
					
                       $this->load->view('include/header');
		$this->load->view('include/menu',$data);
					$this->_render_page('auth/createuser_unsuccess', $this->data);
                    $this->load->view('include/footer');
			}
						
						
                        }

		}
		else
		{
                        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))); 
						$this->data['CountryCode']  = $this->common->getCountryCode();
			if(!empty($url)){
			
				
						$UserData=$this->project_m->checkurl($url);
						$DataField=json_decode($UserData->key);  
					    $this->data['alldata'] = $UserData;
					    $this->data['DataField'] = $DataField; 
                        $data['checkfront']=true;
                       $data['title']="REGISTRATION FORM";
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
						$this->data['reset_data'] = $_POST;
						$this->_render_page('project/temp_registration_page',$this->data);
                        $this->load->view('include/footer');
			}else{
				$this->data['url']=$url;
                $this->data['reset_data'] = $_POST;
				$data['checkfront']=true;
				$data['title']="REGISTER AN ACCOUNT";
                       $this->load->view('include/header',$data);
		$this->load->view('include/menu',$data);
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user',$this->data);
                $this->load->view('include/footer');
			}
		}
	}
	
	
	
	function resendOtp($user){
		$this->ion_auth->resendOtp($user);	
		$this->session->set_flashdata('message', '<p style="color:#00b050;">YOUR ONE TIME PASSWORD (OTP) HAS BEEN RESEND TO YOU.</p>');
		redirect("auth/otp/".$user, 'refresh'); 
		
		
	}
 
        
        function createuser_unsuccess($id=false){
            	        $data['title'] =  'REGISTER UNSUCCESS';	 
                       
                       $this->load->view('include/header');
		        $this->load->view('include/menu',$data);
			$this->_render_page('auth/createuser_unsuccess',$data);
                        $this->load->view('include/footer');
            
        }
		
		function createSuccess($id=false){ 
		
			$this->ion_auth->CreateUserSuccessMail($id);
            	        $data['user'] =  $this->ion_auth->user($id)->row();	 
                        
                       $this->load->view('include/header');
		        $this->load->view('include/menu',$data);
			$this->_render_page('auth/createSuccess',$data); 
                        $this->load->view('include/footer');
            
        }
        
        
        function otp($user_id,$new=1){
                       $this->data['user'] =  $this->ion_auth->user($user_id)->row(); 
                       $data['new'] =$new;
                       $this->load->view('include/header');
		        $this->load->view('include/menu',$data);
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'enter_otp', $this->data);
                       $this->load->view('include/footer');
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
		$url='USER ID: '.$user_id.',  EMAIL ID: '.$user->email;
		$filename = $TemUrl.'test'.md5($url).'.png';
		QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$qrcode=basename($filename); 
		$this->db->where('id',$user_id);
		$this->db->update('users', array('qrcode'=>$qrcode));

		
		return $qrcode='<img src="'. base_url().'assets/qrphp/temp/'.basename($filename).'" />';
	}
	
        function verify_otp($user_id,$new=1){
                        $user =  $this->ion_auth->user($user_id)->row();
						
			 if(strtotime("now") > $user->otp_expire_time){
						
                        $this->session->set_flashdata('message', '<b style="color:red;">YOUR ENTERED OTP IS EXPIRED. PLEASE TRY RESEND AGAIN.</b>');
			            redirect("auth/otp/".$user_id, 'refresh');    
                         						
							
						}
						$qrcode=$this->GenarateQRCode($user_id);
						$project=$this->ion_auth->JoinprojectId($user->id);
						
						//Generate QR CODE
						$project=$this->ion_auth->JoinprojectId($user->id);
                        $opt = $this->input->post('otp');
                        if($opt==$user->otp && !empty($project->project_id)){
                          
						  
						  
                        $this->ion_auth->activate($user_id);
						 
                        $this->ion_auth->set_session($user);
                        
						$this->ion_auth->update_last_login($user->id);
						
						$this->ion_auth->CreateUserSuccessMail($user->id,$qrcode,TRUE,$project->project_id,$new);
                     		  
			             redirect("project/registersuccess/".$user_id, 'refresh');  
                        }elseif($opt==$user->otp){
							
			$this->ion_auth->activate($user_id);
                            
                        $this->ion_auth->set_session($user);
                        
						$this->ion_auth->update_last_login($user->id);
						$this->ion_auth->CreateUserSuccessMail($user->id,$qrcode,TRUE,TRUE,TRUE);
						//  $this->session->set_flashdata('message',OTP_VERIFY_SUCCESS);
						redirect("auth/createSuccess/".$user_id, 'refresh');
						}else{
                            
                        $this->session->set_flashdata('message', '<b style="color:red;">INCORRECT ONE TIME PASSWORD (OTP). PLEASE TRY AGAIN.</b>');
			            redirect("auth/otp/".$user_id, 'refresh');    
                        }

                        

        }
        
        
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		redirect('/', 'refresh');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result_array();
			
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = [
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				];

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $id);
					
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];
                
                $this->load->view('include/header');
		$this->_render_page('auth/edit_user', $this->data);
                $this->load->view('include/footer');
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
			else
            		{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
            		}			
		}
			
		// display the create group form
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['group_name'] = [
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name'),
		];
		$this->data['description'] = [
			'name'  => 'description',
			'id'    => 'description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('description'),
		];

		$this->_render_page('auth/create_group', $this->data);
		
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], array(
					'description' => $_POST['group_description']
				));

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
					redirect("auth", 'refresh');
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}				
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
		];
		if ($this->config->item('admin_group', 'ion_auth') === $group->name) {
			$this->data['group_name']['readonly'] = 'readonly';
		}
		
		$this->data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		];

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
	
	
	
	

	
	
	
	
	

}

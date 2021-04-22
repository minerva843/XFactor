<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ini_set('memory_limit', -1);
include "qrphp/qrlib.php";

class File_upload extends CI_Controller {

    //global variable
    var $Columfailed = "";
    var $dataToInsert = array();
    var $not_exists_model = array();
    var $not_exists_parts = array();
    var $remap_bom_array = array();

    function __Construct() {
        parent::__Construct();

    
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->library('table');
       
        //load model
        $this->load->model('Ion_auth_model');
        $this->load->model('Guest_model');
        $this->load->model('Places_model');
        $this->load->model('project_model','project_m');
        $this->load->model('common_model','common');
        
        $this->load->library('Excel');
        $this->load->helper(array('form', 'url', 'file', 'array')); 
    }
    
    
  
    /** @desc: This is main function used to process the uploaded file for user 
     * @param: void
     * @return JSON
     */
    
     public function process_upload_file_users() {

        log_message('info', __FUNCTION__ . "=> File Upload Process Begin " . print_r($_POST, true));
		$file_status = $this->get_upload_file_type_user();
       
        if ($file_status['file_name_lenth']) {
            if ($file_status['status']) {
               
                $data = $this->read_upload_file_header($file_status);
                $data['post_data'] = $this->input->post();
               
                if ($data['status']) {
                    $response = array();
                    //process upload file
                    switch ($data['post_data']['file_type']) {
                                      
                        case 'guest_excel':
                            //process msl excel  
                            $response = $this->process_upload_file_for_user($data,$file_status['sanitize_file_name']);
                            break;
                   
                        default :
                            log_message("info", " upload file type not found");
                            $response['status'] = FALSE;
                            $response['message'] = 'Something Went wrong!!!';
                    }
                    
            
                   $data_upload = array(
							'file_name'=>$file_status['sanitize_file_name'],
							'file_type'=>$file_status['extension'],
							'status'=>'SUCCESS',
							'file_size'=>$file_status['file_size'],
							'total_inserts'=>$response['total_inserts'],
							'xguestfileid'=>'XUP'.rand(100000000000000,9999999999999999),
							'created_date_time'=>date("Y-m-d G:i"),
							'created_ip_address'=>$_SERVER['REMOTE_ADDR'],
							'created_xmanage_id'=>$this->session->userdata('xmanage_id'),
							'created_username'=>$this->session->userdata('username'),
							'last_edited_date_time'=>date("Y-m-d G:i"),
							'last_edited_ip_address'=>$_SERVER['REMOTE_ADDR'],
							'last_edited_xmanage_id'=>$this->session->userdata('xmanage_id'),
							'last_edited_username'=>$this->session->userdata('username')
						);
                   
                   
                   $id = $this->Guest_model->update_file_uploads_users($data_upload);
                   $response['status'] = TRUE;
                   $response['message'] = $data['message'];
                   $response['id'] = $id;
                    
                   } // if ($data['status'])
				  else{
					   $response['status'] = FALSE;
					   $response['message'] = $data['message'];
                   
					}
                  
                  } // if ($file_status['status'])
				 else{
					   $response['status'] = FALSE;
					   $response['message'] = $data['message'];
				   }
                 } //($file_status['file_name_lenth'])
				else{
                   $response['status'] = FALSE;
                   $response['message'] = $data['message'];
                   
                   }

                echo json_encode(array('response'=>$response));
                 exit;
 }
    
    
   

    /** @desc: This function used to process the uploaded file - GUEST module
     * @param: void
     * @return JSON
     */
    public function process_upload_file() {

        log_message('info', __FUNCTION__ . "=> File Upload Process Begin GUEST " . print_r($_POST, true));
      
	        $file_status = $this->get_upload_file_type();
       
		//print_r( $file_status);  exit;
       
        if ($file_status['file_name_lenth']) {
            if ($file_status['status']) {
               
                $data = $this->read_upload_file_header($file_status);
            
                $data['post_data'] = $this->input->post();
               
                if ($data['status']) {
						$response = array();
						//process upload file
						switch ($data['post_data']['file_type']) {
										  
							case 'guest_excel':
								//process msl excel  
								$response = $this->process_guest_upload_file($data,$file_status['sanitize_file_name']);
								break;
					   
							default :
								log_message("info", " upload file type not found");
								$response['status'] = FALSE;
								$response['message'] = 'Something Went wrong!!!';
						}
						$user_ids=$this->session->userdata('user_id');
						$user=$this->ion_auth->user($user_ids)->row();
						
					   $data_upload = array(
						   'file_name'=>$file_status['sanitize_file_name'],
						   'file_type'=>$file_status['extension'],
						   'status'=>'SUCCESS',
						   'project_id'=>$_POST['project'],
						   'group_id'=>$_POST['group_id'],
						   'file_size'=>$file_status['file_size'],
						   'total_inserts'=>$response['total_inserts'],
						   'xguestfileid'=>'XGU'.rand(10000000,999999999),
						   'created_date_time'=>date("Y-m-d G:i"),
						   'created_ip_address'=>$_SERVER['REMOTE_ADDR'],
						   'created_xmanage_id'=>$user->xmanage_id,
						   'created_username'=>$this->session->userdata('username'),
						   'last_edited_date_time'=>date("Y-m-d G:i"),
						   'last_edited_ip_address'=>$_SERVER['REMOTE_ADDR'],
						   'last_edited_xmanage_id'=>$user->xmanage_id,
						   'last_edited_username'=>$this->session->userdata('username')
						);
					   
					   
					   $id = $this->Guest_model->update_file_uploads($data_upload);
					   $response['status'] = TRUE;
					   $response['message'] = $data['message'];
					   $response['id'] = $id;
                    
                   }
				   else{
					   $response['status'] = FALSE;
					   $response['message'] = $data['message'];
					   
                   
                   }
                  
                   }else{
                   $response['status'] = FALSE;
                   $response['message'] = $data['message'];
                   }
                   }else{
                   $response['status'] = FALSE;
                   $response['message'] = $data['message'];
                   
                   }

                    echo json_encode(array('response'=>$response));
                    
                    exit;
          
    }
    
    
    
    
        /**
     * @desc: This function is used to get the file type
     * @param void
     * @param $response array   //consist file temporary name, file extension and status(file type is correct or not)
     */
    private function get_upload_file_type() {
        log_message('info', __FUNCTION__ . "=> getting upload file type");
        

       // $sanitize_file_name = strtolower(str_replace(" ","-",$_FILES["file"]["name"]));
        $sanitize_file_name = strtoupper($_FILES["file"]["name"]);
        $check_file_exist = $this->Guest_model->check_guest_file_exist($sanitize_file_name);
        
       // print_r($check_file_exist);  exit;

        if (!empty($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 0 && empty($check_file_exist)) {
            if (!empty($_FILES['file']['name']) && $_FILES['file']['size'] > 0) {
                $pathinfo = pathinfo($_FILES["file"]["name"]);

                switch ($pathinfo['extension']) {
                    case 'xlsx':
                        $response['file_tmp_name'] = $_FILES['file']['tmp_name'];
                        $response['file_ext'] = 'Excel2007';
                        $response['extension'] = $pathinfo['extension'];
                        $response['file_size'] = $_FILES['file']['size'];
                        $response['sanitize_file_name'] = $sanitize_file_name;
                        break;
                    case 'xls':
                        $response['file_tmp_name'] = $_FILES['file']['tmp_name'];
                        $response['file_ext'] = 'Excel5';
                        $response['extension'] = $pathinfo['extension'];
                        $response['file_size'] = $_FILES['file']['size'];
                        $response['sanitize_file_name'] = $sanitize_file_name;
                        break;
                }
                if (!empty($response['file_ext'])) {
                
                        $filename = $_FILES['file']['name'];
					$uploadurl= './assets/excel/'.$filename;
					move_uploaded_file($_FILES['file']['tmp_name'],$uploadurl);
					
                
                    $response['status'] = True;
                    $response['file_name_lenth'] = True;
                    $response['message'] = 'File has been uploaded successfully. ';
                } else {
                    $response['status'] = False;
                    $response['file_name_lenth'] = false;
                    $response['message'] = 'File type is not supported. Allowed extentions are xls or xlsx. ';
                }
            } else {
                log_message('info', __FUNCTION__ . ' Empty File Uploaded');
                $response['status'] = False;
                $response['file_name_lenth'] = True;
                $response['message'] = 'File upload Failed. Empty file has been uploaded';
            }
        } else if (!empty($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 44) {
            log_message('info', __FUNCTION__ . 'File Name Length Is Long');
            $response['status'] = False;
            $response['file_name_lenth'] = false;
            $response['message'] = 'File upload Failed. File Name Length Is Long must be less than 44 chars';
        } else if(!empty($check_file_exist)){
            log_message('info', __FUNCTION__ . 'NFile name already exists! ');
            $response['status'] = False;
            $response['file_name_lenth'] = FALSE;
            $response['message'] = 'File upload Failed. File name already exists! ';
        }else{
        log_message('info', __FUNCTION__ . 'No File Selected!! ');
            $response['status'] = False;
            $response['file_name_lenth'] = True;
            $response['message'] = 'File upload Failed. No File Selected!! ';
        
        
        }
        return $response;
    }
    
    
    

    /**
     * @desc: This function is used to get the file type
     * @param void
     * @param $response array   //consist file temporary name, file extension and status(file type is correct or not)
     */
    private function get_upload_file_type_user() {
        log_message('info', __FUNCTION__ . "=> getting upload file type");
        

       // $sanitize_file_name = strtolower(str_replace(" ","-",$_FILES["file"]["name"]));
        $sanitize_file_name = strtoupper($_FILES["file"]["name"]);
        $check_file_exist = $this->Guest_model->check_guest_file_exist_users($sanitize_file_name);
        
       // print_r($check_file_exist);  exit;

        if (!empty($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 0 && empty($check_file_exist)) {
            if (!empty($_FILES['file']['name']) && $_FILES['file']['size'] > 0) {
                $pathinfo = pathinfo($_FILES["file"]["name"]);

                switch ($pathinfo['extension']) {
                    case 'xlsx':
                        $response['file_tmp_name'] = $_FILES['file']['tmp_name'];
                        $response['file_ext'] = 'Excel2007';
                        $response['extension'] = $pathinfo['extension'];
                        $response['file_size'] = $_FILES['file']['size'];
                        $response['sanitize_file_name'] = $sanitize_file_name;
                        break;
                    case 'xls':
                        $response['file_tmp_name'] = $_FILES['file']['tmp_name'];
                        $response['file_ext'] = 'Excel5';
                        $response['extension'] = $pathinfo['extension'];
                        $response['file_size'] = $_FILES['file']['size'];
                        $response['sanitize_file_name'] = $sanitize_file_name;
                        break;
                }
                if (!empty($response['file_ext'])) {
                
                        $filename = $_FILES['file']['name'];
					$uploadurl= './assets/excel/'.$filename;
					move_uploaded_file($_FILES['file']['tmp_name'],$uploadurl);
					
                
                    $response['status'] = True;
                    $response['file_name_lenth'] = True;
                    $response['message'] = 'File has been uploaded successfully. ';
                } else {
                    $response['status'] = False;
                    $response['file_name_lenth'] = false;
                    $response['message'] = 'File type is not supported. Allowed extentions are xls or xlsx. ';
                }
            } else {
                log_message('info', __FUNCTION__ . ' Empty File Uploaded');
                $response['status'] = False;
                $response['file_name_lenth'] = True;
                $response['message'] = 'File upload Failed. Empty file has been uploaded';
            }
        } else if (!empty($_FILES['file']['name']) && strlen($_FILES['file']['name']) > 44) {
            log_message('info', __FUNCTION__ . 'File Name Length Is Long');
            $response['status'] = False;
            $response['file_name_lenth'] = false;
            $response['message'] = 'File upload Failed. File Name Length Is Long must be less than 44 chars';
        } else if(!empty($check_file_exist)){
            log_message('info', __FUNCTION__ . 'NFile name already exists! ');
            $response['status'] = False;
            $response['file_name_lenth'] = FALSE;
            $response['message'] = 'File upload Failed. File name already exists! ';
        }else{
        log_message('info', __FUNCTION__ . 'No File Selected!! ');
            $response['status'] = False;
            $response['file_name_lenth'] = True;
            $response['message'] = 'File upload Failed. No File Selected!! ';
        
        
        }
        return $response;
    }

    /**
     * @desc: This function is used to get the file header
     * @param $file array  //consist file temporary name, file extension and status(file type is correct or not)
     * @param $response array  //consist file name,sheet name(in case of excel),header details,sheet highest row and highest column
     */
    private function read_upload_file_header($file) {
        log_message('info', __FUNCTION__ . "=> getting upload file header");
        try {
            $objReader = PHPExcel_IOFactory::createReader($file['file_ext']);
            $objPHPExcel = $objReader->load($file['file_tmp_name']);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($file['file_tmp_name'], PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $file_name = $_FILES["file"]["name"];
        move_uploaded_file($file['file_tmp_name'], './assets/excel/'.$file_name);
        
        
                             // $filename = $_FILES['file']['name'];
			//	$uploadurl= './assets/excel/'.$filename;
			//	move_uploaded_file($_FILES['file']['tmp_name'],$uploadurl);
        
        
        chmod('./assets/excel/' . $file_name, 0777);
        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestDataRow();
        $highestColumn = $sheet->getHighestDataColumn();
        $response['status'] = TRUE;
        //Validation for Empty File
        if ($highestRow <= 1) {
            log_message('info', __FUNCTION__ . ' Empty File Uploaded');
            $response['status'] = False;
        }

        $headings = $sheet->rangeToArray('A1:' . $highestColumn . 1, NULL, TRUE, FALSE);
        $headings_new = array();
        foreach ($headings as $heading) {
            $heading = str_replace(array("/", "(", ")", "."), "", $heading);
            array_push($headings_new, str_replace(array(" "), "_", $heading));
        }

        $headings_new1 = array_map('strtolower', $headings_new[0]);

        $response['file_name'] = $file_name;
        $response['header_data'] = $headings_new1;
        $response['sheet'] = $sheet;
        $response['highest_row'] = $highestRow;
        $response['highest_column'] = $highestColumn;
        return $response;
    }

 
 
     function check_column_exist($actual_header, $upload_file_header) {

        $is_all_header_present = array_diff($actual_header, $upload_file_header);
        if (empty($is_all_header_present)) {
            $return_data['status'] = TRUE;
            $return_data['message'] = '';
        } else {
            $this->Columfailed = "<b>" . implode($is_all_header_present, ',') . " </b> column does not exist.Please correct these and upload again. <br><br><b> For reference,Please use previous successfully upload file from CRM</b>";
            $return_data['status'] = FALSE;
            $return_data['message'] = $this->Columfailed;
        }

        return $return_data;
    }



// function to process user array read from Excel file - USER Module
//

    function process_upload_file_for_user($data,$filename_insert=NULL) {
        log_message('info', __FUNCTION__ . " => process upload excel file for users");
        $action_entity_id = "";
        $action_agent_id = "";
         $header_incorrect = FALSE;
 
        $sheetUniqueRowData = array();
        $header_column_need_to_be_present = array('gender', 'guest_type', 'salutation', 'first_name', 'last_name', 'display_name', 'email', 'country_code', 'mobile','company_name','company_address','company_postal_code','designation');
        //check if required column is present in upload file header
        $check_header = $this->check_column_exist($header_column_need_to_be_present, $data['header_data']);
        if ($check_header['status']) {
            $invalid_data = array();
            $flag = 1;
            $valid_flage = 1;
            $msg = "";
            $template1 = array(
                'table_open' => '<table border="1" class="table" cellpadding="2" cellspacing="0" class="mytable">'
            );

            $this->table->set_template($template1);
            $this->table->set_heading(array('COMPANY NAME','FIRST NAME', 'LAST NAME','PREFERRED NAME', 'COUNTRY CODE', 'MOBILE','EMAIL','REASON'));
            //get file data to process
            $post_data = array();
            $error_type = "";
            $reciver_entity_id = 0;
            $error_array = array();
 
			for ($row = 2, $i = 0; $row <= $data['highest_row']; $row++, $i++) {
                $rowData_array = $data['sheet']->rangeToArray('A' . $row . ':' . $data['highest_column'] . $row, NULL, TRUE, FALSE);
              
               $sanitizes_row_data = array_map('trim', $rowData_array[0]);

                if (!empty(array_filter($sanitizes_row_data))) {
                    $rowData = array_combine($data['header_data'], $rowData_array[0]);
                    if (!empty($rowData['email']) && !empty($rowData['gender']) && !empty($rowData['guest_type']) && !empty($rowData['salutation']) && !empty($rowData['first_name']) && !empty($rowData['last_name']) && !empty($rowData['display_name']) && !empty($rowData['country_code']) && !empty($rowData['mobile'])) {
                    
            
//							$select = '*';
							$where_part = array('email' => $rowData['email']);

//							$where = array(
//								'email'=>$rowData['email']
//							);
					
					//check email Exitene in user table
					    $result_email_exist = $this->Guest_model->FetchDataByWhereUser($where_part);
						
                        if (!empty($result_email_exist)) { 		// if found email in user table
								$error_type = "User ";
								$error_array[] = $error_type;
								$this->table->add_row($rowData['company_name'], $rowData['first_name'], $rowData['last_name'],$rowData['display_name'],$rowData['country_code'], $rowData['mobile'],$rowData['email'],'Email Already Exist in User List');
							$user_id = $result_email_exist[0]->id;	
						
						
//						$user_ids=$this->session->userdata('user_id');
//						$user=$this->ion_auth->user($user_ids)->row();
					  
//						$where_part = array('email' => $guest['email']);
//						$result_email_exist = $this->Guest_model->FetchDataByWhereUser($where_part);
//						$xmanage_id='XP'.rand(100000000000000,999999999999999);

						}
						else 
						{
								$user_ids=$this->session->userdata('user_id');
								$user=$this->ion_auth->user($user_ids)->row();	
								$xmanage_id='XP'.rand(100000000000000,999999999999999);
								$data_in_users = array(
										'registration_type'=>'MASS UPLOAD',
										'email'=>$rowData['email'],
										'xmanage_id' => $xmanage_id,
										'user_type' => 'GUEST',
										'first_name' => $rowData['first_name'],
										'last_name' => $rowData['last_name'],
										'company' => $rowData['company'],

										'company_address' => $rowData['company_address'],
										'pincode' => $rowData['company_postal_code'],		
										'designation' => $rowData['designation'],												
										'phone' => $rowData['phone'],
										'gender' =>$rowData['gender'],
										'active' =>1,
										'username' => $rowData['display_name'],
										'salutation'=>$rowData['salutation'],
										'country_code' => $rowData['country_code'],
										'company_postal_code' => $rowData['company_postal_code'],


										'did' => $rowData['did'],
										'tel' => $rowData['tel'],
										'extension' => $rowData['extension'],

										'created_datetime'=>date('Y-m-d G:i:s'),
										'mass_upload_filename'=>$filename_insert,
										'created_xmanage_id'=>$user->xmanage_id,
										'created_username'=>$this->session->userdata('username'),
										'created_ip_address'=>$_SERVER['REMOTE_ADDR'],
										'last_edit_datetime'=>date('Y-m-d G:i:s'),
										'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
										'last_edit_xmanage_id'=>$user->xmanage_id,
										'last_edit_username'=>$this->session->userdata('username')
									);
	
//check if below line is needed. Dont think so
	
									array_push($post_data, $data_in_users);
//         

										$identity = $data_in_users['email'];
										$password = $this->ion_auth->hash_password($rowData['email']);
	//									$email = $guest['email'];

										
										$user_id = $this->ion_auth->register($identity, $password,$identity, $data_in_users,array(),FALSE,TRUE);
			 //print_r($user_id); die;

										//Generate QR CODE
										$qrcode=$this->GenarateQRCode($user_id);

										//$this->Guest_model->UpdateDataByEmail($guest['email'],$user_id);
										$this->Ion_auth_model->CreateUserSuccessMail($user_id,$qrcode,TRUE,$_POST['project'],1);
								
								}
					} // END IF null check
				} // END IF (!empty(array_filter($sanitizes_row_data)) 
	   
			   else {
						$error_type = "Error in header";
						$error_array[] = $error_type;
						//$this->table->add_row($rowData['part_code'], $rowData['invoice_id'], $rowData['hsn_code'], $error_type);
					  }
				  } // END FOr loop
						
					
				} // END IF ($check_header['status']) 
			   else {
			
				 $header_incorrect = TRUE;
				 $this->table->add_row("Excel header is incorrect");
				}

                               $err_msg = $this->table->generate();

				/// Sending Mail ///
				//$check=$this->Places_model->FetchProjectTypeIdGuest($_POST['project']);
				$project_name='-';
				$message_table = $err_msg;
				$this->email->clear();
				$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
				$this->email->to($this->session->userdata('email'));
				$this->email->bcc('admin@xplatform.live');
					
				if($header_incorrect){
					$this->email->subject('XPLATFORM - USER UPLOAD UNSUCCESSFUL (WRONG FIELDS / SEQUENCE / FILE CORUPPTED)');
				}else{
					$subj = 'XPLATFORM – '.strtoupper($project_name).', MASS DATA ENTRY';
					$this->email->subject($subj);
				}
					

				$data_mass['table_body'] = $message_table;
				$data_mass['username'] = $this->session->userdata('username');
				$data_mass['project_name'] = $project_name;
				$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_mass_upload', 'ion_auth'), $data_mass, true);
				$this->email->message($message);

				if ($this->email->send())
					{
					 echo 'success mail';
					}

echo $this->email->print_debugger();
		////MAIL END SENDING ///

			if (!empty($post_data)) {
				$response['status'] = TRUE;
				$response['errors'] = $err_msg;
				$response['message'] = $err_msg;
				$response['total_inserts'] = count($post_data); 
			   
			} else {
				$response['status'] = FALSE;
				$response['errors'] = $err_msg;
				$response['total_inserts'] = 0;
		   
			}

		return $response;
		//  echo json_encode(array('response'=>$response));
		}


    /**

     * @desc: This function is used to validate upload file header
     * @param $actual_header array this is actual header. It contains all the required column
     * @param $upload_file_header array this is upload file header. It contains all column from the upload file header
     * @param $return_data array

     * */
    function process_guest_upload_file($data,$filename_insert=NULL) {
        log_message('info', __FUNCTION__ . " => process upload msl file");
        $action_entity_id = "";
        $action_agent_id = "";
         $header_incorrect = FALSE;
 
        $sheetUniqueRowData = array();
        $header_column_need_to_be_present = array('gender', 'guest_type', 'salutation', 'first_name', 'last_name', 'display_name', 'email', 'country_code', 'mobile','company_name','company_address','company_postal_code','designation');
 
		//check if required column is present in upload file header
        $check_header = $this->check_column_exist($header_column_need_to_be_present, $data['header_data']);
		
        if ($check_header['status']) {
            $invalid_data = array();
            $flag = 1;
            $valid_flage = 1;
            $msg = "";
            $template1 = array(
                'table_open' => '<table border="1" class="table" cellpadding="2" cellspacing="0" class="mytable">'
            );

            $this->table->set_template($template1);
            $this->table->set_heading(array('COMPANY NAME','FIRST NAME', 'LAST NAME','PREFERRED NAME', 'COUNTRY CODE', 'MOBILE','EMAIL','REASON'));
            //get file data to process
            $post_data = array();
            $error_type = "";
            $reciver_entity_id = 0;
            $error_array = array();
 
			for ($row = 2, $i = 0; $row <= $data['highest_row']; $row++, $i++) {
                $rowData_array = $data['sheet']->rangeToArray('A' . $row . ':' . $data['highest_column'] . $row, NULL, TRUE, FALSE);
                 
                $sanitizes_row_data = array_map('trim', $rowData_array[0]);
                if (!empty(array_filter($sanitizes_row_data))) {
                    $rowData = array_combine($data['header_data'], $rowData_array[0]);
                    if (!empty($rowData['email']) && !empty($rowData['gender']) && !empty($rowData['guest_type']) && !empty($rowData['salutation']) && !empty($rowData['first_name']) && !empty($rowData['last_name']) && !empty($rowData['display_name']) && !empty($rowData['country_code']) && !empty($rowData['mobile'])) {
                    
            
							$select = '*';
							$where_part = array('email' => $rowData['email'],'project_id'=>$_POST['project']);
						   
							$where = array(
								'email'=>$rowData['email'],
								'project_id'=>$_POST['project']
							);
							//check if email ID exists for duplicacy in Guest table for project
							$userdata = $this->Guest_model->FetchDataByWhere($where_part);
			  				if (!empty($userdata)) {
								$error_type = "User ";
								$error_array[] = $error_type;
								$this->table->add_row($rowData['company_name'], $rowData['first_name'], $rowData['last_name'],$rowData['display_name'],$rowData['country_code'], $rowData['mobile'],$rowData['email'],'Email Already Exist in Guest List');
							}
							
							$user_ids=$this->session->userdata('user_id');
							$user=$this->ion_auth->user($user_ids)->row();
							
						// if no record found in Guest table
						// create data for guest table
							if (empty($userdata)) {

									$guest = array(
										'project_id' => $_POST['project'],
										'group_id' => $_POST['group_id'],
										'guest_registration_type'=>'MASS UPLOAD',
										'guest_type' => $rowData['guest_type'],
										'email'=>$rowData['email'],
										'salutation' => $rowData['salutation'],
										'gender' => $rowData['gender'],
										'first_name' => $rowData['first_name'],
										'last_name' => $rowData['last_name'],
										'did' => $rowData['did'],
										'tel' => $rowData['tel'],
										'steps'=>4,
										'mass_upload_filename'=>$filename_insert,
										'username'=>$rowData['display_name'],
										'extension' => $rowData['extension'],
										'company' => $rowData['company_name'],
										'company_address' => $rowData['company_address'],
										'pincode' => $rowData['company_postal_code'],
										'designation' => $rowData['designation'],
										'country_code' => $rowData['country_code'],
										'phone' => $rowData['mobile'],
										'xguest_id' => 'XPGS'.rand(100000000000000,999999999999999),
										'created_date_time'=>date("Y-m-d G:i"),
										'created_ip_address' =>$_SERVER['REMOTE_ADDR'],
										'created_xmanage_id' =>$user->xmanage_id,
										'created_username'=>$this->session->userdata('username'),
										'last_edited_date_time'=>date("Y-m-d G:i"),
										'last_edited_ip_address'=>$_SERVER['REMOTE_ADDR'],
										'last_edited_xmanage_id'=>$user->xmanage_id,
										'last_edited_username'=>$this->session->userdata('username')
									);
									 
         
                                array_push($post_data, $guest);
                                $lastId =   $this->Guest_model->insert($guest);
								
//                                $this->ion_auth->mattermostSignup($guest['email'],$guest['username'],$lastId,$_POST['project']);
				
                                //check existence of user in User table based on Email ID
								$result_email_exist = $this->Ion_auth_model->getUserByEmailPhoneUsername(trim($guest['email'])); // chceking only for email as per last change

								$user_ids=$this->session->userdata('user_id');
								$user=$this->ion_auth->user($user_ids)->row();
								
								//no data for users in User table. Create array for insertion
								if(empty($result_email_exist)){ 
										$xmanage_id='XP'.rand(100000000000000,999999999999999);
										$data_in_users = array(
												'xmanage_id' => $xmanage_id,
											'user_type' => 'GUEST',
											'registration_type' =>' MASS UPLOAD',
											'first_name' => $guest['first_name'],
											'last_name' => $guest['last_name'],
											'company' => $guest['company'],
											'company_address' => $guest['company_address'],
											'pincode' => $guest['pincode'],
											'designation' => $guest['designation'],										
											'phone' => $guest['phone'],
											'did' => $guest['did'],
											'tel' => $guest['tel'],		
											'extension'	=>$guest['extension'],		
											'gender' =>$guest['gender'],
											'active' =>1,
											'mass_upload_filename'=>$filename_insert,											
											'username' => $guest['username'],
											'salutation'=>$guest['salutation'],
											'country_code' => $guest['country_code'],
											'created_datetime'=>date('Y-m-d G:i:s'),
											'created_xmanage_id'=>$user->xmanage_id,
											'created_username'=>$this->session->userdata('username'),
											'created_ip_address' =>$_SERVER['REMOTE_ADDR'],
											'last_edit_datetime'=>date('Y-m-d G:i:s'),
											'last_edit_ip_address'=>$_SERVER['REMOTE_ADDR'],
											'last_edit_xmanage_id'=>$user->xmanage_id,
											'last_edit_username'=>$this->session->userdata('username')
											);
										$identity = $guest['email'];
										$password = $this->ion_auth->hash_password($guest['phone']);
										$email = $guest['email'];

										$user_id = $this->ion_auth->register($identity, $password, $email, $data_in_users,array(),$guest['project_id'],TRUE);
		
										//Generate QR CODE for user table as it is new record and update in user table
										$qrcode=$this->GenarateQRCode($user_id,$_POST['project']);
												
										$this->Guest_model->UpdateDataByEmail($guest['email'],$user_id);
										$this->Ion_auth_model->CreateUserSuccessMail($user_id,$qrcode,TRUE,$_POST['project'],1);
			
								}
								else{ // record exists in user table
									$user_id = $result_email_exist[0]->id;
							 
							 
									//Generate QR CODE - not needed as record already there in DB
				//					$qrcode=$this->GenarateQRCode($user_id,$_POST['project'],$lastId);
									$emailid = $guest['email'];
									$this->Guest_model->UpdateDataByEmail($emailid,$user_id);
									$this->Ion_auth_model->CreateUserSuccessMail($user_id,$qrcode,TRUE,$_POST['project'],0);
								}

								// $mattrmostUser = $this->ion_auth->mattermostSignup($user_id,$rowData['display_name'],$lastId,$_POST['project']);
								//            $this->project_m->updatemm($mattrmostUser,$lastId);

								$user_table_check = $this->common->getChatUsersByProjectUser($user_id, $_POST['project']);

								if(empty($user_table_check)){
									$mattrmostUser = $this->ion_auth->mattermostSignup($user_id,$rowData['display_name'],$lastId,$_POST['project']);
								}
								else{
									$mattrmostUser = array(
										'mm_id' => $user_table_check->mm_id,
										'mm_username' => $user_table_check->mm_username,
										'mm_email' => $user_table_check->mm_email
										);
								} // END IF (empty($user_table_check)
			
	
							$this->project_m->updatemm($mattrmostUser,$lastId);
							$this->common->deletegetChatUsersInfoByProjectUser($user_id,$_POST['project']);
                       

                        } // END IF if (empty($userdata))
                    } // END IF of null check 
					else {
                        $error_type = "Error in header";
                        $error_array[] = $error_type;
 
                    }
                } // END IF (!empty(array_filter($sanitizes_row_data))
                   
                
            } // END for loop
        } //($check_header['status']) 
		
		else {
        
             $header_incorrect = TRUE;
             $this->table->add_row("Excel header is incorrect");
        }

                                     $err_msg = $this->table->generate();

	                              /// Sending Mail ///
	                              $check=$this->Places_model->FetchProjectTypeIdGuest($_POST['project']);
		                      $project_name=$check->project_name;
                                      $message_table = $err_msg;
					$this->email->clear();
					$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
					$this->email->to($this->session->userdata('email'));
					$this->email->bcc('admin@xplatform.live');
					
					if($header_incorrect){
					$this->email->subject('XPLATFORM - GUESTS UPLOAD UNSUCCESSFUL (WRONG FIELDS / SEQUENCE / FILE CORUPPTED)');
					}else{
					$subj = 'XPLATFORM – '.strtoupper($project_name).', MASS DATA ENTRY';
				        $this->email->subject($subj);
					}
					

					$data_mass['table_body'] = $message_table;
					$data_mass['username'] = $this->session->userdata('username');
					$data_mass['project_name'] = $project_name;
					$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_mass_upload', 'ion_auth'), $data_mass, true);
					$this->email->message($message);

					if ($this->email->send())
					{
					 //echo 'success mail';
					}


	////MAIL END SENDING ///

        if (!empty($post_data)) {
            $response['status'] = TRUE;
            $response['errors'] = $err_msg;
            $response['message'] = $err_msg;
            $response['total_inserts'] = count($post_data);
           
        } else {
            $response['status'] = FALSE;
            $response['errors'] = $err_msg;
            $response['total_inserts'] = 0;
       
        }

	return $response;
      // echo json_encode(array('response'=>$response));
    }

    
    
    
    
    function GenarateQRCode($user_id=NULL,$project_id=NULL,$lastId=NULL)
{
	$user = $this->ion_auth->user($user_id)->row();
	
		$TemUrl = './assets/qrphp/temp/';
		$errorCorrectionLevel = 'L';
		$matrixPointSize = 4;

		$url='User Id: '.$user_id.',  EMAIL ID: '.$user->email;
		$filename = $TemUrl.'test'.md5($url).'.png';
		QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		$qrcode=basename($filename);

		if(!empty($user_id)) {
			$this->db->where('id',$user_id);
			$this->db->update('users', array('qrcode'=>$qrcode));
		}

		if(empty($lastId)){
			$this->db->where('user_id',$user_id); 
			$this->db->where('project_id',$project_id);
			$this->db->update('xf_guest_users', array('qrcode'=>$qrcode));
		}else{
			$this->db->where('id',$lastId);
			$this->db->update('xf_guest_users', array('qrcode'=>$qrcode));
		}

		 
		return $qrcode='<img src="'. base_url().'assets/qrphp/temp/'.basename($filename).'" />';
}
    
       
 

    /**
     * @desc: This function is used to get required array from the given array
     * @param $parentArray array() 
     * @param $subsetArrayToGet array() 
     * @return array()
     */
    function get_sub_array(array $parentArray, array $subsetArrayToGet) {
        return array_intersect_key($parentArray, array_flip($subsetArrayToGet));
    }

 

    /**
     * @desc: This function is used to check duplicate values in the file and remove them 
     * @param $data array() 
     * @param $unique_arr array()
     * @return $response
     */
    function check_unique_in_array_data($data, $unique_arr = null) {
        //get unique 
        if (!empty($unique_arr)) {
            $is_unique_appliance = count(array_unique($unique_arr));
        } else {
            $is_unique_appliance = 1;
        }

        //get unique file data
        $arr_duplicates = array_diff_assoc($data, array_unique($data));

        //if appliance is not unique return message with duplicate appliance name
        //else if file has unique appliance then check file has unique combination else remove duplicate data from the final data
        if ($is_unique_appliance == 1) {
            if (empty($arr_duplicates)) {
                $response['status'] = TRUE;
                $response['message'] = "";
            } else {
                foreach ($arr_duplicates as $key => $value) {
                    unset($this->dataToInsert[$key]);
                }
                $response['status'] = TRUE;
                $response['message'] = "";
            }
        } else {
            $response['status'] = FALSE;
            $response['message'] = "File contains invalid data. Please check file and upload again.";
        }

        return $response;
    }

 
 
 
 
    function upload_guest_file() {
     // $this->load->view('include/header');
     $data['project_select'] = $_POST['project'];
     $data['group_id'] = $_POST['group_id'];
        $this->load->view('guest/guest_upload',$data);
    }
    
    
        function upload_guest_file_success($id) {
      
        $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
        //$id = $_POST['id'];
       // $sanitize_file_name = strtolower(str_replace(" ","-",$_FILES["file"]["name"]));
        $data['filedata'] = $this->Guest_model->get_guest_file_upload_data($id);
        $this->load->view('guest/guest_upload_success',$data);
    }
    
    
    
    function upload_guest_file_success_user($id) {
      
      //  $data['project_select'] = $_POST['project'];
       // $data['group_id'] = $_POST['group_id'];
        //$id = $_POST['id'];
       // $sanitize_file_name = strtolower(str_replace(" ","-",$_FILES["file"]["name"]));
        $data['filedata'] = $this->Guest_model->get_guest_file_upload_data_user($id);
        $this->load->view('users_mgmt/users_list/addNewSuccess',$data);
    }
    
    
            function upload_guest_file_failed() {
      
        $data['project_select'] = $_POST['project'];
        $data['group_id'] = $_POST['group_id'];
        $this->load->view('guest/guest_upload_failed',$data);
    }
    
    function all_guest_uploads(){
    
    
            $data['title'] = "GUEST";
			$data['project_select'] = $_POST['project'];
			$data['group_id'] = $_POST['group_id'];
            $this->load->view('guest_uploads/all_guest',$data);
   
    
    }
    
    
        public function searchUersUpload()
		{
			 
			$searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();

			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					//$searchFloor=array('f.floor_plan_grid_type'=>$_POST['floor_plan']);
				 
			if(!empty($_POST['selectData'])){
						// $searchGuestType=array('users_upload_history.guest_type '=>trim($_POST['selectData'])); 
					}
					
				}
				if(!empty($_POST['selectShortBy'] == 'file-a-z')){
					$searchDataOrderByAsc='users_upload_history.file_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					//$searchDataOrderByAsc='guest_upload_history.created_on';
				}
				
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users_upload_history.created_on';
					
					
				}
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='users_upload_history.last_edited_date_time';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='users_upload_history.created_on';
				}
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_edited_earliest')){
					$searchDataOrderByAsc='users_upload_history.last_edited_date_time';
				}
				
				
				 
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Guest_model->searchUsersListUpload($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$searchDataOrderByDsc);
				
				
			}
			
			else{
				
				$data1=$this->Guest_model->FetchAllDataUsersUpload();
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					
					foreach($data1 as $data){
						
						if(!empty($data['created_on'])){
							$last_edited_date_time=$data['created_on'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].'  class="viewusermainlist33">
							 
							
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['file_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td >'.$data['xguestfileid'].'</td>
								<td class="project_namecls" >'.$data['file_name'].'</td>
								
								<td>'.$data['file_type'] .'</td>
								<td class=""  >'.$data['file_size']/1024 .'KB</td> 
								
								
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
    
    
    
    
    
    
    
    public function search()
		{
			 
			$searchFloor='';
			$searchFloorOrderBy='';
			$data1 = array();
			$project = trim($_POST['project']);
			
			$workshop = trim($_POST['workshop']);
			
			
			
			if($workshop!=1){
			$hide = 'hide';
			
			}
			 
			if(!empty($_POST['selectData']) || !empty($_POST['selectShortBy']) || !empty($_POST['AllSearchData'])){
				if(!empty($_POST['selectData'])){
					//$searchFloor=array('f.floor_plan_grid_type'=>$_POST['floor_plan']);
				 
			if(!empty($_POST['selectData'])){
						$searchGuestType=array('guest_upload_history.guest_type '=>trim($_POST['selectData'])); 
					}
					
				}
				if(!empty($_POST['selectShortBy'] == 'file-a-z')){
					$searchDataOrderByAsc='guest_upload_history.file_name';
				}
				if(!empty($_POST['selectShortBy'] == 'lname-a-z')){
					//$searchDataOrderByAsc='guest_upload_history.created_on';
				}
				
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_first')){
					//$searchDataOrderByAsc='xf_guest_users.created_date_time';
					$searchDataOrderByDsc='guest_upload_history.created_on';
					
					
				}
				
				
				if(!empty($_POST['selectShortBy'] == 'GUEST_created_earliest')){
					$searchDataOrderByAsc='guest_upload_history.created_on';
				}
				
				
				 
				
				 
				if(!empty($_POST['AllSearchData'])){
					$AllSearchData=$_POST['AllSearchData'];
				}
				
				
				$data1=$this->Guest_model->searchGuestListUpload($searchGuestType,$searchFloorOrderBy,$searchDataOrderByAsc,$AllSearchData,$project,$searchDataOrderByDsc);
				
				
			}
			
			else{
				
				$data1=$this->Guest_model->FetchAllDataGuestUpload($project);
				
				 
				
			}
				$output = '';
				if($data1 > 0)
				{

					$project_name='';
					foreach($data1 as $data){
						
						if(!empty($data['created_on'])){
							$last_edited_date_time=$data['created_on'].'h';
						}else{
							$last_edited_date_time="NIL";
						}
						$checkId='SengleView_'.$data['id'];
							 $output .= '<tr id='.$data['id'].' onclick="reply_click(this.id)" class=" ">
							 
							
								<td class="deletesingle" >
								
								<input type="checkbox" data-project="'.$data['file_name'].'" id="d_'.$data['id'].'" name="delete_val[]" value="'.$data['id'].'" class="deletClas" style="display:none;">
								<label for="d_'.$data['id'].'"  class="deletClass '.$hide.'"></label>
								</td>
								
								
								
								
								<td class="capital_letter" >'.$last_edited_date_time.'</td> 
								
								
								<td >'.$data['xguestfileid'].'</td>
								<td class="project_namecls" >'.$data['file_name'].'</td>
								
								<td>'.$data['file_type'] .'</td>
								<td class=""  >'.$data['file_size']/1024 .'KB</td> 
								<td class=""  >'.$data['total_inserts'] .'</td> 
								
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
				$mydata['data']=$output; 
				$mydata['countdata']=count($data1);
				echo json_encode($mydata);
			
		} 
		
		
		
	        public function searchSingleDataUpload()
		{
			$id=$_GET['clicked_id'];
			$data=$this->Guest_model->FetchDataByIdUpload($id); 
			$data1=$this->Guest_model->FetchAllDataGuestUpload($project=NULL);
			$guestsinlist=$this->Guest_model->FetchAllDataGuestUploadInList($data->file_name);
			
			$list = '';
			if(!empty($guestsinlist)){
			foreach($guestsinlist as $guestlist){
			
			$list = $list.	'<td>GUEST ID</td>
						<td class="" >'.$guestlist['xguest_id'].'</td>
					  </tr>
					  
					  <tr>
						<td>EMAIL</td>
						<td class="" ></td>
					  </tr>
					  
					  <tr>
						<td colspan="2" class="sp_abc1 textprojectname running_latter"> '.$guestlist['email'].' </td>
					  </tr>
					  
					  <tr>
						<td>FIRST NAME</td>
						<td class="" >'.$guestlist['first_name'].'</td>
					  </tr>
					      
					  <tr class="">
						<td>LAST NAME</td>
						<td class="" >'.$guestlist['last_name'].'</td>  
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
			
			
			
			$checkNull='';
					if(empty($data1)){
						$checkNull .='<p class="dhg">THERE ARE NO GUESTS.</p>
						<p class="hjk">TO START, CLICK ADD.</p>
						';
					}else{
						$checkNull .='<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>';
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
						<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED :</span><span id="multipleGUESTSelect" style="color:black;" > '.$data->file_name.'</span></p></td>
					   </tr>
						
						
						<tr id="currentlyViewing" style="">
						<td  colspan="2" class="currentlyviewingclass"><p><span class="current-bold">CURRENTLY VIEWING :</span><span class="pname"> '.$data->file_name.'</span></p></td>
					    </tr>
						
						<tr>
							<td colspan="2" class="top-fc"><h5>GUEST LIST CREATION INFO</h5></td>
						</tr>
					    <body>
						<tr>
						<td>Group</td>
						<td>'.$data->group_name.'</td>
					  </tr>
					  <tr>
						<td class="fl_spaceid">Group Status</td>
						<td>'.$data->group_status.'</td>
					  </tr>
					  <tr>
						<td class="fl_spaceid">GUEST LIST ID </td>
						<td>'.$data->xguestfileid.'</td>
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
					  <tr>    
						<td class="fl_spaceid">Created User Name</td>
						<td>'.$data->created_username.'</td>
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
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST LIST INFO</b></td>
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
					   
					   
					      
					  	  
					<body>
						<tr>
							<td colspan="2" class="floor-ck"><b style="font-size: 16px;">GUEST LIST INSERT ENTRY INFO</b></td>
						</tr> '.$list.'
						
					 <tr>
					
					 
					  
					';
			}else{
				$output .= '
						'.$checkNull.'
						
					 ';
			}
			
			echo $output;
			
		}
		
		
		
		
		function deleteSelectedGUESTSuploadSuccess(){
		
		
		 $data['project_select'] = $_POST['project'];
                if(!empty($_POST['ids'])){
                  $ids = $_POST['ids'];
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected Success";
                  $data['selected'] = TRUE;
                  $data['success'] = TRUE;
                  $data['ids'] = $ids;
                  $data['guests'] = $this->Guest_model->getByIdWhereINupload($ids_arr); 
                  //$this->Guest_model->DeleteDataByMultipleIdGuestupload($ids_arr); 
                     
                }else{
                
                $data['selected'] = FALSE;
                $data['title'] = "Delete Selected Success";
                $data['guests'] = $this->Guest_model->getByIdWhereINupload(array(),$_POST['project']);
                
               // $this->Guest_model->DeleteDataByMultipleIdGuestupload(array(),$_POST['project']);  
                }  
                $data['group_id'] = $_POST['group_id']; 
                
                ////  MAIL //////
                $uploadfilesarr = array();
                foreach($data['guests'] as $fileupload){
                $uploadfilesarr[] = $fileupload['file_name'];
                }
                 $template1 = array(
                'table_open' => '<table border="1" class="table" cellpadding="2" cellspacing="0" class="mytable">'
                 );

                 $this->table->set_template($template1);
                 $this->table->set_heading(array('FILE NAME','FIRST NAME', 'LAST NAME','PREFERRED NAME', 'COUNTRY CODE', 'MOBILE','EMAIL'));
               $guestsinlist=$this->project_m->FetchAllDataGuestUploadInList($uploadfilesarr);
              
              foreach($guestsinlist as $fileguest){
              
              $this->table->add_row($fileguest['mass_upload_filename'], $fileguest['first_name'], $fileguest['last_name'],$fileguest['username'],$fileguest['country_code'], $fileguest['phone'],$fileguest['email']);
              
              }
              
                                      $deletedrowsguests = $this->table->generate();
                                      $message_table = $deletedrowsguests;
					$this->email->clear();
					$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
					$this->email->to($this->session->userdata('email'));
					$this->email->bcc('admin@xplatform.live');

					$subj = 'XPLATFORM MASS DATA ENTRY DELETED';
				        $this->email->subject($subj);
					
					$data_mass['table_body'] = $message_table;
					$data_mass['username'] = $this->session->userdata('username');
					//$data_mass['project_name'] = $project_name;
					$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_mass_upload_delete', 'ion_auth'), $data_mass, true);
					$this->email->message($message);

					if ($this->email->send())
					{
					 //echo 'success mail';
					}
               
         if(!empty($_POST['ids'])){
         $ids = $_POST['ids'];
         $ids_arr = explode(',', $ids);
         $this->Guest_model->DeleteDataByMultipleIdGuestupload($ids_arr); 

         }else{
         
          $this->Guest_model->DeleteDataByMultipleIdGuestupload(array(),$_POST['project']); 
         
         }
                //// MAIL END ////
            
		$this->load->view('guest_uploads/deleteallsucess',$data);
	

		}
		
		
		
	function deleteSelectedGUESTSupload(){
		       
                $data['project_select'] = $_POST['project'];
                if(!empty($_POST['ids'])){
                  $ids = $_POST['ids'];
                  $ids_arr = explode(',', $ids);
                  $where_in = $ids_arr;
                  $data['title'] = "Delete Selected";
                  $data['selected'] = TRUE;
                  $data['ids'] = $ids;
                  $data['guests'] = $this->Guest_model->getByIdWhereINupload($ids_arr); 
                  
                }else{
                   $data['title'] = "Delete Selected";
                   $data['selected'] = FALSE;
                   $data['guests'] = $this->Guest_model->getByIdWhereINupload(array(),$_POST['project']); 
                 
                    
                }
               $data['group_id'] = $_POST['group_id'];
		$this->load->view('guest_uploads/deleteall',$data);
	
	}
		
    
    

 
 
    
}


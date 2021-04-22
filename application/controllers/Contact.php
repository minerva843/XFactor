<?php
defined('BASEPATH') OR exit('No direct script access allowed');error_reporting(0);

class Contact extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->database();
		$this->load->library('form_validation');
		
    }
	
	public function index()
	{
		
		if($_POST){
			if ($this->input->post('submit')) {
				
				
				$memData = array();
            // Form field validation rules
            $this->form_validation->set_rules('contactfile', 'CSV file', 'required');
            
            // Validate submitted form data
            if($this->form_validation->run() == false){
               
                // If file uploaded
                if(is_uploaded_file($_FILES['contactfile']['tmp_name'])){
                    $this->load->library('CSVReader');
                    
                    $csvData = $this->csvreader->parse_csv($_FILES['contactfile']['tmp_name']);
					
                    if(!empty($csvData)){
                        foreach($csvData as $row){ 
								
                                $insert = $this->db->insert('contact_user',$row);
                               
                            }
							redirect('/contact-import');
                        }
						
						
						
				}else{ 
					$data['title'] = "Contact Excel Import";
					$this->load->view('include/header', $data);
					$this->load->view('contact/contact_import_excel');
					$this->load->view('include/footer');
				}
				}else { 
					$data['title'] = "Contact Excel Import";
					$this->load->view('include/header', $data);
					$this->load->view('contact/contact_import_excel');
					$this->load->view('include/footer');
				}
				

	}
	}
	else {
			$data['title'] = "Contact Excel Import";
			$this->load->view('include/header', $data);
			$this->load->view('contact/contact_import_excel');
			$this->load->view('include/footer');
		}
	}
	
	
}

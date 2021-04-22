<?php

defined('BASEPATH') OR exit('No direct script access allowed');


	
class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('auth_model', 'auth');
	$this->load->model('floor_model', 'floor_m');
        $this->load->model('Zone_model');
        $this->load->model('Project_model');
        $this->load->helper(['form', 'url']);
        $this->load->model('common_model', 'common');
        $this->load->library('email');
        $this->load->library('session');
           $this->load->library(['ion_auth', 'form_validation']);
        $this->load->model('group_model');
        $this->load->model('project_model','project_m');
    }
	
	function test1(){
           //  $this->load->view('include/header');
            $this->load->view('test');
            // $this->load->view('include/footer');
			
        }
    
	function test()
	 
	 { 
		 $BasePath= preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '',$_SERVER['SCRIPT_FILENAME']);
						    $TemUrl = $BasePath.'/XFactor/assets/qrphp/temp/';
							include "qrphp/qrlib.php";    
							$errorCorrectionLevel = 'L';  
							$matrixPointSize = 4;
							//$url=base_url().'auth/login/'.$user->email.'/'.$user->phone.'/'.$user->username; 
							$url=base_url().'auth/login/kamod'; 
							$filename = $TemUrl.'test'.md5($url).'.png';
							QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
							$qrcode='assets/qrphp/temp/'.basename($filename);
							$this->db->where('id',189);
							$this->db->update('users', array('qrcode'=>$qrcode));
							
							die;
		$BasePath= preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '',$_SERVER['SCRIPT_FILENAME']);
		 
    //$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $TemUrl = $BasePath.'/XFactor/assets/qrphp/temp/';
    include "qrphp/qrlib.php";    
    $errorCorrectionLevel = 'L'; 
    $matrixPointSize = 4;
    
    $url='http://13.235.169.150/XFactor/auth/login'; 
     $filename = $TemUrl.'test'.md5($url).'.png';
       QRcode::png($url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

    echo '<img src="'. base_url().'assets/qrphp/temp/'.basename($filename).'" />'; 
							
	 }
    
	
	
	
	
	
        public function deleteAllProjects()
	{
		$data['title'] = "Delete All Zones";
		$data['data1']=$this->project_m->FetchAllData();
		$this->load->view('zone/deleteZoneAll',$data);
	}
        
        
        function iframe(){
            
           
            $this->load->view('quiz/quiz');
           
        }
		
		
        
        
        function add(){
            
            $data['title'] = "Project Add";
			$data['data1'] = $MyProject;
			$data['CountryCode']=$CountryCode;
			$data['groups']=$this->group_model->get_groups();
			$this->load->view('project/addproject_old',$data);
        }
        
        
        function guest(){
            
            
            $this->load->view('guest/guest');
        }
        
        
       function addguest(){
            
            
            $this->load->view('guest/addguest');
        }
        
        
                function editguest(){
            
            
            $this->load->view('guest/edit');
        }
        
                function deleteguest(){
            
            
            $this->load->view('guest/delete');
        }
        
       function deleteAll(){
            
            
            $this->load->view('guest/deleteall');
        }
   
        function addSuccess(){
             $this->load->view('guest/addSuccess');
            
        }
    
        function xexperiance(){
            
            $data['title'] = "Home Page";
		$this->load->view('include/header', $data);
             $this->load->view('include/menu');
             $this->load->view('xconnect/xexperiance');
             $this->load->view('include/footer');
            
        }
        
        function audio(){
             $this->load->view('audio/audio');
            
        }
        
        function video(){
             $this->load->view('audio/video');
            
        }
        
        
        function about(){
             $data['title'] = "XCONNECT (ABOUT) ";
		$this->load->view('include/header', $data);
          $this->load->view('include/menu'); 
             $this->load->view('test/about');
             $this->load->view('include/footer');  
        }
        
        
        function screens(){
             $data['title'] = "Home Page";
		$this->load->view('include/header', $data);
             $this->load->view('include/menu');
             $this->load->view('homepage/testhome');
             $this->load->view('include/footer');  
        }
		
function info_buy(){
             $data['title'] = "INFO AND BUY";
		$this->load->view('include/header', $data);
             $this->load->view('include/menu');
             $this->load->view('chat/info_buy');
             $this->load->view('include/footer');  
        }

}

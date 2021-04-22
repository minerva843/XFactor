<?php
defined('BASEPATH') OR exit('No direct script access allowed');error_reporting(0);

/*
| -------------------------------------------------------------------------
| URI ROUTING
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';
$route['xconnect'] = 'home/all_listings_places';
$route['login'] = 'auth/index';
$route['register'] = 'auth/register'; 
$route['register-success'] = 'auth/registersuccess';
$route['verify'] = 'auth/verify';
$route['contact-import'] = 'contact/index';
$route['forget'] = 'auth/forget';
$route['forget-user-id'] = 'auth/forget_userid';
$route['forget-password'] = 'auth/forget_password';
$route['reset-password/(:any)/(:any)'] = 'auth/reset_password/$1/$2';
$route['reset-password'] = 'auth/reset_password';
$route['forget-success-userid'] = 'auth/forgetSuccessUserId';
$route['config'] = 'home/config';

$route['program_page/(:any)/(:any)'] = 'program_page/index/$1/$2';

$route['floor-plans-sorting'] = 'floor/index';
$route['addstep1-floor-plans'] = 'floor/addStep1FloorPlans';
$route['view-addstep1-floor-plans'] = 'floor/viewAddStep1FloorPlans';
$route['addstep2-floor-plans'] = 'floor/addStep2FloorPlans';
$route['view-addstep2-floor-plans'] = 'floor/viewAddStep2FloorPlans';
$route['addstep3-floor-plans'] = 'floor/addStep3FloorPlans';
$route['view-addstep3-floor-plans'] = 'floor/viewAddStep3FloorPlans';
$route['editstep1-floor-plans'] = 'floor/editStep1FloorPlans';
$route['editstep2-floor-plans'] = 'floor/editStep2FloorPlans';
$route['view-edit-floor-plans'] = 'floor/viewEditFloorPlans';
$route['delete-all-floor-plans'] = 'floor/deleteAllFloorPlans';
$route['delete-floor-plans'] = 'floor/deleteFloorPlans';
$route['View-AddFloorPlan-NotSuccess'] = 'floor/viewAddFloorPlansNotSuccess';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

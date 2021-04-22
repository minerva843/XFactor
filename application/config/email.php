
<?php
/* application/config/email.php */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| SendGrid Setup
|--------------------------------------------------------------------------
|
| All we have to do is configure CodeIgniter to send using the SendGrid
| SMTP relay:
*/
$config['protocol']	= 'smtp';
$config['smtp_port']	= 587;
$config['smtp_host']	= 'mail.xmanage.network';
$config['smtp_user']	= 'admin@xmanage.network';
$config['smtp_pass']	= 'NoDelays2020';
$config['mailtype']	= 'html';


?>
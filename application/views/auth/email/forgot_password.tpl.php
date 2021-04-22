<html>

<head>
<style>   
      
      
h2 {
    font-weight: normal;
    font-size: 16px;
}
 p {  
    font-size: 14px;
}

.im {
    color: #000000;
}
        

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">    
   
 body{
	font-family: 'Roboto', sans-serif!important;   
    }         
	
 
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css">
</head>

<body>   
	<p style="color: #000000;"><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></p>
	<h2 style=" font-size: 16px; color: #000000;"><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></h2>   
</body>
</html>
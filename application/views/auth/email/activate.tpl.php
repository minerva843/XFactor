<!--
<html>
<body>
	<h1><?php //echo sprintf(lang('email_activate_heading'), $identity);?></h1>
	<p><?php //echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?> OR Enter OTP <?php //echo $otp; ?> in your web browser</p>
</body>
</html>
-->

<html>
<head>

<style>
@media (min-width: 1200px)
.container-fluid {
    max-width: 1140px;
}
.container-fluid {
     max-width: 1140px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

@font-face {
  font-family: calibri;
  src: url(<?php echo base_url(); ?>assets/fonts/calibri.ttf);
}      
   
body{
	font-family: calibri!important;
   }   

.success p{
font-size:18px;
}
p.note {
    font-size: 18px;
    text-transform: uppercase;
}  
.main-section{margin: 50 auto;}
@media screen and (min-width: 1650px){
.container-fluid {
    max-width: 1920px;
}
}  



<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">    
   
 body{
	font-family: 'Roboto', sans-serif!important;   
    }          
  
</style>


</head>  
<body>       
        <div class="main-section">
		    <div class="container-fluid">
				<div class="col-md-12">
                   <div class="row">
				       <div class="email_content">
				         <table>
				          <tbody>
						     <div class="success">
							 <p> <b> OTP is <?php echo $otp; ?> </b></p>  
							 <p> OTP will be valid for 5 minutes only.</p>
							 </div>   
						   </tbody>
						  </table>
						  
						   <p style="font-size:14px ; padding-bottom:0px; font-family:calibri ; margin-bottom:0px; font-weight:bold ;">WARMEST REGARDS</p>
		                  <p style="font-size:11px; padding-bottom:0px; font-family:calibri ; "><span style="font-size:11px;">THE XPLATFORM TEAM</span></p>
						   <p style="font-size:11px; font-family:calibri ; text-transform: initial;">This is a computer generated email. Please do not reply.</p>
						  
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
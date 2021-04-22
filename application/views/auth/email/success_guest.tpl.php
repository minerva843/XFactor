
<html>
<head>

<style>

.container-fluid {
     max-width: 1140px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.email_content h3 {
    font-weight: normal;
}
.email_content span{
    font-weight: 600;
}
.email_content h4 {
    font-weight: normal;
}

.email_content table{width:100%;}

table tr td:nth-child(1) {
    width: 18%;
    font-weight: 600;
}

/* table tr td:nth-child(2) {
    width: 80%;
}    */
table.mail-table-2 tr td:nth-child(1) {
 /*   width: 18%;    
    font-weight: bold;  */
}   
table.mail-table-3 tr td:nth-child(1) {
   width: 18%;  
}
h2 {
    text-transform: uppercase;
}
h6 {
    margin-top: 20px;
    margin-bottom: 2px;
}
td.shop {
    font-weight: 600 !important;
}
h5 {
    font-size: 20px;
    margin-bottom: 0px;
}
p.team-rgds {
    font-size: 20px;
	    margin-top: 5px;
}
p.note {
    text-transform: uppercase;
}
td.space {
    padding-bottom: 12px;   
}    
td.space2 {
    padding-bottom: 12px;
}
td.space3 {
    padding-bottom: 30px;
}
table.userrr td{font-size:14px !important;}
b,td,h4,h2,p,h6{
	font-family:calibri !important;
}
.user-name span{
	text-transform:uppercase;
}
body{font-family: calibri!important;}
.main-section{margin: 50 auto;}

</style>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css">

</head>         <div class="main-section">
				<div class="container-fluid">
				<div class="col-md-12">
                   <div class="row">
				   <div class="email_content">
				   <table class="userrr">
				   <tbody>
				   <div class="ext-content" style="width:100%;">
                        <h4 class="user-name" style="font-size:11px;">Hi <span style="font-size:11px; font-weight:600;"><?=$username;?></span>,</h4> 
						<h4 style="font-size:11px !important; font-weight:normal !important;">Thank you for registering.</h4>
						<?php if(empty($project)){?>
						
						 
				<tr style="font-size:11px; width:100% !important;">
				<td colspan="2" style="font-size:11px!important; padding-bottom:10px; width:100%!important;">
				<b style="font-size:11px; weight:bold !important;">XPLATFORM</b>
				<span style="font-size:11px!important; weight:normal!important;"> User Account - REGISTRATION SUCCESSFUL. </span> </td>   	
				</tr>     
						   
						<?php }else{?>
						<div class="success" style="width:100% !important">
						
						<tr style="font-size:11px; width:100% !important;">
						
					
					
					<?php if(strpos($project_type,"NO REG REQUIRED")){ ?>
					
					<td colspan="2" style="font-size:11px!important; padding-bottom:10px; width:100%!important;">
				
				<span style="font-size:11px!important; weight:normal !important;"> <?php echo strtoupper($project_name);?> - REGISTRATION SUCCESSFUL. </span> </td>
					<?php }else{ ?>
					
					<td colspan="2" style="font-size:11px!important; padding-bottom:10px; width:100%!important;">
				
				<span style="font-size:11px!important; weight:normal !important;"> <?php echo strtoupper($project_name);?> - HAS INCLUDED YOU TO GUEST LIST. </span> </td>
					
					<?php }  ?>
					

				</tr>
						</div>    
						<?php }?>    
						
						</div>
						<!-- <p>TO GET STARTED YOU, LOGIN CREDENTIALS ARE LISTED BELOW:</p>	 -->	

						<tr style="font-size:14px; width:100% !important;">
				<td colspan="2" style="font-weight:bold !important; padding-bottom:10px; font-size:14px!important; padding-bottom:10px; width:100%!important;">YOUR XPLATFORM ACCOUNT LOG IN CREDENTIALS</td>						   		
				</tr>
						
					    <tr>
						   <td style="font-weight:bold !important; font-size:11px !important; padding-bottom:10px; width:22%;">WEBSITE ADDRESS</td>
						   <td style="font-size:11px !important; padding-bottom:10px;">: <a href="<?=$website;?>"><?=$website;?></a></td>				       
						</tr>   
						
					   	<tr>
						   <td style="font-weight:bold !important; font-size:11px !important; padding-bottom:10px; width:22%;">USER NAME </td>
						   <td style="font-size:11px !important; padding-bottom:10px;">: <?=$username;?></td>
				       </tr>
				       
				       
				       <?php if(strpos($project_type,"NO REG REQUIRED")){ ?>
				       <tr>
						   <td style="font-weight:bold !important; font-size:11px !important; padding-bottom:10px; width:22%;">PASSWORD</td>
						   <td style="font-size:11px !important; padding-bottom:10px;">: <a target="_blank" href="<?php echo base_url(); ?>auth/reset_password/<?php echo $forgotten_password_code; ?>" >Click to reset </a></td>
				       </tr>
				       
				       <?php }  ?>
						     
				       
				          
				          
					   	<tr>
				<td style="font-weight:bold !important; vertical-align: top!important; font-size:11px !important; padding-bottom:10px; width:22%;">QR CODE  </td>
						   <td style="font-size:11px !important; vertical-align: top!important; padding-bottom:10px;"> <p style="position: absolute;">: </p> <?php echo $qrcode;?>  
						   </td>    
				       </tr>
					   
					   </tbody>
					   </table>
					    
<?php if(!empty($project)){?>
<p style="padding-bottom:6px; font-size:11px;">This QR code allows us to check you in conveniently when visiting physical venues (not online).</p>

<?php }else{?> 
<p style="padding-bottom:6px; font-size:11px;">This QR code contain your user details.</p>
<?php }?>
					   
					   <h2 style="font-size:14px; padding-bottom:6px; width:100%;">YOUR REGISTRATION DETAILS<h2>  
					   <!-- <h2>quick tips<h2> -->
					<!--    <p>with your xmange account you will be enjoy access to the fllowing features:</p>
					   <h6>XCONNECT</h6> -->
					   
					    <table class="mail-table-3">  
					   <tbody>
					   <?php if(!empty($salutation)){?>
					   	<tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; width:25%;">SALUTATION</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$salutation?></td>
				       </tr>
					   <?php } if(!empty($gender)){?>
					   	<tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; width:25%;;">GENDER</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$gender?></td> 
				       </tr>
					   <?php } if(!empty($first_name)){?>
					   	<tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; text-transform:uppercase; width:25%;">FIRST NAME</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$first_name?></td>
				       </tr>
					   <?php } if(!empty($last_name)){?>
					     	<tr>
						   <td style="font-size:11px !important; padding-bottom:10px; font-weight:600; width:25%;">LAST NAME</td>
						   <td style="font-size:11px;  padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$last_name?></td>
				       </tr>
					   <?php } if(!empty($username)){?>
					   	<tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; text-transform:uppercase; width:25%;">USER NAME</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$username?></td>
				       </tr>
					   <?php } if(!empty($alldata->company)){?>
					   <tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; text-transform:uppercase; width:25%;">COMPANY NAME</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->company?></td>
				       </tr> 
					 
					   <?php } if(!empty($alldata->country_code)){?>
					   <tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600;text-transform:uppercase; width:25%;">COUNTRY CODE</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->country_name?> +<?=$alldata->phonecode?></td>
				       </tr>
					   <?php } if(!empty($alldata->phone)){?>
					   <tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; text-transform:uppercase; width:22%;">MOBILE</td>
						   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->phone?></td>
				       </tr>
					   <?php } if(!empty($alldata->dob)){?> 
					   <tr>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:600; width:22%;">BIRTHDAY</td>
						   <td style="font-size:11px; padding-bottom:10px; font-weight:normal;">: <?=$alldata->dob?></td>
				       </tr>
					   <?php }?>
					  
					   </tbody>
					   </table>
					   
					    <h2 style="font-size:14px; font-weight:600;">QUICK TIPS</h2>
						<?php if(!empty($project)){?>
<p style="font-size:11px;width:100%">Using your <b style="font-size:11px;">XPLATFORM</b> account, not only will you be able to attend <?php echo strtoupper($project_name);?></p>
</br>
<p style="font-size:11px;width:100%">You will be also be able to log in at any time to enjoy access to the following features: </p>
<?php }else{?>
<p style="font-size:11px;width:100%">Using your <b style="font-size:11px;">XPLATFORM</b> account, you will be able to enjoy access to the following features:</p>
<?php }?>
							
					   <table class="mail-table-2">
					   <tbody>
					    <p style="font-size:11px; font-weight:600!important; margin-bottom:2px;"><b>XCONNECT</b></p>
					   
					    <tr>   
						   <td class="shop" style="font-weight:bold !important; font-size:11px; padding-bottom:10px; width:22%;"><b>ALL PLACES</b></td>
						   <td class="spac1" style="font-size:11px;">: List of all places you can explore on <b style="font-size:11px; font-weight:600;">XPLATFORM</b></td>
				       </tr>
					   
					   <tr>
					<td class="shop" style="font-weight:bold !important; font-size:11px; padding-bottom:10px; width:22%;"><b>LET'S EXPLORE</b></td>
						   <td class="spac1" style="font-size:11px;">: Interactive user interface. This is the key highlight of <b style="font-size:11px; font-weight:600;">XCONNECT</b></td>
				       </tr>
					   
					   
					   	<tr>   
						   <td style="font-size:11px; font-weight:bold !important; padding-bottom:10px; width:22%;"><b>SIMPLE VIEW </b></td>
						   <td style="font-size:11px;">: Concise and precise user interface.</td>    
				       </tr>
					 
					   	<tr>
						   <td class="shop" style="font-weight:bold !important; font-size:11px; padding-bottom:10px; width:22%;"><b>XSHOP</b></td>
						   <td class="spac1" style="font-size:11px;">: In short, retail therapy. Window shop or make purchase.</td>
				       </tr>
						   
					   <div>
					      	<tr>
						   <td class="shop" style="font-weight:bold !important ; font-size:11px; padding-bottom:10px; width:22%;"><b>XCONTEST</b></td>
						   <td class="spac2" style="font-size:11px;">: Games and Contests that you play when you are onsite. 
</td>
				       </tr>      
					   	<tr>
						   <td class="shop" style="font-weight:bold !important; font-size:11px; padding-bottom:30px; width:22%;"><b>XME</b></td>
						   <td class="spac3" style="font-size:11px; padding-bottom:30px;">: Your account details</td> 
				       </tr> 
					   </tbody>
					   </table>
                      <h2 style="font-size:14px;">FOR ASSISTANCE</h2>
					  <?php if(!empty($project)){?>
 <P style="font-size:11px;width:100%;">We hope that you have a good time at <?=strtoupper($project_name);?>.</P>
<?php }else{?>
 <P style="font-size:11px;width:100%;">Have fun on <span style="font-size:11px; font-weight:600;">XPLATFORM!</span></P>
<?php }?>
					      
					<p style="font-size:11px;">Should you require further assistance, we can be contacted via support@xplatform.live</p>
					<p style="font-size:14px !important; padding-bottom:0px!important; margin-bottom:0px!important; font-weight:bold !important;">WARMEST REGARDS,</p>
					  <p class="team-rgds" style="font-size:14px; padding-bottom:10px;">THE <span style="font-size:14px; font-weight:600;">XPLATFORM</span> TEAM</p>
					  
					   <p class="note" style="font-size:11px;">This is a computer generated email. please do not reply.</p>
                    </div>
					</div>
					</div>
					</div>
					</div>
					</body>
					</html>

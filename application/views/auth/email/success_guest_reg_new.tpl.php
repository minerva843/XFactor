
<html>
	<head>
	

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">    
   <style>
 body{
	font-family: 'Roboto', sans-serif!important;   
    }      
	</style>           
	</head>   
	<body>
		<table>
			<tbody>
				<tr style="font-size:11px; padding-bottom:10px; width:100%;"> <td colspan="2">Hi <span style="font-size:11px;"><?=$username;?></span>, </td></tr>     
				<tr><td colspan="2"> &nbsp;</td></tr>
				<tr style="font-size:11px; padding-bottom:10px; width:100%;"> <td colspan="2">Thank you for registering. </td></tr> 
				<tr><td colspan="2"> &nbsp;</td></tr>
				<tr style="font-size:11px; width:100% ;">
					<td colspan="2" style="font-size:11px; width:100%;">
							<span style="font-size:14px; font-weight:bold ; "> XPLATFORM - REGISTRATION FOR <?php echo $project_name; ?> SUCCESSFUL </span>
					</td>      	
				</tr>    
				<tr><td colspan="2"> &nbsp;</td></tr>			
				<tr>
					<td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:22%;">QUICK LINK TO PLACE</td>
					<td style="font-size:11px ; padding-bottom:10px;">: <a href="<?=$website.'places/index/'.$project_id;?>"><?=$website.'places/index/'.$project_id;?></a></td>				       
				</tr> 
				<tr></tr>			
			</tbody>
		</table>    

		<table style="width:100%;">
			<tbody>
				<tr>
					<td style=" font-size:11px ; padding-bottom:10px; width:100%;">
						<div >
							<p>NOTE: This email was generated if you have registered successfully via registration form, or you have <br> been added to guest list by  <span style="font-weight:bold ;"><?php echo $project_name; ?> </span>.  To be excluded, simply inform  <span style="font-weight:bold ;"><?php echo $project_name; ?> </span> <br> through chat feature on XCONNECT.
							</p>
						</div>
					</td>
				</tr> 	     
				<tr></tr>
			 </tbody>
		</table>            
		
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style=" font-size:14px ; font-weight:bold ; padding-bottom:10px; width:100%;">
						XPLATFORM - USER ACCOUNT DETAILS
					</td>
				</tr> 	
				<tr></tr>
			 </tbody>
		</table>
							  
		<table>
			<tbody> 				
				<tr></tr>
				<tr>
					<td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:20%;">WEBSITE ADDRESS</td>
					<td style="font-size:11px ; padding-bottom:10px;">: <a href="<?=$website;?>"><?=$website;?></a></td>				       
				</tr>  

				<tr>
					<td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:20%;">REGISTERED EMAIL</td>
					<td style="font-size:11px ; padding-bottom:10px; text-transform: initial;">: <?=$alldata->email?></td>				       
				</tr> 

				<tr>
					<td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:20%;">REGISTERED MOBILE</td>
					<td style="font-size:11px ; padding-bottom:10px;">: +<?php echo $phonecode; ?> <?=$alldata->phone?></td>				       
				</tr>  						
								
				<tr>
				   <td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:20%;">USER NAME </td>
				   <td style="font-size:11px ; padding-bottom:10px; text-transform:uppercase;">:  <?=$alldata->username?></td>
				</tr>

				<tr>
					<td style="font-weight:bold ; vertical-align: top; font-size:11px ; padding-bottom:10px; width:20%; vertical-align: top;">QR CODE  </td>
					<td style="font-size:11px ; vertical-align: top; padding-bottom:10px;"> <p style="position: absolute;">: </p> <?php echo $qrcode;?>  </td>    
				</tr>
				<tr></tr>			   
			</tbody>
		 </table>
							   
		<?php if(!empty($project)){?>
		<p style="padding-bottom:6px; font-size:11px;">This QR code contains your user details.</p>

		<?php } ?>
		 <h2 style="font-size:14px; padding-bottom:6px; width:100%;">XPLATFORM – NEW USER ACCOUNT ACTIVATION<h2>   
					 
					 <p style="padding-bottom:10px; font-size:11px; text-transform: initial;">To activate your XPLATFORM account, click on the link below.</p>
					 
			<p style="padding-bottom:6px; font-size:11px; text-transform: initial;"> <a target="_blank" href="<?php echo base_url().'auth/reset_password/'.$forgotten_password_code; ?>">ACTIVATE ACCOUNT </a></p>  
		<tr></tr>			   
		<p style="font-size:14px; font-weight:bold ; padding-bottom:6px; width:100%;">YOUR REGISTRATION DETAILS </p>  

		<table>  
		   <tbody>
			   <?php if(!empty($salutation)){?>
				<tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">SALUTATION</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$salutation?></td>
				</tr>
				<?php } if(!empty($gender)){?>
				
				<tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">GENDER</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$gender?></td> 
				</tr>
				<?php } if(!empty($first_name)){?>
				
				<tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">FIRST NAME</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$first_name?></td>
				</tr>
				<?php } if(!empty($last_name)){?>
				<tr>
					<td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">LAST NAME</td>
					<td style="font-size:11px;  padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$last_name?></td>
				</tr>
				<?php } if(!empty($username)){?>
				<tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold;  width:25%;">USER NAME</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$username?></td>
				</tr>
				 <?php } if(!empty($alldata->company)){?>
				 <tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">COMPANY NAME</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->company?></td>
				  </tr> 
						 
				  <?php } if(!empty($alldata->country_code)){?>
				  <?php } if(!empty($alldata->phone)){?>
				<!--tr>
					<td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:22%;">MOBILE</td>
					<td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->phone?></td>
				</tr -->
				<?php } if(!empty($alldata->dob)){?>  
						   
						   
				 <tr>
				   <td style="font-size:11px; padding-bottom:10px; font-weight:bold; width:25%;">BIRTHDAY</td>
				   <td style="font-size:11px; padding-bottom:10px; text-transform:uppercase; font-weight:normal;">: <?=$alldata->dob?></td>
				  </tr> 
						  
				<?php }?>
				<tr></tr>		  
			</tbody>
		</table>
						   
		<p style=" font-size:14px; font-weight:bold;">HIGHLIGHTS</p>
							
		<p style=" font-size:11px;width:100%">Your XPLATFORM account allows you to enjoy access to: </p>  
								
		<table>   
			<tbody>
				<tr></tr>
				<tr>   
					<td style="font-weight:bold ; font-size:11px; padding-bottom:10px; width:32%;"><b>XCONNECT (ALL PLACES)</b></td>
					<td style="font-size:11px; padding-bottom:10px;">: A list of all places you can explore on XCONNECT. </td>
				</tr>
						   
				<tr>
					<td style="font-weight:bold ; font-size:11px; padding-bottom:10px; width:32%;"><b>XCONNECT (LET’S EXPLORE)</b></td>
					<td style="font-size:11px; padding-bottom:10px;">: Interactive page to explore places on XCONNECT.</td>
			   </tr>   
						   
						   
				<tr>   
					<td style="font-size:11px; font-weight:bold ; padding-bottom:10px; width:32%;"><b>XCONNECT (SIMPLE VIEW) </b></td>
					<td style="font-size:11px; padding-bottom:10px;">: Concise and precise presentation when you are on mobile devices.</td>    
				</tr>    
						 
				<tr>
					<td style="font-weight:bold ; font-size:11px; padding-bottom:10px; width:32%;"><b>XME</b></td>
					<td style="font-size:11px; padding-bottom:10px;">: Your account details.</td>
				</tr>
				<tr></tr>    
			</tbody>
		</table>   
						   
		<P style="font-family:calibri ; font-size:11px;width:100%;">Start exploring today! Have fun! =)</P>
					
		  <p style="font-size:14px ; padding-bottom:0px; font-family:calibri ; margin-bottom:0px; font-weight:bold ;">WARMEST REGARDS</p>
		  <p style="font-size:11px; padding-bottom:10px; font-family:calibri ; "><span style="font-size:11px;">THE XPLATFORM TEAM</span></p>
							  
		   <p style="font-size:11px; font-family:calibri ; text-transform: initial;">This is a computer generated email. Please do not reply.</p>
 
 </body>
 </html>

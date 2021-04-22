
<html>
	<head>
	<style>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">    
   
 body{
	font-family: 'Roboto', sans-serif!important;   
    }      
	</style>     
	
	</head>      
	<body>
		
		      
							  
		<table>
			<tbody> 				
				<tr></tr>

			
			
			<tr>
				<td style="font-weight:bold ; vertical-align: top; font-size:11px ; padding-bottom:10px; width:20%; vertical-align: top;">PROJECT ID </td>
				<td style="font-size:11px ; vertical-align: top; padding-bottom:10px;"> : <?php echo $project_id;?>
				 
				</td> 
			</tr>
			
			<tr>
				<td style="font-weight:bold ; vertical-align: top; font-size:11px ; padding-bottom:10px; width:20%; vertical-align: top;">RECEPIENT COUNT </td>
				<td style="font-size:11px ; vertical-align: top; padding-bottom:10px;">  : <?php echo $userscount;?>
				 
				</td> 
			</tr>
			
			<tr>
				<td style="font-weight:bold ; vertical-align: top; font-size:11px ; padding-bottom:10px; width:20%; vertical-align: top;">EMAILER ID  </td>
				<td style="font-size:11px ; vertical-align: top; padding-bottom:10px;"> : <?php echo $emailerdata->emailer_id?>
				 
				</td> 
			</tr>
			<tr>
				<td style="font-weight:bold ; vertical-align: top; font-size:11px ; padding-bottom:10px; width:20%; vertical-align: top;">EMAIL TITLE </td>
				<td style="font-size:11px ; vertical-align: top; padding-bottom:10px;"> : <?php echo $emailerdata->emailer_title?>
				 
				</td> 
			</tr>
			
			<tr>
				
				<td colspan="2" style="font-size:11px ; vertical-align: top; padding-bottom:10px;" align="left"> <p style="position: absolute;">
				<?php echo $emailerdata->emailer_details;?>
				 
				</td> 
			</tr>
			
			<tr>    
			
				<td colspan="2" style="font-size:11px ; vertical-align: top; padding-bottom:10px;" align="center"> <p style="position: absolute;">
				<?php if($emailerdata->image1){?>
				 <img src="<?=base_url().'assets/emailer/'.$emailerdata->image1?>" style="width:100%!important;">
				 <?php }?>
				</td> 
			</tr>
			
			<tr>
				
				<td colspan="2" style="font-size:11px ; vertical-align: top; padding-bottom:10px;" align="center"> <p style="position: absolute;"> 
				<?php if($emailerdata->image2){?>
				 <img src="<?=base_url().'assets/emailer/'.$emailerdata->image2?>" style="width:100%!important;">
				 <?php }?>  </td> 
			</tr> 
			
			<tr>
				<td colspan="2" style="font-size:11px ; vertical-align: top; padding-bottom:10px;" align="center"> <p style="position: absolute;">
				<?php if($emailerdata->image3){?>
				 <img src="<?=base_url().'assets/emailer/'.$emailerdata->image3?>" style="width:100%!important;">  
				 <?php }?>  </td> 
			</tr>
			
				
				<tr></tr>	    		   
			</tbody>
		 </table>
							    
			
						   
		<!--P style="font-family:calibri ; font-size:11px;width:100%;">Start exploring today! Have fun! =)</P>
					
		  <p style="font-size:14px ; padding-bottom:0px; font-family:calibri ; margin-bottom:0px; font-weight:bold ;">WARMEST REGARDS</p>
		  <p style="font-size:11px; padding-bottom:10px; font-family:calibri ; "><span style="font-size:11px;">THE XPLATFORM TEAM</span></p>
							  
		   <p style="font-size:11px; font-family:calibri ; text-transform: initial;">This is a computer generated email. Please do not reply.</p-->    
 
 </body>
 </html>


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
				<tr style="font-size:11px; padding-bottom:10px; width:100%;">Hi <span style="font-size:11px;"><?=$guestdata->username;?></span>,</tr> 
				<tr></tr>
				<!--tr style="font-size:11px; padding-bottom:10px;">Thank you for registering.</tr -->   
				<tr></tr>
					      		
				<!--tr>
					<td style="font-weight:bold ; font-size:11px ; padding-bottom:10px; width:22%;">EMAILER OWNER</td>
					<td style="font-size:11px ; padding-bottom:10px;">: <?=$emailer_ownerdata->first_name.' '.$emailer_ownerdata->last_name?></td>				       
				</tr> 
				<tr></tr-->			
			</tbody>
		</table>   
      
		<!--table>    
			<tbody>
				<tr>
					<td style=" font-size:11px ; padding-bottom:10px; width:100%;">
						<div >
							<p>This email was generated if you have registered successfully via registration form, or you have <br> been added to guest list by   To be excluded, simply inform  <br> through chat feature on XCONNECT.</p>
						</div>
					</td>
				</tr> 	
				<tr></tr>
			 </tbody>
		</table-->
		      
							  
		<table>
			<tbody> 				
				<tr></tr>

			
			
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

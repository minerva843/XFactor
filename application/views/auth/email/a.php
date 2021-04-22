
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

table{border:none!important;}

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
						<h4 style="font-size:11px !important; font-weight:normal !important;">mass data entry is completed.</h4>
						
						
						
				<tr style="font-size:11px; width:100% !important;">
				<td colspan="2" style="font-size:11px!important; padding-bottom:10px; width:100%!important;">
				<!--b style="font-size:11px; weight:bold !important;">XPLATFORM</b -->
				
				<span style="font-size:14px!important; font-weight:bold!important;"> MASS DATA ENTRY – ENTRIES NOT INPUT TO DATABASE</span> 				
				</td>          	
				</tr>     	   
						
						   						
						</tbody>
						</table>
                       <table class="userrr">
				       <tbody>
	                   			<?php echo $table_body; ?>   
						</tbody>
						</table>
						
						<table class="userrr">
				       <tbody>
	
	                    <tr>
						   <td style=" font-size:11px !important; padding-bottom:10px; width:100%;"><div class="note-new-reg">
						   <p>
							<!-- ALL IN ONE LINE AND MORE SPACING FOR TEXT MAKE USE OF FULL WIDTH OF THE PAGE. -->
							
							</p></div></td>
						   				       
						</tr>    
						
						</tbody>
						</table>
						         
						</div>        
				
					<p style="font-size:14px !important; padding-bottom:0px!important; margin-bottom:0px!important; font-weight:bold !important;">WARMEST REGARDS</p>
					  <p class="team-rgds" style="font-size:11px; padding-bottom:10px;"><span style="font-size:11px; font-weight:600;">THE XPLATFORM TEAM</span></p>
					  
					   <p class="note" style="font-size:11px; text-transform: initial;">This is a computer generated email. Please do not reply.</p>
                    </div>
					</div>
					</div>
					</div>
					</div>
					</body>
					</html>

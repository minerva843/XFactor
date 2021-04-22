<div class="virtual_view avatar">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
		<div class="row avatar-main">
				
		<div class="col-md-9 avtar-position chatscreen">     

		<div class="start-explor"> <h2><?php if(!empty($project_name)){echo $project_name.'.  START EXPLORING. HAVE FUN! =)'; }else{ echo 'CLICK “PLACES” ON BOTTOM RIGHT, THEN SELECT A PLACE TO GO.'; }?></h2></div>
		
        <div class="chat-feature workshop-left">	

<div class="row">
<div class="col-md-6">	
<div class="workshop-ldialog workshop-profile-top">
<div class="panel panel-default">
<div class="row large-button m-b-5">
			<div class="col-md-12"><h3> YOU ARE CURRENTLY TAKING PART IN A WORKSHOP </h3></div>
			</div> 

<div class="panel-body">
<div class="workshop-profile">
<div class="row">
    <div class="col-md-4"> 
	<?php // print_r($_SESSION); ?>
		<?php 
	$avatar = $this->session->userdata('avatar');
	if(!empty($avatar)){ ?>
	
	<img src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $avatar; ?>" class="img-fluid"> 
         
	<?php }else{ ?>
	<img src="<?=base_url();?>assets/images/chat/workshop-thumb.png" class="img-fluid"> 
          
	
	<?php } ?>
	
	
	
	                  
    </div>     
<div class="col-md-8">             
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">DISPLAY NAME </label>
<div class="col-sm-7">
<div class="zone-label">: <?php
$dis = $this->session->userdata('username');
 if(!empty($dis)){echo $dis; }else{ echo "Not Available";}
 
   ?> </div>
</div>
</div>   

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">COMPANY NAME</label>
<div class="col-sm-7">
<div class="zone-label"> :  <?php echo $this->session->userdata('company');  ?>
</div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">DESIGNATION</label>
<div class="col-sm-7">
<div class="zone-label"> : <?php echo $_SESSION['designation'];  ?></div>
</div>
</div>
      
</div>    
</div>
</div>    
</div>
</div>
 
<div id="instructions"><?php echo $workshop_data->instructions; ?>  </div>

</div>
</div>

<div class="col-md-6">	
		<div class="workshop-ldialog right">
		<div class="panel panel-default">
		<div class="panel-body">
		<iframe src="<?php echo $workshop_data->screenurl2; ?>" id="iframe3" class="frame" style="border: 0px solid slategrey; width:100%; height:297px;"></iframe>
		</div>
		<div class="row large-button">
		<div class="col-md-9"><div class="large-button-left"> ZOOM : <span id="zoomurl"><?php echo $workshop_data->screenremarks2; ?></span></div>  </div>
		<div class="col-md-3 text-right">
		<a href="#" class="button" id="panel-fullscreen" role="button" title="Toggle fullscreen">
		<i class="glyphicon glyphicon-resize-full"></i>
		<span>ENLARGE SCREEN </span></a></div>
		</div> 
    
		</div>    
		</div>
		</div>


</div>

		<div class="row">

		

<div class="col-md-6">	
<div class="workshop-ldialog">
<div class="panel panel-default">
<div class="panel-body">
<iframe src="<?php echo $workshop_data->screenurl1; ?>" id="iframe2" class="frame" style="border: 0px solid slategrey; width:100%; height:297px; 
                "></iframe>
</div>
<div class="row large-button">
		<div class="col-md-9"><div class="large-button-left">Slido : <span id="slidourl"><?php echo $workshop_data->screenremarks1; ?></span></div></div>
		<div class="col-md-3 text-right">
		<a href="#" class="button"  id="panel-fullscreen2" role="button" title="Toggle fullscreen">
		<i class="glyphicon glyphicon-resize-full"></i>
		<span> ENLARGE SCREEN </span> </a></div>  
		</div>
</div>  
</div>
</div>

<div class="col-md-6">	
 
<div class="workshop-ldialog right m-b-10 zoom-session-url">    
<div class="panel panel-default">
	          
<div class="panel-body">
<iframe src="<?php echo $workshop_data->screenurl3; ?>" id="iframe3" class="frame" style="border: 0px solid slategrey; width:100%; height:297px;"></iframe>

</div>     

<div class="row large-button">
			<div class="col-md-9"><div class="large-button-left"> URL : <span id="xplatformurl"><?php echo $workshop_data->screenremarks3; ?></span></div></div>
			<div class="col-md-3 text-right">
			<a href="#" class="button" id="panel-fullscreen1" role="button">
			<i class="glyphicon glyphicon-resize-full"></i>
			 <span>ENLARGE SCREEN </span> </a></div>
			</div> 
    
</div>
</div>  
</div>

</div>	
	      

		</div>
		</div>
		
		<div class="col-md-3 avtar-sidebar">
		<div class="tabbable tabs-below">
				<div class="tab-content">

					
<div class="tab-pane chats active" id="5">
<div class="avatar-right">
<h2> WORKSHOP</h2>
<?php if($No_registerUser_condition==true ){ ?>
<div class="fron-postion">
<?php 
if(empty($project)){
echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';

}else{
	echo '<p class="gsm-pd">Registration is requried to attend Workshops.</p>';
}?>
</div>
<?php
}else{
 ?>
<div class="select-workshop">       
<h3>SELECT A WORKSHOP </h3>

<select id="selectWorkshop">
<option disabled>SELECT WORKSHOP</option>

 
 
<?php  foreach($workshops as $workshop){


$stausworkshop = '';
if($workshop['startdatetime'] < date('Y-m-d H:i') && $workshop['enddatetime']>date('Y-m-d H:i') ){
$stausworkshop = 'LIVE';
}else if($workshop['enddatetime'] < date('Y-m-d H:i')){
$stausworkshop = 'ENDED';

}else{

$stausworkshop = 'NOT STARTED';
}



 ?>
 
 
 
 <option value="<?php echo $workshop['id']; ?>" <?php if($workshop['id']==$workshopid){echo 'selected';} ?>   ><?php echo $stausworkshop; ?>, <?php echo $workshop['startdatetime']; ?>, <?php echo $workshop['enddatetime']; ?>, <?php echo $workshop['workshop_name']; ?>, <?php echo $workshop['location']; ?></option>
 
<?php } ?>
 
 
 
</select>
</div>

<ul class="nav nav-tabs" role="tablist">  

    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#chat1">NOTES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#chat2">ALL ONLINE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#chat3" style="margin-right:0px;">PAST CHATS</a>
    </li>
	
  </ul>

  <!-- Tab panes -->
  <div class="tab-content chat">
  
  <div id="chat3" class="container tab-pane">
  <div class="chat-main">

<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
<option>ALL SPONSORED SLOTS ONLY</option>
<option>ALL SPONSORS ONLY</option>
<option>ALL EXHIBITORS ONLY</option>
<option>ALL PARTNERS ONLY</option>
<option>ALL DELEGATES ONLY</option>
<option>ALL SPEAKERS ONLY</option>
<option>ALL PANELISTS ONLY</option>
<option>ALL VIP ONLY</option>
<option>ALL CELEBRITY ONLY</option>
<option>ALL PERFORMER ONLY</option>
<option>ALL FEATURED ONLY</option>
<option>ALL OTHERS ONLY</option>
<option>ALL BOOTH ORGANISER ONLY</option>
<option>ALL BOOTH SPONSOR ONLY</option>
<option>ALL BOOTH EXHIBITORS ONLY</option>	
<option>ALL BOOTH PARTNERS ONLY</option>
<option>ALL BOOTH SPEAKER ONLY</option>
<option>ALL BOOTH PANELISTS ONLY</option>
<option>ALL BOOTH VIP ONLY</option>
<option>ALL BOOTH CELEBRITY ONLY</option>
<option>ALL BOOTH PERFORMER ONLY</option>
<option>ALL BOOTH FEATURED ONLY</option>
<option>ALL BOOTH OTHERS ONLY</option>

</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search" placeholder="SEARCH:">
</div>
</div>
</div>


<div class="inner-chat workshop-chat">
	<?php foreach($allgroups as $group){
		if($group->display_name != 'Town Square' && $group->display_name != 'Off-Topic') {?>
		<?php 
			if($group->type == 'D')
			{
				$logged_in = $this->session->userdata('loggedin');
				$uu = str_replace($logged_in,"",$group->name);
				$username = getusername(str_replace("_","",$uu));
				if($username != 'surveybot')
				{
					$user = getfulldetail($username);?>
					<div class="nearme-box clearfix openChatBox" data-val="<?php echo $username;?>">
						<?php if($user->avatar != '')
						{?>
							<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/'.$user->avatar);?>"/>
						<?php }
						else
						{?>
							<i class="far fa-user-circle" aria-hidden="true"></i>
						<?php }?>
						
						<div class="nearme-detail">
						<p><?php 
						if(empty($user->first_name))
						{
							echo $username;
						}
						else
						{
							echo $user->guest_type.', '.$user->salutation.' '.$user->first_name.' '.$user->last_name.', '.$user->company;
						}?></p>
						</div>
					</div>
				<?php }
					
			}
			else
			{?>
				<div class="nearme-box clearfix openSellerChatBox" data-val="<?php echo $group->id;?>">
					<i class="far fa-user-circle" aria-hidden="true"></i>
					<div class="nearme-detail">
					<p><?php echo $group->name;?></p>
					</div>
				</div>
			
		<?php }
	 }
}?>


</div> 



</div>
  </div>
  
   <div id="chat2" class="container tab-pane">
  <div class="chat-main">

<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
<option>ALL SPONSORED SLOTS ONLY</option>
<option>ALL SPONSORS ONLY</option>
<option>ALL EXHIBITORS ONLY</option>
<option>ALL PARTNERS ONLY</option>
<option>ALL DELEGATES ONLY</option>
<option>ALL SPEAKERS ONLY</option>
<option>ALL PANELISTS ONLY</option>
<option>ALL VIP ONLY</option>
<option>ALL CELEBRITY ONLY</option>
<option>ALL PERFORMER ONLY</option>
<option>ALL FEATURED ONLY</option>
<option>ALL OTHERS ONLY</option>
<option>ALL BOOTH ORGANISER ONLY</option>
<option>ALL BOOTH SPONSOR ONLY</option>
<option>ALL BOOTH EXHIBITORS ONLY</option>	
<option>ALL BOOTH PARTNERS ONLY</option>
<option>ALL BOOTH SPEAKER ONLY</option>
<option>ALL BOOTH PANELISTS ONLY</option>
<option>ALL BOOTH VIP ONLY</option>
<option>ALL BOOTH CELEBRITY ONLY</option>
<option>ALL BOOTH PERFORMER ONLY</option>
<option>ALL BOOTH FEATURED ONLY</option>
<option>ALL BOOTH OTHERS ONLY</option>

</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search" placeholder="SEARCH:">
</div>
</div> 
</div>


<div class="inner-chat workshop-chat">
	<?php
if(!empty($allonline)){
	
 foreach($allonline as $online){?>
	<div class="nearme-box clearfix openChatBox" data-val="<?=$online->username?>">
	<i class="far fa-user-circle" aria-hidden="true"></i>
		<div class="nearme-detail">
		<!--<p>,,</p>-->
		<p><?=$online->guest_type?>,<?=$online->salutation?> <?=$online->first_name?> <?=$online->last_name?>,<?=$online->company?></p>
		</div>
	</div>
<?php } }else{
	echo '<p class="work-msgright">User is not invited for workshop</p>';
}
	?>


</div>     



</div>
  </div>
     
<div id="chat1" class="container tab-pane active">
<div class="chat-main">
<!--
<div class="top-search">
<div class="row">
<div class="col-md-6 p-r-5"> 
<select>
<option> SHOW ALL DISPLAY CONTACTS</option>
<option>ALL BOOTH ORGANISER ONLY</option>
<option>ALL BOOTH SPONSOR ONLY</option>
<option>ALL BOOTH EXHIBITOR ONLY</option>
<option>ALL BOOTH PARTNER ONLY</option>
<option>ALL BOOTH SPEAKER ONLY</option>
<option>ALL BOOTH PANELIST ONLY</option>
<option>ALL BOOTH VIP ONLY</option>
<option>ALL BOOTH CELEBRITY ONLY
</option>
<option>ALL BOOTH PERFORMER ONLY</option>
<option>ALL BOOTH FEATURED ONLY</option>
<option>ALL BOOTH OTHERS ONLY</option>

</select>
</div>
<div class="col-md-6 p-l-5"> 
<input type="text" class="search"  placeholder="SEARCH: ">
</div>
</div>
</div>  -->  


<div class="inner-chat work-shop-right poject_editor">


<textarea rows="4" cols="50" id="program_details" class="program_details" name="program_details" placeholder="Scribble your notes and Email to yourself.
Important: This is note and will not be saved. All data will be lost when your browser is refreshed." ></textarea>
							<script>

                                CKEDITOR.replace('program_details');

								</script>

<!--<textarea placeholder="Scribble your notes and Email to yourself.
Important: This is note and will not be saved. All data will be lost when your browser is refreshed. "></textarea>  href="mailto:?subject=XPLATFORM - QUICK LINK TO PLACE&body=http://13.235.169.150/XFactor/places/index/575%0D%0A%0D%0AStart exploring today!%0D%0A%0D%0A%0D%0AWarmest Regards%0D%0A
The XPLATFORM Team" -->   
  <button class="sendto-mail"  id="sendmailtome"  >  SEND NOTES TO EMAIL</button> 

</div>
</div>

  </div>
  </div>
    				
<?php }?>
				</div> 
</div> 				

    

<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>
				
				<ul class="nav nav-tabs">  
	
<div class="overlay-heading"><h2> WHAT DO YOU WISH TO DO? </h2> </div>    			
<li >
<a href="<?=base_url();?>places/redirectanother/<?php echo $project;?>/<?php echo $floor;?>" ><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li> 
<a href="<?=base_url();?>avatar/redirectanother/<?php echo $project;?>/<?php echo $floor;?>"><img src="<?=base_url();?>assets/images/chat/avtar.png" alt=""><span>MY AVATAR</span></a>
</li>
<li>
<a href="<?=base_url();?>chat_box/redirectanother/<?php echo $project;?>/<?php echo $floor;?>"><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a href="<?=base_url();?>content_page/redirectanother/<?php echo $project;?>/<?php echo $floor;?>" ><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

</li>
<li class="active">
<a href="<?=base_url();?>workshop/index/<?=$project;?>" class="active"><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a href="<?=base_url();?>post_front/redirectanother/<?php echo $project;?>/<?php echo $floor;?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>  
</li>
<li>

<a href="<?=base_url();?>program_page/redirectanother/<?php echo $project;?>/<?php echo $floor;?>" ><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
</li>  
					
				</ul>
			</div>
			<!-- /tabs -->
			<!-- /tabs -->

		</div>		   
		  </div>
		 <div class="footer-year">
		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 
		 </div>
		</div>
	</div></div>
    
    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
        <style>
        #svga-gravataravatar{
            
            display:none !important;
        }
        #svga-shareavatar{
            display:none !important;
        }
    </style>          
	
	<script>
	$(document).ready(function () {
		$("body").on('click','.kahoot_fullscreen',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>workshop/fullscreen',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false,
                       clickSlide: false,
                     clickOutside: false
                }
            });
            
        });
    //Toggle fullscreen
    $("#panel-fullscreen").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
			$this.children('i').next().html('REDUCE SCREEN');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
			$this.children('i').next().html(' ENLARGE SCREEN ');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
	
	$("#panel-fullscreen1").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
			$this.children('i').next().html('REDUCE SCREEN');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
			$this.children('i').next().html(' ENLARGE SCREEN ');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
	
	
	$("#panel-fullscreen2").click(function (e) {
        e.preventDefault();
        
        var $this = $(this);
    
        if ($this.children('i').hasClass('glyphicon-resize-full'))
        {
            $this.children('i').removeClass('glyphicon-resize-full');
            $this.children('i').addClass('glyphicon-resize-small');
			$this.children('i').next().html('REDUCE SCREEN');
        }
        else if ($this.children('i').hasClass('glyphicon-resize-small'))
        {
            $this.children('i').removeClass('glyphicon-resize-small');
            $this.children('i').addClass('glyphicon-resize-full');
			$this.children('i').next().html(' ENLARGE SCREEN ');
        }
        $(this).closest('.panel').toggleClass('panel-fullscreen');
    });
	
});
</script>   
	
	
    <script>
    
    
$(document).ready(function(){


$("#sendmailtome").click(function(){

let mailbody = $("#program_details").val();

//alert(mailbody);
var editorData= CKEDITOR.instances['program_details'].getData();
              //      alert(" your data is :"+editorData);

var emailSub = 'XPLATFORM - QUICK LINK TO PLACE';
var emailTo ='';
var emailCC='';

window.location.href="mailto:"+emailTo+'?subject='+emailSub+'&body='+editorData;

});

 


     $("#svga-downloadavatar").css("display","none");
   let gender = '<?php echo $this->session->userdata('gender'); ?>';  
  // alert(gender);
   if(gender=='male'){
      $("#svga-start-boys").click();
   }else if(gender=='female'){
      $("#svga-start-girls").click(); 
   }else{
        $("#svga-start-boys").click();
        $(".svga-row").css("display","none");
   }
   
   
   $("#downloadavatar").click(function(){ 
   //  $("#svga-png-one").click();  
   $('#avatar_small_dyanmic').click();
   });
   

   
   $("#selectWorkshop").change(function(){
   
   let workshop = $(this).val();
   window.location = '<?php echo base_url();  ?>workshop/index/<?php echo $project; ?>/<?php echo $floor; ?>/'+workshop;
   

   });
   
   
   
   
       
     $(".openSellerChatBox").click(function(){
	   
		
		$.fancybox.open({
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto',
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>chat/testchat2",
			ajax: { 
			   settings: { data : 'project=<?php //echo $project_select; ?>', type : 'POST' }
			},
			touch: false,
			
		});
		
		var grpID = $(this).attr('data-val');
		$.ajax({
            url:"<?php echo base_url('/chat_box/grpChatMsg')?>",
            method: 'post',
            data: {grpID:grpID},
            success: function(response){
                console.log(response);
            }
         
        });
	  
	   
   });
    $('.openChatBox').click(function(){
		var username = $(this).attr('data-val');
		  $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/testchat",
        ajax: { 
           settings: { data : 'username='+username, type : 'POST' }
        },
        touch: false, 
        
    });
		//alert('hi');
		var username = $(this).attr('data-val');
		$.ajax({
            url:"<?php echo base_url('/chat_box/createChannel')?>",
            method: 'post',
            data: {username:username},
            success: function(response){
                console.log(response);
            }
         
        });
	})
    
	
});
    </script>    

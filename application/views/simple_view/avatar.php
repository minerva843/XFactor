<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/normalize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/spectrum.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/css/svgavatars.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700|Roboto:400,300,500,700&subset=latin,cyrillic-ext,cyrillic,latin-ext" rel="stylesheet" type="text/css">
	
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.tools.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.defaults.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/languages/svgavatars.en.js"></script>
	<script src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/js/svgavatars.core.min.js"></script>
<div class="virtual_view avatar simple_view_outer">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
		<div class="row avatar-main">
			

		<div class="col-md-12 avtar-sidebar simple-view"> 
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
					<div class="simple_view_fixed_top avtar-mob-scroll">  
					<div class="overlay-heading"><h2> <?php if(!empty($project_name)){ echo $project_name; }else{ echo 'PROJECT NAME'; }?></h2> </div>   
						<div class="sml-container">
					<ul class="nav nav-tabs simple_tabs">  	

							<li>
							<a class=" track_menu" data-track="PLACES" href="<?=base_url();?>simple_view/places/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
							</li>
						           
							<li class="active">
							<a data-track="AVATAR" class="track_menu active" href="<?=base_url();?>simple_view/avatar/<?=$project_id?>" class="active"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
							</li> 
							<li>  
							<a data-track="CHAT" class="track_menu" href="<?=base_url();?>simple_view/chat/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
							</li>
							<li>
							<a data-track="CONTENT" class="track_menu" href="<?=base_url();?>simple_view/content/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

							</li>
							<li>
							<a data-track="POSTS" class="track_menu" href="<?=base_url();?>simple_view/post/<?=$project_id?>" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a> 
							</li>   

							<li>

							<a data-track="PROGRAM" class="track_menu" href="<?=base_url();?>simple_view/program/<?=$project_id?>"><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
							</li>     
					
				</ul>
				<script>
$('.track_menu').click(function(){

		var project_id='<?=$project_id;?>';
		if(project_id ==''){
			
		}else{
			var module_name=$(this).attr('data-track');
			var url='<?php echo base_url();?>places/UpdatePostIconHistory';
			$.ajax({  
				type: "POST",
				url: url,  
				data: {project_id:project_id,module_name:module_name}, 
				success: function(data)
				{
					
				} 
			});
		}
	});
</script>
				</div>     
				<h2> THIS IS HOW OTHERS SEE YOU CURRENTLY</h2> 
				
				<div class="sml-container"> 
<div class="avatar-profile">   
<div class="row">
    <div class="col-md-5">  
        <?php // print_r(); ?>
        <?php if(!empty($user->avatar)){ ?>
            
           <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" class="img-fluid" > </a>  
            
        <?php  }else{ ?>
        
        
        <?php if($user->gender=='Male' || $user->gender=='MALE'){ ?>
         
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_MALE.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid" > </a> 
            
            
        
        <?php }else if($user->gender=='Female' || $user->gender=='FEMALE'){ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/GUEST_FEMALE-removebg-preview.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid" > </a>   
            
            
        
       <?php  }else{ ?>
        
                    <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/sample.png" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/images/sample.png" class="img-fluid" > </a> 
            
            
        
       <?php  }  ?>
        

            
            
        <?php } ?>
       
         
    </div>
<div class="col-md-7 small-avtar"> 

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">DISPLAY NAME : </label>
<div class="col-sm-12">
<div class="zone-label"> <?php  echo $user->display_name; ?></div>
</div>
</div>   

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">FIRST NAME :  </label>
<div class="col-sm-12">
<div class="zone-label"> <?php  echo $user->first_name; ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">LAST NAME :  </label>
<div class="col-sm-12">
<div class="zone-label"><?php  echo $user->last_name; ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">COMPANY NAME : </label>
<div class="col-sm-12">
<div class="zone-label"> <?php  echo $user->company; ?></div>
</div>   
</div>        

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm">DESIGNATION : </label>
<div class="col-sm-12">
<div class="zone-label">  <?php  echo $user->designation; ?></div>
</div>
</div>    


</div>
</div>
</div>
</div>
<h2>TIME TO DRESS UP</h2>
				
				</div>   
					
	<div class="simle_view_midde avtar-mob-scrolls">	    			
 

<div class="sml-container avtar_padding_simp">   

<div class="plugin desktop-hide"> 
	<input type="button" id="downloadavatar_desk" value="Download" class="action-btn">
	<?php 
	if (!$this->ion_auth->logged_in()){
	?>
	<input type="button" value="SAVE" class="action-btn" id="notsave" name="save">
	<?php }else{?>
	<input type="button" id="saveAvatar_desk" value="SAVE" class="action-btn" name="save">
	<?php }?>
</div>

<div id="svgAvatars" class="avtar-plugin">
    
    
<!--<img src="<?=base_url();?>assets/images/avatar-big.jpg" class="img-fluid">-->



</div>
<div class="plugin mobile-hide"> 
	<input type="button" id="downloadavatar" value="Download" class="action-btn">
	<?php 
	if (!$this->ion_auth->logged_in()){
	?>
	<input type="button" value="SAVE" class="action-btn" id="notsave" name="save">
	<?php }else{?>
	<input type="button" id="saveAvatar" value="SAVE" class="action-btn" name="save">
	<?php }?>
</div>

</div>
</div>

</div>
</div>
			</div>
			<!-- /tabs -->
			
<div id="myModal1" class="modal delete-sorting place-zone avatar_front">

				<!-- Modal content -->
				<div class="modal-content"> 
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">CLOSE</button>
				<h4 class="modal-title">XCONNECT</h4>
			  </div>  
				
				<div class="modal-body">
					<h3>YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</h3>
					
				  </div>         
			   

<div class="modal-footer"> 
<a href="<?=base_url();?>/auth/login" class="no_proceed exit_popup">SIGN IN </a> 
<a href="<?=base_url();?>/auth/create_user" class="yes_proceed exit_popup"> SIGN UP</a>
</div>									

			</div>    
</div>

		</div>		   
		  </div>
		 <div class="footer-year">
		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 
		 </div>
		</div>
	</div></div>
    
    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	<input type="hidden" id="project_id" value="" />
<input type="hidden" id="floorId" value="" /> 
<input type="hidden" id="grid_val" value="" /> 
<input type="hidden" id="zone_type" value="" /> 
<input type="hidden" id="content_set_id" value="" /> 
<script>
// $('.exit_popup').click(function () { 
	// $('#myModal1').hide();
	// var modal = document.getElementById("myModal1");
	// modal.style.display = "none";
// })
$('#notsave').click(function(){
	$('#myModal1').show();
	var modal = document.getElementById("myModal1");
	var span = document.getElementsByClassName("close")[0];
	modal.style.display = "block";
	span.onclick = function () {
		modal.style.display = "none";
	}
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
})
</script>
 <style>
	#svga-gravataravatar {

		display: none !important;
	}

	#svga-shareavatar {
		display: none !important;
	}

	#container {
		position: relative;
		overflow: hidden;
		cursor: pointer;
	}

	#item {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}
	#item1 {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}


	#item {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}
	#item1 {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}

	#item:active {
		background-color: rgba(168, 218, 220, 1.00);
	}
	#item1:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item:hover {
		cursor: pointer;
	}
	#item1:hover {
		cursor: pointer;
	}
</style>
       <script>
    
    
	   
$(document).ready(function(){
     $("#svga-downloadavatar").css("display","none");
   var gender = '<?php echo $this->session->userdata('gender'); ?>';  
   if(gender==''){
	   var gender='male';
   }else{
	   var gender=gender;
   }
  // alert(gender);
   if(gender=='male' || gender=='MALE' || gender=='Male'){
      $("#svga-start-boys").click();
   }else if(gender=='female' || gender=='FEMALE' || gender=='Female'){
      $("#svga-start-girls").click(); 
   }else{
        $("#svga-start-boys").click(); 
        $(".svga-row").css("display","none");
   }
   
   <?php if($this->ion_auth->logged_in()){?> 
   
		$("#downloadavatar").click(function(){ 
		//  $("#svga-png-one").click();  
		$('#avatar_small_dyanmic').click();
	});
   <?php }?>
   <?php if($this->ion_auth->logged_in()){?> 
   
		$("#downloadavatar_desk").click(function(){ 
		//  $("#svga-png-one").click();  
		$('#avatar_small_dyanmic').click();
	});
   <?php }?>
  
   $("body").on('click','#saveAvatar',function(){
       
   })
   $("body").on('click','#saveAvatar_desk',function(){
       
   })
   
    });
    
 	
    </script>
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
<div class="virtual_view avatar">
		<div class="modal-box">
		<div class="container-fluid avtar-container">
		        
		    
		<div class="row avatar-main">
				
		<div class="col-md-9 avtar-position">  

<div class="avtar-overlay"> 
<div class="contant-bottom">     
<p> EXPERIENCE HOW USERS WILL BE ABLE TO CUSTOMISE THEIR LOOKS WITH MY AVATAR FEATURE.</p>
<p>THE SAVE BUTTON WILL CHANGE YOUR DISPLAY PICTURE.</p>
<p>CLICK BACK ON YOUR BROWSER TO GET BACK TO CONFIG PAGE.</p>    
</div>	
</div>	
		
		<div class="start-explor"> <h2> START EXPLORING. SIMPLY CLICK ON THE PLACE YOU WISH TO VISIT. HAVE FUN! =) </h2></div>
		<div class="avtar-filter">
		<div class="row">
  
				 <div class="col-md-6"> 
					<div class="user-location">
					<div id="grid_number" data-gridid=""> YOU ARE CURRENTLY AT  &nbsp; &nbsp; : </div> 
					<div class="select-box">
                     <select name="zonetype">
					<option disabled="" value="" selected=""> HOTEL, GRAND BALLROOM </option>
					<option value="COMMON SPACE"> COMMON SPACE </option>
					</select>
					</div>
					</div>  
					</div>
					
				 <div class="col-md-6">   
                  <div class="looka-took">
				  <span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span> 
				  <span class="common-space"> COMMON SPACE, MIDDLE OF ROOM </span>
				  <button class="take-a-look"> TAKE A LOOK AROUND</button>
				  </div>    
                 </div>
                                    
		 </div>                                           
		</div> 
        <div class="chat-feature">		
		<div class="avtar-left">
			<img src="<?=base_url();?>assets/images/avtarscreen.jpg" class="img-fluid">
		</div>

		</div>
		</div>
		
		<div class="col-md-3 avtar-sidebar">
		<div class="tabbable tabs-below">
				<div class="tab-content">
				    <div class="tab-pane active" id="1">
					<div class="avatar-right">
<h2> MY AVATAR </h2>   
<div class="avatar-profile">
<div class="row">
    <div class="col-md-5">
        <?php // print_r(); ?>
        <?php if(!empty($user->avatar)){ ?>
            
           <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" class="img-fluid" > </a>  
            
        <?php  }else{ ?>
            <a id="avatar_small_dyanmic_dn" href="<?=base_url();?>assets/images/avatar-small.jpg" download><img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/images/avatar-small.jpg" class="img-fluid" > </a> 
        <?php } ?>
       
    
    </div>
<div class="col-md-7 small-avtar"> 

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DISPLAY NAME </label>
<div class="col-sm-8 ">
<div class="zone-label">: <?php  echo $user->display_name; ?></div>
</div>
</div>   

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME  </label>
<div class="col-sm-8">
<div class="zone-label">: <?php  echo $user->first_name; ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME  </label>
<div class="col-sm-8">
<div class="zone-label">: <?php  echo $user->last_name; ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
<div class="col-sm-8">
<div class="zone-label"> : <?php  echo $user->company; ?></div>
</div>
</div>

<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
<div class="col-sm-8">
<div class="zone-label"> :  <?php  echo $user->designation; ?></div>
</div>
</div>


</div>
</div>
</div>
<h2>CUSTOMIZE MY AVATAR</h2>

<div id="svgAvatars" class="avtar-plugin">
    
    
<!--<img src="<?=base_url();?>assets/images/avatar-big.jpg" class="img-fluid">-->



</div>
<div class="plugin"> 
	<input type="button" id="downloadavatar" value="Download" class="action-btn">
	<input type="button" id="saveAvatar" value="SAVE" class="action-btn" name="save">
</div>

</div>

</div>

<div class="tab-pane chats" id="0">
<div class="avatar-right">
<h2> SELECT A PLACE TO GO TO</h2>
<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search" placeholder="SEARCH:">
</div>
</div>
</div>
<div class="places-main">

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>


<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>
    
</div>      


 
</div> 
</div>
					
<div class="tab-pane chats" id="2">
<div class="avatar-right">
<h2> Chat</h2>
<ul class="nav nav-tabs" role="tablist">  

    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#chat1">ALL ONLINE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#chat2">NEAR ME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#chat3">PAST CHATS</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#chat4">A QUICK INTRO</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content chat">
     
<div id="chat1" class="container tab-pane active">
<div class="chat-main">

<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search"  placeholder="SEARCH:">
</div>
</div>
</div>


<div class="inner-chat">
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

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
</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search"  placeholder="SEARCH:">
</div>
</div>
</div>


<div class="inner-chat">
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

</div> 



</div>
</div>



<div id="chat3" class="container tab-pane">
<div class="chat-main">

<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search"  placeholder="SEARCH:">
</div>
</div>
</div>


<div class="inner-chat">
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

</div> 



</div>
</div>



<div id="chat4" class="container tab-pane">
<div class="chat-main">

<div class="top-search">
<div class="row">
<div class="col-md-6"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
</select>
</div>
<div class="col-md-6"> 
<input type="text" class="search"  placeholder="SEARCH:">
</div>
</div>
</div>


<div class="inner-chat">
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<img src="<?=base_url();?>assets/images/chat/avtar.png" alt="">
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Partner, Cloud Computing Society 10 METERS Away</p>
</div>
</div>

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
<p>Speaker, MS Susan Sharon , HPE 20 Meters Away</p>
</div>
</div>

</div> 
    

</div>   
</div>

  </div>
  </div>
    				
				</div>    
				<ul class="nav nav-tabs">  
<div class="avtar-overlay"> 
<div class="contant-bottom"> 
 
</div>	  
</div>	
<div class="overlay-heading"><h2> WHAT DO YOU WISH TO DO? </h2> </div>    			
				<li>
<a href="<?=base_url();?>places" ><img src="<?=base_url();?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
</li>
<li class="active">
<a href="<?=base_url();?>avatar" class="active"><img src="<?=base_url();?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
</li>
<li>
<a href="<?=base_url();?>chat_box" ><img src="<?=base_url();?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
</li>
<li>
<a href="<?=base_url();?>content_page"><img src="<?=base_url();?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>
</li>
<li>
<a href="<?=base_url();?>workshop" ><img src="<?=base_url();?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
</li>   
<li>
<a href="<?=base_url();?>info_buy" ><img src="<?=base_url();?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a>
</li>
<li>
<a href="<?=base_url();?>program_page" ><img src="<?=base_url();?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
</li>   
					
				</ul>
			</div>
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
    
    
$(document).ready(function(){
     $("#svga-downloadavatar").css("display","none");
   let gender = '<?php echo $this->session->userdata('gender'); ?>';  
  // alert(gender);
   if(gender=='male' || gender=='MALE' || gender=='Male'){
      $("#svga-start-boys").click();
   }else if(gender=='female' || gender=='FEMALE' || gender=='Female'){
      $("#svga-start-girls").click(); 
   }else{
        $("#svga-start-boys").click();
        $(".svga-row").css("display","none");
   }
   
   
   $("#downloadavatar").click(function(){ 
   //  $("#svga-png-one").click();  
   $('#avatar_small_dyanmic').click();
   });
   
   $("body").on('click','#saveAvatar',function(){
       
       
       
   })
   
       
        
    });
    
    
    </script>

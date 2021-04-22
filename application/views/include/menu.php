<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_ids=$this->session->userdata('user_id');
		$user=$this->ion_auth->user($user_ids)->row();
		$this->db->select('*');
		$this->db->from('xf_mst_setting');
		$query = $this->db->get();
		$logodata = $query->row();
		
$resource=base_url().'assets/images/'.$logodata->new_logo;
$size = getimagesize($resource);
$width=$size[0];
$height=$size[1];
if(in_array($width, range(1800, 1920))){
	$logo_condition=true;
}else{
	$logo_condition=false; 
}
?>
		<?php if(!empty($logo_condition)){?>
				<div class="header-xconnect" style="background-image: url(<?=base_url();?>assets/images/<?=$logodata->new_logo;?>);">
		<?php }else{?>
				<div class="header-xconnect">
		<?php }?>
		
		<div class="container-fluid">
		<div class="row"> 
		<div class="col-md-8">
		<div class="middle-header clearfix">
		
		<div class="logo">
		<?php if(empty($logo_condition)){?>
		<?php if(!empty($logodata->new_logo)){?>
				<?php if($this->common->userStatus() == 2) {?>
					<a data-track="HOME" class="track_menu" href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/<?=$logodata->new_logo;?>" alt="" style="visibility:hidden;"> </a>

			<?php }else{?>
			<a data-track="HOME" class="track_menu" href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/<?=$logodata->new_logo;?>" alt=""> </a>
			<?php }?>
		<?php }else{?>
				<?php if($this->common->userStatus() == 2) {?>
					<a data-track="HOME" class="track_menu" href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-platform.png" alt="" style="visibility:hidden;"> </a>

			<?php }else{?>
			<a data-track="HOME" class="track_menu" href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-platform.png" alt=""> </a>
			<?php }?>
		<?php }?>
		<?php }?>
		</div> 
		      
		</div>
		</div>

		<div class="col-md-4">    
		<div class="xconnect-right">
		<div class="user-search-btn-group ul-li clearfix">
		<ul>
		 <?php if($this->ion_auth->logged_in() and ($user->user_type=='SuperA'|| $user->user_type=='SUPERA') && $this->common->userStatus() != 2){ ?>     
		<li>
		<label class="dropdown">
		
		<a class="dd-button">
		 <i class="fas fa-cog"></i>
		</a>
		
		<input type="checkbox" class="dd-input" id="test1">

		<ul class="dd-menu">
		<li><a data-track="XMANAGE" class="track_menu" href="#!"><b>xmanage</b></a></li>
		<li><a data-track="XPLATFORM" class="track_menu" href="<?php echo base_url(); ?>home/xmanage_config">XPLATFORM management</a></li> 
		<!--<li><a href="#!">GROUPS</a></li>
		<li><a href="#!">USERS</a></li>	
	    <li><a href="#!">PERMISSIONS</a></li>	
	    <li><a href="#!">SUMMARY & STATISTICS</a></li>		-->
		</ul>     
		</label>
		</li>
	<?php } ?>
	 <?php if($this->ion_auth->logged_in() and (($user->user_type=='SuperA'|| $user->user_type=='SUPERA') || ($user->user_type=='GroupA'|| $user->user_type=='GROUPA')) && $this->common->userStatus() != 2){ ?>  
		<li>
		<label class="dropdown">
		<a class="dd-button"> 
		 <i class="fas fa-sliders-h"></i>
		</a> 
		<input type="checkbox" class="dd-input" id="test2">

		<ul class="dd-menu">
		<li><a data-track="CONFIG PAGE" class="track_menu" href="#!"><b>CONFIG PAGES</b></a></li>
		<li><a data-track="CONFIG" class="track_menu" href="<?php echo base_url(); ?>config">XCONNECT</a></li>
		<!--<li><a href="#!">XSHOP</a></li> 
		<li><a href="#!">XCONTEST</a></li>	-->		  
		</ul>     
		</label>       
		</li>
		<?php } ?> 
		<?php if($this->common->userStatus() == 2) {?>
			<li><a data-track="LOGOUT" class="track_menu" href="<?=base_url();?>auth/logout"><span>SIGN OUT</span><i class="fa fa-power-off"></i></a></li>
		<?php }?>
		<?php if(!$this->ion_auth->logged_in()){ ?>    
		<li><a data-track="SIGN UP" class="track_menu" href="<?php echo base_url(); ?>auth/register"> <span>SIGN UP</span> <!-- <img src="assets/images/sign-edit.png"> --> <i class="fas fa-edit"></i></a></li>
		<li><a data-track="SIGN IN" class="track_menu" href="<?php echo base_url(); ?>auth/login"> <span>SIGN IN</span> <!-- <img src="assets/images/sign-edit.png"> --> <i class="fas fa-user"></i></a></li>
		<?php } ?>
		
		
		    
		<li>
		<label class="dropdown">
		<?php if($this->common->userStatus() == 2) {?>
		<?php }else{?>
		<?php if($this->ion_auth->logged_in()){ ?> 
		<a class="dd-button">
		 <!-- Hello <?php echo $this->session->userdata('first_name'); ?> -->  
		 <?php 
		$userid = $this->session->userdata('user_id');
	 
        $user = $this->ion_auth->user($userid)->row();
		 ?>
		 <?php if($user->avatar){?>
				<img src="<?=base_url();?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?=$user->avatar;?>">
				<?php }else{
				if($user->gender=='Male' || $user->gender=='MALE'){ ?>
        
                    <img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid" >
             
                 
        
        <?php }else if($user->gender=='Female' || $user->gender=='FEMALE'){ ?>
        
                    <img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid" >  
            
                       
        
       <?php  }else{ ?>
        
                    <img id="avatar_small_dyanmic"  src="<?=base_url();?>assets/images/sample.png" class="img-fluid" >
            
            
        
       <?php  } }
	   ?> </i>
		</a>
		<?php } ?>
		
		<input type="checkbox" class="dd-input" id="test3">
		<ul class="dd-menu">
		<li><a data-track="XME" class="track_menu" href="#!"><b>XME</b></a></li>
		<li><a data-track="MY DETAILS" class="track_menu" href="<?=base_url();?>xme/my_details">MY DETAILS</a></li>
		<li><a data-track="PASSWORD" class="track_menu" href="<?=base_url();?>xme/password">PASSWORD</a></li>
		
		<li class="divider"></li>
		<li><a data-track="XCONNECT" class="track_menu" href="#!"><b>XCONNECT</b></a></li>
		<li><a data-track="MY REGISTRATIONS" class="track_menu" href="<?=base_url();?>xme/registration">MY REGISTRATIONS</a></li>
		<!--<li><a href="<?=base_url();?>places">LET’S EXPLORE</a></li>--> 
		<!--  
        <li class="divider"></li>-->   
		<!-- <li><a href="#!"><b> XSHOP </b></a></li> 
		<li><a href="#!">MY PURCHASES</a></li>
		 <li class="divider"></li>
		 <li><a href="#!"><b>XCONTESTS </b></a></li>
		<li><a href="#!">XPLATFORM CHANCES</a></li>   
		<li><a href="#!">CONTEST CHANCES</a></li>   
		<li><a href="#!">LUCKY DRAW CHANCES</a></li>    
      <li class="divider"></li>   -->  
<li class="divider"></li>
        <li>
                        <?php 
                        if($this->ion_auth->logged_in()){ ?>
                             <a data-track="LOGOUT" class="track_menu" href="<?=base_url();?>auth/logout"><b>SIGN OUT</b></a>
                        <?php } ?>		
		    </li>
		
		</li>   
		</ul>  
		<?php }?>		

		</label>
				
		</li>
		
		 <?php if($this->common->userStatus() != 2) {?>    
		<li>
		
		<label class="dropdown">
		<a class="dd-button">
		<i class="fas fa-align-justify" style="margin-right: 0px!important;"></i>  
		</a>

		<input type="checkbox" class="dd-input" id="test4">

		<ul class="dd-menu" style="right: 0px;">
		<li><a data-track="XPLATFORM" class="track_menu" href="#!"><b>XPLATFORM</b></a></li>
		<li><a data-track="HOME PAGE" class="track_menu" href="<?php echo base_url(); ?>">HOME PAGE</a></li>
		<li><a data-track="ABOUT XCONNECT" class="track_menu" href="<?=base_url();?>test/about">ABOUT XCONNECT</a></li>
		<li><a data-track="SUPPORT" class="track_menu" href="mailto:support@xplatform.live?subject=XCONNECT Support&body=Please get tech support to contact me.%0D%0A%0D%0A I require technical assistance for my XCONNECT Corporate Account.%0D%0A%0D%0A My Corporate Account Name is :">SUPPORT</a></li>
		<li><a data-track="CORPORATE ENQUIRIES" class="track_menu" href="mailto:projects@xplatform.live?subject=XCONNECT Corporate Enquiry&body=Please get a representative to contact me.%0D%0A%0D%0AI wish to find out more about how I am able to put my business / project on XCONNECT.">CORPORATE ENQUIRIES</a></li>
		
		<!--<li><a href="#!">GIGS</a></li> -->

		<li class="divider"></li>   
		<li><a href="#!" data-track="XCONNECT" class="track_menu"><b>XCONNECT</b></a></li>
	     <li><a href="<?=base_url();?>xconnect" data-track="ALL PLACES" class="track_menu">ALL PLACES <!--(PLACES)--></a></li>
		<li><a href="#!" data-track="XCONNECT(INTERACTIVE VIEW)" class="track_menu"><b>XCONNECT (INTERACTIVE VIEW)</b> <br> <span>NOTE: ALL DISPLAYS N 16:9 </span> </a></li>
		
		<li><a href="<?=base_url();?>places" data-track="LET’S EXPLORE" class="track_menu">LET’S EXPLORE</a></li>    
		<li><a href="#!"><b> XCONNECT (MOBILE USERS) </b></a></li>
		<li><a href="<?=base_url();?>simple_view/places" data-track="SIMPLE VIEW PLACES" class="track_menu">PLACES</a></li>   
		<li><a href="<?=base_url();?>simple_view/avatar" data-track="SIMPLE VIEW AVATAR" class="track_menu">MY AVATAR</a></li>
		<li><a href="<?=base_url();?>simple_view/chat" data-track="SIMPLE VIEW CHAT" class="track_menu">CHAT</a></li>
		<li><a href="<?=base_url();?>simple_view/content" data-track="SIMPLE VIEW ON DEMAND CONTENT" class="track_menu">ON DEMAND CONTENT 
& LIVE STREAMS</a></li>        
		<li><a href="<?=base_url();?>simple_view/post" data-track="SIMPLE VIEW POSTS" class="track_menu">POSTS</a></li>        
		<li><a href="<?=base_url();?>simple_view/program" data-track="SIMPLE VIEW PROGRAM" class="track_menu">PROGRAM</a></li>
		       
       <!-- <li class="divider"></li>-->
		<!-- <li><a href="#!"><b> XSHOP </b></a></li> -->
		<!--<li><a href="<?=base_url();?>">ALL LISTINGS (PRODUCTS)</a></li>-->
		<!-- <li class="divider"></li>-->
		<!-- <li><a href="#!"><b>XCONTESTS </b></a></li>-->
		<!--<li><a href="#!">ALL LISTINGS (GAMES)</a></li>  --> 
		</li>  
		</ul>   

		</label>	
		</li>   
		 <?php }?>
		</ul>
		</div> 
		</div>    
		
		 
		
		 <div class="header-prt">
        <div class="header-menu-right">
		<?php if($this->common->userStatus() != 2) {?>
			<ul>
                <li class="select-group clearfix">
                    <!-- <span>to start, select a group</span> -->
					<?php if($home_page_check==true){?>
                    <select name="header-select" class="select_a_group">
                        <option value="">TO START, SELECT A GROUP FIRST</option>
						<?php foreach($groups as $data){?>
						<option value="<?=$data->id?>" <?php if($group == $data->id){ echo "selected"; }?>><?=strtoupper($data->group_name);?></option>
						<?php }?>
						
												    
                    </select> 
					<?php }?>
                </li>
            </ul>
		<?php }?>
			</div>
			</div>  
<?php if($checkfront==true){?>
<div class="xconnect-right register-right">
		<button class="register-form-click" type="submit" id="reg_submit">CLICK HERE TO SUBMIT REGISTRATION FORM </button>
		</div>			
<?php }?>
		</div>
		
		
   
		</div>
		</div>
		</div>
		<?php 
			if(!empty($this->session->userdata('project'))){
		?>
<script>
$('.track_menu').click(function(){ 

		var project_id='<?=$this->session->userdata("project");?>';
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
			<?php if(!empty($this->session->userdata("workshopid"))){?>
			var url = '<?php echo base_url(); ?>places/WorkshopExitHistory';
			$.ajax({
				type: "POST",
				url: url, 
				data: {
					project_id: project_id,
					module_refid:'<?=$this->session->userdata("workshopid")?>',
					module_name:module_name
				},
				success: function(data) {

				}
			});
			<?php }?>
		}
	});
</script>
			<?php }?>
<script>
$(document).ready(function(){
	/*$('.select_a_group').change(function(){
		var group=$(this).val();
		if(group ==''){
			//$('.GroupByDisabled').css({ 'pointer-events' : 'none'});
		}else{
		var url='<?php echo base_url();?>home/selectAGroup';
			$.ajax({  
			type: "POST",
			url: url, 
			data: {group:group},
			success: function(data)
			{

				$('#config_project').html(data);
				//$('.GroupByDisabled').css({ 'pointer-events' : ''});

				
			}
			});
		} 
	});*/
        
        
        $("#config_project").change(function(){
        
        let group = $('.select_a_group').val();
        let project = $(this).val();
		
        window.location = '<?php echo base_url(); ?>home/config/'+group+'/'+project;
        
        
        
        
        });
		
		 $(".select_a_group").change(function(){
        
         let group = $('.select_a_group').val();
		// alert(group)
		<?php if($title=='PLACES'){?>
		window.location = '<?php echo base_url(); ?>places/index/'+group;
		<?php }elseif($title=='PROGRAM'){?>
		window.location = '<?php echo base_url(); ?>program_page/index/'+group;
		
		<?php }elseif($title=='CONTENT'){?>
		window.location = '<?php echo base_url(); ?>content_page/index/'+group;
		<?php }else{?>
          window.location = '<?php echo base_url(); ?>home/config/'+group;
        <?php }?>
        
        
        
         });

 

        
        
        
        
});
</script>

         
		
<script>
$('.dd-input').click(function(){
	//alert($(this).attr('id'));
	
	//alert($('#'+$(this).attr('id')).next().attr('class'));
	if($('#'+$(this).attr('id')).next().attr('class') == 'dd-menu show')
	{
		$('.xconnect-right label.dropdown ul.dd-menu.show').attr('class','dd-menu hide');
		$('#'+$(this).attr('id')).next().attr('class','dd-menu hide');
	}
	else if($('#'+$(this).attr('id')).next().attr('class') == 'dd-menu' || $('#'+$(this).attr('id')).next().attr('class') == 'dd-menu hide')
	{
		$('.xconnect-right label.dropdown ul.dd-menu.show').attr('class','dd-menu hide');
		$('#'+$(this).attr('id')).next().attr('class','dd-menu show');
	}
	
      //$('.dd-input').attr('checked', false);
      //$(this).attr('checked', true);

})

$(document).on('click', function (event) {
	if ($(event.target).closest('.user-search-btn-group ul').length == false) {
		$(".dd-menu").attr('class','dd-menu hide');
	}
});
</script>     	

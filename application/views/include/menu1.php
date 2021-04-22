<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

		<div class="header-xconnect">
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-8">
		<div class="middle-header clearfix">
		
		<div class="logo">
		<a href="<?=base_url();?>"><img src="<?=base_url();?>assets/images/x-platform.png" alt=""> </a>
		</div> 
		      
		</div>
		</div>

		<div class="col-md-4">    
		<div class="xconnect-right">
		<div class="user-search-btn-group ul-li clearfix">
		<ul>
		 <?php if($this->ion_auth->logged_in()){ ?>     
		<li>
		<label class="dropdown">
		
		<a class="dd-button">
		 <i class="fas fa-cog"></i>
		</a>
		
		<input type="checkbox" class="dd-input" id="test1">

		<ul class="dd-menu">
		<li><a href="#!"><b>XMANAGE</b></a></li>
		<li><a href="#!">XPLATFORM SETTINGS</a></li>
		<li><a href="#!">GROUPS</a></li>
		<li><a href="#!">USERS</a></li>	
	    <li><a href="#!">PERMISSIONS</a></li>	
	    <li><a href="#!">SUMMARY & STATISTICS</a></li>		
		</ul>     
		</label>
		</li>
	<?php } ?>
	 <?php if($this->ion_auth->logged_in()){ ?>  
		<li>
		<label class="dropdown">
		<a class="dd-button">
		 <i class="fas fa-sliders-h"></i>
		</a>
		<input type="checkbox" class="dd-input" id="test2">

		<ul class="dd-menu">
		<li><a href="#!"><b>CONFIG PAGES</b></a></li>
		<li><a href="<?php echo base_url(); ?>config">XCONNECT <!--(ALL LISTINGS)</a></li>
		<!--<li><a href="#!">XSHOP</a></li> 
		<li><a href="#!">XCONTEST</a></li>	-->		  
		</ul>     
		</label>       
		</li>
		<?php } ?> 
		
		<?php if(!$this->ion_auth->logged_in()){ ?>    
		<li><a href="<?php echo base_url(); ?>auth/create_user"> <span>SIGN UP</span> <!-- <img src="assets/images/sign-edit.png"> --> <i class="fas fa-edit"></i></a></li>
		<li><a href="<?php echo base_url(); ?>auth/login""> <span>SIGN IN</span> <!-- <img src="assets/images/sign-edit.png"> --> <i class="fas fa-user"></i></a></li>
		<?php } ?>
		
		
		    
		<li>
		<label class="dropdown">
		<?php if($this->ion_auth->logged_in()){ ?> 
		<a class="dd-button">
		 <!-- Hello <?php echo $this->session->userdata('first_name'); ?> -->  <img src="<?=base_url();?>assets/images/chat/workshop-thumb.png"> </i>
		</a>
		<?php } ?>
		<input type="checkbox" class="dd-input" id="test3">
		<ul class="dd-menu">
		<li><a href="#!"><b>XME</b></a></li>
		<li><a href="#!">MY DETAILS</a></li>
		<li><a href="#!">PASSWORD</a></li>
		
		<li class="divider"></li>
		<li><a href="#!"><b>XCONNECT</b></a></li>
		<li><a href="#!">MY REGISTRATIONS</a></li>
		<li><a href="<?=base_url();?>places">LET’S EXPLORE</a></li>
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

        <li>
                        <?php 
                        if($this->ion_auth->logged_in()){ ?>
                             <a href="<?=base_url();?>auth/logout"><b>SIGN OUT</b></a>
                        <?php } ?>		
		    </li>
		
		</li>  
		</ul>     

		</label>
				
		</li>
		
		     
		<li>
		
		<label class="dropdown">
		<a class="dd-button">
		<i class="fas fa-align-justify" style="margin-right: 0px!important;"></i>  
		</a>

		<input type="checkbox" class="dd-input" id="test4">

		<ul class="dd-menu" style="right: 0px;">
		<li><a href="#!"><b>XPLATFORM</b></a></li>
		<li><a href="<?php echo base_url(); ?>">HOME PAGE</a></li>
		<li><a href="<?=base_url();?>test/about">ABOUT</a></li>
		<li><a href="<?=base_url();?>home/support">SUPPORT</a></li>
		<li><a href="<?=base_url();?>home/corporate_enquiry">CORPORATE ENQUIRIES</a></li>
		
		<!--<li><a href="#!">GIGS</a></li> -->

		<li class="divider"></li>  
        <li><a href="<?=base_url();?>home/all_listings_places"><b>XCONNECT</b></a></li>		
	     <li><a href="<?=base_url();?>home/all_listings_places">ALL LISTINGS (PLACES)</a></li> 
		<li><a href="#!"><b>XCONNECT (INTERACTIVE VIEW)</b> <br> <span>NOTE: ALL DISPLAYS N 16:9 </span> </a></li>
		
		<li><a href="<?=base_url();?>places">LET’S EXPLORE</a></li>
		<!--<li><a href="#!"><b> XCONNECT (MOBILE USERS) </b></a></li>-->
		<!--<li><a href="<?=base_url();?>chat_box">CHAT</a></li>
		<li><a href="<?=base_url();?>info_buy">POSTS</a></li>    
		<li><a href="<?=base_url();?>program_page">PROGRAM</a></li>
		<li><a href="<?=base_url();?>content_page">ON DEMAND CONTENT 
& LIVE STREAMS</a></li>  -->   
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
   
		</ul>
		</div> 
		</div>
		
		 <div class="header-prt">
        <div class="header-menu-right">
			<ul>
                <li class="select-group clearfix">
                    <!-- <span>to start, select a group</span> -->
					<?php if($home_page_check==true){?>
                    <select name="header-select" class="select_a_group">
                        <option value="">TO START, SELECT A GROUP FIRST</option>
						<?php foreach($groups as $data){?>
						<option value="<?=$data->id?>" <?php if($group == $data->id){ echo "selected"; }?>><?=$data->group_name;?></option>
						<?php }?>
						
                    </select> 
					<?php }?>
                </li>
            </ul>
			</div>
			</div>   
		
		</div>
   
		</div>
		</div>
		</div>

</div>

</div>
</div>

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

        
	
		 <div class="bottom-header">
            <ul class="menus-button clearfix">
<!-- 			<div class="bottom-menu-left">
				<ul class="menus clearfix">
                <li><a href="#" class="active-link connect-tab">Xconnect. page selected:</a></li>
                <li><a href="#" class="active-link">Config page</a></li>
                <li><a href="#">Visit a place as a guest</a></li>
			</ul>
			</div> -->   
			<!--<div class="bottom-menu-right ">
			<ul>
                <li class="select-group clearfix">
                    <select name="header-select">
					<option>SELECT A PROJECT TO CONFIGURE</option>
                        <option>WORK GROUP 01,PROJECT 01</option>
						<option>WORK GROUP 01,PROJECT 02</option>
						<option>WORK GROUP 01,PROJECT 03</option>
						<option>WORK GROUP 01,PROJECT 04</option>
						<option>WORK GROUP 01,PROJECT 05</option>
						<option>WORK GROUP 01,PROJECT 06</option>
						<option>WORK GROUP 01,PROJECT 07</option>
                    </select>
                </li>
            </ul>
        </div>-->
		</div>   
		</div>
		
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
</script>	

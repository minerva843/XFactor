<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="header-prt">
<div class="container-fluid">
<div class="row">
<div class="col-md-8">
	 <div class="middle-header clearfix">
		 
		 <div class="logo">
              <a href="#"><img src="http://13.235.169.150/XFactor/assets/images/x-logo.png" alt=""> </a>
            </div>   
		 
		 <div class="header-menu-left">
		 
		<nav class="navbar navbar-expand-lg navbar-light">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav menus">
		<li><a href="#">XMANAGE HOME</a></li>
		<li><a href="<?php echo base_url(); ?>test/xexperiance">WHAT'S NEW</a></li>
		<li><a href="#">LET'S EXPLORE</a></li>
		<li><a href="#">SIMPLE VIEW</a></li>
		<li><a href="#">INQUIRIES</a></li>  
		<li><a href="#" class="active">CONFIG PAGE</a></li>
		</ul>

		</div>
		</nav>
		  <!--
		 
            <ul class="menus clearfix">
                <li><a href="#">XMANAGE HOME</a></li>
                <li><a href="<?php echo base_url(); ?>test/xexperiance">WHAT'S NEW</a></li>
                <li><a href="#">LET'S EXPLORE</a></li>
                <li><a href="#">SIMPLE VIEW</a></li>
				<li><a href="#">INQUIRIES</a></li>
				<li><a href="#" class="active">CONFIG PAGE</a></li>
			</ul>	 -->   
			
			</div>
			   
		 </div>
</div>

<div class="col-md-4">
<div class="top-header clearfix">  
            <div class="profile">
                <ul>
                    <li class="profile-sec">
                        <a href="#">
                            <img src="assets/images/user.png" alt="">
                            <div class="profile-name">Hello <?php echo $this->session->userdata('first_name'); ?></div>
                        </a>
                    </li>
                    <li>
                        <?php 
                        if($this->ion_auth->logged_in()){ ?>
                             <a href="<?=base_url();?>auth/logout">LogOut</a>
                        <?php } ?>		
		    </li>
                </ul>  
            </div>
        </div>
		
		<div class="header-menu-right">
			<ul>
                <li class="select-group clearfix">
                    <!-- <span>to start, select a group</span> -->
                    <select name="header-select" class="select_a_group">
                        <option value="">TO START, SELECT A GROUP FIRST</option>
						<?php foreach($groups as $data){?>
						<option value="<?=$data->id?>" <?php if($_SESSION['SingleGroup'] == $data->id){ echo "selected"; }?>><?=$data->group_name;?></option>
						<?php }?>
						
                    </select>
                </li>
            </ul>
			</div>
		
</div>

</div>
</div>

<script>
$(document).ready(function(){
	$('.select_a_group').change(function(){
		var group=$(this).val();
		if(group ==''){
			$('.GroupByDisabled').css({ 'pointer-events' : 'none'});
		}else{
		var url='<?php base_url();?>home/selectAGroup';
			$.ajax({  
			type: "POST",
			url: url, 
			data: {group:group},
			success: function(data)
			{

				$('#config_project').html(data);
				$('.GroupByDisabled').css({ 'pointer-events' : ''});
				
			}
			});
		}
	})
})
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
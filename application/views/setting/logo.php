<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>SETTINGS</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnposttep1"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
			
			
			 <div class="col-md-9">  <?php // print_r($zone); ?>
				
			<div class="row config-heading">
			<div class="col-md-12">
			<h2>LOGO, TOP LEFT </h2>
			</div>
			</div>
				   		
			<div class="row setting-top">
			<div class="col-md-7">
			<h3> <b>CURRENT IMAGE THAT IS USED IS DISPLAYED BELOW. </b></h3> 
			</div>
			
			<div class="col-md-5 text-right">
			<a href="#" class="setting_edt_btn default_logo">USE DEFAULT IMAGE</a> 
			<a href="#" class="setting_edt_btn addlogo">Edit</a>
			</div>    			
			</div>	
			
			<div class="table-cont setting_body"> 
			
			<div class="setting_logo">  
			
			<div class=" m-l-0 m-r-0">
			<div class="col-md-4 p-l-0">
			<div class="add_logo">
			<?php if(empty($data1->new_logo)){?>
			<img src="<?=base_url();?>assets/images/x-platform.png" alt="">
			<?php }else{?>
			<img src="<?=base_url();?>assets/images/<?php echo $data1->new_logo;?>" alt="">
			<?php }?>
			</div>
			</div>
			</div>  
			
			
			  
			
			</div>
			
			</div>



					
                </div>
			
			


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> --> 
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								
                            </ul>
                            <div class="table_info floor-step setting_ui">                                
                              <ul>
							 
                                <li><a class="current">LEGAL</a> </li>
								<li><a class="teams_of_use">TERMS OF USE</a> </li>
								<li><a class="privacy_policy">PRIVACY POLICY</a></li>
								<li><a class="current">VISUALS</a></li>
								<li><a class="logo active ">LOGO, TOP LEFT</a></li>
								<li><a class="header_homepage">HEADER, HOME PAGE, SHOW / HIDE</a></li>
								<li> <a class="header_explore">HEADER, LET'S EXPLORE PAGE</a></li>
								</ul>
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                    
                                    
                                    
                                    
                                    
                                    
                                 
                                    
                                </div>
                            </div> 
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5" >Back</a>
							  
                            </div>
                        </div>
                    </div>
                </div>


 
            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>


<script>
$("body").on('click','.default_logo',function(){
	var formdata='';
      $.ajax({
     url: '<?php echo base_url(); ?>setting/set_default_logo', 
     type: 'post',
     data: formdata,
     success: function (response) {
			$.fancybox.getInstance('close');
			$.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?php echo base_url(); ?>setting/logo_success",
				ajax: { 
				   settings: { data : 'project=<?=$project_id?>', type : 'POST' }
				},
				touch: false,
				clickSlide: false,
				clickOutside: false
			});
		}

	 });	 
  
	
});

$("body").on('click','.addlogo',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/addlogo",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','.privacy_policy',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/privacy_policy",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','.teams_of_use',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/teams_of_use",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','.logo',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/logo",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','.header_homepage',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/header_homepage",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','.header_explore',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/header_explore",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

$("body").on('click','#btn5',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/index",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

   
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
 location.reload();			
        });        

</script>


<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }

</style>

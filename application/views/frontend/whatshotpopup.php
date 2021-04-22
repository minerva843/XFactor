<div class="main-section whatshot-p" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9 chatpo1">
                    <h2>XPLATFORM (WHAT'S HOT)</h2>
                </div>

                <div class="col-md-3 chatpo2">   
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnposttep1"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
				
			<div class="row config-heading">
			<div class="col-md-12 text-right">
			<?php if(!empty($data1->whatshot_btnurl)){?>
			<a href="<?=$data1->whatshot_btnurl?>" target="_blank" class="get_full_detail"> GET FULL DETAILS ON ADVERTISER’S SITE </a>
			<?php }else{?>
			
			<a href="#" class="get_full_detail"> GET FULL DETAILS ON ADVERTISER’S SITE </a>
			<?php } ?>
			<p><?=$data1->whatshot_remarks?> </p>
			</div>
			</div>
				   	     
			<!--===================left side start ========================-->
			<div class="whathot_popup"> 
				<?php if($data1->file_type=='video'){?>
					<video>
					  <source src="<?php echo base_url(); ?>assets/whats_hot/<?php echo $data1->file_name; ?>" type="video/mp4">
					</video>
				<?php }else{?>
				<img src="<?php echo base_url(); ?>assets/whats_hot/<?php echo $data1->file_name; ?>" alt=""> 
				<?php }?>
			   
			</div>
			<!--=====================left side end=========================-->
					
            </div>

			<!--===============right side start =================-->
			<div class="col-md-3">
			<div class="whats-hots-right"> 
			
			<p class="mb-20"><b>POSTED ON</b> : <?=$data1->whatshot_posted_date?> </p>
			
			
			<p class="mb-20"> <b> <?=$data1->whatshot_title?> </b></p>
			<?=$data1->whatshot_desc?>
			

			
			</div>
			 
			</div>
			<!--===========right side end==================== -->

 
            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>




<script>
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



<script>
$("body").on('click','.addteams',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>setting/addteams",
        ajax: { 
           settings: { data : 'project=<?=$project_id?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
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

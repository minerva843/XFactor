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
			
			
			 <div class="col-md-9" id="printJS-form-header">  <?php // print_r($zone); ?>
				<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" type="text/css">
				<link rel="stylesheet" href="<?=base_url();?>assets/css/print.css" type="text/css">
			<div class="row config-heading">
			<div class="col-md-12">
			<h2>HEADER, HOME PAGE, SHOW / HIDE </h2>
			</div>
			</div>
				   		
			<div class="row setting-top">
			<div class="col-md-7">
			<h3> <?php echo date('Ymd hi'); ?>h. HEADER, HOME PAGE, SHOW / HIDE (EDIT) <b><span class="sucess">SUCCESSFUL </span></b></h3> 
			</div>
			
			<div class="col-md-5 text-right">
			<a href="#" class="setting_edt_btn " onclick="printJS({printable:'printJS-form-header', type:'html',targetStyles: ['*']})">PRINT</a> 
			<a href="#" class="setting_edt_btn done">DONE</a>
			</div>    			
			</div>	
			
			<div class="table-cont setting_body"> 
			
			<div class="setting_table_header">    
			<div class="project-scroll"> 
			<table>
				<thead>
					<tr>
						<th>HEADER NAME</th>
						<th>DISPLAYED</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>WHERE DO YOU WISH TO GO?</td>
						<td><?php if($data1->headerhome_where_do_u_wish_to_go=='1'){ echo 'YES';}else{ echo 'NO'; }?></td>
					</tr>
					<tr>
						<td>XPLATFORM(WHAT'S HOT)</td>
						<td><?php if($data1->xplatform_whats_hot=='1'){ echo 'YES';}else{ echo 'NO'; }?></td>
					</tr>
					<tr>
						<td>XCONNECT(WHAT'S NEW)</td>
						<td><?php if($data1->xconnect_whats_new=='1'){ echo 'YES';}else{ echo 'NO'; }?></td>
					</tr>
				</tbody>
			</table>
			
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
								<li><a class="logo  ">LOGO, TOP LEFT</a></li>
								<li><a class="header_homepage active">HEADER, HOME PAGE, SHOW / HIDE</a></li>
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
     url: '<?php echo base_url(); ?>setting/set_default_header', 
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
				src         : "<?php echo base_url(); ?>setting/header_homepage_success",
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

$("body").on('click','.done',function(){
          
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

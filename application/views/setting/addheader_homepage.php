<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>" method="POST" id="addTerms223">
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
			<h2>HEADER, HOME PAGE, SHOW / HIDE (EDIT) </h2>
			</div>
			</div>
				   		
			<div class="row setting-top">
			<div class="col-md-7">
			<h3> <b>ALL HOME PAGE, HEADERS & DEATILS ARE LISTED BELOW.</b></h3> 
			</div>
			
			<div class="col-md-5 text-right">
			<a href="#" class="setting_edt_btn default_logo">USE DEFAULT SETTINGS</a> 
			<input type="submit"  class="setting_edt_btn" value="SAVE">
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
						<td class="deletesingle">
								<?php if($data1->headerhome_where_do_u_wish_to_go=='1'){ $check1='checked';}else{ $check1=''; }?>
								<input type="checkbox" id="check1" name="delete_val" value="1" class="deletClas" style="display:none;" <?=$check1;?>>
								<label for="check1" style="" class="deletClass"></label>
								</td>
					</tr>
					<tr>
						<td>XPLATFORM(WHAT'S HOT)</td>
						<td class="deletesingle">
								<?php if($data1->xplatform_whats_hot=='1'){ $check2='checked';}else{ $check2=''; }?>
								<input type="checkbox" id="check2" name="delete_val" value="1" class="deletClas" style="display:none;" <?=$check2;?>>
								
								<label for="check2" style="" class="deletClass"></label>
								</td>
					</tr>
					<tr>
						<td>XCONNECT(WHAT'S NEW)</td>
						<td class="deletesingle">
								<?php if($data1->xconnect_whats_new=='1'){ $check3='checked';}else{ $check3=''; }?>
								<input type="checkbox" id="check3" name="delete_val" value="1" class="deletClas" style="display:none;" <?=$check3;?>>
								<label for="check3" style="" class="deletClass"></label>
								</td>
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

        <div class="footer">2019 ??? <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 </form>
    </div>

</div>

<script>

      
$("#addTerms223").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				
				
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 

        var check1=$('#check1:checked').val();
        var check2=$('#check2:checked').val();
        var check3=$('#check3:checked').val();
      

 var formdata = new FormData(); 

 formdata.append('check1', check1);
 formdata.append('check2', check2);
 formdata.append('check3', check3);

   $.ajax({

     url: '<?php echo base_url(); ?>setting/addheader_homepage_post', 
     type: 'post',
     data: formdata,
    dataType: 'html',
     contentType: false,
     processData: false,
     success: function (response) {

			var data=$.trim(response);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url(); ?>setting/header_homepage_success/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						},
						touch: false,
                                  clickSlide: false,
                                  clickOutside: false
					} 
				}); 

			}
		

     },
	  error: function(xhr) { // if error occured
        alert("Error occured.please try again");
        
    },
   });
       
        return false;  
    }
});
 

   


</script>
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
				src         : "<?php echo base_url(); ?>setting/header_homepage",
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

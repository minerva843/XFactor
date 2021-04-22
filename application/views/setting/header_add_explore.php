<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>" method="POST" id="addTerms">
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
                <div class="col-md-9">  
				
					<div class="row config-heading">
						<div class="col-md-12">
							<h2>HEADER LET'S EXPLORE PAGE (EDIT)</h2>
						</div>
					</div>
				   		
					<div class="row setting-top">
						<div class="col-md-9">
							<h5> <b>ALL DETAILS OF HEADER LET'S EXPLORE PAGE ARE LISTED BELOW. </b></h5> 
						</div>
			
						<div class="col-md-3 text-right">
							<!--a href="#" class="setting_edt_btn addsave">SAVE</a--> 
							<input type="submit"  class="setting_edt_btn" value="SAVE">
						</div>    			
					</div>	
			
					<div class="table-cont setting_body"> 
						<div class="post_textarea poject_editor"> 
							<input type="text" maxlength="100" id="header_lets_explore_title" class="header_lets_explore_title" name="header_lets_explore_title" placeholder="ENTER LET'S EXPLORE PAGE TITLE" 
							value="<?php echo $data1->header_lets_explore_title;?>">
										
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
								<li><a class="teams_of_use ">TERMS OF USE</a> </li>
								<li><a class="privacy_policy">PRIVACY POLICY</a></li>
								<li><a class="current">VISUALS</a></li>
								<li><a class="logo">LOGO, TOP LEFT</a></li>
								<li><a class="header_homepage">HEADER, HOME PAGE, SHOW / HIDE</a></li>
								<li> <a class="header_explore active">HEADER, LET'S EXPLORE PAGE</a></li>
								</ul>
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content"> </div>
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5" >Back</a>
                              
                                <!--input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtncontentterms"-->
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

      
$("#addTerms").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				
				
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 

        var header_lets_explore_title=$('#header_lets_explore_title').val();
      

 var formdata = new FormData(); 

 formdata.append('header_lets_explore_title', header_lets_explore_title);

   $.ajax({

     url: '<?php echo base_url(); ?>setting/addexplore_post', 
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
					src: '<?php echo base_url(); ?>setting/explore_success/'+data,
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
<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }

</style>

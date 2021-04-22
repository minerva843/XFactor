<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>" method="POST" id="addLOGO">
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
			<h2>LOGO, TOP LEFT (EDIT)</h2>
			</div>
			</div>
				   		
			<div class="row setting-top">
			<div class="col-md-7">
			<h3> <b>CURRENT IMAGE THAT IS USED IS DISPLAYED BELOW. </b></h3> 
			</div>
			
			<div class="col-md-5 text-right">
			<a href="#" class="setting_edt_btn default_logo">USE DEFAULT IMAGE</a> 
			
			<!--a href="#" class="setting_edt_btn addlogo">Edit</a--> 
			<input type="submit" value="SAVE" class="setting_edt_btn">
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
			
			<p class="mb-0"><b>SELECT AN NEW IMAGE </b></p>
            <p class="mb-0">FOR SMALL LOGO, RECOMMENDED IMAGE SIZE IS PIXELS (160), PIXELS (120).</p>
            <p class="mb-0">FOR BANNER, RECOMMENDED IMAGE SIZE IS PIXELS (1280), PIXELS (120).</p>
			
			
			<div class="form-group rmv_btn_main add_logo_input">
							<div class="col-sm-5 p-l-0">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
															<div class="file-upload">   
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">SELECT AN IMAGE</div> 
                                     <input type="file" name="image" id="file" class="file" accept="image/*" onchange="ValidateSingleInput(this);">
									
									  <div class="file-select-button file1" id="fileName">BROWSE</div>
									 
									  
								  </div>
								</div>     
								
							</div>  
						
							
							
						</div>
			
			<p class="mb-0">FILE FORMAT MUST BE JPEG OR PNG.</p>
			<p class="mb-0">FILE SIZE MUST NOT EXCEED 3MB.</p>

			  
			
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
                              
                                <!--input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtncontent"-->
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
var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPEG / PNG FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show();
                oInput.value = "";
                return false;
            }else{
				
								//alert();
				$('.image_err_fileformat1').empty();
                $('.image_err_fileformat2').empty();
			}
        }
    } 
    return true;
}
 
$('.file').on('change', function() { 
	if (this.files[0].size > 3145728) { 
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 3 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	} 
});  
$('#file').bind('change', function () {
  var filename = $("#file").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active'); 
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

	
$("#addLOGO").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
        
 var formdata = new FormData(); 

var file_data = $('#file').prop('files')[0];
 formdata.append('new_logo', file_data); 


   // AJAX request
   $.ajax({
     url: '<?php echo base_url(); ?>setting/addlogo_post', 
     type: 'post',
     data: formdata,
     dataType: 'json',
     contentType: false,
     processData: false,
     success: function (response) {

			var data=$.trim(response);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url(); ?>setting/logo_success/'+data,
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
       
        return false;  //This doesn't prevent the form from submitting.
    }
});
 

</script>
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



<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }

</style>


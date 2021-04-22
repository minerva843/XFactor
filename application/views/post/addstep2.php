<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>post/addstep2post/<?=$data1->id;?>" method="POST" id="addZone1">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>POST (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnpoststep2"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title">
					                    <div class="leftbox-top" id="zones-add">
				<!-- 	<h5> ENTER ZONE DETAILS THAT ARE LISTED BELOW :</h5> -->
					</div> 
					</div>
					</div>	
 
                    <div class="zone-info add-conents">     
                        <h3> POST EXTERNAL LINK & PRICE INFO</h3>  				
                         

						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">WEBSITE</label>
							<div class="col-sm-5">
								<input type="text" name="website" maxlength="250" value="" class="form-control running_latter website" id="website" placeholder="ENTER WEBSITE INPUT 'HTTP://' OR 'HTTPS://' BEFORE WEBSITE ADDRESS.">
							<p class="optional">(optional)</p>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">BUTTON URL</label>
							<div class="col-sm-5">
							<?php if($data1->post_type=='INFO'){?>
							<div><p>Not Applicable.</p></div>
							<?php }else{?>    
								<input type="url" name="btn_url" maxlength="250" value="" class="form-control running_latter btn_url" id="btn_url" placeholder="ENTER BUTTON URL. INPUT 'HTTP://' OR 'HTTPS://' BEFORE WEBSITE ADDRESS. ">
							<p class="optional">(optional)</p>
							<?php }?>
							</div>
						</div>    
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">PRICE</label>
							<div class="col-sm-5">
								<input type="text" maxlength="30" name="price" value="" class="form-control price" id="price" placeholder="Enter PRICE">
								<p class="optional">(optional)</p>
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
								 <li><a data-toggle="tab" href="">ALL ASSIGNMENTS</a></li>
								 <li><a data-toggle="tab" href="">ASSIGN POST</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                <p><span class="current-bold">CURRENTLY SELECTED :</span> POST (ADD)</p>
                                <h5>STEP 2 OF 2</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN DONE, CLICK NEXT.</p>
                       
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
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtncontent">
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
$(document).ready(function(){
    
    $("#addZone1").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				price:{
					digits:false
				},
				btn_url:{
					maxlength : 250
				}
			}, 
			errorPlacement: function(){
                               return false;
                         },

    submitHandler: function(form) { 
var website=$('#website').val();
var btn_url=$('#btn_url').val();
var price=$('#price').val();

var formdata ={website:website,btn_url:btn_url,price:price}

   // AJAX request
   $.ajax({

     url: '<?php echo base_url(); ?>post/addstep2post/<?=$data1->id?>', 
     type: 'post',
     data: formdata,
     success: function (response) {

			var data=$.trim(response);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url(); ?>post/viewAddPostsSuccessful/'+data,
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
   

	// $("body").on('click','#submitbtncontent',function(){
	
    
// var website=$('#website').val();
// var btn_url=$('#btn_url').val();
// var price=$('#price').val();

// var formdata ={website:website,btn_url:btn_url,price:price}
 // $.ajax({

     // url: '<?php echo base_url(); ?>post/addstep2post/<?=$data1->id?>', 
     // type: 'post',
     // data: formdata,
     // success: function (response) {

			// var data=$.trim(response);
			// $.fancybox.getInstance('close');
                    
			// if (data) {  
				// $.fancybox.open({ 
					// src: '<?php echo base_url(); ?>post/viewAddPostsSuccessful/'+data,
					// type: 'ajax',    
					// opts: {
						// afterShow: function (instance, current) {
							// console.info('done!');
						// },
						// touch: false,
					   // clickSlide: false,
					   // clickOutside: false
					// } 
				// }); 

			// }


     // }
   // });

// });
 
 
});


</script>




<script>
$("body").on('click','#btn5',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
		src: '<?=base_url();?>post/addpost/<?=$data1->id;?>',
		type: 'ajax',
		ajax: {
			settings: {data: 'ABC', type: 'POST'}
		},
		opts: {
			afterShow: function (instance, current) {
				console.info('done!');
			},
			 touch: false,
					   clickSlide: false,
					   clickOutside: false
		}
	});
	
});

    $(document).ready(function () {
        
        $('body').on('click', '#close-btnpoststep2', function () {
            $.fancybox.close();

            window.location.href = "<?php echo base_url(); ?>post/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $data1->group_id; ?>/<?php echo $data1->project_id; ?>/ADD/2";
            
            
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

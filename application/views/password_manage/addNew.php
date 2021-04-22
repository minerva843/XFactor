<style>
.fancybox-close-small{
	display:none!important;
}
.star-program input.smalimput {
    width: 8%;
    margin-left: 16px;
}
.star-program{padding-left: 0px;}
.star-program label.col-form-label {
    padding-left: 0px;
    text-align: center;
}
.star-program label.col-form-label {
    font-size: 12px;
    font-weight: normal;
    width: 6%;
}
.star-program label.col-form-label:after {
    display: none;
}

</style>


 
 
<div class="main-section floor_steps" id="add-floor">  
    <div class="container">
 <form method="POST"  class="register-form_1" id="register-form2" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>USERS PASSWORD RESET</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnstep1guest"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">

            <div class="row">
				   <div class="col-md-9">   
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					<h3> PASSWORD RESET  <?php //echo $project_select; ?> <?php //echo $group_id; ?></h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2 guest_add">				
  
  
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ENTER PASSWORD </label>
							<div class="col-sm-5">
								<input type="password" maxlength="20" name="password" placeholder="ENTER PASSWORD" id="password1" />

							</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">RE ENTER PASSWORD </label>
							<div class="col-sm-5">
								<input type="password" maxlength="20" name="password_confirm"  placeholder="RE ENTER PASSWORD" id="password_confirm" />

							</div>	 
						</div>
						
						 
						
						
                    </div>      
                      
                </div> 


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li><a data-toggle="tab" class="active" href="#menu1">MAIN MENU</a></li>
								<!--li class=""><a id="openusermanagelist88" data-toggle="tab" href="#menu1">USERS LISTS</a></li>
								 <li class="" id="usermanageassignmain4"><a data-toggle="tab" href="#">ASSIGN USERS</a></li-->
				                
				                      
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1"><span class="current-bold">CURRENTLY SELECTED :</span><p> <?php if(!empty($data1->first_name)){echo $data1->first_name;}else{echo 'USERS (ADD)';}   ?>
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF 1</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
		
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="openusermanagelist05659">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5ADDguest">
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



                                 <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> USERS (ADD) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>EMAL OR MOBILE OR USERNAME EXISTS IN RECORDS.</p>
                                                 
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
					</div> 
 

<script>


$(document).ready(function(){

			
	$("body").on('click','#openusermanagelist05659',function(){
          
           $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>PasswordManage/allUsersPasswordManage",
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
            
        });
	
$('body').on('click', '#close-btnstep1guest', function () {
            $.fancybox.close();
            location.reload();

});

$('.close').click(function () {
                  var modal = document.getElementById("myModal1");
                  modal.style.display = "none";
                              
});

 $.validator.setDefaults({
	    submitHandler: function(){


 var formdata = new FormData();
var url="<?php echo base_url();?>PasswordManage/addstep1Post/<?php if(!empty($data1)){ echo $data1->id; }?>"; 


 formdata.append('password', $('#password1').val());

$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
		
			var data=$.trim(data);
			
			if (data) {
                            
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true, 
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>PasswordManage/addUserSuccess/'+data,
        ajax: { 
           settings: { data : 'id='+data+'&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        });    
                             
			}else{
			
			//alert("Error occured. Email or Phone already exist");
			                     var modal = document.getElementById("myModal1");
                                            var span = document.getElementsByClassName("close")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
			
			}
		}
	});

        
		}
	});

 
	$("#register-form2").validate({
		rules: {
				password: {
                                         required: true, 
                                         minlength: 8,
										 maxlength: 20
                                },
                                password_confirm: {
                                         required: true,
                                         minlength: 8,
										 maxlength: 20,
                                         equalTo: "#password1"
                                }
				
				
				

		},
		errorPlacement: function(){
                               return false;
                         } 
		
	});
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


</script>

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>

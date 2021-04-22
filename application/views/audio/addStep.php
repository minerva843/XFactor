<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?=base_url();?>floor/addStep1FloorPlans/<?php echo $data->id;?>" method="POST" id="addZone">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>AUDIO STREAM (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
                        <h3> AUDIO STREAM INFO</h3>  				
                        
						
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">AUDIO STREAM NAME</label>
							<div class="col-sm-5">
								<input type="text" name="audio_stream_name" maxlength="50" class="audio_stream_name" value="<?php if($data->audio_stream_name){ echo $data->audio_stream_name;}?>" class="form-control" id="audio_stream_name" placeholder="Enter AUDIO STREAM NAME. MAXIMUM ALLOWED CHARACTERS 50">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">AUDIO STREAM SOURCE</label>
							<div class="col-sm-5">
								<input type="text" name="audio_stream_source" maxlength="50" class="audio_stream_source" value="<?php if($data->audio_stream_source){ echo $data->audio_stream_source;}?>" class="form-control" id="audio_stream_source" placeholder="Enter AUDIO STREAM SOURCE. MAXIMUM ALLOWED CHARACTERS 50">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">AUDIO STREAM URL</label>
							<div class="col-sm-5">
								<input type="text" name="audio_stream_url" class="audio_stream_url running_latter" value="<?php if($data->audio_stream_url){ echo $data->audio_stream_url;}?>" class="form-control" id="audio_stream_url" placeholder="ENTER AUDIO STREAM URL."> 
							</div>
						</div>



						
                      
                        
                    </div>  
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!-- <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								
                            </ul>
                            <div class="table_info floor-step">   
							<div class="current-status">
								<p><span class="current-bold">CURRENTLY Selected:</span> AUDIO STREAM (ADD)</p>
								</div>
                                <div class="display-step-status">  
                                 <h5>STEP 1 OF 1</h5>
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
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5" >Back</a>
                                <input type="submit" value="Next" class="action-btn" name="submit" id="submitbtncontent">
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
$('.tab-content').hide();

});

</script>

<script>
$(document).ready(function(){
    
 
 
    
   
$("#addZone").submit(function(e) {
    e.preventDefault();
}).validate({
    			
				rules: {
				audio_stream_source: "required",
				audio_stream_name: "required",
				audio_stream_url:"required"
			}, 
			errorPlacement: function(){
                               return false;
                         }, 

    submitHandler: function(form) { 

        
       var audio_stream_source=$('#audio_stream_source').val();
var audio_stream_name=$('#audio_stream_name').val();
var audio_stream_url=$('#audio_stream_url').val();

 var formdata = new FormData(); 


 formdata.append('audio_stream_url', audio_stream_url);
 formdata.append('audio_stream_name', audio_stream_name);
 formdata.append('audio_stream_source', audio_stream_source);
 formdata.append('project_id', <?=$project?>);

   // AJAX request
   $.ajax({

     url: '<?php echo base_url(); ?>audio/addstepPOSt', 
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
					src: '<?php echo base_url(); ?>audio/AddSuccessful/'+data,
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
 
    // File type validation
 
});
</script>

<?php 
if(!empty($data->project_id)){
	$project=$data->project_id;
}else{
	$project=$project;
}
?>


<script>
$("body").on('click','#btn5',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>audio/index",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});

    $(document).ready(function () {
        
        
//        $("#videfiles").on("change", function() {
//    if ($("#videfiles")[0].files.length > 5) {
//   //     $(this).after('<label id="videfiles-error" class="error" for="videfiles">ONLY 5 VIDEOS ARE ALLOWED.</label>')
//        alert("You can select only 5 videos");
//    } else {
//       alert();
//    }
//});

//
//updateList = function() {
//    var input = document.getElementById('videfiles');
//    var output = document.getElementById('fileList');
//    var children = "";
//    for (var i = 0; i < input.files.length; ++i) {
//        
//        
//        children +='<div class="form-group row"><div class="col-sm-4"></div><div class="col-sm-3" style="padding-left: 1px;"><p class="file-extan-content">'+input.files.item(i).name+'</p></div><div class="col-sm-2 post-code"><p>'+((input.files.item(i).size)/(1024*1024)).toFixed(2)+' MB</p></div><div class="col-sm-2 post-code"><a href="#">REMOVE</a></div></div>';
//        
//        
//        
//       // children += '<li>' + input.files.item(i).name + '</li>';
//    }
//    output.innerHTML = '<ul>'+children+'</ul>';
//}
//        
 
 


        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
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
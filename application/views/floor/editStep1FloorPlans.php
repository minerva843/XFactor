<style>
.fancybox-close-small{
	display:none!important;
}
</style>
<div class="main-section edit-floor-x"> 
    <div class="container">
 
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>FLOOR PLANS (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnfloorstep1"></div>
                </div>
            </div>   
        </div>	   
<form method="POST" action="<?=base_url();?>floor/editStep1FloorPlans<?php if(isset($data->id)){  echo "/".$data->id; }?>" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="middle-body register-form">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
					
					
                    <div class="zone-info floor-planadd">
					<div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title"></div>
					</div>
                        <h3> FLOOR PLAN INFO</h3>  				
                       
                            <?php echo $success_msg; ?>
						<?php echo $error_msg; ?>
						
					
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROJECT NAME</label>
							<div class="col-sm-5">
								<p style="margin-top: -3px;"><?php echo $data->project_name;?></p>

							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">FLOOR PLAN NAME</label>
							<div class="col-sm-5">
								<input type="text" name="floor_plan_name" maxlength="50" class="floor_plan_name" class="form-control" value="<?php echo $data->floor_plan_name;?>" id="floor_plan_name" placeholder="Enter floor plan name. MAXIMUM ALLOWED CHARACTERS 50">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">Floor Plan Image</label>
							<div class="col-sm-5">
								<p style="padding-top: 6px;"><?php echo $data->file_name.$data->file_type;?></p>
							</div>
						</div>
						 
                            
						
						<div class="scale-info">
						<p>FLOOR PLAN SCALE INFO</p>
						</div>
                       	 <div class="form-group row foloorr">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">Each grid represents</label>
							<div class="col-sm-5">
								<input style="margin-right: 10px;"  value="<?=$data->each_square;?>" type="text" name="each_square" placeholder="Enter a measurment" id="measurment" class="measurment form-control"><span class="meter-right">meters</span><span style="color:red;font-weight: 100;" class="each_digit_error"></span>
								<p style="color:black">DEFAULT IS 1 METER x 1 METER.</p>
							<p style="color:black;margin-top: -17px;">MINIMUM VALUE IS 1, MAXIMUM VALUE IS 100.</p>
							</div>
						</div>

					
                       
                    </div>  
                      
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                   	<ul>						
					     <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
   <!--                              <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> -->
                                 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
						</ul>
                            <div class="table_info floor-step">
                              <div class="current-status"> 
							  	<div class="view-floor-select">
							<p class="current-status-1"><span class="current-bold">CURRENTLY SELECTED :</span> <p> <?php echo $data->floor_plan_name;?>
						    </div>
							<div class="display-step-status">
							<h5>STEP 1 OF 2</h5>
						   <p>EDIT THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN DONE, CLICK NEXT.</p>
                       
					       </div>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
								<!--input type="submit" value="Back" class="action-btn backbtn" name="back" id="btn5"-->
								<a class="action-btn backbtn" id="bt455n5" >Back</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5">
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



$('body').on('click', '#close-btnfloorstep1', function () {
            $.fancybox.close(); 
            window.location.href = "<?php echo base_url(); ?>floor/deleteJunkRecord/<?php echo $id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/Edit/1";

});
	
 
$.validator.setDefaults({
	    submitHandler: function() {

var floor_plan_name=$('.floor_plan_name').val();
var measurment=$('.measurment').val();

 var formdata = new FormData();
var url="<?=base_url();?>floor/editStep1FloorPlans<?php if(isset($data->id)){  echo '/'.$data->id; }?>"; 

 formdata.append('floor_plan_name', floor_plan_name);
 formdata.append('measurment', measurment);

console.log(formdata);
 
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
			//console.log(data);
			$.fancybox.getInstance('close');
                    
		if (data) {
				
		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>floor/editStep2FloorPlans/'+data,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
				

			} 
		}
	});


}
});
jQuery.validator.addMethod("dollarsscents", function(value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
    }, "You must include two decimal places");
	
		$("#register-form").validate({
			rules: {
				each_square: {
				//digits:true,
				required: true,
				// minlength: 1,
				//maxlength: 3,
				range: [.1, 100],
				dollarsscents: true
			  },
				floor_plan_name:{
					required:true,
					maxlength:50,
				},
				
			}, 
			errorPlacement: function(){
                               return false;
                         } 
			// messages: {
				// each_square: {
				  // required: "ENSURE THAT A MEASUREMENT IS SELECTED.",
				  
				  // range: "2 DECIMAL PLACE. NO NEGATIVE",
				 // },
				// floor_plan_name: "ENSURE THAT A FLOOR PLAN NAME IS FILLED IN."
				
			// }
		});
		
	$("body").on('click','#bt455n5',function(){
           $.fancybox.getInstance('close');
           
           
           
                    		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>floor/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
            
            
            
            
            
        });
});


</script>

  <script>
function myFunction() {
  var x = document.getElementById("image");
  x.disabled = true;
}
</script>

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }
</style>

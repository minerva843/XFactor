<div class="main-section" id="add-floor"> 
    <div class="container">
<form action="<?php echo base_url(); ?>workshop/processAdd/<?php echo $workshop->id; ?>" method="POST" id="addWorkshop">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WORKSHOPS (<?php echo $action; ?>)</h2>
                </div>
 
                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"  id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">   
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					 
 
                    <div class="zone-info">
                        <h3>WORKSHOP INFO</h3>  				
                        
                            <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">WORKSHOP NAME</label>
                                <div class="col-sm-5">
                                   
                                    <input type="text" placeholder="ENTER WORKSHOP NAME"  name="workshop_name" id="workshop_name" value="<?php echo $workshop->workshop_name;  ?>" />
 
                                     
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP START DATE & TIME</label>
                                <div class="col-sm-5">
                                    
                                     <input type="text" name="start_datetime"    value="<?php echo $workshop->startdatetime; ?>" class="form-control" id="start_datetime" placeholder="YYYY-MM-DD HH:MM"">
                                     <i id="setup_end_icon" style="position: absolute;right: 19px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>

                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">WORKSHOP END DATE & TIME</label>
                                <div class="col-sm-5">
                                   <input type="text" name="end_datetime"   value="<?php echo $workshop->enddatetime; ?>" class="form-control" id="end_datetime" placeholder="YYYY-MM-DD HH:MM"> 
                                    <i id="setup_end_icon" style="position: absolute;right: 19px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i>
                                    
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">WORKSHOP LOCATION</label>
                                <div class="col-sm-5">
                                    <input type="text" name="location"  value="<?php echo $workshop->location; ?>" class="form-control" id="location" placeholder="ENTER LOCATION">
                                </div>
                            </div>
                            
                            
                            
                               <div class="form-group row">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">CHAT GROUP</label>
                                <div class="col-sm-5">
                                
                                <select id="chat_group" class="form-control"name="chat_group" >
                                <option value="">SELECT CHAT GROUP</option>
                                
                                <?php foreach($chat_groups as $group){ ?>
                               
                                <option <?php if($workshop->chat_group==$group['group_chat_name']){echo 'selected';} ?> value="<?php echo $group['group_chat_name']; ?>"><?php echo $group['group_chat_name']; ?></option>
                                
                               <?php  }  ?>
                                
                                </select>
                                
                                
                                
                                </div>
                            </div>
                            
                            
                            
                             <div class="form-group row poject_editor">
                                <label for="colFormLabelLg" class="col-sm-4 col-form-label">WORKSHOP INSTRUCTIONS</label>
                                <div class="col-sm-5">
								
								<textarea rows="4" cols="50" maxlength="500" id="instructions" class="project_description" name="instructions" placeholder="ENTER INSTRUCTIONS"><?php if($workshop->instructions){ echo $workshop->instructions; }?></textarea>
							
							<script>

                                
CKEDITOR.replace( 'instructions', {
	toolbar: [

		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]
});
								</script>
                                     
                                    <!--<textarea name="instructions" row="4"  class="form-control" id="instructions" placeholder="ENTER INSTRUCTIONS" ><?php echo $workshop->instructions; ?></textarea> -->
                                </div>
                            </div>

                       
                    </div>  
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content add-zone-1">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                     <!--            <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li>  -->
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                
                            </ul>
                            <div class="table_info floor-step">
							
                                 <div class="current-status">
                                <p class="zonee" style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span>
								
								<?php if($action=="EDIT"){ ?>
									<span style="color:black; font-size: 14px !important;" >
								     <?php echo $workshop->workshop_name;  ?></span>
								<?php }else{ ?>
									<span style="color:black; font-size: 14px !important;" >
								    WORKSHOPS (<?php echo $action; ?>) </span>
								<?php } ?>
								
								
								
								</p>
                                 </div>
								 <div class="display-step-status">
								 <h5>STEP 1 OF 3</h5>
								 
								 <?php if($action=='ADD'){ ?>
									 
									<p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
								<?php  }else{ ?>
									 
								<p>EDIT THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
									 
								 <?php } ?>
								 
                       
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
                               <a class="action-btn" id="btn5allworkshop333" >Back</a>
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

 </form>
    </div>

</div>


<script>

    $(document).ready(function () {
  
       $("body").on('click','#btn5allworkshop333',function(){
       $.fancybox.getInstance('close');
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>workshop/showall",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
            
        });  
    
    
    

 
var startDateTextBox = $('#start_datetime');
var endDateTextBox = $('#end_datetime');


startDateTextBox.datetimepicker({
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (endDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		endDateTextBox.datetimepicker('setDate', testStartDate);
		}
		else {
			//endDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
	}
});
endDateTextBox.datetimepicker({ 
        changeYear: true,
        changeMonth: true,
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
	onClose: function(dateText, inst) {
		if (startDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
		//	if (testStartDate > testEndDate)
		//		startDateTextBox.datetimepicker('setDate', testEndDate);
		}
		else {
			//startDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		//startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});



          

 
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
             location.reload();

        });
        
     $.validator.setDefaults({
	    submitHandler: function() {             
            var form = $("#addWorkshop");
            var url = form.attr('action');
            let workshop_name = $("#workshop_name").val();
            let start_datetime = $("#start_datetime").val();
            let end_datetime = $("#end_datetime").val();
            let chat_group = $("#chat_group").val();
            let location = $("#location").val();
            let instructions = CKEDITOR.instances.instructions.getData();
            let group_id = '<?php echo $group_id; ?>';
            let project_id = '<?php echo $project_select; ?>';
            $.ajax({
             type: "POST",
             url: url,
             data:   {chat_group:chat_group,project_id: project_id,workshop_name: workshop_name,start_datetime:start_datetime,end_datetime:end_datetime,location:location,instructions:instructions,group_id:group_id}, 
                success: function (data)
                {
                    
                    let action = '<?php echo $action;  ?>';
                    $.fancybox.getInstance('close');
                    let url = '<?php echo base_url(); ?>workshop/addNewSuccess/'+parseInt(data)+'/'+action;
                 
                    if (parseInt(data) >= 1) {
                    
                    
                    
 
        console.log(data);
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>workshop/guestList/'+parseInt(data),
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&workshopid=<?php if(isset($workshop->id)){ echo $workshop->id; }else{ echo "0"; }?>&workshop='+data+'&action='+action, type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
                    


                    } else {

                    
                        
                        alert("Something went wrong");
                    }
                }
            });
                   
		}
	});
        
        
        $("#addWorkshop").validate({
			rules: {
				workshop_name: "required",
				start_datetime: "required",
                               end_datetime:"required",
                               location:"required",
                               instructions:"required",
                               chat_group:"required"
                               
			},
                        errorPlacement: function(){
                               return false;
                         }
//			messages: {
//				project_name: "ENSURE THAT A PROJECT IS SELECTED.",
//				floor_plan: "ENSURE THAT A FLOOR PLAN IS FILLED IN.",
//                                zone_type: "ENSURE THAT A FLOOR PLAN IS FILLED IN.",
//                                description:"ENSURE THAT ZONE NAME / ZONE DESCRIPTION IS FILLED IN."
//			}
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
	.ui-datepicker-current{
		display:none;
	}
</style>

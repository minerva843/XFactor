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


<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/datetimepickerJquery/css/jquery.datetimepicker.min.css">
 <link href="https://xdsoft.net/components/com_jquery_plugins/style/style.css" />		
 <link href="https://xdsoft.net/scripts/pp/prism.css" />
 <link href="https://xdsoft.net/scripts/calendar-popup/build/calendar.css" />
 
 -->

 

 
<div class="main-section floor_steps" id="add-floor">  
    <div class="container">
 <form method="POST" action="<?=base_url();?>project/add/<?php if(!empty($data1)){ echo $data1->id; }?>" class="register-form_1" id="register-form2" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUESTS (EDIT)</h2>
                    
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
					<h3> GUEST PERSONAL INFO</h3>  
					</div>
					</div>	
                   
				   <div class="zone-info floor-planadd add-project-step2">				
                            												<input type="hidden" id="myid" value="117">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GUEST TYPE</label>
							<div class="col-sm-5">
								ORGANISER								
							</div>	
						</div>
							
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">SALUTATION & GENDER</label>
							<div class="col-sm-5">
							<div class="row">
							<div class="col-sm-6">
								 <select name="salutation" id="salutation">
                                        <option>CURRENT VALUE</option>
                                        <option value="MR">MR</option>
                                        <option value="MS">MS</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>

							</div>

                                       <div class="col-sm-6">
								MALE / FEMALE / COMPANY

							</div>
							
							
						</div>
						</div>
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME</label>
							<div class="col-sm-5">
								<select name="project_audience_type" id="project_audience_type" class="project_audience_type">
									<option value="">ENTER FIRST NAME</option>
									
									<option value="CORPORATE">CORPORATE</option>
									<option value="CONSUMER">CONSUMER</option>
									<option value="COMMUNITY">COMMUNITY</option>																		
								</select>

							</div>	
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME</label>
							<div class="col-sm-5">
								<input type="text" name="" placeholder="ENTER LAST NAME" id="">
							</div>	
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PREFERRED NAME TO DISPLAY </label>
							<div class="col-sm-5">
								<input type="text" name="" placeholder="ETNER PREFERED NAME TO DISPLAY" id="">
							<span class="register-hint">THIS IS THE NAME THAT OTHERS GUESTS WILL SEE. THIS IS ALSO THE NAME TO BE PRINTED</span>
							</div>	
						</div>
						
					
						
						   
						<div class="form-group row add-guest">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">DISPLAY PHOTO</label>
							<div class="col-sm-7 col-xl-5 project-visual">
								
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">select a PROJECT HEADER VISUAL</div> 
									<input type="file" name="project_header_visual" id="file" onchange="ValidateSingleInput(this);" class="file">
									  <div class="file-select-button" id="fileName">BROWSE</div>
								  </div>
								</div> 
								<p class="file-extan">FILE FORMAT TO BE IN JPEG / PNG. EACH FILE NOT EXCEEDING 5 MB.</p>
							</div>  
						</div>
						
						<div class="form-group row add-proj_02">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">QUICK INTRO</label>
							<div class="col-sm-5 project-visual quick_intro_guest">
							
							
							<textarea rows="3" cols="50" maxlength="500" id="instructions" class="project_description" name="instructions" placeholder="CURRENT VALUE IS DISPLAYED"><?php if($workshop->instructions){ echo $workshop->instructions; }?></textarea>
							
							<script>

                                CKEDITOR.replace('instructions');

								</script>
								  
								<!--<textarea rows="3" cols="50" value="" maxlength="150" id="project_description" class="project_description" name="project_description" placeholder="CURRENT VALUE IS DISPLAYED"></textarea> --> 
								 
							</div>
						</div>
                    </div>
                      
                </div>          
      

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				              <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								<li class=""><a data-toggle="tab" href="#menu1">ASSIGN GUESTS</a></li>
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> : GUESTS (ADD)
                                </div>
								<div class="display-step-status">
								<h5>STEP 1 OF 4</h5>
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
								<a href="#" class="action-btn backbtn" name="back" id="btn5">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  

 </form>
    </div>

</div>



 
  <script>
$(document).ready(function(){

var startDateTextBox = $('#setup_start_date_time');
var endDateTextBox = $('#setup_end_date_time');

startDateTextBox.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
        minDate: 0,
	onClose: function(dateText, inst) {
		if (endDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				endDateTextBox.datetimepicker('setDate', testStartDate);
		}
		else {
			endDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
	}
});
endDateTextBox.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (startDateTextBox.val() != '') {
			var testStartDate = startDateTextBox.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				startDateTextBox.datetimepicker('setDate', testEndDate);
		}
		else {
			startDateTextBox.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});



var event_start_date_time = $('#event_start_date_time');
var event_end_date_time = $('#event_end_date_time');

event_start_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (event_end_date_time.val() != '') {
			var testStartDate = event_start_date_time.datetimepicker('getDate');
			var testEndDate = event_end_date_time.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				event_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
			event_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		event_end_date_time.datetimepicker('option', 'minDate', event_start_date_time.datetimepicker('getDate') );
	}
});
event_end_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (event_start_date_time.val() != '') {
			var testStartDate = event_start_date_time.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				event_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
			event_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		event_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});








var strike_start_date_time = $('#strike_start_date_time');
var strike_end_date_time = $('#strike_end_date_time');

strike_start_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (strike_end_date_time.val() != '') {
			var testStartDate = strike_start_date_time.datetimepicker('getDate');
			var testEndDate = strike_end_date_time.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				strike_end_date_time.datetimepicker('setDate', testStartDate);
		}
		else {
			strike_end_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		strike_end_date_time.datetimepicker('option', 'minDate', strike_start_date_time.datetimepicker('getDate') );
	}
});
strike_end_date_time.datetimepicker({ 
        controlType: 'select',
	oneLine: true,
        dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm',
        showTimezone:false ,
         minDate: 0,
	onClose: function(dateText, inst) {
		if (strike_start_date_time.val() != '') {
			var testStartDate = strike_start_date_time.datetimepicker('getDate');
			var testEndDate = endDateTextBox.datetimepicker('getDate');
			if (testStartDate > testEndDate)
				strike_start_date_time.datetimepicker('setDate', testEndDate);
		}
		else {
			strike_start_date_time.val(dateText);
		}
                $('.ui-datepicker').css("display","none");
	},
	onSelect: function (selectedDateTime){
		strike_start_date_time.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
	}
});



 

 

$('#project_type').on('change', function() {
  var val=$(this).val();
  if(val=='SHOP REG REQUIRED' || val=='SHOP NO REG REQUIRED' || val=='VENUE REG REQUIRED' || val=='VENUE NO REG REQUIRED' || val=='PROPERTY REG REQUIRED' || val=='PROPERTY NO REG REQUIRED' || val=='VIRTUAL SHOP REG REQUIRED' || val=='VIRTUAL SHOP NO REG REQUIRED' || val==''){
	$('.pro_type').show();
	
  }else{
	  $('.pro_type').hide();
  }
  
});

});
</script>

<script>


$(document).ready(function(){
			
				
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/index',
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
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});


 $.validator.setDefaults({
	    submitHandler: function(){
		
	var group=$('#group').val();
	var project_name=$('#project_name').val();
	var project_type=$('#project_type').val();
	var venue_name=$('#venue_name').val();
	var venue_address=$('#venue_address').val();
	var country=$('#country').val();
	var venue_postal_code=$('#venue_postal_code').val();
	var setup_start_date_time=$('#setup_start_date_time').val();
	var setup_end_date_time=$('#setup_end_date_time').val();
	var event_start_date_time=$('#event_start_date_time').val();
	var event_end_date_time=$('#event_end_date_time').val();
	var strike_start_date_time=$('#strike_start_date_time').val();
	var strike_end_date_time=$('#strike_end_date_time').val();

 var formdata = new FormData();
var url="<?php echo base_url();?>project/add/<?php if(!empty($data1)){ echo $data1->id; }?>"; 
 formdata.append('group', group);
 formdata.append('project_name', project_name);
 formdata.append('project_type', project_type);
 formdata.append('venue_name', venue_name);
 formdata.append('venue_address', venue_address);
 formdata.append('country', country);
 formdata.append('venue_postal_code', venue_postal_code);
 formdata.append('setup_start_date_time', setup_start_date_time);
 formdata.append('setup_end_date_time', setup_end_date_time);
 formdata.append('event_start_date_time', event_start_date_time);
 formdata.append('event_end_date_time', event_end_date_time);
 formdata.append('strike_start_date_time', strike_start_date_time);
 formdata.append('strike_end_date_time', strike_end_date_time);

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
			$.fancybox.getInstance('close');
                    
			if (data) {
                            
                           $.fancybox.open({
                            src: '<?php echo base_url();?>project/addstep2project/'+data ,
                            type: 'ajax',
                            ajax: { 
                             settings: { data : 'ABC', type : 'POST' }
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
                             
			}
		}
	});

        
		}
	});

 
	$("#register-form2").validate({
		rules: {
							
			group: "required",
			project_name:"required",
			project_type:"required",
			venue_name:"required",
			venue_address:"required",
			country:"required",
			venue_postal_code:{
			required:true,
			digits:true,
		},
                        setup_start_date_time:"required",
                        setup_end_date_time:"required",
			event_start_date_time:"required",
                        event_end_date_time:"required",
			strike_start_date_time:"required",
                        strike_end_date_time:"required",

		},
		errorPlacement: function(){
                               return false;
                         } 
		// messages: {
			
			// group: "ENSURE THAT A GROUP IS SELECTED.",
			// project_name: "ENSURE THAT PROJECT NAME IS FILLED IN.",
			// project_type: "ENSURE THAT A PROJECT TYPE IS SELECTED.",
			// venue_name: "ENSURE THAT VENUE IS FILLED IN.",
			// venue_address: "ENSURE THAT VENUE ADDRESS IS FILLED IN.",
			// country: "ENSURE THAT A COUNTRY IS SELECTED.",
			// venue_postal_code: "ENSURE THAT VENUE POSTAL CODE IS FILLED IN.",
			// setup_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// setup_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// event_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// event_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// strike_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// strike_end_date_time:"ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN" 
		// }
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

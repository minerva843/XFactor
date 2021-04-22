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
.floor-planadd textarea {
    width: 100%;
    background: transparent;
    border: 1px solid #afabab;
    min-height: 130px;
    width: 380px;
    overflow-y: scroll;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
}
.program-upload p.file-extan {
    font-size: 11px;
    color: #000;
}
.floor-planadd .star-program input.smalimput {
    width: 9%;
    margin-left: 15px;
    padding: 5px;
}
</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
 <form method="POST" action="<?=base_url();?>program/assignProgramstep2" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (ASSIGN PROGRAM) <span class="sucess">SUCCESSFUL </span></h2>
                </div> 

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form program-tabs">

            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					 
					</div>
					</div>	
                    <div class="zone-info floor-planadd">
                      
						<p>THERE WILL BE NO INFO ON THE FLOOR PLAN WHEN USER CLICKS ON THE PROGRAM.</p>
						
						
                    </div>  
                      
                </div>


                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
				                <li><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								 <li class="active"><a data-toggle="tab" href="">ASSIGN PROGRAM</a></li>
				               <!--  <li><a data-toggle="tab" href="#menu2">ASSIGN PROGRAM</a></li> -->
				                
                            </ul>
                            <div class="table_info floor-step">
                               
								<p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> 
                                <?=$data1->program_title;?>
								
                                 
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
                            </div>
                            <div class="form-submit"> 
								<a class="action-btn" id="btn5" >Back</a>
								<a class="action-btn" id="" >DONE</a>
								<!--input type="submit" value="DONE" class="action-btn FloorSubmit" name="submit"-->
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
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});

$.validator.setDefaults({
	    submitHandler: function(){
		

	var floor=$('#floor').val();
	var program=$('#program').val();
var formdata = new FormData();

var url="<?php echo base_url();?>program/assignProgramstep2"; 

 formdata.append('floor', floor);
 formdata.append('program', program);
 
 
//console.log(formdata);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		success: function(data)
		{ 
			var data=$.trim(data);
			$.fancybox.getInstance('close');
                    
			if (data) {
				$.fancybox.open({
					src: '<?php echo base_url();?>program/assignProgramstep3/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						}
					} 
				}); 

			}
		}
	});
		}
		
});

	$("#register-form").validate({
		rules: {
							
			floor: "required",
			program: "required"
		}, 
		errorPlacement: function(){
                               return false;
                         }
		// messages: {
			// program_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// program_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// program_presenter: "ENSURE THAT A PROGRAM PRESENTER IS SELECTED.",
			// program_title: "ENSURE THAT PROGRAM TITLE IS FILLED IN.",
			// program_details:"ENSURE THAT POST DETAILS IS FILLED IN.",
			// files:"ENSURE THAT AT LEAST AN IMAGE FILE IS SELECTED."
			
		// }
	});
});
</script>


<script>
 $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/index',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
            
        });
$('#files').bind('change', function () {
  var filename = $("#files").val();
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

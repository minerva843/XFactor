<?php 
$floor_plan_drop_point=explode(',',$floor->floor_plan_drop_point);
?>

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
.rect1 {
	<?php if(!empty($floor->floor_plan_drop_point)){?>
	height: <?php echo $floor_plan_drop_point[1].'px';?>!important;
	width : <?php echo $floor_plan_drop_point[0].'px';?>!important;
	<?php }?>
	
	bottom: 0px;
	left: 1px;
	}

.table {
    border: green;
    height: 450px;
    max-width: 100%;
}
</style>
<div class="main-section" id="add-floor"> 
    <div class="container" style="padding-left: 0px;">
 <form method="POST" action="<?=base_url();?>program/assignProgramstep2" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (ASSIGN PROGRAM) </h2>
					<p>THIS PROGRAM HAS BEEN ASSIGNED.</p>
                </div> 

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form program-tabs assign-program-pg">

            <div class="row">
				   <div class="col-md-9"id="printJS-form">  <?php // print_r($zone); ?>
				   <div class="">
					<div class="select-box text-center">
					<p>THIS IS WHAT YOUR GUEST WILL SEE WHEN THEY CLICK ON THE PROGRAM.</p>
					</div>
					</div>
						
                    <div class="zone-info floor-planadd">
                           
						
						<?php 
						$data=json_decode($data1->program_position);
						?>
						<div class="demo1">
 	<!--div id="draggable1" style="background: red; color: red;border-radius: 50%;cursor: pointer;top: <?=$data->top;?>px;position: absolute;left: <?=$data->left;?>px;" class="ui-widget-content" ></div-->
	
	<div id="draggable1" style="border-radius: 50%;cursor: pointer;top: <?=$data->top;?>px;left: <?=$data->left;?>px;position: absolute;display:none" class="draggable ui-widget-content;" >1</div>
<div class="container" id="container-4" >
 

	
	<img id="demo-4" class="blah1 rect1" src="<?php echo base_url().'assets/floor_plan/'.$floor->file_name . $floor->file_type;?>" alt="your image">
</div>


 
 

</div>
                    </div>  
                      
                </div>


                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
				                <li><a data-toggle="tab" href="#menu1" id="AddProgram">MAIN MENU</a></li>
								 <li ><a data-toggle="tab" href="" class="allassignments">ALL ASSIGNMENTS</a></li>
				               <li class="active"><a data-toggle="tab" href="#menu2">ASSIGN PROGRAM</a></li>
				                
                            </ul>
                            <div class="table_info floor-step">
                               
								<p><span class="current-bold">CURRENTLY SELECTED :</span><p> 
                                <?=$data1->program_title;?>
								
                                 
                       
                                <div class="tab-content">
                                </div>
                            </div>
                            <div class="form-submit"> 
								<a class="action-btn" id="btn5" >PRINT</a>
								<a class="action-btn Next" id="btn555" >NEXT</a>
								<!--input type="submit" value="DONE" class="action-btn FloorSubmit" name="submit"-->
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

$("body").on('click','.allassignments',function(){
          
           $.fancybox.getInstance('close');
            
			$.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/allassignments",
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
$(document).ready(function(){
	
	$("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.getInstance('close');
           $.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/assignProgram",
			ajax: { 
			   settings: { data : 'project=<?=$data1->project_id;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});

// $.validator.setDefaults({
	    // submitHandler: function(){
		
	// var floor=$('#floor').val();
	// var program=$('#program').val();
// var formdata = new FormData();

// var url="<?php echo base_url();?>program/assignProgramstep2"; 

 // formdata.append('floor', floor);
 // formdata.append('program', program);

// $.ajax({  
		// type: "POST",
		// url: url, 
		// data: formdata,
		// success: function(data)
		// { 
			// var data=$.trim(data);
			// $.fancybox.getInstance('close');
                    
			// if (data) {
				// $.fancybox.open({
					// src: '<?php echo base_url();?>program/assignProgramstep3/'+data,
					// type: 'ajax',    
					// opts: {
						// afterShow: function (instance, current) {
							// console.info('done!');
						// }
					// } 
				// }); 

			// }
		// }
	// });
		// }
		
// });

	// $("#register-form").validate({
		// rules: {
							
			// floor: "required",
			// program: "required"
		// }, 
		// errorPlacement: function(){
                               // return false;
                         // }
	// });
});
</script>


<script>
 $("body").on('click','#btn555',function(){
          var id='<?=$data1->id;?>';
           $.fancybox.getInstance('close');
           $.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/assignProgramSuccess/"+id,
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
		
		$("body").on('click','.btnback',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/assignProgram',
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

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
.container{
	margin-bottom: 0px;
	height: auto; 
	position: relative;
}
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="main-section" id="add-floor"> 
    <div class="container" style="padding-left: 0px;">
 <form method="POST" action="<?=base_url();?>program/assignProgramstep1" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (ASSIGN PROGRAM)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form program-tabs assign-program-pg">
 
            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				      <div class="">
					<div class="select-box text-center">
					 <p >SIMPLY MOVE THE GREEN DOT TO INTENDED POINT ON THE FLOOR PLAN. THIS IS WHERE THE CALL OUT BUBBLE WILL APPEAR.</p>
					</div>
					</div>
						
                    <div class="zone-info floor-planadd">
					 
					<div class="demo1">
                      <div id="draggable1" style="border-radius: 50%;cursor: pointer;top: 345px;left: 640px;position: absolute;display:none" class="draggable ui-widget-content;" >1</div>

	<img id="demo-4" class="blah1 rect1" src="" alt="your image" style="display:none;">


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
                
								<p><span class="current-bold">CURRENTLY SELECTED:</span> ASSIGN PROGRAM</p>
								<br>
                                <div class="form-group">
								<label>PROGRAM</label>
								<select class="form-control" name="program" id="program">
									<option value="">SELECT A PROGRAM</option>
									<?php foreach($programs as $program){?>
									<option value="<?=$program['id']?>"><?=$program['program_title']?></option>
									<?php }?>
								</select>
								
								</div>
								
								<div class="form-group">
								<label>FLOOR PLAN</label>
								<select name="floor" id="floor" class="">
									<option value="">SELECT A FLOOR PLAN</option>
									<?php foreach($floorplans as $floor){?>
									<option value="<?=$floor['id']?>"><?=$floor['floor_plan_name']?></option>
									<?php }?>							
								</select>
								
								</div>
								<input type="hidden"  id="iconval">
                                <div class="tab-content">
                                </div>
                            </div> 
                            <div class="form-submit"> 
								<a class="action-btn btnback" id="btn5" >Back</a>
								
								<a class="action-btn" id="btn5" >NO ASSIGNMENT</a>
								<input type="submit" value="ASSIGN PROGRAM" class="action-btn" name="submit">
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
	
	$('#floor').change(function(){ 
		var floorId=$(this).val();
		if(floorId ==''){
			$('#demo-4').hide();
			$('#draggable1').hide();
		}
		var url='<?php echo base_url();?>program/assignProgramGetImg';
		$.ajax({  
			type: "POST",
			url: url, 
			data: {floorId:floorId},
			success: function(data)
			{
				var data=JSON.parse(data);
				$('#demo-4').show();
				$('#draggable1').show();
				//var data=$.trim(data);  
				$(".assign-program-pg #demo-4").removeAttr("style");
				
				$('#demo-4').attr("src",data.img).height(data.height).width(data.width);
			}
		});
	})
	

	$("body").on('click','#AddProgram',function(){
          
           $.fancybox.getInstance('close');
            
			$.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/addprogram",
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

});

$( ".draggable" ).draggable({
  stop: function( event, ui ) {
	  //console.log(JSON.stringify($(this).position())); 
	  var iconposition=JSON.stringify($(this).position()); 
	  $('#iconval').val(iconposition);
  }
});


function GetselectedProgram() {
			var floor=$('#floor').val();
			var program=$('#program').val();
			if(floor=='' || program==''){
				
			$('#demo-4').hide();
			$('#draggable1').hide();
		
			}else{
				$.ajax({
					url: '<?= base_url(); ?>program/GetselectedProgram',
					type: "POST",
					data: {floor:floor,program:program},
					success: function(response) {
						var response=JSON.parse(response);
						if(response==''){
							$('#draggable1').hide();
						}else{
						$('#draggable1').show();
						//$('#draggable1').css({"top": "'"+response.top+"px!important'", "left": "'"+response.left+"px!important'"});
						$("#draggable1").css("top", response.top);
						$("#draggable1").css("left", response.left);
						}
						//console.log('refresh result',response);
						
						//$(".all-online").html(response); 
					}
				});
			}
		}
setInterval(GetselectedProgram,1000);
GetselectedProgram();
$.validator.setDefaults({
	    submitHandler: function(){
		
	var iconval=$('#iconval').val();
	var floor=$('#floor').val();
	var program=$('#program').val();
	
var formdata = {floor:floor,program:program,iconval:iconval};

var url="<?php echo base_url();?>program/assignProgramstep1";

 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		success: function(data)
		{ 
			// var data=$.trim(data);
			// var value=parseInt(data);
			// $('.assignvalue').val(value);
			// if(parseInt(data)){
				// alert('ASSIGN PROGRAM SUCCESSFUL')
			// }else{
				// alert('SOMTHING WENT WRONG.!')
			// }
			
			var data=$.trim(data);
			$.fancybox.getInstance('close');
                    
			if (data) {
				
				//$.fancybox.getInstance('close');
            
			$.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/assignProgramstep2/"+data,
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
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

	$("#register-form").validate({
		rules: {
							
			floor: "required",
			program: "required"
		}, 
		errorPlacement: function(){
                               return false;
                         }
		
	});
});
</script>


<script>
 $("body").on('click','.btnback',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/index",
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
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

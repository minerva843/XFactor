<?php 
$floor_plan_drop_point=explode(',',$data1->floor_plan_drop_point);
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
	<?php if(!empty($data1->floor_plan_drop_point)){?>
	height: <?php echo $floor_plan_drop_point[1].'px';?>!important;
	width : <?php echo $floor_plan_drop_point[0].'px';?>!important;
	<?php }?>
	
	bottom: 0px;
	left: 1px;
	}
.container{
	margin-bottom: 0px;
	height: auto; 
	max-width: 800px;
	position: relative;
	padding-left:0px;
	padding-right:0px;
}
.table {
    border: green;
    height: 450px;
    max-width: 100%;
}

</style>
<div class="main-section viewall-assignment" id="add-floor"> 
    <div class="container">
 <form method="POST" action="<?=base_url();?>program/assignProgramstep2" class="register-form_1" id="register-form" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (VIEW FLOORPLAN)</h2>
					
                </div> 

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	    

        <div class="middle-body register-form program-tabs">

            <div class="row">
				   <div class="col-md-12"id="printJS-form">  <?php // print_r($zone); ?>
				  
				
                    <div class="zone-info floor-planadd">
                      
						
						<?php 
						$data=json_decode($data1->program_position);
						?>
						<div class="demo1">
						<?php if(!empty($data1->file_name)){ ?>
 	<div id="draggable1" style="background: red; color: red; border-radius: 50%; z-index: 11; width: 22px; height: 22px;  cursor: pointer;top: <?=$data->top;?>px; position: absolute;
left: <?=$data->left;?>px;" class="ui-widget-content"></div>
<div class="container view_flor_plan" id="container-4" >
 
	<img id="demo-4" class="blah1 rect1" src="<?php echo base_url().'assets/floor_plan/'.$data1->file_name . $data1->file_type;?>" alt="your image"> 
</div>     
						<?php }else{ 
						echo '<p class="program-43444">THERE IS CURRENTLY NO FLOOR PLAN ASSIGNED TO THIS ENTRY</p>';
						}?>

 
 

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
	
	$("body").on('click','#close-btn',function(){
           
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
			   settings: { data : 'project=<?=$data1->project_id;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
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

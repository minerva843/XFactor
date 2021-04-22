

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
<?php $rand=rand(1000,99999);?>
<div class="main-section viewall-assignment" id="add-floor"> 
    <div class="container">
 
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>VIEW IMAGE AFTER VIDEO</h2>
					
                </div> 

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn-icon" name="submit" id="close-btn-icon<?=$rand;?>"></div>
                </div>
            </div>   
        </div>	    

        <div class="middle-body register-form program-tabs">

            <div class="row">
				   <div class="col-md-12"id="printJS-form">  <?php // print_r($zone); ?>
				  
				
                    <div class="leftbox-top-grid assignpost-info-icon">
   
					<div class="row">
  
				 <div class="col-md-6"> 
				 <div class="row">
                  <div class="col-md-4"> 
					 
					</div>
					</div>   
				 
                                    
                                            
</div>
    					</div>


		
<div class="image-container">    
<div class="icon_top_titel">
<!--p><span>Tip </span>to add orr edit info icon position, click any info icon that appears on the image, dag info icon to intended position.</p -->
</div>
<div id="snaptarget" class="bg-ion-info"  style="background-repeat: no-repeat;background-image:url('<?php echo base_url() ?>temp/<?php echo $imagedata[0]->file_name; ?>')" >
<div id="containment-wrapper">
    
    
    <?php foreach ($icons as $icon){ ?>
    <?php $pixels =  json_decode($icon['drag_position'],TRUE);
	$top=preg_split('/(?<=[0-9])(?=[a-z]+)/i',$pixels['top']);
	$topres=$top[0]+20;
	$top=$topres.'px'; 
	
	$left=preg_split('/(?<=[0-9])(?=[a-z]+)/i',$pixels['left']);
	$leftres=$left[0]+11;
	$left=$leftres.'px';
	?>
     
      <div id="draggable<?php echo $icon['info_icon_number']; ?>" data-boxid="<?php echo $icon['id']; ?>" style="background: green; color: white;border-radius: 50%;right: auto;bottom: auto;position:absolute;top:<?php echo $top;?>;left:<?php echo $left;?>;" class="draggable ui-widget-content " ><?php echo $icon['info_icon_number']; ?></div>
  
    <?php }  ?>
    
 
  </div> 
     </div>
                        <!-- <img src="../assets/images/user-home1.png" alt="">    -->
					  
					   
                    </div>
			   
			   </div> 
                      
                </div>


               



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 
    </div>

</div>


<script>


$(document).ready(function(){
	// $('body').on('click', '.close-btn', function () {
            // $.fancybox.close();
              // location.reload();

        // });
	
	$("body").on('click','#close-btn-icon<?=$rand;?>',function(){
            $.fancybox.close();
           //$.fancybox.getInstance('close');
           // $.fancybox.open({ 
			// maxWidth  : 800,
			// fitToView : true,
			// width     : '100%',
			// height    : 'auto',
			// autoSize  : true,
			// type        : "ajax",
			// src         : "<?php echo base_url(); ?>icon/allAssignments",
			// ajax: { 
			   // settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
			// },
			// touch: false,
					// clickSlide: false,
			// clickOutside: false
			
		// });
            
        });

});
</script>

    <style>
      .draggable {
      width: 23px;
      height: 23px;
      float: left;
      margin: 0 10px 10px 0;
  }
  #draggable, #draggable2 {
      margin-bottom:20px;
  }
  #draggable {
      cursor: n-resize;
  }    
  #draggable3 {
      cursor: move;
  }
  #containment-wrapper { 
      height:690px;
    
  }
  
   .master-floor-left .table-content li a {
    width: 100%;
    font-size: 10px;
}    
  
  
  .hide{
      display: none;
  }
  .table td, .table th {
    padding: .55rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.anchor_add{
    color: black;
    border-radius: 1px;
    text-decoration: inherit;
    font-weight: 900;
}
 .configpage a.add {
    font-weight: 600;
    text-decoration: underline;
    color: #000;
}

.fancybox-close-small{
    display:none;
}




</style>



<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>

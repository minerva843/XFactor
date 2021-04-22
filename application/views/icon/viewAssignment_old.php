<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"-->
	
	
	
	<div class="main-section view-assignment-view viewall-assignment"> 
        <div class="container">
		    
	   <div class="top-header">
	   <div class="row">
	   <div class="col-md-9">
	   <h2>INFO ICON (ASSIGN POSITION)</h2>
	   
	   </div>
	     
	   <div class="col-md-3">
	    <div class="top-close"><!--input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"--><a href="#" class="close-btn" id="close-btn">CLOSE</a></div>
	   </div>
	   </div>        
		</div>	   
	
		<div class="middle-body register-form info_icon_assign">
		<div class="row">
        <div class="col-md-12">   	

<div class="leftbox-top-grid assignpost-info-icon">
   
					<div class="row">
  
				 <div class="col-md-6"> 
				 <div class="row">
                  <div class="col-md-4"> 
					 
					</div>
					</div>   
				 <div class="col-md-6"> 
				 
<div class="selecteduser">
<div class="bottom-button-section">   
 <div class="select-zone-name">   
  
   </div>
     
</div> </div> 
</div>
                                    
                                            
</div>
    					</div>


		
<div class="image-container">
<div class="icon_top_titel">
<p><span>Tip </span>to add orr edit info icon position, click any info icon that appears on the image, dag info icon to intended position.</p>
</div>
<div id="snaptarget" class="bg-ion-info"  style="background-repeat: no-repeat;background-image:url('<?php echo base_url() ?>temp/<?php echo $imagedata[0]->file_name; ?>')" >
<div id="containment-wrapper">
    
    
    <?php foreach ($icons as $icon){ ?>
    <?php $pixels =  json_decode($icon['drag_position'],TRUE); ?>
    
      <div id="draggable<?php echo $icon['info_icon_number']; ?>" data-boxid="<?php echo $icon['id']; ?>" style="background: green; color: white;border-radius: 50%;right: auto;bottom: auto;position:relative;top:<?php echo $pixels['top'];?>;left:<?php echo $pixels['left'];?>;" class="draggable ui-widget-content " ><?php echo $icon['info_icon_number']; ?></div>
  
    <?php }  ?>
    
 
  </div> 
     </div>
                        <!-- <img src="../assets/images/user-home1.png" alt="">    -->
					  
					   
                    </div>
			   
			   </div>
			        


<div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>   


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
			src         : "<?php echo base_url(); ?>icon/allAssignments",
			ajax: { 
			   settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
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

<script>
    

    
 </script>

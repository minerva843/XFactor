<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	
	
	<div class="main-section"> 
        <div class="container" style="padding-left:0px;"> 
		    
	   <div class="top-header">
	   <div class="row">
	   <div class="col-md-9"> 
	   <h2>INFO ICON (ASSIGN POST)</h2>
	   
	   </div>
	     
	   <div class="col-md-3">
	    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
	   </div>
	   </div>   
		</div>	   
				 
		<div class="middle-body register-form info_icon_assign">
		<div class="row">
        <div class="col-md-9">	

<div class="leftbox-top-grid assignpost-info-icon">
<form action="" method="POST" id="addZoneForm" novalidate="novalidate">    
					<div class="row">
  
				 <div class="col-md-6"> 
				 <div class="row">
                  <div class="col-md-4"> 
					<label for="colFormLabelSm" class="zone-type-label-1">SELECT A POST TITLE</label></div>
                    <div class="col-md-8">  <select id="post_data" name="post_assign">
					<option value="">SELECT A POST TITLE</option>
		<?php if(!empty($posts)){  
		
		foreach($posts as $post){ ?>
		
		<option value="<?php echo $post->id;  ?>"><?php echo $post->post_title; ?></option>
		
		<?php }   
		 
		
		
		  }  ?>
		</select>
					</div> 
					</div>
					</div>   
				 <div class="col-md-6"> 
				 
<div class="selecteduser">
<div class="bottom-button-section">   
 <div class="select-zone-name">   
  
   </div>
    <button id="button_updatemapping" type="button"  class="  btn-success">UPDATE</button>

</div> </div> 
</div>
                                    
                                            
</div>
</form>    					</div>
              

		
<div class="image-container info-img-full">     
<div class="icon_top_titel">
<!--p><b>Tip</b> to add or edit info icon position, click any info icon that appears on the image, drag info icon to intended position.</p-->
</div>
<!--div class="bg-ion-info"  style="background-repeat: no-repeat;background-image:url('<?php echo base_url() ?>temp/<?php echo $imagedata; ?>')" >
<div id="containment-wrapper">
          
    
    <?php foreach ($icons as $icon){ ?>
    <?php $pixels =  json_decode($icon['drag_position'],TRUE); ?>
    
      <div id="draggable<?php echo $icon['info_icon_number']; ?>" data-boxid="<?php echo $icon['id']; ?>" style="background: green; color: white;border-radius: 50%;right: auto;bottom: auto;position:relative;top:<?php echo $pixels['top'];?>;left:<?php echo $pixels['left'];?>;" class="draggable ui-widget-content " ><?php echo $icon['info_icon_number']; ?></div>
  
    <?php }  ?>
    
  
  </div> 
     </div-->
	 <div class="avtar-left to-start-select wrapper bg-ion-info " id="container">
<img id="demo-4" class="floorimg snaptarget33 icon-post-assin2" src="<?php echo base_url() ?>temp/<?php echo $imagedata; ?>" alt="your image"> 
							<div class="demo1" id="containment-wrapper">
 	 <?php foreach ($icons as $icon){ ?>
    <?php $pixels =  json_decode($icon['drag_position'],TRUE);
		
	?>
    
      <div id="draggable<?php echo $icon['info_icon_number']; ?>" style="background: green; color: white;border-radius: 50%;right: auto;bottom: auto;position:absolute;top:<?php echo $pixels['top'];?>;left:<?php echo $pixels['left'];?>;" class="draggable ui-widget-content " ><?php echo $icon['info_icon_number']; ?></div>
  
    <?php }  ?>

</div>
							
						</div>
                        <!-- <img src="../assets/images/user-home1.png" alt="">    -->
					  
					   
                    </div>
			   
			   </div>
			        
				<div class="col-md-3 right-text assign-icon master-floor-left info_icon_assignpost asignpost_2">
				<div class="tab right-tabs">
               
				<div class="table-content">	  
				<ul class="nav nav-tabs ">
				<!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
				<li class=""><a data-toggle="tab" id="maikmenulisticons2" href="#menu1">MAIN MENU</a></li>
				<li class=""><a data-toggle="tab" id="icon_all_assignmentstep2" href="#menu1">ALL ASSIGNMENTS</a></li>
				<li class="active"><a data-toggle="tab" href="#menu1">ASSIGN POST</a></li>
			
				
				</ul>
				<div class="table_info floor-step assign-top">
				<p style="color:#00b050!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span class="assignPostSpan" style="color: #000;"><?=$zone_name;?></span></p>
				<div class="icon-step">   
				<h5>STEP 2 OF 2</h5>
				</div>
				 
<!--                                
<p style="color:red !important;">ENSURE THAT A ZONE IS SELECTED. </p>
<p style="color:red !important;">TO START, SELECT A ZONE. </p>
<h6 class="sucess" style="color:#00b050;"><b>CURRENT INFO ICON POSITIONS </b></h6> -->
<div class="inner-nearme">
<div class="select-box">
<table class="table table-striped">
<thead>
<tr>
<th> Info icon name</th>
<th>POST TITLE</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
 
</tr>
</thead>
<tbody>
    
    <?php foreach($icons as $icon){
		$selectedPost=$this->db->get_where('xf_mst_content_post_mapping', array('info_icon' => $icon['id']))->row();
		if(!empty($selectedPost->post_id)){
			$Mypost=$selectedPost->post_name;
		}else{
			$Mypost='NO POST ASSIGN';
		}
		?>
    
      <tr id="icon_tr<?php echo $icon['id']; ?>" data-id="<?=$icon['id']?>" data-iconid="<?php echo $icon['id']; ?>" class="myclick_row assignpost343">  
      <td id="icon<?php echo $icon['id']; ?>" data-iconid="<?php echo $icon['id']; ?>" class="btn icon">INFO ICON <?php echo $icon['info_icon_number']; ?></td>
      <td><a href="#" class="edit postname<?php echo $icon['id']; ?> "><?=$Mypost;?></a></td>
      <td id="action<?php echo $icon['id']; ?>" class="action anchor_add chk2"> <a href="#" class="addpost">Assign</a></td>
		<td  class="chk2">
			<input type="checkbox" id="c_<?=$icon['id']?>" name="rigtcheck" class="rightcheck<?=$icon['id']?>" >
			<label style="display:none;" for="c_<?=$icon['id']?>" class="rightcheck rightcheck<?=$icon['id']?>"></label>
		</td>
       
      </tr>
    <?php }  ?>    
    
 

</tbody>
</table>
				
</div>

</div>
</div>
<div class="form-submit"> 
<button type="button" id="listoficons" class="save-btn right">done</button>
</div>

</div>



</div>
</div>
<input type="hidden" id="button_updatemapping_iconid">
<div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>   


</div>

    </div>
	
	

<script type="text/javascript">

//var sPositions2 = localStorage.positions2 ;
     //positions2 = JSON.parse(sPositions2);
     positions = JSON.parse("{}");
//$.each(positions2, function (id, pos) {
//    $("#" + id).css(pos)
//})


$(document).ready(function(){
 $("body").on("click",".myclick_row",function(){
	
	var currentid= $(this).attr('data-id');
	
	$('.rightcheck').hide();
	$('.rightcheck'+currentid).show();
	$('.rightcheck'+currentid).prop('checked', true);
})
  <?php 
  session_start();
  if($_SESSION['action']=='POST'){ ?>
   $("body").on('click','#icon_all_assignmentstep2,#maikmenulisticons2',function(){
	   $.ajax({
	   url:"<?=base_url();?>icon/updateassignIconPosition",
	   method:"POST", 
	   data:{zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
	  
		
	   } 
	  });
      $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>post/index',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });
   $("body").on("click","#listoficons",function(){
$.ajax({
	   url:"<?=base_url();?>icon/updateassignIconPosition",
	   method:"POST", 
	   data:{zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
	  
		
	   } 
	  });
 

$.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>post/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });


});
  <?php }else{?>
				 $("body").on('click','#icon_all_assignmentstep2,#maikmenulisticons2',function(){
					 $.ajax({
	   url:"<?=base_url();?>icon/updateassignIconPosition",
	   method:"POST", 
	   data:{zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
	  
		
	   } 
	  });
      $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/showallicon',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });
   $("body").on("click","#listoficons",function(){
	
	$.ajax({
	   url:"<?=base_url();?>icon/updateassignIconPosition",
	   method:"POST", 
	   data:{zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
		$.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>icon/showallicon",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
		
	   } 
	  });

		


});
  <?php }?>
          
  
      
  

$("body").on("click",".assignpost343",function(){
    

   let iconid = $(this).attr("data-iconid");
   // $('.addpost').find("input").remove();
   // $('.addpost').find("label").remove();
   
 
   // $(this).find('label').remove();
   // $(this).find('input').remove();  
   // $(this).append("<input type='checkbox' class='' checked /> <label></label>");
   $("#button_updatemapping_iconid").val(iconid);   
     
   
});




 



$("body").on("click","#button_updatemapping",function(){

let post_id = $("#post_data option:selected").val();
let post_text = $("#post_data option:selected").text();

let info_icon = $("#button_updatemapping_iconid").val();   


if(info_icon=='' || post_id==''){

//alert("Click on Add button on right side or select a post first");

}else{
	  $.ajax({
	   url:"<?=base_url();?>icon/updatePostMapping",
	   method:"POST", 
	   data:{post_id:post_id,post_text:post_text,info_icon,info_icon,zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
	  
		$('.postname'+info_icon).text(post_text);
	   } 
	  });


}

});




$("body").on("click",".removeicon",function(){
    
     let iconid = $(this).attr("data-iconid");
     //$("#draggable"+iconid).addClass("hide");
     //$("#action"+iconid+" a").text("ADD").addClass("addpost").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
     
     
     // alert(iconid); 
   
});

        $('body').on('click', '.close-btn', function () {
			$.ajax({
	   url:"<?=base_url();?>icon/updateassignIconPosition",
	   method:"POST", 
	   data:{zone_id:<?=$zone_id;?>,project:<?=$project_select;?>}, 
	   success:function(data)
	   {
	   
	  
		
	   } 
	  });
            $.fancybox.close();
              location.reload();

        });

});
 
    </script>
    
    <style>
      .draggable {
      
      float: left;
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
      width:1280px;   
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
 .configpage a.addpost {
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

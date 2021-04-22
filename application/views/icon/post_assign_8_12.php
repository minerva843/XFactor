<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	
	
	<div class="main-section"> 
        <div class="container">
		    
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
<p><b>Tip</b> to add or edit info icon position, click any info icon that appears on the image, drag info icon to intended position.</p>
</div>
<div class="bg-ion-info"  style="background-repeat: no-repeat;background-image:url('<?php echo base_url() ?>temp/<?php echo $imagedata; ?>')" >
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
			        
				<div class="col-md-3 right-text assign-icon master-floor-left info_icon_assignpost">
				<div class="tab right-tabs">
               
				<div class="table-content">	  
				<ul class="nav nav-tabs ">
				<!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
				<li class=""><a data-toggle="tab" id="maikmenulisticons2" href="#menu1">MAIN MENU</a></li>
				<li class=""><a data-toggle="tab" id="icon_all_assignmentstep2" href="#menu1">ALL ASSIGNMENTS</a></li>
				<li class="active"><a data-toggle="tab" href="#menu1">ASSIGN POST</a></li>
			
				
				</ul>
				<div class="table_info floor-step assign-top">
				<p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED </p>
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
 
</tr>
</thead>
<tbody>
    
    <?php foreach ($icons as $icon){ ?>
    
      <tr id="icon_tr<?php echo $icon['id']; ?>" >
      <td id="icon<?php echo $icon['id']; ?>" data-iconid="<?php echo $icon['id']; ?>" class="btn icon">INFO ICON <?php echo $icon['info_icon_number']; ?></td>
      <td><a href="#" class="edit postname<?php echo $icon['id']; ?> ">NO POST ASSIGN</a></td>
      <td id="action<?php echo $icon['id']; ?>" class="action anchor_add" > <a href="#" data-iconid="<?php echo $icon['id']; ?>" class="add ">Assign</a></td>
       
      </tr>
    <?php }  ?>    
    
    

<!--
<tr id="icon_tr2">
<td id="icon2" data-iconid="2" class="btn icon" >Info icon 02</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action2" class="action anchor_add" > <a href="#"  data-iconid="2" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr3">
<td id="icon3" data-iconid="3" class="btn icon" >Info icon 03</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action3" class="action anchor_add" > <a href="#" data-iconid="3" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr4">
<td id="icon4" data-iconid="4" class="btn icon" >Info icon 04</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action4" class="action anchor_add" > <a href="#" data-iconid="4" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr5">
<td id="icon5" data-iconid="5" class="btn icon" >Info icon 05</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action5" class="action anchor_add" > <a href="#" data-iconid="5" class="add">add</a></td>
<td>&nbsp;</td>
</tr>


<tr id="icon_tr6">
<td id="icon6" data-iconid="6" class="btn icon" >Info icon 06</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action6" class="action anchor_add" > <a href="#" data-iconid="6" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr7">
<td id="icon7" data-iconid="7" class="btn icon" >Info icon 07</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action7" class="action anchor_add" > <a href="#" data-iconid="7" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr8">
<td id="icon8" data-iconid="8" class="btn icon" >Info icon 08</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action8" class="action anchor_add" > <a href="#" data-iconid="8" class="add">add</a></td>
<td>&nbsp;</td>
</tr>


<tr id="icon_tr9">
<td id="icon9" data-iconid="9" class="btn icon" >Info icon 09</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action9" class="action anchor_add" > <a href="#" data-iconid="9" class="add">add</a></td>
<td>&nbsp;</td>
</tr>

<tr id="icon_tr10">
<td id="icon10" data-iconid="10" class="btn icon" >Info icon 10</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td id="action10" class="action anchor_add" > <a href="#" data-iconid="10" class="add">add</a></td>
<td>&nbsp;</td>
</tr>-->

  
    

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
 
  
  
  
        $("body").on('click','#icon_all_assignmentstep2,#maikmenulisticons2',function(){
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
  
  
  

$("body").on("click",".add",function(){
    

   let iconid = $(this).attr("data-iconid");
   $('.add').find("input").remove();
   $(this).append("<input type='checkbox' class='' checked />");
   $("#draggable"+iconid).removeClass("hide").attr("data-boxid",iconid).css("background","green !");
   $("#button_updatemapping").attr("data-iconid",iconid);

   
});



$("body").on("click","#listoficons",function(){

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


});
 



$("body").on("click","#button_updatemapping",function(){

let post_id = $("#post_data option:selected").val();
let post_text = $("#post_data option:selected").text();

let info_icon = $("#button_updatemapping").attr("data-iconid");

if(!info_icon.length){

alert("Click on Add button on right side");

}else{
	  $.ajax({
	   url:"<?=base_url();?>icon/updatePostMapping",
	   method:"POST", 
	   data:{post_id:post_id,post_text:post_text,info_icon,info_icon}, 
	   success:function(data)
	   {
	   
	  
		$('.postname'+info_icon).text(post_text);
	   } 
	  });


}

});




$("body").on("click",".removeicon",function(){
    
     let iconid = $(this).attr("data-iconid");
     $("#draggable"+iconid).addClass("hide");
     $("#action"+iconid+" a").text("ADD").addClass("add").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
     
     
     // alert(iconid); 
   
});

        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();

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
      height:720px;
    
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

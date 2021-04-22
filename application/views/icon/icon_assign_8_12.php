<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	
	
	<div class="main-section"> 
        <div class="container">
		    
	   <div class="top-header">
	   <div class="row">
	   <div class="col-md-9">
	   <h2><?php if($post_type=='POST'){  echo "ASSIGN POSTS"; }else{ echo "INFO ICON (ASSIGN POSITION)"; }?></h2>
	   
	   </div>
	     
	   <div class="col-md-3">
	    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
	   </div>
	   </div>   
		</div>	   
		
		<div class="middle-body register-form info_icon_assign">
		<div class="row">
               <div class="col-md-9">	



			   
<div class="image-container info-img-full">
<div class="icon_top_titel">
<p>to add or edit info icon position, click any info icon that appears on the image, drag info icon to intended position.</p>
</div>
<div id="snaptarget33" class="wrapper bg-ion-info"   style="background-repeat: no-repeat;" >
<div id="containment-wrapper" >
    
    

    
  <!--  
    <div id="draggable1" data-boxid="" style="background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >1</div>
    
    <div id="draggable2" data-boxid="" style=" background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >2</div>
    
        <div id="draggable3" data-boxid="" style=" background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >3</div>
    
        <div id="draggable4" data-boxid="" style="  background: green;color: white; border-radius: 50%;" class="draggable ui-widget-content hide" >4</div>
    
        <div id="draggable5" data-boxid="" style=" background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >5</div>
    
        <div id="draggable6" data-boxid="" style=" background: green;color: white; border-radius: 50%;" class="draggable ui-widget-content hide" >6</div>
    
        <div id="draggable7" data-boxid="" style="background: green;color: white; border-radius: 50%;" class="draggable ui-widget-content hide" >7</div>
    
        <div id="draggable8" data-boxid="" style=" background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >8</div>
    
        <div id="draggable9" data-boxid="" style=" background: green;color: white; border-radius: 50%;" class="draggable ui-widget-content hide" >9</div>
        <div id="draggable10" data-boxid="" style="background: green; color: white;border-radius: 50%;" class="draggable ui-widget-content hide" >10</div>
  --> 
  </div> 
     </div>
                        <!-- <img src="../assets/images/user-home1.png" alt="">    -->
					  
					   
                    </div>
			   
			   </div>
			        
				<div class="col-md-3 right-text assign-icon master-floor-left">
				<div class="tab right-tabs">
          
				<div class="table-content">	  
				<ul class="nav nav-tabs ">
				<!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
				<li class=""><a data-toggle="tab" id="maikmenulisticons" href="#menu1">MAIN MENU</a></li>
				<li ><a data-toggle="tab" id="icon_all_assignment22" href="#menu1">ALL ASSIGNMENTS</a></li>
				<li class="active"><a data-toggle="tab" id="assignPostContent" href="#menu1">ASSIGN POST</a></li>
			
				
				</ul>
				<div class="table_info floor-step assign-top">
				<p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED </p> <span class="assignPostSpan">ASSIGN POST</span>
				<div class="icon-step">
				<h5>STEP 1 OF 2</h5>
				</div>
				<select name="explore" id="selectZoneImage" class="select-zone">
				<option  value="" selected="">SELECT A ZONE</option>
				<?php foreach($zones as $zone){ ?>

				<option value="<?php echo $zone['id']; ?>"> <?php echo $zone['zone_name']; ?> </option>

				<?php } ?>
				</select> 
                                
<p class="altertext" style="color:red !important;">ENSURE THAT A ZONE IS SELECTED. </p>
<p class="altertext" style="color:red !important;">TO START, SELECT A ZONE. </p>
<h6 class="sucess" style="color:#00b050;"><b>CURRENT INFO ICON POSITIONS </b></h6>
<div class="inner-nearme">
<div class="select-box">
<table class="table table-striped">
<thead>
<tr>
<th> Info icon name</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody id="iconslist" style="display:none;" >
    
  
    
    

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
<button type="button" id="backtolistButton" class="save-btn right">BACK</button>
<button type="button" id="nexttoPostAssign" class="save-btn right">NEXT</button>
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
<?php if($post_type=='POST'){?>
$("body").on('click','#backtolistButton',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>post/index",
        ajax: { 
           settings: { data : 'project=<?=$project_select?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});
<?php }else{?>
    $("body").on('click','#backtolistButton',function(){
          
   $.fancybox.getInstance('close');
	$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>icon/index",
        ajax: { 
           settings: { data : 'project=<?=$project_select?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});
<?php }?>

    

  
      $("body").on('click','#icon_all_assignmentstep1,#maikmenulisticons',function(){
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
   
   
   
      $("body").on('click','#icon_all_assignment22',function(){
      $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/allAssignments',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });


$("#selectZoneImage").change(function(){

let zone_id = $(this).val();





         $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>icon/getinfoIconsDisplay/'+zone_id+'/<?php echo $project_select;   ?>',
           data:'zoneid='+zone_id,
           success: function(data3)
           {
                
              $("#containment-wrapper").html(data3);
              
              
              $('.draggable').each(function(){
              
            //  $(this).draggable();
            
            
            
                $(".draggable").draggable({
    containment: "#containment-wrapper",
    scroll: false,
    start: function() {
         $(this).css("background-color","green");
      
    },
    stop: function (event, ui) {
        positions = JSON.parse("{}");
        positions[this.id] = ui.position;
        let icon_id  = $(this).attr("data-boxid");
        let draggable  =  'draggable';
         draggable = draggable+icon_id;
       
        localStorage.positions = JSON.stringify(positions)
       
        console.log(JSON.stringify($(this).position()));
      let left  = $('#draggable'+icon_id).css("left");
      let top  = $('#draggable'+icon_id).css("top")
      var pos = JSON.stringify($(this).position());
      $(this).css("background-color","black");
      $(this).css("color","white");
     // $("#action"+icon_id+" a").text("Remove").addClass("removeicon").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
      
     $("#position"+icon_id+" a").text(left+","+top).addClass("removeicon").css({"color": "black", "border-radius": "1px"});
      let drag_pos  = '{"top":"'+top+'","left":"'+left+'"}';  
      let zone_id = $("#selectZoneImage").val();
         $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>icon/saveDragIconPositioninDB',
           data:'drag_position='+drag_pos+'&zone_id='+zone_id+'&icon_id='+icon_id+'&project_id='+<?php echo $project_select; ?>,
           success: function(data)
           {
                
               console.log("Data Save"); // show response from the php script.
           }
         });
    }
});
            
            
            
            
            
            
            
              
              });
               
           }
         });
         
         
         
           $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>icon/getinfoIconsDisplayRight/'+zone_id+'/<?php echo $project_select;   ?>',
           data:'zoneid='+zone_id,
           success: function(data4)
           {
                
              $("#iconslist").html(data4);
               
           }
         });







$("#iconslist").css("display","block");

         $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>icon/getContentImage',
           data:'zoneid='+zone_id,
           success: function(data)
           {
                
               var data2 = JSON.parse(data);
                console.log(data2.response);
                //console.log(data2.response.file_name);
                let image = '<?php echo base_url() ?>temp/'+data2.response.file; 
                image = image.replace(/\s/g,"%20"); 
                //image = $.trim(image);
                console.log(image);
               
               $("#snaptarget33").css("background-image","url("+image+")");
               // $("#snaptarget33").css("height",data2.response.height);
               // $("#snaptarget33").css("width",data2.response.width);
               $(".altertext").css("display","none");
               
           }
         });




});



   $("body").on('click','#nexttoPostAssign',function(){
   
   
   let zone= $("#selectZoneImage").val();
   
   if(zone==""){
   
   
   alert("Please select zone");
   
   
   }else{
   
      $.fancybox.getInstance('close');
   let zone_id = $("#selectZoneImage").val();
   
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/iconsPostAssign/'+zone_id,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });
   
   }
   
   
   
   
                
   
   }); 


 


    
    
 
 


$("body").on("click",".add",function(){
    

   let iconid = $(this).attr("data-iconid");
   $('.add').find("input").remove();
   $(this).append("<input type='checkbox' class='' checked /> ");
   $("#draggable"+iconid).removeClass("hide").attr("data-boxid",iconid).css("background","green !");

   
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

	.activebtn{
		background: #00b050!important;
		color: #fff !important;
	}


</style>
<script>
    

    
 </script>

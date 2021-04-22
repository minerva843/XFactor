<?php defined('BASEPATH') OR exit('No direct script access allowed'); error_reporting(0); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	
	
	<div class="main-section"> 
        <div class="container" style="padding-left:0px;">
		    
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

<div class="leftbox-top-grid assignpost-info-icon"></div>
			   
<div class="image-container info-img-full">
<div class="icon_top_titel">
<p>to add or edit info icon position, click any info icon that appears on the image, drag info icon to intended position.</p>
</div>
<!--div id="snaptarget33" class="wrapper bg-ion-info"   style="background-repeat: no-repeat;" >
<div id="containment-wrapper" >
    
 
  </div> 
     </div-->
	 <div class="avtar-left to-start-select wrapper bg-ion-info" id="container">
	 
<img id="demo-4" class="floorimg snaptarget33 icon-assign-top" src=" " alt="your image" style="display:none;">
<div class="selectedicon addnewicon" style="position:absolute;"></div>
							<div class="demo1" id="containment-wrapper"> 
							
 
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
				<li class=""><a data-toggle="tab" id="AllPost" href="#menu1">MAIN MENU</a></li>
				<li ><a data-toggle="tab" id="icon_all_assignment22" href="#menu1">ALL ASSIGNMENTS</a></li>
				<li class="active"><a data-toggle="tab" id="assignPostContent" href="#menu1">ASSIGN POST</a></li>
			
				 
				</ul>
				<div class="table_info floor-step assign-top">
				<p style="color:#00b050!important;">CURRENTLY SELECTED : <span class="assignPostSpan" style="color: #000;">ASSIGN POST</span> </p>     
				<div class="icon-step">
				<h5>STEP 1 OF 2</h5>
				</div>
				<select name="explore" id="selectZoneImage" class="select-zone">
				<option  value="" selected="">SELECT A ZONE</option>
				<?php foreach($zones as $zone){ ?>

				<option value="<?php echo $zone['id']; ?>" data-zonename="<?php echo $zone['zone_name']; ?>"> 
				
				<?php echo $zone['zone_name']; ?> </option>

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
     //positions = JSON.parse("{}");
//$.each(positions2, function (id, pos) {
//    $("#" + id).css(pos)
//})


$(document).ready(function(){
<?php 
session_start();
$_SESSION['action']=$post_type;
//$this->session->set_flashdata('action',$post_type);
if(!empty($post_type=='POST')){?> 
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
$("body").on('click', '#AllPost', function () {

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
		   settings: { data : 'project=<?=$project_select;?>', type : 'POST' }
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
        src         : '<?=base_url();?>post/postassignment',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
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
        src         : "<?php echo base_url(); ?>icon/showallicon",
        ajax: { 
           settings: { data : 'project=<?=$project_select?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
	
});
$("body").on('click', '#AllPost', function () {

	 $.fancybox.getInstance('close');
   
	$.fancybox.open({
		maxWidth  : 800,
		fitToView : true,
		width     : '100%',
		height    : 'auto',
		autoSize  : true,
		type        : "ajax",
		src         : "<?php echo base_url(); ?>icon/showallicon",
		ajax: { 
		   settings: { data : 'project=<?=$project_select;?>', type : 'POST' }
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
<?php }?>

    

  
      // $("body").on('click','#maikmenulisticons',function(){
      // $.fancybox.getInstance('close');
        // $.fancybox.open({
        // maxWidth  : 800,
        // fitToView : true,
        // width     : '100%', 
        // height    : 'auto',
        // autoSize  : true,
        // type        : "ajax",
        // src         : '<?=base_url();?>icon/showallicon',
        // ajax: { 
           // settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        // },
        // touch: false,
        // clickSlide: false,
        // clickOutside: false
        
        // });   
                
   
   // });
										
   
   
   
      

 
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
	  console.log($('#draggable'+icon_id).css("left"));
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
                $('.assignPostSpan').html(data2.response.zone_name);
                //console.log(data2.response.file_name);
                let image = '<?php echo base_url() ?>temp/'+data2.response.file; 
                image = image.replace(/\s/g,"%20"); 
                //image = $.trim(image);
                console.log(image);
               $('.snaptarget33').show();
               $('.snaptarget33').attr("src",image);
               //$(".snaptarget33").css("background-image","url("+image+")");
               // $("#snaptarget33").css("height",data2.response.height);
               // $("#snaptarget33").css("width",data2.response.width);
               $(".altertext").css("display","none");
               
           }
         }); 
 
 
$.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>icon/getselectedinfoIconsDisplay/'+zone_id+'/<?php echo $project_select;?>',
           data:'zoneid='+zone_id,
           success: function(dataicon)
           { 
		   
				var dataicon = JSON.parse(dataicon);
				
				console.log(dataicon);
			   $('.selectedicon').html(dataicon);
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
    //$('.hide').removeClass('draggable');
    

   let iconid = $(this).attr("data-iconid");
   $('.add').find("input").remove();
   //$("#draggable"+iconid).addClass('draggable');
   $(this).append("<input type='checkbox' class='' checked /> ");
   $("#draggable"+iconid).removeClass("hide").attr("data-boxid",iconid).css("background","green !");
   
   // $.ajax({
	   // type: "POST",
	   // url: '<?php echo base_url(); ?>icon/addnewicon/'+iconid+'/<?php echo $project_select;?>',
	   // data:'iconid='+iconid,
	   // success: function(dataicon)
	   // {  
	   
			// var dataicon = JSON.parse(dataicon);
			
			// $('.addnewicon').html(dataicon)
			 
			// console.log(dataicon);
		   
	   // }

// });
});


$("body").on("click",".removeicon",function(){
    
     let iconid = $(this).attr("data-iconid");
     $("#draggable"+iconid).addClass("hide");
     $("#action"+iconid+" a").text("ADD").addClass("add").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
     
     
     // alert(iconid); 
   
});

        $('body').on('click', '.close-btn', function () {
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

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   
<div class="main user-home program">
 <section class="main-container">
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
             <h2>INFO ICON (ASSIGN POSITION)</h2>
                <div class="inner-box-left clearfix">
				  
					<div class="user-location-right" style="width:100%!important;">
					<div class="bottom-button-section" >
					<!-- <p><b>Tip:</b>Click any icon with number to select, click any drag icon to intended position.</p>-->
<!--                        <button type="button" class="Assign-position">Assign position</button>
						<button type="button">Assign post</button>-->
                    </div>   
					</div>
                    <div class="image-container">
                        <div id="snaptarget" class="wrapper"  style="background-repeat: no-repeat;background-image:url('./assets/images/user-home1.png')" >
<div id="containment-wrapper">
    <div id="draggable1" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
    <div id="draggable2" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable3" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable4" data-boxid="" style="  color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable5" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable6" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable7" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable8" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    
        <div id="draggable9" data-boxid="" style=" color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
        <div id="draggable10" data-boxid="" style="color: white;border-radius: 50%;" class="draggable ui-widget-content hide" ><i style="font-size: 22px;color: green;" class="fa fa-info-circle" aria-hidden="true"></i></div>
    </div> 
     </div>
                        <!-- <img src="../assets/images/user-home1.png" alt="">    -->
					  
					   
                    </div>

<!--                     <div class="bottom-button-section">
                        <button type="button">Top View</button>
                        <button type="button">3D View</button>
                        <button type="button">take a look around</button>
                    </div> -->
                </div>
            </div>

            <div class="right-side-container program-right">
                 <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                <div class="inner-side-top configpage">
           
					<div class="my-avatar">
					
<div id="nearme" class="tab-content current">

 <div class="card">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <span>CONFIG PAGE</span></a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> <span>MAIN MENU</span></a></li>
          <li role="presentation" class="active"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span>ASSIGN INFO ICON</span></a></li>
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane" id="home">
		  CONFIG PAGE
		  </div>
           
		   <div role="tabpanel" class="tab-pane" id="profile">
		   MAIN MENU
		  </div>
		  <div role="tabpanel" class="tab-pane active" id="messages">
		   
		<p style="color:#00b050!important;font-weight: bold!important;"><span class="current-bold">CURRENTLY SELECTED </span></p>
		<select name="explore">
                    <option disabled="" value="" selected="">SELECT A ZONE</option>
			<?php foreach($zones as $zone){ ?>

<option value="<?php echo $zone->zone_id; ?>"> <?php echo $zone->zone_name; ?> </option>

<?php } ?>
		</select>

<p style="color:red !important;font-weight: bold!important;">ENSURE THAT A ZONE IS SELECTED. </p>
<p style="color:red !important;font-weight: bold!important;">TO START, SELECT A ZONE. </p>
<h5 class="sucess" style="color:#00b050;">CURRENT INFO ICON POSITIONS </h5>
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
<tbody>
<tr id="icon_tr1" >
<td id="icon1" data-iconid="1" class="btn icon">Info icon 01</td>
<td><a href="" class="edit ">EDIT Position</a></td>
<td id="action1" class="action anchor_add" > <a href="#" data-iconid="1" class="add ">add</a></td>
<td>&nbsp;</td>
</tr>

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
</tr>

  


</tbody>
</table>
 

</div>
 </div>
		  
		  </div>
		  
        </div>
      </div>
   


<div class="config-button">
<button type="button" class="save-btn right">done</button>
 </div>                 					
</div>				
</div>
 
            </div>
        </div>
    </div></section>
  </div>
<script type="text/javascript">

//var sPositions2 = localStorage.positions2 ;
     //positions2 = JSON.parse(sPositions2);
     positions = JSON.parse("{}");
//$.each(positions2, function (id, pos) {
//    $("#" + id).css(pos)
//})


$(document).ready(function(){
    
    
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
       // console.log(JSON.parse(JSON.stringify(positions)));
       //;
        localStorage.positions = JSON.stringify(positions)
        
       // alert(icon_id);
        console.log(JSON.stringify($(this).position()));
      let left  = $('#draggable'+icon_id).css("left");
      let top  = $('#draggable'+icon_id).css("top")
      var pos = JSON.stringify($(this).position());
      $(this).find('i').css("color","black");
      $("#action"+icon_id+" a").text("Remove").addClass("removeicon").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
      let drag_pos  = '{"top":"'+top+'","left":"'+left+'"}';  
         $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>auth/saveDragIconPosition',
           data:'drag_position='+drag_pos+'&zone_id='+1+'&icon_id='+icon_id,
           success: function(data)
           {
               //$('#draggable'+icon_id).css(pos);
               //$('#draggable'+icon_id).css("left");
                
               console.log("Data Save"); // show response from the php script.
           }
         });
    }
});
    






    
    
 
 


$("body").on("click",".icon,.add",function(){
    
   $('.icon').removeClass("btn-success");
   $(this).addClass("btn-success");
   let iconid = $(this).attr("data-iconid");
   $(this).append("<input type='checkbox' checked />")
   //alert(iconid);
   $("#draggable"+iconid).removeClass("hide").attr("data-boxid",iconid).css("background","green !");

     // alert(iconid); 
   
});


$("body").on("click",".removeicon",function(){
    
     let iconid = $(this).attr("data-iconid");
     $("#draggable"+iconid).addClass("hide");
     $("#action"+iconid+" a").text("ADD").addClass("add").css({"color": "black", "border-radius": "1px","text-decoration": "underline","font-weight": "900"});
     
     
     // alert(iconid); 
   
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
       
      height:500px;
      border:1px solid #000;
      padding: 5px;
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
</style>
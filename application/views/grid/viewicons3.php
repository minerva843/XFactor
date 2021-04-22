
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="../themes/default/css/test4.css" type="text/css" charset="utf-8"/>
    <script src="../themes/default/js/layout.js"></script>
<div class="main user-home program">
 <section class="main-container">
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
             
                <div class="inner-box-left clearfix">
				     
					<div class="user-location-right" style="width:100%!important;">
					<div class="bottom-button-section">
					<p><b>Tip:</b>Click any icon with number to select, click any drag icon to intended position.</p>
                        <button type="button" class="Assign-position">Assign position</button>
						<button type="button">Assign post</button>
                    </div>   
					</div>
                    <div class="image-container">
                        <div id="snaptarget" class="wrapper"  style="background-repeat: no-repeat;background-image:url('<?php echo base_url(); ?>/assets/images/user-home1.png')" >
<div id="containment-wrapper"   >
     <?php foreach ($icon_positions as $icon){ 
//    $drag =  json_decode($icon); print_r($drag); ?>
    <?php $drag  = json_decode($icon->drag_position); //print_r($drag->top); ?>
    <div id="<?php echo $icon->id; ?>"   class="draggable ui-widget-content "  style="background:red;border-radius:50%;right: auto;bottom: auto;position:relative;top:<?php echo $drag->top;?>px;left:<?php echo $drag->left;?>px;" >
        
    </div>
    <?php }  ?>
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
                <div class="inner-side-top configpage">
           
					<div class="my-avatar">
					
<div id="nearme" class="tab-content current">

 <div class="card">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> <span>CONFIG PAGE</span></a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> <span>MAIN MENU</span></a></li>
          <li role="presentation" class="active"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span>ASSIGN ZONES</span></a></li>
          
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
		  <select name="explore">
			<option value="">Floor Plan</option>
			<option value="">HALL 602 FLOOR PLAN</option>
			<option value="">HALL 602 FLOOR PLAN</option>
		</select>
		
		<select name="explore">
			<option value="">Zone Name</option>
			<option value="">HALL 602 FLOOR PLAN</option>
			<option value="">HALL 602 FLOOR PLAN</option>
		</select>


<h5 class="sucess"> CURRENT CONTENT ASSIGNMENTS</h5>
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
<tr>
    <td id="icon1" data-iconid="1" class="btn icon">Info icon 01</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td> <a href="" class="edit">Remove</a></td>
<td> <input type="checkbox"></td>
</tr>

<tr>
<td id="icon2" data-iconid="2" class="btn icon" >Info icon 02</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td> <a href="" class="edit">Remove</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon3" data-iconid="3" class="btn icon" >Info icon 03</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td> <a href="" class="edit">Remove</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon4" data-iconid="4" class="btn icon" >Info icon 04</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td> <a href="" class="edit">&nbsp;</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon5" data-iconid="5" class="btn icon" >Info icon 05</td>
<td><a href="" class="edit">EDIT Position</a></td>
<td> <a href="" class="edit">&nbsp;</a></td>
<td>&nbsp;</td>
</tr>


<tr>
<td id="icon6" data-iconid="6" class="btn icon" >Info icon 06</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon7" data-iconid="7" class="btn icon" >Info icon 07</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon8" data-iconid="8" class="btn icon" >Info icon 08</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>


<tr>
<td id="icon9" data-iconid="9" class="btn icon" >Info icon 09</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon10" data-iconid="10" class="btn icon" >Info icon 10</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon11" data-iconid="11" class="btn icon" >Info icon 11</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>

<tr>
<td id="icon12" data-iconid="12" class="btn icon" >Info icon 12</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
<td>&nbsp;</td>
</tr>
<tr>
<td id="icon13" data-iconid="13" class="btn icon" >Info icon 13</td>
<td><a href="" class="edit">&nbsp;</a></td>
<td> <a href="" class="edit">add</a></td>
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
    <?php
   
$arr = array();    
foreach ($icon_positions as $iconpos){
   // print_r($iconpos);
    $arr[$iconpos->id] = $iconpos->drag_position;
    
    
    
echo "<script>
$(document).ready(function(){
	 

$('#".$iconpos->id."').css(".$iconpos->drag_position.");

console.log(".$iconpos->drag_position.")
    
});

</script>";
  
    
    
    
    
    
}
  $json = json_encode($arr); 
  

  
  
  
 ?>
 
    
   
    <script type="text/javascript">
//  var sPositions10 = '<?php  //echo $json;   ?>';
//  var positions100 =  JSON.stringify(sPositions10);
// console.log(positions100);
////  $.each(sPositions10, function (id, pos) {
////     //$("#" + id).css(pos)
//   console.log(JSON.parse(positions100));
////  });
//  
//         $.each(JSON.parse(positions100), function(idx, obj) {
//	       console.log(obj);
//              // $("td[data-tdid='"+obj.grid_id+"']").addClass("myclass");
//          });


    </script>
    
    <style>
      .draggable {
      width: 20px;
      height: 00px;
      padding: 0.5em;
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
 
</style>
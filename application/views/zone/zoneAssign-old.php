
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">
<?php 
$floor_plan_drop_point=explode(',',$FloorData->floor_plan_drop_point);
?>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
  
  .column {
  float: left;
  width: 43.75px;
  border: 1px gray solid;
  text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.rect {
	height: <?php echo $floor_plan_drop_point[1].'px';?>;
	width : <?php echo $floor_plan_drop_point[0].'px';?>;
	background : #ccc;
	position: absolute;
	bottom: 0px;
	left: 41px;
	}
.container{
	margin-bottom: 0px;
	height: 554px;
	max-width: 800px;
	position: relative;
	padding-left:0px;
	padding-right:0px;
}
.table{
	border: green;
	height: 500px;
	max-width: 799px;
}
td{
	text-align: center;
}
a {
	text-decoration: none;
	color: red;
}

.myclass{
	background-color:#00b300bf;
}

</style>

<div class="main user-home program">
 <section class="main-container">
     
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
            
               <div class="grip-message assign-zones">
			   <h2>ZONES (ASSIGN ZONES)</h2>
			   <p>CURRENT GRID THAT YOU ARE WORKING ON IS THE GRID THAT IS HIGHLIGHT IN GREEN.
			   SIMPLY CLICK ON ANY GRID TO EDIT, CLICK UPDATE WHEN DONE</p>
			   </div>     

                <div class="inner-box-left selectboxes clearfix">
				<div class="user-location" >
				<span id="grid_number" data-gridid=""> GRID NUMBER: </span> 
                    <div class="select-box" style="width: 100% !important;">
                        <select id="zonetype" >
                       
                            <option disabled="" value="" selected="" > Select Zone Type </option>
	<?php foreach($zone_types as $zonetyoe){ ?>
		<option value="<?php echo $zonetyoe->zone_type; ?>" > <?php echo $zonetyoe->zone_type; ?> </option>

	<?php } ?>
                         
                      </select>
                        <p style="margin-left: 49%;display: none;">ENSURE THAT A ZONE TYPE IS SELECTED.</p>
                        

                    </div>
               				</div>
					<div class="selecteduser">
					<div class="bottom-button-section">
					
					<select  id="zone" class="">
                                            <option disabled="" value="" selected=""> Select Zone Name </option>
		<?php foreach($zones as $zone){ ?>

		<option value="<?php echo $zone->zone_id; ?>"> <?php echo $zone->zone_name; ?> </option>

	<?php } ?>
    </select> 
   <p style="margin-left: 9%;display: none;">ENSURE THAT A ZONE USAGE IS SELECTED.</p>
 
         <button id="addZone"  class="  btn-success">UPDATE</button>
					
				
                    </div>
					</div>
                    <div class="image-container">


<div class="demo1">
<form action="" method="get">
        
		
<div class="container" id="container-4" >
<!--img id="demo-4" class="blah rect " src="<?php echo base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;?>" alt="your image"--> 

	<?php
            $image_url = base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;
            $height = $floor_plan_drop_point[1].'px';
            $width = $floor_plan_drop_point[0].'px';
        echo "<table border ='1' class='table table1' style='border-collapse: collapse; ' >";
		$alpha = range('I', 'A'); 
		for ($i=0,$row=1; $row <= 9;$i++, $row++) { 
		echo "<tr> \n";
		for ($col=1; $col <= 16; $col++) { 
		   $p = $col;
                    if($p>9){
			   $text = $alpha[$i].$p;
			   } else { 
			   $text =  $alpha[$i].'0'.$p;
	            }
                   
                        $myclass = "";
                        $check = '<input type="checkbox" checked />';
 
                   //echo $myclass;
		   echo "<td     class='gridboxtd ".$myclass." action_".$text." '   id='action_$alpha[$i]$p'>
		   
		   <a href='#' class='gridbox' id='get_$alpha[$i]$p'>";
	            echo $text;	    
		   echo "</a></td> \n";
		   echo "<script>
$(document).ready(function(){
	$('#action_$alpha[$i]$p').click(function(){
		$('.gridboxtd').removeClass('myclass')
		$('#action_$alpha[$i]$p').addClass('myclass');
                
		var temp = $('#get_$alpha[$i]$p').html().split(',');
		
		$('#inp_val').val(temp);
		  
		$('#grid_number').text('GRID NUMBER: '+ temp);
		$('#grid_number').attr('data-gridid',temp);
                 $('.edit_grid input').remove();
                $('#edit$text').append('$check');
		
	})
})

</script>";
			}
			echo "</tr>";
		}
		echo "</table>";
	?>
	
</div>
<input type='hidden' id='inp_val' name='test[]'>

		</form>
<script>
$(document).ready(function(){
$(".table1").css("background-image", "url('<?php echo base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;?>')");
$(".table1").css("background-repeat", "no-repeat");
$(".table1").css("background-size", "<?php echo $floor_plan_drop_point[0]?>px <?php echo $floor_plan_drop_point[1]?>px");
$(".table1").css("background-position", "left bottom");
});
// $('.rect').each(function(){
	// var e1=$(this),
		// src=e1.attr('src'), 
		// parent=e1.parent(); 
		 
		// parent.css({ 
			// 'background-image':'url('+ src +')',
			
			// 'background-repeat': 'no-repeat',
			// 'display':'block'
		// });
		// e1.hide();
// })
</script>

</div>					   
                    </div>

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
<option value="">HALL 602 FLOOR PLAN</option>
<option value="">HALL 602 FLOOR PLAN</option>
<option value="">HALL 602 FLOOR PLAN</option>
</select>


<h5 class="sucess">CURRENT ZONE ASSIGNMENTS</h5>

<div class="inner-nearme">
<div class="select-box">
<table class="table table-striped">
<thead>
<tr>
<th>GRID</th>
<th>ZONE TYPE</th>
<th>ZONE NAME</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody id="tblerows">

    <?php 
    $alpha = range('I', 'A'); 
    for ($i=0,$row=1; $row <= 9;$i++, $row++) { 
     echo "<tr> \n";
     for ($col=1; $col <= 16; $col++) {
     $p = $col;
                    if($p>9){
			   $text = $alpha[$i].$p;
			   } else { 
			   $text =  $alpha[$i].'0'.$p;
	            }                
                    $myclass = "";
		   echo "<td style='padding:4px'   class='gridboxtd ".$myclass."' id='action_$alpha[$i]$p'>
		   <a href='#' class='gridbox' id='get_$alpha[$i]$p'>";
	           echo $text;	    
		   echo "</a></td> \n";
                   echo "<td id='type".$text."' style='padding:4px'>Unused</td> \n";
                   echo "<td id='zname".$text."' style='padding:4px'>NOT AVAILABLE</td> \n";
                   echo "<td id='edit".$text."' data-grid='".$text."' class='edit_grid' style='padding:4px'>Edit  </td>  \n";
                    
        
        
   echo "</tr>";  
     }   
    }
    
    ?>
    

</tbody>
</table>

 

</div>
 </div>
		  
</div>	  
        </div>
      </div>
<div class="config-button">
<button type="button" class="save-btn left">REMOVE ALL CONTENT SET ASSIGNMENTS</button>
<button type="button" class="save-btn right"><a style="color: black;" href="<?=base_url();?>zone/zoneview/<?php echo $id;?>">done</a></button>
 </div>

                       
					
					</div>
					

                </div>

            </div>
        </div>
    </section>
  </div>

  
<script>

$(document).ready(function(){

$("#addZone").click(function(){
let grid= $("#grid_number").attr("data-gridid");
let zone_id= $("#zone option:selected").val();
let zonetype = $("#zonetype option:selected").val();

if(zone_id==""){
  $("#zone").next("p").css({"display":"block","color":"red"}); 
}else{
  $("#zone").next("p").css({"display":"none","color":"red"});       
}

if(zonetype==""){
  $("#zonetype").next("p").css({"display":"block","color":"red","font-weight":"600","font-size":"12px"});  
}else{
  $("#zonetype").next("p").css({"display":"none","color":"red"});    
}

if(zonetype!="" && zone_id!=""){
    

 
$.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>zone/saveZoneMapping',
           data:'grid='+grid+'&zone_id='+zone_id,
           success: function(data)
           {
              // alert(data); // show response from the php script.
               let grid = $("#grid_number").attr("data-gridid");
               let zone_type = $("#zonetype").val();
               let zone_name = $("#zone option:selected").text();
               
               
               $("#type"+grid).text(zone_type);
                $("#zname"+grid).text(zone_name);
            //   $("#tblerows").append('<tr><td>'+grid+'</td><td>'+zone_type+'</td><td>'+zone_name+'</td><td> <a href="#" id='+data+' class="remove">REMOVE</a></td></tr>');
               
               
           }
         });

}else{
alert("Please Select Zone Tyoe and Zone Name");
}
    });
    
    
    
$("body").on("click",".remove",function(){

let grid_map_id = $(this).attr("id");
alert(grid_map_id);
$("#"+grid_map_id).closest("tr").empty();

});    


$(".edit_grid").click(function(){
    
   let grid = $(this).attr("data-grid");
   $('#grid_number').text('GRID NUMBER: '+ grid);
   $("#grid_number").attr("data-gridid",grid);
   $('.gridboxtd').removeClass('myclass')
   $(".action_"+grid).addClass("myclass");
   $('.edit_grid input').remove();
   $(this).append('<input type="checkbox" checked />');
   
    
});


});




</script>
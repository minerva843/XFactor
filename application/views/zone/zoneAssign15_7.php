
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">

<style>
     .myclass{
	background-color:#00b300bf;
}
</style>

<div class="main user-home program">
 <section class="main-container">
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
                <div class="top-title-section">
                    Start Exploring simply click on the place you wish to visit.have fun!=)
                </div>


                <div class="inner-box-left selectboxes clearfix">
				<div class="user-location" >
				<span id="grid_number" data-gridid=""> GRID NUMBER: </span> 
                    <div class="select-box" style="width: 100% !important;">
                        <select id="zonetype" >
                       
		 
	<?php foreach($zone_types as $zonetyoe){ ?>
		<option value="<?php echo $zonetyoe->zone_type; ?>" > <?php echo $zonetyoe->zone_type; ?> </option>

	<?php } ?>
                         
                      </select>
                        

                    </div>
               				</div>
					<div class="selecteduser">
					<div class="bottom-button-section">
					
					<select id="zone" class="">
	 
		<?php foreach($zones as $zone){ ?>

		<option value="<?php echo $zone->zone_id; ?>"> <?php echo $zone->zone_name; ?> </option>

	<?php } ?>
    </select>                    
 
         <button id="addZone"  class="  btn-success">UPDATE</button>
					
				
                    </div>
					</div>
                    <div class="image-container">

<br/><br/><br/><br/>
<div class="demo">
<form action="" method="get">
        
		
<div class="container" id="container-4" style="height: 635px;background-position:left bottom;background-repeat: no-repeat;background-image:url('http://13.235.169.150/XFactor/assets/images/floor-img-removebg-preview.png');" onmousemove="myFunction(event)" onmouseout="clearCoor()">
	<?php echo "<table border ='1' class='table' style='border-collapse: collapse'>";
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
 
                   //echo $myclass;
		   echo "<td style='padding:4px'   class='gridboxtd ".$myclass."' id='action_$alpha[$i]$p'>
		   
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
		
	})
})

</script>";
			}
			echo "</tr>";
		}
		echo "</table>";
	?>
	<img id="demo-4" class="blah rect" src="#" alt="your image" style="display:none">
</div>
<input type='hidden' id='inp_val' name='test[]'>
<h1 id="mousedemo"></h1>
		</form>
<script>
function myFunction(e) {
  var x = e.clientX;
  var y = e.clientY;
  var coor = "Mouse Activity: (" + x + "," + y + ")";
  document.getElementById("mousedemo").innerHTML = coor;
}

function clearCoor() {
  document.getElementById("mousedemo").innerHTML = "";
}
</script>
<script>
	var $demo4 = $('#demo-4');
	$demo4.clayfy({
		type : 'resizable',
		container : '#container-4',
		minSize : [100,100],
		maxSize : [591,398],
		callbacks : {
			resize : function(){
				$demo4.html( 'inner: ' + $demo4.width() + ' x '+ $demo4.height() +'<br>outer: ' + $demo4.outerWidth() + ' x '+ $demo4.outerHeight());
			}
		}
	});
</script>
</div>					   
                    </div>

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

    

</tbody>
</table>

 

</div>
 </div>
		  
</div>	  
        </div>
      </div>
<div class="config-button">
<button type="button" class="save-btn left">REMOVE ALL CONTENT SET ASSIGNMENTS</button>
<button type="button" class="save-btn right">done</button>
 </div>

                       
					
					</div>
					

                </div>

            </div>
        </div>
    </section>
  </div>

     
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('.blah').show();
$('.blah')
.attr('src', e.target.result)
.width(150)
.height(100);
};

reader.readAsDataURL(input.files[0]);
}
}

$(document).ready(function(){

$("#addZone").click(function(){
let grid= $("#grid_number").attr("data-gridid");
let zone_id= $("#zone").val();
alert();
$.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>zone/saveZoneMapping',
           data:'grid='+grid+'&zone_id='+zone_id,
           success: function(data)
           {
               alert(data); // show response from the php script.
               let grid = $("#grid_number").attr("data-gridid");
               let zone_name = $("#zonetype").val();
               let zone_type = $("#zone option:selected").text();
               $("#tblerows").append('<tr><td>'+grid+'</td><td>'+zone_type+'</td><td>'+zone_name+'</td><td> <a href="#" id='+data+' class="remove">REMOVE</a></td></tr>');
               
               
           }
         });


    });
    
    
    
$("body").on("click",".remove",function(){

let grid_map_id = $(this).attr("id");
alert(grid_map_id);
$("#"+grid_map_id).closest("tr").empty();

});    


});




</script>
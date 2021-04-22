<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


    <div class="main">
	<div class="section-main">
        <div class="container">
            <div class="signup-content">
            	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">
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
		height: 100px;
		width : 150px;
		background : #ccc;
		position: absolute;
		bottom: 0px;
		left: 1px;

            }
.container{
	margin-bottom: 0px;
	height: 398px;
	max-width: 591px;
	position: relative;
}
.table{
	border: green;
	height: 400px;
	max-width: 600px;
}
td{
	text-align: center;
}
a {
	text-decoration: none;
	color: red;
}
td:hover {
  background-color: #00b300bf;
}
 .myclass{
	background-color:#00b300bf;
}
</style>
 

<div class="row">
	<div class="col-md-4" style="margin-top:6px;">GRID NUMBER : <span id="grid_number" data-gridid=""></span></div>
	<div class="col-md-3">
			
	<select id="zonetype" class="form-control">
	<option>Zone Type </option>
	<?php foreach($zone_types as $zonetyoe){ ?>
		<option value="<?php echo $zonetyoe->zone_type; ?>" > <?php echo $zonetyoe->zone_type; ?>  </option>

	<?php } ?>
    </select>

	</div>
	<div class="col-md-3">
			
	<select id="zone" class="form-control">
	<option>Zone Name </option>
		<?php foreach($zones as $zone){ ?>

		<option value="<?php echo $zone->zone_id; ?>"> <?php echo $zone->zone_name; ?> </option>

	<?php } ?>
    </select>

	</div>
 
	

</div>




<div class="demo">
<form action="" method="get">
        
	<?php //secho "<pre>"; ///print_r($selectedzones); ?>	
<div class="container" id="container-4" style="height: 399px;background-image:url('http://13.235.169.150/XFactor/assets/images/floor-img-removebg-preview.png');" onmousemove="myFunction(event)" onmouseout="clearCoor()">
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
                       if(in_array(trim($text), $selectedzones)){
                         //   $myclass = 'myclass';
                            
                             
                       }
                    
                   
                   //echo $myclass;
		   echo "<td style='padding:4px' data-tdid='".$text."'  class='gridboxtd ".$myclass."' id='action_$alpha[$i]$p'>
		   
		   <a href='#' class='gridbox' id='get_$alpha[$i]$p'>";
	            echo $text;	    
		   echo "</a></td> \n";
		   echo "<script>
$(document).ready(function(){
	$('#action_$alpha[$i]$p').click(function(){
		$('.gridboxtd').removeClass('')
		$('#action_$alpha[$i]$p').addClass('');
		var temp = $('#get_$alpha[$i]$p').html().split(',');
		
		$('#inp_val').val(temp);
		  
		$('#grid_number').text(temp);
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
let grid= $("#grid_number").text();
let zone_id= $("#zone").val();
          $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>auth/saveZoneMapping',
           data:'grid='+grid+'&zone_id='+zone_id,
           success: function(data)
           {
               alert("Updated"); // show response from the php script.
           }
         });


    });


});


$("#zonetype").change(function(){

let zone = $(this).val();
 
          $.ajax({
           type: "POST",
           dataType: "json",
           url: '<?php echo base_url(); ?>auth/filterZone',
           data:'zone_type='+zone,
           success: function(data)
           {
               
              //  for(var key in dt) {
             $("td").removeClass("myclass");
               var data2 =  JSON.stringify(data.filter2);
               $.each(JSON.parse(data2), function(idx, obj) {
	       console.log(obj.grid_id);
               $("td[data-tdid='"+obj.grid_id+"']").addClass("myclass");
          });
               // }
                 // show response from the php script.
               //$(".gridboxtd").css();
           }
         });

});

</script>

				
                </div>
				
            </div>
            
        </div>

    </div>

  
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


    <div class="main">
	<div class="section-main">
        <div class="container">
            <div class="signup-content">
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

<input type='file' onchange="readURL(this);" />


<div class="demo">
<form action="" method="get">
        
		
<div class="container" id="container-4" style="height: 399px;" onmousemove="myFunction(event)" onmouseout="clearCoor()">
	<?php echo "<table border ='1' class='table' style='border-collapse: collapse'>";
		$alpha = range('I', 'A'); 
		for ($i=0,$row=1; $row <= 9;$i++, $row++) { 
		echo "<tr> \n";
		for ($col=1; $col <= 16; $col++) { 
		   $p = $col;
		   echo "<td style='padding:4px' class='' id='action_$alpha[$i]$p'>
		   
		   <a href='#' id='get_$alpha[$i]$p'>$alpha[$i]";
		   if($p>9){
			   echo $p;
			   } else { 
			   echo '0'.$p;
			   }
		   echo "</a></td> \n";
		   echo "<script>
$(document).ready(function(){
	$('#action_$alpha[$i]$p').click(function(){
		$('#action_$alpha[$i]$p').addClass('myclass');
		var temp = $('#get_$alpha[$i]$p').html().split(',');
		
		$('#inp_val').val(temp);
		
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
</script>
				
                </div>
				
            </div>
            
        </div>

    </div>

  
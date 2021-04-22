
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">


<div class="main user-home program">
 <section class="main-container">
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
                <div class="top-title-section">
                    Start Exploring simply click on the place you wish to visit.have fun!=)
                </div>


                <div class="inner-box-left clearfix">
				<div class="user-location">
				<span>you are currently at:</span>
                    <div class="select-box">
                        <select name="explore">
                        <option value="">hotel name grand ballroom</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                      </select>
                    </div>
					</div>
					<div class="user-location-right">
					<div class="bottom-button-section">
					<p><span>you are exploring:</span>common space, middle of room</p>
                        <button type="button">take look around</button>
                    </div>
					</div>
                    <div class="image-container">
                       <!-- <img src="../assets/images/user-home.PNG" alt=""> -->
					   
					   <input type='file' onchange="readURL(this);" />


<div class="demo">
<form action="" method="get">
        
		
<div class="container" id="container-4" style="height: 399px;background-repeat: no-repeat;background-image:url('http://13.235.169.150/XFactor/assets/images/floor-img-removebg-preview.png');" onmousemove="myFunction(event)" onmouseout="clearCoor()">
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
</script>
					   
					   
					   
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
<option value="">HALL 602 FLOOR PLAN</option>
<option value="">HALL 602 FLOOR PLAN</option>
<option value="">HALL 602 FLOOR PLAN</option>
</select>


<h5 class="sucess"> CURRENT CONTENT ASSIGNMENTS</h5>

<div class="inner-nearme">
<div class="select-box">
<table class="table table-striped">
<thead>
<tr>
<th>ZONE TYP</th>
<th>ZONE NAME</th>
<th>CONTENT SET</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  


<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>SETCOMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="" class="edit">EDIT</a></td>
</tr>  	  

</tbody>
</table>

<!-- 
<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 


<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 


<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 

<div class="nearme-box clearfix">
<i class="far fa-user-circle" aria-hidden="true"></i>
<div class="nearme-detail">
 <div class="date-time"> 23 JULY 2019, 0915h – 1015h  <a href="#" class="readmore">read more</a></div>
<p>XCONNECT & PARTNERS : HOW TO REALISE THE POTENTIAL
OF XCONNECT WITH THE USE OF EXISTING PRODUCTS THAT OUR PARTNERS HAVE
</p>
<div class="date-address"> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ COMPANY.</div>
</div>
</div> 

-->

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
<!-- 
                <div class="bottom-icons">
                    <div class="heading-bar">
                        what do you wish to do?
                    </div>

                    <ul class="bottom-icon-list clearfix">
                        <li>
                            <a href="#">
                                <img src="../assets/images/esteem.png" alt="">
                                <span>My Avatar</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="../assets/images/message.png" alt="">
                                <span>Mingle</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="../assets/images/content.png" alt="">
                                <span>Content</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="../assets/images/planner.png" alt="">
                                <span>My Avatar</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="active">
                                <img src="../assets/images/list.png" alt="">
                                <span>Program</span>
                            </a>
                        </li>

                    </ul>
                </div> -->
            </div>
        </div>
    </section>
  </div>
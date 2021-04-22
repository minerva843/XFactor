
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">
<?php 
$floor_plan_drop_point=explode(',',$FloorData->floor_plan_drop_point);
?>
<style>
     .myclass{
	background-color:#00b300bf;
}

.rect {
	height: <?php echo $floor_plan_drop_point[1].'px';?>;
	width : <?php echo $floor_plan_drop_point[0].'px';?>;
	background : #ccc;
	position: absolute;
	bottom: 0px;
	left: 21px;
	}
</style>



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

.rect1 {
	<?php if(!empty($data->floor_plan_drop_point)){?>
	height: <?php echo $floor_plan_drop_point[1].'px';?>;
	width : <?php echo $floor_plan_drop_point[0].'px';?>;
	<?php }else{?>
	height: 100px;
	width : 150px;
	<?php }?>
	position: absolute;
	bottom: 0px;
	left: 21px;
	}
.container{
	margin-bottom: 0px;
	height: 519px;
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
// td:hover {
  // background-color: #00b300bf;
// }
.myclass{
	background-color:#00b300bf;
}
.custom-handlers.clayfy-top:after,
    .custom-handlers.clayfy-bottom:after,
    .custom-handlers.clayfy-left:after,
    .custom-handlers.clayfy-right:after
    {
        content: '';
        position: absolute;
        height: 1px;
        top:0;left:0;
        width:100%;
        background: red;
    }
    .custom-handlers.clayfy-bottom:after{ 
        top:auto; bottom: 0;
    }
    .custom-handlers.clayfy-left:after{
        width:1px; height:100%;
    }
    .custom-handlers.clayfy-right:after{
        width:1px; height:100%;
        right: 0; left:auto;
    }
    .custom-handlers.right:after
    {
        height: 100%;
    }
</style> 



<div class="main user-home program">
 <section class="main-container">
        <div class="bottom-image-container clearfix">
            <div class="left-side-image-container program-left">
                <div class="top-title-section">
                    Start Exploring simply click on the place you wish to visit.have fun!=)
                </div>


                <div class="inner-box selectboxes">
				 <div class="user-location">
				<span>you are currently at:</span>
                    <div class="select-box">
                        <select id="zonetype" name="explore">
                       <option>Zone Name </option>
	<?php foreach($zones as $zonetyoe){ ?>
		<option value="<?php echo $zonetyoe->zone_name; ?>" > <?php echo $zonetyoe->zone_name; ?>  </option>

	<?php } ?>
                         
                      </select>
                    </div>
					</div> 
					<div class="user-location-right selecteduser">
					<div class="bottom-button-section">
					<p><span>You are exploring:</span>common space, middle of room</p>
                        <button type="button">Take look around</button>
                    </div>
					</div>
                    <div class="image-container">
                       <!-- <img src="../assets/images/user-home.PNG" alt=""> -->
					   
					<!--   <input type='file' onchange="readURL(this);" /> -->

<br/><br/><br/><br/>
<div class="demo1">
<form action="" method="get">
        
		
<div class="container" id="container-4" style="height:415px;">
	<?php echo "<table border ='1' class='table table1' style='border-collapse: collapse;background-image:url(http://13.235.169.150/XFactor/assets/images/floor-img-removebg-preview.png);background-repeat: no-repeat;    background-position: bottom left;' >";
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
		   echo "<td   data-tdid='".$text."'   class='gridboxtd ".$myclass."' id='action_$alpha[$i]$p'>
		   
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

$(".table1").css("background-image", "url('<?php echo base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;?>')");
$(".table1").css("background-repeat", "no-repeat");
$(".table1").css("background-size", "<?php echo $floor_plan_drop_point[0]?>px <?php echo $floor_plan_drop_point[1]?>px");
$(".table1").css("background-position", "left bottom");
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
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  


<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
</tr>  

<tr>
<td>COMMON</td>
<td>CORRIDOR</td>
<td> NIL</td>
<td> <a href="#" class="edit">EDIT</a></td>
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
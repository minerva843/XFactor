<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">
<?php 
$floor_plan_drop_point=explode(',',$data->floor_plan_drop_point);
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
	left: 1px;
	opacity: .5;
	}
.container{
	margin-bottom: 0px;
	height: auto; 
	max-width: 800px;
	position: relative;
	padding-left:0px;
	padding-right:0px;
}
.table {
    border: green;
    height: 300px;
    max-width: 100%;
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

<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
					<h2>FLOOR PLANS (ADD)</h2>
			   <p>TO RESIZE, SIMPLY CLICK AND DRAG THE GRIP HANDLES :</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">
            <div class="row">
			
                <div class="col-md-9">  
				
				<?php  //print_r($zone); ?>
                    
                    <div class="zone-info zone-info-grid">
                        
<div class="demo1">
 	
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
	<img id="demo-4" class="blah1 rect1" src="<?php echo base_url().'assets/floor_plan/'.$data->file_name.$data->file_type;?>" alt="your image">
</div>
<span id="mousedemo" style="display:none;"></span> 
<span id="imgactivity" style="display:none;"></span>
 <?php if(!empty($data->floor_plan_drop_point)){?>
<input type="hidden" name="floor_plan_drop_point" id="floor_plan_drop_point" value="<?=$data->floor_plan_drop_point;?>">
<?php }else{?>
<input type="hidden" name="floor_plan_drop_point" id="floor_plan_drop_point">
<?php }?>
 
 

</div>	
                       
                    </div>  
                </div>       

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                
                            </ul> 
                            <div class="table_info floor-step">
                                <h5>STEP 2 OF 3</h5>
                                <p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;font-weight: bold;" >Floor Plan (ADD) </span></p>
                                <p> Resize of images.</p>
								<p> When done, cleck next.</p>
                                <div class="tab-content">
								



                                </div>
                            </div>
                            <div class="form-submit"> 					
                                <a class="action-btn backbtn" id="btn5" >Back</a>
								<input type="submit" value="Next" class="action-btn" id="btn55">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

 <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  

    </div>
   
</div>
<script>

    $(document).ready(function () {
		
		 $("body").on('click','#btn5',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>floor/floorCreateSuccess/<?php echo base64_encode($data->id);?>',
                type: 'ajax',
                 ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
            
        });
		
		$('#btn55').click(function(){
			
		var url = '<?php echo base_url();?>floor/floorGrid/<?php echo base64_encode($data->id);?>';
		var drop_point=$('#floor_plan_drop_point').val();
		
		var formdata={drop_point:drop_point};
		
		$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		success: function(data)
		{  
			//alert(data);
			//console.log(data);
			$.fancybox.getInstance('close');
			$.fancybox.open({
                src: '<?=base_url();?>floor/viewAddFloorPlansSuccessful/<?php echo base64_encode($data->id);?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false
                }
            });
          
		}
	});
});
        
    

    });

</script>


<script>
function myFunction(e) {
  var x = e.clientX;
  var y = e.clientY;
  var coor = "Mouse Activity: (X-" + x + ",Y-" + y + ")";
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
		maxSize : [902,414],
		top: true,
		left:false,
		bottom:false,
		right: true,
		moveX:true, 
		move:false,
		className : 'custom-handlers',
		callbacks : { 
			resize : function(){
				$('#imgactivity').html( 'inner: ' + $demo4.width() + ' x '+ $demo4.height() +'<br>outer: ' + $demo4.outerWidth() + ' x '+ $demo4.outerHeight());
				$('#floor_plan_drop_point').val($demo4.width() + ','+$demo4.height());
			}
		}
	});
	$demo4.on('clayfy-cancel', function(){
                $demo4.html( 'inner: ' + $demo4.width() + ' x '+ $demo4.height() +'<br>outer: ' + $demo4.outerWidth() + ' x '+ $demo4.outerHeight());
            })
</script>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('.blah1').show();
$('.blah1')
.attr('src', e.target.result)
.width(150)
.height(100);
};

reader.readAsDataURL(input.files[0]);
}
}
</script>
  
<script>

$(document).ready(function(){

 $("body").on('click','#toHome',function(){
 $.fancybox.getInstance('close');
 });

});




</script>
<style>
    .fancybox-close-small{
        
        display:none !important;
    }
    .error{
        color:red !important;
    }
</style>
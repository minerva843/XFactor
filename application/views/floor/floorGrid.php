
  
<?php 
$floor_plan_drop_point=explode(',',$data->floor_plan_drop_point);
?>
<style>
 
.rect1 {
	<?php if(!empty($data->floor_plan_drop_point)){?>
	height: <?php echo $floor_plan_drop_point[1].'px';?>;
	width : <?php echo $floor_plan_drop_point[0].'px';?>;
	<?php }else{?>
	height: 250px;
	width : 400px;
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
    height: 432px;
    border: none;
    max-width: 768px;
    margin-bottom: 0px;
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
	
	
	/*  My css */

</style>

<style>

.resizable {
  <?php if(!empty($data->floor_plan_drop_point)){?>
	height: <?php echo $floor_plan_drop_point[1].'px';?>;
	width : <?php echo $floor_plan_drop_point[0].'px';?>;
	<?php }else{?>
	height: 250px;
	width : 400px;
	<?php }?>
	position: absolute;
	bottom: 0px;
	left: 1px;
	top: auto!important;
	
}
.resizable .resizers{
  width: 100%;
  height: 100%;
  border: 1px solid #4286f4;
  box-sizing: border-box;
      background-size: cover;
    background-repeat: no-repeat;
}

.resizable .resizers .resizer{
  width: 10px;
  height: 10px;
  border-radius: 50%; /*magic to turn square into circle*/
  background: white;
  border: 1px solid #4286f4;
  position: absolute;
}

.resizable .resizers .resizer.top-right {
  right: -5px;
  top: -5px;
  cursor: nesw-resize;
}

</style>

<div class="main-section zone-assigm-main" id="add-floor"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
					<h2>FLOOR PLANS (ADD)</h2>
			   <!-- <p>TO RESIZE, SIMPLY CLICK AND DRAG THE GRIP HANDLES :</p> -->
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnfp2step"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form floor-bordr">
            <div class="row">
			     
                <div class="col-md-9">  
				
				<div class="leftbox-top-grid">
				<p class="resize-grid">TO RESIZE, SIMPLY CLICK AND DRAG THE GRIP HANDLES</p>
			</div>  
				
				
				<?php  //print_r($zone); ?>
                    
                    <div class="zone-info zone-info-grid floor-palnadd-grid">
                        
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
		// $('.gridboxtd').removeClass('myclass')
		// $('#action_$alpha[$i]$p').addClass('myclass');
                
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
	<div class='resizable'>
 
  <!--div class='resizers' style="background-image: url();"-->
  <div class='resizers'>
	<img class="resizers" src="<?php echo base_url().'assets/floor_plan/'.$data->file_name.$data->file_type;?>">
    <div class='resizer top-right'></div>
    
 
</div>
</div>
	
</div>
<!--span id="mousedemo" style="display:none;"></span> 
<span id="imgactivity" style="display:none;"></span-->
 <?php if(!empty($data->floor_plan_drop_point)){?>
<input type="hidden" name="floor_plan_drop_point" id="floor_plan_drop_point" value="<?=$data->floor_plan_drop_point;?>">
<?php }else{?>
<input type="hidden" name="floor_plan_drop_point" id="floor_plan_drop_point">
<?php }?>
 
 

</div>	       
                       
                    </div>  
                </div>           
     
                <div class="col-md-3 right-text zone-assign-grids">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                           	<ul>						
					     <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
   <!--                              <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> -->
                                 <li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
                            </div>
                        </nav>
						</ul>
                            <div class="table_info floor-step">
                                    
                                <div class="tab-content floor-grids">
							
								<div class="current-status">
								<p class="current-status-1"><span class="current-bold">CURRENTLY SELECTED :</span></p><p> Floor Plan (ADD)
                                </p></div>
								<div class="display-step-status">
								<h5>STEP 2 OF 3</h5>
                                <p> Resize Your images.</p>
								<p> When done, click next.</p>
                               </div>
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

 <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  
	<input type="hidden" id="xvalue">
	<input type="hidden" id="yvalue">
    </div>
   
</div>
<script>

    $(document).ready(function () {
		
		 $("body").on('click','#btn5',function(){
          
		  
		  
		  
	    $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>floor/addStep1FloorPlans/<?php echo $data->id;?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
    });
		  
		  
            
        });
		
		$('#btn55').click(function(){
			
		var url = '<?php echo base_url();?>floor/floorGrid/<?php echo $data->id;?>';
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
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>floor/addstep3FloorPlans/<?php echo $data->id;?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
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
			
/*Make resizable div by Hung Nguyen*/
function makeResizableDiv(div) {
  const element = document.querySelector('.resizable');
  const resizers = document.querySelectorAll(div + ' .resizer')
  const minimum_size = 20;
  
  let original_width = 0;
  let original_height = 0;
  let original_x = 0;
  let original_y = 0;
  let original_mouse_x = 0;
  let original_mouse_y = 0;
  for (let i = 0;i < resizers.length; i++) {
    const currentResizer = resizers[i];
    currentResizer.addEventListener('mousedown', function(e) {
      e.preventDefault()
      original_width = parseFloat(getComputedStyle(element, null).getPropertyValue('width').replace('px', ''));
      original_height = parseFloat(getComputedStyle(element, null).getPropertyValue('height').replace('px', ''));
      original_x = element.getBoundingClientRect().left;
      original_y = element.getBoundingClientRect().top;
	  
      original_mouse_x = e.pageX;
      original_mouse_y = e.pageY;
      window.addEventListener('mousemove', resize)
      window.addEventListener('mouseup', stopResize)
    })
    
    function resize(e) {
       if (currentResizer.classList.contains('top-right')) {
        const width = original_width + (e.pageX - original_mouse_x)
        const height = original_height - (e.pageY - original_mouse_y)
		const max_y = 690;
		const max_x = 1280;
		
			if (width < max_x) { 
			  element.style.width = width + 'px'
			 
			}
			if (height < max_y) {
				
			  element.style.height = height + 'px'
			  element.style.top = original_y + (e.pageY - original_mouse_y) + 'px'
			}
		
		
		$('#floor_plan_drop_point').val(width + ','+height);
		//console.log(width + ','+height)
      }
    }
    
    function stopResize() {
      window.removeEventListener('mousemove', resize)
    }
  }
}

makeResizableDiv('.resizable')
</script>

  
<script>

$(document).ready(function(){

 $("body").on('click','#toHome',function(){
 
 

 
 
 });
 
  $("body").on('click','#close-btnfp2step',function(){
 
 
 window.location.href = "<?php echo base_url(); ?>floor/deleteJunkRecord/<?php echo $data->id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/ADD/2";
 
  
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

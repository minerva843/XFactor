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

.rect {
	background : #ccc;
	position: absolute;
	bottom: 0px;
	left: 41px;
	}
.container{
 
}
.table {
  /*  height: 432px;   */
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

</style>            
      
<div class="main-section zone-assigm-main assign-zones-rep">
    <div class="container">
      
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
					<h2>ZONES (ASSIGN ZONES)</h2>
					<p class="gree-grid">	CURRENT GRID THAT YOU ARE WORKING ON IS THE GRID THAT IS HIGHLIGHT IN GREEN.
			   SIMPLY CLICK ON ANY GRID TO EDIT, CLICK "UPDATE" WHEN DONE.</p>
<!-- 			   <p>CURRENT GRID THAT YOU ARE WORKING ON IS THE GRID THAT IS HIGHLIGHT IN GREEN.
			   SIMPLY CLICK ON ANY GRID TO EDIT, CLICK UPDATE WHEN DONE</p> -->
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form zone-assign-qh">
            <div class="row">
			
                <div class="col-md-9">  
					<div class="row">
					<div class="select-box07">
					
					</div>
					</div>
				<?php  //print_r($zone); ?>
                    <div class="leftbox-top-grid">
<form action="" method="POST" id="addZoneForm">    
					<div class="row">
  
				 <div class="col-md-6"> 
					<div class="user-location" >
					<div id="grid_number" class="zo_left" data-gridid=""><span>GRID NUMBER: </span><span id="grididtextnumber"></span></div>     
					
					<div class="select-box assign-zone-select">
					<label for="colFormLabelSm" class="zone-type-label-1">ZONE TYPE</label>
                    <select id="zonetype" name="zonetype" >
					<option disabled="" value="" selected="" > Select Zone Type </option>
					<option  value="COMMON SPACE"  >COMMON SPACE</option>
					<option  value="DISPLAY SPACE"  >DISPLAY SPACE</option>
					<option  value="UNUSED SPACE"  >UNUSED SPACE</option>
					
					</select>
					</div>
					</div>
					</div>   
				 <div class="col-md-6"> 
				 <div class="col-md-3 zone-inlistinsg"> <label for="colFormLabelSm" class="zone-type-label-2">ZONE NAME</label></div>
<div class="selecteduser">
<div class="bottom-button-section">   
 <div class="select-zone-name">   
 <select  id="zone" name="zone" class="">
<option disabled="" value="" selected=""> Select Zone Name </option>


 

</select> 
   </div>
    <button id="addZone" type="submit"  class="  btn-success">UPDATE</button>

</div> </div> 
</div>
                                    
                                            
</div>
</form>    					</div>  
                    <div class="zone-info zone-info-grid">
                    
<div class="demo1">
 	
<div class="container" id="container-4" >
 
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
		  
		$('#grid_number').find('#grididtextnumber').text(temp);
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
 
 
     

</div>	
                       
                    </div>  
                </div>          

                <div class="col-md-3 right-text zone-assign-grid-right zone-assign-grids">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!--<li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li>--> 
				                <li class=""><a data-toggle="tab" id="mainmenu_zone" href="#menu1">MAIN MENU</a></li>
				                <li class="active"><a data-toggle="tab" href="#menu1">ASSIGN ZONES</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                
                                <div class="tab-content">
								<select name="floor_plan" id="selectFloorPlan">
								<option  selected  value='' >Select Floor Plan</option>
                                                                <?php foreach($floor_plans as $floor_plan){ ?>
                                                                    <option value='<?php echo $floor_plan['floor_plan_id']; ?>'><?php echo $floor_plan['floor_plan_name']; ?></option>
                                                                <?php }  ?>
								</select>



<?php if(!empty($floor_plans)){ ?>
<h5 class="sucess">CURRENT ZONE ASSIGNMENTS</h5>
<?php } ?>
<div class="inner-nearme">
<div class="select-box">
<?php if(!empty($floor_plans)){ ?>


<table class="table table-striped">
<thead>
<tr>
<th>GRID</th>
<th>ZONE TYPE</th>
<th>ZONE NAME</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody id="tblerows" >


 
    

</tbody>
</table>

<?php }else{ ?>

<b><p style="color:red !important;">THERE ARE NO FLOOR PLANS.</p></b>
<p>ADD A FLOOR PLAN FIRST, </p>
<p>CLICK CONFIG PAGE, CLICK FLOOR PLANS.</p>

<?php } ?>

<table>
<tbody id="tblerowsclone" style="display:none;" >



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
		   <a href='#' class='gridbox' style='color:black;' id='get_$alpha[$i]$p'>";
	           echo $text;	    
		   echo "</a></td> \n";
                   echo "<td id='type".$text."' style='padding:4px'>Unused</td> \n";
                   echo "<td id='zname".$text."' style='padding:4px'>NOT AVAILABLE</td> \n";
                   echo "<td id='edit".$text."' data-grid='".$text."' class='edit_grid' style='padding:4px'>ADD</td>  \n";
                    
        
        
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
                            <div class="form-submit"> 					
                                <input type="button" value="RESET ALL GRIDS TO UNUSED" class="removeall" name="back" id="btn5resetall">
                                <input type="button" value="Done" class="action-btn" id="tolistpage" name="submit" >
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


 <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  

    </div>
   
</div>
                                <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> ZONE ASSIGN <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO FLOOR PLAN SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span>
                                 </div>								
                                   </div> 									

                                </div>




                                <div id="myModal2" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> ZONE ASSIGN CLEAR <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO FLOOR PLAN SELECTED.</p>
                                        <p>USE THE SELECT BOX ON THE RIGHT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span>
                                 </div>								
                                   </div> 									

                                </div>


  
<script>

$(document).ready(function(){


	$("#zonetype option").each(function(){
	
	let txt = $(this).text();
	//(txt.length);
	if(!txt.length){
	$(this).remove();
	}
		
	});
	
	
	$("#zonetype").change(function(){
	
	let zonetype = $(this).val();
	if(zonetype=="UNUSED SPACE"){
	$('#zone').prop('selectedIndex',0);
	$("#zone").attr("disabled","disabled");
	//$("#zone").val('');
	
	}else{
	$("#zone").removeAttr("disabled");
	}
	
	
	
	});
	
	
	
//$("body").on('click','#btn5resetall',function(){
 $("body").on('click','#btn5resetall',function(){


     let floor_plan = $("#selectFloorPlan option:selected").val();
     

if(floor_plan.length==0){

	   var modal = document.getElementById("myModal2");
				var span = document.getElementsByClassName("close")[0];
				modal.style.display = "block";
				span.onclick = function() {
				  modal.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
	   }



}else{



            $.ajax({
                method: "POST",
                url: "<?php echo base_url();?>zone/clearAllAssignments/"+floor_plan,
                // data: { name: "John", location: "Boston" },
                success:function(data) {
                    
                  //  $("#tblerows").empty();
                 // $("#tblerows").append(tableappend);
                  		var html = $('#tblerowsclone').html();
		console.log(html);
		$("#tblerows").html(html);
                    
                    
                }
            });




}





});	
	
	


function getAssignData(floor){
    // let zone_id = $(this).val()    ;
     let floor_plan = floor;   
       $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>zone/getGridsForFloorZones/'+floor_plan,
           data:'',
           success: function(data3)
           {
           
	
		$("#tblerows").empty();		
 		var table = JSON.parse(data3);
 		var tableloop = table.response;
 		if(tableloop.length){
 		var tableappend = "";		
 		for(var i = 0; i < tableloop.length; i++) {
    		var obj = tableloop[i];
    		//console.log(obj);
    		tableappend = tableappend +  "<tr>  <td class='gridboxtd'><a id='get_"+obj.grid_id+"' style='color:black;' 		href='#'>"+obj.grid_id+"</a></td> <td id='type'style='padding:4px' >"+obj.zone_type+"</td> <td id='zname'>"+obj.zone_name+"</td>  <td id='edit'  data-grid='"+obj.grid_id+"' style='padding:4px' class='edit_grid'></td> </tr>";
    
    
		}

		$("#tblerows").append(tableappend);
		//$("#tblerows").css("display","block");	
	
		}else{
		var html = $('#tblerowsclone').html();
		console.log(html);
		$("#tblerows").html(html);
		
		}	
	               
           }
         });





}




$("body").on('click','#mainmenu_zone',function(){
    
             $.fancybox.getInstance('close');
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>zone/showallzones",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });   
    
});


$("#selectFloorPlan").change(function(){
	
let floor_plan = $(this).val();
$.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>floor/getFloorPlanCoordData/'+floor_plan,
           data:'',
           success: function(data)
           {
			   
			   var data = JSON.parse(data);
               console.log(data.response); // show response from the php script.
			   let urlimg  = '<?php echo base_url(); ?>assets/floor_plan/'+data.response.image;
			   let coordinates = data.response.coordinates;
			   let axis  =  coordinates.split(',');
			   let height = axis[0];
			   let width = axis[1];
			   $(".table1").css("background-image", "url("+urlimg+")");
			   $(".table1").css("background-size", height+"px");
			   	   
	   $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>zone/getFloorPlanZones/'+floor_plan,
           data:'',
           success: function(data2)
           {
	
	$("#zone").empty();		   
	$("#zone").html(data2);
	$("#zone option").each(function(){
	
	let txt = $(this).text();
	//alert(txt.length);
	if(!txt.length){
	$(this).remove();
	}
		
	});
	getAssignData(floor_plan);
               
           }
         });
         
         
                         
               
           }
         });	

});




//$(".table1").css("background-image", "url('<?php echo base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;?>')");
$(".table1").css("background-repeat", "no-repeat");
//$(".table1").css("background-size", "<?php echo $floor_plan_drop_point[0]?>px <?php echo $floor_plan_drop_point[1]?>px");
$(".table1").css("background-position", "left bottom");
// });



$.validator.setDefaults({
submitHandler: function() {             
let grid= $("#grid_number").attr("data-gridid");
let zone_id= $("#zone option:selected").val();
let zone_name= $("#zone option:selected").text();
let zonetype = $("#zonetype option:selected").val();
let floor = $("#selectFloorPlan option:selected").val();

 if(floor==''){
	 
	                var modal = document.getElementById("myModal1");
				var span = document.getElementsByClassName("close")[0];
				modal.style.display = "block";
				span.onclick = function() {
				  modal.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
 }else{
	
$.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>zone/saveZoneMapping',
           data:'grid='+grid+'&zone_id='+zone_id+'&floor_id='+floor+'&zone_type='+zonetype+'&zone_name='+zone_name,
           success: function(data)
           {
              // alert(data); // show response from the php script.
               let grid = $("#grid_number").attr("data-gridid");
               let zone_type = $("#zonetype").val();
               let zone_name = $("#zone option:selected").text();
                $("#type"+grid).text(zone_type);
                $("#zname"+grid).text(zone_name);
              
               
           }
         });	
	 
 }



		 
		 
		 
                   
 }
}); 
 
 
 $("body").on('click','#toHome',function(){
 $.fancybox.getInstance('close');
 });
 
 
$("#addZoneForm").validate({
			rules: {
				zonetype: "required",
				zone: "required"
			},
                        errorPlacement: function(){
                               return false;
                         }
}); 
 
 
 
    
$("body").on("click",".remove",function(){

let grid_map_id = $(this).attr("id");
//+alert(grid_map_id);
$("#"+grid_map_id).closest("tr").empty();
  
});    


$("body").on('click','.edit_grid',function(){
    
   let grid = $(this).attr("data-grid");
   $('#grid_number').html('<span>GRID NUMBER: </span>'+ grid);
   $("#grid_number").attr("data-gridid",grid);
   $('.gridboxtd').removeClass('myclass')
   $(".action_"+grid).addClass("myclass");
   $('.edit_grid input').remove();
   $(this).append('<input type="checkbox" checked />');
   
    
});


$("body").on('click','#tolistpage',function(){
   
                $.fancybox.getInstance('close');
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>zone/showallzones",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
    
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

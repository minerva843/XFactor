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
	height: <?php echo $floor_plan_drop_point[1].'px';?>!important;
	width : <?php echo $floor_plan_drop_point[0].'px';?>!important;
	<?php }else{?>
	height: 100px!important;
	width : 150px!important;
	<?php }?>
	bottom: 0px;
	left: 1px;
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
    height: 450px;
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

</style>

<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
					<h2>FLOOR PLANS (EDIT)</h2>
			   
			  
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btnfloorstep2"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">
            <div class="row">
			
                <div class="col-md-9">  
				<p style="text-align:center"> <!--SIMPLY MOVE THE RED DOT TO INTENDED POINT. --></p>
				<?php  //print_r($zone); ?>
                    
                    <div class="zone-info zone-info-grid floor-palnadd-grid floor-plans-add-sucess">
                        
<div class="demo1">
 	<?php if(!empty($data->floor_plan_drop_point)){?>
	<?php  
	$y=$floor_plan_drop_point[1]/2;
	$x=$floor_plan_drop_point[0]/2; 
	$yy=760-$y;
	?>
	
	<?php }else{  $y=50;$x=75;  }?>
	<!--div id="draggable1" style="position: absolute;background: red; color: red;border-radius: 50%;cursor: pointer;top: 0px;left: 1250px;z-index: 11;" class="ui-widget-content" ></div-->
	
<div class="container floor-img-edit" id="container-4" >
<!--img id="demo-4" class="blah rect " src="<?php echo base_url().'assets/floor_plan/'.$FloorData->file_name.$FloorData->file_type;?>" alt="your image"--> 
    
	<div id="item" class="red_dots" style="touch-action: none; user-select: none; position: absolute; top: 0px;left: 1250px;z-index: 11;">
							</div>
	<img id="demo-4" class="blah1 rect1" src="<?php echo base_url().'assets/floor_plan/'.$data->file_name.$data->file_type;?>" alt="your image">
</div>


 
 

</div>	
                       
                    </div>  
                </div>       

                <div class="col-md-3 right-text">
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
                            <div class="table_info floor-step floorplan-gridsucess">
							<div class="current-status">
						      <div class="view-floor-select">
                               <p class="current-status-1"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;" >
							   <?php echo $data->floor_plan_name;?> </span></p>
							  
							   </div>
							                           </div>
							   <div class="table_info-curl">
							   <div class="display-step-status">
							   <h5>STEP 2 OF 2</h5>
                                 <!--<p>PLOT THE DROP IN POINT FOR YOUR GUESTS.</p>-->
								<p> DROP IN POINT OF USER WILL BE TOP RIGHT OF FLOOR PLAN, WHERE THE RED DOT IS DISPLAYED.</P>
						   <p>WHEN DONE, CLICK NEXT.</p>
						   </div>
						   </div>
                    </div>
					<div class="form-submit"> 					
                                <a class="action-btn backbtn" id="btn5" >Back</a> 
								<input type="submit" value="NEXT" class="action-btn" id="toHome">
                            </div>
                </div>



            </div>
        </div>

 <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

    </div>
   
</div>
<script type="text/javascript">
        // $("#btnPrint").live("click", function () {
            // var divContents = $("#dvContainer").html();
            // var printWindow = window.open('', '', 'height=400,width=800');
            // printWindow.document.write('<html><head><title>DIV Contents</title>');
            // printWindow.document.write('</head><body >');
            // printWindow.document.write(divContents);
            // printWindow.document.write('</body></html>');
            // printWindow.document.close();
            // printWindow.print();
        // });
    </script>
<script>
$(document).ready(function(){
	
	$('body').on('click', '#close-btnfloorstep2', function () {
            $.fancybox.close(); 
            window.location.href = "<?php echo base_url(); ?>floor/deleteJunkRecord/<?php echo $id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/Edit/2";

});
	
	$("body").on('click','.backbtn',function(){
           $.fancybox.getInstance('close');
		   
		   
		   		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>floor/editStep1FloorPlans<?php if(isset($data->id)){  echo '/'.$data->id; }?>",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
		   
		   
       /*     $.fancybox.open({
                src: "<?=base_url();?>floor/editStep1FloorPlans<?php if(isset($data->id)){  echo '/'.$data->id; }?>",
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
            }); */
			
			
			
			
            
        });
		
     $("body").on('click','#toHome',function(){
           $.fancybox.getInstance('close');
           
          
          
          
          		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>floor/floorPlanEditScuccessfull<?php if(isset($data->id)){  echo '/'.$data->id; }?>",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
           
           
 
            
            
            
            
            
        });
 });
 
 
	var $demo4 = $('#demo-4');
	$demo4.clayfy({
		container : '#container-4',
		minSize : [100,100],
		maxSize : [902,414],
		
		callbacks : { 
			resize : function(){
				
				
			}
		}
	});
	
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
  

<style>
    .fancybox-close-small{
        
        display:none !important;
    }
    .error{
        color:red !important;
    }
</style>

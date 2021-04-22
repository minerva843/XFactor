
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
					<h2>FLOOR PLANS (ADD)</h2>
			   
			  
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn3"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">
            <div class="row">
			
                <div class="col-md-9">  
				<p style="text-align:center"> DROP IN POINT OF USER WILL BE TOP RIGHT OF FLOOR PLAN, WHERE THE RED DOT IS DISPLAYED.</p>
				<?php  //print_r($zone); ?>
                    
                    <div class="zone-info zone-info-grid floor-palnadd-grid">
                        
<div class="demo1">
 	<?php if(!empty($data->floor_plan_drop_point)){?>
	<?php  
 
	$y=$floor_plan_drop_point[1]/2;
	$x=$floor_plan_drop_point[0]/2;
	$yy=760-$y;


	?>           
	
	<?php }else{  $y=50;$x=75;  }?>
	<!--div id="draggable1" style="position: absolute;background: red; color: red;border-radius: 50%;cursor: pointer;top: 0px;left: 1250px;" class="ui-widget-content" >1</div-->
	
<div class="container floor-img-edit" id="container-4">
 
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
                               <p class="current-status-1 current-bold">CURRENTLY SELECTED : <span style="color:black;font-size: 14px;" >
							   FLOOR PLAN (ADD) </span></p>
							   </div>
							   </div>
							   <div class="table_info-curl">
							   <div class="display-step-status">
							   <h5>STEP 3 OF 3</h5>
                                <p>DROP IN POINT OF USER WILL BE TOP RIGHT OF FLOOR PLAN, WHERE THE RED DOT IS DISPLAYED.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
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

  $("body").on('click','#close-btn3',function(){

 window.location.href = "<?php echo base_url(); ?>floor/deleteJunkRecord/<?php echo $data->id; ?>/<?php echo $group_id; ?>/<?php echo $project_select; ?>/ADD/2";
 
 
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
        src         : '<?php echo base_url(); ?>floor/floorGrid/<?php echo $data->id;?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
    });
		
		
     
			
            
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
        src         : '<?=base_url();?>floor/viewAddFloorPlansSuccessful/<?php if(isset($data->id)){  echo '/'.$data->id; }?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
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

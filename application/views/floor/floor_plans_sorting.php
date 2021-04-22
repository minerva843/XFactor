<style>
	tr{
		cursor: pointer;
	}
	option{
	padding-bottom: 15px;
    padding-top: 15px;
	}
	.current_tr{
		background-color:gray!important;
	}
</style>
<style>
.fancybox-close-small{
	display:none!important;
}
</style>
 <style>
	.activebtn{
		background: #00b050!important;
		color: #fff !important;
	}    

</style>
<?php 
$rand=rand(1000,999999);
$rightsiderand=rand(1000,999999);

?>
<div class="main-section floor_steps" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>FLOOR PLANS <span id="actiontopText"style="font-size:18px;" ></span> </h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
                     <div class="master-floorplan">
                    <div class="floor-sec"> 
						<div class="tab-listing">
							<div class="row master-filters"> 
						   <div class="col-md-2">
						   <select class="dropdown" id="selectFloor">
							<option value="">SHOW ALL FLOOR PLANS</option>
							<option value="project_not_completed">SHOW PROJECTS NOT COMPLETED</option>
							<option value="project_completed">SHOW PROJECTS COMPLETED</option>
						  </select>
						  </div>  
						  <div class="col-md-3"><!--button class="src-btn2" >SEARCH</button--><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option> 
							<option value="floor_plan_A-Z">Floor plan name (A-Z)</option>
							<!--option value="project_A-Z">Project name (A-Z)</option>
							<option value="project_latest">Project start (latest start)</option>
							<option value="project_earliest">Project start (earliest start)</option>
							<option value="grid_smallest">Grid type (smallest first)</option-->
							<option value="latest_created_floor">Created (latest first)</option>
							<option value="earliest_created_floor">Created (earliest first)</option>
							<option value="latest_edit_floor">last edited (latest first)</option>
							<option value="earliest_edit_floor">last edited (earliest first)</option>
						  </select>
							</div> 
							
							<div class="col-md-1"><button class="src-btn1" id="Addfloor">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1  coledit" id="editAction" >EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 deleteAction" id="deleteAction">DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div>
						  </div>

				<div class="floor-table floor-sorting_list floor-list-shorting">    
					<P>All floor plans are listed Below:</P>
					<div class="search-results"> <p class="search_result"></p></div>
						<div class="table-cont">
						<form method="post" id="floor_form">
						
						 <div class="table-fixed-class">
                                                <table style="margin-top: -40px;">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9;">
                                                    <td id="first-td">&nbsp;&nbsp;</td>
													<td>LAST EDIT</td>
													<td>FLOOR PLAN ID</td>
													<td>FLOOR PLAN NAME</td>
													
													<td>SCALE</td>
													<td>GUEST DROP IN POINT</td>
													<td>PROJECT NAME</td>
													<td></td>
                                                        </tr>   
                                                    </thead>
                                                </table>      
                                            </div>  
						
						
						<div class="project-scroll">   
							<table id="allFloo">   
						<thead>
							<tr class="table-title" style="background:#d9d9d9; display:none; margin-top: 35px;">   
								<td id="first-td">&nbsp;&nbsp;</td>
								<td>LAST EDIT</td>
								<td>FLOOR PLAN ID</td>
								<td>FLOOR PLAN NAME</td>
								     
								<td>SCALE</td>
								<td>GUEST DROP IN POINT</td>
								<td>PROJECT NAME</td>   
								<td></td>
							</tr>
						</thead>
						<tbody id="AllDataFloor<?=$rand?>"></tbody>
					</table>
					</div>    
					</form>
						</div> 
						</div>
<script>
$(document).ready(function(){

  $(".SER").on("keyup", function() {
      
      if($(this).val().length>=1){
          $('.search_result').show();
	  $('.search_result').html('SEARCH RESULTS :'); 
      }else{
        $('.search_result').hide();  
      }
      
	
  });
  
  
  
  
                                          $("#editAction").click(function () {
currentid="";
                                           $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#deleteAction").removeClass("activebtn");
											$("#currentlyViewing").css("display","none");
                                            $(this).toggleClass("activebtn");
                                            $('.deletClass').hide();
                                             $('.form-submit').show();
                                             $(".form-submit-btn").toggleClass('hide');
                                            if($(this).hasClass('activebtn')){

                                            
											 $("#actiontopText").show();
						                     $('.form-submit-btn').removeClass('hide');
                                                 $("#actiontopText").text(" (EDIT) ");
                                                 $("#currentlyViewing").css("display","contents !important");
												 let txt = $(".textprojectname").text();
												console.log(txt);
												$("#ViewSingleData<?=$rightsiderand;?>").find('#multipleprojectselect').text(txt);
                                                 
                                                 
                                                 
                                            }else{
												
												
											 $("#actiontopText").hide();
                                                //$("#currentlyViewing").css("display","contents");
												 $("#ViewSingleData<?=$rightsiderand;?>").find('#currentlyViewing').css("display", "none");
												 
												  $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												  
                                            }
                                             
                                        });
										

									$("#deleteAction").click(function () {
                                             
                                        											//alert("delete");
                                            $("#editAction").removeClass("activebtn");
											$('.form-submit').show();
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');
											 $('.rightcheck').css("display","none");
                                            $(this).toggleClass("activebtn");
                                            
                                            if($(this).hasClass('activebtn')){
											 
											    
											 	 $(".form-submit-btn").removeClass('hide');
												 $('.deletClass').show();
                                                 $(".deletClass").removeClass('hide');
                                                 $("#actiontopText").show();
                                                 $("#actiontopText").text(" (DELETE) ");
												// $("#currentlyViewing").css("display","none");
												$("#ViewSingleData<?=$rightsiderand;?>").find('#currentlyViewing').css("display", "contents");
												
												
												
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
                                                  }else{
											
											      $("#ViewSingleData<?=$rightsiderand;?>").find("#multipleprojectselect").text("NO FLOOR PLAN SELECTED");
												  $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO FLOOR SELECTED</p>');
												  	
										            }
												
												
                                                 
                                                 
                                            }else{
												 
												  $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleData<?=$rightsiderand;?>").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleData<?=$rightsiderand;?>").find('#multipleprojectselect').text(txt);
												$("#ViewSingleData<?=$rightsiderand;?>").find('#currentlyViewing').css("display", "none");
												
												
														 var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
						    $("#ViewSingleData<?=$rightsiderand;?>").find("#multipleprojectselect").text("NO FLOOR PLAN SELECTED");
						   } 
												 
						   }
                                          
                                        });
  
  
  
  
  
  
  
  
});
</script>

<script>

    $(document).ready(function () {
	 $('.closeeditgroup').click(function() {
                                            var modal = document.getElementById("myModal23delete");
                                            modal.style.display = "none";

                                            var modal2 = document.getElementById("myModal1edit");
                                            modal2.style.display = "none";
                                        });
		$("body").on('click','#deleteAll',function(){
          
           $.fancybox.getInstance('close');
           
           
                              		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>floor/deleteAllFloorPlans',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
           
           
           
           
  
            
            
            
            
             
        });
       
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
location.reload();
        });
		
	
		
		
		
		$("body").on('click','#Addfloor',function(){
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>floor/addStep1FloorPlans",
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
						
<script type="text/javascript">



$("#submitbtn").click(function() {
	
	
	
	
	if($("#editAction").hasClass('activebtn')){
		
			   if(currentid != ''){
				$.fancybox.getInstance('close');
				
				
		$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>floor/editStep1FloorPlans/'+currentid,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });
				

		   }else{
			   var modal = document.getElementById("myModal1edit");
				var span = document.getElementsByClassName("closeedit")[0];
				modal.style.display = "block";
				span.onclick = function() {
				  modal.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
		   }
		
		
		
		
	
	}else{
		
		 var val = [];
                                        $('.deletClas:checked').each(function (i) {
                                            val[i] = $(this).val();
                                        });
		
		if (val == '') {
                                            var modal = document.getElementById("myModal23delete");
                                            var span = document.getElementsByClassName("closedelete")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
                                        }else{
											
	var url="<?=base_url();?>floor/floorsingledelete";
	$.ajax({  
		type: "POST",
		url: url, 
		data: {delval:val},
		success: function(data)
		{ 
			
			$.fancybox.getInstance('close');
			
			
		       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>floor/floorplansingledelete",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });	
			
			

            
            
                    
            
		}
	});
											
										}
		

	}
});



                                    function check_multiple_select() {
                                        var val2 = [];

                                        $('.deletClas:checked').each(function () {
                                            val2.push($('.deletClas:checked').val());
                                        });

                                        if (val2.length > 1) {
                                            var val22 = val2.length + 1;
                                        }

                                        console.log(val2.length);
                                        if (val2.length > 1) {
                                            $('#currentlyViewing').css("display", "contents !important");
                                            $("#ViewSingleData<?=$rightsiderand;?>").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData<?=$rightsiderand;?>").find("#currentlyViewing").css("display","contents");
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-project");
											$("#ViewSingleData<?=$rightsiderand;?>").find('#multipleprojectselect').text(pr);
                                        });
												
												
												
										}else {
                                          //  $('#currentlyViewing').css("display", "none !important");
										  
										  
										  
										  			 var val23 = [];

                                        $('.deletClas:checked').each(function () {
                                            val23.push($('.deletClas:checked').val());
                                        });

                                        if (val23.length) {
                                            var val22 = val2.length + 1;
                                        }else{
											
											
											 if($("#deleteAction").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData<?=$rightsiderand;?>").find("#multipleprojectselect").text("NO FLOOR PLAN SELECTED");
 
                                               }else{
						//alert();
                                               $("#currentlyViewing").css("visibility","hidden");
                                               }
											 
										}

                                        }
                                          
                                        
                                    }




	reply_click();
	var currentid='';
	function reply_click(clicked_id)
	 {
	/*	 let  val2 = [];
	$('.deletClas:checked').each(function(i){
	  val2[i] = $(this).val();
	});*/
		  //if((val2.length+1) > 1){
      //     alert(val2.length);
          //$('#ViewSingleData<?=$rightsiderand;?>').html('<tr><td colspan="2" class="top-fp"><p><span>CURRENTLY SELECTED:</span>MULTIPLE Floor PLANS </p></td></tr>');

           //}else{
			   
			  $.ajax({
			   url:"<?=base_url();?>floor/searchSingleData",
			   method:"GET", 
			   data:{clicked_id:clicked_id}, 
			   success:function(data<?=$rightsiderand;?>)
			   {
				//console.log(data);
				$('#ViewSingleData<?=$rightsiderand;?>').empty();
				$('#ViewSingleData<?=$rightsiderand;?>').html(data<?=$rightsiderand;?>);
				check_multiple_select();
				
				if($("#deleteAction").hasClass('activebtn')){                                                 
                                                 $("#currentlyViewing").css("display","contents");
 
                                               }else{
						//alert();
                                               // $("#currentlyViewing").remove();
                }
				
				
				
				                  
				
				
				
			   } 
			  });
		   //}
	  currentid= clicked_id;
	
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);
	  // if(typeof currentid!=='undefined'){
		// $('.floor_edit').addClass( "activebtn" );
	  // }
	 }
	 
	/* $("body").on('click','.floor_edit',function(){
          //$('.coledit').toggle();
	$('.coledit').toggleClass( "activebtn" );
	$('.deleteAction').removeClass( "activebtn" );
          $('.deletClass').hide();
	$('.form-submit').hide();
		   if(currentid != ''){
				 $.fancybox.getInstance('close');
				$.fancybox.open({
                src: '<?=base_url();?>floor/editStep1FloorPlans/'+currentid,
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
				
            
		   }else{
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
		   }
            
        });  */
	 
</script>
	
<script>
$(document).ready(function(){
$('.deletClass').hide();
	$('.form-submit').hide();
 load_data();
 $(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
$("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
//$("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p><span>CURRENTLY SELECTED:</span> NO PROJECT SELECTED</p>');
var Allsearch= $(this).val();
var selectData = $('#selectData').val();
// $("#editProject").removeClass("activebtn");
// $("#deleteProjects").removeClass("activebtn");
// $("#actiontopText").hide();
// $('.deletClass').hide();
// $('.form-submit').hide();
// $('.deletClas:checked').removeAttr('checked');
// $(".deletClass").removeClass('hide');
var selectShortBy = $('#selectShortBy').val();
load_data(selectData, selectShortBy,Allsearch);
                                        
	});
  $('#selectFloor').change(function(){
	  $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p class="current-bold"><span>CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
	  var Allsearch= $('.SER').val();
  var floor_plan = $('#selectFloor').val();
  var floor_shortby = $('#selectShortBy').val();
  load_data(floor_plan,floor_shortby,Allsearch);
 });
 
 $('#selectShortBy').change(function(){
	 $("#ViewSingleData<?=$rightsiderand;?>").empty().html('<p class="current-bold"><span class="current-bold">CURRENTLY SELECTED : </span> NO FLOOR PLAN SELECTED</p>');
	 var Allsearch= $('.SER').val();
	var floor_plan = $('#selectFloor').val();
  var floor_shortby = $('#selectShortBy').val();
  load_data(floor_plan,floor_shortby,Allsearch);
 });
 
 function load_data(floor_plan='',floor_shortby='',Allsearch='')
 {
	
  $.ajax({
   url:"<?=base_url();?>floor/search",
   method:"POST", 
   data:{floor_plan:floor_plan,floor_shortby:floor_shortby,AllSearchData:Allsearch,project:<?php echo $project_select; ?>},
   success:function(data)
   {
	console.log(data);
    $('#AllDataFloor<?=$rand?>').html(data);
   } 
  })
 }
 
});
</script>

					</div>
						</div>
					</div>
                </div>

                <div class="col-md-3 right-text master-floor-left floor_plan_edit">   
                    <div class="tab right-tabs">

                        <div class="table-content">	 
<ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				               
                            </ul>
						<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							                            <div class="table_info">
                                
                                 <table id="ViewSingleData<?=$rightsiderand;?>">
								</table> 
                                
                            </div>
							
							</div>
							</div>

                            <div class="form-submit delete-sorting" style="display:none;"> 
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  
		

      
    </div>

</div>



	<div id="myModal23delete" class="modal delete-sorting floor-popup">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-body">
    <h4>FLOOR PLAN (DELETE) <span style="color:red">NOT SUCCESSFUL</span></h4>
    <p>NO ENTRIES SELECTED.</p>
    <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>  
  </div>
      
  <div class="modal-footer text-right"> <span class="close closedelete closeeditgroup">OK</span> </div>
 </div>
</div>
<div id="myModal1edit" class="modal delete-sorting floor-popup">
     
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
   <!-- <h4><span style="color:red ;font-weight:bold;"> PLEASE SELECT A FLOOR PLAN FIRST.</span></h4>-->
	  <h4>FLOOR PLAN (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

     <p>NO ENTRY SELECTED.</p>
      <p>Please select an entry first to EDIT.</p>   
	
    <!--p style="text-align:center">NO ENTRIES SELECTED.</p>
    <p style="text-align:center">USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p-->
	
</div>  	
   
<div class="modal-footer text-right"><span class="close closeedit closeeditgroup">OK</span></div>
  </div> 
</div>




<style>

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 15%; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 6px;
  border: 3px solid bllack;
  width: 28%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
 
</style>

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }
</style>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <style>
	.activebtn{
		background: #00b050!important;
		color: #fff !important;
	}

</style>
  <div class="main-section fancybox-content" id="floor-sort" style="display: inline-block;"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>TAKE A LOOK AROUND, CONTENT SET <span id="actiontopText"style="font-size:18px;" ></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body content-set-info-main">
            <div class="row">
                <div class="col-md-9">
				<div class="master-floorplan">
                    <div class="floor-sec"> 
						<div class="tab-listing">
							<div class="row master-filters"> 
						   <div class="col-md-2">
						   <select class="dropdown" name="content_set_aasign" id="selectData">
							<option value="assigned_only">SHOW ASSIGNED ONLY</option>
							<option value="unassigned_only">SHOW UNASSIGNED ONLY</option>							
						  </select>
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="name_asc">CONTENT SET NAME (A-Z)</option>
							<option value="zone_type_asc">ZONE TYPE</option>
							<option value="zone_asc">ZONE NAME (A-Z)</option>
							<option value="floor_plan_az">FLOOR PLAN NAME (A-Z)</option>
							<!--option value="project_asc">PROJECT NAME (A-Z)</option>
							<option value="latest_created_project">PROJECT START (LATEST FIRST)</option>
							<option value="project_earliest">PROJECT START (EARLIEST FIRST)</option-->
							<option value="latest">CREATED (LATEST FIRST)</option>
							<option value="earliest_created">CREATED (EARLIEST FIRST)</option>
							<option value="latest_edit">LAST EDITED (LATEST FIRST)</option>
							<option value="earliest_edit">LAST EDITED (EARLIEST FIRST)</option>
						  </select>
							</div> 
	
							<div class="col-md-1"><button class="src-btn1"  id="AddContent">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1 floor_edit coledit"  id="editAction" >EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 " id="delete_content" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div>
						  </div>
							    
					<div class="floor-table project-table  project-table-listing">
					<p>ALL TAKE A LOOK AROUND, CONTENT SETS ARE LISTED BELOW :</p><br>
					<div class="search-results"> <p class="search_result"></p></div>
						<div class="table-cont take_a_look">
						<form method="post" id="floor_form">
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>LAST EDIT</td>
								<td>CONTENT SET ID </td>
								<td>CONTENT SET NAME</td>
								<td>TOTAL VIDEOS </td> 
								<td>ASSIGNED ZONE</td>
								<td>ASSIGNED ZONE TYPE</td>
								<td>FLOOR PLAN NAME</td>
								<td>&nbsp;&nbsp;PROJECT NAME</td>
								 
						<td id="last-td"></td>
						</tr>
						</thead>
						</table>      
						</div>   
						 
						<div class="project-scroll">    
							<table>
						<thead>     
							<tr class="table-title" style="background:#d9d9d9; display:none; margin-top: 35px;">  
                                                            <td class=" ">&nbsp;&nbsp;&nbsp;</td>
								<td>LAST EDIT</td>
								<td>CONTENT SET ID </td>
								<td>CONTENT SET NAME</td>
								<td>TOTAL VIDEOS </td> 
								<td>ASSIGNED ZONE</td>
								<td>ASSIGNED ZONE TYPE</td>
								<td>FLOOR PLAN NAME</td> 
								<td>&nbsp;&nbsp;PROJECT NAME</td>
																
								<td class=" ">&nbsp;&nbsp;</td>
							</tr>
						</thead>
						<tbody id="AllData">
 
                                                         
                                                </tbody>
					</table>
					</div>
					</form>
						</div> 
						</div>
                                <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> CONTENT SET (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span> </div>								
                                   </div> 									

                                </div>

                                <div id="myModal2" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> CONTENT SET (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span> </div>								
                                   </div> 									

                                </div>
<script>
$(document).ready(function(){
 $('.close').click(function(){
			$('#myModal1').hide();
			$('#myModal2').hide();
		// var modal = document.getElementById("myModal1");
		  // modal.style.display = "none";
	})
  $(".SER").on("keyup", function() {
      
      if($(this).val().length>=1){
          $('.search_result').show();
	  $('.search_result').html('SEARCH RESULTS :'); 
      }else{
        $('.search_result').hide();  
      }
      
	  if ($(this).val().length >= 0){
	
    var value = $(this).val().toLowerCase();
    $("#AllData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
	  }else{
		// $('.search_result').hide();
	  }
  });
  
  
  
   /*$(".SER").on("keyup", function () {
                                             
                                        //$("#AllData").empty();
$("#ViewSingleData").empty().html('<p><span>CURRENTLY SELECTED:</span> NO CONTENT SELECTED</p>');

var Allsearch= $(this).val();

  load_data(selectData,selectShortBy);
$("#editAction").removeClass("activebtn");
$("#delete_content").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide(); 
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
 
                                        
	});*/
  
  
  
  
 
  
});
</script>
<script>
		
$(document).ready(function () {  



  	$("body").on('click','#AddContent',function(){
        $.fancybox.getInstance('close');  
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Content/addNew",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
         clickOutside: false
        
    });
           
            
        });  







      
$("body").on('click','.view',function(){

let id = $(this).attr("id");
 
		    
		  $.ajax({
		   url:"<?=base_url();?>content/getDataById",
		   method:"POST", 
		   data:{id:id}, 
		   success:function(data)
		   {
			$('#ViewSingleData').html(data);
			
			
			                check_multiple_select();
                
                
                  if($("#delete_content").hasClass('activebtn')){                                                 
                        $("#currentlyViewing").css("display","contents");
 
                         }else{
			
                      //  $("#currentlyViewing").remove();
                }
			
			
			
		   } 
		  });
		   
	  currentid= id;
	  $("#editAction").attr("data-id",currentid);
          $("#delete_content").attr("data-id",currentid);
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);

 
  /*
 	$("body").on('click','#edit',function(){ 
	$('.coledit').toggleClass( "activebtn" );
	$('.deleteAction').removeClass( "activebtn" );
          $('.deletClass').hide();
	$('.form-submit').hide();
	
          let id = $(this).attr("data-id");
          
          if(id){
            $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>content/edit/'+id,
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

        }); */


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
                                            $("#ViewSingleData").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData").find("#currentlyViewing").show();
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-project");
											$("#ViewSingleData").find('#multipleprojectselect').text(pr);
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
											
											
											                 if($("#delete_content").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SET SELECTED");
 
                                               }else{
						//alert();
                                               $("#currentlyViewing").css("display","none");
                                               }
											 
										}

                                        }
											
										
                                    }
         
 
       
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();

        });
		
 
 
    }); 

</script>
						
<script type="text/javascript">

                                        $("#editAction").click(function () {

                                            //$("#delete_zone").removeClass("activebtn");
											
											$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO CONTENT SET SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#delete_content").removeClass("activebtn");
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
												$("#ViewSingleData").find('#multipleprojectselect').text(txt);
												
                                                 
                                                 
                                                 
                                            }else{
						                          $("#actiontopText").hide();
												  $("#ViewSingleData").find('#currentlyViewing').css("display", "none");
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO CONTENT SET SELECTED</p>');
												  $('.rightcheck ').css("display","none");
                                            }
                                             
                                        });
										
										
										
										
										
										
										$("#delete_content").click(function () {
                                           
                                           $("#editAction").removeClass("activebtn");
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');											

											
                                            $(this).toggleClass("activebtn");
                                            
                                            if($(this).hasClass('activebtn')){
					                           
												   $(".form-submit-btn").removeClass('hide');
												   $('.deletClass').show();
                                                  $(".deletClass").removeClass('hide');
                                                  $("#actiontopText").show();
                                                  $("#actiontopText").text(" (DELETE) ");
												  $("#submitbtndelete").css("display","block");
												// $("#currentlyViewing").css("display","none");
												 $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
												
												
												
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
												  }else{
											$("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SET SELECTED");
											      //$("#ViewSingleData").find("#multipleprojectselect").text("NO ZONE SELECTED");
												  // $("#ViewSingleData").empty().html('<p><span>CURRENTLY SELECTED:</span> NO ZONE SELECTED</p>');
												  // $("#ViewSingleData").append('<p><span>CURRENTLY VIEWING:</span> NO ZONE SELECTED</p>');
										            }  
                                                 
                                            }else{
					                           //  $("#actiontopText").hide();
                                               //  $('.deletClass').show();
	                                           //  $("#submitbtndelete").css("display","none");
												 
												 
												 
											  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO CONTENT SET SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleData").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleData").find('#multipleprojectselect').text(txt);
												$("#ViewSingleData").find('#currentlyViewing').css("display", "none");
												
												
														 var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
										      	 $("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SET SELECTED");
										          }	 
		 
						                 }
                                          
                                        });
										
										
										




	$("body").on('click','#assign_content',function(){
          
    
      $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>content/assignContentSetZone',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           

            
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
        src         : '<?=base_url();?>content/deleteSelected',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           
                       
            
        });



$("body").on('click','#submitbtn',function(){
	
if($("#editAction").hasClass('activebtn')){	
	
          let id = $("#editAction").attr("data-id");
          
          if(id){
            $.fancybox.getInstance('close');
    
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>content/edit/'+id,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
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
	

	
}else{




var ids = [];
$('.deletClas:checked').each(function(i, e) {
    ids.push($(this).val());

});
if(ids==''){
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
		
  var strids =  ids.join(',');
 console.log(strids);     
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>content/deleteSelected",
        ajax: { 
           settings: { data : 'ids='+strids+'&project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
		                    clickSlide: false,
                    clickOutside: false
        
    });
	}
	
	
	
}
	
	
	
	
	
	
	
            
}); 

 

	reply_click();
	var currentid='';
	function reply_click(clicked_id)
	 {
		let  val2 = [];
	$('.deletClas:checked').each(function(i){
	  val2[i] = $(this).val();
	});
		  if((val2.length+1) > 1){
       
          $('#ViewSingleData').html('<tr><td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span>MULTIPLE CONTENT SETS </p></td></tr>');

           }
	  
	  
	 }
	 
 
	 
</script>
<script>

		   
 
$(document).ready(function(){
$('.deletesingle').hide();
	$('.form-submit').hide();
 load_data();
 
  $('#selectData').change(function(){
  var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  load_data(selectData,selectShortBy);
    $("#editAction").removeClass('activebtn');
  $("#delete_content").removeClass("activebtn");
 });
 
 $('#selectShortBy').change(function(){
	var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  
  $("#editAction").removeClass('activebtn');
  $("#delete_content").removeClass("activebtn");
  
  
  load_data(selectData,selectShortBy);
 });
 
 
 $(".SER").on("keyup", function () {                                      
$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO CONTENT SELECTED</p>');
var Allsearch= $(this).val();
   var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
$("#editAction").removeClass("activebtn");
$("#delete_content").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide(); 
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');

load_data(selectData, selectShortBy,Allsearch);
                                        
	});
 
 
 
 
 
 function load_data(selectData='',selectShortBy='',Allsearch='')
 {
	
  $.ajax({
   url:"<?=base_url();?>content/search",
   method:"POST", 
   data:{selectData:selectData,selectShortBy:selectShortBy,AllSearchData:Allsearch,project:<?php echo $project_select; ?>},
   success:function(data)
   {
	//console.log(data); 
    $('#AllData').html(data);
   } 
  })
 }
 
});
</script>


					</div>
						</div>
					</div>
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a data-toggle="tab" href="#menu1" id="assign_content">ASSIGN CONTENT</a></li>
				               
                            </ul>
					<div class="table_info">
					<div class="current-status">

					 
					 
					  <table id="ViewSingleData">
                                              
   
					
					</table> 
					</div>
                                
                            </div>
                            <div class="form-submit delete-sorting" id="submitbtndelete" style="display:none;"> 
								
                                <input type="button" value="Back" class="close-btn"  style="display:none;" name="back" id="btn5">
                                <input type="button" value="Next" class="action-btn " name="submit" id="submitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div> 

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 
	   

     
    </div>


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
		.activebtn{
		background: #00b050!important;
		color: #fff !important;
	}
</style>
<style>
.fancybox-close-small{
	display:none!important;
}
</style>
<div class="main-section poject-listing-QT" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>INFO ICONS <span id="actiontopText"></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body icons-listing">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
                     <div class="master-floorplan">
                    <div class="floor-sec"> 
						<div class="tab-listing">
							<div class="row master-filters"> 
						   <div class="col-md-2">
						   <select class="dropdown" id="selectData">
							<option value="">SHOW ALL INFO ICONS</option>
							<option value="icon_assigned_only">SHOW INFO ICONS ASSIGNED ONLY</option>
							<option value="icon_not_assigned_only">SHOW INFO ICONS NOT ASSIGNED ONLY</option>
	
						  </select>    
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="info_icon_a_z">INFO ICON NAME (A-Z)</option>
							 
							<option value="project_name_asc">IMAGE AFTER VIDEO NAME  (A-Z)</option>
							<option value="project_start_latest">INFO ICON ASSIGNED</option>
							<option value="project_start_earliest">CREATED (LATEST FIRST)</option>
							<option value="project_status">CREATED (EARLIEST FIRST)</option>
							<option value="project_type">LAST EDITED (LATEST FIRST)</option>
							<option value="project_audience_type">LAST EDITED (EARLIEST FIRST)</option>
							   
						  </select>
							</div>     
							<div class="col-md-2"><button class="src-btn1" style="display:none" id="assignpost">ASSIGN POST</button> </div>
							<div class="col-md-1"><button  style="display:none" class="src-btn1 deleteAction" id="clearinfoselected">CLEAR INFO ICON DATA</button></div>
							<div class="col-md-1"><button class="src-btn1 " style="display:none" id="deleteAll">CLEAR ALL INFO ICON DATA</button></div>
							<!--<div class="col-md-1"><button class="src-btn1 deleteAction" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div> -->
						  </div>
							
							<div class="floor-table project-table  project-table-listing">
					<P>ALL INFO ICONS ARE LISTED BELOW :</P>
					    <div class="search-results"><p class="search_result"></p></div>
						<div class="table-cont icon-list">   
						<form method="post" id="floor_form">
						
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>LAST EDIT</td>
								<td>INFO ICON ID</td>
								<td>INFO ICON NAME </td>
								<td>ASSIGNED</td> 
								<td>CONTENT SET IMAGE AFTER VIDEO</td>
								<td>POSITION</td>
								
						<td id="last-td"></td>
						</tr>
						</thead>
						</table>      
						</div>          
						     
						 <div class="project-scroll">   
						<table>        
						<thead>
							<tr class="table-title" style="background:#d9d9d9; display:none; margin-top: 35px;"> 
								<td class="deletesingle"></td>
								<td>LAST EDIT</td>
								<td>INFO ICON ID</td>
								<td>INFO ICON NAME </td>
								<td>ASSIGNED</td> 
								<td>CONTENT SET IMAGE AFTER VIDEO</td>
								<td>POSITION</td>
								<td></td>           
							</tr>   
						</thead>
						<tbody id="AllData">
						
						 
						
						</tbody>
					</table>  
					</div>   
					</form>
						</div> 
						</div>
	

						
	<div id="myModal" class="modal delete-sorting">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-body">
    <h4>INFO ICONS DELETE <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL</span></h4>
    <p>NO ENTRIES SELECTED.</p>
    <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
  </div> 
  <div class="modal-footer text-right"><span class="close">OK</span> </div>
 </div>   

</div> 
<script>
$(document).ready(function(){
  $(".SER").on("keyup", function() {
	  $('.search_result').html('SEARCH RESULTS :');
    var value = $(this).val().toLowerCase();
    $("#AllData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    
    
      $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>');
    
    
  });
});
</script>
<script>
 
 
    $(document).ready(function () {
		 
	   $("body").on('click','#deleteAll',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>icon/deleteAll',
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
       
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
              location.reload();

        });
		
	$("body").on('click','#AddProject',function(){
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/add',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false,
                        clickSlide: false,
                        clickOutside: false
                }
            });
            
        });
 
    }); 

</script>
						
<script type="text/javascript">

$(".deleteAction").click(function(){
	$('.deletClass').show();
	$('.form-submit').show();
});

 

 $("#submitbtn").click(function() {
	var val = [];
	$('.deletClas:checked').each(function(i){
	  val[i] = $(this).val();
	}); 
	
	if(val==''){
		var modal = document.getElementById("myModal");
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
		
	var url="<?=base_url();?>project/deleteSelectedProjects";
	$.ajax({  
		type: "POST",
		url: url, 
		data: {delval:val},
		success: function(data)
		{ 
			var data=$.trim(data);
			$.fancybox.getInstance('close');
			
             $.fancybox.open({
                src: '<?=base_url();?>project/projectSelectMultidelete',
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
	}
});

	reply_click();
	var currentid='';
	function reply_click(clicked_id)
	 {
		//alert(clicked_id);
	  $.ajax({
	   url:"<?=base_url();?>icon/searchSingleData",
	   method:"POST", 
	   data:{clicked_id:clicked_id,project:<?php echo $project_select; ?>}, 
	   success:function(data)
	   {
		
		
		$('#ViewSingleData').html(data);
	   } 
	  })
	  currentid= clicked_id;
	
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);
	  
	 }
	 
	
   $("body").on('click','#posticon_assignment',function(){
   $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/icons',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });  
   
  
      $("body").on('click','#icon_all_assignment',function(){
      $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/allAssignments',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });
 
   

$("body").on('click','#assignpost',function(){
$.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/icons',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   });
   
   $("body").on('click','#btn5',function(){
$.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>icon/index',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });   
                
   
   }); 
   
   
   
   
   
   
       
        
	 
</script>
<script>

		   
 
$(document).ready(function(){






                                        $("#editAction").click(function () {
zone_id="";
	  $("#editAction").attr("data-id","");

          $("#delete_zone").attr("data-id","");
                                            //$("#delete_zone").removeClass("activebtn");
											
											$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ZONE SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#delete_zone").removeClass("activebtn");
											$("#currentlyViewing").css("display","contents");
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
												  $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ZONE SELECTED</p>');
												  $('.rightcheck').css("display","none");
                                            }
                                             
                                        });






/* DELETE */




					$("#clearinfoselected").click(function () {
					
					
						  $("#editAction").attr("data-id","");
          $("#clearinfoselected").attr("data-id","");
                                           
                                           $("#editAction").removeClass("activebtn");
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
												  $("#submitbtndelete").css("display","block");
												// $("#currentlyViewing").css("display","none");
												 $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
												
												$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING:</span> NO ICON SELECTED</p>');
												  	
												
												
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
												  }else{
										     	$("#ViewSingleData").find("#multipleprojectselect").text("NO ZONE SELECTED");
												$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ZONE SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING:</span> NO ICON SELECTED</p>');
												  
											      //$("#ViewSingleData").find("#multipleprojectselect").text("NO ZONE SELECTED");
												  // $("#ViewSingleData").empty().html('<p><span>CURRENTLY SELECTED:</span> NO ZONE SELECTED</p>');
												  // $("#ViewSingleData").append('<p><span>CURRENTLY VIEWING:</span> NO ZONE SELECTED</p>');
										            }  
                                                 
                                            }else{
					                           //  $("#actiontopText").hide();
                                               //  $('.deletClass').show();
	                                           //  $("#submitbtndelete").css("display","none");
												 
												 
												 
											  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>');
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
											
										      	 $("#ViewSingleData").find("#multipleprojectselect").text("NO ICON SELECTED");
										          }	 
												 
												 
												 
												 
								               $('.rightcheck').css("display","none");				 
												 
												 
												 
						}
                                          
                                        });






/* ---------*/

$('.deletClass').hide();
	$('.form-submit').hide();
 load_data();
 
  $('#selectData').change(function(){
  var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>');  
  load_data(selectData,selectShortBy);
 });
 
 $("body").on('change','#selectShortBy',function(){
	var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO ICON SELECTED</p>');
  load_data(selectData,selectShortBy);
 });
 
 function load_data(selectData='',selectShortBy='')
 {
	
  $.ajax({
   url:"<?=base_url();?>icon/search",
   method:"POST", 
   data:{selectData:selectData,selectShortBy:selectShortBy,project:<?php echo $project_select; ?>},
   success:function(data)
   {
	
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
                                
				           <li class="active"><a  data-toggle="tab" href="#menu1">MAIN MENU</a></li>
							<li><a data-toggle="tab" href="#menu2" id="icon_all_assignment" >ALL ASSIGNMENTS</a></li>
							<li><a data-toggle="tab" id="posticon_assignment" href="#menu3">ASSIGN POST</a></li>
				               
                            </ul>
                            <div class="table_info">
                                 <table id="ViewSingleData" >
								 								</table> 
                                
                            </div>
                            <div class="form-submit delete-sorting" style="display:none;"> 
								
                                <input type="button" value="Back" class="close-btn" name="back" id="btn5">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtninfoicon">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

 
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

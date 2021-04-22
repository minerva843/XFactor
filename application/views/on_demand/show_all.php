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
<div class="main-section floor_steps" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>ON DEMAND CONTENT <span id="actiontopText"style="font-size:18px;" ></span> </h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
							<option value="">SHOW ALL ON DEMAND CONTENT</option>
							<option value="all_document">ALL DOCUMENTS</option>
							<option value="all_image">ALL IMAGE FILES</option>
							<option value="all_video">ALL VIDEO FILES</option>
							<option value="all_audio">ALL AUDIO FILES</option>
						  </select>
						  </div>  
						  <div class="col-md-3"><!--button class="src-btn2" >SEARCH</button--><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="oncontent_owner">CONTENT OWNER  (A-Z)</option>
							<option value="oncontent_title">CONTENT TITLE (A-Z)</option>
							<option value="latest_created">Created (latest first)</option>
							<option value="earliest_created">Created (earliest first)</option>
							<option value="latest_edit">last edited (latest first)</option>
							<option value="earliest_edit">last edited (earliest first)</option>
						  </select>
							</div> 
							
							<div class="col-md-1"><button class="src-btn1" id="Addfloor">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1  coledit" id="DemandeditAction" >EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 DemanddeleteAction" id="DemanddeleteAction">DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="DemanddeleteAll">DELETE ALL</button></div>
						  </div>

				<div class="floor-table floor-sorting_list ondemand-content">  
					<P>All ON DEMAND CONTENT are listed Below:</P>
					<div class="search-results"> <p class="search_result"></p></div>
						<div class="table-cont ">
						<form method="post" id="floor_form">
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						       <td>LAST EDIT</td>
								<td>CONTENT ID</td>
								<td>CONTENT OWNER</td>
								<td>CONTENT TITLE</td>
								<td>CONTENT TYPE</td>
								<td>OD CONENT FILE NAME</td>
								<td> &nbsp; &nbsp; OD CONTENT FILE SIZE</td>
						<td id="last-td"></td>
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
								<td>CONTENT ID</td>
								<td>CONTENT OWNER</td>
								<td>CONTENT TITLE</td>
								<td>CONTENT TYPE</td>
								<td>OD CONENT FILE NAME</td>
								<td>&nbsp; &nbsp; OD CONTENT FILE SIZE</td>  
								<td></td>
							</tr>
						</thead>
						<tbody id="AllData"></tbody>
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
      
	  // if ($(this).val().length >= 0){
	
    // var value = $(this).val().toLowerCase();
    // $("#AllData tr").filter(function() {
      // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  // var $trs = jQuery("#AllData tr:visible");
	// $trs.filter("#AllData tr:odd").css("background-color", "#ffffff");
	// $trs.filter("#AllData tr:even").css("background-color", "#d9d9d9");
    // });
	  // }
  });
  
  
  
  
                                          $("#DemandeditAction").click(function () {
currentid=""; 
                                           $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#DemanddeleteAction").removeClass("activebtn");
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
                                                //$("#currentlyViewing").css("display","contents");
												 $("#ViewSingleData").find('#currentlyViewing').css("display", "none");
												 
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												  
                                            }
                                             
                                        });
										

									$("#DemanddeleteAction").click(function () {
                                             
                                        											//alert("delete");
                                            $("#DemandeditAction").removeClass("activebtn");
											$('.form-submit').show();
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');
                                            $(this).toggleClass("activebtn");
                                            $('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            if($(this).hasClass('activebtn')){
											 
											    
											 	 $(".form-submit-btn").removeClass('hide');
												 $('.deletClass').show();
                                                 $(".deletClass").removeClass('hide');
                                                 $("#actiontopText").show();
                                                 $("#actiontopText").text(" (DELETE) ");
												// $("#currentlyViewing").css("display","none");
												$("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
												
												
												
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
                                                  }else{
											
											      $("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SELECTED");
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO CONTENT SELECTED</p>');
												  	
										            }
												
												
                                                 
                                                 
                                            }else{
												    
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleData").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleData").find('#multipleprojectselect').text(txt);
												$("#ViewSingleData").find('#currentlyViewing').css("visibility", "hidden");
												
												
														 var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
										      	 $("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SELECTED");
										          } 
												 
												 
												 
											}
                                          
                                        });
  
  
  
  
  
  
  
  
});
</script>
	<div id="myModal" class="modal delete-sorting">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-body">
    <h4>ON DEMAND CONTENT (DELETE) <span style="color:red">NOT SUCCESSFUL</span></h4>
	
    <p>NO ENTRIES SELECTED.</p>
    <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
  </div>
  <div class="modal-footer text-right"><span class="close">OK</span> </div>	

</div>
</div>
<div id="myModal1" class="modal delete-sorting">

  <!-- Modal content -->  
  <div class="modal-content">   
    <div class="modal-body">
	 <h4>ON DEMAND CONTENT (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>NO ENTRY SELECTED.</p>
                                        <p>Please select an entry first to EDIT.</p>  
	
    <!--p style="text-align:center">NO ENTRIES SELECTED.</p> 
    <p style="text-align:center">USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p-->
	</div> 
	<div class="modal-footer text-right"><span class="close">OK</span> </div>	
  </div>    

</div>
<script>

    $(document).ready(function () {
		 $('.close').click(function(){
			$('#myModal1').hide();
		// var modal = document.getElementById("myModal1");
		  // modal.style.display = "none";
	}) 
		$("body").on('click','#DemanddeleteAll',function(){
          
           $.fancybox.getInstance('close');
           $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>onDemand/deleteSelected",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        });
       
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();

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
        src         : "<?php echo base_url(); ?>onDemand/addStep1",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        }); 
		
		
		
		// $("body").on('click','#Addfloor',function(){
        // $.fancybox.getInstance('close');
        // $.fancybox.open({
        // maxWidth  : 800,
        // fitToView : true,
        // width     : '100%',
        // height    : 'auto',
        // autoSize  : true,
        // type        : "ajax",
        // src         : "<?php echo base_url(); ?>onDemand/addStep1FloorPlans",
        // ajax: { 
           // settings: { data : 'project=<?php echo $project_select; ?>', type : 'POST' }
        // },
        // touch: false,
		 // clickSlide: false,
        // clickOutside: false
        
    // });
           

        // });
		
		
		
		
		
		
 
    }); 

</script>
						
<script type="text/javascript">

/* $(".DemanddeleteAction").click(function(){
	$('.deletClass').toggle();
	$('.DemanddeleteAction').toggleClass( "activebtn" );
	$('.form-submit').toggle(); 
	$('.coledit').removeClass( "activebtn" );
})*/

// $(".floor_edit").click(function(){
	// $('.floor_edit').toggle();
	// $('.floor_edit').toggleClass( "activebtn" );
	// $('.DemanddeleteAction').removeClass( "activebtn" );
// })

$("#Demandsubmitbtn").click(function() {
	
	
	
	
	if($("#DemandeditAction").hasClass('activebtn')){
		
			   if(currentid != ''){
				 $.fancybox.getInstance('close');
				$.fancybox.open({
                src: '<?=base_url();?>onDemand/editStep/'+currentid,
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
		
		
		
		
	/*	var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";
		span.onclick = function() {
		  modal.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		} */
	}else{
		
		 var ids = [];
$('.deletClas:checked').each(function(i, e) {
    ids.push($(this).val());

});
if(ids==''){
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
		$.fancybox.getInstance('close');
  var strids =  ids.join(',');
 //console.log(strids);     
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>onDemand/deleteSelected",
        ajax: { 
           settings: { data : 'ids='+strids, type : 'POST' }
        },
        touch: false,
        
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
											
											
											 if($("#DemanddeleteAction").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData").find("#multipleprojectselect").text("NO CONTENT SELECTED");
 
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
          //$('#ViewSingleData').html('<tr><td colspan="2" class="top-fp"><p><span>CURRENTLY SELECTED:</span>MULTIPLE Floor PLANS </p></td></tr>');

           //}else{
			   
			  $.ajax({
			   url:"<?=base_url();?>onDemand/searchSingleData",
			   method:"GET", 
			   data:{clicked_id:clicked_id}, 
			   success:function(data)
			   {
				//console.log(data);
				$('#ViewSingleData').html(data);
				check_multiple_select();
				
				if($("#DemanddeleteAction").hasClass('activebtn')){                                                 
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
	$('.DemanddeleteAction').removeClass( "activebtn" );
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
$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
var Allsearch= $(this).val();
var selectData = $('#selectData').val();
$("#editProject").removeClass("activebtn");
$("#deleteProjects").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide();
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
var selectShortBy = $('#selectShortBy').val();
load_data(selectData, selectShortBy,Allsearch);
                                        
	}); 
  $('#selectFloor').change(function(){
	  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
	  $("#editProject").removeClass("activebtn");
$("#deleteProjects").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide();
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
	  var Allsearch= $('.SER').val();
  var floor_plan = $('#selectFloor').val();
  var floor_shortby = $('#selectShortBy').val();
  load_data(floor_plan,floor_shortby,Allsearch);
 });
 
 $('#selectShortBy').change(function(){
	 $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO CONTENT SELECTED</p>');
	 $("#editProject").removeClass("activebtn");
$("#deleteProjects").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide();
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
	 var Allsearch= $('.SER').val();
	var floor_plan = $('#selectFloor').val();
  var floor_shortby = $('#selectShortBy').val();
  load_data(floor_plan,floor_shortby,Allsearch);
 });
 
 function load_data(floor_plan='',floor_shortby='',Allsearch='')
 {
	
  $.ajax({
   url:"<?=base_url();?>onDemand/search",
   method:"POST", 
   data:{floor_plan:floor_plan,floor_shortby:floor_shortby,AllSearchData:Allsearch,project:<?=$project?>},
   success:function(data)
   {
	console.log(data);
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
				               
                            </ul>
						<div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							                            <div class="table_info">
                                
                                 <table id="ViewSingleData">
								</table> 
                                
                            </div>
							
							</div>
							</div> 

                            <div class="form-submit delete-sorting" style="display:none;"> 
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5">
                                <input type="button" value="Next" class="action-btn" name="submit" id="Demandsubmitbtn">
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
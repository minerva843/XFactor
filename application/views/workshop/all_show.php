<style>
	tr{
		cursor: pointer;
	}
	option{
	padding-bottom: 15px;
    padding-top: 15px;
	}
	
	.register-form span {
    display: contents;
}
	
</style>
<style>
.fancybox-close-small{
	display:none !important;
}
</style>
<?php $rand=rand(1000,9999);?>
<div class="main-section"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WORKSHOPS <span id="actiontopText"style="font-size:18px;" ></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"   id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body register-form zones-listing_pt">
            <div class="row">
                <div class="col-md-9">  
                     <div class="master-floorplan">
                    <div class="floor-sec"> 
						<div class="tab-listing">
							<div class="row master-filters"> 
						   <div class="col-md-2">
						   <select class="dropdown" name="workshop" id="selectZone">
							<option value="">SHOW ALL WORKSHOPS</option>
							<option value="workshop-not-ended">SHOW WORKSHOP NOT ENDED ONLY</option>
							<option value="workshop-ended">SHOW WORKSHOP ENDED ONLY</option>
							
							 
						  </select>
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="workshopid">WORKSHOP ID</option>
							<option value="workshopid-a-z">WORKSHOP NAME (A – Z)</option>
							<option value="workshop-location-a-z">WORK SHOP LOCATION (A – Z)</option>
							 
							<option value="latest_created">START DATE & TIME</option>
							 
						  </select>    
							</div> 
							
							<div class="col-md-1"><button class="src-btn1"    id="addNew" >ADD</button></div>
                                                        <div class="col-md-1"><button class="src-btn1 " id="editAction"   >EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1" id="delete_zone" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1"    id="deleteAll">DELETE ALL</button></div>
						  </div>
							      
							<div class="floor-table workshop-list-shorting">
					<P>All workshops are listed Below:</P> 
					         
					<div class="search-results"> <p class="search_result"></p></div>
					 <!--<div class="search-results"><p class="search_result"></p> </div> -->  
						<div class="table-cont ">
						<form method="post" id="floor_form">
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						<td>LAST EDIT</td>
						<td>WORKSHOP ID</td>
						<td>WORKSHOP NAME</td>
						<td>START DATE & TIME</td>
						<td>END DATE & TIME</td>
						<td>SCREEN 1 URL</td>
						<td>SCREEN 2 URL</td>
						<td>SCREEN 3 URL</td>
						<td id="last-td"></td>
						</tr>
						</thead>
						</table> 
						</div>						
						<div class="project-scroll">   
						<table style="">
						<thead>
						<tr class="table-title" style="background:#d9d9d9; display: none; margin-top: 35px;">
						<!-- <td id="checkboxdis" style="display:none">&nbsp;&nbsp;</td> -->
						<td class="deletesingle"></td>
						<td>LAST EDIT</td>
						<td>WORKSHOP ID</td>
						<td>WORKSHOP NAME</td>
						<td>START DATE & TIME</td>
						<td>END DATE & TIME</td>
						<td>SCREEN 1 URL</td>
						<td>SCREEN 2 URL</td>
						<td>SCREEN 3 URL</td>
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
       
       
                  
                                                        <style>
                                                        .activebtn{
                                                            background: #00b050!important;
                                                            color: #fff !important;
                                                        }

                                                    </style> 
	<script>
$(document).ready(function(){
    
    
 



$("#editAction").click(function () {
zone_id="";
	  $("#editAction").attr("data-id","");

          $("#delete_zone").attr("data-id","");
                                            //$("#delete_zone").removeClass("activebtn");
											
											$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span>  NO WORKSHOP SELECTED</p>');
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
												$("#ViewSingleData<?=$rand;?>").find('#multipleprojectselect').text(txt);
												
                                                 
                                                 
                                                 
                                            }else{
						                          $("#actiontopText").hide();
												  $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("display", "contents");
												  $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p>');
												  $('.rightcheck').css("display","none");
                                            }
                                             
                                        });


					$("#delete_zone").click(function () {
					
					
						  $("#editAction").attr("data-id","");
          $("#delete_zone").attr("data-id","");
                                           
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
												 $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("display", "contents");
												
												$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO WORKSHOP SELECTED</p>');
												  	
												
												
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
												  }else{
										     	$("#ViewSingleData<?=$rand;?>").find("#multipleprojectselect").text("NO WORKSHOP SELECTED");
												$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO WORKSHOP SELECTED</p>');
												  
											      //$("#ViewSingleData<?=$rand;?>").find("#multipleprojectselect").text("NO ZONE SELECTED");
												  // $("#ViewSingleData<?=$rand;?>").empty().html('<p><span>CURRENTLY SELECTED:</span> NO ZONE SELECTED</p>');
												  // $("#ViewSingleData<?=$rand;?>").append('<p><span>CURRENTLY VIEWING:</span> NO ZONE SELECTED</p>');
										            }  
                                                 
                                            }else{
					                           //  $("#actiontopText").hide();
                                               //  $('.deletClass').show();
	                                           //  $("#submitbtndelete").css("display","none");
												 
												 
												 
	 $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p>');
	 $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleData<?=$rand;?>").find('#multipleprojectselect').text(txt);
												$("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("visibility", "hidden");
												
												
														 var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
										      	 $("#ViewSingleData<?=$rand;?>").find("#multipleprojectselect").text("NO WORKSHOP SELECTED");
										          }	 
												 
												 
												 
												 
								               $('.rightcheck').css("display","none");				 
												 
												 
												 
						}
                                          
                                        });
    
    
    
  $(".SER").on("keyup", function() {
      
      if($(this).val().length>=1){
          $('.search_result').show();
	  $('.search_result').html('SEARCH RESULTS :'); 
      }else{
        $('.search_result').hide();  
      }
      
	
  });
});
</script>
<script>

    $(document).ready(function () {
        
        
        
          $("body").on('click','#assign_zone_tab',function(){
          let zoneid =  $("#editAction").attr("data-id");
          

           $.fancybox.getInstance('close');
           
           
         
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>zone/asssignGrid",
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
 
        
        
      $("body").on('click','#deleteAll',function(){
          
      $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>workshop/deleteSelectedWorkshops",
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
						

<script>
$(document).ready(function(){
    
   
  	$("body").on('click','#addNew',function(){
           $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>workshop/addNew",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
           
            
        });  
    
    

 $("body").on('click','#submitbtndel',function(){
     
     
  if($("#editAction").hasClass('activebtn')){
   
             let zone_id = $("#editAction").attr("data-id");
	     let project_id = '<?php echo $project_select; ?>';
          
             if(zone_id){
             $.fancybox.getInstance('close');
             
            
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>workshop/addNew/'+zone_id+'/'+project_id,
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
        });  
             
  
          }else{
              
                      var modal2 = document.getElementById("myModal1workshop");
				var span = document.getElementsByClassName("close")[0];
				modal2.style.display = "block";
				span.onclick = function() {
				  modal2.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal2.style.display = "none";
				  }
				}
			
			
			
			
          }
   
   
   
   
      
  }else{
    
var ids = [];
$('.deletClas:checked').each(function(i, e) {
    ids.push($(this).val());

});

if(ids.length){
   
$.fancybox.getInstance('close');

  var strids =  ids.join(',');
 console.log(strids);     
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>workshop/deleteSelectedWorkshops",
        ajax: { 
           settings: { data : 'ids='+strids+'&project='+'<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
         clickSlide: false,
         clickOutside: false
    });
    
    }else{
    
     
	                       var modal = document.getElementById("myModal2workshop");
				var span = document.getElementsByClassName("close")[0];
				modal.style.display = "block";
				//$(".modal").css("display","block !important");
				span.onclick = function() {
				  modal.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
	 
	 
	 
    }
    
}  
               
});
        

 load_data();
 $(".SER").on("keyup", function () {
                                             
                                        //$("#AllData").empty();
$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p>');

var Allsearch= $(this).val();
 var zone = $('#selectZone').val(); 
$("#editAction").removeClass("activebtn");
$("#delete_zone").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide(); 
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
var shortby = $('#selectShortBy').val();
load_data(zone, shortby,Allsearch);
                                        
	});
  $('#selectZone').change(function(){
	   $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p>');

var Allsearch= $('.SER').val();
 var zone = $('#selectZone').val(); 
$("#editAction").removeClass("activebtn");
$("#delete_zone").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide(); 
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
var shortby = $('#selectShortBy').val();
  load_data(zone,shortby,Allsearch);
 });
 
 $('#selectShortBy').change(function(){
$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO WORKSHOP SELECTED</p>');    

var Allsearch= $('.SER').val();
 var zone = $('#selectZone').val(); 
$("#editAction").removeClass("activebtn");
$("#delete_zone").removeClass("activebtn");
$("#actiontopText").hide();
$('.deletClass').hide();
$('.form-submit').hide(); 
$('.deletClas:checked').removeAttr('checked');
$(".deletClass").removeClass('hide');
var shortby = $('#selectShortBy').val();
  load_data(zone,shortby,Allsearch);
 });
 
 function load_data(workshop='',shortby='',Allsearch='')
 {
	 
  $.ajax({
   url:"<?=base_url();?>workshop/search",
   method:"POST", 
   data:{workshop:workshop,selectShortBy:shortby,AllSearchData:Allsearch,project:<?php echo $project_select; ?>},
   success:function(data)
   {
	//console.log(data);
    $('#AllData').html(data);

	

	
   } 
  });
 }
 
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
                                            $("#ViewSingleData<?=$rand;?>").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData<?=$rand;?>").find("#currentlyViewing").show();
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-project");
											$("#ViewSingleData<?=$rand;?>").find('#multipleprojectselect').text(pr);
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
											
											
											                 if($("#delete_zone").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData<?=$rand;?>").find("#multipleprojectselect").text("NO WORKSHOP SELECTED");
 
                                               }else{
						//alert();
                                               $("#currentlyViewing").css("visibility","hidden");
                                               }
											 
										}

                                        }
											
										
                                    }

 
 	reply_click();
	//var currentid='';
	function reply_click(clicked_id)
	 {
		 $("#ViewSingleData<?=$rand;?>").empty();
		let  val2 = [];
	$('.deletClas:checked').each(function(i){
	  val2[i] = $(this).val();
	});
		  if((val2.length+1) > 1){
       
          $('#ViewSingleData<?=$rand;?>').html('<tr><td colspan="2" class="top-fp"><p><span class="current-bold current-bold">CURRENTLY SELECTED:</span>MULTIPLE WORKSHOPS </p></td></tr>');

           }
	  
	  
	 }
 
 
 
 
 
$("body").on('click','.view',function(){
    
          let zone = $(this).attr("id");
	  $.ajax({
	   url:"<?=base_url();?>workshop/getWorkshopData",
	   method:"POST", 
	   data:{zone:zone}, 
	   success:function(data)
	   {
		console.log(data);
                //$('.current-status').remove();
				
	        	$('#ViewSingleData<?=$rand;?>').html(data);
                check_multiple_select();
                
                
                  if($("#delete_zone").hasClass('activebtn')){                                                 
                        $("#currentlyViewing").css("display","contents");
 
                         }else{
			
                      //  $("#currentlyViewing").remove();
                }
                
                
	   } 
	  })
          
     //      }
	  currentid= zone;
	  $("#editAction").attr("data-id",currentid);
          $("#delete_zone").attr("data-id",currentid);
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);


 


});
 
  $('.closeworkshop').click(function () {
                                            var modal = document.getElementById("myModal2workshop");
                                            modal.style.display = "none";
                                            
                                            var modal2 = document.getElementById("myModal1workshop");
                                            modal2.style.display = "none";
                                        });
 
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
                                <li class="active"><a data-toggle="tab" href="#home">MAIN MENU</a></li>
                                
				                 
				               
                            </ul>
                            <div class="table_info">
                               
                                 <table id="ViewSingleData<?=$rand;?>">
				   
				                 </table> 
                                
                            </div>
                            <div class="form-submit" style="display:none;" id="submitbtndelete"> 
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5allzones">
                                <input type="button" value="Next"       class="action-btn" name="submit" id="submitbtndel">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>   

 
    </div>

</div>


  <div id="myModal1workshop" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4>WORKSHOP (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>NO ENTRY SELECTED.</p>
                                        <p>Please select an entry first to EDIT.</p>          
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close closeworkshop">OK</span> </div>									

                                </div>    
					</div>    
     
                                <div id="myModal2workshop" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> WORKSHOP (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close closeworkshop">OK</span> </div>								
                                   </div> 									

                                </div> 



<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }
</style>

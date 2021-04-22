
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
 <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>		

<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">

 

			<div class="row avatar-main summary_stats_left">
        
				<div class="col-md-9 chatscreen master-floorplans">

					<div class="start-explor">
						<h2 class="project_name"><?=$projects_details->project_name;?>.  </h2>
					</div>
 
					 
<div class="virtual-fliter">			
     <div class="row">
	<div class="col-md-2"><div class="select-date">SELECT A START DATE :</div> </div>
	<div class="col-md-3">
	 
	
	<input type="text" style="width:100%;"   name="setup_start_date_time" maxlength="16"  id="setup_start_date_time" placeholder="YYYY-MM-DD" class="valid setup_start_date_time" aria-invalid="false">
                                                          <!--  <i id="setup_start_icon" style="position: absolute;right: 16px;top: 10px;font-size: 14px;" class="fa fa-calendar" aria-hidden="true"></i> -->
	</div>   
	
	<div class="col-md-2" style="padding-right: 0;"><div class="select-end-date">SELECT AN END DATE :</div> </div>  
	<div class="col-md-3">
	<input type="text"    style="width:100%;" name="setup_end_date_time" maxlength="16"  id="setup_end_date_time" placeholder="YYYY-MM-DD" class="valid setup_end_date_time" aria-invalid="false">
             
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-1"><button id="retrive"class="virtual-btn">RETRIVE</button></div>
					
						

</div>
</div>
					
							
					<div class="avtar-filter virtual-fliter virtual-fliter-bottom">
						<div class="row">

							
						<div class="col-md-4">
						<select class="dropdown" id="selectData">
						<option value="">SHOW ALL ACTIVITIES</option>
						<option value="SIGNIN"> SHOW XPLATFORM SIGN IN ONLY</option>
						<option value="SIGNOUT"> SHOW XPLATFORM SIGN OUT ONLY</option>
						 

						</select>
							</div>   
						
					
						 
							
						<div class="col-md-2"><input  style="width:100%;    font-size: 14px !important;" type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>	
						
						
						<div class="col-md-3">
						<select class="dropdown" id="selectShortBy">
						<option value="">SORT BY</option>

						<option value="latest"> DATE & TIME (LATEST ON TOP)</option>
						<option value="earliest"> DATE & TIME (EARLIEST ON TOP)</option>
						<option value="IP_ADDRESS"> IP ADDRESS</option>
						<option value="GUEST_ID"> GUEST ID (ASSENDING)</option>
						 <option value="EMAIL"> EMAIL (A – Z)</option>
						 
						  <option value="ACTIVITY"> ACTIVITY (A – Z)</option>
						  <option value="ACT_DETAILS"> ACTIVITY DETAILS(A – Z)</option>



						</select>
						</div>
						<div class="col-md-2"> </div>
						
						<div class="col-md-1"><button id="retriveprint"     class="virtual-btn">PRINT</button></div>
						
						 
							

						</div>
					</div>					 
							
					<!--div class="avtar-filter virtual-fliter">
						<div class="row">

							
						<div class="col-md-2">
							<input type="text" style="width:100%;"   name="setup_start_date_time" maxlength="16" value="<?php echo date('Y-m'); ?>"" id="setup_start_date_time" placeholder="YYYY-MM-DD" class="valid setup_start_date_time" aria-invalid="false">
							</div>
						
					
						 
							
						<div class="col-md-3"><input  style="width:100%;" type="text" class="src-btn2 SER" placeholder="SEARCH"></div>	
						
						
						<div class="col-md-2">
						<select class="dropdown" id="selectShortBy">
						<option value="">SORT BY</option>

						 


						</select>
						</div>
						<div class="col-md-3"> </div>
						
						<div class="col-md-1"><button id="retrivecount" class="virtual-btn">RETRIVE</button></div>
						
						<div class="col-md-1"><button id="retriveprint" class="virtual-btn">PRINT</button></div>	  
							
							

						</div>
					</div -->
					

<div class="chat-feature flor-left">
<div class=" to-start-select" id="container">

  

     
     
                                <div class="floor-table project-table  virtualmall-table-listing"   style="width:100%;"  >  
                                    <P>ALL GUEST DETAILS ARE LISTED BELOW :</P>
                                    <div class="search-results"><p class="search_result">SEARCH RESULTS :</p> </div>   
                                    <div class="table-cont " id="printJS-form-project-deleteall">
                                        <form method="post" id="floor_form">


                                            <div class="table-fixed-class">
                                                <table  style="margin-top: -43px;">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9;">
                                                            <td>DATE</td>
                                                            <td>TOTAL</td>
                                                            <td>PREREGWEB</td>
                                                            <td>PREREGAD</td> 
                                                            <td>ONLINEREGWB</td>
                                                            <td>ONLINEREGAD</td>
                                                            <td>ONSITEREGWB</td>
                                                            <td>ONSITEREGAD</td>
                                                            <td>GUEST LIST UPLOAD</td>
                                                             
                                                            <td id="last-td"></td>
                                                        </tr>   
                                                    </thead>
                                                </table>      
                                            </div>          

                                            <div class="project-scroll" >   
                                                <table id="printJS-form-project-deleteall2">        
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9; display:none; margin-top: 35px;"> 
                                                            
                                                            <td>DATE</td>
                                                            <td>TOTAL</td>
                                                            <td>PREREGWEB</td>
                                                            <td>PREREGAD</td> 
                                                            <td>ONLINEREGWB</td>
                                                            <td>ONLINEREGAD</td>
                                                            <td>ONSITEREGWB</td>
                                                            <td>ONSITEREGAD</td>
                                                            <td>GUEST LIST UPLOAD</td>

                                                            <td></td>           
                                                        </tr>   
                                                    </thead>
                                                    <tbody id="AllData"><tr><td colspan="9" align="center">NO DATA FOUND</td></tr></tbody>
                                                </table>  
                                            </div>   
                                        </form>
                                    </div>      
                                </div>    



 


</div>
</div>
					
				</div>

				<div class="col-md-3 avtar-sidebar summary_right_tab">
					<div class="tabbable tabs-below">
						<div class="tab-content">

							<div class="tab-pane chats active" id="0">
								<div class="avatar-right table-content">
									<h2> GUESTS </h2>
									    
									
								<div class="chat-main virtual-mall">
     

								<div class="current-status"  >
								<table id="ViewSingleData">
								</table> 
								</div>

								<!--- MAIN RIGHT -->

								</div>

						</div>

</div>

						<ul class="nav nav-tabs">

							<div class="overlay-heading">
								<h2> WHAT DO YOU WISH TO DO? </h2>
							</div>
							<?php 
if(!empty($floor)){
	$floor=$floor;
}else{
	$floor=0;
}
?>
	<li>
<a href="<?=base_url();?>home/summary/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/figure.png" class="img-fluid"><span>FIGURES</span></a>
</li>   


    
<li class="">
<a href="<?=base_url();?>xfootprint/allfoot/<?php echo $project_id;?>" class=""><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>ALL</span></a>
</li>


<li class="">
<a href="<?=base_url();?>home/footprints/<?php echo $group_id;?>/<?php echo $project_id;?>" class=""><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>INDIVIDUAL</span></a>
</li>


<li class="active">
<a href="<?=base_url();?>xfootprint/allfoot/<?php echo $project_id;?>" class="active"><img src="<?=base_url();?>assets/images/chat/foot-print.png" alt=""><span>GUESTS</span></a>
</li>

<li>
<a href="<?=base_url();?>home/config/<?php echo $group_id;?>/<?php echo $project_id;?>"><img src="<?=base_url();?>assets/images/chat/config-icon.png" alt=""><span>CONFIG PAGES</span></a>
</li>
            

						</ul>
					
					<!-- /tabs -->

				</div>
			</div>
			</div>
			<div class="footer-year">
				<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
			</div>
		
	</div>
</div>





                                <div id="myModal1" class="modal delete-sorting">
                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
					
					<h4> SUMMARY & STATS - GUESTS</h4>
                                        <p  style="color:red;">UNABLE TO RETRIVE RECORDS. </p>
					<p  style="color:red ;">ENSURE THAT START DATE AND END DATE HAS A VALUE.</p>
                                         <p style="color:red ;">  ENSURE THAT SELECTED START DATE IS AN EARLIER THAN SELECTED END DATE.</p>
                                             
                                      </div>         
                                   
       
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
				</div>  
 
      
<script>
$('.search_result').hide();
 $(".SER").on("keyup", function () {
	
	if ($(this).val().length >= 1) {
		$('.search_result').show();
		//$('.search_result').show();
		
	} else {
		$('.search_result').hide(); 
	}
 });
 
 
 
 
        



 $( "#setup_start_date_time" ).datepicker({
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
      onSelect: function (dateText, inst) {
        var startdate = $(this).val();
        
       
       // $('#setup_end_date_time').val(startdate);
    }
});





 $( "#setup_end_date_time" ).datepicker({
  dateFormat: "yy-mm-dd",
  changeMonth: true,
  changeYear: true,
      onSelect: function (dateText, inst) {
        var enddate = $(this).val();
          
       // $('#setup_end_date_time').val(enddate);
    }
});


 


/*
$('#retriveprint').click(function(){
        window.print();
       //   $("#container").print();
       // printDiv();
           return false;
});
 
*/



	$("body").on('click','#retriveprint',function(){
	
	
	var start_date = $("#setup_start_date_time").val();
        var end_date = $("#setup_end_date_time").val();
        var AllSearchData=$('.SER').val();											 
        var selectData = $('#selectData').val();
        var selectShortBy = $('#selectShortBy').val();
					      
          
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type      : "ajax",
        src       : "<?php echo base_url(); ?>xfootprint/printguestcount",
        ajax: { 
           settings: { data : 'project_id='+<?php echo $project_id;?>+'&start_date='+start_date+'&end_date='+end_date+'AllSearchData='+AllSearchData+'&selectShortBy='+selectShortBy+'&selectData='+selectData, type : 'POST' }
        }, 
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    })
            
        });


  $('#selectData').change(function () {
                                            // $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');
					        var Allsearch= $('.SER').val();
						 
                                               var selectData = $('#selectData').val();
                                               var selectShortBy = $('#selectShortBy').val();
                                               load_data(selectData, selectShortBy,Allsearch);
                                        });
                                        
                                        
                                        
   $('#selectShortBy').change(function () {
                                           //  $("#ViewSingleData").empty().html('<p><span class="current-bold" >CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');
					      var Allsearch=$('.SER').val();
												 
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });                                        
                                        



   $('#retrive').click(function () {
                                            // $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');
					      var Allsearch=$('.SER').val();
												 
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        }); 
                                        
                                        
                                        
                                        
                                        
					$(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
                                      //   $("#ViewSingleData").empty().html('<p><span class="current-bold" >CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');
					 var Allsearch= $(this).val();
					 var selectData = $('#selectData').val();							
                                        var selectShortBy = $('#selectShortBy').val();
                                        
                                        
                                             var start_date = $("#setup_start_date_time").val();
					      var end_date = $("#setup_end_date_time").val();
					      
					      
					 if(new Date(start_date) <= new Date(end_date))
                                        {

                                        load_data(selectData, selectShortBy,Allsearch);
                                        }else{
                                        
                                        $('#AllData').html('<tr><td colspan="9" align="center">NO DATA FOUND</td></tr>');
                                        
                                        }
                                        
					});                                       
                                        


 
  function printDiv() {
                    var divName= "project-scrollid";

                     var printContents = document.getElementById(divName).innerHTML;
                     var originalContents = document.body.innerHTML;

                     document.body.innerHTML = printContents;

                     window.print();

                     document.body.innerHTML = originalContents;
                } 

 

 
 
                                    reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                       
                                        $.ajax({
                                            url: "<?= base_url(); ?>xfootprint/searchSingleDataGuest",
                                            method: "GET",
                                            data: {clicked_id:clicked_id},
                                            success: function (data)
                                            {


                                                $('#ViewSingleData').html(data);
                                                  
                                            }
                                        });



                                        //    }
                                        currentid = clicked_id;
                                      
                                        $('.rightcheck').hide();
                                        $('.rightcheck' + currentid).show();
                                        $('.rightcheck' + currentid).prop('checked', true);

                                    }
 
 
 

$(document).ready(function() {
  $('#selectposttype').on('change', function() {
     this.form.submit();
  });
});


 



                                       //load_data();
                                        function load_data(selectData = '', selectShortBy = '',Allsearch='')
                                        {
					      var start_date = $("#setup_start_date_time").val();
					      var end_date = $("#setup_end_date_time").val();
					      
					      
					        if(new Date(start_date) <= new Date(end_date))
                                            {
					  
                                             $('#AllData').html('<tr><td colspan="9" align="center">Loading....Please wait it may take time</td></tr>');
		
                                            $.ajax({
                                                url: "<?= base_url(); ?>xfootprint/searchGuestCount",
                                                method: "POST",
                                                data: {selectData: selectData, selectShortBy: selectShortBy,AllSearchData:Allsearch,project_id:'<?php echo $project_id;?>',start_date:start_date,end_date:end_date},
                                                success: function (data)
                                                {
                                                     
                                                    $('#AllData').html(data);
                                                }
                                            });
                                            
                                              }else{
                                             
                                             
                                           $('#AllData').html('<tr><td colspan="9" align="center">NO DATA FOUND</td></tr>');
                                             
                                            var modal = document.getElementById("myModal1");
                                            var span = document.getElementsByClassName("close")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
                                             
                                             } 
                                            
                                             
                                            
                                            
                                        }




</script>



<style>
	#svga-gravataravatar {

		display: none !important;
	}

	#svga-shareavatar {
		display: none !important;
	}

	#container {
		position: relative;
		overflow: hidden;
		cursor: pointer;
	}

	#item {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}


	#item {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}

	#item:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item:hover {
		cursor: pointer;
	}
	
	
	

</style>
<script>
 
</script>


<!-- Abhishek Gupta Pointer starts here -->

<!-- Ends here -->

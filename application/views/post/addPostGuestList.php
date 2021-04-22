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
<div class="main-section" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>POST (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="type" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body program-tabs">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone); ?>
                     <div class="master-floorplan">
                    <div class="floor-sec"> 
						<div class="tab-listing">
							<div class="row master-filters"> 
						   <div class="col-md-2">
						   <select class="dropdown" id="selectProgram">
							<option value="">SHOW ALL GUESTS</option>
							<option value="program_not_completed">ALL POST NOT COMPLETED</option>
							<option value="program_completed">ALL POST COMPLETED</option>
							
						  </select>
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SHORT BY</option>
							<option value="guest_type">GUEST TYPE(A-Z)</option>
							<!--option value="program_status">PROGRAM STATUS(A-Z)</option>
							<option value="program_startdate_latest">PROGRAM START DATE & TIME(LATEST ON TOP)</option>
							<option value="program_startdate_earliest">PROGRAM START DATE & TIME(earliest ON TOP)</option>
							<option value="program_duration_shortest">PROGRAM DURATION(SHORTEST ON TOP)</option>
							<option value="program_duration_longest">PROGRAM DURATION(LONGEST ON TOP)</option-->
							<option value="latest_created_post">Created(latest first)</option>
							<option value="earliest_created_post">Created(earliest first)</option>
							<option value="latest_edit_post">last edited(latest first)</option>
							<option value="earliest_edit_post">last edited(earliest first)</option>
						  </select>
							</div> 
							
							<!--div class="col-md-1"><button class="src-btn1" id="AddProgram">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1 program_edit">EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 deleteAction" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div-->
						  </div>
							
							<div class="floor-table floor-sorting_list"> 
					<P>ALL GUESTS ARE LISTED BELOW :</P>
					<div class="search-results"><p class="search_result"></p> </div>
						<div class="table-cont " id="floor_form">
						
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>GUEST TYPE</td>
								<td>GUEST PREFERRED NAME</td>
								<td>EMAIL ADDRESS</td>
								<td>MOBILE</td>
								<td>COMPANY NAME</td>
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
								<td>GUEST TYPE</td>
								<td>GUEST PREFERRED NAME</td>
								<td>EMAIL ADDRESS</td>
								<td>MOBILE</td>
								<td>COMPANY NAME</td>
								<td></td>
							</tr>
						</thead>
						<tbody id="AllData"></tbody>
					</table>
					</div> 
					
						</div> 
						</div>
	<div id="myModal" class="modal delete-sorting">
 
  <!-- Modal content -->
  <div class="modal-content">
    <h4>POST (ADD) <span style="color:red">NOT SUCCESSFUL</span></h4>
	
    <p style="text-align:center">NO ENTRIES SELECTED.</p>
    <p style="text-align:center">USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
	
	<span class="close">OK</span>
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
      
	  if ($(this).val().length >= 0){
	
    var value = $(this).val().toLowerCase();
    $("#AllData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  var $trs = jQuery("#AllData tr:visible");
	$trs.filter("#AllData tr:odd").css("background-color", "#ffffff");
	$trs.filter("#AllData tr:even").css("background-color", "#d9d9d9");
    });
	  }else{
		// $('.search_result').hide();
	  }
  });
});
</script>

						
<script type="text/javascript">

		
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
		var id="<?=$data1->id;?>";
	var url="<?=base_url();?>post/AddPostGuest";
	$.ajax({  
		type: "POST",
		url: url, 
		data: {ids:val,id:id},
		success: function(data)
		{ 
		
			var data=$.trim(data);
			$.fancybox.getInstance('close');
			
             $.fancybox.open({
                src: '<?=base_url();?>post/viewAddProgramsSuccessful/'+data,
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
	  $.ajax({
	   url:"<?=base_url();?>post/PostGuestSingleData",
	   method:"GET", 
	   data:{clicked_id:clicked_id}, 
	   success:function(data)
	   {
		//console.log(data);
		$('.side-cont').hide();
		$('#ViewSingleData').html(data);
	   } 
	  })
	  currentid= clicked_id;
	
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);
	  
	 }
	 
	 
	 
</script>
	
<script>
$(document).ready(function(){

 load_data();
 
  $('#selectProgram').change(function(){
  var select_program = $('#selectProgram').val();
  var program_shortby = $('#selectShortBy').val();
  load_data(select_program,program_shortby);
 });
 
 $('#selectShortBy').change(function(){
	var select_program = $('#selectProgram').val();
  var program_shortby = $('#selectShortBy').val();
  load_data(select_program,program_shortby);
 });
 
 function load_data(select_program='',program_shortby='')
 {
	var id="<?=$data1->id;?>";
  $.ajax({
   url:"<?=base_url();?>post/addPostSearchList",
   method:"POST", 
   data:{select_program:select_program,program_shortby:program_shortby,id:id},
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
							<li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <li><a data-toggle="tab" href="" class="allassign">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN POST</a></li>
                            </ul>
                            <div class="table_info floor-step">
								<div class="side-cont">
                                <p><span class="current-bold">CURRENTLY SELECTED</span> :<p> POST (ADD)
								 <h5>STEP 2 OF 3</h5>
								 <p>SELECT POST OWNER.</p>
								 <p>CLICK NEXT WHEN DONE.</p>
								 </div>
                                 <table id="ViewSingleData" class="table-text-space">
								</table> 
                                
                            </div>
                            <div class="form-submit"> 
                                <!--a href="#" class="action-btn" id="btn5">Back</a-->
								
                                <!--a href="#" class="action-btn program_edit" id="btn5">NEXT</a-->
                                
                                <input type="submit" value="Next" class="action-btn" name="submit" id="submitbtn">
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

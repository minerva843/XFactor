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
.activebtn{
		background: #00b050!important;
		color: #fff !important;
	}
</style>
<div class="main-section" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM (ALL ASSIGNMENTS)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
							<option value="">SHOW ALL PROGRAM</option>
							<option value="program_not_completed">ALL PROGRAM NOT COMPLETED</option>
							<option value="program_completed">ALL PROGRAM COMPLETED</option>
							
						  </select>
						  </div>    
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="program_title">PROGRAM TITLE(A-Z)</option>
							<option value="program_status">PROGRAM STATUS(A-Z)</option>
							<option value="program_startdate_latest">PROGRAM START DATE & TIME(LATEST ON TOP)</option>
							<option value="program_startdate_earliest">PROGRAM START DATE & TIME(earliest ON TOP)</option>
							<option value="program_duration_shortest">PROGRAM DURATION(SHORTEST ON TOP)</option>
							<option value="program_duration_longest">PROGRAM DURATION(LONGEST ON TOP)</option>
							<option value="latest_created_program">Created(latest first)</option>
							<option value="earliest_created_program">Created(earliest first)</option>
							<option value="latest_edit_program">last edited(latest first)</option>
							<option value="earliest_edit_program">last edited(earliest first)</option>
						  </select>
							</div> 
							
							<!--div class="col-md-1"><button class="src-btn1" id="AddProgram">ADD</button></div-->
							<div class="col-md-1"><button class="src-btn1 ViewAssignment coledit">VIEW FLOORPLAN</button></div>
							<div class="col-md-1"><button class="src-btn1 deleteAction" >CLEAR ASSIGNMENT</button></div>
							<div class="col-md-1"><button class="src-btn1 clear-all-asinmnt" id="deleteAll">CLEAR ALL ASSIGNMENTS</button></div>
						  </div>   
							
							<div class="floor-table floor-sorting_list">
							
					<P>ALL PROGRAM ASSIGNMENTS ARE LISTED BELOW :</P>
					
					<div class="search-results"><p class="search_result"></p> </div>
						<div class="table-cont ">
						<form method="post" id="floor_form">
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>LAST EDIT</td>
								<td>PROGRAM ID</td>
								<td>PROGRAM TITLE</td>
								<td>STATUS</td>
								
								<td>FLOOR PLAN NAME </td>
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
								<td>PROGRAM ID</td>
								<td>PROGRAM TITLE</td>
								<td>STATUS</td>
								
								<td>FLOOR PLAN NAME </td>
								<td>POSITION</td>
								
								<td></td>
							</tr>
						</thead>
						<tbody id="AllData12"></tbody>
					</table>
					</div> 
					</form>
						</div> 
						</div>
	<div id="myModal" class="modal delete-sorting">

  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-body">
    <h4>CLEAR ASSIGNMENT <span style="color:red">NOT SUCCESSFUL</span></h4>
    <p>NO ENTRY SELECTED.</p>
    <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
  </div>
   <div class="modal-footer text-right"> <span class="close">OK</span> </div>	
  </div>
 

</div>
<div id="myModal1" class="modal delete-sorting">
   
  <!-- Modal content -->
  <div class="modal-content">
  <div class="modal-body">
	<h4>PROGRAM (View) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
    <p>NO ENTRY SELECTED.</p>
    <p>PLEASE SELECT AN ENTRY FIRST </p>
	
	   
  </div>    
<div class="modal-footer text-right"> <span class="close">OK</span> </div>
</div>
</div>
<script>
$(document).ready(function(){
	$('.close').click(function(){
		$('#myModal1').hide();
		$('#myModal').hide();
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
    $("#AllData12 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
	  }else{
		// $('.search_result').hide();
	  }
  });
  // $(".SER").on("keyup", function() {
	  // if ($(this).val().length){
		  // $('.search_result').show();
	  // $('.search_result').html('SEARCH RESULTS :');
    // var value = $(this).val().toLowerCase();
    // $("#AllData tr").filter(function() {
      // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    // });
	  // }else{
		// $('.search_result').hide();
	  // }
  // });
});
</script>
<script>

    $(document).ready(function () {
		 
		
		
		$("body").on('click','.allprogram',function(){
          
           $.fancybox.getInstance('close');
         
			$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>program/index",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
        });
		
		$("body").on('click','.assignProg',function(){
          
           $.fancybox.getInstance('close');
         
			$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>program/assignProgram",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
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
        src         : "<?php echo base_url(); ?>program/clearAllSelectedAssignment",
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
		
		
 
    }); 

</script>
						
<script type="text/javascript">

$(".deleteAction").click(function(){
	// $('.deletClass').show();
	// $('.form-submit').show();
	$('.deletClass').toggle();
	$('.deleteAction').toggleClass( "activebtn" );
	$('.form-submit').toggle(); 
	$('.coledit').removeClass( "activebtn" );
})
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
		
	var url="<?=base_url();?>program/programsingledelete";
	$.ajax({  
		type: "POST",
		url: url, 
		data: {delval:val},
		success: function(data)
		{ 
			var data=$.trim(data);
			$.fancybox.getInstance('close');
			
            
			$.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>program/clearSelectedAssignment",
        ajax: { 
           settings: { data : 'project=<?=$project?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
		}
	});
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
      //     alert(val2.length);
          $('#ViewSingleData').html('<tr><td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span>MULTIPLE PROGRAMS</p></td></tr>');

           }else{    
			  $.ajax({
			   url:"<?=base_url();?>program/allAssignmentSingleData",
			   method:"GET", 
			   data:{clicked_id:clicked_id}, 
			   success:function(data)
			   {
				//console.log(data);
				$('#ViewSingleData').html(data);
			   } 
			  })
	 }
	  currentid= clicked_id;
	
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);
	  
	 }
	 
	 $("body").on('click','.ViewAssignment',function(){
          $('.ViewAssignment').toggleClass( "activebtn" );
	$('.deleteAction').removeClass( "activebtn" );
          $('.deletClass').hide();
	$('.form-submit').hide();
           
		   if(currentid!=''){
			$.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/ViewAssignment/'+currentid,
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
            
        });
	 
</script>
	
<script>
$(document).ready(function(){

	$('.deletClass').hide();
	$('.form-submit').hide(); 
 load_data();
  
  $('#selectProgram').change(function(){
	  var Allsearch= $('.SER').val();
  var select_program = $('#selectProgram').val();
  var program_shortby = $('#selectShortBy').val();
  load_data(select_program,program_shortby,Allsearch);
 });
 
 $('#selectShortBy').change(function(){
	 var Allsearch= $('.SER').val();
	var select_program = $('#selectProgram').val();
  var program_shortby = $('#selectShortBy').val();
  load_data(select_program,program_shortby,Allsearch);
 });
$(".SER").on("keyup", function () { 
					var Allsearch= $(this).val();
					var select_program = $('#selectProgram').val();
					
					var program_shortby = $('#selectShortBy').val();
					load_data(select_program, program_shortby,Allsearch);
                                        
					});
 function load_data(select_program='',program_shortby='',Allsearch='')
 {
	
  $.ajax({
   url:"<?=base_url();?>program/allAssignmentSearchList",
   method:"POST", 
   data:{select_program:select_program,program_shortby:program_shortby,AllSearchData:Allsearch,project:<?=$project?>},
   success:function(data)
   {
 
    $('#AllData12').html(data);
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
							<li ><a data-toggle="tab" href="#menu1" class="allprogram">MAIN MENU</a></li>
                                <li class="active"><a data-toggle="tab" href="" class="allassignments">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li>
                            </ul>
                            <div class="table_info">  
                                
                                 <table id="ViewSingleData" class="table-text-space">
								</table> 
                                
                            </div>
                            <div class="form-submit delete-sorting" style="display:none;"> 
                                <input type="submit" value="Back" class="close-btn" name="back" id="btn5">
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

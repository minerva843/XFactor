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
                    <h2>POSTS</h2>
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
						   <select class="dropdown" id="selectProgram">
							<option value="">SHOW ALL POSTS</option>
							<option value="program_not_completed">ALL ASSIGNED POSTS ONLY</option>
							<option value="program_completed">ALL UNASSIGNED POSTS ONLY</option>
							
						  </select>
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SHORT BY</option>
							<option value="program_title">POST OWNER (A-Z)</option>
							<option value="program_status">POST TITLE (A-Z)</option>
							<option value="program_startdate_latest">POST CONTENT SET (1-5)</option>
							<option value="latest_created_program">Created(latest first)</option>
							<option value="earliest_created_program">Created(earliest first)</option>
							<option value="latest_edit_program">last edited(latest first)</option>
							<option value="earliest_edit_program">last edited(earliest first)</option>
						  </select>
							</div> 
							
							<div class="col-md-1"><button class="src-btn1" id="AddProgram">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1 program_edit">EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 deleteAction" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div>
						  </div>
							
							<div class="floor-table">
					<P>ALL POSTS ARE LISTED BELOW :</P>
						<div class="table-cont ">
						<form method="post" id="floor_form">
						
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>LAST EDIT</td>
								<td>POST ID</td>
								<td>POST OWNER</td>
								<td>POST TITLE</td>
								<td>POST CONTENT SET</td>
								<td>INFO ICON COUNT</td>
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
								<td>POST ID</td>
								<td>POST OWNER</td>
								<td>POST TITLE</td>
								<td>POST CONTENT SET</td>
								<td>INFO ICON COUNT</td>
								
								<td></td>
							</tr>
						</thead>
						<tbody id="AllData"></tbody>
					</table>
					</div>
					</form>
						</div> 
						</div>
	<div id="myModal" class="modal delete-sorting">

  <!-- Modal content -->
  <div class="modal-content">
    <h4>DELETE <span style="color:red">NOT SUCCESSFUL</span></h4>
	
    <p style="text-align:center">NO ENTRIES SELECTED.</p>
    <p style="text-align:center">USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
	
	<span class="close">OK</span>
  </div>

</div>
<script>
$(document).ready(function(){
  $(".SER").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#AllData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>

    $(document).ready(function () {
		 
		$("body").on('click','#deleteAll',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>program/deleteAllprograms',
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

        });
		
		 $("body").on('click','#AddProgram',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>post/addpost',
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
 
    }); 

</script>
						
<script type="text/javascript">

$(".deleteAction").click(function(){
	$('.deletClass').show();
	$('.form-submit').show();
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
                src: '<?=base_url();?>program/programSelectMultidelete',
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
	   url:"<?=base_url();?>program/searchSingleData",
	   method:"GET", 
	   data:{clicked_id:clicked_id}, 
	   success:function(data)
	   {
		//console.log(data);
		$('#ViewSingleData').html(data);
	   } 
	  })
	  currentid= clicked_id;
	
	  $('.rightcheck').hide();
	  $('.rightcheck'+currentid).show();
	  $('.rightcheck'+currentid).prop('checked', true);
	  
	 }
	 
	 $("body").on('click','.program_edit',function(){
          
           $.fancybox.getInstance('close');
		   if(currentid!=''){
			
            $.fancybox.open({
                src: '<?=base_url();?>program/editprogramstep1/'+currentid,
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
			$.fancybox.open({
                src: '<?=base_url();?>program/index',
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
	 
</script>
	
<script>
$(document).ready(function(){

	$('.deletClass').hide();
	$('.form-submit').hide();
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
	
  $.ajax({
   url:"<?=base_url();?>program/search",
   method:"POST", 
   data:{select_program:select_program,program_shortby:program_shortby},
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
				               
                            </ul>
                            <div class="table_info">
                                
                                 <table id="ViewSingleData">
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

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  

 
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
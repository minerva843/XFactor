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
                    <h2>GUESTS</h2>
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
						   <select class="dropdown" id="selectData">
							<option value="">SHOW ALL GUESTS</option>
							<option value="allproject_not_started">ALL PRESENT</option>
							<option value="allproject_completed">ALL ABSENT</option>
							<option value="allproject_shop">ALL ORGANISER ONLY</option>
							<option value="allproject_demo">ALL SPONSORS ONLY</option>
							
						  </select>
						  </div>
						  <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="project_name_asc">GUEST TYPE (A-Z)</option>
							<option value="project_start_latest">FIRST NAME (A-Z)</option>
							<option value="project_start_earliest">LAST NAME  (A-Z)</option>
							<option value="project_start_earliest">COMPANY NAME  (A-Z)</option>
							<option value="project_start_earliest">EMAIL ADDRESS (A-Z)</option>
							<option value="project_start_earliest">CREATED (LATEST FIRST)</option>
							<option value="project_start_earliest">CREATED (EARLIEST FIRST)</option>
							<option value="project_start_earliest">LAST EDITED (LATEST FIRST)</option>
							<option value="project_start_earliest">LAST EDITED (EARLIEST FIRST)</option>
							
						  </select>
							</div> 
	
							<div class="col-md-1"><button class="src-btn1" id="AddGuest">ADD</button></div>
							<div class="col-md-1"><button class="src-btn1 editguest">EDIT</button></div>
							<div class="col-md-1"><button class="src-btn1 deleteAction" >DELETE</button></div>
							<div class="col-md-1"><button class="src-btn1" id="deleteAll">DELETE ALL</button></div>
						  </div>
							
							<div class="floor-table project-table">
					<P>ALL GUESTS ARE LISTED BELOW :</P>
					
						<div class="table-cont ">
						<form method="post" id="floor_form">
						
						
						<div class="table-fixed-class">
						<table style="margin-top: -40px;">
						<thead>
						<tr class="table-title" style="background:#d9d9d9;">
						<td id="first-td">&nbsp;&nbsp;</td>
						        <td>LAST EDIT</td>
								<td>GUEST ID</td>
								<td>REG TYPE</td>
								<td>GUEST TYPE</td> 
								<td>FIRST NAME</td>
								<td>LAST NAME</td>
								<td>COMPANY NAME</td>
								<td>EMAIL ADDRESS</td>
								<td>CONTACT NUMBER</td>
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
								<td>GUEST ID</td>
								<td>REG TYPE</td>
								<td>GUEST TYPE</td> 
								<td>FIRST NAME</td>
								<td>LAST NAME</td>
								<td>COMPANY NAME</td>
								<td>EMAIL ADDRESS</td>
								<td>CONTACT NUMBER</td>
								    
								<td></td>           
							</tr>   
						</thead>
						<tbody>
						      <tr class=" ">
								<td class="deletesingle">
								</td>
								<td>NIL</td>
								<td>XCPR8180257249</td>
								<td>saw</td> 
								<td>HYBRID NO REG REQURIED</td>
								<td>JONY</td>
								<td>NOT STARTED</td>
								<td>Xconnect</td>
								<td>Admin@admin.com</td>
								<td>98000XXX</td> 
								<td class="chk2">
								</td> 
							  </tr>
							  
							   <tr class=" ">
								<td class="deletesingle">
								</td>
								<td>NIL</td>
								<td>XCPR8180257249</td>
								<td>saw</td> 
								<td>HYBRID NO REG REQURIED</td>
								<td>JONY</td>
								<td>NOT STARTED</td>
								<td>Xconnect</td>
								<td>Admin@admin.com</td>
								<td>98000XXX</td> 
								<td class="chk2">
								</td> 
							  </tr>
							  
							  
							   <tr class=" ">
								<td class="deletesingle">
								</td>
								<td>NIL</td>
								<td>XCPR8180257249</td>
								<td>saw</td> 
								<td>HYBRID NO REG REQURIED</td>
								<td>JONY</td>
								<td>NOT STARTED</td>
								<td>Xconnect</td>
								<td>Admin@admin.com</td>
								<td>98000XXX</td> 
								<td class="chk2">
								</td> 
							  </tr>
						
						</tbody>
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
                src: '<?=base_url();?>test/deleteAll',
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
		
	$("body").on('click','#AddGuest',function(){
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>test/addguest',
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




// $("body").on('click','#submitbtn',function(){
// var ids = [];
// $('.deletClas:checked').each(function(i, e) {
    // ids.push($(this).val());

// });
  // var strids =  ids.join(',');
 // console.log(strids);     
       // $.fancybox.open({
        // maxWidth  : 800,
        // fitToView : true,
        // width     : '100%',
        // height    : 'auto',
        // autoSize  : true,
        // type        : "ajax",
        // src         : "<?=base_url();?>project/deleteSelectedProjects",
        // ajax: { 
           // settings: { data : 'ids='+strids, type : 'POST' }
        // }
    // });
            
// }); 

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
		
	  $.ajax({
	   url:"<?=base_url();?>project/searchSingleData",
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
	 
	 $("body").on('click','.editguest',function(){
          
           $.fancybox.getInstance('close');
		   if(currentid!=''){
			
            $.fancybox.open({
                src: '<?=base_url();?>test/edit/',
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
			$.fancybox.open({
                src: '<?=base_url();?>project/index',
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
 
  $('#selectData').change(function(){
  var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  load_data(selectData,selectShortBy);
 });
 
 $('#selectShortBy').change(function(){
	var selectData = $('#selectData').val();
  var selectShortBy = $('#selectShortBy').val();
  load_data(selectData,selectShortBy);
 });
 
 function load_data(selectData='',selectShortBy='')
 {
	
  $.ajax({
   url:"<?=base_url();?>project/search",
   method:"POST", 
   data:{selectData:selectData,selectShortBy:selectShortBy},
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
                                
				                <li><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li class=""><a data-toggle="tab" href="#menu1">GUEST LISTS</a></li>
								<li class=""><a data-toggle="tab" href="#menu1">ASSIGN GUESTS</a></li>
								
				               
                            </ul>
                            <div class="table_info">
                                
							<table>

							<tr>
							<td colspan="2" class="top-fp"><p><span class="current-bold">CURRENTLY SELECTED:</span> GUEST NAME</p></td>  
							</tr>
							<tr>
							<td colspan="2" class="top-fc"><h5 class="spc_cl">GUEST CREATION INFO</h5></td>
							</tr>
							<tr>
							<td>Group</td>
							<td>CUSTOMER 01 GROUP</td>
							</tr>
							<tr class="table-spacing">
							<td>Group Status</td> 
							<td>LIVE</td>
							</tr>
							
							<tr >
							<td>GUEST ID</td> 
							<td>XCG123456789034</td>
							</tr>
							
							<tr>
							<td>GUEST REGISTRATION TYPE</td> 
							<td>PREREGWB</td>
							</tr>
							
							<tr>
							<td>GUEST TYPE</td> 
							<td>ORGANISER</td>
							</tr>
							
							<tr>
							<td>MASS UPLOAD FILE NAME</td> 
							<td>20200625_FILE_THAT_WAS_UP...</td>
							</tr>
							
							<tr>
							<td>CREATED DATE & TIME</td> 
							<td>20200528, 0705h</td>
							</tr>
							
							<tr>
							<td>CREATED IP ADDRESS</td> 
							<td>100 . 123 . 2 .253</td>
							</tr>
							
							<tr>
							<td>CREATED XMANAGE ID </td> 
							<td>XM123456789012</td>
							</tr>
							<tr>
							<td>CREATED USER NAME</td> 
							<td> JOHN.JOHNNY@XMANAGE.LIVE</td>
							</tr>
							<tr>
							<td>LAST EDITED DATE & TIME</td> 
							<td> 20200609, 1700h</td>
							</tr>
							
							<tr>
							<td>LAST EDITED IP ADDRESS </td> 
							<td>100 . 123 . 1 . 154</td>
							</tr>
							
							<tr>
							<td>LAST EDITED XMANAGE ID</td> 
							<td>XM123456789012</td>
							</tr>
							
							<tr>
							<td>LAST EDITED USER NAME</td> 
							<td>JOHN.JOHNNY@XMANAGE.LIVE</td>
							</tr>
							
							<tr>
							<td colspan="2" class="spc_clas"><b style="font-size: 16px;">GUEST PERSONAL INFO</b></td>
							</tr>
							
							<tr>
							<td>SALUTATION</td> 
							<td>MR</td>
							</tr>
							
							<tr>
							<td>FIRST NAME</td> 
							<td>JOHN</td>
							</tr>
							
							<tr>
							<td>LAST NAME</td> 
							<td>JOHNNY</td>
							</tr>
							
							<tr>
							<td>DISPLAYED / PRINTED NAME</td> 
							<td>JOHN JONNY HERE</td>
							</tr>
							
							<tr>
							<td>GENDER</td> 
							<td>MALE / FEMALE / COMPANY</td>
							</tr>
							
							<tr>
							<td>DISPLAY PHOTO</td> 
							<td>DEFAULT MALE</td>
							</tr>   
							   
							<tr>
							<td>QUICK INTRO </td> 
							<td>NIL / USER INPUT</td>
							</tr>

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
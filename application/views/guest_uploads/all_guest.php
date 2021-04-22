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
<?php session_start();
$rand=rand(1000,9999);
 ?>
<div class="main-section poject-listing-QT" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GUEST LISTS <span id="actiontopText"style="font-size:18px;" ></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btngueststepall"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body">
            <div class="row">
                <div class="col-md-9">  
                    <div class="master-floorplan">
                        <div class="floor-sec"> 
                            <div class="tab-listing">
                                <div class="row master-filters"> 
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectData">
                                           <option value="">SHOW ALL GUEST LISTS</option>

                                           <?php foreach($gtypes as $guest_type){ ?>
                                           <option value="<?php echo $guest_type; ?>"><?php echo $guest_type; ?></option>
                                           
                                          <?php  } ?>

                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" name="sortBy" id="selectShortByupload">
                                                      <option value="">SORT BY</option>
                                                      <option value="file-a-z">GFILE NAME (A-Z)</option>
							
							<option value="GUEST_created_first">CREATED (LATEST FIRST)</option>
							<option value="GUEST_created_earliest">CREATED (EARLIEST FIRST)</option>
							<option value="GUEST_edited_first">LAST EDITED (LATEST FIRST)</option>
							<option value="GUEST_edited_earliest">LAST EDITED (EARLIEST FIRST)</option>
                                        </select>
                                    </div> 

                                    <div class="col-md-1"><button class="src-btn1" id="AddGUEST">ADD</button></div>
                                    
                                    <div class="col-md-1"><button class="src-btn1 deleteAction" id="deleteGUESTSupload" >DELETE</button></div>
                                    <div class="col-md-1"><button data-action="DELETE" class="src-btn1" id="deleteAll">DELETE ALL</button></div>
                                </div>

                                <div class="floor-table GUEST-table  GUEST-table-listing-list">
                                    <P>AALL GUEST LISTS ARE LISTED BELOW :</P>
									<P>TOTAL GUEST COUNT : <b><span id="countdata"></span></b></P>
                                    <div class="search-results"><p class="search_result"></p> </div>
                                    <div class="table-cont ">
                                        <form method="post" id="floor_form">


                                            <div class="table-fixed-class">
                                                <table style="margin-top: -40px;">
											<thead>
											<tr class="table-title" style="background:#d9d9d9;">
											<td id="first-td">&nbsp;&nbsp;</td>
											<td>UPLOADED</td>
											<td>GUEST LIST ID </td>
											<td>MASS UPLOAD FILE NAME</td>
											<td>FILE TYPE</td> 
											<td>FILE SIZE</td>
											<td>NUMBER OF INSERTS TO DATABASE</td>
											
											
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
											<td>UPLOADED</td>
											<td>GUEST LIST ID </td>
											<td>MASS UPLOAD FILE NAME</td>
											<td>FILE TYPE</td> 
											<td>FILE SIZE</td>
											<td>NUMBER OF INSERTS TO DATABASE</td>
											
											<td></td>           
											</tr>   
											</thead>
                                                    <tbody id="AllData3636"></tbody>
                                                </table>  
                                            </div>   
                                        </form>
                                    </div>      
                                </div>    
                                <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
									<div class="modal-body">
                                        <h4>GUESTS (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>NO ENTRY SELECTED.</p>
                                        <p>Please select an entry first to EDIT.</p>          
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
					</div>    
     
                                <div id="myModal23" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> GUEST LISTS (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span> </div>								
                                   </div> 									

                                </div> 

                                <style>
                                    .activebtn{
                                        background: #00b050!important;
                                        color: #fff !important;
                                    }

                                </style>                                                    

                                <script>
                                    $(document).ready(function () {
										 $("#btn5").click(function () {
												$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTSupload").removeClass("activebtn");
												$("#actiontopText").hide();
													
													$('.deletClass').hide();
													//$('.form-submit').hide();
													$('.deletClas:checked').removeAttr('checked');
													$(".deletClass").removeClass('hide');
													
													
											});
											
											
			 
										$("#editGUEST").click(function () {
											currentid = '';
											$("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#deleteGUESTSupload").removeClass("activebtn");
											$("#currentlyViewing").css("visibility","hidden");
                                            $(this).toggleClass("activebtn");
                                            $('.deletClass').hide();
                                             $('.form-submit').show();
                                             $('.form-submit').css("display","block");
                                             $(".form-submit-btn").toggleClass('hide');
                                            if($(this).hasClass('activebtn')){
						                     $("#actiontopText").show();
						                     $('.form-submit-btn').removeClass('hide');
                                                 $("#actiontopText").text(" (EDIT) ");
                                                 $("#currentlyViewing").css("display","contents !important");
												 let txt = $(".textGUESTname").text();
												console.log(txt);
												$("#ViewSingleData<?=$rand;?>").find('#multipleGUESTSelect').text(txt);    
                                            }else{
						                        $("#actiontopText").hide();
                                                //$("#currentlyViewing").css("display","contents");
												 $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("visibility", "hidden");
												 
												  $("#ViewSingleData<?=$rand;?>").empty().html('<p><span "current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>');
												  $('.rightcheck ').css("display","none");
                                            }
                                             
                                        });
										
									
					     $("#deleteGUESTSupload").click(function () {
											
					      currentid = '';
                                            $("#editGUEST").removeClass("activebtn");
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                             $('.form-submit').css("display","block");
                                              $('.rightcheck').css("display","none");
                                            // $(".form-submit").toggleClass('hide');
                                            $(this).toggleClass("activebtn");
                                            
                                            if($(this).hasClass('activebtn')){
											 //    $(".form-submit-btn").removeClass('hide');
												   $('.deletClass').show();
                                                 $(".deletClass").removeClass('hide');
                                                 $("#actiontopText").show();
                                                 $("#actiontopText").text(" (DELETE) ");
												
						   $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("display", "contents");
												
						   var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
                                                  }else{
						   $("#ViewSingleData<?=$rand;?>").find("#multipleGUESTSelect").text(" NO GUEST LIST SELECTED");
						   $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO GUEST SELECTED</p>');
												  	
												
										            }
												
												
												
                                                 
                                                 
                                            }else{
												  $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>');
												  $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleData<?=$rand;?>").find('#multipleGUESTSelect').text(txt);
												$("#ViewSingleData<?=$rand;?>").find('#currentlyViewing').css("visibility", "hidden");
												
												
												  var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
										      	 $("#ViewSingleData<?=$rand;?>").find("#multipleGUESTSelect").text(" NO GUEST LIST SELECTED");
										          }
											}
                                          
                                        });

                                        


                                        // $("#editGUEST").toggleClass('activebtn');


                                        $('.close').click(function () {
                                            var modal = document.getElementById("myModal23");
                                            modal.style.display = "none";
                                            
                                            var modal2 = document.getElementById("myModal1");
                                            modal2.style.display = "none";
                                        });
                                        $(".SER").on("keyup", function () {
                                            $("#ViewSingleData<?=$rand;?>").empty();
                                            if ($(this).val().length >= 1) {
                                                $('.search_result').show();
                                                $('.search_result').html('SEARCH RESULTS :');
                                            } else {
                                                $('.search_result').hide();
                                            }

                                            
                                        });
                                    });
                                </script>
                                <script>

       $(document).ready(function () {                              
       $("body").on('click','#deleteAll',function(){
          
       $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>file_upload/deleteSelectedGUESTSupload",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           
                       
            
        }); 
                                        
                                        
        $('body').on('click', '#close-btngueststepall', function () {
          $.fancybox.close();

        });
										
                                        
 
      $("body").on('click','#AddGUEST',function(){

          
      $.fancybox.getInstance('close');
      $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>file_upload/upload_guest_file',
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

                                  
                                    
                                    
                                    
        $("#btn5allGUEST233232").click(function(){
                                        
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Guest/index",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
    });
                                        
                                    });


                                    $(".deletClas").click(function (event) {
                                        event.preventDefault();
                                        var searchIDs = $(".deletClas input:checkbox:checked").map(function () {
                                            return $(this).val();
                                        }).get(); // <----
                                        console.log(searchIDs);
                                    });
                                    
                                   
                                    
                                    
       $("#submitbtnfileupload").click(function () {                                                            
       if($("#editGUEST").hasClass('activebtn')){                                 
        if (currentid != '') {
        $.fancybox.getInstance('close');                                                               
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type      : "ajax",
        src: '<?= base_url(); ?>guest/addstep1/'+currentid+'/EDIT',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
         clickSlide: false,
         clickOutside: false
    });
                                            

                                        } else {
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
        src         : "<?php echo base_url(); ?>file_upload/deleteSelectedGUESTSupload",
        ajax: { 
           settings: { data : 'ids='+strids+'&project='+'<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
         clickSlide: false,
         clickOutside: false
    });
    
    }else{
    
     
	            var modal2 = document.getElementById("myModal23");
				var span = document.getElementsByClassName("close")[0];
				modal2.style.display = "block";
				span.onclick = function() {
				  modal2.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal2) {
					modal2.style.display = "none";
				  }
				}
	 
	 
	 
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
                                            $("#ViewSingleData<?=$rand;?>").find("#multipleGUESTSelect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData<?=$rand;?>").find("#currentlyViewing").show();
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-GUEST");
											$("#ViewSingleData<?=$rand;?>").find('#multipleGUESTSelect').text(pr);
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
											
											
											                 if($("#deleteGUESTSupload").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData<?=$rand;?>").find("#multipleGUESTSelect").text("NO GUEST LIST SELECTED");
 
                                               }else{
						//alert();
                                               $("#currentlyViewing").css("visibility","hidden");
                                               }
											 
										}

                                        }
				
                                        
                                    }


                                    reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                        
                                        $.ajax({
                                            url: "<?= base_url(); ?>file_upload/searchSingleDataUpload",
                                            method: "GET",
                                            data: {clicked_id: clicked_id},
                                            success: function (data)
                                            {


                                                $('#ViewSingleData<?=$rand;?>').html(data);
                                                check_multiple_select();
												
						
                                                
                                               if($("#deleteGUESTSupload").hasClass('activebtn')){                                                 
                                                 $("#currentlyViewing").css("display","contents");
 
                                               }else{
						 
                                               }

                                            }
                                        });



                                        //    }
                                        currentid = clicked_id;

                                        $('.rightcheck').hide();
                                        $('.rightcheck' + currentid).show();
                                        $('.rightcheck' + currentid).prop('checked', true);

                                    }

 

                                </script>
                                <script>



                                    $(document).ready(function () {

                                        $('.deletClass').hide();
                                     //   $('.form-submit').hide();

                                        load_data();
					$(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
                                         $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>');
					var Allsearch= $(this).val();
					var selectData = $('#selectData').val();
					$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTSupload").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                        var selectShortBy = $('#selectShortByupload').val();
                                        load_data(selectData, selectShortBy,Allsearch);
                                        
					});
                                        $('#selectData').change(function () {
                                             $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>');
					    var Allsearch= $('.SER').val();
						$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTSupload").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortByupload').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });





                                        $('#selectShortByupload').change(function () {
                                             $("#ViewSingleData<?=$rand;?>").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO GUEST LIST SELECTED</p>');
					    var Allsearch=$('.SER').val();
												$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTSupload").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortByupload').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });
                                        
                                 

                                        function load_data(selectData = '', selectShortBy = '',Allsearch='')
                                        {
											
                                            $.ajax({
                                                url: "<?= base_url(); ?>file_upload/search",
                                                method: "POST",
                                                data: {selectData: selectData, selectShortBy: selectShortBy,AllSearchData:Allsearch,project:<?=$project_select?>},
                                                success: function (data2)
                                                {
                                                   
                                                    $('#AllData3636').empty();
                                                    
						      var data1=JSON.parse(data2);
                                                    $('#AllData3636').html(data1.data);
                                                    $('#countdata').html(data1.countdata);
                                                }
                                            })
                                        }

                                        $("body").on('click', '.deletesingle', function () {

                                            var numberOfChecked = $('input:checkbox:checked').length;

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
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->

                                <li class=""><a id="btn5allGUEST233232" data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <li class="active"><a id="" data-toggle="tab" href="#menu2">GUEST LIST</a></li>

                            </ul>
                            <div class="table_info">
								<div class="current-status">
									<table id="ViewSingleData<?=$rand;?>">
									</table> 
								</div>
                            </div>

                          
                            <div class="form-submit delete-sorting" style="display:none;" > 
                                <a href="#" style="display:none;" class="action-btn form-submit-btn" name="back" id="btn5allGUEST233232">BACK</a>
                                <!--input type="submit" value="Back" class="close-btn" name="back" id="btn5"-->
                                <input type="button" value="Next" class="action-btn form-submit-btn"  name="submit" id="submitbtnfileupload">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  



    </div>

</div>
<style>

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 20%; /* Location of the box */
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
<script>
    $(document).ready(function () {

        $("select").change(function () {
            if ($(this).val() == "")
                $(this).css({color: "#6c757d"});
            else
                $(this).css({color: "#000000"});
        });

    });
</script>

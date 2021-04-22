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
<?php session_start(); ?>
<div class="main-section poject-listing-QT" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROGRAM <span id="actiontopText"style="font-size:18px;" ></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone);  ?>
                    <div class="master-floorplan">
                        <div class="floor-sec"> 
                            <div class="tab-listing">
                                <div class="row master-filters"> 
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectData">
                                            <option value="">SHOW ALL PROGRAM</option>
							<option value="program_not_completed">ALL PROGRAM NOT COMPLETED</option>
							<option value="program_completed">ALL PROGRAM COMPLETED</option>
                                        </select>
                                    </div> 
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
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

                                    <div class="col-md-1"><button class="src-btn1" id="AddProject">ADD</button></div>
                                    <div class="col-md-1"><button data-action="EDIT" class="src-btn1 floor_edit" id="ProgrameditProject">EDIT</button></div>
                                    <div class="col-md-1"><button class="src-btn1 ProgramdeleteAction" id="ProgramdeleteProjects" >DELETE</button></div>
                                    <div class="col-md-1"><button data-action="DELETE" class="src-btn1" id="ProgramdeleteAll">DELETE ALL</button></div>
                                </div>     

                                <div class="floor-table project-table  project-table-listing all_program">
                                    <P>ALL PROGRAM ARE LISTED BELOW :</P> <br>
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
								<td>START DATE & TIME</td>
								<td>DURATION </td>
								<td>LOCATION</td>
								<td>ASSIGNED</td>
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
								<td>START DATE & TIME</td>
								<td>DURATION </td>
								<td>LOCATION</td>
								<td>ASSIGNED</td>

                                                            <td></td>           
                                                        </tr>   
                                                    </thead>
                                                    <tbody id="AllData"></tbody>
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
                                    $(document).ready(function () {
										 $("#btn5").click(function () {
												$("#ProgrameditProject").removeClass("activebtn");
												$("#ProgramdeleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
													
													$('.deletClass').hide();
													$('.form-submit').hide();
													$('.deletClas:checked').removeAttr('checked');
													$(".deletClass").removeClass('hide');
													
											});
                                       $("#ProgrameditProject").click(function () {
											//alert("edit");
											currentid=""; 
											$("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
											$('.rightcheck ').css("display","none");
												
										    $(".deletClas"). prop("checked", false);
                                            $("#ProgramdeleteProjects").removeClass("activebtn");
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
												 
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
												  $('.rightcheck ').css("display","none");    
                                            }
                                             
                                        });
										$("#ProgramdeleteProjects").click(function () {
											
											//alert("delete");
                                            $("#ProgrameditProject").removeClass("activebtn");
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');
											//$('.deletClass').toggle();
                                              $('.rightcheck').css("display","none");
                                            // $(".form-submit").toggleClass('hide');
                                            $(this).toggleClass("activebtn");
                                            
                                            if($(this).hasClass('activebtn')){
											     $(".form-submit-btn").removeClass('hide');
												   $('.deletClass').show();
												   $('.form-submit').show();
                                                 $(".deletClass").removeClass('hide');
                                                 $("#actiontopText").show();
                                                 $("#actiontopText").text(" (DELETE) ");
												// $("#currentlyViewing").css("display","none");
												$("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
												//$(".chk2").css("display","none");
						
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
                                                  }else{
											    ///  $(".chk2").css("display","none");
											      $("#ViewSingleData").find("#multipleprojectselect").text("NO PROGRAM SELECTED");
												   $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING : </span> NO PROGRAM SELECTED</p>');
												  	
												
										            }
												
												
												
                                                 
                                                 
                                            }else{
												  $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
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
											
										      	 $("#ViewSingleData").find("#multipleprojectselect").text("NO PROGRAM SELECTED");
										          }
											}
                                          
                                        });

                                        


                                        // $("#ProgrameditProject").toggleClass('activebtn');


                                        $('.closeprogram').click(function () {
                                            var modal = document.getElementById("myModalprogram");
                                            modal.style.display = "none";
                                            
                                            var modal2 = document.getElementById("myModal1program");
                                            modal2.style.display = "none";
                                        });
                                        $(".SER").on("keyup", function () {
                                            $("#ViewSingleData").empty();
                                            if ($(this).val().length >= 1) {
                                                $('.search_result').show();
                                                $('.search_result').html('SEARCH RESULTS :');
                                            } else {
                                                $('.search_result').hide();
                                            }

                                            // if ($(this).val().length >= 0) { 

                                                // var value = $(this).val().toLowerCase();
                                                // $("#AllData tr").filter(function () {
                                                    // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) 
													// var $trs = jQuery("#AllData tr:visible");
	// $trs.filter("#AllData tr:odd").css("background-color", "#ffffff");
	// $trs.filter("#AllData tr:even").css("background-color", "#d9d9d9");
                                                    
                                                // });
                                            // } 
                                        });
                                    });
                                </script>
                                <script>

                                    $(document).ready(function () {
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
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
		
		$("body").on('click','.allassignments',function(){
          
           $.fancybox.getInstance('close');
            
			$.fancybox.open({ 
			maxWidth  : 800,
			fitToView : true,
			width     : '100%',
			height    : 'auto', 
			autoSize  : true,
			type        : "ajax",
			src         : "<?php echo base_url(); ?>program/allassignments",
			ajax: { 
			   settings: { data : 'project=<?=$project;?>', type : 'POST' }
			},
			touch: false,
					clickSlide: false,
			clickOutside: false
			
		});
            
        });
                                        $("body").on('click', '#ProgramdeleteAll', function () {
											$.fancybox.getInstance('close');
            
											$.fancybox.open({ 
											maxWidth  : 800,
											fitToView : true,
											width     : '100%',
											height    : 'auto', 
											autoSize  : true,
											type        : "ajax",
											src         : "<?php echo base_url(); ?>program/deleteAllprograms",
											ajax: { 
											   settings: { data : 'project=<?=$project;?>', type : 'POST' }
											},
											touch: false,
													clickSlide: false,
											clickOutside: false
											
										});
                                            

                                        });

                                        $('body').on('click', '.close-btn', function () {
                                            $.fancybox.close();

                                        });

                                        $("body").on('click', '#AddProject', function () {
                                            $.fancybox.getInstance('close');
                                            
											$.fancybox.open({
												maxWidth  : 800,
												fitToView : true,
												width     : '100%',
												height    : 'auto',
												autoSize  : true,
												type        : "ajax",
												src         : "<?php echo base_url(); ?>program/addprogram",
												ajax: { 
												   settings: { data : 'project=<?=$project;?>', type : 'POST' }
												},
												touch: false,
														clickSlide: false,
												clickOutside: false
												
											});

                                        });

                                    });

                                </script>

                                <script type="text/javascript">

                                   
                                    
                                    
                                    
                                    $("#btn5allproject").click(function(){
                                        
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                src: '<?= base_url(); ?>program/index',
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
									


                                    $(".deletClas").click(function (event) {
                                        event.preventDefault();
                                        var searchIDs = $(".deletClas input:checkbox:checked").map(function () {
                                            return $(this).val();
                                        }).get(); // <----
                                        console.log(searchIDs);
                                    });
                                    
                                   
                                    
                                    
                                    $("#Programsubmitbtn").click(function () {
                                        
                                        
                                        if($("#ProgrameditProject").hasClass('activebtn')){
                                            
                                            if (currentid != '') {
                                            $.fancybox.getInstance('close');
                                            
                                            
                                            
                                       
                                            
                                            
                                                    $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?= base_url(); ?>program/editprogramstep1/' + currentid,
        ajax: { 
           settings: { data : 'project=<?=$project;?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
                                            
                                            
                                            
                                            
                                            
                                        } else {
                                            var modal = document.getElementById("myModal1program");
                                            var span = document.getElementsByClassName("closeprogram")[0];
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
                                            
                                            var val = [];
	$('.deletClas:checked').each(function(i){
	  val[i] = $(this).val();
	}); 
if(val==''){
		var modal = document.getElementById("myModalprogram");
		var span = document.getElementsByClassName("closeprogram")[0];
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
                     touch: false,
					 					 		 clickSlide: false,
        clickOutside: false
                }
            });
		}
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

                                        }
                                          
                                        
                                    }


                                    reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                        
                                        $.ajax({
                                            url: "<?= base_url(); ?>program/searchSingleData",
                                            method: "GET",
                                            data: {clicked_id: clicked_id},
                                            success: function (data)
                                            {


                                                $('#ViewSingleData').html(data);
                                                check_multiple_select();
                                                
                                               if($("#ProgramdeleteProjects").hasClass('activebtn')){                                                 
                                                 $("#currentlyViewing").css("display","contents;");
 
                                               }else{
						//alert();
                                                $("#currentlyViewing").remove();
                                               }

                                            }
                                        });



                                        //    }
                                        currentid = clicked_id;

                                        $('.rightcheck').hide();
                                        $('.rightcheck' + currentid).show();
                                        $('.rightcheck' + currentid).prop('checked', true);

                                    }

//                                    $("body").on('click', '.floor_edit', function () {
//                                        if (currentid != '') {
//                                            $.fancybox.getInstance('close');
//                                            $.fancybox.open({
//                                                src: '<?= base_url(); ?>project/editstep1/' + currentid,
//                                                type: 'ajax',
//                                                ajax: {
//                                                    settings: {data: 'ABC', type: 'POST'}
//                                                },
//                                                opts: {
//                                                    afterShow: function (instance, current) {
//                                                        console.info('done!');
//                                                    },
//                                                    touch: false,
//                                                    clickSlide: false,
//                                                    clickOutside: false
//                                                }
//                                            });
//                                        } else {
//                                            var modal = document.getElementById("myModal1");
//                                            var span = document.getElementsByClassName("close")[0];
//                                            modal.style.display = "block";
//                                            span.onclick = function () {
//                                                modal.style.display = "none";
//                                            }
//                                            window.onclick = function (event) {
//                                                if (event.target == modal) {
//                                                    modal.style.display = "none";
//                                                }
//                                            }
//                                            
//                                        }
//
//                                    });

                                </script>
                                <script>



                                    $(document).ready(function () {

                                        $('.deletClass').hide();
                                        $('.form-submit').hide();

                                        load_data();
					$(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
                                         $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
					var Allsearch= $(this).val();
					var selectData = $('#selectData').val();
					$("#ProgrameditProject").removeClass("activebtn");
												$("#ProgramdeleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                        var selectShortBy = $('#selectShortBy').val();
                                        load_data(selectData, selectShortBy,Allsearch);
                                        
					});
                                        $('#selectData').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
					    var Allsearch= $('.SER').val();
						$("#ProgrameditProject").removeClass("activebtn");
												$("#ProgramdeleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });

                                        $('#selectShortBy').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO PROGRAM SELECTED</p>');
					    var Allsearch=$('.SER').val();
												$("#ProgrameditProject").removeClass("activebtn");
												$("#ProgramdeleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide(); 
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val(); 
                                            var selectShortBy = $('#selectShortBy').val();
											console.log(selectShortBy)
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });

                                        function load_data(selectData = '', selectShortBy = '',Allsearch='')
                                        {
											
                                            $.ajax({ 
                                                url: "<?= base_url(); ?>program/search",
                                                method: "POST", 
                                                data: {select_program: selectData, program_shortby: selectShortBy,AllSearchData:Allsearch,project:<?=$project;?>},  
                                                success: function (data)
                                                {
                                                    //console.log(data); 
                                                    $('#AllData').html(data);
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

                                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
								<li><a data-toggle="tab" href="" class="allassignments">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li>

                            </ul>
                            <div class="table_info">
								<div class="current-status">
									<table id="ViewSingleData">
									</table> 
								</div>
                            </div>

                            <?php
                            if (!empty($_SESSION['SelectedIds'])) {
                                $showbtn = '';
                            } else {
                                $showbtn = 'style="display:none;"';
                            }
                            ?>
                            <div class="form-submit delete-sorting" <?php echo $showbtn; ?> > 
                                <a href="#" style="display:none;" class="action-btn form-submit-btn" name="back" id="btn5allproject">BACK</a>
                                <!--input type="submit" value="Back" class="close-btn" name="back" id="btn5"-->
                                <input type="button" value="Next" class="action-btn form-submit-btn" name="submit" id="Programsubmitbtn">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  



    </div>

</div>


                                <div id="myModal1program" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
									<div class="modal-body">
                                        <h4>PROGRAM (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>NO ENTRY SELECTED.</p>
                                        <p>Please select an entry first to EDIT.</p>          
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close closeprogram">OK</span> </div>									

                                </div>    
					</div>    
     
                                <div id="myModalprogram" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> PROGRAM (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close closeprogram">OK</span> </div>								
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

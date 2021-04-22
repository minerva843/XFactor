<style>
    tr {
        cursor: pointer;
    }

    option {
        padding-bottom: 15px;
        padding-top: 15px;
    }

    .register-form span {
        display: contents;
    }

    .deletesingle label {
        display: none;
    }
</style>
<style>
    .fancybox-close-small {
        display: none !important;
    }
</style>
<?php
$assignid=rand(1000,9999);
$removeid=rand(1000,9999);
?>
<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>WHAT'S HOT (ASSIGN ENTRIES) <span id="actiontopText" style="font-size:18px;"></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" id="close-btn"></div>
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
                                            <option value="">SHOW ALL ENTRIES</option>
                                           <option value="INFO">SHOW ALL INFO ONLY</option>
							<option value="PROMOTION">SHOW ALL PROMO ONLY</option>
							<option value="CONTEST">SHOW ALL CONTEST ONLY</option>
							<option value="LUCKY DRAW">SHOW ALL LUCKY DRAW ONLY</option>
							<option value="assigned">SHOW ALL ASSIGNED ONLY</option>
							<option value="unassigned">SHOW ALL UNASSIGNED ONLY</option>


                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBy11">
                                            <option value="">SORT BY</option>
                                             <option value="whatshot_title">WHAT'S HOT ENTRIES (A-Z)</option>
											<option value="last_edit">last edited(latest first)</option>

                                        </select>
                                    </div>

                                    <div class="col-md-1"><button class="src-btn1" id="enablechats">ASSIGN</button></div>
                                    <div class="col-md-1"><button class="src-btn1" id="disablechats">REMOVE</button></div>
                                </div>

                                <div class="floor-table whatshotslot-list-shorting">
                                    <P>ALL WHAT'S HOT ENTRIES ARE LISTED BELOW :</P>
                                    
                                    <!-- <p>TOTAL GUEST (ENABLED) COUNT : </p>
                                    <p>TOTAL GUEST (DISABLED) COUNT : </p> -->
                                    <div class="search-results">
                                        <p class="search_result"></p>
                                    </div>
                                    <!--<div class="search-results"><p class="search_result"></p> </div> -->
                                    <div class="table-cont ">
                                        <form method="post" id="floor_form">
                                            <div class="table-fixed-class">
                                                <table style="margin-top: -40px;">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9;">
                                                            <td id="first-td">&nbsp;&nbsp;</td>
                                                            <td>LAST EDIT</td>
															<td>SLOT NU</td>
                                                           <td>ENTRY ID</td>
								
								<td>TITLE</td>
								<td>FILE NAME</td>
								<td>FILE TYPE</td>
								<td>FILE URL</td>
								<td>ASSIGNED</td>
                                                            <!-- <td>NO OF GROUP CHAT </td>
                                                            <td>NO OF INDIVIDUAL CHAT </td> -->
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
															<td>SLOT NU</td>
                                                            <td>ENTRY ID</td>
								
								<td>TITLE</td>
								<td>FILE NAME</td>
								<td>FILE TYPE</td>
								<td>FILE URL</td>
								<td>ASSIGNED</td>
                                                            <!-- <td>NO OF GROUP CHAT </td>
                                                            <td>NO OF INDIVIDUAL CHAT </td> -->
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


                                <div id="myModal2enable" class="modal delete-sorting">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4> WHAT'S HOT (ASSIGN) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
                                            <p>NO ENTRY SELECTED.</p>
                                            <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                        </div>
                                        <div class="modal-footer text-right"><span data-dismiss="modal" class="closeenable close">OK</span> </div>
                                    </div>
                                </div>
                                <div id="myModal1disable" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4> WHAT'S HOT (REMOVE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
                                            <p>NO ENTRY SELECTED.</p>
                                            <p>PLEASE SELECT AN ENTRY FIRST </p>
                                        </div>
                                        <div class="modal-footer text-right"><span data-dismiss="modal" class="close closedisable">OK</span> </div>
                                    </div>
                                </div>


                                <style>
                                    .activebtn {
                                        background: #00b050 !important;
                                        color: #fff !important;
                                    }
                                </style>  
                                <script>
                                    $(document).ready(function() {

                                        // $("#disablechats").click(function() {
                                            // $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>");
                                            // $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>");
                                            // $('.rightcheck ').css("display", "none");
                                            // $('.deletesingle label').removeClass('hide');
                                            // $('.deletesingle label').css('display', 'inline-block');
                                            // $('#submitbtndel<?=$assignid;?>').css('display', 'inline-block');
                                            // $(".deletClas").prop("checked", false);
                                            // $("#enablechats").removeClass("activebtn");
                                            // $("#currentlyViewing").css("display", "contents");
                                            // $(this).toggleClass("activebtn");
                                            
                                            // $('.form-submit').show();
                                            // $(".form-submit-btn").toggleClass('hide');
                                            // if ($(this).hasClass('activebtn')) {

                                                // $("#actiontopText").show();
                                                // $('.form-submit-btn').removeClass('hide');
                                                // $("#actiontopText").text(" , REMOVE ");
                                                // $("#currentlyViewing").css("display", "contents !important");
                                                // let txt = $(".textprojectname").text();
                                                // console.log(txt);
                                                // $("#ViewSingleDataSlot").find('#multipleprojectselect').text(txt);

											// $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap'>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>");

                                                // var val23 = [];

                                                // $('.deletClas:checked').each(function() {
                                                    // val23.push($('.deletClas:checked').val());
                                                // });

                                                // if (val23.length) {
                                                    // var val22 = val2.length + 1;
												// }

                                            // } else {
                                                // $("#actiontopText").hide();
                                                // $("#ViewSingleDataSlot").find('#currentlyViewing').css("display", "contents");
                                                // $("#ViewSingleDataSlot").empty().html("<p><span>CURRENTLY SELECTED : </span> NO WHAT'S HOT SELECTED</p>");
                                                // $('.rightcheck').css("display", "none");
                                                // $('#submitbtndel<?=$assignid;?>').css("display", "none");
                                                // $(".deletClas").prop("checked", false);
                                                // $('.deletesingle label').css('display', 'none');
                                            // }

                                        // });
										
										$("#disablechats").click(function () {
											
											//alert("delete");
                                            $("#enablechats").removeClass("activebtn");
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
                                                 $("#actiontopText").text(", REMOVE ");
												// $("#currentlyViewing").css("display","none");
												$("#ViewSingleDataSlot").find('#currentlyViewing').css("display", "contents");
												//$(".chk2").css("display","none");
						
												
												 var val23 = [];

                                                $('.deletClas:checked').each(function () {
                                                 val23.push($('.deletClas:checked').val());
                                                  });

                                                  if (val23.length) {
                                                  var val22 = val2.length + 1;
                                                  }else{
											    ///  $(".chk2").css("display","none");
											      $("#ViewSingleDataSlot").find("#multipleprojectselect").text("NO SLOT SELECTED");
												   $("#ViewSingleDataSlot").empty().html("<p><span class='current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p><p><span current-bold>CURRENTLY VIEWING : </span> NO SLOT SELECTED</p>");
												  	
												 
										            }
								  
                                            }else{
												  $("#ViewSingleDataSlot").empty().html("<p><span class='current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");
												  $('.rightcheck ').css("display","none");
												
												$("#actiontopText").hide();
												$(".deletClas"). prop("checked", false);
												let txt = $("#ViewSingleDataSlot").find('#currentlyViewing').find('.pname').text();
												console.log(txt);
												$("#ViewSingleDataSlot").find('#multipleprojectselect').text(txt);
												$("#ViewSingleDataSlot").find('#currentlyViewing').css("display", "none");
												
												
												  var val23 = [];

                                                  $('.deletClas:checked').each(function () {
                                                   val23.push($('.deletClas:checked').val());
                                                 });

                                                 if (val23.length >= 1) {
                                                  var val22 = val2.length + 1;
                                                 }else{
											
										      	 $("#ViewSingleDataSlot").find("#multipleprojectselect").text("NO SLOT SELECTED");
										          }
											}
                                          
                                        });

                                        $("#enablechats").click(function() {

                                            $('.deletesingle label').css('display', 'inline-block');
                                            $("#disablechats").removeClass("activebtn");
                                            $('#submitbtndel<?=$assignid;?>').css('display', 'inline-block');
                                           // $(".deletClass").toggleClass('hide');
                                            $(".deletClass").addClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');

                                            $('.rightcheck').css("display", "none");
                                            $(this).toggleClass("activebtn");

                                            if ($(this).hasClass('activebtn')) {

                                                $(".form-submit-btn").removeClass('hide');
                                                // $('.deletClass').show();
                                                // $(".deletClass").removeClass('hide');
                                                $("#actiontopText").show();
                                                $("#actiontopText").text(" , ASSIGN ");
                                                $("#submitbtndel<?=$assignid;?>ete").css("display", "block");

                                                $("#ViewSingleDataSlot").find('#currentlyViewing').css("display", "contents");

                                                $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");

                                                var val23 = [];

                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length) {
                                                    var val22 = val2.length + 1;
                                                } else {
                                                    $("#ViewSingleDataSlot").find("#multipleprojectselect").text("NO SLOT SELECTED");
                                                    $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");

                                                }

                                            } else {


                                                $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");
                                                $('.rightcheck ').css("display", "none");
                                                $('#submitbtndel<?=$assignid;?>').css("display", "none");
                                                $("#actiontopText").hide();
                                                $(".deletClas").prop("checked", false);
                                                let txt = $("#ViewSingleDataSlot").find('#currentlyViewing').find('.pname').text();
                                                console.log(txt);
                                                $("#ViewSingleDataSlot").find('#multipleprojectselect').text(txt);
                                                $("#ViewSingleDataSlot").find('#currentlyViewing').css("display", "none");

                                                var val23 = [];
                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length >= 1) {
                                                    var val22 = val2.length + 1;
                                                } else if(val23.length==1){
										 
												
					 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                        let pr = $(this).attr("data-project");
					  $("#ViewSingleDataSlot").find('#multipleGUESTSelect').text(pr);
                                        });
																			
					}else {

                                                    $("#ViewSingleDataSlot").find("#multipleGUESTSelect").text("NO SLOT SELECTED");
                                                }

                                                $('.rightcheck').css("display", "none");

                                            }

                                        });



                                        $(".SER").on("keyup", function() {

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
                                    $(document).ready(function() {

                                        

                                        $('body').on('click', '.close-btn', function() {
                                            $.fancybox.close();
                                            location.reload();

                                        });






                                    });
                                </script>


                                <script>
                                    $("body").on('click', '#submitbtndel<?=$assignid;?>', function() {
                                        if ($("#enablechats").hasClass('activebtn')) {
                                            var ids = [];
                                            $('.deletClas:checked').each(function(i, e) {
                                                ids.push($(this).val());

                                            });

                                            if (currentid != '') {
                                                //alert(ids.length);   
                                                $.fancybox.getInstance('close');

                                                var strids = ids.join(',');
                                                console.log(strids);
                                                $.fancybox.open({
                                                    maxWidth: 800,
                                                    fitToView: true,
                                                    width: '100%',
                                                    height: 'auto',
                                                    autoSize: true,
                                                    type: "ajax",
                                                    src: "<?php echo base_url(); ?>whats_hot/assignslots",
                                                    ajax: {
                                                        settings: {
                                                            data: 'ids=' + currentid + '&action=ASSIGN',
                                                            type: 'POST'
                                                        }
                                                    },
                                                    touch: false,
                                                    clickSlide: false,
                                                    clickOutside: false
                                                });

                                            } else {


                                                var modal = document.getElementById("myModal2enable");
                                                var span = document.getElementsByClassName("closeenable")[0];
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




                                        } else {

                                            var ids = [];
                                            $('.deletClas:checked').each(function(i, e) {
                                                ids.push($(this).val());

                                            });

                                            if (ids.length) {

                                                $.fancybox.getInstance('close');

                                                var strids = ids.join(',');
                                                console.log(strids);
                                                $.fancybox.open({
                                                    maxWidth: 800,
                                                    fitToView: true,
                                                    width: '100%',
                                                    height: 'auto',
                                                    autoSize: true,
                                                    type: "ajax",
                                                    src: "<?php echo base_url(); ?>whats_hot/deleteSelected",
                                                    ajax: {
                                                        settings: {
                                                            data: 'ids=' + strids + '&action=REMOVE',
                                                            type: 'POST'
                                                        }
                                                    },
                                                    touch: false,
                                                    clickSlide: false,
                                                    clickOutside: false
                                                });

                                            } else {

                                                var modal = document.getElementById("myModal1disable");
                                                var span = document.getElementsByClassName("closedisable")[0];
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

                                        }

                                    });
   

                                    load_data();
                                    $(".SER").on("keyup", function() {

                                        $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");

                                        var Allsearch = $(this).val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy11').val();
                                        load_data(zone, shortby, Allsearch);

                                    });
                                    $('#selectZone').change(function() {
                                        $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");

                                        var Allsearch = $('.SER').val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy11').val();
                                        load_data(zone, shortby, Allsearch);
                                    });

                                    $('#selectShortBy11').change(function() {
                                        $("#ViewSingleDataSlot").empty().html("<p><span class='work-shop_gap current-bold'>CURRENTLY SELECTED : </span> NO SLOT SELECTED</p>");

                                        var Allsearch = $('.SER').val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy11').val();
                                        load_data(zone, shortby, Allsearch);
                                    });

                                    function load_data(guest = '', shortby = '', Allsearch = '') {

                                        $.ajax({
                                            url: "<?= base_url(); ?>whats_hot/searchassign",
                                            method: "POST",
                                            data: {
                                                selectData: guest,
                                                selectShortBy: shortby,
                                                AllSearchData: Allsearch
                                                
                                            },
                                            success: function(data) {
                                                //console.log(data);
                                                $('#AllData').html(data);




                                            }
                                        });
                                    }

                                    function check_multiple_select() {

                                        var val2 = [];

                                        $('.deletClas:checked').each(function() {
                                            val2.push($('.deletClas:checked').val());
                                        });

                                        if (val2.length > 1) {
                                            var val22 = val2.length + 1;
                                        }

                                        console.log('val2 length ',val2.length);
                                        if (val2.length > 1) {
                                            $('#currentlyViewing').css("display", "contents !important");
                                            $("#ViewSingleDataSlot").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleDataSlot").find("#currentlyViewing").show();
                                        } else if (val2.length == 1) {


                                            var val233 = [];

                                            $('.deletClas:checked').each(function() {
                                                let pr = $(this).attr("data-project");
                                                $("#ViewSingleDataSlot").find('#multipleprojectselect').text(pr);
                                            });

                                        } else {

                                            var val23 = [];

                                            $('.deletClas:checked').each(function() {
                                                val23.push($('.deletClas:checked').val());
                                            });

                                            if (val23.length) {
                                                var val22 = val2.length + 1;
                                            } else {


                                                if ($("#disablechats").hasClass('activebtn')) {
                                                    $("#ViewSingleDataSlot").find("#multipleprojectselect").text("NO SLOT SELECTED");

                                                } else {
                                                    //alert();
                                                    //$("#currentlyViewing").css("visibility", "hidden");
                                                }

                                            }

                                        }


                                    }

                                    /*                                 
 getDataOnclick(); 
 function getDataOnclick(){
 
 	  $.ajax({
	   url:"<?= base_url(); ?>chat/searchSingleDataGuest",
	   method:"POST", 
	   data:{zone:0}, 
	   success:function(data)
	   {
		 		
	       $('#ViewSingleDataSlot').html(data);
          
                
	   } 
	  });
 
 } */





                                    // $("body").on('click', '.view', function() {

                                        // let guest = $(this).attr("id");
                                        // $.ajax({
                                            // url: "<?= base_url(); ?>whats_hot/searchSingleData",
                                            // method: "GET",
                                            // data: {
                                                // clicked_id: guest
												
                                            // },
                                            // success: function(data) { 
                                                // $('#ViewSingleDataSlot').empty();
                                                // $('#ViewSingleDataSlot').html(data);
                                                // check_multiple_select();


                                                // if ($("#delete_zone").hasClass('activebtn')) {
                                                    // $("#currentlyViewing").css("display", "contents");

                                                // } else {

                                                   
                                                // }


                                            // }
                                        // })

                                       
                                        // currentid = guest;
                                        // $("#editAction").attr("data-id", currentid);
                                        // $("#delete_zone").attr("data-id", currentid);
                                        // $('.rightcheck').hide();
                                        // $('.rightcheck' + currentid).show();
                                        // $('.rightcheck' + currentid).prop('checked', true);





                                    // });
									reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                        
                                        $.ajax({
                                            url: "<?= base_url(); ?>whats_hot/searchSingleData",
                                            method: "GET",
                                            data: {clicked_id: clicked_id,assign:true},
                                            success: function (data)
                                            {


                                                $('#ViewSingleDataSlot').html(data);
                                                check_multiple_select();
                                                
                                               if($("#disablechats").hasClass('activebtn')){                                                 
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
									$("#index").click(function(){
                                        
                                            $.fancybox.getInstance('close');
                                            
											 $.fancybox.open({
												maxWidth  : 800,
												fitToView : true, 
												width     : '100%',
												height    : 'auto',
												autoSize  : true,
												type        : "ajax",
												src         : "<?php echo base_url(); ?>whats_hot/index",
												ajax: { 
												   settings: { data : 'project=', type : 'POST' }
												},
												touch: false,
														clickSlide: false,
												clickOutside: false
												
											});
                                        
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 right-text master-floor-left whats-hot-right">
                    <div class="tab right-tabs">

                        <div class="table-content">
                            <ul class="nav nav-tabs ">
                                <li><a data-toggle="tab" href="" id="index">MAIN MENU</a></li>

                               <li><a data-toggle="tab" href="" class="active" id="posticon_assignment">ASSIGN ENTRIES</a></li>


                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleDataSlot">
 
                                </table>

                            </div>
                            <div class="form-submit" style="display:none;" id="submitbtndel<?=$assignid;?>ete">
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5allzones">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtndel<?=$assignid;?>">
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
    .fancybox-close-small {
        display: none;
    }

    .error {
        color: red !important;
    }
</style>

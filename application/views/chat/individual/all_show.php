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
<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>INDIVIDUAL CHATS <span id="actiontopText" style="font-size:18px;"></span></h2>
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
                                            <option value="">SHOW ALL CHAT USERS</option>
                                            <option value="all-enabled">ALL USERS (ENABLED) ONLY</option>
                                            <option value="all-disabled">ALL USERS (DISABLED) ONLY</option>


                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBy">
                                            <option value="">SORT BY</option>
                                            <option value="chat-status">CHAT STATUS</option>
                                            <option value="guest-type">GUEST TYPE</option>
                                            <option value="guest-name-a-z">GUEST NAME (A –Z)</option>
                                            <option value="email-a-z">EMAIL ADDRESS (A –Z)</option>

                                        </select>
                                    </div>

                                    <div class="col-md-1"><button class="src-btn1" id="enablechats">ENABLE</button></div>
                                    <div class="col-md-1"><button class="src-btn1" id="disablechats">DISABLE</button></div>
                                </div>

                                <div class="floor-table chats-list-shorting">
                                    <P>ALL INDIVIDUAL CHAT USERS ARE LISTED BELOW :</P>
                                    <p>TOTAL GUEST COUNT : <?php echo $totalUserCount;?></p>
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
                                                            <td>CHAT STATUS</td>
                                                            <td>GUEST TYPE</td>
                                                            <td>PREFERRED NAME</td>
                                                            <td>EMAIL ADDRESS</td>
                                                            <td>MOBILE</td>
                                                            <td>COMPANY NAME</td>
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
                                                            <td>CHAT STATUS</td>
                                                            <td>GUEST TYPE</td>
                                                            <td>GUEST PREFERRED NAME</td>
                                                            <td>EMAIL ADDRESS </td>
                                                            <td>MOBILE</td>
                                                            <td>COMPANY NAME</td>
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
                                            <h4> CHAT (ENABLE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
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
                                            <h4> CHAT (DISABLE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
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

                                        $("#disablechats").click(function() {
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');
                                            $('.rightcheck ').css("display", "none");
                                            $('.deletesingle label').removeClass('hide');
                                            $('.deletesingle label').css('display', 'inline-block');
                                            $('#indivsubmitbtndel').css('display', 'inline-block');
                                            $(".deletClas").prop("checked", false);
                                            $("#enablechats").removeClass("activebtn");
                                            $("#currentlyViewing").css("display", "contents");
                                            $(this).toggleClass("activebtn");
                                            // $('.deletClass').hide();
                                            $('.form-submit').show();
                                            $(".form-submit-btn").toggleClass('hide');
                                            if ($(this).hasClass('activebtn')) {

                                                $("#actiontopText").show();
                                                $('.form-submit-btn').removeClass('hide');
                                                $("#actiontopText").text(" (DISABLE) ");
                                                $("#currentlyViewing").css("display", "contents !important");
                                                let txt = $(".textprojectname").text();
                                                console.log(txt);
                                                $("#ViewSingleData").find('#multipleprojectselect').text(txt);




                                            } else {
                                                $("#actiontopText").hide();
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
                                                $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');
                                                $('.rightcheck').css("display", "none");
                                                $('#indivsubmitbtndel').css("display", "none");
                                                $(".deletClas").prop("checked", false);
                                                $('.deletesingle label').css('display', 'none');
                                            }

                                        });

                                        $("#enablechats").click(function() {

                                            $('.deletesingle label').css('display', 'inline-block');
                                            $("#disablechats").removeClass("activebtn");
                                            $('#indivsubmitbtndel').css('display', 'inline-block');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');

                                            $('.rightcheck').css("display", "none");
                                            $(this).toggleClass("activebtn");

                                            if ($(this).hasClass('activebtn')) {

                                                $(".form-submit-btn").removeClass('hide');
                                                $('.deletClass').show();
                                                $(".deletClass").removeClass('hide');
                                                $("#actiontopText").show();
                                                $("#actiontopText").text(" (ENABLE) ");
                                                $("#submitbtndelete").css("display", "block");

                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");

                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');

                                                var val23 = [];

                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length) {
                                                    var val22 = val2.length + 1;
                                                } else {
                                                    $("#ViewSingleData").find("#multipleprojectselect").text("NO GUEST SELECTED");
                                                    $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');

                                                }

                                            } else {


                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO INDIVIDUAL CHAT SELECTED</p>');
                                                $('.rightcheck ').css("display", "none");
                                                $('#indivsubmitbtndel').css("display", "none");
                                                $("#actiontopText").hide();
                                                $(".deletClas").prop("checked", false);
                                                let txt = $("#ViewSingleData").find('#currentlyViewing').find('.pname').text();
                                                console.log(txt);
                                                $("#ViewSingleData").find('#multipleprojectselect').text(txt);
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "none");

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
					  $("#ViewSingleData").find('#multipleGUESTSelect').text(pr);
                                        });
																			
					}else {

                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO INDIVIDUAL CHAT SELECTED");
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

                                        $("body").on('click', '#group_chat_list', function() {
                                            //let zoneid =  $("#editAction").attr("data-id");

                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?= base_url(); ?>chat/group_chat_list",
                                                ajax: {
                                                    settings: {
                                                        data: 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                        });

                                        $("body").on('click', '#chat_logs_list', function() {
                                            //let zoneid =  $("#editAction").attr("data-id");

                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?= base_url(); ?>chat/chat_logs_list",
                                                ajax: {
                                                    settings: {
                                                        data: 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                        });

                                        $('body').on('click', '.close-btn', function() {
                                            $.fancybox.close();
                                            location.reload();

                                        });






                                    });
                                </script>


                                <script>
                                    $("body").on('click', '#indivsubmitbtndel', function() {
                                        if ($("#enablechats").hasClass('activebtn')) {
                                            var ids = [];
                                            $('.deletClas:checked').each(function(i, e) {
                                                ids.push($(this).val());

                                            });

                                            if (ids.length) {
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
                                                    src: "<?php echo base_url(); ?>chat/enabledisableChat",
                                                    ajax: {
                                                        settings: {
                                                            data: 'ids=' + strids + '&project=' + '<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=ENABLE',
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
                                                    src: "<?php echo base_url(); ?>chat/enabledisableChat",
                                                    ajax: {
                                                        settings: {
                                                            data: 'ids=' + strids + '&project=' + '<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>&action=DISABLE',
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

                                        $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

                                        var Allsearch = $(this).val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy').val();
                                        load_data(zone, shortby, Allsearch);

                                    });
                                    $('#selectZone').change(function() {
                                        $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

                                        var Allsearch = $('.SER').val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy').val();
                                        load_data(zone, shortby, Allsearch);
                                    });

                                    $('#selectShortBy').change(function() {  
                                        $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

                                        var Allsearch = $('.SER').val();
                                        var zone = $('#selectZone').val();
                                        $("#editAction").removeClass("activebtn");
                                        $("#delete_zone").removeClass("activebtn");
                                        $("#actiontopText").hide();
                                        $('.deletClass').hide();
                                        $('.form-submit').hide();
                                        $('.deletClas:checked').removeAttr('checked');
                                        $(".deletClass").removeClass('hide');
                                        var shortby = $('#selectShortBy').val();
                                        load_data(zone, shortby, Allsearch);
                                    });

                                    function load_data(guest = '', shortby = '', Allsearch = '') {

                                        $.ajax({
                                            url: "<?= base_url(); ?>chat/searchIndividual",
                                            method: "POST",
                                            data: {
                                                guest: guest,
                                                selectShortBy: shortby,
                                                AllSearchData: Allsearch,
                                                project: <?php echo $project_select; ?>
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
                                            $("#ViewSingleData").find("#multipleGUESTSelect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData").find("#currentlyViewing").show();
                                        } else if (val2.length == 1) {


                                            var val233 = [];

                                            $('.deletClas:checked').each(function() {
                                                let pr = $(this).attr("data-project");
                                                $("#ViewSingleData").find('#multipleGUESTSelect').text(pr);
                                            });

                                        } else {

                                            var val23 = [];

                                            $('.deletClas:checked').each(function() {
                                                val23.push($('.deletClas:checked').val());
                                            });

                                            if (val23.length) {
                                                var val22 = val2.length + 1;
                                            } else {


                                                if ($("#delete_zone").hasClass('activebtn')) {
                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GUEST SELECTED");

                                                } else {
                                                    //alert();
                                                    $("#currentlyViewing").css("visibility", "hidden");
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
		 		
	       $('#ViewSingleData').html(data);
          
                
	   } 
	  });
 
 } */





                                    $("body").on('click', '.view', function() {

                                        let guest = $(this).attr("id");
                                        $.ajax({
                                            url: "<?= base_url(); ?>chat/searchSingleDataGuest",
                                            method: "POST",
                                            data: {
                                                guest: guest,
												project:<?=$project_select;?>
                                            },
                                            success: function(data) { 
                                                $('#ViewSingleData').empty();
                                                $('#ViewSingleData').html(data);
                                                check_multiple_select();


                                                if ($("#delete_zone").hasClass('activebtn')) {
                                                    $("#currentlyViewing").css("display", "contents");

                                                } else {

                                                    //  $("#currentlyViewing").remove();
                                                }


                                            }
                                        })

                                        //      }
                                        currentid = guest;
                                        $("#editAction").attr("data-id", currentid);
                                        $("#delete_zone").attr("data-id", currentid);
                                        $('.rightcheck').hide();
                                        $('.rightcheck' + currentid).show();
                                        $('.rightcheck' + currentid).prop('checked', true);





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
                                <li><a data-toggle="tab" href="#home" class="active">INDIVIDUAL CHATS </a></li>

                                <li class="" id="group_chat_list"><a data-toggle="tab" href="#">GROUP CHATS</a></li>

                                <li class="" id="chat_logs_list"><a data-toggle="tab" href="#">CHAT LOGS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData">

                                </table>

                            </div>
                            <div class="form-submit" style="display:none;" id="submitbtndelete">
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5allzones">
                                <input type="button" value="Next" class="action-btn" name="submit" id="indivsubmitbtndel">
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

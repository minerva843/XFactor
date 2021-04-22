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
                    <h2>GROUPS (PERMISSIONS) <span id="actiontopText" style="font-size:18px;"></span></h2>
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
                                        <select class="dropdown" name="workshop" id="selectZone11">
                                            <option value="">SHOW ALL GROUP</option>
											<option value="live">SHOW ALL ACTIVE ONLY</option>
                                            <option value="suspended">SHOW ALL SUSPENDED ONLY</option>
                                            <option value="reserved">SHOW RESERVED ONLY</option>
                                            <option value="not_reserved">SHOW NOT RESERVED ONLY</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBygroupchat11">
                                            <option value="">SORT BY</option>
                                            <option value="group-type-a-z">GROUP TYPE (A – Z)</option>
                                            
                                            <option value="group-chat-a-z">GROUP NAME (A -Z)</option>
                                            <option value="user-count-least">NO OF USERS (LEAST ON TOP)</option>
                                            <option value="user-count-most">NO OF USERS (MOST ON TOP)</option>
                                            
                                            <option value="created_first">CREATED (LATEST FIRST)</option>
                                            <option value="created_earliest">CREATED (EARLIEST FIRST)</option>
                                            <option value="edited_first">LAST EDITED (LATEST FIRST)</option>
                                            <option value="edited_earliest">LAST EDITED (EARLIEST FIRST)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1"><button class="src-btn1 " id="editActionpermission">EDIT PERMISSIONS</button></div>
                                    
                                </div>      

                                <div class="floor-table user-permsn-list-shorting">
                                    <P>ALL GROUPS ARE LISTED BELOW :</P>
                                    <br>
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
                                                            <td>GROUP ID</td>
                                                            <td>GROUP TYPE</td>
                                                            <td>GROUP STATUS</td>
                                                            <td>GROUP NAME</td>
                                                            <td>NUMBER OF USERS</td>
                                                            <td> GRANTED PERMISSIONS FOR CONFIG PAGE TABS</td>
                                                            
                                                           

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
                                                            <td>GROUP ID</td>
                                                            <td>GROUP TYPE</td>
                                                            <td>GROUP STATUS</td>
                                                            <td>GROUP NAME</td>
                                                            <td>NUMBER OF USERS</td>
                                                            <td> GRANTED PERMISSIONS FOR CONFIG PAGE TABS</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AllData2groupuserpermission">


                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
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

                  $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span>  NO GROUPS SELECTED.</p>');
                                        $("#editActionpermission").click(function() {
                                            zone_id = "";
                                            $("#editActionpermission").attr("data-id", "");

                                            $("#delete_zone").attr("data-id", "");
                                            //$("#delete_zone").removeClass("activebtn");

                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span>  NO GROUPS SELECTED.</p>');
                                            $('.rightcheck ').css("display", "none");

                                            $(".deletClas").prop("checked", false);
                                            $("#delete_zone").removeClass("activebtn");
                                            $("#currentlyViewing").css("display", "contents");
                                            $(this).toggleClass("activebtn");
                                            $('.deletClass').hide();
                                            $('.form-submit').show();
                                            $(".form-submit-btn").toggleClass('hide');
                                            if ($(this).hasClass('activebtn')) {

                                                $("#actiontopText").show();
                                                $('.form-submit-btn').removeClass('hide');
                                                $("#actiontopText").text(" (EDIT) ");
                                                $("#currentlyViewing").css("display", "contents !important");
                                                let txt = $(".textprojectname").text();
                                                console.log(txt);
                                                $("#ViewSingleData").find('#multipleprojectselect').text(txt);




                                            } else {
                                                $("#actiontopText").hide();
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED.</p>');
                                                $('.rightcheck').css("display", "none");
                                            }

                                        });


                                        $("#delete_zone").click(function() {


                                            $("#editActionpermission").attr("data-id", "");
                                            $("#delete_zone").attr("data-id", "");

                                            $("#editActionpermission").removeClass("activebtn");
                                            // $(".deletClass").addClass('hide');
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');

                                            $('.rightcheck').css("display", "none");
                                            $(this).toggleClass("activebtn");

                                            if ($(this).hasClass('activebtn')) {
                                                $('#submitbtndelgrouppermission').removeClass('hide');
                                                $(".form-submit-btn").removeClass('hide');
                                                $('.deletClass').show();
                                                $(".deletClass").removeClass('hide');
                                                $("#actiontopText").show();
                                                $("#actiontopText").text(" (DELETE) ");
                                                $("#submitbtndelete").css("display", "block");
                                                // $("#currentlyViewing").css("display","none");
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED.</p><p><span class="current-bold">CURRENTLY VIEWING:</span> NO GROUPS SELECTED.</p>');  




                                                var val23 = [];

                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length) {
                                                    var val22 = val2.length + 1;
                                                } else {
                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GROUPS SELECTED.");
                                                    $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED</p><p><span class="current-bold">CURRENTLY VIEWING:</span> NO GROUPS SELECTED</p>');

  
                                                }

                                            } else {
                                               
                                                $('#submitbtndelgrouppermission').addClass('hide');
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUP SELECTED</p>');
                                                $('.rightcheck ').css("display", "none");

                                                $("#actiontopText").hide();
                                                $(".deletClas").prop("checked", false);
                                                let txt = $("#ViewSingleData").find('#currentlyViewing').find('.pname').text();
                                                console.log(txt);
                                                $("#ViewSingleData").find('#multipleGUESTSelect').text(txt);
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "none");


                                                var val23 = [];

                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length >= 1) {
                                                    var val22 = val2.length + 1;
                                                }else if(val22.length==1){
										 
												
					 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                        let pr = $(this).attr("data-project");
					  $("#ViewSingleData").find('#multipleGUESTSelect').text(pr);
                                        });
																			
					} else {

                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GROUPS SELECTED.");
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



                                        $("body").on('click', '#deleteAll', function() {

                                            $.fancybox.getInstance('close');

                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?= base_url(); ?>chat/deleteSelectedGroupChats",
                                                ajax: {
                                                    settings: {
                                                        data: '',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });



                                        });


                                    });
                                </script>


                                <script>
                                    $(document).ready(function() {

                                        $("body").on('click', '#openallusergroup09909667', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/showAllgroups",
                                                ajax: {
                                                    settings: {
                                                        data: '',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                        });
                                        
                                        
                                        
                                        
 $("body").on('click','#assi89989gnuser4748',function(){
$.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/usersGroupListassign",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});



                                        $("body").on('click', '#addNewUserGroup', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/addNewUserGroup",
                                                ajax: {
                                                    settings: {
                                                        data: '',
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                        });



                                        $("body").on('click', '#submitbtndelgrouppermission', function() {
                                            if ($("#editActionpermission").hasClass('activebtn')) {

                                                let grp_id = $("#editActionpermission").attr("data-id");
                                                let project_id = '<?php echo $project_select; ?>';
                                                if (grp_id) {
                                                    $.fancybox.getInstance('close');
                                                    $.fancybox.open({
                                                        maxWidth: 800,
                                                        fitToView: true,
                                                        width: '100%',
                                                        height: 'auto',
                                                        autoSize: true,
                                                        type: "ajax",
                                                        src: '<?= base_url(); ?>UserManage/editGroupPermissions/' + grp_id,
                                                        ajax: {
                                                            settings: {
                                                                data: '',
                                                                type: 'POST'
                                                            }
                                                        },
                                                        touch: false,
                                                        clickSlide: false,
                                                        clickOutside: false

                                                    });


                                                } else {

                                                    var modal1 = document.getElementById("myModal1usergroup");
                                                    var span = document.getElementsByClassName("closeeditgroup")[0];
                                                    modal1.style.display = "block";
                                                    $(".modal").css("display", "block !important");
                                                    span.onclick = function() {
                                                        modal1.style.display = "none";
                                                    }
                                                    window.onclick = function(event) {
                                                        if (event.target == modal) {
                                                            modal1.style.display = "none";
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
                                                    $.fancybox.open({
                                                        maxWidth: 800,
                                                        fitToView: true,
                                                        width: '100%',
                                                        height: 'auto',
                                                        autoSize: true,
                                                        type: "ajax",
                                                        src: "<?php echo base_url(); ?>UserManage/deleteSelectedGroupUsers",
                                                        ajax: {
                                                            settings: {
                                                                data: 'ids=' + strids,
                                                                type: 'POST'
                                                            }
                                                        },
                                                        touch: false,
                                                        clickSlide: false,
                                                        clickOutside: false
                                                    });

                                                } else {


                                                    var modal = document.getElementById("myModal2usergroup");
                                                    var span = document.getElementsByClassName("closeeditgroup")[0];
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

                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED.</p>');

                                            var Allsearch = $(this).val();
                                            var zone = $('#selectZone11').val();
                                            $("#editActionpermission").removeClass("activebtn");
                                            $("#delete_zone").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat11').val();
                                            load_data(zone, shortby, Allsearch);

                                        });
                                        $('#selectZone11').change(function() {
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED.</p>');

                                            var Allsearch = $('.SER').val();
                                            var zone = $('#selectZone11').val();
                                            $("#editActionpermission").removeClass("activebtn");
                                            $("#delete_zone").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat11').val();
                                            load_data(zone, shortby, Allsearch);
                                        });

                                        $('#selectShortBygroupchat11').change(function() {
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO GROUPS SELECTED.</p>');

                                            var Allsearch = $('.SER').val();
                                            var zone = $('#selectZone11').val();
                                            $("#editActionpermission").removeClass("activebtn");
                                            $("#delete_zone").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat11').val();
                                            
                                            load_data(zone, shortby, Allsearch);
                                        });
 
                                        function load_data(guest = '', shortby = '', Allsearch = '') {
						
                                            $.ajax({
                                                url: "<?= base_url(); ?>UserManage/searchUsergroupPermissions",
                                                method: "POST",
                                                data: {
                                                    guest: guest,
                                                    selectShortBy: shortby,
                                                    AllSearchData: Allsearch,
                                                    permission: '1',
           
                                                },
                                                success: function(data) {
                                                   
                                                    $('#AllData2groupuserpermission').empty();
                                                    $('#AllData2groupuserpermission').html(data);
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

                                            console.log(val2.length);
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
                                                        $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GROUPS SELECTED.");

                                                    } else {
                                                       
                                                        $("#currentlyViewing").css("visibility","hidden");
                                                    }

                                                }

                                            }


                                        }


                                        $("body").on('click', '.viewgroup', function() {

                                            let id = $(this).attr("id");
                                            $.ajax({
                                                url: "<?= base_url(); ?>UserManage/searchSingleDataUser",
                                                method: "POST",
                                                data: {
                                                    id: id
                                                },
                                                success: function(data) {
                                                    //console.log(data);

                                                    $('#ViewSingleData').html(data);
                                                    check_multiple_select();
                                                    if ($("#delete_zone").hasClass('activebtn')) {
                                                        $("#currentlyViewing").css("display", "contents");

                                                    } else {

                                                        
                                                    }


                                                }
                                            })

                                            currentid = id;
                                            $("#editActionpermission").attr("data-id", currentid);
                                            $("#delete_zone").attr("data-id", currentid);
                                            $('.rightcheck').hide();
                                            $('.rightcheck' + currentid).show();
                                            $('.rightcheck' + currentid).prop('checked', true);

                                        });

                                        $('.closeeditgroup').click(function() {
                                            var modal = document.getElementById("myModal2usergroup");
                                            modal.style.display = "none";
                                            var modal2 = document.getElementById("myModal1chatgroup");
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
                                <li  id="openallusergroup09909667"><a  data-toggle="tab" href="#">MAIN MENU</a></li>
                                <li class=""><a class="active" data-toggle="tab"  href="#home">PERMISSIONS</a></li>
                                <li class="" id="assi89989gnuser4748"><a data-toggle="tab" href="#">ASSIGN USERS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData" class="workshop_right-space">

                                </table>
                            </div>
                            <div class="form-submit" style="display:none;" id="submitbtndelete">
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="groupchatback123">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtndelgrouppermission">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
    </div>
</div>

<div id="myModal1usergroup" class="modal delete-sorting">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <h4>GROUP (EDIT PERMISSION) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

            <p>NO ENTRY SELECTED.</p>
            <p>Please select an entry first to EDIT.</p>
        </div>


        <div class="modal-footer text-right"> <span class="close closeeditgroup">OK</span> </div>

    </div>
</div>

<div id="myModal2usergroup" class="modal delete-sorting">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <h4> GROUP (EDIT PERMISSION) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
            <p>NO ENTRY SELECTED.</p>
            <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
        </div>
        <div class="modal-footer text-right"><span class="close closeeditgroup">OK</span> </div>
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

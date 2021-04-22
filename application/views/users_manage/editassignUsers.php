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
                    <h2>GROUPS (ASSIGN USERS) <span id="" style="font-size:18px;"></span></h2>
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
                                             <option value="">SHOW ALL USERS</option>
                                                      <option value="all_live">SHOW ALL LIVE ONLY</option>
							<option value="all_suspend">SHOW ALL SUSPENDED ONLY</option>
							<option value="all_deactivated">SHOW ALL DEACTIVATED ONLY</option>
							<option value="guest">SHOW ALL GUESTS ONLY</option>
							<option value="group">SHOW ALL GROUP A ONLY</option>
							<option value="super">SHOW ALL SUPER A ONLY</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBy">
                                            <option value="">SORT BY</option>
                                             
							<option value="fname-a-z">FIRST NAME (A-Z)</option>
							<option value="lname-a-z">LAST NAME  (A-Z)</option>
							<option value="company-a-z">COMPANY NAME  (A-Z)</option>
							<option value="email-a-z">EMAIL ADDRESS (A-Z)</option>
							<option value="GUEST_created_first">CREATED (LATEST FIRST)</option>
							<option value="GUEST_created_earliest">CREATED (EARLIEST FIRST)</option>
							<option value="GUEST_edited_first">LAST EDITED (LATEST FIRST)</option>
							<option value="GUEST_edited_earliest">LAST EDITED (EARLIEST FIRST)</option>
                                            



                                        </select>
                                    </div>

                                   
                                   
                                </div>
                                
                                
                                

                                <div class="floor-table group-assignuser-shorting scroll-half">
                                    <P>ALL USERS ARE LISTED BELOW :</P>
                                    <P>TOTAL USER COUNT: <?php echo count($users_ingroup); ?></P>
                                    
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
                                                            <td>XMANAGE ID</td>
															<td>USER STATUS</td>
                                                            <td>REG TYPE</td>
                                                            <td>USER TYPE</td>
                                                            <td>FIRST NAME</td>
                                                            <td>LAST NAME</td>
                                                            <td>COMPANY NAME</td>
                                                            <td>EMAIL ADDRESS</td>
                                                                
                                                            
                                                         
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
                                                            <td>XMANAGE ID</td>
															<td>USER STATUS</td>
                                                            <td>REG TYPE</td>
                                                            <td>USER TYPE</td>
                                                            <td>FIRST NAME</td>
                                                            <td>LAST NAME</td>
                                                            <td>COMPANY NAME</td>
                                                            <td>EMAIL ADDRESS</td>
                                                            
                                                            <td></td>    
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AllData2groupuser876">


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

                                        $('body').on('click', '.close-btn', function() {
                                            $.fancybox.close();
                                            location.reload();

                                        });

                                    });
                                </script>


                                <script>
                                    $(document).ready(function() {
                                        $("body").on('click', '#openindividualchats989897787', function() {
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
                                        
                                        
                                          $("body").on('click', '#allgrouppermission474774', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/allgrouppermissions",
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
                                        
                                        
                                        
                                        
                                         $("body").on('click', '#groupchatback12399', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/usersGroupListassign",
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
                                        
                                        
                                        
                                        
                                         $(".SER").on("keyup", function() {

                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER SELECTED.</p>');

                                            var Allsearch = $(this).val();
                                            var zone = $('#selectZone11').val();
                                            
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            //$('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBy').val();
                                            load_data(zone, shortby, Allsearch);

                                        });
                                        
                                        
                                        $('#selectShortBy').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER SELECTED</p>');
					    var Allsearch=$('.SER').val();
					     $("#editGUEST").removeClass("activebtn");
						$("#deleteGUESTS").removeClass("activebtn");
						$("#actiontopText").hide();
						$('.deletClass').hide();
												
					     $('.deletClas:checked').removeAttr('checked');
						$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectZone11').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });
										
										$('#selectZone11').change(function () { 
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED : </span> NO USER SELECTED</p>');
					    var Allsearch=$('.SER').val();
					     $("#editGUEST").removeClass("activebtn");
						$("#deleteGUESTS").removeClass("activebtn");
						$("#actiontopText").hide();
						$('.deletClass').hide();
												
					     $('.deletClas:checked').removeAttr('checked');
						$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectZone11').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });


                              
                                        $("body").on('click', '#submitbtndelgroupassignn', function() {
                                        
                                        
                                                var ids = [];
                                                var configids = [];
                                                $('.deletClas:checked').each(function(i, e) {
                                                    ids.push($(this).val());

                                                });
												
												$('.configClas:checked').each(function(i, e) {
                                                    configids.push($(this).val());

                                                });

                                                if (ids.length) {
                                                    $.fancybox.getInstance('close');
                                                    var strids = ids.join(',');
                                                    var config_strids = configids.join(',');
                                                    $.fancybox.open({
                                                        maxWidth: 800,
                                                        fitToView: true,
                                                        width: '100%',
                                                        height: 'auto',
                                                        autoSize: true,
                                                        type: "ajax",
                                                        src: "<?php echo base_url(); ?>UserManage/updateTabsuserGroupassign",
                                                        ajax: {
                                                            settings: {
                                                                data: 'ids=' + strids+'&config_ids=' + config_strids+'&user_group=<?php echo $usergroup_id;  ?>',
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
                                                
                                                

                                         
                                        });


                                        load_data();
                                       
                                    
                                        function load_data(guest = '', shortby = '', Allsearch = '') {
						
                                            $.ajax({
                                                url: "<?= base_url(); ?>UserManage/allUsersList",
                                                method: "POST",
                                                data: {
                                                    selectData: guest,
                                                    selectShortBy: shortby,
                                                    AllSearchData: Allsearch,
                                                    usergroup: '<?php echo $usergroup_id; ?>',
           
                                                },
                                                success: function(data) {
                                                   
                                                    $('#AllData2groupuser876').empty();
                                                    $('#AllData2groupuser876').html(data);
                                                }
                                            });
                                        }

                                       
                                        $('.closeeditgroup').click(function() {
                                            var modal = document.getElementById("myModal2usergroup");
                                            modal.style.display = "none";

                                            var modal2 = document.getElementById("myModal1chatgroup");
                                            modal2.style.display = "none";
                                        });
                                        
                                        
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


                                                    if ($("#delete_zoneremove").hasClass('activebtn')) {
                                                        $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GROUPS SELECTED.");

                                                    } else {
                                                        //alert();
                                                        $("#currentlyViewing").css("display", "none");
                                                    }

                                                }

                                            }


                                        } 
                                        
                                      $("body").on('click', '.viewusermain', function() {

                                            let id = $(this).attr("id");
                                            $.ajax({
                                                url: "<?= base_url(); ?>UserManage/searchSingleDataUserMain",
                                                method: "POST",
                                                data: {
                                                    id: id,
                                                    group_id: '<?php echo $usergroup_id; ?>'
                                                },
                                                success: function(data) {
                                                    //console.log(data);

                                                    $('#ViewSingleData').html(data);
                                                    check_multiple_select();
                                                    if ($("#delete_zoneremove").hasClass('activebtn')) {
                                                        $("#currentlyViewing").css("display", "contents");

                                                    } else {

                                                        
                                                    }


                                                }
                                            })

                                            //      }
                                            currentid = id;
                                            $("#editActionassign").attr("data-id", currentid);
                                            $("#delete_zoneremove").attr("data-id", currentid);
                                            $('.rightcheck').hide();
                                            $('.rightcheck' + currentid).show();
                                            $('.rightcheck' + currentid).prop('checked', true);

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
                                <li class=""><a data-toggle="tab" class="cnone" href="#">MAIN MENU</a></li>
                                <li class=""><a   data-toggle="tab" class="cnone" href="#">PERMISSIONS</a></li>
                                <li class="" id=""><a class="active" data-toggle="tab"class="cnone" href="#">ASSIGN USERS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData" class="workshop_right-space">
					
					 
                                </table>
                            </div>
                            <div class="form-submit" style="display:block;" id="">
                                <input type="button" value="Back"  class="c" name="back" id="groupchatback12399">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtndelgroupassignn">
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
            <h4>GROUPS (ASSIGN USERS) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

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
            <h4> GROUPS (ASSIGN USERS) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
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

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
                    <h2>USER LISTS <span id="actiontopText" style="font-size:18px;"></span></h2>
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
                                            <option value="">SHOW ALL USERS LIST</option>
                                                       

                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBygroupchat">
                                            <option value="">SORT BY</option>
                                                       <option value="file-a-z">FILE NAME (A-Z)</option>
							
							<option value="GUEST_created_first">CREATED (LATEST FIRST)</option>
							<option value="GUEST_created_earliest">CREATED (EARLIEST FIRST)</option>
							<option value="GUEST_edited_first">LAST EDITED (LATEST FIRST)</option>
							<option value="GUEST_edited_earliest">LAST EDITED (EARLIEST FIRST)</option>
                                            



                                        </select>
                                    </div>

                                    <div class="col-md-1"><button class="src-btn1" id="addNewUserMainUpload">ADD</button></div>
                                   
                                    <div class="col-md-1"><button class="src-btn1" id="deleteusersmain999999">DELETE</button></div>
                                    <div class="col-md-1"><button class="src-btn1" id="deleteAllUsersMain">DELETE ALL</button></div>
                                </div>

                                <div class="floor-table users-lists-shorting">  
                                    <P>ALL USER LISTS ARE LISTED BELOW :</P>
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
                                                            <td>UPLOADED</td>
                                                            <td>USER LIST ID</td>
                                                            <td>MASS UPLOAD FILE NAME (USERS)</td>
                                                            <td>FILE TYPE</td>
                                                            <td>FILE SIZE</td>
                                                             

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
                                                            <td>UPLOADED</td>
                                                            <td>USER LIST ID</td>
                                                            <td>MASS UPLOAD FILE NAME (USERS)</td>
                                                            <td>FILE TYPE</td>
                                                            <td>FILE SIZE</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AllData2puserlist">


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

                                   


                                        $("#deleteusersmain999999").click(function() {

                                            $(".deletClass").toggleClass('hide');
                                          
                                            $('.rightcheck').css("display", "none");
                                            $(this).toggleClass("activebtn");

                                            if ($(this).hasClass('activebtn')) {
                                                $('#submitbtndelgroup55555').removeClass('hide');
                                                $(".form-submit-btn").removeClass('hide');
                                                $('.deletClass').show();
                                                $(".deletClass").removeClass('hide');
                                                $("#actiontopText").show();
                                                $("#actiontopText").text(" (DELETE) ");
                                                $("#submitbtndelete").css("display", "block");
                                                // $("#currentlyViewing").css("display","none");
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER LIST SELECTED.</p><p><span>CURRENTLY VIEWING:</span> NO USER LIST SELECTED.</p>');

                                                var val23 = [];

                                                $('.deletClas:checked').each(function() {
                                                    val23.push($('.deletClas:checked').val());
                                                });

                                                if (val23.length) {
                                                    var val22 = val2.length + 1;
                                                } else {
                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO USER SELECTED.");
                                                    $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER LIST SELECTED</p><p><span>CURRENTLY VIEWING:</span> NO USER LIST SELECTED</p>');

  
                                                }

                                            } else {
                                               
                                               // $(this).addClass('activebtn');
                                              //  $(this).hasClass('activebtn')
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER LIST SELECTED</p>');
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
                                                    var val22 = val23.length + 1;
                                                }else if(val22.length==1){
										 
												
					 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                        let pr = $(this).attr("data-project");
					  $("#ViewSingleData").find('#multipleGUESTSelect').text(pr);
                                        });
																			
					} else {

                                                    $("#ViewSingleData").find("#multipleGUESTSelect").text("NO USER LIST SELECTED.");
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


                                           $("body").on('click', '#assignusergroup', function() {

                                            $.fancybox.getInstance('close');

                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?= base_url(); ?>UserManage/usersGroupListassign",
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
                                    
                                    
                                    
                                    
                                    
                                    
                                        $("body").on('click', '#usermanageassign4455', function() {
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
                                        
                                        
                                        
                                        
       $("body").on('click', '#openusermanagelist09', function() {
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,

        width     : '100%',
        height    : 'auto',
        autoSize  : true,

        type        : "ajax",
        src         : '<?=base_url();?>UserManage/allUsersManage',
        ajax: { 
           settings: { data : 'project=', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        

        });


         });
                                    
                                    
                                    
 
                                        
                                        
                                        
                                        
                                        
       $("body").on('click','#deleteAllUsersMain',function(){
          
       $.fancybox.getInstance('close');
            
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?=base_url();?>UserManage/deleteUsersMainByFileUpload",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        });  
           
                       
            
        });
                                        
                                        

                                        $("body").on('click', '#addNewUserMainUpload', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/addNewUserMainUpload",
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



                                        $("body").on('click', '#submitbtndelgroup55555', function() {
                                            if ($("#editAction").hasClass('activebtn')) {

                                                let grp_id = $("#editAction").attr("data-id");
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
                                                        src: '<?= base_url(); ?>UserManage/addNewUserMainUpload/' + grp_id,
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
                                                        src: "<?php echo base_url(); ?>UserManage/deleteUsersMainByFileUpload",
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

                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER SELECTED.</p>');

                                            var Allsearch = $(this).val();
                                            var zone = $('#selectZone').val();
                                            $("#editAction").removeClass("activebtn");
                                            $("#deleteusersmain").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat').val();
                                            load_data(zone, shortby, Allsearch);

                                        });
                                        $('#selectZone').change(function() {
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER SELECTED.</p>');

                                            var Allsearch = $('.SER').val();
                                            var zone = $('#selectZone').val();
                                            $("#editAction").removeClass("activebtn");
                                            $("#deleteusersmain").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat').val();
                                            load_data(zone, shortby, Allsearch);
                                        });

                                        $('#selectShortBygroupchat').change(function() {
                                            $("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO USER SELECTED.</p>');

                                            var Allsearch = $('.SER').val();
                                            var zone = $('#selectZone').val();
                                            $("#editAction").removeClass("activebtn");
                                            $("#deleteusersmain").removeClass("activebtn");
                                            $("#actiontopText").hide();
                                            $('.deletClass').hide();
                                            $('.form-submit').hide();
                                            $('.deletClas:checked').removeAttr('checked');
                                            $(".deletClass").removeClass('hide');
                                            var shortby = $('#selectShortBygroupchat').val();
                                            
                                            load_data(zone, shortby, Allsearch);
                                        });

                                        function load_data(zone = '', shortby = '', Allsearch = '') {
						
                                            $.ajax({
                                                url: "<?= base_url(); ?>file_upload/searchUersUpload",
                                                method: "POST",
                                                data: {
                                                    selectData: zone,
                                                    selectShortBy: shortby,
                                                    AllSearchData: Allsearch,
           
                                                },
                                                success: function(data) {
                                                   
                                                    $('#AllData2puserlist').empty();
                                                    $('#AllData2puserlist').html(data);
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


                                                    if ($("#deleteusersmain").hasClass('activebtn')) {
                                                        $("#ViewSingleData").find("#multipleGUESTSelect").text("NO USER SELECTED.");

                                                    } else {
                                                        //alert();
                                                        $("#currentlyViewing").css("display", "none");
                                                    }

                                                }

                                            }


                                        }


		  			$('body').find('.viewusermainlist33').click();
		  			

                                        $("body").on('click', '.viewusermainlist33', function() {

                                            let id = $(this).attr("id");
                                            $.ajax({
                                                url: "<?= base_url(); ?>UserManage/searchSingleDataUserUpload",
                                                method: "POST",
                                                data: {
                                                    id: id
                                                },
                                                success: function(data) {
                                                  
                                                    $('#ViewSingleData').html(data);
                                                    check_multiple_select();
                                                    if ($("#deleteusersmain").hasClass('activebtn')) {
                                                        $("#currentlyViewing").css("display", "contents");

                                                    } else {

                                                        $("#currentlyViewing").css("visibility","hidden");
                                                    }


                                                }
                                            })

                                            //      }
                                            currentid = id;
                                            $("#editAction").attr("data-id", currentid);
                                            $("#deleteusersmain").attr("data-id", currentid);
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
                                <li id="openusermanagelist09"  class=""><a  data-toggle="tab" href="#">MAIN MENU</a></li>
                                <li  class="active"><a data-toggle="tab"  href="#home">USER LISTS</a></li>
                                <li class="" id="usermanageassign4455"><a data-toggle="tab" href="#">ASSIGN USERS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData" class="workshop_right-space">

                                </table>
                            </div>
                            <div class="form-submit" style="display:none;" id="submitbtndelete">
                                <input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="groupchatback123">
                                <input type="button" value="Next" class="action-btn" name="submit" id="submitbtndelgroup55555">
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
            <h4>USER (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

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
            <h4> USER (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
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

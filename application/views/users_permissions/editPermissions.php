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
                    <h2>GROUPS (EDIT PERMISSIONS) <span id="actiontopText" style="font-size:18px;"></span></h2>
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
                                

                                <div class="floor-table workshop-list-shorting">
                                    <P>ALL CONFIG PAGE TABS ARE LISTED BELOW :</P>
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
                                                            <td>CONFIG PAGE NAME</td>
                                                            <td>TAB NAME</td>
                                                         
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
                                                            <td>CONFIG PAGE NAME</td>
                                                            <td>TAB NAME</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AllData2groupuser">


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
										
								$("body").on('click', '.openuserpermissions', function() {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/allgrouppermissions",
                                                //src: "<?php echo base_url(); ?>UserManage/showAllgroups",
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
						
						
										
                                        $("body").on('click', '#openindividualchats909754898', function() {
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
                                        
                                        
                                        
                                        
                                        
                                        
$("body").on('click','#assignuser_list909',function(){
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
                                        
                                        
                                        
                                        



                              
                                        $("body").on('click', '#submitbtndelgrouppermission', function() {

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
                                                        src: "<?php echo base_url(); ?>UserManage/updateTabs",
                                                        ajax: {
                                                            settings: {
                                                                data: 'ids=' + strids+'&user_group=<?php echo $group->id;  ?>',
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
                                                url: "<?= base_url(); ?>UserManage/tabsListAll",
                                                method: "POST",
                                                data: {
                                                    guest: guest,
                                                    selectShortBy: shortby,
                                                    AllSearchData: Allsearch,
                                                    usergroup: '<?php echo $usergroup_id; ?>',
           
                                                },
                                                success: function(data) {
                                                   
                                                    $('#AllData2groupuser').empty();
                                                    $('#AllData2groupuser').html(data);
                                                }
                                            });
                                        }

                                       
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
                                <li class=""><a data-toggle="tab" class="cnone" href="#">MAIN MENU</a></li>
                                <li class=""><a class="active"  data-toggle="tab"  href="#home">PERMISSIONS</a></li>
                                <li class=""><a data-toggle="tab" class="cnone" href="#">ASSIGNED USERS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData" class="workshop_right-space">
					<p><span class="current-bold">CURRENTLY SELECTED : </span> <?php echo $group->group_name;  ?></p>
					<div class="display-step-status" id="displaystatus" >
					
					
					<div class="display-step-status">
								<h5>STEP 1 OF 1</h5>
                                 <p>SELECT CONFIG PAGE TABS FOR GROUP. <br> WHEN YOU ARE DONE, CLICK NEXT.</p>
						  <!-- <p>WHEN YOU ARE DONE, CLICK NEXT.</p> -->
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
					
					
					
					
					</div>
                                </table>
                            </div>
                            <div class="form-submit" style="display:block;" >
							<a class="action-btn openuserpermissions" id="groupchatback">Back</a>
                                <!--input type="button" value="Back" class="close-btn openuserpermissions" name="back" id=""-->
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

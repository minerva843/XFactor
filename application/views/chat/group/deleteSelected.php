<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUP CHAT (DELETE<?php if ($selected) {
                                                echo "";
                                            } else {
                                                echo " ALL";
                                            } ?>) </h2>
                    <p style="color:red">DELETE<?php if ($selected) {
                                                    echo "";
                                                } else {
                                                    echo " ALL";
                                                } ?> MEANS <?php if ($selected) {
                                                                echo "ALL SELECTED";
                                                            } else {
                                                                echo "ALL";
                                                            } ?> GROUP CHAT AND RELATED DATA CANNOT BE RETRIEVED IN FUTURE.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>
        </div>

        <div class="middle-body register-form zone-sucess">
            <div class="row">
                <div class="col-md-9">
                    <div class="leftbox-top">
                        <h5> <?php if ($selected) {
                                    echo "ALL SELECTED";
                                } else {
                                    echo "ALL";
                                } ?> GROUP CHAT TO BE DELETED ARE LISTED BELOW :</h5>
                    </div>

                    <div class="zone-info delete-floorplan">
                        <div class="col-md-12" id="printJS-form">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">

                            <?php foreach ($groups_info as $group_info) {

								?>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP CHAT CREATION INFO </h3>
                                        <form>
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['group_name'] ?></div>
                                                </div>
                                            </div>
 
                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['group_status'] ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['projectxmid'] ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE & TIME</label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_date_time'] ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_ip_address'] ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_xmanage_id'] ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $group_info['created_username'] ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE & TIME </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_date_time'])) {
                                                                                echo $group_info['last_edited_date_time'];
                                                                            } else {
                                                                                echo $last_edited_date_time = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_ip_address'])) {
                                                                                echo $group_info['last_edited_ip_address'];
                                                                            } else {
                                                                                echo $last_edited_ip_address = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_xmanage_id'])) {
                                                                                echo $group_info['last_edited_xmanage_id'];
                                                                            } else {
                                                                                echo $last_edited_xmanage_id = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED User Name </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if (!empty($group_info['last_edited_username'])) {
                                                                                echo $group_info['last_edited_username'];
                                                                            } else {
                                                                                echo $last_edited_username = "NIL";
                                                                            } ?></div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">

                                        <h3> GROUP CHAT INFO</h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT NAME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['group_chat_name'] ?></div>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> GROUP CHAT GUEST TYPE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label">Guest--</div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT REMARKS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['remarks'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT IMAGE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $group_info['chat_image'] ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT NO OF USERS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= count($usersCount)?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP CHAT MESSAGE COUNT:</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $mm_group_info->total_msg_count ?></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr>

                            <?php } ?>



                        </div>
                    </div>
                </div>

                <div class="col-md-3 right-text master-floor-left ">
                    <div class="tab right-tabs">

                        <div class="table-content">
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->

                                <li class=""><a data-toggle="tab" href="#menu1">INDIVIDUAL CHAT</a></li>
                                <li id="group_chat_list"><a data-toggle="tab" class="active" href="#menu2">GROUP CHAT</a></li>
                                <li class=""><a data-toggle="tab" href="#menu3">CHAT LOG</a></li>

                            </ul>
                            <div class="table_info floor-step">

                                <p style="color:#00b050!important;"> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;"><?php if ($selected && !$single) {  
                                                                                                                                        echo "MULTIPLE GROUP CHAT";
                                                                                                                                    } else if ($selected && $single) {
                                                                                                                                        echo $groups_info[0]['group_chat_name'];
                                                                                                                                    } else {
                                                                                                                                        echo "ALL";
                                                                                                                                    } ?> </span></p>
                                <br>
                                <p><b>TO CHECK AGAIN BEFORE <span style="color:red; font-weight: 600;"><?php echo $action; ?></span>, CLICK BACK.</b></p><br />
                                <p><b>ARE YOU SURE YOU WANT TO <span style="color:red; font-weight: 600;"><?php echo $action; ?> </span> <?php if ($selected) {
                                                                                                                                                echo 'THE SELECTED ';
                                                                                                                                            } else {
                                                                                                                                                echo 'ALL ';
                                                                                                                                            } ?>GROUP CHATS ?</b></p>



                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <a class="action-btn" id="groupchatback">Back</a>
                                <input type="button" value="NEXT" class="action-btn" name="submit" id="btn555delsucesschataction">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>


    </div>

</div>
<script>
    function myFunction() {
        var x = document.getElementById("myFile");
        x.disabled = true;
    }

    $("body").on('click', '#groupchatback', function() {
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

    $("body").on('click', '#btn555delsucesschataction', function() {
        $.fancybox.getInstance('close');
        var strids = "<?php print($ids); ?>";
        $.fancybox.open({
            maxWidth: 800,
            fitToView: true,
            width: '100%',
            height: 'auto',
            autoSize: true,
            type: "ajax",
            src: "<?php echo base_url(); ?>chat/deleteSelectedGroupChatsSuccess",
            ajax: {
                settings: {
                    data: 'ids=<?php echo $ids; ?>&project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>',
                    type: 'POST'
                }
            },
            touch: false,
            clickSlide: false,
            clickOutside: false
        });

    });



    $("body").on('click', '#group_chat_list', function() {
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
</script>
<style>
    .fancybox-close-small {
        display: none;
    }
</style>
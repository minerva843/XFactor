<div class="main-section">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>CHAT LOGS (DELETE<?php if ($selected) {
                                            } else {
                                                echo ' ALL';
                                            } ?>) <span style="color: #00b050;">SUCCESSFUL</span> </h2>
                    <p><b><?php echo date('Ymd hi'); ?>h.</b> <?php if ($selected) {
                                                                    echo 'ALL SELECTED';
                                                                } else {
                                                                    echo 'ALL';
                                                                } ?> CHAT LOGS HAVE BEEN DELETED.</p>
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
                                    echo 'ALL SELECTED';
                                } else {
                                    echo 'ALL';
                                } ?> CHAT LOG DETAILS ARE LISTED BELOW : </h5>
                    </div>
                    <?php //print_r($data_files_content['content']); 
                    ?>
                    <div class="zone-info delete-floorplan">
                        <div class="col-md-12" id="printJS-form-ilog-deleteall">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">
                            <?php if ($data) { ?>
                                <div class="row">

                                    <div class="col-md-3">&nbsp;</div>
                                    <div class="col-md-9">
                                        <h3> CHAT LOGS CREATION INFO</h3>
                                        <form>

                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">CHANNNEL ID</label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?= $data->id; ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">TYPE </label>
                                                <div class="col-sm-8">
                                                    <div class="zone-label"><?php if ($data->type == 'D') {
                                                                                echo 'Individual';
                                                                            } else {
                                                                                echo 'Group';
                                                                            } ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED AT </label>
                                                <div class="col-sm-8">
                                                    <?php $seconds = $data->create_at / 1000; ?>
                                                    <div class="zone-label"><?php echo date("d M Y H:i:s", $seconds); ?></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-4 col-form-label">UPDATED AT </label>
                                                <div class="col-sm-8">
                                                    <?php $secondss = $data->update_at / 1000; ?>
                                                    <div class="zone-label"><?php echo date("d M Y H:i:s", $secondss); ?></div>
                                                </div>
                                            </div>
                                            <!--<div class="form-group row">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">TOTAL MESSAGE COUNT   </label>
                                <div class="col-sm-8">
                                    <div class="zone-label"><?= $data->total_msg_count; ?></div>
                                </div>
                            </div>-->

                                        </form>
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
                                <li><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>

                                <li class="" id=""><a data-toggle="tab" href="#">GROUP CHAT</a></li>

                                <li class=""><a data-toggle="tab" href="#home" class="active">CHAT LOGS</a></li>

                            </ul>
                            <div class="table_info floor-step">

                                <p> <span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;"><?php if ($selected) {
                                                                                                                                        if (count($data) > 1) {
                                                                                                                                            echo 'MULTIPLE POSTS';
                                                                                                                                        } else {
                                                                                                                                            echo 'Single Post';
                                                                                                                                        }
                                                                                                                                    } else {
                                                                                                                                        echo 'ALL POSTS';
                                                                                                                                    } ?></span></p>
                                <br>



                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <a class="action-btn" id="btn5" onclick="printJS({printable:'printJS-form-ilog-deleteall', type:'html',targetStyles: ['*']})">PRINT</a>
                                <input type="button" value="DONE" class="action-btn done" name="submit">
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

    $("body").on('click', '.done', function() {

        $.fancybox.getInstance('close');
        $.fancybox.open({
            maxWidth: 800,
            fitToView: true,
            width: '100%',
            height: 'auto',
            autoSize: true,
            type: "ajax",
            src: "<?php echo base_url(); ?>chat/channel_chat_log_list",
            ajax: {
                settings: {
                    data: 'channelid=<?php echo $channelid; ?>',
                    type: 'POST'
                }
            },
            touch: false,
            clickSlide: false,
            clickOutside: false

        });

    });
    $('body').on('click', '.close-btn', function() {
        $.fancybox.getInstance('close');
    });
    //	 $("body").on('click','#btn555',function(){ 
    //          
    //           $.fancybox.getInstance('close');
    //            $.fancybox.open({
    //                src: '<?= base_url(); ?>floor/floordeleteAll',
    //                type: 'ajax',
    //                ajax: {
    //                    settings: {data: 'ABC', type: 'POST'}
    //                },
    //                opts: {
    //                    afterShow: function (instance, current) {
    //                        console.info('done!');
    //                    },
    //                     touch: false
    //                }
    //            });
    //            
    //        });
</script>
<style>
    .fancybox-close-small {
        display: none;
    }
</style>
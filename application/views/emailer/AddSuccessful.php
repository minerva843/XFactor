<style>
    .fancybox-close-small {
        display: none !important;
    }

    .zone-label {
        font-weight: 600;
        font-size: 12px;
    }
</style>
<div class="main-section fancybox-content" id="add-floor" style="">
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>EMAILER (ADD) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> THIS EMAILER HAS BEEN ADDED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>
        </div>

        <div class="middle-body register-form zone-sucess program-tabs register-form_1">
            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="header-title">
                            <div class="leftbox-top">
                                <h5> ALL EMAILER DETAILS ARE LISTED BELOW :</h5>
                            </div>
                        </div>
                    </div>


                    <div class="zone-info project-reg-sucess">

                        <div class="col-md-12" id="printJS-form-emailer">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <h3> EMAILER CREATION INFO </h3>
                                    <form>
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->group_name; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP STATUS </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->group_status; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROJECT ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->proj_id; ?></div>
                                            </div>
                                        </div>
                                       
                                        <!--div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">ZONE ID   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">XCFP123456789012</div>
                                </div>
                            </div-->
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAILER ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->emailer_id; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED DATE &amp; TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->created_date_time; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED IP ADDRESS </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->created_ip_address; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED XMANAGE ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->created_xmanage_id; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">CREATED USER NAME </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->created_username; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED DATE &amp; TIME </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->last_edited_date_time; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED IP ADDRESS </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->last_edited_ip_address; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED XMANAGE ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->last_edited_xmanage_id; ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">LAST EDITED USER NAME </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->last_edited_username; ?></div>
                                            </div>
                                        </div>

                                        <h3 class="m-t4"> EMAILER INFO </h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> EMAIL TITLE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->emailer_title; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAILER ONWER</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php 
												$this->db->select('*');
												$this->db->from('xf_guest_users');
												$this->db->where('id', $data1->emailer_owner);
												$query = $this->db->get();
												$res1 = $query->row();
												echo $res1->guest_type.', '.$res1->username; ?></div>
                                            </div>
                                        </div>   
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAILER ONWER BCC</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label running_latter"><?php
												
												
												
												echo $data1->emailer_owner_bcc;
												?></div> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAILER DETAILS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php if($data1->emailer_details) {
                                                                            echo $data1->emailer_details;
                                                                        } else {
                                                                            echo "NIL";
                                                                        } ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">EMAILER USERS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php if ($emaileruser) {
                                                                            
                                                                            echo $emaileruser;
                                                                        } else {
                                                                            echo "NIL";
                                                                        } ?></div>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER PDF 1</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->pdf1){?>
												 <a target="_blank" href="<?=base_url().'assets/emailer/'.$data1->pdf1?>"><?=$data1->pdf1?></a>
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div> 
                                        </div>
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER PDF 2</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->pdf2){?>
												 <a target="_blank" href="<?=base_url().'assets/emailer/'.$data1->pdf2?>"><?=$data1->pdf2?></a>
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER PDF 3</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->pdf3){?>
												 <a target="_blank" href="<?=base_url().'assets/emailer/'.$data1->pdf3?>"><?=$data1->pdf3?></a> 
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER VISUAL 1</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->image1){?>
												 <img src="<?=base_url().'assets/emailer/'.$data1->image1?>">
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER VISUAL 2</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->image2){?>
												 <img src="<?=base_url().'assets/emailer/'.$data1->image2?>">
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">EMAILER VISUAL 3</label>
                                            <div class="col-sm-8">
                                                 <div class="zone-label"> 
												 <?php if($data1->image3){?>
												 <img src="<?=base_url().'assets/emailer/'.$data1->image3?>">
												 <?php }else{ echo 'NIL';}?>
												 </div>
                                            </div>
                                        </div>
										


                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->
                                <!--  <li class=""><a data-toggle="tab" href="#menu1">CONFIG PAGE</a></li> -->
                                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
                                <!--li><a data-toggle="tab" href="" class="allassign">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li-->

                            </ul>
                            <div class="table_info floor-step">
                                <div class="status">
                                    <p style="color:#00b050!important; font-weight: bold!important;"><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black; font-size: 14px;">EMAILER (ADD)</span></p>
                                    <h5 style="font-weight:normal; font-size:14px;">NOTE: IT WILL TAKE SOME TIME TO SEND EMAILER TO ALL RECIPIENTS. 
<br/>
A "JOB COMPLETE" EMAIL WILL BE SENT TO BCC EMAIL ADDRESS WHEN ALL EMAILERS ARE SENT</h5>
                                    
                                </div>
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-emailer', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="toHome">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>


    </div>

    <script>
        $(document).ready(function() {

            $("body").on('click', '#toHome', function() {

                $.fancybox.getInstance('close');
                $.fancybox.open({
                    maxWidth: 800,
                    fitToView: true,
                    width: '100%',
                    height: 'auto',
                    autoSize: true,
                    type: "ajax",
                    src: "<?php echo base_url(); ?>emailer/index",
                    ajax: {
                        settings: {
                            data: 'project=<?=$project_select; ?>&group_id=<?=$group_id; ?>',
                            type: 'POST'
                        }
                    },
                    touch: false,
                    clickSlide: false,
                    clickOutside: false

                });

            });



            $("body").on('click', '#btn5', function() {
                $.fancybox.getInstance('close');
            });
        });
    </script>
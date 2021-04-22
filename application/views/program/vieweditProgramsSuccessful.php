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
                    <h2>PROGRAM (EDIT) <span class="sucess">SUCCESSFUL </span></h2>
                    <p> <b><?php echo date('Ymd hi'); ?>h.</b> THIS PROGRAM HAS BEEN EDITED.</p>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>
        </div>

        <div class="middle-body register-form zone-sucess program-tabs register-form_1">
            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="header-title">
                            <div class="leftbox-top">
                                <h5> ALL PROGRAM DETAILS ARE LISTED BELOW :</h5>
                            </div>
                        </div>
                    </div>


                    <div class="zone-info project-reg-sucess">

                        <div class="col-md-12" id="printJS-form-program-editprogram">
                            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <h3> PROGRAM CREATION INFO </h3>
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
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">FLOOR PLAN ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->floor_id ?></div>
                                            </div>
                                        </div>
                                        <!--div class="form-group row">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">ZONE ID   </label>
                                <div class="col-sm-5">
                                    <div class="zone-label">XCFP123456789012</div>
                                </div>
                            </div-->
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM ID </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_id; ?></div>
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

                                        <h3 class="m-t4"> PROGRAM INFO </h3>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM START DATE & TIME</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_start_date_time; ?></div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM END DATE & TIME </label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_end_date_time; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM DURATION</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_duration . ' minutes'; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM LOCATION</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php if ($data1->program_location) {
                                                                            echo $data1->program_location;
                                                                        } else {
                                                                            echo "NIL";
                                                                        } ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM TITLE</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_title; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM DETAILS</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?= $data1->program_details; ?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label">PROGRAM PRESENTER</label>
                                            <div class="col-sm-8">
                                                <div class="zone-label"><?php if ($data1->program_presenter) {
                                                                            $mydata = json_decode($data1->program_presenter);
                                                                            if ($mydata) {
                                                                                foreach ($mydata as $val) {
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('xf_guest_users');
                                                                                    $this->db->where('id', $val);
                                                                                    $query = $this->db->get();
                                                                                    $res = $query->row();
                                                                                    $programPresenter .= $res->guest_type . ', ' . $res->first_name . ' ' . $res->last_name . '</br>' . $res->designation . ', ' . $res->company . '</br></br>';
                                                                                }
                                                                            }
                                                                            echo $programPresenter;
                                                                        } else {
                                                                            echo "NIL";
                                                                        } ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">PROGRAM VISUAL</label>

                                            <div class="col-sm-6">
                                                <table>
                                                    <tbody>

                                                        <tr>
                                                            <td><?php
                                                                echo $files->file_name;
                                                                ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="col-sm-2">
                                                <table>
                                                    <tbody>

                                                        <tr>
                                                            <td><?php echo $files->file_size . 'mb'; ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
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
                                <li><a data-toggle="tab" href="" class="allassign">ALL ASSIGNMENTS</a></li>
                                <li><a data-toggle="tab" href="" class="assignProg">ASSIGN PROGRAM</a></li>
                            </ul>
                            <div class="table_info floor-step">
                                <div class="status">
                                    <p><span class="current-bold">CURRENTLY SELECTED :<span> <span style="color:black;font-size: 14px;"><?= $data1->program_title; ?></span></p>
                                    <h5>WHAT’S NEXT</h5>
                                    <p>TO ASSIGN THIS POST TO CALL OUT BUBBLES,
                                        CLICK ASSIGN PROGRM.</p>
                                </div>
                                <div class="tab-content sucess-tab-page">
                                </div>
                            </div>

                            <div class="form-submit">
                                <input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-program-editprogram', type:'html',targetStyles: ['*']})" id="submitSuccback">
                                <input type="button" value="DONE" class="action-btn" name="submit" id="toHome">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – 2020 .<b>XMANAGE</b>. </div>


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
                    src: "<?php echo base_url(); ?>program/index",
                    ajax: {
                        settings: {
                            data: 'project=<?= $data1->project_id; ?>',
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
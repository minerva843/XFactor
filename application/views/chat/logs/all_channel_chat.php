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
    .chk2{
        display: none !important;
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
                    <h2>CHAT LOGS <span id="actiontopText" style="font-size:18px;"></span></h2>
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
                                        <select class="dropdown" name="workshop" id="selectallchattype">
                                            <option value="">SHOW ALL CHAT LOG ENTRIES</option>
                                            <option value="sender">ALL SENDER ENTRIES ONLY</option>
                                            <option value="recipient">ALL RECIPIENT ENTRIES ONLY</option>


                                        </select>
                                    </div>
                                    <div class="col-md-6"> </div>
                                    <!-- <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortBy">
							<option value="">SORT BY</option>
							<option value="chat-status">CHAT STATUS</option>
							<option value="guest-type">GUEST TYPE</option>
							<option value="guest-name-a-z">GUEST NAME (A –Z)</option>
							<option value="email-a-z">EMAIL ADDRESS (A –Z)</option>
							 	 
						  </select>         
							</div>  -->
                                    <div class="col-md-1"><button class="src-btn1" id="download">DOWNLOAD</button></div>
                                    <div class="col-md-1"><button class="src-btn1" id="chatlogdelete">DELETE</button></div>
                                    <div class="col-md-1"><button class="src-btn1" id="chatlogdeleteAll">DELETE ALL</button></div>


                                </div>      

                                <div class="floor-table chat_logs-shorting_msg chatlog_download">
                                    <P>ALL INDIVIDUAL CHAT USERS ARE LISTED BELOW :</P>
                                    <br>
                                    <div class="search-results">
                                        <p class="search_result"></p>
                                    </div>
                                    <!--<div class="search-results"><p class="search_result"></p> </div> -->
                                    <div class="table-cont ">
                                        <form method="post">
                                            <div class="table-fixed-class">
                                                <table style="margin-top: -40px;" id="msg_table">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9;">
                                                            <td id="first-td"></td>
                                                            <td>DATE & TIME</td>
                                                            <td>SENDER/RECIPIENT</td>
                                                            <td>MESSAGE</td>
                                                            <td id="last-td"></td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="project-scroll">
                                                <table style="" id="chat_form">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9; display: none; margin-top: 35px;">
                                                            <!-- <td id="checkboxdis" style="display:none">&nbsp;&nbsp;</td> -->
                                                            <td class="deletesingle"></td>
                                                            <td>DATE & TIME</td>
                                                            <td>SENDER/RECIPIENT</td>
                                                            <td>&nbsp; &nbsp; &nbsp; MESSAGE</td>
                                                            <td></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AllData5">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div id="myModal2" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4> CHAT (DISABLE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
                                            <p>NO ENTRY SELECTED.</p>
                                            <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                        </div>
                                        <div class="modal-footer text-right"><span data-dismiss="modal" class="close">OK</span> </div </div> </div> <div id="myModal1" class="modal delete-sorting">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h4> CHAT (ENABLE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
                                                <p>NO ENTRY SELECTED.</p>
                                                <p>PLEASE SELECT AN ENTRY FIRST </p>
                                            </div>
                                            <div class="modal-footer text-right"><span data-dismiss="modal" class="close">OK</span> </div>
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
                                            $('#selectallchattype').change(function() { 
                                                $("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO CHAT SELECTED</p>');

                                                var Allsearch = $('.selectShortByChat').val();
                                                var zone = $('#selectallchattype').val();
                                                $("#editAction").removeClass("activebtn");
                                                $("#delete_zone").removeClass("activebtn");
                                                $("#actiontopText").hide();
                                                $('.deletClass').hide();
                                                $('.form-submit').hide();
                                                $('.deletClas:checked').removeAttr('checked');
                                                $(".deletClass").removeClass('hide');
                                                var shortby = $('#selectShortByChat').val();
                                                chatload_data(zone, shortby, Allsearch);
                                            });
                                            chatload_data();

                                            function chatload_data(guest = '', shortby = '', Allsearch = '') {

                                                $.ajax({
                                                    url: "<?= base_url(); ?>chat/getChat",
                                                    method: "POST",
                                                    data: {
                                                        channelid: '<?php echo $channelid; ?>',
                                                        guest: guest,
                                                        selectShortBy: shortby,
                                                        AllSearchData: Allsearch
                                                    },
                                                    success: function(data) {
                                                        //console.log(data);
                                                        $('#AllData5').empty();
                                                        $('#AllData5').html(data);




                                                    }
                                                });
                                            }

                                        });


                                        $("#chatlogdelete").click(function(){
                                            $('#chatlogdeleteAll').removeClass('activebtn');
                                            if ($("#chatlogdelete").hasClass('activebtn')){
                                                
                                                $('.deletesingle label').css('display', 'none');
                                                $('.deletesingle input ').prop('checked',false);
                                                $('#submitbtndelchat').css('display','none');
                                            }
                                            else{
                                                $('.deletesingle label').css('display', 'inline-block');
                                                $('#submitbtndelchat').css('display','inline-block');
                                            }
                                        })


                                        $('#chatlogdeleteAll').click(function() {
                                            $('#chatlogdelete').removeClass('activebtn');
                                            if($('#chatlogdeleteAll').hasClass('activebtn')){
                                                $('#chatlogdeleteAll').removeClass('activebtn');
                                                $('.deletesingle label').css('display', 'none');
                                                $('#submitbtndelchat').css('display','none');
                                                $('.deletesingle input ').prop('checked',false);
                                            }
                                            else{
                                                $('#chatlogdeleteAll').addClass('activebtn');
                                                $('.deletesingle label').css('display', 'inline-block');
                                                $('#submitbtndelchat').css('display','inline-block');
                                                $('.deletesingle input ').prop('checked',true);
                                            }
                                        })

                                        $("#chatlogdelete").click(function() {


                                            $(this).toggleClass("activebtn");

                                            if ($(this).hasClass('activebtn')) {
                                                $(".form-submit-btn").removeClass('hide');
                                                $('.deletClass').show();
                                                $('.form-submit').show();
                                                $(".deletClass").removeClass('hide');
                                                $("#actiontopText").show();
                                                $("#actiontopText").text(" (DELETE) ");
                                                // $("#currentlyViewing").css("display","none");
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "contents");
                                                //$(".chk2").css("display","none");


                                                var val23 = [];

                                                $('.chatClas:checked').each(function() {
                                                    val23.push($('.chatClas:checked').val());
                                                });

                                                if (val23.length) {
                                                    var val22 = val23.length + 1;
                                                } else {
                                                    ///  $(".chk2").css("display","none");
                                                    //$("#ViewSingleData").find("#multipleprojectselect").text("NO POST SELECTED");
                                                    //$("#ViewSingleData").empty().html('<p><span>CURRENTLY SELECTED : </span> NO POST SELECTED</p><p><span>CURRENTLY VIEWING : </span> NO POST SELECTED</p>');


                                                }





                                            } else {
                                                // $("#ViewSingleData").empty().html('<p><span>CURRENTLY SELECTED : </span> NO POST SELECTED</p>');
                                                $('.rightcheck ').css("display", "none");
                                                $("#actiontopText").hide();
                                                $(".chatClas3").prop("checked", false);
                                                let txt = $("#ViewSingleData").find('#currentlyViewing').find('.pname').text();
                                                console.log(txt);
                                                $("#ViewSingleData").find('#multipleprojectselect').text(txt);
                                                $("#ViewSingleData").find('#currentlyViewing').css("display", "none");


                                                var val23 = [];

                                                $('.chatClas:checked').each(function() {
                                                    val23.push($('.chatClas:checked').val());
                                                });

                                                if (val23.length >= 1) {
                                                    var val22 = val23.length + 1;
                                                } else {

                                                    // $("#ViewSingleData").find("#multipleprojectselect").text("NO POST SELECTED");
                                                }
                                            }

                                        });

                                        $('#closebtnlog3').on('click',function(){
												var modal = document.getElementById("myModalchatlog3");
												modal.style.display = "none";
											})

                                        $('#submitbtndelchat').click(function() {
                                            //alert('hi');
                                            var ids = [];
                                            $('.chatClas:checked').each(function(i, e) {
                                                ids.push($(this).val());

                                            });
                                            //alert(ids);
                                            if (ids == '') {
                                                var modal = document.getElementById("myModalchatlog3");
                                                var span = document.getElementsByClassName("close")[0];
                                                modal.style.display = "block";
                                                span.onclick = function() {
                                                    modal.style.display = "none";
                                                }
                                                window.onclick = function(event) {
                                                    if (event.target == modal) {
                                                        modal.style.display = "none";
                                                    }
                                                }
                                            } else {
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
                                                    src: "<?php echo base_url(); ?>chat/deleteSelected",
                                                    ajax: {
                                                        settings: {
                                                            data: {
                                                                ids: strids,
                                                                channelid: '<?php echo $channelid; ?>'
                                                            },
                                                            type: 'POST'
                                                        }
                                                    },
                                                    touch: false,

                                                });
                                            }
                                        })

                                        // $('#chatlogdeleteAll').click(function(){
                                        // 	$.fancybox.getInstance('close');

                                        // 	$.fancybox.open({
                                        // 		maxWidth  : 800,
                                        // 		fitToView : true,
                                        // 		width     : '100%',
                                        // 		height    : 'auto',
                                        // 		autoSize  : true,
                                        // 		type        : "ajax",
                                        // 		src         : "<?php echo base_url(); ?>chat/deleteSelected",
                                        // 		ajax: { 
                                        // 		   settings: { data : 'channelid=<?php echo $channelid; ?>', type : 'POST' }
                                        // 		},
                                        // 		touch: false,
                                        // 				clickSlide: false,
                                        // 		clickOutside: false

                                        // 	});
                                        // })


                                        



                                        function download(filename, text) {
                                            var element = document.createElement('a');
                                            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                                            element.setAttribute('download', filename);

                                            element.style.display = 'none';
                                            document.body.appendChild(element);

                                            element.click();

                                            document.body.removeChild(element);
                                        }

                                        // Start file download.
                                        document.getElementById("download").addEventListener("click", function() {
                                            // Generate download of hello.txt file with some content
                                            var text = document.getElementById("chat_form").innerText;
                                            var filename = "chat_history.txt";

                                            download(filename, text);
                                        }, false);


                                        // Back Button Functionality Starts

                                        $('#chatbackbtn3').on('click',function(e){
                                            //alert('Hey 3rd page back button triggered');
                                            $.fancybox.getInstance('close');
												$.fancybox.open({
													maxWidth: 800,
													fitToView: true,
													width: '100%',
													height: 'auto',
													autoSize: true,
													type: "ajax",
													src: "<?php echo base_url(); ?>chat/channel_logs_list",
													ajax: {
														settings: {
															data: 'mmid=<?php echo $mmid; ?>',
															type: 'POST'
														}
													},
													touch: false,
													clickSlide: false,
													clickOutside: false

												});
                                        })
										
										$('body').on('click','#AllData5 .chatClas',function(e){
											//alert('hi');
											if ($("#AllData5 input.chatClas:checkbox:checked").length > 0)
											{
												$('#submitbtndelchat').show();
											}
											else
											{
											   $('#submitbtndelchat').hide();
											}
										})

                                        // Back Button Functionality Ends
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">
                            <ul class="nav nav-tabs ">
                                <li id="openindividualchats" class=""><a data-toggle="tab" href="#">INDIVIDUAL CHATS</a></li>

                                <li class="" id="group_chat_list"><a data-toggle="tab" href="#">GROUP CHATS</a></li>

                                <li class=""><a data-toggle="tab" href="#home" class="active">CHAT LOGS</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleDataAllChat">
                                    <p><span class="current-bold">CURRENTLY SELECTED : </span> <?php echo $username; ?></p>
                                </table>

                            </div>
                            <div id="chat_back_3_channels">
							<input type="button" value="Next" class="chatback-button1" name="next" id="submitbtndelchat" style="display:none;">
                                <input type="button" value="Back" class="chatback-button1" name="back" id="chatbackbtn3">
								
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>


    </div>

</div>
<div id="myModalchatlog3" class="modal delete-sorting">

	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4> CHAT LOG <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
			<p>NO ENTRY SELECTED.</p>
			<p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
		</div>
		<div class="modal-footer text-right"><span data-dismiss="modal" id="closebtnlog3"  class="close">OK</span> </div </div> </div> <div id="myModal1" class="modal delete-sorting">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-body">
				<h4> CHAT (ENABLE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
				<p>NO ENTRY SELECTED.</p>
				<p>PLEASE SELECT AN ENTRY FIRST </p>
			</div>
			<div class="modal-footer text-right"><span data-dismiss="modal" class="close">OK</span> </div>
		</div>

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
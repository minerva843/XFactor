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
										<select class="dropdown" name="workshop" id="selectchattype">
											<option value="">SHOW ALL CHAT LOGS</option>
											<option value="individual">ALL INDIVIDUAL CHAT LOGS</option>
											<option value="group">ALL GROUP CHAT LOGS</option>


										</select>
									</div>
									<!-- <div class="col-md-3"><input type="text" class="src-btn2 SEAR" placeholder="SEARCH"></div>
						  <div class="col-md-2">
						  <select class="dropdown" id="selectShortByChat">
							<option value="">SORT BY</option>
							<option value="chat-type">CHAT TYPE</option>
							<option value="channel-name">CHAT CHANNEL NAME (A-Z)</option>
							<option value="created-last">CREATED (LATEST FIRST)</option>
							<option value="created-first">CREATED (EARLIEST FIRST)</option>
							<option value="edit-last">LAST EDITED (LATEST FIRST)</option>
							<option value="edit-first">LAST EDITED (EARLIEST FIRST)</option>
							 	 
						  </select>    
							</div>  -->
									<div class="col-md-8"> </div>
									<div class="col-md-1"><button class="src-btn1" id="view_chat">VIEW CHAT LOG</button></div>
								</div>

								<div class="floor-table allchat_logs-shorting">
									<P>ALL USERS CHANNELS ARE LISTED BELOW:</P>
									<P>TOTAL USERS CHANNEL: <?php echo $total;?></P>
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
															<!-- <td>CHAT LOG ID</td>						 -->
															<td>CHAT TYPE</td>
															<td>CHAT CHANNEL NAME</td>
															<td>GROUP MEMBER NAME</td>
															<td>GROUP CHAT DESCRIPTION</td>
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
															<td>CHAT LOG ID</td>
															<td>CHAT TYPE</td>
															<td>CHAT CHANNEL NAME</td>
															<td>GROUP MEMBER NAME</td>
															<td>EMAIL ADDRESS</td>
															<td></td>
														</tr>
													</thead>
													<tbody id="AllData4">

													</tbody>
												</table>
											</div>
										</form>
									</div>
								</div>


								<div id="myModalviewchat" class="modal delete-sorting">

									<!-- Modal content -->
									<div class="modal-content">
										<div class="modal-body">
											<h4> VIEW CHAT <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
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
											$(".SEAR").on("keyup", function() {

												//$("#AllData").empty();
												//$("#ViewSingleData").empty().html('<p><span class="work-shop_gap">CURRENTLY SELECTED:</span> NO GUEST SELECTED</p>');

												var Allsearch = $(this).val();
												var zone = $('#selectchattype').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByChat').val();
												channelload_data(zone, shortby, Allsearch);

											});
											$('#selectchattype').change(function() {
												$("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO CHAT SELECTED</p>');

												var Allsearch = $('.selectShortByChat').val();
												var zone = $('#selectchattype').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByChat').val();
												channelload_data(zone, shortby, Allsearch);
											});

											$('#selectShortByChat').change(function() {
												$("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED:</span> NO CHAT SELECTED</p>');

												var Allsearch = $('.SEAR').val();
												var zone = $('#selectchattype').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByChat').val();
												channelload_data(zone, shortby, Allsearch);
											});
											channelload_data();

											function channelload_data(guest = '', shortby = '', Allsearch = '') {
												//alert('selurkgualefkjdh')
												$.ajax({
													url: "<?= base_url(); ?>chat/getChannel",
													method: "POST",
													data: {
														mmid: '<?php echo $mmid; ?>',
														guest: guest,
														selectShortBy: shortby,
														AllSearchData: Allsearch
													},
													success: function(data) {
														console.log(data);
														//alert('success');
														$('#AllData4').empty();
														$('#AllData4').html(data);




													}
												});
											}



											$(document).on("click", "#AllData4 tr", function() {
												var id = $(this).attr('id');
												//$('#d_' + id).prop('checked', true);
												var channel_date = $('#' + id + ' #channel_date').html();
												var channel_type = $('#' + id + ' #channel_type').html();
												var channel_name = $('#' + id + ' #channel_name').html();
												var channel_des = $('#' + id + ' #channel_des').html();
												var html = '<tr><td colspan="2" class="top-fc"><h5>CHANNEL CREATION INFO</h5></td></tr>';
												html += '<body><tr><td>CHANNEL NAME</td><td>' + channel_name + '</td></tr>';
												html += '<tr><td>CHANNEL TYPE</td><td>' + channel_type + '</td></tr>';
												html += '<tr><td>CHANNEL LAST UPDATE</td><td>' + channel_date + '</td></tr>';
												html += '<tr><td>CHANNEL DESCRIPTION</td><td>' + channel_des + '</td></tr>';
												html += '</body>';
												//alert(id);
												$('#ChatViewSingleData').html(html);
											});


											$("#view_chat").click(function() {
												if ($('#view_chat').hasClass('activebtn')) {
													$('#view_chat').removeClass('activebtn');
													$('#nextbtnlog2').css('display', 'none');
													$('.deletesingle label').css('display', 'none');
													$('.deletesingle input[type="radio"] ').prop('checked', false);
												} else {
													$('#view_chat').addClass('activebtn');
													$('#nextbtnlog2').css('display', 'inline-block');
													$('.deletesingle label').css('display', 'inline-block');
												}
											});

											$('#nextbtnlog2').click(function() {
												var channelid = $('.channelClas:checked').val();
												var recipient = $('.channelClas:checked').attr('data-val');
												if (channelid && recipient) {
													$.fancybox.getInstance('close');
													$.fancybox.open({
														maxWidth: 800,
														fitToView: true,
														width: '100%',
														height: 'auto',
														autoSize: true,
														type: "ajax",
														src: "<?= base_url(); ?>chat/channel_chat_log_list",
														ajax: {
															settings: {
																data: 'channelid=' + channelid + '_' + recipient,
																type: 'POST'
															}
														},
														touch: false,
														clickSlide: false,
														clickOutside: false
													});
												} else {
													var modal = document.getElementById("myModalchatlog2");
													var span = document.getElementsByClassName("close")[0];
													modal.style.display = "block";

													window.onclick = function(event) {
														if (event.target == modal) {
															modal.style.display = "none";
														}
													}
												}

											});

											$('#closebtnlog2').on('click',function(){
												var modal = document.getElementById("myModalchatlog2");
												modal.style.display = "none";
											})


											// $("#view_chat").click(function() {
											// 	var channelid = $('.channelClas:checked').val();
											// 	var recipient = $('.channelClas:checked').attr('data-val');
											// 	if (channelid == undefined) {
											// 		//alert('if');
											// 		var modal = document.getElementById("myModalviewchat");
											// 		var span = document.getElementsByClassName("close")[0];
											// 		modal.style.display = "block";
											// 		span.onclick = function() {
											// 			modal.style.display = "none";
											// 		}
											// 		window.onclick = function(event) {
											// 			if (event.target == modal) {
											// 				modal.style.display = "none";
											// 			}
											// 		}
											// 	} else {
											// 		//alert(recipient);
											// 		$.fancybox.getInstance('close');
											// 		$.fancybox.open({
											// 			maxWidth: 800,
											// 			fitToView: true,
											// 			width: '100%',
											// 			height: 'auto',
											// 			autoSize: true,
											// 			type: "ajax",
											// 			src: "<?= base_url(); ?>chat/channel_chat_log_list",
											// 			ajax: {
											// 				settings: {
											// 					data: 'channelid=' + channelid + '_' + recipient,
											// 					type: 'POST'
											// 				}
											// 			},
											// 			touch: false,
											// 			clickSlide: false,
											// 			clickOutside: false
											// 		});
											// 	}
											// });
											// $('body').on('click', '.close', function() {
											// 	var modal = document.getElementById("myModalviewchat");
											// 	modal.style.display = "none";

											// });
											$('#chatbackbtn2').on('click', function(e) {
												// alert('Hey 2nd page back button triggered');
												$.fancybox.getInstance('close');
												$.fancybox.open({
													maxWidth: 800,
													fitToView: true,
													width: '100%',
													height: 'auto',
													autoSize: true,
													type: "ajax",
													src: "<?php echo base_url(); ?>chat/chat_logs_list",
													ajax: {
														settings: {
															data: 'project=<?php echo $project; ?>',
															type: 'POST'
														}
													},
													touch: false,
													clickSlide: false,
													clickOutside: false

												});

											})


										});
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
								<li id="openindividualchats"><a data-toggle="tab" href="#">INDIVIDUAL CHATS</a></li>

								<li class="" id="group_chat_list"><a data-toggle="tab" href="#">GROUP CHATS</a></li>

								<li class=""><a data-toggle="tab" href="#home" class="active">CHAT LOGS</a></li>

							</ul>
							<div class="table_info">

								<table id="ChatViewSingleData">
									<p><span class="current-bold">CURRENTLY SELECTED : </span> <?php echo $username; ?></p>
								</table>

							</div>  
							<div class="" id="chat_back_2_channels">
								<input type="button" value="Next" class="action-btn chatback-button" style="display: none;" name="submit" id="nextbtnlog2">
								<input type="button" value="Back" class="chatback-button" name="back" id="chatbackbtn2">
							</div>
						</div>
					</div>
				</div>



			</div>
		</div>

		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>


	</div>

</div>

<div id="myModalchatlog2" class="modal delete-sorting">

	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4> CHAT LOG <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
			<p>NO ENTRY SELECTED.</p>
			<p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
		</div>
		<div class="modal-footer text-right"><span data-dismiss="modal" id="closebtnlog2"  class="close">OK</span> </div </div> </div> <div id="myModal1" class="modal delete-sorting">

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
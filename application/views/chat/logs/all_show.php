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

	#second_checkbox {
		display: none !important;
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
										<select class="dropdown" name="workshop" id="selectZonee">
											<option value="">SHOW ALL CHAT USERS</option>
											<option value="all-enabled">ALL USERS (ENABLED) ONLY</option>
											<option value="all-disabled">ALL USERS (DISABLED) ONLY</option>


										</select>
									</div>
									<div class="col-md-3"><input type="text" class="src-btn2 SERS" placeholder="SEARCH"></div>
									<div class="col-md-2">
										<select class="dropdown" id="selectShortByUsers">
											<option value="">SORT BY</option>
											<option value="guest-type">GUEST TYPE</option>
											<option value="guest-name-a-z">GUEST NAME (A –Z)</option>
											<option value="email-a-z">EMAIL ADDRESS (A –Z)</option>

										</select>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-3"><button class="src-btn1" id="view_channel">VIEW USER'S CHATS (INDIVIDUAL & GROUP)</button></div>
								</div>

								<div class="floor-table chat_logs-shorting">
									<P>ALL CHAT USERS ARE LISTED BELOW :</P>
									<P>TOTAL CHAT USERS : <?php echo $totalChatUsers?></P>
									
									<div class="search-results">
										<p class="search_result"></p>
									</div>
									<!--<div class="search-results"><p class="search_result"></p> </div> -->
									<div class="table-cont ">
										<form method="post" id="floor_form">
											<div class="table-fixed-class">
												<table style="margin-top: -40px;" id="user_table">
													<thead>
														<tr class="table-title" style="background:#d9d9d9;">
															<td id="first-td">&nbsp;&nbsp;</td>
															<td>CHAT STATUS</td>
															<td>GUEST TYPE</td>
															<td>GUEST NAME</td>
															<td>EMAIL ADDRESS</td>
															<!-- <td>NO OF CHATS</td> -->
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
															<td>NAME</td>
															<td>GUEST TYPE</td>
															<td>EMAIL ADDRESS</td>
															<td>CHAT CHANNEL NAME</td>
															<td id="second_checbox"></td>
														</tr>
													</thead>
													<tbody id="AllData3">


													</tbody>
												</table>
											</div>
										</form>
									</div>
								</div>


								<div id="myModalchatlog" class="modal delete-sorting">

									<!-- Modal content -->
									<div class="modal-content">
										<div class="modal-body">
											<h4> CHAT LOG <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
											<p>NO ENTRY SELECTED.</p>
											<p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
										</div>
										<div class="modal-footer text-right"><span data-dismiss="modal" class="close">OK</span> </div> </div> </div> <div id="myModal1" class="modal delete-sorting">

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

											$(".SERS").on("keyup", function() {

												//$("#AllData").empty();
												$("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

												var Allsearch = $(this).val();
												var zone = $('#selectZonee').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByUsers').val();
												load_dataa(zone, shortby, Allsearch);

											});
											$('#selectZonee').change(function() {
												$("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

												var Allsearch = $('.SER').val();
												var zone = $('#selectZonee').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');   
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByUsers').val();
												load_dataa(zone, shortby, Allsearch);
											});
     
											$('#selectShortByUsers').change(function() {
												$("#ViewSingleData").empty().html('<p><span class="work-shop_gap current-bold">CURRENTLY SELECTED : </span> NO GUEST SELECTED</p>');

												var Allsearch = $('.SER').val();
												var zone = $('#selectZonee').val();
												$("#editAction").removeClass("activebtn");
												$("#delete_zone").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
												var shortby = $('#selectShortByUsers').val();
												load_dataa(zone, shortby, Allsearch);
											});

											load_dataa();

											function load_dataa(guest = '', shortby = '', Allsearch = '') {

												$.ajax({
													url: "<?= base_url(); ?>chat/getusers",
													method: "POST",
													data: {
														guest: guest,
														selectShortByUsers: shortby,
														AllSearchData: Allsearch,
														project: <?php echo $project_select; ?>
													},
													success: function(data) {
														//console.log(data);
														$('#AllData3').empty();
														$('#AllData3').html(data);




													}
												});
											}



										});

										$('#nextbtnlog1').click(function() {
											var mmid = $('.deletClas:checked').val();
											if (mmid) {
												$.fancybox.getInstance('close');
												$.fancybox.open({
													maxWidth: 800,
													fitToView: true,
													width: '100%',
													height: 'auto',
													autoSize: true,
													type: "ajax",
													src: "<?= base_url(); ?>chat/channel_logs_list",
													ajax: {
														settings: {
															data: 'mmid=' + mmid,
															type: 'POST'
														}
													},
													touch: false,
													clickSlide: false,
													clickOutside: false
												});
											} else {
												var modal = document.getElementById("myModalchatlog");
												var span = document.getElementsByClassName("closeenable")[0];
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



										$("#view_channel").click(function() {
											if ($('#view_channel').hasClass('activebtn')) {
												$('#view_channel').removeClass('activebtn');
												$('#nextbtnlog1').css('display', 'none');
												$('.deletesingle label').css('display', 'none');
												$('.deletesingle input[type="radio"] ').prop('checked', false);
												$('#ViewSingleData').html('');
											} else {
												$('#view_channel').addClass('activebtn');
												$('#nextbtnlog1').css('display', 'inline-block');
												$('.deletesingle label').css('display', 'inline-block');
												$('#submitbtndelete').css('display','block');
											}
										});

										$('body').on('click', '.close', function() {
											var modal = document.getElementById("myModalchatlog");
											modal.style.display = "none";

										});

										function chat_enable() {
											let value = $('#chat_enable').html();
											console.log(value);
										}
										chat_enable()

										$("body").on('click', '#AllData3 .view', function() {

											let guest = $(this).attr("id");
											//alert(guest);
											//$('#d_' + guest).prop('checked', true);

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
								<li id="openindividualchats"><a data-toggle="tab" href="#">INDIVIDUAL CHATS</a></li>

								<li class="" id="group_chat_list"><a data-toggle="tab" href="#">GROUP CHATS</a></li>

								<li class=""><a data-toggle="tab" href="#home" class="active">CHAT LOGS</a></li>

							</ul>
							<div class="table_info">

								<table id="ViewSingleData" class="workshop_right-space">

								</table>

							</div>
							<div class="form-submit" id="submitbtndelete">
								<input type="button" value="Back" style="display:none;" class="close-btn" name="back" id="btn5allzones">
								<input type="button" value="Next" class="action-btn" style="display: none;" name="submit" id="nextbtnlog1">
							</div>
						</div>
					</div>
				</div>



			</div>
		</div>

		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>


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
<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">
<?php 

$this->db->select('*');
		$this->db->from('xf_mst_setting');
		$query = $this->db->get();
		$topprojectdata = $query->row();?>

			<div class="row avatar-main">

				<div class="col-md-9 avtar-position chatscreen">

					<div class="start-explor">
						<h2 class="project_name"><?php if(!empty($project_name)){echo $project_name;
						if($topprojectdata->header_lets_explore_title){ echo '. '.$topprojectdata->header_lets_explore_title; }else{ echo '. START EXPLORING. HAVE FUN! =)'; }
						 }else{ echo 'CLICK “PLACES” ON BOTTOM RIGHT, THEN SELECT A PLACE TO GO.'; }?> </h2>
					</div>

					<div class="chat-feature workshop-left">

						<div class="row">
							<div class="col-md-6">
								<div class="workshop-ldialog workshop-profile-top">
									<div class="panel panel-default">
										<div class="row large-button m-b-5">
											<div class="col-md-12">
												<h3> YOU ARE CURRENTLY TAKING PART IN A WORKSHOP </h3>
											</div>
										</div>

										<div class="panel-body">
											<div class="workshop-profile">
												<div class="row">
													<div class="col-md-4">
														<?php if (date('Y-m-d H:i', strtotime($workshop_data->enddatetime)) > date('Y-m-d H:i')) {
															$checkEndDate = true;
														} else {
															$checkEndDate = false;
														} ?>
														<?php
														$avatar = $this->session->userdata('avatar');
														if (!empty($avatar)) { ?>

															<img src="<?= base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $avatar; ?>" class="img-fluid">

														<?php } else { ?>
															<img src="<?= base_url(); ?>assets/images/sample.png" class="img-fluid">


														<?php } ?>




													</div>
													<div class="col-md-8">
														<div class="form-group row">
															<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DISPLAY NAME </label>
															<div class="col-sm-8">
																<div class="zone-label">: <?php
																							$dis = $this->session->userdata('username');
																							if (!empty($this->session->userdata('user_id'))) {
																								echo $dis;
																							} else {
																								echo "SIMPLE TEXT";
																							}

																							?> </div>
															</div>
														</div>




														<div class="form-group row">
															<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
															<div class="col-sm-8">
																<div class="zone-label"> : <?php
																							$dis = $this->session->userdata('company');
																							if (!empty($this->session->userdata('user_id'))) {
																								echo $dis;
																							} else {
																								echo "SIMPLE TEXT";
																							}
																							?>
																</div>
															</div>
														</div>

														<div class="form-group row">
															<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
															<div class="col-sm-8">
																<div class="zone-label"> : <?php

																							if (!empty($this->session->userdata('user_id'))) {
																								echo $_SESSION['designation'];
																							} else {
																								echo "SAMPLE TEXT";
																							}
																							?> </div>
															</div>
														</div>

													</div>   

												</div>
											</div>
										</div>
									</div>

									<div id="instructions"><?php
															if (!empty($this->session->userdata('user_id'))) {
																echo $workshop_data->instructions;
															} else {
																echo "SAMPLE TEXT";
															}

															?>
										

									</div>

								</div>
							</div>
							<?php if ($checkEndDate == false) {?>
							<div class="work-shop-msg">
								<?php if ($checkEndDate == false) {
											echo 'WORKSHOP HAS ENDED.';
										}
										?>
							</div>
							<?php }?>
								<div class="col-md-6">
									<div class="workshop-ldialog right">
										<div class="panel panel-default">
											<div class="panel-body">
											<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
											<img src="<?= base_url(); ?>assets/images/workshop/zoom.png" class="img-fluid img_screen1">
											<?php }?>
											<?php if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<iframe src="<?php echo $workshop_data->screenurl1; ?>" id="iframe2" class="frame frame_screen1" style="border: 0px solid slategrey; width:100%; height:297px;  
                "></iframe>
											<?php }?>
											</div>
											<div class="row large-button">
											<?php if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<div class="col-md-9">
													<div class="large-button-left"><span id="slidourl"><?php echo $workshop_data->screenremarks1; ?></span></div>
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" id="panel-fullscreen2" data-track="SCREEN2" role="button" title="Toggle fullscreen">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span> ENLARGE SCREEN </span> </a></div>
											<?php }?>
											<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
											<div class="col-md-9">
													
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" id="panel-fullscreen2" data-track="SCREEN2" role="button" title="Toggle fullscreen">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span> ENLARGE SCREEN </span> </a></div>
											<?php }?>
											</div>
										</div>
										
									</div>
								</div> 

							
						</div>
						
							<div class="row">


 
								<div class="col-md-6">
									<div class="workshop-ldialog">
										<div class="panel panel-default">
											<div class="panel-body">
											<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
												<img src="<?= base_url(); ?>assets/images/workshop/slido.png" class="img-fluid img_screen2" >
											<?php } if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<iframe src="<?php echo $workshop_data->screenurl2; ?>" id="iframe3" class="frame frame_screen2" style="border: 0px solid slategrey; width:100%; height:297px;"></iframe>
												<?php }?> 
											</div>
											<div class="row large-button">
												<?php if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<div class="col-md-9">
													<div class="large-button-left"> <span id="zoomurl"><?php echo $workshop_data->screenremarks2; ?></span></div>
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" data-track="SCREEN1" id="panel-fullscreen" role="button" title="Toggle fullscreen">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span>ENLARGE SCREEN </span></a>
												</div>
												<?php }?>
												<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
													<div class="col-md-9">
													
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" data-track="SCREEN1" id="panel-fullscreen" role="button" title="Toggle fullscreen">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span>ENLARGE SCREEN </span></a>
												</div>
												<?php }?>
												
											</div>

										</div>
									</div>
								</div>

								<div class="col-md-6">

									<div class="workshop-ldialog right m-b-10 zoom-session-url">
										<div class="panel panel-default">

											<div class="panel-body">
											<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
											<img src="<?= base_url(); ?>assets/images/workshop/website.png" class="img-fluid img_screen3">
											<?php } if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<iframe src="<?php echo $workshop_data->screenurl3; ?>" id="iframe3" class="frame frame_screen3" style="border: 0px solid slategrey; width:100%; height:297px;"></iframe>
											<?php }?>
											</div>

											<div class="row large-button">
											<?php if ($checkEndDate == true && $this->ion_auth->logged_in()) { ?>
												<div class="col-md-9">
													<div class="large-button-left"> <span id="xplatformurl"><?php echo $workshop_data->screenremarks3; ?></span></div>
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" id="panel-fullscreen1" data-track="SCREEN3" role="button">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span>ENLARGE SCREEN </span> </a></div>
											<?php }?>
											<?php if($workshopid ==0 || !$this->ion_auth->logged_in()){?>
												<div class="col-md-9">
													
												</div>
												<div class="col-md-3 text-right">
													<a href="#" class="button trackworkshop" id="panel-fullscreen1" data-track="SCREEN3" role="button">
														<i class="glyphicon glyphicon-resize-full"></i>
														<span>ENLARGE SCREEN </span> </a></div>
											<?php }?> 
											</div>

										</div>
									</div>
								</div>

							</div>
						

					</div>
				</div>

				<div class="col-md-3 avtar-sidebar">
					<div class="tabbable tabs-below">
						<div class="tab-content">


							<div class="tab-pane chats active" id="5">
								<div class="avatar-right workshop_frontend">
								<div class="common_divF">
									<h2> WORKSHOP</h2>
									<?php if ($No_registerUser_condition == true) { ?>
										<div class="fron-postion">
											<?php
											if (empty($project)) {
												echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
											} else {
												if (!$this->ion_auth->logged_in()) {
													echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
												} else {
													echo '<p class="gsm-pd">Registration is requried to attend Workshops.</p>';
												}
											} ?>
										</div>
									<?php
									} else {
									?> 
										<div class="select-workshop">
											<h3>SELECT A WORKSHOP </h3>

											<select id="selectWorkshop">
												<option value="0">SELECT WORKSHOP</option>



												<?php foreach ($workshops as $workshop) {


													$stausworkshop = '';
													if ($workshop['startdatetime'] < date('Y-m-d H:i') && $workshop['enddatetime'] > date('Y-m-d H:i')) {
														$stausworkshop = 'LIVE';
													} else if ($workshop['enddatetime'] < date('Y-m-d H:i')) {
														$stausworkshop = 'ENDED';
													} else {

														$stausworkshop = 'NOT STARTED';
													}

													$worklenth=strlen($workshop['workshop_name']);
													if($worklenth>40){
														$worktitle=substr($workshop['workshop_name'],0,40).'...';
													}else{
														$worktitle=$workshop['workshop_name'];
													}

												?>



													<option value="<?php echo $workshop['id']; ?>" <?php if ($workshop['id'] == $workshopid) {
																										echo 'selected';
																									} ?>><?php echo $stausworkshop; ?>, <?php echo $workshop['startdatetime']; ?>, <?php echo $workshop['enddatetime']; ?>, <?php echo $worktitle; ?></option>

												<?php } ?>



											</select>
										</div>

										<ul class="nav nav-tabs" role="tablist">

											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#chat1">NOTES</a>
											</li>
											<li class="nav-item chat1">
												<a class="nav-link" data-toggle="tab" href="#chat2">ALL ONLINE</a>
											</li>
											<li class="nav-item chat4">
												<a class="nav-link" data-toggle="tab" href="#chat3" style="margin-right:0px;">PAST CHATS</a>
											</li>

										</ul>

										<!-- Tab panes -->
										<div class="tab-content chat">

											<div id="chat3" class="container tab-pane">
												<?php if ($No_registerUser_condition == true) { ?>
													<div class="fron-postion">
														<?php

														if (empty($project)) {
															echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
														} else {
															if (!$this->ion_auth->logged_in()) {
																echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
															} else {
																echo '<p class="gsm-pd">Registration is requried to attend Workshops.</p>';
															}
														}
														?>
													</div>
												<?php
												} else { 
												?>
													<div class="chat-main">

														<div class="top-search">
															<div class="row">
																<div class="col-md-6">
																	<select id="past-chat-dropdwon">
																		<option value="ALL"> SHOW EVERYONE</option>
																		<?php foreach ($AllonlineDropdown as $type) { ?>
																			<option value="<?= $type; ?>"><?= $type; ?></option>
																		<?php } ?>

																	</select>
																</div>
																<div class="col-md-6">
																	<input type="text" class="search workshoppast" placeholder="SEARCH:">
																</div>
															</div>
														</div>
														<div class="inner-chat workshop-chat past-chat">

														</div>



													</div>
												<?php } ?>
											</div>

											<div id="chat2" class="container tab-pane">
												<?php  if ($No_registerUser_condition == true) { ?>
													<div class="fron-postion">
														<?php

														if (empty($project)) {
															echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
														} else{
															if (!$this->ion_auth->logged_in()) {
																echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
															} else {
																echo '<p class="gsm-pd">Registration is requried to attend Workshops.</p>';
															}
														}
														?>
													</div>
												<?php
												} else {
												?>
													<div class="chat-main">

														<div class="top-search">
															<div class="row">
																<div class="col-md-6">
																	<select id="allondropdwon">
																		<option value="ALL"> SHOW EVERYONE</option>
																		<?php foreach ($AllonlineDropdown as $type) { ?>
																			<option value="<?= $type; ?>"><?= $type; ?></option>
																		<?php } ?>

																	</select>
																</div>
																<div class="col-md-6">
																	<input type="text" class="search" placeholder="SEARCH:">
																</div>
															</div>
														</div>


														<div class="inner-chat workshop-chat all-online">

															<?php if ($userdetails->chat_enable == 0) {
																echo '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
															} ?>

														</div>



													</div>
												<?php } ?>
											</div>

											<div id="chat1" class="container tab-pane active">
												<div class="chat-main">
													<!--
<div class="top-search">
<div class="row">
<div class="col-md-6 p-r-5"> 
<select>
<option> SHOW ALL DISPLAY CONTACTS</option>
<option>ALL BOOTH ORGANISER ONLY</option>
<option>ALL BOOTH SPONSOR ONLY</option>
<option>ALL BOOTH EXHIBITOR ONLY</option>
<option>ALL BOOTH PARTNER ONLY</option>
<option>ALL BOOTH SPEAKER ONLY</option>
<option>ALL BOOTH PANELIST ONLY</option>
<option>ALL BOOTH VIP ONLY</option>
<option>ALL BOOTH CELEBRITY ONLY
</option>
<option>ALL BOOTH PERFORMER ONLY</option>
<option>ALL BOOTH FEATURED ONLY</option>
<option>ALL BOOTH OTHERS ONLY</option>

</select>
</div>
<div class="col-md-6 p-l-5"> 
<input type="text" class="search"  placeholder="SEARCH: ">
</div>
</div>
</div>  -->


													<div class="inner-chat work-shop-right poject_editor">


														<textarea rows="4" cols="50" id="program_details" class="program_details" name="program_details" placeholder="Scribble your notes and Email to yourself.
Important: This is note and will not be saved. All data will be lost when your browser is refreshed."></textarea>
														<!--script>

                                CKEDITOR.replace('program_details');

								</script-->

														<!--<textarea placeholder="Scribble your notes and Email to yourself.
Important: This is note and will not be saved. All data will be lost when your browser is refreshed. "></textarea>  href="mailto:?subject=XPLATFORM - QUICK LINK TO PLACE&body=http://13.235.169.150/XFactor/places/index/575%0D%0A%0D%0AStart exploring today!%0D%0A%0D%0A%0D%0AWarmest Regards%0D%0A
The XPLATFORM Team" -->
														<button class="sendto-mail trackworkshop" data-track="SEND-EMAIL" id="sendmailtome"> SEND NOTES TO EMAIL</button>

													</div>
												</div>

											</div>
										</div>

									<?php } ?>
								</div>
							</div>
							</div>



							<?php
							if (!empty($floor)) {
								$floor = $floor;
							} else {
								$floor = 0;
							}
							?>

							<ul class="nav nav-tabs">

								<div class="overlay-heading">
									<h2> WHAT DO YOU WISH TO DO? </h2>
								</div>
								<li>
									<a class="track_menu" data-track="PLACES" href="<?= base_url(); ?>places/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
								</li>
								<li>
									<a data-track="AVATAR" class="track_menu" href="<?= base_url(); ?>avatar/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/avtar.png" alt=""><span>MY AVATAR</span></a>
								</li>
								<li>
									<a data-track="CHAT" class=" track_menu" href="<?= base_url(); ?>chat_box/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
								</li>
								<li>
									<a data-track="CONTENT" class="track_menu" href="<?= base_url(); ?>content_page/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

								</li>
								<li class="active">
									<a data-track="WORKSHOP" class="track_menu active" href="<?= base_url(); ?>workshop/redirectanother/<?php echo $project;?><?php if(!empty($floor)){ echo '/'.$floor; }?>" class="active"><img src="<?= base_url(); ?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
								</li>
								<li>
									<a data-track="POSTS" class=" track_menu" href="<?= base_url(); ?>post_front/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>
								</li>
								<li>

									<a data-track="PROGRAM" class="track_menu" href="<?= base_url(); ?>program_page/redirectanother/<?php echo $project; ?>/<?php echo $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
								</li>
								<script>
									$('.track_menu').click(function() {

										var project_id = '<?= $project; ?>';
										if (project_id == '') {

										} else {
											var module_name = $(this).attr('data-track');
											var url = '<?php echo base_url(); ?>places/UpdatePostIconHistory';
											$.ajax({
												type: "POST",
												url: url,
												data: {
													project_id: project_id,
													module_name: module_name
												},
												success: function(data) {

												}
											});
											
											var module_name = $(this).attr('data-track');
											var url = '<?php echo base_url(); ?>places/WorkshopExitHistory';
											$.ajax({
												type: "POST",
												url: url,
												data: {
													project_id: project_id,
													module_refid: '<?= $workshopid ?>',
													module_name: module_name
													
												},
												success: function(data) {

												}
											});
										}
									});
								</script>


							</ul>
						</div>
						<!-- /tabs -->
						<!-- /tabs -->

					</div>
				</div>
				<div class="footer-year">
					<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
	<style>
		#svga-gravataravatar {

			display: none !important;
		}

		#svga-shareavatar {
			display: none !important;
		}
	</style>

	<script>
		$('.trackworkshop').click(function() {
			var feature_name = $(this).attr('data-track');

			var project_id = '<?= $project; ?>';
			var floor_id = '<?= $floor; ?>';
			var url = '<?php echo base_url(); ?>places/UpdatePostIconHistory';
			$.ajax({
				type: "POST",
				url: url,
				data: {
					project_id: project_id,
					module_name: 'WORKSHOP',
					module_refid: '<?= $workshopid ?>',
					feature_name: feature_name,
					floor_id: floor_id
				},
				success: function(data) {

				}
			});
		})

		// function allonline() {
		// 	var chatdisable = <?php echo $userdetails->chat_enable; ?>;
		// 	//alert(chatdisable);
		// 	if (chatdisable == 0) {
		// 		$(".all-online").html('<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';);
		// 	} else {
		// 		$.ajax({
		// 			url: '<?= base_url(); ?>workshop/allonline',
		// 			type: "POST",
		// 			data: {
		// 				workshopid: <?= $workshopid; ?>
		// 			},
		// 			success: function(response) {
		// 				//console.log('refresh result',response);

		// 				$(".all-online").html(response);
		// 			}
		// 		});
		// 	}

		// }
var interval_1=1;
	var interval_2=1;
	var interval_3=1;
	var interval_4=1;
$('.chat1').click(function(){
	interval_1=setInterval(allonline, <?php echo CHATSET_AJAXTIME_INTERVAL;?>);
	for (var i = 1; i < interval_4; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_3; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_2; i++)
        window.clearInterval(i);
	
	clearInterval(interval_4);
	clearInterval(interval_3);
	clearInterval(interval_2);
})
$('.chat4').click(function(){
	interval_4=setInterval(PastChats, <?php echo CHATSET_AJAXTIME_INTERVAL;?>);
	for (var i = 1; i < interval_2; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_3; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_1; i++)
        window.clearInterval(i);
	
	clearInterval(interval_3);
	clearInterval(interval_2);
	clearInterval(interval_1);
})
		function allonline() {
		$.ajax({
			url: '<?= base_url(); ?>workshop/allonline',
			type: "POST",
			data: {
				workshopid: <?= $workshopid; ?>,
				workshop: true
			},
			success: function(response) {
				//console.log('refresh result',response);

				$(".all-online").html(response);
			}
		});
	}
		//setInterval(allonline,30000);
		allonline();
		function PastChats() {
				$.ajax({
					url: '<?= base_url(); ?>chat_box/PastChats',
					type: "POST",
					data: {
						project_id: <?= $project; ?>,
						module: 'workshop',
						workshop: true
					},
					success: function(response) {
						//console.log('refresh result',response);

						$(".past-chat").html(response);
					}
				});
			}
			//setInterval(PastChats,30000);
			PastChats();
		$('#allondropdwon').change(function() {
			var post_type = $(this).val();
			if (post_type == "ALL") {
				$(".rowguest").css("display", "block");
			} else {
				$(".rowguest").each(function() {
					let row_post_type = $(this).attr('data-guest-type');

					if (row_post_type == post_type) {
						$(this).css("display", "block");

					} else {

						$(this).css("display", "none");
					}

				});


			}

		});

		$(".workshoppast").on("keyup", function() {
			if ($(this).val().length >= 0) {

				var value = $(this).val().toLowerCase();
				$(".workshoppastlist").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

				});
			}
		});

		$('#past-chat-dropdwon').change(function() {
			var post_type = $(this).val();
			if (post_type == "ALL") {
				$(".openChatBox").css("display", "block");
			} else {
				$(".openChatBox").each(function() {
					let row_post_type = $(this).attr('data-guest-type');

					if (row_post_type == post_type) {
						$(this).css("display", "block");

					} else {

						$(this).css("display", "none");
					}

				});


			}

		});
		$(document).ready(function() {
			$("body").on('click', '.kahoot_fullscreen', function() {

				$.fancybox.getInstance('close');
				$.fancybox.open({
					src: '<?= base_url(); ?>workshop/fullscreen',
					type: 'ajax',
					ajax: {
						settings: {
							data: 'ABC',
							type: 'POST'
						}
					},
					opts: {
						afterShow: function(instance, current) {
							console.info('done!');
						},
						touch: false,
						clickSlide: false,
						clickOutside: false
					}
				});

			});
			//Toggle fullscreen
			$("#panel-fullscreen").click(function(e) {
				e.preventDefault();

				var $this = $(this);

				if ($this.children('i').hasClass('glyphicon-resize-full')) {
					$this.children('i').removeClass('glyphicon-resize-full');
					$this.children('i').addClass('glyphicon-resize-small');
					$this.children('i').next().html('REDUCE SCREEN');
				} else if ($this.children('i').hasClass('glyphicon-resize-small')) {
					$this.children('i').removeClass('glyphicon-resize-small');
					$this.children('i').addClass('glyphicon-resize-full');
					$this.children('i').next().html(' ENLARGE SCREEN ');
				}
				$(this).closest('.panel').toggleClass('panel-fullscreen');
			});

			$("#panel-fullscreen1").click(function(e) {
				e.preventDefault();

				var $this = $(this);

				if ($this.children('i').hasClass('glyphicon-resize-full')) {
					$this.children('i').removeClass('glyphicon-resize-full');
					$this.children('i').addClass('glyphicon-resize-small');
					$this.children('i').next().html('REDUCE SCREEN');
				} else if ($this.children('i').hasClass('glyphicon-resize-small')) {
					$this.children('i').removeClass('glyphicon-resize-small');
					$this.children('i').addClass('glyphicon-resize-full');
					$this.children('i').next().html(' ENLARGE SCREEN ');
				}
				$(this).closest('.panel').toggleClass('panel-fullscreen');
			});


			$("#panel-fullscreen2").click(function(e) {
				e.preventDefault();

				var $this = $(this);

				if ($this.children('i').hasClass('glyphicon-resize-full')) {
					$this.children('i').removeClass('glyphicon-resize-full');
					$this.children('i').addClass('glyphicon-resize-small');
					$this.children('i').next().html('REDUCE SCREEN');
				} else if ($this.children('i').hasClass('glyphicon-resize-small')) {
					$this.children('i').removeClass('glyphicon-resize-small');
					$this.children('i').addClass('glyphicon-resize-full');
					$this.children('i').next().html(' ENLARGE SCREEN ');
				}
				$(this).closest('.panel').toggleClass('panel-fullscreen');
			});

		});
	</script>


	<script>
		$(document).ready(function() {
			

			$("#sendmailtome").click(function() {

				let mailbody = $("#program_details").val();

				//alert(mailbody);
				//var editorData= CKEDITOR.instances['program_details'].getData();
				//      alert(" your data is :"+editorData);

				var emailSub = 'XPLATFORM - QUICK LINK TO PLACE';
				var emailTo = '';
				var emailCC = '';

				window.location.href = "mailto:" + emailTo + '?subject=' + emailSub + '&body=' + mailbody;

			});




			$("#svga-downloadavatar").css("display", "none");
			let gender = '<?php echo $this->session->userdata('gender'); ?>';
			// alert(gender);
			if (gender == 'male') {
				$("#svga-start-boys").click();
			} else if (gender == 'female') {
				$("#svga-start-girls").click();
			} else {
				$("#svga-start-boys").click();
				$(".svga-row").css("display", "none");
			}


			$("#downloadavatar").click(function() {
				//  $("#svga-png-one").click();  
				$('#avatar_small_dyanmic').click();
			});



			$("#selectWorkshop").change(function() {
				
				let workshop = $(this).val();
				 
				var project_id = '<?=$project; ?>';
				var url = '<?php echo base_url(); ?>places/WorkshopHistory';
				$.ajax({
					type: "POST",
					url: url,
					data: {
						project_id: project_id,
						module_refid: workshop
					},
					success: function(data) {
							window.location = '<?php echo base_url();  ?>workshop/index/<?php echo $project; ?>/<?php echo $floor; ?>/' + workshop;
					}
				});
				
				

			});





			$(".openSellerChatBox").click(function() {
				var grpID = $(this).attr('data-val');

				$.fancybox.open({
					maxWidth: 800,
					fitToView: true,
					width: '100%',
					height: 'auto',
					autoSize: true,
					type: "ajax",
					src: "<?php echo base_url(); ?>chat/testchat2",
					ajax: {
						settings: {
							data: 'username=' + grpID+'&workshop=1', 
							type: 'POST'
						}
					},
					touch: false,

				});


				$.ajax({
					url: "<?php echo base_url('/chat_box/grpChatMsg') ?>",
					method: 'post',
					data: {
						grpID: grpID
					},
					success: function(response) {
						console.log(response);
					}

				});


			});
			/*$('.openChatBox').click(function(){
		var username = $(this).attr('data-val');
		  $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/testchat",
        ajax: { 
           settings: { data : 'username='+username, type : 'POST' }
        },
        touch: false, 
        
    });
		//alert('hi');
		var username = $(this).attr('data-val');
		$.ajax({
            url:"<?php echo base_url('/chat_box/createChannel') ?>",
            method: 'post',
            data: {username:username},
            success: function(response){
                console.log(response);
            }
         
        });
	})*/
	

		});
	</script> 
	

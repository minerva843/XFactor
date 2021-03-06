<div class="virtual_view avatar simple_view_outer">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">


				<div class="col-md-12 avtar-sidebar simple-view">
					<div class="tabbable tabs-below">
						<div class="tab-content">
							<div class="tab-pane active" id="1">
								<div class="avatar-right">
									<div class="simple_view_fixed_top">
										<div class="overlay-heading">
											<h2> <?php if (!empty($project_name)) {
														echo $project_name;
													} else {
														echo 'PROJECT NAME';
													} ?></h2>
										</div>
										<div class="sml-container">
											<ul class="nav nav-tabs simple_tabs">

												<li>
													<a class=" track_menu" data-track="PLACES" href="<?= base_url(); ?>simple_view/places/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
												</li>

												<li>
													<a data-track="AVATAR" class="track_menu" href="<?= base_url(); ?>simple_view/avatar/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
												</li>
												<li>
													<a data-track="CHAT" class="track_menu" href="<?= base_url(); ?>simple_view/chat/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
												</li>
												<li>
													<a data-track="CONTENT" class="track_menu" href="<?= base_url(); ?>simple_view/content/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

												</li>
												<li class="active">
													<a data-track="POSTS" class="track_menu active" href="<?= base_url(); ?>simple_view/post/<?= $project_id ?>" class="active"><img src="<?= base_url(); ?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a>
												</li>

												<li>
													<a data-track="PROGRAM" class="track_menu" href="<?= base_url(); ?>simple_view/program/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
												</li>

											</ul>
											<script>
												$('.track_menu').click(function() {

													var project_id = '<?= $project_id; ?>';
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
													}
												});
											</script>
										</div>
										<h2>POSTS</h2>
									</div>


									<div class="tab-pane chats active" id="2">
										<div class="avatar-right chat-frount">
											<div class="simle_view_midde">

												<div class="sml-container">
													<ul class="nav nav-tabs" role="tablist">

														<li class="nav-item simple-view-nav">
															<a class="nav-link active" data-toggle="tab" href="#chat1">ALL POSTS</a>
														</li>
														<li class="nav-item simple-view-nav">
															<a class="nav-link" data-toggle="tab" href="#chat2">ALL SELLERS</a>
														</li>
														<!-- <li class="nav-item">
															<a class="nav-link" data-toggle="tab" href="#chat3">NEAR ME</a>
														</li> -->
														<li class="nav-item simple-view-nav">
															<a class="nav-link" data-toggle="tab" href="#chat4" style="margin-right:0px;">PAST CHATS</a>
														</li>
													</ul>

													<!-- Tab panes -->
													<div class="tab-content chat">

														<div id="chat1" class="container tab-pane active">
															<div class="chat-main">

																<div class="top-search">
																	<div class="row">
																		<div class="col-md-6">
																			<select id="selectposttype">
																				<option value="ALL"> SHOW ALL POSTS </option>
																				<option value="INFO">SHOW ALL INFO POSTS</option>
																				<option value="PROMOTION">SHOW ALL PROMO POSTS</option>
																				<option value="CONTEST">SHOW ALL CONTEST POSTS</option>
																			</select>
																		</div>
																		<div class="col-md-6">
																			<input type="text" class="search search1" placeholder="SEARCH:">
																		</div>
																	</div>
																</div>

																<div class="inner-chat">
																	<?php foreach ($posts as $post) { ?>
																		<div class="Post_frontr_reapet clearfix postrow" data-post-type="<?php echo $post->post_type; ?>" data-search="<?php echo $post->post_title; ?>">
																			<div class="Post-contant-top">
																				<div class="post-read-details">
																					<a post-id="<?php echo $post->id; ?>" class="moredetailspost<?= $post->id; ?> moredetailspost"> SHOW MORE</a>
																				</div>
																				<div class="post-date_f">
																					<p> <b><?php echo $post->post_type; ?>.</b> Posted On <?php echo $post->created_date_time; ?></p>
																				</div>

																			</div>

																			<p class="post_title_F mobile-show desktop-hide"> <?php echo $post->post_title; ?> </p>

																			<div class="Post_owner">


																				<?php if (!empty($post->avatar)) { ?>

																					<img src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $post->avatar; ?>" />

																				<?php } else { ?>
																					<?php if ($post->gender == 'Male' || $post->gender == 'MALE') { ?>

																						<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid">



																					<?php } elseif ($post->gender == 'Female' || $post->gender == 'FEMALE') { ?>

																						<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid">



																					<?php  } else { ?>

																						<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/images/sample.png">



																				<?php  }
																				} ?>

																				<p> <?php echo $post->guest_type . ',' . $post->username; ?></p>
																			</div>

																			<div class="Post-right-cont">
																				<div class="post-contant">

																					<div class="pro-bold three_line"><?php echo $post->post_details; ?> </div>
																					<div class="more-data<?= $post->id; ?> table-content" style="display:none;">
																						<?php
																						$post_id = $post->post_id;
																						$this->db->select('*');
																						$this->db->from('xf_mst_files');
																						$this->db->where('xmanage_id', $post_id);
																						$this->db->limit(5);
																						$this->db->order_by('id', 'ASC');
																						$query = $this->db->get();
																						$imgvideo = $query->result();


																						?>
																						<table>
																							<tbody>
																								<tr>
																									<td>POST TYPE </td>
																									<td></td>
																								</tr>

																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->post_type ?></td>
																								</tr>

																								<tr>
																									<td>POST OWNER</td>
																									<td> </td>
																								</tr>
																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->username ?></td>
																								</tr>

																								<tr>
																									<td>POST TITLE </td>
																									<td></td>
																								</tr>
																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->post_title ?></td>
																								</tr>
																								<tr>
																									<td>POST VISUALS / VIDEOS</td>
																									<td> </td>

																								</tr>
																								<tr>
	<td colspan="2" class="slide_dot">
		<div class="slider-wrapper">
			<div class="slider">
				<?php foreach ($imgvideo as $video) { ?>
					<input type="radio" name="slider" class="trigger" id="<?= $video->id ?>" checked="checked" />
					<div class="slide">
						<figure class="slide-figure">
							<?php if ($video->type == 'image') { ?>
								<img class="slide-img" src="<?php echo base_url() . 'assets/floor_plan/' . $video->file_name; ?>">
							<?php } else { ?>
								<video class="slide-img" controls>
									<source src="<?php echo base_url() . 'assets/floor_plan/' . $video->file_name; ?>" type="video/mp4">
								</video>
							<?php } ?> 
						</figure>
					</div>
				<?php } ?>
			</div>
			<ul class="slider-nav">
				<?php foreach ($imgvideo as $video) { ?>
					<li class="slider-nav__item na-posts adcl<?= $video->id ?>"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="<?= $video->id ?>">0</label></li>
					<script>
						$(".adcl<?= $video->id ?>").click(function() {

							$(".slider-nav__item").removeClass("active");
							$(".adcl<?= $video->id ?>").addClass("active");

						})
					</script>
				<?php } ?>
			</ul>
		</div>
	</td>

																								</tr>
																								<tr>
																									<td>AVAILABILITY</td>
																									<td></td>
																								</tr>

																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->post_availability ?></td>
																								</tr>

																								<tr>
																									<td>PRICE</td>
																									<td></td>
																								</tr>

																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->price ?></td>
																								</tr>

																								<tr>
																									<td>POST DETAILS </td>
																									<td></td>
																								</tr>

																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->post_details ?></td>
																								</tr>

																								<tr>
																									<td>WEBSITE</td>
																									<td></td>
																								</tr>

																								<tr>
																									<td colspan="2" class="sp_abc zone-label"><?= $post->website ?></td>
																								</tr>
																								<?php
																								if ($post->post_type == 'PROMOTION') {
																									$action = $post->btn_url;
																									$actiontext = 'Buy Now';
																									$true = true;
																								}
																								if ($post->post_type == 'CONTEST') {
																									$action = $post->btn_url;
																									$actiontext = 'Play Game';
																									$true = true;
																								}
																								if ($post->post_type == 'LUCKY DRAW') {
																									$action = $post->btn_url;
																									$actiontext = 'Get More Chance';
																									$true = true;
																								}
																								?>
																								<tr>
																									<td colspan="2" class="sp_abc zone-label">
																										<?php if (!empty($true)) { ?>
																											<a href="<?= $action ?>" class="action-btn action-post" id="btn5" target="_blank"><?= $actiontext ?></a>
																										<?php } ?>
																									</td>
																								</tr>
																							</tbody>
																						</table>

																					</div>
																				</div>
																			</div>
																		</div>
																		<script>
																			// $('.moredetailspost<?= $post->id; ?>').click(function(){
																			// $('.more-data<?= $post->id; ?>').slideToggle();
																			// var read=$('.moredetailspost<?= $post->id; ?>').text();
																			// if (read == 'SHOW LESS') {
																			// $('.moredetailspost<?= $post->id; ?>').text("SHOW MORE")

																			// } else {
																			// $('.moredetailspost<?= $post->id; ?>').text("SHOW LESS")

																			// }
																			// })

																			$('.moredetailspost<?= $post->id; ?>').click(function() {
																				$('.more-data<?= $post->id; ?>').slideToggle();
																				var read = $('.moredetailspost<?= $post->id; ?>').text();
																				if (read == 'SHOW LESS') {
																					$('.moredetailspost<?= $post->id; ?>').text("SHOW MORE")

																				} else {
																					$('.moredetailspost<?= $post->id; ?>').text("SHOW LESS")

																				}
																			})
																			$("body").on('click', '.moredetailspost', function() {
																				var post_id = $(this).attr("post-id");
																				var project_id = '<?= $project_id; ?>';

																				if (post_id == '') {

																				} else {

																					$.ajax({
																						type: "POST",
																						url: '<?php echo base_url(); ?>places/UpdatePostIconHistory',
																						data: {
																							project_id: project_id,
																							module_name: 'POSTS',
																							feature_name: 'POSTS',
																							module_refid: post_id
																						},
																						success: function(data) {

																						}
																					});
																				}
																			});
																		</script>
																	<?php } ?>
																	<!--div class="Post_frontr_reapet clearfix postrow">

			<div class="Post-contant-top"> 
			<div class="post-date_f"><p> <b>CONTEST.</b> Posted On 2020-10-29 17:46</p> </div>
			<div class="post-read-details">
			<a href="#" post-id="116" class="moredetailspost"> MORE DETAILS</a>  
			</div>
			</div>
			
			<div class="Post_owner">	
	        <img src="http://13.235.169.150/XFactor/assets/svgavatar/for_upload/svgavatars/temp-avatars/svgA2694407788912163.png">
			<p> SHOP OWNER,Rajeev</p></div>
			<div class="Post-right-cont">
			<div class="post-contant">
			<p class="post_title_F"> kamod post 1 CONTEST </p>
			<p class="pro-bold"></p><p>No Description in DB currently</p>
			<p></p>
			</div>
			</div>
			</div-->

																</div>



															</div>
														</div>


														<div id="chat2" class="container tab-pane">
															<?php if ($No_registerUser_condition == true) { ?>
																<div class="fron-postion">

																	<?php

																	if (empty($project_id)) {
																		echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
																	} else {
																		if (!$this->ion_auth->logged_in()) {
																			echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
																		} else {
																			echo '<p class="gsm-pd">Registration is required to access Posts.</p>';
																		}
																	}
																	?>
																</div>
															<?php
															} else {
															?>
																<?php if ($userdetails->chat_enable == 0) {
																	echo '<div>CHAT FUNCTION HAS BEEN DISABLED.</div>';
																} else { ?>
																	<div class="chat-main">

																		<div class="top-search">
																			<div class="row">
																				<div class="col-md-6">
																					<select id="selectguesttype">
																						<option value="ALL"> SHOW ALL DISPLAY CONTACTS</option>

																						<?php foreach ($guesttypes as $guesttype) { ?>
																							<option value="<?php echo $guesttype; ?>">ALL BOOTH <?php echo $guesttype; ?> ONLY</option>

																						<?php }  ?>

																					</select>
																				</div>
																				<div class="col-md-6">
																					<input type="text" class="search SERseller" placeholder="SEARCH:">
																				</div>
																			</div>
																		</div>


																		<div class="inner-chat">
																			<?php $logged_in = $this->session->userdata('loggedin'); ?>
																			<?php foreach ($sellers as $seller) { ?>
																				<?php $ID = $seller['mm_id'] . '__' . $logged_in;
																				$res_msg_count = getUsersNotification($ID);
																				?>

																				<div class="nearme-box clearfix rowguest Post_frontr_reapetguest" data-guest-type="<?php echo $seller['guest_type']; ?>" data-val="<?php echo $seller['mm_username']; ?>">

																					<?php if (!empty($seller['avatar'])) { ?>

																						<img src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $seller['avatar']; ?>" />

																					<?php  } else { ?>


																						<?php if ($seller['gender'] == 'Male' || $seller['gender'] == 'MALE') { ?>

																							<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid">


																						<?php } else if ($seller['gender'] == 'Female' || $seller['gender'] == 'FEMALE') { ?>
																							<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid">



																						<?php  } else { ?>

																							<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid">



																					<?php  }
																					} ?>



																					<div class="nearme-detail">
																						<p><?php echo $seller['guest_type'] ?>,<?php echo $seller['salutation'] ?> <?php echo $seller['first_name'] . ' ' . $seller['last_name']; ?> ,<?php echo $seller['company'] ?></p>
																					</div>
																					<?php if ($res_msg_count->status_code != '404') { ?>
																						<div class="notification" id="notifi_count">
																							<span class="msg_count"><?php echo $res_msg_count->msg_count ?></span>
																						</div>
																					<?php	} ?>
																				</div>

																			<?php } ?>
																		</div>



																	</div>
																<?php } ?>
															<?php } ?>
														</div>



														<div id="chat3" class="container tab-pane">
															<?php if ($No_registerUser_condition == true) { ?>
																<div class="fron-postion">

																	<?php

																	if (empty($project_id)) {
																		echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
																	} else {
																		if (!$this->ion_auth->logged_in()) {
																			echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
																		} else {
																			echo '<p class="gsm-pd">Registration is required to access Posts.</p>';
																		}
																	}
																	?>
																</div>
															<?php
															} else {
															?>
																<div class="chat-main nearmeAlluser">


																</div>
															<?php } ?>
														</div>



														<div id="chat4" class="container tab-pane">
															<?php if ($No_registerUser_condition == true) { ?>
																<div class="fron-postion">

																	<?php

																	if (empty($project_id)) {
																		echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
																	} else {
																		if (!$this->ion_auth->logged_in()) {
																			echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
																		} else {
																			echo '<p class="gsm-pd">Registration is required to access Posts.</p>';
																		}
																	}
																	?>
																</div>
															<?php
															} else {
															?>
																<?php if ($userdetails->chat_enable == 0) {
																	echo '<div>CHAT FUNCTION HAS BEEN DISABLED.</div>';
																} else { ?>
																	<div class="chat-main">

																		<div class="top-search">
																			<div class="row">
																				<div class="col-md-6">
																					<select id="past-chat-dropdwon">
																						<option value="ALL"> SHOW EVERYONE SEARCH</option>
																						<?php foreach ($AllonlineDropdown as $type) { ?>
																							<option value="<?= $type; ?>"><?= $type; ?></option>
																						<?php } ?>

																					</select>
																				</div>
																				<div class="col-md-6">
																					<input type="text" class="search past-chat1" placeholder="SEARCH:">
																				</div>
																			</div>
																		</div>


																		<div class="inner-chat">

																			<?php
																			foreach ($allgroups as $group) {
																				if ($group->display_name != 'Town Square' && $group->display_name != 'Off-Topic') { ?>
																					<?php
																					if ($group->type == 'D') {
																						$logged_in = $this->session->userdata('loggedin');
																						$uu = str_replace($logged_in, "", $group->name);
																						$username = getusername(str_replace("_", "", $uu));
																						$dbusername = getdbusername(str_replace("_", "", $uu));
																						if ($username != 'surveybot') {
																							$user = getfulldetail($dbusername);
																							$getUserAvatar = GuestDetails($user->id) ?>

																							<?php
																							if ($user->mm_id) { ?>

																								<div class="nearme-box clearfix Post_frontr_reapetguest" data-val="<?php echo $username; ?>" data-guest-type="<?= $user->mm_id; ?>">
																									<?php if ($getUserAvatar->useravatar) { ?>
																										<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $getUserAvatar->useravatar); ?>" />
																									<?php } else { ?>
																										<?php if ($user->gender == 'Male' || 'MALE' || 'male') { ?>
																											<img src="<?php echo base_url('assets/images/GUEST_MALE.png') ?>" />
																										<?php } else if ($user->gender == 'Female' || 'FEMALE' || 'female') { ?>
																											<img src="<?php echo base_url('assets/iconsdefault/GUEST_FEMALE-removebg-preview.png') ?>" />

																										<?php } else { ?>
																											<i class="far fa-user-circle" aria-hidden="true"></i>
																									<?php	}
																									} ?>

																									<div class="nearme-detail">
																										<p><?php
																											if (empty($user->first_name)) {
																												echo $dbusername;
																											} else {
																												echo $user->guest_type . ', ' . $user->salutation . ' ' . $user->first_name . ' ' . $user->last_name . ', ' . $user->company;
																											} ?></p>
																									</div>
																								</div>
																							<?php }
																							?>

																						<?php }
																					} else { ?>
																						<div class="nearme-box clearfix openSellerChatBox" data-val="<?php echo $group->id; ?>">
																							<i class="far fa-user-circle" aria-hidden="true"></i>
																							<div class="nearme-detail">
																								<p><?php echo $group->display_name; ?></p>
																							</div>
																						</div>

																			<?php }
																				}
																			}
																			?>
																		</div>

																	</div>
																<?php } ?>
															<?php } ?>
														</div>


													</div>
												</div>

											</div>
										</div>

									</div>


								</div>
							</div>

						</div>




					</div>
					<!-- /tabs -->

				</div>
			</div>
			<div class="footer-year">
				<div class="footer">2019 ??? <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
<input type="hidden" id="floorId" value="" />
<input type="hidden" id="grid_val" value="" />
<input type="hidden" id="project_id" value="" />
<input type="hidden" id="program_id" value="" />
<input type="hidden" id="content_set_id" value="" />
<input type="hidden" id="zone_type" value="" />

<script>
	function NearMeUsers() {
		$.ajax({
			url: '<?= base_url(); ?>post_front/GetNearMeUsers',
			type: "POST",
			data: {
				project_id: <?= $project_id; ?>
			},
			success: function(response) {
				//console.log('refresh result',response);

				$(".nearmeAlluser").html(response);
			}
		});
	}
	//setInterval(NearMeUsers,5000);
	NearMeUsers();

	$(".search1").on("keyup", function() {
		if ($(this).val().length >= 0) {

			var value = $(this).val().toLowerCase();
			$(".Post_frontr_reapet").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});

	$(".past-chat1").on("keyup", function() {
		if ($(this).val().length >= 0) {

			var value = $(this).val().toLowerCase();
			$(".past-chat").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});

	$(".SERseller").on("keyup", function() {
		if ($(this).val().length >= 0) {

			var value = $(this).val().toLowerCase();
			$(".Post_frontr_reapetguest").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});

	$('#past-chat-dropdwon').change(function() {
		var post_type = $(this).val();
		if (post_type == "ALL") {
			$(".Post_frontr_reapetguest").css("display", "block");
		} else {
			$(".Post_frontr_reapetguest").each(function() {
				let row_post_type = $(this).attr('data-guest-type');

				if (row_post_type == post_type) {
					$(this).css("display", "block");

				} else {

					$(this).css("display", "none");
				}

			});


		}

	});

	$("#selectposttype").change(function() {
		var post_type = $(this).val();
		if (post_type == "ALL") {
			$(".postrow").css("display", "block");
		} else {
			$(".postrow").each(function() {
				let row_post_type = $(this).attr('data-post-type');
				console.log(row_post_type);
				console.log(post_type);
				if (row_post_type == post_type) {
					$(this).css("display", "block");

				} else {

					$(this).css("display", "none");
				}

			});


		}

	});

	$("#selectguesttype").change(function() {


		var guest_type = $(this).val();
		//alert(guest_type);
		if (guest_type == "ALL") {
			$(".rowguest").css("display", "block");
		} else {
			$(".rowguest").each(function() {
				let row_guest_type = $(this).attr('data-guest-type');
				//console.log(guest_type);
				//console.log(row_guest_type);
				if (row_guest_type == guest_type) {
					$(this).css("display", "block");

				} else {

					$(this).css("display", "none");
				}

			});


		}

	});

	$('.Post_frontr_reapetguest').click(function() {
		var username = $(this).attr('data-val');
		$.fancybox.open({
			maxWidth: 800,
			fitToView: true,
			width: '100%',
			height: 'auto',
			autoSize: true,
			type: "ajax",
			src: "<?php echo base_url(); ?>simple_view/chat_popup_allonline",
			ajax: {
				settings: {
					data: 'username=' + username,
					type: 'POST'
				}
			},
			touch: false,

		});
		//alert('hi');
		var username = $(this).attr('data-val');
		$.ajax({
			url: "<?php echo base_url('/chat_box/createChannel') ?>",
			method: 'post',
			data: {
				username: username
			},
			success: function(response) {
				console.log(response);
			}

		});
	})

	$(".openSellerChatBox").click(function() {
		var grpID = $(this).attr('data-val');

		$.fancybox.open({
			maxWidth: 800,
			fitToView: true,
			width: '100%',
			height: 'auto',
			autoSize: true,
			type: "ajax",
			src: "<?php echo base_url(); ?>simple_view/testchat2",
			ajax: {
				settings: {
					data: 'username=' + grpID,
					type: 'POST'
				}
			},
			touch: false,

		});

		var grpID = $(this).attr('data-val');
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
</script>


<style>
	#svga-gravataravatar {

		display: none !important;
	}

	#svga-shareavatar {
		display: none !important;
	}

	#container {
		position: relative;
		overflow: hidden;
		cursor: pointer;
	}

	#item {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}

	#item1 {
		position: relative;
		width: 40px;
		height: 40px;
		transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
			top .5s cubic-bezier(.42, -0.3, .78, 1.25);
	}


	#item {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}

	#item1 {
		width: 20px;
		height: 20px;
		background-color: #00b050;
		border: 1px solid #00b050;
		border-radius: 50%;
		touch-action: none;
		user-select: none;
		top: 55%;
		left: 43%;
	}

	#item:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item1:active {
		background-color: rgba(168, 218, 220, 1.00);
	}

	#item:hover {
		cursor: pointer;
	}

	#item1:hover {
		cursor: pointer;
	}
</style>
<script>
	$(document).ready(function() {
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

		$("body").on('click', '#saveAvatar', function() {



		});







	});
</script>
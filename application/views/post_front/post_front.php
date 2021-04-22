<div class="virtual_view avatar">
	<div class="modal-box">
		<div class="container-fluid avtar-container">
<?php $this->db->select('*');
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
					<div class="avtar-filter">
						<div class="row">

							<div class="col-md-6">
								<div class="user-location">
									<div id="grid_number" data-gridid=""> YOU ARE CURRENTLY AT &nbsp; &nbsp; : </div>
									<div class="select-box">
										<?php if (count($floors) != 1) { ?>
											<select name="zonetype" id="GetFloor">

												<option value="">SELECT A FLOOR PLAN</option>
												<?php foreach ($floors as $floor1) {
													if (!empty($floor)) {
												?>

														<option value="<?= $floor1->id ?>" <?php if ($floor1->id == $floor) {
																								echo 'selected';
																							} ?>><?= $floor1->floor_plan_name ?></option>
													<?php } else { ?>

														<option value="<?= $floors[0]->id ?>" <?php if ($floors[0]->id) {
																									echo 'selected';
																								} ?>><?= $floors[0]->floor_plan_name ?></option>
												<?php }
												} ?>
											</select>


										<?php } else {
											if (!empty($floors[0]->floor_plan_name)) {
												echo $floors[0]->floor_plan_name;
											} else {
												echo ' <select name="zonetype" id="GetFloor">
					 
												<option value="" >SELECT A FLOOR PLAN</option>
												</select>';
											}
										} ?>

									</div>
								</div>
								<?php if (count($floors) != 1) { ?>
									<span class="morethen">MORE THAN 1 ZONE AVAILABLE. USE DROP DOWN BOX TO SELECT ZONE.</span>
								<?php } ?>

							</div>

							<div class="col-md-6">
								<div class="looka-took">
									<span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span>
									<span class="common-space"> <?php if (empty($project_id)) {
																	echo '<p style="color:red">TO START, SELECT A PLACE TO GO TO FIRST.</p>';
																} else {
																	echo $GetHistory->zone_text;
																} ?> </span>
									<input type="hidden" id="zone_text">
									<button class="take-a-look" style="display:none;"> TAKE A LOOK AROUND</button>
								</div>
							</div>

						</div>
					</div>

					<div class="chat-feature flor-left">
						<?php if (!empty($No_registerUser)) {
							echo $No_registerUser; ?>

						<?php } else { ?>
							<div class="avtar-left to-start-select" id="container">

								<?php
								if (!empty($top) && !empty($left)) {
									$top = $top;
									$left = $left;
								} else {
									$left = 1250;

									$top = 0;
								}

								?>
								<?php if (!empty($img)) { ?>
									<div id="item" class="red_dots" style="touch-action: none; user-select: none; position: absolute; top: <?php echo $top; ?>px;left: <?= $left ?>px; z-index: 11;">
									</div>

									<!--div id="item" style="width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: <?php echo $da; ?>px;left: <?= $widt ?>px;z-index: 11;">
							</div-->
									<?php
									if (!empty($post_positions)) {
										foreach ($post_positions as $icon) {
											$position = json_decode($icon->drag_position);
											$dyTop = $position->top;
											$dyTop = explode("px", $dyTop);
											$dyTopPos = $dyTop[0];

											$dyLeft = $position->left;
											$dyLeft = explode("px", $dyLeft);
											$dyLeftPos = $dyLeft[0];

											if (in_array($dyTopPos, range(0, 690)) && in_array($dyLeftPos, range(0, 1280))) {
												$popupAI = 0;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 54;
												$Fleft = $dyLeftPos - 379;
											}

											if (in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(0, 200))) {
												//$popupAI=1;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 261;
												$Fleft = $dyLeftPos + 34;
											}
											if (in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(0, 200))) {
												//$popupAI=3;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 61;
												$Fleft = $dyLeftPos + 36;
											}
											if (in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(201, 500))) {
												//$popupAI=6;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 63;
												$Fleft = $dyLeftPos + 36;
											}
											if (in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(501, 1000))) {
												//$popupAI=8;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 56;
												$Fleft = $dyLeftPos - 381;
											}
											if (in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(1001, 1280))) {
												//$popupAI=4;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 56;
												$Fleft = $dyLeftPos - 379;
											}
											if (in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(951, 1280))) {
												//$popupAI=2;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 259;
												$Fleft = $dyLeftPos - 384;
											}
											if (in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(501, 950))) {
												//$popupAI=7;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 255;
												$Fleft = $dyLeftPos + 37;
											}
											if (in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(201, 500))) {
												//$popupAI=5;
												$popupAI = rand(1000, 9999);
												$Ftop = $dyTopPos + 257;
												$Fleft = $dyLeftPos + 34;
											}




									?>

											<div class="draggable_<?= $icon->id; ?>" data-boxid="<?= $icon->id; ?>" style="position: absolute;top:<?= $position->top; ?>;left:<?= $position->left; ?>;cursor: pointer;z-index: 11;">
												<img src="<?= base_url(); ?>assets/images/place-icon.png" class="place-drag-icon">
											</div>
											<?php if (!empty($Ftop)) { ?>
												<script>
													$(document).ready(function() {
														$('#place_popup<?= $popupAI; ?>').modal('toggle');
													})
												</script>
											<?php } ?>
											<div id="place_popup<?= $popupAI; ?>" class="modal fade place-model-popup" role="dialog" style="top: <?= $Ftop; ?>px;left: <?= $Fleft; ?>px;">
												<div class="modal-dialog">
													<div class="modal-content">

														<div class="modal-body">

															<div class="tooltips">
																<div class="tooltips-inner">
																	<h2><?= $icon->post_title; ?></h2>
																	<p><?= $icon->post_details; ?></p>
																</div>
																<div class="quick-intro">
																	<div class="chat-left"> </div>
																	<div class="chat-close"><a href="#" class="chat-to-owner"> CHAT </a> <a href="#" class="quik-intro" data-dismiss="modal">READ QUICK INTRO </a> <a href="#" class="rem_close" data-dismiss="modal">CLOSE</a> </div>
																</div>

															</div>
														</div>

													</div>
												</div>
											</div>

										<?php } ?>
								<?php }
								} ?>
								<div class="demo1">

									<div class="container" id="container-4">


										<?php

										echo "<table border ='1' class='table table1' style='border-collapse: collapse; ' >";
										$alpha = range('I', 'A');
										for ($i = 0, $row = 1; $row <= 9; $i++, $row++) {
											echo "<tr> \n";
											for ($col = 1; $col <= 16; $col++) {
												$p = $col;
												if ($p > 9) {
													$text = $alpha[$i] . $p;
												} else {
													$text =  $alpha[$i] . '0' . $p;
												}

												$myclass = "";
												$check = '<input type="checkbox" checked />';


												echo "
		   <td class='gridboxtd " . $myclass . " action_" . $text . " '   id='action_$alpha[$i]$p'>
		   <input type='hidden' id='get_$alpha[$i]$p' value=" . $text . ">
		   ";
												echo $text;
												echo "</td> \n";
												echo "<script>
$(document).ready(function(){
	$('#action_$alpha[$i]$p').click(function(){
		var temp = $('#get_$alpha[$i]$p').val();
		
		$('#grid_val').val(temp);
	})
})

</script>";
											}
											echo "</tr>";
										}
										echo "</table>";
										?>
										<?php if (!empty($img)) { ?>
											<img id="demo-4" class="floorimg" src="<?= $img; ?>" alt="your image" style="width:<?= $width ?>px;height:<?= $height; ?>px">
										<?php } ?>
									</div>





								</div>

							</div>
						<?php } ?>
					</div>

				</div>
				<script>
					$('#GetFloor').change(function() {
						var floorId = $(this).val();

						window.location = '<?php echo base_url(); ?>post_front/index/<?php echo $project_id; ?>/' + floorId;

					})
				</script>
				<div class="col-md-3 avtar-sidebar front_post">
					<div class="tabbable tabs-below">
						<div class="tab-content">


							<div class="tab-pane chats active" id="5">
								<div class="avatar-right">
									<div class="common_divF">
										<h2>POSTS</h2>
<?php 

if ($No_registerUser_condition == true) { ?>
													<div class="fron-postion">

														<?php

														if (empty($project_id)) {
															echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
														} else {
															// if (!$this->ion_auth->logged_in()) {
																// echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
															// } else {
																
															// }
															echo '<p class="gsm-pd">Registration is required to access Posts.</p>';
														}
														?>
													</div>
												<?php
												} else {
												?>

										<ul class="nav nav-tabs" role="tablist">

											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#chat1">ALL POSTS</a>
											</li>
											<li class="nav-item chat2">
												<a class="nav-link" data-toggle="tab" href="#chat2">ALL SELLERS</a>
											</li>
											<li class="nav-item chat3">
												<a class="nav-link" data-toggle="tab" href="#chat3">NEAR ME </a>
											</li>
											<li class="nav-item chat4">
												<a class="nav-link" data-toggle="tab" href="#chat4" style="margin-right:0px;">PAST CHATS</a>
											</li>

										</ul>

										<!-- Tab panes -->
										<div class="tab-content chat">

											<div id="chat1" class="container tab-pane active">
												<div class="chat-main">
													<div class="top-search">
														<div class="row">
															<div class="col-md-6 p-r-5">
																<select id="selectposttype">
																	<option value="ALL"> SHOW ALL POSTS </option>
																	<option value="INFO">SHOW ALL INFO POSTS</option>
																	<option value="PROMOTION">SHOW ALL PROMO POSTS</option>
																	<option value="CONTEST">SHOW ALL CONTEST POSTS</option>
																</select>
															</div>
															<div class="col-md-6 p-l-5">
																<input type="text" class="search SER" placeholder="SEARCH: ">
															</div>
														</div>
													</div>

													<div class="inner-chat">
														<div class="Post_front">
															<?php foreach ($posts as $post) { ?>
																<div class="Post_frontr_reapet clearfix postrow act_post_check" data-post-type="<?php echo $post->post_type; ?>" data-search="<?php echo $post->post_title; ?>">
																	<div class="Post-contant-top">
																		<div class="post-read-details">
																			<a href="#" post-id="<?php echo $post->id; ?>" class="moredetailspost" data-val="<?php echo $post->mm_username; ?>"> MORE DETAILS</a>
																		</div>
																		<div class="post-date_f">
																			<p> <b><?php echo $post->post_type; ?>.</b> Posted On <?php echo $post->created_date_time; ?>h</p>
																		</div>

																	</div>

																	<div class="Post_owner">


																		<?php if (!empty($post->avatar)) { ?>

																			<img src="<?php echo base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $post->avatar; ?>" />

																		<?php } else { ?>
																			<?php if ($post->gender == 'Male' || $post->gender == 'MALE') { ?>

																				<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_MALE.png" class="img-fluid">



																			<?php } else if ($post->gender == 'Female' || $post->gender == 'FEMALE') { ?>

																				<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/iconsdefault/GUEST_FEMALE-removebg-preview.png" class="img-fluid">



																			<?php  } else { ?>

																				<img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/images/sample.png">



																			<?php  }  ?>



																		<?php } ?>

																		<p> <b><?php echo $post->post_title; ?></b></p>
																	</div>

																	<div class="Post-right-cont">
																		<div class="post-contant">
																			<p class="post_title_F"><?php echo $post->guest_type . ', '  . $post->username; ?> </p>



																			<?php
																			$post_id = $post->post_id;
																			$this->db->select('*');
																			$this->db->from('xf_mst_files');
																			$this->db->where('xmanage_id', $post_id);
																			$this->db->limit(5);
																			$this->db->order_by('id', 'ASC');
																			$query = $this->db->get();
																			$imgvideo = $query->result();

																			if (!empty($imgvideo)) {
																			?>
			<div class="slide_dot">
				<div class="slider-wrapper">
					<div class="slider">
						<?php foreach ($imgvideo as $video) {
							if ($imgvideo[0]->id == $video->id) {
								$checked = 'checked';
								$active = 'active';
								$slide = 'just-slide';
							} else {
								$checked = '';
								$active = '';
								$slide = '';
							}
						?>
							<input type="radio" name="slider" class="trigger adcl adcl<?= $video->id ?> <?= $active; ?>" id="<?= $video->id ?>" <?php echo $checked; ?> />
							<div class="slide slide<?= $post->post_id ?> slide<?= $video->id ?> <?= $slide; ?> ">
								<figure class="slide-figure">
									<?php if ($video->type == 'image') { ?>
										<img class="slide-img" src="<?php echo base_url() . 'assets/post/' . $video->file_name; ?>">
									<?php } else { ?>
										<video class="slide-img" id="slide-img<?=$video->id ?>" controls>
											<source src="<?php echo base_url() . 'assets/post/' . $video->file_name; ?>" type="video/mp4">
										</video>
									<?php } ?>
								</figure>
							</div>
						<?php } ?>
					</div>
					<ul class="slider-nav">
						<?php foreach ($imgvideo as $video) {
							if ($imgvideo[0]->id == $video->id) {
								$active = 'active';
							} else {
								$active = '';
							}
						?>
							<li class="slider-nav__item na-posts adcl adcl<?= $post->post_id ?> adcl<?= $video->id ?> <?php echo $active; ?>"><label class="slider-nav__label slider-nav__label--dot slider-nav__label--invert" for="<?= $video->id ?>">0</label></li>
							<script>
								// $("input[name='slider']:checked").each(function(){
								// if($(this).val() == "Brand"){
								// $(".showstore").hide();
								// $(".showbrand").show();
								// }
								// });
								$(".adcl<?= $video->id ?>").click(function() {
									
									$('#slide-img<?=$video->id ?>').trigger('pause');
									$(".adcl<?= $post->post_id ?>").removeClass("active");

									$(".adcl<?= $video->id ?>").addClass("active");
									//$(this).addClass("active");

									$(".slide<?= $post->post_id ?>").removeClass("just-slide");
									$(".slide<?= $video->id ?>").addClass("just-slide");
									// $(".adcl1").removeAttr('checked');
									// $(".adcl1<?= $video->id ?>").attr('checked');
								})
							</script> 
						<?php } ?>
					</ul>
				</div>
			</div>
																			<?php } ?>


																			<div class="pro-bold pro-bold-post"><?php echo $post->post_details; ?>
																			</div>
																		</div>
																	</div>
																</div>
																<script>
																	$('.act_post_check').click(function() {

																		$('.act_post_check').removeClass('active');
																		$(this).addClass('active');
																	})
																</script>
															<?php } ?>



														</div>

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
													<div class="chat-main">
														<div class="top-search">
															<div class="row">
																<div class="col-md-6 p-r-5">

																	<select id="selectguesttype">
																		<option value="ALL"> SHOW ALL DISPLAY CONTACTS</option>



																		<?php foreach ($guesttypes as $guesttype) { ?>
																			<option value="<?php echo $guesttype; ?>">ALL BOOTH <?php echo str_replace('BOOTH', '', $guesttype); ?> ONLY</option>

																		<?php }  ?>

																	</select>
																</div>
																<div class="col-md-6 p-l-5">
																	<input type="text" class="search SERseller" placeholder="SEARCH: ">
																</div>
															</div>
														</div>

														<div class="inner-chat AllSallers"> 

<?php if ($userdetails->chat_enable != 0 || !empty($user_table_check)) {
																echo '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
															} ?>


														</div>

													</div>
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
													<div class="chat-main">

														<div class="top-search">
															<div class="row">
																<div class="col-md-6 p-r-5">
																	<select id="nearme_dropdwon">
																		<option value="ALL"> SHOW EVERYONE</option>
																		<?php foreach ($AllonlineDropdown as $type) { ?>
																			<option value="<?= $type; ?>"><?= $type; ?></option>
																		<?php } ?>

																	</select>
																</div>
																<div class="col-md-6 p-l-5">
																	<input type="text" class="search SER" placeholder="SEARCH: ">
																</div>
															</div>
															<br>
															<p>CONTACTS NEAR YOU IS REFRESHED AUTOMATICALLY.</p>

															<p>CONTACTS MAY DISAPPEAR FROM THIS LIST IF EITHER THE CONTACTS OR YOU MOVE TO DIFFERENT ZONES.</p>

														</div>

														<div class="inner-chat nearmeAlluser">
															<?php if ($userdetails->chat_enable != 0 || !empty($user_table_check)) {
																echo '<div class="fron-postion"><p class="gsm-pd">CHAT FEATURE HAS BEEN DISABLED BY ADMINISTRATOR.</p></div>';
															} ?>
														</div>
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
													<div class="chat-main">

														<div class="top-search">
															<div class="row">
																<div class="col-md-6 p-r-5">
																	<select id="past-chat-dropdwon">
																		<option value="ALL"> SHOW EVERYONE</option>
																		<?php foreach ($AllonlineDropdown as $type) { ?>
																			<option value="<?= $type; ?>"><?= $type; ?></option>
																		<?php } ?>

																	</select>
																</div>
																<div class="col-md-6 p-l-5">
																	<input type="text" class="search SER postpast" placeholder="SEARCH: ">
																</div>
															</div>
														</div>

														<div class="inner-chat past-chat">
															
														</div>
													</div>
												<?php } ?>
											</div>


										</div>


												<?php }?>
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
									<a class="track_menu" data-track="PLACES" href="<?= base_url(); ?>places/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																							echo '/' . $floor;
																																						} ?>"><img src="<?= base_url(); ?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
								</li>
								<li>
									<a data-track="AVATAR" class="track_menu" href="<?= base_url(); ?>avatar/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																							echo '/' . $floor;
																																						} ?>"><img src="<?= base_url(); ?>assets/images/chat/avtar.png" alt=""><span>MY AVATAR</span></a>
								</li>
								<li>
									<a data-track="CHAT" class=" track_menu" href="<?= base_url(); ?>chat_box/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																							echo '/' . $floor;
																																						} ?>"><img src="<?= base_url(); ?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
								</li>
								<li>
									<a data-track="CONTENT" class="track_menu" href="<?= base_url(); ?>content_page/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																									echo '/' . $floor;
																																								} ?>"><img src="<?= base_url(); ?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

								</li>
								<li>
									<a data-track="WORKSHOP" class="track_menu" href="<?= base_url(); ?>workshop/redirectanother/<?php echo $project_id; ?><?php echo '/' . $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/shops.png" alt=""><span>WORKSHOPS</span></a>
								</li>
								<li class="active">
									<a data-track="POSTS" class="active track_menu" href="<?= base_url(); ?>post_front/index/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																							echo '/' . $floor;
																																						} ?>"><img src="<?= base_url(); ?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>
								</li>
								<li>

									<a data-track="PROGRAM" class="track_menu" href="<?= base_url(); ?>program_page/redirectanother/<?php echo $project_id; ?><?php echo '/' . $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
								</li>

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


							</ul>
						</div>
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
	<input type="hidden" id="project_id" value="" />
	<input type="hidden" id="floorId" value="" />
	<input type="hidden" id="grid_val" value="" />
	<input type="hidden" id="zone_id" value="" />
	<input type="hidden" id="zone_type" value="" />
	<input type="hidden" id="content_set_id" value="" />

	<script>
		$('#nearme_dropdwon').change(function() {
			var post_type = $(this).val();
			if (post_type == "ALL") {
				$(".rowguest1").css("display", "block");
			} else {
				$(".rowguest1").each(function() {
					let row_post_type = $(this).attr('data-guest-type');

					if (row_post_type == post_type) {
						$(this).css("display", "block");

					} else {

						$(this).css("display", "none");
					}

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
		var interval_1=1;
	var interval_2=1;
	var interval_3=1;
	var interval_4=1;
$('.chat2').click(function(){
	interval_2=setInterval(AllSallers, <?php echo CHATSET_AJAXTIME_INTERVAL;?>);
	for (var i = 1; i < interval_4; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_3; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_1; i++)
        window.clearInterval(i);
	
	clearInterval(interval_4);
	clearInterval(interval_3);
	clearInterval(interval_1);
})
$('.chat3').click(function(){
	interval_3=setInterval(NearMeUsers, <?php echo CHATSET_AJAXTIME_INTERVAL;?>);
	for (var i = 1; i < interval_4; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_2; i++)
        window.clearInterval(i);
	
	for (var i = 1; i < interval_1; i++)
        window.clearInterval(i);
	
	clearInterval(interval_4);
	clearInterval(interval_2);
	clearInterval(interval_1);
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
		function NearMeUsers() {
			$.ajax({
				url: '<?= base_url(); ?>post_front/GetNearMeUsers',
				type: "POST",
				data: {
					project_id: <?= $project_id; ?>,
					floor_id: <?= $floor; ?>
				},
				success: function(response) {
					//console.log('refresh result',response);

					$(".nearmeAlluser").html(response);
				}
			});
		}
		//setInterval(NearMeUsers, 30000);
		NearMeUsers();


		function AllSallers() {
			$.ajax({
				url: '<?= base_url(); ?>post_front/AllSellers',
				type: "POST",
				data: {
					project_id: '<?= $project_id; ?>'

				},
				success: function(response) {
					//console.log('refresh result',response);

					$(".AllSallers").html(response);
				}
			});
		}
		//setInterval(AllSallers, 30000);
		AllSallers();
		/* $(".search").on("keyup", function () {
			
			if ($(this).val().length >= 1) {
				$('.show-more-place').hide();
				
			} else {
				$('.show-more-place').show(); 
			}
		 }) ; */

		function PastChats() {
			$.ajax({
				url: '<?= base_url(); ?>chat_box/PastChats',
				type: "POST",
				data: {
					project_id: <?= $project_id; ?>,
					module: 'post'
				},
				success: function(response) {
					//console.log('refresh result',response);

					$(".past-chat").html(response);
				}
			});
		}
		//setInterval(PastChats, 30000);
		PastChats();

		$(".search").on("keyup", function() {
			if ($(this).val().length >= 0) {

				var value = $(this).val().toLowerCase();
				$(".Post_frontr_reapet").filter(function() {
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


		$(".postpast").on("keyup", function() {
			if ($(this).val().length >= 0) {

				var value = $(this).val().toLowerCase();
				$(".postpastlist").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

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







		var dragItem = document.querySelector("#item");
		var container = document.querySelector("#container-4");

		var active = false;
		var currentX;
		var currentY;
		var initialX;
		var initialY;
		var xOffset = 0;
		var yOffset = 0;

		//element = document.getElementById("item").style.cssText = "width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: "+height+"px;left: "+width+"px;z-index: 11;";

		container.addEventListener("click", clicked, false);

		function clicked(e) {
			console.log("currentx ==>" + e.clientX + "  currentY ==>" + e.clientY);
			var xPosition = event.clientX - container.getBoundingClientRect().left - (dragItem.clientWidth / 2);
			var yPosition = event.clientY - container.getBoundingClientRect().top - (dragItem.clientHeight / 2);
			dragItem.style.left = xPosition + "px";
			dragItem.style.top = yPosition + "px";

		}

		$('#container-4').click(function(e) {
			$('.take-a-look').hide();
			var x = e.clientX;
			var y = e.clientY;
			var coor = y + "," + x;
			var project = '<?= $project_id; ?>';
			var floorId = '<?= $floor; ?>';
			var grid_val = $('#grid_val').val();

			if (floorId == '' || grid_val == '') {

			} else {
				var url = '<?php echo base_url(); ?>places/placeByzone';
				$.ajax({
					type: "POST",
					url: url,
					data: {
						floorId: floorId,
						grid_val: grid_val
					},
					success: function(data) {
						var data = JSON.parse(data);
						console.log(data);
						if (data.zone_type != null) {
							$('.common-space').empty();
							$('#zone_text').empty();
							$('.common-space').text(data.zone_type + ', ' + data.zone_name);
							$('#zone_text').val(data.zone_type + ', ' + data.zone_name);
							$('#zone_type').val(data.zone_type);
							$('#zone_id').val(data.zone_id);
							if (data.zone_type == 'COMMON SPACE') {

							}
						} else {
							$('.common-space').text('UNUSED SPACE');
							$('#zone_text').val('UNUSED SPACE');
						}
					}
				})
			}
			if (project == '' || floorId == '' || grid_val == '') {

			} else {
				var zone_id = $('#zone_id').val();
				var zone_text = $('#zone_text').val();
				var url = '<?php echo base_url(); ?>places/placeByFloorHistory';
				$.ajax({
					type: "POST",
					url: url,
					data: {
						floorId: floorId,
						activity: coor,
						project: project,
						zone_id: zone_id,
						zone_text: zone_text,
						module_name: 'FLOOR PLAN',
						grid_val: grid_val,
						top: y,
						left: x
					},
					success: function(data) {
						var data = $.trim(data);

						if (data) {
							var zone_type = $('#zone_type').val();
							$('#content_set_id').val(data);
							var content_set_id = $('#content_set_id').val();
							if (zone_type == 'COMMON SPACE' || content_set_id !== '') {

								$('.take-a-look').show();
							}

							if (zone_type == 'DISPLAY SPACE') {
								$('.take-a-look').show();
								$.fancybox.getInstance('close');
								$.fancybox.open({
									maxWidth: 800,
									fitToView: true,
									width: '100%',
									height: 'auto',
									autoSize: true,
									type: "ajax",
									src: '<?php echo base_url(); ?>places/getContentData',
									ajax: {
										settings: {
											data: 'content_id=' + data + '&grid_val=' + grid_val,
											type: 'POST'
										}
									},
									touch: false,
									clickSlide: false,
									clickOutside: false

								});
							}
						} else {
							$('#content_set_id').val('');
						}
					}
				})
			}
		})

		$("body").on('click', '.take-a-look', function() {
			var id = $('#content_set_id').val();
			var grid_val = $('#grid_val').val();
			var zone_type = $('#zone_type').val();
			//if(id=='' || grid_val=='' || zone_type!='COMMON SPACE'){
			if (id == '' || grid_val == '') {

			} else {
				var data = {
					content_id: id,
					grid_val: grid_val
				}
				$.fancybox.getInstance('close');
				$.fancybox.open({
					maxWidth: 800,
					fitToView: true,
					width: '100%',
					height: 'auto',
					autoSize: true,
					type: "ajax",
					src: "<?= base_url(); ?>places/getContentData",
					ajax: {
						settings: {
							data: data,
							type: 'POST'
						}
					},
					touch: false,
					clickSlide: false,
					clickOutside: false

				});
			}

		});



		$("body").on('click', '.moredetailspost', function() {
			var post_id = $(this).attr("post-id");
			var project_id = '<?= $project_id; ?>';
			var floorId = '<?= $floor; ?>';
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

				var data = {
					post_id: post_id,
					project_id: <?php echo $project_id; ?>
				}
				$.fancybox.getInstance('close');
				$.fancybox.open({
					maxWidth: 800,
					fitToView: true,
					width: '100%',
					height: 'auto',
					autoSize: true,
					type: "ajax",
					src: "<?= base_url(); ?>places/getContentDataforPost",
					ajax: {
						settings: {
							data: data,
							type: 'POST'
						}

					},
					modal: true,
					touch: false,
					clickSlide: false,
					clickOutside: false


				});
				// var username = $(this).attr('data-val');
				// $.ajax({
				// 	url: "<?php echo base_url('/chat_box/createChannel') ?>",
				// 	method: 'post',
				// 	data: {
				// 		username: username
				// 	},
				// 	success: function(response) {
				// 		console.log(response);
				// 	}

				// });
			}

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
			transition: left .5s cubic-bezier(.42, -0.3, .78, 1.25),
				top .5s cubic-bezier(.42, -0.3, .78, 1.25);
		}


		#item {
			border-radius: 50%;
			touch-action: none;
			user-select: none;
			top: 55%;
			left: 43%;
		}

		#item:active {
			background-color: rgba(168, 218, 220, 1.00);
		}

		#item:hover {
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


		});

		// $('.Post_frontr_reapetguest').click(function() {
		// 	var username = $(this).attr('data-val');
		// 	$.fancybox.open({
		// 		maxWidth: 800,
		// 		fitToView: true,
		// 		width: '100%',
		// 		height: 'auto',
		// 		autoSize: true,
		// 		type: "ajax",
		// 		src: "<?php echo base_url(); ?>chat/testchat",
		// 		ajax: {
		// 			settings: {
		// 				data: 'username=' + username,
		// 				type: 'POST'
		// 			}
		// 		},
		// 		touch: false,

		// 	});
		// 	//alert('hi');
		// 	var username = $(this).attr('data-val');
		// 	$.ajax({
		// 		url: "<?php echo base_url('/chat_box/createChannel') ?>",
		// 		method: 'post',
		// 		data: {
		// 			username: username
		// 		},
		// 		success: function(response) {
		// 			console.log(response);
		// 		}

		// 	});
		// })
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
						data: 'username=' + grpID,
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
	</script>
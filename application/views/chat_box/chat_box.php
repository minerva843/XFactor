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
									<div id="item" class="red_dots" style="touch-action: none; user-select: none; position: absolute; top: <?php echo $top; ?>px;left: <?= $left ?>px;z-index: 11;">
									</div>

									<!--div id="item" style="width: 20px; height: 20px; background-color: #00b050; border: 1px solid #00b050; border-radius: 50%; touch-action: none; user-select: none; position: absolute; top: <?php echo $da; ?>px;left: <?= $widt ?>px;z-index: 11;">
							</div-->
								<?php } ?>
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
					$(document).ready(function() {



					})
					$('#GetFloor').change(function() {
						var floorId = $(this).val();

						window.location = '<?php echo base_url(); ?>post_front/index/<?php echo $project_id; ?>/' + floorId;

					})
				</script>
				<div class="col-md-3 avtar-sidebar">
					<div class="tabbable tabs-below">
						<div class="tab-content">
							<div class="tab-pane " id="1">
								<div class="avatar-right">
									<div class="common_divF">

										<h2> MY AVATAR</h2>
										<div class="avatar-profile">
											<div class="row">
												<div class="col-md-5">
													<?php // print_r(); 
													?>
													<?php if (!empty($user->avatar)) { ?>

														<a id="avatar_small_dyanmic_dn" href="<?= base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" download><img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/svgavatar/for_upload/svgavatars/temp-avatars/<?php echo $user->avatar; ?>" class="img-fluid"> </a>

													<?php  } else { ?>
														<a id="avatar_small_dyanmic_dn" href="<?= base_url(); ?>assets/images/avatar-small.jpg" download><img id="avatar_small_dyanmic" src="<?= base_url(); ?>assets/images/avatar-small.jpg" class="img-fluid"> </a>
													<?php } ?>


												</div>
												<div class="col-md-7 small-avtar">

													<div class="form-group row">
														<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DISPLAY NAME </label>
														<div class="col-sm-8 ">
															<div class="zone-label">: <?php echo $user->display_name; ?></div>
														</div>
													</div>

													<div class="form-group row">
														<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">FIRST NAME </label>
														<div class="col-sm-8">
															<div class="zone-label">: <?php echo $user->first_name; ?></div>
														</div>
													</div>

													<div class="form-group row">
														<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">LAST NAME </label>
														<div class="col-sm-8">
															<div class="zone-label">: <?php echo $user->last_name; ?></div>
														</div>
													</div>

													<div class="form-group row">
														<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">COMPANY NAME</label>
														<div class="col-sm-8">
															<div class="zone-label"> : <?php echo $user->company; ?></div>
														</div>
													</div>

													<div class="form-group row">
														<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">DESIGNATION</label>
														<div class="col-sm-8">
															<div class="zone-label"> : <?php echo $user->designation; ?></div>
														</div>
													</div>


												</div>
											</div>
										</div>
										<h2>CUSTOMIZE MY AVATAR</h2>

										<div id="svgAvatars" class="avtar-plugin">


											<!--<img src="<?= base_url(); ?>assets/images/avatar-big.jpg" class="img-fluid">-->



										</div>
										<div class="plugin">
											<input type="button" id="downloadavatar" value="Download" class="action-btn">
											<input type="button" id="saveAvatar" value="SAVE" class="action-btn" name="save">
										</div>

									</div>

								</div>
							</div>

							<!--div class="tab-pane chats" id="0">
<div class="avatar-right">
<h2> SELECT A PLACE TO GO TO</h2>
<div class="top-search">

<div class="row">
<div class="col-md-6 p-r-5"> 
<select>
<option> SHOW EVERYONE SEARCH</option>
</select>
</div>
<div class="col-md-6 p-l-5">  
<input type="text" class="search" placeholder="SEARCH:">
</div>
</div>

</div>

<div class="places-main">

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>


<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>

<div class="palces-repeat">
<p class="bold-p">ONLINE EVENTS, NO REGISTRATION REQUIRED (-)</p>
<p>20200604, 1200h – 1600h, FAMILY DAY OUT AT THE BEACH</p>
<p>20200604, 1300h – 1800h, CAR COMPANY REACH OUT CAMPAIGN</p>
</div>
    
</div>      
   

 
</div> 
</div-->

							<div class="tab-pane chats active" id="2">
								<div class="avatar-right chat-frount">
									<div class="common_divF">
										<h2> Chat</h2>

										<?php if ($No_registerUser_condition == true) { ?>
											<div class="fron-postion">
												<?php

												if (empty($project_id)) {
													echo '<p class="gsm-pd">A PLACE MUST BE SELECTED FIRST FOR YOUR CONTROLS TO WORK.</p>';
												} else {
													if (!$this->ion_auth->logged_in()) {
														echo '<p class="gsm-pd">YOU MUST BE LOGGED IN TO ACCESS THIS FEATURE.</p>';
													} else {
														echo '<p class="gsm-pd">Registration is required to access Chat.</p>';
													}
												}
												?>
											</div>
										<?php
										} else { ?>

											<ul class="nav nav-tabs" role="tablist">

												<li class="nav-item chat1">
													<a class="nav-link active" data-toggle="tab" href="#chat1">ALL ONLINE</a>
												</li>
												<li class="nav-item chat2">
													<a class="nav-link" data-toggle="tab" href="#chat2">GROUP CHATS</a>
												</li>
												<li class="nav-item chat3">
													<a class="nav-link" data-toggle="tab" href="#chat3">NEAR ME</a>
												</li>
												<li class="nav-item chat4">
													<a class="nav-link" data-toggle="tab" href="#chat4" style="margin-right:0px;">PAST CHATS</a>
												</li>
											</ul>

											<div class="tab-content chat">

												<div id="chat1" class="container tab-pane active">
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
																	<input type="text" class="search chattabsearch" placeholder="SEARCH:">



																	<!-- <input type="button" id="dwn-btn" value="Download dinamically generated text file" /> -->

																</div>
															</div>
														</div>


														<div class="inner-chat all-online">


														</div>



													</div>
												</div>

												<div id="chat2" class="container tab-pane">
													<div class="chat-main">

														<div class="top-search">
															<div class="row">

																<div class="col-md-12">
																	<input type="text" class="search groupsearch" placeholder="SEARCH:">
																</div>
															</div>
														</div>


														<div class="inner-chat" id="group-chat">


														</div>



													</div>
												</div>



												<div id="chat3" class="container tab-pane">
													<div class="chat-main">

														<div class="top-search">
															<div class="row">
																<div class="col-md-6">
																	<select id="nearme_dropdwon">
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
															<br>
															<p>CONTACTS NEAR YOU IS REFRESHED AUTOMATICALLY.</p>

															<p>CONTACTS MAY DISAPPEAR FROM THIS LIST IF EITHER THE CONTACTS OR YOU MOVE TO DIFFERENT ZONES.</p>

														</div>


														<div class="inner-chat nearmeAlluser">


														</div>



													</div>
												</div>



												<div id="chat4" class="container tab-pane">
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
																	<input type="text" class="search pastsearch" placeholder="SEARCH:">
																</div>
															</div>
														</div>


														<div class="inner-chat past-chat">


														</div>


													</div>
												</div>


											</div>

										<?php } ?>
									</div>

								</div>
							</div>


							<div class="tab-pane chats" id="6">
								<div class="avatar-right">
									<h2> PROGRAM</h2>

									<div class="program-chat">

										<div class="program clearfix">
											<i class="far fa-user-circle" aria-hidden="true"></i>
											<div class="program-right-cont">
												<div class="program-contant-top">
													<div class="program-date">
														<p>23 JULY 2019, 0900h – 0915h</p>
													</div>
													<div class="program-read-more">
														<a href="#"> READ MORE</a>
													</div>
												</div>
												<div class="program-contant">
													<p class="pro-bold"><b>OPENING REMARKS</b>
													</p>
													<p>MIKE MIKEY, VICE PRESIDENT, ABC COMPANY</p>

												</div>
											</div>
										</div>


										<div class="program clearfix">
											<i class="far fa-user-circle" aria-hidden="true"></i>
											<div class="program-right-cont">
												<div class="program-contant-top">
													<div class="program-date">
														<p>23 JULY 2019, 0915h – 1015h</p>
													</div>
													<div class="program-read-more">
														<a href="#"> READ MORE</a>
													</div>
												</div>
												<div class="program-contant">
													<p class="pro-bold"><b>XCONNECT & PARTNERS : HOW TO REALISE THE
															POTENTIAL OF XCONNECT WITH THE USE OF EXISTING
															PRODUCTS THAT OUR PARTNERS HAVE</b>
													</p>
													<p> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ
														COMPANY.</p>
												</div>
											</div>
										</div>

										<div class="program clearfix">
											<img src="<?= base_url(); ?>assets/images/chat/spsr1.png" alt="">
											<div class="program-right-cont">
												<div class="program-contant-top">
													<div class="program-date">
														<p>23 JULY 2019, 1015h – 1045h</p>
													</div>
													<div class="program-read-more">
														<a href="#"> READ MORE</a>
													</div>
												</div>
												<div class="program-contant">
													<p class="pro-bold"><b>TEA BREAK</b>
													</p>
													<p>THIS SEGMENT IS SPONSORED BY CISCO NETWORK. CHECK
														OUT THE LATEST CISCO PRODUCTS ON DISPLAY. REMEMBER
														TO GO ON THE GUIDED EXPERIENCE TOUR WITH
														REPRESENTATIVES FROM CISCO NETWORK TOO.</p>
												</div>
											</div>
										</div>

										<div class="program clearfix">
											<i class="far fa-user-circle" aria-hidden="true"></i>
											<div class="program-right-cont">
												<div class="program-contant-top">
													<div class="program-date">
														<p>23 JULY 2019, 1045h – 1200h</p>
													</div>
													<div class="program-read-more">
														<a href="#"> READ MORE</a>
													</div>
												</div>
												<div class="program-contant">
													<p class="pro-bold"><b>TRANSFORMATION OF WORKPLAC</b>
													</p>
													<p> IN THIS SEGMENT, YOU WILL BE ABLE TO LEARN ABOUT THE</p>
												</div>
											</div>
										</div>

										<div class="program clearfix">
											<i class="far fa-user-circle" aria-hidden="true"></i>
											<div class="program-right-cont">
												<div class="program-contant-top">
													<div class="program-date">
														<p>23 JULY 2019, 0915h – 1015h</p>
													</div>
													<div class="program-read-more">
														<a href="#"> READ MORE</a>
													</div>
												</div>
												<div class="program-contant">
													<p class="pro-bold"><b>XCONNECT & PARTNERS : HOW TO REALISE THE
															POTENTIAL OF XCONNECT WITH THE USE OF EXISTING
															PRODUCTS THAT OUR PARTNERS HAVE</b>
													</p>
													<p> JOHN JOHNNY, SENIOR ANALYTICS ADVISOR, XYZ
														COMPANY.</p>
												</div>
											</div>
										</div>


									</div>

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
							<li class="active">
								<a data-track="CHAT" class="active track_menu" href="<?= base_url(); ?>chat_box/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
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
							<li>
								<a data-track="POSTS" class="track_menu" href="<?= base_url(); ?>post_front/redirectanother/<?php echo $project_id; ?><?php if (!empty($floor)) {
																																							echo '/' . $floor;
																																						} ?>"><img src="<?= base_url(); ?>assets/images/chat/visit.png" alt=""><span>POSTS </span></a>
							</li>
							<li>

								<a data-track="PROGRAM" class="track_menu" href="<?= base_url(); ?>program_page/redirectanother/<?php echo $project_id; ?><?php echo '/' . $floor; ?>"><img src="<?= base_url(); ?>assets/images/chat/program.png" alt=""><span>PROGRAM</span></a>
							</li>


						</ul>
						<?php
						//echo virtual_view_menu();
						//include(base_url().'application/views/include/virtual_view_menu.php');
						//include APPPATH.'application/views/include/virtual_view_menu.php';
						//include("virtual_view_menu.php"); 
						?>

					</div>
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

<input type="hidden" id="checkval" value="" />

<script>
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
$('.chat2').click(function(){
	interval_2=setInterval(AllGroups, <?php echo CHATSET_AJAXTIME_INTERVAL;?>);
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
	
	NearMeUsers();

	function AllGroups() {
			$.ajax({
				url: '<?= base_url(); ?>chat_box/chatGroup',
				type: "POST",
				data: {
					userID: <?= $this->session->userdata('user_id'); ?>,
					project_id: <?= $project_id; ?>
				},
				success: function(response) {
					//console.log('ashdgjflsdkfjg',response);
					$('#group-chat').html(response);
				}
			});

	};
	//setInterval(AllGroups, 30000);
	AllGroups();



	function allonline() {
		$.ajax({
			url: '<?= base_url(); ?>chat_box/allonline',
			type: "POST",
			data: {
				project_id: <?= $project_id; ?>
			},
			success: function(response) {
				//console.log('refresh result',response);

				$(".all-online").html(response);
			}
		});
	}
	//setInterval(allonline, 30000);
	allonline();

	function PastChats() {
		$.ajax({
			url: '<?= base_url(); ?>chat_box/PastChats',
			type: "POST",
			data: {
				project_id: <?= $project_id; ?>,
				module: 'chat'
			},
			success: function(response) {
				//console.log('refresh result',response);

				$(".past-chat").html(response);
			}
		});
	}
	//setInterval(PastChats, 30000);
	PastChats();

	// function notifiCount() {
	// 	let x = $('#msg_count span').html();
	// 	console.log(x);
	// 	if ($('span #msg_count').val() < 0) {
	// 		$('#notifi_count').css('display', 'none');
	// 	};
	// };
	// notifiCount();


	$(".SER").on("keyup", function() {

		if ($(this).val().length >= 1) {
			$('.show-more-place').hide();

		} else {
			$('.show-more-place').show();
		}
	})

	$(".SER").on("keyup", function() {
		if ($(this).val().length >= 0) {

			var value = $(this).val().toLowerCase();
			$(".palces-repeat .bt-rev").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});


	$(".chattabsearch").on("keyup", function() {
		if ($(this).val().length >= 0) {
			var value = $(this).val().toLowerCase();
			$(".onlinesearch").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});


	$(".groupsearch").on("keyup", function() {
		if ($(this).val().length >= 0) {
			var value = $(this).val().toLowerCase();
			$(".groupsearchlist").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

			});
		}
	});


	$(".pastsearch").on("keyup", function() {
		if ($(this).val().length >= 0) {
			var value = $(this).val().toLowerCase();
			$(".pastsearchlist").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

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
</script>

<style>
	.inner-chat .nearme-box img {
		width: 35px;
		height: 35px;
		margin-right: 19px;
		border-radius: 47%;
	}

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
</script>

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

		$(".openSellerChatBox").click(function() {
			var grpID = $(this).attr("data-val");

			$.fancybox.open({
				maxWidth: 800,
				fitToView: true,
				width: "100%",
				height: "auto",
				autoSize: true,
				type: "ajax",
				src: "<?= base_url(); ?>chat/testchat2",
				ajax: {
					settings: {
						data: "username=" + grpID,
						type: "POST"
					}
				},
				touch: false,

			});

			var grpID = $(this).attr("data-val");
			$.ajax({
				url: "<?= base_url(); ?>chat_box/grpChatMsg",
				method: "post",
				data: {
					grpID: grpID
				},
				success: function(response) {
					console.log(response);
				}

			});


		});


		// $(".openSellerChatBox").click(function() {
		// 	var grpID = $(this).attr('data-val');

		// 	$.fancybox.open({
		// 		maxWidth: 800,
		// 		fitToView: true,
		// 		width: '100%',
		// 		height: 'auto',
		// 		autoSize: true,
		// 		type: "ajax",
		// 		src: "<?php echo base_url(); ?>chat/testchat2",
		// 		ajax: {
		// 			settings: {
		// 				data: 'username=' + grpID,
		// 				type: 'POST'
		// 			}
		// 		},
		// 		touch: false,

		// 	});

		// 	var grpID = $(this).attr('data-val');
		// 	$.ajax({
		// 		url: "<?php echo base_url('/chat_box/grpChatMsg') ?>",
		// 		method: 'post',
		// 		data: {
		// 			grpID: grpID
		// 		},
		// 		success: function(response) {
		// 			console.log(response);
		// 		}

		// 	});


		// });



		/* $("#openChatBox").click(function(){
	   
		
		      
	  
	   
   });
   */



	});
	/* $('.openChatBox').click(function(){
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
        
    });*/
	//alert('hi');
	// 	$('.openChatBox').click(function(){
	// 	var username = $(this).attr('data-val');
	// 	$.ajax({
	//         url:"<?php echo base_url('/chat_box/createChannel') ?>",
	//         method: 'post',
	//         data: {username:username},
	//         success: function(response){
	//             console.log(response);
	//         }

	//     });
	// })




	// $(document).on('click','#dwn-btn',function(e){
	//     alert('Hey history clicked');
	//     $.ajax({
	//         method:'GET',
	//         url: 'http://54.179.99.134/api/v4/channels/be4deazcftgdffqutd1qkmdtqe/posts',
	//         headers:{
	//             'Content-Type' : 'application/json',
	//             'Authorization' : 'Bearer qsq8k87i4bbnxj3iorcxwgdapy'
	//         },
	//         success: function(response){
	//             console.log(response);
	//         },
	//         error: function(){
	//             console.log('Someyhing went wrong');
	//         }
	//     })
	// })
</script>
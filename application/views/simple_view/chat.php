<div class="virtual_view avatar simple_view_outer">
	<div class="modal-box">
		<div class="container-fluid avtar-container">


			<div class="row avatar-main">


				<div class="col-md-12 avtar-sidebar simple-view">
					<div class="tabbable tabs-below">
						<div class="tab-content">
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
										<ul class="nav nav-tabs simple_tabs" style="margin-top: 8px;">

											<li>
												<a class=" track_menu" data-track="PLACES" href="<?= base_url(); ?>simple_view/places/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/places.png" class="img-fluid"><span>PLACES</span></a>
											</li>

											<li>
												<a data-track="AVATAR" class="track_menu" href="<?= base_url(); ?>simple_view/avatar/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/avtar.png" class="img-fluid"><span>MY AVATAR</span></a>
											</li>
											<li class="active">
												<a data-track="CHAT" class="active track_menu" href="<?= base_url(); ?>simple_view/chat/<?= $project_id ?>" class="active"><img src="<?= base_url(); ?>assets/images/chat/chat.png" alt=""><span>CHAT</span></a>
											</li>
											<li>
												<a data-track="CONTENT" class="track_menu" href="<?= base_url(); ?>simple_view/content/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/watch.png" alt=""><span>CONTENT</span></a>

											</li>
											<li>
												<a data-track="POSTS" class="track_menu" href="<?= base_url(); ?>simple_view/post/<?= $project_id ?>"><img src="<?= base_url(); ?>assets/images/chat/visit.png" alt=""><span>POSTS</span></a>
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
									<h2> Chat</h2>
								</div>
							</div>


							<div class="tab-pane chats active" id="2">
								<div class="avatar-right chat-frount">
									<div class="simle_view_midde">

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
										} else {
										?>

											<div class="sml-container">

												<ul class="nav nav-tabs" role="tablist">

													<li class="nav-item simple-view-nav chat1">
														<a class="nav-link active" data-toggle="tab" href="#chat1">ALL ONLINE</a>
													</li>
													<li class="nav-item simple-view-nav chat2">
														<a class="nav-link" data-toggle="tab" href="#chat2">GROUP CHATS</a>
													</li>
													<!-- <li class="nav-item">
															<a class="nav-link" data-toggle="tab" href="#chat3">NEAR ME</a>
														</li> -->
													<li class="nav-item simple-view-nav chat4">
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
																		<select id="allondropdwon">
																			<option value="ALL"> SHOW EVERYONE</option>
																			<?php foreach ($AllonlineDropdown as $type) { ?>
																				<option value="<?= $type; ?>"><?= $type; ?></option>
																			<?php } ?>

																		</select>
																	</div>
																	<div class="col-md-6">
																		<input type="text" class="search search1" placeholder="SEARCH:">
																	</div>
																</div>
															</div>


															<div class="inner-chat all-online">




															</div>

															<script>
																$(".search1").on("keyup", function() {
																	if ($(this).val().length >= 0) {

																		var value = $(this).val().toLowerCase();
																		$(".all-online").filter(function() {
																			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

																		});
																	}
																});
															</script>

														</div>
													</div>

													<div id="chat2" class="container tab-pane">
														<div class="chat-main">

															<div class="top-search">
																<div class="row">

																	<div class="col-md-12">
																		<input type="text" class="search" placeholder="SEARCH:">
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
																			<option value="ALL"> SHOW EVERYONE SEARCH</option>
																			<?php foreach ($AllonlineDropdown as $type) { ?>
																				<option value="<?= $type; ?>"><?= $type; ?></option>
																			<?php } ?>

																		</select>
																	</div>
																	<div class="col-md-6">
																		<input type="text" class="search search2 " placeholder="SEARCH:">
																	</div>
																</div>
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
																			<option value="ALL"> SHOW EVERYONE SEARCH</option>
																			<?php foreach ($AllonlineDropdown as $type) { ?>
																				<option value="<?= $type; ?>"><?= $type; ?></option>
																			<?php } ?>

																		</select>
																	</div>
																	<div class="col-md-6">
																		<input type="text" class="search search3" placeholder="SEARCH:">
																	</div>
																</div>
															</div>

															<div class="inner-chat past-chat">

																
															</div>



														</div>
													</div>
												</div>

											</div>
									</div>
								<?php } ?>
								</div>

							</div>


						</div>

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
<style>
	#svga-gravataravatar {

		display: none !important;
	}

	#svga-shareavatar {
		display: none !important;
	}
</style>

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
				project_id: <?= $project_id; ?>
			},
			success: function(response) {
				//console.log('refresh result',response);

				$(".nearmeAlluser").html(response);
			}
		});
	}
	//setInterval(NearMeUsers, 15000);
	NearMeUsers();

	function allonline() {
		$.ajax({
			url: '<?= base_url(); ?>simple_view/allonline',
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
	setInterval(allonline, 15000);
	allonline();
	
	function PastChats() {
		$.ajax({
			url: '<?= base_url(); ?>simple_view/PastChats',
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
	//setInterval(PastChats,15000);
	PastChats();

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


		//   $('.openChatBox').click(function(){
		// 	  var username = $(this).attr('data-val');
		// 		  $.fancybox.open({
		//         maxWidth  : 800,
		//         fitToView : true,
		//         width     : '100%',
		//         height    : 'auto',
		//         autoSize  : true,
		//         type        : "ajax",
		//         src         : "<?php echo base_url(); ?>simple_view/chat_popup_allonline",
		//         ajax: { 
		//            settings: { data : 'username='+username, type : 'POST' }
		//         },
		//         touch: false,

		//     });
		// 		//alert('hi');
		// 		var username = $(this).attr('data-val');
		// 		$.ajax({
		//             url:"<?php echo base_url('/chat_box/createChannel') ?>",
		//             method: 'post',
		//             data: {username:username},
		//             success: function(response){
		//                 console.log(response);
		//             }

		//         });
		// 	})




	});
</script>


<script>
	$(document).ready(function() {



		$(".openSellerChatBox").click(function() {
			var grpID = $(this).attr('data-val');

			$.fancybox.open({
				maxWidth: 800,
				fitToView: true,
				width: '100%',
				height: 'auto',
				autoSize: true,
				type: "ajax",
				src: "<?php echo base_url(); ?>simple_view/chat_group_popup",
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





	});
	// $('.openChatBox').click(function(){
	// var username = $(this).attr('data-val');
	// $.fancybox.open({
	// maxWidth  : 800,
	// fitToView : true,
	// width     : '100%',
	// height    : 'auto',
	// autoSize  : true,
	// type        : "ajax",
	// src         : "<?php echo base_url(); ?>chat/testchat",
	// ajax: { 
	// settings: { data : 'username='+username, type : 'POST' }
	// },
	// touch: false,

	// });

	// var username = $(this).attr('data-val');
	// $.ajax({
	// url:"<?php echo base_url('/chat_box/createChannel') ?>",
	// method: 'post',
	// data: {username:username},
	// success: function(response){
	// console.log(response);
	// }

	// });
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


	function AllGroups() {
		$.ajax({
			url: '<?= base_url(); ?>simple_view/chatGroup',
			type: "POST",
			data: {
				userID: <?= $this->session->userdata('user_id'); ?>,
				project_id: <?= $project_id; ?>
			},
			success: function(response) {
				$('#group-chat').html(response);
			}
		});
	};
	//setInterval(AllGroups, 15000);
	AllGroups();
</script>
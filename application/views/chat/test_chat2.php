<style>
	.fancybox-close-small {
		display: none !important;
	}

	.star-program input.smalimput {
		width: 8%;
		margin-left: 16px;
	}

	.star-program {
		padding-left: 0px;
	}

	.star-program label.col-form-label {
		padding-left: 0px;
		text-align: center;
	}

	.star-program label.col-form-label {
		font-size: 12px;
		font-weight: normal;
		width: 6%;
	}

	.star-program label.col-form-label:after {
		display: none;
	}
	#attachCan{position: absolute;
    right: 17px;
    color: #222222;
    cursor: pointer;display:none;}
</style>


<div class="main-section floor_steps" id="add-floor">
	<div class="container">
		<form method="POST" action="">
			<div class="top-header">
				<div class="row">
					<div class="col-md-9">
						<h2>GROUP CHAT</h2>

					</div>

					<div class="col-md-3">
						<div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
					</div>
				</div>
			</div>

			<div class="middle-body register-form">

				<div class="row">
					<div class="col-md-9">
						<div class="zone-info chat-lefts">

							<!--  GROUP chat  -->



							<div class="row group-chats">
								<div class="col-md-6">
									<div class="img-content">
										<h3> YOU ARE IN A GROUP CHAT</h3>
										<?php if($grpD->chat_image){?>
											<img src="<?php echo base_url('assets/group_chat_images/' . $grpD->chat_image); ?>" class="img-fluid">
											<?php }
												else{ ?>
												<img src="<?php echo base_url('assets/images/chat/GROUP_CHAT_DEFAULT_IMAGE.png'); ?>" class="img-fluid">
											
										<?php }?>

										<div class="group-chats-left-content">
											<p><b>GROUP CHAT NAME :</b> </p>
											<p><?php echo $grpD->group_chat_name; ?> </p>
											<p><b>GROUP CHAT REMARKS :</b></p>
											<p> <?php echo $grpD->remarks; ?> </p>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="img-content user-group-chat">
										<h3> USERS IN THIS GROUP CHAT </h3>

									</div>

									<div class="chat-user-scroll">


										<?php //PRINT_R($users); 
										foreach ($users as $user) { 	?>

											<div class="row mt-10">
												<div class="col-sm-2">

												<?php if (empty($user->avatar)) {
												?><img src="<?php echo base_url('assets/images/GUEST_MALE.png'); ?>" class="img-fluid" data-mmusername=<?= $user->mm_username ?>>
												<?php } else { ?>
													<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $user->avatar); ?>" data-mmusername=<?= $user->mm_username ?> class="img-fluid">
												<?php } ?>
												</div>
												<div class="col-sm-10">   
													<div class="prefred-name">
														<p><b> PREFERRED NAME :</b> <?= $user->username ?></p>  
														<p><b> COMPANY NAME : </b> <?= $user->company ?></p>
													</div>
												</div>
											</div>
										<?php } ?>


									</div>
								</div>

							</div>


						</div>
					</div>




					<div class="col-md-3 right-text">
						<div class="tab right-tabs chat-rights">

							<div class="table-content">

								<ul class="nav nav-tabs" role="tablist">

									<li>
										<a class="active" data-toggle="tab" href="#chat5">CHAT</a>
									</li>
									<!--li >
							  <a class="" data-toggle="tab" href="#chat6">A QUICK INTRO</a>
							</li-->

								</ul>

								<div class="tab-content chat">

									<div id="chat5" class="container tab-pane active">
										<div class="table_info">

											<div class="current-chat"> CURRENT CHAT : </div>

											<div class="nearme-box chat-top-profile">
												<div class="nearme-box clearfix">
												<?php if($grpD->chat_image){?>
											<img src="<?php echo base_url('assets/group_chat_images/' . $grpD->chat_image); ?>" class="img-fluid">
											<?php }
												else{ ?>
												<img src="<?php echo base_url('assets/images/chat/GROUP_CHAT_DEFAULT_IMAGE.png'); ?>" class="img-fluid">
											
										<?php }?>
													<div class="nearme-detail">
														<p><?php echo $grpD->group_chat_name; ?></p>
													</div>
												</div>
											</div>

											<div class="chat-deright-top">
												<div class="chat-inscroll" id="chat_msg">
													<?php echo chatMsg(); ?>

												</div>
												<!-- <div class="down" id="down-scroll"> <i class="fas fa-angle-down"></i></div> -->
											</div>

											<div class="chat-type">
												<i class="fa fa-times" id="attachCan"></i>
												<div id="beforeUpload"></div>
												<textarea id="chatbox_t3" placeholder="START TYPING HERE "></textarea>
											</div>

										</div>
									</div>


									<div id="chat6" class="container tab-pane">
										<div class="table_info quick-intro">

											<div class="current-chat"> ABOUT “GUEST TYPE” </div>

											<div class="quick-intro-scroll">

												<table>
													<tbody>

														<tr>
															<td colspan="2"> <b>ABOUT “GUEST TYPE” </b> </td>
														</tr>

														<tr>
															<td>DISPLAY NAME</td>
															<td>BROWN HAIR & JACKET</td>
														</tr>

														<tr>
															<td>COMPANY NAME</td>
															<td>THIS LONG NAME COMPANY...</td>
														</tr>

														<tr>
															<td>DESIGNATION</td>
															<td>THE IT DEPARTMENT, TEAM LEAD</td>
														</tr>

													</tbody>
												</table>

												<p> </p>

												<p> MR ABC HAS BEEN IN THE INDUSTRY FOR 24 YEARS. HE
													IS ONE OF THE PIONEERS OF IoT.</p>

												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS.</p>

												<p> MR ABC HAS BEEN IN THE INDUSTRY FOR 24 YEARS. HE
													IS ONE OF THE PIONEERS OF IoT.</p>

												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS</p>

												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS.</p>

												<p> MR ABC HAS BEEN IN THE INDUSTRY FOR 24 YEARS. HE
													IS ONE OF THE PIONEERS OF IoT.</p>


												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS</p>

												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS</p>

												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS.</p>

												<p> MR ABC HAS BEEN IN THE INDUSTRY FOR 24 YEARS. HE
													IS ONE OF THE PIONEERS OF IoT.</p>


												<p> TODAY, HE WILL BE TALKING ABOUT ABCs OF IoT.
													AT THE SAME TIME, THERE WILL BE A DEEP DIVE
													SESSION LATER IN THE DAY WHERE HE WILL BE ABLE TO
													SHARE RECOMMEDATIONS FOR IMPLEMENTATIONS</p>


											</div>
										</div>
									</div>





								</div>

								<div class="form-submit attach-file">

								<div class="upload-btn-wrapper">
								<div id="imgNm"></div>
								<button class="btn">ATTACH FILE</button>
								<input type="file" name="myfile" id="fileupload"  style="display:none;"/>
								</div> 

									<input type="submit" value="SEND" class="action-btn FloorSubmit" name="submit" id="btn5">
								</div>
							</div>
						</div>
					</div>



				</div>
			</div>

			<div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>

		</form>
	</div>

</div>
<div id="myModalconfirm" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p>File size must be 10 MB or lesser.</p>

			<p>File format that are accepted are JPG, PNG, PDF, MP3, MP4</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeconfirm">OK</span> </div> 
	</div>
</div>

<div id="myModalexceed" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p style="color:red;">ENSURE THAT FILE SIZE IS NOT MORE THAN 10 MB.</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeexceed">OK</span> </div> 
	</div>
</div>   

<div id="myModalext" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p style="color:red;">ENSURE THAT FILE FORMAT IS JPEG, PNG, MP3, MP4, PDF.</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeext">OK</span> </div> 
	</div>
</div>



<script>
	$(document).ready(function() {
		// $('.chat-inscroll').animate({
			// scrollTop: $('.chat-inscroll')[0].scrollHeight
		// }, 1000);

		function chatrefresh() {
			$.ajax({
				url: '<?= base_url(); ?>Chat/chatMsg',
				success: function(response) {
					//console.log('refresh result',response);
					$(".chat-inscroll").html(response);
				}
			});
		}
		
		function chatNoti() {
			$.ajax({
				url: '<?= base_url(); ?>Chat/chatRef',
				success: function(response) {
					console.log('refresh result',response);
					$("#chat_msg").append(response);
				}
			});
		}
		
		setInterval(chatNoti, 1800);
		chatrefresh();

		// $('body').on('click','#down-scroll',function(e){
			// $('.chat-inscroll').animate({
			// scrollTop: $('.chat-inscroll')[0].scrollHeight
		// }, 1000);	
		// })

			$("#btn5").click(function(e) {
		e.preventDefault();
		var msg = $('.chat-type textarea').val();
		var formdata = new FormData();
		var file_data = $('#fileupload').prop('files')[0]; 
		
		formdata.append('myfile', file_data);
		formdata.append('msg', msg);
		console.log(formdata);
		//if ($("#chatbox_t3").val().trim().length < 1) {
			//$('#btn5').prop('disabled', 'true');
			//return;
		//} else {
			$.ajax({
				url: "<?php echo base_url('/chat_box/sendMessage') ?>",
				type: 'POST',
				data: formdata,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(response) {
					console.log(response);
					$('.chat-type textarea').val('');
					$('#beforeUpload').html('');
					$('#attachCan').hide();
					$('.chat-type textarea').show();
					$("#chat_msg").append(response);
					$('#chat_msg').animate({
						scrollTop: $('#chat_msg')[0].scrollHeight
					}, 1000);
				}
			});
		//}
	});
		
		$('.btn').click(function(e){
			e.preventDefault();
			var modal = document.getElementById("myModalconfirm");
			var span = document.getElementsByClassName("closeconfirm")[0];
			modal.style.display = "block";
			span.onclick = function() {
				modal.style.display = "none";
				$('#fileupload').click();
			}
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
			
			
		})
		
		
	$('#fileupload').on('change',function(){
			
			var input = document.getElementById('fileupload');
			var filename = $("#fileupload").val();
			var filextsion=filename.split('.').pop(); 
			//console.log(input.files[0].type[1]);
			if(filextsion =='jpg' || filextsion =='JPG' || filextsion == 'jpeg' || filextsion =='JPEG' || filextsion == 'PNG' || filextsion =='png' || filextsion == 'MP4' || filextsion =='mp4' || filextsion == 'MP3' || filextsion =='mp3' || filextsion == 'PDF' || filextsion =='pdf'){
				var condition=true;
			}else{
				var condition=false;
			}
			console.log(filextsion);
			if (input.files[0].size > 10485760) {
				var modal = document.getElementById("myModalexceed");
				var span = document.getElementsByClassName("closeexceed")[0];
				modal.style.display = "block";
				span.onclick = function() {
					modal.style.display = "none";
					$('#fileupload').click();
				} 
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			}
			else
			{
				if(condition==true){
					var output = document.getElementById('beforeUpload');
					var fl = event.target.files[0].type.split("/");
					var base_url = '<?php echo base_url("assets/images/icon/")?>';
					if(fl[0] == 'application' || fl[1] == 'mp4' || fl[1] == 'mp3')
					{
						var f = fl[1]+'.png';
						var html = '<img src='+base_url+f+' style="height:150px;margin-right: 20px;">';
					}
					else
					{
						var html = '<img src='+URL.createObjectURL(event.target.files[0])+' style="height:150px;margin-right: 20px;">';
					}
					
					html += '<span>'+event.target.files[0]['name']+'</span>';
					//html += '<i class="fa fa-times fa-2x" id="cancelAttach" style="position: absolute;right: 15px;cursor: pointer;"></i>';
					output.innerHTML = html;
					$('#attachCan').show();
					$('#chatbox_t3').hide();
				}else{
					var modal = document.getElementById("myModalext");
					var span = document.getElementsByClassName("closeext")[0]; 
					modal.style.display = "block";
					span.onclick = function() {
						modal.style.display = "none";
						$('#fileupload').click();
					}
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
				}
				// console.log(event.target.files[0].type);
				// console.log(event.target.files[0].type.split("/"));
				
				
			}
				
		})
	
		
		
		$('#attachCan').click(function(){
			$('#attachCan').hide();
			$('#beforeUpload').html('');
			$('#chatbox_t3').show();
		});
		$('#chatbox_t3').keypress(function(e) {
			//console.log(e);
			if (e.keyCode == 13 && e.shiftKey) {
				console.log("Triggered enter+shift");
			}
			if (e.keyCode == 13 && !e.shiftKey) {
				//alert('hi');
				e.preventDefault();
				var msg = $('.chat-type textarea').val();
				if ($("#chatbox_t3").val().trim().length < 1) {
					$('#btn5').prop('disabled', 'true');
					return;
				} else {
					$.ajax({
						url: "<?php echo base_url('/chat_box/sendMessage') ?>",
						type: 'POST',
						data: {
							msg: msg
						},
						success: function(response) {
							console.log(response);
							$('.chat-type textarea').val('');
							$('#beforeUpload').html('');
							$('#attachCan').hide();
							$('.chat-type textarea').show();
							$("#chat_msg").append(response);
							$('#chat_msg').animate({
								scrollTop: $('#chat_msg')[0].scrollHeight
							}, 1000);
						}
					});
				}
				console.log("Triggered enter");
			}
		})

	
	$("body").on('click', '.groupuser-avatar', function(e) {
			var username = $(this).attr('data-mmusername');
			$.fancybox.open({
				maxWidth: 200,
				fitToView: true,
				width: '50%',
				height: 'auto',
				autoSize: true,
				type: "ajax",
				src: '<?php echo base_url(); ?>chat/groupuserinfo',
				ajax: {
					settings: {
						data: username,
						type: 'POST'
					}
				},
				touch: false,
				clickSlide: false,
				clickOutside: false

			});
		})




		$("body").on('click', '.backbtn', function() {

			$.fancybox.getInstance('close');
			$.fancybox.open({
				src: '<?= base_url(); ?>project/index',
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

		$('body').on('click', '.close-btn', function() {
			$.fancybox.close();
			<?php if(empty($workshop)){?>
			//location.reload();
			<?php }?>

		});


		$.validator.setDefaults({
			submitHandler: function() {

				var group = $('#group').val();
				var project_name = $('#project_name').val();
				var project_type = $('#project_type').val();
				var venue_name = $('#venue_name').val();
				var venue_address = $('#venue_address').val();
				var country = $('#country').val();
				var venue_postal_code = $('#venue_postal_code').val();
				var setup_start_date_time = $('#setup_start_date_time').val();
				var setup_end_date_time = $('#setup_end_date_time').val();
				var event_start_date_time = $('#event_start_date_time').val();
				var event_end_date_time = $('#event_end_date_time').val();
				var strike_start_date_time = $('#strike_start_date_time').val();
				var strike_end_date_time = $('#strike_end_date_time').val();

				var formdata = new FormData();
				var url = "<?php echo base_url(); ?>project/add/<?php if (!empty($data1)) {
																	echo $data1->id;
																} ?>";
				formdata.append('group', group);
				formdata.append('project_name', project_name);
				formdata.append('project_type', project_type);
				formdata.append('venue_name', venue_name);
				formdata.append('venue_address', venue_address);
				formdata.append('country', country);
				formdata.append('venue_postal_code', venue_postal_code);
				formdata.append('setup_start_date_time', setup_start_date_time);
				formdata.append('setup_end_date_time', setup_end_date_time);
				formdata.append('event_start_date_time', event_start_date_time);
				formdata.append('event_end_date_time', event_end_date_time);
				formdata.append('strike_start_date_time', strike_start_date_time);
				formdata.append('strike_end_date_time', strike_end_date_time);

				console.log(formdata);

				$.ajax({
					type: "POST",
					url: url,
					data: formdata,
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						var data = $.trim(data);
						$.fancybox.getInstance('close');

						if (data) {

							$.fancybox.open({
								src: '<?php echo base_url(); ?>project/addstep2project/' + data,
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

						}
					}
				});


			}
		});


		$("#register-form2").validate({
			rules: {

				group: "required",
				project_name: "required",
				project_type: "required",
				venue_name: "required",
				venue_address: "required",
				country: "required",
				venue_postal_code: {
					required: true,
					digits: true,
				},
				setup_start_date_time: "required",
				setup_end_date_time: "required",
				event_start_date_time: "required",
				event_end_date_time: "required",
				strike_start_date_time: "required",
				strike_end_date_time: "required",

			},
			errorPlacement: function() {
				return false;
			}
			// messages: {

			// group: "ENSURE THAT A GROUP IS SELECTED.",
			// project_name: "ENSURE THAT PROJECT NAME IS FILLED IN.",
			// project_type: "ENSURE THAT A PROJECT TYPE IS SELECTED.",
			// venue_name: "ENSURE THAT VENUE IS FILLED IN.",
			// venue_address: "ENSURE THAT VENUE ADDRESS IS FILLED IN.",
			// country: "ENSURE THAT A COUNTRY IS SELECTED.",
			// venue_postal_code: "ENSURE THAT VENUE POSTAL CODE IS FILLED IN.",
			// setup_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// setup_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// event_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// event_end_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN",
			// strike_start_date_time: "ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN.",
			// strike_end_date_time:"ENSURE THAT ALL DATE & TIME FIELDS ARE FILLED IN" 
			// }
		});
	});
</script>

<style>
	.fancybox-close-small {
		display: none;
	}

	.error {
		color: red !important;

	}
</style>
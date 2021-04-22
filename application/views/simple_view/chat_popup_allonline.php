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
</style>


<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/datetimepickerJquery/css/jquery.datetimepicker.min.css">
 <link href="https://xdsoft.net/components/com_jquery_plugins/style/style.css" />		
 <link href="https://xdsoft.net/scripts/pp/prism.css" />
 <link href="https://xdsoft.net/scripts/calendar-popup/build/calendar.css" />
 
 -->




<div class="main-section floor_steps chat_simple_view" id="add-floor">
	<div class="container">
		
			<div class="top-header">
				<div class="row">
					<div class="col-md-9 chatpo1">
						<h2>CHAT</h2>

					</div>

					<div class="col-md-3 chatpo2">
						<div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
					</div>
				</div>
			</div>

			<div class="middle-body register-form">

				<div class="row">
				

					<script>
						$('#chat-tab').click(function() {
							$('#attach-file').show();
						})
						$('#myquick-intro').click(function() {
							$('#attach-file').hide();
						})
					</script>


					<div class="col-md-12 right-text">
						<div class="tab right-tabs chat-rights">

							<div class="table-content">

								<ul class="nav nav-tabs" role="tablist">

									<li>
										<a class="active" id="chat-tab" data-toggle="tab" href="#chat5">CHAT</a>
									</li>
									<li>
										<a id="myquick-intro" data-toggle="tab" href="#chat6">A QUICK INTRO</a>
									</li>

								</ul>

								<div class="tab-content chat">

									<div id="chat5" class="container tab-pane active">
										<div class="table_info">

											<div class="current-chat"> CURRENT CHAT : </div>

											<div class="nearme-box chat-top-profile">
												<div class="nearme-box clearfix">
													<?php if ($partnerlogged->avatar){ ?>
											<img src="<?php echo base_url('assets/svgavatar/for_upload/svgavatars/temp-avatars/' . $partnerlogged->avatar); ?>" class="img-fluid">
										<?php } else { ?>
											<img src="<?php echo base_url(); ?>assets/images/GUEST_MALE.png" class="img-fluid">
										<?php } ?>
													<div class="nearme-detail">
														<p>
															<?php echo $partnerGuest->guest_type . ', ' . $partnerGuest->salutation . ' ' . $partnerGuest->first_name . ' ' . $partnerGuest->last_name . ', ' . $partnerGuest->company_name; ?>
														</p>
													</div>
												</div>
											</div>

											<div class="chat-deright-top">
												<div class="chat-inscroll" id="chat_msg">

													<?php //echo chatMsg(); 
													?>
												</div>
												<!--<div class="down" id="down-scroll"> <i class="fas fa-angle-down"></i></div>-->

											</div>

											<div class="chat-type">
												<i class="fa fa-times" id="attachCan" style="display:none;"></i>
												<div id="beforeUpload"></div>
												<textarea id="chatbox_t3" placeholder="START TYPING HERE "></textarea>
											</div>

										</div>
									</div>


									<div id="chat6" class="container tab-pane">
										<div class="table_info quick-intro">

											<div class="current-chat"> ABOUT <?php echo $partnerGuest->guest_type; ?> </div>

											<div class="quick-intro-scroll">

												<table>
													<tbody>

														

														<tr>
															<td>DISPLAY NAME</td>
															<td class=""></td>
														</tr>   
														
														<tr>
															<td colspan="2" class="sp_abc zone-label"><?php echo $partnerGuest->first_name . ' ' . $partnerGuest->last_name; ?></td>
														</tr>  

														<tr>
															<td>COMPANY NAME</td>
															<td></td>
														</tr>
														
														<tr>
															<td colspan="2" class="sp_abc zone-label"><?php echo $partnerGuest->company; ?></td>
														</tr>

														<tr>
															<td>DESIGNATION</td>
															<td></td>
														</tr>
														
														<tr>
															<td colspan="2" class="sp_abc zone-label"><?php echo $partnerGuest->designation; ?></td>
														</tr>
														
														<tr>
															<td>QUICK INTRO</td>
															<td></td>
														</tr>
														
														<tr>
															<td colspan="2" class="sp_abc zone-label"><?php echo $partnerGuest->quick_intro; ?></td>
														</tr>

													</tbody>
												</table>

												<p> </p>   

												




											</div>
										</div>
									</div>



									<input type="hidden" class="channelID" value="">

								</div>

								<div class="form-submit attach-file">




									 <div class="upload-btn-wrapper">
										<button class="btn">ATTACH FILE</button>
										<input type="file" name="myfile" id="fileupload" style="display:none;">
									</div> 

									<input type="submit" value="SEND" class="action-btn FloorSubmit" name="submit" id="btn5">
									<?php //$rt = $this->attachFile(); echo $rt;
									?>
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#chat-tab').click(function() {
							$('.attach-file').show();
						})
						$('#myquick-intro').click(function() {
							$('.attach-file').hide();
						})
					</script>


				</div>
			</div>

			<!-- div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div -->

		
	</div>

</div>

<div id="myModalconfirm" class="modal delete-sorting simple-chat-popup">
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

<div id="myModalexceed" class="modal delete-sorting simple-chat-popup">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p style="color:red;">ENSURE THAT FILE SIZE IS NOT MORE THAN 10 MB.</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeexceed">OK</span> </div> 
	</div>
</div>   

<div id="myModalext" class="modal delete-sorting simple-chat-popup">
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



		// $('body').on('click','#down-scroll',function(e){
			// $('#chat_msg').animate({
			// scrollTop: $('#chat_msg')[0].scrollHeight
		// }, 1000);	
		// })

		function chatrefresh() {
			$.ajax({
				url: '<?= base_url(); ?>Chat/chatMsg',
				success: function(response) {
					$("#chat_msg").html(response);
				}
			});
		}
		//setInterval(chatrefresh,1800);
		chatrefresh();
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
		
	});
</script>

<script>
	$(document).ready(function() {

		$('#chat_msg').animate({
			scrollTop: $('#chat_msg')[0].scrollHeight
		}, 1000);
		// $("body").on('click','#btn5',function(e){
		// 	alert('hi btn5 clicked');
		// 	e.preventDefault();
		// 	$.ajax({
		// 		type:"POST",
		// 		dataType: 'json',
		// 		url:"http://54.179.99.134/api/v4/files?channel_id=1m4znedibf8hppo5sjxpabzjuo",
		// 		headers:{
		// 			"Authorization": "Bearer uiu8cutu4jr95ycbxyb9sqjk9h",
		// 			"Content-Type" :"multipart/form-data"
		// 		},
		// 		data :{
		// 			"files" : "/home/abhishek/Pictures/testimage.jpg"
		// 		},
		// 		success:function(response){
		// 			console.log('FinalResponse',response)
		// 		},
		// 		error: function(response){
		// 			console.log("something went wrong!")
		// 		}
		// 	})
		// });


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
			//location.reload();

		});


		
		});



	/*$('#btn5').click(function(e) {
		e.preventDefault();
		var filePath=$('#fileupload').val(); 
		$.ajax({
			url: "<?php echo base_url('/chat_box/attachFile') ?>",
			method: 'post',
			data: {
				image: filePath
			},
			success: function(response) {
				console.log(response);
				$('.chat-type textarea').val('');
			}

		});
	})*/
	
	$('#attachCan').click(function(){
		$('#attachCan').hide();
		$('#beforeUpload').html('');
		$('#chatbox_t3').show();
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

	$('#chatbox_t3').keypress(function(e) {
		if (e.keyCode == 13 && e.shiftKey) {
			console.log("Triggered enter+shift");
		}
		if (e.keyCode == 13 && !e.shiftKey) {
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
	
	$(window).on("load", function() {
		console.log("window loaded");
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
<script src="<?=base_url();?>assets/grid/clayfy.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/grid/clayfy.min.css" type="text/css">
<?php
$floor_plan_drop_point = explode(',', $data->floor_plan_drop_point);
?>
<style>
	article,
	aside,
	figure,
	footer,
	header,
	hgroup,
	menu,
	nav,
	section {
		display: block;
	}

	.column {
		float: left;
		width: 43.75px;
		border: 1px gray solid;
		text-align: center;
	}

	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	.rect1 {
		<?php if (!empty($data->floor_plan_drop_point)) { ?>height: <?php echo $floor_plan_drop_point[1] . 'px'; ?> !important;
		width: <?php echo $floor_plan_drop_point[0] . 'px'; ?> !important;
		<?php } else { ?>height: 100px !important;
		width: 150px !important;
		<?php } ?>bottom: 0px;
		left: 1px;
	}

	.container {
		margin-bottom: 0px;
		height: auto;
		max-width: 800px;
		position: relative;
		padding-left: 0px;
		padding-right: 0px;
	}

	.table {
		border: green;
		height: 450px;
		max-width: 100%;
	}

	td {
		text-align: center;
	}

	a {
		text-decoration: none;
		color: red;
	}

	.myclass {
		background-color: #00b300bf;
	}

	.custom-handlers.clayfy-top:after,
	.custom-handlers.clayfy-bottom:after,
	.custom-handlers.clayfy-left:after,
	.custom-handlers.clayfy-right:after {
		content: '';
		position: absolute;
		height: 1px;
		top: 0;
		left: 0;
		width: 100%;
		background: red;
	}

	.custom-handlers.clayfy-bottom:after {
		top: auto;
		bottom: 0;
	}

	.custom-handlers.clayfy-left:after {
		width: 1px;
		height: 100%;
	}

	.custom-handlers.clayfy-right:after {
		width: 1px;
		height: 100%;
		right: 0;
		left: auto;
	}

	.custom-handlers.right:after {
		height: 100%;
	}

	#add-floor .zone-info.zone-info-grid.floor-palnadd-grid {
		max-height: 350px;
		margin-top: 0px;
		overflow-y: scroll;
	}

	#add-floor .header-title {
		width: 100%;
	}

	#add-floor input#btn55 {
		min-height: 32px;
	}

	#add-floor .form-submit a,
	input {
		font-size: 12px !important;
	}

	#add-floor .floorplan-gridsucess .floorpalns {
		max-height: 332px;
		min-height: 332px;
	}

	.form-submit button {
		height: 27px;
		padding: 1px 30px 0px 30px;
	}
</style>

<div class="main-section floor_steps" id="add-floor">
	<div class="container">

		<div class="top-header">
			<div class="row">
				<div class="col-md-9">
					<h2>FLOOR PLANS (ADD) <b><span class="sucess">SUCCESSFUL </span></b></h2>

					<p> <b><?php echo date('Ymd hi'); ?>h. </b> THIS FLOOR PLAN HAS BEEN ADDED.</p>
				</div>

				<div class="col-md-3">
					<div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
				</div>
			</div>
		</div>

		<div class="middle-body register-form floor-plans-add-sucess">
			<div class="row">


				<div class="col-md-9">

					<div class="row">
						<div class="header-title">
							<p style="text-align:center"> THIS IS WHAT YOUR GUEST WILL SEE WHEN THEY FIRST ENTER YOUR PAGE.</p>
						</div>
					</div>

					<?php  //print_r($zone); 
					?>

					<div class="zone-info">

						<div class="demo1">

							<div class="container floor-img-edit" id="container-4">
								<!--img id="demo-4" class="blah rect " src="<?php echo base_url() . 'assets/floor_plan/' . $FloorData->file_name . $FloorData->file_type; ?>" alt="your image"-->


								<img id="demo-4" class="blah1 rect1" src="<?php echo base_url() . 'assets/floor_plan/' . $data->file_name . $data->file_type; ?>" alt="your image">
							</div>





						</div>

					</div>
				</div>

				<div class="col-md-3 right-text">
					<div class="tab right-tabs">

						<div class="table-content">
							<ul>
								<nav>
									<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
										<!--                              <li> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CONFIG PAGE</a> </li> -->
										<li><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">MAIN MENU</a> </li>
										<!--                                 <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a> -->
									</div>
								</nav>
							</ul>

							<div class="table_info floor-step floorplan-gridsucess floor-plan-addsucess-right">
								<p><span class="current-bold">CURRENTLY SELECTED :</span> <span style="color:black;font-size: 14px;"><?php echo $data->floor_plan_name; ?></span></p>
								<p>ALL FLOOR PLAN DETAILS ARE LISTED BELOW :</p>
								<h5>FLOOR PLAN CREATION INFO</h5>

								<div class="floorpalns" id="printJS-form-floor-add">
								<h5>FLOOR PLAN CREATION INFO</h5>
									<link rel="stylesheet" href="<?= base_url(); ?>assets/css/print.css" type="text/css">
									<div class="row">
										<div class="col-sm-6 floor-result-1"> GROUP </div>
										<div class="col-sm-6 floor-result"> : <?= $data->group_name ?> </div>
									</div>
									<div class="row mb-20">
										<div class="col-sm-6 floor-result-1"> GROUP STATUS </div>
										<div class="col-sm-6 floor-result"> : <?= $data->group_status ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> PROJECT ID</div>
										<div class="col-sm-6 floor-result"> : <?= $data->proj_id ?> </div>
									</div>

									<div class="row mb-20">
										<div class="col-sm-6 floor-result-1"> FLOOR PLAN ID </div>
										<div class="col-sm-6 floor-result"> : <?= $data->floor_plan_id ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> CREATED DATE & TIME </div>
										<div class="col-sm-6 floor-result"> : <?= $data->created_date_time ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> CREATED IP ADDRESS </div>
										<div class="col-sm-6 floor-result"> : <?= $data->created_ip_address ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> CREATED XMANAGE ID </div>
										<div class="col-sm-6 floor-result"> : <?= $data->created_xmanage_id ?> </div>
									</div>

									<div class="row mb-20">
										<div class="col-sm-6 floor-result-1"> CREATED USER NAME </div>
										<div class="col-sm-6 floor-result"> : <?= $data->created_username ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> LAST EDITED DATE & TIME </div>
										<div class="col-sm-6 floor-result"> : <?php if (!empty($data->last_edited_date_time)) {
																					echo $data->last_edited_date_time;
																				} else {
																					echo "NIL";
																				} ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> LAST EDITED IP ADDRESS </div>
										<div class="col-sm-6 floor-result"> : <?php if (!empty($data->last_edited_ip_address)) {
																					echo $data->last_edited_ip_address;
																				} else {
																					echo "NIL";
																				} ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> LAST EDITED XMANAGE ID </div>
										<div class="col-sm-6 floor-result"> : <?php if (!empty($data->last_edited_xmanage_id)) {
																					echo $data->last_edited_xmanage_id;
																				} else {
																					echo "NIL";
																				} ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> LAST EDITED USER NAME </div>
										<div class="col-sm-6 floor-result"> : <?php if (!empty($data->last_edited_username)) {
																					echo $data->last_edited_username;
																				} else {
																					echo "NIL";
																				} ?> </div>
									</div>

									<h5>FLOOR PLAN INFO</h5>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> PROJECT NAME </div>
										<div class="col-sm-6 floor-result"> : <?php echo $data->project_name; ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> FLOOR PLAN NAME </div>
										<div class="col-sm-6 floor-result"> : <?= $data->floor_plan_name ?> </div>
									</div>

									<!--div class="row">
						  <div class="col-sm-6 floor-result-1">FLOOR PLAN GRID TYPE </div>
						   <div class="col-sm-6 floor-result"> : 16 x 9</div>
						  </div-->

									<div class="row">
										<div class="col-sm-6 floor-result-1"> FLOOR PLAN DROP IN POINT </div>
										<div class="col-sm-6 floor-result"> :
											<?php
											$floor_plan_drop_point = explode(',', $data->floor_plan_drop_point);
											echo 'x=' . $floor_plan_drop_point[0] . ',y=' . $floor_plan_drop_point[1];
											?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> FLOOR FILE NAME </div>
										<div class="col-sm-6 floor-result"> : <?= $data->file_name ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> FLOOR PLAN FILE TYPe </div>
										<div class="col-sm-6 floor-result"> : <?= $data->file_type ?> </div>
									</div>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> FLOOR PLAN FILE SIZE </div>
										<div class="col-sm-6 floor-result"> : <?= $data->file_size ?> KB </div>
									</div>
									<h5> FLOOR PLAN SCALE INFO</h5>

									<div class="row">
										<div class="col-sm-6 floor-result-1"> EACH SQUARE </div>
										<div class="col-sm-6 floor-result"> : <?= $data->each_square ?> METER </div>
									</div>



								</div>

							</div>
							<div class="form-submit">
								<input type="button" value="PRINT" class="action-btn" onclick="printJS({printable:'printJS-form-floor-add', type:'html',targetStyles: ['*']})" id="submitSuccback">
								<input type="submit" value="DONE" class="action-btn" id="toHome11">
							</div>
						</div>
					</div>



				</div>
			</div>

			<div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>

		</div>

	</div>
	<script type="text/javascript">
		// $("#btnPrint").live("click", function () {
		// var divContents = $("#dvContainer").html();
		// var printWindow = window.open('', '', 'height=400,width=800');
		// printWindow.document.write('<html><head><title>DIV Contents</title>');
		// printWindow.document.write('</head><body >');
		// printWindow.document.write(divContents);
		// printWindow.document.write('</body></html>');
		// printWindow.document.close();
		// printWindow.print();
		// });
	</script>
	<script>
		$(document).ready(function() {
			

			// $("body").on('click', '#toHome11', function() {
				// $.fancybox.close();
				// location.reload();
			// });
			$("body").on('click', '#toHome11', function() {

 $.fancybox.close();
 location.reload();
				
			});

			$("body").on('click', '#btn5', function() {
				$.fancybox.getInstance('close');
				location.reload();
			});
		});


	// $.fancybox.open({
					// maxWidth: 800, 
					// fitToView: true,
					// width: '100%',
					// height: 'auto',
					// autoSize: true,
					// type: "ajax",
					// src: "<?php echo base_url(); ?>floor/index",
					// ajax: {
						// settings: {
							// data: 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>',
							// type: 'POST'
						// }
					// },
					// touch: false,
					// clickSlide: false,
					// clickOutside: false

				// });
	</script>
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('.blah1').show();
					$('.blah1')
						.attr('src', e.target.result)
						.width(150)
						.height(100);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>


	<style>
		.fancybox-close-small {

			display: none !important;
		}

		.error {
			color: red !important;
		}
	</style>
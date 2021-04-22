<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
.col-md-12{width:100%;float:left;}
.col-md-6{width:50%;float:left;}
.form-control{width:100%;float:left;}
</style>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="col-md-12">
                    <form method="POST" action="<?=base_url();?>project/edit/<?php echo $project->id;?>" class="project-form" id="project-form">
					<h2>REGISTRATION FORM</h2>
                                        <?php print_r($project); exit;  ?>
						<input type="hidden" name="id" value="<?php echo $project->id; ?>" />
						<div class="col-md-6">
							<div class="form-row">
								<?php
									if(form_error('projectgroup'))
										echo "<div class='form-group has-error' >";
									else
										echo "<div class='form-group' >";
								?>
									<label for="projectgroup">GROUP :</label>
									<div class="form-select">
										<select name="projectgroup" class="form-control" id="projectgroup">
											<option>SELECT A Group</option>
											<option value="abc" <?php if($project->projectgroup == 'abc'){ echo 'selected';}?>>ABC</option>
											<option value="def" <?php if($project->projectgroup == 'def'){ echo 'selected';}?>>DEF</option>
										</select>
										<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
									</div>
									<?php echo form_error('projectgroup'); ?>
								</div>
							</div>
							<?php
								if(form_error('name'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="name">PROJECT NAME :</label>
								<input type="text" name="name" id="name" value="<?php echo $project->name; ?>"/>
								<?php echo form_error('name'); ?>
							</div>
							<?php
								if(form_error('venue'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="venue">VENUE :</label>
								<input type="text" name="venue" id="venue" value="<?php echo $project->venue; ?>" />
								<?php echo form_error('venue'); ?>
							</div>
							<?php
								if(form_error('setupstart'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="setupstart">SETUP START DATE & TIME :</label>
								<input type="text" name="setupstart" id="setupstart"  value="<?php echo $project->setupstart; ?>"/>
								<?php echo form_error('setupstart'); ?>
							</div>
							<?php
								if(form_error('setupend'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="setupend">SETUP END DATE & TIME :</label>
								<input type="text" name="setupend" id="setupend" value="<?php echo $project->setupend; ?>" />
								<?php echo form_error('setupend'); ?>
							</div>
							<?php
								if(form_error('standbystart'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="standbystart">STANDBY START DATE & TIME :</label>
								<input type="text" name="standbystart" id="standbystart" value="<?php echo $project->standbystart; ?>" />
								<?php echo form_error('standbystart'); ?>
							</div>
							<?php
								if(form_error('standbyend'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="standbyend">STANDBY END DATE & TIME :</label>
								<input type="text" name="standbyend" id="standbyend" value="<?php echo $project->standbyend; ?>" />
								<?php echo form_error('standbyend'); ?>
							</div>
							<?php
								if(form_error('strikestart'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="strikestart">STRIKE START DATE & TIME :</label>
								<input type="text" name="strikestart" id="strikestart" value="<?php echo $project->strikestart; ?>" />
								<?php echo form_error('strikestart'); ?>
							</div>
							<?php
								if(form_error('strikeend'))
									echo "<div class='form-group has-error' >";
								else
									echo "<div class='form-group' >";
							?>
								<label for="strikeend">STRIKE END DATE & TIME :</label>
								<input type="text" name="strikeend" id="strikeend" value="<?php echo $project->strikeend; ?>" />
								<?php echo form_error('strikeend'); ?>
							</div>
						</div>
						<div class="col-md-6">
                        <?php
							if(form_error('clientcompanyname'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="clientcompanyname">CLIENT COMPANY NAME :</label>
                            <input type="text" name="clientcompanyname" id="clientcompanyname" value="<?php echo $project->clientcompanyname; ?>">
							<?php echo form_error('clientcompanyname'); ?>
                        </div>
                        <?php
							if(form_error('clientcompanyaddress'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="clientcompanyaddress">CLIENT COMPANY ADDRESS :</label>
                            <textarea class="form-control" name="clientcompanyaddress" id="clientcompanyaddress" rows="3"> <?php echo $project->clientcompanyaddress; ?></textarea>
							<?php echo form_error('clientcompanyaddress'); ?>
                        </div>
						<?php
							if(form_error('contactname'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="contactname">POINT OF CONTACT NAME :</label>
                            <input type="text" name="contactname" id="contactname" value="<?php echo $project->contactname; ?>" />
							<?php echo form_error('contactname'); ?>
                        </div>
						<?php
							if(form_error('areacode'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="areacode">AREA CODE :</label>
                            <input type="text" name="areacode" id="areacode" value="<?php echo $project->areacode; ?>" />
							<?php echo form_error('areacode'); ?>
                        </div>
						<?php
							if(form_error('contactmobile'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="contactmobile">POINT OF CONTACT MOBILE :</label>
                            <input type="text" name="contactmobile" id="contactmobile" value="<?php echo $project->contactmobile; ?>" />
							<?php echo form_error('contactmobile'); ?>
                        </div>
						<?php
							if(form_error('contactemail'))
								echo "<div class='form-group has-error' >";
							else
								echo "<div class='form-group' >";
						?>
                            <label for="contactemail">POINT OF CONTACT EMAIL :</label>
                            <input type="text" name="contactemail" id="contactemail" value="<?php echo $project->contactemail; ?>" />
							<?php echo form_error('contactemail'); ?>
                        </div>
						<div class='form-group'>
                            <label for="additionalnotes">ADDITIONAL NOTES :</label>
                            <textarea class="form-control" name="additionalnotes" id="additionalnotes" rows="3"> <?php echo $project->additionalnotes; ?></textarea>
                        </div>
					</div>
                        <div class="form-submit">
                            <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <input type="submit" value="Add" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
	<script>
	$(document).ready(function(){

  $("select").change(function(){
    if ($(this).val()=="") $(this).css({color: "#6c757d"});
    else $(this).css({color: "#000000"});
  });
  
});	
</script>
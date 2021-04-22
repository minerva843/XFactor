<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form action="<?=base_url();?>contact-import" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="contact">Import Excel:</label>
					<input type="file" id="contact" name="contactfile" value="">
				</div>
				
				<div class="form-group">
					
					<input type="submit" class="btn btn-primary" name="submit">
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
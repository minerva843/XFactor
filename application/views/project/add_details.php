<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
.col-md-12{width:100%;float:left;}
.col-md-6{width:50%;float:left;}
.col-md-4{width:40%;float:left;}
.col-md-8{width:60%;float:left;}
.form-control{width:100%;float:left;}
input[type=radio] {
	position: initial;
    visibility: initial;
	    margin-top: -16px;
}
input[type=text] {
	border:solid gray 1px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 20%; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="col-md-12">
                    <form method="POST" action="<?=base_url();?>project/project_add_details" class="project-form" id="project-form">
					<h2>PROJECTS & REGISTRATION LANDING PAGES (ADD)<span style="color:green"><?php if(isset($msg)){echo $msg;} ?></span></h2>

							<h4>PROJECTS & REGISTRATION LANDING PAGE DETAILS ARE LISTED BELOW</h4>
							
							<table style="width:100%">
								<tbody>
									<tr>
										<th>REGISTRATION PAGE URL:</th>
									
										<td colspan="4"><?php if(isset($url)){echo $url;} ?></td>
									</tr>
									<tr>
										<th>REGISTRATION PAGE HEADER PHOTO:</th>
										<td colspan="4"><input type="file"></td>
									</tr>
									<tr>
										<th>SALUTATION:</th>
										<td><label for="salutation">SHOW<input type="radio" value="1" id="salutation" name="salutation" checked></label></td>
										<td><label for="salutation">DISABLE<input value="0" type="radio" id="salutation" name="salutation"></label></td>
										
									</tr>
									<tr>
										<th>GENDER:</th>
										<td><label for="gender">SHOW<input type="radio" value="1" id="gender" name="gender"checked></label></td>
										<td><label for="gender">DISABLE<input value="0" type="radio" id="gender" name="gender"></label></td>
									</tr>
									<tr>
										<th>FIRST NAME:</th>
										<td><label for="first_name">SHOW<input value="1" type="radio" id="first_name" name="first_name" checked></label></td>
										<td ><label for="first_name">DISABLE<input value="0" type="radio" id="first_name" name="first_name"></label></td>
									</tr>
									<tr>
										<th>LAST NAME:</th>
										<td><label for="last_name">SHOW<input value="1" type="radio" id="last_name" name="last_name" checked></label></td>
										<td ><label for="last_name">DISABLE<input value="0" type="radio" id="last_name" name="last_name"></label></td>
									</tr>
									<tr>
										<th>PREFERRED NAME TO BE DISPLAYED / PRINTED:</th>
										<td><label for="username">SHOW<input value="1" type="radio" id="username" name="username" checked></label></td>
										<td ><label for="username">DISABLE<input value="0" type="radio" id="username" name="username"></label></td>
									</tr>
									<tr>
										<th>EMAIL:</th>
										<td><label for="email">SHOW<input type="radio" value="1" id="email" name="email"checked></label></td>
										<td ><label for="email">DISABLE<input value="0" type="radio" id="email" name="email"></label></td>
									</tr>
									<tr>
										<th>AREA CODE:</th>
										<td><label for="pincode">SHOW<input value="1" type="radio" id="pincode" name="pincode"checked></label></td>
										<td ><label for="pincode">DISABLE<input value="0" type="radio" id="pincode" name="pincode"></label></td>
									</tr>
									
									<tr>
										<th>MOBILE:</th>
										<td><label for="mobile">SHOW<input value="1" type="radio" id="mobile" name="mobile"checked></label></td>
										<td ><label for="mobile">DISABLE<input value="0" type="radio" id="mobile" name="mobile"></label></td>
									</tr>
									<tr>
										<th>DID:</th>
										<td><label for="dob">SHOW<input type="radio" value="1" id="dob" name="dob"checked></label></td>
										<td ><label for="dob">DISABLE<input value="0" type="radio" id="dob" name="dob"></label></td>
									</tr>
									<tr>
										<th>TEL:</th>
										<td><label for="tel">SHOW<input type="radio" id="tel" value="1" name="tel"checked></label></td>
										<td ><label for="tel">DISABLE<input value="0" type="radio" id="tel" name="tel"></label></td>
									</tr>
									<tr>
										<th>EXTENSION:</th>
										<td><label for="extension">SHOW<input value="1" type="radio" id="extension" name="extension" checked></label></td>
										<td ><label for="extension">DISABLE<input value="0" type="radio" id="extension" name="extension"></label></td>
									</tr>
									<tr>
										<th>COMPANY NAME:</th>
										<td><label for="company_name">SHOW<input value="1" type="radio" id="company_name" name="company_name" checked></label></td>
										<td ><label for="company_name">DISABLE<input value="0" type="radio" id="company_name" name="company_name"></label></td>
									</tr>
									<tr>
										<th>COMPANY ADDRESS:</th>
										<td><label for="company_address">SHOW<input type="radio" value="1" id="company_address" name="company_address" checked></label></td>
										<td><label for="company_address">DISABLE<input value="0" type="radio" id="company_address" name="company_address"></label></td>
									</tr>
									<tr>
										<th>DESIGNATION:</th>
										<td><label for="designation">SHOW<input value="1" type="radio" id="designation" name="designation" checked></label></td>
										<td ><label for="designation">DISABLE<input value="0" type="radio" id="designation" name="designation"></label></td>
									</tr>
									<tr>
										<th><span id="pre_remark1">REMARKS 1 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark1_html"><span>:</th>
										<td><label for="remark_1">SHOW<input type="radio" class="remark1_show" value="1" id="remark_1" name="remark_1"></label></td>
										<td ><label for="remark_1">DISABLE<input value="0" type="radio" id="remark_1" name="remark_1" checked></label></td>
										<td><a href="#" id="myBtn">CHANGE FIELD NAME</a></td>
										<input type="hidden" id="temp_remark1" name="remark1_label">
									</tr>
									<tr>
										<th><span id="pre_remark2">REMARKS 2 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark2_html"><span>:</th>
										<td><label for="remark_2">SHOW<input type="radio" class="remark2_show" value="1" id="remark_2" name="remark_2"></label></td>
										<td><label for="remark_2">DISABLE<input type="radio" value="0" id="remark_2" name="remark_2" checked></label></td>
										<td><a href="#" id="myBtn2">CHANGE FIELD NAME</a></td>
										<input type="hidden" id="temp_remark2" name="remark2_label">
									</tr>
									
									<tr>
										<th><span id="pre_remark3">REMARKS 3 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark3_html"><span>:</th>
										<td><label for="remark_3">SHOW<input class="remark3_show" type="radio" value="1" id="remark_3" name="remark_3"></label></td>
										<td><label for="remark_3">DISABLE<input type="radio" value="0" id="remark_3" name="remark_3" checked></label></td>
										<td><a href="#" id="myBtn3">CHANGE FIELD NAME</a></td>
										<input type="hidden" id="temp_remark3" name="remark3_label">
									</tr>
									<tr>
										<th><span id="pre_remark4">REMARKS 4 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark4_html"><span>:</th>
										<td><label for="remark_4">SHOW<input class="remark4_show" type="radio" value="1" id="remark_4" name="remark_4"></label></td>
										<td><label for="remark_4">DISABLE<input type="radio" value="0" id="remark_4" name="remark_4" checked></label></td>
										<td><a href="#" id="myBtn4">CHANGE FIELD NAME</a></td>
										<input type="hidden" id="temp_remark4" name="remark4_label">
									</tr>
									<tr>
										<th><span id="pre_remark5">REMARKS 5 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark5_html"><span>:</th>
										<td><label for="remark_5">SHOW<input class="remark5_show" type="radio" value="1" id="remark_5" name="remark_5"></label></td>
										<td><label for="remark_5">DISABLE<input type="radio" value="0" id="remark_5" name="remark_5" checked></label></td>
										<td><a href="#" id="myBtn5">CHANGE FIELD NAME</a></td> 
										<input type="hidden" id="temp_remark5" name="remark5_label">
									</tr>
									<tr>
										<td colspan="4"><input type="submit" value="Add" class="submit" name="submit" id="submit" /></td>
									</tr>
								</tbody>
							</table>
							
								<script>
$(document).ready(function(){
		$('.submit_remark1').click(function(){
			var temp_remark1 =$('.temp_remark1').val();
			
			if(temp_remark1.length != 0){
				$('#temp_remark1').val(temp_remark1);
				$('#temp_remark1_html').html(temp_remark1);
				$(".remark1_show").attr('checked', true);
				$('#pre_remark1').hide();
				$('.myModel').css('display','none');
			}else{
				alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark2').click(function(){
			var temp_remark2 =$('.temp_remark2').val();
			
			if(temp_remark2.length != 0){
				$('#temp_remark2').val(temp_remark2);
				$('#temp_remark2_html').html(temp_remark2);
				$(".remark2_show").attr('checked', true);
				$('#pre_remark2').hide();
				$('.myMode2').css('display','none');
			}else{
				alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark3').click(function(){
			var temp_remark3 =$('.temp_remark3').val();
			
			if(temp_remark3.length != 0){
				$('#temp_remark3').val(temp_remark3);
				$('#temp_remark3_html').html(temp_remark3);
				$(".remark3_show").attr('checked', true);
				$('#pre_remark3').hide();
				$('.myMode3').css('display','none');
			}else{
				alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark4').click(function(){
			var temp_remark4 =$('.temp_remark4').val();
			
			if(temp_remark4.length != 0){
				$('#temp_remark4').val(temp_remark4);
				$('#temp_remark4_html').html(temp_remark4);
				$(".remark4_show").attr('checked', true);
				$('#pre_remark4').hide();
				$('.myMode4').css('display','none');
			}else{
				alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark5').click(function(){
			var temp_remark5 =$('.temp_remark5').val();
			
			if(temp_remark5.length != 0){
				$('#temp_remark5').val(temp_remark5);
				$('#temp_remark5_html').html(temp_remark5);
				$(".remark5_show").attr('checked', true);
				$('#pre_remark5').hide();
				$('.myMode5').css('display','none');
			}else{
				alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
	});
</script>
							
					
                        
                    </form>
                </div>
            </div>
        </div>

    </div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <H2>CHANGE FIELD NAME</H2>
	<p>REMARK 1 TO BE CHANGED TO:</p>
	<input type="text" name="temp_remark1" class="temp_remark1" ><br>
	<input type="submit" value="SAVE" class="submit_remark1" name="submit_remark1" id="submit_remark1" />
  </div>

</div>

<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2" style="float:right;cursor: pointer;font-size: 25px;">&times;</span>
    <H2>CHANGE FIELD NAME</H2>
	<p>REMARK 2 TO BE CHANGED TO:</p>
	<input type="text" name="temp_remark2" class="temp_remark2" ><br>
	<input type="submit" value="SAVE" class="submit_remark2" name="submit_remark2" id="submit_remark2" />
  </div>

</div>

<div id="myModal3" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close3" style="float:right;cursor: pointer;font-size: 25px;">&times;</span>
    <H2>CHANGE FIELD NAME</H2>
	<p>REMARK 3 TO BE CHANGED TO:</p>
	<input type="text" name="temp_remark3" class="temp_remark3" ><br>
	<input type="submit" value="SAVE" class="submit_remark3" name="submit_remark3" id="submit_remark31" />
  </div>
</div>
<div id="myModal4" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close4" style="float:right;cursor: pointer;font-size: 25px;">&times;</span>
    <H2>CHANGE FIELD NAME</H2>
	<p>REMARK 4 TO BE CHANGED TO:</p>
	<input type="text" name="temp_remark4" class="temp_remark4" ><br>
	<input type="submit" value="SAVE" class="submit_remark4" name="submit_remark4" id="submit_remark4" />
  </div>
</div>
<div id="myModal5" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close5" style="float:right;cursor: pointer;font-size: 25px;">&times;</span>
    <H2>CHANGE FIELD NAME</H2>
	<p>REMARK 5 TO BE CHANGED TO:</p>
	<input type="text" name="temp_remark5" class="temp_remark5" ><br>
	<input type="submit" value="SAVE" class="submit_remark5" name="submit_remark5" id="submit_remark5" />
  </div>
</div>

	<script>
	
	
// Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");
var modal3 = document.getElementById("myModal3");
var modal4 = document.getElementById("myModal4");
var modal5 = document.getElementById("myModal5");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");
var btn4 = document.getElementById("myBtn4");
var btn5 = document.getElementById("myBtn5");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];
var span3 = document.getElementsByClassName("close3")[0];
var span4 = document.getElementsByClassName("close4")[0];
var span5 = document.getElementsByClassName("close5")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
btn2.onclick = function() {
  modal2.style.display = "block";
}
btn3.onclick = function() {
  modal3.style.display = "block";
}
btn4.onclick = function() {
  modal4.style.display = "block";
}
btn5.onclick = function() {
  modal5.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}
span3.onclick = function() {
  modal3.style.display = "none";
}
span4.onclick = function() {
  modal4.style.display = "none";
}
span5.onclick = function() {
  modal5.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
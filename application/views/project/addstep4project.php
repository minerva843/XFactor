<style>
.fancybox-close-small{
	display:none!important;
}

</style>
<style>
body{
	text-transform:none!important;
}
/* The container */
.container01 {
  display: block;
  position: relative;
  padding-left: 35px;
 /*  margin-bottom: 12px; */
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container01 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: -3px;
  left: 0;
  height: 13px;
  width: 13px;
  background-color: #fff;
  border:1px solid #000;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container01:hover input ~ .checkmark {
  background-color: #fff;
}

/* When the radio button is checked, add a blue background */
.container01 input:checked ~ .checkmark {
  background-color: #00b050;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container01 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
/* .container01 .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
} */
.add-project-4 .projectadd4 td {
    padding: 8px 8px;
}
</style>
<div class="main-section ADD-PROJECT-IMT" id="add-floor"> 
    <div class="container">
 <!--form method="POST" action="<?=base_url();?>program/addprogram" id="register-form" enctype="multipart/form-data"-->
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>REGISTRATION FORM CONFIGURATION</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn6"></div>
                </div>
            </div>   
        </div>	   

        <!--div class="middle-body register-form"-->
        <div class="middle-body">

            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				   <div class="row">
					<div class="select-box">
					</div>
					</div> 
					<div class="row">
					<div class="header-title add-floor-header-title">
					<?php if(!empty($no_required_msg)){?>
						<p style="color:red;padding-left: 159px; font-size:16px;"><?php echo $no_required_msg;?></p>
						 <?php }?>
					<h3> registration page form setup </h3>
					</div>      
					</div>	
                    <div class="zone-info floor-planadd add-project-4">
					
                         
						<p style="color:red;">IMPORTANT NOTE : YOU WILL NOT BE ABLE TO CHANGE FIELDS ON REGISTRATION FORM AFTER PROJECT IS CREATED.</p>
						
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-xl-3 col-form-label label-title">registration page url</label>
							<div class="col-sm-5">
							<?php if(!empty($disable)){?>
								<p>NIL</p>
							<?php }else{?>
							<p><?=$url;?></p>
							<?php }?>
							</div>
						</div>
					<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-xl-3 col-form-label label-title">check in page url</label>
							<div class="col-sm-5">
								<p><?=$check_url;?></p>
							</div>
						</div>
					<div class="form-group row image-choose-btn">
							<label for="colFormLabelLg" class="col-sm-4 col-xl-3 col-form-label label-title">registration page header photo</label>
							<div class="col-sm-5 col-xl-7">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload">
								  <div class="file-select">
								  
									<div class="file-select-name choose-photo" id="noFile">SELECT A HEADER IMAGE </div> 
									<input type="file" name="register_header_image" id="file" class="file" onchange="ValidateSingleInput(this);" <?php echo $disable;?>>
									  <div class="file-select-button choose-btn" id="fileName">choose a photo</div>
								  </div>
							</div> 
							</div>  
						</div>
						<div class="projectadd4">
						<table>

  <tr> 
    <td>salutation</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="salutation" name="salutation" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="salutation" name="salutation" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	 <!-- <input type="radio" id="salutation" name="salutation" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="salutation" name="salutation" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
   <tr>
    <td>Gender</td>  
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="gender" name="gender" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="gender" name="gender" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	<!--  <input type="radio" id="gender" name="gender" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="gender" name="gender" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>first name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="first_name" name="first_name" value="1"checked> -->
		 <label class="container01">
  <input type="radio" checked="checked" id="first_name" name="first_name" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
<!-- 	 <input type="radio" id="first_name" name="first_name" value="0"> -->
	 	 <label class="container01">
  <input type="radio"  id="first_name" name="first_name" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>last name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="last_name" name="last_name" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="last_name" name="last_name" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	 <!-- <input type="radio" id="last_name" name="last_name" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="last_name" name="last_name" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>preferred name to be display/printed</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box" >
	<!-- <input type="radio" id="username" name="username" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="username" name="username" value="1" <?php echo $disable;?> >
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled"></td>
	 <td class="check-box-disable">
	
	 <!--label class="container01">
  <input type="radio"  id="username" name="username" value="0" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label-->
	 </td>
  </tr>
  <tr>
    <td>email</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="email" name="email" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="email" name="email" value="1" <?php echo $disable;?> >
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled"></td>
	 <td class="check-box-disable">
	 
	 <!--label class="container01">
  <input type="radio"  id="email" name="email" value="0" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label-->
	 </td>
  </tr>
  <tr>
    <td>country code</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="country_code" name="country_code" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="country_code" name="country_code" value="1" <?php echo $disable;?> >
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled"></td>
	 <td class="check-box-disable">
	 
	 <!--label class="container01">
  <input type="radio"  id="country_code" name="country_code" value="0" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label-->
	 </td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="mobile" name="mobile" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="mobile" name="mobile" value="1" <?php echo $disable;?> >
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled"></td>
	 <td class="check-box-disable">
	 
	 <!--label class="container01">
  <input type="radio"  id="mobile" name="mobile" value="0" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label-->
	 </td>
  </tr>
  <tr>
    <td>did</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="did" name="did" value="1" checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="did" name="did" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	 <!-- <input type="radio" id="did" name="did" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="did" name="did" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>tel</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="tel" name="tel" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="tel" name="tel" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
<!-- 	 <input type="radio" id="tel" name="tel" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="tel" name="tel" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>extension </td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="extension" name="extension" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="extension" name="extension" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	 <!-- <input type="radio" id="extension" name="extension" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="extension" name="extension" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>company name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box" >
	<!-- <input type="radio" id="company_name" name="company_name" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="company_name" name="company_name" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
<!-- 	 <input type="radio" id="company_name" name="company_name" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="company_name" name="company_name" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>company address</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
<!-- 	<input type="radio" id="company_address" name="company_address" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="company_address" name="company_address" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	<!--  <input type="radio" id="company_address" name="company_address" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="company_address" name="company_address" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td>designation</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box">
	<!-- <input type="radio" id="designation" name="designation" value="1"checked> -->
	<label class="container01">
  <input type="radio" checked="checked" id="designation" name="designation" value="1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box-disable">
	 <!-- <input type="radio" id="designation" name="designation" value="0"> -->
	 <label class="container01">
  <input type="radio"  id="designation" name="designation" value="0" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
  </tr>
  <tr>
    <td><span id="pre_remark1">REMARKS 1 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark1_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show">
	<!-- <input type="radio" class="remark1_show" value="1" id="remark_1" name="remark_1"> -->
	<label class="container01">
  <input type="radio"  class="remark1_show" value="1" id="remark_1" name="remark_1" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	<!--  <input value="0" type="radio" id="remark_1" name="remark_1" checked> -->
	 <label class="container01">
  <input type="radio" checked="checked" value="0" id="remark_1" name="remark_1" class="remarkdesaled1" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label> 
	 </td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark1" name="remark1_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" <?php echo $disable;?>>change field name</button>
	 </td>
  </tr>
  
  <tr>
    <td><span id="pre_remark2">REMARKS 2 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark2_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show">
	<!-- <input type="radio" class="remark1_show" value="1" id="remark_1" name="remark_1"> -->
	<label class="container01">
  <input type="radio"  class="remark2_show" value="1" id="remark_2" name="remark_2" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	<!--  <input value="0" type="radio" id="remark_1" name="remark_1" checked> -->
	 <label class="container01">
  <input type="radio" checked="checked" value="0" id="remark_2" name="remark_2" class="remarkdesaled2" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark2" name="remark2_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" <?php echo $disable;?>>change field name</button>
	 </td> 
  </tr>
  <!--tr>
    <td style="width: 253px;"><span id="pre_remark2">REMARKS 2 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark2_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show">
	
	<label class="container01">
  <input type="radio"  class="remark2_show" value="1" id="remark_2" name="remark_2" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	 
	 <label class="container01">
  <input type="radio" checked="checked"  value="0" id="remark_2" name="remark_2" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark2" name="remark2_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" <?php echo $disable;?>>change field name</button>
	 </td>
  </tr-->
  <tr>
    <td style="width: 253px;"><span id="pre_remark3">REMARKS 3 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark3_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show">
	<!-- <input class="remark3_show" type="radio" value="1" id="remark_3" name="remark_3"> -->
	<label class="container01">
  <input type="radio"  class="remark3_show"  value="1" id="remark_3" name="remark_3" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	 <!-- <input type="radio" value="0" id="remark_3" name="remark_3" checked> -->
	 <label class="container01">
  <input type="radio" checked="checked" value="0" id="remark_3" name="remark_3" class="remarkdesaled3" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark3" name="remark3_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" <?php echo $disable;?>>change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark4">REMARKS 4 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark4_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show"><!--input class="remark4_show" type="radio" value="1" id="remark_4" name="remark_4"-->
	<label class="container01">
  <input type="radio"  class="remark4_show" value="1" id="remark_4" name="remark_4" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	 
	<!--  <input type="radio" value="0" id="remark_4" name="remark_4" checked> -->
	 <label class="container01">
  <input type="radio" checked="checked" value="0" id="remark_4" name="remark_4" class="remarkdesaled4" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
	 <td class="field-chng"> 
	 <input type="hidden" id="temp_remark4" name="remark4_label">
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" <?php echo $disable;?>>change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark5">REMARKS 5 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark5_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box unchaed-show">
	<!-- <input class="remark5_show" type="radio" value="1" id="remark_5" name="remark_5"> -->
	<label class="container01">
  <input type="radio"  class="remark5_show" value="1" id="remark_5" name="remark_5" <?php echo $disable;?> disabled>
  <span class="checkmark"></span>
</label>
	</td>
	<td class="disabled">disable</td>
	 <td class="check-box">
	 <!-- <input type="radio" value="0" id="remark_5" name="remark_5" checked> -->
	 <label class="container01">
  <input type="radio" checked="checked" value="0" id="remark_5" name="remark_5" class="remarkdesaled5" <?php echo $disable;?>>
  <span class="checkmark"></span>
</label>
	 </td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark5" name="remark5_label">
	  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5" <?php echo $disable;?>>change field name</button>

  
	 </td>
  
  </tr>  
</table>
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
                            <div class="table_info floor-step">
                                <div class="current-status">
								<p class="current-status-1" style="color:#00b050!important;">CURRENTLY SELECTED :<p> PROJECT (ADD)
								</div>	
							   <div class="display-step-status">
								<h5>REGISTRATION FORM CONFIGURATION</h5>     
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p><br/>
                       <h6 style="color:red!important;font-weight: bold;">IMPORTANT NOTE</h6>
					   <br>
                       <p class="register-tag" style="color:red!important;font-weight: normal;">REGISTRATION FORM FORMAT CANNOT BE CHANGED
AFTER THE PROJECT IS ADDED.</p>
					   
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
								<a href="#" class="action-btn backbtn" name="back" id="btn5">BACK</a>
								<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

       <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

 <!--/form-->
    </div>

</div>


<!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark1" maxlength="25" class="temp_remark1" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark1" data-backdrop="static" data-keyboard="false" data-dismiss="modal" name="submit_remark1" id="submit_remark1" />
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark2" maxlength="25" class="temp_remark2" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark2" data-backdrop="static" data-keyboard="false" data-dismiss="modal" name="submit_remark2" id="submit_remark2" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <!--div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark2" maxlength="25" class="temp_remark2" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark2" data-dismiss="modal" name="submit_remark2" id="submit_remark2" />
        </div>
      </div>
    </div>
  </div-->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark3" maxlength="25" class="temp_remark3" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark3" data-dismiss="modal" name="submit_remark3" id="submit_remark3" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark4" maxlength="25" class="temp_remark4" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark4" data-dismiss="modal" name="submit_remark4" id="submit_remark4" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content pjt-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-5 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-7 field_inpt">
				<input type="text" name="temp_remark5" maxlength="25" class="temp_remark5" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">EXIT</button>
		  <input type="submit" value="SAVE" class="submit_remark5" data-dismiss="modal" name="submit_remark5" id="submit_remark5" />
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
	
		$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : "<?=base_url();?>project/addstep3/<?=$data1->id;?>",
				ajax: { 
				   settings: { data : 'group_id=<?php echo $data1->group_id; ?>', type : 'POST' }
				},
				touch: false,
				 clickSlide: false,
				clickOutside: false
				
				});
            
        });
	
$('body').on('click', '#close-btn6', function () {
          window.location.href = "<?php echo base_url(); ?>project/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $data1->group_id; ?>/<?php echo $data1->id; ?>/ADD/3";

});

$('.FloorSubmit').click(function(){
 // $.validator.setDefaults({
	    // submitHandler: function(){
		
	// var salutation=$('#salutation').val();
	// var project_audience_type=$('#project_audience_type').val();
	// var gender=$('#gender').val();
	// var first_name=$('#first_name').val();
	// var last_name=$('#last_name').val();
	
	var formdata = new FormData();
	var url="<?php echo base_url();?>project/addstep4project/<?=$data1->id;?>"; 
	var file_data = $('#file').prop('files')[0];
	formdata.append('register_header_image', file_data);
	formdata.append('salutation', $('#salutation:checked').val());
	formdata.append('gender', $('#gender:checked').val());
	formdata.append('first_name', $('#first_name:checked').val());
	formdata.append('last_name', $('#last_name:checked').val());
	formdata.append('username', $('#username:checked').val());
	formdata.append('email', $('#email:checked').val());
	formdata.append('country_code', $('#country_code:checked').val());
	formdata.append('mobile', $('#mobile:checked').val());
	formdata.append('did', $('#did:checked').val());
	formdata.append('tel', $('#tel:checked').val());
	formdata.append('extension', $('#extension:checked').val());
	formdata.append('company_name', $('#company_name:checked').val());
	formdata.append('company_address', $('#company_address:checked').val()); 
	formdata.append('designation', $('#designation:checked').val());
	formdata.append('remark_1', $('#remark_1:checked').val());
	formdata.append('remark_2', $('#remark_2:checked').val());
	formdata.append('remark_3', $('#remark_3:checked').val());
	formdata.append('remark_4', $('#remark_4:checked').val());
	formdata.append('remark_5', $('#remark_5:checked').val());
	formdata.append('remark1_label', $('#temp_remark1').val());
	formdata.append('remark2_label', $('#temp_remark2').val());
	formdata.append('remark3_label', $('#temp_remark3').val());
	formdata.append('remark4_label', $('#temp_remark4').val());
	formdata.append('remark5_label', $('#temp_remark5').val());
	formdata.append('url', "<?=$url?>");
	formdata.append('check_url', "<?=$check_url?>");
	


console.log(formdata);
 
$.ajax({  
		type: "POST",
		url: url, 
		data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
		success: function(data)
		{ 
			var data=$.trim(data);
			//console.log(data);
			$.fancybox.getInstance('close');
                    
			if (data) {
				
				 $.fancybox.open({
				maxWidth  : 800,
				fitToView : true,
				width     : '100%',
				height    : 'auto',
				autoSize  : true,
				type        : "ajax",
				src         : '<?php echo base_url();?>project/addprojectsuccess/'+data,
				ajax: { 
				   settings: { data : 'group_id=<?php echo $group_id; ?>', type : 'POST' }
				},
				touch: false,
				 clickSlide: false,
				clickOutside: false
				
				});

			}
		}
	});

	
		
	});

	
});
</script>


<script>
$(document).ready(function(){
	$("#myModal1,#myModal6,#myModal3,#myModal4,#myModal5").modal({
show:false,
backdrop:'static'
});
		$('.submit_remark1').click(function(){
			var temp_remark1 =$('.temp_remark1').val();
			
			if(temp_remark1.length != 0){
				$('#temp_remark1').val(temp_remark1);
				$('#temp_remark1_html').html(temp_remark1);
				$(".remark1_show").removeAttr('disabled');
				$(".remark1_show").attr('checked', true);
				$('#pre_remark1').hide();
				$('.remarkdesaled1').attr("disabled", true);
				$('.myModel').css('display','none');
			}else{
				//alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark2').click(function(){
			var temp_remark2 =$('.temp_remark2').val();
			
			if(temp_remark2.length != 0){
				$('#temp_remark2').val(temp_remark2);
				$('#temp_remark2_html').html(temp_remark2);
				$(".remark2_show").removeAttr('disabled');
				$(".remark2_show").attr('checked', true);
				$('#pre_remark2').hide();
				$('.remarkdesaled2').attr("disabled", true);
				$('.myMode2').css('display','none'); 
			}else{
				//alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark3').click(function(){
			var temp_remark3 =$('.temp_remark3').val();
			
			if(temp_remark3.length != 0){
				$('#temp_remark3').val(temp_remark3);
				$('#temp_remark3_html').html(temp_remark3);
				$(".remark3_show").removeAttr('disabled');
				$(".remark3_show").attr('checked', true);
				$('#pre_remark3').hide();
				$('.remarkdesaled3').attr("disabled", true);
				$('.myMode3').css('display','none');
			}else{
				//alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark4').click(function(){
			var temp_remark4 =$('.temp_remark4').val();
			
			if(temp_remark4.length != 0){
				$('#temp_remark4').val(temp_remark4);
				$('#temp_remark4_html').html(temp_remark4);
				$(".remark4_show").removeAttr('disabled');
				$(".remark4_show").attr('checked', true);
				$('#pre_remark4').hide();
				$('.remarkdesaled4').attr("disabled", true);
				$('.myMode4').css('display','none');
			}else{
				//alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
		
		$('.submit_remark5').click(function(){
			var temp_remark5 =$('.temp_remark5').val();
			
			if(temp_remark5.length != 0){
				$('#temp_remark5').val(temp_remark5);
				$('#temp_remark5_html').html(temp_remark5);
				$(".remark5_show").removeAttr('disabled');
				$(".remark5_show").attr('checked', true);
				$('#pre_remark5').hide();
				$('.remarkdesaled5').attr("disabled", true);
				$('.myMode5').css('display','none');
			}else{
				//alert('ENSURE THAT FIELD NAME IS FIELDED UP.');
			}
		})
	});
</script>

<script>
var _validFileExtensions = [".jpg", ".jpeg",".JPG",".JPEG", ".png",".PNG"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                //$('.image_error').html("Sorry, ONLY JPEG / PNG FILES ARE ACCEPTED." + _validFileExtensions.join(", "));
                $('.image_err_fileformat1').html("FILE FORMAT NOT ACCEPTED");
                $('.image_err_fileformat2').html("ENSURE THAT :</br>IMAGE FILE IS IN JPEG / PNG FORMAT.");
				$('.image_err_fileformat1').show();
				$('.image_err_fileformat2').show(); 
                oInput.value = "";
                return false;
            }
        }
    }
	$('.image_err_fileformat1').hide();
				$('.image_err_fileformat2').hide(); 
    return true;
} 
 $(document).ready(function(){
$('#file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NOT ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
	}else{
		$('.image_err_filesize1').hide();
		$('.image_err_filesize2').hide();
	}		
}); 
}); 

</script>




<script>
$('#file').bind('change', function () {
  var filename = $("#file").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

</script>
<script>
	$(document).ready(function(){

  $("select").change(function(){
    if ($(this).val()=="") $(this).css({color: "#6c757d"});
    else $(this).css({color: "#000000"});
  });
  
});	
</script>
<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>

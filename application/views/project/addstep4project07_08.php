<style>
.fancybox-close-small{
	display:none!important;
}
.star-program input.smalimput {
    width: 8%;
    margin-left: 16px;
}
.star-program{padding-left: 0px;}
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
.floor-planadd textarea {
    width: 100%;
    background: transparent;
    border: 1px solid #afabab;
    min-height: 40px;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
	padding-bottom:0px;
}
.program-upload p.file-extan {
    font-size: 11px;
    color: #000;
}
.floor-planadd .star-program input.smalimput {
    width: 9%;
    margin-left: 15px;
    padding: 5px;
}
.file-upload.choose-photo .file-select .file-select-button {
    right: -40px;
}
.projectadd4 td {
    font-size: 11px;
    color: #000;
	font-weight:600;
	padding-left: 10px;
}
.floor-planadd p {
    padding-top: 9px;
	color: #000;
	font-weight:600;
	font-size: 12px;
}

.projectadd4 input#show {
    width: 15px !important;
}
.projectadd4 input#show {
    width: 15px !important;
}
.projectadd4 input#show:before {
    content: "";
    -webkit-appearance: none;
    background-color: #00b050;
    border: 2px solid #00b050;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 3px;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    cursor: pointer;
    margin-left: 3px;
    border-radius: 10px;
    top: 4px;
}
.projectadd4 input#disable:before {
    content: "";
    -webkit-appearance: none;
    background-color: #00b050;
    border: 2px solid #00b050;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 3px;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    cursor: pointer;
    margin-left: 3px;
    border-radius: 10px;
    top: 4px;
}
.projectadd4 input#disable {
    width: 15px;
}
td.show {
    width: 50px;
}
td.disabled {
    width: 50px;
}
td.show:before {
content:":";
padding-right: 6px;
}
.projectadd4 tr:nth-child(odd) {
    background: #d9d9d9;
}
.projectadd4 table {
    margin-left: 0px;
    width: 94%;
}
.field-chng{background: fff;}
input#btn-field {
    background: transparent;
}
td.field-chng {
    width: 50px;
	background: #fff;
}
.projectadd4 button.btn.btn-info.btn-lg {
    padding: 4px 20px 4px 12px;
    border-radius: 3px;
    border: 1px solid #afabab;
    font-size: 14px;
    width: 100%;
    color: #333333!important;
    margin-bottom: 8px;
    outline: none;
    text-transform: uppercase;
    background: #fff;
}
.projectadd4 .modal-dialog {
    width: 300px;
	
}
span{
	font-size: 11px;
}
</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
 <!--form method="POST" action="<?=base_url();?>program/addprogram" id="register-form" enctype="multipart/form-data"-->
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS & REGISTRATION FORMS (ADD)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
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
					<div class="header-title">
					
					</div>
					</div>	
                    <div class="zone-info floor-planadd">
					
                        <h3> registration page form setup </h3> 
						<p style="color:red;">IMPORTANT NOTE : YOU WILL NOT BE ABLE TO CHANGE FIELDS ON REGISTRATION FORM AFTER PROJECT IS CREATED.</p>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">registration page url</label>
							<div class="col-sm-5">
								<p><?=$url;?></p>
							</div>
						</div>
					<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">check in page url</label>
							<div class="col-sm-5">
								<p><?=$url;?></p>
							</div>
						</div>
					<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">registration page header photo</label>
							<div class="col-sm-5">
								<!-- <input type="file" name="image" class="form-control" class="file" id="file" onchange="ValidateSingleInput(this);">  -->
							<div class="file-upload choose-photo">
								  <div class="file-select">
								  
									<div class="file-select-name" id="noFile">select a floor plan image</div> 
									<input type="file" name="register_header_image" id="file" class="file" onchange="ValidateSingleInput(this);">
									  <div class="file-select-button" id="fileName">choose a photo</div>
								  </div>
							</div> 
							</div>  
						</div>
						<div class="projectadd4">
						<table>

  <tr>
    <td>solutation</td>
    <td class="show">show</td>
    <td style="width: 100px;"><input type="radio" id="salutation" name="salutation" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td><input type="radio" id="salutation" name="salutation" value="0">
	 
	 </td>
  </tr>
   <tr>
    <td>Gender</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="gender" name="gender" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="gender" name="gender" value="0"></td>
  </tr>
  <tr>
    <td>first name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="first_name" name="first_name" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="first_name" name="first_name" value="0"></td>
  </tr>
  <tr>
    <td>last name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="last_name" name="last_name" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box" class="check-box"><input type="radio" id="last_name" name="last_name" value="0"></td>
  </tr>
  <tr>
    <td>preferred name to be display/printed</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box" ><input type="radio" id="username" name="username" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="username" name="username" value="0"></td>
  </tr>
  <tr>
    <td>email</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="email" name="email" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="email" name="email" value="0"></td>
  </tr>
  <tr>
    <td>country code</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="country_code" name="country_code" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="country_code" name="country_code" value="0"></td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="mobile" name="mobile" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="mobile" name="mobile" value="0"></td>
  </tr>
  <tr>
    <td>did</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="did" name="did" value="1" checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="did" name="did" value="0"></td>
  </tr>
  <tr>
    <td>tel</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="tel" name="tel" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="tel" name="tel" value="0"></td>
  </tr>
  <tr>
    <td>extension </td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="extension" name="extension" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="extension" name="extension" value="0"></td>
  </tr>
  <tr>
    <td>company name</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box" ><input type="radio" id="company_name" name="company_name" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box" class="check-box"><input type="radio" id="company_name" name="company_name" value="0"></td>
  </tr>
  <tr>
    <td>company address</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="company_address" name="company_address" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="company_address" name="company_address" value="0"></td>
  </tr>
  <tr>
    <td>designation</td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" id="designation" name="designation" value="1"checked></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" id="designation" name="designation" value="0"></td>
  </tr>
  <tr>
    <td><span id="pre_remark1">REMARKS 1 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark1_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" class="remark1_show" value="1" id="remark_1" name="remark_1"></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input value="0" type="radio" id="remark_1" name="remark_1" checked></td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark1" name="remark1_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark2">REMARKS 2 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark2_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input type="radio" class="remark2_show" value="1" id="remark_2" name="remark_2"></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" value="0" id="remark_2" name="remark_2" checked></td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark2" name="remark2_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark3">REMARKS 3 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark3_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input class="remark3_show" type="radio" value="1" id="remark_3" name="remark_3"></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" value="0" id="remark_3" name="remark_3" checked></td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark3" name="remark3_label">
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark4">REMARKS 4 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark4_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input class="remark4_show" type="radio" value="1" id="remark_4" name="remark_4"></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" value="0" id="remark_4" name="remark_4" checked></td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark4" name="remark4_label">
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">change field name</button>
	 </td>
  </tr>
  <tr>
    <td style="width: 253px;"><span id="pre_remark5">REMARKS 5 (CHANGED FIELD NAME REFLCTED)</span><span id="temp_remark5_html"><span></td>
    <td class="show">show</td>
    <td style="width: 100px;" class="check-box"><input class="remark5_show" type="radio" value="1" id="remark_5" name="remark_5"></td>
	<td class="disabled">disable</td>
	 <td class="check-box"><input type="radio" value="0" id="remark_5" name="remark_5" checked></td>
	 <td class="field-chng">
	 <input type="hidden" id="temp_remark5" name="remark5_label">
	  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">change field name</button>

  
	 </td>
  
  </tr>  
</table>
						</div>						
                    </div>  
                      
                </div>


                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                
				                <li class="active"><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                
				                
                            </ul>
                            <div class="table_info floor-step">
                                
								<p style="color:#00b050!important;font-weight: bold!important;">CURRENTLY SELECTED :<p> PROJECT (ADD)
                                <h5>STEP 4 OF 4</h5>
                                 <p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p><br/>
                       <h6 style="color:red!important;font-weight: 600;">IMPORTANT NOTE</h6>
					   
                       <p style="color:red!important;font-weight: 600;">REGISTRATION FORM FORMAT CANNOT BE CHANGED
AFTER THE PROJECT IS ADDED.</p>
					   
                       <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
							<br/>
							<h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
							<p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
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

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XMANAGE</b>. </div>  

 <!--/form-->
    </div>

</div>


<!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-4 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-5">
				<input type="text" name="temp_remark1" class="temp_remark1" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="SAVE" class="submit_remark1" name="submit_remark1" id="submit_remark1" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-4 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-5">
				<input type="text" name="temp_remark2" class="temp_remark2" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="SAVE" class="submit_remark2" name="submit_remark2" id="submit_remark2" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-4 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-5">
				<input type="text" name="temp_remark3" class="temp_remark3" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="SAVE" class="submit_remark3" name="submit_remark3" id="submit_remark3" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-4 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-5">
				<input type="text" name="temp_remark4" class="temp_remark4" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="SAVE" class="submit_remark4" name="submit_remark4" id="submit_remark4" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <H2>CHANGE FIELD NAME</H2>
		  <div class="form-group row">
			<label for="colFormLabelLg" class="col-sm-4 col-form-label">CHANGE FIELD NAME TO</label>
			<div class="col-sm-5">
				<input type="text" name="temp_remark5" class="temp_remark5" >
			</div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <input type="submit" value="SAVE" class="submit_remark5" name="submit_remark5" id="submit_remark5" />
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/addstep3project/<?=$data1->id;?>',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
                },
                opts: {
                    afterShow: function (instance, current) {
                        console.info('done!');
                    },
                     touch: false 
                }
            });
            
        });
	
$('body').on('click', '.close-btn', function () {
            $.fancybox.close();

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
					src: '<?php echo base_url();?>project/addprojectsuccess/'+data,
					type: 'ajax',    
					opts: {
						afterShow: function (instance, current) {
							console.info('done!');
						}
					} 
				}); 

			}
		}
	});

	
		
	});

	
});
</script>


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
    return true;
}
 $(document).ready(function(){
$('#file').on('change', function() { 
	if (this.files[0].size > 5242880) { 
		$('.image_err_filesize1').html("FILE SIZE NO ACCEPTED");
        $('.image_err_filesize2').html("ENSURE THAT :<br/>IMAGE FILE SIZE IS NOT MORE THAN 5 MB.");
		$('.image_err_filesize1').show();
		$('.image_err_filesize2').show();
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
<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important; 
		
    }

</style>

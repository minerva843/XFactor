<style>
.fancybox-close-small{
	display:none!important;
}

</style>
<div class="main-section" id="add-floor"> 
    <div class="container">
<form method="POST" action="<?=base_url();?>project/addstep3project/<?=$data1->id;?>" class="register-form" id="registerform420" enctype="multipart/form-data">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>PROJECTS & REGISTRATION FORMS (EDIT)</h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"  id="projectclosebtn3"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form">

            <div class="row">
				   <div class="col-md-9">  <?php // print_r($zone); ?>
				   <div class="row">
					<div class="select-box">
					</div>
					</div>
					<div class="row">
					<div class="header-title add-floor-header-title">
					 <h3> client & point of project info</h3> 
					</div>
					</div>	
                    <div class="zone-info floor-planadd">
                       
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company NAME</label>
							<div class="col-sm-5">
								<input type="text" name="client_company_name" class="client_company_name" value="<?php if($data1->client_company_name){ echo $data1->client_company_name; }?>" class="form-control" id="client_company_name" placeholder="Enter client company NAME">
							</div>
						</div>
	
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company address</label>
							<div class="col-sm-5">
								
								<textarea rows="3" value="<?php if($data1->client_company_address){ echo $data1->client_company_address; }?>" cols="50" id="client_company_address" class="client_company_address" name="client_company_address" placeholder="client company address"><?php if($data1->client_company_address){ echo $data1->client_company_address; }?></textarea> 
							</div>
						</div>
					  <div class="form-group row">
								<label for="colFormLabelLg" class="col-sm-4 col-form-label">client company postal code</label>
								<div class="col-sm-3" style="padding-left:0px;">
								<select name="client_country" id="client_country" class="client_country">
									<option value="">select a country</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['name'];?>" <?php if($data1->client_country == $row['name']){ echo "selected"; }?>><?php echo $row['name'];?></option>
									<?php }?> 
								</select>
							</div>
							<div class="col-sm-2" style="padding-left:0px;">
								<input type="text" maxlength="8" name="client_company_postal_code" class="client_company_postal_code" value="<?php if($data1->client_company_postal_code){ echo $data1->client_company_postal_code; }?>" class="form-control" id="client_company_postal_code" placeholder="Enter Postal code">
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact name</label>
							<div class="col-sm-5">
								
								<input type="text" value="<?php if($data1->point_contact_name){ echo $data1->point_contact_name; }?>" name="point_contact_name" id="point_contact_name" class="point_contact_name" placeholder="ENTER point of contact name">
							</div>
						</div>	
					   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">country code</label>
							<div class="col-sm-5">
								<select name="client_country_code" id="client_country_code" class="client_country_code">
									<option value="">select country code</option>
									<?php foreach($CountryCode as $row){?>
									<option value="<?=$row['phonecode'];?>" <?php if($data1->client_country_code == $row['phonecode']){ echo "selected"; }?>><?php echo $row['name'];?> +<?php echo $row['phonecode'];?></option>
									<?php }?>
								</select>
							</div> 
						</div>
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact mobile</label>
							<div class="col-sm-5">
								<input type="text" value="<?php if($data1->point_contact_mobile){ echo $data1->point_contact_mobile; }?>" maxlength="12" name="point_contact_mobile" id="point_contact_mobile" class="point_contact_mobile" placeholder="ENTER point of contact mobile">
							</div>
						</div>	
						<div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">point of contact email</label>
							<div class="col-sm-5">
								<input type="email" name="point_contact_email" maxlength="50" class="point_contact_email" value="<?php if($data1->point_contact_email){ echo $data1->point_contact_email; }?>" class="form-control" id="point_contact_email" placeholder="ENTER POINT OF CONTACT EMAIL ADDRESS (MAXIMUM 50 CHARACTERS)">
							</div>    
						</div>
	                   <div class="form-group row">
							<label for="colFormLabelLg" class="col-sm-4 col-form-label">additional notes</label>
							<div class="col-sm-5">
								
								<textarea rows="3" value="<?php if($data1->additional_notes){ echo $data1->additional_notes; }?>" cols="50" id="additional_notes" class="additional_notes" name="additional_notes" placeholder="ENTER ADDITIONAL NOTES (IF ANY)"><?php if($data1->additional_notes){ echo $data1->additional_notes; }?></textarea> 
								<p class="optional">(optional)</p>
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
                            <div class="table_info floor-step">
                                 <div class="current-status">
								<p class="current-status-1"style="color:#00b050!important;">CURRENTLY SELECTED :<p> <?php if(!empty($data1)){ echo $data1->project_name; }?>
                                </div>
								<div class="display-step-status">
								<h5>STEP 3 OF 3</h5>
                                 <p>edit the details on the left tab.</p>
						   <p>WHEN YOU ARE DONE, CLICK NEXT.</p>
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
			<a href="#" class="action-btn backbtn" name="back" id="btn553456">BACK</a>
			<!--input type="submit" value="Back" class="action-btn backbtn" name="back" id="btn5"-->
			<input type="submit" value="Next" class="action-btn FloorSubmit" name="submit" id="btn5243244">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 

</form>
    </div>

</div>


<script>
$(document).ready(function(){

 $.validator.setDefaults({
submitHandler: function(){
	//$('.FloorSubmit').click(function(){
	var client_company_name=$('#client_company_name').val();
	var client_company_address=$('#client_company_address').val();
	var client_country=$('#client_country').val();
	var client_company_postal_code=$('#client_company_postal_code').val();
	var point_contact_name=$('#point_contact_name').val();
	var client_country_code=$('#client_country_code').val();
	var point_contact_mobile=$('#point_contact_mobile').val();
	var point_contact_email=$('#point_contact_email').val();
	var additional_notes=$('#additional_notes').val();
	
 var formdata = new FormData();
var url="<?=base_url();?>project/addstep3project/<?=$data1->id;?>"; 

 formdata.append('client_company_name', client_company_name);
 formdata.append('client_company_address', client_company_address);
 formdata.append('client_country', client_country);
 formdata.append('client_company_postal_code', client_company_postal_code);
 formdata.append('point_contact_name', point_contact_name);
 formdata.append('client_country_code', client_country_code);
 formdata.append('point_contact_mobile', point_contact_mobile);
 formdata.append('point_contact_email', point_contact_email);
 formdata.append('additional_notes', additional_notes);


//console.log(formdata);
 
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
                   // alert(data);  
			if (data) {
                              
                        $.fancybox.open({
                            src: '<?php echo base_url();?>project/editprojectsuccess/'+data ,
                            type: 'ajax',
                            ajax: { 
                             settings: { data : 'ABC', type : 'POST' }
                           },    
                            opts: {
                                afterShow: function (instance, current) {
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
 //});
	$("#registerform420").validate({
		rules: {
			client_company_name: "required",
			client_company_address:"required",
			client_country:"required",
			client_company_postal_code:{
				required:true,
				digits:true,
				maxlength:8
			},
			point_contact_name:"required",
			client_country_code:"required",
			point_contact_mobile:{
				required:true,
				digits:true,
				maxlength:12
			},
			point_contact_email:{
			required:true,
				email:true
			}
		}, 
		errorPlacement: function(){
                               return false;
                         }
		// messages: {
			// client_company_name: "ENSURE THAT CLIENT COMPANY NAME IS FILLED IN.",
			// client_company_address: "ENSURE THAT CLIENT COMPANY ADDRESS IS FILLED IN.",
			// client_country: "ENSURE THAT A COUNTRY IS SELECTED.",
			// client_company_postal_code:"ENSURE THAT VENUE POSTAL CODE IS FILLED IN.",
			// point_contact_name: "ENSURE THAT POINT OF CONTACT NAME IS FILLED IN.",
			// client_country_code: "ENSURE THAT AN COUNTRY CODE IS SELECTED.",
			// point_contact_mobile:"ENSURE THAT POINT OF CONTACT MOBILE IS FILLED IN.",
			// point_contact_email:"ENSURE THAT POINT OF CONTACT EMAIL IS FILLED IN. OR ENSURE THAT EMAIL ADDRESS IS VALID."
		// }
	});
	
});

</script>


<script>
$(document).ready(function(){
	
	$("body").on('click','.backbtn',function(){
          
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>project/editstep2/<?=$data1->id;?>',
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
	
$('body').on('click', '#projectclosebtn3', function () {
            $.fancybox.close();
            window.location.href = "<?php echo base_url(); ?>project/deleteJunkRecord/<?php echo $data1->id; ?>/<?php echo $data1->group_id; ?>/<?php echo $data1->id; ?>/EDIT/3";

});
	
});


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

<div class="main-section" id="add-floor"> 
    <div class="container">
	<?php $randid=rand(1000,9999);?>
<form action="<?php echo base_url(); ?>UserManage/processAddGroup/<?php echo $group->id; ?>" method="POST" id="adduserGroup<?=$randid?>">
        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUPS (<?php echo $action; ?>)</h2>
                </div>
 
                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn"  id="close-btn"></div>
                </div>
            </div>   
        </div>	   

        <div class="middle-body register-form" >
            <div class="row">
                <div class="col-md-9">   
				<div class="row">
					<div class="select-box">
					</div>
					</div>
					 
 
                    <div class="zone-info">
                        <h3>GROUP INFO</h3>  				
                       
                            <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP TYPE</label>
                                <div class="col-sm-5">
								
									<?php if(!empty($group->group_type == 'RESERVED')){ ?>
										<input type="hidden" name="group_type" id="group_type" value="RESERVED">
										<p class="mt-2"><?php echo $group->group_type; ?></p>
									
									<?php } else {?>
                                   
										<select name="group_type" id="group_type" class="group_type">
										<option value="">SELECT GROUP TYPE</option> 
										
										<option value="RESERVED" <?php if(!empty($group->group_type == 'RESERVED')){ echo "selected"; }?>>RESERVED</option>
										<option value="NOT RESERVED" <?php if(!empty($group->group_type == 'NOT RESERVED')){ echo "selected"; }?>>NOT RESERVED</option>
									</select>
									<?php } ?>
                                     
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">GROUP NAME</label>   
                                <div class="col-sm-5">
                                    <?php if(!empty($group->id)){ ?>
                                    
                                    <p class="mt-2"><?php echo $group->group_name; ?></p>
                                   <?php  }else{ ?>
                                    <input type="text" name="group_name"    value="<?php echo $group->group_name; ?>" class="form-control" id="group_name" placeholder="GROUP NAME">
                                    <?php if(!empty($msg)){ ?>
												
													
											  
													<p style="color:red">GROUP NAME IS USED.</p>
													<p   style="color:red">PLEASE TRY ANOTHER GROUP NAME.</p>
													
												<?php } if(!empty($error)){
												 ?>
															<p style="color:red">UNABLE TO CREATE GROUP.</p>
															<p   style="color:red">PLEASE TRY ANOTHER GROUP NAME.</p>
															<p   style="color:red" >GROUP NAME THAT WAS ENTERED IS RESERVED.</p>
												<?php } } ?>
                                     
                                    

                                </div>
                            </div> 
                            
                            
                             <div class="form-group row  mb-4 d-flex-align">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">GROUP STATUS</label>
                                <div class="col-sm-5">
                                   
                                   <select name="group_status" id="group_status" class="country">  
									<option value="">SELECT GROUP STATUS</option>
									
									<option value="LIVE" <?php if(!empty($group->status == 'LIVE')){ echo "selected"; }?>>LIVE</option>
									<option value="SUSPENDED" <?php if(!empty($group->status == 'SUSPENDED')){ echo "selected"; }?>>SUSPENDED</option>
									
				   </select>
 
                                     
                                </div>
                            </div>  

                           

                    </div>  
                </div>

                <div class="col-md-3 right-text">
                    <div class="tab right-tabs">

                        <div class="table-content add-zone-1">	  
                            <ul class="nav nav-tabs ">
                     				<li class="active"  id="" ><a data-toggle="tab" href="#menu1">MAIN MENU</a></li>
				                <li><a data-toggle="tab" class="cnone" href="#menu2">PERMISSIONS</a></li>
				                <li class=""><a data-toggle="tab" class="cnone" href="#menu3">ASSIGNED USERS</a></li>
				                    
                            </ul>    
                            <div class="table_info floor-step">
							
                                 <div class="current-status">
                                <p class="zonee"><span class="current-bold">CURRENTLY SELECTED :</span> 
								
								<?php if($action=="EDIT"){ ?>
									<span style="color:black; font-size: 14px !important;" >
								     <?php echo $group->group_name;  ?></span>
								<?php }else{ ?>
									<span style="color:black; font-size: 14px !important;" >
								    GROUP (<?php echo $action; ?>) </span>
								<?php } ?>
								
								    
								
								</p>
                                 </div>
								 <div class="display-step-status">
								 <h5>STEP 1 OF 1</h5>
								 
								 <?php if($action=='ADD'){ ?>
									 
									<p>FILL IN THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
								<?php  }else{ ?>
									 
								<p>EDIT THE DETAILS ON THE LEFT TAB.</p>
                                 <p>WHEN YOU ARE DONE, CLICK NEXT.</p> 
									 
								 <?php } ?>
								 
                       
                                <h6 class="image_err_fileformat1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_fileformat2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <br>
                                <h6 class="image_err_filesize1" style="color:red!important;font-weight: 600;"></h6>
                                <p class="image_err_filesize2" style="float:left!important;text-align:left!important;color:red!important;"></p>
                                <div class="tab-content">
                                </div>
								</div>
                            </div>
                            <div class="form-submit"> 
                               <a class="action-btn" id="btn5allworkshop333" >Back</a>
                                <input type="submit" value="Next"       class="action-btn" name="submit" id="submitbtn">
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



<div id="myModal2usergroup" class="modal delete-sorting">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <h4> GROUP (ADD) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>
            <p>UNABLE TO CREATE GROUP.</p>
            <p>PLEASE TRY ANOTHER GROUP NAME.</p>
            <p>GROUP NAME THAT WAS ENTERED IS RESERVED.</p>
        </div>
        <div class="modal-footer text-right"><span class="close closeeditgroup">OK</span> </div>
    </div>

</div>



<script>

$(document).ready(function () {
  
  
   $('.closeeditgroup').click(function() {
                                            var modal = document.getElementById("myModal2usergroup");
                                            modal.style.display = "none";

                                            var modal2 = document.getElementById("myModal1chatgroup");
                                            modal2.style.display = "none";
                                        });
  
   
var names_arr = ['XP','XP1','XP2','XP3','XP4','XP5'];
 
function checkValue(value,arr){

  var status = '0';
  for(var i=0; i<arr.length; i++){
    var name = arr[i];
    if(name == value){
     //console.log(i);
      status = '1';
      break;
    }
  }

  return status;
}
  
  
  
  
  
$("#group_name").focusout(function(){

/*

let groupname = '';
let grouptype = '';

  groupname = $("#group_name").val();
  grouptype = $("#group_type").val();

if(grouptype = 'NOT RESERVED'){
let stat = checkValue(groupname,names_arr);
if(stat=='1'){
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);
}else{

$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);

}

}


if(grouptype = 'RESERVED'){
let stat = checkValue(groupname,names_arr);
if(stat=='1'){
$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);
console.log('res 11');
}else{
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);
console.log('res 011');
}

}


*/

});
  
  
    
$('#group_name').keyup(function(){

$(this).val($(this).val().toUpperCase());
        
 /*       
let groupname = $("#group_name").val();
let grouptype = $("#group_type").val();

if(grouptype = 'NOT RESERVED'){
let stat = checkValue(groupname,names_arr);
if(stat=='1'){
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);
}else{

$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);

}

}


if(grouptype = 'RESERVED'){
let stat = checkValue(groupname,names_arr);
if(stat=='1'){
$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);
console.log('res 1');
}else{
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);
console.log('res 0');
}

}
   */     
        
        
    });
    
    
    



$('#group_type').change(function(){

/*
let grouotype = $(this).val();
let groupname = $("#group_name").val();
if(grouotype = 'NOT RESERVED'){

let stat1 = checkValue(groupname,names_arr);

if(stat1=='1'){
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);
}else{
console.log('non resve');
$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);

}

}


if(grouotype = 'RESERVED'){
let stat2 = checkValue(groupname,names_arr);
if(stat2=='1'){
$("#group_name").css('border','1px solid black');
//$('#submitbtn').prop('disable',false);
}else{
$("#group_name").css('border','1px solid red');
//$('#submitbtn').prop('disable',true);

}

}

*/


});






    

      $("body").on('click','#btn5allworkshop333',function(){
       $.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/showAllgroups",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});
        
        
        
        $("body").on('click','#assignuser4748',function(){
$.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/usersGroupListassign",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});
        
        
$("body").on('click','#alluserpermission45454',function(){
$.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/allgrouppermissions",
        ajax: { 
           settings: { data : '', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
    });
            
});
           
            
  
        
 
        $('body').on('click', '.close-btn', function () {
            $.fancybox.close();
              location.reload();

        });
        
     $.validator.setDefaults({
	    submitHandler: function() {             
            var form = $("#adduserGroup<?=$randid?>");
            var url = form.attr('action');
           

            $.ajax({
             type: "POST",
             data : form.serialize(),
             url: url,
                success: function (data)
                {
                   
                    let action = '<?php echo $action;  ?>';
                    $.fancybox.getInstance('close');
                    let url = '<?php echo base_url(); ?>UserManages/addNewChatGroupSuccess/'+parseInt(data)+'/'+action;
                 
                    if (parseInt(data) > 0) {
                   
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?php echo base_url(); ?>UserManage/groupCreateSuccess/'+parseInt(data),
        ajax: { 
           settings: { data : 'action='+action, type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
        }); 
                    
                    } else {

                       /// alert("Please enter correct groupname. If group type reserved then XP to XP100");
                          
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                maxWidth: 800,
                                                fitToView: true,
                                                width: '100%',
                                                height: 'auto',
                                                autoSize: true,
                                                type: "ajax",
                                                src: "<?php echo base_url(); ?>UserManage/addNewUserGroupError",
                                                ajax: {
                                                    settings: {
                                                        data: 'error='+data,
                                                        type: 'POST'
                                                    }
                                                },
                                                touch: false,
                                                clickSlide: false,
                                                clickOutside: false

                                            });


                                         
                    }
                }
            });
                   
		}
	});
        
        
        $("#adduserGroup<?=$randid?>").validate({
			rules: {
				group_name: "required",
				group_type: "required",
				group_status: "required",
                               
			},
                        errorPlacement: function(){
                               return false;
                         }

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

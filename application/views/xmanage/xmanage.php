<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// if(!empty($_SESSION['GroupData'])){
	// $GroupByDisabled=1;
// }else{
	// $GroupByDisabled=0;
// }


?>

 
<section class="container-fluid ">
<!--<div class="row config-drop">
<div class="col-md-8"> </div>
<div class="col-md-4">  
 <div class="bottom-menu-right ">

			<ul>
                <li class="select-group clearfix">
                    <select id="config_project" name="header-select">
						<option value="">SELECT A PROJECT TO CONFIGURE</option>
						<?php foreach($projects as $pKey => $pVal) {
							//print_r($pVal);?>
						<option value="<?php echo $pVal->project_id;?>"> <?php echo $pVal->project_name;?></option>
						<?php } ?>
                    </select>
                </li>
            </ul>
        </div>  
 </div> 
 </div> 	
 </div> --> 

    <section class="main-container xmanage-home">
	<!--    <div class="view-statics">
			<ul>
			<li>Summery</li>
			<li><a href="#">view statics</a></li>
			</ul>
		</div> -->
		<div class="virtual_view config-page">
		<div class="modal-box">
		<div class="container-fluid">
		
		<div class="row config-heading">
		<div class="col-md-12" style="    padding: 0px 5px;">
		<h2>xmanage (XPLATFORM management) </h2>
		</div>
		</div>
		        
		
		<div class="row div-customize">
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash GroupByDisabled" <?=$GroupByDisabled;?>>
							<div class="card_dash_left">
								<h5>SUMMARY & STATISTICS</h5>
							</div>							
						</div>   
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash enabledisable" id="setting" >
							<div class="card_dash_left">
								<h5>Settings</h5>
							</div>   
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash GroupByDisabled" id="usersgroupsadmin" >
							<div class="card_dash_left">
								<h5>Groups</h5>
							</div>							
						</div>   
					</div>    
					
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
                                            
						<div class="card_dash GroupByDisabled" id="allsuermanagemaster"  >
                                                    <a >
							<div class="card_dash_left" >
								<h5 style="width: 100%;">Users & User Types</h5>
							</div>	
                                                         </a>
						</div>
                                           
					</div>
					
					<!--div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>content/addNewSuccess' >
							<div class="card_dash_left">
								<h5>Permissions</h5>
							</div>							
						</div>
					</div-->
				
		
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash enabledisable" id="password"    >
							<div class="card_dash_left">
								<h5>Passwords</h5>
							</div>
						</div>
					</div>   
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash enabledisable" id="whats_hot" >
                                                     
							<div class="card_dash_left">
								<h5>What's Hot  </h5>
							</div>
							
						</div>
					</div>
					
					
					    
					<!--
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash"    id="infoIcons"  >
							<div class="card_dash_left">
								<h5>INFO ICONS</h5>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left">
								<h5>HEADER MESSAGE</h5>
							</div>
							
						</div>
					</div>
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left" id="my_post" >
								<h5>POSTS<br>(VISIT A BOOTH)</h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="my_program" >
							<div class="card_dash_left">
								<h5>PROGRAM <br>(AGENDA / HIGHLIGHTS)</h5>
							</div>
							      
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="on_demand">
							<div class="card_dash_left">
								<h5>ON DEMAND CONTENT </h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="my_video" >
							<div class="card_dash_left">
								<h5>VIDEO STREAM </h5> 
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="my_audio" >
							<div class="card_dash_left">
								<h5>AUDIO STREAM</h5>
							</div>
							
						</div>
					</div>
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="workshop_list">
						<!--<a href="<?php echo base_url(); ?>workshop" <?=$GroupByDisabled;?>>
							<div class="card_dash_left">
								<h5>WORKSHOP</h5>
							</div>
						</a> 
						
						 
							<div class="card_dash_left">
								<h5>WORKSHOP</h5>
							</div>
						 
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left">
								<h5>ADVERTISEMENTS</h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left">
								<h5>SPONSORS<br>(TOP 20 SLOTS)</h5>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
                          <div class="card_dash enabledisable" id="chatPage" >
						  
						  <a href="<?php echo base_url(); ?>chat_box"> 

							<div class="card_dash_left" id="py_chat">
								<h5>CHATS</h5>
							</div>
							
						</div>
					</div>-->

					
					
		  </div>
		 <div class="footer-year">
		  <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
		 </div>
		</div>
	</section>	

<script>




				$("#config_project option").each(function(){
					
					let projectid = $(this).val();
					let select_p_id = '<?php echo $project; ?>';
					
					if(projectid==select_p_id){
						
						$(this).attr("selected","selected");
					}
					
				});



        $("body").on('click','#whats_hot',function(){
           $.fancybox.getInstance('close');
 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>whats_hot/index",
        ajax: { 
             settings: { data : 'usergroup=1', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
		});
    });
	$("body").on('click','#usersgroupsadmin',function(){
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
             settings: { data : 'usergroup=1', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
          
		 
            
        });

		$("body").on('click','#setting',function(){
           $.fancybox.getInstance('close');
 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Setting/index",
        ajax: { 
             settings: { data : 'usergroup=1', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
          
		 
            
        });
        
        
        
       $("body").on('click','#allsuermanagemaster',function(){
           $.fancybox.getInstance('close');
 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>UserManage/allUsersManage",
        ajax: { 
             settings: { data : 'usergroup=1', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
          
		 
            
        });
		
		$("body").on('click','#password',function(){
           $.fancybox.getInstance('close');
 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>PasswordManage/allUsersPasswordManage",
        ajax: { 
             settings: { data : 'usergroup=1', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
          
		 
            
        });
        
      
      
 

 

 
</script>
<script>
    
    $(document).ready(function(){
        
       $(".div-customize").css("height","100% !important"); 
	   

            
	   
	   
	   
    });
    
    </script>
    
    <style>
        .div-customize{
            height:100% !important;
            
        }
        </style>

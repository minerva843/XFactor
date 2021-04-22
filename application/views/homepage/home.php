<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// if(!empty($_SESSION['GroupData'])){
	// $GroupByDisabled=1;
// }else{
	// $GroupByDisabled=0;
// }


?>

 
<section class="container-fluid">
<div class="row config-drop">
<div class="col-md-8"> </div>
<div class="col-md-4">  
<div class="bottom-menu-right ">

			<ul>       
                <li class="select-group clearfix">
                    <select id="config_project" name="header-select">
					<?php if(!empty($projects)){?>
						<option value="">TO START, SELECT A PROJECT FIRST.</option>
					<?php }else{?>
						<option value="">TO START, SELECT A PROJECT FIRST.</option>  
					<?php }?>
						<?php foreach($projects as $pKey => $pVal) {
							//print_r($pVal);?>
						<option value="<?php echo $pVal->project_id;?>"> <?php echo strtoupper($pVal->project_name);?></option>
						<?php } ?>
                    </select>
                </li>
            </ul>
        </div>  
 </div> 
 </div> 	
 </div>  

    <section class="main-container">
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
		<div class="col-md-12" style="padding: 0px 5px;">
		<h2>CONFIG PAGE (XCONNECT) </h2>
		</div>
		</div>
		
		<div class="row div-customize">
					
					<?php 
					if($config_tabs[0]->status == 'SUSPENDED')
					{?>
						<div class="config-nodata">
								<p class="pl-kkc">GROUP HAS BEEN SUSPENDED.
								<br/>   
								TO GET ACCESS TO FEATURES, 
								<br/>
								PLEASE CONTACT ADMINISTRATOR. </p>
							</div>
					<?php }
					else if($userStatus == 2)
					{?>
						<div class="config-nodata">
								<p class="pl-kkc">YOUR USER ACCOUNT HAS BEEN SUSPENDED.
								<br/>   
								TO GET ACCESS TO FEATURES, 
								<br/>
								PLEASE CONTACT ADMINISTRATOR. </p>
							</div>
					<?php }
					else
					{
						if(!empty($config_tabs['cabs']))
						{
							foreach($config_tabs['cabs'] as $cKey => $cVal) {?>
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="card_dash GroupByDisabled" <?=$GroupByDisabled;?>  id="<?php echo $cVal->description;?>">
								<div class="card_dash_left">
									<h5><?php if($cVal->description == 'avatars') 
									{
										echo '<a href="'.base_url('avatar').'">'.$cVal->tab_name.'</a>';
									}
									else
									{
										echo $cVal->tab_name;
									}?></h5>
								</div>
							</div>       
						</div>
						<?php }
						}
						else
						{ 
							if($group == '')
							{?>
							<div class="config-nodata">
								<p class="pl-kkc">TO START, SELECT A GROUP AND PROJECT ON THE TOP RIGHT.</p>
							</div>
						<?php }
							else
							{?>
								<div class="config-nodata">
								<p class="pl-kkc">TO GET ACCESS TO FEATURES, 
								<br/>
								PLEASE CONTACT ADMINISTRATOR. </p>
							</div>
							<?php }	
						}
					}?>
					  
					
					
		  </div>
		 <div class="footer-year">
		  <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
		 </div>
		</div>
		<div id="myModal1_config" class="model_config delete-sorting">    

                                    <!-- Modal content -->
                                    <div class="modal-content">
									<div class="modal-body config_popup">
                                        <h4>CONFIG PAGE (XCONNECT) </h4>

                                        <p>TO START, SELECT A GROUP AND PROJECT ON THE TOP RIGHT.</p> 
                                                      
                                      </div>          
                                         
                       
					<div class="modal-footer text-right"> <span class="close exit_popup">OK</span> </div>									

                                   </div>    
					</div>
					
					        <div id="myModal2" class="model_config delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
									<div class="modal-body config_popup">
                                       <h4>CONFIG PAGE (XCONNECT) </h4>   

                                        <p>TO START, SELECT A GROUP AND PROJECT ON THE TOP RIGHT.</p>
                                                      
                                      </div>          
                                   
      
					<div class="modal-footer text-right"> <span class="close exit_popup">OK</span> </div>									

                                   </div>    
					</div>
					
					<div id="myModalgrp_suspnded" class="model_config delete-sorting">
                        <!-- Modal content -->
                        <div class="modal-content">
							<div class="modal-body config_popup">
                                <h4>XCONNECT(CONFIG PAGE) </h4>   
                                <p>YOUR ACCOUNT HAS BEEN SUSPENDED.<br/>PLEASE CONTACT SUPPORT FOR ASSISTANCE.</p>
                            </div>          
							<div class="modal-footer text-right"> <span class="close exit_popup">OK</span> </div>									
                        </div>    
					</div>
 
	</section>	

<script>

//
//$(document).ready(function() {
//
//	$("#floor_plan").fancybox({
//		ajax : {
//		    type	: "POST",
//		    data	: 'mydata=test'
//		}
//	});
//
//
////	/* This is basic - uses default settings */
////	
////	$("a#single_image").fancybox();
////	
////	/* Using custom settings */
////	
////	$("a#inline").fancybox({
////		'hideOnContentClick': true
////	});
////
////	/* Apply fancybox to multiple items */
////	
////	$("a.group").fancybox({
////		'transitionIn'	:	'elastic',
////		'transitionOut'	:	'elastic',
////		'speedIn'		:	600, 
////		'speedOut'		:	200, 
////		'overlayShow'	:	false
////	});
//	
//});
//
//
//$("#addNewZone").fancybox({
//    
//    ajax : {
//	    type: "POST",
//            data: 'mydata=test'
//            },
//            
//     afterShow : function() {
//        $('.close-btn').click(function() {
//            $.fancybox.close();
//        })
//    }
//    
//});


				$("#config_project option").each(function(){
					
					let projectid = $(this).val();
					let select_p_id = '<?php echo $project; ?>';
					//alert(projectid);
					//alert(select_p_id);
					if(projectid==select_p_id){
						
						$(this).attr("selected","selected");
					}
					
				});


	$("body").on('click','#AddProject',function(){
           $.fancybox.getInstance('close');
            $.fancybox.open({
                src: '<?=base_url();?>test/add',
                type: 'ajax',
                ajax: {
                    settings: {data: 'ABC', type: 'POST'}
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
            
        });

$('.exit_popup').click(function () {
		var modal = document.getElementById("myModal1_config");
		modal.style.display = "none";
		
		$('#myModal2').hide();
		$('#myModalgrp_suspnded').hide();
	})


        $("body").on('click','#chatPage',function(){
             
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
           let group_id = '<?php echo $this->uri->segment(3) ?>';
           if(project==''){
	   //alert("Please select project first");
	$('#myModal1_config').show();
	   }else{
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto', 
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/individual_all",
        ajax: { 
             settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
	clickSlide: false,
        clickOutside: false
        
    });
          
		}
         
        });


        $("body").on('click','#second_page',function(){
            console.log('line373');
            console.log('13 server'+next_url);
                $.fancybox.open({
                        maxWidth  : 800,
                        fitToView : true,
                        width     : '100%',
                        height    : 'auto',
                        type	  : 'iframe',
                        src: next_url,
                        type: 'ajax',
                        ajax: {
                            settings: {data: 'ABC', type: 'POST'}
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
        });



  
        $("body").on('click','#takelook',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
           let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(project);
          
         		if(project==''){
			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Content/showAllData",
        ajax: { 
             settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
          
		}
            
        });
        
      
 
        $("body").on('click','#workshop_list',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
           let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(project);
          
         		if(project==''){
			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>workshop/showall",
        ajax: { 
             settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
          
		}
            
        });


 
		$("body").on('click','#guest_list',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
           let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(group_id);
          
         		if(project==''){
			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>Guest/index",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
          
		}
            
        });
      
      
      
       
       
       
         $("body").on('click','#on_demand',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
             let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(project);
          
         		if(project==''){
			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>OnDemand/index",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        

    });
          
		}
            
        });
       
       
       
       
       
      $("body").on('click','#infoIcons',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
             let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(project);
          
         		if(project==''){

			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>icon/showallicon",

        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
          
		}
            
        });
       
       
       
       
        
        
        
        $("body").on('click','#showAllZones',function(){
           $.fancybox.getInstance('close');
           let project = '<?php echo $this->uri->segment(4) ?>';
           let group_id = '<?php echo $this->uri->segment(3) ?>';
          // alert(project);
          
         		if(project==''){
			$('#myModal1_config').show();
		}else{
		 
          
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>zone/showallzones",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
		clickSlide: false,
        clickOutside: false
        
    });
          
		}
            
        });
		
		
		
		


$("body").on('click','#project_register',function(){
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		
		if(group_id==''){
			$('#myModal2').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>project/index",
        ajax: { 
           settings: { data : 'group_id='+group_id, type : 'POST' }
        }, 
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
});


$("body").on('click','#floor_plan',function(){
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>floor/index",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
});

$("body").on('click','#my_post',function(){
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>post/index",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
}); 







$("body").on('click','#my_program',function(){ 
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>program/index",
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
});

$("body").on('click','#my_video',function(){ 
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>video/index", 
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
});
$("body").on('click','#my_audio',function(){ 
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>audio/index", 
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,
        clickOutside: false
        
    });
}    
 
            
});

$("body").on('click','#EMAILER',function(){ 
        $.fancybox.getInstance('close');
        let project = '<?php echo $this->uri->segment(4) ?>';
         let group_id = '<?php echo $this->uri->segment(3) ?>';
		//var check_project='<?php echo $GroupByDisabled;?>';
		if(project==''){
			$('#myModal1_config').show();
		}else{
			
		 
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>emailer/index", 
        ajax: { 
           settings: { data : 'project='+project+'&group_id='+group_id, type : 'POST' }
        },
        touch: false,
				clickSlide: false,   
        clickOutside: false
        
    }); 
}    
 
            
});

$("body").on('click','#summary_stats',function(){
	$.fancybox.getInstance('close');
	let project = '<?php echo $this->uri->segment(4) ?>';
	let group_id = '<?php echo $this->uri->segment(3) ?>';
  
	if(project==''){
		$('#myModal1_config').show();
	}
	else
	{
		window.location = "<?php echo base_url(); ?>home/summary/"+group_id+"/"+project;
	}
});

$("body").on('click','#grp_suspnded',function(){
	$.fancybox.getInstance('close');
	$('#myModalgrp_suspnded').show();
});



// $("body").on('click','#chatPage',function(){ 
//         $.fancybox.getInstance('close');
        
//         $.fancybox.open({
//         maxWidth  : 800,
//         fitToView : true,
//         width     : '100%',
//         height    : 'auto',
//         autoSize  : true,
//         type        : "ajax",
//     //    src         : "<?php echo base_url(); ?>Chat_box/python_chat", 
//         src         : "http://54.179.99.134:8000/", 
//         ajax: { 
//            settings: { data : 'project=', type : 'POST' }
//         },
//         touch: false,
// 				clickSlide: false,
//         clickOutside: false
        
//     });

// });

 
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

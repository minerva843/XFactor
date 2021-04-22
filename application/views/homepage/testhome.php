<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// if(!empty($_SESSION['GroupData'])){
	// $GroupByDisabled="";
// }else{
	// $GroupByDisabled='style="pointer-events:none"';
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
					<option>SELECT A PROJECT TO CONFIGURE</option>
						<?=$_SESSION['output'];?>
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
		        
		
		<div class="row div-customize">
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash GroupByDisabled" <?=$GroupByDisabled;?>>
							<div class="card_dash_left">
								<h5>SUMMARY & STATISTICS</h5>
							</div>							
						</div>   
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash GroupByDisabled" id="project_register" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>project/index' <?=$GroupByDisabled;?>>
							<div class="card_dash_left">
								<h5>PROJECTS & REGISTRATION FORMS</h5>
							</div>							
						</div>   
					</div>    
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>test/guest' >
							<div class="card_dash_left">
								<h5>GUESTS & GUEST LISTS </h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
                                            
						<div class="card_dash GroupByDisabled">
                                                    <a href="<?php echo base_url(); ?>chat/avatar" <?=$GroupByDisabled;?>>
							<div class="card_dash_left" >
								<h5>AVATARS</h5>
							</div>	
                                                         </a>
						</div>
                                           
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>content/addNewSuccess' >
							<div class="card_dash_left">
								<h5>ATTENDANCE</h5>
							</div>							
						</div>
					</div>
				
		
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="floor_plan" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>floor/index' >
							<div class="card_dash_left">
								<h5>Floor plan & grids</h5>
							</div>
						</div>
					</div>   
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash"  href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>zone/showallzones' >
                                                     
							<div class="card_dash_left">
								<h5>ZONES  </h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="takelook" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>Content/showAllData'>
							<div class="card_dash_left">
								<h5>TAKE A LOOK AROUND CONTENT</h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash"  data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax"  id="infoIcons" data-src="<?=base_url();?>icon/showallicon" href="javascript:;" >
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
							<div class="card_dash_left" id="my_post" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>post/index'>
								<h5>POSTS<br>(VISIT A BOOTH)</h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" id="my_program" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>program/index'>
							<div class="card_dash_left">
								<h5>PROGRAM <br>(AGENDA / HIGHLIGHTS)</h5>
							</div>
							      
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left">
								<h5>ON DEMAND CONTENT </h5>
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>test/video' >
							<div class="card_dash_left">
								<h5>VIDEO STREAM </h5> 
							</div>
							
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash" href="javascript:;" data-options='{"touch" : false,"clickOutside":false,"clickSlide":false}' data-fancybox data-type="ajax" data-src='<?=base_url();?>test/audio'  >
							<div class="card_dash_left">
								<h5>AUDIO STREAM</h5>
							</div>
							
						</div>
					</div>
					
					
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
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
                                            <div class="card_dash" id="AddProject" >
							<div class="card_dash_left">
								<h5>CHATS</h5>
							</div>
							
						</div>
					</div>
				    <div class="col-xl-3 col-lg-6 col-md-6">
						<div class="card_dash">
							<div class="card_dash_left">
								<!-- <h5>CHATS</h5> -->
							</div>
							
						</div>
					</div>
					
					
		  </div>
		 <div class="footer-year">
		  <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>
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
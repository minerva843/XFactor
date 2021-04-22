
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
    min-height: 130px;
    width: 380px;
    overflow-y: scroll;
	padding-top: 6px;
    padding-left: 12px;
	font-size: 13px;
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

.container{
	margin-bottom: 0px;
	height: auto; 
	max-width: 800px;
	position: relative;
	padding-left:0px;
	padding-right:0px;
}
.table {
    border: green;
    height: 450px;
    max-width: 100%;
}

</style>

<style>
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  position: relative;
  margin: auto;
}   

/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    -: 0px;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    bottom: -48px; 
}   

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}    

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  color:#333333;}


/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

 .dot:hover {
  background-color: #717171;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>


<style>
.content {
  align-items: center;
  background-color: #FFFFFF;
  display: flex;
  height: 200px;
  justify-content: space-around;
  margin-top: 4rem;
  padding: .75rem;
  width: 500px;
}

.tooltip {
  cursor: pointer;
  display: inline-block;
  position: relative;
  border-bottom: 1px dotted #1849AB;
}

.tooltip .tooltip__content {
  background-color: #1849AB;
  border-radius: 4px;
  bottom: 150%;
  color: #FFFFFF;
  left: 50%;
  margin-left: -70%;
  opacity: 0;
  padding: 1rem 0.5rem;
  position: absolute;
  text-align: center;
  transition: opacity 0.5s;
  visibility: hidden;
  width: 130px;
  z-index: 1;
}    

.tooltip .tooltip__content::after {
  border-width: 5px;
  border-style: solid;
  border-color: #1849AB transparent transparent transparent;
  content: "";
  left: 50%;
  margin-left: -5px;
  position: absolute;
  top: 100%;
}

.tooltip:hover .tooltip__content {
  opacity: 1;
  visibility: visible;
}
#attachCan{position: absolute;
    right: 17px;
    color: #222222;
    cursor: pointer;}
</style>

<script>

jQuery('video').on("loadeddata", function() {
    jQuery('video').attr('disablePictureInPicture', 'false');
}); 
     
 </script>     

<div class="main-section" id="add-floor">
<div class="pop-blok" style="display:none;"></div> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2 class=""><?php echo $data->content_set_name;?> </h2>
					
                </div> 

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn rem_close" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	    

        <div class="middle-body register-form program-tabs place-video-top">
    
            <div class="row">
			<div class="col-md-9 place-filter">  

<div class="avtar-filter" style="margin-top: 0px;">
		<div class="row"> 
					
				 <div class="col-md-6">   
                  <div class="looka-took">
				  <span class="you-are"> YOU ARE EXPLORING &nbsp; &nbsp; :</span> 
				  <span class="common-space">  <?php echo $zone_type;?>, <?php echo $zone_name;?> </span>
				  <!-- <button class="take-a-look"> TAKE A LOOK AROUND</button> -->   
				  </div>    
                 </div>
				 
				 <div class="col-md-6 text-right skipp stopvideo" style="cursor: pointer;">SKIP VIDEO</div>
                                    
		 </div>                                           
		</div>


				   <div id="printJS-form">  <?php // print_r($zone); ?>
				      
				
                    <div class="zone-info floor-planadd">
                      
<div class="contant-slider place-video">

					  
				
<div class="slideshow-container">  
				

  <div class="mySlides2">              
<video controls id="myVideoPlayer" controlsList="nodownload" disablePictureInPicture>
  <source src="<?php echo base_url().'temp/'.$videos->file_name;?>" type="video/mp4">
</video>	
	<script>
	document.getElementById('myVideoPlayer').addEventListener('ended',myHandler,false);
    function myHandler(e) {
       $('.stopvideo').text("PLAY VIDEO")
	  $('.mySlides2').hide();
	  $('.mySlides1').show();
	  $('.details-tab').show();
    }
	//jQuery('#myVideoPlayer').attr('disablePictureInPicture', 'false');
	
     var video = document.getElementById("myVideoPlayer");
	 video.disablePictureInPicture = true;
     function stopVideo(){
          video.pause();
          video.currentTime = 0;
     }
	 function playVideo(){
          video.play();
          video.currentTime = 0;
     }
	 $(".stopvideo").on('click', function(){
		 var read=$('.stopvideo').text();
		  if (read == 'SKIP VIDEO') {
			  stopVideo();
			  $('.stopvideo').text("PLAY VIDEO")
			  $('.mySlides2').hide();
			  $('.mySlides1').show();
			  $('.details-tab').show();

		  } else {
			  playVideo();
			  $('.stopvideo').text("SKIP VIDEO")
			  $('.mySlides1').hide(); 
			  $('.mySlides2').show();
			 $('.details-tab').show();
			 $('.details-tab').empty();
			$('.details-tab').html('<p> AT THE END OF THE VIDEO OR WHEN YOU SKIP VIDEO, AN IMAGE WITH INFO ICONS WILL APPEAR. </p><p>CLICK ON ANY INFO ICON TO DISPLAY INFORMATION / PROMOTIONS / CONTEST RULES.</p>');
		  }
	
});
</script>     
</div>
<div class="mySlides1" style="display:none;"> 
	     
 
 
<?php foreach($icons as $icon){ $position=json_decode($icon->drag_position);
$dyTop=$position->top;
$dyTop=explode("px",$dyTop);
$dyTopPos=$dyTop[0];

$dyLeft=$position->left;
$dyLeft=explode("px",$dyLeft);
$dyLeftPos=$dyLeft[0];

if(in_array($dyTopPos, range(0, 690)) && in_array($dyLeftPos, range(0, 1280))) {
	$popupAI=0;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos-43;
	$Fleft=$dyLeftPos-294;
}

if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(0, 200))) {
	//$popupAI=1;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos+163;
	$Fleft=$dyLeftPos+114;
	
}
if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(0, 200))) {
	//$popupAI=3;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos-35;
	$Fleft=$dyLeftPos+120;
	
}
if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(201, 500))) {
	//$popupAI=6;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos-36; 
	$Fleft=$dyLeftPos+120;
}
if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(501, 1000))) {
	//$popupAI=8;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos-41;
	$Fleft=$dyLeftPos-297; 
}
if(in_array($dyTopPos, range(346, 690)) && in_array($dyLeftPos, range(1001, 1280))) {
	//$popupAI=4;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos-42;
	$Fleft=$dyLeftPos-296;
}
if(in_array($dyTopPos, range(0, 345)) && in_array($dyLeftPos, range(951, 1280))) {
	//$popupAI=2;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos+161;
$Fleft=$dyLeftPos-295;
}
if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(501, 950))) {
	//$popupAI=7;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos+163;  
$Fleft=$dyLeftPos+115;
}
if(in_array($dyTopPos, range(0, 300)) && in_array($dyLeftPos, range(201, 500))) {
	//$popupAI=5;
	$popupAI=rand(1000,9999);
	$Ftop=$dyTopPos+162;
	$Fleft=$dyLeftPos+113;
}


   
?>
<!--div data-toggle="modal" data-target="#myModal" id="draggable_<?=$icon->id;?>" data-boxid="<?=$icon->id;?>" style="width: 20px; height:20px; text-align: center; background: green; color: white; border-radius: 50%;position: absolute;top:<?=$position->top;?>;left:<?=$position->left;?>;" class="draggable ui-widget-content" -->
<?php 
//$IconNotnull=$this->db->get_where('xf_mst_icon_positions', array('id' => $icon->id))->row();

	$this->db->select('post.*,xf_mst_content_post_mapping.info_icon,u.quick_intro');
	$this->db->from('xf_mst_content_post_mapping'); 
	$this->db->join('xf_mst_post_info as post', 'post.id = xf_mst_content_post_mapping.post_id','left');
	$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
	$this->db->where('info_icon',$icon->id);
	$query = $this->db->get(); 
	$data = $query->row();
	//print_r($data);
	
if(!empty($data)){
?>
<div data-toggle="modal" data-target="#place_popup<?=$popupAI;?>" class="draggable_<?=$icon->id;?>" data-boxid="<?=$icon->id;?>" style="position: absolute;top:<?=$position->top;?>;left:<?=$position->left;?>;cursor: pointer;"> 
	 <img src="<?=base_url();?>assets/images/place-icon.png" class="place-drag-icon">   
	</div> 
	
<?php } 
	$id=$icon->id;
	$this->db->select('post.*,xf_mst_content_post_mapping.info_icon,u.quick_intro');
	$this->db->from('xf_mst_content_post_mapping'); 
	$this->db->join('xf_mst_post_info as post', 'post.id = xf_mst_content_post_mapping.post_id','left');
	$this->db->join('xf_guest_users as u', 'post.post_owner = u.id','left');
	$this->db->where('info_icon',$id);
	$query = $this->db->get(); 
	$data = $query->row();
	//print_r($data);
	if(!empty($data->post_title)){
		$postTitle=$data->post_title;
		$postDesc=substr($data->post_details,0,100);
	?> 
<div id="place_popup<?=$popupAI;?>" class="modal fade place-model-popup" role="dialog" style="top: <?=$Ftop;?>px;left: <?=$Fleft;?>px;"> 
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body">
	        
	  <div class="tooltips">
	  <div class="tooltips-inner">
		<h2><?=$postTitle;?></h2>
		<p><?=$data->post_details;?></p>
	    </div>  
       <div class="quick-intro"> 
		<div class="chat-left">  </div>     
		<div class="chat-close"> <!--<a href="#" class="chat-to-owner rem_close" data-dismiss="modal"> CHAT </a> <a href="#" class="quik-intro rem_close" data-dismiss="modal">READ QUICK INTRO </a> --> <a href="#" class="rem_close" data-dismiss="modal">CLOSE</a> </div>
		</div>    
	   
      </div>
	  </div>
     
    </div>
  </div>
</div>

<?php }?>

<script>

$(document).ready(function(){ 
$('.pop-blok').hide();


$(".rem_close").click(function(){
	$('.pop-blok').hide();
});

	$('.draggable_<?=$icon->id;?>').click(function(){
		
		
		var icon_id=$(this).attr('data-boxid');
		
		var project_id='<?=$project_id;?>';
		var zone_id='<?=$zone_id;?>';
		var floor_id='<?=$floor_id;?>';
		var url='<?php echo base_url();?>places/UpdatePostIconHistory';
		$.ajax({  
			type: "POST",
			url: url,  
			data: {project_id:project_id,module_name:'INFO ICON',module_refid:icon_id,zone_id:zone_id,floor_id:floor_id}, 
			success: function(data)
			{
				
			} 
		});
		
		var url='<?php echo base_url();?>places/GetPostByIconId';
		$.ajax({  
			type: "POST",
			url: url, 
			data: {icon_id:icon_id}, 
			success: function(data)
			{
				$('.details-tab').empty();
				$('.details-tab').show();
				$('.details-tab').html(data);
				
				
			}
		});
		var url='<?php echo base_url();?>places/GetPostOwnerByIconId';
		$.ajax({  
			type: "POST",
			url: url, 
			data: {icon_id:icon_id},  
			success: function(data)
			{
				//var data=JSON.parse(data);
				var data=$.trim(data);
				$('.quik-detail').empty();
				$('.quik-detail').html(data);
				
			}
		});
		
	})
	
	$('.draggable_<?=$icon->id;?>').click(function(){
		
		$('.action-post').hide();
		var icon_id=$(this).attr('data-boxid');
		
		var url='<?php echo base_url();?>places/GetButtonTypeByIconId';
		$.ajax({  
			type: "POST",
			url: url, 
			data: {icon_id:icon_id},
			success: function(data)
			{
				var data=JSON.parse(data);
				
				if(data.post_type==null){
					
					$('.action-post').hide();
					$('#action-post').val(0); 
					$('#action-post2').val(0); 
				}else{
					$('#action-post').val(1);
					$('#action-post2').val(1);
					// $('.chat-not-select').hide();
					// $('.chat-area').show();
					// $('.chat-action-post').show();
				}
				if(data.post_type=='INFO'){
					$('.pop-blok').css("display","block");
					$('.action-post').empty();
					$('.action-post').hide();
					$('#action-post').val(0);
				}
				if(data.post_type=='PROMOTION'){
					$('.pop-blok').css("display","block");
					$('.action-post').empty();
					$('.action-post').show();
					$('.action-post').text('Buy Now');
					$('.action-post').attr("href",data.btn_url);
				}
				if(data.post_type=='CONTEST'){
					$('.pop-blok').css("display","block");
					$('.action-post').empty();
					$('.action-post').show();
					$('.action-post').text('Play Now');
					$('.action-post').attr("href",data.btn_url);
				}
				if(data.post_type=='LUCKY DRAW'){
					$('.pop-blok').css("display","block");
					$('.action-post').empty();
					$('.action-post').show();
					$('.action-post').text('Get More Chance');
					$('.action-post').attr("href",data.btn_url);
				}
				
				
			}
		});
	})
	
	
})
</script>
<?php }?>
  <img id="demo-4" class="" src="<?php echo base_url().'temp/'.$images->file_name;?>" alt="your image">
 
</div>
<input type="hidden" id="action-post">
<input type="hidden" id="action-post2">
</div>   		
				

                 </div>
                    </div>  
					</div>  
                       
                </div>
<script>
$("#chat_tab").click(function(){
	
	$('.action-post').hide();
	var action=$('#action-post2').val();
	if(action==1){
		$('.chat-not-select').hide();
		$('.chat-area').show();
		$('.chat-action-post').show();
		$('.upload-btn-wrapper button').show();
	}
	
});

$("#quik_tab").click(function(){
	$('.action-post').hide();
	$('.chat-action-post').hide();
	 
});

$("#details_tab").click(function(){
	var action=$('#action-post').val();
	var action2=$('#action-post2').val();
	if(action2==1){
		$('.chat-action-post').hide();
	}
	if(action==1){
		$('.chat-action-post').hide();
		if ( $('.action-post').css('display') == 'none' || $('.action-post').css("visibility") == "hidden"){
			
			$('.action-post').show();
		}
	}

});
</script>

               <div class="col-md-3 right-text">
                    <div class="tab right-tabs chat-rights">

                        <div class="table-content">	  
       
						<ul class="nav nav-tabs" role="tablist">  
                            <li>
								<a class="active" id="details_tab" data-toggle="tab" href="#details">DETAILS</a>
							</li>
							<li class="">
								<a class="" id="chat_tab" data-toggle="tab" href="#chat5">CHAT</a>
							</li>
							<li style="margin-right: 0px;">
								<a class="" id="quik_tab" data-toggle="tab" href="#chat6">A QUICK INTRO</a>
							</li>
							
						  </ul>	    
         
							<div class="tab-content chat">
							
								<div id="details" class="container tab-pane active">
									<div class="table_info">
								
										<div class="details-tab">
								
											<div class="details-in">
												<?php 
													if(!empty($icons)){
												?>
													<p> AT THE END OF THE VIDEO OR WHEN YOU SKIP VIDEO, AN IMAGE </br>WITH INFO ICONS WILL APPEAR. </p><p>CLICK ON ANY INFO ICON TO DISPLAY INFORMATION / PROMOTIONS / CONTEST RULES.</p>
												<?php 
												}
												else{
												?>
												<p> THERE IS CURRENTLY NO POSTS. </p>
												<p> CLICK ON CHAT TO REACH OUT TO THIS SELLER. </p>
												<p> CLICK ON QUICK INTRO TO KNOW MORE ABOUT THIS SELLER.</p>
												<?php }	?>
										</div>
									</div>
							
								</div>
								<div class="form-submit attach-file">

										
										<a href="" class="action-btn action-post postbuy_now" id="btn5" style="display:none;" target="_blank"></a>
										 
									</div>
							</div>
							
			
							<div id="chat5" class="container tab-pane">
								<div class="chat-not-select table_info">
									<div class="details-tab">
								
										<div class="details-in">
											<?php if(!empty($videos)){ ?>
											<p> SELECT ANY INFO ICON TO USE THIS FEATURE. </p>
												
											<?php }
											else{ ?>
												<p> NO POSTS AVAILABLE.</p>
												<p> THE PLACE OWNER DID NOT POST ANY INFO.</p>
											<?php } ?>
										</div>
									</div>
								</div>
							
                            <div class="table_info chat-area" style="display:none;">
							
							<div class="current-chat"> CURRENT CHAT : </div>
							
							<div class="nearme-box chat-top-profile">
							<div class="nearme-box clearfix">
							<img src="assets/images/chat/chat-icons.png" alt="">
							<div class="nearme-detail">
							     
							</div>
							</div> 
							</div> 
                              
							<div class="chat-deright-top">
							<div class="chat-inscroll" id="chat_msg">
								

							</div>
							</div>
							
							<div class="chat-type">
								<i class="fa fa-times" id="attachCan" style="display:none;"></i>
								<div id="beforeUpload"></div>
								<textarea id="chatbox_t3" placeholder="START TYPING HERE "></textarea>
							</div>
							
							</div>
                            </div>
							
							
							<div id="chat6" class="container tab-pane"> 
							 <div class="table_info quick-intro quik-detail" style="padding-top: 0px;">
							 <div class="details-tab">
							
							<div class="details-in">
							<?php if(!empty($videos)){ ?>
										<p> SELECT ANY INFO ICON TO USE THIS FEATURE. </p>
											
										<?php }else{ ?>
											<p> NO POSTS AVAILABLE.</p>
											<p> THE PLACE OWNER DID NOT POST ANY INFO.</p>
							<?php } ?>
							
																
							</div>
								</div>
							
							</div>
								</div>
							
							 
							
							</div>
							<!--div class="form-submit attach-file">

								<div class="upload-btn-wrapper">
									 <button class="btn" style="display:none;">ATTACH FILE</button> 
									<input type="file" name="myfile" style="display:none;" />
								</div>
								<a href="" class="action-btn chat-action-post" id="btn55" style="display:none;">SEND</a>
								
							</div-->
                           <div class="form-submit attach-file"> 
							
								<div class="upload-btn-wrapper">
									<button class="btn" style="display:none;">ATTACH FILE</button> 
									<input type="file" name="myfile"  id="fileupload" style="display:none;"/>
								</div>              
								<a href="" class="action-btn action-post" id="btn5" style="display:none;" target="_blank"></a>
								<a href="" class="action-btn chat-action-post" id="btn55" style="display:none;">SEND</a>
								
                            </div>   
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?> .<b>XPLATFORM</b>. </div>  

    </div>

</div>
<div id="myModalconfirm" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p>File size must be 10 MB or lesser.</p>

			<p>File format that are accepted are JPG, PNG, PDF, MP3, MP4</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeconfirm">OK</span> </div> 
	</div>
</div>

<div id="myModalexceed" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p style="color:red;">ENSURE THAT FILE SIZE IS NOT MORE THAN 10 MB.</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeexceed">OK</span> </div> 
	</div>
</div>   

<div id="myModalext" class="modal delete-sorting">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-body">
			<h4>XPLATFORM </h4>
			<p style="color:red;">ENSURE THAT FILE FORMAT IS JPEG, PNG, MP3, MP4, PDF.</p>
		</div>
	<div class="modal-footer text-right"><span data-dismiss="modal" class="closeext">OK</span> </div> 
	</div>
</div>


<script>


$(document).ready(function(){

	$('body').find('.modal-backdrop').remove();
 
 
	 $('body').on('click', '.close-btn', function () {
	 
	//  alert();
            $.fancybox.close(function(){
            location.reload();
           
             $('.rem_close').click();
            $('.modal-backdrop').removeClass('show');
			$('.modal-backdrop').hide();
			$('.modal-backdrop').css('display','none !important');
            
            });
            
            $('.rem_close').click();
            $('.modal-backdrop').removeClass('show');
			$('.modal-backdrop').hide();
			$('.modal-backdrop').css('display','none !important');
        }); 
			var interval_1=1;
$('#chat_tab').click(function(){
	interval_1=setInterval(chatNoti, 1800);
	
})
$('#details_tab').click(function(){
	
	for (var i = 1; i < interval_1; i++)
        window.clearInterval(i);
	
	clearInterval(interval_1);
})
$('#quik_tab').click(function(){
	
	for (var i = 1; i < interval_1; i++)
        window.clearInterval(i);
	
	clearInterval(interval_1);
})
	function chatrefresh() {
		$.ajax({
			url: '<?= base_url(); ?>Chat/chatMsg',
			success: function(response) {
				//console.log('refresh result',response);
				$("#chat_msg").html(response);
			}
		});
	}
	function chatNoti() {
		$.ajax({
			url: '<?= base_url(); ?>Chat/chatRef',
			success: function(response) {
				console.log('refresh result',response);
				$("#chat_msg").append(response);
			}
		});
	}
	
	chatrefresh();
	//chatNoti();
	
	$('#attachCan').click(function(){
		$('#attachCan').hide();
		$('#beforeUpload').html('');
		$('#chatbox_t3').show();
	});
	
$('.btn').click(function(e){
		e.preventDefault();
		var modal = document.getElementById("myModalconfirm");
		var span = document.getElementsByClassName("closeconfirm")[0];
		modal.style.display = "block";
		span.onclick = function() {
			modal.style.display = "none";
			$('#fileupload').click();
		}
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
		
		
	})
	
	
	$('#fileupload').on('change',function(){
			
			var input = document.getElementById('fileupload');
			var filename = $("#fileupload").val();
			var filextsion=filename.split('.').pop(); 
			//console.log(input.files[0].type[1]);
			if(filextsion =='jpg' || filextsion =='JPG' || filextsion == 'jpeg' || filextsion =='JPEG' || filextsion == 'PNG' || filextsion =='png' || filextsion == 'MP4' || filextsion =='mp4' || filextsion == 'MP3' || filextsion =='mp3' || filextsion == 'PDF' || filextsion =='pdf'){
				var condition=true;
			}else{
				var condition=false;
			}
			console.log(filextsion);
			if (input.files[0].size > 10485760) {
				var modal = document.getElementById("myModalexceed");
				var span = document.getElementsByClassName("closeexceed")[0];
				modal.style.display = "block";
				span.onclick = function() {
					modal.style.display = "none";
					$('#fileupload').click();
				} 
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			}
			else
			{
				if(condition==true){
					var output = document.getElementById('beforeUpload');
					var fl = event.target.files[0].type.split("/");
					var base_url = '<?php echo base_url("assets/images/icon/")?>';
					if(fl[0] == 'application' || fl[1] == 'mp4' || fl[1] == 'mp3')
					{
						var f = fl[1]+'.png';
						var html = '<img src='+base_url+f+' style="height:150px;margin-right: 20px;">';
					}
					else
					{
						var html = '<img src='+URL.createObjectURL(event.target.files[0])+' style="height:150px;margin-right: 20px;">';
					}
					
					html += '<span>'+event.target.files[0]['name']+'</span>';
					//html += '<i class="fa fa-times fa-2x" id="cancelAttach" style="position: absolute;right: 15px;cursor: pointer;"></i>';
					output.innerHTML = html;
					$('#attachCan').show();
					$('#chatbox_t3').hide();
				}else{
					var modal = document.getElementById("myModalext");
					var span = document.getElementsByClassName("closeext")[0]; 
					modal.style.display = "block";
					span.onclick = function() {
						modal.style.display = "none";
						$('#fileupload').click();
					}
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
				}
				// console.log(event.target.files[0].type);
				// console.log(event.target.files[0].type.split("/"));
				
				
			}
				
		})
	
	$("#btn55").click(function(e) {
		e.preventDefault();
		var msg = $('.chat-type textarea').val();
		var formdata = new FormData();
		var file_data = $('#fileupload').prop('files')[0]; 
		
		formdata.append('myfile', file_data);
		formdata.append('msg', msg);
		console.log(formdata);
		//if ($("#chatbox_t3").val().trim().length < 1) {
			//$('#btn5').prop('disabled', 'true');
			//return;
		//} else {
			$.ajax({
				url: "<?php echo base_url('/chat_box/sendMessage') ?>",
				type: 'POST',
				data: formdata,
				contentType:false,
				cache:false,
				processData:false, 
				success: function(response) {
					console.log(response);
					$('.chat-type textarea').val('');
					$('#beforeUpload').html('');
					$('#attachCan').hide();
					$('.chat-type textarea').show();
					$("#chat_msg").append(response);
					$('#chat_msg').animate({
						scrollTop: $('#chat_msg')[0].scrollHeight
					}, 1000);
				}
			});
		//}
	});

	$('#chatbox_t3').keypress(function(e) {
		if (e.keyCode == 13 && e.shiftKey) {
			console.log("Triggered enter+shift");
		}
		if (e.keyCode == 13 && !e.shiftKey) {
			e.preventDefault();
			var msg = $('.chat-type textarea').val();
			if ($("#chatbox_t3").val().trim().length < 1) {
				$('#btn5').prop('disabled', 'true');
				return;
			} else {
				$.ajax({
					url: "<?php echo base_url('/chat_box/sendMessage') ?>",
					type: 'POST',
					data: {
						msg: msg
					},
					success: function(response) {
						console.log(response);
						$('.chat-type textarea').val('');
						$("#chat_msg").append(response);
						$('#chat_msg').animate({
							scrollTop: $('#chat_msg')[0].scrollHeight
						}, 1000);
					}
				});
			}
			console.log("Triggered enter");
		}
	})
	

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

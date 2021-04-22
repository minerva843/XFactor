
		
<div class="what-new-right what-s-new all_listing_places">
<div class="container-fluid">
       <div class="row"> 
       <div class="col-md-12">
		<h2>XCONNECT (ALL PLACES) </h2>
		</div>
		</div>

</div>


<?php foreach($projects as $project){ ?>


<div class="container-fluid">
<div class="what-new-repeat">
 
<div class="row"> 
<div class="col-md-3 p-r-0">
<div class="whats-img">

 
<?php
$imageurl = base_url().'assets/project/'.$project->project_header_visual;

if(file_get_contents($imageurl)){ ?>

<img src="<?php echo base_url(); ?>assets/project/<?php echo $project->project_header_visual; ?>" alt=""> 

<?php }else{ ?>

<img src="<?php echo base_url(); ?>assets/images/what-img1.png" alt=""> 

<?php }

 ?>
 

 </div>
</div>

<div class="col-md-5 p-r-0">
<div class="what-right-cont"> 
<?php
if(date('Y-m-d',strtotime($project->event_start_date_time)) > date('Y-m-d')){
	$project_status="NOT STARTED";
}
if((date('Y-m-d',strtotime($project->event_start_date_time)) == date('Y-m-d')) || (date('Y-m-d',strtotime($project->event_start_date_time)) < date('Y-m-d'))){
	$project_status="LIVE";
}
if( !empty($project->event_end_date_time) && date('Y-m-d',strtotime($project->event_end_date_time)) < date('Y-m-d')){ 
	$project_status="ENDED";
}
?>
<p class=""><b><?=$project_status?>. </b><?php echo $project->project_audience_type; ?>. <?php echo $project->project_type; ?>. <?php echo $project->event_start_date_time; ?>h <?php if($project->event_end_date_time){ echo '- '.$project->event_end_date_time.'h'; } ?>.</p>
<div class="project_show_mob">
<p class="mt-20 mb-20 project_mob"><b><?php echo $project->project_name;  ?></b></p> 

<div class="read-more hidden-desk readmore_mob" id="profile-description<?=$project->id?>">  

<div class="show-more<?=$project->id?>">Show More</div>  
</div> 
</div>
       
<!--p><?php echo $project->project_description; ?></p-->
 <div id="profile-description<?=$project->id?>">
            <div class="text<?=$project->id?> show-more-height">
               <?php echo $project->project_description; ?>
            </div>
          
</div> 
  

</div> 
</div>  
<style>
#profile-description<?=$project->id?> {
  position:relative;
}
#profile-description<?=$project->id?> .text<?=$project->id?> {
/*   width: 660px;  */
 
  color: #000000; 
  position:relative; 
  font-family: Arial; 
  font-size: 14px; 
  display: block;
}
#profile-description<?=$project->id?> .show-more<?=$project->id?> {
   color: #000000;
    position: relative;
    font-size: 14px;
    text-align: right;
    cursor: pointer;
    font-weight: 600;
}
#profile-description<?=$project->id?> .show-more<?=$project->id?>:hover { 
    color: #000000;
}
#profile-description<?=$project->id?> .show-more-height { 
  height: 160px;  
  overflow:hidden; 
}

</style>
<div class="col-md-2 p-r-0 hidden-mob">
<div class="read-more" id="profile-description<?=$project->id?>">

<div class="show-more<?=$project->id?>">Show More</div>
</div>   
</div>

<script>

    $(".show-more<?=$project->id?>").click(function () {
        if($(".text<?=$project->id?>").hasClass("show-more-height")) {
            $(this).text("Show Less");
        } else {
            $(this).text("Show More");
        }

        $(".text<?=$project->id?>").toggleClass("show-more-height");
    });
</script>
<div class="col-md-2">
<div class="take-therenow">
<div class="df-reg">
<?php 
$project_type=$project->project_type;
if($project_type == 'SHOP REG REQUIRED' || $project_type == 'ONLINE REG REQUIRED' || $project_type == 'ONSITE REG REQUIRED' || $project_type == 'HYBRID REG REQUIRED' || $project_type == 'PROPERTY REG REQUIRED' || $project_type == 'VIRTUAL SHOP REG REQUIRED' || $project_type == 'VENUE REG REQUIRED' || $project_type == 'DEMO REG REQUIRED'){
	if($project_status=='ENDED'){
		$pro_type='';
	}else{
		$userid = $this->session->userdata('user_id');
		$myproject=$this->db->get_where('xf_guest_users', array('user_id =' => $userid,'project_id'=>$project->id))->row();
		if($myproject>0){
			$pro_type='<p>REGISTERED</p>'; 
		}else{
			$pro_type='<a href="'.$project->register_url.'" target="_blank" class="what-register regis">REGISTER</a>'; 
		}
	}
}else{
	if($project_status=='ENDED'){
		$pro_type='';
	}else{
		$pro_type='<p>NO REGISTRATION REQUIRED</p>'; 
	}
	
} 
?> 

<?=$pro_type?>
<script>
// $('.regis').click(function(){
			// window.open(
		  // '<?=$project->register_url?>',
		  // '_blank' 
		// );
// })
</script>
</div>
<div class="mobile_main_div">
<div class="media_div">
<a href="<?php echo base_url();?>places/index/<?=$project->id;?>" class="view-On">View on LET'S EXPLORE page</a>

        <div class="what-hot-email what-snewlink"> 
		<div class="what-hot-right">
		<a href="mailto:?subject=XPLATFORM - QUICK LINK TO PLACE&body=<?php echo base_url();?>places/index/<?=$project->id;?>%0D%0A%0D%0AStart exploring today!%0D%0A%0D%0A%0D%0AWarmest Regards%0D%0A
The XPLATFORM Team" ><i class="fas fa-envelope"></i></a>

		<a href="#" class="copy_text" copy-data="<?php echo base_url();?>places/index/<?=$project->id;?>"><i class="fas fa-link"></i></a> 
		<script>
$('.copy_text').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('copy-data');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');  
   //console.log('copied text : ', copyText);
   //alert('copied text: ' + copyText); 
 });
</script> 
		</div>
		</div>
		</div>
<div class="media_div">
<a href="<?=base_url();?>simple_view/post/<?=$project->id;?>" class="view-On">View on Simple View page </a>
<div class="what-hot-email what-snewlink">
		<div class="what-hot-right">
		<a href="mailto:?subject=XPLATFORM - QUICK LINK TO PLACE&body=<?php echo base_url();?>places/index/<?=$project->id;?>%0D%0A%0D%0AStart exploring today!%0D%0A%0D%0A%0D%0AWarmest Regards%0D%0A
The XPLATFORM Team" ><i class="fas fa-envelope"></i></a>
		<a href="#" class="copy_text2" copy-data2="<?php echo base_url();?>simple_view/post/<?=$project->id;?>"><i class="fas fa-link"></i></a> 
		<script>
$('.copy_text2').click(function (e) {
   e.preventDefault();
   var copyText = $(this).attr('copy-data2');

   document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
   }, true);

   document.execCommand('copy');  
   //console.log('copied text : ', copyText);
   //alert('copied text: ' + copyText); 
 });
</script>  
		</div>
		</div>

</div>    


</div>
</div>
</div>
</div>
</div>

</div>


<?php }  ?>

</div>

		<div class="footer-year">
		<div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div> 
		</div>


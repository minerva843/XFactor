
    <!-- JS -->
    <!-- fraimwork - jquery include -->
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	
	
	 
	<script src="<?php echo base_url(); ?>assets/libs/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>  
       
<!--
	<script src="<?=base_url();?>assets/datetimepickerJquery/js/jquery.min.js"></script>-->
 <!--	<script src="<?=base_url();?>assets/datetimepickerJquery/js/jquery.datetimepicker.js"></script>  -->
		
		    
<!--		<script src="<?=base_url();?>assets/js/popper.min.js"></script>-->
		
		<!------Ganarate QR Code------>
                 <script src="<?=base_url();?>assets/qrcode/js/jquery.classyqr.js"></script>      
		<!-- carousel jquery include -->
		<!--<script src="<?=base_url();?>assets/js/slick.min.js"></script>-->
		<script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>

		 
		<!--<script src="<?=base_url();?>assets/js/gmap3.min.js"></script>-->
		 
		 
		<script src="<?=base_url();?>assets/js/atc.min.js"></script>

		<!--  
		<script src="<?=base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
		<script src="<?=base_url();?>assets/js/isotope.pkgd.min.js"></script>
		<script src="<?=base_url();?>assets/js/jarallax.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>-->

		  
		<script src="<?=base_url();?>assets/js/imagesloaded.pkgd.min.js"></script>

		  
		<script src="<?=base_url();?>assets/js/jquery.countdown.js"></script>
	<!-- custom jquery include -->
		<!--<script src="<?=base_url();?>assets/js/custom.js"></script>-->
                
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">               

<script src="<?php echo base_url(); ?>assets/libs/jquery-ui-timepicker-addon.min.js" ></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/jquery-ui-timepicker-addon.min.css" integrity="sha512-LT9fy1J8pE4Cy6ijbg96UkExgOjCqcxAC7xsnv+mLJxSvftGVmmc236jlPTZXPcBRQcVOWoK1IJhb1dAjtb4lQ==" crossorigin="anonymous" />
<script src="<?php echo base_url(); ?>assets/libs/jquery-ui-timepicker-addon-i18n.min.js"></script>

    <!--script src="<?=base_url();?>assets/js/main.js"></script-->
	        <div class="footer">
            <!-- <p>ALL CONCEPTS AND(OR)VISUALS SHALL NOT BE REPRODUCED IN ANY FORM WITHOUT PRIOR WRITTEN CONSENT FROM XPL1 PLTE LTD.</p>-->
        </div>
                
           
</body>
<script>
    
    $(document).ready(function(){
        
       $(".div-customize").css("height","100% !important");
           $(document).keydown(function(e) {
    if (e.keyCode == 27) return false;
}); 
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
        .hide{
            display: none !important ;
        }
    </style>
</html>

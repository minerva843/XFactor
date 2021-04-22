<?php defined('BASEPATH') OR exit('No direct script access allowed');error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>
		<title><?=$title;?></title>
		<link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.png">

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/bootstrap.min.css">     

		<!-- icon css include -->
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/fontawesome-all.css">
		<!--<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/flaticon.css">-->

<link href="<?php echo base_url(); ?>assets/libs/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>assets/libs/semantic.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/libs/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/libs/semantic.min.js"></script>
		<!-- carousel css include -->
		<!--<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/slick.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/slick-theme.css">-->
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/animate.css" />
		 
		 
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/jquery.mCustomScrollbar.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/calendar.css">
		
		
		
		<!-- custom css include -->
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style2.css">
		
		<!--<script src="<?=base_url();?>assets/js/jarallax.min.js"></script>-->
		    
		
<link rel="stylesheet" type="<?php echo base_url(); ?>assets/print/print.min.css">
<script src="<?php echo base_url(); ?>assets/print/print.min.js"></script> 
  
<script src="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox.min.js"></script> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/jquery.fancybox.css" type="text/css">

        
		<script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url();?>assets/ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="<?=base_url();?>assets/ckeditor/samples/css/samples.css"/>
	<link rel="stylesheet" href="<?=base_url();?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
</head>
<style> 
    .fancybox-close-small{
        display: none;
    }
    
.error {
    border: 1px solid #f00 !important;
}
</style>
<script>

    
    function minmax(value, min, max) 
{
 //   alert();
    if(parseInt(value) < min || isNaN(parseInt(value))) 
        return min; 
    else if(parseInt(value) > max) 
        return max; 
    else return value;
}
    
</script>

<body class="homepage3 default-header-p">
    

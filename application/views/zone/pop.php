 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script src="<?=base_url();?>assets/fancybox/fancybox/jquery.easing-1.3.pack.js"></script>

 <script src="<?=base_url();?>assets/fancybox/fancybox/jquery.fancybox-1.3.4.js"></script> 
<link rel="stylesheet" href="<?=base_url();?>assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" type="text/css">

<a id="various3" href="http://13.235.169.150/XFactor/zone/asssignGrid/NTQ=">This takes content using ajax</a>

<script>

$(document).ready(function() {

	$("#various3").fancybox({
		ajax : {
		    type	: "POST",
		    data	: 'mydata=test'
		}
	});


//	/* This is basic - uses default settings */
//	
//	$("a#single_image").fancybox();
//	
//	/* Using custom settings */
//	
//	$("a#inline").fancybox({
//		'hideOnContentClick': true
//	});
//
//	/* Apply fancybox to multiple items */
//	
//	$("a.group").fancybox({
//		'transitionIn'	:	'elastic',
//		'transitionOut'	:	'elastic',
//		'speedIn'		:	600, 
//		'speedOut'		:	200, 
//		'overlayShow'	:	false
//	});
	
});

</script>
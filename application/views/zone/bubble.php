<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="contips" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url();?>assets/bubble2/src/jquery.contip.js"></script>
  <style type="text/css">
    body{

    }
    .bg{
      position: absolute; left: 50%; top: 150px; margin: auto 0 0 -180px;
      width: 360px; height: 200px; background: #eee;
    }
    .item{
      display: inline-block; margin: 10px 25px;
      width: 50px; height: 50px; background: #666;
      border-radius: 10px; cursor: pointer;
      font-size: 12px; line-height: 50px; text-align: center;
    }
    .item:hover{
      background: #333;
    }
    .one4{
      background: #fff;
      border-radius: 3px;
      width: 46px;
    }
    .one4:hover{
      background: #fff;
    }
  </style>
</head>
<body>

<div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
 
</ul>
<div class="jquery-script-ads"><script type="text/javascript"><!--
 
</script>
 </div>
<div class="jquery-script-clear"></div>
</div>
</div>
<div class="bg">
   
 
  <div class="item one3">Click</div>
 
 
</div>


<script type="text/javascript">

 

  $('.one3').contip({
    trigger: 'click',
    align: 'top',
    bg: '#C6BC22',
    color: '#000',
    rise: 10,
    v_pos: 0.0,
    v_px: 5,
    elm_pos: 0.0,
    elm_px: 10,
    html: 'Click to trigger'
  });

 
 

   
 

 


</script>

 

</body>
</html>

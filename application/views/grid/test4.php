
<!DOCTYPE html>
<html>
<head>
    <style>
/*        #element {background:#666;border:1px #000 solid;cursor:move;height:110px;width:110px;padding:10px 10px 10px 10px;}
#snaptarget { height:610px; width:1000px;}
.draggable { width: 90px; height: 80px; float: left; margin: 0 0 0 0; font-size: .9em; }
.wrapper
{ 
background-image:linear-gradient(0deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent), linear-gradient(90deg, transparent 24%, rgba(255, 255, 255, .05) 25%, rgba(255, 255, 255, .05) 26%, transparent 27%, transparent 74%, rgba(255, 255, 255, .05) 75%, rgba(255, 255, 255, .05) 76%, transparent 77%, transparent);
height:100%;
background-size:45px 45px;
border: 1px solid black;
background-color: #434343;
margin: 20px 0px 0px 20px;
}*/
    </style>
</head>
<body>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Layout</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="../themes/default/css/test4.css" type="text/css" charset="utf-8"/>
    <script src="../themes/default/js/layout.js"></script>
  </head>
<body>

    <div class="row">    
        <div class="col-md-8">
<div id="snaptarget" class="wrapper" style="background-image:url('http://13.235.169.150/XFactor/assets/images/floor-img-removebg-preview.png')" >
<div id="containment-wrapper">
    <div id="draggable3" data-boxid="" style="background:red;border-radius: 50%;" class="draggable ui-widget-content hide" >
         
    </div>
    </div> 
     </div>
    
        </div> 
        
        <div class="col-md-4">
            <button id="btnsave" class="btn btn-success">Save</button>
            <div id="icon1" data-iconid="1" class="btn icon ">ICON1</div> <br/>
            <div id="icon2" data-iconid="2" class="btn icon">ICON2</div> <br/>
            <div  id="icon3" data-iconid="3" class="btn icon">ICON3</div> <br/>
            <div id="icon4" data-iconid="4"  class="btn icon">ICON4</div> <br/>
            <div id="icon5" data-iconid="5" class="btn icon">ICON5</div> <br/>
            <div id="icon6" data-iconid="6" class="btn icon">ICON6</div> <br/>
            <div id="icon7" data-iconid="7" class="btn icon">ICON7</div> <br/>
            <div id="icon8" data-iconid="8" class="btn icon">ICON8</div> <br/>
            <div id="icon9" data-iconid="9" class="btn icon">ICON9</div> <br/>
            <div id="icon10" data-iconid="10" class="btn icon">ICON10</div><br/>
            
            
            
        </div>
        
    </div>  
</body>
</html>
    <script type="text/javascript">
var sPositions = localStorage.positions || "{}",
    positions = JSON.parse(sPositions);
$.each(positions, function (id, pos) {
    $("#" + id).css(pos)
})
$("#draggable3").draggable({
    containment: "#containment-wrapper",
    scroll: false,
    stop: function (event, ui) {
        positions[this.id] = ui.position
        console.log(JSON.stringify(positions));
        localStorage.positions = JSON.stringify(positions)
        let icon_id  = $("#draggable3").attr("data-boxid");
         $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>auth/saveDragIconPosition',
           data:'drag_position='+JSON.stringify(positions)+'&zone_id='+1+'&icon_id='+icon_id,
           success: function(data)
           {
               console.log("Data Save"); // show response from the php script.
           }
         });
    }
});

$(".icon").click(function(){
   
   
   let iconid = $(this).attr("data-iconid");
   alert(iconid);
   $("#draggable3").removeClass("hide").attr("data-boxid",iconid);
    
});

    </script>
</body>
<style>
      .draggable {
      width: 20px;
      height: 00px;
      padding: 0.5em;
      float: left;
      margin: 0 10px 10px 0;
  }
  #draggable, #draggable2 {
      margin-bottom:20px;
  }
  #draggable {
      cursor: n-resize;
  }
  #draggable3 {
      cursor: move;
  }
  #containment-wrapper {
       
      height:500px;
      border:1px solid #000;
      padding: 5px;
  }
  h3 {
      clear: left;
  }
</style>
</html>
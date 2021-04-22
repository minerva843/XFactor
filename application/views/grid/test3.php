<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

 <style>
#grid-snap {
  width: 40%;
  background-color: #29e;
  color: #fff;
  font-size: 1.2em;
  border-radius: 4px;
  padding: 2%;
  margin: 5%;
  touch-action: none;
}
 </style>
 
<div class="row">
	<div class="col-md-6" id="zonemap" style="height:500px;">
          
	</div>

	<div class="col-md-3" style="height:500px;background-color:gray;">
            <div class="btn" id="btn1">ICON1</div> <br/>
            <div class="btn" id="btn2">ICON2</div> <br/>
            <div class="btn" id="btn3">ICON3</div> <br/>
            <div class="btn" id="btn4">ICON4</div> <br/>
            <div class="btn" id="btn5">ICON5</div> <br/>
            <div class="btn" id="btn6">ICON6</div> <br/>
            <div class="btn" id="btn7">ICON7</div> <br/>
            <div class="btn" id="btn8">ICON8</div> <br/>
            <div class="btn" id="btn9">ICON9</div> <br/>
            <div class="btn" id="btn10">ICON10</div>

	</div>

</div>

<script>
 
 var element = document.getElementById('grid-snap')
var x = 0; var y = 0

interact(element)
  .draggable({
    modifiers: [
      interact.modifiers.snap({
        targets: [
          interact.createSnapGrid({ x: 30, y: 30 })
        ],
        range: Infinity,
        relativePoints: [ { x: 0, y: 0 } ]
      }),
      interact.modifiers.restrict({
        restriction: element.parentNode,
        elementRect: { top: 0, left: 0, bottom: 1, right: 1 },
        endOnly: true
      })
    ],
    inertia: true
  })
  .on('dragmove', function (event) {
    x += event.dx
    y += event.dy

    event.target.style.webkitTransform =
    event.target.style.transform =
        'translate(' + x + 'px, ' + y + 'px)'
  })

</script>
<script>
    
    $(document).ready(function(){
       
       $(".btn").click(function(){
          
         $("#zonemap").html('<div id="grid-snap">Dragging is constrained to the corners of a grid</div>');
         
           
       });
        
    });
    
</script>

				
                </div>
				
            </div>
            
        </div>

    </div>

  
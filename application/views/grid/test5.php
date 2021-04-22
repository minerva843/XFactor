<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Examples of Bubble widget</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bubble/css/bubble.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bubble/browser.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bubble/bubble.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bubble/demo.js"></script>
</head>

<body>

 

<!-- This example shows a bubble that is specifically positioned and overrides the default
     policy on positioning.  Since the bubble container is a child of the target, it can be
     positioned relative to the target.
-->
<div id="target1" data-bubbleid="target1Bubble"
  style="position:absolute; margin-top:10px; left:500px; width:50px; height:50px; background-color:red; cursor:pointer">

  <!-- top-level bubble container used to position bubble -->
  <div id="target1Bubble" class="BubbleDiv" style="display:none; top:55px; left:-5px;">
    <div class="BubbleShadow">
      <div class="Bubble">
        <div class="BubbleHeader">
          <div class="BubbleTitle">Specific Positioning</div>
          <div class="BubbleCloseBtn"></div>
          <div class="BubbleEditBtn"></div>
        </div>
        <div class="BubbleContent">
            This bubble is specifically positioned via "style="top:55px; left:-5px; position:relative;"
            to override the default positioning.  When positioned in this manner, there will be no callout
            arrows and no provisioning is made to ensure the bubble appears within the page boundaries.
        </div>
        <div class="bottomLeftArrow"></div>
        <div class="bottomRightArrow"></div>
        <div class="topLeftArrow"></div>
        <div class="topRightArrow"></div>
      </div>
    </div>
  </div>

</div>

<!-- This example shows the default bubble positioning above and to the right of the target.
     No position information is specified in the bubble style attribute and the bubble is not
     a child of the target.
-->
<div id="target2" data-bubbleid="target2Bubble"
    style="position:absolute; top:120px; left:5px; width:50px; height:50px; background-color:blue; cursor:pointer">
</div>

<div id="target2Bubble" class="BubbleDiv" style="display:none">
  <div class="BubbleShadow">
    <div class="Bubble">
      <div class="BubbleHeader">
        <div class="BubbleTitle">Bubble repositions to opposite side on browser boundaries</div>
        <div class="BubbleCloseBtn"></div>
        <div class="BubbleEditBtn"></div>
      </div>
      <div class="BubbleContent">
        This bubble shows the default positioning of the bubble.<br/><br/>
        The bubble will by default be positioned to the right and above the target.<br/>
        If the bubble position will cause it to cross the right page boundary, then it is
        repositioned to the left of the target.<br/>
        If the bubble position will cause it to cross the top page boundary, then it is
        repositioned below the target.
      </div>
      <div class="bottomLeftArrow"></div>
      <div class="bottomRightArrow"></div>
      <div class="topLeftArrow"></div>
      <div class="topRightArrow"></div>
    </div>
  </div>
</div>


<!-- This example shows a bubble with default positioning relative to a target that itself
     is positioned relative to it's parent container.
     No position information is specified in the bubble style attribute and the bubble is not
     a child of the target.
-->
<div id="foo" style="position:absolute; top:200px; left:5px; width:100px; height:100px; border: 1px solid black">
  Parent container for the black square.
  <div id="target3" data-bubbleid="target3Bubble"
    style="position:relative; top:10px; left:10px; width:50px; height:50px; background-color:black; cursor:pointer">
  </div>
</div>

<div id="target3Bubble" class="BubbleDiv" style="display:none">
  <div class="BubbleShadow">
    <div class="Bubble">
      <div class="BubbleHeader">
        <div class="BubbleTitle">Relatively-positioned Target</div>
        <div class="BubbleCloseBtn"></div>
        <div class="BubbleEditBtn"></div>
      </div>
      <div class="BubbleContent">
        This bubble tests correct placement of a bubble for a target that itself is positioned
        relative to it's parent container.  The parent container is the black hollow square.
      </div>
      <div class="bottomLeftArrow"></div>
      <div class="bottomRightArrow"></div>
      <div class="topLeftArrow"></div>
      <div class="topRightArrow"></div>
    </div>
  </div>
</div>


<!-- This example shows an element with no pre-configured bubble, but one will be created for it
     dynamically with title and content specified from javascript.
-->
<div id="dynamic" style="position:absolute; top:150px; left:300px; width:50px; height:50px; background-color:yellow; cursor:pointer"></div>

<!-- This example shows an element with no pre-configured bubble, but one will be created for it
     dynamically with title and content obtained via ajax.
-->
<div id="dynamic2" style="position:absolute; top:250px; left:300px; width:50px; height:50px; background-color:green; cursor:pointer"></div>



</body>
</html>

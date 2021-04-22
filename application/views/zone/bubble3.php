<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Tooltip functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $("#tooltip-8").tooltip({
               //use 'of' to link the tooltip to your specified input
               position: { of: '#myInput', my: 'left center', at: 'left center' },
            }),
            $('#myBtn').click(function () {
               $('#tooltip-8').tooltip("open");
            });
         });
      </script>
   </head>
   
   <body style = "padding:100px;">
      <!-- HTML --> 
      <a id = "tooltip-8" title = "Message" href = "#"></a>
      <input id = "myInput" type = "text" name = "myInput" value = "0" size = "7" />
      <input id = "myBtn" type = "submit" name = "myBtn" value = "myBtn" class = "myBtn" />
   </body>
</html>
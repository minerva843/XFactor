$(document).ready(function() {

    $("#target1, #target2, #target3")
        .draggable()
        .bubble({editable:true});

    $("#dynamic")
        .draggable()
        .bubble({
             title: "Dynamic Content",
             content: "Bubble markup not preset in HTML.  Instead title and content are passed as options when the bubble widget is invoked."
         });

    $("#dynamic2")
        .draggable()
        .bubble({
             ajax: "http://13.235.169.150/XFactor/assets/bubble/example.json"
         });

});

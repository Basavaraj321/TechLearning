$(document).ready(function(){
$(function(){
    $("#playlist li").on("click",function(){
        $("#videoarea").attr({
            src:$(this).attr("movieurl"),
        });
        var x = $(this).attr("desc");
        document.getElementById("desc").innerHTML = x;
        
    });
    $("#videoarea").attr({
        src:$("#playlist li").eq(0).attr("movieurl"),
    });
    var x = document.getElementsByTagName("li")[0].getAttribute("desc"); 
    document.getElementById("desc").innerHTML = x;
   

});
});



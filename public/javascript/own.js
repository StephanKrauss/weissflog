$(document).ready(function(){

    var viewportWidth = $("body").innerWidth();
    var windowHeight = $(window).height();

    // if(windowHeight > 700){
    //     $("#content").height(400);
    // }

    if(viewportWidth < 400){
        $("#hauptnavigation").hide();
        $("#banner").hide();
    }

    $(".icon").mouseover(function(){
        $(this).css("background-color", "gray");
    });

    $(".icon").mouseout(function(){
        $(this).css("background-color", "white");
    });

    $(".list-group-item").mouseover(function(){

        $(this).css("background-color", "chocolate");
    });

    $(".list-group-item").mouseout(function(){
        $(this).css("background-color", "white");
    });
});
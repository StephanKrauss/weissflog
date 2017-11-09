$(document).ready(function(){
    $(".icon").mouseover(function(){
        $(this).css("background-color", "#f0f0f5");
    });

    $(".icon").mouseout(function(){
        $(this).css("background-color", "white");
    });

    $(".list-group-item").mouseover(function(){
        $(this).css("background-color", "chocolate");
        $(this).css("color", "white");
    });

    $(".list-group-item").mouseout(function(){
        $(this).css("background-color", "white");
        $(this).css("color", "#007BFF");
    });
});
"use strict";
 
$(document).ready(function() {
    
    $(".card").mouseenter(function(event) {
        var card = $(this);
        card.find(".menu_button").css("display", "block");
    });
    
    $(".card").mouseleave(function(event) {
        var card = $(this);
        card.find(".menu_button").css("display", "none");
    });
    
});

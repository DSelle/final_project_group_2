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
    
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    });
    
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });
});

/**
 * Handles javascript for the website
 *
 * PHP Version 7
 *
 * @author Nicholas Perez <nperez9@mail.greenriver.edu> Derrick Selle <dselle4@mail.greenriver.edu>
 * @version 1.0
 */

"use strict";

/**
 * Waits for page to load, then populates the page with javascript
 */
$(document).ready(function() {
    //when the mouse enters a menu card, display quantity field
    $(".card").mouseenter(function(event) {
        var card = $(this);
        card.find(".menu_button").css("display", "block");
    });

    //when the mouse leaves a menu card, hide quantity field
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

    //create an event handler for submission
    $('input[type="submit"]').on("click", validate);
});

/**
 * Validates the quantity entered for the menu item
 * If valid, submit data
 * @param  {event} event The event to be validated
 */
function validate(event)
{
    //prevent the form from submitting
    event.preventDefault();

    var isError = false;

    //quantity must be numeric and between 1-15
    var qty = parseInt($('#quantity').val());
    if (!Number.isInteger(qty)) {
        alert("Quantity must be numeric");
        isError = true;
    } else if (qty < 1 || qty > 15) {
        alert("Quantity must be between 1-15");
        isError = true;
    }

    //submit the form now that all data is good
    if (!isError) {
        $("#qty-submit").submit();
    }
}

// Nav child menu show hide
$(function() {
	// console.log( "ready!" );
/*
    // only init easytabs if small screens true
    enquire.register("screen and (min-width: 767px)", {
        match : function() {
            $('#main-container').easytabs({
                tabs: ".resp-tabs-list li"
        //    panelContext: $('div.resp-tabs-container')
            });
        },  
        unmatch : function() {
            // Hide the sidebar
        }
    }); 
*/
/*
    function addGalleryTabLink(){
        var h = $('body').height();
        // set .fullscreen height
        $(".content-b").each(function(i){
            if($(this).innerHeight() <= h){
                $(this).closest(".fullscreen").addClass("not-overflow");
            }
        });
    }
    $(window).resize(addGalleryTabLink);
    addGalleryTabLink();
*/
// Init datepickers e.g. in quotation form
    var currentDate = new Date();
    if ($('.date-picker').length > 0) {
        $('.date-picker').datepicker({
            dateFormat: 'dd/mm/yy'
        });
    }
   // $('.date-picker').datepicker("setDate", currentDate);
});


/*********************************
MENUS
*********************************/
// Toggle product nav menu - on click
$(function() {
    // Site nav
    var pull_site_nav        = $('#site-nav-toggle');
        menu_site_nav        = $('#site-nav > ul');
        siteMenuHeight  = menu_site_nav.height();
 
    $(pull_site_nav).on('click', function(e) {
        e.preventDefault();
        menu_site_nav.slideToggle();
    });
    
    // Product nav
    var pull_prod_nav        = $('#nav-toggle');
        menu_prod_nav        = $('#product-nav > ul');
        prodMenuHeight  = menu_prod_nav.height();
 
    $(pull_prod_nav).on('click', function(e) {
        e.preventDefault();
        menu_prod_nav.slideToggle();
    });
});

// check the sizes below !!!
$(window).resize(function(){
    var w = $(window).width();
    // Site nav
    if(w > 320 && menu_site_nav.is(':hidden')) {
        menu_site_nav.removeAttr('style');
    }
    // Product nav
    if(w > 320 && menu_prod_nav.is(':hidden')) {
        menu_prod_nav.removeAttr('style');
    }
}); 

/********************************
FORMS / QUOTES
********************************/
// Show / Hide text box if e.g. 'Other' checkbox is checked - Quick quote form
$(function() {
	// console.log( "ready!" );
	$('input#interest_Other').change(function(){
		if ($(this).is(':checked')) {
			$('p.other').slideDown();
		} 
		else {
			$('p.other').slideUp();
		}
	}).change();

    $('select#heard_about_us').change(function(){
        /* setting currently changed option value to option variable */
        var option = $(this).find('option:selected').val();
        if (option == "Magazine") {
            $('#heard_about_us_magazine_holder').slideDown();
        } 
        else {
            $('#heard_about_us_magazine_holder').slideUp();
        }
        if (option == "Exhibition") {
            $('#heard_about_us_exhibition_holder').slideDown();
        } 
        else {
            $('#heard_about_us_exhibition_holder').slideUp();
        }
    }).change();

    $('select#heard_about_us_magazine').change(function(){
        /* setting currently changed option value to option variable */
        var option = $(this).find('option:selected').val();
        if (option == "Other") {
            $('#heard_about_us_magazine_holder p.other').slideDown();
        } 
        else {
            $('#heard_about_us_magazine_holder p.other').slideUp();
        }
    }).change();

    $('select#heard_about_us_exhibition').change(function(){
        /* setting currently changed option value to option variable */
        var option = $(this).find('option:selected').val();
        if (option == "Other") {
            $('#heard_about_us_exhibition_holder p.other').slideDown();
        } 
        else {
            $('#heard_about_us_exhibition_holder p.other').slideUp();
        }
    }).change();
});

$(function() {
    // console.log( "ready!" );
    $('#interest_bi_fold_doors').change(function(){
        if ($(this).is(':checked')) {
            $('#folding_doors_quote_details').show();
            console.log( "bi fold IS checked" );
            console.log( $('#folding_doors_quote_details').css('display') );
        } 
        else {
            $('#folding_doors_quote_details').hide();
            console.log( "bi fold NOT checked" );
            console.log( $('#folding_doors_quote_details').css('display') );
        }
    }).change();
    $('#interest_sliding_doors').change(function(){
        if ($(this).is(':checked')) {
            $('#sliding_doors_quote_details').show();
        } 
        else {
            $('#sliding_doors_quote_details').hide();
        }
    }).change();
    $('#interest_sliding_turn_systems').change(function(){
        if ($(this).is(':checked')) {
            $('#slide_turn_systems_quote_details').show();
        } 
        else {
            $('#slide_turn_systems_quote_details').hide();
        }
    }).change();
    $('#interest_moveable_walls').change(function(){
        if ($(this).is(':checked')) {
            $('#moveable_walls_quote_details').show();
        } 
        else {
            $('#moveable_walls_quote_details').hide();
        }
    }).change();
    $('#interest_windows').change(function(){
        if ($(this).is(':checked')) {
            $('#windows_quote_details').show();
        } 
        else {
            $('#windows_quote_details').hide();
        }
    }).change();
    $('#interest_roofs').change(function(){
        if ($(this).is(':checked')) {
            $('#roofs_quote_details').show();
        } 
        else {
            $('#roofs_quote_details').hide();
        }
    }).change();
    $('#interest_balustrades').change(function(){
        if ($(this).is(':checked')) {
            $('#glass_balustrades_quote_details').show();
        } 
        else {
            $('#glass_balustrades_quote_details').hide();
        }
    }).change();
});

//ROOOOOOOOOOOOOTATE
(function ($) {
  $.fn.rotateTableCellContent = function (options) {
  /*
  Version 1.0
  7/2011
  Written by David Votrubec (davidjs.com) and
  Michal Tehnik (@Mictech) for ST-Software.com
  */

        var cssClass = ((options) ? options.className : false) || "vertical";

        var cellsToRotate = $('.' + cssClass, this);

        var betterCells = [];
        cellsToRotate.each(function () {
            var cell = $(this)
          , newText = cell.text()
          , height = '100%'
          , width = cell.width()
          , newDiv = $('<div>', { height: width, width: height })
          , newInnerDiv = $('<div>', { text: newText, 'class': 'rotated' });
console.log(height);
            newDiv.append(newInnerDiv);

            betterCells.push(newDiv);
        });

        cellsToRotate.each(function (i) {
            $(this).html(betterCells[i]);
        });
    };
})(jQuery);
$(function() {
  //  $('.headings').rotateTableCellContent({className: 'vert'});
});
/**********************
Back to top floating link
**********************/
$(function() {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 600,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 800,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 500,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) { 
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
});
/****************

DON'T FORGET THERE'S WIDTH related scripts in the folowing location too:

/blocks/product_tabs_content/view.php

enquire.register("screen and (min-width: 767px)


****************/
// Gallery slider
/*
$(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		prevText: "",           //String: Set the text for the "previous" directionNav item
		nextText: "",               //String: Set the text for the "next" directionNav item
		controlNav: false,
        start: function(slider){
          $('body').removeClass('loading');
        }
	});
});
*/


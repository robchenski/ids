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

// Back to top floating link
$(function() {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 800,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 600,
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


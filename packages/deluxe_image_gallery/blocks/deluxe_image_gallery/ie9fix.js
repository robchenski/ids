// See http://forum.jquery.com/topic/jquery-ui-does-not-work-on-ie9
// This hotfix makes older versions of jQuery UI drag-and-drop work in IE9
(function($){var a=$.ui.mouse.prototype._mouseMove;$.ui.mouse.prototype._mouseMove=function(b){if($.browser.msie&&document.documentMode>=9){b.button=1};a.apply(this,[b]);}}(jQuery));

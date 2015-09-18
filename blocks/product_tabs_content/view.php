<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<div id="product-tabs-nav" class="product-tabs-nav row">
<div class="resp-tabs-container hor_1">

<?php  if (!empty($field_2_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-special-features">
	<?php  echo $field_2_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_3_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-technical">
	<?php  echo $field_3_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_4_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-configuration">
	<?php  echo $field_4_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_5_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-finishes">
	<?php  echo $field_5_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_6_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-glass">
	<?php  echo $field_6_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_7_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-downloads">
	<?php  echo $field_7_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_8_wysiwyg_content)): ?>
	<div class="product-tabs-content" id="tabs-1-handles">
	<?php  echo $field_8_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

</div>
</div>
<script>
// if we are using the custom product technical tab item block
// remove from it's temp location and insert in the tab content block in the right place
	$(function() {
		if ($( "#tech-tabs-to-move" ).length > 0) {
			$( "#tabs-1-technical" ).append( $( "#tech-tabs-to-move" ) );
			//$( "#tabs-1-technical" ).prepend( "<h3>Technical</h3>" );
			//$( "#tabs-to-move" ).remove();
		}	
		if ($( "#glass-tabs-to-move" ).length > 0) {
			//$( "#tabs-1-glass" ).insertAfter( $( "#tabs-1-special-features" ) );
			$( "#tabs-1-glass" ).append( $( "#glass-tabs-to-move" ) );
			//$( "#glass-tabs-to-move" ).remove();
		}	
		if ($( ".popup" ).length > 0) {
			$('.popup').magnificPopup({
				//delegate: 'a', // child items selector, by clicking on it popup will open
				type: 'image',
				/*
				gallery:
				{
					enabled: true
				}*/
				// other options
			});
		}
		if ($('.addedGalleryTab').length > 0) {
			// get all the gallery elements in the myitems array so you can add them to the init
			var myitems = [];
			$('.items a').each(function(){
				myitems.push({
					src:$(this).attr('href'),
			        type:'image'
				});
			});
			$('.addedGalleryTab a').magnificPopup({
				items: myitems,
				gallery:
				{
					enabled: true
				}
				// other options
			});
		}
	});
</script>
<script>
	// Product detail tabs

	$(function() {
		// only init easytabs if small screens true
		enquire.register("screen and (min-width: 767px)", {
		    match : function() {
		    	// Clean up before tabs are init or you get warnings about removing tabs
		    	// We don't need the tab yet as we are wide but we want it in the DOM
			    $( ".addedGalleryTab" ).remove();
			    //console.log( "yo!" );

			    $('#main-container').easytabs({
			    	tabs: ".resp-tabs-list li"
			//    panelContext: $('div.resp-tabs-container')
			    });

		    },  
		    unmatch : function() {
		        // 
				if ($( ".owl-carousel" ).length > 0) {
					$('.resp-tabs-list').append('<li class="addedGalleryTab"><a href="#tabs-1-gallery">Gallery</a></li>');
					//var heading = $( "em" ).attr( "title" )
					//$( "h2:contains('Gallery')" ).attr("id", "#tabs-1-gallery");
				}


			    $('#main-container').easytabs({
			    	tabs: ""
			//    panelContext: $('div.resp-tabs-container')
			    });

			    console.log( "yo!" );
		    }
		});


	});
</script>


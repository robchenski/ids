<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_image)): ?>
	<p id="virtual-tour-modal">
	<?php  if (!empty($field_1_image_externalLinkURL)) { ?><a href="<?php  echo $this->controller->valid_url($field_1_image_externalLinkURL); ?>" target="_blank"><?php  } ?><img src="<?php  echo $field_1_image->src; ?>" width="<?php  echo $field_1_image->width; ?>" height="<?php  echo $field_1_image->height; ?>" alt="<?php  echo $field_1_image_altText; ?>" /><?php  if (!empty($field_1_image_externalLinkURL)) { ?></a><?php  } ?>
	</p>
<script type="text/javascript">	
$(function() {

/*
	  // The slider being synced must be initialized first
	  $('#gallery<?php echo $bID ?> #carousel').flexslider({
	    animation: "slide",
	    controlNav: false,
	    animationLoop: false,
	    slideshow: false,
	    //itemWidth: 210,
	    itemMargin: 0,
	    minItems: 0,
	    asNavFor: '#gallery<?php echo $bID ?> #slider'
	  });

	$('#gallery<?php echo $bID ?> #slider').flexslider({
		animation: "slide",
		prevText: "",           //String: Set the text for the "previous" directionNav item
		nextText: "",               //String: Set the text for the "next" directionNav item
		controlNav: false,
		smoothHeight: true,
	    animationLoop: true,
	    sync: "#gallery<?php echo $bID ?> #carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
	});
*/
	// popup / modal / lightbox effect
	$('#virtual-tour-modal').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'iframe'
		// other options
	});
/**/
});
</script>
<?php  endif; ?>



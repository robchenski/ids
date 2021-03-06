<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<?php
/* You can loop through all of the images in the chosen file set with some code like this:
 *
 *   <?php foreach ($images as $img): ?>
 *       ...
 *   <?php endforeach; ?>
 *
 * Inside the loop, the following data is available about each image:
 *   $img->title : Image's "Title" attribute (set via File Manager properties). Note that C5 sets titles to the file name upon initial upload, so you might not want to display this if you don't expect users to edit them)
 *   $img->description : Image's "Description" attribute (set via File Manager properties) -- use this for captions
 *   $img->orig->src : Original (full-size) image src
 *   $img->orig->width : Original (full-size) image width (in pixels)
 *   $img->orig->height : Original (full-size) image height (in pixels)
 *   $img->large->src : Large image src
 *   $img->large->width : Large image width (in pixels)
 *   $img->large->height : Large image height (in pixels)
 *   $img->thumb->src : Thumbnail image src
 *   $img->thumb->width : Thumbnail image width (in pixels)
 *   $img->thumb->height : Thumbnail image height (in pixels)
 *   $img->titleRaw : Unescaped title (html entities are not encoded -- use with caution!)
 *   $img->descriptionRaw : Unescaped title (html entities are not encoded -- use with caution!)
 *   $img->fID : Image's File ID (assigned by Concrete5 when first uploaded)
 *   $img->linkUrl : URL of a page that the image should link to when clicked (NOTE THAT THIS DOES NOT WORK OUT OF THE BOX -- SEE DOCUMENTATION FOR HOW TO SET THIS UP ON YOUR SITE)
 *
 * If you need to set a container width/height or pass in an overall width/height to your plugin, you can use these:
 *   <?php echo $maxOrigWidth ?>
 *   <?php echo $maxOrigHeight ?>
 *   <?php echo $maxLargeWidth ?>
 *   <?php echo $maxLargeHeight ?>
 *   <?php echo $maxThumbWidth ?>
 *   <?php echo $maxThumbHeight ?>
 *
 * As with all C5 block templates, the $bID (Block ID) variable is available. If you're using a jquery plugin,
 * you will want to output this variable as part of an id so that this block's images can be uniquely identified
 * (otherwise there will be problems if the user adds more than one of this block to the same page).
 */
?>
<div id="gallery<?php echo $bID ?>" class="gallery row product-page-gallery">
	<div id="slider" class="owl-carousel">

		<?php foreach ($images as $img): ?>
			<div class="items" style="width: <?php echo $img->large->width ?>px;">
				<a href="<?php echo $img->orig->src ?>">
				<img class="owl-lazy" data-src="<?php echo $img->large->src ?>" width="<?php echo $img->large->width ?>" height="<?php echo $img->large->height ?>" alt="<?php echo $img->title ?>" />
				</a>
			</div>
		<?php endforeach; ?>

	</div>
	<!--div id="carousel" class="flexslider">
		<ul class="slides">
		<?php foreach ($images as $img): ?>
			<li>
				<img src="<?php echo $img->large->src ?>" width="<?php echo $img->large->width ?>" height="<?php echo $img->large->height ?>" alt="" />
			</li>
		<?php endforeach; ?>
		</ul>
	</div-->
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/libs/owl.carousel.min.js"></script>
<!--script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/libs/owl.autoplay.js"></script>
<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/libs/owl.animate.js"></script-->
<script type="text/javascript">

var jq = jQuery.noConflict(true);
</script>
<script type="text/javascript">
(function($) { 
  $(function() {

    // more code using $ as alias to jQuery
	$('#gallery<?php echo $bID ?> .owl-carousel').owlCarousel({
	    margin:10,
	    loop:true,
	    autoWidth:true,
	    items:4,
	    lazyLoad : true,
        navText: [
            "",
            ''
        ],
        navClass: [
            'prev',
            'next'
        ]
    //autoplay:true,
    //autoplayTimeout:2000,
    //autoplayHoverPause:true,
<?php  if ($nav_show_value == 0): ?>
	<?php /* <!-- ENTER MARKUP HERE FOR FIELD "item 1" : CHOICE "On" --> */ ?>
		,
	    dots:false,
	    nav: true
<?php  endif; ?>

<?php  if ($nav_show_value == 1): ?>
	<?php /* <!-- ENTER MARKUP HERE FOR FIELD "item 1" : CHOICE "On" --> */ ?>
		,
	    dots:false,
	    nav: true
<?php  endif; ?>

<?php  if ($nav_show_value == 2): ?>
	<?php /* <!-- ENTER MARKUP HERE FOR FIELD "item 1" : CHOICE "Off" --> */ ?>
<?php  endif; ?>
	})
  });
})(jq );

$(document).ready(function() {
	//JQUERY PLUGIN EXAMPLE:
	//$('#gallery<?php echo $bID ?>').someKindOfGallery();
});
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
	$('.items').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery:
		{
			enabled: true
		}
		// other options
	});
/**/
});
</script>

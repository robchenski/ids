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
<style>
#header-candy-slider<?php echo $bID; ?> {
    display: inline-block;
    height: 100%;
    position: relative;
    width: 100%;
/*    z-index: -1; */
}
.flex-viewport {
	z-index: -1;
}
.flexslider {
	background: none;
	border: 0;
	border-radius: 0;
	margin: 0;
}
.slides {
	display: none;
}
.slides a {
	/*position: absolute;*/
}
.flex-control-thumbs {
	position: absolute;
}
.flex-control-thumbs li {
	float: none;
	margin: 0 6px;
}
.flex-control-nav {
	/*bottom: 70px;*/
}
</style>
<script type="text/javascript">
$(window).load(function() {
	//JQUERY PLUGIN EXAMPLE:
	//$('#gallery<?php echo $bID ?>').someKindOfGallery();
	$('#header-candy-slider<?php echo $bID; ?>').flexslider({
		selector: ".slides > .coverimage",
		animation: "slide",
		customDirectionNav: $(".custom-navigation a")

	});


	


/*
$('.flex-prev, .flex-next').on('click', function(){
	    var href = $(this).text();
	    $(this).attr("href", "http://www.google.co.uk");
	    return false;
	})

	    directionNav: true,
	    controlNav: true,
*/ 

	$('.slides').fadeIn('slow');

});
</script>

<div id="header-candy-slider<?php echo $bID; ?>" class="flexslider container">
	<div class="slides">
		<?php foreach ($images as $img): ?>
			
				<div class="coverimage FlexEmbed FlexEmbed--3by1" style="background-image:url('<?php echo $img->large->src ?>');">
	<a href="<?php echo $img->linkUrl ?>"></a>
				</div>
				
		<?php endforeach; ?>
	</div>	
<div class="custom-navigation">
  <a href="#" class="flex-prev">Prev</a>
  <div class="custom-controls-container"></div>
  <a href="#" class="flex-next">Next</a>
</div>
</div>

<?php /*<ul class="flex-direction-nav">
	<li class="flex-nav-prev">
		<a class="flex-prev" href="#">Previous</a>
	</li>
	<li class="flex-nav-next">
		<a class="flex-next" href="#">Next</a>
	</li>
</ul>*/ ?>
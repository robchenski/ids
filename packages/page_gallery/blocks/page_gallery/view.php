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
<div id="gallery-button">

	<?php  if (!empty($field_1_image)): ?>
		<h2><?php  echo $field_1_image_altText; ?></h2>
		<p><a href="#" id="gallery-btn-<?php echo $bID ?>"><img src="<?php  echo $field_1_image->src; ?>" width="<?php  echo $field_1_image->width; ?>" height="<?php  echo $field_1_image->height; ?>" alt="" /></a></p>
	<?php  endif; ?>

	<ul id="gallery<?php echo $bID ?>" style="display: none;">
	<?php foreach ($images as $img): ?>
		<li class="gallery-items">
			<img src="<?php echo $img->large->src ?>" width="<?php echo $img->large->width ?>" height="<?php echo $img->large->height ?>" alt="" />
		</li>
	<?php endforeach; ?>
	</ul>
</div>


<script>
// if we are using the custom product technical tab item block
// remove from it's temp location and insert in the tab content block in the right place
	$(function() {
		if ($('#gallery<?php echo $bID ?>').length > 0) {
			// get all the gallery elements in the myitems array so you can add them to the init
			var myitems = [];
			$('#gallery<?php echo $bID ?> .gallery-items img').each(function(){
				myitems.push({
					src:$(this).attr('src'),
			        type:'image'
				});
			});
			$('#gallery-btn-<?php echo $bID ?>').magnificPopup({
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
<script type="text/javascript">
$(document).ready(function() {
	//JQUERY PLUGIN EXAMPLE:
	//$('#gallery<?php echo $bID ?>').someKindOfGallery();
});
</script>

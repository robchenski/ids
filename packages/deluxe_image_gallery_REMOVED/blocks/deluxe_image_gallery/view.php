<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$html = Loader::helper('html');
$column_width = (100 / $displayColumns) . "%";
$rel = "fancybox{$controller->bID}"; //Avoid conflict with other js lightboxes, and isolate each block's prev/next nav to one gallery only.
$c = Page::getCurrentPage();
?>

<div class="deluxe_image_gallery_container">
<?php  foreach ($images as $img): ?>

	<div class="deluxe_image_gallery_image" style="width: <?php  echo $column_width; ?>;">

		<div style="height: <?php  echo $max_img_height; ?>px;">
		
			<?php  if ($enableLightbox): ?>
			<a href="<?php  echo $img['full_src']; ?>" rel="<?php  echo $rel; ?>">
			<?php  endif; ?>
			
			<img src="<?php  echo $img['thumb_src']; ?>" width="<?php  echo $img['thumb_width']; ?>" height="<?php  echo $img['thumb_height']; ?>" alt="<?php  echo $img['title']; ?>" />
		
			<?php  if ($enableLightbox): ?>
			</a>
			<div class="deluxe_image_gallery_caption" style="display: none;">
				<?php  echo $img['caption']; ?>
			</div>
			<?php  endif; ?>

		</div>

		<?php  if ($displayThumbTitles): ?>
		<p><?php  echo empty($img['title']) ? '&nbsp;' : $img['title']; ?></p>
		<?php  endif; ?>
	
	</div>

<?php  endforeach; ?>
</div>

<div style="clear: both;"></div>

<?php  if (!$c->isEditMode() && $enableLightbox && count($images) > 0): /* fancybox init chokes if no applicable dom elements */ ?>
<script type="text/javascript">
$(document).ready(function(){
	$('a[rel="<?php  echo $rel; ?>"]').fancybox({
		'transitionIn' : '<?php  echo $lightboxTransitionEffect; ?>',
		'transitionOut' : '<?php  echo $lightboxTransitionEffect; ?>',
		'titleShow' : <?php  echo $lightboxTitlePosition == 'none' ? 'false' : 'true'; ?>,
		'titlePosition' : '<?php  echo $lightboxTitlePosition; ?>',
		'onStart': function(currentArray,currentIndex,currentOpts) {
			var obj = currentArray[ currentIndex ];
			if ($(obj).next().length) {
				this.title = $(obj).next().html();
			}
		}
	});
});
</script>

<?php  endif; ?>

<?php 
// Manually inject view.css upon initial block add.
// This is a workaround to force images to line up
// (initial block add happens via ajax,
// so it's too late for any addHeaderItem()'s).
if (!empty($inline_view_css_url) && $c->isEditMode()):
	$placeholder_id = "gallery_style_placeholder_{$controller->bID}";
	?>
	
	<div style="display: none;" id="<?php  echo $placeholder_id; ?>"></div>
	
	<script type="text/javascript">
	var gallery_has_style = false;
	$('.deluxe_image_gallery_container').each(function(index, element) {

		//Check for indication that view.css was loaded (check ALL instances on the page -- there may be another block on the page that was already loaded with the view.css)
		if ($(this).css('float') == 'left') {
			gallery_has_style = true;
		}
		
		//Load view.css if it doesn't appear to exist
		if (!gallery_has_style) {
			$.ajax({
				url: '<?php  echo $inline_view_css_url; ?>',
				success: function(css) {
					css = '<style>' + css + '</style>';
					$('#<?php  echo $placeholder_id; ?>').html(css);
				}
			});
		}

	});
	</script>

<?php  endif; ?>

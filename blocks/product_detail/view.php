<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>
<div class="product-detail">
	<div class="inner">

	<?php  if (!empty($field_2_image)): ?>
		<div class="thumbnail">
		<img src="<?php  echo $field_2_image->src; ?>" width="<?php  echo $field_2_image->width; ?>" height="<?php  echo $field_2_image->height; ?>" alt="<?php  echo $field_2_image_altText; ?>" />
		</div>
	<?php  endif; ?>

	<?php  if (!empty($field_3_wysiwyg_content)): ?>
		<div class="details">
		<?php  echo $field_3_wysiwyg_content; ?>
		</div>
	<?php  endif; ?>

	</div>
</div>



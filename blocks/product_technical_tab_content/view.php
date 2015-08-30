<?php  defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$ih = Loader::helper('image');
?>

<div class="inner">

<?php  if (!empty($field_2_image)): ?>


	<?php
	$image = File::getByID($field_2_image_fID);	
	$thumb = $ih->getThumbnail($image, 120, 80, true);
	?>

	<div class="thumbnail">
		<a href="<?php  echo $field_2_image->src; ?>" class="popup">
			<img src="<?php  echo $thumb->src; ?>" width="<?php  echo $thumb->width; ?>" height="<?php  echo $thumb->height; ?>" alt="<?php  echo $field_2_image_altText; ?>" />
		</a>
	</div>
<?php  endif; ?>

<?php  if (!empty($field_3_wysiwyg_content)): ?>
	<div class="details">
	<?php  echo $field_3_wysiwyg_content; ?>
	</div>
<?php  endif; ?>

</div>



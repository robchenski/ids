<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<ul class="link-images">

<?php  if (!empty($field_2_image)): ?>
	<li>
	<img src="<?php  echo $field_2_image->src; ?>" width="<?php  echo $field_2_image->width; ?>" height="<?php  echo $field_2_image->height; ?>" alt="<?php  echo $field_2_image_altText; ?>" />
	</li>
<?php  endif; ?>

<?php  if (!empty($field_3_image)): ?>
	<li>
	<img src="<?php  echo $field_3_image->src; ?>" width="<?php  echo $field_3_image->width; ?>" height="<?php  echo $field_3_image->height; ?>" alt="<?php  echo $field_3_image_altText; ?>" />
	</li>
<?php  endif; ?>

<?php  if (!empty($field_4_image)): ?>
	<li>
	<img src="<?php  echo $field_4_image->src; ?>" width="<?php  echo $field_4_image->width; ?>" height="<?php  echo $field_4_image->height; ?>" alt="<?php  echo $field_4_image_altText; ?>" />
	</li>
<?php  endif; ?>

<?php  if (!empty($field_5_image)): ?>
	<li>
	<img src="<?php  echo $field_5_image->src; ?>" width="<?php  echo $field_5_image->width; ?>" height="<?php  echo $field_5_image->height; ?>" alt="<?php  echo $field_5_image_altText; ?>" />
	</li>
<?php  endif; ?>

</ul>



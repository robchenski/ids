<?php  defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<ul class="callout-site-links">

<?php  if (!empty($field_2_image)): ?>
	<li>
	<?php  if (!empty($field_2_image_internalLinkCID)) { ?><a href="<?php  echo $nh->getLinkToCollection(Page::getByID($field_2_image_internalLinkCID), true); ?>"><?php  } ?>
		<p><span><?php  echo $field_2_image_altText; ?></span></p>
		<img src="<?php  echo $field_2_image->src; ?>" width="<?php  echo $field_2_image->width; ?>" height="<?php  echo $field_2_image->height; ?>" alt="<?php  echo $field_2_image_altText; ?>" /><?php  if (!empty($field_2_image_internalLinkCID)) { ?></a><?php  } ?>
	</li>
<?php  endif; ?>

<?php  if (!empty($field_3_image)): ?>
	<li>
	<?php  if (!empty($field_3_image_internalLinkCID)) { ?><a href="<?php  echo $nh->getLinkToCollection(Page::getByID($field_3_image_internalLinkCID), true); ?>"><?php  } ?>
		<img src="<?php  echo $field_3_image->src; ?>" width="<?php  echo $field_3_image->width; ?>" height="<?php  echo $field_3_image->height; ?>" alt="<?php  echo $field_3_image_altText; ?>" /><?php  if (!empty($field_3_image_internalLinkCID)) { ?>
		<p><span><?php  echo $field_3_image_altText; ?></span></p></a><?php  } ?>
	</li>
<?php  endif; ?>

<?php  if (!empty($field_4_image)): ?>
	<li>
	<?php  if (!empty($field_4_image_internalLinkCID)) { ?><a href="<?php  echo $nh->getLinkToCollection(Page::getByID($field_4_image_internalLinkCID), true); ?>"><?php  } ?>
		<p><span><?php  echo $field_4_image_altText; ?></span></p>
		<img src="<?php  echo $field_4_image->src; ?>" width="<?php  echo $field_4_image->width; ?>" height="<?php  echo $field_4_image->height; ?>" alt="<?php  echo $field_4_image_altText; ?>" /><?php  if (!empty($field_4_image_internalLinkCID)) { ?></a><?php  } ?>
	</li>
<?php  endif; ?>

</ul>



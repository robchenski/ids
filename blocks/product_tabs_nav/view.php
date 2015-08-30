<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<div>
<script>
// if we are using the custom product technical tab item block
// remove from it's temp location and insert in the tab content block in the right place
	$(function() {
	
		if ($( ".owl-carousel" ).length > 0) {
			$('.resp-tabs-list').append('<li class="addedGalleryTab"><a href="#tabs-1-gallery">Gallery</a></li>');

			$( "h2:contains('Gallery')" ).before('<a name="tabs-1-gallery"></a>');
		}	

	});
</script>

<ul class="resp-tabs-list">

<?php  if (!empty($field_2_textbox_text)): ?>
	<li><a href="#tabs-1-special-features"><?php  echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_3_textbox_text)): ?>
	<li><a href="#tabs-1-technical"><?php  echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_4_textbox_text)): ?>
	<li><a href="#tabs-1-configuration"><?php  echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_5_textbox_text)): ?>
	<li><a href="#tabs-1-finishes"><?php  echo htmlentities($field_5_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_6_textbox_text)): ?>
	<li><a href="#tabs-1-glass"><?php  echo htmlentities($field_6_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_7_textbox_text)): ?>
	<li><a href="#tabs-1-downloads"><?php  echo htmlentities($field_7_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>

<?php  if (!empty($field_8_textbox_text)): ?>
	<li><a href="#tabs-1-handles"><?php  echo htmlentities($field_8_textbox_text, ENT_QUOTES, APP_CHARSET); ?></a></li>
<?php  endif; ?>


</ul>
</div>



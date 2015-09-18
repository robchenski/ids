<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

foreach ($images as $file) {
	$fv = $file['file']->getRecentVersion();
	$img = $fv->getThumbnail(1, true);
	$name = htmlentities($fv->getTitle(), ENT_QUOTES, APP_CHARSET); //Use the file's title attribute (not our "title" property) because user may not have set title properties in the block yet!
	if (strlen($name) > 15) {
		//Truncate long names
		$name = substr($name, 0, 7) . '&hellip;' . substr($name, -7);
	}
	?>
	<li id="<?php  echo $file['fID']; ?>">
	<?php  echo $img; ?>
	<span class="thumbnail_title"><?php  echo $name; ?></span>
	</li>
<?php  } ?>

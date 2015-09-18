<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$form = Loader::helper('form');
?>

<table id="galleryProperties" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th align="center">Title</th>
		<th align="center">Caption</th>
	</tr>
<?php  foreach ($images as $file): ?>
	<?php 
	//Insert spaces into really long file names so they'll wrap (otherwise the table gets displayed wackily)
	$fv = $file['file']->getRecentVersion();
	$title = $fv->getTitle();
	$title = chunk_split($title, 50, ' ');
	?>
	<tr>
		<td class="galleryPropertiesRowImage" valign="middle" align="center"><?php  echo $fv->getThumbnail(1, true); ?></td>
	 	<td class="galleryPropertiesRowName" valign="top" align="left"><?php  echo htmlentities($title, ENT_QUOTES, APP_CHARSET); ?></td>
	 	<td class="galleryPropertiesRowTitle" valign="top" align="center"><?php  echo $form->text("properties_title_{$file['fID']}", htmlentities($file['title'], ENT_QUOTES, APP_CHARSET)); ?></td>
		<td class="galleryPropertiesRowCaption" valign="top" align="center"><?php  echo $form->textarea("properties_caption_{$file['fID']}", htmlentities($file['caption'], ENT_QUOTES, APP_CHARSET)); ?></td>
	</tr>
<?php  endforeach; ?>

</table>
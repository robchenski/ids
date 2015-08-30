<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<style>
	#dragndropInstructions { display: inline; padding-left: 5px; font-style: italic; }
	#thumbnailsContainer { width: 100%; height: 100%; float: left; margin-top: 5px; border: 1px solid black; background: url(<?php  echo $this->getBlockURL(); ?>/images/crosshatch.png) repeat left top; }
	#thumbnailLoadingIndicator { position: absolute; top: 225px; left: 125px; z-index: 1; }
	#sortableThumbnails { list-style-type: none; margin: 0; padding: 0; }
	#sortableThumbnails li { margin: 5px; padding: 0; float: left; cursor: move; width: 60px; height: 75px; text-align: center; }
	#sortableThumbnails .thumbnail_title { font-size: 8px; }

	#galleryOptions label { display: inline; }
	#galleryOptions input { width: 25px; }
	#galleryOptions select { margin-left: 0; }
	.galleryOptionField { display: inline; margin-right: 15px; }
	#galleryOptions { float: left; margin-bottom: 10px; }
	#galleryOptions td { padding-bottom: 3px; }
	#galleryOptions td.left { text-align: left; }
	#galleryOptions td.right { text-align: right; }
	#galleryOptions td.center { text-align: center; }
	#galleryOptions td span label { padding-right: 3px; }
	#galleryOptions tr.row-two td { padding-top: 8px; }
	#galleryOptions tr.row-three td { padding-top: 5px; }
	

	#displayOptions { float: right; border-left: 2px solid #CCCCCC; margin-top: 5px; }
	#displayOptions p { margin: 0; padding: 0 0 5px 0; font-weight: bold; font-style: italic; }
	#displayOptions td { padding-left: 15px; }
	#displayOptions label { display: inline; }
	#displayOptions input { width: 15px;}
	.displayOptionField { display: inline; margin-right: 15px; }

	hr.clear { clear: both; margin-bottom: 10px; color: gray; visibility: visible; width: auto; height: auto; }
	
	#propertiesContainer { width: 100%; height: 100%; float: left; border: 1px solid black; }
	#propertiesLoadingIndicator { position: absolute; top: 60px; left: 125px; z-index: 1; }
	
	#galleryProperties { width: 100%; }
	#galleryProperties th, #galleryProperties td { border-bottom: 1px solid gray; margin-bottom: 2px; padding-bottom: 2px; }
	.galleryPropertiesRowImage { width: 10%; }
	.galleryPropertiesRowName { width: 20%; padding-left: 2px; padding-right: 2px; }
	.galleryPropertiesRowTitle { width: 35%; }
	.galleryPropertiesRowTitle input { width: 95%; margin-top: 1px; }
	.galleryPropertiesRowCaption { width: 35%; }
	.galleryPropertiesRowCaption textarea { width: 95%; margin-top: 1px; height: 95%; }
</style>



<ul id="gallery-tabs" class="ccm-dialog-tabs">
	<li class="ccm-nav-active"><a id="gallery-tab-images" href="javascript:void(0);">Images</a></li>
	<li class=""><a id="gallery-tab-properties" href="javascript:void(0);">Titles &amp; Captions</a></li>
</ul>

<div id="galleryPane-images" class="galleryPane">

	<table id="galleryOptions" border="0">
		<tr>
			<td align="right" class="right"><span><?php  echo $form->label('displayColumns', 'Display Columns:'); ?></span></td>
			<td align="left" class="left"><span class="galleryOptionField"><?php  echo $form->text('displayColumns', $displayColumns); ?></span></td>
			<td align="right" class="right"><span><?php  echo $form->label('thumbWidth', 'Thumbnail Width:'); ?></span></td>
			<td align="left" class="left"><span class="galleryOptionField"><?php  echo $form->text('thumbWidth', $thumbWidth); ?> px</span></td>
			<td align="right" class="right"><span><?php  echo $form->label('thumbHeight', 'Thumbnail Height:'); ?></span></td>
			<td align="left" class="left"><span class="galleryOptionField"><?php  echo $form->text('thumbHeight', $thumbHeight); ?> px</span></td>
		</tr>
		<tr class="row-two">
			<td align="center" class="center" colspan="2"><span class="galleryOptionField"><?php  echo $form->checkbox('enableLightbox', 1, $enableLightbox, array('style' => 'margin-right: 0; width: 15px;')); ?><?php  echo $form->label('enableLightbox', 'Enable Lightbox?'); ?></span></td>
			<td align="right" class="right"><span class="lightbox-setting"><?php  echo $form->label('fullWidth', 'Zoomed Width:'); ?></span></td>
			<td align="left" class="left"><span class="lightbox-setting galleryOptionField"><?php  echo $form->text('fullWidth', $fullWidth); ?> px</span></td>
			<td align="right" class="right"><span class="lightbox-setting"><?php  echo $form->label('fullHeight', 'Zoomed Height:'); ?></span></td>
			<td align="left" class="left"><span class="lightbox-setting galleryOptionField"><?php  echo $form->text('fullHeight', $fullHeight); ?> px</span></td>
		</tr>	
		<tr class="row-three">
			<td align="left" class="left" colspan="2">&nbsp;</td>
			<td align="right" class="right"><span class="lightbox-setting"><?php  echo $form->label('lightboxTransitionEffect', 'Transition Effect:'); ?></span></td>
			<td align="left" class="left"><span class="lightbox-setting galleryOptionField"><?php  echo $form->select('lightboxTransitionEffect', array('fade' => 'Fade', 'elastic' => 'Elastic', 'none' => 'None'), $lightboxTransitionEffect); ?></span></td>
			<td align="right" class="right"><span class="lightbox-setting"><?php  echo $form->label('lightboxTitlePosition', 'Caption Position:'); ?></span></td>
			<td align="left" class="left"><span class="lightbox-setting galleryOptionField"><?php  echo $form->select('lightboxTitlePosition', array('float' => 'Outside', 'inside' => 'Inside', 'over' => 'Over', 'none' => 'None'), $lightboxTitlePosition); ?></span></td>
		</tr>	
	</table>

	<table id="displayOptions" border="0">
		<tr><td>
			<p>Advanced Features:</p>
		</td></tr>
		<tr><td>
			<span class="displayOptionField">
				<?php  echo $form->checkbox('enableCropping', 1, $enableCropping, array('style' => 'margin-right: 0;')); ?>
				<?php  echo $form->label('enableCropping', 'Enable Cropping'); ?>
			</span>
		</td></tr>
		<tr><td>
			<span class="displayOptionField">
				<?php  echo $form->checkbox('displayThumbTitles', 1, $displayThumbTitles, array('style' => 'margin-right: 0;')); ?>
				<?php  echo $form->label('displayThumbTitles', 'Display Thumbnail Titles'); ?>
			</span>
		</td></tr>
	</table>

	<hr class="clear" />

	<strong>File Set:</strong>
	<select id="fsID" name="fsID">
		<option value="0">Loading...</option>
	</select>
	<span id="dragndropInstructions" style="display: none;">Drag and drop images to place them in order.</span>

	<div id="thumbnailsContainer">
		<ul id="sortableThumbnails"></ul>
	</div>

	<img id="thumbnailLoadingIndicator" style="display: none;" src="<?php  echo $this->getBlockURL(); ?>/images/spinner.gif" width="32" height="32" alt="Loading..." />

	<input type="hidden" id="sortedFileIDs" name="sortedFileIDs" value="" />

</div><!-- END tab 1 -->

<div id="galleryPane-properties" style="display:none" class="galleryPane">

	<div id="propertiesContainer">&nbsp;</div>

	<img id="propertiesLoadingIndicator" style="display: none;" src="<?php  echo $this->getBlockURL(); ?>/images/spinner.gif" width="32" height="32" alt="Loading..." />

</div><!-- END tab 2 -->

<script>
var SG_GET_FILESETS_URL = '<?php  echo $get_filesets_url; ?>';
var SG_GET_THUMBNAILS_URL = '<?php  echo $get_thumbnails_url; ?>';
var SG_GET_PROPERTIES_URL = '<?php  echo $get_properties_url; ?>';
var SG_BLOCK_ID = '<?php  echo $this->controller->bID; ?>';

refreshFilesetList(<?php  echo $fsID; ?>);
displayThumbnails(<?php  echo $fsID; ?>);
loadProperties(<?php  echo $fsID; ?>);
</script>
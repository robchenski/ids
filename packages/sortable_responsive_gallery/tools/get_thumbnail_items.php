<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));

	Loader::model('sortable_responsive_gallery', 'sortable_responsive_gallery');

	$bID = empty($_GET['bID']) ? 0 : intval($_GET['bID']);
	$fsID = empty($_GET['fsID']) ? 0 : intval($_GET['fsID']);
	
	//Load the primary database record for the given bID
	Loader::model('block'); //<--need this in 5.6+ (otherwise the new autoloader can't find the BlockRecord class)
	$block = new BlockRecord('btSortableResponsiveGallery');
	$block->Load("bID={$bID}"); //Loads empty object if bID=0
	
	//Retrieve sorted images from our custom table if a block record exists and its fsID matches the fsID passed here...
	if ($block && $block->fsID == $fsID) {
		$sg = new SortableResponsiveGallery($bID);
		$images = $sg->getPermittedImages();
	} else { //Retrieve unsorted images from the fileset if this is a new block or the fsID's don't match...
		$images = SortableResponsiveGallery::getUnsortedPermittedFilesetImages($fsID);
	}
	
	//Render the images
	Loader::packageElement('thumbnail_items', 'sortable_responsive_gallery', array('images' => $images));

exit;

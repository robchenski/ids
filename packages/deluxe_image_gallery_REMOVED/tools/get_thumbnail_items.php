<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
	
	include(dirname(__FILE__) . '/images.inc.php');
	
	//Render the images
	Loader::packageElement('thumbnail_items', 'deluxe_image_gallery', array('images' => $images));

exit;

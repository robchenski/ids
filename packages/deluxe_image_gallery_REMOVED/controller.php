<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class DeluxeImageGalleryPackage extends Package {

	protected $pkgHandle = 'deluxe_image_gallery';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '1.6.6';
	
	public function getPackageName() {
		return t("Deluxe Image Gallery"); 
	}	
	
	public function getPackageDescription() {
		return t("Versatile image gallery with cropping, captions, lightbox, and drag n' drop sorting.");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block
		BlockType::installBlockTypeFromPackage('deluxe_image_gallery', $pkg);
	}
	
	public function upgrade() {
		parent::upgrade();
		
		//1.03 -> 1.04
		//Update all positionTitles that were 'outside' to 'float' (new version of fancybox 1.3.4 changes 'outside' caption position to be unstyled, and provides a new 'float' position that looks like the old 'outside' position).
		$db = Loader::db();
		$sql = 'UPDATE btDeluxeImageGallery SET lightboxTitlePosition = ? WHERE lightboxTitlePosition = ?';
		$vals = array('float', 'outside');
		$db->Execute($sql, $vals);
	}
	
	public function uninstall() {
		parent::uninstall();
		$db = Loader::db();
		$db->Execute('DROP TABLE btDeluxeImageGallery, btDeluxeImageGalleryProperties');
	}


}
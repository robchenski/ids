<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class SortableResponsiveGalleryPackage extends Package {

	protected $pkgHandle = 'sortable_responsive_gallery';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '1.8'; 
	
	public function getPackageName() {
		return t("Sortable Responsive Gallery"); 
	}	
	
	public function getPackageDescription() {
		return t("Displays images from a fileset (with an optional lightbox), and allows you to change their display order via drag-and-drop.");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block
		BlockType::installBlockTypeFromPackage('sortable_responsive_gallery', $pkg);
	}
	
	public function uninstall() {
		parent::uninstall();
		$db = Loader::db();
		$db->Execute('DROP TABLE btSortableResponsiveGallery, btSortableResponsiveGalleryPositions');
	}


}
<?php  defined('C5_EXECUTE') or die("Access Denied.");

class ProductTabsNavBlockController extends BlockController {
	
	protected $btName = 'Product tabs navigation';
	protected $btDescription = 'Just the top tabs for the panels';
	protected $btTable = 'btDCProductTabsNav';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_2_textbox_text;
		$content[] = $this->field_3_textbox_text;
		$content[] = $this->field_4_textbox_text;
		$content[] = $this->field_5_textbox_text;
		$content[] = $this->field_6_textbox_text;
		$content[] = $this->field_7_textbox_text;
		$content[] = $this->field_8_textbox_text;
		return implode(' - ', $content);
	}








}

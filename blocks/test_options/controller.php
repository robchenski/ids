<?php  defined('C5_EXECUTE') or die("Access Denied.");

class TestOptionsBlockController extends BlockController {
	
	protected $btName = 'Test options';
	protected $btDescription = '';
	protected $btTable = 'btDCTestOptions';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	








}

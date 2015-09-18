<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class DeluxeImageGalleryBlockController extends BlockController {
		
	protected $btDescription = "Displays images in a fileset (with an optional lightbox), and allows you to change their display order via drag-and-drop. Also provides cropping so images always line up, and easier caption editing.";
	protected $btName = "Deluxe Image Gallery";
	protected $btTable = 'btDeluxeImageGallery';
	protected $btInterfaceWidth = "800";
	protected $btInterfaceHeight = "480";
	
	public function on_page_view() {
		$html = Loader::helper('html');				
		$bv = new BlockView();
		$bv->setBlockObject($this->getBlockObject());
		$blockURL = $bv->getBlockURL();

		if (Page::getCurrentPage()->isEditMode() && version_compare(APP_VERSION, '5.4.2', '<')) {
			$this->addHeaderItem($html->javascript("{$blockURL}/ie9fix.js")); //Fix IE9 drag-n-drop for older version of jQuery UI (C5 5.4.2 and above include updated jQuery UI that fixes IE9 problem, so we only need to do this for C5 versions up to 5.4.1.1)
		}

		if ($this->enableLightbox) {
			$this->addHeaderItem($html->css("{$blockURL}/fancybox/jquery.fancybox-1.3.4.css", null, array('handle' => 'jquery.fancybox', 'version' => '1.3.4')));
			$this->addHeaderItem($this->generateIETransparencyCSS($blockURL));
			$this->addHeaderItem($html->javascript("{$blockURL}/fancybox/jquery.fancybox-1.3.4.pack.js", null, array('handle' => 'jquery.fancybox', 'version' => '1.3.4')));
		}
	}
	
	public function view() {
		Loader::model('deluxe_image_gallery', 'deluxe_image_gallery');
		$sg = new DeluxeImageGallery($this->bID);
		$files = $sg->getPermittedImages();
		
		$ch = Loader::helper('deluxe_image_gallery', 'deluxe_image_gallery');
		$ih = Loader::helper('image');

		$images = array();
		$max_img_height = 0;
		
		foreach ($files as $file) {
			$image = array();
			
			$image['fID'] = $file['fID'];
			$image['title'] = htmlentities($file['title'], ENT_QUOTES, APP_CHARSET);

			if (defined('DELUXE_IMAGE_GALLERY_HTML_CAPTIONS') && (bool)DELUXE_IMAGE_GALLERY_HTML_CAPTIONS) {
				$image['caption'] = $file['caption'];
			} else {
				$image['caption'] = htmlentities($file['caption'], ENT_QUOTES, APP_CHARSET);
			}
			
			if ($this->lightboxTitlePosition == 'inside' || $this->lightboxTitlePosition == 'over') {
				$image['caption'] = nl2br($image['caption']);
				//Don't insert linebreaks if title position is 'float'/'outside',
				// because that style doesn't expand down to fit more than one line.
			}
			
			$f = $file['file'];
			
			if ($this->enableCropping) {
				$thumb = $ch->getThumbnail($f, $this->thumbWidth, $this->thumbHeight);
			} else {
				$thumb = $ih->getThumbnail($f, $this->thumbWidth, $this->thumbHeight);
			}
			$image['thumb_src'] = $thumb->src;
			$image['thumb_width'] = $thumb->width;
			$image['thumb_height'] = $thumb->height;
			$max_img_height = ($thumb->height > $max_img_height) ? $thumb->height : $max_img_height;
			
			if ($this->enableLightbox && empty($this->fullWidth) && empty($this->fullHeight)) {
				$image['full_src'] = $f->getRelativePath();
				$image['full_width'] = $f->getAttribute('width');
				$image['full_height'] = $f->getAttribute('height');
			} else if ($this->enableLightbox) {
				$maxWidth = empty($this->fullWidth) ? 9999 : $this->fullWidth;
				$maxHeight = empty($this->fullHeight) ? 9999 : $this->fullHeight;
				$full = $ih->getThumbnail($f, $maxWidth, $maxHeight);
				$image['full_src'] = $full->src;
				$image['full_width'] = $full->width;
				$image['full_height'] = $full->height;
			} else {
				$image['full_src'] = '';
				$image['full_width'] = 0;
				$image['full_height'] = 0;
			}
			
			$images[] = $image;
		}

		$this->set('images', $images);
		$this->set('max_img_height', $max_img_height);
		
		//For "initial block add" css workaround:
		// (Note that this is only needed if the site is under a sub-directory)
		$inline_view_css_url = '';
		$dir_rel = DIR_REL; //uhh... php is weird -- won't let us put a constant inside the empty() function?!
		if (!empty($dir_rel)) {
			$html = Loader::helper('html');				
			$bv = new BlockView();
			$bv->setBlockObject($this->getBlockObject());
			$css_output_object = $html->css($bv->getBlockURL() . '/view.css'); //Pick up theme overrides
			$inline_view_css_url = $css_output_object->file;
		}
		$this->set('inline_view_css_url', $inline_view_css_url);
	}
	
	function add() {
		$this->set('fsID', 0);
		$this->set_tools_urls();

		//Defaults for new blocks
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_LIGHTBOX') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_LIGHTBOX : 1;
		$this->set('enableLightbox', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_CROPPING') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_CROPPING : 0;
		$this->set('enableCropping', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBTITLES') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBTITLES : 0;
		$this->set('displayThumbTitles', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBWIDTH') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBWIDTH : 150;
		$this->set('thumbWidth', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBHEIGHT') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_THUMBHEIGHT : 150;
		$this->set('thumbHeight', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_FULLWIDTH') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_FULLWIDTH : 800;
		$this->set('fullWidth', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_FULLHEIGHT') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_FULLHEIGHT : 600;
		$this->set('fullHeight', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_DISPLAYCOLUMNS') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_DISPLAYCOLUMNS : 3;
		$this->set('displayColumns', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_TRANSITION') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_TRANSITION : 'fade';
		$this->set('lightboxTransitionEffect', $val);
		
		$val = defined('DELUXE_IMAGE_GALLERY_DEFAULT_VAL_CAPTIONPOSITION') ? DELUXE_IMAGE_GALLERY_DEFAULT_VAL_CAPTIONPOSITION : 'float';
		$this->set('lightboxTitlePosition', $val);
	}
	
	function edit() {
		$this->set_tools_urls();
	}
	
	private function set_tools_urls() {
		//Can't use the $this->action() method from add or edit forms, so we have to use tools files to respond to ajax calls.
		//We need to get the tools files' urls to the auto.js file, but we can't send values there directly,
		// so instead we send them to the add/edit form, which in turn outputs them as javascript variables
		// (which are then available to code in the auto.js file)
		$th = Loader::helper('concrete/urls'); 
		$this->set('get_filesets_url', $th->getToolsURL('get_fileset_select_options', 'deluxe_image_gallery'));
		$this->set('get_thumbnails_url', $th->getToolsURL('get_thumbnail_items', 'deluxe_image_gallery'));
		$this->set('get_properties_url', $th->getToolsURL('get_properties_form', 'deluxe_image_gallery'));
	}			
	
	public function save($args) {
		
		$args['fullWidth'] = empty($args['fullWidth']) ? 0 : intval($args['fullWidth']);
		$args['fullHeight'] = empty($args['fullHeight']) ? 0 : intval($args['fullHeight']);
		
		//checkboxes are weird in C5 -- must be handled in this way.
		$args['enableLightbox'] = isset($args['enableLightbox']) ? 1 : 0;
		$args['enableCropping'] = isset($args['enableCropping']) ? 1 : 0;
		$args['displayThumbTitles'] = isset($args['displayThumbTitles']) ? 1 : 0;

		parent::save($args);
		
		//Save child records (parent::save only saves the primary block record)
		Loader::model('deluxe_image_gallery', 'deluxe_image_gallery');
		$sg = new DeluxeImageGallery($this->bID);
		$sortedFileIDs = empty($args['sortedFileIDs']) ? array() : explode(',', $args['sortedFileIDs']); //explode returns array with 1 element (whose value is an empty string) when passed an empty string. We don't want that, so explicitly check for empty string.
		$sortedFiles = array();
		foreach ($sortedFileIDs as $fID) {
			$sortedFiles[] = array(
				'fID' => $fID,
				'title' => $args["properties_title_{$fID}"],
				'caption' => $args["properties_caption_{$fID}"],
			);
		}
		$sg->setProperties($sortedFiles);
	}
	
	//These styles were pulled out of fancybox.css -- we need to insert the full URL to images because IE filters are relative to the page being displayed, not the css file.
	public function generateIETransparencyCSS($blockURL) {
		$img_dir = $blockURL . '/fancybox/images';
		$ie6css = <<<EOT
/* IE6 */

.fancybox-ie6 #fancybox-close { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_close.png', sizingMethod='scale'); }

.fancybox-ie6 #fancybox-left-ico { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_nav_left.png', sizingMethod='scale'); }
.fancybox-ie6 #fancybox-right-ico { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_nav_right.png', sizingMethod='scale'); }

.fancybox-ie6 #fancybox-title-over { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_title_over.png', sizingMethod='scale'); zoom: 1; }
.fancybox-ie6 #fancybox-title-float-left { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_title_left.png', sizingMethod='scale'); }
.fancybox-ie6 #fancybox-title-float-main { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_title_main.png', sizingMethod='scale'); }
.fancybox-ie6 #fancybox-title-float-right { background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_title_right.png', sizingMethod='scale'); }

.fancybox-ie6 #fancybox-bg-w, .fancybox-ie6 #fancybox-bg-e, .fancybox-ie6 #fancybox-left, .fancybox-ie6 #fancybox-right, #fancybox-hide-sel-frame {
height: expression(this.parentNode.clientHeight + "px");
}

#fancybox-loading.fancybox-ie6 {
position: absolute; margin-top: 0;
top: expression( (-20 + (document.documentElement.clientHeight ? document.documentElement.clientHeight/2 : document.body.clientHeight/2 ) + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop )) + 'px');
}

#fancybox-loading.fancybox-ie6 div	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_loading.png', sizingMethod='scale'); }
EOT;
		$ie8css = <<<EOT
/* IE6, IE7, IE8 */

.fancybox-ie .fancybox-bg { background: transparent !important; }

.fancybox-ie #fancybox-bg-n { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_n.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-ne { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_ne.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-e { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_e.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-se { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_se.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-s { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_s.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-sw { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_sw.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-w { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_w.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-nw { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$img_dir}/fancy_shadow_nw.png', sizingMethod='scale'); }
EOT;
		$ie6css = "<!--[if lt IE 7]>\n<style type=\"text/css\">\n{$ie6css}\n</style>\n<![endif]-->\n";
		$ie8css = "<!--[if lt IE 9]>\n<style type=\"text/css\">\n{$ie8css}\n</style>\n<![endif]-->\n";
		return $ie6css . $ie8css;
	}
	
}
?>

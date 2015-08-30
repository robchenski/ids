<?php 
/************************************************************
 * DESIGNERS: SCROLL DOWN! (IGNORE ALL THIS STUFF AT THE TOP)
 ************************************************************/
defined('C5_EXECUTE') or die("Access Denied.");

$pages = $cArray;
$th = Loader::helper('text');
//$ih = Loader::helper('image'); //<--uncomment this if generating thumbnails below
//$nh is already set for us by the controller

$showRss = false;
if (!$previewMode && $controller->rss) {
	$showRss = true;
	$rssUrl = $controller->getRssUrl($b);
	$rssTitle = $th->entities($controller->rssTitle);
	$btID = $b->getBlockTypeID();
	$bt = BlockType::getByID($btID);
	$rssIconSrc = Loader::helper('concrete/urls')->getBlockTypeAssetsURL($bt, 'rss.png');
	$rssInvisibleLink = '<link href="'.BASE_URL.$rssUrl.'" rel="alternate" type="application/rss+xml" title="'.$rssTitle.'" />';
	$translatedRssIconAlt = t('RSS Icon');
	$translatedRssIconTitle = t('RSS Feed');
}

$showPagination = false;
if ($paginate && $num > 0 && is_object($pl)) {
	$description = $pl->getSummary();
	if ($description->pages > 1) {
		$showPagination = true;
		$paginator = $pl->getPagination();
	}
}

/******************************************************************************
* DESIGNERS: CUSTOMIZE THE PAGE LIST HTML STARTING HERE...
*/?>

<div class="glass-tab-item">

	<?php foreach ($pages as $page):

		// Prepare data for each page being listed...
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;

		$description = $page->getCollectionDescription();
		if ($controller->truncateSummaries) {
			$description = $th->shorten($description, $controller->truncateChars); //Concrete5.4.2.1 and lower
			//$description = $th->shortenTextWord($description, $controller->truncateChars); //Concrete5.4.2.2 and higher
		}
		$description = $th->entities($description);


		
		//Other useful page data...
		//$date = date('F j, Y', strtotime($page->getCollectionDatePublic()));
		//$author = Page::getByID($page->getCollectionID(), 1)->getVersionObject()->getVersionAuthorUserName();
		
		/* CUSTOM ATTRIBUTE EXAMPLES:
		 * $example_text = $page->getAttribute('example_text_attribute_handle');
		 *
		 * HOW TO USE IMAGE ATTRIBUTES:
		 * 1) Uncomment the "$ih = Loader::helper('image');" line up top.
		 * 2) Put in some code here like the following 2 lines:
		 * 	    $img = $page->getAttribute('example_image_attribute_handle');
		 * 	    $thumb = $ih->getThumbnail($img, 64, 9999);
	 	 *      (Replace "64" with max width, "9999" with max height. The "9999" effectively means "no maximum size" for that particular dimension.)
		 *      (If you're on Concrete5.4.2 or higher, you can also pass a 4th argument of TRUE to enable cropping.)
		 * 3) Output the image tag below like this:
		 * 	    <img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" />
		 *
		 * ~OR~ IF YOU DO NOT WANT IMAGES TO BE RESIZED:
		 * 1) Put in some code here like the following 3 lines:
		 * 	    $img = $page->getAttribute('example_image_attribute_handle');
		 * 	    $img_src = $img->getRelativePath();
		 * 	    list($img_width, $img_height) = getimagesize($img->getPath());
		 * 2) Output the image tag below like this:
		 * 	    <img src="<?php echo $img_src ?>" width="<?php echo $img_width ?>" height="<?php echo $img_height ?>" alt="" />
		 *
		 * ~NOTE: In both examples above, if you aren't sure the attribute will be set, you can check it like so:
		 * 	    $img = $page->getAttribute('example_image_attribute_handle');
		 * 	    if ($img) {
		 * 	        //...
		 * 	    }
		 */
		 
		/* HOW TO DISPLAY ACTUAL PAGE CONTENT:
		 *
		 * Display an entire area:
		 *     <?php
		 *     $a = new Area('Main'); //change 'Main' to the name of the area you want to display
		 *     $a->disableControls();
		 *     $a->display($page);
		 *     ?>
		 *
		 * Display first block in an area (note that this doesn't work if the area has "Layouts"):
		 *     <?php
		 *     $pageBlocks = $page->getBlocks('Main'); //change 'Main' to the name of the area you want to display a block from
		 *     if (count($pageBlocks) > 0) {
		 *         $firstBlock = $pageBlocks[0];
		 *         $firstBlock->display();
		 *     }
		 *     ?>
		 *
		 * Same as above but put block output into a variable for further processing
		 * (warning -- this could be dangerous if you remove part of the content and leave unclosed HTML tags!)
		 *     <?php
		 *     $pageBlocks = $page->getBlocks('Main'); //change 'Main' to the name of the area you want to display a block from
		 *     if (count($pageBlocks) > 0) {
		 *         $firstBlock = $pageBlocks[0];
		 *         ob_start();
		 *         $firstBlock->display();
		 *         $blockContent = ob_get_contents();
		 *         ob_end_clean();
		 *     }
		 *     echo do_something_to_content($blockContent); //CAUTION: Content most likely contains HTML snippet -- don't leave unclosed tags!!
		 *     ?>
		 *
		 * Display excerpt of first "content" block in an area (note that this doesn't work if the area has "Layouts"):
		 * (This is "safer" than the above method because it strips HTML tags so you don't have to worry about unclosed tags,
		 *  but the downside is that it only works for "content" block types).
		 *     <?php
		 *     $excerpt = '';
		 *     $pageBlocks = $page->getBlocks('Main');
		 *     if (count($pageBlocks) > 0) {
		 *         foreach ($pageBlocks as $pb) {
		 *             if ($pb->btHandle == 'content') {
		 *                 $excerpt = $pb->getInstance()->getContent(); //NOTE: getContent() function is specific to the content block type -- it cannot be called on just any kind of block!
		 *     	           if ($controller->truncateSummaries) {
		 *     	               $excerpt = $th->shorten($excerpt, $controller->truncateChars); //Concrete5.4.2.1 and lower
		 *     	               //$excerpt = $th->shortenTextWord($excerpt, $controller->truncateChars); //Concrete5.4.2.2 and higher
		 *     	           }
		 *                 break;
		 *     	       }
		 *         }
		 *     }
		 *     echo $excerpt;
		 *     ?>
		 *
		 */



		/*** Here comes the most important part of the template! The html from here down to the "endforeach" line is repeated for each page in the list... */ ?>

    <?php
    $a = new Area('Glass tab content'); //change 'Main' to the name of the area you want to display
    $a->disableControls();
    $a->display($page);
    ?>

	<?php endforeach; ?>
</div>
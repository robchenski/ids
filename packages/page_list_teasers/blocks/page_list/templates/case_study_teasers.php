<?php  defined('C5_EXECUTE') or die(_("Access Denied."));
$teaserBlockCount = ($controller->truncateSummaries ? 1 : null);
$teaserTruncateChars = ($controller->truncateSummaries ? $controller->truncateChars : 0);
$plth = Loader::helper('page_list_teasers', 'page_list_teasers');
$rssUrl = $plth->getRssUrl($b);
$th = Loader::helper('text');
$ih = Loader::helper('image');
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)
?>

<div class="case-studies row">

	<?php  foreach ($pages as $page):
		/*
		//You can customize the Page List template to pull the first image block and display it like so
		$blocks = $page->getBlocks('Main');
		foreach ($blocks as $block) {
		   if ($block->btHandle == 'image') {
		      $block->display();
		      break; //stop looping through the blocks now that we've found the first image
		   }
		}*/
		$image = $page->getAttribute('case_study_teaser_image');
		if ($image) {
		    $thumb = $ih->getThumbnail($image, 345, 223, true);
		}
		//$thumb = $ih->getThumbnail($image, null, null);
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$teaser = $plth->getPageTeaser($page, 'Main', $teaserBlockCount, $teaserTruncateChars);
		?>
		<div class="inner">
			<a href="<?php  echo $url; ?>" target="<?php  echo $target; ?>">
				<div>
				<?php if ($image): ?>
				    <img src="<?php  echo $thumb->src ?>" width="<?php  echo $thumb->width ?>" height="<?php  echo $thumb->height ?>" alt="" />
				<?php endif; ?>
				</div>
				<h3>
					<?php  echo $title; ?>
				</h3>
				<p>
					<?php  echo $teaser; ?>
				</p>
			</a>
		</div>
	<?php  endforeach; ?>

</div><!-- case-studies row -->
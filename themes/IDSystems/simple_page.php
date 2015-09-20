<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

		<div id="main-container" class="container">
			<main id="main" class="wrapper">
				<div class="content">
					<div class="left-col">
						<?php
						$a = new Area('Main');
					    //$a->setBlockWrapperStart('<div class="content">');
					    //$a->setBlockWrapperEnd('</div>');
						$a->display($c);
						?>


					</div> <!-- .left-col -->	
					<div class="right-col sidebar">
						<?php
							// only show child nav if attribute NOT set in page properties
							$hide_child_nav = $c->getCollectionAttributeValue('hide_child_nav');
							if(!($hide_child_nav)) {
								$a = new GlobalArea('Product child pages');
								$a->setBlockWrapperStart('<nav class="child-nav" id="child-nav">');
								$a->setBlockWrapperEnd('</nav>');
								if ($c->getMasterCollectionID() != $c->getCollectionID()) {
								    $a->disableControls();
								}
								$a->display();
							}
						// only show sibling nav if attribute NOT set in page properties
						$hide_sibling_nav = $c->getCollectionAttributeValue('hide_sibling_nav');
						if(!($hide_sibling_nav)) {
							$a = new GlobalArea('Product sibling pages');
							$a->setBlockWrapperStart('<nav class="child-nav" id="child-nav">');
							$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->display();
						}
						?>
						<?php
						$as = new Area('Sidebar');
					    $a->setBlockWrapperStart('<div>');
					    $a->setBlockWrapperEnd('</div>');
						$as->display($c);
						?>
					</div> <!-- .right-col -->	
				</div> <!-- .content -->
			</main>
		</div> <!-- #main-container -->

<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
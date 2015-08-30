<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
		<div class="product-parent">
			<div id="main-container" class="container">
				<main id="main" class="wrapper">
					<div class="content">
						<div class="left-col">
							<?php
							$a = new GlobalArea('Responsive nav');
							$a->setBlockWrapperStart('<nav class="responsive-nav" id="responsive-nav">');
							$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->setBlockLimit(1);
							$a->display();
							?>
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
							?>
							<?php
							$as = new Area('Sidebar');
						    $a->setBlockWrapperStart('<div>');
						    $a->setBlockWrapperEnd('</div>');
							$as->display($c);
							?>
<?php /*
							<nav class="child-nav" id="child-nav">
				                <ul>
				                    <li>
				                        <a class="current" href="product.html">SF50 Single Glazed</a>
				                    </li>
				                    <li>
				                        <a href="about-us.html">SF55 Double Glazed</a>
				                    </li>
				                    <li>
				                        <a href="case-studies.html">SF70 Double Glazed</a>
				                    </li>
				                    <li>
				                        <a href="download-cad-files.html">SF75 Triple Glazed</a>
				                    </li>
				                </ul>
							</nav>

							<div>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/ad-1.png"></a>
							</div>
							<div>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/button.png"></a>
							</div>
*/ ?>
						</div> <!-- .right-col -->	
					</div> <!-- .content -->
				</main>
			</div> <!-- #main-container -->
		</div>
<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>
		<div class="product-landing-page">
			<div id="main-container" class="container">
				<main id="main" class="wrapper">
					<div class="content">
						<div class="left-col">
							<?php
/*							$a = new GlobalArea('Responsive nav');
							$a->setBlockWrapperStart('<nav class="responsive-nav" id="responsive-nav">');
							$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->setBlockLimit(1);
							$a->display();*/
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
/*							$a = new GlobalArea('Product child pages');
							$a->setBlockWrapperStart('<nav class="child-nav" id="child-nav">');
							$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->display();*/
							?>
							<?php
							$as = new Area('Sidebar');
						    $a->setBlockWrapperStart('<div>');
						    $a->setBlockWrapperEnd('</div>');
							$as->display($c);
							?>
						</div> <!-- .right-col -->	
					</div> <!-- .content -->
					<div class="content">
						<div class="col">
						<?php
						$as = new GlobalArea('Lower Full width');
						$as->display($c);
						?>
						</div> <!-- .right-col -->	
					</div> <!-- .content -->
				</main>
			</div> <!-- #main-container -->
		</div>
<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
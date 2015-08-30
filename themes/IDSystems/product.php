<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

		
	<?php
	// only show sibling nav if attribute NOT set in page properties
		$hide_product_tabs = $c->getCollectionAttributeValue('hide_product_tabs');
		if(!($hide_product_tabs)) {
			?>
		<div id="main-container" class="container">
			<header class="wrapper">							

			    <div class="content product-tabs">	
			<?php
			$a = new Area('Product tabs nav');
		    //$a->setBlockWrapperStart('<div>');
		    //$a->setBlockWrapperEnd('</div>');
		    $a->setBlockLimit(1);
			$a->display($c);
			?>
			</header>
<?php	
		} 
		else 
		{
			?>
		<div id="main-container" class="container no-product-tabs">
			<?php
		} 
?>

			<main id="main" class="wrapper">
				<div class="content">
					<div class="left-col">

						<?php
						// default and main content area - AKA left-col
						$a = new Area('Main');
						$a->display($c);

						// if attribute checked - include some tab content elements

						if(!($hide_product_tabs)) {
							$a = new Area('Technical tab content');
						    $a->setBlockWrapperStart('<div id="tech-tabs-to-move">');
						    $a->setBlockWrapperEnd('</div>');
							$a->display($c);

							$a = new Area('Glass tab content');
						    $a->setBlockWrapperStart('<div id="glass-tabs-to-move">');
						    $a->setBlockWrapperEnd('</div>');
							$a->display($c);		
						} ?>

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
						<!--nav class="child-nav" id="child-nav">
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
						</nav-->
						<!--div>
							<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/ad-1.png"></a>
						</div>
						<div>
							<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/button.png"></a>
						</div-->
					</div> <!-- .right-col -->	
				</div> <!-- .content -->
			</main>
		</div> <!-- #main-container -->

<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
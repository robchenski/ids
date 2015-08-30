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
					    <!--div class="content">	
				            <h1>Single Glazed Aluminium (SF50)</h1>
					    </div>
			            <div id="product-tabs-nav" class="product-tabs-nav row">

							<div class="resp-tabs-container hor_1">
							    <div id="tabs-1-special-features">
									<h2>Special features</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-technical">
									<h2>Technical</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-configuration">
									<h2>Configuration</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-finishes">
									<h2>Finishes</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-glass">
									<h2>Glass</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-downloads">
									<h2>Downloads</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>
							    <div id="tabs-1-handles">
									<h2>Handles</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
									<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>
							    </div>							
							</div>
						</div-->
						<!--div class="intro row">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. Nulla lorem velit, faucibus sit amet aliquam et, faucibus nec sem. Ut in eleifend urna, sit amet sodales lacus. Cras nec rhoncus justo. Maecenas at diam eros. Sed pretium mollis commodo. Nulla molestie tellus et maximus hendrerit. Proin mattis quam scelerisque ipsum dapibus, ut gravida velit venenatis. Nulla quis mauris imperdiet augue luctus commodo ac interdum ex. Suspendisse interdum, tellus eget efficitur commodo, massa sem lacinia ex, eu commodo massa ante in velit. Sed gravida consectetur urna in pulvinar.</p>
							<p>Duis sed est vitae magna scelerisque porta eget ac metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras pretium cursus enim, quis elementum nisi vehicula a. Proin sit amet lacus condimentum, efficitur velit nec, sollicitudin mi. </p>	
						</div-->
						<div class="case-studies row">
							<h2>Case studies</h2>
								<!--div>
									<img src="images/house-1.jpg">
								</div>
								<div>
									<img src="images/house-2.jpg">
								</div-->
							
							
							<div class="inner-left">
								<h3>Eco House New Build In Kessingland, Suffolk</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								<img src="<?php echo $this->getThemePath(); ?>/images/house-1.jpg">
							</div>
							<div class="inner-right">
								<h3>Eco House New Build In Kessingland, Suffolk</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								<img src="<?php echo $this->getThemePath(); ?>/images/house-2.jpg">
							</div>
						</div>
						<div class="gallery row">
							<h2>Gallery</h2>
							<!--div class="inner"><img src="images/gallery.jpg"></div-->
							<div class="flexslider">
							  <ul class="slides">
							    <li>
							      <img src="<?php echo $this->getThemePath(); ?>/images/gallery.jpg" />
							    </li>
							    <li>
							      <img src="<?php echo $this->getThemePath(); ?>/images/gallery.jpg" />
							    </li>
							    <li>
							      <img src="<?php echo $this->getThemePath(); ?>/images/gallery.jpg" />
							    </li>
							    <li>
							      <img src="<?php echo $this->getThemePath(); ?>/images/gallery.jpg" />
							    </li>
							  </ul>
							</div>
						</div>
					</div> <!-- .left-col -->	
					<div class="right-col sidebar">
						<?php
						$a = new GlobalArea('Product child pages');
						$a->setBlockWrapperStart('<nav class="child-nav" id="child-nav">');
						$a->setBlockWrapperEnd('</nav>');
						if ($c->getMasterCollectionID() != $c->getCollectionID()) {
						    $a->disableControls();
						}
						$a->display();
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
						<div>
							<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/ad-1.png"></a>
						</div>
						<div>
							<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/button.png"></a>
						</div>
					</div> <!-- .right-col -->	
				</div> <!-- .content -->
			</main>
		</div> <!-- #main-container -->

<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
<?php
defined('C5_EXECUTE') or die("Access Denied.");
//$this->inc('elements/header.php'); ?>
<?php defined('C5_EXECUTE') or die(_("Access Denied."));?><!doctype html>
<!--[if IE 9]>
<html lang="en" class="ie ie9">
<![endif]-->
<!--[if lt IE 9]>
<html lang="en" class="ie ie-legacy">
<![endif]-->
<html lang="en">
<head>
	<?php Loader::element('header_required'); ?>
		<!-- viewport -->
		<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" /-->

		<!-- Windows/IE font smoothing -->
		<!--meta http-equiv="cleartype" content="on"-->

		<!-- Use latest IE randering engine and switch on chrome Frame if available -->
		<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"-->

	<link rel="stylesheet" type="text/css" href="<?php echo $this->getThemePath(); ?>/css/main.css?version=<?php echo CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->getThemePath(); ?>/css/tinymce.css?version=<?php echo CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER; ?>" />
</head>
	<body class="<?php echo $c->getCollectionTypeHandle()?> <?php echo $c->getCollectionHandle()?>">
		
		<div id="header-container" class="container">
			<header class="wrapper">
				<div class="content">
					<!--h1 id="title">h1#title</h1-->
					<a class="nav-toggle" id="nav-toggle"></a>
					<?php
					$a = new GlobalArea('Site nav');
					$a->setBlockWrapperStart('<nav class="site-nav" id="site-nav">');
					$a->setBlockWrapperEnd('</nav>');
					if ($c->getMasterCollectionID() != $c->getCollectionID()) {
					    $a->disableControls();
					}
					$a->display();
					?>
					<!--nav class="site-nav" id="site-nav">
		                <ul>
		                    <li>
		                        <a href="index.html">Home</a>
		                    </li>
		                    <li>
		                        <a href="about-us.html">About us</a>
		                    </li>
		                    <li>
		                        <a href="case-studies.html">Case studies</a>
		                    </li>
		                    <li>
		                        <a href="download-cad-files.html">Download CAD files</a>
		                    </li>
		                    <li>
		                        <a href="contact-us.html">Contact us</a>
		                    </li>
		                </ul>
					</nav-->

					<a href="/" class="logo" id="logo"><img src="<?php echo $this->getThemePath(); ?>/images/logo.svg" width="288"></a>

					<div class="header-cta">
						<div class="quote-btn" id="quote-btn"><a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/button.png"></a></div>
						<div class="contact-number" id="contact-number"><a href="#">Call 01603 408 804</a></div>
					</div>
				</div>
			</header>
			<div class="wrapper">
				<div class="content">
					<?php
					$a = new GlobalArea('Product nav');
					$a->setBlockWrapperStart('<nav class="product-nav" id="product-nav">');
					$a->setBlockWrapperEnd('</nav>');
					if ($c->getMasterCollectionID() != $c->getCollectionID()) {
					    $a->disableControls();
					}
					//$a->display();
					?>
				</div>
			</div>
		</div>
		<?php
		// IF home page
		$p = Page::getCurrentPage();
		if(is_object($p) && $p instanceof Page && !$p->isError() && $p->getCollectionID() == HOME_CID){
			//this clear enough?
			$a = new Area('Home Page Banner');
			$a->setBlockLimit(1);
			//$a->display($c);
		}
		else
		{
		?>
		<!--div id="header-candy" class="container coverimage FlexEmbed FlexEmbed--3by1" style="background-image:url('<?php

		// Select image from attribute if exists else display default
		  if($c->getAttribute('cover_image')) {
		    echo $c->getAttribute('cover_image')->getVersion()->getRelativePath();
		  } 
		  else 
		  {
		  	echo $this->getThemePath() . '/images/bg-1.jpg';
		  }
		?>');"></div-->
		<?php
		}

		?>


		<div id="main-container" class="container">
			<main id="main" class="wrapper">
				<div class="content">
					<div class="left-col">
						<h1>
						<?php
							$nh = Loader::helper('navigation');

							// get parent stuff
							$page=Page::getByID($c->getCollectionParentID());
							
							// for this page
//							$URL = $nh->getCollectionURL($c);

							// for parent page
							$URL = $nh->getCollectionURL($page);
							$parent_name = $page->getCollectionName();
						?>
							<a href="<?php echo $URL; ?>"><?php echo $parent_name;?></a>

						</h1>
						<h2><?php echo $c->getCollectionName() ?></h2>
						<div class="tech-tab-item">
							<?php
							$a = new Area('Main');
						    //$a->setBlockWrapperStart('<div class="content">');
						    //$a->setBlockWrapperEnd('</div>');
							$a->display($c);
							?>
						</div>
					</div> <!-- .left-col -->	
					<div class="right-col sidebar">
						<?php
/*						$a = new GlobalArea('Product child pages');
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
						$as->display($c);*/
						?>
					</div> <!-- .right-col -->	
				</div> <!-- .content -->
			</main>
		</div> <!-- #main-container -->

<?php //$this->inc('elements/quote.php'); ?>
<?php //$this->inc('elements/footer.php'); ?>
		<div id="footer-container" class="container">
			<footer class="wrapper">
				<div class="content">
					<div class="left">

					</div>
					<div class="right">
					</div>					
				</div>
				<div class="content">
					<p>&copy; Copyright IDSystems all rights reserved 2014</p>
				</div>
			</footer>
		</div>
		<!-- JS scripts -->
		<script src="<?php echo $this->getThemePath(); ?>/js/build/production.min.js"></script>

		

<?php Loader::element('footer_required'); ?>

	</body>
</html>
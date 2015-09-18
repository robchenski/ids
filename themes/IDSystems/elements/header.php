<?php defined('C5_EXECUTE') or die(_("Access Denied."));?><!doctype html>
<!--[if IE 9]>
<html lang="en" class="ie ie9">
<![endif]-->
<!--[if lt IE 9]>
<html lang="en" class="ie ie-legacy">
<![endif]-->
<html lang="en" class="no-js">
<head>
		<!-- viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Windows/IE font smoothing -->
		<!--meta http-equiv="cleartype" content="on"-->

		<!-- Use latest IE randering engine and switch on chrome Frame if available -->
		<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"-->

	<link rel="stylesheet" type="text/css" href="<?php echo $this->getThemePath(); ?>/css/main.css?version=<?php echo CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->getThemePath(); ?>/css/tinymce.css?version=<?php echo CUSTOM_THEME_ASSET_CACHE_BUST_NUMBER; ?>" />
	<?php Loader::element('header_required'); ?>
</head>
	<body class="<?php echo $c->getCollectionTypeHandle()?> <?php echo $c->getCollectionHandle()?>">
		
		<div id="header-container" class="container">
			<header class="wrapper">
				<div class="content">
					<?php
					$a = new GlobalArea('Site nav');
					$a->setBlockWrapperStart('<nav class="site-nav" id="site-nav">');
					$a->setBlockWrapperEnd('</nav>');
					if ($c->getMasterCollectionID() != $c->getCollectionID()) {
					    $a->disableControls();
					}
					$a->display();
					?>
					<a class="site-nav-toggle" id="site-nav-toggle"><!--span class="burger-text">Site menu</span--> <span class="burger-icon"></span></a>
					<a href="<?php echo View::url('/'); ?>" class="logo" id="logo"><img src="<?php echo $this->getThemePath(); ?>/images/logo.svg" width="288"></a>

					<div class="header-cta">
						<div class="btn-holder">
							<div class="quote-btn" id="quote-btn"><a href="<?php echo View::url('/'); ?>quotation/" class="btn"><span></span> Get a quote</a></div>
							<div class="download-btn" id="download-btn"><a href="<?php echo View::url('/'); ?>downloads/" class="btn"><span></span> Download brochures</a></div>
						</div>
						<div class="contact-number" id="contact-number"><a href="#">Call 01603 408 804</a></div>
					</div>
				</div>
			</header>
			<div class="wrapper">
				<div class="content">
					<?php
						// only show responsive navs if attribute is set or not in page properties
						$a = new GlobalArea('Product nav');
						$a->setBlockWrapperStart('<nav class="product-nav" id="product-nav">');
						$a->setBlockWrapperEnd('</nav>');
						if ($c->getMasterCollectionID() != $c->getCollectionID()) {
						    $a->disableControls();
						}
						$a->display();
					?>
					<a class="nav-toggle" id="nav-toggle"><span class="burger-text">Main menu</span> <span class="burger-icon"></span></a>
					<!--a class="nav-toggle" id="nav-toggle"></a-->
					<?php
					$p = Page::getCurrentPage();
					if (!(is_object($p) && $p instanceof Page && !$p->isError() && $p->getCollectionID() == HOME_CID)) {
						//this clear enough?
						
						// only show responsive navs if attribute is set or not in page properties
						$resp_show_parent_nav = $c->getCollectionAttributeValue('resp_show_parent_nav');
						if($resp_show_parent_nav) {
							$a = new GlobalArea('Parent pages Responsive nav');
							//$page=Page::getByID($c->getCollectionParentID());
							//$a->setBlockWrapperStart('<p>'.$page->getCollectionName().'</p><nav class="parent-responsive-nav" id="parent-responsive-nav">');
							$a->setBlockWrapperStart('<nav class="parent-responsive-nav" id="parent-responsive-nav">');
							$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->display();							
						}
						// only show responsive navs if attribute is set or not in page properties
						$resp_hide_sibling_nav = $c->getCollectionAttributeValue('resp_hide_sibling_nav');
						if(!($resp_hide_sibling_nav)) {

							$a = new GlobalArea('Sibling pages Responsive nav');
							$bi_fold_menu_type = $c->getCollectionAttributeValue('bi_fold_menu_type');
							$bi_fold_parent = $c->getCollectionAttributeValue('bi_fold_parent');
							// add class if bi-fold parent page						
							if ($bi_fold_menu_type && !$bi_fold_parent) {
								$a->setBlockWrapperStart('<nav class="sibling-responsive-nav bi-fold-nav" id="sibling-responsive-nav">');
								$a->setBlockWrapperEnd('</nav>');
							} else {
								$a->setBlockWrapperStart('<nav class="sibling-responsive-nav" id="sibling-responsive-nav">');
								$a->setBlockWrapperEnd('</nav>');
							}
							//$a->setBlockWrapperStart('<nav class="sibling-responsive-nav" id="sibling-responsive-nav">');
							//$a->setBlockWrapperEnd('</nav>');
							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->display();							
						}
						// only show responsive navs if attribute is set or not in page properties
						$resp_show_child_nav = $c->getCollectionAttributeValue('resp_show_child_nav');
						if($resp_show_child_nav) {
							$a = new GlobalArea('Child pages Responsive nav');

							$bi_fold_menu_type = $c->getCollectionAttributeValue('bi_fold_menu_type');
							// add class if bi-fold parent page						
							if ($bi_fold_menu_type) {
								$a->setBlockWrapperStart('<nav class="child-responsive-nav bi-fold-nav" id="child-responsive-nav">');
								$a->setBlockWrapperEnd('</nav>');
							} else {
								$a->setBlockWrapperStart('<nav class="child-responsive-nav" id="child-responsive-nav">');
								$a->setBlockWrapperEnd('</nav>');
							}

							if ($c->getMasterCollectionID() != $c->getCollectionID()) {
							    $a->disableControls();
							}
							$a->display();							
						}/*
						else {
							$nh = Loader::helper('navigation');
							echo '<nav class="responsive-product-nav"><ul class="nav"><li class="current nav-path-selected">';
							echo '<a href="' . $nh->getCollectionURL($c) . '">' . $c->getCollectionName() . '</a>';
							echo '</ul></li></nav>';
						}*/
					}
						?>
				</div>
			</div>
		</div>
		<?php
		// IF home page
		//$p = Page::getCurrentPage();
		if(is_object($p) && $p instanceof Page && !$p->isError() && $p->getCollectionID() == HOME_CID){
			//this clear enough?
			$a = new Area('Home Page Banner');
			$a->setBlockLimit(1);
			$a->display($c);
		}
		elseif(is_object($p) && $p instanceof Page && !$p->isError() && $p->getCollectionID() == '278'){
			//this clear enough?
			//$a = new Area('Home Page Banner');
			//$a->setBlockLimit(1);
			//$a->display($c);
		}
		else
		{
		?>
		<div id="header-candy" class="container coverimage FlexEmbed FlexEmbed--3by1" style="background-image:url('<?php

		// Select image from attribute if exists else display default
		  if($c->getAttribute('cover_image')) {
		    echo $c->getAttribute('cover_image')->getVersion()->getRelativePath();
		  } 
		  else 
		  {
		  	echo $this->getThemePath() . '/images/bg-1.jpg';
		  }
		?>');">

		<a id="download-tab" href="<?php echo View::url('/'); ?>downloads/"><img src="<?php echo $this->getThemePath(); ?>/images/download-tab.png" width="47" height="266"></a>
		</div>
		<?php
		}

		?>
<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); 
?>
		<div class="home-page">
			<div id="main-container" class="container">
				<header class="wrapper">
				    <div class="content">
						<?php
						$a = new Area('Banner tag');
						$a->setBlockLimit(1);
						$a->display($c);
						?>
				    </div>
				</header>
				<main id="main" class="wrapper">
					<div class="content">
						<?php
						$a = new Area('Main');
						$a->display($c);
						?>
						<!--ul class="callout-links">
							<li><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/home-1.jpg"></a></li>
							<li><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/home-2.jpg"></a></li>
							<li><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/home-3.jpg"></a></li>
						</ul-->
					</div> <!-- .content -->
					<div class="content">
						<div class="left-col">
							<?php
							$a = new Area('Main left');
							$a->display($c);
							?>
						</div> <!-- .left-col -->	
						<div class="right-col sidebar">
							<?php
							$as = new Area('Main right');
							$as->display($c);
							?>
						</div> <!-- .right-col -->	
					</div> <!-- .content -->
				</main>
			</div> <!-- #main-container -->
			<div id="lower-01-main-container" class="container">
				<main id="lower-01-main" class="wrapper">
					<div class="content">
						<div class="left">
							<?php
							$a = new Area('Lower 01 Main left');
							$a->display($c);
							?>
							<?php /*<ul class="callout-site-links">
								<li><a href="#0"><p><span>Case studies</span></p><img src="<?php echo $this->getThemePath(); ?>/images/link-images/link-case-studies.jpg"></a></li>
								<li><a href="#0"><p><span>Product demos and video's</span></p><img src="<?php echo $this->getThemePath(); ?>/images/link-images/link-demos.jpg"></a></li>
								<li><a href="#0"><p><span>Glass window boards</span></p><img src="<?php echo $this->getThemePath(); ?>/images/link-images/link-glass-window-boards.jpg"></a></li>
							</ul>*/ ?>
						</div>

						<div class="right">
							<?php
							$as = new Area('Lower 01 Main right');
							$as->display($c);
							?>
							<?php /*
							<div class="twitter-feed">
								<h2>Twitter feed</h2>
								<div>
									<p><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/twitter-feed.jpg"></a></p>
									<p>IDSystems<br />@IDSystems_UK</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								</div>
								<div>
									<p><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/twitter-feed.jpg"></a></p>
									<p>IDSystems<br />@IDSystems_UK</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								</div>
								<div>
									<p><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/images/twitter-feed.jpg"></a></p>
									<p>IDSystems<br />@IDSystems_UK</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								</div>
								<div>
									<p><a href="#0"><img src="<?php echo $this->getThemePath(); ?>/<?php echo $this->getThemePath(); ?>/images/twitter-feed.jpg"></a></p>
									<p>IDSystems<br />@IDSystems_UK</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt risus convallis tellus fringilla, a condimentum nulla vulputate. </p>
								</div>
							</div>*/ ?>
						</div>
					</div> <!-- .content -->
				</main>
			</div> <!-- #lower-01-main-container -->
			<div id="lower-02-main-container" class="container">
				<main id="lower-02-main" class="wrapper">
					<div class="content">
						<?php
						$as = new Area('Systems');
						$as->display($c);
						?>
						<ul class="callout-system-links">
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-02.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-01.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-03.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-04.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-05.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-06.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-07.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-08.png"></li>
							<li><img src="<?php echo $this->getThemePath(); ?>/images/systems/sys-09.png"></li>
						</ul>
					</div>
				</main>
			</div> <!-- #lower-02-main-container -->
		</div>
<?php $this->inc('elements/quote.php'); ?>
<?php $this->inc('elements/footer.php'); ?>
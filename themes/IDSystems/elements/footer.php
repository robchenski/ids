<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

		<div id="footer-container" class="container">
			<footer class="wrapper">
				<div class="content">
					<div class="left">
					<?php
					$a = new GlobalArea('Footer nav');
					$a->setBlockWrapperStart('<nav class="footer-nav">');
					$a->setBlockWrapperEnd('</nav>');
					if ($c->getMasterCollectionID() != $c->getCollectionID()) {
					    $a->disableControls();
					}
					$a->display();
					?>
					</div>
					<div class="right">
						<div class="item">
							<div class="sponsors"><?php /*
								<p>Sponsors for:</p>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/lotus.png"></a>*/ ?>
							</div>
							<div class="social">
								<p>You can find us on:</p>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/fb.png"></a>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/tw.png"></a>
								<?php /*<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/pi.png"></a>*/ ?>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/yt.png"></a>
							</div>
						</div>
						<div class="item">
							<div class="acredits">
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/fensa.png"></a>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/ce.png"></a>
								<a href="#"><img src="<?php echo $this->getThemePath(); ?>/images/qa.png"></a>
							</div>
						</div>
					</div>					
				</div>
				<div class="content">
					<p>&copy; Copyright IDSystems all rights reserved 2014</p>
				</div>
			</footer>
		</div>
		<a href="#0" class="cd-top">Top</a>
		<!-- JS scripts -->
		<!--script defer src="<?php echo $this->getThemePath(); ?>/js/jquery.flexslider.js"></script-->
		<script src="<?php echo $this->getThemePath(); ?>/js/build/production.min.js"></script>

		<script>
			//* fix vertical when not overflow
			// call fullscreenFix() if .fullscreen content changes
			function fullscreenFix(){
			    var h = $('body').height();
			    // set .fullscreen height
			    $(".content-b").each(function(i){
			        if($(this).innerHeight() <= h){
			            $(this).closest(".fullscreen").addClass("not-overflow");
			        }
			    });
			}
			$(window).resize(fullscreenFix);
			fullscreenFix();

			//* resize background images
			function backgroundResize(){
			    var windowH = $(window).height();
			    $(".background").each(function(i){
			        var path = $(this);
			        // variables
			        var contW = path.width();
			        var contH = path.height();
			        var imgW = path.attr("data-img-width");
			        var imgH = path.attr("data-img-height");
			        var ratio = imgW / imgH;
			        // overflowing difference
			        var diff = parseFloat(path.attr("data-diff"));
			        diff = diff ? diff : 0;
			        // remaining height to have fullscreen image only on parallax
			        var remainingH = 0;
			        if(path.hasClass("parallax")){
			            var maxH = contH > windowH ? contH : windowH;
			            remainingH = windowH - contH;
			        }
			        // set img values depending on cont
			        imgH = contH + remainingH + diff;
			        imgW = imgH * ratio;
			        // fix when too large
			        if(contW > imgW){
			            imgW = contW;
			            imgH = imgW / ratio;
			        }
			        //
			        path.data("resized-imgW", imgW);
			        path.data("resized-imgH", imgH);
			        path.css("background-size", imgW + "px " + imgH + "px");
			    });
			}
			$(window).resize(backgroundResize);
			$(window).focus(backgroundResize);
			backgroundResize();
		</script>

<?php Loader::element('footer_required'); ?>

	</body>
</html>
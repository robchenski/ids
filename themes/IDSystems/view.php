<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
$this->inc('elements/header.php');
?>

		<div id="main-container" class="container">
			<header class="wrapper">
			    <div class="content">

		            <h1></h1>
			    </div>
			</header>
			<main id="main" class="wrapper">
				<div class="content">
					<?php
					Loader::element('system_errors', array('error' => $error));
					print $innerContent;			
					?>
				</div> <!-- .content -->
			</main>
		</div> <!-- #main-container -->

<?php 
//$this->inc('elements/quote.php');
?>
<?php 
$this->inc('elements/footer.php');
?>
<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
//$this->inc('elements/header.php');
?>


					<?php 

					$a = new Area('Quotation form');
					//$a->setBlockLimit(1);
					$a->display($c);

					?>
					<?php

					Loader::element('system_errors', array('error' => $error));
					print $innerContent;

					?>


<?php 
//$this->inc('elements/quote.php');
?>
<?php 
//$this->inc('elements/footer.php');
?>
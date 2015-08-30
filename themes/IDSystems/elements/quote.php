		<div id="quote-container" class="container">
			<div class="wrapper">
				<div class="content">
					<h2>Quick Quotation Form</h2>
					<?php
$a = new GlobalArea('Quote form');
if ($c->getMasterCollectionID() != $c->getCollectionID()) {
    $a->disableControls();
}
$a->display();
					?>
				</div>
			</div>
		</div>
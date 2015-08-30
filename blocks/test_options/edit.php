<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>item 1</h2>
	<?php 
	$options = array(
		'0' => '--Choose One--',
		'1' => 'On',
		'2' => 'Off',
	);
	echo $form->select('field_1_select_value', $options, $field_1_select_value);
	?>
</div>



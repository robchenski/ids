<?php
defined('C5_EXECUTE') or die("Access Denied.");

class QuotationController extends Controller {

	public function view() {
		$color = red; 
		$this->set('selectedColor', $color);
	}
}
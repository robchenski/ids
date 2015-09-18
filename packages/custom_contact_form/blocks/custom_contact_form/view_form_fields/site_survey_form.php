<?php defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Custom Contact Form version 3.0, by Jordan Lev
 *
 * See https://github.com/jordanlev/c5_custom_contact_form for instructions
 */

$form = Loader::helper('form');

/* DEV NOTES:
 *  ~ You don't need to populate field values upon validation failure re-display,
 *    because C5 form helpers do that automatically for us.
 *  ~ If you're using placeholders in lieu of visible labels,
 *    you should still have a <label> that is "visuallyhidden" for screenreaders,
 *    AND another <label> inside a <noscript> tag for non-JS people on browsers
 *    that lack native support for the placeholder attribute!
 *  ~ Note that we're not using the C5 form helper for the submit button,
 *    because we don't want a "name" attribute on it. If you want to add a name attribute,
 *    be careful not to use the name "submit", as this might cause problems with javascript
 *    (because it trounces the built-in form.submit() method)!
 */
?>
<fieldset>
	<legend>Site survey request form</legend>
	<div class="validation-errors" style="display:none">
		<span class="validation-error-header"></span>
		<ul class="error-items">

		</ul>
	</div>
<?php /*	*/ ?>
	<section>
		<p><span>All fields marked with * must be filled in</span></p>
		<div class="row details" id="site-survey">
			<div class="left">
				<div class="sub">
					<?php echo $form->label('agree', 'I Agree to All Statements Above'); ?>
					<div class="sub-group"><?php echo $form->checkbox('agree[]', 'Yes'); ?>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('openings_date', 'Date the Opening(s) Will Be Formed *'); ?>
					<div class="sub-group"><?php echo $form->text('openings_date', null, array('placeholder' => 'Date the Opening(s) Will Be Formed *', 'class' => 'date-picker')); 
					?>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('quote_ref', 'Quotation Reference *'); ?>
					<div class="sub-group"><?php echo $form->text('quote_ref', null, array('placeholder' => 'Quotation Reference *')); ?>
					<span class="notes">This can be found on your quotation or correspondence. It will be a 5 digit number</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('client_name', 'Client Name *'); ?>
					<div class="sub-group"><?php echo $form->text('client_name', null, array('placeholder' => 'Client Name *')); ?>
					<span class="notes">Enter your name or the name of the client</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('company_name', 'Company'); ?>
					<div class="sub-group"><?php echo $form->text('company_name', null, array('placeholder' => 'Company')); ?>
					<span class="notes">Enter company name if applicable</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('telephone_number', 'Telephone Number *'); ?>
					<div class="sub-group"><?php echo $form->text('telephone_number', null, array('placeholder' => 'Telephone Number *')); ?>
					<span class="notes">Enter your daytime number</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('email', 'Email *'); ?>
					<div class="sub-group"><?php echo $form->email('email', null, array('placeholder' => 'Email *')); ?>
					<span class="notes">Enter your email address</span>
					</div> 
				</div>
			</div>
			<div class="right">
				<div class="sub">
					<?php echo $form->label('site_postcode', 'Site Postcode *'); ?>
					<div class="sub-group"><?php echo $form->text('site_postcode', null, array('placeholder' => 'Site Postcode *')); ?>
					<span class="notes">Enter the site postcode</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('address_line_1', '1st Line Site Address *'); ?>
					<div class="sub-group"><?php echo $form->text('address_line_1', null, array('placeholder' => '1st Line Site Address *')); ?>
					<span class="notes">Enter the first line of the site address</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('site_contact_name', 'Site Contact Name *'); ?>
					<div class="sub-group"><?php echo $form->text('site_contact_name', null, array('placeholder' => 'Site Contact Name *')); ?>
					<span class="notes">Enter the name of the person to contact on site. This may be the same as client name</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('site_contact_number', 'Site Contact Number *'); ?>
					<div class="sub-group"><?php echo $form->text('site_contact_number', null, array('placeholder' => 'Site Contact Number *')); ?>
					<span class="notes">Enter the best daytime contact for contact on site</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('site_contact_email', 'Site Contact Email *'); ?>
					<div class="sub-group"><?php echo $form->email('site_contact_email', null, array('placeholder' => 'Site Contact Email *')); ?>
					<span class="notes">Enter the site contacts email address</span> 
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('whom_to_contact', 'Who Should we Contact to Arrange the Survey *'); ?>
					<div class="sub-group"><?php
					$whom_options = array(
						'' => '-- Please select --',
						'Client' => 'Client',
						'Site Contact' => 'Site Contact',
					);
					echo $form->select('whom_to_contact', $whom_options, null, array('placeholder' => 'Who Should we Contact to Arrange the Survey *'));
					?>
					<span class="notes">Select who we should contact to arrange the survey</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('nearest_car_park', 'Nearest Car Parking *'); ?>
					<div class="sub-group"><?php echo $form->textarea('nearest_car_park', null, array('placeholder' => 'Nearest Car Parking *')); ?>
					<span class="notes">Enter the best and nearest location for parking. This may be on site driveway, road outside, a car park or metered location.</span>
					</div>
				</div>
				<div class="sub">
					<?php echo $form->label('details_samples', 'Detail and Samples Required'); ?>
					<div class="sub-group"><?php echo $form->textarea('details_samples', null, array('placeholder' => 'Detail and Samples Required')); ?>
					<span class="notes">Enter any samples you would like a surveyor to bring to site, these may be colours, tracks or handles</span>
					</div>
				</div>
			</div>
			<div class="btn-submit">
				<button class="btn" type="submit" value="Submit"><span></span> Submit</button>
			</div>
			
		</div>
	</section>
</fieldset>
<?php /*
// Or use validator submit
<input type="submit" value="Submit" />

*/ ?>

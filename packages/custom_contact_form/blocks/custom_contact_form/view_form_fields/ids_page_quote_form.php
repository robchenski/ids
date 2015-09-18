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
							<legend>My form</legend>
							<div class="row  details">
								<div class="left">
									<p>
										<?php echo $form->label('firstname', 'First Name'); ?>
										<!--label for="firstname">First Name</label-->
										<?php echo $form->text('firstname', null, array('placeholder' => 'First Name')); ?>
										<!--input type="text" id="firstname" name="firstname" required maxlength="50" /-->
									</p>
									<p>
										<label for="lastname">Last Name</label>
										<?php echo $form->text('lastname', null, array('placeholder' => 'Last Name')); ?>
										<!--input type="text" id="lastname" name="lastname" required maxlength="50" /-->
									</p>						  
									<p>
										<label for="email">Email Address</label>
										<?php echo $form->email('email', null, array('placeholder' => 'Email Address')); ?>
										<!--input type="email" id="email" name="email" required maxlength="50" /-->
									</p>						  
									<p>
										<label for="telephone">Phone Number</label>
										<?php echo $form->telephone('telephone', null, array('placeholder' => 'Phone Number')); ?>
										<!--input type="tel" id="tel" name="tel" required maxlength="50" /-->
									</p>								
								</div>
								<div class="right">
									<p>
										<label for="postcode">Postcode</label>
										<?php echo $form->text('postcode', null, array('placeholder' => 'Postcode')); ?>
										<!--input type="text" id="postcode" name="postcode" required maxlength="20" /-->
									</p>
									<p>
										<label for="house">House Name/No.</label>
										<?php echo $form->text('house', null, array('placeholder' => 'House Name/No.')); ?>
										<!--input type="text" id="house" name="lastname" required maxlength="20" /-->
									</p>						  
									<p class="dimes">
										<label for="opening_width">Opening Width</label>
										<?php echo $form->text('opening_width', null, array('placeholder' => 'Opening Width')); ?>
										<!--input type="text" id="email" name="email" required maxlength="50" /-->
										<span>Metres</span>
									</p>						  
									<p class="dimes">
										<label for="opening_height">Opening Height</label>
										<?php echo $form->text('opening_height', null, array('placeholder' => 'Opening Height')); ?>
										<!--input type="text" id="email" name="email" required maxlength="50" /-->
										<span>Metres</span>
									</p>								
								</div>
							</div>
							<div class="row interest">
								<div class="left">
									<p>
										<label for="interest">I am interested in</label>
										<span>Folding doors <?php echo $form->checkbox('interest[]', 'Folding doors'); ?><!--input type="checkbox" name="interest" value="Folding doors" /--></span>
										<span>Sliding doors <?php echo $form->checkbox('interest[]', 'Sliding doors'); ?><!--input type="checkbox" name="interest" value="Sliding doors" /--></span>
										<span>Other <?php echo $form->checkbox('interest[]', 'Other'); ?><!--input type="checkbox" name="interest" value="Other" /--></span>
									</p>
									<p class="other" style="display: none;">
										<label for="other">Other interests</label>
										<?php echo $form->textarea('other', null, array('placeholder' => 'Other interest', 'style' => '', 'class' => 'other-text')); ?><!--input type="text" id="other" class="other" name="other" placeholder="other" required maxlength="50" /-->
									</p>
									<p>
										<label for="material">Material choice:</label>
										<span>Aluminium <?php echo $form->checkbox('material[]', 'Aluminium'); ?><!--input type="checkbox" name="interest" value="Folding doors" /--></span>
										<span>Timber <?php echo $form->checkbox('material[]', 'Timber'); ?><!--input type="checkbox" name="interest" value="Sliding doors" /--></span>
										<span>Composite <?php echo $form->checkbox('material[]', 'Composite'); ?><!--input type="checkbox" name="interest" value="Other" /--></span>
									</p>
								</div>
								<div class="right">				  
									<p class="btn-submit">
										<button class="btn" type="submit" value="Submit"><span></span> Get a quote</button>
									</p>								
								</div>
							</div>
					</fieldset>

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
	<legend>Quotation form</legend>
	<div id="steps">
<?php /*	*/ ?>	
		<span>Step 1</span>
		<section>
			<h2>Please complete the forms to receive a quotation</h2>
			<p align="left">Please complete this first form with your details and the select the products you are interested in getting a quotation for then press next. If you need any help completing the form please call us on 01603 408804.</p>
			<div class="row details" id="stage_1">
			<h3>Your details: <span>All fields marked with * must be filled in</span></h3>
				<div class="left">
					<p>
						<?php echo $form->label('customer_title', 'Title *'); ?>
						<?php
						$title_options = array(
							'' => '-- Please select --',
							'Mr' => 'Mr',
							'Mrs' => 'Mrs',
							'Miss' => 'Miss',
							'Ms' => 'Ms',
							'Doctor' => 'Doctor',
						);
						echo $form->select('customer_title', $title_options, null, array('placeholder' => 'Title *'));
						?>
					</p>
					<p>
						<?php echo $form->label('firstname', 'Firstname *'); ?>
						<?php echo $form->text('firstname', null, array('placeholder' => 'First Name *')); ?>
					</p>
					<p>
						<?php echo $form->label('surname', 'Surname *'); ?>
						<?php echo $form->text('surname', null, array('placeholder' => 'Surame *')); ?>
					</p>
					<p>
						<?php echo $form->label('email', 'Email *'); ?>
						<?php echo $form->email('email', null, array('placeholder' => 'Email *')); ?>
					</p>
					<p>
						<?php echo $form->label('telephone', 'Phone Number *'); ?>
						<?php echo $form->telephone('telephone', null, array('placeholder' => 'Phone Number *')); ?>
					</p>
					<p>
						<?php echo $form->label('customer_type', 'Customer Type *'); ?>
						<?php
						$customer_type_options = array(
							'' => '-- Please select --',
							'Private' => 'Private',
							'Domestic' => 'Domestic',
							'Architect' => 'Architect',
							'Designer' => 'Designer',
							'Specifier' => 'Specifier',
							'Builder' => 'Builder',
							'Contractor' => 'Contractor',
							'Developer' => 'Developer',
							'Glazing Trade' => 'Glazing Trade',
							'Other' => 'Other',
						);
						echo $form->select('customer_type', $customer_type_options, null, array('placeholder' => 'Customer Type *'));
						?>
					</p>
					<p>
						<?php echo $form->label('project_type', 'Type of project *'); ?>
						<?php
						$project_type_options = array(
							'' => '-- Please select --',
							'New Build' => 'New Build',
							'Extension' => 'Extension',
							'Rennovation' => 'Rennovation',
							'Commercial' => 'Commercial',
							'Replacement' => 'Replacement',
							'Other' => 'Other',
						);
						echo $form->select('project_type', $project_type_options, null, array('placeholder' => 'Type of project *'));
						?>
					</p>
					<p>
						<?php echo $form->label('company', 'Are you a company?'); ?>
						<?php echo $form->checkbox('company[]', 'Yes'); ?>
					</p>
						<p class="other" style="display: none;">
							<?php echo $form->label('company_name', 'Company name'); ?>
							<?php echo $form->textarea('company_name', null, array('placeholder' => 'Company name', 'style' => '', 'class' => 'other-text')); ?>
						</p>
				</div>
				<div class="right">
				
					<p class="fuller checkboxes">
						<?php echo $form->label('interest', 'I am interested in the following products *'); ?>
						<?php 
						// List all the product pages from the sitemap as checkboxes with page link
						if(is_array($productpages)){
							    foreach($productpages as $page){
							        $page_name = $page->getCollectionName();
							        $page_id = $page->getCollectionID();
									$nh = Loader::helper('navigation');
									$page_url = $nh->getCollectionURL($page);
							        echo '<span><a href="' . $page_url . '" target="_blank">' . $page_name . '</a> ' . $form->checkbox('interest[]', $page_name) . '</span>';
							    }
							}
							 ?>

					</p>
					<p>
						<?php echo $form->label('heard_about_us', 'Where did you hear about us? *'); ?>
						<?php
						$heard_about_us_options = array(
							'' => '-- Please select --',
							'Magazine' => 'Magazine / Newspaper',
							'Exhibition' => 'Exhibition',
							'TV Programme' => 'TV Programme',
							'Bing' => 'Bing',
							'Google' => 'Google',
							'Yahoo' => 'Yahoo',
							'Build It Website' => 'Build It Website',
							'Homebuilding &amp; Renovating Website' => 'Homebuilding &amp; Renovating Website',
							'Grand Designs Website' => 'Grand Designs Website',
							'Public Forum' => 'Public Forum',
							'Recommendation' => 'Recommendation',
							'Company Vehicle' => 'Company Vehicle',
						);
						echo $form->select('heard_about_us', $heard_about_us_options, null, array('placeholder' => 'Where did you hear about us? *'));
						?>
					</p>
					<div id="heard_about_us_magazine_holder" style="display: none;">
						<p>
							<?php echo $form->label('heard_about_us_magazine', 'Please define the source of the enquiry'); ?>
							<?php
							$heard_about_us_magazine_options = array(
								'' => '-- Please select --',
								'Build It' => 'Build It',
								'DABS' => 'DABS',
								'DABS Product Card' => 'DABS Product Card',
								'Daily Mail' => 'Daily Mail',
								'Grand Designs' => 'Grand Designs',
								'Homebuilding Renovating' => 'Homebuilding Renovating',
								'Real Homes' => 'Real Homes',
								'Selfbuild Design' => 'Selfbuild Design',
								'Telegraph' => 'Telegraph',
								'The Architect Product Card' => 'The Architect Product Card',
								'Your Showhome' => 'Your Showhome',
								'Other' => 'Other - Please specify',
							);
							echo $form->select('heard_about_us_magazine', $heard_about_us_magazine_options, null, array('placeholder' => 'Which Magazine / Newspaper?'));
							?>
						</p>
						<p class="other" style="display: none;">
							<?php echo $form->label('other_heard_about_us_magazine', 'Other Magazine / Newspaper source'); ?>
							<?php echo $form->textarea('other_heard_about_us_magazine', null, array('placeholder' => 'Other source', 'style' => '', 'class' => 'other-text')); ?>
						</p>
					</div>
					<div id="heard_about_us_exhibition_holder" style="display: none;">
						<p>
							<?php echo $form->label('heard_about_us_exhibition', 'Please define the source of the enquiry'); ?>
							<?php
							$heard_about_us_exhibition_options = array(
								'' => '-- Please select --',
								'Homebuilding Renovating Birmingham 2014' => 'Homebuilding Renovating Birmingham 2014',
								'Homebuilding Renovating Birmingham 2015' => 'Homebuilding Renovating Birmingham 2015',
								'Homebuilding Renovating Surrey 2014' => 'Homebuilding Renovating Surrey 2014',
								'Grand Designs Live London 2015' => 'Grand Designs Live London 2015',
								'Grand Designs Live London 2014' => 'Grand Designs Live London 2014',
								'Homebuilding &amp; Renovating London 2014' => 'Homebuilding &amp; Renovating London 2014',
								'Build it Live 2015' => 'Build it Live 2015',
								'Other' => 'Other - Please specify',
							);
							echo $form->select('heard_about_us_exhibition', $heard_about_us_exhibition_options, null, array('placeholder' => 'Which Exhibition?'));
							?>
						</p>
						<p class="other" style="display: none;">
							<?php echo $form->label('other_heard_about_us_exhibition', 'Other Exhibition source'); ?>
							<?php echo $form->textarea('other_heard_about_us_exhibition', null, array('placeholder' => 'Other Exhibition source', 'style' => '', 'class' => 'other-text')); ?>
						</p>
					</div>
					<p>
						<?php echo $form->label('apprx_delivery_date', 'Please enter the approximate date you will need the systems on site? *'); ?>
						<?php echo $form->text('apprx_delivery_date', null, array('placeholder' => 'Required by date *', 'class' => 'date-picker')); 
						?>
					</p>
					<p class="fuller">
						<?php echo $form->label('not_receive_updates', 'We respect your privacy and will never pass on information to any third parties. We do like to let you know about upcoming chances to see our products at exhibtions, but if you\'d prefer not to know just tick this box.'); ?>
						<?php echo $form->checkbox('not_receive_updates[]', 'Yes'); ?>
					</p>
				</div>
			</div>
		</section>

		<span>Step 2</span>
		<section>

			<div class="row interest" id="stage_2">
				<h2>Please enter your address details below and click next:</h2>
				<p>Please complete this first form with your correspondence address and site address if different, then click next for the final stage. If you need any help completing the form please call us on 01603 408804. </p>
				<div class="left">
					<div>
						<h3>Correspondence Address</h3>
						<p>
							<?php echo $form->label('address_1', 'Address #1 *'); ?>
							<?php echo $form->text('address_1', null, array('placeholder' => 'Address #1 *')); ?>
						</p>
						<p>
							<?php echo $form->label('address_2', 'Address #2'); ?>
							<?php echo $form->text('address_2', null, array('placeholder' => 'Address #2')); ?>
						</p>
						<p>
							<?php echo $form->label('town_city ', 'Town / City *'); ?>
							<?php echo $form->text('town_city', null, array('placeholder' => 'Town / City *')); ?>
						</p>
						<p>
							<?php echo $form->label('postcode', 'Postcode *'); ?>
							<?php echo $form->text('postcode', null, array('placeholder' => 'Postcode *')); ?>
						</p>
					</div>	
				</div>
				<div class="right">
					<div>
						<h3>Delivery Address (If different)</h3>
						<p>
							<?php echo $form->label('delivery_address_1', 'Address #1'); ?>
							<?php echo $form->text('delivery_address_1', null, array('placeholder' => 'Address #1')); ?>
						</p>
						<p>
							<?php echo $form->label('delivery_address_2', 'Address #2'); ?>
							<?php echo $form->text('delivery_address_2', null, array('placeholder' => 'Address #2')); ?>
						</p>
						<p>
							<?php echo $form->label('delivery_town_city ', 'Town / City'); ?>
							<?php echo $form->text('delivery_town_city', null, array('placeholder' => 'Town / City')); ?>
						</p>
						<p>
							<?php echo $form->label('delivery_postcode', 'Postcode'); ?>
							<?php echo $form->text('delivery_postcode', null, array('placeholder' => 'Postcode')); ?>
						</p>
					</div>
				</div>
			</div>
		</section>

		<span>Step 3</span>
		<section>
			<div class="row interest" id="stage_3">
				<h2>Finally please select the desired products, add opening sizes and number of panels below and press submit.  Your form will then be sent to our office to prepare a quotation.</h2>

				<div id="folding_doors_quote_details">
					<h3>Bi-fold doors – We're happy to prepare alternate quotes for our range of systems, please select all items you would like a quotation for.</h3>
					<div class="col-holder">
						<p class="col checkboxes">
						<?php echo $form->label('aluminium_interest', $aluminium_productpage_name); ?>
						<?php
						// List all the product pages from the sitemap as checkboxes with page link;
						if(is_array($aluminium_productpages) && !empty($aluminium_productpages)) {
						    foreach($aluminium_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('aluminium_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
						<p class="col checkboxes">
						<?php echo $form->label('timber_interest', $timber_productpage_name); ?>
						<?php 
						// List all the product pages from the sitemap as checkboxes with page link
						if(is_array($timber_productpages)){
						    foreach($timber_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('timber_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
						<p class="col checkboxes">
						<?php echo $form->label('composite_interest', $composite_productpage_name); ?>
						<?php 
						// List all the product pages from the sitemap as checkboxes with page link
						if(is_array($composite_productpages)){
						    foreach($composite_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('composite_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
					</div>
					<div class="form-holder">
						<h3><?php echo $aluminium_productpage_name; ?></h3>
						<div class="form-inner">
							<div class="frow headings">
							    <div><strong>Number of Sets</strong></div>
							    <div><strong>Position</strong></div>
							    <div><strong>Opening Width</strong></div>
							    <div><strong>Opening Height</strong></div>
							    <div><strong>No. Panels Left (viewed inside)</strong></div>
							    <div><strong>No. Panels Right (viewed inside)</strong></div>
							    <div><strong>Open In</strong></div>
							    <div><strong>Open Out</strong></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('folding_doors_A_Qty'); ?></div>
							    <div>A</div>
							    <div><?php echo $form->text('folding_doors_A_Width'); ?></div>
							    <div><?php echo $form->text('folding_doors_A_Height'); ?></div>
							    <div><?php echo $form->text('folding_doors_A_Left'); ?></div>
							    <div><?php echo $form->text('folding_doors_A_Right'); ?></div>
							    <div><?php echo $form->radio('folding_doors_A_Open', 'In'); ?></div>
							    <div><?php echo $form->radio('folding_doors_A_Open', 'Out'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('folding_doors_B_Qty'); ?></div>
							    <div>B</div>
							    <div><?php echo $form->text('folding_doors_B_Width'); ?></div>
							    <div><?php echo $form->text('folding_doors_B_Height'); ?></div>
							    <div><?php echo $form->text('folding_doors_B_Left'); ?></div>
							    <div><?php echo $form->text('folding_doors_B_Right'); ?></div>
							    <div><?php echo $form->radio('folding_doors_B_Open', 'In'); ?></div>
							    <div><?php echo $form->radio('folding_doors_B_Open', 'Out'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('folding_doors_C_Qty'); ?></div>
							    <div>C</div>
							    <div><?php echo $form->text('folding_doors_C_Width'); ?></div>
							    <div><?php echo $form->text('folding_doors_C_Height'); ?></div>
							    <div><?php echo $form->text('folding_doors_C_Left'); ?></div>
							    <div><?php echo $form->text('folding_doors_C_Right'); ?></div>
							    <div><?php echo $form->radio('folding_doors_C_Open', 'In'); ?></div>
							    <div><?php echo $form->radio('folding_doors_C_Open', 'Out'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('folding_doors_D_Qty'); ?></div>
							    <div>D</div>
							    <div><?php echo $form->text('folding_doors_D_Width'); ?></div>
							    <div><?php echo $form->text('folding_doors_D_Height'); ?></div>
							    <div><?php echo $form->text('folding_doors_D_Left'); ?></div>
							    <div><?php echo $form->text('folding_doors_D_Right'); ?></div>
							    <div><?php echo $form->radio('folding_doors_D_Open', 'In'); ?></div>
							    <div><?php echo $form->radio('folding_doors_D_Open', 'Out'); ?></div>
							</div>
							<div class="frow special-reqs">
							    <div>
							        <?php echo $form->label('folding_doors_Special', 'Special requirements:'); ?> Please detail any options that you would like quoted such as a special colour, blinds and alternative glass specifications etc<br /><br />
							        <?php echo $form->textarea('folding_doors_Special'); ?>
							    </div>
							</div>


						</div>
					</div>
		
				</div>
				<div id="sliding_doors_quote_details">
					<h3>Sliding doors - We're happy to prepare alternate quotes for our range of systems, please select all items you would like a quotation for.</h3>
					<div class="col-holder">
						<p class="col checkboxes">
						<?php echo $form->label('sliding_doors_interest', $sliding_doors_productpage_name); ?>
						<?php
						// List all the product pages from the sitemap as checkboxes with page link;
						if(is_array($sliding_doors_productpages) && !empty($sliding_doors_productpages)) {
						    foreach($sliding_doors_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('sliding_doors_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
					</div>
					<div class="form-holder">
						<h3><?php echo $sliding_doors_productpage_name; ?></h3>
						<p>Please complete the quantity required, overall dimensions and total number of panels required.</p>
						<div class="form-inner">
							<div class="frow headings">
							    <div><strong>Number of Sets</strong></div>
							    <div><strong>Position</strong></div>
							    <div><strong>Opening Width</strong></div>
							    <div><strong>Opening Height</strong></div>
							    <div><strong>Total no. panels</strong></div>
							    <div><strong>Panels</strong></div>
							</div>
							<div class="frow" data-set="A">
							    <div><?php echo $form->text('Grand_Slider_A_Qty', ''); ?></div>
							    <div>A</div>
							    <div><?php echo $form->text('Grand_Slider_A_Width', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_A_Height', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_A_Panels', '', array('class' => 'spinner')); ?></div>
							    <div>
							        <?php
echo $form->select('Grand_Slider_A_Panel_1', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_2', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_3', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_4', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_5', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_6', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_7', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_A_Panel_8', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							    </div>
							</div>
							<div class="frow" data-set="B">
							    <div><?php echo $form->text('Grand_Slider_B_Qty', ''); ?></div>
							    <div>B</div>
							    <div><?php echo $form->text('Grand_Slider_B_Width', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_B_Height', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_B_Panels', '', array('class' => 'spinner')); ?></div>
							    <div>
							        <?php
echo $form->select('Grand_Slider_B_Panel_1', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_2', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_3', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_4', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_5', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_6', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_7', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_B_Panel_8', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							    </div>
							</div>
							<div class="frow" data-set="C">
							    <div><?php echo $form->text('Grand_Slider_C_Qty', ''); ?></div>
							    <div>C</div>
							    <div><?php echo $form->text('Grand_Slider_C_Width', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_C_Height', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_C_Panels', '', array('class' => 'spinner')); ?></div>
							    <div>
							        <?php
echo $form->select('Grand_Slider_C_Panel_1', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_2', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_3', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_4', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_5', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_6', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_7', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_C_Panel_8', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							    </div>
							</div>
							<div class="frow" data-set="D">
							    <div><?php echo $form->text('Grand_Slider_D_Qty', ''); ?></div>
							    <div>D</div>
							    <div><?php echo $form->text('Grand_Slider_D_Width', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_D_Height', ''); ?></div>
							    <div><?php echo $form->text('Grand_Slider_D_Panels', '', array('class' => 'spinner')); ?></div>
							    <div>
							        <?php
echo $form->select('Grand_Slider_D_Panel_1', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_2', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_3', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_4', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_5', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_6', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_7', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							        <?php
echo $form->select('Grand_Slider_D_Panel_8', array('Pick' => '', 'Fixed' => 'F', 'Sliding' => 'S', 'Wall' => 'W'), null, array('class' => 'mainInp panelOpt', 'disabled' => 'disabled')); 
?>
							    </div>
							</div>
							<div class="frow special-reqs">
							    <div>
							    	<p>Each square on the right indicates a panel, please indicate, using the drop down box, which panels are sliding (S), which are fixed (F) and indicate any extended track sections with a W to indicate where panels slide behind a wall. In extended track circumstances, please provide the width excluding the extended track. For assistance please contact our sales department on 01603 408804.</p>

							        <?php echo $form->label('sliding_doors_Special', 'Special requirements:'); ?> Please detail any options that you would like quoted such as a special colour and alternative glass specifications etc. Please note integrated Venetian Blinds are incompatible with Sliding Doors.<br /><br />
							        <?php echo $form->textarea('sliding_doors_Special'); ?>
							    </div>
							</div>
						</div>
					</div>
		
				</div>
				<div id="slide_turn_systems_quote_details">
					<h3>Slide and Turn Systems for Internal Use – We're happy to prepare alternate quotes for our range of systems, please select all items you would like a quotation for.</h3>
					<div class="col-holder">
						<p class="col checkboxes">
						<?php echo $form->label('sliding_turn_systems_interest', $sliding_turn_systems_productpage_name); ?>
						<?php
						// List all the product pages from the sitemap as checkboxes with page link;
						if(is_array($sliding_turn_systems_productpages) && !empty($sliding_turn_systems_productpages)) {
						    foreach($sliding_turn_systems_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('sliding_turn_systems_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
					</div>
					<div class="form-holder">
						<h3><?php echo $sliding_turn_systems_productpage_name; ?></h3>
						<div class="form-inner">
							<div class="frow headings">
							    <div><strong>Qty (number of door-sets)</strong></div>
							    <div><strong>Position</strong></div>
							    <div><strong>Overall Width</strong></div>
							    <div><strong>Overall Height</strong></div>
							    <div><strong>No. Panels Left (viewed from inside)</strong></div>
							    <div><strong>No. Panels Right (viewed from inside)</strong></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('sliding_turn_A_Qty'); ?></div>
							    <div>Set A</div>
							    <div><?php echo $form->text('sliding_turn_A_Width'); ?></div>
							    <div><?php echo $form->text('sliding_turn_A_Height'); ?></div>
							    <div><?php echo $form->text('sliding_turn_A_Left'); ?></div>
							    <div><?php echo $form->text('sliding_turn_A_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('sliding_turn_B_Qty'); ?></div>
							    <div>Set B</div>
							    <div><?php echo $form->text('sliding_turn_B_Width'); ?></div>
							    <div><?php echo $form->text('sliding_turn_B_Height'); ?></div>
							    <div><?php echo $form->text('sliding_turn_B_Left'); ?></div>
							    <div><?php echo $form->text('sliding_turn_B_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('sliding_turn_C_Qty'); ?></div>
							    <div>Set C</div>
							    <div><?php echo $form->text('sliding_turn_C_Width'); ?></div>
							    <div><?php echo $form->text('sliding_turn_C_Height'); ?></div>
							    <div><?php echo $form->text('sliding_turn_C_Left'); ?></div>
							    <div><?php echo $form->text('sliding_turn_C_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('sliding_turn_D_Qty'); ?></div>
							    <div>Set D</div>
							    <div><?php echo $form->text('sliding_turn_D_Width'); ?></div>
							    <div><?php echo $form->text('sliding_turn_D_Height'); ?></div>
							    <div><?php echo $form->text('sliding_turn_D_Left'); ?></div>
							    <div><?php echo $form->text('sliding_turn_D_Right'); ?></div>
							</div>
							<div class="frow special-reqs">
							    <div>
							        <?php echo $form->label('sliding_turn_Special', 'Special requirements:'); ?> Please detail any options that you would like quoted such as a special colour, alternative glass specifications etc<br /><br />
							        <?php echo $form->textarea('sliding_turn_Special'); ?>
							    </div>
							</div>



						</div>
					</div>
		
				</div>
				<div id="moveable_walls_quote_details">
					<h3>Moveable Walls (HSW)</h3>
					<div class="col-holder">
						<p class="col checkboxes">
						<?php echo $form->label('moveable_walls_interest', $moveable_walls_productpage_name); ?>
						<?php
						// List all the product pages from the sitemap as checkboxes with page link;
						if(is_array($moveable_walls_productpages) && !empty($moveable_walls_productpages)) {
						    foreach($moveable_walls_productpages as $page){
						        $page_name = $page->getCollectionName();
						        $page_id = $page->getCollectionID();
								$nh = Loader::helper('navigation');
								$page_url = $nh->getCollectionURL($page);
						        echo '<span>' . $form->checkbox('moveable_walls_interest[]', $page_name) . ' <a href="' . $page_url . '" target="_blank">' . $page_name . '</a></span>';
						    }
						} ?>
						</p>
					</div>
					<div class="form-holder">
						<h3><?php echo $moveable_walls_productpage_name; ?></h3>
						<div class="form-inner">
							<div class="frow headings">
							    <div><strong>Qty (number of door-sets)</strong></div>
							    <div><strong>Position</strong></div>
							    <div><strong>Overall Width</strong></div>
							    <div><strong>Overall Height</strong></div>
							    <div><strong>No. Panels Left (viewed from inside)</strong></div>
							    <div><strong>No. Panels Right (viewed from inside)</strong></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('HSW_A_Qty'); ?></div>
							    <div>Set A</div>
							    <div><?php echo $form->text('HSW_A_Width'); ?></div>
							    <div><?php echo $form->text('HSW_A_Height'); ?></div>
							    <div><?php echo $form->text('HSW_A_Left'); ?></div>
							    <div><?php echo $form->text('HSW_A_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('HSW_B_Qty'); ?></div>
							    <div>Set B</div>
							    <div><?php echo $form->text('HSW_B_Width'); ?></div>
							    <div><?php echo $form->text('HSW_B_Height'); ?></div>
							    <div><?php echo $form->text('HSW_B_Left'); ?></div>
							    <div><?php echo $form->text('HSW_B_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('HSW_C_Qty'); ?></div>
							    <div>Set C</div>
							    <div><?php echo $form->text('HSW_C_Width'); ?></div>
							    <div><?php echo $form->text('HSW_C_Height'); ?></div>
							    <div><?php echo $form->text('HSW_C_Left'); ?></div>
							    <div><?php echo $form->text('HSW_C_Right'); ?></div>
							</div>
							<div class="frow">
							    <div><?php echo $form->text('HSW_D_Qty'); ?></div>
							    <div>Set D</div>
							    <div><?php echo $form->text('HSW_D_Width'); ?></div>
							    <div><?php echo $form->text('HSW_D_Height'); ?></div>
							    <div><?php echo $form->text('HSW_D_Left'); ?></div>
							    <div><?php echo $form->text('HSW_D_Right'); ?></div>
							</div>
							<div class="frow special-reqs">
							    <div>
							        <?php echo $form->label('moveable_walls_Special', 'Special requirements:'); ?> Please detail any options that you would like quoted such as a special colour, blinds and alternative glass specifications etc<br /><br />
							        <?php echo $form->textarea('moveable_walls_Special'); ?></div>
							</div>



						</div>
					</div>
		
				</div>
				<div id="windows_quote_details">
					<h3>Windows</h3>
					<div class="col-holder">
						<p>Please supply a sketch of design(s) with sizes using the form below, Email: sales@idsystems.co.uk or Fax: 01603 258648 
						<?php // echo $form->label('moveable_walls_interest', $moveable_walls_productpage_name); ?>
						</p>
						<p>
							To upload files, just click the "Browse..." button below. <!--, OR you can Drag &amp; Drop files from your desktop, Windows Explorer or Mac Finder directly onto the Upload a file area.-->
							The maximum file size is 8MB and the allowed file types are .dxf, .dwg, .dwf, .doc, .docx, .txt, .rtf, .pdf, .cad, .bmp, .dib, .gif, .jpg, .jpeg, .png 
						</p>
					</div>
					<div class="form-holder">
						<div class="form-inner">
							<div class="frow headings">
							    <div><?php echo $form->label('window_designs', 'Upload your Windows file(s)'); ?></div>
							</div>
							<div class="frow">
							    <div>
							        <?php echo $form->file('window_designs'); ?></div>							    
							</div>
						</div>
					</div>
		
				</div>
				<div id="roofs_quote_details">
					<h3>Roofs</h3>
					<div class="col-holder">
						<p>Please supply a sketch of design(s) with sizes using the form below, Email: sales@idsystems.co.uk or Fax: 01603 258648 
						<?php // echo $form->label('moveable_walls_interest', $moveable_walls_productpage_name); ?>
						</p>
						<p>
							To upload files, just click the "Browse..." button below. <!--, OR you can Drag &amp; Drop files from your desktop, Windows Explorer or Mac Finder directly onto the Upload a file area.-->
							The maximum file size is 8MB and the allowed file types are .dxf, .dwg, .dwf, .doc, .docx, .txt, .rtf, .pdf, .cad, .bmp, .dib, .gif, .jpg, .jpeg, .png 
						</p>
					</div>
					<div class="form-holder">
						<div class="form-inner">
							<div class="frow headings">
							    <div><?php echo $form->label('roof_designs', 'Upload your Roof file(s)'); ?></div>
							</div>
							<div class="frow">
							    <div>
							        <?php echo $form->file('roof_designs'); ?></div>							    
							</div>
						</div>
					</div>
		
				</div>
				<div id="glass_balustrades_quote_details">
					<h3>Glass Balustrades</h3>
					<div class="col-holder">
					</div>
					<div class="form-holder">
						<div class="form-inner">
							<div class="frow headings">
	                            <div><strong>Qty</strong></div>
	                            <div><strong>Position</strong></div>
	                            <div><strong>Overall Width</strong></div>
	                            <div><strong>Internal or External</strong></div>
	                            <div><strong>Handrail Required</strong></div>
	                        </div>
	                        <div class="frow">
	                            <div><?php echo $form->text('Glass_Balustrades_A_Qty'); ?></div>
	                            <div>Set A</div>
	                            <div><?php echo $form->text('Glass_Balustrades_A_Width'); ?></div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_A_Internal_External" name="Glass_Balustrades_A_Internal_External">
	                                    <option value="Internal">Internal</option>
	                                    <option value="External">External</option>
	                                </select>
	                            </div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_A_Handrail" name="Glass_Balustrades_A_Handrail">
	                                    <option value="Yes">Yes</option>
	                                    <option value="No">No</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="frow">
	                            <div><?php echo $form->text('Glass_Balustrades_B_Qty'); ?></div>
	                            <div>Set B</div>
	                            <div><?php echo $form->text('Glass_Balustrades_B_Width'); ?></div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_B_Internal_External" name="Glass_Balustrades_B_Internal_External">
	                                    <option value="Internal">Internal</option>
	                                    <option value="External">External</option>
	                                </select>
	                            </div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_B_Handrail" name="Glass_Balustrades_B_Handrail">
	                                    <option value="Yes">Yes</option>
	                                    <option value="No">No</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="frow">
	                            <div><?php echo $form->text('Glass_Balustrades_C_Qty'); ?></div>
	                            <div>Set C</div>
	                            <div> <?php echo $form->text('Glass_Balustrades_C_Width'); ?></div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_C_Internal_External" name="Glass_Balustrades_C_Internal_External">
	                                    <option value="Internal">Internal</option>
	                                    <option value="External">External</option>
	                                </select>
	                            </div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_C_Handrail" name="Glass_Balustrades_C_Handrail">
	                                    <option value="Yes">Yes</option>
	                                    <option value="No">No</option>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="frow">
	                            <div><?php echo $form->text('Glass_Balustrades_D_Qty'); ?></div>
	                            <div>Set D</div>
	                            <div><?php echo $form->text('Glass_Balustrades_D_Width'); ?></div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_D_Internal_External" name="Glass_Balustrades_D_Internal_External">
	                                    <option value="Internal">Internal</option>
	                                    <option value="External">External</option>
	                                </select>
	                            </div>
	                            <div>
	                                <select class="mainInp" id="Glass_Balustrades_D_Handrail" name="Glass_Balustrades_D_Handrail">
	                                    <option value="Yes">Yes</option>
	                                    <option value="No">No</option>
	                                </select>
	                            </div>
	                        </div>

						</div>
					</div>
		
				</div>
				<!--p class="btn-submit">
					<button class="btn" type="submit" value="Submit"><span></span> Get a quote</button>
				</p-->
			</div>
		</section>
	</div>
</fieldset>

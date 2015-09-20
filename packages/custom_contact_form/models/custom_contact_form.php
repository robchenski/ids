<?php defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Custom Contact Form version 3.0, by Jordan Lev
 *
 * See https://github.com/jordanlev/c5_custom_contact_form for instructions
 */

class CustomContactForm {
	
	/**
	 * FORM & FIELD DEFINITIONS
	 *
	 * The array key for each form should correspond to a template file in the 
	 * /packages/custom_contact_form/blocks/custom_contact_form/view_form_fields/ directory
	 * (for example, a key of "my_first_form" would require a file named "my_first_form.php").
	 *
	 * The list of 'fields' for each form determines what data will be saved to the database.
	 * Each field in the list must have a key that matches the html input "name"
	 * (as per the form markup), followed by an array of settings.
	 *
	 * NOTE: The settings below only to PROCESSING form submissions, NOT the form display!
	 *       It is entirely up to you to output the html markup for each field
	 *       by creating/editing files in the block's /view_form_fields/ folder.
	 *
	 *
	 * Available settings for each field:
	 *
	 *  'label': Human-readable field name that gets displayed in error messages,
	 *           notification emails, and dashboard report.
	 *
	 *  'exclude_from_dashboard': Set this to true if you do not want this field displayed
	 *                            in the dashboard report.
	 *
	 *  'exclude_from_notification': Set this to true if you do not want this field displayed
	 *                               in the notification email.
	 *
	 *  'reply_to': Set this to true on an email field to use the user-supplied address
	 *              as the "reply-to" in notification emails.
	 *
	 *  'required': Set this to true if you want to validate that a value was provided on a form field.
	 *
	 *  'maxlength': By default, all fields are capped at 250 characters
	 *               (to avoid overly-large database records if bots submit extremely large values).
	 *               But you can set this to any number if you want to override the 250 character
	 *               limit (useful for textarea fields).
	 *               If you want no limit, you can set this to 0 or false,
	 *               but I don't recommend that (better to set it to an arbitrarily
	 *               high value, like 5000 or 10000).
	 *
	 *  'email': Set this to true if you want to validate that a submitted value
	 *           is an email address (does a *very* loose validation -- only checks
	 *           for an "@" symbol and a "." period).
	 *
	 *  'fileset': The existence of this setting on a field denotes that it is a file upload.
	 *             The setting should be the name of a file set. Valid uploaded files will be
	 *             saved to the file manager and placed in this file set. It is highly recommended
	 *             that you restrict access to this file set via advanced permissions!
	 *
	 *             Note that Concrete5 has a list of allowed file types, which you can configure here:
	 *             `Dashboard > System & Settings > Permissions & Access > Allowed File Types`
	 *             Users will only be allowed to upload files having extensions in this list!
	 *
	 *  'maxbytes': Max file size (in bytes) for file uploads. Note that this doesn't override
	 *              php's `upload_max_filesize` or `post_max_size` settings.
	 *
	 *  NOTE THAT IF YOU ARE ALLOWING FILE UPLOADS, YOU SHOULD ENABLED ADVANCED PERMISSIONS
	 *  AND RESTRICT ACCESS TO THE FILE SET THAT YOU ARE ADDING THE FILES TO!!!
	 *  ...
	 *  Why? Because files in the file manager are always publicly viewable by default!
	 *  It is not difficult for someone to guess that a download url of
	 *  http://example.com/download_file/47 (for example) could be changed
	 *  to something like /download_file/48 or /download_file/49.
	 *  Hence you should set permissions on the file set so that only admins can view its files
	 *  (and the only way to assign permissions to a file set is by enabling "advanced permissions").
	 */
	public static $forms = array(
		'my_first_form' => array(
			'title' => 'My First Form',
			'fields' => array(
				'name' => array('label' => 'Name', 'required' => true),
				'email' => array('label' => 'Email', 'required' => true, 'email' => true, 'reply_to' => true),
				'topic' => array('label' => 'Topic', 'required' => true),
				'message' => array('label' => 'Message', 'maxlength' => 5000),
				'subscribe' => array('label' => 'Subscribe'),
			),
		),
		
		//Here is an example of a 2nd form. You can delete it if you only need 1 form...
		'site_survey_form' => array(
			'title' => 'Site Survey Form',
			'fields' => array(
				'agree' => array('label' => 'I Agree to All Statements Above', 'required' => true),
				'openings_date' => array('label' => 'Date the Opening(s) Will Be Formed', 'required' => true),
				'quote_ref' => array('label' => 'Quotation Reference', 'required' => true),
				'client_name' => array('label' => 'Client Name', 'required' => true),
				'company_name' => array('label' => 'Company'),
				'telephone_number' => array('label' => 'Telephone Number', 'required' => true),
				'email' => array('label' => 'Email', 'required' => true, 'email' => true, 'reply_to' => true),
				'site_postcode' => array('label' => 'Site Postcode', 'required' => true),
				'address_line_1' => array('label' => '1st Line Site Address', 'required' => true),
				'site_contact_name' => array('label' => 'Site Contact Name', 'required' => true),
				'site_contact_number' => array('label' => 'Site Contact Number', 'required' => true),
				'site_contact_email' => array('label' => 'Site Contact Email', 'required' => true, 'email' => true),
				'whom_to_contact' => array('label' => 'Who Should we Contact to Arrange the Survey?', 'required' => true),
				'nearest_car_park' => array('label' => 'Nearest Car Parking', 'required' => true),
				'details_samples' => array('label' => 'Detail and Samples Required'),
			),
		),

		//Here is an example of a 2nd form. You can delete it if you only need 1 form...
		'ids_page_quote_form' => array(
			'title' => 'Quick Quote Form',
			'fields' => array(
				'firstname' => array('label' => 'First Name', 'required' => true),
				'lastname' => array('label' => 'Last Name', 'required' => true),
				'email' => array('label' => 'Email', 'required' => true, 'email' => true, 'reply_to' => true),
				'telephone' => array('label' => 'Telephone #'),
				'postcode' => array('label' => 'Postcode'),
				'house' => array('label' => 'House Name/No.'),
				'opening_width' => array('label' => 'Opening Width'),
				'opening_height' => array('label' => 'Opening Height'),
				'interest' => array('label' => 'I am interested in'),
				'other' => array('label' => 'Other interests', 'maxlength' => 5000),
				'material' => array('label' => 'Material choice'),
				//'interest' => array('label' => 'Proposal', 'required' => true, 'maxbytes' => 2000000, 'fileset' => 'Uploaded Proposals'), //<--REMEMBER TO ENABLE ADVANCED PERMISSIONS AND RESTRICT ACCESS TO THE FILE SET!
			),
		),

		//Here is an example of a 2nd form. You can delete it if you only need 1 form...
		'ids_full_quote_form' => array(
			'title' => 'Full Quote Form',
			'fields' => array(
				'customer_title' => array('label' => 'Title:', 'required' => true),
				'firstname' => array('label' => 'Firstname:', 'required' => true),
				'surname' => array('label' => 'Surname:', 'required' => true),
				'email' => array('label' => 'Email:', 'required' => true, 'email' => true, 'reply_to' => true),
				'telephone' => array('label' => 'Phone Number:'),
				'customer_type' => array('label' => 'Customer Type:', 'required' => true),
				'project_type' => array('label' => 'Type of project:', 'required' => true),
				'company' => array('label' => 'Are you a company?'),
				'company_name' => array('label' => 'Company name:'),
				'interest' => array('label' => 'I am interested in the following products:', 'required' => true),
				'heard_about_us' => array('label' => 'Where did you hear about us?', 'required' => true),
				'heard_about_us_magazine' => array('label' => 'Which Magazine / Newspaper?'),
				'other_heard_about_us_magazine' => array('label' => 'Other Magazine / Newspaper source:'),
				'heard_about_us_exhibition' => array('label' => 'Which Exhibition?'),
				'other_heard_about_us_exhibition' => array('label' => 'Other Exhibition source:'),
				'apprx_delivery_date' => array('label' => 'Approximate date systems needed on site:', 'required' => true),
				'not_receive_updates' => array('label' => 'Not receive updates:'),
				'address_1' => array('label' => 'Address #1:', 'required' => true),
				'address_2' => array('label' => 'Address #2:'),
				'town_city' => array('label' => 'Town / City:', 'required' => true),
				'postcode' => array('label' => 'Postcode:', 'required' => true),
				'delivery_address_1' => array('label' => 'Delivery Address #2:'),
				'delivery_address_2' => array('label' => 'Delivery Address #2:'),
				'delivery_town_city' => array('label' => 'Delivery Town / City:'),
				'delivery_postcode' => array('label' => 'Delivery Postcode:'),


'aluminium_interest' => array('label' => 'Aluminium Bi-fold doors'),
'timber_interest' => array('label' => 'Timber Bi-fold doors'),
'composite_interest' => array('label' => 'Composite Bi-fold doors'),

'folding_doors_A_Qty' => array('label' => 'folding_doors_A_Qty'),
'folding_doors_A_Width' => array('label' => 'folding_doors_A_Width'),
'folding_doors_A_Height' => array('label' => 'folding_doors_A_Height'),
'folding_doors_A_Left' => array('label' => 'folding_doors_A_Left'),
'folding_doors_A_Right' => array('label' => 'folding_doors_A_Right'),
'folding_doors_A_Open' => array('label' => 'folding_doors_A_Open'),

'folding_doors_B_Qty' => array('label' => 'folding_doors_B_Qty'),
'folding_doors_B_Width' => array('label' => 'folding_doors_B_Width'),
'folding_doors_B_Height' => array('label' => 'folding_doors_B_Height'),
'folding_doors_B_Left' => array('label' => 'folding_doors_B_Left'),
'folding_doors_B_Right' => array('label' => 'folding_doors_B_Right'),
'folding_doors_B_Open' => array('label' => 'folding_doors_B_Open'),

'folding_doors_C_Qty' => array('label' => 'folding_doors_C_Qty'),
'folding_doors_C_Width' => array('label' => 'folding_doors_C_Width'),
'folding_doors_C_Height' => array('label' => 'folding_doors_C_Height'),
'folding_doors_C_Left' => array('label' => 'folding_doors_C_Left'),
'folding_doors_C_Right' => array('label' => 'folding_doors_C_Right'),
'folding_doors_C_Open' => array('label' => 'folding_doors_C_Open'),

'folding_doors_D_Qty' => array('label' => 'folding_doors_D_Qty'),
'folding_doors_D_Width' => array('label' => 'folding_doors_D_Width'),
'folding_doors_D_Height' => array('label' => 'folding_doors_D_Height'),
'folding_doors_D_Left' => array('label' => 'folding_doors_D_Left'),
'folding_doors_D_Right' => array('label' => 'folding_doors_D_Right'),
'folding_doors_D_Open' => array('label' => 'folding_doors_D_Open'),

'folding_doors_Special' => array('label' => 'Special Bi-fold requirements:', 'maxlength' => 5000),

'sliding_doors_interest' => array('label' => 'Sliding doors'),

'Grand_Slider_A_Qty' => array('label' => 'Grand_Slider_A_Qty'),
'Grand_Slider_A_Width' => array('label' => 'Grand_Slider_A_Width'),
'Grand_Slider_A_Height' => array('label' => 'Grand_Slider_A_Height'),
'Grand_Slider_A_Panels' => array('label' => 'Grand_Slider_A_Panels'),
'Grand_Slider_A_Panel_1' => array('label' => 'Grand_Slider_A_Panel_1'),
'Grand_Slider_A_Panel_2' => array('label' => 'Grand_Slider_A_Panel_2'),
'Grand_Slider_A_Panel_3' => array('label' => 'Grand_Slider_A_Panel_3'),
'Grand_Slider_A_Panel_4' => array('label' => 'Grand_Slider_A_Panel_4'),
'Grand_Slider_A_Panel_5' => array('label' => 'Grand_Slider_A_Panel_5'),
'Grand_Slider_A_Panel_6' => array('label' => 'Grand_Slider_A_Panel_6'),
'Grand_Slider_A_Panel_7' => array('label' => 'Grand_Slider_A_Panel_7'),
'Grand_Slider_A_Panel_8' => array('label' => 'Grand_Slider_A_Panel_8'),

'Grand_Slider_B_Qty' => array('label' => 'Grand_Slider_B_Qty'),
'Grand_Slider_B_Width' => array('label' => 'Grand_Slider_B_Width'),
'Grand_Slider_B_Height' => array('label' => 'Grand_Slider_B_Height'),
'Grand_Slider_B_Panels' => array('label' => 'Grand_Slider_B_Panels'),
'Grand_Slider_B_Panel_1' => array('label' => 'Grand_Slider_B_Panel_1'),
'Grand_Slider_B_Panel_2' => array('label' => 'Grand_Slider_B_Panel_2'),
'Grand_Slider_B_Panel_3' => array('label' => 'Grand_Slider_B_Panel_3'),
'Grand_Slider_B_Panel_4' => array('label' => 'Grand_Slider_B_Panel_4'),
'Grand_Slider_B_Panel_5' => array('label' => 'Grand_Slider_B_Panel_5'),
'Grand_Slider_B_Panel_6' => array('label' => 'Grand_Slider_B_Panel_6'),
'Grand_Slider_B_Panel_7' => array('label' => 'Grand_Slider_B_Panel_7'),
'Grand_Slider_B_Panel_8' => array('label' => 'Grand_Slider_B_Panel_8'),

'Grand_Slider_C_Qty' => array('label' => 'Grand_Slider_C_Qty'),
'Grand_Slider_C_Width' => array('label' => 'Grand_Slider_C_Width'),
'Grand_Slider_C_Height' => array('label' => 'Grand_Slider_C_Height'),
'Grand_Slider_C_Panels' => array('label' => 'Grand_Slider_C_Panels'),
'Grand_Slider_C_Panel_1' => array('label' => 'Grand_Slider_C_Panel_1'),
'Grand_Slider_C_Panel_2' => array('label' => 'Grand_Slider_C_Panel_2'),
'Grand_Slider_C_Panel_3' => array('label' => 'Grand_Slider_C_Panel_3'),
'Grand_Slider_C_Panel_4' => array('label' => 'Grand_Slider_C_Panel_4'),
'Grand_Slider_C_Panel_5' => array('label' => 'Grand_Slider_C_Panel_5'),
'Grand_Slider_C_Panel_6' => array('label' => 'Grand_Slider_C_Panel_6'),
'Grand_Slider_C_Panel_7' => array('label' => 'Grand_Slider_C_Panel_7'),
'Grand_Slider_C_Panel_8' => array('label' => 'Grand_Slider_C_Panel_8'),

'Grand_Slider_D_Qty' => array('label' => 'Grand_Slider_D_Qty'),
'Grand_Slider_D_Width' => array('label' => 'Grand_Slider_D_Width'),
'Grand_Slider_D_Height' => array('label' => 'Grand_Slider_D_Height'),
'Grand_Slider_D_Panels' => array('label' => 'Grand_Slider_D_Panels'),
'Grand_Slider_D_Panel_1' => array('label' => 'Grand_Slider_D_Panel_1'),
'Grand_Slider_D_Panel_2' => array('label' => 'Grand_Slider_D_Panel_2'),
'Grand_Slider_D_Panel_3' => array('label' => 'Grand_Slider_D_Panel_3'),
'Grand_Slider_D_Panel_4' => array('label' => 'Grand_Slider_D_Panel_4'),
'Grand_Slider_D_Panel_5' => array('label' => 'Grand_Slider_D_Panel_5'),
'Grand_Slider_D_Panel_6' => array('label' => 'Grand_Slider_D_Panel_6'),
'Grand_Slider_D_Panel_7' => array('label' => 'Grand_Slider_D_Panel_7'),
'Grand_Slider_D_Panel_8' => array('label' => 'Grand_Slider_D_Panel_8'),

'sliding_doors_Special' => array('label' => 'Special Sliding doors requirements:', 'maxlength' => 5000),

'sliding_turn_systems_interest' => array('label' => 'Slide and Turn Systems'),

'sliding_turn_A_Qty' => array('label' => 'sliding_turn_A_Qty'),
'sliding_turn_A_Width' => array('label' => 'sliding_turn_A_Width'),
'sliding_turn_A_Height' => array('label' => 'sliding_turn_A_Height'),
'sliding_turn_A_Left' => array('label' => 'sliding_turn_A_Left'),
'sliding_turn_A_Right' => array('label' => 'sliding_turn_A_Right'),

'sliding_turn_B_Qty' => array('label' => 'sliding_turn_B_Qty'),
'sliding_turn_B_Width' => array('label' => 'sliding_turn_B_Width'),
'sliding_turn_B_Height' => array('label' => 'sliding_turn_B_Height'),
'sliding_turn_B_Left' => array('label' => 'sliding_turn_B_Left'),
'sliding_turn_B_Right' => array('label' => 'sliding_turn_B_Right'),

'sliding_turn_C_Qty' => array('label' => 'sliding_turn_C_Qty'),
'sliding_turn_C_Width' => array('label' => 'sliding_turn_C_Width'),
'sliding_turn_C_Height' => array('label' => 'sliding_turn_C_Height'),
'sliding_turn_C_Left' => array('label' => 'sliding_turn_C_Left'),
'sliding_turn_C_Right' => array('label' => 'sliding_turn_C_Right'),

'sliding_turn_D_Qty' => array('label' => 'sliding_turn_D_Qty'),
'sliding_turn_D_Width' => array('label' => 'sliding_turn_D_Width'),
'sliding_turn_D_Height' => array('label' => 'sliding_turn_D_Height'),
'sliding_turn_D_Left' => array('label' => 'sliding_turn_D_Left'),
'sliding_turn_D_Right' => array('label' => 'sliding_turn_D_Right'),

'sliding_turn_Special' => array('label' => 'Special Slide and Turn requirements:', 'maxlength' => 5000),

'moveable_walls_interest' => array('label' => 'Moveable Walls'),

'HSW_A_Qty' => array('label' => 'HSW_A_Qty'),
'HSW_A_Width' => array('label' => 'HSW_A_Width'),
'HSW_A_Height' => array('label' => 'HSW_A_Height'),
'HSW_A_Left' => array('label' => 'HSW_A_Left'),
'HSW_A_Right' => array('label' => 'HSW_A_Right'),

'HSW_B_Qty' => array('label' => 'HSW_B_Qty'),
'HSW_B_Width' => array('label' => 'HSW_B_Width'),
'HSW_B_Height' => array('label' => 'HSW_B_Height'),
'HSW_B_Left' => array('label' => 'HSW_B_Left'),
'HSW_B_Right' => array('label' => 'HSW_B_Right'),

'HSW_C_Qty' => array('label' => 'HSW_C_Qty'),
'HSW_C_Width' => array('label' => 'HSW_C_Width'),
'HSW_C_Height' => array('label' => 'HSW_C_Height'),
'HSW_C_Left' => array('label' => 'HSW_C_Left'),
'HSW_C_Right' => array('label' => 'HSW_C_Right'),

'HSW_D_Qty' => array('label' => 'HSW_D_Qty'),
'HSW_D_Width' => array('label' => 'HSW_D_Width'),
'HSW_D_Height' => array('label' => 'HSW_D_Height'),
'HSW_D_Left' => array('label' => 'HSW_D_Left'),
'HSW_D_Right' => array('label' => 'HSW_D_Right'),

'moveable_walls_Special' => array('label' => 'Special Moveable walls requirements:', 'maxlength' => 5000),


				'window_designs' => array('label' => 'Window designs:', 'maxbytes' => 8388608, 'fileset' => 'Window designs'), //<--REMEMBER TO ENABLE ADVANCED PERMISSIONS AND RESTRICT ACCESS TO THE FILE SET!
				'roof_designs' => array('label' => 'Roof designs:', 'maxbytes' => 8388608, 'fileset' => 'Roof designs'), //<--REMEMBER TO ENABLE ADVANCED PERMISSIONS AND RESTRICT ACCESS TO THE FILE SET!

'Glass_Balustrades_A_Qty' => array('label' => 'Glass_Balustrades_A_Qty'),
'Glass_Balustrades_A_Width' => array('label' => 'Glass_Balustrades_A_Width'),
'Glass_Balustrades_A_Internal_External' => array('label' => 'Glass_Balustrades_A_Internal_External'),
'Glass_Balustrades_A_Handrail' => array('label' => 'Glass_Balustrades_A_Handrail'),

'Glass_Balustrades_B_Qty' => array('label' => 'Glass_Balustrades_B_Qty'),
'Glass_Balustrades_B_Width' => array('label' => 'Glass_Balustrades_B_Width'),
'Glass_Balustrades_B_Internal_External' => array('label' => 'Glass_Balustrades_B_Internal_External'),
'Glass_Balustrades_B_Handrail' => array('label' => 'Glass_Balustrades_B_Handrail'),

'Glass_Balustrades_C_Qty' => array('label' => 'Glass_Balustrades_C_Qty'),
'Glass_Balustrades_C_Width' => array('label' => 'Glass_Balustrades_C_Width'),
'Glass_Balustrades_C_Internal_External' => array('label' => 'Glass_Balustrades_C_Internal_External'),
'Glass_Balustrades_C_Handrail' => array('label' => 'Glass_Balustrades_C_Handrail'),

'Glass_Balustrades_D_Qty' => array('label' => 'Glass_Balustrades_D_Qty'),
'Glass_Balustrades_D_Width' => array('label' => 'Glass_Balustrades_D_Width'),
'Glass_Balustrades_D_Internal_External' => array('label' => 'Glass_Balustrades_D_Internal_External'),
'Glass_Balustrades_D_Handrail' => array('label' => 'Glass_Balustrades_D_Handrail'),

			),
		),	
		//3rd form would go here, etc...
		// 'yet_another_form' => array(
		// 	'title' => 'Yet Another Form',
		// 	'fields' => array(
		// 		'whatever' => array('label' => 'Whatever'),
		// 		'etc' => array('label' => 'Etcetera'),
		// 	),
		// ),
	);
	
	
	//Spam honeypot settings (you probably don't need to change these, but you can if you want).
	// Note that while it is tempting to use real-sounding names for the honeypot fields,
	// this can cause problems with peoples' browsers auto-filling saved values
	// (see http://news.ycombinator.com/item?id=3300135 and http://news.ycombinator.com/item?id=3301110).
	public static $honeypot_blank_field_name = 'honeypot1'; //name of hidden field that is empty and should stay empty upon form submission
	public static $honeypot_blank_field_label = 'Leave Blank'; //lets people using screenreaders know that this field should not be filled in
	public static $honeypot_retained_field_name = 'honeypot2'; //name of hidden field that contains a specific value and should retain that value upon form submission
	public static $honeypot_retained_field_value = '7'; //arbitrary value
	
	
///////////////////////////////////////////////////////////////////////////////////////////////////
// YOU PROBABLY WON'T EVER NEED TO CHANGE ANYTHING BELOW HERE
///////////////////////////////////////////////////////////////////////////////////////////////////
	
	public static function getFormKeysAndTitles($sanitize_titles = true) {
		$th = Loader::helper('text');
		$keys_and_titles = array();
		foreach (self::$forms as $key => $info) {
			$keys_and_titles[$key] = $sanitize_titles ? $th->entities($info['title']) : $info['title'];
		}
		return $keys_and_titles;
	}
	
	public static function hasFileFields($form_key) {
		return (bool)count(self::getFileFieldNames($form_key));
	}
	
	public static function getFileFieldNames($form_key) {
		$file_field_names = array();
		foreach (self::$forms[$form_key]['fields'] as $name => $field) {
			if (!empty($field['fileset'])) {
				$file_field_names[] = $name;
			}
		}
		return $file_field_names;
	}
	
	public static function getReplyToFieldName($form_key) {
		$field_name = '';
		foreach (self::$forms[$form_key]['fields'] as $name => $field) {
			if (!empty($field['reply_to'])) {
				$field_name = $name;
				break;
			}
		}
		return $field_name;
	}
	
	public static function getFieldNamesAndLabelsForDashboardReport($form_key) {
		$fields = array();
		foreach (self::$forms[$form_key]['fields'] as $name => $field) {
			if (empty($field['exclude_from_dashboard'])) {
				$fields[$name] = $field['label'];
			}
		}
		return $fields;
	}
	
	public static function getSubmissionsForDashboardView($form_key) {
		return self::getSubmissionsForDashboard($form_key, true);
	}
	
	public static function getSubmissionsForDashboardExport($form_key) {
		return self::getSubmissionsForDashboard($form_key, false);
	}
	
	private static function getSubmissionsForDashboard($form_key, $field_values_as_escaped_html) {
		$sql = 'SELECT *'
		     . ' FROM custom_contact_form_submissions s'
		     . ' INNER JOIN custom_contact_form_submission_fields f'
		     . '   ON s.id = f.submission_id'
		     . ' WHERE s.form_key = ?'
		     . ' ORDER BY s.submitted_at DESC';
		$vals = array($form_key);
		$records = Loader::db()->GetArray($sql, $vals);
		
		$include_field_names = array_keys(self::getFieldNamesAndLabelsForDashboardReport($form_key));
		$file_field_names = self::getFileFieldNames($form_key);
		
		$submissions = array();
		foreach ($records as $record) {
			$id = $record['id'];
			if (!array_key_exists($id, $submissions)) {
				$submissions[$id] = array(
					'id' => $id,
					'submitted_at' => $record['submitted_at'],
					'ip_address' => $record['ip_address'],
					'page_cID' => $record['page_cID'],
					'page_title' => $record['page_title'],
					'fields' => array_fill_keys($include_field_names, ''), //populate all defined fields with default empty value (in case a saved record is missing a particular field)
				);
			}
			
			$th = Loader::helper('text');
			$field_name = $record['field_name'];
			if (in_array($field_name, $include_field_names)) {
				$field_value = $record['field_value'];
				if (!empty($field_value) && in_array($field_name, $file_field_names)) {
					$file = File::getByID($field_value);
					if (!empty($file->error)) {
						$field_value = t('[missing file]');
					} else if ($field_values_as_escaped_html) {
						$field_value = '<a href="' . View::url('/download_file', $file->getFileID()) . '" target="_blank">' . $th->entities($file->getFileName()) . '</a>';
					} else {
						$field_value = $file->getFileName();
					}
				} else if ($field_values_as_escaped_html) {
					$field_value = nl2br($th->entities($field_value));
				}
				$submissions[$id]['fields'][$field_name] = $field_value;
			}
		}
		
		return $submissions;
	}
	
	public static function deleteSubmissions($ids_array) {
		$safe_ids_array = array();
		foreach ($ids_array as $unsafe_id) {
			$safe_id = (int)$unsafe_id;
			if (!empty($safe_id)) {
				$safe_ids_array[] = $safe_id;
			}
		}
		
		if (empty($safe_ids_array)) {
			return;
		}
		
		$safe_ids_string = implode(',', $safe_ids_array);
		
		$db = Loader::db();
		
		$sql = "DELETE FROM custom_contact_form_submission_fields WHERE submission_id IN ({$safe_ids_string})";
		$db->Execute($sql);
		
		$sql = "DELETE FROM custom_contact_form_submissions WHERE id IN ({$safe_ids_string})";
		$db->Execute($sql);
	}

}


class CustomContactFormSubmission {
	private $form_key;
	
	private $submitted_at;
	private $ip_address;
	private $page_cID;
	private $page_title;
	
	private $field_defs = array();
	private $field_values = array();
	
	private $honeypot_blank_field_value = null;
	private $honeypot_retained_field_value = null;
	
	public function __construct($form_key, $page_cID) {
		$this->form_key = $form_key;
		
		$this->submitted_at = date('Y-m-d H:i:s');
		$this->ip_address = Loader::helper('validation/ip')->getRequestIP();
		$this->page_cID = (int)$page_cID;
		$page = Page::getByID($this->page_cID);
		$this->page_title = $page->getCollectionID() ? $page->getCollectionName() : t('[unknown page]');
		
		$this->field_defs = $this->isFormKeyValid() ? CustomContactForm::$forms[$this->form_key]['fields'] : array();
		
		foreach ($_POST as $name => $value) {
			//"whitelist" the fields we grab from POST (because it is unsafe to save arbitrary data submitted by the user)
			if (array_key_exists($name, $this->field_defs)) {
				$this->field_values[$name] = is_array($value) ? implode(', ', $value) : $value; //arrays indicate a checkbox list, so concatenate those into 1 comma-separated string
			}
		}
		
		foreach ($_FILES as $name => $file) {
			//"whitelist" files too (and make sure the field is actually defined as a file upload by checking for the 'fileset' setting)
			if (array_key_exists($name, $this->field_defs) && !empty($this->field_defs[$name]['fileset'])) {
				$this->field_values[$name] = $file;
			}
		}
		
		if (array_key_exists(CustomContactForm::$honeypot_blank_field_name, $_POST)) {
			$this->honeypot_blank_field_value = $_POST[CustomContactForm::$honeypot_blank_field_name];
		}
		
		if (array_key_exists(CustomContactForm::$honeypot_retained_field_name, $_POST)) {
			$this->honeypot_retained_field_value = $_POST[CustomContactForm::$honeypot_retained_field_name];
		}
	}
	
	public function validate() {
		$e = Loader::helper('validation/error');
		$fh = Loader::helper('validation/file');
		
		if (!$this->isFormKeyValid()) {
			$e->add(t('Cannot identify form. Please reload the page and try again.'));
		}
		
		foreach ($this->field_defs as $name => $field_def) {
			
			$field_label = empty($field_def['label']) ? $name : $field_def['label'];
			
			// if $field_def is not empty stage
			// and passes -- stage must be complete

			if (empty($field_def['fileset'])) {
				$field_is_set = array_key_exists($name, $this->field_values);
				$field_is_empty = empty($this->field_values[$name]);
				$field_value = $field_is_set ? $this->field_values[$name] : null;
			
				if (!empty($field_def['required']) && $field_is_empty) {
					$e->add(t('%s is required', $field_label));
				}
			
				if ($field_is_set && !$field_is_empty) {
					$maxlength = array_key_exists('maxlength', $field_def) ? (int)$field_def['maxlength'] : 250;
					if ($maxlength && (strlen($field_value) > $maxlength)) {
						$e->add(t('%s cannot exceed %d characters in length', $field_label, $maxlength));
					}
				
					if (!empty($field_def['email']) && !preg_match("/^\S+@\S+\.\S+$/", $field_value)) { //see: http://stackoverflow.com/questions/201323/what-is-the-best-regular-expression-for-validating-email-addresses#201447
						$e->add(t('%s is not a valid email address', $field_label));
					}
				}
			
			//file upload...
			} else {
				//handle this case now so as to simplify other logic below
				if (empty($this->field_values[$name])) {
					if (!empty($field_def['required'])) {
						$e->add(t('%s is required', $field_label));
					}
					continue;
				}
				
				$file_info = $this->field_values[$name];
				$file_info_is_valid = is_array($file_info) && isset($file_info['error']) && !is_array($file_info['error']);
				if (!$file_info_is_valid) {
					$e->add(t('%s is invalid', $field_label));
					continue;
				}
				
				if ($file_info['error'] == UPLOAD_ERR_NO_FILE) {
					if (!empty($field_def['required'])) {
						$e->add(t('%s is required', $field_label));
					}
					continue;
				}
				
				if (($file_info['error'] == UPLOAD_ERR_INI_SIZE) || ($file_info['error'] == UPLOAD_ERR_FORM_SIZE)) {
					$e->add(t('%s file size is too large', $field_label));
					continue;
				}
				
				if ($file_info['error'] != UPLOAD_ERR_OK) {
					$e->add(t('%s is invalid', $field_label));
					continue;
				}
				
				if (!is_uploaded_file($file_info['tmp_name'])) {
					$e->add(t('%s is invalid', $field_label));
					continue;
				}
				
				if (!$fh->file($file_info['tmp_name'])) {
					$e->add(t('%s is invalid', $field_label));
					continue;
				}
				
				if (!$fh->extension($file_info['name'])) {
					$e->add(t('%s file extension is not allowed', $field_label));
				}
				
				if (!empty($field_def['maxbytes']) && ($file_info['size'] > $field_def['maxbytes'])) {
					$e->add(t('%s file size is too large', $field_label));
				}
			}
		}
		
		$iph = Loader::helper('validation/ip');
		if (!$iph->check()) {
			$e->add($iph->getErrorMessage());
		}
		
		if (!empty($this->honeypot_blank_field_value)) {
			$e->add(t('ERROR: You must leave the "%s" field blank (this helps us prevent spam)', CustomContactForm::$honeypot_blank_field_label));
		}
		
		if ($this->honeypot_retained_field_value !== CustomContactForm::$honeypot_retained_field_value) {
			$e->add('Internal Server Error'); //don't give a descriptive error message for this -- it's most likely a spambot
		}
		
		//Note that we don't have to validate CSRF tokens ourselves
		// because C5 handles it for us via the $this->action() function.

		//Note that we don't validate page_cID because it's not essential information.
		
		return $e;
	}
	
	public function save() {
		//re-validate just in case...
		$e = $this->validate();
		if ($e->has()) {
			throw new Exception(t('Error: Cannot save form data because it is invalid'));
		}
		
		$db = Loader::db();
		
		$submission_data = array(
			'form_key' => $this->form_key,
			'submitted_at' => $this->submitted_at,
			'ip_address' => $this->ip_address,
			'page_cID' => $this->page_cID,
			'page_title' => $this->page_title,
		);
		$db->AutoExecute('custom_contact_form_submissions', $submission_data, 'INSERT');
		$id = $db->Insert_ID();
		
		//Put uploaded files into the file manager.
		//We must do this before saving the fields' records to the db,
		// because we need the file id's to save as the fields' values.
		$this->importUploadedFiles();
		
		foreach ($this->field_values as $name => $value) {
			//no need to check against the field definitions
			// because fields were already "whitelisted" in the constructor
			$field_data = array(
				'submission_id' => (int)$id,
				'field_name' => $name,
				'field_value' => $value,
			);
			$db->AutoExecute('custom_contact_form_submission_fields', $field_data, 'INSERT');
		}
	}
	
	public function getFormKey() { return $this->form_key; }
	public function getSubmittedAt() { return $this->submitted_at; }
	public function getIPAddress() { return $this->ip_address; }
	public function getPageCID() { return $this->page_cID; }
	public function getPageTitle() { return $this->page_title; }
	
	//Returns array of fields, each of which is an array containing a 'label' and a 'value'.
	//Fields marked as 'exclude_from_notification' are excluded.
	public function getNotificationEmailFieldLabelsAndValues() {
		$fields = array();
		foreach ($this->field_defs as $name => $field_def) {
			if (empty($field_def['exclude_from_notification'])) {
				$value = $this->field_values[$name];
				if (!empty($value) && !empty($field_def['fileset'])) {
					$file = File::getByID($value);
					$value = empty($file->error) ? (BASE_URL . View::url('/download_file', $file->getFileID()) . ' (' . $file->getFileName() . ')') : t('[missing file]');
				}
				$fields[$name] = array(
					'label' => $field_def['label'],
					'value' => $value,
				);
			}
		}
		return $fields;
	}
	
	//Returns the user-submitted "reply-to" address
	// (or empty string if no fields are designated with the 'reply-to' setting).
	public function getNotificationEmailReplyTo() {
		$field_name = CustomContactForm::getReplyToFieldName($this->form_key);
		return (empty($field_name) ? '' : $this->field_values[$field_name]);
	}
	
	public function getFormTitle() {
		return $this->isFormKeyValid() ? CustomContactForm::$forms[$this->form_key]['title'] : t('[unknown form]');
	}
	
	private function isFormKeyValid() {
		return !empty($this->form_key) && array_key_exists($this->form_key, CustomContactForm::$forms);
	}
	
	//VERY IMPORTANT: MAKE SURE YOU HAVE VALIDATED ALL FILES BEFORE CALLING THIS!!!
	private function importUploadedFiles() {
		foreach ($this->field_defs as $name => $field_def) {
			if (!empty($field_def['fileset'])) {
				if (!empty($this->field_values[$name])) {
					//Okay! Now that we've established that this field is a file upload
					// and that something was uploaded, we want to do some sanity checks
					// and if all is well, import the uploaded file to the file manager,
					// add it to the desired file set, and then put the file ID into this object's
					// values array (so the file ID is what gets saved to the database record).
					
					$file_info = $this->field_values[$name];
					$this->field_values[$name] = null; //do this now in case one of our sanity checks below fails
					
					if (!is_array($file_info) || empty($file_info['tmp_name']) || empty($file_info['name'])) {
						continue;
					}
					
					$fs = FileSet::getByName($field_def['fileset']);
					if (empty($fs)) {
						continue;
					}
					
					$fi = new FileImporter();
					$f = $fi->import($file_info['tmp_name'], $file_info['name']);
					if (!($f instanceof FileVersion)) {
						continue;
					}
					
					$fs->addFileToSet($f);
					$this->field_values[$name] = $f->getFileID();
				}
			}
		}
	}

}

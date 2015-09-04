<?php defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Custom Contact Form version 3.0, by Jordan Lev
 *
 * See https://github.com/jordanlev/c5_custom_contact_form for instructions
 */

$dom_id = "contact-form-{$bID}";
$errors = empty($errors) ? array() : $errors;
?>

<script type="text/javascript">
var contact_form_is_processing = false;
$(document).ready(function() {
	$('#<?php echo $dom_id; ?> form').ajaxForm({
		'url': '<?php echo Loader::helper('concrete/urls')->getToolsURL('ajax_submit', 'custom_contact_form'); ?>',
		'dataType': 'json',
		'data': {
			'bID': <?php echo $bID; ?>,
			'cID': <?php echo Page::getCurrentPage()->getCollectionID(); ?>,
			'ccm_token': '<?php echo Loader::helper('validation/token')->generate(); ?>'
		 },
		'beforeSubmit': function() {
			if (contact_form_is_processing) {
				return false; //prevent re-submission while waiting for response
			}
			contact_form_is_processing = true;
			$('#<?php echo $dom_id; ?> .errors').hide();
			$('#<?php echo $dom_id; ?> .errors .error-items').html('');
			$('#<?php echo $dom_id; ?> .submit').hide();
			$('#<?php echo $dom_id; ?> .processing').show();
		},
		'success': function(response) {
			contact_form_is_processing = false;
			if (response.success) {
				$('#<?php echo $dom_id; ?> .processing').hide();
				$('#<?php echo $dom_id; ?> form').fadeOut('', function() {
					$('#<?php echo $dom_id; ?> .success').fadeIn();
					$('#<?php echo $dom_id; ?> form').clearForm();
				});
			} else { //validation error
				var errorItems = '';
				for (var i = 0, len = response.errors.length; i < len; i++) {
					errorItems += '<li>' + response.errors[i] + '</li>';
				}
				$('#<?php echo $dom_id; ?> .errors .error-items').html(errorItems);
				$('#<?php echo $dom_id; ?> .errors').slideDown();
				$('#<?php echo $dom_id; ?> .processing').hide();
				$('#<?php echo $dom_id; ?> .submit').show();
				$('#<?php echo $dom_id; ?> form input, #<?php echo $dom_id; ?> form textarea').placeholder();
			}
			
			//scroll up to the success/error message
			$('body,html').animate({scrollTop : ($('#<?php echo $dom_id; ?>').offset().top - 50)}, 200);
		}
	});
	
	$('#<?php echo $dom_id; ?> form input, #<?php echo $dom_id; ?> form textarea').placeholder();
});
</script>
<style>
.js .wizard > .content > .title, 
.js .tabcontrol > .content > .title {
	display: none;
}
.js .wizard > .content, 
.js .tabcontrol > .content {
	padding: 0;
}
</style>
<div id="<?php echo $dom_id; ?>" class="custom-contact-form">

	<div class="success" style="display:<?php echo $show_thanks ? 'block' : 'none'; ?>;">
		<?php echo nl2br($thanks_msg); ?>
	</div>

	<div class="errors" style="display:<?php echo !empty($errors) ? 'block' : 'none'; ?>;">
		<span class="error-header"><?php echo t('Please correct the following errors:'); ?></span>
		<ul class="error-items">
			<?php foreach ($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<form id="stepped-form" method="post" action="<?php echo $this->action('submit'); ?>" <?php echo $has_files ? 'enctype="multipart/form-data"' : ''; ?>>
		
		<?php $this->inc($fields_template); ?>


		<?php /* Spam honeypot fields
			DEV NOTES about spam honeypot fields:
			The first field must remain blank, and the second field must retain its value.
			The combination of these 2 seems to catch about 90% of spam.

			CAUTION: Don't make a field that is "visuallyhidden" AND has a real-sounding name
			(e.g. "website" or "username"), because some browser toolbars will auto-fill data
			for legitemate users -- see http://news.ycombinator.com/item?id=3300135 and http://news.ycombinator.com/item?id=3301110
			[This doesn't apply to our current situation because we're not using a real-sounding name
			nor are we using the "visuallyhidden" technique... but just sayin' for future reference.]
			*/ ?>
			<div style="display: none;">
				<label>
					<?php echo $honeypot_blank_field_label; ?>
					<input type="text" name="<?php echo $honeypot_blank_field_name; ?>" value="" />
				</label>
			</div>
			<input type="hidden" name="<?php echo $honeypot_retained_field_name; ?>" value="<?php echo $honeypot_retained_field_value; ?>" />
		<?php /* END Spam honeypot fields */ ?>
		
		<div class="processing" style="display: none;">
			<img src="<?php echo ASSETS_URL_IMAGES; ?>/throbber_white_16.gif" width="16" height="16" alt="<?php echo t('form processing indicator'); ?>" />
			<span><?php echo t('Processing...'); ?></span>
		</div>

	</form>

<script>
    $(function () {
        $("#steps").steps({
            headerTag: "span",
            titleTemplate: '#title#',
            bodyTag: "section",
            transitionEffect: "none",
            enableFinishButton: true,
            labels: {
		        cancel: "Cancel",
		        current: "",
		        pagination: "Pagination",
		        finish: "Get a quote",
		        next: "Next",
		        previous: "Previous",
		        loading: "Loading ..."
		    },
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
		        // Always allow going backward even if the current step contains invalid fields!
		        if (currentIndex > newIndex)
		        {
		            return true;
		        }

		        var form = $("#stepped-form");
	            form.validate().settings.ignore = ":disabled,:hidden";
	            return form.valid();

		    },
		    onStepChanged: function (event, currentIndex, priorIndex)
		    {


		    },
		    onFinishing: function (event, currentIndex)
		    {
		        var form = $("#stepped-form");
		 
		        // Disable validation on fields that are disabled.
		        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
		        form.validate().settings.ignore = ":disabled";
		 
		        // Start validation; Prevent form submission if false
		        return form.valid();
		    },
		    onFinished: function (event, currentIndex)
		    {
		        var form = $("#stepped-form");
		         
		        // Submit form input
		        form.submit();
		    }
    	});
		$("#stepped-form").validate({
			debug: true,
			rules: {
				customer_title:{
					required: true,
				},
				firstname:{
					required: true,
				},
				surname:{
					required: true,
				},
				email: {
					required: true,
					minlength: 3,
				},
				telephone: {
					required: true,
					minlength: 3,
				},
				customer_type:{
					required: true,
				},
				project_type:{
					required: true,
				},
				'interest[]':{
					required: true,
				},
				heard_about_us:{
					required: true,
				},
				apprx_delivery_date:{
					required: true,
				},
				address_1:{
					required: true,
				},
				address_2:{
					required: true,
				},
				town_city:{
					required: true,
				},
				postcode:{
					required: true,
				},
				
			},
			messages: {
				customer_title:{
					required: "Please enter your Title.",
				},
				firstname:{
					required: "Please enter your First Name.",
				},
				surname:{
					required: "Please enter your Surname.",
				},
				email: {
					required: "Please enter your Email address.",
					emil: true,
				},
				telephone: {
					required: "Please enter your telephone number.",
					digits: true,
				},
				customer_type:{
					required: "Please enter your Customer type.",
				},
				project_type:{
					required: "Please enter your Project type.",
				},
				'interest[]':{
					required: "Please enter your type(s) of products you are interested in.",
				},
				heard_about_us:{
					required: "Please enter tell us where you heard about us.",
				},
				apprx_delivery_date:{
					required: "Please enter the approximate date you will need the systems on site.",
				},
				address_1:{
					required: "Please enter the first line of your address.",
				},
				address_2:{
					required: "Please enter the second line of your address.",
				},
				town_city:{
					required: "Please enter your Town / City.",
				},
				postcode:{
					required: "Please enter your Postcode.",
				},
			},
			//errorClass: "ids-form-input-error",
			//validClass: "ids-form-input-valid",
			showErrors: function(errorMap, errorList) {
			    var validationErrors = this.numberOfInvalids();
			    if (validationErrors) {
			    	var message = validationErrors == 1
			        	? 'You missed 1 field. It has been listed below'
			        	: 'You missed ' + validationErrors + ' fields on this step. They have been listed below';
			    	$("span.validation-error-header").html(message);
			    	//$("div.errors").show();
				} else {
			    	//$("div.errors").hide();
			    }
			    this.defaultShowErrors();
			},
		    highlight: function(element, errorClass, validClass) {
		    	//$(element).addClass(errorClass).removeClass(validClass);

		        if ($(element).is(":checkbox"))
		        {
		        //DISABLED DUE TO WEIRD STYLING    $($(element)).parents( "p" ).addClass(errorClass).removeClass(validClass);
		        }
		   		//OLD EXAMPLE $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
			},
			unhighlight: function(element, errorClass, validClass) {
		    	$(element).removeClass(errorClass).addClass(validClass);

		        if ($(element).is(":checkbox"))
		        {
		        //DISABLED DUE TO WEIRD STYLING    $($(element)).parents( "p" ).removeClass(errorClass).addClass(validClass);
		        }
		   		//OLD EXAMPLE $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
			},
			errorLabelContainer: ".validation-errors",
			wrapper: "li"

		});



// REDUNDANT .spinner() call - somewhat as using the number input on the form for 'small screen' / mobile support
// with class spinner2
        $( ".spinner" ).spinner({
        	min   :   2,
        	max   :   8
        });
		$('.ui-spinner-button').click(function() { $(this).siblings('input').change(); });
        $( ".spinner,.spinner2").change(function(){
        	var panels = $(this).val();
        	var i = 1;

        	$(this).closest('.frow').find('.panelOpt').attr('disabled','disabled');

        	var panelsTd = $(this).closest('div').next();
        	while (i <= panels) {
			//console.log($('#Grand_Slider_double_'+$(this).parents('tr').data('set')+'_Panel_'+i));
				$(panelsTd).find("select:eq("+ (i - 1) +")").removeAttr('disabled');
				i++;
			}
		});	


    });
</script>

</div>

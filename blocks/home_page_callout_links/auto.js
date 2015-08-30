ccmValidateBlockForm = function() {
	
	if ($('#field_2_image_fID-fm-value').val() == '' || $('#field_2_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Link 1');
	}

	if ($('#field_3_image_fID-fm-value').val() == '' || $('#field_3_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Link 2');
	}

	if ($('#field_4_image_fID-fm-value').val() == '' || $('#field_4_image_fID-fm-value').val() == 0) {
		ccm_addError('Missing required image: Link 3');
	}


	return false;
}

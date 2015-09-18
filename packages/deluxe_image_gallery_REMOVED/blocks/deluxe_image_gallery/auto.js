var last_selected_fsid = 0;

function ccmValidateBlockForm() {
	if ($('select#fsID').val() == '0') {
		ccm_addError('You must choose a file set.');
	}
	
	if (missingRequiredNumber('displayColumns')) {
		ccm_addError('You must enter a number of display columns.');
	}
	
	if (missingRequiredNumber('thumbWidth')) {
		ccm_addError('You must enter a numeric thumbnail width.');
	}
	
	if (missingRequiredNumber('thumbHeight')) {
		ccm_addError('You must enter a numeric thumbnail height.');
	}
	
	return false;
}

function missingRequiredNumber(id) {
	var value = $('input#'+id).val();
	return ( value == '' || isNaN(value) || parseInt(value) < 1);
}

$(document).ready(function() {
	
	$('ul#gallery-tabs li a').each( function(num,el){ 
		el.onclick=function(){
			var pane=this.id.replace('gallery-tab-','');
			showPane(pane);
		}
	});		

	refreshLightboxSettings($('input#enableLightbox').attr('checked'));
	$('input#enableLightbox').change(function() {
		refreshLightboxSettings($('input#enableLightbox').attr('checked'));
	});
	
	$('select#fsID').change(function() {
		if (this.value == -1) {
			$('#sortableThumbnails').html('');
			openFileManager();
		} else {
			displayThumbnails(this.value);
			loadProperties(this.value);
			last_selected_fsid = this.value;
		}
		toggleDragndropInstructions();
	});
	
	$('a#fileManagerLink').click(function() {
		openFileManager();
		return false;
	});

	$('#sortableThumbnails').sortable({
		containment: $('#thumbnailsContainer'),
		cursor: 'move',
		revert: 100,
		tolerance: 'pointer',
		update: serializeSortOrder
	});
});

function showPane(pane) {
	$('ul#gallery-tabs li').each(function(num,el){ $(el).removeClass('ccm-nav-active') });
	$(document.getElementById('gallery-tab-'+pane).parentNode).addClass('ccm-nav-active');
	$('div.galleryPane').each(function(num,el){ el.style.display='none'; });
	$('#galleryPane-'+pane).css('display','block');
}


function refreshLightboxSettings(enabled) {
	var labelStyle = enabled ? 'color: #4F4F4F' : 'color: #BBBBBB';
	$('.lightbox-setting label').attr('style', labelStyle);
	if (enabled) {
		$('.lightbox-setting input').removeAttr('disabled');
		$('.lightbox-setting select').removeAttr('disabled');
	} else {
		$('.lightbox-setting input').attr('disabled', 'disabled');
		$('.lightbox-setting select').attr('disabled', 'disabled');
	}
}

function refreshFilesetList(select_value) {
	var select = $('select#fsID');
	var value = (select_value == undefined) ? select.val() : select_value;
	last_selected_fsid = value;
	
	$.ajax({
		url: SG_GET_FILESETS_URL,
		dataType: 'html',
		success: function(response) {
			select.html(response);
			select.val(value);
			select.append('<option value="0">------</option><option value="-1">GO TO FILE MANAGER...</option>');
		}
	});
}

function openFileManager() {
	$.fn.dialog.open({
		width: '90%',
		height: '70%',
		modal: false,
		href: CCM_TOOLS_PATH + "/files/search_dialog?disable_choose=1",
		title: ccmi18n_filemanager.title,
		onClose: function () {
			refreshFilesetList(last_selected_fsid);
			displayThumbnails(last_selected_fsid);
			loadProperties(last_selected_fsid);
		}
	});
}

function displayThumbnails(fsID) {
	var bID = SG_BLOCK_ID ? SG_BLOCK_ID : 0;
	var area = $('#sortableThumbnails');
	var indicator = $('#thumbnailLoadingIndicator');
	fsID = (fsID < 0) ? 0 : fsID;
	
	area.html('');
	
	if (fsID == 0) {
		return;
	}
	
	indicator.show();
	
	$.ajax({
		url: SG_GET_THUMBNAILS_URL,
		data: { fsID: fsID, bID: bID },
		dataType: 'html',
		success: function(response) {
			indicator.hide();
			area.html(response);
			serializeSortOrder();
		}
	});
}

function toggleDragndropInstructions() {
	if ($('select#fsID').val() > 0) {
		$('#dragndropInstructions').show();
	} else {
		$('#dragndropInstructions').hide();
	}
}

function serializeSortOrder() {
	var ids = $('#sortableThumbnails').sortable('toArray').toString();
	$('#sortedFileIDs').val(ids);
}

function loadProperties(fsID) {
	var bID = SG_BLOCK_ID ? SG_BLOCK_ID : 0;
	var area = $('#propertiesContainer');
	var indicator = $('#propertiesLoadingIndicator');
	fsID = (fsID < 0) ? 0 : fsID;
	
	area.html('');
	
	if (fsID == 0) {
		return;
	}
	
	indicator.show();
	
	$.ajax({
		url: SG_GET_PROPERTIES_URL,
		data: { fsID: fsID, bID: bID },
		dataType: 'html',
		success: function(response) {
			indicator.hide();
			area.html(response);
		}
	});
}
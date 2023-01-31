jQuery(document).ready(function($){
	"use strict";
	var hyori_upload;
	var hyori_selector;

	function hyori_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		hyori_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( hyori_upload ) {
			hyori_upload.open();
			return;
		} else {
			// Create the media frame.
			hyori_upload = wp.media.frames.hyori_upload =  wp.media({
				// Set the title of the modal.
				title: "Select Image",

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: "Selected",
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			hyori_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = hyori_upload.state().get('selection').first();

				hyori_upload.close();
				hyori_selector.find('.upload_image').val(attachment.attributes.url).change();
				if ( attachment.attributes.type == 'image' ) {
					hyori_selector.find('.hyori_screenshot').empty().hide().prepend('<img src="' + attachment.attributes.url + '">').slideDown('fast');
				}
			});

		}
		// Finally, open the modal.
		hyori_upload.open();
	}

	function hyori_remove_file(selector) {
		selector.find('.hyori_screenshot').slideUp('fast').next().val('').trigger('change');
	}
	
	$('body').on('click', '.hyori_upload_image_action .remove-image', function(event) {
		hyori_remove_file( $(this).parent().parent() );
	});

	$('body').on('click', '.hyori_upload_image_action .add-image', function(event) {
		hyori_add_file(event, $(this).parent().parent());
	});

});
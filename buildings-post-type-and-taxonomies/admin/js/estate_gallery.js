jQuery(document).ready(function(jQuery){
	var _custom_media = true,
			_orig_send_attachment = wp.media.editor.send.attachment;

	jQuery('#thumbnail_image_upload').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {						 
			if(jQuery('#image_upload_val').val() == '')
				jQuery('#image_upload_val').val(attachment.id);
			else
			{
				oldVal = jQuery('#image_upload_val').val();
					jQuery('#image_upload_val').val(oldVal+','+attachment.id);
			}
			
			var src_str = attachment.url;
			jQuery('#image_upload_val').before('<img width=66 height=66 src='+src_str+' data-id='+attachment.id+' class=attachment-66x66 />');
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}

		wp.media.editor.open(button);
		return false;
	});

	jQuery('.add_media').on('click', function(){
		_custom_media = false;
	});
	
	jQuery('#thumbnail_sidebar').on('click','img' ,function(){
		valArr = jQuery('#image_upload_val').val().split(',');
		var index = valArr.indexOf(jQuery(this).attr('data-id'));
		if (index > -1) 
		{
			valArr.splice(index, 1);
			jQuery(this).remove();
		}
		jQuery('#image_upload_val').val(valArr.toString());
	});
});
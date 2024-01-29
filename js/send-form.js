jQuery( document ).ready(function() {
    var validEmail = false;

	jQuery("#add-real-estate-form").click(
		function(){

            //There may be field validation here
            jQuery(this).next('.invalid-feedback').css('display', 'none');
			if (validEmail && jQuery("#real-estate").val() && jQuery("#adress").val() ) {
                
				sendAjaxForm();
                return false; 
			}
			else {
                if (!validEmail) jQuery("#email").css('border-color', 'red');
                jQuery(this).next('.invalid-feedback').css('display', 'block');
                
                return false;		
			}
		}
	);
    jQuery('#email').blur(function() {
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if(pattern.test(jQuery(this).val())){
                jQuery(this).css('border-color', '#0A0A0A')
                jQuery(this).next('.invalid-feedback').css('display', 'none')
                validEmail = true
            } else {
                jQuery(this).css('border-color', 'red')
                jQuery(this).next('.invalid-feedback').css('display', 'block')
                validEmail = false
            }
    });

});

async function sendAjaxForm() {

    let form = new FormData( document.getElementById('add-real-estate'));
        form.append('action', 'save-new-real-estate');

        const request = await fetch('/wp-admin/admin-ajax.php', { method: 'POST', body: form });
                /** error checking*/
                const response = await request.text();
                console.log(response );
                if (request.ok && response!= 'err') {
                    var myModal = new bootstrap.Modal(document.getElementById('resultSendForm'));
                     myModal.show();
                     jQuery('#add-real-estate').trigger('reset');
                }
                else{
                    var myModal = new bootstrap.Modal(document.getElementById('resultSendForm'));
                    jQuery("#resultSendForm .title-modal").text ("Error");
                    jQuery("#resultSendForm .modal-message").text ("Sorry something went wrong");
                    myModal.show();
                    jQuery('#add-real-estate').trigger('reset');
                }
}

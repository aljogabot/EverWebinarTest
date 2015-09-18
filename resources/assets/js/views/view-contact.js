function ViewContactModal() {};

ViewContactModal.prototype = {

	construct : function() {
		this.init_form();
		this.init_events();
	},

	init_form : function() {

		$( 'form[name=contact-form]' ).submit(
			function( $event ) {
				$event.preventDefault();
				var $form = $( this );
				var $data 	= $form.serialize();
				var $url	= $form.attr( 'action' );

				$FormMessageService.setElement( $form );
				$FormMessageService.notify( 'Processing ...' );

				$http.post( $url, $data,
					function( $json_response ) {
						if( $json_response.success ) {
							$FormMessageService.success( $json_response.message );
							$ContactsPage.reload_table();
							$BootstrapModalService.unload();
						} else {
							$FormMessageService.error( $json_response.message );
						}
					}
				);

			}
		);

	},

	init_events : function() {

		$( '.show-custom-fields' ).click(
			function() {
				$( '#custom-fields-container' ).show();
			}
		);

	}

};

var $ViewContactModal;
$( document ).ready(
	function() {
		$ViewContactModal = new ViewContactModal();
	}
);
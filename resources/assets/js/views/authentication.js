function AuthenticationPage() {
	this.construct();
};

AuthenticationPage.prototype = {

	construct : function() {
		this.init_login_form();
		this.init_register_form();
		this.init_events();
	},

	init_events : function() {

		$( '.go-to-registration' ).click(
			function() {
				$( '#signin-container' ).hide();
				$( '#register-container' ).show();
			}
		);

		$( '.go-to-signin' ).click(
			function() {
				$( '#register-container' ).hide();
				$( '#signin-container' ).show();
			}
		);

	},

	init_login_form : function() {

		$( 'form[name=login-form]' ).submit(
			function( $event ) {
				$event.preventDefault();

				var $form   = $( this );
				var $data 	= $form.serialize();
				var $url	= $form.attr( 'action' );

				$FormMessageService.setElement( $form );
				$FormMessageService.notify( 'Processing ...' );

				$http.post( $url, $data,
					function( $json_response ) {
						if( $json_response.success ) {
							$FormMessageService.success( $json_response.message );

						} else {
							$FormMessageService.error( $json_response.message );
						}
					}
				);
			}
		);

	},

	init_register_form : function() {

		$( 'form[name=register-form]' ).submit(
			function( $event ) {
				$event.preventDefault();

				var $form   = $( this );
				var $data 	= $form.serialize();
				var $url	= $form.attr( 'action' );

				$FormMessageService.setElement( $form );
				$FormMessageService.notify( 'Processing ...' );

				$http.post( $url, $data,
					function( $json_response ) {
						if( $json_response.success ) {
							$FormMessageService.success( $json_response.message );

						} else {
							$FormMessageService.error( $json_response.message );
						}
					}
				);

			}
		);

	}

};

var $AuthenticationPage;

$( document ).ready(
	function() {
		$AuthenticationPage = new AuthenticationPage();
	}
);
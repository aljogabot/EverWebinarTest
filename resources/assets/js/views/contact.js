function ContactsPage() {
	this.construct();
};

ContactsPage.prototype = {

	construct : function() {
		this.init_events();
		this.init_table_events();
	},

	reload_table : function() {
		var $self = this;

		$http.post( $Url.base() + '/contacts',  { 'some' : 'some' },
			function( $json_response ) {
				if( $json_response.success ) {
					$( 'tbody#contacts-table-list' ).html( $json_response.content );
					$self.init_table_events();
				}
			}
		);
	},

	init_search : function() {

	},

	init_events : function() {
		$( '.add-contact' ).click(
			function() {
				$http.post( $Url.base() + '/' + 'contacts/0/edit', { 'some' : 'some' }, 
					function( $json_response ) {
						if( $json_response.success ) {
							$BootstrapModalService.setContent( $json_response.content ).load(
								function() {
									$ViewContactModal.construct();
								}
							);
						}
					} 
				);
			}
		);
	},

	init_table_events : function() {

		var $self = this;

		$( '.edit-contact' ).click(
			function() {
				var $contactId = $( this ).parent().data( 'id' );

				$http.post( $Url.base() + '/' + 'contacts/' + $contactId + '/edit', { 'some' : 'some' }, 
					function( $json_response ) {
						$BootstrapModalService.setContent( $json_response.content ).load(
							function() {
								$ViewContactModal.construct();
							}
						);
					} 
				);
			}
		);

		$( '.delete-contact' ).click(
			function() {
				var $contactId = $( this ).parent().data( 'id' );
				var $name =	$( this ).parent().data( 'name' );

				$BootstrapModalService.setContent( $( '#delete-contact-modal-container' ).html() ).load(
					function() {
						$( '#modal-container span.name' ).html( $name );
						$( '#modal-container .process-delete-contact' ).data( 'id', $contactId );
						$self.delete_contact_event();
					}
				);
			}
		);

	},

	delete_contact_event : function() {

		$( '#modal-container .process-delete-contact' ).click(
			function() {
				var $contactId = $( this ).data( 'id' );

				$( 'div#modal-container .alert' ).hide();

				$http.post( $Url.base() + '/contacts/' + $contactId + '/delete', { 'id' : $contactId },
					function( $json_response ) {
						if( $json_response.success ) {
							$BootstrapModalService.unload();
							$( '#contacts-table-list tr#' + $contactId ).remove();	
						} else {
							$( 'div#modal-container .alert' ).html( $json_response.message ).show();									
						}
					}
				);
				
			}
		);

	}

};

var $ContactsPage;

$( document ).ready(
	function() {
		$ContactsPage = new ContactsPage();
	}
);
function ContactsPage() {
	this.construct();
};

ContactsPage.prototype = {

	construct : function() {
		this.init_events();
		this.init_table_events();
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

		$( '.edit-contact' ).click(
			function() {
				var $contactId = $( this ).parent().data( 'id' );

				$http.post( $Url.base() + '/' + 'contacts/' + $contactId + '/edit', { 'some' : 'some' }, 
					function( $json_response ) {
						console.log( $json_response );
					} 
				);
			}
		);

		$( '.delete-contact' ).click(
			function() {
				
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
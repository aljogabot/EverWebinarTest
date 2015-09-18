function AjaxService() {};

AjaxService.prototype = {

	post : function( $url, $data, callback ) {
		$.ajax(
			{
				url	: $url,
				type: 'POST',
				dataType: 'json',
				data: $data,
				success: function( $json_response ) {
					callback( $json_response );
				}
			}
		);
	},

	get : function( $url, $parameters, callback ) {
		// Some Other Time Baby ...
	}

};

var $http;

$( document ).ready(
	function() {
		$http = new AjaxService();
	}
);
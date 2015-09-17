<?php

	namespace Company\Handlers\ResponseHandler;
		
	use Response;

	/**
	 * Json Response Handler ...
	 */
	class JsonResponse {
		
		private $data = [];

		public function __construct() {
			/**
			 * Initialize success to FALSE ...
			 */
			$this->data[ 'success' ] = FALSE;
		}

		public function set( $key, $value ) {
			$this->data[ $key ] = $value;
			return $this;
		}

		public function error( $message = '' ) {
			$this->data[ 'message' ] = $message;
			return $this->render();
		}

		public function success( $message = '' ) {
			$this->data[ 'success' ] = TRUE;
			$this->data[ 'message' ] = $message;
			return $this->render();
		}

		public function render() {
			return Response::json( $this->data );
		}
	
	}
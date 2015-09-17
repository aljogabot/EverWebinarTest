<?php

	class Contact extends Eloquent {
		
		/**
		 * I placed it in here to be formal :)
		 *
		 * @var string
		 */
		protected $table = 'contacts';

		protected $fillable = [
			'name',
			'email',
			'phone',
			'custom_1',
			'custom_2',
			'custom_3',
			'custom_4',
			'custom_5'
		];

		/**
		 * @return Eloquent/Relations
		 */
		public function user() {
			return $this->belongsTo( 'User' );
		}
	
	}
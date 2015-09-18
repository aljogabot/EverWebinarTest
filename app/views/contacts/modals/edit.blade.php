<div class="modal-content">
	<form name="contact-form" action="{{ URL::route( 'save-contact', [ $contact->id ] ) }}">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Save Contact</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="alert" style="display:none;"></div>

	    	<div class="form-group">
				<label for="name">Name</label>
		        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus value="{{ $contact->name }}">
			</div>

			<div class="form-group">
				<label for="email">Email Address</label>
		        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus value="{{ $contact->email }}">
			</div>

			<div class="form-group">
				<label for="phone">Phone</label>
		        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required autofocus value="{{ $contact->phone }}">
			</div>

			<button type="button" class="btn btn-primary">Show Hide Fields</button>

			<div id="custom-fields-container" style="display: none;">

				<div class="form-group">
					<input type="text" id="custom_1" name="custom_1" class="form-control" placeholder="" required autofocus value="{{ $contact->custom_1 }}">
				</div>

				<div class="form-group">
					<input type="text" id="custom_2" name="custom_2" class="form-control" placeholder="" required autofocus value="{{ $contact->custom_2 }}">
				</div>

				<div class="form-group">
					<input type="text" id="custom_3" name="custom_3" class="form-control" placeholder="" required autofocus value="{{ $contact->custom_3 }}">
				</div>

				<div class="form-group">
					<input type="text" id="custom_4" name="custom_4" class="form-control" placeholder="" required autofocus value="{{ $contact->custom_4 }}">
				</div>

				<div class="form-group">
					<input type="text" id="custom_5" name="custom_5" class="form-control" placeholder="" required autofocus value="{{ $contact->custom_5 }}">
				</div>

			</div>

	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary save-contact">Save</button>
	    </div>
    </form>
</div>
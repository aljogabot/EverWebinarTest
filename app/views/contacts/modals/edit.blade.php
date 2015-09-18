<div class="modal-content">
	<form name="contact-form" action="{{ URL::route( 'save-contact', [ $contact->id ] ) }}">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Save Contact</h4>
	    </div>
	    <div class="modal-body">
	    	<div class="alert" style="display:none;"></div>

			<div class="form-group">
				<label for="email">Email Address</label>
		        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus value="{{ $contact->email }}">
			</div>
	    </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary save-contact">Save</button>
	    </div>
    </form>
</div>
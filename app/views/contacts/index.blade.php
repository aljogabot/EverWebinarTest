@section( 'content' )
	<div class="row">
		<div class="col-md-4 pull-right">
			<form name="search-form" id="search-form">
				<div class="form-group">
                  	<label class="control-label" for="search" class="sr-only"></label>
                  	<input class="form-control" id="search" type="text" value="" placeholder="Search for Contacts" />
                </div>
			</form>
		</div>
	</div>
	<table class="table table-bordered">
  		<thead>
        	<tr>
          		<th>#</th>
          		<th>Name</th>
          		<th>Email</th>
          		<th>Phone</th>
          		<th>Actions</th>
        	</tr>
      	</thead>
      	<tbody id="contacts-table-list">
        	@include( 'contacts.blocks.list' )
      	</tbody>
    </table>
@endsection

@section( 'page-level-scripts' )
	{{ HTML::script( 'js/views/contact.js' ) }}
@endsection
@section( 'content' )
	<div class="row">
        <div class="col-md-5">
            <h1>Contacts</h1>
        </div>
        <div class="col-md-2 pull-right" style="padding-top:20px;">
            <button class="btn btn-primary add-contact">Add Contact</button>
        </div>
		<div class="col-md-5 pull-right">
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
            <tr>
                <th scope="row">1</th>
                <td>Bogart Mansok</td>
                <td>bogart@gmail.com</td>
                <td>09175029559</td>
                <td>
                    <button class="btn btn-success">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        	@include( 'contacts.blocks.list' )
      	</tbody>
    </table>
@endsection

@section( 'page-level-scripts' )
	{{ HTML::script( 'js/views/contact.js' ) }}
    {{ HTML::script( 'js/views/view-contact.js' ) }}
@endsection
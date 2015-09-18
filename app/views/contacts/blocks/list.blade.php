@foreach( $contacts as $contact )
	<tr>
        <th scope="row">{{ $contact->id }}</th>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td>
            <button class="btn btn-success">Edit</button>
            <button class="btn btn-danger">Delete</button>
        </td>
    </tr>
@endforeach
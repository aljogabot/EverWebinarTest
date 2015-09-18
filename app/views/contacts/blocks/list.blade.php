@foreach( $contacts as $contact )
	<tr id="{{ $contact->id }}">
        <th scope="row">{{ $contact->id }}</th>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->phone }}</td>
        <td data-id="{{ $contact->id }}" data-name="{{ $contact->name }}">
            <button class="btn btn-success edit-contact">Edit</button>
            <button class="btn btn-danger delete-contact">Delete</button>
        </td>
    </tr>
@endforeach
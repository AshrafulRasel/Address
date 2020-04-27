@extends('layout')
@section('content')
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h1>Contact List</h1>
		</div>
		
		
	</div>
	<table class="table table-bordered">
		<thead>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th><a href="{{route('contact.create')}}" class="btn btn-primary">Add New</a></th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			@foreach($contacts as $contact)
			<tr>
				<td>{{ $contact->first_name }}</td>
				<td>{{ $contact->last_name }}</td>
				<td>{{ $contact->email }}</td>
				<td>
					<a href="{{route('contact.show', $contact->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('contact.edit', $contact->id)}}" class="btn btn-warning">Edit</a>

					<button class="btn btn-danger waves-effect" type="button" onclick="deleteContact({{ $contact->id }})"><i class="material-icons">Delete</i></button>
                        <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
				</td>
				<td><a href="{{route('addresslist', $contact->id)}}" class="btn btn-info">Address List</a></td>
				<td><a href="{{route('phonelist', $contact->id)}}" class="btn btn-info">Phone List</a></td>

			</tr>
			@endforeach
		</tbody>
		 
	</table>

	


	<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

	<script type="text/javascript">
		function deleteContact(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }	
	</script>
 

@endsection